<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
   <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card m-t-20">
                <div class="card-header bg-info">
                    <h4 class="text-white p-t-10">Total Order's </h4>
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
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Acction</th>
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php 
                                  $sr = 0;
                                    $sql = "SELECT * FROM `customer_order`";

                                    $result  = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $sr ++; 

                                            if($row['customer_jela'] = '112'){
                                                $jela = 'Dhaka';
                                             }
                                        
                                         if($row['status'] == 'Success'){
                                            $class = 'badge badge-pill badge-success';
                                        }else if($row['status'] == 'Pending'){
                                            $class = 'badge badge-pill badge-primary';
                                        }else if($row['status'] == 'Receive'){
                                             $class = 'badge badge-pill badge-secondary';
                                        }else if($row['status'] == 'Cancel'){
                                             $class = 'badge badge-pill badge-danger';
                                        }else if($row['status'] == 'Return'){
                                             $class = 'badge badge-pill badge-dark';
                                        }
                                        else if($row['status'] == 'Where_House'){
                                             $class = 'badge badge-pill badge-warning';
                                        }
                                        
                                        
                                      ?>
                                           
                                    <tr>
                                    <td><?php echo $sr ;?></td>
                                    <td><?php echo  $row['invoice'] ;?></td>
                                    <td><?php echo  $row['pickup_date'] ;?></td>
                                    <td><?php echo $row['customer_name'] ;?></td>
                                    <td><?php echo $row['total_taka'] ;?></td>
                                    <td><?php echo $row['number'];?>, <?php echo $row['number2'] ;?></td>
                                    
                                     <td><?php echo $jela;?>, <?php echo $row['customer_thana'] ;?></td>
                                     <td class="<?php echo $class;?> m-t-20"><?php echo $row['status']; ?></td>
                                    <td><a href="order-details.php?id=<?php echo $row['id'] ;?>" class="btn btn-info"> View</a></td>
                                    <td>
                                    <a href="order-edite.php?id=<?php echo $row['id'] ;?>" class="fa fa-edit float-left"></a>
                                     <a href="order-delete.php?id=<?php echo $row['id'] ;?>" class="fa fa-trash float-right"></a></td>
                                </tr>
 
                                                
                            <?php }?>
                               
                               
                               

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