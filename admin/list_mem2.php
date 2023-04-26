
<?php 
$menu = "member"
?>
<?php include("header.php"); ?>

<?php 
$query_member = "SELECT * FROM tbl_member  WHERE ref_l_id = 2 " or die
("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
//echo ($query_level);//test query

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
              <h3 class="card-title">รายการผู้ใช้งานระบบ</h3>
              <div align="right">

                    
                      
                    
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล ผู้ใช้งานระบบ</button>
                   

                  </div>
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-12">

                    <table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr class="danger">
    <center>
    <th width="1%"><center>ลำดับ</center></th>
      <th width="10%"><center>รูปภาพ</center></th>
      <th width="40%"><center>ชื่อ</center></th>
      <th width="20%"><center>ระดับผู้ใช้งาน</center></th>
      <th width="20%"><center>แก้ไข</center></th>
      <th width="20%"><center>ลบ</center></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rs_member as $row_member) { ?>
      
    
    <tr>
     <td><?php echo @$l+=1; ?></td>
     <td><img src="../mem_img/<?php echo $row_member['mem_img']; ?>" width="100%"></td>

     <td><?php echo $row_member['mem_name']; ?></td>

     <td>
       
      <?php if ($row_member['ref_l_id']==2) {
        echo "เภสัช";
      }elseif($row_member['ref_l_id']==3){
        echo "เจ้าของกิจการ";
      }
       ?>
     </td>
  

     <td>


      <p style="margin-bottom: 10px;">

      <a href="mem_edit2.php?mem_id=<?php echo $row_member['mem_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
      </p>
        


      <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_level['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->


     </td>
     <td width ="20%"><a href="member_db2.php?mem_id=<?php echo $row_member['mem_id']; ?>" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> ลบ</a></td>
     
    </tr>
  <?php }?>
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

        <form action="member_db2.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="member" value="add">

          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล ผู้ใช้งานระบบ</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              


                 

                    

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                    <div class="col-sm-10">
                      <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value="">
                    </div>
                  </div>
                  
                  </span>


                


                 




                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-10">
                      <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="" value="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-10">
                      <input type="text" name="mem_password" class="form-control" id="mem_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  <br>


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                          <label class="custom-file-label" for="file">อัพโหลดรูปภาพ</label>
                        </div>
                        <br><br>


                    <img id="blah" src="../upload.png" alt="your image" width="300" />


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

<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
  
</body>
</html>


<!-- http://fordev22.com/ -->
