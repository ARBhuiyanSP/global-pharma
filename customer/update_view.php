<!-- For more projects: Visit codeastro.com  -->
<?php

   session_start();

   include("../dbcon.php");

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }

  //****SELECTINg FROM stock******

$id = $_GET['id'];



$select_sql = "SELECT * FROM inv_customer where id = '$id' ";
  
$select_query = mysqli_query($con,$select_sql);

  while($row = mysqli_fetch_array($select_query)):



?>
<body>  
    <form method="POST" action="update.php?">
          <table id="table" style="width: 400px; margin: auto;">
			<td><input type="hidden" name="id" value="<?php echo $row['id']?>"></td>

			<tr id="row">
				<td> Name:</td>
				<td><input type="text" name="customername"  id="customername" size="10" value="<?php echo $row['name']?>" required ></td>
			</tr>
			<tr id="row">
				<td> Address:</td>
				<td><input type="text" name="address"  id="address" size="10" value="<?php echo $row['address']?>" required ></td>
			</tr>
			<tr id="row">
				<td> Phone:</td>
				<td><input type="text" name="phone"  id="phone" size="10" value="<?php echo $row['phone']?>" required ></td>
			</tr>

			<tr>
				<td>Status:</td>
				<td>
					<select style="width: 230px; height: 35px; border-color: #000080" name="status"> 
						<option  disabled><?php echo $row['status']?></option>
						<option value="Active">Active</option>
						<option value="Inactive">Inactive</option>
				</select></td>
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

