<?php
	//Get variables
	$stock = $_POST['Sadd'];
    $shares = $_POST['SHadd'];
    $today = date("m.d.y");
    $time = date("h:i:sa");
    
    $yahoo_stock = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sl1d1t1c1ohgv&e=.csv");
    $data = explode(",", $yahoo_stock);
    if ($data[1] == 0) // check if to see if stock exists by whether it has a value or not
    {
        header("Location: admin.php?errorAddS=Please enter a valid stock");
    }
    elseif (!filter_var($shares, FILTER_VALIDATE_INT)) //check for invalid number of stocks
    {
        header("Location: admin.php?errorAddS=Please enter a valid number of stock");
    }
    else
    {
        $file_name="stocks.txt";
        $fp = fopen($file_name, "r");
	    while($line = fgets($fp))
	    {
	        $existingStock = strtok($line, "|");
            if($existingStock == $stock)
                $exists = 1; 
        }
        fclose($fp);
        
        if ($exists == 1)
        {
            header("Location: admin.php?errorAddS=That stock already exists for you");
        }
        else
        {
        
	       //Create a file reference
           $fp = fopen($file_name, "a");

	       //Write information to file
           fwrite($fp, "$stock|$shares|$today|$time\n");

	       //Close file
	       fclose($fp);

           //Redirect back to the index page
	       header("Location: admin.php");
        }
    }
?>
