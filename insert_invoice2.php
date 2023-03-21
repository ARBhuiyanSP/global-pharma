<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}

include("dbcon.php");

if(isset($_POST['submit'])){

$invoice_number= $_GET['invoice_number'];
$product =$_POST['product'];
$price_date=$_POST['price_date'];
$qty    = $_POST['qty'];
$date   = $_POST['date'];

$select_sql= "SELECT * FROM product WHERE medicine_name = '$product' AND price_date = '$price_date'";

$select_query= mysqli_query($con,$select_sql);

	while($row = mysqli_fetch_array($select_query)){
		$medicine_name = $row['medicine_name'];
		$category      = $row['category'];
		$quantity      = $row['quantity'];
        $sell_type     = $row['pack_size'];
		$cost          = $row['sale_per_pcs'];
		//$profit        = $row['profit_price'];
		$price_date    = $row['price_date'];

	}

	$update_sql="UPDATE product SET used_quantity = used_quantity + '$qty' , remain_quantity = remain_quantity - '$qty' WHERE medicine_name = '$product' AND price_date = '$price_date'";//*******UPDATING Stock if Sale Made **********

	$update_query = mysqli_query($con,$update_sql);

	$select_sql = "SELECT * FROM product WHERE medicine_name = '$product' AND price_date = '$price_date' ";

	$select_query = mysqli_query($con,$select_sql);

	while($row = mysqli_fetch_array($select_query)){

		  $quantity = $row['remain_quantity'];
	}
	   echo "<h1>....LOADING</h1>";

	   if($quantity <= 0){

	   	   $update_quantity_sql = "UPDATE product set active_prod =  'YES' where medicine_name = '$product' and price_date = '$price_date' ";//********Updating Unavailable if medicine_qty  is zero***********

	   	   $update_quantity_query = mysqli_query($con,$update_quantity_sql);
	   }

	$amount = $qty*$cost;
	$profit_amt = 0;

               $insert_sql ="INSERT INTO on_hold values('','$invoice_number','$medicine_name','$category','$price_date','$qty','$sell_type','$cost','$amount','$profit_amt','$date')";//*****INSERTING INTO on_HOLD TABLE*******

	$insert_query = mysqli_query($con,$insert_sql);

	if($insert_query){

     header("location:home.php?invoice_number=$invoice_number");
  
     // echo "<script type='text/javascript'>window.location.href = home.php?invoice_number=$invoice_number '</script>";
	}else{

	}

  }

?>