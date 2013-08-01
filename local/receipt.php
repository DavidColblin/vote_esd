<?php
session_start();
	if (isset($_SESSION['logger']))
	{

	require("dbconn.php");
	require("htmlbody/securityPatch.php");
	

	$petId  = $_GET['p_id']; //voted pet
	
	
	$logger  = $_SESSION['logger'];
	
	$setVoted = mysql_query("UPDATE members SET mem_voted=1 WHERE mem_email='$logger'") or die("error updating member: ".mysql_error());  
	
	
	if (voteToMain($petId) != "ok")
	{
		voteToMain($petId);
	}
	
	
	//Redirecting User to Thank Page for his successful vote.
	session_destroy();
	header("Location:thanks.php");
	
	}
	else echo "Sorry you have already voted.";
	
	function voteToMain($petId)
	{
		$main = "http://localhost/esd15.11/main/";
		
		$url= $main."votereceipt.php?petId=".$petId; 
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
	
	
?>