<!DOCTYPE HTML SYSTEM>
<?php
	$signedUp = $_GET['signedUp'];
    $error = $_GET['error'];
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rate Those Memes</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href='styles/signin.css'>  
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
      <a class="navbar-brand" href='#'>RateThoseMemes</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="uploadmemes.php" class="smoothScroll">Upload</a></li>
      <li><a href="yourupload.php" class="smoothScroll">Your Uploads</a></li>
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
          <!--<li><a href='profile.php'><span class="glyphicon glyphicon-user"></span></a></li>-->
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
          <ul class="dropdown-menu">
            <li><a href='#'>Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
     

	<!-- Container -->
	<div class="container">
        
        
        <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" id="inputEmail1" class="form-control" placeholder="Password" required>
            <br>
            <a href="signup.php">Dont have an account? Sign up here</a>
                <div class="checkbox">
              <!--<label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>-->
                </div>
             <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
            <p style="color:green;">
            <?php
	               if ($signedUp != "")
		              echo $signedUp;
                    ?></p>
            <p style="color:red;"><?php
               if ($error != "")
                  echo $error;
                ?></p>
            <br><br>
            <p align="center"><a href="groupprojectusermanual.pdf" target="_blank">User Manual</a></p>
      </form>
        
</div>
    
	</body>
</html>