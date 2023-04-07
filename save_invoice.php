<?php
include "dbcon.php";
require "fpdf.php";
	session_start();
		if(!isset($_SESSION['user_session'])){
			header("location:index.php");
		}
	class myPDF extends FPDF{
		
		
		/*---------------*/
		//$newInvoice_number = getDefaultCategoryCode('inv_issue', 'IssueID', '03d', '001', 'INV-');
		

		
		/*---------------*/
		/* function invoice_number()
			{//*****Outputting a New Voucher code*******
				$chars = "09302909209300923";
				srand((double)microtime()*1000000);
				$i = 1;
				$pass = '';
				while($i <=7)
					{

						$num  = rand()%10;
						$tmp  = substr($chars, $num,1);
						$pass = $pass.$tmp;
						$i++;
					}
				return $pass;
			} */
		/*****Outputting a New Voucher code*******/
		}
		
			$newInvoice_number = getCode('inv_issue', 'IssueID', '03d', '001', 'INV-');
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
			
			$select_sql		=	"SELECT * FROM `on_hold` WHERE `invoice_number` = '$invoice_number'";
			$select_query	=	mysqli_query($con,$select_sql);
			while($row = mysqli_fetch_array($select_query))
				{
					$medicine_name 	= $row['medicine_name'];
					$category      	= $row['category'];
					$quantity      	= $row['qty'];
					$cost          	= $row['cost'];
					$amount         = $row['amount'];
					$profit_amount  = $row['profit_amount'];
					$date         	= $row['date'];
					
					$insert_sql = "INSERT INTO inv_issuedetail values('','$invoice_number','$medicine_name','$quantity','$cost','','$amount','$profit_amount','','','')";
					$insert_query = mysqli_query($con,$insert_sql);
					
					/* Insert Material Balance Table*/
					$materialBalance_sql = "INSERT INTO inv_materialbalance VALUES('','$invoice_number','$medicine_name','','','','','$quantity','$cost','','','','Issue','','','','','')";
					$materialBalance_query = mysqli_query($con,$materialBalance_sql);	
			
			
					$update_stock = "UPDATE product SET act_remain_quantity = act_remain_quantity - '". $quantity ."' where medicine_name = '$medicine_name'";

					$update_stock_query = mysqli_query($con,$update_stock);
					$del_hold_sql = "DELETE FROM `on_hold` WHERE `invoice_number` = '$invoice_number'";
					$del_hold_query = mysqli_query($con,$del_hold_sql);
				}
				
			
			/* Insert Issue Master Table*/
			$issueMaster_sql = "INSERT INTO inv_issue values('','$invoice_number','$date','$quantity','','','','','','','','','','','','','','')";
			$issueMaster_query = mysqli_query($con,$issueMaster_sql);
			
			
			//$new_invoice_number  = $pdf->getDefaultCategoryCode();
			//header("location:home.php?invoice_number=$newInvoice_number&inv_date=$newDates");
			header("location:preview.php?invoice_number=$invoice_number");
			
		}
 

?>