<?php
    $studentID = $_GET['studentID'];
	$firstName = $_GET['firstname'];
	$lastName = $_GET['lastname'];
	$address = $_GET['address'];
    $age = $_GET['age'];
	$gender = $_GET['gender'];

    $classes = $_GET['class'];
    $classesVal = "";
    $i = 0;
    

    if ($classes == "")
    {
        $classesVal = "None";
    }
    else{
    foreach ($classes as $class)
    {
        if ($i == 0)
        {
           $classesVal = "$class";
            ++$i;
        }
        else
        {
            $classesVal = "$classesVal, $class";
        }
    }
    if ($classesVal == "")
    {
        $classesVal = "None";
    }}
    
	$mysql_access = mysql_connect(localhost, 'n00939851', 'passing');
	
	if(!$mysql_access)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('n00939851');

    $firstName = mysql_real_escape_string($firstName);
    $lastName = mysql_real_escape_string($lastName);
    $gender = mysql_real_escape_string($gender);
    $age = mysql_real_escape_string($age);
    $classesVal = mysql_real_escape_string($classesVal);
    $address = mysql_real_escape_string($address);

	$query = "UPDATE Students set studentFirstname='$firstName', studentLastname='$lastName', studentAge='$age', studentAddress='$address', ";
	$query = $query . "studentGender='$gender', studentClasses='$classesVal' WHERE studentID = " . $studentID;

	$result = mysql_query($query, $mysql_access);

	mysql_close($mysql_access);

	header('Location: index.php');

?>
