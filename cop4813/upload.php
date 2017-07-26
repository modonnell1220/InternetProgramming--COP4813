<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		header("Location: index.php?error=You must login first.");
	}

$target_dir = "memes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$MemeName = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_FILES['file'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //header("Location: uploadmemes.php?error=File is not an image");
        //echo "File is not an image.";
        $uploadOk = 2;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $i = 1;
    while(file_exists($target_file))
    {
        $target_file = $target_dir . "(" . $i . ")" . basename($_FILES["fileToUpload"]["name"]);
        $MemeName = "(" . $i . ")" . basename($_FILES["fileToUpload"]["name"]);
        ++$i;
    }
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //header("Location: uploadmemes.php?error=Sorry, your file is too large");
    //echo "Sorry, your file is too large.";
    $uploadOk = 3;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //header("Location: uploadmemes.php?error=Sorry, only JPG, JPEG, PNG or GIF files are allowed");
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 4;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 1) {
    if($uploadOk == 2)
    {
        header("Location: uploadmemes.php?error=File is not an image");
    }
    else if ($uploadOk == 3)
    {
        header("Location: uploadmemes.php?error=Sorry, your file is too large");
    }
    else if ($uploadOk == 4)
    {
        header("Location: uploadmemes.php?error=Sorry, only JPG, JPEG, PNG or GIF files are allowed");
    }
    else
    {
        header("Location: uploadmemes.php?error=Sorry, your file was not uploaded");
    }
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $username = $_SESSION['username'];
        $MemePath = $target_file;
        
        $mysql_access = mysql_connect(localhost, 'group3', 'fall2016774356');
        if(!$mysql_access)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('group3');
        
        $query = "Insert Into Username, Password FROM Accounts where Username = '" . $username. "'";
        $query = "INSERT INTO Memes (MemeName, MemePath, Poster, Likes, Dislikes) VALUES ";
	    $query = $query . "('$MemeName', '$MemePath', '$username', 0, 0) ";
        
        $result = mysql_query($query, $mysql_access);
        mysql_close($mysql_access);
        
        header("Location: uploadmemes.php?success=The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ");
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        header("Location: uploadmemes.php?error=Sorry, there was an error uploading your file");
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>