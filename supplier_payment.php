<?php
include("dbcon.php");
session_start();
if(!isset($_SESSION['user_session'])){  //User_session
  header("location:index.php");
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>SPMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="src/facebox.css">
		<link rel="stylesheet" type="text/css" href="css/tcal.css">
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/facebox.js"></script>
		<script type="text/javascript">
		  jQuery(document).ready(function($) {
		$("a[id*=popup]").facebox({
		  loadingImage : 'src/img/loading.gif',
		  closeImage   : 'src/img/closelabel.png'
		})
	  }) 
		</script>
		<script type="text/javascript" src="js/tcal.js"></script>
		<script type="text/javascript">
		  function Clickheretoprint()
			{ 
			  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
				  disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
			  var content_vlue = document.getElementById("content").innerHTML;   
			  var docprint=window.open("","",disp_setting); 
			   docprint.document.open(); 
			   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
			   docprint.document.write(content_vlue); 
			   docprint.document.close(); 
			   docprint.focus(); 
			}
		</script>

		<style>
			body {  background-image: url(https://thumbs.dreamstime.com/b/pharmacy-interior-blurred-background-58416047.jpg); } 
		</style>
     
</head>
<body>
	<?php include('top_menu.php'); ?>
		<div class="container" style="background-color:#fff;">
			<div class="row">
				<div class="contentheader">
					<h2>Supplier Payment</h2>
				</div>
			<center> 
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
				</form>
			</center>
			<center>
				<div class="alert alert-info" role="alert">
					<small><b>Info:</b> All the downloaded invoices are stored inside the directory " <b>C:/invoices/</b> "</small>
				</div>
				<!-- For more projects: Visit codeastro.com  -->
			</center>
		</div>
	</div>
 </body>
</html>
<!-- For more projects: Visit codeastro.com  -->

