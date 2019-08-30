<?php
include_once "include/header.php";
session_start();

?>

<style type="text/css">
    .form-horizontal .control-label
    {
        line-height: 15px;
        padding-top: 5px;
    }

    .radio
    {
        padding-top: 3px;
    }
    .multiselect-container>li>a>label {
        padding: 4px 20px 3px 20px;
    }
	.form-horizontal .form-group
	{
		margin-bottom: 15px;
	}
    input[type=text]:read-only, input[type=number]:read-only {
        background-color: white;
        color: black;
    }
</style>
<link rel="stylesheet" href="/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<script src="/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <?php
        include_once "include/navigation.php";
        ?>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php
        include_once "include/topbar.php";
        ?>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Add Vendor</li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Vendor</h2>
        </div>

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="panel">
                <div class="col-md-12">


                        <div class="panel panel-default tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Account Verification</a></li>
                                <li><a href="#tab-second" role="tab" data-toggle="tab" id="tab2">Form Registration</a></li>
                                <li><a href="#tab-third" role="tab" data-toggle="tab" id="tab3">Document Upload</a></li>
                            </ul>
                            <div class="panel-body tab-content">
                                <div class="tab-pane active" id="tab-first">
                                    <form role="form" class="form-horizontal" id="main_acc_verf">
                                        <br>
                                        <div class="form-group col-md-9">
                                            <label class="col-md-2 control-label">Mobile No<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                            <div class="col-md-6">
											<input type="hidden" id="mob_no">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><span class="fa fa-phone-square"></span></span>
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no"/>
													
                                                </div>
                                                <span class="help-block" id="error"></span>
                                            </div>
                                            <div class="col-lg-2"></div>
                                            <div class="form-group col-md-2">
                                                <button id="submit_acc_verf" style="" type="submit" class="btn btn-primary pull-right">Save <span class="fa fa-floppy-o fa-right"></span></button>
                                            </div>
                                        </div>


                                    </form>
                                </div>

                                <div class="tab-pane" id="tab-second">

                                    <form role="form" id="main" class="form-horizontal">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Personal Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">First Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="first_name" id="first_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Middle Name</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="middle_name" id="middle_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Last Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="last_name" id="last_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Mobile No.<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                                                <input type="text" class="form-control"  name="mobile_nos" id="mobile_nos"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Alternate Mobile No.</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                                                <input type="text" class="form-control" name="alt_mobile_no" id="alt_mobile_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Email<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                                <input type="email" class="form-control" name="email" id="email"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Date of Establishment</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                <input type="text" class="form-control datepicker" name="estb_date" id="estb_date"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Aadhar Card<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                                                <input type="text" class="form-control" name="aadhar_card" id="aadhar_card"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Pan Card<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                                                <input type="text" class="form-control" name="pan_card" id="pan_card"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Sole Proprietor Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="owner_name" id="owner_name"/>
                                                            </div>
                                                            <span>( Name of the sole proprietor/ partner(s)/Director(s) as applicable )</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Father Name</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="father_name" id="father_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Primary List<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control " name="primary_list" id="primary_list">
                                                                <option value="">---Select Type---</option>
                                                                <option value="Warehouse Provider">Warehouse Provider</option>
                                                                <option value="Security Provider">Security Provider</option>
                                                                <option value="Wifi Provider">Wifi Provider</option>
                                                                <option value="CCTV Provider">CCTV Provider</option>
                                                                <option value="Labour Provider">Labour Provider</option>
                                                                <option value="ForkLift/Crane Provider">Fork Lift/Crane Provider</option>
                                                                <option value="Pallet">Pallet</option>
                                                                <option value="3PL/4PL Provider">3PL/4PL Provider</option>
                                                                <option value="Transporter">Transporter</option>
                                                                <option value="PestControl">Pest Control</option>
                                                                <option value="Plumber">Plumber</option>
                                                                <option value="Packaging Material Provider">Packaging Material Provider</option>
                                                                <option value="Rack Provider">Rack Provider</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Service List<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control" name="service_list" id="service_list" style="width: 100px" multiple="multiple" size="10">

                                                                <option  value="Warehouse Provider">Warehouse Provider</option>
                                                                <option   value="Security Provider">Security Provider</option>
                                                                <option  value="Wifi Provider">Wifi Provider</option>
                                                                <option  value="CCTV Provider">CCTV Provider</option>
                                                                <option  value="Labour Provider">Labour Provider</option>
                                                                <option  value="Fork Lift/Crane Provider">Fork Lift/Crane Provider</option>
                                                                <option  value="Pallet">Pallet</option>
                                                                <option  value="3PL/4PL Provider">3PL/4PL Provider</option>
                                                                <option  value="Transporter">Transporter</option>
                                                                <option  value="Pest Control">Pest Control</option>
                                                                <option  value="Plumber">Plumber</option>
                                                                <option  value="Packaging Material Provider">Packaging Material Provider</option>
                                                                <option  value="Rack Provider">Rack Provider</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Corporate Address Details</h3>
                                            </div>
                                            <div class="panel-body">

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address Type<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control" style="background-color: white;color: black"  name="address_type" id="address_type" readonly>

                                                                <option value="corporateAddress">Corporate Address</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address1<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="address1" id="address1"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address2<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="address2" id="address2"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Pin Code<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="text" class="form-control" onblur="get_pincode(this.value)" name="pincode" id="pincode"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">City<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="city" id="city" readonly data-by-field="city" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">State<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="state" id="state" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Country<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" value="India" readonly name="country" id="country"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Landmark<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="landmark" id="landmark"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

