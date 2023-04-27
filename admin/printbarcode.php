<?php
require_once __DIR__ . '../../vendor/autoload.php';
include('../condb.php');

$tableh = '
<style>
    body{
        font-family: "freemono";
    }
    .product {
        margin-bottom: 10px;
        width: 20%;
        display: inline-block;
    }
    .product-name {
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 5px;
    }
    .product-price {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

</style>
';

$tablebody = '<div class="row">';
$sql = "SELECT * FROM tbl_product";
$result = mysqli_query($condb, $sql);

$counter = 1; // เพิ่มตัวแปร counter เพื่อนับจำนวนสินค้าที่แสดง

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($counter % 3 == 1) { // ถ้าเป็นสินค้าแถวแรกของแถวใหม่ให้เริ่ม div ใหม่
            $tablebody .= '<div class="row">';
        }
        
        $tablebody .= '   <div class="col-md-4">
                            <div class="product">
                                <div class="product-name">'.$row['p_name'].'</div>
                                <barcode code="'.$row['p_id'].'" type="C128A" class="barcode" />
                                <div class="product-price">ราคา: '.$row['p_price'].'</div>
                            </div>
                        </div>';

        if($counter % 3 == 0) { // ถ้าเป็นสินค้าแถวสุดท้ายของแถวใหม่ให้ปิด div
            $tablebody .= '</div>';
        }

        $counter++; // เพิ่ม counter ต่อไป
    }

    // กรณีที่ไม่เต็ม 9 สินค้า ให้เติม div เพิ่มเติมเพื่อจบแถว
    if($counter % 9 != 1) {
        $tablebody .= '</div>';
    }
}

mysqli_close($conn);

$tablebody .= '</div>';

$tableend = '</tbody>';

$mpdf = new mPDF();

$mpdf->WriteHTML($tableh);
$mpdf->WriteHTML($tablebody);
$mpdf->WriteHTML($tableend);

$mpdf->Output();
?>
