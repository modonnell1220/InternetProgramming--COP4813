<?php
        $MemeID = $_GET['selection'];

        $mysql_access = mysql_connect('localhost', 'group3', 'fall2016774356'); 
        if (!$mysql_access)
        {
                echo "Connection failed.";
                exit;
        }
        mysql_select_db("group3");

        $update = mysql_query("Update Memes set Likes=Likes+1 where ID = $MemeID");
        $query = mysql_query("SELECT Likes, Dislikes FROM Memes where ID = $MemeID");
    
        $record = mysql_fetch_array($query);

        $Likes = $record[0];
        $Dislikes = $record[1];

	    echo "Likes: $Likes        ";
	    echo "Dislikes: $Dislikes";

	    mysql_close($mysql_access);
?>



