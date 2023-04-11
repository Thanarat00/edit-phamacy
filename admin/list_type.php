
<?php 
$menu = "type"
?>
<?php include("header.php"); ?>

 <?php 
            $query_type = "SELECT * FROM tbl_type ORDER BY t_id DESC" or die
            ("Error : ".mysqlierror($query_type));
            $rs_type = mysqli_query($condb, $query_type);
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
              <h3 class="card-title">รายการประเภทสินค้า</h3>
              <div align="right">

                    
                      
                    
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล ประเภทสินค้า</button>
                   

                  </div>
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-12">

                   <table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr class="danger">
      <th width="1%"><center>ลำดับ</center></th>
      <th width="10%">ประภทสินค้า</th>
      
      <th width="5%">แก้ไข</th>
      <th width="5%">ลบ</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rs_type as $rs_type) { ?>
      
    
    <tr>
     <td><?php echo @$l+=1; ?></td>
     

     <td><?php echo $rs_type['t_name']; ?></td>
     

     <td>

      <p style="margin-bottom: 10px;">
      <a href="type_edit.php?t_id=<?php echo $rs_type['t_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>

      </p>
        


      <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_product['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->


     </td>
     <td><a href="type_db.php?t_id=<?php echo $rs_type['t_id']; ?>" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> ลบ</a></td>
     
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
                //imageHeight: 100,
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

        <form action="type_db.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="type" value="add">

          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล ประเภทสินค้า</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อประเภท </label>
                    <div class="col-sm-10">
                      <input type="text" name="t_name" class="form-control" id="t_name" placeholder="" value="">
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
  
</body>
</html>



