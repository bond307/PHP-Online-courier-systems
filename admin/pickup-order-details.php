
<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
                     
$sr = 0;
if(isset($_GET['id'])){
    $Id = $_GET['id'];
}
    
$sql = "SELECT * FROM `customer_order` WHERE id = '$Id' ";

$result  = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result );
        $sr ++; 
$pikID = $row['pickup_boy_id'];
        if($row['customer_jela'] = '112'){
         $jela = "Dhaka";
        }
    
    
    //update status
    if(isset($_POST['pick_approve'])){
  if(mysqli_query($conn, "UPDATE `customer_order` SET `status` = 'Recive' WHERE `customer_order`.`id` = '$Id'; ")){
      
      echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
            
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold"> পন্য টি রিসিভ হয়ে গেছে!  </h4>
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';
  }
    
        
}
    
    
    
?>   
<style>
.table td{
    width: 60%;
}
</style> 
  
 <div class="page-wrapper">
     <div class="container-fluid">
         
            <div class="card m-t-40">
                <div class="card-header">
                    <h4 class="float-left">Order Details</h4>
                  
                    <button onclick="window.print();" class="btn btn-pinterest btn-rounded float-right "><i class="fa fa-print"></i> Prient</button>
                    
 <!-------------Update customer data whem Curoar boy pick up a order and he update statu------------------------------------------------------------------------------------------------>
                 
                </div>
                <div class="card-body">
                   <?php if(isset($success)) echo $success;?>

                   <div class="row">
                      <div class="col-md-8 offset-md-2">
                         <div class="logo">
                             <img src="../images/logo.png" alt="">
                         </div>
                       <table class="table table-bordered">
                           <tr>
                               <th>Order Invoice</th>
                               <td><?php echo $row['invoice'] ;?></td>
                           </tr>
                            <tr>
                               <th>Order Date</th>
                               <td><?php echo $row['order_date'] ;?></td>
                           </tr>
                           <tr>
                               <th>Customer Name</th>
                               <td><?php echo $row['customer_name'] ;?></td>
                           </tr>
                           <tr>
                               <th>Total Amount</th>
                               <td><?php echo $row['total_taka'] ;?></td>
                           </tr>
                           <tr>
                               <th>Number</th>
                               <td><?php echo $row['number'] ;?>, <?php echo $row['number2'] ;?></td>
                           </tr>
                           <tr>
                               <th>District, Thana</th>
                               <td><?php echo $jela ;?>, <?php echo $row['customer_thana'] ;?></td>
                           </tr>
                            <tr>
                               <th>Location</th>
                               <td><?php echo $row['where_customer'] ;?></td>
                           </tr>
                           <tr>
                               <th>Full Accress</th>
                               <td><?php echo $row['fullAddress'] ;?></td>
                           </tr>
                            <tr>
                               <th>Order Information</th>
                               <td><?php echo $row['order_info'] ;?></td>
                           </tr>
                            <tr>
                               <th>Location Information </th>
                               <td><?php echo $row['location_info'] ;?></td>
                           </tr>
                           <tr>
                               <th>Status</th>
                               <td class="font-weight-bold font-20 text-danger"><?php echo $row['status'] ;?></td>
                           </tr>
                           <tr>
                               <th>Pickup Date </th>
                               <td><?php echo $row['pickup_date'] ;?></td>
                           </tr>
                           <tr>
                               <th>Location Information </th>
                               <td><?php echo $row['location_info'] ;?></td>
                           </tr>
                       </table><br>
                       
                       
                       <!---- pi9kup voy details ----> 
                       <div class="bg-success pt-2 pb-2  mt-2 mb-5"><strong class="text-white font-20 ">Pickup Boy</strong></div>
                        <table class="table table-bordered">
                          <?php echo $pikID;
                            $sqlPik = mysqli_query($conn, "SELECT * FROM `curiar_boy_registration_tbl` WHERE id = '$pikID' ");
                                $pikD = mysqli_fetch_assoc($sqlPik);

                            ?>
                          
                           <tr>
                               <th>Pickup Boy Name:</th>
                               <td><?php echo $pikD['curiar_boy_name'] ;?></td>
                           </tr>
                            <tr>
                               <th>Pickup Boy Number:</th>
                               <td><?php echo $pikD['Cnumber'] ;?></td>
                           </tr>
                           <tr>
                               <th>Pickup Boy Account No.</th>
                               <td><?php echo $pikD['account_no'] ;?></td>
                           </tr>
                          
                           </table>
                           
                       
                       
                       
                       
                       <form action="" method="post">
                       <div class="col-md-6 offset-md-3">
                           <button type="submit" name="pick_approve" class="btn btn-success btn-rounded col-md-12">Approve</button>
                       </div>
                          </form>
                       </div>   
                </div>
     </div>
 </div>



<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>


<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>