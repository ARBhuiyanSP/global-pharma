<!-- For more projects: Visit codeastro.com  -->
<?php

   include("../dbcon.php");


	session_start();

	if(!isset($_SESSION['user_session'])){

	    header("location:index.php");
	}


   if(isset($_POST['submit'])){//***INSERTING NEW  MEDICEINES******
//$invoice_number = $_GET['invoice_number'];
	//   echo "<h1>....LOADING</h1>";


$customername= $_POST['customername'];
$address= $_POST['address'];  
$phone= $_POST['phone']; 

 $sql="INSERT INTO inv_customer(customername, Address,Phone) 
 VALUES ('$customername','$address','$phone')";

   $result =mysqli_query($con,$sql);

   if($result){

  echo "<script type='text/javascript'>window.top.location='view.php';</script>";

}

}
 

?>
<!-- For more projects: Visit codeastro.com  -->