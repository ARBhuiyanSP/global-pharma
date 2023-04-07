<!-- For more projects: Visit codeastro.com  -->
<?php
	session_start();
    include("dbcon.php");
	if(!isset($_SESSION['user_session'])){
		header("location:index.php");
	}
	$invoice_number = $_GET['invoice_number'];
	$newInvoice_number = getCode('inv_issue', 'IssueID', '03d', '001', 'INV-');
	$newDates= date('Y-m-d');

	function getCode($table, $fieldName, $modifier, $defaultCode, $prefix){
		global $con;
		$sql    = "SELECT count($fieldName) as total_row FROM $table";
		$result = $con->query($sql);
		$name   =   '';
		$lastRows   = $result->fetch_object();
		$number     = intval($lastRows->total_row) + 2;
		$defaultCode = $prefix.sprintf('%'.$modifier, $number);
		return $defaultCode;
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/tcal.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
	</head>
	<body>
		<div class="container">
			<div id="content">
				<?php 
					$sql = "SELECT * FROM inv_issue where IssueID = '$invoice_number'";
					$query =mysqli_query($con,$sql);
					$details =mysqli_fetch_array($query);
				?>
				<center><div style="font:bold 25px 'Arial';">Global Pharma</div><br></center><br><br>
				<h3>Invoice Number:<?php echo $invoice_number?><span style="float:right;">Date:<?php echo $details['IssueDate'];?></span></h3>
				<table class="table table-bordered table-hover" border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;" width="100%">
					<thead>
						<tr>
							<th> Medicine </th>
							<th> Quantity </th>
							<th> Price </th>
							<th> Amount </th>
						</tr>
					</thead>
					<tbody><!-- For more projects: Visit codeastro.com  -->
					<?php
						$select_sql = "SELECT * FROM inv_issuedetail where IssueID = '$invoice_number'";
						$select_query =mysqli_query($con,$select_sql);
						$IssuePrice = 0;
						$TotalIssue = 0;
						while($row =mysqli_fetch_array($select_query)):
							$IssuePrice += $row['IssuePrice'];
							$TotalIssue += $row['TotalIssue'];
					?>
						<tr class="record">
							<td><h4><?php echo $row['MaterialID'];?></h4></td>
							<td><h5><?php echo $row['IssueQty']; ?></h5></td>
							<td><h5><?php echo $row['IssuePrice']; ?></h5></td>
							<td><h5><?php echo $row['TotalIssue']; ?></h5></td>
						</tr>
					<?php endwhile;?>
					<!-- For more projects: Visit codeastro.com  -->
						<tr>
						  <td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
						  <td colspan=""><strong style="font-size: 12px;"><?php echo $TotalIssue;?></strong></td>
						</tr>
						<tr>
							<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Discount: &nbsp;</strong></td>
							<td colspan=""><strong style="font-size: 12px;"></strong></td>
						</tr>
					</tbody>
				</table><br/>
			</div>
			<a href="home.php?invoice_number=<?php echo $newInvoice_number; ?>&inv_date=<?php echo $newDates;?>"><button class="btn btn-success btn-md"><i class="icon-arrow-left"></i> Back to Sales</button></a>
			<a href="javascript:Clickheretoprint()" class="btn btn-danger btn-md" style=""><i class="icon icon-print"></i> Print</a>
	</body>
</html><!-- For more projects: Visit codeastro.com  -->