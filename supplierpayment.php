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
	<title>Pharma POS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/jquery.css">
	<link rel="stylesheet" type="text/css" href="src/facebox.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="src/facebox.js"></script>
    <script type="text/javascript">
       jQuery(document).ready(function($) {
		$("a[id*=popup]").facebox({
		  loadingImage : 'src/img/loading.gif',
		  closeImage   : 'src/img/closelabel.png'
		})
	  })
    </script>
	<script type="text/javascript">
	//GET Medicine Name And Expire Date
	$(document).ready(function(){
       $("#qty").focus(
            function(){
              var medicine_name = $("#product_hidden").val();
              var price_date   = $("#date_hidden").val();
            $.ajax({
              type:'POST',
              url :'auto2.php',
              dataType:"json",
              data:{medicine_name:medicine_name,price_date:price_date},
              success:function(data){
                $("#avai_qty").val(data);
              },
            });
    });

	});
    </script>
	<style>
	.pre-scrollable {
    overflow-y: scroll;
	}

	#bottom-fixed {
		position: absolute;
		bottom: 20px;
	}
	body {  background-image: url(https://thumbs.dreamstime.com/b/pharmacy-interior-blurred-background-58416047.jpg); }
	</style>
</head>
<body>
	<?php include('top_menu.php'); ?>

 
 <div class="container" style="background-color:#fff;">

    <div class="row">
      <div class="pull-right">
        <font>Today's Sales:</font>
                  <strong><?php
  
                    include("dbcon.php");
  
                    $date = date("Y-m-d");
  
                  
  
  
  
                  ?></strong>  
        </div>
      <i class="icon-calendar icon-large"></i>
                <?php
                $Today = date('y:m:d',mktime());
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?><br><br>
     

    </div>
 
 
     <div class="row">
      <div class="contentheader">
        <h2 style="margin:0px;">Medicines - Supplier Payment</h2>
       </div> <hr>
				<?php
				
				$SBRefID= $_GET['SBRefID'];
					
      
					
					
					$select_sql_master 		= "SELECT * from inv_supplierbalance where SBRefID = '$SBRefID' ";
					$select_query_master 	= mysqli_query($con ,$select_sql_master);
					$rowMaster	= mysqli_fetch_array($select_query_master);
					$dates		= isset($rowMaster['date']);
					
					if(isset($_GET['SBDate'])){
						$SBDate = $_GET['SBDate'];
					}else{
						$SBDate = $dates;
					}
					
				?>
			
				<form method="POST" action="insert_purchase.php?SBRefID=<?php echo $_GET['SBRefID']?> " >
					
					<input type="text" name="SBRefID" value="<?php echo $_GET['SBRefID'];?>">
					<input type="date" name="SBDate" id="SBDate" value="<?php echo $SBDate; ?>">
					
					
					
					<select class="form-control" name="company">
						<?php 
							$company	= $rowMaster['company'];
							$warehouse_sql = "SELECT * FROM `inv_warehosueinfo`";
							$warehouse_query = mysqli_query($con ,$warehouse_sql);
							while($warehouse_row = mysqli_fetch_array($warehouse_query)):
						?>
						<option value="<?php echo $warehouse_row['name'] ?>" <?php if($company==$warehouse_row["name"]){ echo "selected";}else {echo "";} ?>><?php echo $warehouse_row['name'] ?></option>
						<?php endwhile; ?>
					</select>
					
					
					
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
					</br>
					
			

					<input type="number" name="qty" id="qty"  placeholder="Add Qty" autocomplete="off"  style="" required>
					
			
					
				
				</form> 
			</div>
			

	
	
	 <div class="row" id="bottom-fixed" style="width:75%;background-color:#fff;">
	<form method="POST" action="save_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?> " >
	
			
         
			
			<input type="submit" name="submit" class="btn btn-success btn-sm" style="width: 225px" value="Save Purchase">
			
            
      
		  </form>
		</div>
      </div>
 
  </body>
 </html>
 

 