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

  <aside class="main-sidebar sidebar-dark-gray elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-gray">
      <img src="../assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ร้านธรรมโอสถ (สมาชิก)</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../c_img/<?php echo $_SESSION['c_img'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" target="" class="d-block"> <?php echo $_SESSION['c_name'],$_SESSION['c_surname'];?> </a>
        </div>
        <div class="info">
          <a href="edit_profileuser.php" target="" class="d-block">  | แก้ไข </a>
        </div>
      </div>
    
     
      
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">เมนูสำหรับ สมาชิก</li>

          

          
          <li class="nav-item">
            <a href="user.php" class="nav-link <?php if($menu=="user"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>ประวัติการซื้อยา </p>
            </a>
          </li>
          <hr>
          <li class="nav-item">
            <a href="../index.php" class="nav-link ">
              <i class="nav-icon 	fa fa-arrow-circle-left"></i>
              <p>ย้อนกลับ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>


          
         


        </ul>



        <hr>

         
      </nav>
      





      
   
    </div>
    <!-- /.sidebar -->
  </aside>