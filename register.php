<?php 
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>เข้าสู่ระบบ</title>
		<meta name="description" content="Elmer is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Elmer Admin, Elmeradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper  pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						
						<!-- <span class="brand-text">Elmer</span> -->
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					
					<a class="inline-block btn btn-primary  btn-rounded btn-outline" href="login_google.php">ลงชื่อเข้าสู้ระบบ</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="page-wrapper pa-0 ma-0 auth-page">
						<div class="container-fluid">
							<!-- Row -->
							<div class="table-struct full-width full-height">
								<div class="table-cell vertical-align-middle auth-form-wrap">
									<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row ">
                        <div class="panel panel-default card-view ">
                            <div class="panel-wrapper collapse in ">
                                <!-- <div class="col-md-6 mx-auto"> -->
                                <div class="card card-body bg-light mt-5 ">
                                    <div class="form-group">
                                        <h2>สมัครสมาชิก</h2>
                                        <p>กรอกข้อมูลการสมัคร</p>
                                    </div>
                                    <form action="signup_form_db.php" method="POST">
                                        <div class="form-group">
                                            <label for="name">ชื่อผู้ใช้</label>
                                            <input type="text" name="cus_name"
                                                class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $name; ?>">
                                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">อีเมล</label>
                                            <input type="email" name="cus_email"
                                                class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $email; ?>">
                                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">รหัสผ่าน</label>
                                            <input type="password" name="cus_password"
                                                class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $password; ?>">
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">ยืนยันรหัสผ่าน</label>
                                            <input type="password" name=""
                                                class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $confirm_password; ?>">
                                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="col">
                                                    <input type="submit" value="ยืนการสมัคร"
                                                        class="btn btn-success btn-block">

                                                </div>
                                            </div>
                
                                        </div>
                                        <div class="button-list mt-25">
                                            <div class="form-group">

                                                <div class="g-signin2" ></div>
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
							<!-- /Row -->	
		
		
						</div>
						
					</div>
					<!-- /Row -->	

				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>