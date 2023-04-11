
<?php  include ('header.php') ;
 include ('navbar.php') ; ?>



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
  <br> <br>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">ประวัติการซื้อยา</h3>
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-12">


                  <?php 

                   $act = (isset($_GET['act']) ? $_GET['act'] : '');
                    if($act =='view'){

                      include('admin/order_detail_2.php');

                   
                      }else{

                  include('admin/list_order_2.php');
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

