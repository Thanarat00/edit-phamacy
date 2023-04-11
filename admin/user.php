<?php 
$menu = "user"
?>
<?php include("header_2.php"); ?>



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ประวัติการซื้อยา</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">รายการซื้อ</h3>
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-12">


                  <?php 

                   $act = (isset($_GET['act']) ? $_GET['act'] : '');
                    if($act =='view'){

                      include('order_detail_2.php');

                   
                      }else{

                  include('list_order_2.php');
                    } ?>


            
                    
                 </div>
                 
              </div>


            </div>
            <div class="card-footer">
                     
            </div>


              
    </div>



          

          
        

          



    </section>
    <!-- /.content -->

    
<?php include('footer.php'); ?>


</body>
</html>

