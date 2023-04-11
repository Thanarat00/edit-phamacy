
<?php 
$menu = "product"
?>
<?php include("header.php"); ?>

<?php 
$query_product = "
SELECT p.*,t.t_name, b.b_name 
FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.t_id=t.t_id

LEFT JOIN tbl_brand as b ON p.b_id=b.b_id
WHERE p.p_license = 9 


" or die

("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);

//echo $query_product;

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
FROM tbl_supplier  WHERE s_id " or die
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
              <h3 class="card-title">รายการสินค้า ข.ย. 9</h3>

              <div align="right">
                <a href="#" target="" class="btn btn-primary" onclick="window.print()">Print</a>
                <a href="list_product_9.php" class="btn btn-primary">ข.ย. 9</a>
                <a href="list_product_10.php" class="btn btn-primary">ข.ย. 10</a>
                <a href="list_product_11.php" class="btn btn-primary">ข.ย. 11</a>
                    
                      
                    
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล สินค้า</button>
                   

                  </div>
            </div>
            <br>
            <div class="card-body">
            <p align="right"><a href="pdf_9.php" class="btn btn-secondary">Export To PDF</a></p>
              <div class="row">
                 
                 <div class="col-md-12">

  <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr class="danger">
    <th width="5%"><center>ลำดับ</center></th>
      <th width="10%">รูปภาพ</th>
      
      <th width="20%">ชื่อ</th>
      <th width="10%">ราคา</th>
      <th width="10%">จำนวน</th>
      <th width="20%">วันผลิต/หมดอายุ</th>
      
      <th width="10%">แก้ไข</th>
      <th width="10%">ลบ</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rs_product as $row_product) { ?>
      
    
    <tr>
     <td><?php echo @$l+=1; ?></td>
     <td><img src="../p_img/<?php echo $row_product['p_img']; ?>" width="100%"></td>

   
     <td><?php echo $row_product['p_name']; ?>
          <br>
          <?php if ($row_product['p_license']==9) {
                            echo "ข.ย.9";
                          }elseif ($row_product['p_license']==10) {
                            echo "ข.ย.10";
                          }elseif ($row_product['p_license']==11) {
                            echo "ข.ย.11";
                          }else{
                            echo "Error";
                          }?>
     </td>
     <td><?php echo $row_product['p_price']; ?></td>
     <td><?php echo $row_product['p_qty']; ?></td>
     <td>วันที่ผลิต : <?php echo $row_product['p_dateMFD']; ?> <br>
          วันที่หมดอายุ : <?php echo $row_product['p_dateEXD']; ?> <br>

          <?php $p_dateEXD = $row_product['p_dateEXD'];
                $p_dateMFD = $row_product['p_dateMFD']; 
                $dd = round(abs(strtotime($p_dateEXD) - strtotime($p_dateMFD))/60/60/24);
          ?>

          <?php if ($dd <= 30) {?>
            <p style="color: red">แจ้งเตือนยาจะหมดอายุภานใน 3 เดือน : อีก <?php echo $dd;?>  วันยาจะหมดอายุ</p>
          <?php }else{?>
            แจ้งเตือนอีก <?php echo $dd;?>  วันยาจะหมดอายุ
          <?php }?>
          
     </td>


     <td>

      <p style="margin-bottom: 10px;">
      <a href="product_edit.php?p_id=<?php echo $row_product['p_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
      </p>
        


      <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_product['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->


     </td>
     <td><a href="product_db.php?p_id=<?php echo $row_product['p_id']; ?>" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> ลบ</a></td>
     
    </tr>
  <?php 

  @$total+=$row_product['p_qty'];


  }
  

  //echo $total;
  ?>

  </tbody>
</table>

<?php if(isset($_GET['d'])){ ?>
                  <div class="flash-data" data-flashdata="<?php echo $_GET['d'];?>"></div>
                  <?php } ?>

                  <script>
            $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href') 
            Swal.fire({

                title: 'คุณต้องการลบหรือไม่?',
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่'
                }).then((result) => {
                    if (result.value) {
                        document.location.href = href;
                        
                    }
                })
         })

         const flashdata = $('.flash-data').data('flashdata')
         if(flashdata){
             swal.fire({
                 type : 'success',
                 title : 'Record Deleted',
                 text : 'Record has been deleted',
                 icon: 'success'
             })
         }
    </script>
                 
            
                    
                 </div>
                 
              </div>


            </div>
            <div class="card-footer">
                     
            </div>


              
    </div>



          

          
        

          



    </section>
    <!-- /.content -->





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">

        <form action="product_db.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="product" value="add">

          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สินค้า</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              

            <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ประเภทสินค้า </label>
                    <div class="col-sm-10">
                      <select name="t_id" class="form-control" required="">
                        <option value="">-เลือกประเภทสินค้า-</option>

                        <?php foreach ($rs_type as $rst) {?>
                          
                      
                        <option value="<?php echo $rst['t_id'];?>"><?php echo $rst['t_name'];?></option>

                      <?php }?>
                        
                      </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">หมวดหมู่ </label>
                    <div class="col-sm-10">
                      <select name="b_id" class="form-control" required="">
                          <option value="">-เลือกหมวดหมู่-</option>

                          <?php foreach ($rs_brand as $rsb) {?>
                            
                        
                          <option value="<?php echo $rsb['b_id'];?>"><?php echo $rsb['b_name'];?></option>

                        <?php }?>
                          
                        </select>
                      
                    </div>
                  </div>

                   

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">บาร์โค้ด </label>
                    <div class="col-sm-10">
                      <input  name="p_barcode" type="text" required class="form-control"  placeholder=""  minlength="3"/>
                    </div>
                  </div>

                 

                    

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                    <div class="col-sm-10">
                      <input  name="p_name" type="text" required class="form-control"  placeholder=""  minlength="3"/>
                    </div>
                  </div>
                  
                  </span>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียด </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="p_detail"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียดเพิ่มเติม </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="p_detailmore"></textarea>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ใบอนุญาต </label>
                    <div class="col-sm-10">
                      <select name="p_license" class="form-control" required="">
                          <option value="">-เลือกใบอนุญาต-</option>
                          <option value="9">ข.ย.9</option>
                          <option value="10">ข.ย.10</option>
                          <option value="11">ข.ย.11</option>
                        </select>
                      
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> วันที่ผลิต </label>
                    <div class="col-sm-10">
                      <input  name="p_dateMFD" type="date" required class="form-control"  placeholder=""/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> วันที่หมดอายุ </label>
                    <div class="col-sm-10">
                      <input  name="p_dateEXD" type="date" required class="form-control"  placeholder=""/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> สินค้านำเข้า</label>
                    <div class="col-sm-10">
                      <input  name="p_lot" type="text" required class="form-control"  placeholder=""/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ผู้ผลิต </label>
                    <div class="col-sm-10">
                      <select name="s_id" class="form-control" required="">
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
                      <input  name="p_price" type="number" min="0" required class="form-control"  minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">จำนวน </label>
                    <div class="col-sm-10">
                      <input  name="p_qty" type="number" min="0" required class="form-control"   minlength="3"/>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                     
                  
                  
            
           


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="p_img" name="p_img" onchange="readURL(this);" >
                          <label class="custom-file-label" for="file">อัพโหลดรูปภาพ</label>
                        </div>
                        <br><br>


                    <img id="blah" src="#" alt="your image" width="300" />


                    </div>
                  </div>
                    
                    
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
            </div>
          </div>
        </form>
      </div>
    </div> 

    
<?php include('footer.php'); ?>

<!-- <script>
  $(function () {
  $(".datatable").DataTable();
  // $('#example2').DataTable({
  //   "paging": true,
  //   "lengthChange": false,
  //   "searching": false,
  //   "ordering": true,
  //   "info": true,
  //   "autoWidth": false,
  // });
  });
  </script>
   -->
  
</body>
</html>


<!-- http://fordev22.com/ -->
