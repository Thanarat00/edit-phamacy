

<?php
	require_once __DIR__ . '../../vendor/autoload.php';
     include('../condb.php');

     include "../barcode/src/BarcodeGenerator.php";
     include "../barcode/src/BarcodeGeneratorHTML.php";
     
     
     function barcode($code){
       
       $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
       $border = 1;//กำหนดความหน้าของเส้น Barcode
       $height = 40;//กำหนดความสูงของ Barcode
     
       return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
     
     }

	
$tableh = '
    <style>
        body{
            font-family: "freemono";
            font-size : 16px;
            display: flex;
            gap: 10px;
            gap: 10px 20px; /* row-gap column gap */
            row-gap: 10px;
            column-gap: 20px;
        }


           
    </style>



';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '

            <div sty>
                <div style="margin-left: 5%;">'.$row['p_name'].'</div>
                <barcode code="'.$row['p_id'].'" type="C128A">
               <div  style="margin-left: 4%">'.$row['p_id'].'</div>
               <div  style="margin-left: 4%;">ราคา: '.$row['p_price'].' บาท</div>
               </barcode>

          </div>
   
              

        ';
        
    }
    
mysqli_close($conn);



$body_1='
    <style>
        body{

            //font-family: "garuda";

              font-family: "freemono"


        }
    </style>';



    
$mpdf = new mPDF();


    


$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tablebody);

$mpdf->Output();

?>