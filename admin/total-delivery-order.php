<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
   <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card m-t-20">
                <div class="card-header bg-info">
                    <h4 class="text-white p-t-10">Total Delivery Order's </h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Invoice </th>
                                    <th>Pickup Date</th>
                                    <th>Amount</th>
                                    <th>Jela, Thana</th>
                                    <th>Acction</th>
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php 
                                  $sr = 0;
                             $checkDlv = mysqli_query($conn, "SELECT * FROM `delivery_order`");
                                while($rowDlv = mysqli_fetch_assoc($checkDlv)){
                                      $boyID = $rowDlv['boy_id'];
                               
                                    if(mysqli_num_rows($checkDlv) > 0) {
                                        
                                        
                                    $sql = "SELECT * FROM `customer_order` WHERE delivery = '1'";

                                    $result  = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $sr ++; 

                                            if($row['customer_jela'] = '112'){
                                                $jela = 'ঢাকা ';
                                             }
                        ?>
                                           
                                    <tr>
                                    <td><?php echo $sr ;?></td>
                                    <td><?php echo  $row['invoice'] ;?></td>
                                    <td><?php echo  $row['delivery_date'] ;?></td>
                                    <td><?php echo $row['total_taka'] ;?></td>
                                     <td><?php echo $jela;?>, <?php echo $row['customer_thana'] ;?></td>
                                    <td ><a class="float-left" href="pickup-order-details.php?id=<?php echo $row['id'] ;?>" data-toggle="tooltip" data-placement="top" title="View Oreder Details"> <i class="fa fa-edit"></i></a>
                                    
                                    <a class="float-right" href="pickup_order-boy_details.php?boy_id=<?php echo $boyID ;?>" data-toggle="tooltip" data-placement="top" title="View Pickup Boy Details"> <i class="fa fa-edit"></i></a></td>
                                </tr>
 
                                                
                            <?php } } }?>
                               
                               
                               

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