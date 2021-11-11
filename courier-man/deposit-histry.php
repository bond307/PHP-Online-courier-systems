<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
   <style>
       .table td{
           width: 60%;
       }
</style>     
    <div class="page-wrapper">
        <div class="container-fluid">
            
             
            <div class="card m-t-40">
                <div class="card-header bg-success">
                    <h4 class="text-white">আপ ফলাফল সমুহঃ </h4>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Account ID </th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>Number</th>
                                    <th>desposit_amount</th>
                                    <th>Status</th>
                                    <th>desposit_date:</th>
                                   
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php 
                                  $sr = 0;
                                    $sql = "SELECT * FROM `desposit` WHERE   man_id = '".$_SESSION['id']."' ";

                                    $result  = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $sr ++; 

                                            if($row['customer_jela'] = '112'){
                                                $jela = 'ঢাকা'; 
                                            }
                                   ?>
                                           
                                    <tr>
                                    <td><?php echo $sr ;?></td>
                                    <td><?php echo  $row['account_num'] ;?></td>
                                    <td><?php echo $row['name'] ;?></td>
                                    <td><?php echo $row['email'] ;?></td>
                                    <td><?php echo $row['number'] ;?></td>
                                    <td class="text-danger font-20 font-weight-bold"><?php echo $row['desposit_amount'] ;?></td>
                                    <td class="text-danger font-20 font-weight-bold"><?php echo $row['status'] ;?></td>
                                  
                                  <td><?php echo $row['desposit_date'] ;?></td>
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