<!--                                                <div class='col-lg-6'>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label class="col-md-4 col-xs-12 control-label">Latitude</label>-->
<!--                                                        <div class="col-md-8 col-xs-12">-->
<!--                                                            <div class="input-group">-->
<!--                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>-->
<!--                                                                <input type="text" class="form-control" name="latitude" id="latitude"/>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div> <div class='col-lg-6'>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label class="col-md-4 col-xs-12 control-label">Langitude</label>-->
<!--                                                        <div class="col-md-8 col-xs-12">-->
<!--                                                            <div class="input-group">-->
<!--                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>-->
<!--                                                                <input type="text" class="form-control" name="langitude" id="langitude"/>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                            </div>
                                        </div>
										
										<div class="panel panel-default">
											<div class="panel-body">
												<input type="checkbox" class="form-conrol" id="same_above" onchange="same()">
												<lable class="lable-control">Same As Above</lable>
											</div>
										</div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Registered Address Details</h3>
                                            </div>
                                            <div class="panel-body">

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address Type<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control " style="background-color: white;color: #0a0b0d" name="r_address_type" id="r_address_type" readonly>


                                                                <option value="registeredAddress">Registered Address</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address1<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="r_address1" id="r_address1"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Address2<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="r_address2" id="r_address2"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Pin Code<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="text" class="form-control" onblur="get_r_pincode(this.value)" name="r_pincode" id="r_pincode"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">City<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="r_city" id="r_city" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">State<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="r_state" id="r_state" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Country<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" value="India" readonly name="r_country" id="r_country"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Landmark<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="r_landmark" id="r_landmark"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
