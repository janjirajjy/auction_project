<?php require('condb.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>เข้าสู่ระบบ</title>
    <meta name="description" content="Elmer is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Elmer Admin, Elmeradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    error_reporting(error_reporting() & ~E_NOTICE);
    session_start();
    // echo '<pre>';
    // 	print_r($_SESSION);
    // echo '</pre>';
    $m_id = $_SESSION['cus_id'];
    $cus_name = $_SESSION['cus_name'];
    $cus_email = $_SESSION['cus_email'];
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

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php">หน้าหลัก</a>

            </div>
            <div class="mobile-only-nav pull-right">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="navlink" style="float:right">
                        <li><a href="../views/cart/mb_cart.php">รถเข็น</a></li>
                        <!-- <li><a href="about.php">เกี่ยวกับ</a></li> -->
                        <!-- <li><a href="index.php">ประมูล</a></li> -->
                        <li><a href="win.php/">ชนะประมูล</a></li>
                        <!-- <li><a href="bank.php">การชำระเงิน</a></li> -->
                        <!-- <li><a href="signup.php">สมัครสมาชิก</a></li> -->

                        <?php if ($m_id != '') {
                            echo '<li><a href="../views/profile/mb_profile.php">
                <span class="glyphicon glyphicon-user"> </span>'
                                . ' ' . $cus_name . ' - Profile</a>
            </li>';
                            echo '<li><a href="../login_google.php">
            <button >Open modal for @getbootstrap</button>

              <span class="glyphicon glyphicon-off"> </span>
            Logout</a>
          </li>';
                        } else {
                            echo '<li><a type="button" class="btn btn-warning" data-toggle="modal"  data-toggle="modal" data-target="#md-upload">
             <span class="glyphicon glyphicon-user"> </span>
          เข้าสู่ระบบ</a>
        </li>';
                        } ?>
                    </ul>
                </div>


        </nav>
        <!-- /.navbar-collapse -->

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark">modals</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="#"><span>ui-elements</span></a></li>
                            <li class="active"><span>modals</span></li>
                        </ol>
                    </div>

                </div>
                <div class="row">
                    <!-- Row -->
                    <div class="col-md-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">varying modal content based on trigger button</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <!-- <p class="text-muted"> Use <code>event.relatedTarget</code> and HTML <code>data-*</code> attributes to vary the contents of the modal depending on which button was clicked. </p>
										<div class="button-list mt-25">
											<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
										</div> -->
                                    <!-- <button type="button" class="btn btn-space btn-success btn-big" data-toggle="modal" data-target="#md-upload"> -->
                                    <!-- <i class="icon icon-left mdi mdi-download"></i>นำเข้าข้อมูล Master</button> -->
                                    <div>
                                        <div id="itemContain">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>

                <!-- Footer -->
                <footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>2019 &copy;Jook</p>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="dist/js/modal-data.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>

        <!-- Fancy Dropdown JS -->
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>

        <!-- Owl JavaScript -->
        <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

        <!-- Switchery JavaScript -->
        <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>

</body>

</html>
<script>
    setInterval("item_display()", 1000);

    function item_display() {
        $("#itemContain").load("item_display2.php");

    }

    $("#confirm_upload").on('click', function() {
        $("#confirm_upload").modal('hide');
        $("#md-alert-upload").modal('show');
    });
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
<div id="md-upload" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_upload">
                <!-- <div class="modal-header modal-header-colored">
					<h3 class="modal-title">นำเข้าข้อมูล mapping กลุ่ม</h3>
					<button type="button" data-dismiss="modal" aria-hidden="true" class="close">
						<span class="mdi mdi-close"></span>
					</button>
				</div> -->
                <div class="modal-body">
                    <div class="col-12 col-sm-12 col-lg-12 form-group">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-10">
                                    <h3 class="text-center txt-dark mb-10">ลงชื่อเข้าสู้ระบบ</h3>

                                </div>
                                <div class="form-wrap">
                                    <form method="post" action="chklogin.php">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">อีเมล</label>
                                            <input class="form-control" required="" name="cus_email" type="text" id="txtUsername" placeholder="อีเมล" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="exampleInputpwd_2">รหัสผ่าน</label>
                                            <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">ลืมหรัสผ่าน</a>
                                            <div class="clearfix"></div>

                                            <input type="password" name="cus_password" id="txtPassword" class="form-control" required="" placeholder="รหัสผ่าน" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                        </div>
                                        <div class="button-list mt-25">
                                            <div class="form-group">
                                                <a class="g-signin2" data-onsuccess="onSignIn" href="goo/google_login.php">login_google</a>
                                                <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="" id="confirm_upload">สมัครสมาชิก</a>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary  btn-rounded" value="">เข้าสู้ระบบ</button>
                                        </div>
                                        <!-- <div class="col">
              				  <a href="register.php" class="btn btn-light btn-block">No account? Register</a>
              						</div> -->
                                    </form>
                                    <img src="goo/btn_google_signin_dark_pressed_web.png" alt="" href="goo/google_login.php" class="g-signin2" data-onsuccess="onSignIn">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="denied" name="result" />
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary">
                            <i class="icon icon-left mdi mdi-close"></i> ปฏิเสธ</button>
                        <button id="confirm_upload" name="confirm" type="button" class="btn btn-space btn-primary">
                            <i class="icon icon-left mdi mdi-download"></i> นำเข้า</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<div id="md-success" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                    <span class="mdi mdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-primary">
                        <span class="modal-main-icon mdi mdi-check"></span>
                    </div>
                    <h3>นำเข้าข้อมูลเรียบร้อยแล้ว!</h3>
                    <h3 id="count"></h3>
                    <h3>records</h3>
                    <div class="mt-8">
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary" onclick="location.reload()">รับทราบ</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="md-error" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                    <span class="mdi mdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-danger">
                        <span class="modal-main-icon mdi mdi-alert-circle"></span>
                    </div>
                    <h3>ไม่สามารถนำเข้าในขณะนี้ได้!</h3>
                    <div class="mt-8">
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary">รับทราบ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="md-alert" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                    <span class="mdi mdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-danger">
                        <span class="modal-main-icon mdi mdi-alert-circle"></span>
                    </div>
                    <h3>รูปแบบไฟล์นำเข้าข้อมูลไม่ถูกต้อง</h3>
                    <div style="margin-top: 30px;">
                        <div class="table-responsive noSwipe">
                            <table id="table2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>เงินสะสม</th>
                                        <th>ผลประโยชน์เงินสะสม</th>
                                        <th>เงินสมทบ</th>
                                        <th>ผลประโยชน์เงินสมทบ</th>
                                        <th>เงินประเดิม</th>
                                        <th>ผลประโยชน์เงินประเดิม</th>
                                        <th>เงินประเดิม+ผล</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">รับทราบ</button>
            </div>
        </div>
    </div>
</div>

<div id="md-loading" tabindex="-1" role="dialog" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&nbsp;
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-primary">
                        <span class="modal-main-icon mdi mdi-save"></span>
                    </div>
                    <h3>กำลังนำเข้าข้อมูล!</h3>
                    <p id="message-modal">
                        โปรดรอซักครู่ ระบบกำลังทำงาน<br />
                        กรุณาอย่าปิดหน้าต่างนี้ จนกว่าระบบจะดำเนินการสำเร็จ<br />
                        <img src="/BO-HR/assets/img/loading.gif" />
                    </p>
                </div>
            </div>
            <div class="modal-footer">&nbsp;
                <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary" style="display: none;" id="close-model">
                    <i class="icon icon-left mdi mdi-close"></i> ปิดหน้าต่าง</button>
            </div>

        </div>
    </div>
</div>
<div id="md-alert-upload" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                    <span class="mdi mdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="text-primary">
                        <span class="modal-main-icon mdi mdi-alert-triangle"></span>
                    </div>
                    <h3>รองรับไฟล์ xls, xlsx,XlSX, csv ขนาดไม่เกิน 5 MB เท่านั้น</h3>
                    <div class="mt-8">
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-secondary">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-10">
                                        <h3 class="text-center txt-dark mb-10">ลงชื่อเข้าสู้ระบบ</h3>

                                    </div>
                                    <div class="form-wrap">
                                        <form method="post" action="chklogin.php">
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">อีเมล</label>
                                                <input class="form-control" required="" name="cus_email" type="text" id="txtUsername" placeholder="อีเมล" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10" for="exampleInputpwd_2">รหัสผ่าน</label>
                                                <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">ลืมหรัสผ่าน</a>
                                                <div class="clearfix"></div>

                                                <input type="password" name="cus_password" id="txtPassword" class="form-control" required="" placeholder="รหัสผ่าน" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                            </div>
                                            <div class="button-list mt-25">
                                                <div class="form-group">
                                                    <a class="g-signin2" data-onsuccess="onSignIn" href="goo/google_login.php">login_google</a>
                                                    <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="" id="confirm_upload" >สมัครสมาชิก</a>
                                                </div>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary  btn-rounded" value="">เข้าสู้ระบบ</button>
                                            </div>
                                            <!-- <div class="col">
              				  <a href="register.php" class="btn btn-light btn-block">No account? Register</a>
              						</div> -->
                                        </form>
                                        <img src="goo/btn_google_signin_dark_pressed_web.png" alt="" href="goo/google_login.php" class="g-signin2" data-onsuccess="onSignIn">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Row -->
            </div>
            <!-- <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Send message</button>
													</div> -->
        </div>
    </div>
</div>

</html>