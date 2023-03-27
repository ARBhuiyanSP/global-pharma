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
		bottom: 30px;
		width: 100%;
	}
	</style>
</head>
<body>
	<?php include('top_menu.php'); ?>

 
 <div class="container">

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
  </div>
   
   <div class="container">
     <div class="row">
      <div class="contentheader">
        <h2 style="margin:0px;">Medicines - Purchase</h2>
       </div> <hr>
				<?php
				$invoice_number= $_GET['invoice_number'];
					$medicine_name = "";
					$category= "";
					$quantity= "";
      
      
					
					
					$select_sql_master 		= "SELECT * from purchase_details where invoice_number = '$invoice_number' ";
					$select_query_master 	= mysqli_query($con ,$select_sql_master);
					$rowMaster	= mysqli_fetch_array($select_query_master);
					$dates	= isset($rowMaster['date']);
					$supplier	= isset($rowMaster['supplier']);
					$warehouse	= isset($rowMaster['company']);
				?>
			
				<form method="POST" action="insert_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?> " >
					
					<input type="text" name="invoice_number" value="<?php echo $_GET['invoice_number'];?>">
					<input type="date" name="date" id="price_date" value="<?php echo $dates; ?>">
					
					
					
					<select class="form-control" name="company">
						<?php 
							$warehouse_sql = "SELECT * FROM `inv_warehosueinfo`";
							$warehouse_query = mysqli_query($con ,$warehouse_sql);
							while($warehouse_row = mysqli_fetch_array($warehouse_query)):
						?>
						<option value="<?php echo $warehouse_row['name'] ?>" <?php if($warehouse==$warehouse_row["name"]){ echo "selected";}else {echo "";} ?>><?php echo $warehouse_row['name'] ?></option>
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
					<!-- <input type="text" name="bar_code" id="bar_code" autocomplete="off" placeholder="Enter Barcode Number" style="width:300px;height: 30px;"> --->
					
					<input type="text" id="product" required  autocomplete="off" placeholder="Medicine" style="" autofocus>
						<!-- <div class="ui-widget"> -->
					<input type="hidden" name="product" id="product_hidden" required class="form-control" autocomplete="off" placeholder="Medicine" style="">
						<!-- </div> -->
					
					<input type="number" name="avai_qty" id="avai_qty"  placeholder="Available qty" style="">

					<input type="number" name="qty" id="qty"  placeholder="Add Qty" autocomplete="off"  style="" required>
					
					<input type="text" name="buy_price" id="buy_price" class="form-control" autocomplete="off" placeholder="buy price / empty for default price" style="">
					
					
					<Button type="submit"  name="submit" class="btn btn-success" id="btn_submit" style=""><i class="icon icon-plus-sign"></i> Add Item</button>
				</form> 
			</div>
     </div>

  </div>

  
  <div class="container">
    <div class="row pre-scrollable" style="border:1px solid gray;min-height:250px;max-height:300px;">	
		<table class="table table-bordered table-striped table-hover" id="resultTable" data-responsive="table">
				<thead>
					<tr style="background-color: #383838; color: #FFFFFF;" >
						<th> Medicine </th>
						<th> Price </th>
						<th> Qty </th>
						<th> Amount </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
                <?php
					$select_sql = "SELECT * from purchase_details where invoice_number = '$invoice_number' ";
					$select_query = mysqli_query($con ,$select_sql);
      
					$i = 0;
                    
					while($row = mysqli_fetch_array($select_query)):
      
						$i++;
                ?>
      
                <tr class="record">
                     <td><?php
      
      
                       $med_id = $row['id'];
                       $medicine_name=$row['medicine_name'];
                       echo $medicine_name;
                       echo "<input type='hidden' value=$med_id id='med_id$i' name='med_id'>";
                       echo "<input type='hidden' value=$medicine_name id='med_name$i' name='med_name'>"
                      ?></td>
                   <?php $category = $row['category'];
                      ?>
                         <input type="hidden" value='<?php echo $category?>' id='med_cat<?php echo $i?>' name='med_cat'>
                        
                      
                       
      
                     
                     <td><?php echo  $row['cost']; ?></td>
                     <td>
                     <?php
      
                        $quantity =  $row['qty'];
                        $type     =  $row['type'];
                        echo "<input type='hidden' id='hid_quantity$i' value='$quantity' name='hid_quantity'>";
                        echo "<input type='number' id='quantity$i' name='quantity' value='$quantity' min='1' max='10' style='width:50px'>"."&nbsp;(".$type.")&nbsp;&nbsp;&nbsp;&nbsp;";
                         ?>
                     </td>
                     
                     <td><?php echo $row['amount']; ?></td>
						<td><a href="delete_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?>&id=<?php echo $row['id'];?>&name=<?php echo $row['medicine_name']?>&quantity=<?php echo $row['qty'];?>" class="btn btn-danger">Remove</a></td>
      
                  <?php endwhile; ?>  
                </tr>
                <!-- <tr>
              <th colspan="5" ><font size=6><strong> Total:</strong></font></th>
              <td  colspan="2"><strong>
      
                <?php
      
                $select_sql = "SELECT sum(amount) , sum(profit_amount) from purchase_details where invoice_number = '$invoice_number'";
      
                $select_query= mysqli_query($con,$select_sql);
      
                while($row = mysqli_fetch_array($select_query)){
      
                  $grand_total = $row['sum(amount)'];
                  $grand_profit =$row['sum(profit_amount)'];
                  echo '$'.$grand_total;
                }
                ?>
              </td>
            </tr> -->
        </tbody>
      </table>
	  
    </div>
	<div id="bottom-fixed">
		<form method="POST" action="save_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?> " >
			<b>Total: </b> <input type="text" id="total" name="total" value="<?php
      
                $select_sql = "SELECT sum(amount) , sum(profit_amount) from purchase_details where invoice_number = '$invoice_number'";
      
                $select_query= mysqli_query($con,$select_sql);
      
                while($row = mysqli_fetch_array($select_query)){
      
                  $grand_total = $row['sum(amount)'];
                  $grand_profit =$row['sum(profit_amount)'];
                  //echo '৳ '.$grand_total.'/-';
				  echo $grand_total;
                }
                ?>" style="width:40px" readonly >
			<b>Discount:</b> <input type="text" id="discount" name="discount" value="" style="width:80px" onkeyup="calculate_purchase_amount()" >
			<b>SubTotal:</b> <input type="text" id="subtotal" name="subtotal" value="" style="width:80px" readonly >
			<b>Paid:</b> <input type="text" id="paid" name="paid" value="" style="width:40px" onkeyup="calculate_purchase_amount()" required >
			<b>Due:</b> <input type="text" id="due" name="due" value="" style="width:80px" readonly >
      
          <?php
           if($medicine_name && $quantity !=null){
            ?>
			
			<!-- <a id="popup" href="save_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?>" style="width:400px;" class="btn btn-info btn-sm">Save Purchase <i class="icon icon-save"></i></a> -->
			
			<input type="submit" name="submit" class="btn btn-success btn-sm" style="width: 225px" value="Save Purchase">
			
            <!-- <a id="popup" href="save_purchase.php?invoice_number=<?php echo $_GET['invoice_number']?>&medicine_name=<?php echo $medicine_name?>&category=<?php echo $category?>&quantity=<?php echo $quantity?>&total=<?php echo $grand_total?>" style="width:400px;" class="btn btn-info btn-large">Proceed <i class="icon icon-share-alt"></i></a> -->
      
          <?php }else{ } ?>
		  </form>
		</div>
      </div>
 
  </body>
 </html>
 <script>
