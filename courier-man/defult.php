<?php 
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
include 'inc/header.php';?>   
        
    
  
 




<?php include'inc/footer.php';
}else{
    header("Location: login.php");
}?>