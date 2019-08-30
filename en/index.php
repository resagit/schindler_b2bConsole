<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if (isset($_SESSION['user_names'])) {
	setcookie("user_name", $_SESSION['user_names'], time() + (86400 * 30), "/");
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Book My Storage</title>

			<!-- Bootstrap Core CSS -->
			<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

			<!-- Custom Fonts -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">

			<!-- Plugin CSS -->


			<!-- Custom CSS -->
			<link rel="stylesheet" href="../css/creative.css" type="text/css">

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>

			<![endif]-->

		</head>

		<body id="page-top">
			<div class="modal fade" id="show_user" style="overflow:auto;" data-backdrop="static" role="dialog">
				<div class="modal-dialog" >

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><i class="fa fa-edit"></i> Change Password </h4>
						</div>
						<div  class="modal-body">
							<form id="change_password" style="width: 300px;" role="form" class=" center-block">
								<br>
								<div class="form-group" style="display: none" id="error"></div>
								<div class="from-group center-block">
									<input type="password" class="form-control" TITLE="Enter Old Password" placeholder="Old Password" required name="old_pass">

								</div><br>
								<div class="form-group center-block">
									<input type="password" class="form-control" pattern=".{4,10}"  title="Enter New Password Must Be 4 Digits" id="new_pass" placeholder="New Password" required name="new_pass">

								</div>
								<div class="form-group center-block" >
									<input type="password" class="form-control" pattern=".{4,10}" title="Enter Confirm Password Must Be 4 Digits" id="conf_pass" placeholder="Confirm Password" required name="conf_pass">

								</div><div id="not_match" style="display: none" class="form-group-sm"><i style="color: red" class="fa fa-warning">Password Does not Match</i></div>
								<div class="form-group center-block text-center"><br>
									<button type="submit" class="btn btn-primary">Change </button>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand page-scroll" href="#page-top">Dashboard</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i
										class="fa fa-user"></i> <?php echo $_SESSION['user_names'] ?> <b class="caret"></b></a>
								<ul class="dropdown-menu">

									<li class="divider"></li>
									<li data-target="#show_user" data-toggle="modal">
										<a href="javascript:void(0)"><i class="fa fa-fw fa-edit"></i>Change Password</a>
									</li>
									<li>
										<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>

			<header>
				<div class="header-content">
					<div class="header-content-inner">
						<h1>BMS Configuration Dashboard</h1>
						<hr>
						<p>Start Work Here in the section  given below!</p>
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-12 text-center center-block" style="float: none; margin: 0 auto;" id="menus"></div>
							</div>
						</div>
					</div>   
				</div>
			</header>

			<!-- jQuery -->

			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<script type="text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" src="../js/bootstrap.min.js"></script>

			<script>

								$(function () {

									/// alert(sd);
									obj = JSON.parse('<?php echo $_SESSION['list'] ?>');

									var menus = new Array("CREATE INBOUND", "MONTHLY STOCK REPORT", "DDR REPORT", "INBOUND FINANCE", "MATERIAL WISE REPORT", "STOCK TRANSFER", "CREATE RETURN INBOUND", "CREATE OUTBOUND", "CREATE STOCK TRANSFER", "CREATE MATERIAL", "UPDATE CHALLAN", "INVENTORY REPORT", "MASTER DATA", "MATERIAL LIST", "DELIVERY UPDATE", "TRACK", "STOCK", "CREATE COMPANY MASTER", "CREATE OPERATIONAL USER", "UPLOAD POD", "ADD NOTE", "CANCEL CHALLAN", "CREATE STO", "BULK UPLOAD", "MANUAL STOCK UPDATE");
									data1 = new Array();

									var levelOptions1 = "";
									var optionss = "";
									var levelOption1 = "";
									var out = new Array();

									var k = new Array();
									k = [];
									for (var i = 0; i < obj.Details.length; i++) {

										data1[i] = new Array();
										data1[i][0] = obj.Details[i].uiRole;
										data1[i][1] = obj.Details[i].roleName;
										var page = (obj.Details[i].roleName).toLowerCase();

										page = page.split(' ').join('_');
										//   alert(data1[i][1]);
										if ($.inArray(data1[i][1], menus) > -1) {

											if (data1[i][1] == "BILL") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='#' style='width: 180px;' class='btn btn-primary btn-xl page-scroll text-center'>" + data1[i][1] + "</a></div>");
											} else if (data1[i][1] == "WAREHOUSE MAP VIEW" || data1[i][1] == "CONSIGNEE MAP VIEW") {

											} else if (data1[i][1] == "MONTHLY STOCK REPORT") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='../Monthly_Stock_Report.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>MONTHLY WISE REPORT</a></div>");
											} else if (data1[i][1] == "DDR REPORT") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='../DDR_Report.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>DDR REPORT</a></div>");
											} else if (data1[i][1] == "INBOUND FINANCE") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='../Inbound_Finance.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>INBOUND FINANCE REPORT</a></div>");
											} else if (data1[i][1] == "MATERIAL WISE REPORT") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='../material_wise_report.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>MATERIAL WISE REPORT</a></div>");
											} else if (data1[i][1] == "UPDATE CHALLAN") {
												$("#menus").prepend("<div class='col-lg-6' style='height: 100px;'> <a href='../update.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>Update Order</a></div>");
											} else if (data1[i][1] == "MANUAL STOCK UPDATE") {
												$("#menus").prepend("<div class='col-lg-3' style='height: 100px;'> <a href='../Manual_Stock.php' style='width: 240px;' class='btn btn-primary btn-xl page-scroll text-center'>MANUAL STOCK UPDATE</a></div>");
											} else {
												$("#menus").prepend("<div class='col-lg-6' style='height: 100px;'> <a href='../" + page + ".php' style='min-width:180px;width: auto;padding-right: 30px;' class='btn btn-primary btn-xl page-scroll text-center'>" + data1[i][1] + "</a></div>");
											}
										}
									}
								});
			</script>
			<script>
				$(function () {
					$("#change_password").submit(function () {
						$("#not_match").hide();
						if ($("#new_pass").val() == $("#conf_pass").val()) {
							$.get("../change_password.php", $(this).serialize(), function (ert) {
								if ($.trim(ert) == "N") {
									$("#error").show();
									$("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")
								} else if ($.trim(ert) == "Y") {
									$("#error").show();
									$("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
									$("#change_password")[0].reset();
									setTimeout(function () {
										window.location = "logout.php";
									}, 1200);
								}
							});
						} else {
							$("#not_match").show();
						}
						return false;
					});
				})

			</script>
		</body>
	</html>
	<?php
}
else {
	echo "<script>window.location='../index.php'</script>";
}?>