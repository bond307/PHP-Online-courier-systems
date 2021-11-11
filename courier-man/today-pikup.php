<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
      
   <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card m-t-20">
                <div class="card-header bg-info">
                    <h4 class="text-white p-t-10">Total Pickup Order's </h4>
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
                                      <th>Jela & Distric</th>
                                    <th>Acction</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php 
                                  $sr = 0;
                            $date = date('M-d-Y');
                             $checkPik = mysqli_query($conn, "SELECT * FROM `pickup_order`");
                                while($rowpik = mysqli_fetch_assoc($checkPik)){
                                      $boyID = $rowpik['boy_id'];
                               
                                    if(mysqli_num_rows($checkPik) > 0) {
                                        
                                        
                                    $sql = "SELECT * FROM `customer_order` WHERE pickup = '1' AND pickup_date = '$date' AND status = 'send_workhouse'   ";

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
                                    <td><?php echo  $row['pickup_date'] ;?></td>
                                    <td><?php echo $row['total_taka'] ;?></td>
                                     <td><?php echo $jela;?>, <?php echo $row['customer_thana'] ;?></td>
                                    <td ><a class="float-left" href="pickup-order-details.php?id=<?php echo $row['id'] ;?>" data-toggle="tooltip" data-placement="top" title="View Oreder Details"> <i class="fa fa-edit"></i> View</a>
                                    
                                  </td>
                                        <td><button class="btn btn-warning"><?php echo $row['status'] ;?></button></td>
                                </tr>
 
                                                
                            <?php } } } ?>
                               
                               
                               

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