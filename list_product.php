<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<?php 


$query_product = " SELECT * FROM tbl_product " or die
("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);

// $query_product = " SELECT * FROM tbl_product ORDER BY rand()" or die
// ("Error : ".mysqlierror($query_product));
// $rs_product = mysqli_query($condb, $query_product);
//echo $rs_product;


?>



<?php 

$query=mysqli_query($condb,"SELECT COUNT(p_id) FROM `tbl_product`");

$row = mysqli_fetch_row($query);

$rows = $row[0];
$page_rows = 8;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
$last = ceil($rows/$page_rows);
if($last < 1){
$last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
$pagenum = 1;
}
else if ($pagenum > $last) {
$pagenum = $last;
}
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$nquery=mysqli_query($condb,"SELECT * from  tbl_product ORDER BY p_id DESC $limit");

$paginationCtrls = '';
if($last != 1){
if ($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">ย้อนกลับ</a> &nbsp; ';


for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
}
}
}


//$paginationCtrls .= ''.$pagenum.' &nbsp; ';


$paginationCtrls .= '<a href=""class="btn btn-secondary">'.$pagenum.'</a> &nbsp; ';




for($i = $pagenum+1; $i <= $last; $i++){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
if($i >= $pagenum+4){
break;
}
}


if ($pagenum != $last) {
$next = $pagenum + 1;


$paginationCtrls .= ' &nbsp;<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">ถัดไป</a> ';
}
}




?>

<br><br>
<!--start  product -->
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
          <h3>
         <br>
          </h3>
        </div>

        <?php
while($rs_prd = mysqli_fetch_array($nquery)){
?>
         
        
        <div class="col-12 col-sm-3 col-md-3" style="margin-bottom: 10px;">
          <div class="card" style="width: 100%;height:100% ;">
              <a data-fancybox="gallery" href="p_img/<?php echo $rs_prd['p_img'] ;?>"style="height:50%;"  >
              <img src="p_img/<?php echo $rs_prd['p_img'] ;?>" class="card-img-top"style="width: 80%;height:80%;margin-left:25px;margin-top:5px" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">
            
            </a>

            <div class="card-body" >
              <h5 class="card-title" ><?php echo $rs_prd['p_name']; ?></h5>
              <p class="card-text"><?php echo number_format($rs_prd['p_price'],2); ?> บาท</p>
              <a href="detail.php?p_id=<?php echo $rs_prd['p_id'];?>&name=<?php echo $rs_prd['p_name']; ?>" class="btn btn-primary" target="_blank">รายละเอียด</a>


        

<!--               <a href='cart.php?p_id=$row[p_id]&act=add'>
 -->

            </div>
          </div>
        </div>

      <?php }?>
        

        
        
        
       
      </div>
    </div>
    <center><div id="pagination_controls"><?php echo $paginationCtrls; ?></div></center>
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

});
</script>
    <!--end  product -->