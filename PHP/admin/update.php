/*************************************************************************************************************
Updates a row from the table by id. User can select an id, existing data in the table for that id is displayed.
User can edit that data and when the form is submitted, the row is updated. 
Removed the date field because film_text does not have a date field.
**************************************************************************************************************/
<a href="index.php">Home</a>
<?php include("../mysql.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}?>
<html>
<head>
  <meta charset="utf-8" />
  <title>Update Film Text</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $('#datepicker').datepicker({dateFormat: 'dd/mm/yy', altField: '#date', altFormat: 'yy-mm-dd'});
  });
  </script>
</head>
<?php
    if($_POST["update"]==0){?>
    
        <form action="update.php" method="post">
            <table>
                <tr>
                    <td>Enter Id:</td>
                    <td><input type="text" name="id"/>
                    <input type="hidden" name="update" value="1"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Update"/></td>
                </tr>
            </table>
        </form> <?php }
    else if ($_POST["update"]==1){
        $result = mysql_query("SELECT * FROM film_text where film_id=".$_POST["id"]);
        if( mysql_num_rows($result) == 0)
            echo "Invalid Id";
        else{
            $row = mysql_fetch_array($result);?>
            <form action="update.php" method="post">
                <table>
                    <tr>
                        <td>Headline:</td>
                        <td><textarea name="headline" cols="40" rows="3"><?php echo $row['title']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Summary:</td>
                        <td><textarea name="summary" cols="40" rows="5"><?php echo $row['description']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>
                         <?php     echo('<input type="hidden" name="id" value="'.$row['film_id'].'"/>');?>
                        <input type="hidden" name="update" value="2"/>
                        </td>
                    </tr>                           
                    <tr>
                        <td><input type="submit" value="Update"/></td>
                    </tr>
                </table>
            </form> <?php  }
    }
    else{
        $sqlquery="UPDATE film_text SET title='".$_POST["headline"]."',description='".$_POST["summary"]."' WHERE film_id=".$_POST["id"];
        $result = mysql_query($sqlquery);
        
        if($result)
            echo "row updated";
        else
            echo "row not updated".mysql_error(); 
    }
    
    ?>