function calculate_purchase_amount() {
        let total		=   $("#total").val();
        let discount	=   $("#discount").val();
        let subTotal   	=   parseFloat((total - discount));
        let paid     	=   $("#paid").val();
        let due     	=   $("#due").val();
        let dueAmount	=   parseFloat((subTotal - paid));

        document.getElementById('subtotal').value = subTotal.toFixed(2);
        document.getElementById('due').value = dueAmount.toFixed(2);
    }
</script>
<script type="text/javascript">


  $(document).ready(function(){

     /* $("#product").focus(

            function(){

              var bar_code = $("#bar_code").val();

            $.ajax({
              type:'POST',
              url :'bar_code.php',
              dataType:"json",
              data:{bar_code:bar_code},
              success:function(data){

                $("#product").val(data);
              },

            });
    }); */

      //****AUTO COMPLETE*****
    $("#product").typeahead({

               source: function(drug_result, result){

            $.ajax({

          url : 'autocomplete2.php',
          method :'POST',
          data :{drug_result:drug_result},
          dataType:"json",

          success:function(data){

            result($.map(data,function(item){



              return item;

            }));
          },

        });
      },

    });

      //****AUTO COMPLETE*****



     //****Medicine name and Date*****
     $("#product").focusout(function(){
         
               var value = $("#product").val();

               var res= value.split(",");

               var name = res[0];

               var date = res[1];

            $("#product_hidden").val(name);
          $("#date_hidden").val(date);

    });
    //****Medicine name and Date*****

    //*******Qty Update*******
  for(var i=1;i<=100;i++){

  $("a.qty_upd"+i).click(function(){

        for(var i1=1;i1<=100;i1++){

                var med_id=$("#med_id"+i1).val();
                var med_name=$("#med_name"+i1).val();
                var med_cat=$("#med_cat"+i1).val();
                var ex_date=$("#ex_date"+i1).val();
                var hid_qty = $("#hid_quantity"+i1).val();
                var qty=$("#quantity"+i1).val();

                if(qty <= 0){

                  alert("Sorry Error");

                }else{

             $.ajax({
              type:'POST',
               beforeSend:function(){
                 $('.ajax-loader'+i1).css("visibility", "visible");
              },
              url :'quantity_upd.php',
              data:{med_id:med_id,med_name:med_name,med_cat:med_cat,ex_date:ex_date,hid_qty:hid_qty,qty:qty},

              success:function(){

                location.reload();

              },

            });

           }

         }
  });

}
     //*******Qty Update*******

  });
</script>
 