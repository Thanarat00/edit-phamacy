<?php 


// //query ธรรมดา
// $query_ptype = " ORDER BY t_name ASC" or die("Error:" . mysqli_error());
// $rs_ptype = mysqli_query($condb, $query_ptype);
// //



//query
$query_ptype = "

SELECT t.t_id, t.t_name, COUNT(p.t_id) as ttotal
FROM tbl_type as  t 
left JOIN tbl_product as  p ON t.t_id=p.t_id 
GROUP BY t.t_id
ORDER BY t.t_name ASC" or die("Error:" . mysqli_error());
$rs_ptype = mysqli_query($condb, $query_ptype);
//


$query_t = "SELECT * FROM tbl_type
 -- LEFT JOIN tbl_product ON tbl_type.t_id = tbl_product.t_id
 -- GROUP BY tbl_type.t_id
";
$rs_t= mysqli_query($condb, $query_t);
?>
<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
  <aside class="main-sidebar sidebar-dark-gray elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-gray">
      <img src="../assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ร้านธรรมโอสถ (<?php if ($m_level == 1) {
          echo "Admin";
        }elseif ($m_level == 2) {
          echo "เภสัช";
        }else{
          echo "เจ้าของ";
        }?>)</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../mem_img/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="edit_profile.php" target="" class="d-block"> <?php echo $_SESSION['mem_name'];?> | แก้ไข </a>
        </div>
      </div>



      <?php if ($m_level == 1) {?>
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">เมนูสำหรับการขาย</li>

          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>รายการขาย </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_l.php" class="nav-link <?php if($menu=="sale"){echo "active";} ?> ">
              <i class="nav-icon fa fa-shopping-cart "></i>
              <p>ขายสินค้า </p>
            </a>
          </li>




          <li class="nav-item">



            <a href="#" class="nav-link <?php if($menu=="sale_type"){echo "active";} ?> ">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                ขายแยกประเภท
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>


            <ul class="nav nav-treeview" style="display: none;">
              <?php foreach ($rs_t as $rs_t ) {
                                 $t_id = $rs_t['t_id'];
                                $query_p = "SELECT * FROM tbl_product
                                            INNER JOIN tbl_brand ON tbl_product.b_id = tbl_brand.b_id

                                            -- LEFT JOIN tbl_type ON tbl_product.t_id = tbl_type.t_id
                                             WHERE t_id = $t_id
                                             GROUP BY tbl_brand.b_id
                                            ";

                                $rs_p= mysqli_query($condb, $query_p);
                                $rs_p_rows = mysqli_num_rows($rs_p);
                                //echo $rs_p_rows;

                            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-th-list"></i>
                  <p>
                    <?php echo $rs_t['t_name']; ?>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <?php if ($rs_p_rows>0){?>
                <ul class="nav nav-treeview" style="display: none;">
                  <?php foreach ($rs_p as $rs_p ) {?>
                  <li class="nav-item">
                    <a href="l_a.php?t_id=<?php echo $rs_t['t_id']; ?>&b_id=<?php echo $rs_p['b_id']; ?>" class="nav-link">
                      <i class="fas fa-box-open"></i>
                      <p><?php echo $rs_p['b_name']; ?></p>
                    </a>
                  </li> 
                  <?php }?>
                </ul>
                <?php }?>
              </li>
              <?php }?>
            </ul>
          </li>













        </ul>








        <hr>




        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ตั้งค่าข้อมูลระบบ</li>
          
          <li class="nav-item">
            <a href="list_mem.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>ผู้ใช้งานระบบ </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_cus.php" class="nav-link <?php if($menu=="customer"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>สมาชิก </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_type.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
              <i class="nav-icon fa fa-copy"></i>
              <p>ประเภทสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_brand.php" class="nav-link <?php if($menu=="category"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box"></i>
              <p>หมวดหมู่ </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>คลังสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_supplier.php" class="nav-link <?php if($menu=="supplier"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>ผู้ผลิต </p>
            </a>
          </li>


        </ul>
        <hr>
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>



          <li class="nav-item">
            <a href="report_d.php" class="nav-link <?php if($menu=="report_d"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-white"></i>
              <p>ยอดขายรายวัน</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_m.php" class="nav-link <?php if($menu=="report_m"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-warning"></i>
              <p>ยอดขายรายสัปดาห์</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_y.php" class="nav-link <?php if($menu=="report_y"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-success"></i>
              <p>ยอดขายรายเดือน</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="report_p5.php" class="nav-link <?php if($menu=="report_p5"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-fuchsia"></i>
              <p>5 อันดับสินค้าขายดี</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_p5_t.php" class="nav-link <?php if($menu=="report_p5_t"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-purple"></i>
              <p>5 อันดับประเภทสินค้าขายดี</p>
            </a>
          </li>



         

      
         

          <li class="nav-header"></li>


          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <?php }elseif ($m_level == 2){ ?>
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">เมนูสำหรับบเภสัช</li>

          
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>รายการขาย </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_l.php" class="nav-link <?php if($menu=="sale"){echo "active";} ?> ">
              <i class="nav-icon fa fa-shopping-cart "></i>
              <p>ขายสินค้า </p>
            </a>
          </li>




          <li class="nav-item">



            <a href="#" class="nav-link <?php if($menu=="sale_type"){echo "active";} ?> ">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                ขายแยกประเภท
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>


            <ul class="nav nav-treeview" style="display: none;">
              <?php foreach ($rs_t as $rs_t ) {
                                 $t_id = $rs_t['t_id'];
                                $query_p = "SELECT * FROM tbl_product
                                            INNER JOIN tbl_brand ON tbl_product.b_id = tbl_brand.b_id

                                            -- LEFT JOIN tbl_type ON tbl_product.t_id = tbl_type.t_id
                                             WHERE t_id = $t_id
                                             GROUP BY tbl_brand.b_id
                                            ";

                                $rs_p= mysqli_query($condb, $query_p);
                                $rs_p_rows = mysqli_num_rows($rs_p);
                                //echo $rs_p_rows;

                            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-th-list"></i>
                  <p>
                    <?php echo $rs_t['t_name']; ?>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <?php if ($rs_p_rows>0){?>
                <ul class="nav nav-treeview" style="display: none;">
                  <?php foreach ($rs_p as $rs_p ) {?>
                  <li class="nav-item">
                    <a href="l_a.php?t_id=<?php echo $rs_t['t_id']; ?>&b_id=<?php echo $rs_p['b_id']; ?>" class="nav-link">
                      <i class="fas fa-box-open"></i>
                      <p><?php echo $rs_p['b_name']; ?></p>
                    </a>
                  </li> 
                  <?php }?>
                </ul>
                <?php }?>
              </li>
              <?php }?>

            </ul>
          
          </li>
         
          <hr>   
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ตั้งค่าข้อมูลระบบ</li>

          <li class="nav-item">
            <a href="list_cus.php" class="nav-link <?php if($menu=="customer"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>สมาชิก </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_type.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
              <i class="nav-icon fa fa-copy"></i>
              <p>ประเภทสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_brand.php" class="nav-link <?php if($menu=="category"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box"></i>
              <p>หมวดหมู่ </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>คลังสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_supplier.php" class="nav-link <?php if($menu=="supplier"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>ผู้ผลิต </p>
            </a>
          </li>

        </ul>
          <hr>
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>



          <li class="nav-item">
            <a href="report_d.php" class="nav-link <?php if($menu=="report_d"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-white"></i>
              <p>ยอดขายรายวัน</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_m.php" class="nav-link <?php if($menu=="report_m"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-warning"></i>
              <p>ยอดขายรายสัปดาห์</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_y.php" class="nav-link <?php if($menu=="report_y"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-success"></i>
              <p>ยอดขายรายเดือน</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="report_p5.php" class="nav-link <?php if($menu=="report_p5"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-fuchsia"></i>
              <p>5 อันดับสินค้าขายดี</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_p5_t.php" class="nav-link <?php if($menu=="report_p5_t"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-purple"></i>
              <p>5 อันดับประเภทสินค้าขายดี</p>
            </a>
          </li>
          <hr>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>












        </ul>








        <hr>




      
        
        

         
      </nav>
      <!-- /.sidebar-menu -->
      <?php }else{ ?>

        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">เมนูสำหรับการขาย</li>

          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>รายการขาย </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_l.php" class="nav-link <?php if($menu=="sale"){echo "active";} ?> ">
              <i class="nav-icon fa fa-shopping-cart "></i>
              <p>ขายสินค้า </p>
            </a>
          </li>




          <li class="nav-item">



            <a href="#" class="nav-link <?php if($menu=="sale_type"){echo "active";} ?> ">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                ขายแยกประเภท
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>


            <ul class="nav nav-treeview" style="display: none;">
              <?php foreach ($rs_t as $rs_t ) {
                                 $t_id = $rs_t['t_id'];
                                $query_p = "SELECT * FROM tbl_product
                                            INNER JOIN tbl_brand ON tbl_product.b_id = tbl_brand.b_id

                                            -- LEFT JOIN tbl_type ON tbl_product.t_id = tbl_type.t_id
                                             WHERE t_id = $t_id
                                             GROUP BY tbl_brand.b_id
                                            ";

                                $rs_p= mysqli_query($condb, $query_p);
                                $rs_p_rows = mysqli_num_rows($rs_p);
                                //echo $rs_p_rows;

                            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-th-list"></i>
                  <p>
                    <?php echo $rs_t['t_name']; ?>
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <?php if ($rs_p_rows>0){?>
                <ul class="nav nav-treeview" style="display: none;">
                  <?php foreach ($rs_p as $rs_p ) {?>
                  <li class="nav-item">
                    <a href="l_a.php?t_id=<?php echo $rs_t['t_id']; ?>&b_id=<?php echo $rs_p['b_id']; ?>" class="nav-link">
                      <i class="fas fa-box-open"></i>
                      <p><?php echo $rs_p['b_name']; ?></p>
                    </a>
                  </li> 
                  <?php }?>
                </ul>
                <?php }?>
              </li>
              <?php }?>
            </ul>
          </li>













        </ul>








        <hr>




        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ตั้งค่าข้อมูลระบบ</li>
          
          <li class="nav-item">
            <a href="list_mem2.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>ผู้ใช้งานระบบ </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_cus.php" class="nav-link <?php if($menu=="customer"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>สมาชิก </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_type.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
              <i class="nav-icon fa fa-copy"></i>
              <p>ประเภทสินค้า </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_brand.php" class="nav-link <?php if($menu=="brand"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box"></i>
              <p>หมวดหมู่</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>คลังสินค้า </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="list_supplier.php" class="nav-link <?php if($menu=="supplier"){echo "active";} ?> ">
              <i class="nav-icon fa fa-box-open"></i>
              <p>ผู้ผลิต </p>
            </a>
          </li>


        </ul>
        <hr>
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>



          <li class="nav-item">
            <a href="report_d.php" class="nav-link <?php if($menu=="report_d"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-white"></i>
              <p>ยอดขายรายวัน</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_m.php" class="nav-link <?php if($menu=="report_m"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-warning"></i>
              <p>ยอดขายรายสัปดาห์</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_y.php" class="nav-link <?php if($menu=="report_y"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line text-success"></i>
              <p>ยอดขายรายเดือน</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="report_p5.php" class="nav-link <?php if($menu=="report_p5"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-fuchsia"></i>
              <p>5 อันดับสินค้าขายดี</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_p5_t.php" class="nav-link <?php if($menu=="report_p5_t"){echo "active";} ?> ">
              <i class="nav-icon fas fa-crown text-purple"></i>
              <p>5 อันดับประเภทสินค้าขายดี</p>
            </a>
          </li>



         

      
         

          <li class="nav-header"></li>


          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

      <?php }?>





      
    </div>
    <!-- /.sidebar -->
  </aside>