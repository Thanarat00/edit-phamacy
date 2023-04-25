

<?php
	require_once __DIR__ . '../../vendor/autoload.php';
     include('../condb.php');

     include "../barcode/src/BarcodeGenerator.php";
     include "../barcode/src/BarcodeGeneratorHTML.php";
     
     
     function barcode($code){
       
       $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
       $border = 1;//กำหนดความหน้าของเส้น Barcode
       $height = 40;//กำหนดความสูงของ Barcode
     
       return $generator->getBarcode($code , $generator::TYPE_CODE_11,$border,$height);
     
     }

	
$tableh = '
    <style>
        body{
            font-family: "freemono";
            font-size : 16px;
            display : flax;          
        }


           
    </style>



';
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($condb, $sql);
    $content = "";
        while($row = mysqli_fetch_assoc($result)) {
            $tablebody .= '

            <div>
                <barcode code="'.$row['p_id'].'" type="CODE11">

               </barcode>

          </div>
              

        ';
        
    }
    
mysqli_close($conn);






    
$mpdf = new mPDF();


    


$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tablebody);

$mpdf->Output();

?>