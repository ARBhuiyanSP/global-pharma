<!-- For more projects: Visit codeastro.com  -->
<?php

   include("../dbcon.php");


	session_start();

	if(!isset($_SESSION['user_session'])){

	    header("location:index.php");
	}


   if(isset($_POST['submit'])){
	
$SupplierID= $_POST['SupplierID'];
$SupplierCompany= $_POST['SupplierCompany'];  
$SupplierAddress1= $_POST['SupplierAddress1']; 
$SupplierPhone1= $_POST['SupplierPhone1']; ;

 $sql="INSERT INTO inv_supplier(SupplierID,SupplierCompany,SupplierAddress1, SupplierPhone1) 
 VALUES ('$SupplierID','$SupplierCompany','$SupplierAddress1','$SupplierPhone1')";

   $result =mysqli_query($con,$sql);

   if($result){

   echo "<script type='text/javascript'>window.top.location='view.php';</script>";

}

}
 

?>
<!-- For more projects: Visit codeastro.com  -->