

<?php include("header.php"); ?>
<?php 



$p_name = $_POST['p_name'];

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//exit();

$query_product = " SELECT * FROM tbl_product 
WHERE  (p_name  Like '%$p_name%' OR p_id Like '%$p_name%');

" or die
("Error : ".mysqlierror($query_product));

$rs_product = mysqli_query($condb, $query_product);


$row = mysqli_num_rows($rs_product);

// $query_product = " SELECT * FROM tbl_product ORDER BY rand()" or die
// ("Error : ".mysqlierror($query_product));
// $rs_product = mysqli_query($condb, $query_product);
//echo $rs_product;


?>



<?php 
include "../barcode/src/BarcodeGenerator.php";
include "../barcode/src/BarcodeGeneratorHTML.php";


function barcode($code){
  
  $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
  $border = 1;//กำหนดความหน้าของเส้น Barcode
  $height = 40;//กำหนดความสูงของ Barcode

  return $generator->getBarcode($code , $generator::TYPE_CODE_11,$border,$height);

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
                  <form action="Search_p.php"  method="POST" >
                 <div class="input-group">
                 <input type="text" name="p_name" class="form-control" placeholder="ค้นหา">
                     <span class="input-group-append">
                     <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                     </span>
                  </div>


                  
              </form>
              <br>
              <?php if ($row >0) {?>

                            <div class="row">
                            

                            <?php foreach ($rs_product as $rs_prd)  {?>

                            <div class="col-md-3">
                             
                            <div class="card" style="">
                              <img width="100%" src="../p_img/<?php echo $rs_prd['p_img'] ;?>" class="card-img-top" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">
                              <div class="card-body">
                                 <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
                                <p class="card-text"><?php echo number_format($rs_prd['p_price']); ?> บาท</p>


                                <?php if($rs_prd['p_qty'] > 0){ ?>
                                  <center>  
                                          <!-- QR Code -->
                                    
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
                            <div class="container">
                            <h4><center>ไม่พบสินค้าที่ค้นหา โปรดค้นหาโดยระบุชื่อสินค้าในการค้นหา</center></h4>
                            </div>
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