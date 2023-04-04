<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
	include("../dbcon.php");
?>
<style>
body {  background-image: url(https://thumbs.dreamstime.com/b/pharmacy-interior-blurred-background-58416047.jpg); }
</style>
<body>
	<form method="POST" action="register.php?invoice_number=<?php echo $_GET['invoice_number']?>">
		<table id="table" style="width: 600px; margin: auto;overflow-x:auto; overflow-y: auto;">
			
			<tr>
				<td>Bar Code:</td>
				<td><input type="text" name="bar_code" id="bar_code" size="10" placeholder="Set a bar code"></td>
			</tr>
			<tr>
				<td>Category:</td>
				<td>
					<select id="category" name="category" required > 
						<option value="">Select Category</option>
						<?php 
						$sql = "SELECT * FROM `category`";
						$result =  mysqli_query($con,$sql);
							while( $row =  mysqli_fetch_array($result)) : 
						?>
						<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
							<?php endwhile ?>
					</select>
				</td>
			</tr>
			<tr id="row1">
				<td>Medicine Name:</td>
				<td><input type="text" name="med_name"  id="med_name" size="" required ></td>
			</tr>
			<tr id="row1">
				<td>Generic Name:</td>
				<td><input type="text" name="gen_name"  id="gen_name" size="" required ></td>
			</tr>
			<tr>
				<td>Compnay Name:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select id="company" name="company" required > 
						<option value="">Select Company/Brand</option>
						<?php 
						$sql = "SELECT * FROM `inv_supplier`";
						$result =  mysqli_query($con,$sql);
							while( $row =  mysqli_fetch_array($result)) : 
						?>
						<option value="<?php echo $row['SupplierCompany']; ?>"><?php echo $row['SupplierCompany']; ?></option>
							<?php endwhile ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Packing Mode:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select style="" name="packing_mode" > 
						<option value="PCS">PCS</option>
						<option value="BOX">BOX</option>
						<option value="CARTON">CARTON</option>
						<option value="SET">SET</option>
						<option value="NOS">NOS</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Pcs Per Box/Carton</td>
				<td><input type="text"  name="pcs_per_unit" id="pcs_per_unit" onkeyup="calculate_sell()" required></td>
			</tr> 
			
			<tr>
                <td>Buy Rate(CTN):</td>
				<td><input type="number" name="actual_price" id="actual_price" onkeyup="calculate_sell()"></td>
			</tr>
			<tr>
                <td>Sale Rate(CTN):</td>
				<td><input type="number" name="selling_price" id="selling_price" onkeyup="calculate_sell()"></td>
			</tr>
			<tr><!-- For more projects: Visit codeastro.com  -->
                <td>Sale Rate per Piece:</td>
				<td><input type="text" name="sell_per_pcs" id="sell_per_pcs"></td>
			</tr>
			
			<tr>
				<td>Price Date:</td>
				<td><input type="date"  name="price_date" id="price_date" required>  </td>
			</tr>
			
			<tr>
				<td>Acive Status:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select name="active_status" > 
						<option value="YES">YES</option>
						<option value="NO">NO</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Save"> </td>
			</tr>
  	  	</table> 
        <br>
  	</form><br>
</body>

<script type="text/javascript">
	function calculate_sell() {
        let pcs_per_unit	=   $("#pcs_per_unit").val();
        let selling_price	=   $("#selling_price").val();
        let sellPerPcs   	=   parseFloat((selling_price / pcs_per_unit));

        document.getElementById('sell_per_pcs').value = sellPerPcs.toFixed(2);
        
    }
</script>
<script type="text/javascript">

  	
  </script>
</html>
<!-- For more projects: Visit codeastro.com  -->
