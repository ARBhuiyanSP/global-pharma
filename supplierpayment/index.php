<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
?>

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
	<form method="POST" action="register.php" >
				
				<input type="text" name="SBRefID" value="<?php echo $SBRefID;?>">
				<input type="date" name="date" id="SBDate" value="<?php echo $SBDate;?>" required >
				
				
					
					<select class="form-control" name="SBSupplierID">
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
					<select style="" name="Type" > 
						<option value="BOX">Cash</option>
						<option value="CARTON">BKash</option>
						<option value="SET">NAGOD1</option>
						
						
					</select>
				</td>
			</tr>
			
			
			
			
                            <div class="form-group">
                                <label>Remarks</label>
								<textarea rows="3" name="SBRemark" id="remarks" class="form-control"> </textarea>
                            </div>
                     
						
						
						
			
			<input type="number" name="SBDrAmount" id="SBDrAmount"  placeholder="Amount Paid" autocomplete="off"  style="" required>
				
				</br>
			
				
			
				
				
				
			</form>
			<br>
</body>
</html>
<!-- For more projects: Visit codeastro.com  -->
