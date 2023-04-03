<?php

       include('../dbcon.php');
   session_start();

  if(!isset($_SESSION['user_session'])){
    
      header("location:../index.php");

  }

?><!-- For more projects: Visit codeastro.com  -->
<!DOCTYPE html>
<html>
<head>
 <title>Pharma POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="../src/facebox.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../src/facebox.js"></script>
    <script type="text/javascript">

       jQuery(document).ready(function($) {//*****POP_UP FORMS*********
    $("a[id*=popup").facebox({
      loadingImage : '../src/img/loading.gif',
      closeImage   : '../src/img/closelabel.png'
    })
  })//*****POP_UP FORMS*********

    </script>
	<style>
	body {  background-image: url(https://thumbs.dreamstime.com/b/pharmacy-interior-blurred-background-58416047.jpg); } 
	</style>
     <!-- For more projects: Visit codeastro.com  -->
</head>
<body>
 <?php include('../top_menu.php'); ?>

     <div class="container" style="background-color:#fff;"><!---****SEARCHES_CONTENT*****--->

     

    </div><!---****SEARCHES_CONTENT*****--->

 
    <?php


         $select_sql = "SELECT * FROM inv_supplier order by id";
         $select_query = mysqli_query($con,$select_sql);
         $row = mysqli_num_rows($select_query);

    ?>

     
    <!-- <div class="container" style="overflow-x:auto; overflow-y: auto;"> -->
      <div class="container" style="background-color:#fff;">
	   <div style="text-align:center;">
        Total Suppliers : <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $row;?>]</font>
      </div>
      <!---***CONTENT****----->
    <div class="row">
      <div class="col-12">
        <form method="POST">
          <!-- <div style="overflow-x:auto; overflow-y: auto; height: auto;"> -->
            <div style="height: auto;">
          <table id="table0" class="table table-bordered table-striped table-hover">
           <thead>
             <tr style="background-color: #383838; color: #FFFFFF;" >
			 <th width="3%">Voucher ID</th>
             <th width="3%">Date</th>
             <th width="3%">Supplier</th>
             <th width="1%">Amount</th>
			 <th width="3%">Remarks</th>
             <th width = "5%">Actions</th>
             </tr>
           </thead>
            <tbody>
   
        <?php include("../dbcon.php"); ?>
        <?php $sql = "SELECT * FROM inv_supplierbalance order by SBRefID asc"; ?>
        <?php $result =  mysqli_query($con,$sql); ?>
      <!--Use a while loop to make a table row for every DB row-->
        <?php while( $row =  mysqli_fetch_array($result)) : ?>
        <!-- For more projects: Visit codeastro.com  -->
  
        <tr style="">
            <!--Each table column is echoed in to a td cell-->
			<td><?php echo $row['SBRefID']; ?></td>
            <td><?php echo $row['SBDate']; ?></td>
            <td><?php echo $row['SBSupplierID']; ?></td>
            <td><?php echo $row['SBDrAmount']; ?></td>
			<td><?php echo $row['SBRemark']; ?></td>
			
			
            <td>
			<a id="popup" href="update_view.php?SBRefID=<?php echo $row['SBRefID']?>"><button class="btn btn-info"><span class="icon-edit"></span></button></a>
			
          <button class="btn btn-danger delete" SBRefID="<?php echo $row['SBRefID']?>"><span class="icon-trash"></span>&nbsp;</button></td>
  
            </tr>
        <?php endwhile ?>
    </tbody>
           </table>
         </div>
      </form> 
      </div>
    </div>
    </div>
 </body>
</html>
<!-- For more projects: Visit codeastro.com  -->
<script type="text/javascript">

function supplier_name_search() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_search");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



$(".delete").click(function(){//***Showing Alert When Deleting*****

  var element = $(this);

  var del_id = element.attr("SBRefID");

  var info = 'SBRefID='+del_id;

  if(confirm("Delte This Product!!Are You Sure??")){

    $.ajax({

      type :"GET",
      url  :'delete.php',
      data :info,
      success:function(){
        location.reload(true);
      },
      error:function(){
        alert("error");
      }

    });
    
  }
  return false;

});//***Showing Alert When Deleting********



</script>
<!-- For more projects: Visit codeastro.com  -->
