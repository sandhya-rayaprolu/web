<?php  include("../mysql.php");
 header('Content-type: application/xml');
 mysql_set_charset('utf8');
$i=0;// for SortOrder
$xmlWriter = new XmlWriter();
$xmlWriter->openMemory();
$xmlWriter->startDocument('1.0', 'UTF-8');
      $result = mysql_query("SELECT * FROM actor ORDER BY last_name, first_name");
      $xmlWriter->startElement('actors');
      while($row = mysql_fetch_array($result)){
        $i++;// for sortOrder
        $xmlWriter->startElement('actor');
        $phpdate= strtotime($row['last_update']);
     	$date=date("Y-m-d H:i",$phpdate);
        $xmlWriter->writeAttribute('updateDate',$date);
          $xmlWriter->writeElement('id', $row['actor_id']);
           $xmlWriter->startElement('name');
              $xmlWriter->writeCData($row['first_name']." ".$row['last_name']);
            $xmlWriter->endElement();
            $xmlWriter->endElement();
           }
              $xmlWriter->endElement();
echo $xmlWriter->outputMemory(true);
?>

