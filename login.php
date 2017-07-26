<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

    if(empty($username) || empty($password)) //check for empty form
	{
		header("Location: index.php?error=Please fill out the form.");
	}
    else{
        $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');
        if(!$mysql_access)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('group3');
        
        $query = "SELECT Username, Password FROM Accounts where Username = '" . $username. "'";
        $result = mysql_query($query, $mysql_access);
        $row = mysql_fetch_row($result);	
            $checkUsername = $row[0];
            $checkPassword = $row[1];
        mysql_close($mysql_access);

        if(empty($checkUsername))
        {
            header("Location: index.php?error=That account does not exist.");
        }
        else{
            
            if($username==$checkUsername && $password==$checkPassword)
            {
                $_SESSION['username'] = $username;
                $_SESSION['filter'] = 1;
                header('Location: home.php');
            }
            else
            {
                header("Location: index.php?error=Please enter valid username and password.");
            }
        }
    }
?>
