<?php
	require('dbconn.php'); // 
	$pet_id = $_GET['petId'];
	$count = 0 ;
	$petvotes = mysql_query("select p_id, p_votecount from results where p_id = $pet_id") or die("cannot select: ".mysql_error());

	
	//get number of votes
	if (mysql_num_rows($petvotes)==0)
	{
		$votepet = mysql_query("insert into results (p_id, p_votecount) values ($pet_id, 1)") or die("cant insert: ".mysql_error());
	}
	else
	{
		$petvotes = mysql_fetch_array($petvotes);
		$count = $petvotes['p_votecount'];
		++$count;
		
		//update the corresponding field.
		$setvoted = mysql_query("update results set p_votecount='$count' where p_id = '$pet_id'") or die("error updating vote: ".mysql_error());
	}
	
	echo "ok";
?>