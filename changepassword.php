<?php
	session_start();
	$username = $_SESSION['username'];
    
    $oldPassword = $_GET['old'];
	$newPassword_01 = $_GET['new_01'];
	$newPassword_02 = $_GET['new_02'];

        
    if(empty($oldPassword) || empty($newPassword_01) || empty($newPassword_02)) //check for empty form
	{
		header("Location: profile.php?error=Please fill out the form");
	}
    else
    {
        if ($newPassword_01 != $newPassword_02)
        {
            header("Location: profile.php?error=Please make sure your new passwords are the same");
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

            $query = "select Password from Accounts where Username = '".$username."'";
            $result = mysql_query($query, $mysql_access);
            $row = mysql_fetch_array($result);
            $password = $row[0];

            if($password == $oldPassword)
            {
                $query = "Update Accounts Set Password = '" . $newPassword_01 . "' where Username = '" . $username . "'";
                $result = mysql_query($query, $mysql_access);
                header("Location:profile.php?success=Password Changed");
            }
            else
            {
                header("Location: profile.php?error=Please enter current password");
            }
        }
    }
?>