<!--                                                <div class="form-group">-->
<!--                                                    <label class="col-md-2 col-xs-12 control-label">Latitude</label>-->
<!--                                                    <div class="col-md-4 col-xs-12">-->
<!--                                                        <div class="input-group">-->
<!--                                                            <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>-->
<!--                                                            <input type="text" class="form-control" name="r_latitude" id="r_latitude"/>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!--                                                    <label class="col-md-2 col-xs-12 control-label">Langitude</label>-->
<!--                                                    <div class="col-md-4 col-xs-12">-->
<!--                                                        <div class="input-group">-->
<!--                                                            <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>-->
<!--                                                            <input type="text" class="form-control" name="r_langitude" id="r_langitude"/>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Bank Details</h3>
                                            </div>
                                            <div class="panel-body">

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Bank Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                                                <input type="text" class="form-control" name="bank_name" id="bank_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Account No.<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                                <input type="text" class="form-control" name="acc_no" id="acc_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Branch Code<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="text" class="form-control" name="branch_code" id="branch_code"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">IFSC Code<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="text" class="form-control" name="ifsc_code" id="ifsc_code"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Pin Code<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="text" class="form-control" onblur="get_b_pincode(this.value)" name="pin_code" id="pin_code"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">City<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="bank_city" id="bank_city" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">State<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" name="bank_state" id="bank_state" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Country<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                                <input type="text" class="form-control" value="India" readonly name="bank_country" id="bank_country"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Account Type<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control " name="acc_type" id="acc_type">
                                                                <option value="">---Select Type---</option>
                                                                <option value="Current Account">Current Account</option>
                                                                <option value="Savings Account">Savings Account</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Bank Type</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control select" name="bank_type" id="bank_type">
                                                                <option value="--">---Select Type---</option>
                                                                <option value="Retail Banks">Retail Banks</option>
                                                                <option value="Commercial Banks">Commercial Banks</option>
                                                                <option value="Investment Banks">Investment Banks</option>
                                                                <option value="Cooperative Banks">Cooperative Banks</option>
                                                                <option value="Central Banks">Central Banks</option>
                                                                <option value="Specialized Banks">Specialized Banks</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Business Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Company Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                                                <input type="text" class="form-control" name="company_name" id="company_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Entity Type</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control select" name="entity_type" id="entity_type">
                                                                <option value="--">-- Select Entity Type --</option>
                                                                <option value="Individual">Individual</option>
                                                                <option value="Sole Proprietor">Sole Proprietor</option>
                                                                <option value="HUF">HUF</option>
                                                                <option value="Firm">Firm</option>
                                                                <option value="Company">Company</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Company's Turn Over</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <select class="form-control select" name="comp_turn_over" id="comp_turn_over">
                                                                <option value="0">-- Select Turn Over --</option>
                                                                <option value="50000">50000</option>
                                                                <option value="100000">100000</option>
                                                                <option value="150000">150000</option>
                                                                <option value="200000">200000</option>
                                                                <option value="250000">250000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">TIN No.<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                                <input type="text" class="form-control" name="tin_no" id="tin_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">CIN No.<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                                <input type="text" class="form-control" name="cin_no" id="cin_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Contact Person Name<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="cont_person_name" id="cont_person_name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Contact Person No.<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">	*</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-phone-square"></span></span>
                                                                <input type="text" class="form-control" name="contact_person_no" id="contact_person_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Stamp Signature By</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-adn"></span></span>
                                                                <input type="text" class="form-control" name="stamp_sign_by" id="stamp_sign_by"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Stamp Signature Designation</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-adn"></span></span>
                                                                <input type="text" class="form-control" name="stamp_sign_desg" id="stamp_sign_desg"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Prepared By</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="prepared_by" id="prepared_by"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Prepared Designation</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="prepared_desg" id="prepared_desg"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Checked By</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="checked_by" id="checked_by"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Checked By Designation</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="checked_by_desg" id="checked_by_desg"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Residential Status</label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group radio">
                                                                <label class="radio-material">
                                                                    <input id="radio1" class="iradio" type="radio" name="rb_res_sts" id="rb_res_sts" value="1">
                                                                    Resident
                                                                </label>
                                                                <label class="radio-material">
                                                                    <input id="radio2" class="iradio" type="radio" name="rb_res_sts" id="rb_res_sts" value="0" checked>
                                                                    Non-Resident
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Tax Details</h3>
                                    </div>
                                    <div class="panel-body">
										<div class='col-lg-6'>
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">Tax Registration</label>
                                            <div class="col-md-8 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                    <input type="text" class="form-control" name="tax_reg" id="tax_reg"/>
                                                </div>
                                                <span>(Foreign Vendor)</span>
                                            </div>
										</div>
										</div>
										
										<div class='col-lg-6'>
										<div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">ST Reg. No.</label>
                                            <div class="col-md-8 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                    <input type="text" class="form-control" name="st_reg_no" id="st_reg_no"/>
                                                </div>
                                            </div>
                                        </div>
										</div>
                                    </div>
                                </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Network Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 col-xs-12 control-label">Office Type</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <select class="form-control " name="office_type" id="office_type">
                                                            <option value="--">---Select Type---</option>
                                                            <option value="Self Branch">Self Branch</option>
                                                            <option value="Franchisee Network">Franchisee Network</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-md-2 col-xs-12 control-label">No. of Branches</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                            <input type="number" class="form-control" name="no_of_branches" id="no_of_branches"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Credentials</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Username<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                <input type="text" class="form-control" name="username" id="username"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">Password<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-asterisk"></span></span>
                                                                <input type="password" pattern=".{4,8}"title="4 to 8 characters" class="form-control" name="password" id="password"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br>
                                            

                                                <div class='col-lg-6'>
                                                    <div class="form-group">
                                                        <label class="col-md-4 col-xs-12 control-label">OTP<span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        <div class="col-md-8 col-xs-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><span class="fa fa-sort-numeric-desc"></span></span>
                                                                <input type="text" class="form-control" name="otp_no" id="otp_no"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Declaration</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="input-group">
                                                            <label class="check"><input type="checkbox" name="check1"  id="check1"/></label>
                                                            <label class="control-label">I declare that the information stated in this form and the documents submitted are correct & complete <span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="input-group">
                                                            <label class="check"><input type="checkbox" name="check2" id="check2"/></label>
                                                            <label class="control-label">I declare that I shall immediately inform "Book My Storage" upon change in the above particulars with appropriate documentation</label><span data-toggle="tooltip" data-placement="top" title="Required" style="color:red;">  *</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="text-align: center">
												<button id="resend"  type="button" class="btn btn-primary " onclick="resends()">Resend OTP  </button>
                                                    &nbsp;&nbsp;&nbsp; <button id="submit" type="submit" class="btn btn-primary ">Save <span class="fa fa-floppy-o fa-right"></span></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
									<input type="hidden" id="mobiles" value="">
                                </div>

                                <div class="tab-pane" id="tab-third">
                                    <form enctype="multipart/form-data" id="reset_path">
                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">Document Type</label>
                                            <div class="col-lg-6">
                                                <select required class="form-control" name="files_type" id="files_type" onChange="check_file(this.value)" required >
                                                    <option value="">---Select Type---</option>
                                                    <option value="PanCard">Pan Card</option>
												<option value="ServicePerformance">Service Performance</option>
												<option value="AadharCard">Aadhar Card</option>
												<option value="RentAggrement">Rent Aggrement</option>
												<option value="Image">Image</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Upload Document</label>
                                            <div class="col-lg-6 ">
                                                <input type="file" name='files' id="files" multiple class="file" data-preview-file-type="any" multiple />
                                                <input type="submit" style="display: none" id="subs">
                                                <div id="kv-error-4" style=""></div><br>
                                                <div id="kv-error-6" style=""></div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-actions">
                                                <thead>
                                                <tr>
                                                    <th >Type</th>
                                                    <th >Name</th>



                                                </tr>
                                                </thead>
                                                <tbody id="tbd1">

                                                </tbody>
                                            </table>
                                        </div>




                                    </div>
										<div class="form-group" style="padding-right: 450px">
										<button id="button1" type="button" class="btn btn-primary pull-right" onclick="finsh()">Finish</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->


