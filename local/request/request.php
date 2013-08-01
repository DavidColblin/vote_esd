<!DOCTYPE html/>
<html>
	<head>
	
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
form{
	margin: 0 auto;
}


</style></head>
<body>
	<div id="main">
	<h1> Survey Request To Main House</h1>
	<h5><i style="color:grey">Please Enter Your Code</i></h5>
		<hr noshade color="#EBE6E6"/>	
		
		<form id="form" action="../functions/processRequest.php" method="post">
			<input type="text" name="request" value="Request Code"/>			
			<input type="submit" value="send"/>
		</form>
		
	</body>
</html>