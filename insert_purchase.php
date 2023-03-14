<?php
session_start();
	if(!isset($_SESSION['user_session']))
		{
			header("location:index.php");
		}
	include("dbcon.php");
	if(isset($_POST['submit']))
		{
		$invoice_number	=	$_GET['invoice_number'];
		$product 		=	$_POST['product'];
		$supplier 		=	$_POST['supplier'];
		$company 		=	$_POST['company'];
		$expire_date	=	$_POST['expire_date'];
		$qty    		=	$_POST['qty'];
		$date   		=	$_POST['date'];
		$select_sql		=	"SELECT * FROM stock where medicine_name = '$product' and expire_date = '$expire_date'";
		$select_query	=	mysqli_query($con,$select_sql);
		while($row = mysqli_fetch_array($select_query))
			{
				$medicine_name = $row['medicine_name'];
				$category      = $row['category'];
				$quantity      = $row['quantity'];
				$sell_type     = $row['sell_type'];
				$cost          = $row['actual_price'];
				$profit        = $row['profit_price'];
				$expire_date   = $row['expire_date'];

			}

		$update_sql="UPDATE stock SET remain_quantity = remain_quantity + '$qty' where medicine_name = '$product' and expire_date = '$expire_date'";//*******UPDATING Stock if Sale Made **********

		$update_query	= mysqli_query($con,$update_sql);

		$select_sql 	= "SELECT * FROM stock where medicine_name = '$product' and expire_date = '$expire_date' ";

		$select_query 	= mysqli_query($con,$select_sql);

			while($row 	= mysqli_fetch_array($select_query))
				{
					$quantity = $row['remain_quantity'];
				}
			echo "<h1>....LOADING</h1>";

			if($quantity <= 0)
				{
					$update_quantity_sql = "UPDATE `stock` SET `status` =  'Unavailable' where medicine_name = '$product' and expire_date = '$expire_date' ";//********Updating Unavailable if medicine_qty  is zero***********

					$update_quantity_query = mysqli_query($con,$update_quantity_sql);
				}

			$amount		= 	$qty*$cost;
			$profit_amt = 	$profit*$qty;
			$insert_sql =	"INSERT INTO `purchase_details` values('','$invoice_number','$supplier','$company','$medicine_name','$category','$expire_date','$qty','$sell_type','$cost','$amount','$profit_amt','$date')";
			
			$insert_query = mysqli_query($con,$insert_sql);
			//*****INSERTING INTO on_HOLD TABLE*******
			
			/* $total_qty	= '';
			$discount	= $_POST['product'];
			$paid 		= $_POST['paid'];
			$due 		= $_POST['due'];
			$due 		= $_POST['due'];
			$master_purchase_sql ="INSERT INTO `purchase_master` values('','$invoice_number','$supplier','$company','$total_qty','$discount','$paid','$due','$date','$status')"; */
			//*****INSERTING INTO master TABLE*******
/* 
			$insert_master_query = mysqli_query($con,$master_purchase_sql); */

			if($insert_query)
				{
					header("location:purchase.php?invoice_number=$invoice_number");
					// echo "<script type='text/javascript'>window.location.href = home.php?invoice_number=$invoice_number '</script>";
				}
					else
				{
					//
				}

		}

?>