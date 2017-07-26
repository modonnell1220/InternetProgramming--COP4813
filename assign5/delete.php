<?php
	//Get variables
	$stock = $_POST['Sdel'];

	//Create a file reference
	$file_name = "stocks.txt";
	$fp = fopen($file_name, "r");
    $in = 0;
    while($line = fgets($fp))
	{
		$currentstockname = strtok($line, "|");
		if($currentstockname != $stock)
        {
            //$line = trim(preg_replace('/\s\s+/', ' ', $line));
            $list[$in] = $line;
            $in++;
        }
    }
	//Close file
	fclose($fp);

	$fp = fopen($file_name, "w");
    for($i=0;$i<$in;++$i)
    {
        /*if($i>0)
        {
          fwrite($fp, "\n");  
        }*/
        fwrite($fp, "$list[$i]");
    }
	//Close file
	fclose($fp);


	//Redirect back to the index page
	header("Location: admin.php");
?>
