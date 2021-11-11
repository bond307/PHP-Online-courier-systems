<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ 
include 'inc/header.php';  
include 'logical-query.php';

    if($_SESSION['jela'] = '112' ){
       $jela = 'Dhaka';
    }

?>   
        
    
  
 <div class="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-4 card bg-white"><br>
                 <div class="profile-image">
                     <img class="img-thumbnail" src="UserProfile/<?php echo $_SESSION['profilePic'];?>" alt="">
                 </div>
                 <div class="card-body">
                   <div class="col-md-12 col-lg-12 col-xlg-12 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php  echo $total_balance;?></h1>
                                <h6 class="text-white">Total Balance Balance</h6>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-12 col-lg-12 col-xlg-12 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
                                <?php
                                   

                            if(isset($total_curent_balance)){
                                $curnt = $total_curent_balance - $Painding_balance;
                                $curnt_balance = $curnt - $payment_balance;
                                echo $curnt_balance;
                            }

                                    ?>
                                </h1>
                                <h6 class="text-white">Current Balance</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-12 col-xlg-12 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php echo $payment_balance;?></h1>
                                <h6 class="text-white">Payment Balance</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xlg-12 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php echo $Painding_balance;?></h1>
                                <h6 class="text-white">Pinding Cash Withdrow</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                 
             </div>   
             </div>         
                         
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title">Your Profile Information:</h5>
                     </div>
                     <div class="card-body">
                       
                    <?php if(isset($_SESSION['UpdateSuccess']) ) echo $_SESSION['UpdateSuccess'];?>
                         <form action="" method="post">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Name:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['name'];?>">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Company Name:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['cname'];?>">
                                 </div>
                             </div>
                             
                              <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Email:</label>
                                     <input type="email" readonly class="form-control" value="<?php echo $_SESSION['email'];?>">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Number:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['number'];?>">
                                 </div>
                             </div>
                             
                                 <div class="form-group col-md-12 row">
                                     <label>Facebook URL:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['Flink'];?>">
                                 </div>
                                 
                                 <div class="form-group col-md-12 row">
                                     <label>Website URL:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['Wlink'];?>">
                                 </div>
                             
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Jela:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $jela;?>">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Thana:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['thana'];?>">
                                 </div>
                             </div>
                             
                               <div class="form-group col-md-12 row">
                                     <label>Full Address:</label>
                                     <input type="text" readonly class="form-control" value="<?php echo $_SESSION['FullAddress'];?>">
                                 </div>
                             
                             
                             </div>
                             
                         <button class="btn btn-warning font-weight-bold col-md-12"><a href="edit-profile.php">Edit </a></button>
                         </form>
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