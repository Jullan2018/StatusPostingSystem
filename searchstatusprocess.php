<html>
<!--This searchstatusprocess.php file retrieves the information of the status 
    in the database based in the user's search and display the information-->
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
<?php
    //This is php file that contains the information regarding on connecting
    //to the database.
    include 'getConnection.php';
    
    if(isset($_POST['submit']))
    {
        $searchStatus = $_POST['search'];   
        //This SQL query retrieves the data/information that matches 'searchStatus'
        $searchQuery = "SELECT * FROM StatusPosting WHERE Status LIKE '%$searchStatus%'";
        
        $result = mysqli_query($connection,$searchQuery);
        
        if(mysqli_num_rows($result) > 0)
        {
            echo "<h1>Status Information</h1>";
            
            while($row=mysqli_fetch_array($result))
            {
                echo "Status: ". $row['Status']. "<br>";
                echo "Status Code: ". $row['Status_Code']. "<br><br>";
                
                echo "Share: ". $row['Share']. "<br>";
                echo "Date Posted: ". $row['Date']. "<br>";
                echo "Permission: ". $row['Permission_Type']. "<br><br>";
                echo "------------------------------------------------------<br>";
            }
        }
        else
        {
            echo "Opps. There's been an error in the executing your query.<br><br>
            Please try again<br>";
        }
        
        mysqli_free_result($result);
        mysqli_close($connection);
    }
 ?>
</body>
<a href = "searchstatusform.html">Search for another status</a><br>
<a href = "index.html">Return to Home Page</a>
</html>