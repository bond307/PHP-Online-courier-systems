<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
include 'inc/header.php';

 

?>

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="order-list">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="p-t-10 text-white">টোটাল ওর্ডার লিস্টঃ </h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SR NO. </th>
                                    <th>Invoice</th>
                                    <th>Create Date</th>
                                    <th>Name</th>
                                    <th>TK</th>
                                    <th>Number, Number2</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 0;
                                $sql = "SELECT * FROM `customer_order` WHERE customer_id ='".$_SESSION['id']."' ";
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);

    
                                        while ( $row = mysqli_fetch_assoc($result)){
                                            $sr++;
                               
                                        if($row['status'] == 'Success'){
                                            $class = 'badge badge-pill badge-success';
                                        }else if($row['status'] == 'Pending'){
                                            $class = 'badge badge-pill badge-primary';
                                        }else if($row['status'] == 'Receive'){
                                             $class = 'badge badge-pill badge-secondary';
                                        }else if($row['status'] == 'Cancel'){
                                             $class = 'badge badge-pill badge-danger';
                                        }else if($row['status'] == 'Return'){
                                             $class = 'badge badge-pill badge-dark';
                                        }else if($row['status'] == 'Where_House'){
                                             $class = 'badge badge-pill badge-warning';
                                        }
                                    ?>
                                   
                                     <tr>
                                             <td><?php echo $sr; ?></td>
                                             <td><?php echo $row['invoice']; ?></td>
                                             <td><?php echo $row['order_date']; ?></td>
                                             <td><?php echo $row['customer_name']; ?></td>
                                             <td><?php echo $row['total_taka']; ?></td>
                                             <td><?php echo $row['number']; ?>, <?php echo $row['number2']; ?></td>
                                               
                                            
                                         <td class="<?php echo $class ;?>"><?php echo $row['status'];; ?></td>
                                         <td><a href="order-details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-eye float-left"></i></a>
                                            
                                             <a href="order-edite.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit float-right"></i></a></td>
                                           </tr>
                                    
                                    <?php }?>
                                    
                                  


                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<tr class="badge-dark "></tr>


<?php 
    
    include'inc/footer.php';
}else{
    header("Location: login.php");
}?>