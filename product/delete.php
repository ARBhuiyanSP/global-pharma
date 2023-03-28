<?php

include("../dbcon.php");

session_start();

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }


$id = $_GET['id'];

$delete_sql = "DELETE FROM product WHERE id = '$id'";

$delete_query = mysqli_query($con,$delete_sql);

?><!-- For more projects: Visit codeastro.com  -->