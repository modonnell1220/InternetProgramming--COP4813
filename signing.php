<?php
	$username = $_POST['username'];
	$email = $_POST['email'];

    if(empty($username) || empty($email)) //check for empty form
	{
		header("Location: signup.php?error=Please fill out the form.");
	}
    else{
        //CHECK IF USERNAME/ACCOUNT ALREADY EXISTS
        $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');
        if(!$mysql_access)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('group3');
        
        $query = "SELECT Username FROM Accounts where Username = '" . $username. "'";
        $result = mysql_query($query, $mysql_access);
        $row = mysql_fetch_row($result);	
            $checkUsername = $row[0];
        mysql_close($mysql_access);

        if($checkUsername == $username) //check if username exists
        {
            header("Location: signup.php?error=That username already exists.");
        }
        else{
            
            //generate random password to be emailed to user
            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                             .'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
            shuffle($seed);
            $password = '';
            foreach (array_rand($seed, 7) as $k) $password .= $seed[$k];
            
            //Insert Username, Password, and Email into the database
            $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');
            if(!$mysql_access)
            {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db('group3');

            $query = "INSERT INTO Accounts (Username, Password, Email) VALUES ";
            $query = $query . "('$username', '$password', '$email') ";
            $result = mysql_query($query, $mysql_access);
            mysql_close($mysql_access);
            
            
            //Send Sign Up Email with Password
            $emailmessage = "Thank you, " . $username . ", for signing up for Rate Those Memes!\nBy signing up, you will now have access to all the memes you could ever want.\nYour password to your account is below. To login, use your username that you registered with and this password:\n\n" .$password . "\n\nYou can change your password through the Your Profile page.\nNow get out there and rate some memes!";
            $msg = wordwrap($emailmessage,70);
            $from = "RateThoseMemes";
            $headers .= 'From: ' . $from . "\r\n";
            mail($email,"Sign Up - RateThoseMemes",$msg, $headers);
            
            header('Location: index.php?signedUp=You successfully signed up. An email was sent with your password.');

        }
    }
?>
