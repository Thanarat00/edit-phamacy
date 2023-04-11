<?php 



include ('header.php') ;
include ('navbar.php') ;
echo '<br>';
echo '<br>';

 
 

?>



<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<?php 
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$p_name = $_POST['p_name'];
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//exit();

$query_product = " SELECT * FROM tbl_product 
WHERE p_name LIKE '%$p_name%' 

" or die
("Error : ".mysqlierror($query_product));

$rs_product = mysqli_query($condb, $query_product);


$row = mysqli_num_rows($rs_product);

// $query_product = " SELECT * FROM tbl_product ORDER BY rand()" or die
// ("Error : ".mysqlierror($query_product));
// $rs_product = mysqli_query($condb, $query_product);
//echo $rs_product;


?>


<!--start  product -->
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
          <h3> 
         <br>
          </h3>
        </div>
<?php if ($row >0) {?>
        <?php foreach ($rs_product as $rs_prd)  {?>
         
        
          <div class="col-12 col-sm-3 col-md-3" style="margin-bottom: 10px;">
          <div class="card" style="width: 100%;height:100% ;">

            <a data-fancybox="gallery" href="p_img/<?php echo $rs_prd['p_img'] ;?>"style="height:50%;">
              <img src="p_img/<?php echo $rs_prd['p_img'] ;?>" style="width: 80%;height:80%;margin-left:25px;margin-top:5px"  class="card-img-top" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">
            
            </a>

            




            <div class="card-body">
              <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
              <p class="card-text"><?php echo number_format($rs_prd['p_price'],2); ?> บาท</p>

              <a href="detail.php?p_id=<?php echo $rs_prd['p_id'];?>&name=<?php echo $rs_prd['p_name']; ?>" class="btn btn-primary" target="_blank">รายละเอียด</a>

<!--               <a href='cart.php?p_id=$row[p_id]&act=add'>
 -->

            </div>
          </div>
        </div>

      <?php }?>
        
<?php }else{?>
  <div class="container">
  <h4><center>ไม่พบสินค้าที่ค้นหา โปรดค้นหาโดยระบุชื่อสินค้าในการค้นหา</center></h4>
</div>
<?php }?>
        
        
        
       
      </div>
    </div>
    <script type="text/javascript">
$('[data-fancybox]').fancybox({
//loop: false,
loop: true,
buttons: [
"zoom",
//"share",
"slideShow",
//"fullScreen",
//"download",
"thumbs",
"close"
],
// Open/close animation type
// Possible values:
//   false            - disable
//   "zoom"           - zoom images from/to thumbnail
//   "fade"
//   "zoom-in-out"
//
animationEffect: "zoom",
// Transition effect between slides
//
// Possible values:
//   false            - disable
//   "fade'
//   "slide'
//   "circular'
//   "tube'
//   "zoom-in-out'
//   "rotate'
//
transitionEffect: "slide",
});
</script>


<?php include ('footer.php') ; ?>
    <!--end  product -->