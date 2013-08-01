<!DOCTYPE html>
<html>
<head>
<style>
	* {
		font-size: 30px;
		padding-left: 20px;
		font-family: Arial;
	}
	tr:nth-child(even)  {
		background-color: #FDF;
	}
	tr:nth-child(1){
		color: red;
		font-size: 40px;
	}
</style>
</head>
<body>

<h1>Top Dogs Vote Results  </h1>
<?php
	require('../dbconn.php');
	
	$petVotes = mysql_query("SELECT p_name, p_voteCount FROM view_voteresults ORDER BY p_voteCount DESC") or die("cannot read: ".mysql_error());
	$names = "";
	$values = "";
	$c=0;
	$li  = "<table >";
	//get Number of votes
		while( $petVote = mysql_fetch_array($petVotes)){
			$li .= "<tr><td>" . $petVote['p_name'] . "</td><td><b>" . $petVote['p_voteCount'] . " votes </b></td></tr>";
			$names .= $petVote['p_name']."*";
			$values .= $petVote['p_voteCount']."*";
		}
		
		$values = rtrim($values, "*");
		$names = rtrim($names, "*");
		
	
echo "<img src='getGraph.php?data=".$values."&label=".$names."' />";// "<img src='getGraph.php?".$values."'/>";
	echo $li . "</table>";
	
//?data=10*9*11*10&label=Denmark*Germany*USA*Sweden"
?>
</body>
</html>