<!-- For more projects: Visit codeastro.com  -->
<?php

session_start();
include("../dbcon.php");

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}


   $SupplierID = $_GET['SupplierID'];

   if(isset($_POST['update'])){

$SupplierID = $_POST['SupplierID'];
$SupplierCompany= $_POST['SupplierCompany'];  
$SupplierAddress1= $_POST['SupplierAddress1'];    
$SupplierPhone1=  $_POST['SupplierPhone1'];
 



  

  $sql=" UPDATE inv_supplier SET SupplierCompany='$SupplierCompany',SupplierCompany='$SupplierCompany',SupplierPhone1='$SupplierPhone1' WHERE SupplierID = '$SupplierID' ";

   $result =mysqli_query($con,$sql);

   echo "<h1>...LOADING</h1>";

   if($result){  

    echo "<script type='text/javascript'>window.top.location='view.php';</script>";
          
   }
}
 
?>