<?php

function md5hash($plain){
	return md5($plain);
}

function decrypt($key, $encryptedRequest)
{ 	
	return mcrypt_ecb (MCRYPT_3DES, $key, $encryptedRequest, MCRYPT_DECRYPT);
}

function encrypt($plainResult,$key)
{
	return mcrypt_ecb (MCRYPT_3DES, $key, $plainResult, MCRYPT_ENCRYPT);
}

/*READS THE KEY FROM FILE;  PRESENT ONLY ON LOCAL SIDE*/
function getKey()
{
	$keyfile = "../key/key.txt";
	$file = fopen($keyfile, 'r');
	$key = fgets($file);
	fclose($file);
	return $key;
}  

function requestFormFromMain($mainURL)
{
	$handle = fopen($mainURL, "r");
	if ($handle) 
	{
		while (!feof($handle)) 
		{
			$buffer = fgets($handle, 4096);
		}
		fclose($handle);
	}
	return $buffer;
}

?>