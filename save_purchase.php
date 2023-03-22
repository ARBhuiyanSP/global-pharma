<?php
include "dbcon.php";
require "fpdf.php";
	session_start();
		if(!isset($_SESSION['user_session'])){

			header("location:index.php");
		}
		
		class myPDF extends FPDF{
	

	
	function invoice_number()
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
		}
	/*****Outputting a New Voucher code*******/
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
					
					$insert_sql = "INSERT INTO inv_receivedetail values('','$invoice_number','$medicine_name','$quantity','$cost','','$amount','','')";
					$insert_query = mysqli_query($con,$insert_sql);
			
			
					$update_stock = "UPDATE product SET quantity = quantity + '". $quantity ."', act_remain_quantity = act_remain_quantity + '". $quantity ."' where medicine_name = '$medicine_name'";

					$update_stock_query = mysqli_query($con,$update_stock);
					$del_hold_sql = "DELETE FROM `purchase_details` WHERE `invoice_number` = '$invoice_number'";
					$del_hold_query = mysqli_query($con,$del_hold_sql);
				}
				
				
			
			$new_invoice_number  = "CA-".$pdf->invoice_number();
			header("location:purchase.php?invoice_number=$new_invoice_number");
			
			
			
			/* $qty    		=	$_POST['qty'];
			$date   		=	$_POST['date'];
			$buy_price   	=	$_POST['buy_price'];
			
			$price_dates 	= 	strtotime($_POST['price_date']);
			$price_date 	=   date('Y-m-d',$price_dates);
			
			$sql="INSERT INTO product(medicine_name, generic_name, pack_size, pcs_per_pack,quantity,  unit_buy_price , unit_sale_price,sale_per_pcs, price_date,supplier, item_category, active_prod) VALUES ('$med_name','$gen_name','$packing_mode','$pcs_per_unit','$quantity','$actual_price','$selling_price','$sell_per_pcs','$price_date','$company','$category','$status')";

			$result =mysqli_query($con,$sql);
			if($result)
			{
				echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number';</script>";

			} */
		}
 

?>