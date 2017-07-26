<?php
	session_start();

        if($_SESSION['username'] == "")
        {
                header("Location: index.php?error=You must login first.");
        }
?>
<html>
<head>
    <title>Assignment 5</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Stock Portfolio Manager</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">
            
            <h3><?php
	           $username = $_SESSION['username'];

	           echo "Logging out, $username.<br>";
	           session_destroy();
            ?></h3>  
            
        </div>
        <hr>
    <p align="left"><a href="index.php" id="goback">Login</a></p>
    </div>  
</body>
</html>