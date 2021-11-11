<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
    <div class="page-wrapper">
        <div class="container-fluid">
            
            
            <div class="card m-t-40">
                <div class="card-header">
                    <h4>আপর ফলাফল সমুহঃ </h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                             <thead>
                                 <tr>
                                    <th>SR NO. </th>
                                    <th>Invoice </th>
                                    <th>Date </th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Number:</th>
                                    <th>Jela, Thana</th>
                                    <th>Full Address</th>
                                    <th>Status</th>
                                    <th>Acction</th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php 
                                  $sr = 0;
                                     if(mysqli_query($conn,"SELECT * FROM `pickup_order` WHERE boy_id = '".$_SESSION['id']."' AND status = 'Recive'" )){
                                        
                                        $sql = "SELECT * FROM `customer_order` WHERE pickup_boy_id = '".$_SESSION['id']."' AND status = 'Recive' ";
                                

                                    $result  = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $sr ++; 

                                            if($row['customer_jela'] = '112'){
                                                $jela = 'ঢাকা';
                                            }
                                    ?>     
                                    <tr>
                                    <td><?php echo $sr ;?></td>
                                    <td><?php echo  $row['invoice'] ;?></td>
                                    <td><?php echo  $row['pickup_date'] ;?></td>
                                    <td><?php echo $row['customer_name'] ;?></td>
                                    <td class="text-danger font-20">
                               <?php echo $row['in_total'] ;?></td>
                                    <td><?php echo $row['number'];?>, <?php echo $row['number2'] ;?></td>
                                    
                                     <td><?php echo $jela;?>, <?php echo $row['customer_thana'] ;?></td>
                                     
                                     <td><?php echo $row['fullAddress']; ?></td>
                                     <td class="btn btn-primary btn-rounded font-weight-bold"><?php echo $row['status']; ?></td>
                                    <td><a href="pickup-order-details.php?id=<?php echo $row['id'] ;?>" class="btn btn-outline-primary">View</a></td>
                                </tr>
 
                                                
                            <?php } } ?>
                               
                               
                               

                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
  
 




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>