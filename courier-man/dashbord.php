<?php 
session_start();
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    include 'inc/header.php';
include 'logical-query.php';
?>

<?php 
    
    

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
                <h3 class="page-title">Welcome <span class="btn btn-success btn-rounded"><?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?></span></h3>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
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
                    <h4 class="text-white font-weight-bold float-left p-t-10 "><i class="fa fa-balance-scale"></i> Your Financial Reports:</h4>
                    <a href="payment-histry.php"><button class="btn btn-rounded btn-light float-right deshbord-reports">View Financial Reports</button>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Column -->

                        <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-dark text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
                                        <?php 
                                     $total_balance = ($delicery_balance * 30); 
                                    
                                    echo $total_balance;
                                    
                                    ?></h1>
                                    <h6 class="text-white"> Total Balance</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span>
                                        <?php
                                     if(isset($total_balance)){
                                    $curnt = $total_balance - $pendingbalance;
                                    $curnt_balance = $curnt - $Paymentbalance;
                                     }
                                        echo $curnt_balance;
                                    ?>
                                    </h1>
                                    <h6 class="text-white">Current Balance</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-lg-3 col-xlg-3 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php echo $Paymentbalance;?></h1>
                                    <h6 class="text-white">Payment Balance</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xlg-3 col-xlg-3 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-primary text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/tk.png" alt=""></span> <?php echo $pendingbalance;?></h1>
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
                  
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Column -->

                        <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-main text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span>
                                        <?php echo $pickup_balance;?></h1>
                                    <h6 class="text-white">Total Pickup</h6>
                                </div>
                                <div class="bg-dark">
                                   
                                    <h5 class=" text-center m-t-10 font-weight-bold text-white"><span class="text-danger">Total Pickup </span>
                                    </h5>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xlg-6 deshbord-payment-items">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class=" font-weight-bold text-white"><span><img src="image/icon/order.png" alt=""></span><?php echo $delicery_balance; ?></h1>
                                    <h6 class="text-white"> Total Delivery</h6>
                                </div>
                                <div class="bg-dark">
                                    <?php
                                      $toal_delivery = $delicery_balance * 30; 
                                  
                                    ?>
                                    <h5 class=" text-center m-t-10 font-weight-bold text-white"><span class="text-danger">Total Delivery Balnace</span>
                                        <span class="font-15"> <?php echo $toal_delivery;?></span></h5>
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




<?php include'inc/footer.php'; 
}else{
         header("Location: login.php");
}
?>