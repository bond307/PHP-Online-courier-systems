<?php 

$userID = $_SESSION['id'];
 

/*--------------------------------Order's----------------------------------*/
//Total Order's
    $sql = "SELECT COUNT(*) FROM `customer_order`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_order = array_shift($row);

//Success Order's
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE status = 'Success'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $success_order = array_shift($row);

//Recive Order's
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE status = 'Receive' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $receive_order = array_shift($row);

//Pending Order's
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE status = 'Pending'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pending_order = array_shift($row);

//Cencel Order's
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE status = 'Cancel'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $cancel_order = array_shift($row);

//Rutern Order's
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE status = 'Return'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $return_order = array_shift($row);


/*---------------------------------- Pickup and Delivery ---------------------------*/

//Pickup Order's
    $sql = "SELECT COUNT(*) FROM `pickup_order` WHERE status = 'Processing'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pickup_order = array_shift($row);

//Delivery Order's
    $sql = "SELECT COUNT(*) FROM `delivery_order` WHERE status = 'Recive'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $delivery_order = array_shift($row);


/*---------------------------------- Customer Payment ---------------------------*/

//Customer Payment Request
$sql = "SELECT COUNT(*) FROM customer_payment_histry WHERE payment_status = 'Pending' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $customer_payment_ruquest = array_shift($row);

//Customer Payment Request
$sql = "SELECT COUNT(*) FROM `customer_payment_histry` WHERE payment_status = 'Success'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $customer_success_payment = array_shift($row);



/*---------------------------------- Curiar Boy Payment ---------------------------*/

//Customer Payment Request
$sql = "SELECT COUNT(*) FROM curiar_boy_payment_histry WHERE payment_status = 'Pending'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $curiarboy_payment_ruquest = array_shift($row);

//Customer Payment Request
$sql = "SELECT COUNT(*) FROM `curiar_boy_payment_histry` WHERE payment_status = 'Success'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $curiarboy_succss_payment = array_shift($row);

/*=====================================================================================================================================/ End =======================================*/




/*=====================================================================================================================================================================================================================================================*/

//Total Admin Balance sum
    $total_balance_query  = "SELECT SUM(takeMoney) FROM customer_order WHERE status = 'Success' ";
    $row = mysqli_query($conn, $total_balance_query);
    $balance_row = mysqli_fetch_assoc($row);
    $total_account_balance = $balance_row['SUM(takeMoney)'];


//Today Admin Balance sum
$date = date('M-d-Y');
    $total_balance_query  = "SELECT SUM(takeMoney) FROM customer_order WHERE status = 'Success' AND delivery_date = '$date'  ";
    $row = mysqli_query($conn, $total_balance_query);
    $balance_row = mysqli_fetch_assoc($row);
    $today_account_balance = $balance_row['SUM(takeMoney)'];


//Today Admin Balance sum
    $total_balance_query  = "SELECT SUM(desposit_amount) FROM desposit WHERE  status = 'Success'";
    $row = mysqli_query($conn, $total_balance_query);
    $balance_row = mysqli_fetch_assoc($row);
    $total_ABalance = $balance_row['SUM(desposit_amount)'];

//Today Admin Balance sum
$date = date('M-d-Y');
    $total_balance_query  = "SELECT SUM(desposit_amount) FROM desposit WHERE desposit_date = '$date' AND status = 'Success' ";
    $row = mysqli_query($conn, $total_balance_query);
    $balance_row = mysqli_fetch_assoc($row);
    $today_ABalance = $balance_row['SUM(desposit_amount)'];











