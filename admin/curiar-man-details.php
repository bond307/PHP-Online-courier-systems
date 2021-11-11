<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
 
 $id = $_GET['id'];    
$sql = "SELECT * FROM `curiar_boy_registration_tbl` WHERE id = '$id' ";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
            
        if($row['Cjela'] == '112'){
            $jela = 'ঢাকা ';
        }

?>   
        
    
   
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                   
                   
                   
                    <h3 class="text-center text-warning"><?php echo $row['curiar_boy_name'] ;?> Details</h3>
                    <hr class="bg-warning">
                    <div class="curiar-account col-md-10 col-sm-12 offset-md-1">
                      
                            <div class="col-md-4 offset-md-4 m-b-30">
                                <div class="form-group">
                                  <label class="text-center m-b-10">প্রোফাইল ছবি  </label>
                                  <div class="input-group mb-3">
                                    <img style="height:200px; width:200px; border-radius:100%;" src="curiarboyProfile/profile/<?php echo $row['profile']?>" alt="">
                                </div>
                                  </div>
                              </div>
                              
                              
                              <div class="row">
                                   <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['curiar_boy_name'];?>" name="name" readonly>
                                </div>
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['Cnumber'];?> " name="name" readonly>
                                </div>
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                   <input type="text" class="form-control" value=" <?php echo $row['curiar_boy_email'];?>"  readonly>
                                </div>
                                    
                                    
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card-alt"></i></span>
                                    </div>
                                   <input type="text" class="form-control" value=" <?php echo $row['account_no'];?> " readonly>
                                </div>
                                    
                                 
                                 <div class="col-md-6">
                                         <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value=" <?php echo $jela;?> " readonly>
                                </div>
                                
                                   </div>
                                   
                                   <div class="col-md-6">
                                          
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-map-marker-alt"></i></span>
                                    </div> 
                                    <input type="text" class="form-control" value=" <?php echo $row['Cthana'];?> " readonly>
                                </div>
                                   </div>
                                   
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                  <label class="text-center m-b-10"> NID Card Front-end </label>
                                  <div class="input-group mb-3">
                                    <img class="img-thumbnail " src="curiarboyProfile/curiarboyIDcard/<?php echo $row['C_ID_Front']?>" alt="">
                                </div>
                                  </div>
                                       </div>
                                       
                                         <div class="col-md-6">
                                           <div class="form-group">
                                  <label class="text-center m-b-10"> NID Card Back-end </label>
                                  <div class="input-group mb-3">
                                    <img class="img-thumbnail" src="curiarboyProfile/curiarboyIDcard/<?php echo $row['C_ID_Back']?>" alt="">
                                </div>
                                  </div>
                                       </div>
                                   </div>
                                  
                                
                                   <div class="input-group mb-3 p-l-20 p-r-20">
                                   <textarea class="form-control height-140"  readonly><?php echo $row['CfullAddress'];?></textarea>
                                </div>
                                
                                
                                    <h5 class="pt-2 pb-2 bg-warning p-10 text-center width-100 text-white"> রেফারেন্সকারির ইনফরেন </h5>
                                
                                   <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                   <input type="text" class="form-control" value=" <?php echo $row['CrName'];?> " readonly>
                                </div>
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value=" <?php echo $row['CrNumber'];?> " readonly>
                                </div>
                                
                                     
                                    <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                  <label class="text-center m-b-10"> NID Card Front-end </label>
                                  <div class="input-group mb-3">
                                    <img class="img-thumbnail" src="curiarboyProfile/curiarReferencID/<?php echo $row['Cr_ID_Front']?>" alt="">
                                </div>
                                  </div>
                                       </div>
                                       
                                         <div class="col-md-6">
                                           <div class="form-group">
                                  <label class="text-center m-b-10"> NID Card Back-end </label>
                                  <div class="input-group mb-3">
                                    <img class="img-thumbnail" src="curiarboyProfile/curiarReferencID/<?php echo $row['Cr_ID_Back']?>" alt="">
                                </div>
                                  </div>
                                       </div>
                                   </div>
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