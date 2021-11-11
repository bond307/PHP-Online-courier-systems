<?php 
include 'lib/db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nayon Talukder">
    
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/quill/dist/quill.snow.css">

    <link href="dist/css/icons/font-awesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/mainstyle.css" rel="stylesheet">
    
    
    <link href="dist/css/custom.css" rel="stylesheet">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="image/logo2.png">
    <title>Nogor-Curiar Service::Customer dashbord.</title>
     <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> 
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="fa fa-bars ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        
                       <b class="logo-icon"> 
                            
                              
                           <a href="dashbord.php"><img src="image/logo-light.png" alt="homepage" class="light-logo" /> </a>
                        </b>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-ellipsis-h"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                      <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="fa fa-bars font-24"></i></a></li> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="add-admin.php" ><button class="btn btn-warning btn-sm btn-round">Create New Admin</button></a>
                           
                        </li>
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                       <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-warning">Create New Order</button></a>
                           
                        </li>-->
                          

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== --> <li class="nav-item dropdown">
                             <div class="p-l-30 p-10"><a href="logout.php" class="btn btn-sm btn-danger btn-rounded">Log Out</a></div>
                        </li>
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashbord.php" aria-expanded="false"><i class="fa fa-th-large"></i><span class="hide-menu">Dashboard</span></a></li> 
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="collocation.php" aria-expanded="false"><i class=" fas fa-money-bill-alt"></i> <span class="hide-menu"> Collocation Report's</span></a></li>
                        
                        
                       
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-people-carry"></i>&nbsp; <span class="hide-menu">Order's Histry</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="today-order.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Today Order's </span></a></li>
                                <li class="sidebar-item"><a href="total-order.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Total Order's </span></a></li>
                                <hr>
                                 <li class="sidebar-item"><a href="today-pikup.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Today Pickup </span></a></li>
                                <li class="sidebar-item"><a href="total-pickup-order.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Pickup Order Histry </span></a></li>
                                <hr>
                                <li class="sidebar-item"><a href="total-delivery-order.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Delivery Order Histry </span></a></li>
                            </ul>
                        </li>
                        
                        
                        
                         
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-hand-holding-usd "></i>&nbsp; <span class="hide-menu">Payment's Request</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="customer-payment-requst.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu">Customer Payment's Request </span></a></li>
                                
                                <li class="sidebar-item"><a href="curiar-boy-payment-request.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Curiar Payment's Request</span></a></li>
                            </ul>
                        </li>
                        
                        
                          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-money-bill-alt "></i>&nbsp; <span class="hide-menu">Payment's Histry</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="customer-payment-histry.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu">Customer Payment's Histry </span></a></li>
                                
                                <li class="sidebar-item"><a href="curiar-boy-payment-history.php" class="sidebar-link"><i class="fa fa-list"></i><span class="hide-menu"> Curiar Payment's Histry</span></a></li>
                            </ul>
                        </li>
                        
                       
                  <li><hr class="bg-light"></li>
                        
                        
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-user-plus"></i>&nbsp;<span class="hide-menu">Create new User's</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="create-curiar-account.php" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Add New Curiar Boy </span></a></li>
                                
                                <li class="sidebar-item"><a href="create-user-account.php" class="sidebar-link"><i class="fas fa-user-plus"></i><span class="hide-menu"> Add New Customer </span></a></li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-users"></i>&nbsp;<span class="hide-menu">Manage new User's</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="all-curiar-boy.php" class="sidebar-link"><i class="fas fa-users"></i><span class="hide-menu"> All Curiar Boy </span></a></li>
                                
                                <li class="sidebar-item"><a href="all-customer.php" class="sidebar-link"><i class="fas fa-users"></i><span class="hide-menu"> All Customer </span></a></li>
                            </ul>
                        </li>
                        
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="set-rate.php" aria-expanded="false"><i class=" fas fa-cog"></i> <span class="hide-menu">Set Shipping Rate</span></a></li>
                        
                           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reset-pass.php" aria-expanded="false"><i class=" fas fa-lock"></i> <span class="hide-menu">Re-set Password</span></a></li>
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        