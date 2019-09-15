<?php
header('Content-Type: application/json');
ob_start();
session_start();
require_once './config.php';

$ID=1;
$type="row";
if($type=='Proviance'){
    $query="SELECT PROVINCE_ID, PROVINCE_NAME FROM province ORDER BY PROVINCE_NAME ASC ";
}else if($type=='District') {
    $query="SELECT AMPHUR_ID, AMPHUR_NAME FROM amphur WHERE PROVINCE_ID='".$ID."'";
} else if($type=='Subdistrict'){
    $query="SELECT DISTRICT_ID, DISTRICT_NAME FROM district WHERE AMPHUR_ID='".$ID."'";
} else if($type=='Postcode'){
    $query="SELECT POST_CODE FROM amphur_postcode WHERE AMPHUR_ID='".$ID."'";
}
$result1 = mysqli_query($condb,$query);


echo ($result1);exit;

 while ($date=$result1->fetch(PDO::FETCH_ASSOC)) {
     # code...
     $date[] = $con;
     array_push($row,$date);
 }
echo json_decode($row);