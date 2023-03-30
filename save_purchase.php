<?php
include "dbcon.php";
require "fpdf.php";
	session_start();
		if(!isset($_SESSION['user_session'])){

			header("location:index.php");
		}
		class myPDF extends FPDF{
	

	/*****Outputting a New Voucher code*******/
	}
	
			$newInvoice_number = getCode('inv_receive', 'MRRNo', '03d', '001', 'PO-');
			$newDates= date('Y-m-d');

			function getCode($table, $fieldName, $modifier, $defaultCode, $prefix){
				global $con;
				$sql    = "SELECT count($fieldName) as total_row FROM $table";
				$result = $con->query($sql);
				$name   =   '';
				$lastRows   = $result->fetch_object();
				$number     = intval($lastRows->total_row) + 2;
				$defaultCode = $prefix.sprintf('%'.$modifier, $number);
				return $defaultCode;
				
			}
	
	if(isset($_POST['submit'])){
		$invoice_number = 	$_GET['invoice_number'];
		$total 			=	$_POST['total'];
		$discount 		=	$_POST['discount'];
		$subtotal 		=	$_POST['subtotal'];
		$paid 			=	$_POST['paid'];
		$due			=	$_POST['due'];
		
		$pdf = new myPDF();
	
		$select_sql		=	"SELECT * FROM `purchase_details` WHERE `invoice_number` = '$invoice_number'";
		$select_query	=	mysqli_query($con,$select_sql);
		while($row = mysqli_fetch_array($select_query))
			{
				$medicine_name 	= $row['medicine_name'];
				$category      	= $row['category'];
				$quantity      	= $row['qty'];
				$cost          	= $row['cost'];
				$amount         = $row['amount'];
				
				/*insert receive details table table*/
				$insert_sql = "INSERT INTO `inv_receivedetail` VALUES('','$invoice_number','$medicine_name','$quantity','$cost','','$amount','','')";
				$insert_query = mysqli_query($con,$insert_sql);
		
				/*update product stock table*/
				$update_stock = "UPDATE product SET quantity = quantity + '". $quantity ."', act_remain_quantity = act_remain_quantity + '". $quantity ."' where medicine_name = '$medicine_name'";
				$update_stock_query = mysqli_query($con,$update_stock);
				
				/* Insert Material Balance Table*/
				$materialBalance_sql = "INSERT INTO inv_materialbalance VALUES('','$invoice_number','$medicine_name','','$quantity','$cost','','','','','','','Receive','','','','','')";
				$materialBalance_query = mysqli_query($con,$materialBalance_sql);
				
				/*Delete from hold table*/
				$del_hold_sql = "DELETE FROM `purchase_details` WHERE `invoice_number` = '$invoice_number'";
				$del_hold_query = mysqli_query($con,$del_hold_sql);
			}
		/* Insert Issue Master Table*/
		$receiveMaster_sql = "INSERT INTO inv_receive VALUES('','$invoice_number','$date','','','','$quantity','','','','','','')";
		$receiveMaster_query = mysqli_query($con,$receiveMaster_sql);
		
		
		
		/* Insert Supplier Balance Table*/
		$supplierBalance_sql = "INSERT INTO inv_supplierbalance VALUES('','$invoice_number','','','','','','')";
		$supplierBalance_query = mysqli_query($con,$supplierBalance_sql);
			
			
		
		//$new_invoice_number  = "CA-".$pdf->invoice_number();
		header("location:purchase.php?invoice_number=$newInvoice_number&inv_date=$newDates");
		
	}
 

?>