<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}

?>
<?php
	$errorAS = $_GET['errorAddS'];
    $errorMSH = $_GET['errorModS'];
?>
<html>
<head>
    <title>Assignment 5</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet">
</head>
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
<body>
    <header>
        <h1>Stock Portfolio Manager</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">
            
        <h3><?php
	       $username = $_SESSION['username'];
	       echo "Welcome back, $username.<br>";	   
        ?></h3><hr>           
            
            
        <p><?php/*
            $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=
            sl1d1t1c1ohgv&e=.csv", "r");
            //Open the file.
             $yahoo_stock = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sl1d1t1c1ohgv&e=.csv");
            $data = explode(",", $yahoo_stock);
            //echo number_format((float)$data[1], 2, '.', '');
               
	        fclose($open);*/
        ?></p>  
            
            
        <form action='add.php' method='post'>   
            <fieldset class="eform">
                <legend>Add Stock</legend>
                <p>Stock: <input type='text' name='Sadd' placeholder="example: GOOG, AAPL"><br><br>
                Number of Shares: <input type='text' name='SHadd' placeholder="example: 1, 10, 100"><br><br>
                <input type='Submit' value='Add' class="button">
                <p><?php
	               if ($errorAS != "")
		              echo $errorAS;
                ?></p>
            </fieldset>
        </form>
        
        <form action='modify.php' method='post'>   
            <fieldset class="eform">
                <legend>Modify Stock</legend>
                <p>Stock: <input type='text' name='Smod'  placeholder="example: GOOG, AAPL"><br><br>
                New Number of Shares: <input type='text' name='SHmod' size="15" placeholder="example: 1, 10, 100"><br><br>
                <input type='Submit' value='Modify' class="button">
                <p><?php
	               if ($errorMSH != "")
		              echo $errorMSH;
                ?></p>
            </fieldset>
        </form>
            
        <form action='delete.php' method='post'>   
            <fieldset class="eform">
                <legend>Delete Stock</legend>
                <p>Stock: <input type='text' name='Sdel' placeholder="example: GOOG, AAPL"><br><br>
                <input type='Submit' value='Delete' class="button">
            </fieldset>
        </form>    
            
            
        <p><b>Your Current Stocks</b></p>
        <?php
	       $file_name="stocks.txt";
	       $fp = fopen($file_name, "r");
           $in = 0;
	       echo "<ul>";
	       while($line = fgets($fp))
	       {
		      $stock = strtok($line, "|");
              $share = strtok("|");
		      $date = strtok("|");
              $time = strtok("|");
               
              $yahoo_stock = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sl1d1t1c1ohgv&e=.csv");
              $data = explode(",", $yahoo_stock);
              $value = (int)$share * number_format((float)$data[1], 2, '.', '');   
              $totalValues[$in] = $value;    
              ++$in; 
		      echo "<li>(Value = \$$value) You have $share shares of $stock added on $date at $time";
	       }
	       echo"</ul>";
           $grandTotal = 0;
           for ($i=0; $i < $in; ++$i)
           {
               $grandTotal = $totalValues[$i] + $grandTotal;
           }
           echo "<p><b>Portfolio Total Value</b> = \$$grandTotal</p>";
            
	       fclose($fp);
        ?>
        
        </div>
        <hr>
    <p align="left"><a href="logout.php" id="goback">Logout</a></p>
    </div>  
</body>
</html>