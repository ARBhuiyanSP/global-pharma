<!-- For more projects: Visit codeastro.com  -->
<?php
 
    session_start();

    if(!isset($_SESSION['user_session'])){

        header("location:../index.php");
    }
?>

<body>
	<form method="POST" action="register.php?invoice_number=<?php echo $_GET['invoice_number']?>">
		<table id="table" style="width: 400px; margin: auto;overflow-x:auto; overflow-y: auto;">
			
			<tr>
				<td>Category:</td>
				<td>
					<select id="category" name="category" required > 
						<option value="Tablet">Tablet</option>
						<option value="Capsule">Capsule</option>
						<option value="Drops">Drops</option>
						<option value="Injections">Injections</option>	
						<option value="Syrup">Syrup</option>
					</select>
				</td>
			</tr>
			<tr id="row1">
				<td>Medicine Name:</td>
				<td><input type="text" name="med_name"  id="med_name" size="10" required ></td>
			</tr>
			<tr id="row1">
				<td>Generic Name:</td>
				<td><input type="text" name="med_name"  id="med_name" size="10" required ></td>
			</tr>
			<tr>
				<td>Compnay Name:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td><input type="number" style="width: 95px;" name="quantity">
					
				</td>
			</tr>
			<tr>
				<td>Packing Mode:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select style="width: 95px; height: 28px; border-color: #000080" name="sell_type" > 
						<option value="Pics">BOX</option>
						<option value="Bot">Pcs</option>
						<option value="Stp">BOTTLE</option>
						<option value="Tab">SET</option>
						<option value="Sachet">NOS</option>	
						<option value="Unit">VIAL</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Pcs Per Box/Cartoon</td>
				<td><input type="text"  name="reg_date" id="" size="5"  required>  </td>
			</tr> 
			
			<tr>
                <td>Buy Rate(CTN):</td>
				<td><input type="number" name="actual_price" id="actual_price"></td>
			</tr>
			<tr>
                <td>Sale Rate(CTN):</td>
				<td><input type="number" name="selling_price" id="selling_price"></td>
			</tr>
			<tr><!-- For more projects: Visit codeastro.com  -->
                <td>Sale Rate per Piece:</td>
				<td><input type="text" name="profit_price" id="profit_price"></td>
			</tr>
			
			<tr>
				<td>Price Date:</td>
				<td><input type="date"  name="reg_date" id="reg_date" size="5"  required>  </td>
			</tr>
			
			<tr>
				<td>Acive Status:</td>
				<!-- For more projects: Visit codeastro.com  -->
				<td>
					<select style="width: 95px; height: 28px; border-color: #000080" name="sell_type" > 
						<option value="Pics">Yes</option>
						<option value="Pics">No</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" class="btn btn-success btn-large" style="width: 225px" value="Save"> </td>
			</tr>
  	  	</table> 
        <br>
  	</form><br>
</body>

<script type="text/javascript">
		$(document).ready(function(){

      $(document).on('keyup','#med_name', 

        function(){
             var med_name_cap = $("#med_name").val();
              
              $("#med_name").val(med_name_cap.charAt(0).toUpperCase()+med_name_cap.slice(1));
      
        });


      $(document).on('keyup','#category', 

        function(){
             var category_cap = $("#category").val();
              
              $("#category").val(category_cap.charAt(0).toUpperCase()+category_cap.slice(1));
      
        });


      $(document).on('keyup','#actual_price', 

        function(){
             var act_price = $("#actual_price").val();
      var sell_price = $("#selling_price").val();
      var pro_price = parseInt(sell_price) - parseInt(act_price);
	var percentage = Math.round((parseInt(pro_price)/parseInt(act_price))*100);
	var output = pro_price.toString().concat("(")+percentage.toString().concat("%)");
        $("#profit_price").val(output);
        });

       $(document).on('keyup','#selling_price', 
        function(){
      var act_price = $("#actual_price").val();
      var sell_price = $("#selling_price").val();
      var pro_price = parseInt(sell_price) - parseInt(act_price);
	var percentage = Math.round((parseInt(pro_price)/parseInt(act_price))*100);
	var output = pro_price.toString().concat("(")+percentage.toString().concat("%)");
        $("#profit_price").val(output);
            });
});
  	
  </script>
</html>
<!-- For more projects: Visit codeastro.com  -->
