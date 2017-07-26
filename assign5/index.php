<?php
	$error = $_GET['error'];
?>
<html>
<head>
    <title>Assignment 5</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet">
    <style>
        fieldset {
            width: 315px;
            margin: 0 auto;
            display: inline-block;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Assignment 5</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">
            
        <form action='process.php' method='post'>
            <fieldset class="eform">
            <legend>Please Sign In</legend>
                <p>Username: <input type="text" name='username'></p>
                <p>Password: <input type="password" name='password'></p>
                <input type="Submit" value="Sign In" class="button">
                <p><?php
	               if ($error != "")
		              echo $error;
                    ?></p>
            </fieldset>
        </form>   
            
        </div>
    <p align="left"><a href="../index.html" id="goback">Go Back</a></p>
    </div>  
</body>
</html>