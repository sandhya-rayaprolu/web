<a href="index.php">Home</a>
<?php include("../mysql.php");
/*************************************************
Displays all the data in the film_text table.
**************************************************/
  if($_GET["id"]!=null){
    $result = mysql_query("SELECT * FROM film_text where film_id=".$_GET["id"]);
  }
  else
    $result = mysql_query("SELECT * FROM film_text");
  echo("<table border='1'><tr><td>Id</td><td>Title</td><td>Description</td></tr>");
  while($row = mysql_fetch_array($result)) {
    echo("<tr>");
        echo("<td>".$row['film_id']."</td>");
        echo("<td>".$row['title']."</td>");
        echo("<td>".$row['description']."</td>");
    echo("</tr>");
  }
   echo("</table>");
  ?>