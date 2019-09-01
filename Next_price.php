<?php
session_start();
// echo '<pre>';
// 	print_r($_SESSION);
// echo '</pre>';
$itemid = $_REQUEST['auction_old_price'];
require('condb.php');

$sql_item = "
SELECT *
FROM auction  as a
INNER JOIN detailproduct as p ON a.product_id=p.product_id
WHERE a.auction_id=$itemid
";
    $result_item = mysqli_query($condb, $sql_item);
    $row_item = mysqli_fetch_array($result_item);

    $lprice = $row_item['product_price_bid'];
    $pbid = $row_item['auction_price'];
    $tprice = ($lprice + $pbid);
    echo '<h4>';
    echo '<font color="red">';
    echo number_format($tprice, 2);
    echo ' ' . ' THB';
    echo '</font>';
    echo '</h4>';