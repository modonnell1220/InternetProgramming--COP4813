<?php
	$error = $_GET['error'];
?>
<html>
	<head>
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>
		<title>Sign Up</title>
        <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SignUp</title>
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
      <a class="navbar-brand" href='index.php'>RateThoseMemes</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href='index.php'>Profile</a></li>-->
      </ul>

      <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
          <ul class="dropdown-menu">
            <li><a href='index.php'>Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <br><br><br>
                  <!-- Container -->
                  <fieldset class="eform">
	<div class="container">
        <p style="color:green;">
            <?php
	               if ($signedUp != "")
		              echo $signedUp;
                    ?></p>

        <form class="form-signin" action="signing.php" method="post">
        <h2 class="form-signin-heading">Please sign up</h2>
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            <input type="email" class="form-control" name="email" placeholder="Email"  required autofocus>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit btn-block">Sign Up</button>

                <p style="color:red;"><?php
	               if ($error != "")
		              echo $error;
                    ?></p>
      </form>
    </div>
        </fieldset>
	</body>
</html>
