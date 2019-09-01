<?php
require('./condb.php');
$sql_update = "UPDATE auction SET auction_status = 1 WHERE (UNIX_TIMESTAMP(auction_end) - UNIX_TIMESTAMP()) < 0";
$result = mysqli_query($condb, $sql_update);
//echo $sql_update;
$sdate = date('Y-m-d');
$edate = date('Y-m-d H:i:s');
echo $cdate;
	$sql = "SELECT * 
				FROM auction  as a 
				INNER JOIN detailproduct as p ON a.product_id=p.product_id
				WHERE a.auction_status = 0 
				AND '$sdate' >= a.auction_startdate 
				AND '$edate' <= a.auction_end
				ORDER BY UNIX_TIMESTAMP(a.auction_end)";
	$result = mysqli_query($condb, $sql);

while ($row = mysqli_fetch_array($result)) {
	$id[] = $row['auction_id'];
	$name[] = $row['product_name'];
	$price[] = $row['product_price_bid'];
	$highest_bidder[] = $row['user_Name'];
	$date[] = $row['auction_end'];
	$path[] = $row['product_photo'];
	$cus_id_dis[] =$row['cus_id'];
	// echo $path;
}
?>
<link href="../css/jquery.countdown.css" rel="stylesheet" type="text/css" />
<!-- Include Scripts -->
<script type="text/javascript" src="../js/jquery.countdown.js"></script>
<script type="text/javascript">
function highlight(periods) {
		if ($.countdown.periodsToSeconds(periods) <= 30) {
	$(this).addClass('highlight');
	}
		else {
			$(this).removeClass('highlight');
		}
	}
$(document).ready(function(){
<?php
	for($i=0;$i<count($id);$i++) {
		echo '$("#item_time_'.$id[$i].'").countdown({
			until: new Date("'.$date[$i].'"),
			format: "dHMS",
			onTick: highlight,
			onExpiry: function() {
				$.ajax({
					type: "POST",
					url: "../ajax_bid_winner_process.php",
					data: {
						itemid:'.$id[$i].'
					},
					dataType: "json",
					success: function(data) {
						$("#bid").attr("id","ended");
						$("#ended").attr("src","../images/buttons/ended.png");
						$("#time_box").countdown("destroy");
					}
				});
			}
		});';
	}
?>
});
</script>
<?php 
if (isset($id)) {
	$in=0;
        for($i=0;$i<count($id);$i++) {
			if ($cus_id_dis[$i]!= null && $cus_id_dis[$i] === $_SESSION['cus_id']) {
				
			}
			$jook ='';
			// $in++;
			// var_export($in);
        echo  '<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 ">';
        echo '<div class="panel collapse in ">';
        echo   '<div class="panel-body pa-0">';
        echo       '<article class="col-item">';
        echo             '<div class="photo">';
        echo                 '<a href="auction.html"> <img src="../'.$path[$i].'" style="width:150px height=150px" class="img-responsive"';
        echo                         'alt="Product Image" /> </a>';
        echo              '</div>';
        echo             '<div class="info">';
        echo                 '<h6> ชื่อสินค้า </h6>';
		echo                 '<h6>ราคา <p>' .number_format($price[$i],2).' บาท'.'</p></h6>';
		echo '<p class="item_highest_bidder">'.$highest_bidder[$i].'</p>';
		echo '<div id="item_time_'.$id[$i].'" class="item_time">'.$date[$i].'</div>';
       
        echo             '</div>';
        echo '<a href="../bid_history.php?id='.$id[$i].'" class="btn btn-info" style="width:100%">
        <span class="glyphicon glyphicon-shopping-cart" disabled> </span> 
             ประมูล </a>';
        echo         '</article>';
        echo    '</div>';
        echo '</div>';
        
        echo '</div>';
        }
} 
 ?>
<?php
mysqli_close($condb);
?>