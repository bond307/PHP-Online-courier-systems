<?php 
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 require('vendor/autoload.php');
include 'inc/header.php';


include 'lib/db.php';
 
    //select rate
    $showRate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rate"));
    $in = $showRate['in_d'];
    $out = $showRate['out_d'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['submit'])) {

            $userID = $_SESSION['id'];
            
            $Cname = $_POST['name'];
            $total_tk = $_POST['t-tk'];
            $number = $_POST['number'];
            $number2 = $_POST['number2'];
            $FullAddress = $_POST['Faddress'];
            $jela = $_POST['jela'];
            $thana = $_POST['thana'];
            $Dhaka = $_POST['Dhaka'];
            $Order_Info = $_POST['order-info'];
            $kg   = $_POST['kg'];
            $Loc_Info = $_POST['loc-info'];
            $invoice = rand();
            
            
            //Check, Wher user?? 
            if($Dhaka == 'ঢাকার_বাহির'){
                if($kg == '2kg'){
                   echo $total_amount= ($total_tk - $out) - 15;
                }
                if($kg == '3kg'){
                   echo $total_amount= ($total_tk - $out) - 30;
                }
                if($kg == '4kg'){
                   echo $total_amount= ($total_tk - $out) - 45;
                }
                if($kg == '5kg'){
                   echo $total_amount= ($total_tk - $out) - 60;
                }
                if($kg == '6kg'){
                    $total_amount= ($total_tk - $out) - 75;
                }
                if($kg == '7kg'){
                    $total_amount= ($total_tk - $out) - 90;
                }
                if($kg == '8kg'){
                    $total_amount= ($total_tk - $out) - 105;
                }
                if($kg == '9kg'){
                    $total_amount= ($total_tk - $out) - 120;
                }
                if($kg == '10kg'){
                    $total_amount= ($total_tk - $out) - 135;
                }
                
               
            }else{
                if($kg == '2kg'){
                    $total_amount= ($total_tk - $in) - 15;
                }
                if($kg == '3kg'){
                    $total_amount= ($total_tk - $in) - 30;
                }
                if($kg == '4kg'){
                    $total_amount= ($total_tk - $in) - 45;
                }
                if($kg == '5kg'){
                    $total_amount= ($total_tk - $in) - 60;
                }
                if($kg == '6kg'){
                    $total_amount= ($total_tk - $in) - 75;
                }
                if($kg == '7kg'){
                    $total_amount= ($total_tk - $in) - 90;
                }
                if($kg == '8kg'){
                    $total_amount= ($total_tk - $in) - 105;
                }
                if($kg == '9kg'){
                    $total_amount= ($total_tk - $in) - 120;
                }
                if($kg == '10kg'){
                    $total_amount= ($total_tk - $in) - 135;
                }
            }
            
            
         
            $date = date('M-d-y');
            $shipingCost = $total_tk - $total_amount;
            $sql = "INSERT INTO `customer_order` (`id`, `customer_name`, `in_total`, `total_taka`, `number`, `number2`, `fullAddress`, `customer_jela`, `customer_thana`, `where_customer`, `order_info`, `location_info`, `status`, `invoice`, `pickup_date`, `delivery_date`, `customer_id`, `pickup_boy_id`, `delivery_boy_id`, `pickup`, `delivery`, `order_date`, `takeMoney`, `weight`) VALUES (NULL, '$Cname', '$total_tk', '$total_amount', '$number', '$number2', '$FullAddress', '$jela', '$thana', '$Dhaka', '$Order_Info', '$Loc_Info', 'Pending', '$invoice', '0', '0', '".$_SESSION['id']."', '0', '0', '0', '0', '$date', '0', '$kg')";
            
            $result = mysqli_query($conn, $sql);
            
            if($result == true){
               
                 $success = '<p class="page-title alert alert-success"><a href="order-list.php"><span class="btn btn-success btn-rounded"> আপনার ওর্ডারটি এড হয়েছে !</sapn></a></p>'; 
      
  /* --$to = $_SESSION['email'];
$subject = "Order Information Successfully Recived By Dhaka Curiar City.";
$headers = "From: Nogor Curiar <support@nogorcourier.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=IOS-8859-1\r\n";

$msg = '<!DOCTYPE html>
<html lang="en">
<body style="width: 900px;margin: 20px auto;">
    
    <div style="background: #2CC54E;height: 78px;padding: 10px 20px;">
        <div style="width: 50%;float: left;"></div>
        
        <div style="width: 50%;float: right; text-align:right; margin-top:5px;">
            <h4 style="font-weight: bold;font-family: sans-serif;color: #fff;font-size: 28px;margin: 2px auto;">Invoice: #NC-'.$invoice.'</h4>
            <p style="color:#f1f1f1; font-style:italic; margin:3px auto">Dec-03-10</p>
        </div>
    </div>
    <!------------------------- end heade ------------------>
    
    
    <div style="overflow: hidden;">
        <h4 style="font-weight: bold;font-family: sans-serif;color: #000;font-size: 28px;margin: 20px auto; text-align:center">Order Information</h4>
        
        <div style="width: 800px;margin: 0 auto;">
            <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
                <tr>
                    <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px;">কাস্টোমার নাম:</th>
                    <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px; width:50%;">'.$Cname.'</td>
                </tr>
                <tr>
                     <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px;">টোটাল টাকা:</th>
                    <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; padding-left:20px; width:50%;">'.$total_tk.'</td>
                </tr>
                <tr>
                     <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px;">ওজনঃ</th>
                    <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; padding-left:20px; width:50%;">'.$kg.'</td>
                </tr>
                <tr>
                     <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px;">মোবাইল নাম্বার:</th>
                    <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; padding-left:20px; width:50%;">'.$number.', '.$number2.'</td>
                </tr>
                <tr>
                     <th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;padding-left:20px;">সম্পুর্ন ঠিকানা:</th>
                    <td style=" border: 1px solid #dddddd;text-align: left;padding: 8px; padding-left:20px; width:50%;">'.$FullAddress.'</td>
                </tr>
                
                
            </table>
            
            <div style="width: 46%;float: left;border: 1px solid #ddd;padding: 10px; border-radius: 2px; margin-top:20px;">
                <h4 style="font-weight: bold;font-family: sans-serif;color: #000;font-size: 20px;margin: 20px auto; text-align:center">ওর্ডার ইনফরমেশনঃ</h4>
                <p>'$Order_Info'</p> 
            </div>
              <div style="width: 46%;float: left;border: 1px solid #ddd;padding: 10px; border-radius: 2px; margin-left:20px; margin-top:20px;">
                <h4 style="font-weight: bold;font-family: sans-serif;color: #000;font-size: 20px;margin: 20px auto; text-align:center">ওর্ডার ইনফরমেশনঃ</h4>
                <p>'.$Loc_Info.'</p> 
            </div>
            
        </div>
    </div>
    <!------------------ end body----->
    
    <div style="margin-top: 30px;background: #2CC54E;height: 100px;">
        <div style="width: 30%;float: left;text-align: center;">
            <p style="font-size: 20px; color: #fff;font-weight: bold;margin-bottom: 0px;margin-top: 20px;"> টোটাল টাকা </p>
            <p style="color: #f1f1f1;font-size: 28px;margin: 7px auto;">'.$total_tk.'</p>
        </div>
       <div style="width: 30%;float: left;text-align: center;">
             <p style="font-size: 20px; color: #fff;font-weight: bold;margin-bottom: 0px;margin-top: 20px;"> টোটাল শিপিং খরচ </p>
            <p style="color: #f1f1f1;font-size: 28px;margin: 7px auto;">'.$shipingCost.'</p>
        </div>
        <div style="width: 30%;float: left;text-align: center;">
             <p style="font-size: 20px; color: #fff;font-weight: bold;margin-bottom: 0px;margin-top: 20px;"> বাকি টাকা  </p>
            <p style="color: #f1f1f1;font-size: 28px;margin: 7px auto;">'.$total_amount.'</p>
        </div>
    </div>
    
</body>
</html>
';

if(mail($to,$subject,$msg,$headers)){
    echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"> সফলতার আপনার ওর্ডারটি তৈরি হয়েছে </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold">আপনার শিপিং খরচ = <span class="text-danger">'.$shipingCost.' টাকা। </span></h4>
           <p>ওয়র্ডার ইনফরমেশন আপনার ইমেইলে পাঠানো হয়েছে। আপনার ইমেলের স্পাম বক্স চেক করুন। </p>
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';
   
                
                
}*/

               
                
            }
             


        }
    }
    

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
                                        <input type="text" class="form-control" placeholder="কাস্টোমার নাম" name="name" required>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">টোটাল টাকা:</label>
                                    <div class="col-md-10">
                                        <input type="number" placeholder="টোটাল টাকা"  class="form-control" name="t-tk" required>
                                        
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">মোবাইল নাম্বার:</label>
                                    <div class="col-md-10">
                                        <input type="tel" placeholder="মোবাইল নাম্বার"  class="form-control" name="number" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bold">মোবাইল নাম্বার -২:</label>
                                    <div class="col-md-10">
                                        <input type="tel" placeholder="আন্য একটি মোবাইল নাম্বার ব্যবহার করুন "  class="form-control" name="number2" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="form-group row">
                                    <label class="col-md-2 m-t-10 font-weight-bo"> সম্পুর্ন ঠিকানা:</label>
                                    <div class="col-md-10">
                                        <input type="text" placeholder="সম্পুর্ন ঠিকানা"  class="form-control" name="Faddress" required>
                                    </div>
                                </div>
                                  <div class="row">
                                        <div class="offset-md-2 col-md-5 mb-3">
                                         <label class="m-t-15 font-weight-bold">জেলা: </label>
                                        <select class="select2 form-control custom-select" name="jela" id="jela" required>
                                          <option value="" selected disabled> জেলা সিলেক্ট করুন....</option>
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
                                           <input placeholder="থানা: " type="text" name="thana" class="form-control">
                                    </div>
                                
                                    <div class="offset-md-2 col-md-5 m-t-30 mb-3">
                                        <div class="custom-control custom-radio ">
                                             <label id="indhaka"  data-toggle="tooltip" data-placement="top" title="শিপিং খরচ - <?= $in;?>"><input name="Dhaka" required  value="ঢাকার_ভিতরে"  type="radio" > <b> নিজ শহর</b></label>
                                           
                                        </div> 
                                         
                                    </div>
                                     <div class="col-md-5 col-sm-12  m-t-30 mb-3">
                                        <div class="custom-control custom-radio ">
                                            <label id="outdhaka" data-toggle="tooltip" data-placement="top" title="শিপিং খরচ - <?= $out;?>"><input name="Dhaka" required  value="ঢাকার_বাহির"  type="radio"> <b> অন্য শহর  </b></label>
                                        </div>
                                    </div>
                                       
                                       <div class="col-md-5 offset-md-2 col-sm-12 m-t-30">
                                            <textarea class="form-control height-140" placeholder="অর্ডারে কিছু ইনফরনেশ " name="order-info" required></textarea>
                                    </div>
                                    
                                    <div class="col-md-5 col-sm-12  m-t-30">
                                            <textarea class="form-control height-140" placeholder="লোকেশন ইনফরমেশন" name="loc-info" required></textarea>
                                    </div>
                                    
                                </div>
                                
                                 <div class="form-group row mt-3">
                                    <label class="col-md-2 m-t-10 font-weight-bold"> ওজনঃ</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="kg" id="kg" required>
                                            <option value="" disabled selected>Choose your option</option>
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

