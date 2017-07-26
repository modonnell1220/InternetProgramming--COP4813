<?php
	$error = $_GET['error'];
?>
<html>
<head>
    <title>Assignment 6</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet">
    <script>
	   function changeRecord()
	   {
            document.myForm.action='change.php';
            document.myForm.submit();
	   }
        
        function deleteRecord()
        {
            document.myForm.action='delete.php';
            document.myForm.submit();
        }
    </script>
    
    <style>
    .student-form
        {
            width: 25%;
        }
    
        #studentTable {
            border-collapse: collapse;
            background-color: aliceblue;
            margin: 0 auto;
            padding: 50em;
            width: 100%;
            border: 0px;
            text-align: left;
        }

        .studentTable-row, .studentTable-head {
            border-bottom: 1px solid #ddd;
        }
        .studentTable-row:hover {
            background-color: aliceblue;
        }
    </style>
    
    <?php
        $mysql_access = mysql_connect(localhost, 'n00939851', 'passing');

        if(!$mysql_access)
        {
                die('Could not connect: ' . mysql_error());
        }

        mysql_select_db('n00939851');
	
	   $query = "SELECT * FROM Students";
	   $result = mysql_query($query, $mysql_access);	
    ?>
    
</head>
<body>
    <header>
        <h1>Assignment 6</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">
        <h3>Student Database</h3>
            
        <form action='add.php' method='get'>
            <fieldset class="student-form">
                <legend>Add Student</legend>
                <p>*First Name: <input type="text" name="firstname" ></p>
                <p>*Last Name: <input type="text" name="lastname"></p>
                <p>*Address: &nbsp &nbsp <input type="text" name="address"></p>
                <p>*Age: <select name="age" id="age">
                        <script>
                            for (j = 0; j <=100; j++)
                            {
                                document.write("<option value='" + j + "'>" + j)
                            }
                        </script>
                    </select></p>
                <p>*Gender:<br>
                 &nbsp Male <input type="radio" name="gender" value="M">
                Female <input type="radio" name="gender" value="F"><br>
                </p>
                <p>Types of Classes: <br>
                <input type="checkbox" name="class[]" value="Lecture"> Lecture<br>
                <input type="checkbox" name="class[]" value="Lab"> Lab<br>
                <input type="checkbox" name="class[]" value="Online"> Online 
                </p>
                <p style="color:red;"><?php
	               if ($error != "")
		              echo $error;
                    ?></p>
                <input type='submit' value='Add Record' class="button">
                <p style="font-size:80%;">* are required fields</p>
            </fieldset>
        </form>
        <hr>
            <p><b>Current Student Database</b></p>
        <form action='' name='myForm' method='get'>     
            <?php
                echo "<table border='1' style='empty-cells: hide' id='studentTable'>";
                echo "<tr class='studentTable-head'>";
                echo "<th></th><th>First Name</th><th>Last Name</th><th>Address</th><th>Age</th><th>Gender</th><th>Classes</th></tr>";
                while($row = mysql_fetch_row($result))
                {
                    $studentID = $row[0];
                    $firstname = $row[1];
                    $lastname = $row[2];
                    $gender = $row[3];
                    $age = $row[4];
                    $classes = $row[5];
                    $address = $row[6];

                    echo "<tr class='studentTable-row'>";
                    echo "<td><input type='radio' name='studentID' value='$studentID'></td>";
                            echo "<td>$firstname</td>";
                            echo "<td>$lastname</td>";
                            echo "<td>$address</td>";
                            echo "<td>$age</td>";
                            echo "<td>$gender</td>";
                            echo "<td>$classes</td>";
                    echo "</tr>";

                }
                echo "</table>";
                mysql_close($mysql_access);
            ?>    
            <p><input type='button' value='Delete Record' onClick='deleteRecord()' class="button"> &nbsp <input type='button' value='Change Record' onClick='changeRecord()' class="button4"></p>
        </form>
        <hr>
        </div>
    <p align="left"><a href="../index.html" id="goback">Go Back</a> &nbsp &nbsp &nbsp <a href="edr.html" target="_blank">Link to the Entity-Relationship Diagram</a></p>
    </div>  
</body>
</html>