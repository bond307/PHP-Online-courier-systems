<?php 
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
error_reporting(0);
include 'inc/header.php';


include 'lib/db.php';
if(isset($_GET['id'])){
$Id = $_GET['id'];
} 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['submit'])) {

            $userID = $_SESSION['id'];
            if(isset($_POST['name'])){
                $Cname = $_POST['name'];
            }
            if(isset($_POST['t-tk'])){
                $total_tk = $_POST['t-tk'];
            }
            if(isset($_POST['number'])){
              $number = $_POST['number'];
            }
            if(isset($_POST['number2'])){
                $number2 = $_POST['number2'];
            }
            if(isset($_POST['Faddress'])){
                $FullAddress = $_POST['Faddress'];
            }
            if(isset( $_POST['jela'])){
               $jela = $_POST['jela'];
            }
            if(isset($_POST['thana'])){
                $thana = $_POST['thana'];
            }
            if(isset($_POST['Dhaka'])){
                $$Dhaka = $_POST['Dhaka'];
            }
            if(isset($_POST['order_info'])){
               $Order_Info = $_POST['order_info'];
            }
            if(isset($_POST['kg'])){
               $kg   = $_POST['kg'];
            }
            if(isset($_POST['loc_info'])){
               $Loc_Info = $_POST['loc_info'];
            }
            
           
         
            
            //Check, Wher user?? 
            if($Dhaka == 'ঢাকার_বাহির'){
                if($kg == '2kg'){
                    $total_amount= ($total_tk - 150) - 15;
                }
                if($kg == '3kg'){
                    $total_amount= ($total_tk - 150) - 30;
                }
                if($kg == '4kg'){
                    $total_amount= ($total_tk - 150) - 45;
                }
                if($kg == '5kg'){
                    $total_amount= ($total_tk - 150) - 60;
                }
                if($kg == '6kg'){
                    $total_amount= ($total_tk - 150) - 75;
                }
                if($kg == '7kg'){
                    $total_amount= ($total_tk - 150) - 90;
                }
                if($kg == '8kg'){
                    $total_amount= ($total_tk - 150) - 105;
                }
                if($kg == '9kg'){
                    $total_amount= ($total_tk - 150) - 120;
                }
                if($kg == '10kg'){
                    $total_amount= ($total_tk - 150) - 135;
                }
                
               
            }else{
                if($kg == '2kg'){
                    $total_amount= ($total_tk - 80) - 15;
                }
                if($kg == '3kg'){
                    $total_amount= ($total_tk - 80) - 30;
                }
                if($kg == '4kg'){
                    $total_amount= ($total_tk - 80) - 45;
                }
                if($kg == '5kg'){
                    $total_amount= ($total_tk - 80) - 60;
                }
                if($kg == '6kg'){
                    $total_amount= ($total_tk - 80) - 75;
                }
                if($kg == '7kg'){
                    $total_amount= ($total_tk - 80) - 90;
                }
                if($kg == '8kg'){
                    $total_amount= ($total_tk - 80) - 105;
                }
                if($kg == '9kg'){
                    $total_amount= ($total_tk - 80) - 120;
                }
                if($kg == '10kg'){
                    $total_amount= ($total_tk - 80) - 135;
                }
            }
            
           
            $sql = "UPDATE `customer_order` SET `customer_name` = '$Cname', `in_total` = '$total_tk', `number` = '$number', `number2` = '$number2', `fullAddress` = '$FullAddress', `customer_jela` = '$jela' , `customer_thana` = '$thana', `order_info` = '$Order_Info', `location_info` = '$Loc_Info', `weight` ='$kg', total_taka = '$total_amount'  WHERE id='$Id' ";
            
            $result = mysqli_query($conn, $sql);
            
            if($result == true){
               
                 $success = '<p class="page-title alert alert-success"><a href="order-list.php"><span class="btn btn-success btn-rounded"> আপনার ওর্ডারটি এড হয়েছে !</sapn></a></p>'; 

        
            }else{
                $success = '<p class="page-title alert alert-danger"><a href="order-list.php"><span class="btn btn-success btn-rounded"> আপনার ওর্ডারটি এড হয়েছে !</sapn></a></p>'; 
   
            }
             


        }
    }
    

    


$sql = "SELECT * FROM `customer_order` WHERE id = '$Id' ";
//pikup
if(isset($_GET['id'])){
$orderID = $_GET['id'];  
}
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result );

