<!-- For more projects: Visit codeastro.com  -->
<?php

session_start();
include("../dbcon.php");

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}


   $invoice_number = $_GET['invoice_number'];

   if(isset($_POST['update'])){

$id = $_POST['id'];
$name= $_POST['name'];  
$address= $_POST['address'];    
$phone=  $_POST['phone'];
$status =  $_POST['status']; 

$remain_quantity = 0;

   if($quantity > $remain_quantity){

    $update_quantity = ($quantity + $remain_quantity)-$used_qty;

   }else if($quantity < $remain_quantity){

    $update_quantity = ($quantity - $remain_quantity)-$used_qty;

   }

  $sql=" UPDATE suppliers SET name='$name',address='$address',phone='$phone',status='$status' WHERE id = '$id' ";

   $result =mysqli_query($con,$sql);

   echo "<h1>...LOADING</h1>";

   if($result){  

    echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number'</script>";
          
   }
}
 
?>