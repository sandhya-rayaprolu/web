<?php include("mysql.php"); 
														
/* Pagination to display customer payments per month on one page */

$result_max_date = mysql_query("SELECT max(payment_date) as max_date from payment");
$arr_max_date = mysql_fetch_array($result_max_date,MYSQL_ASSOC);
$phpmaxdate= strtotime($arr_max_date['max_date']);
$max_month=date("m",$phpmaxdate);
$max_year=date("Y",$phpmaxdate);
$result_min_date = mysql_query("SELECT min(payment_date) as min_date from payment");
$arr_min_date = mysql_fetch_array($result_min_date,MYSQL_ASSOC);
$phpmindate= strtotime($arr_min_date['min_date']);
if (($_GET["month"]== "") or ($_GET["year"]== "") or ($_GET["month"]== 0) or ($_GET["year"]== 0))
     $sql_customer="SELECT customer.first_name, customer.last_name, payment.payment_date FROM payment,customer WHERE month(payment_date)=".$max_month." AND year(payment_date)=".$max_year." AND payment.customer_id=customer.customer_id ORDER BY payment_date DESC, payment_id DESC";
else
     $sql_customer="SELECT customer.first_name, customer.last_name, payment.payment_date FROM payment,customer WHERE month(payment_date)=".$_GET["month"]." AND year(payment_date)=".$_GET["year"]." AND payment.customer_id=customer.customer_id ORDER BY payment_date DESC, payment_id DESC";

/* End Pagination */
$result = mysql_query($sql_customer) or die("Couldn't execute select customer payment query.");
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
	?>
	<table>
	<tr>
		<td>
		<table style="width: 100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
				<table style="width: 100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><?php echo $row["first_name"]." ".$row["last_name"]; ?></td>
					</tr>
					<tr>
						<td>last updated <?php echo date("l, F j, Y",strtotime($row["payment_date"])); ?></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<?php
	}
}else
echo "No Customer Payments For The Selected Month";
?>
<tr>
	<td>
	<div><h2>Customer Payment By Month</h2></div>
	
	<div style="margin-top: 10px; margin-bottom: 10px;">
	<!--Pagination links-->
	<?php
	$date=$arr_max_date['max_date'];
	// display the link for the current month customer
	echo '<a href="customer.php">'. date("F Y",strtotime($date)).'</a><br />';
	while (strtotime($date) >= strtotime($arr_min_date['min_date'])) {
		$date = date ("F Y", strtotime("-1 month", strtotime($date)));
		$month=date("n",strtotime($date));
		$year=date("Y",strtotime($date));
		echo '<a href="customer.php?month='.$month.'&year='.$year.'">'.$date.'</a><br />';
	}
	?>
	<!--End Pagination links-->
	</div>
	</td>
</tr>
</table>

