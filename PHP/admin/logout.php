<?php 
/********************************************************************
This file ends the user session, logs the user out of the application
*********************************************************************/
session_start();
session_destroy();
header("location:main_login.php");
?>
