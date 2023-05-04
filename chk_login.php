<?php 
session_start();
        if(isset($_POST['mem_username'])){
        //connection
                  include("condb.php");
        //รับค่า user & mem_password
                  $mem_username = mysqli_real_escape_string($condb,$_POST['mem_username']);
                  $mem_password = mysqli_real_escape_string($condb,sha1($_POST['mem_password']));

                  $chk = trim($mem_username) OR trim($mem_password);
                  if($chk==''){
                      echo '<script>';
                        echo "alert(\" ชื่อผู้ใช้งาน หรือ  รหัสผ่าน ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                      echo '</script>';
                    }//close if chk trim
                    else{
                    //query 
                              $sql="SELECT * FROM tbl_member 
                              WHERE mem_username='".$mem_username."' 
                              AND mem_password='".$mem_password."' ";

                              $result = mysqli_query($condb,$sql);

                              //echo mysqli_num_rows($result);

                              //exit;
                    
                              if(mysqli_num_rows($result)==1){

                                  $row = mysqli_fetch_array($result);

                                  $_SESSION["mem_id"] = $row["mem_id"];
                                  $_SESSION["mem_name"] = $row["mem_name"];
                                  $_SESSION["ref_l_id"] = $row["ref_l_id"];
                                  $_SESSION["mem_status"] = $row["mem_status"];
                                  $_SESSION["mem_img"] = $row["mem_img"];
                     
                                

                                  

                                  //print_r($_SESSION);

                                  //var_dump($_SESSION);



                                  //exit();

                                  if($_SESSION["ref_l_id"]=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                                    
                                    if($_SESSION["mem_status"] =="1"){
                                      echo "<script>";
                                      echo "alert(\" เข้าสู่ระบบสำเร็จ\");"; 
                                      echo "window.location=\"admin/list_mem.php\""; 
                                      echo "</script>";
                                  
                                      }
                                     else{
                                      echo "<script>";
                                      echo "alert(\" คุณถูกระงับการใช้งาน\");"; 
                                      echo "window.history.back()";
                                      echo "</script>";
                                     } 
    
                                    }
                                  elseif($_SESSION["ref_l_id"]=="2" ){  

                                    if($_SESSION["mem_status"] =="1"){
                                      echo "<script>";
                                      echo "alert(\" เข้าสู่ระบบสำเร็จ\");"; 
                                      echo "window.location=\"admin/\""; 
                                      echo "</script>";
                                      }
                                     else{
                                      echo "<script>";
                                      echo "alert(\" คุณถูกระงับการใช้งาน\");"; 
                                      echo "window.history.back()";
                                      echo "</script>";
                                     } 
    

                                  }elseif($_SESSION["ref_l_id"]=="3"){  

                                     if($_SESSION["mem_status"] =="1"){
                                      echo "<script>";
                                      echo "alert(\" เข้าสู่ระบบสำเร็จ\");"; 
                                      echo "window.location=\"admin/\""; 
                                      echo "</script>";
                                      }
                                     else{
                                      echo "<script>";
                                      echo "alert(\" คุณถูกระงับการใช้งาน\");"; 
                                      echo "window.history.back()";
                                      echo "</script>";
                                     } 
    

                                  }
            
                              }else{
                                echo "<script>";
                                    echo "alert(\" ชื่อผู้ใช้งาน หรือ  รหัสผ่าน ไม่ถูกต้อง\");"; 
                                    echo "window.history.back()";
                                echo "</script>";

                              }


                    }//close else chk trim

                    //exit();




        }else{


             Header("Location: login.php"); //user & mem_password incorrect back to login again

        }
?>