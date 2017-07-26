<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your Upload</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href='styles/signin.css'>  

<style type='text/css'>

    /*body {
        background-color: #333;  
        color: #fff;
        font: 12px/1.4em Arial,sans-serif;
    }
    #wrap {
       margin: 10px auto;        
       background: #888;
       padding: 10px;
       width: 700px;
    }
    #header {
       background-color: #666;
       color: #FFF;
    }
    #logo {
       font-size: 30px;  
       line-height: 40px;    
       padding: 5px;
    }
    #navWrap {
       height: 30px;
    }
    #nav {
       padding: 5px;
       background: #999;    
    }
    #nav ul {
       margin: 0;
       padding: 0;    
    }
    #nav li {
        
       float: left;
       padding: 3px 8px;
       background-color: #FFF;
       margin: 0 10px 0 0;
       color: #F00;
       list-style-type: none;
    }
    #nav li a {
       color: #F00;  
       text-decoration: none;    
    }
    #nav li a:hover {
       text-decoration: underline;   
    }
    br.clearLeft {
       clear: left;        
    }

</style>

<script type='text/javascript'>
$(function() {
    
    var nav = $('#nav');
    var navHomeY = nav.offset().top;
    var isFixed = false;
    var $w = $(window);
    $w.scroll(function() {
        var scrollTop = $w.scrollTop();
        var shouldBeFixed = scrollTop > navHomeY;
        if (shouldBeFixed && !isFixed) {
            nav.css({
                position: 'fixed',
                top: 0,
                left: nav.offset().left,
                width: nav.width()
            });
            isFixed = true;
        }
        else if (!shouldBeFixed && isFixed)
        {
            nav.css({
                position: 'static'
            });
            isFixed = false;
        }
    });
}); 
</script>
    <?php
        $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');

        if(!$mysql_access)
        {
                die('Could not connect: ' . mysql_error());
        }

        mysql_select_db('group3');
	   $username = $_SESSION['username'];
	   $query = "SELECT * FROM Memes Where Poster = '$username'";
	   $result = mysql_query($query, $mysql_access);
    ?>
</head>
<body>

<div id="wrap">
    

    <div id="header">
        
        <div id="navWrap">
		
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
        </div>
    </div>
    <br><h2  align="center"><?php
	       $username = $_SESSION['username'];
	       echo "These are the memes you've uploaded.<br>";	   
        ?></h2><hr><br>
    
    <?php
            $check = 0;
            while($row = mysql_fetch_row($result))
            {

                $ID = $row[0];
                $MemeName = $row[1];
                $MemePath = $row[2];
                $Poster = $row[3];
                $likes = $row[4];
                $dislikes = $row[5];

                echo "<table align='center'>";
                echo "<tr>";
                    echo "<td>Posted by you</td><td></td><td></td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td colspan='3'><img src='$MemePath' width='350'></td>";
                echo "</tr><tr><td>&nbsp</td></tr>";

                echo "<tr>";
                    echo "<td>Likes = $likes</td><td></td><td align='right'>&nbsp Dislikes = $dislikes</td>";
                echo "</tr>";
                echo "</table><br><hr><br>";
                $check = 1;
            }
            mysql_close($mysql_access);
            if ($check == 0)
            {
                echo "<p align='center'>You haven't uploaded any memes yet!</p>";
            }
            else {}
    ?> 


</div>
</div>
</body>
</html>
