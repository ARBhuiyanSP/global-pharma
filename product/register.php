<?php
	include("../dbcon.php");
	session_start();
		if(!isset($_SESSION['user_session'])){

			header("location:index.php");
		}
		if(isset($_POST['submit'])){
			$invoice_number = $_GET['invoice_number'];
			echo "<h1>....LOADING</h1>";
			//$bar_code= $_POST['bar_code']; 
			$category		= $_POST['category']; 
			$med_name		= 	$_POST['med_name'];  
			$gen_name		= 	$_POST['gen_name'];
			$company 		=	$_POST['company'];     
			$packing_mode 	=  	$_POST['packing_mode'];     
			$pcs_per_unit 	=  	$_POST['pcs_per_unit']; 
			$actual_price 	= 	$_POST['actual_price'];  
			$selling_price 	= 	$_POST['selling_price'];
			$sell_per_pcs 	= 	$_POST['sell_per_pcs'];		
			$status			=  	$_POST['active_status']; 
			$quantity		=  	0; 
			$price_dates 	= 	strtotime($_POST['price_date']);
			$price_date 	=   date('Y-m-d',$price_dates);
			
			$sql="INSERT INTO product(medicine_name, generic_name, pack_size, pcs_per_pack,quantity,  unit_buy_price , unit_sale_price,sale_per_pcs, price_date,supplier, item_category, active_prod) VALUES ('$med_name','$gen_name','$packing_mode','$pcs_per_unit','$quantity','$actual_price','$selling_price','$sell_per_pcs','$price_date','$company','$category','$status')";

			$result =mysqli_query($con,$sql);
			if($result)
			{
				echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number';</script>";

			}
		}
 

?>