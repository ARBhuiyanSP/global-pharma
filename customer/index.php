<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
?>

<body>
	<form method="POST" action="register.php?invoice_number=<?php echo $_GET['invoice_number']?>">
		<table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
			
			<tr id="row1">
				<td>Name:</td>
				<td><input type="text" name="customername"  id="customername" size="10" required ></td>
			</tr>
			<tr id="row1">
				<td>Address:</td>
				<td><input type="text" name="address"  id="address" size="10" required ></td>
			</tr>
			<tr id="row1">
				<td>Phone:</td>
				<td><input type="text" name="phone"  id="phone" size="10" required ></td>
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
