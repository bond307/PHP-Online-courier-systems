<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
    
  
 <div class="page-wrapper">
     <div class="container-fluid">
         <div class="card">
                <div class="card-header bg-success">
                    <h4 class="text-white p-t-10"> Total Collocation</h4>
                </div>
                
                <div class="card-body">
                   <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-">
                        <thead class="bg-dark text-white ">
                            <tr>
                                <th>Sr No.</th>
                                <th>Account No</th>
                                <th>Name</th>
                                <th >Taka</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sr = 0;
                            $Csql = "SELECT * FROM `curiar_boy_registration_tbl` ";
                                $Cresult = mysqli_query($conn, $Csql);
                                while($Crow = mysqli_fetch_assoc($Cresult)){
    
                            $sql = "SELECT * FROM `customer_order` WHERE delivery_boy_id = '".$Crow['id']."' AND delivery = '".$Crow['curiar_boy_name']."' AND status = 'Success' ";
                            $Dresult = mysqli_query($conn, $sql);
                            while( $Drow = mysqli_fetch_assoc($Dresult)){
                                $sr++;
                                
                            ?>
                            <tr>
                               <td><?php echo $sr ;?></td>
                               <td class="text-danger font-16"><?php echo $Crow['account_no'];?></td>
                               <td><?php echo $Drow['delivery'];?></td>
                               <td class="text-danger font-18">
                               <?php 
                                
                                if($Drow['where_customer'] == 'ঢাকার_বাহিরে'){
                                     $OutDhaka = ($Drow['total_taka']+150);
                                    echo $OutDhaka;
                                }else{
                                    $InDhaka = ($Drow['total_taka']+80);
                                    echo $InDhaka;
                                }
                               
                                   ?>
                               </td>
                               <td><?php echo $Drow['delivery_date'];?></td>
                            </tr>
                                  <?php } }?>
                        </tbody>
                       </table>
                    </div>
                    
            
             
             
         </div>
     </div>
 </div>




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>