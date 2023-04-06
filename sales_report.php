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
				<h2>Date Wise Sales Report</h2>
			</div><br>
			<center>
				<form action="sales_report.php" method="POST">
					<strong>
					
                               
                                    From Date: 
                                    <input type="text" class="form-control" id="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" name="from_date" autocomplete="off" required >
                                
                            
							
                               
                                    To Date: 
                                    <input type="text" class="form-control" id="to_date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" autocomplete="off" required >
                                
                            
							
					
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
								$from_date=$_POST['from_date'];
								$to_date=$_POST['to_date'];
			?>
            <div style="overflow-x:auto; overflow-y: auto;">
				<center><b>From<?php echo $from_date; ?> To <?php echo $to_date; ?> </b></center></br>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr style="background-color: #383838; color: #FFFFFF;" >
							<th>Invoice No</th>
							<th>Inv Date</th>
							<th>Sale Amount</th>
							<th>Discount</th>
							 <th>Net Sale</th>   
							<th>Paid</th>
							<th>Due</th>
							<th>Profit</th>
							<!--  <th>Action</th>-->
						</tr>
					</thead>
					<tbody>
					
						<?php
							
	$select_sql = "SELECT * FROM inv_issue WHERE IssueDate between '$from_date' AND '$to_date'";
								$select_query = mysqli_query($con,$select_sql);
								while($row = mysqli_fetch_array($select_query)) :
						?>
						<tr>
							<td><?php echo $row['IssueID']?></td>
							<td><?php echo $row['IssueDate']?></td>
							
							<td><?php echo $row['TotalPrice']?></td>
							<td><?php echo $row['DiscountAmt']?></td>
							
							<td><?php echo $row['TotalPrice']-$row['DiscountAmt']?></td>
							
							<td><?php echo $row['PaidAmt']?></td>
							<td><?php echo $row['Due']?></td>
							<td><?php echo $row['GrandAmt']?></td>
							
						</tr>
							<?php endwhile; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
<script>
    $(function () {
        $("#from_date").datepicker({
            inline: true,
            dateFormat: "yy-mm-dd",
            yearRange: "-50:+10",
            changeYear: true,
            changeMonth: true
        });
    });
</script>
<!-- For more projects: Visit codeastro.com  -->

