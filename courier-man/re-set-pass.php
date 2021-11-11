<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';
    
    $Id = $_SESSION['id'];
$sql = "SELECT * FROM `curiar_boy_registration_tbl` WHERE id = '$Id' ";
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result );

    if(isset($_POST['submit'])){
    //old
        if(isset($_POST['old_pass']) && !empty($_POST['old_pass'])){
            if($row['curiar_boy_password'] == md5($_POST['old_pass'])){
                $old = md5($_POST['old_pass']);
            }else{
                $OldError = '
            <div class="alert alert-danger"><p class="btn btn-rounded btn-danger"> আপনার পুড়নো পাসওয়ার্ডটি সঠিক নয়।  </p></div>
            ';
            }
        }
        
        //New and conformat
        if(isset($_POST['new_pass']) && !empty($_POST['new_pass'])){
            $new = md5($_POST['new_pass']);
        }
        
        if(isset($_POST['re_pass']) && !empty($_POST['re_pass'])){
            if($new == md5($_POST['re_pass'])){
            $re = md5($_POST['re_pass']);
            }else{
                $reError = '
            <div class="alert alert-danger"><p class="btn btn-rounded btn-danger"> পাসওয়ার্ডটি মিলেনি </p></div>
            ';
            }
        }
        if(isset($old) && isset($re) && isset($new) ){
        $sql = "UPDATE curiar_boy_registration_tbl SET curiar_boy_password = '$new' WHERE id = '$Id'  ";
        $result = mysqli_query($conn, $sql);
        if($result){
             $success = '
            <div class="alert alert-success"><p class="btn btn-rounded btn-success"> আপনার পাসওয়ার্ডটি পরিবর্তন সক্ষম হয়েছে। </p></div>
            ';
        }
}
        
    }
    

?>   
        
    
 
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="text-center text-white">Re-set passeord</h3>
                </div>
                <div class="card-body">
                   <?php if(isset($OldError)) echo $OldError;?>
                   <?php if(isset($reError)) echo $reError;?>
                   <?php if(isset($success)) echo $success;?>
                    <form action="" method="post">
                        <div class="form-group">
                           <label>Old Password:</label>
                           <input type="text" class="form-control" placeholder="Type your old password..." name="old_pass">
                        </div>
                        <div class="form-group">
                           <label>New Password:</label>
                          <input type="text" class="form-control pwd" placeholder="New Password" name="new_pass">
                          
                        </div>
                        <div class="form-group">
                           <label>Re-enter Password:</label>
                              <input type="text" class="form-control" placeholder="Re-enter password" name="re_pass">
                            
                        </div>
                        
                        
                        
                        <button class="btn btn-warning btn-rounded" type="submit" name="submit">Re-set Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <script>
    $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
    </script>



<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>