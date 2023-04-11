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

    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
        <tr style="border:1px solid #000;padding:4px;">
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ชื่อสินค้า</td>
            <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; ราคา </td>
            
            <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">BARCODE</td>
        </tr>

    </thead>
        <tbody>';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
    if (mysqli_num_rows($result) > 0) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '<tr style="border:1px solid #000;">
                <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
                <td style="border-right:1px solid #000;padding:3px;">'.$row['p_name'].'</td>
                <td style="border-right:1px solid #000;padding:3px;">'.$row['p_price'].'</td>



                




                <td style="border-right:1px solid #000;padding:3px;"><barcode code="'.$row['p_barcode'].'" type="C128A" class="barcode" /></td>



            </tr>';
            $i++;
        }
    }
    
mysqli_close($conn);


$tableend = "</tbody>
</table>";


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