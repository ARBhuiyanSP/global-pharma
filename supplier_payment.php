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
	//GET Medicine Name And Expire Date

         //Disabled Button If Quantity Not Available

	/* $("#qty").blur(function()
		{
			var avai_qty = $("#avai_qty").val();
			var in_qty = parseInt($("#qty").val());
			var avai_qty_int = parseInt($("#avai_qty").val());
			if(avai_qty == "" ||  in_qty > avai_qty_int || in_qty <= 0)
				{
					$("#btn_submit").attr('disabled','disabled');
					alert("Something went wrong!!");
				}
			else
				{
					$("#btn_submit").removeAttr('disabled');
				}

		}); */
    //Disabled Button If Quantity Not Available
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
  
                    $select_sql = "SELECT sum(total_amount) from sales where Date = '$date'";
  
                    $select_query = mysqli_query($con,$select_sql);
  
                    while($row = mysqli_fetch_array($select_query)){
  
                               echo '$'.$row['sum(total_amount)'];
  
  
                    }
  
  
  
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
        <h2 style="margin:0px;">Supplier - Payment</h2>
       </div> <hr>
				<?php
					$invoice_number= $_GET['invoice_number'];
					
					
					$select_sql_master 		= "SELECT * FROM `inv_supplierpayment` WHERE `voucherid` = '$invoice_number' ";
					$select_query_master 	= mysqli_query($con ,$select_sql_master);
					$rowMaster	= mysqli_fetch_array($select_query_master);
					$dates		= isset($rowMaster['voucherdate']);
					$amount		= isset($rowMaster['amount']);
					$remarks		= isset($rowMaster['remarks']);
					$voucherid		= isset($rowMaster['voucherid']);
					
					if(isset($_GET['inv_date'])){
						$inv_date = $_GET['inv_date'];
					}else{
						$inv_date = $dates;
					}
					
					$supplier	= isset($rowMaster['supplierid']);
					//$warehouse	= isset($rowMaster['company']);
				?>
				<center>
				<a href="supplier_payment.php?invoice_number=<?php echo $voucher_number;?>&inv_date=<?php echo $date; ?>"><button>New Payment</button></a></br>
				<form action="insert_vid.php" method="POST">
					<input type="text" name="invoice_number" value="" style="width:15%"><br>
					<input type="submit" name="editvid"  value="SEARCH"/>
				</form>
				
				<form method="POST" action="save_s_payment.php?invoice_number=<?php echo $_GET['invoice_number']?> " >
					<input type="text" name="invoice_number" value="<?php echo $_GET['invoice_number'];?>" style="width:15%">
					<input type="date" name="date" id="price_date" value="<?php if(isset($rowMaster['voucherdate'])){echo $rowMaster['voucherdate'];}else{echo $inv_date;}?>" style="width:15%">
					<select class="form-control" name="supplier" style="width:20%">
						<option value="">Select Supplier</option>
						<?php 
							$supplier	= $rowMaster['supplierid'];
							$supplier_sql = "SELECT * FROM `inv_supplier`";
							$supplier_query = mysqli_query($con ,$supplier_sql);
							while($supplier_row = mysqli_fetch_array($supplier_query)):
						?>
						<option value="<?php echo $supplier_row['SupplierID'] ?>" <?php if($supplier==$supplier_row["SupplierID"]){ echo "selected";}else {echo "";} ?>><?php echo $supplier_row['SupplierCompany'] ?></option>
						<?php endwhile; ?>
					</select>
					<select class="form-control" name="paymenttype" style="width:15%">
						<?php $paymenttype	= $rowMaster['paymenttype']; ?>
						<option value="">Payment Type</option>
						<option value="Cash"<?php if($paymenttype=='Cash'){ echo "selected";}else {echo "";} ?>>Cash</option>
						<option value="BKash"<?php if($paymenttype=='BKash'){ echo "selected";}else {echo "";} ?>>BKash</option>
						<option value="NAGOD"<?php if($paymenttype=='NAGOD'){ echo "selected";}else {echo "";} ?>>NAGOD</option>
					</select>
					<input type="text" name="amount" required  autocomplete="off" placeholder="Amount" style="width:15%" value="<?php if(isset($rowMaster['amount'])){echo $rowMaster['amount'];}?>">
					</br>
					<textarea name="remarks" style="width:84%" required><?php if(isset($rowMaster['remarks'])){echo $rowMaster['remarks'];}?></textarea>
						
					</br>
					
					<Button type="submit"  name="<?php if(isset($rowMaster['voucherid'])){echo 'updateSubmit';}else{echo 'submit';}?>" class="btn btn-success btn-block" id="btn_submit" style="width:84%"><i class="icon icon-plus-sign"></i> <?php if(isset($rowMaster['voucherid'])){echo 'UPDATE PAYMENT';}else{echo 'SAVE PAYMENT';}?></button></center>
				</form> 
			</div>
      </div>
 
  </body>
 </html>
 
 