<!----	MODAL BOX ------->
<div class="modal" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- dialog body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id="show_mes"> Hello world!</div>
            </div>

            <!-- dialog buttons -->
            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button>
            </div>

        </div>
    </div>
</div>

<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrapValidator.js"></script>


<script type="text/javascript">
var mob;
var mobile1;
    $(function(){



        $("#service_list").multiselect();

        $('#main').bootstrapValidator({

            live: 'enabled',
            submitButton: '$form_unloading button[type="submit"]',
            submitHandler: function(validator, form, submitButton) {
			//alert($("#service_list").val());
                var ab=$("#service_list").val();
                var ac=ab.join('*');
               // alert(ac)
               // alert($('input[name=rb_res_sts]:checked', '#main').val());
                var dd="--";
                var chk=$('input[name=rb_res_sts]:checked').val();
                if($("#stamp_sign_by").val()==""){
                    $("#stamp_sign_by").val(dd)
                }
                if($("#stamp_sign_desg").val()==""){
                    $("#stamp_sign_desg").val("--")
                }
                if($("#prepared_by").val()==""){
                    $("#prepared_by").val("--")
                }
                if($("#prepared_desg").val()==""){
                    $("#prepared_desg").val("--")
                }
                if($("#checked_by").val()==""){
                    $("#checked_by").val("--")
                }
                if($("#checked_by_desg").val()==""){
                    $("#checked_by_desg").val("--")
                }
                if($("#estb_date").val()==""){
                    $("#estb_date").val("00")
                }
                if($("#father_name").val()==""){
                    $("#father_name").val("--")
                }
                if($("#tax_reg").val()==""){
                    $("#tax_reg").val("--")
                }
                if($("#st_reg_no").val()==""){
                    $("#st_reg_no").val("--")
                }
                if($("#no_of_branches").val()==""){
                    $("#no_of_branches").val("00")
                }
                   
            var main_query = {

                'first_name': $("#first_name").val(),
                'middle_name': $("#middle_name").val(),
                'last_name': $("#last_name").val(),
                'mobile_nos': $("#mobile_nos").val(),
                'alt_mobile_no': $("#alt_mobile_no").val(),
                'email': $("#email").val(),
                'estb_date': $("#estb_date").val(),
                'aadhar_card': $("#aadhar_card").val(),
                'pan_card': $("#pan_card").val(),
                'owner_name': $("#owner_name").val(),
                'father_name': $("#father_name").val(),
                'primary_list':$("#primary_list").val(),
                'service_list':ac,
                'address_type': $("#address_type").val(),
                'address1': $("#address1").val(),
                'address2': $("#address2").val(),
                'pincode': $("#pincode").val(),
                'city': $("#city").val(),
                'state': $("#state").val(),
                'country': $("#country").val(),
                'landmark': $("#landmark").val(),
                'r_address_type': $("#r_address_type").val(),
                'r_address1': $("#r_address1").val(),
                'r_address2': $("#r_address2").val(),
                'r_pincode': $("#r_pincode").val(),
                'r_city': $("#r_city").val(),
                'r_state': $("#r_state").val(),
                'r_country': $("#r_country").val(),
                'r_landmark': $("#r_landmark").val(),
                //'r_latitude': $("#r_latitude").val(),
                //'r_langitude': $("#r_langitude").val(),
                //'latitude': $("#latitude").val(),
                //'langitude': $("#langitude").val(),
                'bank_name': $("#bank_name").val(),
                'acc_no': $("#acc_no").val(),
                'branch_code': $("#branch_code").val(),
                'ifsc_code': $("#ifsc_code").val(),
                'pin_code': $("#pin_code").val(),
                'pin_city': $("#bank_city").val(),
                'bank_state': $("#bank_state").val(),
                'bank_country': $("#bank_country").val(),
                'acc_type': $("#acc_type").val(),
                'bank_type': $("#bank_type").val(),
                'company_name': $("#company_name").val(),
                'entity_type': $("#entity_type").val(),
                'comp_turn_over': $("#comp_turn_over").val(),
                'tin_no': $("#tin_no").val(),
                'cin_no': $("#cin_no").val(),
                'cont_person_name': $("#cont_person_name").val(),
                'contact_person_no': $("#contact_person_no").val(),
                'stamp_sign_by': $("#stamp_sign_by").val(),
                'stamp_sign_desg': $("#stamp_sign_desg").val(),
                'prepared_by': $("#prepared_by").val(),
                'prepared_desg': $("#prepared_desg").val(),
                'checked_by': $("#checked_by").val(),
                'checked_by_desg': $("#checked_by_desg").val(),
                'rb_res_sts': chk,
                'tax_reg': $("#tax_reg").val(),
                'st_reg_no': $("#st_reg_no").val(),
                'office_type': $("#office_type").val(),
                'no_of_branches': $("#no_of_branches").val(),
                'username': $("#username").val(),
                'password': $("#password").val(),
                'access_code': $("#access_code").val(),
                'otp_no': $("#otp_no").val()

            };
			var mob="";
				   mob=$("#mobile_nos").val();

				   
              //  alert(main_query.primary_list)
           // alert(main_query.service_list)

            //show_modal("<img src='loader.gif'>");
            $.get("client_vendor.php", main_query, function (ho) {

//alert(ho)

                var obj = JSON.parse(ho);

				var reason=obj.reason;

                if (obj.status=="success"){
                  //alert(obj.status+"dsghgf"+obj.reason);
                    show_modal("Vendor Created Successfully");
					$("#main").bootstrapValidator('resetForm', true);
					$("#tab3").tab('show');
					//window.location.reload();
					//show_modal(reason);
                    //$("#main").bootstrapValidator('resetForm', true);
                       //alert(obj.status);
                }
                else if (obj.status=="fail"){
                     //show_modal("Failed to create Vendor");
					
                   // console.log(ho);
                    show_modal(reason);
					 //window.location.reload();
                      //alert(obj.status);
                }
                else {

                    console.log(ho);
                    show_modal("Failed To Create..");
                     
                }

            });

                return false;
            },
        fields:{

            first_name:{
                message: 'The First Name is not valid',
                    validators:{
                    notEmpty:{

                        message:'The First Name field is required.'

                    },
                    stringLength: {
                        min: 1,
                            max: 40,
                            message: 'The Name  be more than 1 and less than 40 characters long'
                    }

                }
            },
            middle_name:{
                message: 'The Middle Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Middle Name field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Name  be more than 1 and less than 40 characters long'
                    }
                }
            },
            father_name:{
                message: 'The Father Name is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Father Name  be more than 1 and less than 40 characters long'
                    }
                }
            },
            stamp_sign_by:{
                message: 'The Stamp Signature By is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Stamp Signature By  be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Stamp Signature Bycannot be special character'
                    }
                }
            },
            stamp_sign_desg:{
                message: 'The Stamp Signature Designation is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Stamp Signature Designation  be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Stamp Signature Designation cannot be special character'
                    }
                }
            },
            prepared_by:{
                message: 'The Prepared By is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Prepared By be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Prepared By cannot be special character'
                    }
                }
            },
            prepared_desg:{
                message: 'The Prepared Designation is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Prepared Designation be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Prepared Designation cannot be special character'
                    }
                }
            },
            checked_by:{
                message: 'The Checked By is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Checked By be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Checked By cannot be special character'
                    }
                }
            },
            checked_by_desg:{
                message: 'The Checked By Designation is not valid',
                validators:{

                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Checked By Designation be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Checked By Designation cannot be special character'
                    }
                }
            },
            last_name:{
                message: 'The Last Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Last Name field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Name  be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/i,
                        message: 'The Name cannot be special character'
                    }
                }
            },
            cont_person_name:{
                message: 'The Contact Person Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Contact Person Name field is required.'

                    },
					 
                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Name  be more than 1 and less than 40 characters long'
                    },
					regexp: {
                        regexp: /^[a-zA-Z ]+$/i,
                        message: 'The Name cannot be special character'
                    }
                   
                }
            },
            mobile_nos:{
                message: 'The Mobile No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The Mobile No. field is required.'

                    },
                    stringLength: {
                        min: 10,
                        max: 12,
                        message: 'The Contact should be at least 10 and atmost 12 digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The Contact number  cannot be  character'
                    }
                }

            },
            contact_person_no:{
                message: 'The Contact Person No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The Contact Person No. field is required.'

                    },
                    stringLength: {
                        min: 10,
                        max: 12,
                        message: 'The Contact should be at least 10 and atmost 12 digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The Contact number  cannot be  character'
                    }
                }

            },
            alt_mobile_no:{
                message: 'The Mobile No. is not valid',
                validators:{
                    
                    stringLength: {
                        min: 10,
                        max: 12,
                        message: 'The Contact should be at least 10 and atmost 12 digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The Contact number  cannot be  character'
                    }
                }

            },
            email:{
                message: 'The Email Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Email field is required.'

                    },
                    stringLength: {
                        min: 2,
                        max: 100,
                        message: 'The Email ID be more than 1 and less than 100 characters'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            },
            aadhar_card:{
                message: 'The Aadhar Card is not valid',
                validators:{
                    notEmpty:{

                        message:'The Aadhar Card field is required.'

                    }
                }
            },
            pan_card:{
                message: 'The Pan Card is not valid',
                validators:{
                    notEmpty:{

                        message:'The Pan Card field is required'

                    },
                    regexp: {
                        regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
                        message: 'The Pan Card No is incorrect example XXXXX9999X '
                    }
                }

            },
            owner_name:{
                message: 'The Owner Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Owner Name field is required.'

                    }
                }
            },


            address1:{
                message: 'The Address1 is not valid',
                validators:{
                    notEmpty:{

                        message:'The Address1 field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Address 1 no be more than 1 and less than 140 characters long'
                    }
                }

            },
            address2:{
                message: 'The Address2 is not valid',
                validators:{
                    notEmpty:{

                        message:'The Address2 field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Address 1 no be more than 1 and less than 140 characters long'
                    }
                }

            },
            pincode:{
                message: 'The Pincode Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Pincode field is required.'

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
            primary_list:{
                message: 'The Primary List is not valid',
                validators:{
                    notEmpty:{

                        message:'The Primary List is required.'

                    }
                }
            },
            service_list:{
                message: 'The Service List is not valid',
                validators:{
                    notEmpty:{

                        message:'The Service List is required.'

                    }
                }
            },
            r_address_type:{
                message: 'The Registered Address Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Registered Address Type field is required.'

                    }
                }
            },
            address_type:{
                message: 'The Registered Address Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Registered Address Type field is required.'

                    }
                }
            },
            r_address1:{
                message: 'The Registered Address1 is not valid',
                validators:{
                    notEmpty:{

                        message:'The Registered Address1 field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Address1 no be more than 1 and less than 140 characters long'
                    }
                }

            },
            r_address2:{
                message: 'The Registered Address2 is not valid',
                validators:{
                    notEmpty:{

                        message:'The Registered Address2 field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Address2 no be more than 1 and less than 140 characters long'
                    }
                }

            },
            landmark:{
                message: 'The Landmark is not valid',
                validators:{
                    notEmpty:{

                        message:'The Landmark field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Landmark be more than 1 and less than 140 characters long'
                    }
                }

            },
            r_landmark:{
                message: 'The Landmark is not valid',
                validators:{
                    notEmpty:{

                        message:'The Landmark field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 140,
                        message: 'The Landmark be more than 1 and less than 140 characters long'
                    }
                }

            },
            r_pincode:{
                message: 'The Pincode Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Pincode field is required.'

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
            bank_name:{
                message: 'The Bank Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Bank Name field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 40,
                        message: 'The Bank Name be more than 1 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-z 0-9-.]+$/i,
                        message: 'The Bank Name cannot be special character'
                    }
                }
            },
            acc_no:{
                message: 'The Account No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The Account No. field is required.'

                    },
                    stringLength: {
                        min: 1,
                        max: 15,
                        message: 'The Bank Account No. be more than 1 Digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The Bank Account No. cannot be  character'
                    }
                }
            },
            branch_code:{
                message: 'The Branch Code is not valid',
                validators:{
                    notEmpty:{

                        message:'The Branch Code field is required.'

                    }
                }
            },
            ifsc_code:{
                message: 'The IFSC Code is not valid',
                validators:{
                    notEmpty:{

                        message:'The IFSC Code field is required.'

                    },
                    regexp: {
                        regexp: /^[A-Z|a-z]{4}[0][\d]{6}$/,
                        message: 'The IFSC CODE No is incorrect example : XXXX0000000'
                    }
                }

            },
            pin_code:{
                message: 'The Pincode is not valid',
                validators:{
                    notEmpty:{

                        message:'The Pincode field is required.'

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
            acc_type:{
                message: 'The Account Type is not valid',
                validators:{
                    notEmpty:{

                        message:'The Account Type field is required.'

                    }
                }
            },
            company_name:{
                message: 'The Company Name is not valid',
                validators:{
                    notEmpty:{

                        message:'The Company Name field is required.'

                    }
                }
            },
            tin_no:{
                message: 'The TIN No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The TIN No. field is required.'

                    }
                }
            },
            cin_no:{
                message: 'The CIN No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The CIN No. field is required.'

                    }
                }
            },
            username:{
                message: 'The Username is not valid',
                validators:{
                    notEmpty:{

                        message:'The Username field is required.'

                    },
					 regexp: {
                        regexp: /^[a-zA-Z0-9]+$/i,
                        message: 'The Username cannot be special character'
                    }
                }
            },
            password:{
                message: 'The Password is not valid',
                validators:{
                    notEmpty:{

                        message:'The Password field is required.'

                    }
                }
            },
			tax_reg:{
				
				 
                validators:{
                    
                   regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/i,
                        message: 'The Tax Reg. cannot  be Special character'
                    }
                }
				
				
				
				
			},
			
			st_reg_no:{
				
				
                validators:{
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/i,
                        message: 'The ST Reg. cannot  be Special character'
                    }
                   
                }
				
				
				
			},
			
			
			
			
			otp_no:{
				
				message: 'OTP is not valid',
                validators:{
                    notEmpty:{

                        message:'The OTP. field is required.'

                    },
                    
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The OTP cannot be  character'
                    }
                }
			},
			
			check1:{
				message: 'Please click on checkboxes',
                validators:{
                    notEmpty:{

                        message:'The  field is required.'

                    },
                    
                  
                }
				
			},
			
			check2:{
				message: 'Please click on checkboxes',
                validators:{
                    notEmpty:{

                        message:'The  field is required.'

                    },
                    
                  
                }
				
			}




        }

    });


        $("#main_acc_verf").bootstrapValidator({


            live: 'enabled',
            submitButton: '$form_unloading button[type="submit"]',
            submitHandler: function(validator, form, submitButton) {






                // $("#submit_acc_verf").click(function(){
                //var mobile="";
				//mobile=$("#mobile_no").val();
				//if(mobile=="")
				//{
								//show_modal("Please enter mobile no");

				//}
				//else if(mobile!=["/^[1-9][0-9]*$/"])
				//{
								//show_modal("Please enter valid mobile no");

				//}
				
				//mob=$("#mobile_no").val();
                mobile1=$("#mobile_no").val();
                var main_query = {

                    'mobile_no': $("#mobile_no").val()
					
                };
				
                //show_modal("<img src='loader.gif'>");

                $.get("client_vendor_verf.php", main_query, function (ho) {



                    var obj = JSON.parse(ho);

                    if (obj.status=="success"){
               $("#mobile_nos").val(mobile1);
			   $("#mobiles").val(mobile1);
                        //show_modal(obj.status+""+obj.reason);
                        show_modal("This Mobile no. is successfully registered.");
						  $("#tab2").tab('show');
                        $("#main_acc_verf").bootstrapValidator('resetForm', true);
                   

                    }
                    else if (obj.status == "fail"){

                        // console.log(ho);
                        show_modal(obj.reason);

                    }
                    else {

                        //console.log(ho);
                        show_modal("Failed To Create..");

                    }

                });

                return false;

                // });


            },
            fields:{

                mobile_no:{
                      message: 'The Mobile No. is not valid',
                validators:{
                    notEmpty:{

                        message:'The Mobile No. field is required.'

                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The Contact should be at least 10 digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/i,
                        message: 'The Contact number  cannot be  character'
                    }
                }



                }



            }




        });
        $("#files").fileinput({

            allowedFileExtensions : ['pdf','jpg', 'png','gif','jpeg'],
            elErrorContainer: '#kv-error-4',
            uploadUrl: "upload_assoc_docx.php", // your upload server url
            uploadExtraData: function() {
                return {

                    "files_types":$("#files_type").val(),
                   
					"mobile_no":$("#mobiles").val()
					

                };
            }
        }).on('fileuploaded', function(evt,data,datas,tt){
      
            if(data.response.messages=="OK")
            {
                $("#kv-error-6").html("<div class='alert alert-success'><strong>Success!</strong> Image Uploaded Succesfully</div>");
                getUplodedocx()
                setTimeout(function()
                {
                    $("#kv-error-6").html("");

                },2500);

                $("#files_type").val("").attr("selected","selected");
                $('#files').fileinput('clear');
                $('#files').fileinput('enable').fileinput('disable');

            }
            else
            {

                $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed</div>");

            }


        }).on("filebrowse",function()
        {

            $("#files_type").focus()
            if($("#files_type").val()=="" ) {
                $("#subs").click();

                $('#files').fileinput('lock');

// method chaining
                $('#files').fileinput('lock').fileinput('disable');

            }else
            {
                $('#files').removeAttr('disabled');
                $('#input-id').fileinput('clear');

// method chaining
                $('#input-id').fileinput('clear').fileinput('disable');
            }
        });
