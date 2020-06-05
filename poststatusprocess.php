<html>
<!--This poststatusprocess.php file handles all the necessary validation 
    for all the input in the Post a status form.!-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="style.css">
    <title>Web Development Assignment 1</title>
        <h1>STATUS POSTING SYSTEM</h1>
            <ul>      
            <li><a href="about.html">About this assignment</a></li>
            <li><a href="searchstatusform.html">Search status</a></li> 
            <li><a href="poststatusform.php">Post a new status</a></li>    
            </ul>
</head>
<body>
<!--This php code creates a database and a create table in phpMyAdmin.-->
<?php
    //This is php file that contains the information regarding on connecting
    //to the database.
    include 'getConnection.php';
    //This creates a database if the database doesn't exist.
    $SQLCREATEDATABASE = "CREATE DATABASE IF NOT EXISTS StatusPosting";
    if(!mysqli_select_db($connection,$SQLCREATEDATABASE))
    {
        mysqli_query($connection,$SQLCREATEDATABASE);
    }
    //This creates a table in the database for db.
    $SQLCREATETABLE = "CREATE TABLE IF NOT EXISTS StatusPosting(
        Status_Code VARCHAR(5) PRIMARY KEY,
        Status VARCHAR(100) NOT NULL,
        Share VARCHAR(50) NOT NULL,
        Date DATE NOT NULL,
        Permission_Type VARCHAR(50) NOT NULL)";
    
    if(!mysqli_select_db($connection,$SQLCREATETABLE))
    {
        mysqli_query($connection,$SQLCREATETABLE);
    }
    
    //Close a connection to the server
    mysqli_close($connection);   
?>
    
<!--This php code handles the validation of each of the fields in the Post A Status form
    and saves the status information given by the user to the database-->
<?php
    
    $status_code = $_POST['statuscode'];    
    $status = $_POST['status'];
    $date= $_POST['date'];
    $permission = $_POST['permission'];
    $security = $_POST['security'];
    
        
    $uniqueCode = "/^[S]+[0-9]{4}/";
    $alphanumeric = "/^[^`~@#$%^&*()_+={}\[\]|\\:;“’<>๐฿]*$/";
    
    //This checks whether the status code begins with S and has 4 numbers after it.
    if(!preg_match($uniqueCode,$status_code))
    {
        echo "The status code is invalid.<br>
        Please ensure the code starts with S and four numbers.(i.e S0001)";
        echo '<br><br>';
    }
    //This checks whether the status is alphanumeric.
    if(!preg_match($alphanumeric,$status))
    {
        echo "The status is invalid.<br>
        Please ensure the status only contains alphanumeric characters (i.e My new status!)";
        echo '<br><br>'; 
    }   
    if(!isset($security))
    {
        $security = "";
        echo "There's no option selected for share!";
        echo '<br><br>';
    }  
    if(!isset($permission))
    {        
        $permission = "";
        echo "There's no option selected for permission type!";
        echo '<br><br>';

    }  
    //This is php file that contains the information regarding on connecting
    //to the database.
    include 'getConnection.php';
    //This is a SQL query that insert/ or save the Status post information to the 
    //the database.
    $postStatus = "INSERT INTO StatusPosting(Status_Code, Status, Share, Date, Permission_Type)
                VALUES ('$status_code','$status','$security', '$date','$permission')";
   
    $result = mysqli_query($connection,$postStatus);
    // checks if the execution of the query was successful
    if(!$result) 
    {
        echo "<p>Opps.There was an error in executing the query. </p>";
    } 
    else
    {
        echo "<p> Your status was sucessfully posted to the system! </p><br>";
        echo "Thank you for your post!<br>";
    }
     mysqli_close($connection);  
?>
<a href="poststatusform.php">Return to Post Status Form</a><br><br>
<a href="index.html">Return to Home Page</a>       
</body>
</html>