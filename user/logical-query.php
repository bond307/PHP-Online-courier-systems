<?php 

$userID = $_SESSION['id'];
 

//Total balance sum
    $total_balance_query  = "SELECT SUM(total_taka) FROM customer_order WHERE customer_id = '$userID' ";
    $total_balance_row = mysqli_query($conn, $total_balance_query);
    $total_balance_row = mysqli_fetch_assoc($total_balance_row);
    $total_balance = $total_balance_row['SUM(total_taka)'];




 
//Curent balance sum
    $total_balance_query  = "SELECT SUM(total_taka) FROM customer_order WHERE customer_id = '$userID' AND status = 'Success' ";
    $total_balance_row = mysqli_query($conn, $total_balance_query);
    $total_balance_row = mysqli_fetch_assoc($total_balance_row);
    $total_curent_balance = $total_balance_row['SUM(total_taka)'];


//Pyment balance balance sum
    $payment_balance_query  = "SELECT SUM(payment_amount) FROM customer_payment_histry WHERE payment_user_id = '$userID' AND payment_status = 'Success' ";
    $payment_balance_row = mysqli_query($conn, $payment_balance_query);
    $payment_balance_row = mysqli_fetch_assoc($payment_balance_row);
    $payment_balance = $payment_balance_row['SUM(payment_amount)'];

//Painding Payment balance sum
    $Painding_balance_query  = "SELECT SUM(payment_amount) FROM customer_payment_histry WHERE payment_user_id = '$userID' AND payment_status = 'Pending' ";
    $Painding_balance_row = mysqli_query($conn, $Painding_balance_query);
    $Painding_balance_row = mysqli_fetch_assoc($Painding_balance_row);
    $Painding_balance = $Painding_balance_row['SUM(payment_amount)'];
                                               
//Total Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $TotalOrders = array_shift($row);

//Success Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Success'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $SuccessOrders = array_shift($row);

//Painding Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Pending'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $PaindingOrders = array_shift($row);


//Receive  Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Receive'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $ReceiveOrders = array_shift($row);




//Success Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Cancel'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $CancelOrders = array_shift($row);


//Success Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Return'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $ReturnOrders = array_shift($row);



//Success Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Return'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $ReturnOrders = array_shift($row);

//Where House Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Where_House'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $whereHouse = array_shift($row);

//shipping Orders Sum
    $sql = "SELECT COUNT(*) FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' AND status = 'Processing'  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $Processing = array_shift($row);








?>