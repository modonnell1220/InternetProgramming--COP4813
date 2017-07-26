<html>
<head>
    <title>Assignment 7</title>
    <link rel="stylesheet" href="../style.css"><link href="https://fonts.googleapis.com/css?family=Abel|Roboto" rel="stylesheet"> 
    <style>
        .ajaxinfo
        {
            width: 50%;
            height: 20%;
        }
    
        .left7{
            display: inline-block;
            width: 29%;
            vertical-align: top;
            padding: 1em 1em;
            text-align: center;
        }
    
    </style>
</head>
<body>
    
    <script language="javascript" type="text/javascript">
    <!-- 
    //Browser Support Code
    function ajaxFunction()
    {
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
                document.getElementById("output").innerHTML = ajaxRequest.responseText;
            }
        }

        var selection = document.myForm.listPersons.value;

        ajaxRequest.open("GET", "getData.php?selection=" + selection, true);
        ajaxRequest.send(null); 
    }
    </script>
    
    
    <header>
        <h1>Assignment 7</h1>
    </header>
    
    <div class="main"> 
        <div class="mid">    
            
            <div class="left7">
                <h3>Use the dropdown menu to filter your student database</h3>
                <form name='myForm'>
                <select name="listPersons" onChange="ajaxFunction()">
                <option value="" disabled selected>Select your Student</option>

                <?php

                    $mysql_access = mysql_connect("localhost", "n00939851", "passing");

                    if (!$mysql_access)
                    {
                        echo "Connection failed.";
                        exit;
                    }

                    mysql_select_db("n00939851");

                    $query = "select studentFirstname, studentLastname, studentID from Students";

                    $result = mysql_query($query);

                    while ($record = mysql_fetch_array($result) ) {

                        echo "<option value='$record[2]'>$record[0] $record[1]</option>";

                    }

                    mysql_close($mysql_access);

                ?>
                </select>
                </form>
            </div>
            
            <div class="right">
                <fieldset class="ajaxinfo">
                    <legend><p>Your Info Will Appear Here</p></legend>
                    <p id="output"></p>
                </fieldset>
            </div>
            
        <hr>
        </div>
    <p align="left"><a href="../index.html" id="goback">Go Back</a></p>
    </div>  
</body>
</html>