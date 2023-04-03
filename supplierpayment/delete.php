<?php

include("../dbcon.php");

session_start();

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }


$SupplierID = $_GET['SupplierID'];

$delete_sql = "DELETE from inv_supplier where SupplierID = '$SupplierID'";

$delete_query = mysqli_query($con,$delete_sql);

?><!-- For more projects: Visit codeastro.com  -->