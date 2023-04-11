
<?php 
$menu = "category"
?>
<?php include("header.php"); ?>

<?php 

$b_id = $_GET['b_id'];

$query_type = "SELECT * FROM tbl_brand WHERE b_id = $b_id"  
or die("Error : ".mysqlierror($query_type));
$rs_type = mysqli_query($condb, $query_type);
$row=mysqli_fetch_array($rs_type);



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
              <h3 class="card-title">แก้ไข หมวดหมู่</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-8">
                   <form action="brand_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="brand" value="edit">
                    <input type="hidden" name="b_id" value="<?php echo $row['b_id'];?>">
                    


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชื่อ หมวดหมู่</label>
                    <div class="col-sm-10">
                      <input type="text" name="b_name" class="form-control" id="b_name" placeholder="" value="<?php echo $row['b_name'];?>">
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
    // });
  });
</script>
  
</body>
</html>



