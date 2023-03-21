<?php
include("dbcon.php");
session_start();
if(!isset($_SESSION['user_session']))
	{
		header("location:index.php");
	}
@$drug_result=mysqli_real_escape_string($con,$_POST['drug_result']);
$query="SELECT * from `product` WHERE `medicine_name` LIKE'%".$drug_result."%' AND `active_prod`= 'YES'";
$result =mysqli_query($con,$query);
$data= array();
while($row = mysqli_fetch_array($result))
	{
		$data [] = $row["medicine_name"].",".$row['price_date'].",(".$row['pack_size'].")";
	}
    echo json_encode($data);

?>