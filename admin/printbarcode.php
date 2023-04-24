

<?php
	require_once __DIR__ . '../../vendor/autoload.php';
     include('../condb.php');

	
$tableh = '
    <style>
        body{
            font-family: "freemono";
			position: relative;
            display: flex;
        }
        barcode {
			display: block;
			margin: 0 auto;
		}
		caption {
            margin-top: 10%;
			position: absolute;
			bottom: 0.5;
			width: 100%;
			font-size: 18px;
			font-weight: bold;
			padding: 10px;
			box-sizing: border-box;
		}

           
    </style>


    </thead>
        <tbody>';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '

            <div class="container">
            <div class="row">
              <div class="col-12 col-sm-3 col-md-3">
                <div class="caption" style="margin-left: 12%;">'.$row['p_name'].'</div>
                <barcode code="'.$row['p_barcode'].'" type="C128A" class"barcode" style = "box-shadow: 0 0 20px rgba(0,139,253,0.25);" >
               <div class="caption" style="margin-left: 12%">'.$row['p_barcode'].'</div>
               <div class="caption" style="margin-left: 12%;">ราคา: '.$row['p_price'].' บาท</div>
               </barcode>


              </div>
            </div>
          </div>
   
              

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