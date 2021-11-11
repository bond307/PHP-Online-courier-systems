<?php
    session_start();

include 'lib/db.php';




    //Check user is valid or not valied
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['submit'])) {
            
            $to_email = $_POST['email'];
           
            
           $sql = "SELECT * FROM customer_registration_tbl WHERE email = '$to_email' ";
            $result  = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result )){
                    $subject = 'Dhaka Courier:: Forget your password';
                    $body = 'Your new password is: '.$row['pass'].'';
                    $header = 'From: support@dhakacitycourier.com ';
                    
                    if(mail($to_email, $subject, $body, $header)){
                        $success = '
                            <div class="alert alert-success"><p class="btn btn-rounded btn-success">Success</p> Send your password in this <b>'.$to_email.'</b> Email</div>
                            ';
                    }else{
                         $success = '
                            <div class="alert alert-danger"><p class="btn btn-rounded btn-danger">Somethis is worng, We Promiss, We are back soon.</p></div>
                            ';
                    }
                }
            }else{
                $success = '
                            <div class="alert alert-danger"><p class="btn btn-rounded btn-danger">Sorry!</p> This email in dose not match in your account email.</div>
                            ';
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
    <title>Nogor-Curiar Service::Forget password.</title>
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
                <div class="registration-form">
                  
                  <div class="registra-logo col-md-4 offset-md-2">
                      
                  </div>
                  
                    <form class="form-horizontal m-t-20" action="" method="post" >
                        <div class="row p-b-30">
                            <div class="col-12">
                               <h3 class="text-danger text-center p-20">Re-set your password</h3>
            
                               <?php if(isset($success)) echo $success;?>
                               <?php if(isset($pas)) echo $pas;?>
                               <?php if(isset($row['email'])) echo $row['email'];?>
                                
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ইমেল লিখুন" required name="email">
                                </div>
                             
                                
                                <!-- email -->
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <div class="p-t-20 text-center">
                                        <button class=" width-100 btn btn-main btn-lg btn-info" type="submit" name="submit">Re-set</button>
                                       
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