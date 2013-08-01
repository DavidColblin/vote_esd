<?php
require('dbconn.php');

	$request = $_GET['request'];
	$hashedKey = $_GET['key'];
	
	$key =  compareHash($hashedKey);
	$surveyForm = readForm();
	
	 
	echo encrypt(htmlentities($surveyForm), $key);

	
//FUNCTIONS
function compareHash($hashedKey)
{
	$posts= mysql_query("SELECT ls_key FROM localservers WHERE ls_idHash = '$hashedKey'" );
		
		$result = false;
		while($post = mysql_fetch_array($posts))
		{
			$result = $post['ls_key'];
		}
	//mysql_close($conn); Causes some odd error once more...
		
	return $result;
}

function readForm()
{
$formphp = 'localhost/esd15.11/main/surveyform/formGenerator.php'; 
	
		$url=$formphp; //   echo "generating form at ".$url."....";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_GET, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$form_enc = curl_exec($curl) or die(curl_error($curl));
		curl_close($curl);
		return $form_enc;
}

function encrypt($plainForm,$key)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	
	return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $plainForm, MCRYPT_MODE_ECB, $iv));;
}
?>
