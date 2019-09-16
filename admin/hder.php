<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>E_Auction</title>
    <meta name="description" content="Elmer is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords"
        content="admin, admin dashboard, admin template, cms, crm, Elmer Admin, Elmeradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- vector map CSS -->
    <link href="../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Custom CSS -->
	<link href="../dist/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Morris Charts CSS -->
	<link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />

	<!-- vector map CSS -->
	<link href="vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css" />

	<!-- Calendar CSS -->
	<link href="vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css" />

	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet"
		type="text/css" />

	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	<!-- jquery-steps css -->
	<link rel="stylesheet" href="vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">

	<!-- bootstrap-touchspin CSS -->
	<link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
		type="text/css" />

</head>

		<script>
		$(document).ready(function() {
		$('#example').DataTable( {
		"aaSorting" :[[0,'desc']],
		//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
		});
		} );
		</script>
		<style type="text/css">
			@media print{
				#hd{
					display: none;
				}
			}
		</style>
	<?php
	include('../condb.php');
	session_start();
	// print_r($_SESSION);
	$user_level = $_SESSION['user_level'];
	if($user_level == NULL){
		header("Location: ../login_google.php ");
	}
	$_SESSION['user_id'];
	$cus_name = $_SESSION['user_name'];
 	$cus_email =$_SESSION['cus_email'];
	$user_name = $_SESSION['user_name'];
	// $_SESSION["user_id"] = $row["user_id"];
    //                 $_SESSION["user_name"] = $row["user_name"];
    //                 $_SESSION["user_level"] = $row["user_level"];
	?>