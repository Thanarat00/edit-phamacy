
<?php 
$menu = "report_d"
?>
<?php include("header.php"); ?>

<?php 




// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$date_s = $_POST['date_s']." 00:00:00";
$date_e = $_POST['date_e']." 23:59:59";
// echo $date_s;
// echo "<br>";
// echo $date_e;
//exit();
 
$query_my_order = "SELECT 
order_id, DATE_FORMAT(order_date, '%d-%M-%Y') AS datesave,
SUM(pay_amount) AS ptotal
FROM tbl_order 
WHERE order_status =4
AND 
order_date BETWEEN '$date_s' AND '$date_e'

GROUP BY DATE_FORMAT(order_date, '%d-%M-%Y') DESC
ORDER BY DATE_FORMAT(order_date, '%d-%M-%Y') DESC

" 
or die
("Error : ".mysqlierror($query_my_order));
$rs_my_order = mysqli_query($condb, $query_my_order);
//echo ($query_my_order);//test query
//exit();
?>





    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Dashboard</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">Report Day</h3>
                <div align="right">

                    
                      
                    
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i> ค้นหา ตามช่วงระยะเวลา</button>
                   

                  </div>
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                 <div class="col-md-12">
                <script src="../highcharts/jquery-1.12.0.min.js"></script>
                <script src="../highcharts/highcharts.js"></script>
                <script src="../highcharts/data.js"></script>
                <script src="../highcharts/exporting.js"></script>


<!-- <?php foreach ($rs_my_order as $rs_order) { ?>

  <?php echo $rs_order['datesave']."<br>";?>

  <?php echo $rs_order['ptotal']."<br>"; ?>
<?php }?> -->



<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        <br>

                <table class="table" id="datatable" >
                          <thead>
                              <tr>
                        
                                  <th>วัน/เดือน/ปี</th>
                                  <th>จำนวนยอดขาย</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  foreach($rs_my_order as $rs_order){
                                      echo"<tr>";


                                          echo "<td>".$rs_order['datesave']."</td>";
                                          echo "<td>".$rs_order['ptotal']."</td>";
                                          
                                          
                                      echo"</tr>";
                                  }
                              ?>
                          
                          </tbody>
                  </table>

                 

               
                 
                  
                  <script>

                  
                  $(function () {
                      
                      $('#container').highcharts({
                          data: {
                              table: 'datatable',

                          },





                          chart: {
                              type: 'column', // column, line, pie, areaspline
                              //backgroundColor: '#2b3034',
                          },
                          title: {
                              text: 'รายงานภาพรวมยอดขายรายวัน',
                                style: {
                              //color: '#fff'
                              
                                }

                          },

                          plotOptions: {

                          series: {
                            colorByPoint: true, //ทำให้ เป็นสี ตามแท่ง
                              
                              borderWidth: 2,
                              dataLabels: {
                                  enabled: true,
                                  //format: '{point.y:.1f}%', //แสดง%

                                  style: {
                                //color: '#fff',
                                //borderColor: '#fff',
                                //font: '11px Trebuchet MS, Verdana, sans-serif'
                             },


                              }

                          }
                      },

                          //colors:["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],//สำหรับเปลี่ยนสี

                          xAxis: {
                          //gridLineWidth: 1,
                          labels: {
                             style: {
                                //color: '#fff',
                                font: '11px Trebuchet MS, Verdana, sans-serif'
                             }
                          },
                          title: {
                            text: 'วัน/เดือน/ปี',
                             style: {
                                //color: '#fff',
                                fontWeight: 'bold',
                                fontSize: '12px',
                                fontFamily: 'Trebuchet MS, Verdana, sans-serif'

                             }            
                          }
                       },





                          yAxis: {
                            labels: {
                             style: {
                                //color: '#fff',
                                font: '11px Trebuchet MS, Verdana, sans-serif'
                             }
                          },
                              allowDecimals: false,
                              title: {
                                  text: 'ยอดขาย',

                                  style: {
                              //color: '#fff'
                              
                                }


                                
                              }
                          },

                          legend: {
                          itemStyle: {

                              //color: '#fff',
                              fontWeight: 'bold'
                          }
                      },
                         
                          
                          tooltip: {

                              formatter: function () {
                                  return '<b>' + this.series.name + '</b><br/>' +
                                      this.point.y + ' ' + this.point.name.toLowerCase();
                              }
                          }

                      });
                  });
                  
                  </script>
          
                        
                      </div>

                 


                 
            
                    
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

        <form action="report_d_s.php" method="POST" enctype="multipart/form-data">
      

          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h5 class="modal-title" id="exampleModalLabel">ค้นหาตามช่วงเวลา</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="form-row">
                     
                      <div class="form-group col-md-6">
                        <label for="admin_name">วันที่เริ่มต้น</label>
                        <input type="date" class="form-control" id="date_s" name="date_s" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="admin_username">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="date_e" name="date_e" placeholder="" required>
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

    
<?php include('footer2.php'); ?>

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
