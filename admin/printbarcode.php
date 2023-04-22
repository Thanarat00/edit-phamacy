
<?php
	require_once __DIR__ . '../../vendor/autoload.php';
     include('../condb.php');

	
$tableh = '
    <style>
        body{
            font-family: "freemono"; //คือ TH salaban แปลงชื่อเนื่องจาก function เดิม ดักการเพิ่มของไฟล์ font ซึ่งแก้แล้วไม่ได้
                display: flex; 
                flex-wrap: wrap;
                justify-content: center;
        }
		caption {
			position: absolute;
			bottom: 0.5;
			left: 0;
			width: 100%;
			text-align: center;
			font-size: 18px;
			font-weight: bold;
			padding: 10px;
			box-sizing: border-box;
		}

           
    </style>

    <h2 style="text-align:center"><br>ร้านธรรมโอสถ</h2>


    </thead>
        <tbody>';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '
        
               <barcode code="'.$row['p_barcode'].'" type="C128A" class"barcode-image" >
               <div class="caption">'.$row['p_barcode'].'</div>
               </barcode>



            '; 
        
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