<?php
//require("securityPatch.php");

function htmlupper(){

 header("Cache-Control: no-cache");
 
echo'
<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<style>
	body{
	background: #EBE6E6;
	background-image: -moz-radial-gradient(center 45deg,circle cover, white, silver);
	background-image: -webkit-gradient(radial, 50% 50%, 0, 50% 50%,800, from(white), to(silver));
	background-image: radial-gradient(center 45deg,circle cover, white, silver);
	font-family: Georgia;
	padding: 30px;
}
#main{
	width: 700px;
	background: white;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	margin: 0 auto;
	padding: 50px 80px;
	-webkit-box-shadow: 1px 2px 5px silver;
	-moz-box-shadow: 1px 2px 5px silver;
	box-shadow: 1px 2px 5px silver;
}
table{
	margin: 0 auto;
	padding-top: 50px
}
</style>
</head>
<body>
	<div id="main">
	<h1> PetShow Vote </h1>
	<h5><i style="color:grey">Remember that your vote is anonymous.</i></h5>
			<hr noshade color="#EBE6E6"/>
';
}

function htmllower(){
	echo '</div>
		</body>

		</html>
		';
}
?>