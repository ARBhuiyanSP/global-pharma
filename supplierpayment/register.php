<!-- For more projects: Visit codeastro.com  -->
<?php

   include("../dbcon.php");


	session_start();

	if(!isset($_SESSION['user_session'])){

	    header("location:index.php");
	}


   if(isset($_POST['submit'])){
	
$SBRefID= $_POST['SBRefID'];
$SBDate= $_POST['SBDate'];  
$SBSupplierID= $_POST['SBSupplierID']; 
$SBDrAmount= $_POST['SBDrAmount']; 
$SBCrAmount= 0; 
$SBRemark= $_POST['SBRemark'];
$Type= $_POST['Type'];	

 $sql="INSERT INTO inv_supplierbalance(SBRefID,SBDate,SBSupplierID, SBDrAmount,SBCrAmount,SBRemark,Type) 
 VALUES ('$SBRefID','$SBDate','$SBSupplierID','$SBDrAmount','$SBCrAmount','$SBRemark','$Type')";

   $result =mysqli_query($con,$sql);

   if($result){

   echo "<script type='text/javascript'>window.top.location='view.php';</script>";

}

}
 

?>
<!-- For more projects: Visit codeastro.com  -->