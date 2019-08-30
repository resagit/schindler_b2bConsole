<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if (isset($_SESSION['checks'])) {
	?>
	<!DOCTYPE html>
	<html lang="en" xmlns="http://www.w3.org/1999/html">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Admin -Book My Storage</title>

			<!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="css/sb-admin.css" rel="stylesheet">


			<!-- Morris Charts CSS -->
			<link href="css/plugins/morris.css" rel="stylesheet">

			<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="side_menu.js"></script>
			<!-- Custom Fonts -->
			<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


			<![endif]-->
			<style type="text/css">
				input[type=number]::-webkit-inner-spin-button,
				input[type=number]::-webkit-outer-spin-button {
					-webkit-appearance: none;
					-moz-appearance: none;
					appearance: none;
					margin: 0;
				}
			</style>


			<script type="text/javascript">

				var choices = new Array();
				var levelOptions = "<option value=''>Select</option>";
				function load() {

					set_menus('<?php echo $_SESSION['list'] ?>');
					$.get("getWarehouseVendorList.php", "", function (hd) {

						var obj = JSON.parse(hd);
						var data = new Array();
						
						for (var i = 0; i < obj.LIST.length; i++) {
							data[i] = new Array();
							data[i][0] = obj.LIST[i].id;
							data[i][1] = obj.LIST[i].name;
							levelOptions += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
						}
						$("#typeid").append(levelOptions);
					});
					// setup autocomplete function pulling from currencies[] array

				}


				function lookup(z) {

					dg = {"pincode": z};
					$.get("pincode.php", dg, function (xs) {

						setState1(xs);



					});


				}





				function setState1(ams) {

					$("#city").val("");
					$("#state").val("");

					// alert(ar+"1");
					var obj2 = JSON.parse(ams);
					//alert(obj);

					data11 = new Array();

					var out = new Array();

					for (var i = 0; i < obj2.ADD.length; i++) {

						data11[i] = new Array();
						data11[i][0] = obj2.ADD[i].districtname;
						data11[i][1] = obj2.ADD[i].statename;

						//data[i][1]=obj.LIST[i].name;
						//data[i][7]=obj.DETAIL[i].requestTimestamp;

						//levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][0]+">" +data1[i][0]+ "</option>";

						//alert(levelOption);



					}
					if (data11[0][1] != "") {

						$("#city").val(data11[0][0]);
						document.getElementById('state').value = "";


						document.getElementById('state').value = data11[0][1];
					}


				}








			</script>


		</head>

		<body onload="load()" class="bds">

			<!--   Image Modal-->

			<div id="myModal_upload_image" class="modal fade" style="overflow: auto" data-backdrop="static">
				<div class="modal-dialog" style="width: 800px;">
					<form role="form" id="">

						<div class="modal-content">

							<!-- dialog body -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Material Image Upload</h4>
							</div>
							<div class="modal-body">


								<div class="container-fluid"><div class="row">



										<div class="page-header">


											<form enctype="multipart/form-data" id="image_main">
												<input type="hidden" id="item_id" value="">

												<label>ADD Image </label>

												<input id="files" name="files" type="file" multiple><br>

												<div id="kv-error-4"  style="">sdasdasd</div> <br>   <div id="kv-error-6"  style=""></div>

											</form>
											<hr>

										</div>






									</div>


								</div>

								<!-- dialog buttons --></div>
							<div class="modal-footer"><center><button type="button" onclick="submit_datas()" id="skips" data-dismiss="modal" class="btn btn-default">Skip <i class="fa fa-fast-forward"></i></button></center></div>
						</div>
					</form>
				</div>
			</div>

			<!--End Here-->

			<div id="myModal12"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


				<div class="modal-dialog">
					<div style="z-index: 999" class="modal-content">
						<div class="modal-header">

							<h4 class="modal-title">Server Response</h4>
						</div>
						<div class="modal-body" >
							<p id="mes"></p>
						</div>
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>


			</div>



			<div id="wrapper">

				<!-- Navigation -->
				<?php
				include ("include/menus.php");
				?>

				<div id="page-wrapper">

					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="page-header">
									Create Warehouse
								</h1>
								<ol class="breadcrumb">
									<li class="active">
										<i class="fa fa-dashboard"></i> Dashboard
									</li>
								</ol>
							</div>
						</div>
						<!-- /.row -->

						<!-- /.row -->

						<div class="row">






							<form role="form" id="main">

								<div class="panel panel-green  margin-bottom-40" >
									<div class="panel-heading" >
										<h3 class="panel-title"><i class="fa fa-tasks"></i>Create Warehouse </h3>
									</div>

									<div class="panel-body">
										<!--   <div class="form-group" id="shiper_select">
													 <label for="exampleInputPassword1">Company Name</label><br>
													 <select id="typeid"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="width: 300px" required="">

													 </select>
											 </div>-->
										<div class="container-fluid">
											<div class="row">

												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Warehouse Vendor </label>
														<select id="typeid" aria-live="polite" name="company_id" class="form-control">
														</select>
													</div>
												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px"></div>

												
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Warehouse Code:</label>
														<input type="text"  class="form-control"   placeholder="Warehouse Code" name="warehouse_code">
													</div>
												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Warehouse Name:</label>
														<input type="text"  class="form-control"   placeholder="Warehouse Name" name="warehouse_name">
													</div>
												</div>

												<div class="col-lg-6" style="height: 80px;max-height: 100px;display:none">
													<div class="form-group">
														<label >Mobile No:</label>
														<input type="text" value="-"  class="form-control"  placeholder="Mobile no" name="mobile_no">
													</div>

												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group" id="cos">
														<label for="exampleInputPassword1">Address 1:</label><br>
														<!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
														<input type="text" placeholder="Address" name="address_one" class="form-control">
													</div>
													<br>
												</div>    <div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Address 2:</label>
														<input type="text" placeholder="Address" name="address_sec" class="form-control">
													</div>

												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Pincode: </label>
														<input type="number"   class="form-control" id="pincode"  placeholder="Pincode" name="pincode">
													</div>

												</div> <div class="col-lg-6" style="height: 80px;max-height: 100px" >
													<div class="form-group" id="city_contain">
														<label >City:</label>
														<input type="text" class="form-control" id="city" value=""  placeholder="City" name="city">
													</div>

												</div>

												<div class="col-lg-6" style="height: 80px;max-height: 100px" >
													<div class="form-group" id="state_contain">
														<label >State:</label>
														<input type="text"    class="form-control" id="state" placeholder="State" name="state">
													</div>

												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Email ID:</label>
														<input type="text"  class="form-control"  placeholder="Email ID" name="email_id" id="email_id">
													</div>

												</div>
												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group">
														<label >Contact Name:</label>
														<input type="text"  class="form-control" placeholder="Contact name" name="contact_name">
													</div>

												</div>

												<div class="col-lg-6" style="height: 80px;max-height: 100px">
													<div class="form-group" >
														<label for="exampleInputPassword1">Contact No.:</label><br>
														<!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
														<input type="number"  class="form-control" placeholder="Contact number" name="contact_number">
													</div>
												</div>

												<div class="col-lg-12">
													<br><br><center><button style="background-color: #00a0d2;color: white" type="submit" class="btn btn-default" >Add new</button></center>
												</div>

											</div>

										</div>
									</div>

								</div>

							</form>


						</div>


						<!-- /.row -->

						<!-- /.row -->



						<!-- /.row -->

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- /#page-wrapper -->

			</div>
			<!-- /#wrapper -->
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
									<input type="password" class="form-control" pattern=".{4,10}"  title="Enter New Password Must Be 7 Digits" id="new_pass" placeholder="New Password" required name="new_pass">

								</div>
								<div class="form-group center-block" >
									<input type="password" class="form-control" pattern=".{4,10}" title="Enter Confirm Password Must Be 7 Digits" id="conf_pass" placeholder="Confirm Password" required name="conf_pass">

								</div><div id="not_match" style="display: none" class="form-group-sm"><i style="color: red" class="fa fa-warning">Password Does not Match</i></div>
								<div class="form-group center-block text-center"><br>
									<button type="submit" class="btn btn-primary    ">Change </button>
								</div>
							</form>

						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>
			<!-- jQuery -->
			<script src="js/jquery.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Morris Charts JavaScript -->



			<script src="js/fileinput.js" type="text/javascript"></script>



			<script type="text/javascript" src="js/bootstrapValidator.js"></script>





			<!-- Modal -->











			<!----div message box!------->
			<div id="myModal0" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- dialog body -->
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<div id="show_mes"> Hello world!</div>
						</div>
						<!-- dialog buttons -->
						<div class="modal-footer"><button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button></div>
					</div>
				</div>
			</div>


			<script type="text/javascript">
														$(function () {
															$(".dropdown").click(function () {


																$(this).parent().children("ul").slideToggle();



															});
															$(".sub-dropdown").click(function () {
																$(this).parent().slideDown();
																$(this).children().parent().find("ul").slideToggle();



															});
															$("#change_password").submit(function () {
																$("#not_match").hide();
																if ($("#new_pass").val() == $("#conf_pass").val()) {

																	$.get("change_password.php", $(this).serialize(), function (ert) {

	//alert(ert);
																		if ($.trim(ert) == "N") {
																			$("#error").show();
																			$("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")


																		}
																		else if ($.trim(ert) == "Y") {


																			$("#error").show();
																			$("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
																			$("#change_password")[0].reset();
																			setTimeout(function () {
																				window.location = 'en/logout.php';
																			}, 1200);
																		}


																	});

																}
																else {


																	$("#not_match").show();
																}

																return false;
															});
															$("#pincode").keyup(function () {



																if ($(this).val().length == 6) {




																	lookup($(this).val());
																}



															});
															/*Image Upload*/




															/*End Here*/










															$(".treeview").click(function () {


																$(this).find(".treeview-menu").slideToggle();


															});
															$("#change_password").submit(function () {
																$("#not_match").hide();
																if ($("#new_pass").val() == $("#conf_pass").val()) {

																	$.get("change_password.php", $(this).serialize(), function (ert) {


																		if ($.trim(ert) == "N") {
																			$("#error").show();
																			$("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")


																		}
																		else if ($.trim(ert) == "Y") {


																			$("#error").show();
																			$("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
																			$("#change_password")[0].reset();
																			setTimeout(function () {
																				window.location = 'en/logout.php';
																			}, 1200);
																		}


																	});

																}
																else {


																	$("#not_match").show();
																}

																return false;
															});


															$('#main').bootstrapValidator({
																live: 'enabled',

																submitButton: '$form_unloading button[type="submit"]',
																submitHandler: function (validator, form, submitButton) {



																	if ($("#city").val() != "" && $("#state").val() != "") {

																		
																		$.post("createWarehouse.php", $("#main").serialize(), function (ret_data) {

																			if ($.trim(ret_data) == "Y") {


																				show_modal("Warehouse Created Successfully ");
																				//  $("#main")[0].reset();


																				$("#main").bootstrapValidator('disableSubmitButtons', false); // Enable the submit buttons
																				$("#main").bootstrapValidator('resetForm', true);
																				$("#main")[0].reset();
																			}
																			else if ($.trim(ret_data) == "A") {
																				show_modal("Warehouse Already Exist");


																			}

																			else if ($.trim(ret_data) == "N") {

																				show_modal("Failed To Create..");

																			}
																			else {


																				show_modal(ret_data);
																			}


																		});
																	}
																	else {



																		show_modal("Please Fill The Correct Pincode or City Name")
																	}

																	return false;
																},
																message: 'This value is not valid',
																feedbackIcons: {
																	valid: 'glyphicon glyphicon-ok',
																	invalid: 'glyphicon glyphicon-remove',
																	validating: 'glyphicon glyphicon-refresh'
																},
																fields: {
																	company_id: {
																		validators: {
																			notEmpty: {
																				message: 'Please select Warehouse Vendor'
																			}
																		}
																	},
																	warehouse_name: {
																		validators: {
																			notEmpty: {
																				message: 'The Warehouse name is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 40,
																				message: 'The Warehouse name be more than 1 and less than 40 characters'
																			}


																		}
																	},
																	warehouse_code: {
																		validators: {
																			notEmpty: {
																				message: 'The Warehouse Code is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 40,
																				message: 'The Warehouse Code be more than 1 and less than 40 characters'
																			}


																		}
																	},
																	mobile_no: {
																		validators: {
																			notEmpty: {
																				message: 'The Mobile number  is required and cannot be empty'
																			},
																			stringLength: {
																				min: 10,
																				max: 12,
																				message: 'The Mobile number  should be atleast 10 and atmost 12 digit '
																			}


																		}
																	},
																	address_one: {
																		validators: {
																			notEmpty: {
																				message: 'Address 1 is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 200,
																				message: ' Address 1 should be more than 1 and less than 200 characters'
																			}


																		}
																	},
																	address_sec: {
																		validators: {
																			notEmpty: {
																				message: ' Address 2 is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 200,
																				message: ' Adress 2 should be more than 1 and less than 200 characters'
																			}


																		}
																	},
																	pincode: {
																		validators: {
																			notEmpty: {
																				message: ' Pincode is required and cannot be empty'
																			},
																			stringLength: {
																				min: 6,
																				max: 6,
																				message: 'Pincode should be of 6 digits'
																			}


																		}
																	},
																	contact_name: {
																		validators: {
																			notEmpty: {
																				message: 'Contact name is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 100,
																				message: 'Contact name be more than 1 and less than 100 characters'
																			},
																			regexp: {
																				regexp: /^[a-zA-Z .]+$/i,
																				message: 'Contact name should be only characters'
																			}

																		}
																	},
																	contact_number: {
																		validators: {
																			notEmpty: {
																				message: 'The Mobile number  is required and cannot be empty'
																			},
																			stringLength: {
																				min: 10,
																				max: 12,
																				message: 'Mobile number should be atleast 10 and atmost 12 digits'
																			}


																		}
																	},
																	email_id: {
																		validators: {
																			notEmpty: {
																				message: 'The Email ID is required and cannot be empty'
																			},
																			stringLength: {
																				min: 2,
																				max: 100,
																				message: ' Email ID be more than 1 and less than 100 characters'
																			},
																			regexp: {
																				regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
																				message: 'The value is not a valid email address'
																			}

																		}
																	}

																}

															});







															/*$("#main").submit(function(e)
															 {
															 
															 
															 
															 return false;
															 });
															 */


															$("#add_items").submit(function () {

																add_table();
																return false;


															});

															function add1() {
																add_table();

															}


															$("#close").click(function () {


																//  location.reload();

																$("#myModal12").hide();

															});






														});

														///



														function  show_modal(ac) {

															$("#show_mes").html("");

															/////////////////


															$("#myModal0").modal({// wire up the actual modal functionality and show the dialog
																"backdrop": "static",
																"keyboard": true,
																"show": true                    // ensure the modal is shown immediately
															});

															$("#show_mes").html(ac);

														}

			</script>


		</body>

	</html>
	<?php
}
else {




	echo"<script>window.location='auth.php'</script>";
}
?>