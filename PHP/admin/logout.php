/********************************************************************
This file end the user session, logs the user out of the application
*********************************************************************/
<?php 
session_start();
session_destroy();
header("location:main_login.php");
?>
