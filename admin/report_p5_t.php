
<?php 
$menu = "report_p5_t"
?>
<?php include("header.php"); ?>

<?php 
 
$query_my_order = "SELECT t.t_id, t.t_name, SUM(d.total) AS t_total 
FROM tbl_type AS t 
left JOIN tbl_product AS p ON t.t_id=p.t_id 
left JOIN tbl_order_detail AS d ON d.p_id=p.p_id
left JOIN tbl_order AS o ON o.order_id=d.order_id
WHERE o.order_status =4 
GROUP BY t.t_id ORDER BY  t_total DESC LIMIT 5
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
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">อันดับประเภทสินค้าขายดี</h3>
                
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
                        
                                  <th>ชื่อประเภท</th>
                                  <th>จำนวนยอดขาย</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  foreach($rs_my_order as $rs_order){
                                      echo"<tr>";


                                          echo "<td>".$rs_order['t_name']."</td>";
                                          echo "<td>".$rs_order['t_total']."</td>";
                                          
                                          
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
                              text: 'รายงานภาพรวมยอดขาย 5 อันดับประเภทสินค้า ที่ขายดี',
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
                            text: 'ประเภทสินค้า',
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
