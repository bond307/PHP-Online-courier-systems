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
                    
                    <p class="bg-danger pt-2 font-16 pb-2 m-t-40 text-center text-white">Set Status for this order.</p>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-2 row">
                           <form action="">
                            <div class="col-md-6">
                                <button onclick="cancelOrder()" class="btn btn-danger btn-rounded width-100" type="submit" name="cancel">Cancel</button>
                            </div>
                              <div class="col-md-6">
                                <button onclick="returnOrder()" class="btn btn-warning btn-rounded width-100" type="submit" name="return">Return</button>
                            </div>
                               
                           </form>
                           
                        </div>
                    </div>
                    
                    </form>
            
                </div>
                
            </div>
           
            <!-----------#################################################################################### pikup location get ##############################################################-------------> 
            
         <?php 
         $pikLoc = mysqli_query($conn, "SELECT * FROM `customer_registration_tbl` WHERE id = '$mrsntid'");
        $rowPik = mysqli_fetch_assoc($pikLoc);
          if($row['jela'] = '112'){
         $jela = "ঢাকা";
        }
         ?> 
           <div class="card">
               <div class="card-header">
                       <strong class="text-center">পিক-আপ লোকেশন এবং ডিটেস্ল</strong>
                   </div>
               <div class="card-body">
                   <div class="row">
                    <div class="col-md-10 offset-md-1">
                       <table class="table table-bordered">
                           <tr>
                               <th>Name : </th>
                               <td class="font-weight-bold"><?php echo $rowPik['name'] ;?></td>
                           </tr>
                            <tr>
                               <th>Number: </th>
                               <td><?php echo $rowPik['number'] ;?></td>
                           </tr>
                           <tr>
                               <th>Address: </th>
                               <td><?php echo $jela;?>, <?php echo $rowPik['thana'] ;?>, <?php echo $rowPik['FullAddress'] ;?></td>
                           </tr>
                            
                        </table>
                       </div>
                    
               </div>
           </div> 
         </div>
            
            
            
         <?php 
   
            if(isset($_POST['pkup_boy'])){
                if(isset($_POST['pkup'])){
                     $pkup = $_POST['pkup']; 
      
                $sql = "SELECT * FROM `curiar_boy_registration_tbl` WHERE id = '$pkup' ";
                    $result = mysqli_query($conn, $sql);
                    $rowPik = mysqli_fetch_assoc($result);
                    $PikName = $rowPik['curiar_boy_name'];
                //insert
                 if(mysqli_query($conn, "INSERT INTO `pickup_order` (`id`, `boy_id`, `boy_name`, `order_id`, `status`) VALUES (NULL, '$pkup', '$PikName', '$orderID', 'Processing')" )){
                    if(mysqli_query($conn, "UPDATE `customer_order`SET pickup_boy_id = '$pkup', pickup = '1' WHERE id = '$orderID' " )){
                     
                    $sms = '<div class="alert alert-success">পিক-আপ বয় সিলেক্ট হয়েছে </div>"';
                    }
                }else{
                     echo 'sonethibng';
                 }
          
                
        }else{
                echo '<script>alert("Please select someone");</script>';
            }
        }
    //delete 
    
    
if($chekPickTbl = mysqli_query($conn, "SELECT * FROM `pickup_order`")){
    if(mysqli_num_rows($chekPickTbl)> 0){
         while($row = mysqli_fetch_assoc($chekPickTbl)){  
                $pickID = $row['boy_id'];
       }
      
    $sql = "SELECT * FROM `pickup_order` WHERE order_id = '$Id' "; 
$result = mysqli_query($conn, $sql);
$pkupBoyName = mysqli_fetch_assoc($result);
    } }
//delete 
if(isset($_POST['pkup_delete'])){
   if( mysqli_query($conn, "DELETE FROM pickup_order WHERE boy_id = '$pickID' ")){
        $sms = '<div class="alert alert-danger">ডিলেট সম্পন্ন হয়েছে! পুনরায় সিলেক্ট করুন। </div>';
    } 
}

         ?>
           
                
             
         <?php 
