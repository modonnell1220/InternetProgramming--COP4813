<?php
	//Get variables
	$stock = $_POST['Smod'];
    $share = $_POST['SHmod'];

    if (!filter_var($share, FILTER_VALIDATE_INT)) //check for invalid number of stocks
    {
        header("Location: admin.php?errorModS=Please enter a valid number of stock");
    }
    else 
    {
        //Create a file reference
        $file_name = "stocks.txt";
        $fp = fopen($file_name, "r");
        $in = 0;
        while($line = fgets($fp))
        {
            $curstock = strtok($line, "|");
            $curshare = strtok("|");
            $date = strtok("|");
            $time = strtok("|");
            if($stock == $curstock)
            {
                $line = "$stock|$share|$date|$time";
            }
            $list[$in] = $line;
            $in++;
        }
        //Close file
        fclose($fp);

	    $fp = fopen($file_name, "w");
        for($i=0;$i<$in;++$i)
        {
            fwrite($fp, "$list[$i]");
        }
	    //Close file
	    fclose($fp);


	    //Redirect back to the index page
	    header("Location: admin.php");
    }
?>
