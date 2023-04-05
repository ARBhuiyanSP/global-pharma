<?php
	include("../dbcon.php");
	session_start();
		if(!isset($_SESSION['user_session'])){

			header("location:index.php");
		}
		if(isset($_POST['submit'])){
			
			
			$bar_code		= $_POST['bar_code']; 
			$category		= $_POST['category']; 
			$med_name		= 	$_POST['med_name'];  
			$gen_name		= 	$_POST['gen_name'];
			$company 		=	$_POST['company'];     
			$packing_mode 	=  	$_POST['packing_mode'];     
			$pcs_per_unit 	=  	$_POST['pcs_per_unit']; 
			$actual_price 	= 	$_POST['actual_price'];  
			$selling_price 	= 	$_POST['selling_price'];
			$sell_per_pcs 	= 	$_POST['sell_per_pcs'];	
			$op_qty 		= 	$_POST['op_qty'];	
			
			$status			=  	$_POST['active_status']; 
			$quantity		=  	$_POST['op_qty'];
			$price_dates 	= 	strtotime($_POST['price_date']);
			$price_date 	=   date('Y-m-d',$price_dates);
			
			$sql="INSERT INTO product(bar_code, medicine_name, generic_name, pack_size, pcs_per_pack,quantity,  unit_buy_price , unit_sale_price,sale_per_pcs, price_date,supplier, item_category, active_prod,op_qty) VALUES ('$bar_code', '$med_name','$gen_name','$packing_mode','$pcs_per_unit','$quantity','$actual_price','$selling_price','$sell_per_pcs','$price_date','$company','$category','$status','$op_qty')";

			$result =mysqli_query($con,$sql);
			
			
			
			
			/* Insert Material Balance Table*/
					$materialBalance_sql = "INSERT INTO inv_materialbalance VALUES('','OP','$med_name','$price_date','$op_qty','','','','','','','','OP','','','','','')";
					$materialBalance_query = mysqli_query($con,$materialBalance_sql);	
			
			
			
			if($result)
			{
				echo "<script type='text/javascript'>window.top.location='view.php';</script>";

			}
		}
 

?>