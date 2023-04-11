<?php 
session_start();
        if(isset($_POST['c_username'])){
        //connection
                  include("condb.php");
        //รับค่า user & c_password
                  $c_username = mysqli_real_escape_string($condb,$_POST['c_username']);
                  $c_password = mysqli_real_escape_string($condb,sha1($_POST['c_password']));

                  $chk = trim($c_username) OR trim($c_password);
                  if($chk==''){
                    echo '<script>';
                    echo "alert(\" เบอร์โทรศัพท์ หรือ รหัสผ่าน ไม่ถูกต้อง\");"; 
                    echo "window.history.back()";
                    echo '</script>';
                    }//close if chk trim
                    else{
                    //query 
                              $sql="SELECT * FROM tbl_customer 
                              WHERE c_username='".$c_username."' 
                              AND c_password='".$c_password."' ";

                              $result = mysqli_query($condb,$sql);

                              //echo mysqli_num_rows($result);

                              //exit;
                    
                              if(mysqli_num_rows($result)==1){

                                  $row = mysqli_fetch_array($result);

                                  $_SESSION["c_id"] = $row["c_id"];
                                  $_SESSION["c_status"] = $row["c_status"];
                                  $_SESSION["c_name"] = $row["c_name"];
                                  $_SESSION["c_surname"] = $row["c_surname"];
                                  $_SESSION["c_phone"] = $row["c_phone"];
                                  $_SESSION["c_username"] = $row["c_username"];
                                  $_SESSION["c_img"] = $row["c_img"];



                                  

                                  //print_r($_SESSION);

                                  //var_dump($_SESSION);



                                  //exit();

                                  if($_SESSION["c_status"]=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                                      echo "<script>";
                                      echo "alert(\" เข้าสู่ระบบสำเร็จ\");"; 
                                      echo "window.location=\"index.php\""; 
                                      echo "</script>";

                                  }
                                  elseif ($_SESSION["c_status"]=="2") {
                                    echo "<script>";
                                    echo "alert(\" ไม่สามารถเข้าใช้งานได้\");"; 
                                    echo "window.history.back()";
                                    echo "</script>";
                                  }

                              }else{
                                echo "<script>";
                                echo "alert(\" เบอร์โทรศัพท์ หรือ รหัสผ่าน ไม่ถูกต้อง\");"; 
                                echo "window.history.back()";
                                echo "</script>";
                              }


                    }//close else chk trim

                    //exit();




        }else{


             Header("Location: index_2.php"); //user & c_password incorrect back to login again

        }
?>