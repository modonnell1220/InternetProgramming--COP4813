<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

    //Create a file reference
	$file_name = "login.txt";
	$fp = fopen($file_name, "r");
    while($line = fgets($fp))
	{
		$name = strtok($line, "|");
		$pass = strtok("|");
	}
	//Close file
	fclose($fp);


	if($username==$name && $password==$pass)
	{
		$_SESSION['username'] = $username;
		header('Location: admin.php');
	}
    else
    {
		header("Location: index.php?error=Please enter valid username and password.");
	}
?>
