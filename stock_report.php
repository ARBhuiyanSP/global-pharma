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
		<title>Global Pharma</title>
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
				<h2>Stock Report</h2>
			</div><br>
			<center>
				<form action="stock_report.php" method="POST">
					<strong>
						Supplier : 
						<select class="form-control select2" name="supplier">
							<?php 
								$supplier	= $_POST['supplier'];
								$supplier_sql = "SELECT * FROM `inv_supplier`";
								$supplier_query = mysqli_query($con ,$supplier_sql);
								while($supplier_row = mysqli_fetch_array($supplier_query)):
							?>
							<option value="<?php echo $supplier_row['SupplierCompany'] ?>" <?php if($supplier==$supplier_row["SupplierCompany"]){ echo "selected";}else {echo "";} ?>><?php echo $supplier_row['SupplierCompany'] ?></option>
							<?php endwhile; ?>
						</select>
						<button class="btn btn-info btn-small" style="width: 90px; height:30px; margin-top:-10px;margin-left:8px;" type="submit" name="submit"><i class="icon icon-search icon-small"></i> Search</button>
					</strong>
				</form>
			</center>
			<center>
			<!-- For more projects: Visit codeastro.com  -->
			</center>
			<?php 
			error_reporting(1);
							if(isset($_POST['submit'])){
								$supplier=$_POST['supplier'];
			?>
            <div style="overflow-x:auto; overflow-y: auto;">
				<center><b><?php echo $supplier; ?></b></center></br>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr style="background-color: #383838; color: #FFFFFF;" >
							<th>Medicine Name</th>
							<th>Stock Qty</th>
							<th>Total Amount [Buy]</th>
							<th>Total Amount [Sale]</th>
							<th>Estimated Profit</th>
							<!--  <th>Action</th>-->
						</tr>
					</thead>
					<tbody>
					
						<?php
							
								$select_sql = "SELECT * FROM product WHERE supplier = '$supplier' order by supplier asc";
								$select_query = mysqli_query($con,$select_sql);
								while($row = mysqli_fetch_array($select_query)) :
								
								$pcs_per_pack  	= $row['pcs_per_pack'];
								$unit_buy_price	= $row['unit_buy_price'];
								$qty			= $row['act_remain_quantity'];
								$perPicsBuy     = $unit_buy_price / $pcs_per_pack;
								$totalBuyAmount = $qty*$perPicsBuy;
								
								$perPicsSale			= $row['sale_per_pcs'];
								$totalSaleAmount = $qty*$perPicsSale;
								
								$profit			= $totalSaleAmount - $totalBuyAmount;
						?>
						<tr>
							<td><?php echo $row['medicine_name']?></td>
							<td><?php echo $row['act_remain_quantity']?></td>
							<td><?php echo $totalBuyAmount;?></td>
							<td><?php echo $totalSaleAmount;?></td>
							<td><?php echo $profit;?></td>
						</tr>
							<?php endwhile; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
<!-- For more projects: Visit codeastro.com  -->

