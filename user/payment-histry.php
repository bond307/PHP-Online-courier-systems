
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
                 <h5 class="text-white p-t-10 btn btn-rounded btn-flickr"> পেমেন্ট হিস্টোরিঃ </h5>
             </div>
             
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Payment Request Date</th>
                                    <th>Aamount</th>
                                    <th>Payment Option</th>
                                    <th>Status</th>
                                    <th class="text-success">Payment Accpect Date</th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 0;
                                $sql = "SELECT * FROM `customer_payment_histry` 
                                WHERE payment_user_id ='".$_SESSION['id']."' ";
    
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
                                             <td><?php echo $row['payment_date']; ?></td>
                                             <td><?php echo $row['payment_amount']; ?></td>
                                            <td> 
                                       <?php 
                                           if($row['Bkash'] == 'Bkash' ){
                                                 echo '
                                                     <tdclass="text-danger font-weight-bold font-18">'.$row['Bkash'].'</td>
                                                 ';
                                            }
                                         ?>
                                            
                                        <?php 
                                           if($row['Nogod'] == 'Nagod' ){
                                                 echo '
                                                     <tdclass="text-danger font-weight-bold font-18">'.$row['Nogod'].'</td>
                                                 ';
                                            }
                                         ?>
                                            
                                            <?php 
                                           if($row['roket'] == 'Roket' ){
                                                 echo '
                                                     <tdclass="text-danger font-weight-bold font-18">'.$row['roket'].'</td>
                                                 ';
                                            }
                                         ?>
                                            
                                        <?php 
                                           if($row['Bank'] == 'Bank' ){
                                                 echo '
                                                     <tdclass="text-danger font-weight-bold font-18">'.$row['Bank'].'</td>
                                                 ';
                                            }
                                         ?>
                                         </td>
                                            
                                           <td class="<?php echo $class ;?>">
                                              <?php echo $row['payment_status'];; ?></td>
                                               <td><?php echo $row['apymne_accpect_date']; ?></td>
                                                
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

