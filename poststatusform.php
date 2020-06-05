<html>
<!--This poststatusform.php file handles the view and the input field in
    the Post a new status tab. -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="style.css">
    <title>Web Development Assignment 1</title>
<body>    
    <h1>Status Posting System</h1>
    <ul>      
    <li><a href="about.html">About this assignment</a></li>
    <li><a href="searchstatusform.html">Search status</a></li> 
    <li><a href="poststatusform.php">Post a new status</a></li>    
    </ul>
        <form action="poststatusprocess.php" method="post">
        <label>Status Code (required): <br><input type="text" required name="statuscode" max-length= "5"></label><br><br>
            
        <label>Status (required): <br><input style="width:600px;" required input type="text"  name="status"></label><br><br>
            
        <label>Share: </label>
        <input type="radio" name="security" value="Public">
        <label for="public">Public</label>
        <input type="radio" name="security" value="Friends">
        <label for="friends">Friends</label>
        <input type="radio" name="security" value="Only Me">
        <label for="onlyme">Only Me</label><br><br>
        
        <?php
            date_timezone_set('Pacific/Auckland');
        ?>
        <label>Date: <input type="date" required value = "<?php  echo date('Y-m-d'); ?>"name="date" ></label><br><br>
            
        <label>Permission Type: </label>
        <input type="checkbox" name="permission" value="Allow Like">
        <label for="allowlike">Allow Like</label>
        <input type="checkbox" name="permission" value="Allow Comment">
        <label for="allowcomment">Allow Comment</label>
        <input type="checkbox" name="permission" value="Only Me">
        <label for="onlyme">Only Me</label><br><br>
            
        <input type="submit" name="submit" value ="POST">
        <input type="reset" name="reset" value="RESET">
</form><br>

<a href="index.html">Return to Home Page</a>    
</body>
</head>
</html>