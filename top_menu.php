
<style>
.dropdown{
	display:none;
	position: absolute;
	list-list-style:none;
}
ul {
  list-style: none;
  margin: 0;
  padding-left: 0;
}

li {
  color: #fff;
  display: block;
  float: left;
  position: relative;
  text-decoration: none;
  transition-duration: 0.5s;
}
  
li a {
  color: #fff;
}

li:hover {
  background: red;
  cursor: pointer;
}

ul li ul {
  background: #7E7E7E;
  visibility: hidden;
  opacity: 0;
  min-width: 5rem;
  position: absolute;
  transition: all 0.5s ease;
  left: 0;
  display: none;
}

ul li:hover > ul,
ul li ul:hover {
  visibility: visible;
  opacity: 1;
  display: block;
}

ul li ul li {
  clear: both;
  width: 100%;
}
</style>
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
					<li><a href="product/view.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-qrcode"></span> Products</a></li>
					
					<li><a href="supplier/view.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-group"></span> Suppliers</a></li>
					
					<li><a href="company/view.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-th"></span> Category</a></li>
					
					<li><a href="purchase.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-tasks"></span> Purchase</a></li>
					
					<li><a href="home.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-shopping-cart"></span> Sales</a></li>
					
					<li><a href="sales_report.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-bar-chart"></span> Report</a></li> 
					
					<li><a href="#">Settings</a>
					  <ul class="dropdown">
						<li><a href="#">Sub-1</a></li>
						<li><a href="#">Sub-2</a></li>
						<li><a href="#">Sub-3</a></li>
					  </ul>
					</li>
					
					<!--<li><a href="backup.php?invoice_number=<?php echo $_GET['invoice_number']?>"><span class="icon-folder-open"></span> Backup</a></li> --->
					<li><a href="logout.php" class="link"><font color='red'><span class="icon-off"></span></font> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>