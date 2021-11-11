
<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
    
include 'inc/header.php';
?>

  
 <div class="page-wrapper">
     <div class="container-fluid">
           
     <div class="payment-histry">
         <div class="card">
             <div class="card-header alert alert-warning">
                 <h5 class="text-white p-t-10 text-center font-18 text-dark"> Customer Success Payment Histry</h5>
             </div>
             
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Acount No</th>
                                    <th>Acount Name</th>
                                    <th>Aamount</th>
                                    <th>Payment Option</th>
                                    <th>Payment Request Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 0;
                                $sql = "SELECT * FROM `customer_payment_histry` WHERE payment_status='Success' ";
    
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $sr++;
                               
                                        if($row['payment_status'] == 'Success'){
                                            $class = 'badge badge-pill badge-success m-20';
                                        }else if($row['payment_status'] == 'Pending'){
                                            $class = 'badge badge-pill badge-primary m-20';
                                        }
                                           
                                    ?>
                                   
                                     <tr>
                                     <td><?php echo $sr; ?></td>
                                     <td><?php echo $row['customer_account_number']; ?></td>
                                     <td><?php echo $row['acount_name']; ?></td>
                                     <td><?php echo $row['payment_amount']; ?></td>
                                             
                                       <?php 
                                           if($row['Bkash'] == 'Bkash' ){
                                                 echo '
                                                     <td  class="text-danger font-weight-bold font-18">'.$row['Bkash'].'</td>
                                                 ';
                                            }
                                         ?>
                                        <?php 
                                           if($row['Nogod'] == 'Nagod' ){
                                                 echo '
                                                     <td class="text-danger font-weight-bold font-18">'.$row['Nogod'].'</td>
                                                 ';
                                            }
                                         ?>
                                            <?php 
                                           if($row['roket'] == 'Roket' ){
                                                 echo '
                                                     <td class="text-danger font-weight-bold font-18">'.$row['roket'].'</td>
                                                 ';
                                            }
                                         ?>
                                        <?php 
                                           if($row['Bank'] == 'Bank' ){
                                                 echo '
                                                     <td class="text-danger font-weight-bold font-18">'.$row['Bank'].'</td>
                                                 ';
                                            }
                                         ?>
                                          <td><?php echo $row['payment_date'];?></td>
                                        <td class="<?php echo $class ;?>">
                                        <?php echo $row['payment_status'];; ?></td>
                                        <td><a href="customer-payment-details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-warning">view</a></td>
                                          
                                          
                                           </tr>
                                    <?php }?>
                            </tbody>
                           
                        </table>
                    </div>
                </div>
         </div>
     </div>
     
     
     </div>
     
     
 </div>




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>

