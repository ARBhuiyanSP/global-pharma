<!-- For more projects: Visit codeastro.com  -->
<?php

session_start();
include("../dbcon.php");

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}


   

   if(isset($_POST['update'])){

$id = $_POST['id'];
$customername= $_POST['customername'];  
$address= $_POST['address'];    
$phone=  $_POST['phone'];
 




  $sql=" UPDATE inv_customer SET customername='$customername',address='$address',phone='$phone' WHERE id = '$id' ";

   $result =mysqli_query($con,$sql);

   echo "<h1>...LOADING</h1>";

   if($result){  

    echo "<script type='text/javascript'>window.top.location='view.php?</script>";
          
   }
}
 
?>