$("#same_above").click(function(){

    if($("#same_above:checked").val()){
        $("#r_address1").val($("#address1").val())
        $("#r_address2").val($("#address2").val())
        $("#r_pincode").val($("#pincode").val())
        $("#r_city").val($("#city").val())
        $("#r_state").val($("#state").val())
        $("#r_country").val($("#country").val())
        $("#r_landmark").val($("#landmark").val())
    }else{
        $("#r_address1").val("")
        $("#r_address2").val("")
        $("#r_pincode").val("")
        $("#r_city").val("")
        $("#r_state").val("")
        $("#r_country").val("")
        $("#r_landmark").val("")

    }
})


    });
function  show_modal(ac)
{

    $("#show_mes").html("");
    /////////////////
    $("#myModal0").modal({                    // wire up the actual modal functionality and show the dialog
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true                    // ensure the modal is shown immediately
    });

    $("#show_mes").html(ac);

}
    function get_pincode(z)
    {
//alert(z)

        $("#city").val("");
        $("#state").val("");

        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {
            setState(xs);
        });
    }
    function setState(ams)
    {
//alert(ams)
        $("#city").val("");
        $("#state").val("");
        // alert(ar+"1");
        var obj2 = JSON.parse(ams);
        //alert(obj);

        data11=new Array();

        var out=new Array();

        for(var i = 0; i < obj2.ADD.length; i++) {

            data11[i]=new Array();
            data11[i][0]=obj2.ADD[i].districtname;
            data11[i][1]=obj2.ADD[i].statename;

        }
        if(data11[0][1]!="")
        {
            document.getElementById('city').value=data11[0][0];
            document.getElementById('state').value=data11[0][1];
        }

    }

    function get_r_pincode(z)
    {

        //For Registered Address
        $("#r_city").val("");
        $("#r_state").val("");

        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {
            set_r_State(xs);

        });

    }
