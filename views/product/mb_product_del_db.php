<meta charset="utf-8">
<?php
//condb
include('../../condb.php'); 

	$product_id = $_GET["id"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "DELETE FROM  detailproduct 
	WHERE product_id=$product_id";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());

	
	//ปิดการเชื่อมต่อ database
	mysqli_close($condb);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('บันทึกข้อมูลสำเร็จ');";
	echo "window.location = 'addproduct.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	//echo "alert('Error!!');";
	echo "window.location = 'addproduct.php'; ";
	echo "</script>";
}
?>