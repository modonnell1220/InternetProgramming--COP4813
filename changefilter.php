<?php
	session_start();
	$filter = $_GET['filter'];

    if($filter == "Random")
    {
        $_SESSION['filter'] = 1;
    }
    else if($filter == "Most Liked")
    {
        $_SESSION['filter'] = 2;
    }
    else if($filter == "Most Disliked")
    {
        $_SESSION['filter'] = 3;
    }
    else
    {
        $_SESSION['filter'] = 4;
    }
    header('Location: home.php');
?>