function getUplodedocx()
{

    var query={"mobile_no":mobile1}
    $("#tbd1").html("");
    $.get("getUplode_docx.php",query,function(ho){

        var obj=JSON.parse(ho);
        var data=new Array();
        for(var i=0;i<obj.document.length;i++){
            data[i]=new Array();
            data[i][0]=obj.document[i].type;
            data[i][1]=obj.document[i].id;
            data[i][2]=obj.document[i].url;
            var sp=data[i][0].split("+");
            var jo=sp.join(" ");
            $("#tbd1").append("<tr><td>"+jo+"</td><td><a href='"+data[i][2]+"' download='"+data[i][2]+"'> pdf</a></td></tr>");
        }
        var data1=new Array();
        for(var i=0;i<obj.image.length;i++){
            data1[i]=new Array();
            data1[i][0]=obj.image[i].type;
            data1[i][1]=obj.image[i].id;
            data1[i][2]=obj.image[i].url;
            var sp1=data1[i][0].split("+");
            var jo1=sp1.join(" ");
            $("#tbd1").append("<tr><td>"+jo1+"</td><td><a href='"+data1[i][2]+"' download='"+data1[i][2]+"'>image</a></td></tr>");

        }
    })
}
    function set_r_State(ams)
    {
        //For Registered Address
        $("#r_city").val("");
        $("#r_state").val("");
        // alert(ar+"1");
        var obj2 = JSON.parse(ams);
        //alert(obj);

        data11=new Array();

        var out=new Array();

        for(var i = 0; i < obj2.ADD.length; i++) {

            data11[i]=new Array();
            data11[i][0]=obj2.ADD[i].districtname;
            data11[i][1]=obj2.ADD[i].statename;

        }
        if(data11[0][1]!="")
        {
            document.getElementById('r_city').value=data11[0][0];
            document.getElementById('r_state').value=data11[0][1];
        }

    }

    function get_b_pincode(z)
    {
        //For Bank Address
        $("#bank_city").val("");
        $("#bank_state").val("");

        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {
            set_b_State(xs);

        });

    }





    function set_b_State(ams)
    {
        //For Bank Address
        $("#bank_city").val("");
        $("#bank_state").val("");
        // alert(ar+"1");
        var obj2 = JSON.parse(ams);
        //alert(obj);

        data11=new Array();

        var out=new Array();

        for(var i = 0; i < obj2.ADD.length; i++) {

            data11[i]=new Array();
            data11[i][0]=obj2.ADD[i].districtname;
            data11[i][1]=obj2.ADD[i].statename;

        }
        if(data11[0][1]!="")
        {
            document.getElementById('bank_city').value=data11[0][0];
            document.getElementById('bank_state').value=data11[0][1];
        }

    }
function check_file(a)
{


    if(a!="")
    {

        $('#files').fileinput('unlock');


        $('#files').fileinput('unlock').fileinput('disable');
    }
}
function resends()
{
$("#resend").attr("disabled","disabled");
	
      var main_query = {

                    'mobile_no': mobile1
					
                };
				    $.get("client_vendor_verf.php", main_query, function (ho) {



                    var obj = JSON.parse(ho);


                    if (obj.status=="success"){
               

					 show_modal("OTP sent");


                    }
                    else if (obj.status == "fail"){

                        // console.log(ho);
                        show_modal("Failed To Create..");

                    }
                    else {

                        //console.log(ho);
                        show_modal("Failed To Create..");

                    }

                });
	//$("#resend").click(function(){
		
	//})



    setTimeout(function()
    {



        $("#resend").removeAttr("disabled","disabled");
    },20000)
}
function finsh() {
		window.location='index.php';
	}
</script>

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

<!-- END PLUGINS -->


<?php
include_once "include/footer.php";
?>


</body>
</html>