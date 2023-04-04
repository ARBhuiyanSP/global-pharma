<?php
session_start();
if(!isset($_SESSION['user_session']))
	{
		header("location:index.php");
	}
	include("dbcon.php");
if(isset($_POST['editvid']))
	{
		$invoice_number	= $_POST['invoice_number'];
			$sql 			= "SELECT * FROM inv_supplierpayment WHERE voucherid = '$invoice_number'";
			$query 			= mysqli_query($con,$sql);
			$row 			= mysqli_fetch_array($query);
			$voucherid		= $row['voucherid'];
			$date			= $row['voucherdate'];
		header("location:supplier_payment.php?invoice_number=$voucherid&inv_date=$date");

	

  }

?>