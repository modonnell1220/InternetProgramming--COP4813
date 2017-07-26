<?php
	$studentID = $_GET['studentID'];

	$mysql_access = mysql_connect(localhost, 'n00939851', 'passing');
	
	if(!$mysql_access)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('n00939851');

	$query = "DELETE FROM Students where studentID = " . $studentID;

	$result = mysql_query($query, $mysql_access);

	mysql_close($mysql_access);

	header('Location: index.php');

?>
