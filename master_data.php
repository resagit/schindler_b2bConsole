<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if (isset($_SESSION['user_names'])) {
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
			<link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">

			<!-- Morris Charts CSS -->
			<link href="css/plugins/morris.css" rel="stylesheet">



			<link rel="stylesheet" href="css/bootstrap-select.css">
			<link rel="stylesheet" href="jquery.auto-complete.css">
			<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

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
				function load()
				{
					set_menus('<?php echo $_SESSION['list'] ?>');

					$.get("companylist.php", "", function (hd) {
						var a = hd;
						setData(a);
					});

				}




				function getdatas()
				{



					return choices;



				}

				var datak;
				var ko = "";
				var levelOptions = "";
				function setData(arr) {


					if (levelOptions == "") {

						ko = arr;
						var obj = JSON.parse(arr);


						datak = new Array();


						var levelOption = "";
						var out = new Array();

						for (var i = 0; i < obj.LIST.length; i++) {

							datak[i] = new Array();
							datak[i][0] = obj.LIST[i].id;
							datak[i][1] = obj.LIST[i].name;
							datak[i][2] = obj.LIST[i].tinNo;
							datak[i][3] = obj.LIST[i].cinNo;
							//data[i][1]=obj.LIST[i].name;
							//data[i][7]=obj.DETAIL[i].requestTimestamp;

							levelOptions = levelOptions + "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";


							// alert(datak[i][2]);
							//alert(data[i][1]);

							//alert(levelOption);


						}
						$("#Ship_TIN").val(datak[0][2]);
						$("#Ship_CIN").val(datak[0][3]);
						$("#main_company_id").html(levelOptions);
						var ids = $("#sales_off").val();

						//  get_sale_office();

						// get_material();
						//    $("#challan").append(levelOptions);


						//var no= document.getElementById("typeid").selectedIndex;
						// alert(no);
						// alert(no+"Indesx");
						// change(no);
						// getMaterailList(ids);




					}

				}









				///Conf Adress



















				////end on cghange of sales office ///////



				////////////////////////get_sale_office/////////




				function get_pincode(z)
				{

					$("#client_city").val("");
					$("#client_state").val("");
					$("#client_country").val("");
					dg = {"pincode": z};
					$.get("pincode.php", dg, function (xs)
					{

						setState(xs);



					});


				}

				function setState(ams)
				{

					$("#client_city").val("");
					$("#client_state").val("");
					$("#client_country").val("");
					// alert(ar+"1");
					var obj2 = JSON.parse(ams);
					//alert(obj);

					data11 = new Array();

					var out = new Array();

					for (var i = 0; i < obj2.ADD.length; i++) {

						data11[i] = new Array();
						data11[i][0] = obj2.ADD[i].districtname;
						data11[i][1] = obj2.ADD[i].statename;
						data11[i][2] = obj2.ADD[i].country;
						//data[i][1]=obj.LIST[i].name;
						//data[i][7]=obj.DETAIL[i].requestTimestamp;
						//levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][0]+">" +data1[i][0]+ "</option>";
						//alert(levelOption);
					}

					if (data11[0][1] != "")
					{
						document.getElementById('client_city').value = data11[0][0];
						document.getElementById('client_state').value = data11[0][1];
						document.getElementById('client_country').value = data11[0][2];
					}



				}

				function lookup(z)
				{

					dg = {"pincode": z};
					$.get("pincode.php", dg, function (xs)
					{

						setState1(xs);



					});


				}

				function setState1(ams)
				{

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
					if (data11[0][1] != "")
					{
						document.getElementById('city').value = data11[0][0];
						document.getElementById('state').value = data11[0][1];
					}


				}






				/*function checks_table(xs)
				 {
				 
				 alert(xs);
				 
				 if($("#tbd>tr").length>0)
				 {
				 var arrss=new Array();
				 
				 var arr=$('#tbd tr').find('td').map(function() {
				 
				 return $(this).text()
				 }).get();
				 
				 
				 arrss.push(arr);
				 alert(arrss.length  +"hi");
				 
				 var dsw=0;
				 for(dsw=0;dsw<arrss.length;dsw++)
				 {
				 alert(dsw);
				 
				 if(arrss[dsw]==xs)
				 {
				 
				 
				 
				 return false;
				 }
				 else
				 {
				 
				 
				 
				 return true;
				 }
				 
				 }
				 
				 }
				 else
				 {
				 
				 
				 
				 return true;
				 }
				 
				 
				 
				 
				 
				 
				 }
				 */





				function change_cmp_type(a)
				{
					if (a == "8")
					{
						$("#check_sales").html(' <div class="col-lg-5"></div><div class="col-lg-5"><br><br><label>Work as a Sales Office</label><br><br><input type="radio" id="check_wms" name="check_wms" value="Y" class="radio-inline" checked="true">&nbsp;Yes &nbsp;&nbsp; <input style="margin-top: 5px;" type="radio" name="check_wms" value="-" class="radio-inline">&nbsp;No</div>');

					} else {
						$("#check_sales").html('');

					}

				}


			</script>


		</head>

		<body class="bds" onload="load()">



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
									Create Client
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




							<form role="form" id="main" autocomplete="off">

								<div class="panel panel-green  margin-bottom-40">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> Client Type</h3>
									</div>
									<div class="panel-body">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-6" style="height: 70px">
													<div class="form-group">
														<label for="exampleInputEmail1q">Client Type<span style="color:red;" >*</span>:</label>
														<select  class="form-control" name="company_type" onchange="change_cmp_type(this.value)" id="company_type" >

															<option value="">Select</option>
															<option value="8">B2B Client</option>
															<!-- <option value="9">WareHouse Vendor</option> -->
															<!-- <option value="10">Logistic Vendor</option>
															<?php if ($_SESSION['roles_id'] == 14) { ?>
																		<option value="15">WMS Client</option>
															<?php } ?> -->
														</select>
													</div>
												</div>

												<div class="col-lg-6">
													<div class="form-group">
														<label for="exampleInputEmail1q">Contract Status<span style="color:red;" >*</span>:</label>
														<select  class="form-control" name="contract_status" id="contract_status" >
															<option value="Y">Y</option>
															<option value="N">N</option>
														</select>
													</div>
												</div>



												<!-- <div class="col-lg-6">
														 <div class="form-group">
																 <label for="exampleInputEmail1q">Sales Office:</label>
																 <select  class="form-control" name="sales_off" required="" id="sales_off" onchange="onchange_sale();" >
		 
												<!--  <option value="INBOUND">Inbound</option>->

										</select>
								</div>
						</div>-->
												<!--<div class="col-lg-3">
														<div class="form-group">
																<label for="exampleInputPassword1">Challan no.</label>
																<input type="text" class="form-control" required="" pattern="[a-zA-Z- 0-9]" style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
														</div>
		
												</div>-->
												<!-- <div class="col-lg-3">
								 <div class="form-group">
		
		
										 <div class="control-group">
												 <label class="control-label">Date </label>
												 <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
														 <input required="" title="Date" size="26" type="text" id="dates"   placeholder="Date"  readonly>
		
														 <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
												 </div>
												 <input type="hidden" id="dtp_input2" required="" /><br/>
										 </div>
								 </div>
		</div>
												-->
											</div>

										</div>
									</div>

								</div>



								<!--  <div class="panel panel-green  margin-bottom-40">
											<div class="panel-heading">
													<h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
											</div>
											<div class="panel-body">
													<div class="container-fluid">
															<div class="row">
																	<div class="col-lg-3">
																			<div class="form-group">
																					<label for="exampleInputEmail1q">Challan Type</label>
																					<select  class="form-control" name="challan_type" required="" id="challan" >
							
																							<option value="INBOUND">INBOUND</option>
							
																					</select>
																			</div>
							
																	</div>
																	<div class="col-lg-3">
																			<div class="form-group">
																					<label for="exampleInputEmail1q">Warehouse:</label>
																					<select  class="form-control" name="warehouse_id" required="" id="warehouse_id" >
							
								<!--  <option value="INBOUND">Inbound</option>->

						</select>
				</div>
		</div>
		<div class="col-lg-3">
				<div class="form-group">
						<label for="exampleInputPassword1">Challan no.</label>
						<input type="text" class="form-control" required="" pattern="[a-zA-Z- 0-9]" style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
				</div>

		</div>
		<div class="col-lg-3">
				<div class="form-group">


						<div class="control-group">
								<label class="control-label">Date </label>
								<div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
										<input required="" title="Date" size="26" type="text" id="dates"   placeholder="Date"  readonly>

										<span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
								</div>
								<input type="hidden" id="dtp_input2" required="" /><br/>
						</div>
				</div>
		</div>

	</div>

	</div>
	</div>

	</div>-->





								<div class="panel panel-green  margin-bottom-40">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> Personal Details</h3>
									</div>
									<div class="panel-body">


										<!--<div class="form-group" id="shiper_select">
												<label for="exampleInputPassword1">Shipper</label><br>
												<select id="typeid"  class="form-control" data-live-search="true" onchange="cin_change(this.value);"   name="shipper" style="width: 300px" required="">
				
												</select>
				
										</div>-->
										
										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_name"  placeholder="Name" value="-" name="client_name" autocomplete="off">
											</div>
										</div>


										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Client Name<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="company_name" placeholder="Client Name" name="company_name">
											</div>
										</div>
										
										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Mobile<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_mobile" value="-" placeholder="Mobile no" name="client_mobile">
											</div>
										</div>

										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Alternate Mobile:</label>
												<input type="text"  class="form-control" id="client_alt_mobile" value="-" placeholder="Alternate Mobile no" name="client_alt_mobile">
											</div>
										</div>

										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">CIN:</label>
												<input type="text"  class="form-control" id="client_cin"  placeholder="CIN" name="client_cin">
											</div>
										</div>

										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">TIN<span style="color:red;" >*</span>:</label>
												<input type="text" value="-" class="form-control" id="client_tin" placeholder="TIN" name="client_tin">
											</div>
										</div>

										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Email<span style="color:red;" >*</span>:</label>
												<input type="email"  class="form-control" id="client_email" value="-"  placeholder="Email Id" name="client_email">
											</div>
										</div>

										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">GSTIN<span style="color:red;" >*</span>:</label>
												<input type="text" style="text-transform: uppercase;" class="form-control" id="client_gstin" placeholder="GSTIN" name="client_gstin">
											</div>
										</div>
										
										<div style="margin-left: -15px;height: 100px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Pan Card<span style="color:red;" >*</span>:</label>
												<input type="text" style="text-transform: uppercase" class="form-control" id="client_pan" placeholder="Pan Card no" name="client_pan">
											</div>
										</div>

										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Contact Name<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_cnt_name" value="-" placeholder="Reference name" name="client_cnt_name">
											</div>
										</div>

										<!-- display: none -->
										<div style="margin-left: -15px;height: 80px;display:none" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Contact No.<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_cnt_no" value="-" placeholder="Reference no" name="client_cnt_no">
											</div>
										</div>


									</div>
								</div>


								<div class="panel panel-green margin-bottom-40">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> Address Details</h3>
									</div>

									<div class="panel-body">
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Address 1<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_add1" placeholder="Address 1" name="client_add1">
											</div>
										</div>
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Address 2<span style="color:red;" >*</span>:</label>
												<input type="text"  class="form-control" id="client_add2"  placeholder="Address 2" name="client_add2">
											</div>
										</div>
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Pincode<span style="color:red;" >*</span>:</label>
												<input type="number" onblur="get_pincode(this.value)" class="form-control" id="client_pin" placeholder="Pincode" name="client_pin">
											</div>
										</div>
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">City:</label>
												<input type="text"  class="form-control" id="client_city"  placeholder="City" name="client_city" disabled="true">
											</div>
										</div>
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">State:</label>
												<input type="text" class="form-control" id="client_state" placeholder="State" name="client_state" disabled="true">
											</div>
										</div>
										<div style="margin-left: -15px;height: 80px" class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Country:</label>
												<input type="text" class="form-control" id="client_country" placeholder="Country" name="client_country" disabled="true">
											</div>
										</div>

										<div id="check_sales" class="form-group">
										<div class="col-lg-5"></div><div class="col-lg-2"><br><br><label>Work as a Sales Office</label><br><br><input type="radio" id="check_wms" name="check_wms" value="Y" class="radio-inline" checked="true">&nbsp;Yes &nbsp;&nbsp; <input style="margin-top: 5px;" type="radio" name="check_wms" value="-" class="radio-inline">&nbsp;No</div>

										</div>
									</div></div>

									<div class="panel panel-green  margin-bottom-40 " style="display: none;">

										<div class="panel-heading">
											<h3 class="panel-title"><i class="fa fa-tasks"></i> Bank Details</h3>
										</div>


										<!--<form role="form" id="">-->
										<div class="panel-body">


											<div style="margin-left: -15px;height: 80px" class="col-lg-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Bank Name<span style="color:red;" >*</span>:</label>
													<input type="text"  class="form-control" id="client_bank" value="-" placeholder="Bank Name" name="client_bank">
												</div>
											</div>
											<div style="margin-left: -15px;height: 80px" class="col-lg-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Account Holder Name<span style="color:red;" ></span>:</label>
													<input type="text"  class="form-control" id="client_acc_name" value="-"  placeholder="Account Name" name="client_acc_name">
												</div>
											</div>
											<div style="margin-left: -15px;height: 80px" class="col-lg-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Account No<span style="color:red;" >*</span>:</label>
													<input type="text"  class="form-control" id="client_acc_no" value="-"  placeholder="Account No " name="client_acc_no">
												</div>
											</div>
											<div style="margin-left: -15px;height: 80px" class="col-lg-6">
												<div class="form-group">
													<label for="exampleInputPassword1">IFSC Code<span style="color:red;" >*</span>:</label>
													<input type="text"  class="form-control" id="client_ifsc" value="-" placeholder="Bank IFSC code" name="client_ifsc">
												</div>
											</div>
											<div style="margin-left: -15px;height: 80px" class="col-lg-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Branch Code<span style="color:red;" >*</span>:</label>
													<input type="text"  class="form-control" id="client_bank_branch" value="-"  placeholder="Bank Branch Code" name="client_bank_branch">
												</div>
											</div>
											<br><br><br>
											<!-- <div id="check_sales" class="form-group">


											</div> -->

										</div>

										<!--</form>-->

									</div>

								<center>
									<br><input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>
								<br><br>

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







			<script type="text/javascript" src="js/bootstrapValidator.js"></script>

















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

													function get_values_wms()
													{
														if ($("#company_type").val() == 8)
														{
															return $("input[name=check_wms]:checked").val();
														} else
														{
															return "-";
														}
													}





													$(function () {
														$(".dropdown").click(function ()
														{


															$(this).parent().children("ul").slideToggle();



														});
														$(".sub-dropdown").click(function ()
														{
															$(this).parent().slideDown();
															$(this).children().parent().find("ul").slideToggle();



														});
														$("#change_password").submit(function ()
														{
															$("#not_match").hide();
															if ($("#new_pass").val() == $("#conf_pass").val()) {

																$.get("change_password.php", $(this).serialize(), function (ert) {

	//alert(ert);
																	if ($.trim(ert) == "N") {
																		$("#error").show();
																		$("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")


																	} else if ($.trim(ert) == "Y") {


																		$("#error").show();
																		$("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
																		$("#change_password")[0].reset();
																		setTimeout(function () {
																			window.location = 'en/logout.php';
																		}, 1200);
																	}


																});

															} else {


																$("#not_match").show();
															}

															return false;
														});
														$("#challan_no").focus();



														$('#main').bootstrapValidator({

															live: 'enabled',
															submitButton: '$form_unloading button[type="submit"]',
															submitHandler: function (validator, form, submitButton) {
																var x = get_values_wms();
																var pans;

																if ($("#company_name").val() == 8 || (x == "" || x == undefined))
																{
																	show_modal("Please select Work as Sales Office");

																} else {

																	if ($("#client_state").val() != "" && $("#client_city").val() != "") {
																		if ($("#client_alt_mobile").val() == "") {
																			$("#client_alt_mobile").val("-");
																		}
																		if ($("#client_pan").val() == "") {
																			pans = "-";
																		} else {
																			pans = $("#client_pan").val();

																		}

																		var main_query = {
																			'company_type': $("#company_type").val(),
																			'contract_status': $("#contract_status").val(),
																			'company_name': $.trim($("#company_name").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_gstin': $.trim($("#client_gstin").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_pan': pans,
																			'client_cin': $.trim($("#client_cin").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_add1': $.trim($("#client_add1").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_add2': $.trim($("#client_add2").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_pin': $.trim($("#client_pin").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_city':$.trim( $("#client_city").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_state': $.trim($("#client_state").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_country': $.trim($("#client_country").val().replace( /[\s\n\r]+/g, ' ')),
																			'check_wms': $.trim(get_values_wms().replace( /[\s\n\r]+/g, ' ')),
																			'client_name': $.trim($("#client_name").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_mobile': $.trim($("#client_mobile").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_alt_mobile':$.trim( $("#client_alt_mobile").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_tin': $("#client_tin").val(),
																			'client_email': $.trim($("#client_email").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_cnt_name': $.trim($("#client_cnt_name").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_cnt_no': $.trim($("#client_cnt_no").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_bank': $.trim($("#client_bank").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_acc_no': $.trim($("#client_acc_no").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_ifsc':$.trim( $("#client_ifsc").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_bank_branch': $.trim($("#client_bank_branch").val().replace( /[\s\n\r]+/g, ' ')),
																			'client_acc_name': $.trim($("#client_acc_name").val().replace( /[\s\n\r]+/g, ' '))
																		};

																		show_modal("<img src='loader1.gif'>");
																		$.get("client_create.php", main_query, function (ho) {
																			console.log("response: "+ho);
																			
																			if ($.trim(ho) == "Y") {

																				show_modal($('#company_type option:selected').text() + " Created Successfully");
																				$("#main").bootstrapValidator('resetForm', true);
																				$("#client_city").val("");
																				$("#client_state").val("");
																				$("#client_country").val("");
																				$("#client_cin").val("");
																		
																			} else if ($.trim(ho) == "A") {
																				show_modal("Client Already Exist");
																			} else if ($.trim(ho) == "N") {
																				console.log(ho);
																				show_modal("Failed To Create..");
																			} else {
																				console.log(ho);
																				show_modal("Failed To Create")
																			}
																		});
																	} else {
																		show_modal("State and City Are Required");
																	}

																}
																return false;
															},
															feedbackIcons: {
																valid: 'glyphicon glyphicon-ok',
																invalid: 'glyphicon glyphicon-remove',
																validating: 'glyphicon glyphicon-refresh'
															},
															fields: {
																company_type: {
																	validators:
																	{
																		notEmpty: {
																			message: 'Please select Client Type'
																		}
																	}
																},
																company_name: {
																	validators: {
																		notEmpty: {
																			message: 'The Client Name  is required and cannot be empty'
																		},
																		stringLength: {
																			min: 2,
																			max: 150,
																			message: 'The Client Name  be more than 1 and less than 150 characters long'
																		},
																		regexp: {
																			regexp: /^[a-z 0-9.&]+$/i,
																			message: 'The Client Name should be characters'
																		}

																	}
																},
																client_gstin: {
																	validators: {
																		notEmpty: {
																			message: 'The GSTIN is required and cannot be empty'
																		},
																		stringLength: {
																			min: 15,
																			max: 15,
																			message: 'The GSTIN should be at least 15 digit'
																		},
																		 regexp: {
																		// regexp: /^[0-9]{2}\d[a-zA-Z]{5}\d[0-9]{4}\d[a-zA-Z]{1}\d[1-9A-Za-z]{1}\d[Z]{1}\d[0-9a-zA-Z]{1}$/,
																		regexp: /^[a-z0-9]+$/i ,
																		 message: 'The GSTIN is incorrect'
																		 }
																	}
																},
																client_pan: {
																	validators: {
																		notEmpty: {
																			message: 'The Pan Card  is required and cannot be empty'
																		},
																		stringLength: {
																			min: 10,
																			max: 10,
																			message: 'The Pan Card should be at 10 digit'
																		},
																		regexp: {
																			regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
																			message: 'The Pan Card  No is incorrect'
																		}

																	}
																},
																client_add1: {
																	validators: {
																		notEmpty: {
																			message: 'The Address 1 is required and cannot be empty'
																		},
																		stringLength: {
																			min: 1,
																			max: 140,
																			message: 'The Address 1 no be more than 1 and less than 140 characters long'
																		}
																	}
																},
																client_add2: {
																	validators: {
																		notEmpty: {
																			message: 'The Address 2 is required and cannot be empty'
																		},
																		stringLength: {
																			min: 1,
																			max: 140,
																			message: 'The Address 2 be more than 1 and less than 140 characters long'
																		}
																	}
																},
																client_pin: {
																	validators: {
																		notEmpty: {
																			message: 'The Pincode is required and cannot be empty'
																		},
																		stringLength: {
																			min: 6,
																			max: 6,
																			message: 'The Pincode should be at least 6 digit'
																		},
																		regexp: {
																			regexp: /^[0-9]{1,6}$/,
																			message: 'The Pincode No is incorrect'
																		}
																	}
																},
																// check_wms: {
																// 	validators: {
																// 		notEmpty: {
																// 			message: 'Please Choose'

																// 		}
																// 	}
																// }

															}

														}).on('success.form.bv', function(e)
														{
															e.preventDefault();
															
														});






														$("#add_items").submit(function () {

															add_table();
															return false;


														});



														$("#close").click(function () {


															//  location.reload();

															$("#myModal12").hide();

														});





													});

													///



													function  show_modal(ac)
													{

														$("#show_mes").html("");

														/////////////////


														$("#myModal0").modal({// wire up the actual modal functionality and show the dialog
															"backdrop": "static",
															"keyboard": true,
															"show": true                    // ensure the modal is shown immediately
														});

														$("#show_mes").html(ac);

													}


													$("input[type='number']").on('focus', function (e) {
														$(this).on('mousewheel.disableScroll', function (e) {
															e.preventDefault();
														})
													}).on('blur', function (e) {
														$(this).off('mousewheel.disableScroll')
													});

			</script>


		</body>

	</html>
	<?php
}
else {




	echo "<script>window.location='index.php'</script>";
}
?>