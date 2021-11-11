<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';

     //select rate
    $showRate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rate"));
    $in = $showRate['in_d'];
    $out = $showRate['out_d'];
    
    if(isset($_POST['rate'])){
       $RES = mysqli_query($conn, "UPDATE rate SET in_d = '".$_POST['in']."', out_d = '".$_POST['out']."' ");
        if($RES == true){
           $error = '<div class="alert alert-success">
           <strong>Shipping rate set success.....</strong>
       </div>
        ';
        }
    }
    
?>   
     
   <div class="page-wrapper">
        <div class="container-fluid">
           <?php if(isset($error))echo $error;?>
            <div class="card m-t-20">
                <div class="card-header bg-info">
                    <h4 class="text-white p-t-10">Set Shipping Rate </h4>
                </div>
                <div class="card-body">
                   <strong>বর্তমানে নিজ শহর = ৳ <?= $in;?></strong> ||
                   <strong>বর্তমানে অন্য শহর = ৳ <?= $out;?></strong><br><br>
                    <form action="" method="post">
                        <div class="form-group">
                            <label><b>নিজ শহর </b></label>
                            <input type="text" class="form-control" name="in">
                        </div>
                        <div class="form-group">
                            <label><b>অন্য শহর </b></label>
                            <input type="text" class="form-control" name="out">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-rounded" type="submit" name="rate">Set Rate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
  




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>