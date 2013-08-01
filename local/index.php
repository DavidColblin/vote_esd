<?php
	require("htmlbody/index.php");
	//require("htmlbody/securityPatch.php");
	htmlupper();
	
	echo '
		<table>
			<form action="login.php" method="post">
				<tr><td>Email</td><td><input name="email" type="text"/></td></tr>
				<tr><td>Password</td><td><input name="password" type="password"/></td></tr>
				<tr><td></td><td><input type="Submit" value="Login"/></td></tr>
			</form>
		</table>
		</form>
		<h5><i>Remember that you have only one vote.</i></h5>
	';
	
	htmllower();
?>	
