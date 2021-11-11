<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['submit'])) {
       $rand = rand(0000,9999);
    
    
         $profile = $_FILES['profile']['name'];
         $Ptarget = 'curiarboyProfile/profile/'. $profile;
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $jela = $_POST['jela'];
        $thana = $_POST['thana'];
        $FullAddress = $_POST['FullAddress'];
        $pass = md5($_POST['pass']);
    
       $crName = $_POST['CRname'];
       $crNumber = $_POST['CRnumber'];
        
         $CFrontidCard = $_FILES['front_card']['name'];
         $CFtarget = 'curiarboyProfile/curiarboyIDcard/'.$CFrontidCard;
    
         $CbackidCard = $_FILES['back_card']['name'];
         $CBtarget = 'curiarboyProfile/curiarboyIDcard/'. $CbackidCard;
    
    
         $CrFrontIDcard = $_FILES['RFront_card']['name'];
         $CrFtarget = 'curiarboyProfile/curiarReferencID/'. $CrFrontIDcard;
    
        $CrBackIDcard = $_FILES['Rback_card']['name'];
         $CrBtarget = 'curiarboyProfile/curiarReferencID/'. $CrBackIDcard;
    
  
 
    $acount_Number = rand();
    
    $sql = "INSERT INTO `curiar_boy_registration_tbl` (`id`, `account_no`, `profile`, `curiar_boy_name`, `curiar_boy_email`, `curiar_boy_password`, `Cnumber`, `Cjela`, `Cthana`, `C_ID_Front`, `C_ID_Back`, `CfullAddress`, `CrName`, `CrNumber`, `Cr_ID_Front`, `Cr_ID_Back`) 
    VALUES (NULL, '$acount_Number', '$profile', '$name', '$email', '$pass', '$number', '$jela', '$thana', '$CFrontidCard', '$CbackidCard', '$FullAddress', '$crName', '$crNumber', '$CrFrontIDcard', '$CrBackIDcard')";

    //move uploadet file
    move_uploaded_file($_FILES['profile']['tmp_name'],  $Ptarget);
    move_uploaded_file($_FILES['front_card']['tmp_name'], $CFtarget);
    move_uploaded_file($_FILES['back_card']['tmp_name'], $CBtarget);
    move_uploaded_file($_FILES['RFront_card']['tmp_name'], $CrFtarget);
    move_uploaded_file($_FILES['Rback_card']['tmp_name'], $CrBtarget);
    $result = mysqli_query($conn, $sql);
    
    if($result){
        $success = '<div class="alert alert-success"><p class="btn btn-success btn-rounded">Curiar account create Success</p></div>';
    }
    

}

}
?>
    
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                   
                   <?php if(isset($success)) echo $success;?>
                   
                    <h3 class="text-center text-warning">Add New Curiar Boy Account</h3>
                    <hr class="bg-warning">
                    <div class="curiar-account col-md-10 col-sm-12 offset-md-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-4 offset-md-4 m-b-30 admin_couriar_account">
                                <div class="form-group">
                                  <label class="text-center m-b-10">প্রোফাইল ছবি আপলোড করুন </label>
                                  <div class="input-group mb-3">
                                    <img src="image/profile-placeholder.png" onclick="triggerClick()" id="ImgDisplay" alt="" style="height: 200px; width: 200px; border-radius: 100%;">
                                   
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
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ফোন নাম্বার"  required name="number">
                                </div>
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ইমেইল"  required name="email">
                                </div>
                                    
                                    
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder=" পাসওয়ার্ড "  required name="pass">
                                </div>
                                    
                                 
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
                                   
                                   
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    <input type="file" class="form-control" id="FID" required name="front_card" >
                                </div> 
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    <input type="file" class="form-control" id="FID2" required name="back_card">
                                    
                                </div>
                                  
                                
                                   <div class="input-group mb-3 p-l-20 p-r-20">
                                   <textarea class="form-control height-140" placeholder="সম্পুর্ন ঠিকানাটি..." name="FullAddress" required></textarea>
                                </div>
                                
                                
                                    <h5 class="pt-2 pb-2 bg-primary p-10 text-center width-100 text-white"> রেফারেন্সকারির ইনফরেন </h5>
                                
                                   <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="নাম..."  name="CRname" required>
                                </div>
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ফোন নাম্বার"  required name="CRnumber">
                                </div>
                                
                                     
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    <input type="file" class="form-control" id="FID" required name="RFront_card">
                                    
                                </div> 
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    <input type="file" class="form-control" id="FID2" required name="Rback_card" >
                                    
                                </div>
                                
                              </div>
                              <button class="btn btn-rounded btn-primary col-md-4 offset-md-4 m-t-40" type="submit" name="submit">Create</button>
                        </form>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>



<script src="dist/js/custom.js"></script>
<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>