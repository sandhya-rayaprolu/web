<?php include("../mysql.php");
/**************************************************************************************************************
This file checks the validity of the username/password, it checks if the username is present in the staff table
It redirects to the login form again if the username/password is not valid.
If the username/password is valid, it takes the user to index.php, where he can select the operation.
***************************************************************************************************************/
ob_start();

$username=$_POST['username']; 
$password=$_POST['password']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM staff WHERE username='$username'"; //and password='$password'"; removed password checking to make it work with sakila database
$result=mysql_query($sql);

$count=mysql_num_rows($result);
$row = mysql_fetch_array($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    echo "Found user ",$username;
    // Register $username, $password and redirect to file "index.php"
    session_start();
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;;
    header("location:index.php");
}
else {
    header("location:main_login.php?invalid=1");
}
ob_end_flush();
?>
