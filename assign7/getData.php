<?php
        $studentID = $_GET['selection'];

        $mysql_access = mysql_connect('localhost', 'n00939851', 'passing'); 
        if (!$mysql_access)
        {
                echo "Connection failed.";
                exit;
        }
        mysql_select_db("n00939851");

        $query = "Select * from Students where studentID=" . $studentID;

        $result = mysql_query($query);
        $record = mysql_fetch_array($result);

        $studentID = $record[0];
        $firstname = $record[1];
        $lastname = $record[2];
        $gender = $record[3];
        $age = $record[4];
        $classes = $record[5];
        $address = $record[6];

	    echo "<b>First Name</b>: $firstname <br>";
	    echo "<b>Last Name</b>: $lastname <br>";
        echo "<b>Gender</b>: $gender <br>";
        echo "<b>Age</b>: $age <br>";
        echo "<b>Classes</b>: $classes <br>";
        echo "<b>Address</b>: $address <br>";

	    mysql_close($mysql_access);
?>



