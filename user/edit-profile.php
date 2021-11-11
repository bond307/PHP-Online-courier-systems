<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ 
include 'inc/header.php';  
include 'logical-query.php';

    if($_SESSION['jela'] = '112' ){
       $jela = 'Dhaka';
    }
    
    
    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['submit'])) {
    $uid = $_SESSION['id'];
     $name = $_POST['name'];
        $cName = $_POST['CName'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $furl = $_POST['faceUrl'];
        $wurl = $_POST['webUrl'];
        $jela = $_POST['jela'];
        $thana = $_POST['thana'];
        $FullAddress = $_POST['FullAddress'];
    
        /*$pass = md5($_POST['pass']);
         $profile = $_FILES['profile']['name'];
    $target = 'UserProfile/'. $profile;*/
    
    
    $sql = "UPDATE customer_registration_tbl SET `name` = '$name', `Cname` = '$cName', `email` = '$email', `number` = '$number', `Flink` = '$furl', `Wlink` = '$wurl', `jela` = '$jela', `thana` = '$thana',`FullAddress` = '$FullAddress' WHERE id = '$uid' ";
    
    $result = mysqli_query($conn, $sql);
    
    if($result){
        $_SESSION['UpdateSuccess'] = '<p class="page-title alert alert-success"><span class="btn btn-success btn-rounded"> Profile Information is Update Now!</p>';
        echo '<meta http-equiv="refresh" content="0; url=profile.php" />';
    }



}
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
                 <div class="profile-balance bg-megna">
                     <h3><span><img src="image/icon/tk.png" alt=""></span> <?php echo '100' ;?></h3>
                     <p>Total Balance</p>
                 </div>
                  <div class="profile-balance bg-warning">
                     <h3><span><img src="image/icon/tk.png" alt=""></span> <?php echo '100' ;?></h3>
                     <p>Current balance</p>
                 </div>
                  <div class="profile-balance bg-success">
                     <h3><span><img src="image/icon/tk.png" alt=""></span> <?php echo '100' ;?></h3>
                     <p>Payment Balance</p>
                 </div>
                 <div class="profile-balance bg-danger">
                     <h3><span><img src="image/icon/tk.png" alt=""></span> <?php echo '100' ;?></h3>
                     <p>Case Withdraw Painding</p>
                 </div>
                 
             </div>   
             </div>         
                         
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                         <h5 class="card-title">Your Profile Information:</h5>
                     </div>
                     <div class="card-body">
                        <?php if(isset($_SESSION['UpdateSuccess'])) echo $_SESSION['UpdateSuccess'];?>
                         <form action="" method="post">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Name:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['name'];?>" name="name">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Company Name:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['cname'];?>" name="CName">
                                 </div>
                             </div>
                             
                              <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Email:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['email'];?>" name="email">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Number:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['number'];?>" name="number">
                                 </div>
                             </div>
                             
                                 <div class="form-group col-md-12 row">
                                     <label>Facebook URL:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['Flink'];?>" name="faceUrl">
                                 </div>
                                 
                                 <div class="form-group col-md-12 row">
                                     <label>Website URL:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['Wlink'];?>" name="webUrl">
                                 </div>
                             
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label>Jela:</label>
                                     <input type="text" class="form-control" value="<?php echo $jela;?>" name="jela">
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                     <label>Thana:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['thana'];?>" name="thana">
                                 </div>
                             </div>
                             
                               <div class="form-group col-md-12 row">
                                     <label>Full Address:</label>
                                     <input type="text" class="form-control" value="<?php echo $_SESSION['FullAddress'];?>" name="FullAddress">
                                 </div>
                             
                             
                             </div>
                             
                             <button class="btn btn-skype font-weight-bold " type="submit" name="submit">Update Now</button>
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