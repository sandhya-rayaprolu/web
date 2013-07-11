<?php
/********************************************************************************************************************************
Configuration file for database connection parameters. Change $host, $username, $password corresponding to your database instance.
**********************************************************************************************************************************/
// change the following parameters to point to the default database sakila installed with mySQL installation
$host="localhost";
$user="username";
$password="password";

$connection=mysql_connect($host,$user,$password);
$database="sakila";
$db=mysql_select_db($database,$connection) or die("Couldn't connect to server.");
?>
