<?php 
$userID = $_SESSION['id'];
 



 /*===========================This is for Curi survice Body==============================*/

//Delivery balance
    $sql = "SELECT COUNT(*) FROM `delivery_order`  WHERE boy_id = '".$_SESSION['id']."' AND status = 'Recive' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $delicery_balance = array_shift($row);
//Delivery balance
    $sql = "SELECT COUNT(*) FROM `pickup_order`  WHERE boy_id = '".$_SESSION['id']."' AND status = 'Processing' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pickup_balance = array_shift($row);


//total_curiar_boy_balance Delivery 
    $sql = "SELECT COUNT(*) FROM `customer_order`  WHERE delivery = '".$_SESSION['name']."' AND pickup_boy_id = '".$_SESSION['id']."' AND status = 'Pending' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_curiar_boy_picup_pending = array_shift($row);
 
//total PickUp Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order`  WHERE  pickup_boy_id = '".$_SESSION['id']."' AND pickup_boy_id = '".$_SESSION['id']."' AND status = 'Receive' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pickupOrders = array_shift($row);

//total PickUp Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order`  WHERE  pickup_boy_id = '".$_SESSION['id']."' AND pickup_boy_id = '".$_SESSION['id']."' AND status = 'Success' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pickupSuccessOrders = array_shift($row);




//Pyment pending balance balance sum
    $sql  = "SELECT SUM(payment_amount) FROM curiar_boy_payment_histry WHERE payment_user_id = '".$_SESSION['id']."' AND payment_status = 'Pending' ";
    $result = mysqli_query($conn, $sql);
    $payment_balance_row = mysqli_fetch_assoc($result);
    $pendingbalance = $payment_balance_row['SUM(payment_amount)'];


//Pyment balance balance sum
    $sql  = "SELECT SUM(payment_amount) FROM curiar_boy_payment_histry WHERE payment_user_id = '".$_SESSION['id']."' AND payment_status = 'Success' ";
    $result = mysqli_query($conn, $sql);
    $payment_balance_row = mysqli_fetch_assoc($result);
    $Paymentbalance = $payment_balance_row['SUM(payment_amount)'];




/*================================================================================================================ Total Payment ==================================*/

//Total Deposit Payment
    $sql  = "SELECT SUM(in_total) FROM customer_order WHERE delivery_boy_id = '".$_SESSION['id']."' AND status = 'Success' ";
    $result = mysqli_query($conn, $sql);
    $payment_balance_row = mysqli_fetch_assoc($result);
    $in_total = $payment_balance_row['SUM(in_total)'];

//total  Deposit Payment
    $sql  = "SELECT SUM(desposit_amount) FROM desposit WHERE man_id = '".$_SESSION['id']."'  ";
    $result = mysqli_query($conn, $sql);
    $payment_balance_row = mysqli_fetch_assoc($result);
    $total_despoit_balance = $payment_balance_row['SUM(desposit_amount)'];

//to day Deposit Payment
    $sql  = "SELECT SUM(desposit_amount) FROM desposit ";
    $result = mysqli_query($conn, $sql);
    $payment_balance_row = mysqli_fetch_assoc($result);
    $despoit_balance = $payment_balance_row['SUM(desposit_amount)'];



