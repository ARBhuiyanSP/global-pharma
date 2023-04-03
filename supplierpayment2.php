<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
?>

<body>
				<form method="POST" action="insert_invoice2.php?invoice_number=<?php echo $invoice_number;?> " >
				
				<input type="text" name="invoice_number" value="<?php echo $invoice_number;?>">
				<input type="date" name="date" id="price_date" value="<?php echo $inv_date;?>" required >
				
				
					
					<select class="form-control" name="supplier">
						<?php 
							$supplier	= $rowMaster['supplier'];
							$supplier_sql = "SELECT * FROM `inv_supplier`";
							$supplier_query = mysqli_query($con ,$supplier_sql);
							while($supplier_row = mysqli_fetch_array($supplier_query)):
						?>
						<option value="<?php echo $supplier_row['SupplierCompany'] ?>" <?php if($supplier==$supplier_row["SupplierCompany"]){ echo "selected";}else {echo "";} ?>><?php echo $supplier_row['SupplierCompany'] ?></option>
						<?php endwhile; ?>
					</select>
					
					
						<tr>
				<td>Payment Type:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select style="" name="packing_mode" > 
						<option value="BOX">Cash</option>
						<option value="CARTON">BKash</option>
						<option value="SET">NAGOD</option>
						
						
					</select>
				</td>
			</tr>
			
			
			
			
                            <div class="form-group">
                                <label>Remarks</label>
								<textarea rows="3" name="remarks" id="remarks" class="form-control"> </textarea>
                            </div>
                     
						
						
						
			
			<input type="number" name="amount" id="amount"  placeholder="Amount Paid" autocomplete="off"  style="" required>
				
				</br>
			
				
			
				
				
				
			</form><br>
</body>
</html>
<!-- For more projects: Visit codeastro.com  -->
