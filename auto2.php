<?php

   include("dbcon.php");


session_start();

if(!isset($_SESSION['user_session'])){

    header("location:index.php");
}

   @$drug_result=mysqli_real_escape_string($con,$_POST['medicine_name']);
   @$price_date=$_POST['price_date'];
 
   $query="SELECT remain_quantity from product where medicine_name = '$drug_result' and active_prod = 'YES'  " ;

   $result =mysqli_query($con,$query);

   $data= array();

  if(mysqli_num_rows($result) > 0){

   while($row = mysqli_fetch_array($result)){

   	$data[]= $row["remain_quantity"];

   }

   echo json_encode($data);
}

?>