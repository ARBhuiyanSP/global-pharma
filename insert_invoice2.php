<?php
session_start();
	if(!isset($_SESSION['user_session']))
		{
			header("location:index.php");
		}
	include("dbcon.php");
	if(isset($_POST['submit']))
		{
		$invoice_number	=	$_POST['invoice_number'];
		$product 		=	$_POST['product'];
		//$supplier 		=	$_POST['supplier'];
		//$company 		=	$_POST['company'];
		$price_date		=	$_POST['price_date'];
		$qty    		=	$_POST['qty'];
		$date   		=	$_POST['date'];
		$buy_price   	=	$_POST['buy_price'];
		
		$select_sql		=	"SELECT * FROM `product` WHERE `medicine_name` = '$product'";
		$select_query	=	mysqli_query($con,$select_sql);
		while($row = mysqli_fetch_array($select_query))
			{
				$medicine_name 	= $row['medicine_name'];
				$category      	= $row['category'];
				$quantity      	= $row['quantity'];
				$sell_type     	= $row['pack_size'];
				$pcs_per_pack  	= $row['pcs_per_pack'];
				$unit_buy_price	= $row['unit_buy_price'];
				
				if($_POST['salerateperpcs']){
					$cost		= $_POST['salerateperpcs'];
				}else {
					$cost		= $row['sale_per_pcs'];
				} 
				
				//$cost          	= $row['sale_per_pcs'];
				$perPicsBuy        = $unit_buy_price / $pcs_per_pack;
				$profit        = $cost-$perPicsBuy;
				//$price_date    = $row['price_date'];

			}

		$update_sql="UPDATE product SET used_quantity = used_quantity + '$qty' , remain_quantity = remain_quantity - '$qty' where medicine_name = '$product'";

		$update_query	= mysqli_query($con,$update_sql);

		$select_sql 	= "SELECT * FROM product where medicine_name = '$product'";

		$select_query 	= mysqli_query($con,$select_sql);

			while($row 	= mysqli_fetch_array($select_query))
				{
					$quantity = $row['remain_quantity'];
				}
			echo "<h1>....LOADING</h1>";

			if($quantity <= 0)
				{
					$update_quantity_sql = "UPDATE `product` SET `active_prod` =  'YES' where medicine_name = '$product'";//********Updating Unavailable if medicine_qty  is zero***********

					$update_quantity_query = mysqli_query($con,$update_quantity_sql);
				}

			$amount		= 	$qty*$cost;
			$profit_amt = 	$profit*$qty;
			$insert_sql =	"INSERT INTO `on_hold` values('','$invoice_number','','','$medicine_name','$category','$price_date','$qty','$sell_type','$cost','$amount','$profit_amt','$date')";
			
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
					header("location:home.php?invoice_number=$invoice_number&inv_date=$date");
					// echo "<script type='text/javascript'>window.location.href = home.php?invoice_number=$invoice_number '</script>";
				}
					else
				{
					//
				}

		}

?>