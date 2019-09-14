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
                <a class="navbar-brand" href="../welcome.php">ประมูลสินค้า</a>

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
          echo '<li><a href="login_google.php">
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
                                    <h5 class="control-label mb-10" for="exampleCountry">แก้ไขข้อมูลส่วนตัว</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <form action="mb_profile_form_edit_db.php" method="post">


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">Email</label>
                                                    <input type="" class="form-control" name="cus_email" required=""
                                                        id="exampleInputName_1" placeholder="อีเมล"
                                                        value="<?php echo $row1['cus_email'];?>" disabled>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">Password</label>
                                                    <input type="" class="form-control" name="cus_password" required=""
                                                        id="exampleInputName_1" placeholder="รหัสผ่าน"
                                                        value="<?php echo $row1['cus_password'];?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">ชื่อ</label>
                                                    <input type="" class="form-control" name="cus_name" required=""
                                                        id="exampleInputName_1" placeholder="ชื่อ"
                                                        value="<?php echo $row1['cus_name'];?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">นามสกุล</label>
                                                    <input type="text" class="form-control" name="cus_lastname"
                                                        required="" id="exampleInputName_1" placeholder="นามสกุล"
                                                        value="<?php echo $row1['cus_lastname'];?>">
                                                </div>
                                            </div>
                                            <?php
                                            if ($row1['cus_sex']==0 && $row1['cus_sex']!=null) {
                                                $row1['radio1'] = true;
                                            } else {
                                                $row1['radio2'] = true;
                                            }
                                           
                                            ?>
                                      

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">เพศ</label>
                                                    <div class="radio-list">
                                                        <div class="radio-inline pl-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio1"
                                                                    value="option1">
                                                                <label for="radio1">ชาย</label>
                                                            </div>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="radio" id="radio2"
                                                                    value="option2">
                                                                <label for="radio2">หญิง</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">วันเกิด</label>
                                                    <input type="date" class="form-control"name="cus_birthday"  required=""
                                                        id="exampleInputName_1" placeholder="วันเกิด"
                                                        value="<?php echo $row1['cus_birthday'];?>" >
                                                        
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">เบอร์โทรศัพท์</label>
                                                    <input type="" class="form-control" name="cus_tel" required=""
                                                        id="exampleInputName_1" placeholder="เบอร์โทรศัพท์"
                                                        value="<?php echo $row1['cus_tel'];?>">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">ที่อยู่</label>
                                                    <input type="" class="form-control" name="cus_address" required=""
                                                        id="exampleInputName_1"
                                                        placeholder="ห้องเลขที่,บ้านเลขที่,ตึก,ชื่อถนน"
                                                        value="<?php echo $row1['cus_address'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">จังหวัด</label>
                                                    <input type="" class="form-control" name="cus_province" required=""
                                                        id="exampleInputName_1" placeholder="จังหวัด"
                                                        value="<?php echo $row1['cus_province'];?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">อำเภอ</label>
                                                    <input type="" class="form-control" name="cus_amphur" required=""
                                                        id="exampleInputName_1" placeholder="อำเภอ"
                                                        value="<?php echo $row1['cus_amphur'];?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label mb-10"
                                                        for="exampleInputName_1">รหัสไปรษณี</label>
                                                    <input type="" class="form-control" name="cus_zipcode" required=""
                                                        id="exampleInputName_1" placeholder="รหัสไปรษณี"
                                                        value="<?php echo $row1['cus_zipcode'];?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row ">
                                            <div class=" form-group text-center ">
                                                <input type="hidden" name="cus_id"
                                                    value="<?php echo $row1['cus_id'];?>">
                                                <button type="submit"  class="btn btn-success waves-effect"
                                                    data-dismiss="modal">บันทึก</button>
                                                <button type="button" class="btn btn-default waves-effect"
                                                    data-dismiss="modal">ยกเลิก</button>
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
    <script>
    setInterval("item_display()", 2000);

    function item_display() {
        $("#itemContain").load("index.php");
    }
    $(document).ready(function() {
        $("#dialog-login").dialog("destroy");
        $("#login").click(function() {
            $("#dialog-login").dialog({
                height: 200,
                width: 200,
                modal: true,
                buttons: {
                    "Sign In": function() {
                        $("#login-form").submit();
                    },
                    "Cancel": function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        });
        item_display();
    });

    function MM_swapImgRestore() { //v3.0
        var i, x, a = document.MM_sr;
        for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
    }

    function MM_preloadImages() { //v3.0
        var d = document;
        if (d.images) {
            if (!d.MM_p) d.MM_p = new Array();
            var i, j = d.MM_p.length,
                a = MM_preloadImages.arguments;
            for (i = 0; i < a.length; i++)
                if (a[i].indexOf("#") != 0) {
                    d.MM_p[j] = new Image;
                    d.MM_p[j++].src = a[i];
                }
        }
    }

    function MM_findObj(n, d) { //v4.01
        var p, i, x;
        if (!d) d = document;
        if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
            d = parent.frames[n.substring(p + 1)].document;
            n = n.substring(0, p);
        }
        if (!(x = d[n]) && d.all) x = d.all[n];
        for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
        for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
        if (!x && d.getElementById) x = d.getElementById(n);
        return x;
    }

    function MM_swapImage() { //v3.0
        var i, j = 0,
            x, a = MM_swapImage.arguments;
        document.MM_sr = new Array;
        for (i = 0; i < (a.length - 2); i += 3)
            if ((x = MM_findObj(a[i])) != null) {
                document.MM_sr[j++] = x;
                if (!x.oSrc) x.oSrc = x.src;
                x.src = a[i + 2];
            }
    }
    </script>

</body>

<script>
var vv = "";
var gg = 5;
var aa = "";
var ark;
for (var i = 0; i < gg; i++) {
    if (i != 2) {
        aa = "00:09:00";
        ark = 100;
    } else {
        aa = "01:10:00";
        ark = 200;
    }
    //เก็บค่าไว้ใน vv
    vv = '<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">' +
        '<div class="panel panel-default card-view pa-0">' +
        '<div class="panel-wrapper collapse in">' +
        '<div class="panel-body pa-0">' +
        '<article class="col-item">' +
        '<div class="photo">' +
        '<a href="auction.html"> <img src="dist/img/chair.jpg" class="img-responsive" alt="Product Image" /> </a>' +
        '</div>' +
        '<div class="info">' +
        '<h6> ชื่อสินค้า </h6>' +
        '<span class="head-font block text-warning font-16">150 บาท </span>' +
        '</div>' +
        '</article>' +
        '</div>' +
        '</div>' +
        '</div>	' +
        '</div>';
    $('#products').append(vv);
}
</script>

</html>