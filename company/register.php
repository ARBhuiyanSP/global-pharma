<!-- For more projects: Visit codeastro.com  -->
<?php

   include("../dbcon.php");


	session_start();

	if(!isset($_SESSION['user_session'])){

	    header("location:index.php");
	}


   if(isset($_POST['submit'])){//***INSERTING NEW  MEDICEINES******
$invoice_number = $_GET['invoice_number'];
	   echo "<h1>....LOADING</h1>";
$name= $_POST['name']; 

 $sql="INSERT INTO category(name) 
 VALUES ('$name')";

   $result =mysqli_query($con,$sql);

   if($result){

   echo "<script type='text/javascript'>window.top.location='view.php?invoice_number=$invoice_number';</script>";

}

}
 

?>
<!-- For more projects: Visit codeastro.com  -->