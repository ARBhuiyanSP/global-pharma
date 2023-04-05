<!-- For more projects: Visit codeastro.com  -->
<?php

session_start();
include("../dbcon.php");

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}


   $invoice_number = $_GET['invoice_number'];

   if(isset($_POST['update'])){

	$id 			= 	$_POST['id'];
	$bar_code		= 	$_POST['bar_code']; 
	$category		= 	$_POST['category']; 
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
	
	$price_dates 	= 	strtotime($_POST['price_date']);
	$price_date 	=   date('Y-m-d',$price_dates);
	
			$select_sql		=	"SELECT * FROM `product` WHERE id = '$id'";
			$select_query	=	mysqli_query($con,$select_sql);
			$row = mysqli_fetch_array($select_query);
			$pre_quantity 				= $row['quantity'];
			$pre_remain_quantity 		= $row['remain_quantity'];
			$pre_act_remain_quantity 	= $row['act_remain_quantity'];
			$pre_op 					= $row['op_qty'];
			
	$quantity				=  	$pre_quantity - $pre_op + $op_qty;
	$remain_quantity		=  	$pre_remain_quantity - $pre_op + $op_qty;
	$act_remain_quantity	=  	$pre_act_remain_quantity - $pre_op + $op_qty;

   /* if($quantity > $remain_quantity){
    $update_quantity = ($quantity + $remain_quantity)-$used_qty;
   }else if($quantity < $remain_quantity){
    $update_quantity = ($quantity - $remain_quantity)-$used_qty;
   } */

	$sql=" UPDATE product SET bar_code='$bar_code',medicine_name='$med_name',generic_name='$gen_name', pack_size='$packing_mode', pcs_per_pack= '$pcs_per_unit',quantity='$quantity',remain_quantity='$remain_quantity',act_remain_quantity='$act_remain_quantity',unit_buy_price='$actual_price',unit_sale_price='$selling_price',sale_per_pcs='$sell_per_pcs',price_date='$price_date',supplier='$company',item_category='$category',active_prod ='$status',op_qty='$op_qty' WHERE id = '$id' ";

	$result =mysqli_query($con,$sql);
	
			/* Insert Material Balance Table*/
			$materialBalance_sql = "INSERT INTO inv_materialbalance VALUES('','OP','$med_name','$price_date','$op_qty','','','','','','','','OP','','','','','')";
			$materialBalance_query = mysqli_query($con,$materialBalance_sql);
			
			/* Insert Material Balance Table*/
			$materialBalance_sqlout = "INSERT INTO inv_materialbalance VALUES('','OP','$med_name','$price_date','','','','$op_qty','','','','','OP','','','','','')";
			$materialBalance_queryout = mysqli_query($con,$materialBalance_sqlout);

	echo "<h1>...LOADING</h1>";

	if($result)
	{  
		echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number'</script>";      
	}
}
 
?>