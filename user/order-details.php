<style>
   .table th, .table thead th{
        font-size: 17px;
    }
    .table td{
        width: 60%;
    }
   
</style>
<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
                     
$sr = 0;
    if(isset($_GET['id'])){
        $Id = $_GET['id'];
    }

$sql = "SELECT * FROM `customer_order` WHERE id = '$Id' ";
 //pikup
    if(isset($_GET['id'])){
      $orderID = $_GET['id'];  
    }
$result  = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result );
        $sr ++; 
        $mrsntid = $row['customer_id'];
        if($row['customer_jela'] = '112'){
         $jela = "Dhaka";
        }
    
    //Cancel
    if(isset($_POST['cancel'])){
        $cancelUpdate = "UPDATE customer_order SET status = 'Cancel' WHERE id = '$Id' ";
        $resultC = mysqli_query($conn, $cancelUpdate);
        if($resultC){
          $successC = '
            <div class="alert alert-success"><p class="btn btn-rounded btn-success"> এই অর্ডারটি কেন্সেল করা সফল হয়েছে। </p></div>
            ';
        }
    }
    //Return 
    if(isset($_POST['return'])){
        $returnUpdate = "UPDATE customer_order SET status = 'Return' WHERE id = '$Id' ";
        $resultR = mysqli_query($conn, $returnUpdate);
        if($resultR){
          $successR = '
            <div class="alert alert-success"><p class="btn btn-rounded btn-success"> এই অর্ডারটি কেন্সেল করা সফল হয়েছে। </p></div>
            ';
        }
    }
    
?>   
      
   
  
 <div class="page-wrapper">
     <div class="container-fluid">
         
            <div class="card m-t-40">
                <div class="card-header">
                    <h4 class="float-left">Order Detailss</h4>
                    <a href="total-order.php"><button class="btn btn-pinterest btn-rounded float-right "><i class="fa fa-arrow-left"></i> Go Back</button></a>
                    
 <!-------------Update customer data whem Curoar boy pick up a order and he update statu------------------------------------------------------------------------------------------------>
                        
          
    
                </div>
                <div class="card-body">
                   <form action="" method="post">
                   <?php if(isset($success)) echo $success;?>
                   <?php if(isset($successC)) echo $successC;?>
                   <?php if(isset($successR)) echo $successR;?>

                    <div class="row">
                    <div class="col-md-10 offset-md-1">
                       <table class="table table-bordered">
                           <tr>
                               <th>Order Invoice: </th>
                               <td class="font-weight-bold"><?php echo $row['invoice'] ;?></td>
                           </tr>
                            <tr>
                               <th>Order Date: </th>
                               <td><?php echo $row['order_date'] ;?></td>
                           </tr>
                           <tr>
                               <th>Customer Name: </th>
                               <td><?php echo $row['customer_name'] ;?></td>
                           </tr>
                            <tr>
                               <th>Weight: </th>
                               <td><?php echo $row['weight'] ;?></td>
                           </tr>
                            <tr>
                               <th>Order Amount: </th>
                               <td class="text-danger font-weight-bold font-20">৳<?php echo $row['in_total'] ;?></td>
                           </tr>
                           <tr>
                               <th>Shipping Cost: </th>
                               <td class="text-danger font-weight-bold font-20">৳<?php echo $row['in_total'] - $row['total_taka'] ;?></td>
                           </tr>
                           <tr>
                               <th>Total Amount: </th>
                               <td class="text-success font-weight-bold font-20">৳<?php echo $row['total_taka'] ;?></td>
                           </tr>
                            <tr>
                               <th>Number: </th>
                               <td><?php echo $row['number'] ;?>, <?php echo $row['number2'] ;?></td>
                           </tr>
                           <tr>
                               <th>District, Thana</th>
                               <td><?php echo $jela ;?>, <?php echo $row['customer_thana'] ;?></td>
                           </tr>
                           <tr>
                               <th>Location: </th>
                               <td><?php echo $row['where_customer'] ;?></td>
                           </tr>
                           <tr>
                               <th>Full Accress: </th>
                               <td><?php echo $row['fullAddress'] ;?></td>
                           </tr>
                          <tr>
                               <th>Order Information: </th>
                               <td><?php echo $row['order_info'] ;?></td>
                           </tr>
                            <tr>
                               <th>Location Information: </th>
                               <td><?php echo $row['location_info'] ;?></td>
                           </tr>
                             <tr>
                               <th>Status: </th>
                               <td class="text-danger"><?php echo $row['status'] ;?></td>
                           </tr>
                       </table>
                    
                    </div><br>
                       </div><br>
                    
                
                               
                           </form>
                           
                        </div>
                    </div>
                    
            
                </div>
                
            </div>
           
            <!-----------#################################################################################### pikup location get ##############################################################-------------> 
   
<script>
function cancelOrder() {
  alert("আপনি কি সিউর! এই অডার্টি কেন্সেল করবেন?");
}
</script> 
<script>
function returnOrder() {
  alert("আপনি কি সিউর! এই অডার্টি রিটার্ন এসেছে ?");
}
</script> 


<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>


