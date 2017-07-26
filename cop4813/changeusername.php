<?php
	session_start();
	$username = $_SESSION['username'];
    
    $oldUsername = $_GET['old'];
	$newUsername_01 = $_GET['new_01'];
	$newUsername_02 = $_GET['new_02'];

        
    if(empty($oldUsername) || empty($newUsername_01) || empty($newUsername_02)) //check for empty form
	{
		header("Location: profile.php?errorU=Please fill out the form");
	}
    else
    {
        if ($newUsername_01 != $newUsername_02)
        {
            header("Location: profile.php?errorU=Please make sure your new usernames are the same");
        }
        else
        {
            $mysql_access = mysql_connect('localhost', 'group3', 'fall2016774356');
            if(!mysql_access)
            {
                echo "Connection failed";
                exit;
            }
            mysql_select_db('group3');

            $query = "select Username, ID from Accounts where Username = '" . $username . "'";
            $result = mysql_query($query, $mysql_access);
            $row = mysql_fetch_array($result);
            $username = $row[0];
            $ID = $row[1];

            if($username == $oldUsername)
            {               
                $query = "SELECT Username FROM Accounts where Username = '" . $newUsername_01 . "'";
                $result = mysql_query($query, $mysql_access);
                $row = mysql_fetch_row($result);	
                    $checkUsername = $row[0];

                if($checkUsername == $newUsername_01) //check if username exists
                {
                    header("Location: profile.php?errorU=That username already exists");
                }
                else
                {
                    $query = "Update Accounts Set Username = '" . $newUsername_01 . "' where ID = '" . $ID . "'";
                    $result = mysql_query($query, $mysql_access);
                    $query = "Update Memes Set Poster = '" . $newUsername_01 . "' where Poster = '" . $oldUsername . "'";
                    $result = mysql_query($query, $mysql_access);
                    $_SESSION['username'] = $newUsername_01;
                    header("Location:profile.php?successU=Username Changed");
                }
            }
            else
            {
                header("Location: profile.php?errorU=Please enter current username");
            }
        }
    }
?>
