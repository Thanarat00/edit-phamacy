<?php 
$menu = ""
?>

<?php include("header_2.php"); ?>

<?php 

$c_id = $_SESSION['c_id'];

$query_member = "SELECT * FROM tbl_customer WHERE c_id = $c_id"  
or die("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
$row=mysqli_fetch_array($rs_member);
//echo $row['mem_name'];
//echo ($query_member);//test query




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
              <h3 class="card-title">แก้ไขข้อมูลส่วนตัว</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="cus_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="cus" value="edit">
                    <input type="hidden" name="c_id" value="<?php echo $row['c_id'];?>">


                   




                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                    <div class="col-sm-10">
                      <input type="text" name="c_name" class="form-control" id="c_name" placeholder="" value="<?php echo $row['c_name'];?>">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">นามสกุล </label>
                    <div class="col-sm-10">
                      <input type="text" name="c_surname" class="form-control" id="c_surname" placeholder="" value="<?php echo $row['c_surname'];?>">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">เบอร์โทรศัพท์ </label>
                    <div class="col-sm-10">
                      <input type="text" name="c_phone" class="form-control" id="c_phone" placeholder="" value="<?php echo $row['c_phone'];?>">
                    </div>
                  </div>




                    


                  

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-10">
                      <input type="text" readonly name="c_username" class="form-control" id="c_username" placeholder="" value="<?php echo $row['c_username'];?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-10">
                      <input type="text" name="c_password" class="form-control" id="c_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" required="" value="" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                 <br>

                        <img src="../c_img/<?php echo $row['c_img'];?>" width="150px">
                        <input type="hidden" name="c_img2" value="<?php echo $row['c_img'];?>">
                        <br><br>


                   

                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  <br>


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="c_img" name="c_img" onchange="readURL(this);" >
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


<!-- http://fordev22.com/ -->
