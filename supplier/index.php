<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
?>

<body>
	<form method="POST" action="register.php">
		<table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
			
			
			<tr id="row1">
				<td>Supplier ID:</td>
				<td><input type="text" name="SupplierID"  id="SupplierID" size="10" required ></td>
			</tr>
			
			<tr id="row1">
				<td>Name:</td>
				<td><input type="text" name="SupplierCompany"  id="SupplierCompany" size="10" required ></td>
			</tr>
			<tr id="row1">
				<td>Address:</td>
				<td><input type="text" name="SupplierAddress1"  id="SupplierAddress1" size="10" required ></td>
			</tr>
			<tr id="row1">
				<td>Phone:</td>
				<td><input type="text" name="SupplierPhone1"  id="SupplierPhone1" size="10" required ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Save"> </td>
			</tr>
  	  	</table> 
        <br>
  	</form><br>
</body>
</html>
<!-- For more projects: Visit codeastro.com  -->
