<?php 
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    include 'inc/header.php';
include 'logical-query.php';
?>
   
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Dashbord Finaceal  -->
                <!-- ============================================================== -->
                <div class="deshbord-payment">
                        <div class="card">
                           <div class="card-header bg-cyan">
                                <h4 class="text-white font-weight-bold float-left p-t-10 "><i class="fa fa-balance-scale"></i> Your Financial Reports:</h4>
                                <a href="payment-histry.php"><button class="btn btn-rounded btn-light float-right deshbord-reports">View  Financial Reports</button>
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                    <!-- Column -->
                 
                    <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
<?php
echo $total_balance;
    ?>
                                  </h1>
                                <h6 class="text-white">Total Balance Balance</h6>
                            </div>
                        </div>
                    </div>
                    
                       <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
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
                    
                    <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php echo $payment_balance;?></h1>
                                <h6 class="text-white">Payment Balance</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
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
                    </div>
                </div><!-- ===========?End Finacial Dashbord====================== -->
                <!-- ============================================================== -->
                <!-- Dashbord Order  -->
                <!-- ============================================================== -->
                <div class="deshbord-order">
                        <div class="card">
                           <div class="card-header bg-orange">
                                <h4 class="text-white font-weight-bold float-left p-t-10"><i class="fa fa-balance-scale"></i> Your Order's Reports:</h4>
                                <a href="order-list.php"><button class="btn btn-rounded btn-light float-right deshbord-reports">View Order's Reports</button>
                                </a>
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                     
                     <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $PaindingOrders; ?></h1>
                                <h6 class="text-white">Pending Order's</h6>
                            </div>
                        </div>
                    </div><!---- Pending order ----->  
                      
                   
                     <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $ReceiveOrders; ?></h1>
                                <h6 class="text-white">Receive Order's</h6>
                            </div>
                        </div>
                    </div><!---- Reciv order ----->  
                      
                   <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $whereHouse; ?></h1>
                                <h6 class="text-white">Where House</h6>
                            </div>
                        </div>
                    </div><!---- where house -----> 
                      
                     
                    <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $Processing; ?></h1>
                                <h6 class="text-white">Shipping Order's</h6>
                            </div>
                        </div>
                    </div><!------- shippin order----->
                    
                     
                     <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $CancelOrders; ?></h1>
                                <h6 class="text-white">Cancel Order's</h6>
                            </div>
                        </div>
                    </div><!--- End ccancel order -----> 
                                         
                              
                     <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span> <?php echo $ReturnOrders; ?></h1>
                                <h6 class="text-white">Return  Order's</h6>
                            </div>
                        </div>
                    </div><!--- End Return order -----> 
                    <!-- Column -->
                    <div class="col-md-3 col-lg-3 col-xlg-3  deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span><?php echo $SuccessOrders; ?></h1>
                                <h6 class="text-white">Success Order's</h6>
                            </div>
                        </div>
                    </div><!--- End success order -----> 
                    <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                 <?php echo $TotalOrders;?></h1>
                                <h6 class="text-white">Total Order's</h6>
                            </div>
                        </div>
                    </div><!--- end total order -----> 
                    
                   
                   
                    
                     
                    <!-- Column -->
                            </div>
                        </div>
                    </div>
                </div><!-- ===========?End Finacial Dashbord====================== -->
                <!-- ============================================================== -->
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->



<?php include'inc/footer.php'; 
}else{
         header("Location: login.php");
}
?>