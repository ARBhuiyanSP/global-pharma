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
			$category		= $	_POST['category']; 
			$med_name		= 	$_POST['med_name'];  
			$gen_name		= 	$_POST['gen_name'];
			$company 		=	$_POST['company'];     
			$packing_mode 	=  	$_POST['packing_mode'];     
			$pcs_per_unit 	=  	$_POST['pcs_per_unit']; 
			$actual_price 	= 	$_POST['actual_price'];  
			$selling_price 	= 	$_POST['selling_price'];
			$sell_per_pcs 	= 	$_POST['sell_per_pcs'];		
			$status			=  	$_POST['active_status']; 
			$price_date 	= 	strtotime($_POST['price_date']);
			
			/* $new_reg_date = date('Y-m-d',$reg_date);
			$exp_date= strtotime($_POST['exp_date']); 
			$new_exp_date = date('Y-m-d',$exp_date);
			$sell_type = $_POST['sell_type'];
			$profit_price = $_POST['profit_price'];
			$status = "Available"; 
			
			$sql="INSERT INTO stock(medicine_name, category, quantity,remain_quantity,act_remain_quantity, register_date, expire_date, company, sell_type , actual_price,selling_price, profit_price,status) VALUES ('$med_name','$category','$quantity','$quantity','$quantity','$new_reg_date','$new_exp_date','$company','$sell_type','$actual_price','$selling_price','$profit_price','$status')";
			*/
			$sql="INSERT INTO product(medicine_name, generic_name, pack_size, pcs_per_pack,quantity, used_quantity, remain_quantity, act_remain_quantity, unit_buy_price , unit_sale_price,sale_per_pcs, price_date,supplier, item_category, active_prod) VALUES ('$med_name','$gen_name','$quantity','$quantity','$quantity','$new_reg_date','$new_exp_date','$company','$sell_type','$actual_price','$selling_price','$profit_price','$status')";

			$result =mysqli_query($con,$sql);
			if($result)
			{
				echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number';</script>";

			}
		}
 

?>