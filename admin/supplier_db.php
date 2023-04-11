<?php 
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

// exit();


@$supplier = $_POST['supplier'];
if ($supplier == "add") {



	$s_name = mysqli_real_escape_string($condb,$_POST["s_name"]);
	
    
	$sql = "INSERT INTO tbl_supplier
	(
	s_name
	)
	VALUES
	(
	'$s_name'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	
	//exit();
	//mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'list_supplier.php?upplier_add=supplier_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_supplier.php?supplier_add_error=supplier_add_error'; ";
	echo "</script>";
}




}elseif ($supplier == "edit") {
// 	echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

//  exit();




	$s_id = mysqli_real_escape_string($condb,$_POST["s_id"]);
	$s_name = mysqli_real_escape_string($condb,$_POST["s_name"]);
	
	$sql = "UPDATE tbl_supplier SET 
	s_name='$s_name'
	
	
	WHERE s_id=$s_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'supplier_edit.php?s_id=$s_id&&supplier_edit=supplier_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'supplier_edit.php?s_id=$s_id&&supplier_edit_error=supplier_edit_error'; ";
	echo "</script>";
}
	
}else{
	$s_id  = mysqli_real_escape_string($condb,$_GET["s_id"]);
	$sql = "DELETE FROM tbl_supplier WHERE s_id=$s_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
	
	
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_supplier.php?supplier_del=supplier_del'; ";
	echo "</script>";	
}
//exit();

?>