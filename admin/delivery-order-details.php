
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

        if($row['customer_jela'] = '112'){
         $jela = "Dhaka";
        }
    
?>   
      
   
  
 <div class="page-wrapper">
     <div class="container-fluid">
         
            <div class="card m-t-40">
                <div class="card-header">
                    <h4 class="float-left">Order Details</h4>
                  
                    <button onclick="window.print();" class="btn btn-pinterest btn-rounded float-right "><i class="fa fa-print"></i> Prient</button>
                    
 <!-------------Update customer data whem Curoar boy pick up a order and he update statu------------------------------------------------------------------------------------------------>
                 
                </div>
                <div class="card-body">
                   <form action="" method="post">
                   <?php if(isset($success)) echo $success;?>

                    <div class="row">
                        <div class="col-md-3 m-t-10">
                           <label>Order Invoice</label>
                            <input type="text" class="form-control font-weight-bold text-danger" value="<?php echo $row['invoice'] ;?>" readonly>
                        </div>
                        
                          <div class="col-md-3 m-t-10">
                           <label>Order Date</label>
                            <input type="text" class="form-control font-weight-bold text-danger" value="<?php echo $row['order_date'] ;?>" readonly>
                        </div>
                       </div>
                       
                       <div class="row">
                        <div class="col-md-4 m-t-10">
                           <label>Customer Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['customer_name'] ;?>" readonly>
                        </div>
                        
                        <div class="col-md-4 m-t-10">
                           <label>Total Amount</label>
                            <input type="text" class="form-control text-danger font-weight-bold" value="<?php echo $row['total_taka'] ;?>" readonly>
                        </div>
                        
                         <div class="col-md-4 m-t-10">
                           <label>Number</label>
                            <input type="text" class="form-control " value="<?php echo $row['number'] ;?>, <?php echo $row['number2'] ;?>" readonly>
                        </div>
                        
                        <div class="col-md-4 m-t-10">
                           <label>District, Thana</label>
                            <input type="text" class="form-control " value="<?php echo $jela ;?>, <?php echo $row['customer_thana'] ;?>" readonly>
                        </div>
                        
                        <div class="col-md-4 m-t-10">
                           <label>Location </label>
                            <input type="text" class="form-control " value="<?php echo $row['where_customer'] ;?>" readonly>
                        </div> 
                          
                          <div class="col-md-4 m-t-10">
                           <label>Full Accress </label>
                            <input type="text" class="form-control " value="<?php echo $row['fullAddress'] ;?>" readonly>
                        </div>
                        
                         
                          <div class="col-md-4 m-t-10">
                           <label>Order Information </label>
                            <input type="text" class="form-control " value="<?php echo $row['order_info'] ;?>" readonly>
                        </div>
                        
                        <div class="col-md-4 m-t-10">
                           <label>Location Information </label>
                            <input type="text" class="form-control " value="<?php echo $row['location_info'] ;?>" readonly>
                        </div>
                        
                         
                        <div class="col-md-4 m-t-10">
                           <label>Status </label>
                            <button class=" btn btn-warning btn-rounded form-control font-weight-bold text-lg-left font-20 text-center"><?php echo $row['status'] ;?></button>
                         </div>
                    </div>
                    
                    <hr class="bg-warning">
                    
                    <div class="row">
                        <div class="col-md-3 m-t-10">
                           <label>Delivery Date</label>
                            <input type="text" class="form-control font-weight-bold text-danger" value="<?php echo $row['delivery_date'] ;?>" readonly>
                        </div>
                        
                         <div class="col-md-3 m-t-10">
                           <label>Delivery Boy</label>
                            <input type="text" class="form-control font-weight-bold text-danger" value="<?php echo $row['delivery'] ;?>" readonly>
                        </div>
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


