<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';


if(isset($_POST['submit'])){
    $name = $_POST['admin_name'];
    $pass = $_POST['pass'];
    $date = date('M-d-Y');
    $createby = $_SESSION['admin_name'];
    
    $sql = "INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`, `date`, `creator`) VALUES (NULL, '$name', '$pass', '$date', '$createby')";
    $res = mysqli_query($conn, $sql);
    if($res){
       $success = '
            <div class="alert alert-success"><p class="btn btn-rounded btn-success"> আপনি একজন এডমিন এড করেছেন। </p></div>
            ';
    }
}


?>   
        
    
  
 <div class="page-wrapper">
     <div class="container-fluid">
         <div class="col-md-6 offset-md-3">
             <div class="card">
                 <div class="card-header bg-danger">
                     <h3 class="text-white text-center p-10">Add new admin</h3>
                 </div>
                 <div class="card-body">
                     <form class="form-horizontal m-t-20" action="" method="post" enctype="multipart/form-data">
                        <div class="row p-b-30">
                            <div class="col-12">
                               
            
                               <?php if(isset($success)) echo $success;?>
                                
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Admin Name" required name="admin_name">
                                </div>
                             
                                
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div> 
                                     
                                            <input type="password" class="form-control pwd" placeholder="Password" name="pass">
                                            <div class="input-group-append">
                                                <span class="input-group-text reveal mous-hover" ><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        
                     
                                
                                <!-- email -->
                            </div>
                        </div>
                        <div class="row border-top border-secondary m-t-40">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group"><br>
                                    <div class="p-t-20 text-center">
                                        <button class=" width-100 btn btn-main btn-lg btn-info" type="submit" name="submit">Add Admin</button>
                                       
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




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>