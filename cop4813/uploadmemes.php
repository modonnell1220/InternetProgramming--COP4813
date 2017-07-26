<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}

	$success = $_GET['success'];
    $error = $_GET['error'];
?>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rate Those Memes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href='styles/signin.css'>  

    
    <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#meme')
                        .attr('src', e.target.result)
                        .width(350)
                        //.height(400);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script> 

    <meta charset=utf-8 />
    <title>Upload Meme</title>
    <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
      article, aside, figure, footer, header, hgroup, 
      menu, nav, section { display: block; }
        .intput1
        {
            display: inline;
        }
    </style>
</head>
<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href='home.php'>RateThoseMemes</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="uploadmemes.php" class="smoothScroll">Upload</a></li>
      <li><a href="yourupload.php" class="smoothScroll">Your Uploads</a></li>
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
          <li><a href='profile.php'><span class="glyphicon glyphicon-user"></span>&nbsp Your Profile</a></li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
          <ul class="dropdown-menu">
            <li><a href='logout.php'>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2 align="center">Select image to upload: </h2><p  align="center"> &nbsp &nbsp &nbsp <input type='file' name="fileToUpload" id="fileToUpload" onchange="readURL(this);" ></p>
        <p align="center"><img id="meme" src="#" alt="your image" onerror="this.src = 'image-not-found.png';"/></p>
        
        <p align="center"><input type="submit" value="Upload Image" name="submit"></p>
    </form>
    <br>
    <p style="color:red;" align="center"><?php
               if ($error != "")
                  echo $error;
                ?></p>
    <p style="color:green;" align="center"><?php
               if ($success != "")
                  echo $success;
                ?></p>
    

</body>
</html>