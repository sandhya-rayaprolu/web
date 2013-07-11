/******************************************************************************
Displays a list of options for the user, and redirects to the appropriate page
*******************************************************************************/
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}?>
<html>
    <title>Film Text</title>
    <body>
        <a href="select.php">Select</a><br />
        <a href="add.php">Add</a><br />
        <a href="update.php">Update</a><br />
        <a href="delete.php">Delete</a><br />
        <a href="logout.php">Logout</a>
    </body>
</html>