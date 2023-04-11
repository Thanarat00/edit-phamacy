<?php 
$menu = "sale_type";
?>


<?php include("header.php"); ?>

<?php 



// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
//exit();

@$t_id = $_GET['t_id'];
@$b_id = $_GET['b_id'];



// print_r($_SESSION);
// exit();
$query_product = " SELECT * FROM tbl_product 
WHERE t_id = $t_id AND b_id = $b_id

" or die
("Error : ".mysqlierror($query_product));

$rs_prd = mysqli_query($condb, $query_product);


$row = mysqli_num_rows($rs_prd);

// $query_product = " SELECT * FROM tbl_product ORDER BY rand()" or die
// ("Error : ".mysqlierror($query_product));
// $rs_product = mysqli_query($condb, $query_product);
//echo $rs_product;


?>

<?php 

$query=mysqli_query($condb,"SELECT COUNT(p_id) FROM `tbl_product` WHERE t_id = $t_id AND b_id = $b_id");

$row = mysqli_fetch_row($query);

$rows = $row[0];
$page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
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
$nquery=mysqli_query($condb,"SELECT * FROM tbl_product 
WHERE t_id = $t_id AND b_id = $b_id ORDER BY p_id DESC $limit");

$paginationCtrls = '';
if($last != 1){
if ($pagenum > 1) {
$previous = $pagenum - 1;
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&t_id='.$t_id.'&b_id='.$b_id.'" class="btn btn-info">Previous</a> &nbsp; ';


for($i = $pagenum-4; $i < $pagenum; $i++){
if($i > 0){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&t_id='.$t_id.'&b_id='.$b_id.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
}
}
}


//$paginationCtrls .= ''.$pagenum.' &nbsp; ';


$paginationCtrls .= '<a href=""class="btn btn-danger">'.$pagenum.'</a> &nbsp; ';


//t_id=1&b_id=1

for($i = $pagenum+1; $i <= $last; $i++){
$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&t_id='.$t_id.'&b_id='.$b_id.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
if($i >= $pagenum+4){
break;
}
}


if ($pagenum != $last) {
$next = $pagenum + 1;


$paginationCtrls .= ' &nbsp;<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&t_id='.$t_id.'&b_id='.$b_id.'" class="btn btn-info">Next</a> ';
}
}




?>

<?php 
include "../barcode/src/BarcodeGenerator.php";
include "../barcode/src/BarcodeGeneratorHTML.php";


function barcode($code){
  
  $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
  $border = 2;//กำหนดความหน้าของเส้น Barcode
  $height = 40;//กำหนดความสูงของ Barcode

  return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);

}
?>


<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ขายสินค้า</h1>
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

                  <div class="row">

                    <div class="col-md-7">
                      <form action="l_a.php"  method="GET" >
                 <div class="input-group">
                    <input type="text" name="p_id" class="form-control" placeholder="Scan Barcode" autofocus >

                    <input type="hidden" name="t_id" value="<?php echo $t_id;?>">
                    <input type="hidden" name="b_id" value="<?php echo $b_id;?>">
                     <!-- <span class="input-group-append">
                     <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                     </span> -->
                  </div>



                  
              </form>
              <br>
                          <?php if ($row >0) {?> 
                            <div class="row">
                            

                            <?php while($rs_prd = mysqli_fetch_array($nquery)){ ?> 

                            <div class="col-md-4">
                             
                            <div class="card" style="">
                              <img width="100%" src="../p_img/<?php echo $rs_prd['p_img'] ;?>" class="card-img-top" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">
                              <div class="card-body">
                                 <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
                                <p class="card-text"><?php echo number_format($rs_prd['p_price'],2); ?> Baht</p>


                                <?php if($rs_prd['p_qty'] > 0){ ?>
                                  <center>  
                                          <!-- QR Code -->
                                              <!-- <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $rs_prd['p_id'];?>&choe=UTF-8" title="Link to my Website" /> -->
                                          <!-- Bar Code -->      
                                          <?php echo barcode($rs_prd['p_id']); ?>
                                       
                                          <br>

                                          <a href="l_a.php?t_id=<?php echo $t_id;?>&b_id=<?php echo $b_id;?>&p_id=<?php echo $rs_prd['p_id'];?>&act=add" class="btn btn-success" target=""><i class="fa fa-shopping-cart"></i> หยิบลงตระกร้า</a>
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


                    <div class="col-md-5">
                      <?php include('cart_a_2.php');?>
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
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>