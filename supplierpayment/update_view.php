<!-- For more projects: Visit codeastro.com  -->
<?php

   session_start();

   include("../dbcon.php");

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }

  //****SELECTINg FROM stock******

$SupplierID = $_GET['SupplierID'];



$select_sql = "SELECT * FROM inv_supplier where SupplierID = '$SupplierID' ";
  
$select_query = mysqli_query($con,$select_sql);

  while($row = mysqli_fetch_array($select_query)):



?>
<body>  
    <form method="POST" action="update.php">
          <table id="table" style="width: 400px; margin: auto;">
			<td><input type="hidden" name="id" value="<?php echo $row['id']?>"></td>


			<tr id="row">
				<td> Name:</td>
				<td><input type="text" name="SupplierID"  id="SupplierID" size="10" value="<?php echo $row['SupplierID']?>" required ></td>
			</tr>
			
			
			<tr id="row">
				<td> Name:</td>
				<td><input type="text" name="SupplierCompany"  id="SupplierCompany" size="10" value="<?php echo $row['SupplierCompany']?>" required ></td>
			</tr>
			<tr id="row">
				<td> Address:</td>
				<td><input type="text" name="SupplierAddress1"  id="SupplierAddress1" size="10" value="<?php echo $row['SupplierAddress1']?>" required ></td>
			</tr>
			<tr id="row">
				<td> Phone:</td>
				<td><input type="text" name="SupplierPhone1"  id="SupplierPhone1" size="10" value="<?php echo $row['SupplierPhone1']?>" required ></td>
			</tr>

			
      <?php endwhile; ?>
        <tr>
          <td></td>
          <td> <input type="submit" name="update" class="btn btn-success btn-md" style="width: 225px" value="Save Changes"> </td>
        </tr>

         </table> 
        <br>
         </form><br>
</body>
</html>

