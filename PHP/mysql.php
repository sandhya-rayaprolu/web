<?php
$host="localhost";
$user="username";
$password="password";
$connection=mysql_connect($host,$user,$password);
$database="sakila";
$db=mysql_select_db($database,$connection) or die("Couldn't connect to server.");
?>
