
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
                 <h5 class="text-white p-t-10 text-center font-18 text-dark"> All Curiar Man's</h5>
             </div>
             
                <div class="card-body">
                   <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Sr No.</th>
                                <th>Account No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>District, Thana</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sr = 0;
                            $sql = "SELECT * FROM `curiar_boy_registration_tbl` ";
    
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $sr++;
                                        if($row['Cjela'] == '112'){
                                            $jela = 'ঢাকা ';
                                        }?>
                             
                            
                            <tr>
                                <td><?php echo $sr;?></td>
                                <td><?php echo $row['account_no']; ?></td>
                                <td><?php echo $row['curiar_boy_name'];?></td>
                                <td><?php echo $row['curiar_boy_email'];?></td>
                                <td><?php echo $row['Cnumber'];?></td>
                                <td><?php echo $jela;?>, <?php echo $row['Cthana'];?></td>
                                <td><a href="curiar-man-details.php?id=<?php echo $row['id'];?>" class="btn btn-outline-primary">View</a></td>
                            </tr>
                                  <?php } ?>
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

