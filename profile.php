<?php 
	session_start(); 
    if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}
    $successU = $_GET['successU'];
    $errorU = $_GET['errorU'];
	$success = $_GET['success'];
    $error = $_GET['error'];
?>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<title>Profile</title>
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

</head>
    <style>
    table {
    border-collapse: collapse;
}

td {
    padding-top: .5em;
    padding-bottom: .5em;
}
    </style>
           
<body>
	<?php
		$username = $_SESSION['username'];
		$email = "";
		$password = "";
		if($username !== "")
		{
			$mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');
			if(!$mysql_access)
        		{
                		die('Could not connect: ' . mysql_error());
        		}

        		mysql_select_db('group3');
			$query = "select Email, Password from Accounts where Username = '" . $username . "'";
			$result = mysql_query($query, $mysql_access); 
			$row = mysql_fetch_array($result);
			$email = $row[0];
			$password = $row[1];
		}
	?>
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
    
    
    <center>
	<div>
		<div>
			<h3>Your Username: <?php echo $username; ?></h3>
		</div>
		<div>
			<h3>Your Email: <?php echo $email; ?></h3>
		</div>
	</div>
    <br><h4 align="center"><a href="groupprojectusermanual.pdf" target="_blank">User Manual</a></h4>

    <br>
    
    <div>
		<form action="changeusername.php" method="get">
			<table>
				<tr align="center">
					<th align="center">Change Username</th>
				</tr>
				<tr>
					<td><input type="text" name="old" placeholder="Current Username"></td>
				</tr>
				<tr>
					<td><input type="text" name="new_01" placeholder="New Username"></td>
				</tr>
				<tr>
					<td><input type="text" name="new_02" placeholder="Confirm New Username"></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="Submit"> &nbsp &nbsp &nbsp 
					<input type="reset" value="Reset"></td>
				</tr>
			</table>
		</form>
	</div>
    
	<p style="color:green;" align="center"><?php
               if ($successU != "")
                  echo $successU;
                ?></p>
    <p style="color:red;" align="center"><?php
               if ($errorU != "")
                  echo $errorU;
                ?></p>
    <br>
	<div>
		<form action="changepassword.php" method="get">
			<table>
				<tr align="center">
					<th align="center">Change Password</th>
				</tr>
				<tr>
					<td><input type="password" name="old" placeholder="Current Password"></td>
				</tr>
				<tr>
					<td><input type="password" name="new_01" placeholder="New Password"></td>
				</tr>
				<tr>
					<td><input type="password" name="new_02" placeholder="Confirm New Password"></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="Submit"> &nbsp &nbsp &nbsp 
					<input type="reset" value="Reset"></td>
				</tr>
			</table>
		</form>
	</div>
        </center>
	<p style="color:green;" align="center"><?php
               if ($success != "")
                  echo $success;
                ?></p>
    <p style="color:red;" align="center"><?php
               if ($error != "")
                  echo $error;
                ?></p>
</body>
</html>
