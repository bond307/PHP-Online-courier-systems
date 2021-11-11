<?php 
include 'lib/db.php';

if(isset($_POST['id'])){
    $sql = 'SELECT * FROM `city` WHERE cid = '.$_POST['id'].' ';
    $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){?>
        
 ?>
 
 <option value="<?php echo $row['city'] ;?>"><?php echo $row['city'] ;?></option>
  
   <?php 

}

}

?>