$mrsntid = $row['customer_id'];
if($row['customer_jela'] = '112'){
$jela = "ঢাকা জেলা";
}
$cname =$row['customer_name'];
$intotal =$row['in_total'];
$number =$row['number'];
$number2 =$row['number2'];
$fullAddress =$row['fullAddress'];
$customer_thana =$row['customer_thana'];
$where_customer =$row['where_customer'];
$order_info =$row['order_info'];
$location_info =$row['location_info'];
$weight =$row['weight'];
$status =$row['status'];
?> 
        
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
             
                <div class="create-new-order">
                    <div class="card">
                        <div class="card-header">
                            <h3 class=" card-title font-weight-bold">Create a new order:</h3>
                        </div>
                        <div class="card-body">
                           <?php if(isset($success)) echo $success;?>
                            <form action="" method="post" id="form">
                               <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">কাস্টোমার নাম:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<?php echo $cname;?>" name="name" >
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">টোটাল টাকা:</label>
                                    <div class="col-md-10">
                                        <input type="number" value="<?php echo $intotal;?>" class="form-control" name="t-tk" >
                                        
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">মোবাইল নাম্বার:</label>
                                    <div class="col-md-10">
                                        <input type="tel" value="<?php echo $number;?>" class="form-control" name="number" >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">মোবাইল নাম্বার -২:</label>
                                    <div class="col-md-10">
                                        <input type="tel" value="<?php echo $number2;?>"  class="form-control" name="number2" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bo"> সম্পুর্ন ঠিকানা:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php echo $fullAddress;?>" class="form-control" name="Faddress" >
                                    </div>
                                </div>
                                  <div class="row">
                                        <div class="offset-md-2 col-md-5 mb-3">
                                         <label class="m-t-15 font-weight-bold">জেলা: </label>
                                        <select class="select2 form-control custom-select" name="jela" id="jela" >
                                          <option  value="<?php echo $row['customer_jela'];?>" selected> <?php echo $jela;?></option>
                                       
                                          <?php 
                                            $sql = "SELECT * FROM `district`";
                                            $result = mysqli_query($conn, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                          ?>
                                          <option value="<?php echo $row['id'];?> "><?php echo $row['district'];?></option>
                                          <?php }; ?>
                                           
                                        </select>
                                    </div>
                                     <div class="col-md-5 mb-3">
                                         <label class="m-t-15 font-weight-bold">থানা: </label>
                                            <select class="select2 form-control custom-select" name="thana" id="thana" >
                                              <option  value="<?php echo $customer_thana;?>" selected> <?php echo $customer_thana;?></option>
                                              
                                            <option value="" > থানা সিলেক্ট করুন...</option>
                                        </select>
                                    </div>
                                
                                    <div class="offset-md-2 col-md-5 m-t-30 mb-3">
                                        <div class="custom-control custom-radio ">
                                             <label id="indhaka"  data-toggle="tooltip" data-placement="top" title="শিপিং খরচ - ৮০"><b> শিপিং <span class="text-danger"><?php echo $where_customer;?></span> </b></label>
                                           
                                        </div>
                                         
                                    </div>
                                   
                                       <div class="col-md-5 offset-md-2 col-sm-12 m-t-30">
                                           <label>Order Info</label>
                                            <input type="text" value="<?php echo $order_info;?>" name="order_info" class="form-control" style="height:100px">
                                    </div>
                                    
                                    <div class="col-md-5 col-sm-12  m-t-30">
                                          <label>Location Info</label>
                                            <input type="text" value="<?php echo $location_info;?>" name="loc_info" class="form-control" style="height:100px">
                                    </div>
                                    
                                </div>
                                
                                 <div class="form-group row mt-3">
                                    <label class="col-md-2 m-t-10 font-weight-bold"> ওজনঃ</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="kg" id="kg" >
                                            <option value="<?php echo $weight;?>"  selected><?php echo $weight;?></option>
                                            <option value="" disabled>Choose your option</option>
                                            <option value="2kg">2kg</option>
                                            <option value="3kg">3kg</option>
                                            <option value="4kg">4kg</option>
                                            <option value="5kg">5kg</option>
                                            <option value="6kg">6kg</option>
                                            <option value="7kg">7kg</option>
                                            <option value="8kg">8kg</option>
                                            <option value="9kg">9kg</option>
                                            <option value="10kg">10kg</option>
                                        </select>
                                        <small class="text-danger font-italic">প্রতি কেজিতে ১৫ টা করে শিপিং খরচ বৃদ্ধি পাবে</small>
                                    </div>
                                </div>
                              
                                </div>
                               
                                 <div class="offset-md-2 col-md-3 offset-md-5">
                                    <button class="btn btn-success width-100" type="submit" name="submit">Submit </button>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
                
                 
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
   
<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}

?>
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
 /*
    function check(){
        var indhaka = document.getElementById('indhaka').val;
        var outdhaka = document.getElementById('outdhaka').val;
        
        if(document.getElementById('selectid').value == "val1"){
           var indhakaPrice = 80;
           }
        
       if(document.getElementById('outdhaka').selected==true){
           var outdhakaPrice = 150;
           }
        var show = document.getElementById('tot_amount');
        show.value = indhakaPrice;
        show.value = outdhakaPrice;
    }
    
    
            /* --function indhaka(val) {
                var indhaka = document.getElementById('indhaka').value='80';
                
              
            return indhaka;
           
            }  function outdhaka(val) {
                var outdhaka = document.getElementById('outdhaka').value='150';
               
               
           return outdhaka;
            }
           function weight(val) {
               
                var kg = val *15;
               return weight;
           
            }
   function total(){
        var total = indhaka() + weight();
        var echo = document.getElementById('tot_amount');
    echo.value = total;
   }--*/
        </script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

