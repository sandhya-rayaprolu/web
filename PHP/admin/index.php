<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}?>
<html>
    <title>Music News</title>
    <body>
        <a href="select.php">Select</a><br />
        <a href="add.php">Add</a><br />
        <a href="update.php">Update</a><br />
        <a href="delete.php">Delete</a><br />
        <a href="logout.php">Logout</a>
    </body>
</html>