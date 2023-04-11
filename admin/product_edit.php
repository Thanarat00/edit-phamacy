
<?php 
$menu = "product"
?>
<?php include("header.php"); ?>

<?php 
$p_id = $_GET['p_id'];

$query_product = "SELECT * FROM tbl_product 

LEFT JOIN tbl_type
ON tbl_product.t_id = tbl_type.t_id

LEFT JOIN tbl_brand
ON tbl_product.b_id = tbl_brand.b_id

LEFT JOIN tbl_supplier
ON tbl_product.s_id = tbl_supplier.s_id

WHERE p_id = $p_id"  
or die("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
$row=mysqli_fetch_array($rs_product);
//echo $row['mem_name'];
//echo ($query_member);//test query
?>

<?php 
$query_type = "
SELECT *
FROM tbl_type " or die
("Error : ".mysqlierror($query_type));
$rs_type = mysqli_query($condb, $query_type);


$query_brand = "
SELECT *
FROM tbl_brand " or die
("Error : ".mysqlierror($query_brand));
$rs_brand = mysqli_query($condb, $query_brand);

$query_supplier = "
SELECT *
FROM tbl_supplier  WHERE  s_id" or die
("Error : ".mysqlierror($query_supplier));
$rs_supplier = mysqli_query($condb, $query_supplier);

?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขสินค้า</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="product_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product" value="edit">
                    <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
                    <input name="file1" type="hidden" id="file1" value="<?php echo $row['p_img']; ?>" />
                    <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ประเภทสินค้า</label>
                    <div class="col-sm-10">
                      <select name="t_id" class="form-control select2" required="">


                      <option value="<?php echo $row['t_id'] ?>"><?php echo $row['t_name']; ?></option>



                      <option value="">--เลือกประเภทสินค้า--</option>
                      <?php foreach ($rs_type as $rst) {?>
                        
                    
                      <option value="<?php echo $rst['t_id'];?>"><?php echo $rst['t_name'];?></option>

                    <?php }?>
                      
                    </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">หมวดหมู่ </label>
                    <div class="col-sm-10">
                      <select name="b_id" class="form-control select2" required="">


                      <option value="<?php echo $row['b_id'] ?>"><?php echo $row['b_name']; ?></option>



                      <option value="">--เลือกหมวดหมู่--</option>
                      <?php foreach ($rs_brand as $rsb) {?>
                        
                    
                      <option value="<?php echo $rsb['b_id'];?>"><?php echo $rsb['b_name'];?></option>

                    <?php }?>
                      
                    </select>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">บาร์โค้ด </label>
                    <div class="col-sm-10">
                      <input  name="p_barcode" readonly type="text" required class="form-control"  placeholder=""  value="<?php echo $row['p_barcode'];  ?>"/>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อสินค้า </label>
                    <div class="col-sm-10">
                      <input  name="p_name" type="text" required class="form-control"  placeholder="" value="<?php echo $row['p_name']; ?>"  minlength="3"/>
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียด </label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="p_detail"><?php echo $row['p_detail']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียดเพิ่มเติม </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="p_detailmore"><?php echo $row['p_detailmore']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ใบอนุญาต </label>
                    <div class="col-sm-10">
                      <select name="p_license" class="form-control" required="">
                        <option value="<?php echo $row['p_license']; ?>">
                          <?php if ($row['p_license']==9) {
                            echo "ข.ย.9";
                          }elseif ($row['p_license']==10) {
                            echo "ข.ย.10";
                          }elseif ($row['p_license']==11) {
                            echo "ข.ย.11";
                          }else{
                            echo "Error";
                          }?>
                        </option>


                          <option value="" disabled>-เลือกใบอนุญาต-</option>
                          <option value="9">ข.ย.9</option>
                          <option value="10">ข.ย.10</option>
                          <option value="11">ข.ย.11</option>
                        </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> วันที่ผลิต </label>
                    <div class="col-sm-10">
                      <input  name="p_dateMFD" type="date" required class="form-control"  placeholder="" value="<?php echo $row['p_dateMFD']; ?>"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> วันที่หมดอายุ </label>
                    <div class="col-sm-10">
                      <input  name="p_dateEXD" type="date" required class="form-control"  placeholder="" value="<?php echo $row['p_dateEXD']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> สินค้านำเข้า</label>
                    <div class="col-sm-10">
                      <input  name="p_lot" type="text" required class="form-control"  placeholder="" value="<?php echo $row['p_lot']; ?>"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ผู้ผลิต </label>
                    <div class="col-sm-10">
                      <select name="s_id" class="form-control" required="">
                      <option value="<?php echo $row['s_id'] ?>"><?php echo $row['s_name']; ?></option>
                          <option value="">-เลือกผู้ผลิต-</option>

                          <?php foreach ($rs_supplier as $rss) {?>
                            
                        
                          <option value="<?php echo $rss['s_id'];?>"><?php echo $rss['s_name'];?></option>

                        <?php }?>
                          
                        </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ราคา </label>
                    <div class="col-sm-10">
                      <input  name="p_price" type="number" min="0" required class="form-control"  placeholder="Price" value="<?php echo $row['p_price']; ?>"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">จำนวน</label>
                    <div class="col-sm-10">
                      <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="Qty" value="<?php echo $row['p_qty']; ?>"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  ภาพเก่า<br>

                        <img src="../p_img/<?php echo $row['p_img'];?>" width="150px">
                        <input type="hidden" name="mem_img2" value="<?php echo $row['p_img'];?>">
                        <br><br>


                   

                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     
                  
                  
            
                 


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="p_img" name="p_img" onchange="readURL(this);" >
                          <label class="custom-file-label" for="file">อัพโหลดรูปภาพ</label>
                        </div>
                        <br><br>


                    <img id="blah" src="#" alt="your image" width="300" />


                    </div>
                  </div>




                  <button type="submit" class="btn btn-danger btn-block">Update</button>



                  </form>

                    

                  
                 
            
                    
                 </div>
                 
              </div>


            </div>
            <div class="card-footer">
                     
            </div>


              
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


