<?php
    
    $host = ""; //server host i.e localhost
    $username = ""; //username for phpMyAdmin login
    $password = ""; //password for phpMyAdmin login
    $db = ""; //name of the database 
    
    $connection = @mysqli_connect($host,$username,$password,$db);
    
    //Creates a connection to the server
    $connection = @mysqli_connect($host,$username,$password,$db);
    
    if (!$connection) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else 
    {
        $status_code = $_POST['statuscode'];    
        $status = $_POST['status'];
        $date= $_POST['date'];
        $permission = $_POST['permission'];
        $security = $_POST['security'];
    }
    
 ?>