<?php
    session_start();

include 'lib/db.php';
if(isset($_GET['succcess'])){
  $success = '<div class="alert alert-success">
                     আপনার রেজস্ট্রশন্টি সফল হয়েছে। আপনি লগ-ইন করতে পারেন। 
                 </div>';
}
    //Check user is valid or not valied
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['submit'])) {
            
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            
            $sql = "SELECT * FROM `customer_registration_tbl` WHERE email = '$email' AND pass = '$pass' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    
                $_SESSION['id'] = $row['id']; 
                $_SESSION['profilePic'] = $row['profilePic']; 
                $_SESSION['account_number'] = $row['customer_account_number']; 
                $_SESSION['name'] = $row['name']; 
                $_SESSION['cname'] = $row['Cname']; 
                $_SESSION['email'] = $row['email']; 
                $_SESSION['number'] = $row['number']; 
                $_SESSION['Flink'] = $row['Flink']; 
                $_SESSION['Wlink'] = $row['Wlink']; 
                $_SESSION['jela'] = $row['jela']; 
                $_SESSION['thana'] = $row['thana']; 
                $_SESSION['FullAddress'] = $row['FullAddress'];
                    
                    header("Location: dashbord.php");
                
                
                }
            }else{
                $userNotValid = '<p class="page-title alert alert-danger"><span class="btn btn-danger btn-rounded"> দুঃখিত ! </span> আপনার রেকর্ট গুলো পাওয়া যাই নি। দয়া করে আগে রেজিস্ট্রেশন করুন। </p>';
            }

        }

    }
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon.ico">
    <title>Nogor-Curiar Service::Customer dashbord.</title>
    <!-- Custom CSS -->
    <link href="dist/css/icons/font-awesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/mainstyle.css" rel="stylesheet">
    <link href="dist/css/custom.css" rel="stylesheet">
</head>

<body>


<div class="registration">
    <div class="container">
        <div class="container-fluid"><br><br><br>
            
               <div class="col-md-6 offset-md-3 col-sm-12">
                <?php if(isset($success)) echo $success;?>
                <div class="registration-form">
                
                    <form class="form-horizontal m-t-20" action="" method="post" enctype="multipart/form-data">
                        <div class="row p-b-30">
                            <div class="col-12">
                               
            
                               <?php if(isset($userNotValid)) echo $userNotValid;?>
                                
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ইমেল লিখুন" required name="email">
                                </div>
                             
                                
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div> 
                                     
                                            <input type="password" class="form-control pwd" placeholder="পাসওয়ার্ড লিখুন" name="pass">
                                            <div class="input-group-append">
                                                <span class="input-group-text reveal mous-hover" ><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        
                                        
                        <div class="form-group m-t-20">
                            <p><a href="forget-password.php">Forget Password</a></p>
                        </div>
                                
                                
                                <!-- email -->
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <div class="p-t-20 text-center">
                                        <button class=" width-100 btn btn-main btn-lg btn-info" type="submit" name="submit">লগিন করুন</button>
                                        <p class="p-t-20">আপনার একাউন্ট নেই ? </p>
                                       <a href="registration.php"> রেজিস্ট্রেশন করুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>





<!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <script>
    $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
    </script>
    
    
</body>

</html>