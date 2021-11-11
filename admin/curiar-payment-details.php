
<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
                     
$sr = 0;
$Id = $_GET['id'];
$sql = "SELECT * FROM `curiar_boy_payment_histry` WHERE id = '$Id' ";

$result  = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result );
        $sr ++; 
$name = $row['acount_name'];
    $amount = $row['payment_amount'];
        if($row['customer_jela'] = '112'){
         $jela = "ঢাকা ";
        }
    
   
?>   
      

  
 <div class="page-wrapper">
     <div class="container-fluid">
         
            <div class="card m-t-40">
                <div class="card-header bg-dark">
                    <h4 class="float-left text-white p-t-10">Payment Histry</h4>
                  
                    <button onclick="window.print();" class="btn btn-pinterest btn-rounded float-right "><i class="fa fa-print"></i> Prient</button>
                    
 <!-------------Update customer data whem Curoar boy pick up a order and he update statu------------------------------------------------------------------------------------------------>
                 
                </div>
                <div class="card-body">
                  
                   <?php if(isset($success)) echo $success;?>

                         <div class="row">
                        <div class="col-md-4 m-t-10">
                           <label>Account ID</label>
                            <input type="text" class="form-control" value="<?php echo $row['customer_account_number'] ;?>" readonly>
                        </div>
                        <div class="col-md-4 m-t-10">
                           <label>Account Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['acount_name'] ;?>" readonly>
                        </div>
                        <div class="col-md-4 m-t-10">
                           <label>Payment Amount</label>
                            <input type="text" class="form-control text-danger font-weight-bold" value="<?php echo $row['payment_amount'] ;?>" readonly>
                        </div>
                        
                        
                        <div class="col-md-4 m-t-10">
                           <label>Payment Date</label>
                            <input type="text" class="form-control " value="<?php echo $jela ;?>, <?php echo $row['payment_date'] ;?>" readonly>
                        </div>
                        
                        <div class="col-md-4 m-t-10">
                           <label>Payment Status </label>
                            <input type="text" class="form-control " value="<?php echo $row['payment_status'] ;?>" readonly>
                        </div>
                    </div>
                    <hr class="bg-warning">
                    
                    <div class="row">
                         <div class="col-md-4 m-t-10">
                           <label>Payment Option</label>
                           <?php 
                             if($row['Bkash'] == 'Bkash' ){
                             echo '<h5 class="text-danger"> '.$row['Bkash'].'</h5>';
                             }
                            if($row['Nogod'] == 'Nagod' ){
                                 echo '
                                     <h5 class="text-danger"> '.$row['Nogod'].'</h5>
                                 ';
                            }
                             if($row['roket'] == 'Roket' ){
                                  echo '
                                     <h5 class="text-danger"> Roket Number: '.$row['roket'].'</h5>
                                 ';
                            }
                            if($row['Bank'] == 'Bank' ){
                             echo '<h5 class="text-danger"> '.$row['Bank'].'</h5>';
                             }
                             
                             
                             ?>
                        </div>
                         
                         
                         <div class="col-md-5">
                             <label>Payment Details</label>
                             <?php 
                             if($row['Bkash'] == 'Bkash' ){
                             echo '<h5 class="text-danger">Bkash Number: '.$row['Bkash_number'].'</h5>';
                             }
    
                            if($row['Nogod'] == 'Nagod' ){
                                 echo '
                                     <h5 class="text-danger"> Nagod Number: '.$row['Nogod_number'].'</h5>
                                 ';
                            }
    
                             if($row['roket'] == 'Roket' ){
                                  echo '
                                     <h5 class="text-danger"> Roket Number: '.$row['roket_number'].'</h5>
                                 ';
                            }

                             if($row['Bank'] == 'Bank' ){
                             echo '<h5 class="text-danger">Bank Name: '.$row['Bname'].'</h5><br>';
                             echo '<h4 class="text-danger">Branch Name: '.$row['BraName'].'</h5><br>';
                             echo '<h5 class="text-danger">Account Name: '.$row['Aname'].'</h5><br>';
                             echo '<h5 class="text-danger">Account Number: '.$row['Anumber'].'</h5><br>';
                             }
                             ?>
                             
                             
                         </div>
                        
                    </div>
                    
            
                </div>
            </div>
            <?php 
          
    if(isset($_POST['Payment'])){
        if(isset($_POST['note'])){
            $note = $_POST['note'];
        }
       $date = date('M-d-Y');
        
       $sec = mysqli_query($conn, "INSERT INTO `payments_success` (`id`, `name`, `amount`, `notes`, `date_time`) VALUES (NULL, '$name', '$amount', '$note', '$date')");
        if($sec == true){
             $result = mysqli_query($conn, "UPDATE curiar_boy_payment_histry SET payment_status='Success', apymne_accpect_date = '$date' WHERE id= '$Id'");
           

            if($result == true){
                 echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold">আপনার Payments টি সফল হয়েছে <br> টাকার পরিমান = <span class="text-danger">'.$row['payment_amount'].' টাকা। </span></h4>
           
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';
            
            
        }else{
            echo 'somethis is worng';
        }
        }else{
            echo 'WROK';
        }
}
 
         
         
         ?>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                    <div class="col-md-6 offset-md-3">
                    <textarea class="form-control mt-2 mb-4" placeholder="Payments Notes" name="note" style="height:200px;"></textarea>
                    <?php 
                    if($row['payment_status'] == 'Pending' ){?>
                    
                    <button  onclick="myFunction()" class="btn btn-rounded btn-pinterest col-md-6 offset-md-3 m-t-20" type="submit" name="Payment">Yes! Payment</button>
                    
                    <?php }else{
                        echo '  <p class="text-center text-success font-20 font-weight-bold">Payment Successful</p>';
                    }?>
                  </div>
                    </form>
                </div>
            </div>
     </div>
 </div>


<script>
function myFunction() {
  alert("আপনি কি সিউর! আপনি টাকা পেমেন্ট করতে চান ?");
}
</script>  
    
<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>

<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
