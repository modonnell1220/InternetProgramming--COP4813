<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}
?>
<html>
<head>
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
  
<style type='text/css'>

    
    #wrap {
       margin: 10px auto;        
       background: #888;
       padding: 10px;
       width: 700px;
        float: left;
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
    br.clearLeft {
       clear: left;        
    }

    .container {
        text-align: center;
        width: 50%;
        margin: 0 auto;
    }

.wrapper {
    display: table;
    margin: 0 auto;
     width: 50%;
      /*float: left !important;*/
    display: inline-grid;
    }
      .wrapper img {
            float: left;
            margin: 5px 7px;}
    

</style>

    
<script language="javascript" type="text/javascript">
    <!-- 
    //Browser Support Code
    function ajaxFunction($x,$output)
    {
        //document.write($output);
        var ajaxRequest;  // The variable that makes Ajax possible!

        try{
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        // Create a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                $($output).text(ajaxRequest.responseText);

                //document.getElementById($output).innerHTML = ajaxRequest.responseText;
            }
        }

        var selection = $x;

        ajaxRequest.open("GET", "getLikes.php?selection=" + selection, true);
        ajaxRequest.send(null); 
    }
    function ajaxFunction1($x,$output)
    {
        //document.write($output);
        var ajaxRequest;  // The variable that makes Ajax possible!

        try{
            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e){
            // Internet Explorer Browsers
            try{
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        // Create a function that will receive data sent from the server
        ajaxRequest.onreadystatechange = function(){
            if(ajaxRequest.readyState == 4){
                $($output).text(ajaxRequest.responseText);
                //document.getElementById($output).innerHTML = ajaxRequest.responseText;
            }
        }

        var selection = $x;

        ajaxRequest.open("GET", "getDislikes.php?selection=" + selection, true);
        ajaxRequest.send(null); 
    }
    </script>

    
    
    <?php
        $filter = $_SESSION['filter'];
        $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');

        if(!$mysql_access)
        {
                die('Could not connect: ' . mysql_error());
        }

        mysql_select_db('group3');
    
        if($filter == 1)
        {
            $query = "SELECT * FROM Memes Order By rand()";
            $result = mysql_query($query, $mysql_access);	
        }
        else if($filter == 2)
        {
            $query = "SELECT * FROM Memes Order By Likes DESC";
            $result = mysql_query($query, $mysql_access);	
        }
        else if($filter == 3)
        {
            $query = "SELECT * FROM Memes Order By Dislikes DESC";
            $result = mysql_query($query, $mysql_access);	
        }
        else
        {
            $query = "SELECT * FROM Memes Order By ID DESC";
            $result = mysql_query($query, $mysql_access);	
        }
	
    ?>
    
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
    
    
    
    
<div class="container">
    <br>
    <h2><?php
	       $username = $_SESSION['username'];
            $filter = $_SESSION['filter'];
	       echo "Welcome, $username. <br>Here's some memes to rate.<br>";	   
        ?></h2><hr> 
    
    <form action='changefilter.php' method='get'>
        <p>Filter Memes: <select name="filter" id="filter"> 
            <?php
                $filter = $_SESSION['filter'];
                if($filter == 1)
                {
                    echo "<option value='Random' selected>Random</option>";
                    echo "<option value='Most Recent'>Most Recent</option>";
                    echo "<option value='Most Liked'>Most Liked</option>";
                    echo "<option value='Most Disliked'>Most Disliked</option></select> &nbsp &nbsp	";
                }
                else if($filter == 2)
                {
                    echo "<option value='Random'>Random</option>";
                    echo "<option value='Most Recent'>Most Recent</option>";
                    echo "<option value='Most Liked' selected>Most Liked</option>";
                    echo "<option value='Most Disliked'>Most Disliked</option></select> &nbsp &nbsp	";
                }
                else if($filter == 3)
                {
                    echo "<option value='Random'>Random</option>";
                    echo "<option value='Most Recent'>Most Recent</option>";
                    echo "<option value='Most Liked'>Most Liked</option>";
                    echo "<option value='Most Disliked' selected>Most Disliked</option></select> &nbsp &nbsp	";
                }
                else
                {
                    echo "<option value='Random'>Random</option>";
                    echo "<option value='Most Recent' selected>Most Recent</option>";
                    echo "<option value='Most Liked'>Most Liked</option>";
                    echo "<option value='Most Disliked'>Most Disliked</option></select> &nbsp &nbsp	";
                }                
            ?>
            <input type='submit' value='Filter' class="button"></p>
    </form>
    
    <br><br>
    <div class="wrapper">
    <?php
        
        $MemeCounter = 1;
        while($row = mysql_fetch_row($result))
        {
            $ResponseID = "output" . $MemeCounter;
            //echo $ResponseID;
            //echo "< id='" . $ResponseID . "'>Likes = " . $likes . "     Dislikes = " . $dislikes . "</p><br>";
            
            $ID = $row[0];
            $MemeName = $row[1];
            $MemePath = $row[2];
            $Poster = $row[3];
            $likes = $row[4];
            $dislikes = $row[5];
            
            
            
            
            echo "<table align='center'>";
            echo "<tr>";
                echo "<td>Posted by <b>$Poster</b></td><td></td><td></td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td colspan='3'><img src='$MemePath' width='350'></td>";
            echo "</tr><tr><td>&nbsp</td></tr>";

            echo "<tr>";
                echo "<td>&nbsp &nbsp <input type='image' src='like.png' onclick='ajaxFunction($ID,$ResponseID);' id='like_button' wdith='25' height='25'></td><td></td><td><input type='image' src='dislike.png' onclick='ajaxFunction1($ID,$ResponseID);' id='dislike_button' wdith='25' height='25'></td>";
            echo "</tr>";
            //echo "<tr>";
            //    echo "<td>$likes</td><td></td><td>$dislikes</td>";
            //echo "</tr>";
            echo "</table>";
            echo "<p id='$ResponseID' align='center'>Likes: " . $likes . "     Dislikes: " . $dislikes . "</p><br>";
            echo "<br><br>";
            ++$MemeCounter;
        }
        mysql_close($mysql_access);
    ?> 
    </div>
    
    
	<!--<p>This is just a test</p><br><br><br><br><br><br><br><br><br>
	<p>This is to make sure the scroll bar works</p><br><br><br><br><br><br><br><br><br><br>
	<p>keep going</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<p>Scroll bar works!!!!!!!</p>-->

</div>
</div>
</body>
</html>
