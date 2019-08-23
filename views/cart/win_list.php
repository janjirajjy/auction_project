<?php
$query = "
SELECT p.*,u.*,a.*,c.*
FROM detailproduct as  p
INNER JOIN unit as u  ON p.unit_id=u.unit_id
INNER JOIN auction as a  ON p.product_id=a.product_id
INNER JOIN customer as c  ON a.cus_id=c.cus_id 
WHERE a.auction_status=1
ORDER BY a.auction_id DESC" 
or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query); 
//echo '<h4>::รายการสินค้าที่เปิดประมูล::</h4>';
echo "<table id='example' class='display table table-bordered table-hover'>";
//หัวข้อตาราง
echo "
<thead>
<tr align='center' class='danger'>
<th width='5%'><center>รหัส</center></th>
<th width='10%'>ภาพ</th>
<th width='30%'>ชื่อสินค้า</th>
<th width='20%'><center>ราคาประมูล</center></th>
<th width='30%'>ผู้ชนะประมูล</th>
<th width='5%'>เปิดดู</th>
</tr>
</thead>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["auction_id"] .'.'."</td> "; 
  echo "<td>"."<img src='".$row['product_photo']."' width='100%'>"."</td>";
  echo "<td>" 
  .$row["product_name"]
  .' จำนวน '
  .$row["auction_amount"].' '.$row["unit_detail"]
  .'<br>'
  .'<font color="blue">'
  .'เปิด '
  .date('d/m/Y',strtotime($row["auction_startdate"]))
  .'</font>'
  .' , '
  .'<font color="red">'
  .' ปิด '
  .date('d/m/Y H:i:s',strtotime($row["auction_end"]))
  .'</font>'
  ."</td> "; 
  echo "<td align='right'>" .number_format($row["product_price_bid"],2) .  "</td> ";
  echo "<td>" .$row["cus_name"] .' '.$row["cus_lastname"] ."</td> "; 
  echo "<td align='center'>
  <a href='bid.php?id=$row[auction_id]' class='btn btn-info btn-xs' target='_blank'>VIEW</a></td> ";

  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($condb);
?>