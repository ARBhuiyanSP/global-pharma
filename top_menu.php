<?php
$invoice_number = getDefaultCategoryCode('inv_issue', 'IssueID', '03d', '001', 'INV-');
$purchase_number = getDefaultCategoryCode('inv_receive', 'MRRNo', '03d', '001', 'PO-');
$dates= date('Y-m-d');

function getDefaultCategoryCode($table, $fieldName, $modifier, $defaultCode, $prefix){
    global $con;
    $sql    = "SELECT count($fieldName) as total_row FROM $table";
    $result = $con->query($sql);
    $name   =   '';
    $lastRows   = $result->fetch_object();
    $number     = intval($lastRows->total_row) + 1;
    $defaultCode = $prefix.sprintf('%'.$modifier, $number);
    return $defaultCode;
    
}
 ?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class=" navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#"><b>Pharma POS</b></a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li>
						<?php 
							include("dbcon.php"); 
							$quantity = "10";
							$select_sql1 = "SELECT * FROM `stock` where `remain_quantity` <= '$quantity' and status='Available'";
							$result1 = mysqli_query($con,$select_sql1);
							$row2 = $result1->num_rows;
							if($row2 == 0)
								{
									echo ' <a  href="#" class="notification label-inverse" > <span class="icon-exclamation-sign icon-large"></span></a>';
								}
							else
								{
									echo ' <a  href="qty_alert.php" class="notification label-inverse" id="popup"> <span class="icon-exclamation-sign icon-large"></span> <span class="badge">'.$row2.'</span></a>';
								}
						?> 
					</li>
					<li>
						<?php
							$date = date('d-m-Y');    
							$inc_date = date("Y-m-d", strtotime("+6 month", strtotime($date))); 
							$select_sql = "SELECT  * FROM stock WHERE expire_date <= '$inc_date' and status='Available' ";
							$result =  mysqli_query($con,$select_sql); 
							$row1 = $result->num_rows;
							if($row1 == 0)
								{
									echo ' <a  href="#" class="notification label-inverse" > <span class="icon-bell icon-large"></span></a>';
								}
							else
								{
									echo ' <a  href="ex_alert.php" class="notification label-inverse" id="popup"> <span class="icon-bell icon-large"></span> <span class="badge">'.$row1.'</span></a>';
								}
						?>
					</li>
					<li><a href="product/view.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-qrcode"></span> Products</a></li>
					<li><a href="purchase.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-tasks"></span> Purchase</a></li>
					
					<li><a href="home.php?invoice_number=<?php echo $invoice_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-shopping-cart"></span> Sales</a></li>
					
					<li><a href="salesreturn.php?invoice_number=<?php echo $invoice_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-shopping-cart"></span> Sales Return</a></li>
					
					<li><a href="purchasereturn.php?invoice_number=<?php echo $invoice_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-shopping-cart"></span> purchase Return</a></li>
					
					
					<li><a href="supplierpayment.php"><span class="icon-shopping-cart"></span> Supplier Payment</a></li>
					
					<li><a href="purchasereturn.php?invoice_number=<?php echo $invoice_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-shopping-cart"></span> Party Payment</a></li>
					
					
					<li><a href="sales_report.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>"><span class="icon-bar-chart"></span> Report</a></li>

					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="company/view.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>">Category</a></li>
                          <li><a href="supplier/view.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>">Suppliers</a></li>
						  
						   <li><a href="customer/view.php?invoice_number=<?php echo $purchase_number;?>&inv_date=<?php echo $dates; ?>">Customer</a></li>
						   
                        </ul>
                    </li>					
					
					<!--<li><a href="backup.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-folder-open"></span> Backup</a></li> --->
					<li><a href="logout.php" class="link"><font color='red'><span class="icon-off"></span></font> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>