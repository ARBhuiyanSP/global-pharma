<!-- For more projects: Visit codeastro.com  -->
<?php
	session_start();
	include("../dbcon.php");
	if(!isset($_SESSION['user_session']))
	{
		header("location:../index.php");
	}
	//****SELECTINg FROM stock******
	$id = $_GET['id'];
	$invoice_number = $_GET['invoice_number'];
	$select_sql = "SELECT * FROM product where id = '$id' ";
	$select_query = mysqli_query($con,$select_sql);
	while($row = mysqli_fetch_array($select_query)):
?>
<body>  
    <form method="POST" action="update.php?invoice_number=<?php echo $invoice_number?>">
		<table id="table" style="width: 400px; margin: auto;">
			<input type="hidden" name="id" value="<?php echo $row['id']?>">
			<tr>
				<td>Bar Code:</td>
				<td><input type="text" name="bar_code" id="bar_code" size="10" placeholder="Set a bar code" value="<?php echo $row['bar_code']?>"></td>
			</tr>
			
			<tr>
				<td>Category:</td>
				<td>
					<select id="category" name="category" required > 
						<option value="">Select Category</option>
						<?php 
						$category	=	$row['item_category'];
						$sqls = "SELECT * FROM `category`";
						$results =  mysqli_query($con,$sqls);
							while( $rows =  mysqli_fetch_array($results)) : 
						?>
						<option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
							<?php endwhile ?>
					</select>
				</td>
			</tr>
			<tr id="row">
				<td>Medicine Name:</td>
				<td><input type="text" name="med_name"  id="med_name" size="10" value="<?php echo $row['medicine_name']?>" required ></td>
			</tr> 
			<tr id="row1">
				<td>Generic Name:</td>
				<td><input type="text" name="gen_name"  id="gen_name" size="" value="<?php echo $row['generic_name']?>" required ></td>
			</tr>
			<tr>
				<td>Compnay Name:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select id="company" name="company" required > 
						<option value="">Select Company/Brand</option>
						<?php 
						$supplier	= $row['supplier'];
						$sql2 = "SELECT * FROM `inv_supplier`";
						$result2 =  mysqli_query($con,$sql2);
							while( $row2 =  mysqli_fetch_array($result2)) : 
						?>
						<option value="<?php echo $row2['SupplierCompany']; ?>" <?php if($supplier==$row2["SupplierCompany"]){ echo "selected";}else {echo "";} ?>><?php echo $row2['SupplierCompany']; ?></option>
							<?php endwhile ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Packing Mode:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<?php $pack_size	= $row['pack_size']; ?>
					<select style="" name="packing_mode" > 
						<option value="PCS" <?php if($pack_size=='PCS'){ echo "selected";}else {echo "";} ?>>PCS</option>
						<option value="BOX" <?php if($pack_size=='BOX'){ echo "selected";}else {echo "";} ?>>BOX</option>
						<option value="CARTON"<?php if($pack_size=='CARTON'){ echo "selected";}else {echo "";} ?>>CARTON</option>
						<option value="SET"<?php if($pack_size=='SET'){ echo "selected";}else {echo "";} ?>>SET</option>
						<option value="NOS"<?php if($pack_size=='NOS'){ echo "selected";}else {echo "";} ?>>NOS</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Pcs Per Box/Carton</td>
				<td><input type="text"  name="pcs_per_unit" id="pcs_per_unit" value="<?php echo $row['pcs_per_pack']?>" onkeyup="calculate_sell()" required ></td>
			</tr>
			<tr>
                <td>Buy Rate(CTN):</td>
				<td><input type="number" name="actual_price" id="actual_price" value="<?php echo $row['unit_buy_price'] ?>" onkeyup="calculate_sell()"></td>
			</tr>
			<tr>
                <td>Sale Rate(CTN):</td>
				<td><input type="number" name="selling_price" id="selling_price" value="<?php echo $row['unit_sale_price'] ?>" onkeyup="calculate_sell()"></td>
			</tr>
			<tr><!-- For more projects: Visit codeastro.com  -->
                <td>Sale Rate per Piece:</td>
				<td><input type="text" name="sell_per_pcs" id="sell_per_pcs" value="<?php echo $row['sale_per_pcs'] ?>"></td>
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
			<?php endwhile; ?>
			<tr>
			  <td></td>
			  <td> <input type="submit" name="update" class="btn btn-success btn-md" style="width: 225px" value="Save Changes"> </td>
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
</html>

