<?php
	include("dbcon.php");
	session_start();

	if(!isset($_SESSION['user_session'])){
		header("location:index.php");
	}
	@$bar_code=mysqli_real_escape_string($con,$_POST['bar_code']);
	$query="SELECT * FROM product WHERE bar_code = '$bar_code' AND active_prod= 'YES'";
	$result =mysqli_query($con,$query);
	$data= array();
	
	while($row = mysqli_fetch_array($result))
		{
			$data [] = $row["medicine_name"].",".$row['price_date'].",(".$row['pack_size'].")";
		}
		
    echo json_encode($data);

?>