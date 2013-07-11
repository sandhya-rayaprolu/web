<a href="index.php">Home</a>
<?php include("../mysql.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:main_login.php");
}?>
<html><html>
    <head>
  <meta charset="utf-8" />
  <title>Add Music News</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $('#datepicker').datepicker({dateFormat: 'dd/mm/yy', altField: '#date', altFormat: 'yy-mm-dd'});
  });
  </script>
</head>
  <body>
     <?php
    if($_POST["add"]!=1){?>
    
      <form action="add.php" method="post">
        <table>
          <tr>
            <td>Title:</td>
            <td><textarea name="title" cols="40" rows="3"></textarea></td>
          </tr>
<!--          <tr>
            <td>Date:</td>
            <td><input type="text" id="datepicker" />
                <input id="date" name="date" type="hidden" type="text"></td>
          </tr>-->
          <tr>
            <td>Description:</td>
            <td><textarea name="description" cols="40" rows="5"></textarea></td>
          </tr>
          <tr>
            <td><input type="submit" value="Add Row" /></td>
            <input type="hidden" name="add" value="1"/></td>
          </tr>
       </table>
      </form>
       <?php
    }else{
      $id_query = "SELECT max(film_id) as max_id from film_text";
      $id_result = mysql_query($id_query);
      $row = mysql_fetch_array($id_result);
      $id = $row['max_id']+1;
      echo $id;
      $title = $_POST["title"];
   //   $date = $_POST["date"];
      $description = $_POST["description"];
      $sqlquery = "INSERT INTO film_text (film_id,title,description) VALUES ('".$id."','".$title."','".$description."')";
      echo $sqlquery;
      $result = mysql_query($sqlquery);
      if($result)
      echo "row inserted";
      else
      echo "row not inserted".mysql_error();

      }
    ?>
  </body>
</html>