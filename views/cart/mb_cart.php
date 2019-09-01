<?php require('../../condb.php');?>
<?php 	

session_start();
//print_r($_SESSION);
$cus_status = $_SESSION['cus_status'];
if($cus_status!='ONLINE'){
	header("Location: ../logout.php ");	
}

$cus_id = $_SESSION['cus_id'];
 
$sql = "SELECT * FROM customer WHERE cus_id=$cus_id ";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row1 = mysqli_fetch_array($result);
extract($row1);
$cus_name = $row1['cus_name'];
$cus_cus_email=$row1['cus_email'];
$u_cusid=$row1['cus_id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>เข้าสู่ระบบ</title>
    <meta name="description" content="Elmer is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords"
        content="admin, admin dashboard, admin template, cms, crm, Elmer Admin, Elmeradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="../../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
 error_reporting( error_reporting() & ~E_NOTICE );
 session_start();
// echo '<pre>';
// 	print_r($_SESSION);
// echo '</pre>';
 $m_id = $_SESSION['cus_id'];
 $cus_name = $_SESSION['cus_name'];
//  var_dump($_SESSION);
 ?>
    <?php
$sql_update = "UPDATE auction SET auction_status = 1 WHERE (UNIX_TIMESTAMP(auction_end) - UNIX_TIMESTAMP()) < 0";
$result = mysqli_query($condb, $sql_update); 
//echo $sql_update;
$sdate = date('Y-m-d');
$edate = date('Y-m-d H:i:s');
//echo $cdate;
$sql = "SELECT * 
FROM auction  as a 
INNER JOIN detailproduct as p ON a.product_id=p.product_id
WHERE a.auction_status = 0 
AND '$sdate' >= a.auction_startdate 
AND '$edate' <= a.auction_end
ORDER BY UNIX_TIMESTAMP(a.auction_end)";
$result = mysqli_query($condb, $sql);
//echo $sql;
while ($row = mysqli_fetch_array($result)) {
	$id[] = $row['auction_id'];
	$name[] = $row['product_name'];
	$price[] = $row['product_price_bid'];
	$highest_bidder[] = $row['user_Name'];
	$date[] = $row['auction_end'];
	$path[] = $row['product_photo'];
// var_dump($row);
	//echo $path;
}

?>
    <div class="wrapper  theme-5-active pimary-color-blue">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="mobile-only-nav pull-left">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../welcome.php">หน้าหลัก</a>

            </div>
            <div class="mobile-only-nav pull-right">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="navlink" style="float:right">
                        <li><a href="../bank/mb_bank.php">จัดการบัญชี</a></li>
                        <li><a href="../product/addproduct.php">รายการสินค้า</a></li>
                        <li><a href="../mb_bid/mb_bid.php">ประวัติการประมูล</a></li>
                        <li><a href="../cart/mb_cart.php">รถเข็น</a></li>
                        <li><a href="../win.php/">ชนะประมูล</a></li>
                        <li><a href="../pay/mb_pay.php">สินค้ารอจัดส่ง</a></li>
                        <!-- <li><a href="about.php">เกี่ยวกับ</a></li>
                        <li><a href="index.php">ประมูล</a></li>
                        <li><a href="win.php">ชนะประมูล</a></li>
                        <li><a href="bank.php">การชำระเงิน</a></li>
                        <li><a href="signup.php">สมัครสมาชิก</a></li> -->
                        <?php if($m_id!=''){
              echo '<li><a href="../views/profile/mb_profile.php">
                <span class="glyphicon glyphicon-user"> </span>'
              .' '.$cus_name .' - Profile</a>
            </li>';
            echo '<li><a href="../../login_google.php">
              <span class="glyphicon glyphicon-off"> </span>
            Logout</a>
          </li>';
          }else{
          echo '<li><a href="../../login_google.php">
            <span class="glyphicon glyphicon-user"> </span>
          เข้าสู่ระบบ</a>
        </li>';
        }?>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar-collapse -->
        <div class="page-wrapper">
            <div class="container-fluid pt-10">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h5 class="control-label mb-10" for="exampleCountry">รถเข็น</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <div class="mb-20">
                                <a href="mb_cart.php" class="btn btn-info"> รถเข็น </a>
                               
                            </div>
                            <div class="panel-wrapper collapse in">
                                <!-- <div class="panel-body">
                                    <form action="profile_form_edit_db.php" method="post">
                                </div> -->
                                <?php 
			 if($cus_id !=''){
			 	 include('mb_win_list_m.php');
			 }else{       
			 	echo  '<p align="center"> -ต้อง Login เท่านั้น </p>';
			 }
			 ?>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>

            </div>

        </div>


    </div>

    </div>

    </div>
    </div>


    <!-- /Main Content -->

    </div>
    <!-- Footer -->
    <!-- <footer class="footer container-fluid pl-10 pr-10">
            <div class="row">
                <div class="col-sm-12">
                    <p>2017 &copy; Elmer. Pampered by Hencework</p>
                </div>
            </div>
        </footer> -->
    <!-- /Footer -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../ndors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../ndors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vector Maps JavaScript -->
    <script src="../vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/vectormap-data.js"></script>

    <!-- Calender JavaScripts -->
    <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="../vendors/jquery-ui.min.js"></script>
    <script src="../vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../dist/js/fullcalendar-data.js"></script>

    <!-- Counter Animation JavaScript -->
    <script src="../vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="../vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Data table JavaScript -->
    <script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="../dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Sparkline JavaScript -->
    <script src="../vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

    <script src="../vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="../dist/js/skills-counter-data.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="../vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="../dist/js/morris-data.js"></script>

    <!-- Owl JavaScript -->
    <script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- Switchery JavaScript -->
    <script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>

    <!-- Data table JavaScript -->
    <script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <!-- Gallery JavaScript -->
    <script src="../dist/js/isotope.js"></script>
    <script src="../dist/js/lightgallery-all.js"></script>
    <script src="../dist/js/froogaloop2.min.js"></script>
    <script src="../dist/js/gallery-data.js"></script>

    <!-- twitter JavaScript -->
    <script src="../dist/js/twitterFetcher.js"></script>

    <!-- Spectragram JavaScript -->
    <script src="../dist/js/spectragram.min.js"></script>

    <!-- Init JavaScript -->
    <script src="../dist/js/init.js"></script>
    <script src="../dist/js/widgets-data.js"></script>


</body>

</html>