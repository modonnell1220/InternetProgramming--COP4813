<?php
	$studentID = $_GET['studentID'];

	$mysql_access = mysql_connect(localhost, 'n00939851', 'passing');
	
	if(!$mysql_access)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('n00939851');

	$query = "SELECT * FROM Students where studentID = " . $studentID;
	$result = mysql_query($query, $mysql_access);
	
	$row = mysql_fetch_row($result);	

        $studentID = $row[0];
        $firstname = $row[1];
        $lastname = $row[2];
        $gender = $row[3];
        $age = $row[4];
        $classes = $row[5];
        $address = $row[6];

	mysql_close($mysql_access);
?>
<html>
<head>
    <title>Assignment 6</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet">
    <style>
    .student-form
        {
            width: 25%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Assignment 6</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">
        <h3>Student Database: Change Record</h3>
            
        <form action='change_p.php' method='get'>
            <fieldset class="student-form">
                <legend>Add Student</legend>
                <input type='hidden' name='studentID' value='<?php echo $studentID; ?>'>
                <p>First Name: <input type="text" name="firstname" value='<?php echo $firstname; ?>'></p>
                <p>Last Name: <input type="text" name="lastname" value='<?php echo $lastname; ?>'></p>
                <p>Address: &nbsp &nbsp <input type="text" name="address" value='<?php echo $address; ?>'></p>
                <p>Age: <select name="age" id="age" >
                        <script>
                            var i = '<?php echo $age; ?>';
                            for (j = 0; j <=100; j++)
                            {
                                if (j == i)
                                {
                                    document.write("<option value='" + j + "' selected>" + j)
                                }
                                else{
                                    document.write("<option value='" + j + "' >" + j)
                                }
                            } 
                        </script>
                    </select></p>
                
                <p>Gender:<br>
                <?php
                    if ($gender == "M")
                    {
                        echo "Male <input type='radio' name='gender' value='M' checked='checked'>
                             Female <input type='radio' name='gender' value='F'><br>";
                    }
                    else
                    {
                        echo "Male <input type='radio' name='gender' value='M'>
                             Female <input type='radio' name='gender' value='F' checked='checked'><br>";
                    }
                ?>
                </p>
                <p>Types of Classes: <br>
                <?php
                    if (strpos($classes, 'Lecture') !== false)
                    {
                        echo "<input type='checkbox' name='class[]' value='Lecture' checked> Lecture<br>";
                    }
                    else
                    {
                        echo "<input type='checkbox' name='class[]' value='Lecture'> Lecture<br>";
                    }
                    
                    if (strpos($classes, 'Lab') !== false)
                    {
                        echo "<input type='checkbox' name='class[]' value='Lab' checked> Lab<br>";
                    }
                    else
                    {
                        echo "<input type='checkbox' name='class[]' value='Lab'> Lab<br>";
                    }
                    
                    if (strpos($classes, 'Online') !== false)
                    {
                        echo "<input type='checkbox' name='class[]' value='Online' checked> Online";
                    }
                    else
                    {
                        echo "<input type='checkbox' name='class[]' value='Online'> Online"; 
                    }
                    
                ?>
                </p>
                <input type='submit' value='Change Record' class="button4">
            </fieldset>
        </form>
        <hr>
        <p align="left"><a href="index.php" id="goback">Go Back</a>
        
</body>
</html>





