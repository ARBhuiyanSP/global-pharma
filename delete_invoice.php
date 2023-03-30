
<!-- For more projects: Visit codeastro.com  -->
<?php

session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}
?>
<?php

include("dbcon.php");

$product_id= $_GET['id'];
$medicine_name= $_GET['name'];
//$price_date = $_GET['price_date'];
$quantity  = $_GET['quantity'];
$invoice_number=$_GET['invoice_number'];
$inv_date=$_GET['inv_date'];


$update_sql = "UPDATE  product set used_quantity = used_quantity+'$quantity', remain_quantity = remain_quantity + '$quantity' , active_prod = 'YES' where medicine_name = '$medicine_name'"; //***UPDATE STOCK when medicine deleted from Sale *******

$update_query = mysqli_query($con,$update_sql);
    

	     $delete_sql = "DELETE FROM `on_hold` WHERE id = '$product_id'";//****DELETE purchase_details when medicine deleted from Sale ******
	     $delete_query =mysqli_query($con,$delete_sql);

	     if($delete_query){

	     	header("location:home.php?invoice_number=$invoice_number&inv_date=$inv_date");
	     }else{

	     	echo "Sorry";
	     }

	  
?><!-- For more projects: Visit codeastro.com  -->