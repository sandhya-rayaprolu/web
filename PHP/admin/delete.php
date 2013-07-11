/******************************************
Deletes a row from the table based on id.
*******************************************/
<a href="index.php">Home</a>
<?php include("../mysql.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}?>
<html>
  <title>Delete Music News</title>
  <body>
    <?php
    if($_GET["delete"]!=1){?>
      <form action="delete.php" method="get">
        <table>
          <tr>
            <td>Enter Id:</td>
            <td><input type="text" name="id"/>
            <input type="hidden" name="delete" value="1"</td>
          </tr>
          <tr>
            <td><input type="submit" value="Delete"/></td>
          </tr>
        </table>
      </form>
   <?php }
    else{
        mysql_select_db("my_db", $con);
        
        $id = $_GET["id"];
        $sqlquery = "DELETE FROM film_text WHERE film_id=".$id;
        echo $sqlquery;
        $result = mysql_query($sqlquery);
        if(mysql_affected_rows() == 0)
            echo "Invalid Id";
        elseif($result== true)
            echo "row deleted";
        else
            echo "row not deleted".mysql_error();
    }
    ?>
  </body>
</html>