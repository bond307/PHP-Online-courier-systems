<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
 
 $id = $_GET['id'];    
$sql = "SELECT * FROM `customer_registration_tbl` WHERE id = '$id' ";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
            
        if($row['jela'] == '112'){
            $jela = 'ঢাকা ';
        }

?>   
        
    
   
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                   
                   
                   
                    <h3 class="text-center text-warning"><?php echo $row['name'] ;?> Details</h3>
                    <hr class="bg-warning">
                    <div class="curiar-account col-md-10 col-sm-12 offset-md-1">
                      
                            <div class="col-md-4 offset-md-4 m-b-30">
                                <div class="form-group">
                                  <label class="text-center m-b-10">প্রোফাইল ছবি  </label>
                                  <div class="input-group mb-3">
                                    <img style="height: 200px;width: 200px;border-radius: 100%;" src="../user/UserProfile/<?php echo $row['profilePic'];?>" alt="">
                                </div>
                                  </div>
                              </div>
                              
                              
                              <div class="row">
                                   <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['name'];?>" name="name" readonly>
                                </div>
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-users"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['Cname'];?>" name="name" readonly>
                                </div>
                                
                                 <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['number'];?> " name="name" readonly>
                                </div>
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    </div>
                                   <input type="text" class="form-control" value=" <?php echo $row['email'];?>"  readonly>
                                </div>
                                    
                                     <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-facebook-f"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['Flink'];?>" name="name" readonly>
                                </div>
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-globe"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $row['Wlink'];?>" name="name" readonly>
                                </div>
                                
                                
                                  <div class="input-group mb-3 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-main text-white" id="basic-addon1"><i class="fa fa-id-card-alt"></i></span>
                                    </div>
                                   <input type="text" class="form-control" value=" <?php echo $row['customer_account_number'];?> " readonly>
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
                                    <input type="text" class="form-control" value=" <?php echo $row['thana'];?> " readonly>
                                </div>
                                   </div>
                                  
                                   <div class="input-group mb-3 p-l-20 p-r-20">
                                   <textarea class="form-control height-140"  readonly><?php echo $row['FullAddress'];?></textarea>
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