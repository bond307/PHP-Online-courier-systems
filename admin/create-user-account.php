<?php


include 'lib/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['submit'])) {

     
    
    
          $name = $_POST['name'];
        $cName = $_POST['cName'];
        $email = $_POST['email'];
   
        $number = $_POST['number'];
    
        $furl = $_POST['furl'];
   
        $wurl = $_POST['wurl'];
    
        $jela = $_POST['jela'];
   
        $thana = $_POST['thana'];
        $FullAddress = $_POST['FullAddress'];
        $pass = md5($_POST['pass']);
  
         $profile = $_FILES['profile']['name'];
    $target = '../user/UserProfile/'. $profile;
    
    $acount_Number = rand();
    
    
if(move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
    
    $sql = "INSERT INTO `customer_registration_tbl` (`id`, `customer_account_number`, `profilePic`, `name`, `Cname`, `email`, `number`, `Flink`, `Wlink`, `jela`, `thana`, `pass`, `FullAddress`, `status`) VALUES (NULL, '$acount_Number', '$profile', '$name', '$cName', '$email', '$number', '$furl', '$wurl', '$jela', '$thana', '$pass', '$FullAddress', 'ON')";
    
    $result = mysqli_query($conn, $sql);
        
    if($result){
       $success = '<div class="alert alert-success mb-3"><a href="dashbord.php" class="text-white font-weight-bold btn btn-rounded btn-success">User Create Success. Go to the Dashbord. </a></div>';
    
    }
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Dashbor::Create a new customer account.</title>
    <!-- Custom CSS -->
    <link href="dist/css/icons/font-awesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/mainstyle.css" rel="stylesheet">
    <link href="dist/css/custom.css" rel="stylesheet">
</head>

<body>


<div class="registration">
    <div class="container">
        <div class="container-fluid">
            
               <div class="col-md-10 offset-md-1 col-sm-12">
               <?php if(isset($success)) echo $success;?>
                <div class="registration-form">
                  <h4 class="text-center m-20">Add New Customer</h4>
                  
                    <form class="form-horizontal m-t-20" action="" method="post" enctype="multipart/form-data">
                        <div class="row p-b-30">
                            <div class="col-12">
                              <div class="col-md-4 offset-md-4">
                                <div class="form-group">
                                  <div class="input-group mb-3">
                                    <img src="image/profile-placeholder.png" onclick="triggerClick()" id="ImgDisplay" alt="">
                                    <label class="text-center">প্রোফাইল ছবি আপলোড করুন </label>
                                    <input type="file" onchange="DisplayImg(this)" name="profile" id="profile" style="display: none;">
                                </div>
                                  </div>
                              </div>
                               <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="নাম..."  name="name" required>
                                </div>
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fas fa-store-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="কোম্পানি / শপ নাম..."  required name="cName">
                                </div>
                               </div>
                               
                               
                               <div class="row">
                                   <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="ইমেল লিখু..." required name="email">
                                </div>
                                
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" placeholder="ফোন নাম্বার..." required name="number">
                                </div>
                                
                               </div>
                                
                                 
                                
                                
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-facebook-f"></i></span>
                                    </div>
                                    <input type="url" class="form-control" placeholder="ফেসবুক এর পেইজ লিঙ্ক..." required name="furl">
                                </div>
                                
                                
                                
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-globe"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ওয়েবসাইটের লিঙ্ক। (যদি থাকে)..." aria-label="Username" aria-describedby="basic-addon1" name="wurl">
                                </div>
                                
                                
                               <div class="row">
                                   <div class="col-md-6">
                                         <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                    <select class="select2 form-control custom-select" name="jela" id="jela">
                                          <option value="" selected disabled> জেলা সিলেক্ট করুন....</option>
                                          <?php 
                                            $sql = "SELECT * FROM `district`";
                                            $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                          ?>
                                          <option value="<?php echo $row['id'];?>"><?php echo $row['district'];?></option>
                                          <?php }; ?>
                                           
                                        </select>
                                </div>
                                
                                   </div>
                                   
                                   <div class="col-md-6">
                                          
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-map-marker-alt"></i></span>
                                    </div> 
                                    <select class="select2 form-control custom-select" name="thana" id="thana">
                                            <option value="" selected disabled>থানা সিলেক্ট করুন...</option>
                                        </select>
                                </div>
                                   </div>
                               </div>
                             
                                
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div> 
                                     
                                            <input type="password" class="form-control pwd" placeholder="Aejfi#@12395" name="pass">
                                            <div class="input-group-append">
                                                <span class="input-group-text reveal mous-hover" ><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                
                                
                                
                                  <div class="input-group mb-3">
                                   <textarea class="form-control height-140" placeholder="আপনার সম্পুর্ন ঠিকানাটি..." name="FullAddress" required></textarea>
                                </div>
                                <!-- email -->
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <div class="p-t-20 text-center">
                                        <button class=" width-100 btn btn-main btn-lg btn-info" type="submit" name="submit">Sign Up</button>
                                      
                                       <a class="m-t-20 p-t-20" href="dashbord.php">Deshbord</a>
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
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->

<script>

    
//Jela / thana fatche
$(document).ready(function(){
    $('#jela').on('change', function(){
        var jelaId = $(this).val();
        
        $.ajax({
        
            method: "POST",
            url: "ajex.php",
            data:{ id: jelaId },
            dataType: "html",
            success:function(data){
                $("#thana").html(data);
            }
            
        });
        
        
    });
});

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