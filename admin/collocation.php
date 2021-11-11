<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
include 'logical-query.php';
    
     $ID = mysqli_query($conn, "SELECT * FROM `desposit`");
        while ($row = mysqli_fetch_assoc($ID)){
    $id = $row['id'];
               }
     //approve payments
    if(isset($_POST['approve'])){
        $approve = mysqli_query($conn, "UPDATE `desposit` SET `status` = 'Success' WHERE `id` = '$id'");
        if($approve == true){
            echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold">Deposite is Approved. </sapn></h4>
           
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';
        }
    }
    
$sr = 0;
$sql = "SELECT * FROM `desposit` ORDER BY `desposit`.`id` ASC";
$result  = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
$sr ++; 
if($row['customer_jela'] = '112'){
$jela = 'ঢাকা'; 
}
$status = $row['status'];
$manID = $row['man_id'];
}
echo $manID;
//total  Deposit Payment
$sql  = "SELECT SUM(desposit_amount) FROM desposit WHERE man_id = '$manID'  ";
$result = mysqli_query($conn, $sql);
$payment_balance_row = mysqli_fetch_assoc($result);
$total_despoit_balance = $payment_balance_row['SUM(desposit_amount)'];


$msql = "SELECT * FROM `customer_order` WHERE delivery_boy_id = '$manID' AND status = 'Success' ";
$mresult  = mysqli_query($conn, $msql);
while($mrow = mysqli_fetch_assoc($mresult)){
}
//total  Deposit Payment
$sql  = "SELECT SUM(takeMoney) FROM customer_order WHERE delivery_boy_id = '$manID'  ";
$result = mysqli_query($conn, $sql);
$payment_balance_row = mysqli_fetch_assoc($result);
 $total_colloction = $payment_balance_row['SUM(takeMoney)'];


    
    
?>   
        
    
  <div class="page-wrapper">
      <div class="container-fluid">
           <!-- Dashbord Finaceal  -->
                <!-- ============================================================== -->
                <div class="deshbord-payment">
                        <div class="card">
                           <div class="card-header bg-warning">
                                <h4 class="text-white text-center font-weight-bold p-t-10 "><i class="fa fa-balance-scale"></i> Collocation Reports:</h4>
                           </div> 
                           
                        <div class="card-body">
                    <div class="row">
                        <!-- Column -->

                        <div class="col-md-4 deshbord-payment-items">
                            <div class="card card-hover">
                                <a href="total-collocation.php"><div class="box bg-success text-center">
                                     <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
                                        <?php echo $total_account_balance;?></h1>
                                    <h6 class="text-white">Collocation</h6>
                                </div></a>
                            </div>
                            </div>
                      
                        <div class="col-md-4 deshbord-payment-items">
                            <div class="card card-hover">
                                <a href="total-deposite.php"><div class="box bg-primary text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span><?php echo $total_ABalance;?></h1>
                                    <h6 class="text-white">Deposit</h6>
                                    </div></a>
                            </div>
                        </div>
                        
                        <div class="col-md-4 deshbord-payment-items">
                            <div class="card card-hover">
                                <a href="today-deposite.php"><div class="box bg-megna text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span><?php echo $total_account_balance - $total_ABalance;?></h1>
                                    <h6 class="text-white"> Deu Deposit</h6>
                                    </div></a>
                            </div>
                        </div>
                        
                        

                    </div>
                        </div>
                    </div>
                    
                    
                    <div class="card">
                        <div class="card-header bg-danger text-white font-18">
                                <strong>Pending Deposite</strong>
                            </div>
                        <div class="card-body">
                           
                    <div class="table-responsive">
                       <form action="" method="post">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Account ID </th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>Number</th>
                                    <th>Desposit</th>
                                    <th>Deu</th>
                                    <th>Status</th>
                                    <th>Desposit date:</th>
                                    <th>Acction:</th>
                                   
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                         
                                <?php
   
    
                                  $sr = 0;
                                    $sql = "SELECT * FROM `desposit` ORDER BY `desposit`.`id` ASC";

                                    $result  = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                            $sr ++; 
                                            if($row['customer_jela'] = '112'){
                                                $jela = 'ঢাকা'; 
                                            }
                                        $status = $row['status'];
                                        $manID = $row['man_id'];
                                        
                                        
                                        
                                   ?>
                                           
                                    <tr>
                                    <td><?php echo $sr ;?></td>
                                    <td><?php echo  $row['account_num'] ;?></td>
                                    <td><?php echo $row['name'] ;?></td>
                                    <td><?php echo $row['email'] ;?></td>
                                    <td><?php echo $row['number'] ;?></td>
                                    <td class="text-success font-20 font-weight-bold"><?php echo $row['desposit_amount'] ;?></td>
                                    
                                    
                                    <td class="text-danger font-20 font-weight-bold"><?php echo ($total_colloction - $total_despoit_balance);?></td>
                                    
                                    
                                    <td class="text-success font-20 font-weight-bold"><?php echo $row['status'] ;?></td>
                                  
                                  <td><?php echo $row['desposit_date'] ;?></td>
                                  
                                  <?php if($status == 'Success'){ ?>
                                  <td>
                                     <button type="button" name="approve" class="btn btn-rounded btn-dark">Approveed</button>
                                      
                                  </td>
                                    <?php }else{ ?>
                                     <td>
                                      <button type="submit" name="approve" class="btn btn-rounded btn-success">Approve</button>
                                  </td>
                                  <?php } ?>
                                </tr>
 
                                                
                            <?php }  ?>
                               
                               
                               

                            </tbody>
                           
                        </table>
                        </form>
                    </div>
                        </div>
                    </div>
                    
                </div><!-- ===========?End Finacial Dashbord====================== -->
                <!-- ============================================================== --> 
      </div>
  </div>
 




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>