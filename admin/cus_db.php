<?php 
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

//exit();
@$cus = $_POST['cus'];
if ($cus == "add") {



	$c_status = 1;
	
	$c_name = mysqli_real_escape_string($condb,$_POST["c_name"]);
	$c_surname = mysqli_real_escape_string($condb,$_POST["c_surname"]);
	$c_phone = mysqli_real_escape_string($condb,$_POST["c_phone"]);
	$c_username = mysqli_real_escape_string($condb,$_POST["c_phone"]);
	$c_password = mysqli_real_escape_string($condb,(sha1($_POST["c_phone"])));
	

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$c_img = (isset($_POST['c_img']) ? $_POST['c_img'] : '');
	$upload=$_FILES['c_img']['name'];
	if($upload !='') { 

		$path="../c_img/";
		$type = strrchr($_FILES['c_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="../c_img/".$newname;
		move_uploaded_file($_FILES['c_img']['tmp_name'],$path_copy);  
	}else{
		$newname='';
	}

	$check = "
	SELECT c_username 
	FROM tbl_customer  
	WHERE c_username = '$c_username'
	";
    $result1 = mysqli_query($condb, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
	    echo "<script>";
	    
	    echo "window.location = 'list_cus.php?cus_add_error=cus_add_error'; ";
	    echo "</script>";
    }else{

    
	$sql = "INSERT INTO tbl_customer
	(
	c_status,
	
	c_name,
	c_surname,
	c_phone,
	c_username,
	c_password,
	c_img
	)
	VALUES
	(
	'$c_status',
	'$c_name',
	'$c_surname',
	'$c_phone',
	'$c_username',
	'$c_password',
	'$newname'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	}
	//exit();
	//mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'list_cus.php?mem_add=mem_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_cus.php?mem_add_error=mem_add_error'; ";
	echo "</script>";
}


}elseif ($cus == "edit") {
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

//exit();



	$c_status = mysqli_real_escape_string($condb,$_POST["c_status"]);
	$c_id = mysqli_real_escape_string($condb,$_POST["c_id"]);
	$c_name = mysqli_real_escape_string($condb,$_POST["c_name"]);
	$c_surname = mysqli_real_escape_string($condb,$_POST["c_surname"]);
	$c_phone = mysqli_real_escape_string($condb,$_POST["c_phone"]);
	$c_username = mysqli_real_escape_string($condb,$_POST["c_username"]);
	$c_password = mysqli_real_escape_string($condb,(sha1($_POST["c_password"])));
	$c_img2 = mysqli_real_escape_string($condb,$_POST['c_img2']);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$c_img = (isset($_POST['c_img']) ? $_POST['c_img'] : '');
	$upload=$_FILES['c_img']['name'];
	if($upload !='') { 

		$path="../c_img/";
		$type = strrchr($_FILES['c_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="c_img/".$newname;
		move_uploaded_file($_FILES['c_img']['tmp_name'],$path_copy);  
	}else{
		$newname=$c_img2;
	}

	$sql = "UPDATE tbl_customer SET 
	c_status='$c_status ',
	c_name='$c_name',
	c_surname='$c_surname',
	c_phone='$c_phone',
	c_username='$c_username',
	c_password='$c_password',
	c_img='$newname'
	WHERE c_id=$c_id";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'cus_edit.php?c_id=$c_id&&mem_edit=mem_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'cus_edit.php?c_id=$c_id&&mem_edit_error=mem_edit_error'; ";
	echo "</script>";
	}









}else{
	$c_id  = mysqli_real_escape_string($condb,$_GET["c_id"]);
	$sql = "DELETE FROM tbl_customer WHERE c_id=$c_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
	
	
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_cus.php?mem_del=mem_del'; ";
	echo "</script>";	
}
//exit();


?>