<?php

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
     <!-- For more projects: Visit codeastro.com  -->
</head>
<body>
   <?php include('../top_menu_inner.php'); ?>


     <div class="container"><!---****SEARCHES_CONTENT*****--->

      <div class="row">
        <div class="contentheader">
          <h1>Category</h1>
           </div><br>
    
            <input type="text"  id="name_med1" size="4"  onkeyup="med_name1()" placeholder="Filter using Name" title="Type BarCode">
          
			
           <a href="index.php?invoice_number=<?php echo $_GET['invoice_number']?>" id="popup"><button class="btn btn-success btn-md" name="submit"><span class="icon-plus-sign icon-large"></span> Add New Category</button></a>
             
      </div>
 
  <!-- For more projects: Visit codeastro.com  -->
    </div><!---****SEARCHES_CONTENT*****--->

 
    <?php

       include('../dbcon.php');

         $select_sql = "SELECT * FROM category order by id";
         $select_query = mysqli_query($con,$select_sql);
         $row = mysqli_num_rows($select_query);

    ?>

      <div style="text-align:center;">
        Total Category : <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $row;?>]</font>
      </div>
    <!-- <div class="container" style="overflow-x:auto; overflow-y: auto;"> -->
      <div class="container">
      <!---***CONTENT****----->
    <div class="row">
      <div class="col-12">
        <form method="POST">
          <!-- <div style="overflow-x:auto; overflow-y: auto; height: auto;"> -->
            <div style="height: auto;">
          <table id="table0" class="table table-bordered table-striped table-hover">
           <thead>
             <tr style="background-color: #383838; color: #FFFFFF;" >
             <th width="3%">Name</th>
             <th width = "5%">Actions</th>
             </tr>
           </thead>
            <tbody>
   
        <?php include("../dbcon.php"); ?>
        <?php $sql = "SELECT  id,name FROM category order by name asc"; ?>
        <?php $result =  mysqli_query($con,$sql); ?>
      <!--Use a while loop to make a table row for every DB row-->
        <?php while( $row =  mysqli_fetch_array($result)) : ?>
        <!-- For more projects: Visit codeastro.com  -->
  
        <tr style="">
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row['name']; ?></td>
            <td><a id="popup" href="update_view.php?id=<?php echo $row['id']?>&invoice_number=<?php echo $_GET['invoice_number']?>"><button class="btn btn-info"><span class="icon-edit"></span></button></a>
          <button class="btn btn-danger delete" id="<?php echo $row['id']?>"><span class="icon-trash"></span>&nbsp;</button></td>
  
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
function med_name1() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_med1");
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


function quanti() {//***Search For quantity *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_quantity");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function exp_date() {//***Search For expireDate *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_exp_date");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


function stat_search() {//***Search For Status*****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_status");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[11];
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

  var del_id = element.attr("id");

  var info = 'id='+del_id;

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
