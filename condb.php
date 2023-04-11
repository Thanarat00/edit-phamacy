<?php 

$condb = mysqli_connect("localhost","root","","pos_ctm") 
or die ("Error :".mysqli_error($condb));
mysqli_query($condb,"SET NAMES UTF8");







date_default_timezone_set('Asia/Bangkok');


$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

//error_reporting( error_reporting() & ~E_NOTICE );//ปิดerror ที่ต้องใส่ @




// if($condb){

// 	echo "Connect";
// }else{

// 	echo "error";
// }




?>