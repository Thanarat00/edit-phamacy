<?php
	require_once __DIR__ . '../../vendor/autoload.php';
     include('../condb.php');
  

    
	
$tableh = '
    <style>
        body{
            font-family: "freemono"; //คือ TH salaban แปลงชื่อเนื่องจาก function เดิม ดักการเพิ่มของไฟล์ font ซึ่งแก้แล้วไม่ได้
        }
    </style>

    <h2 style="text-align:center"><br>ร้านธรรมโอสถ</h2>


    </thead>
        <tbody>';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
    if (mysqli_num_rows($result) > 0) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '<tr style="border:1px solid #000;">
               '.$i.'
      
                <td style="border:1.5%,height:40%,width:10%,size:auto;"><barcode code="'.$row['p_barcode'].'" type="C128A" class="barcode" />
                <center><div style = "margin-left:14%">'.$row['p_barcode'].'</div></center>
                </td>



            </tr>';
            $i++;
        }
    }
    
mysqli_close($conn);


$tableend = "</tbody>
";


$body_1='
    <style>
        body{

            //font-family: "garuda";

              font-family: "freemono"; //คือ TH salaban แปลงชื่อเนื่องจาก function เดิม ดักการเพิ่มของไฟล์ font ซึ่งแก้แล้วไม่ได้


        }
    </style>';



    
$mpdf = new mPDF();


    


$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tablebody);

$mpdf->WriteHTML($tableend);
$mpdf->Output();

?>