

<?php include("header.php"); ?>
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
$page_rows = 20;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
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
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; ';


for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
}
}
}


//$paginationCtrls .= ''.$pagenum.' &nbsp; ';


$paginationCtrls .= '<a href=""class="btn btn-danger">'.$pagenum.'</a> &nbsp; ';




for($i = $pagenum+1; $i <= $last; $i++){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
if($i >= $pagenum+4){
break;
}
}


if ($pagenum != $last) {
$next = $pagenum + 1;


$paginationCtrls .= ' &nbsp;<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
}




?>

<?php 
include "../barcode/src/BarcodeGenerator.php";
include "../barcode/src/BarcodeGeneratorHTML.php";


function barcode($code){
  
  $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
  $border = 1.5;//กำหนดความหน้าของเส้น Barcode
  $height = 40;//กำหนดความสูงของ Barcode

  return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);

}
?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">สินค้า IN STOCK</h3>
            </div>
            <br>



              <div class="card-body">

                <div class="col-md-12">
                <?php include('cart_a_2.php');?>
                  <div class="row">

                  

             

                    <div class="col-md-12">
                      <form action="list_l.php"  method="GET" >
         
                 <div class="input-group">
                    <input type="text" name="p_id" class="form-control" placeholder="Scan Barcode" autofocus >
                     <!-- <span class="input-group-append">
                     <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                     </span> -->
                  </div>



                  
              </form>
              <br>
                          <?php if ($row >0) {?> 
                            <div class="row">
                            

                            <?php while($rs_prd = mysqli_fetch_array($nquery)){ ?> 

                            <div class="col-md-3">
                             
                            <div class="card" style="">
                              <img width="100%" src="../p_img/<?php echo $rs_prd['p_img'] ;?>" class="card-img-top" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">
                              <div class="card-body">
                                 <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
                                <p class="card-text"><?php echo number_format($rs_prd['p_price']); ?> บาท</p>


                                <?php if($rs_prd['p_qty'] > 0){ ?>
                                  <center>  
                                          <!-- QR Code -->
                                              <!-- <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $rs_prd['p_id'];?>&choe=UTF-8" title="Link to my Website" /> -->
                                          <!-- Bar Code -->      
                                          <?php echo barcode($rs_prd['p_id']); ?>
                                       
                                          <br>

                                          <a href="list_l.php?p_id=<?php echo $rs_prd['p_id'];?>&act=add" class="btn btn-success" target=""><i class="fa fa-shopping-cart"></i> หยิบลงตระกร้า</a>
                                          </center>
                                <?php } else { ?>
                                  <button class="btn btn-danger" disabled> สินค้าหมด !</button>
                                <?php } ?>



                              </div>
                            </div>           


                            </div>
                            <?php }?>

                            
                            </div>

                          <?php }else{?>
                          <?php }?>
                    </div>

                </div>
        
                 
              </div>
              
              </div>






          

          
        
<div class="card-footer">
          <center>
            <div id="pagination_controls">
              
              <?php echo $paginationCtrls; ?>
                
          </div>
          </center>     
            </div>
          



    </section>
    <!-- /.content -->







<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
  
</body>
</html>