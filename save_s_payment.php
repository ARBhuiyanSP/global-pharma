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
		$newInvoice_number = getCode('inv_supplierpayment', 'voucherid', '03d', '001', 'VID-');
		$newInvoice_number_edited = getCodes('inv_supplierpayment', 'voucherid', '03d', '001', 'VID-');
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
			function getCodes($table, $fieldName, $modifier, $defaultCode, $prefix){
				global $con;
				$sql    = "SELECT count($fieldName) as total_row FROM $table";
				$result = $con->query($sql);
				$name   =   '';
				$lastRows   = $result->fetch_object();
				$number     = intval($lastRows->total_row) + 1;
				$defaultCode = $prefix.sprintf('%'.$modifier, $number);
				return $defaultCode;
				
			}
			
	if(isset($_POST['submit'])){
	
		
		
		$invoice_number = 	$_GET['invoice_number'];
		$date 			=	$_POST['date'];
		$supplier 		=	$_POST['supplier'];
		$paymenttype 	=	$_POST['paymenttype'];
		$amount 		=	$_POST['amount'];
		$remarks		=	$_POST['remarks'];
		
		$pdf = new myPDF();
		
		/* Insert Issue Master Table*/
		$receiveMaster_sql = "INSERT INTO inv_supplierpayment VALUES('','$invoice_number','$date','$supplier','$paymenttype','$amount','','$remarks','','')";
		$receiveMaster_query = mysqli_query($con,$receiveMaster_sql);
		
		
		/* Insert Supplier Balance Table*/
		$supplierBalance_sql = "INSERT INTO inv_supplierbalance VALUES('','$invoice_number','$date','$supplier','0','$amount','$remarks','in')";
		$supplierBalance_query = mysqli_query($con,$supplierBalance_sql);
			
			
		
		//$new_invoice_number  = "CA-".$pdf->invoice_number();
		header("location:supplier_payment.php?invoice_number=$newInvoice_number&inv_date=$newDates");
		
	}
	
	if(isset($_POST['updateSubmit'])){
		$invoice_number = 	$_GET['invoice_number'];
		$date 			=	$_POST['date'];
		$supplier 		=	$_POST['supplier'];
		$paymenttype 	=	$_POST['paymenttype'];
		$amount 		=	$_POST['amount'];
		$remarks		=	$_POST['remarks'];
		
		$pdf = new myPDF();
		
		/* Insert Supplier Master Table*/
		$receiveMaster_sql = "UPDATE inv_supplierpayment SET voucherdate = '$date', supplierid='$supplier', paymenttype='$paymenttype', amount='$amount', remarks='$remarks' WHERE voucherid = '$invoice_number'";
		$receiveMaster_query = mysqli_query($con,$receiveMaster_sql);
		
		
		/* Insert Supplier Balance Table*/
		
		
		$supplierBalance_sql = "UPDATE inv_supplierbalance SET SBDate = '$date', SBSupplierID='$supplier', SBCrAmount='$amount', SBRemark='$remarks', Type='in' WHERE SBRefID = '$invoice_number'";
		$supplierBalance_query = mysqli_query($con,$supplierBalance_sql);
			
			
		
		//$new_invoice_number  = "CA-".$pdf->invoice_number();
		header("location:supplier_payment.php?invoice_number=$newInvoice_number_edited&inv_date=$newDates");
		
	}
 

?>