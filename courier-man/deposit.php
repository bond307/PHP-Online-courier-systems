<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
include 'logical-query.php';
    
    
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])){
        
        $date = date('M-d-Y');
        $tk = $_POST['tk'];
        
        $sql = "INSERT INTO desposit (desposit_amount, account_num, man_id, name, email, 	number, desposit_date, status) VALUES('$tk', '".$_SESSION['account_no']."','".$_SESSION['id']."', '".$_SESSION['name']."', '".$_SESSION['email']."', '".$_SESSION['Number']."', '$date', 'Pending')";
        
        if(mysqli_query($conn, $sql)){
            echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold">আপনি "'.$tk.'" টাকা জমা দিয়েছেন ! রিপর্ট দেখুন</sapn></h4>
           
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';
           
        }
        
    }
}
    
?>   
        
    
  
 <div class="page-wrapper">
     <div class="container-fluid">
         <div class="card col-md-8 offset-md-2">
             <div class="card-header m-t-20 bg-dark">
                 <h4 class="float-left text-white p-t-10">টাকা জমা ও জমাতিরিক্ত </h4>
                 <a href="deposit-histry.php" class="btn btn-danger btn-rounded float-right">Deposit Histry</a>
             </div>
              <?php if(isset($successs))echo $success;?>
             <div class="card-body">
                 <p class="font-16 text-center text-danger font-italic"> আপনার থেকে  <span class="font-18"> <?php echo $in_total - $total_despoit_balance;?><sup>৳</sup>  পাওয়া যাবে।   </p>
                
                 
                 <form action="" method="post">
                     <div class="form-group">
                         <label>টাকা জমা দিন</label>
                         <input type="text" class="form-control" placeholder="টাকা জমা দিন" name="tk" required>
                     </div>
                     <button class="btn btn-rounded btn-pinterest col-md-6 offset-md-3" type="submit" name="submit"> Submit</button>
                 </form>
             </div>
             <p class="text-white btn btn-s btn-rounded btn-dark reports text-cyan text-center m-20" id="reports">Report's</p>
         </div>
         
        
         <div style="display:none" class="despost-reports card col-md-8 offset-md-2">
             <div class="card-header m-t-20 bg-success">
                 <h4 class="text-center text-white p-t-10">টাকা জমা ও জমাতিরিক্ত এর ছোট রিপর্ট </h4>
             </div>
             <div class="card-body">
                 <p class="font-16 text-center text-danger font-italic">আপনার জমা হস্ট্রি। </p>
                
                <p>মোট টাকা টাকা কালেশন করেছেনঃ <span class="font-16 text-danger"><?php echo $in_total;?></span></p>
                
                
                <p>মোট জমা দিয়েছেনঃ <span class="font-16 text-danger"><?php echo $total_despoit_balance;?></span></p>
                
             </div>
         </div>
         
         
     </div>
 </div>


<script>
$(document).ready(function(){
  $("#reports").click(function(){
    $(".despost-reports").toggle(200);
  });
});
    
</script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>