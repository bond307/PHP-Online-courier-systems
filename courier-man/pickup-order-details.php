
<?php 
session_start(); 

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
                     
$sr = 0;
$Id = $_GET['id'];
$sql = "SELECT * FROM `customer_order` WHERE id = '$Id' ";

$result  = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result );
        $sr ++; 
$mrsntid = $row['customer_id'];
        if($row['customer_jela'] = '112'){
         $jela = "ঢাকা";
         }


?>   
      
  <style>
     .table td{
         width: 60%;
     }
</style>   
  
 <div class="page-wrapper">
     <div class="container-fluid">
         
            <div class="card m-t-40">
                <div class="card-header">
                    <h4 class="">আপ ফলাফল সমুহঃ </h4>
                    
 <!-------------Update customer data whem Curoar boy pick up a order and he update statu------------------------------------------------------------------------------------------------>
                        
          
                     <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['submit'])) {
            
            $ID = $_GET['id'];
            
            $date = date('M-d-Y');
            
            $sql = "UPDATE customer_order SET status = 'Where_House', pickup_date = '$date', pickup = '1', pickup_boy_id = '".$_SESSION['id']."' WHERE id= '$ID' ";
            $UpdateResult = mysqli_query($conn, $sql);
            if($UpdateResult = true){
                    $success = '<p class="page-title alert alert-success"><a href="pickup-order-histry.php"><span class="btn btn-success btn-rounded"> আপনার ওর্ডারটি " Pickup Order Histry" মেনুতে এড হয়েছে !</sapn></a></p>';
            }
            
        }
 }


?>  
    
                </div>
                <div class="card-body">
                   <form action="" method="post">
                   <?php if(isset($success)) echo $success;?>

                    <div class="row">
                      <div class="col-md-8 offset-md-2"> 
                       <table class="table table-bordered">
                           <tr>
                               <th>Order Invoice</th>
                               <td class="font-weight-bold"><?php echo $row['invoice'] ;?></td>
                           </tr>
                          
                            <tr>
                               <th>Customer Name</th>
                               <td><?php echo $row['customer_name'] ;?></td>
                           </tr>
                           
                            <tr>
                               <th>Total Amount</th>
                               <td class="text-danger font-weight-bold font-20"><?php echo $row['in_total'] ;?></td>
                           </tr>
                            <tr>
                               <th>Number</th>
                               <td><a href="tel:<?php echo $row['number'] ;?>, <?php echo $row['number2'] ;?>"><?php echo $row['number'] ;?>, <?php echo $row['number2'] ;?></a></td>
                           </tr>
                            <tr>
                               <th>District, Thana</th>
                               <td><?php echo $jela ;?>, <?php echo $row['customer_thana'] ;?></td>
                           </tr>
                             <tr>
                               <th>Location</th>
                               <td><?php echo $row['where_customer'] ;?></td>
                           </tr>
                             <tr>
                               <th>Full Accress</th>
                               <td><?php echo $row['fullAddress'] ;?></td>
                           </tr>
                             <tr>
                               <th>Order Information</th>
                               <td><?php echo $row['order_info'] ;?></td>
                           </tr>
                             <tr>
                               <th>Location Information</th>
                               <td><?php echo $row['location_info'] ;?></td>
                           </tr>
                           <tr>
                               <th>Status</th>
                               <td class="text-warning font-weight-bold font-18"><?php echo $row['status'] ;?></td>
                           </tr>
                           
                       </table>
                    <!-----------#################################################################################### pikup location get ##############################################################-------------> 
            
         <?php 
         $pikLoc = mysqli_query($conn, "SELECT * FROM `customer_registration_tbl` WHERE id = '$mrsntid'");
        $rowPik = mysqli_fetch_assoc($pikLoc);
          if($row['jela'] = '112'){
         $jela = "ঢাকা";
        }
         ?> 
           <div class="card">
               <div class="card-header bg-success">
                       <strong class="text-white  text-center">পিক-আপ লোকেশন এবং ডিটেস্ল</strong>
                   </div>
               <div class="card-body">
                   <div class="row">
                   
                       <table class="table table-bordered">
                           <tr>
                               <th>Name : </th>
                               <td class="font-weight-bold"><?php echo $rowPik['name'] ;?></td>
                           </tr>
                            <tr>
                               <th>Number: </th>
                               <td><?php echo $rowPik['number'] ;?></td>
                           </tr>
                           <tr>
                               <th>Address: </th>
                               <td><?php echo $jela;?>, <?php echo $rowPik['thana'] ;?>, <?php echo $rowPik['FullAddress'] ;?></td>
                           </tr>
                            
                        </table>
                       </div>
                    
              
           </div> 
         </div>
            
            
                    
                    </div>
                    <?php 
                       if($row['status'] == 'Pending'){
                       
                       ?>
                     <button class="btn btn-success btn-rounded font-weight-bold font-16 col-md-4 width-100 offset-md-4 m-t-30 m-b-10" type="submit" name="submit" id="pickup" >Yes! Pickup </button>
                    </form>
                    <?php }?>
                    </form>
                    
                
                </div>
            </div>
     </div>
 </div>



<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>


