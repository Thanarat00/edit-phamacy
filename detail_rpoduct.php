

<?php 
$p_id = mysqli_real_escape_string($condb,$_GET['p_id']);










$query_product = " SELECT * FROM tbl_product WHERE p_id = $p_id" or die
("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
$row_prd=mysqli_fetch_array($rs_product);

//print_r($row_prd);

//echo $rs_product;


// update view รับจาก p_id



$query_gall = "
SELECT * FROM tbl_product_gall as pg 

WHERE p_id = $p_id

" or die

("Error : ".mysqlierror($query_gall));
$rs_gall = mysqli_query($condb, $query_gall);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<!--start  product -->
    <div class="container">

      <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
          <h3>
          รายละเอียดสินค้า
          </h3>
        </div> 
      </div>





      <div class="row">


         
        <div class="col-md-6" >
          <a data-fancybox="gallery" href="p_img/<?php echo $row_prd['p_img'] ;?>">
            <img src="p_img/<?php echo $row_prd['p_img']; ?>" width="100%">
          </a>
            <br><br>
          <div class="row">
            <div class="col-md-3">
         
            
            <br><br>
            </div>


          </div>




          
        </div>


        <div class="col-md-6" >
          <h4><?php echo $row_prd['p_name']; ?></h4>
          <h4>ราคา : <?php echo number_format($row_prd['p_price'],2); ?> บาท</h4>

          <p>
            <b>รายละเอียดสินค้า</b><br/>
            <?php echo $row_prd['p_detail'] ;?><br/>
            <b>วิธีการใช้</b><br/>
            <?php echo $row_prd['p_detailmore'] ;?><br/>

        </div>



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


    <!--end  product -->