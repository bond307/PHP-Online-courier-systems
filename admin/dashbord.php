<?php 
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
    
include 'inc/header.php';
include 'logical-query.php';
?>

        
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h3 class="page-title">This is admin dashbord.  <span class="btn btn-success btn-rounded"><?php if(isset($_SESSION['admin_name'])) echo $_SESSION['admin_name'];?></span></h3>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
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
                                <h4 class="text-white font-weight-bold float-left p-t-10 "><i class="fa fa-balance-scale"></i> Order's Reports:</h4>
                               
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                    <!-- Column -->
                    
                      <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                               <?php echo $total_order;?>
                                </h1>
                                <h6 class="text-white">Total Order's</h6>
                            </div>
                        </div> 
                    </div>
                     
                    
                    <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                               <?php echo $success_order;?>
                                </h1>
                                <h6 class="text-white">Success Order's</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-purple text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                  <?php echo $receive_order;?>
                                </h1>
                                <h6 class="text-white">Receive Order's</h6>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                  <?php echo $pending_order;?>
                                </h1>
                                <h6 class="text-white">Pending Order's</h6>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                  <?php echo $return_order;?>
                                </h1>
                                <h6 class="text-white">Return Order's</h6>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-md-2 col-lg-2 col-xlg-2 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                  <?php echo $cancel_order;?>
                                </h1>
                                <h6 class="text-white">Cancel Order's</h6>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- Column -->
                            </div>
                        </div>
                    </div>
                </div><!-- ===========?End Finacial Dashbord====================== -->
                <!-- ============================================================== -->
                  
                  
                  
                <div class="deshbord-order">
                        <div class="card">
                           <div class="card-header bg-dark">
                                <h4 class="text-white font-weight-bold float-left p-t-10"><i class="fa fa-balance-scale"></i> Your Pickup and Delivery Report's:</h4>
                               
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                    <!-- Column -->
                    
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                 <?php echo $pickup_order;?></h1>
                                <h6 class="text-white">Total Pickup</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span><?php echo $delivery_order; ?></h1>
                                <h6 class="text-white"> Total Delivery</h6>
                            </div>
                        </div>
                    </div>
                            </div>
                               </div>
                                 
                                  
                    <!-- Column -->
                            </div>
                        </div>
                        
                        
                        
                   
                <div class="deshbord-order">
                        <div class="card">
                           <div class="card-header bg-success">
                                <h4 class="text-white font-weight-bold float-left p-t-10"><i class="fa fa-balance-scale"></i> Customer Payment's Reports:</h4>
                               
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                    <!-- Column -->
                    
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-main text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                 <?php echo $customer_payment_ruquest;?></h1>
                                <h6 class="text-white">Payment Request</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span><?php echo $customer_success_payment; ?></h1>
                                <h6 class="text-white"> Success Payment's</h6>
                            </div>
                        </div>
                    </div>
                            </div>
                               </div>
                    
                    <!-- Column -->
                            </div>
                        </div> 
                        
                                          
                                                            
                                                                              
        
                       
                <div class="deshbord-order">
                        <div class="card">
                           <div class="card-header bg-dark">
                                <h4 class="text-white font-weight-bold float-left p-t-10"><i class="fa fa-balance-scale"></i> Couriar Boy Payment's Reports:</h4>
                               
                           </div>
                           
                        <div class="card-body">
                              <div class="row">
                    <!-- Column -->
                    
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
                                 <?php echo $curiarboy_payment_ruquest;?></h1>
                                <h6 class="text-white">Payment Request</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span><?php echo $curiarboy_succss_payment; ?></h1>
                                <h6 class="text-white"> Success Payment's</h6>
                            </div>
                        </div>
                    </div>
                            </div>
                               </div>
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