//Delivery 
            if(isset($_POST['dlvr_boy'])){
                if(isset($_POST['dlvr'])){
                     $dlvr = $_POST['dlvr']; 
      
                $sql = "SELECT * FROM `curiar_boy_registration_tbl` WHERE id = '$dlvr' ";
                    $result = mysqli_query($conn, $sql);
                    $rowPik = mysqli_fetch_assoc($result);
                    $dlvName = $rowPik['curiar_boy_name'];
                //insert
                 if(mysqli_query($conn, "INSERT INTO `delivery_order` (`id`, `boy_id`, `boy_name`, `order_id`, `status`) VALUES (NULL, '$dlvr', '$dlvName', '$orderID', 'Recive')" )){
                      if(mysqli_query($conn, "UPDATE `customer_order` SET delivery_boy_id = '$dlvr', delivery = '1', status = 'Processing' WHERE id = '$orderID' " )){
                    $smsDe = '<div class="alert alert-success">ডেলিভারি বয় সিলেক্ট হয়েছে </div>"';
                      }
                }else{
                     echo 'sonethibng';
                 }
          
                
        }else{
                echo '<script>alert("Please select someone");</script>';
            }
        }
    //delete 
    
    
if($chekDlvrTbl = mysqli_query($conn, "SELECT * FROM `delivery_order`")){
    if(mysqli_num_rows($chekDlvrTbl)> 0){
         while($row = mysqli_fetch_assoc($chekDlvrTbl)){  
                $dlvrID = $row['boy_id'];
       }
      
    $sql = "SELECT * FROM `delivery_order` WHERE boy_id = '$dlvrID' "; 
$result = mysqli_query($conn, $sql);
$dlvrBoyName = mysqli_fetch_assoc($result);
    } }
//delete 
if(isset($_POST['dlvr_delete'])){
   if( mysqli_query($conn, "DELETE FROM delivery_order WHERE boy_id = '$dlvrID' ")){
        $smsDe = '<div class="alert alert-danger">ডিলেট সম্পন্ন হয়েছে! পুনরায় সিলেক্ট করুন। </div>';
    } 
}

         ?>
           
             
            <div class="card mt-4">
              <div class="row">
                    <div class="col-md-6 mt-3 mb-3 ">
                    <?php if(isset($sms)) echo $sms;?>
                    <p class="text-center font-weight-bold">পিক-আপ বয় নির্বাচন: <span class="text-danger font-weight-bold"><?php if(isset($pkupBoyName['boy_name'])) echo $pkupBoyName['boy_name']?></span></p>
                    <div class="card-header">
                        <strong>Select Pickup Boy</strong>
                        <form action="" method="post">
                            <div class="form-group">
                                <select class="form-control" name="pkup" required>
                                    <option selected disabled>Pickup boy list</option>
                                    <?php 
                                    $sql = "SELECT * FROM `curiar_boy_registration_tbl` ";
                                        $result = mysqli_query($conn, $sql);
                                        $num = mysqli_num_rows($result);
                                            while($row = mysqli_fetch_assoc($result)){
                                               $name = $row['curiar_boy_name'];
                                               $id = $row['id'];
                                                echo '<option value="'.$id.'" >'.$name.'</option>';
                                        }?>
                                </select>
                                <button class="mt-4 btn btn-success col-md-4 float-left" type="submit" name="pkup_boy"><i class="fa fa-check"></i> Select</button>
                                <button class="mt-4 btn btn-danger col-md-4 float-right" type="submit" name="pkup_delete"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
                  <div class="col-md-6 mt-3 mb-3">
                       <?php if(isset($smsDe)) echo $smsDe;?>
                      <p class="text-center font-weight-bold">ভেলিবারি বয় নির্বাচন: <span class="text-danger font-weight-bold"><?php if(isset($dlvrBoyName['boy_name'])) echo $dlvrBoyName['boy_name']?></span></p>
                    <div class="card-header">
                        <strong>Select Delivery Boy</strong>
                        <form action="" method="post">
                            <div class="form-group">
                                <select class="form-control" name="dlvr">
                                    <option selected disabled>Delivery boy list</option>
                                  <?php 
                                    $sql = "SELECT * FROM `curiar_boy_registration_tbl` ";
                                        $result = mysqli_query($conn, $sql);
                                        $num = mysqli_num_rows($result);
                                            while($row = mysqli_fetch_assoc($result)){
                                               $name = $row['curiar_boy_name'];
                                               $id = $row['id'];
                                                echo '<option value="'.$id.'" >'.$name.'</option>';
                                        }?>
                                </select>
                                <button class="mt-4 btn btn-success col-md-4 float-left" type="submit" name="dlvr_boy">Select</button>
                                <button class="mt-4 btn btn-danger col-md-4 float-right" type="submit" name="dlvr_delete"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
                      
              </div>
            </div>
     </div>
 </div>


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


