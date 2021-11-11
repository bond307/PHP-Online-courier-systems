<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
    
  
 <div class="page-wrapper">
     <div class="container-fluid">
               <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white p-t-10"> Today Deposite </h4>
                </div>
                
                <div class="card-body m-t-5">
                   <div class="table-responsive m-t-40">
                   
                    <table id="zero_config" class="table table-striped table-">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Sr No.</th>
                                <th>Amount</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sr = 0;
                            
                            $sql = "SELECT * FROM `desposit`";
                            $Dresult = mysqli_query($conn, $sql);
                            while( $row = mysqli_fetch_assoc($Dresult)){
                                $sr++;
                            ?>
                            <tr>
                               <td><?php echo $sr ;?></td>
                               <td  class="text-danger font-16"><?php echo $row['desposit_amount'];?></td>
                               <td><?php echo $row['name'];?></td>
                               <td><?php echo $row['number'];?></td>
                               <td><?php echo $row['email'];?></td>
                               <td><?php echo $row['desposit_date'];?></td>
                               
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