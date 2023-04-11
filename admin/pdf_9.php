<?php

require_once __DIR__ . '../../vendor/autoload.php';
include('../condb.php');



$mpdf = new mPDF();
$mpdf->WriteHTML(
' <style>
        body{
            font-family: "freemono"; //คือ TH salaban แปลงชื่อเนื่องจาก function เดิม ดักการเพิ่มของไฟล์ font ซึ่งแก้แล้วไม่ได้
        }
    </style>'.

    '
    <table id="bg-table" width="100%" style="collapse;font-size:20pt;margin-top:8px;">
    <tr style="border:1px solid;">
        <td style="text-align:right;"><b> แบบ ข.ย. ๙ </b></td>
    </tr> 
    </table>

   


    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style=" solid #000;">
        <td style=" solid #000;padding:3px;text-align:center;">บัญชีการซื้อยา
        <br>...................................<br>(ร้านธรรมโอสถ)
        </td>
    </tr> 
    </table>   






    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">ลำดับที่</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">วันเดือนปีที่ซื้อ</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">ชื่อผู้ขาย</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">ชื่อยา</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">เลขที่หรืออักษรของครั้งที่ผลิต</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">จำนวน / ปริมาณ</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">ลายมือชื่อผู้มีหน้าที่ ปฏิบัติการ</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">หมายเหตุ</td>
    </tr> 
    <tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:center;">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        </td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"></td>
    </tr> 
    </table>   
    '




);
$mpdf->Output();
?>