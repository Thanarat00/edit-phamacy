
<?php 
 if(@$_GET['do']=='success'){
            echo '<script type="text/javascript">
            swal("", "บันทึกสำเร็จ !!", "success");
            </script>';
            echo '<meta http-equiv="refresh" content="3;url=index.php" />';
 }elseif(@$_GET['do']=='d'){
            echo '<script type="text/javascript">
            swal("", "กรุณาลองใหม่ภายหลัง !!", "error");
            </script>';
            echo '<meta http-equiv="refresh" content="3;url=index.php" />';

 }
 ?>
<?php 
 include ('header.php') ;
 include ('navbar.php') ;
 include ('list_product.php') ;
 include ('footer.php') ;



 
 ?>
    
    
    
    
    