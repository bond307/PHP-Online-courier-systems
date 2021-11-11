<?php
    session_start();
error_reporting(0);
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
include 'inc/header.php';
include 'logical-query.php';
 
     if(isset($total_curent_balance)){
        $curnt = $total_curent_balance - $Painding_balance;
        $curnt_balance = $curnt - $payment_balance;
    }

    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
        
              if(isset($_POST['bkashNum']) && !empty($_POST['bkashNum'])){
            $BkashN = $_POST['bkashNum'];
            $Bkash = 'Bkash';
        }
        
         if(isset($_POST['nagodNum']) && !empty($_POST['nagodNum'])){
            $nagodN = $_POST['nagodNum'];
             $nagod = 'Nagod';
        }
        
         if(isset($_POST['roketNum']) && !empty($_POST['roketNum'])){
            $roketN = $_POST['roketNum'];
             $roket = 'Roket';
        }
        
        if(isset($_POST['bankName']) && !empty($_POST['bankName']) ){
            
            $Bname  = $_POST['bankName'];
        }
           
        if(isset($_POST['branchName']) && !empty($_POST['branchName']) ){
             $Branchname = $_POST['branchName'];
        }
           
       if(isset($_POST['accountName']) && !empty($_POST['accountName'])){
            $Aname      = $_POST['accountName'];
       }

       if(isset($_POST['accountNumber']) && !empty($_POST['accountNumber'])){
           $Anumber    = $_POST['accountNumber'];
       }
        
       if(isset($Bname) && isset($Branchname) && isset($Aname) && isset($Anumber)){
            $bank = 'Bank';
       }
        $date = date('M-d-Y'); 
        
        
            
if(isset($_POST['ammount']) && !empty($_POST['ammount'])){
 $amount = $_POST['ammount'];
}
if($amount <= $curnt_balance){
      
    $sql = "INSERT INTO `customer_payment_histry` (`id`, `customer_account_number`, `acount_name`, `payment_amount`, `Bkash`, `Bkash_number`, `Nogod`, `Nogod_number`, `roket`, `roket_number`, `Bank`, `Bname`, `BraName`, `Aname`, `Anumber`, `payment_date`, `payment_status`, `payment_user_id`, `apymne_accpect_date`) 
    
    
    VALUES (NULL, '".$_SESSION['account_number']."', '".$_SESSION['name']."', '$amount', '$Bkash', '$BkashN', '$nagod', '$nagodN', '$roket', '$roketN', '$bank', '$Bname', '$Branchname', '$Aname', '$Anumber', '$date', 'Pending', '".$_SESSION['id']."', '0')";
    $result = mysqli_query($conn, $sql);

        if($result == true){
             $success = '<p class="page-title alert alert-success"><a href="payment-histry.php"><span class="btn btn-success btn-rounded"> আপনার পেমেন্টটি পেন্ডিং এ আছেে !</span></a></p> ';
        }


       
       }else{
   $banalceError = '<p class="text-danger font-italic font-16">আপনার কারেন্ট '.$curnt_balance.' বেলেন্স টাকা।</p> ';
} 
}
}  
    
?>  
<div class="page-wrapper">

    <div class="container-fluid">
    <div class="col-md-8 offset-md-2">
    <div class="card ">
        <div class="card-header">
            <h5>টাকা উত্তোলন করুনঃ </h5>
        </div>
        
          
        <?php if(isset($success)) echo $success;
        echo $BkashN;
        echo $Bkash;
        echo $nogodN;
        echo $nagod;
         echo $amount;
    
        ?>
        <div class="card-body">
            <div class="withdrar-form">
               <h4 class="text-center m-b-20">আপনার মোট কারেন্ট টাকা = <span class="font-24 text-danger"><?php echo $curnt_balance;?></span></h4>
               <p class="text-center m-20 text-danger">আপনি <?php echo $curnt_balance ;?> টাকার বেশি উঠাতে পারবেন না। </p>
                   
                   <form role="form" action="" method="post">
                   
                   <div class="row form-group col-md-8 offset-md-2">
                        
                          <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text" style="font-width:bold; color: #EE0A72;">৳</div> 
                            </div>
                            <input type="text" class="form-control" placeholder="টাকার পরিমান" name="ammount" required>
                          </div>
                          <?php if(isset($banalceError)) echo $banalceError;?>
                   </div>
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"><a data-toggle="pill" href="#bkash" class="nav-link active "> <span><img src="image/icon/bkah.png" alt=""></span> </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#nagod" class="nav-link "> <img src="image/icon/nogod.png"> </a> </li>
                            
                            <li class="nav-item"> <a data-toggle="pill" href="#roket" class="nav-link "> <img src="image/icon/roket.png"></a> </li>
                            
                            <li class="nav-item"> <a data-toggle="pill" href="#bank" class="nav-link "><img src="image/icon/bank.png"></a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="bkash" class="tab-pane fade show active pt-3">
                            
                                 <div class="form-group">
                                     <label> বিকাশ নাম্বার </label>
                                     <input type="text" class="form-control" name="bkashNum" placeholder="01XXXXXXXXX">
                                 </div>
                                 
                                <p class="text-danger font-weight-bold font-16">" পারসোনাল একাউন্ট ব্যবহার করুন "</p>
                    </div> <!-- End -->
                    
                    
                    
                    
                    <!-- Paypal info -->
                    <div id="nagod" class="tab-pane fade pt-3">
                          <div class="form-group">
                             <label> নগদ নাম্বার </label>
                             <input type="text" class="form-control" name="nagodNum" placeholder="01XXXXXXXXX">
                         </div>

                        <p class="text-danger font-weight-bold font-16">" পারসোনাল একাউন্ট ব্যবহার করুন "</p>
                    </div> <!-- End -->
                    
                    
                    
                    
                    <!-- bank transfer info -->
                    <div id="roket" class="tab-pane fade pt-3">
                        <div class="form-group">
                             <label> রকেট নাম্বার </label>
                             <input type="text" class="form-control" name="roketNum" placeholder="01XXXXXXXXX">
                         </div>

                        <p class="text-danger font-weight-bold font-16">" পারসোনাল একাউন্ট ব্যবহার করুন "</p>
                    </div> <!-- End -->
                    
                    <!-- bank transfer info -->
                    <div id="bank" class="tab-pane fade pt-3">
                        <div class="row">
                           
                            <div class="form-group col-md-6">
                             <label> ব্যাংক নাম </label>
                             <input type="text" class="form-control" name="bankName" placeholder=" ব্যাংক নাম">
                            </div>
                            
                            <div class="form-group col-md-6">
                             <label> ব্রান্স নাম </label>
                             <input type="text" class="form-control" name="branchName" placeholder="ব্রান্স নাম">
                            </div>
                           
                            <div class="form-group col-md-6">
                             <label> একাউন্ট নাম </label>
                             <input type="text" class="form-control" name="accountName" placeholder="একাউন্ট নাম ">
                            </div>
                            
                            <div class="form-group col-md-6">
                             <label> একাউন্ট নাম্বার </label>
                             <input type="text" class="form-control" name="accountNumber" placeholder="XXXXXXXXX">
                            </div>
                            
                        </div>

                        <p class="text-danger font-weight-bold font-16">" পারসোনাল একাউন্ট ব্যবহার করুন "</p>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
                
                <button class="btn btn-purple btn-rounded col-md-12 m-t-20" type="submit" name="submit">Submit</button>
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