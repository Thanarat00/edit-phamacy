    
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


    
<!--start  menu -->
    
      <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top"  id="main_navbar" >

      <a class="navbar-brand" href="index.php">
              <img src="logo1.png" width="190px" alt="">
            </a>
      <ul class="navbar-nav">
              <li class="nav-item active">
                  
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
           <ul class="navbar-nav mr-auto">
                   

                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle text-light navbar-brand" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           สินค้า
                       </a>
                       <ul class="dropdown-menu bg-dark  " aria-labelledby="navbarDropdown">
                            <!--  <li><a class="dropdown-item" href="#">BRAND-1</a></li>
                            <li><a class="dropdown-item" href="#">BRAND-2</a></li> -->
                            <!-- <div class="dropdown-divider"></div> -->

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
    
                            
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle text-light" id="navbarDropdown1" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <?php echo $rs_t['t_name']; ?>

                                </a>

                                <?php if ($rs_p_rows>0){?>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                  
                                
                                  <?php foreach ($rs_p as $rs_p ) {
                                    ?>
                                    

<!-- <a href="detail.php?p_id=" class="btn btn-primary" target="_blank">Read More ...</a> -->
 
                              

                                    <li class="nav-item dropdown">
                                     

                                        <a class="dropdown-item" href="l.php?t_id=<?php echo $rs_t['t_id']; ?>&b_id=<?php echo $rs_p['b_id']; ?>" id="navbarDropdown2" role="button" 
                                             >
                                        
                                            <?php echo $rs_p['b_name']; ?>
                                         


                                        </a>
                                     
                                        <!-- <ul class="dropdown-menu right" aria-labelledby="navbarDropdown2">
                                            <div class="dropdown-divider"></div>
                                            <li></li><a class="dropdown-item" href="#">Brand1-Model-1-prd1-1</a></li>
                                            <li></li><a class="dropdown-item" href="#">Brand1-Model-1-prd1-2</a></li>
                                        </ul> -->
                                    </li> <!--  <li class="nav-item dropdown"> -->
                                     
                                    <?php }?>



                                </ul>
                                <?php }?>
                              


                           </li> <!-- <li class="nav-item dropdown"> -->
                           



                     <?php }?>                   

                     </ul>
                   </li>
                   <ul class="navbar-nav">
               
               <!-- <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   ประเภทสินค้า
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                   <?php foreach($rs_ptype as $pt){

                      
                        $t_name = str_replace(' ','-',$pt['t_name']);
                                   


                     ?>
                   <a class="dropdown-item" href="cat.php?t_id=<?php echo $pt['t_id'];?>&title=<?php echo $t_name;?>"><?php echo $pt['t_name'];?> (<?php echo $pt['ttotal'];?>)</a>

               <?php }?>



                   
                  
                   
                 </div>
               </li> -->



              



             </ul>
                          
               </ul>

             </div>


        <div class="container">
              <?php if ($c_id == ''){ ?>
              <form action="index_sl.php" method="POST" class="mx-2 my-auto d-inline w-100">
                 <div class="input-group">
                    <input type="text" name="p_name" class="form-control" placeholder="ค้นหา">
                     <span class="input-group-append">
                     <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                     </span>
                  </div>
              </form>
              <?php } else {?>
               
                <form action="index_sl.php"  method="POST" class="mx-2 my-auto d-inline w-100">
                 <div class="input-group">
                    <input type="text" name="p_name" class="form-control" placeholder="ค้นหา">
                     <span class="input-group-append">
                     <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                     </span>
                  </div>
              </form>
              <?php }?>
                
            
            </div>
            <ul class="navbar-nav ">
            <?php if ($c_id == ''){ ?>
              &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
              &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
              &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
              &nbsp;  &nbsp;  
                <li class="nav-item">
                  <a class="nav-link  text-light navbar-brand" href="login.php">เข้าสู่ระบบ</a>
                </li>

              <?php } else {?>
                <li class="nav-item">
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php echo $c_name." &nbsp;     ".$c_surname; ?> 
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="user2.php">ประวัติ</a></li>
                      <li><a class="dropdown-item" href="editprofile.php">แก้ไขข้อมูลส่วนตัว</a></li>
                      <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
                </li>  
              <?php }?>
            </ul>
                </nav>

                
                <div id="carbon-block" align="center"></div>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                <script src="js/bootnavbar.js" ></script>
                <script>
                $(function () {
                $('#main_navbar').bootnavbar();
                })
                </script>
<br>
    
    <!--end  menu -->
   