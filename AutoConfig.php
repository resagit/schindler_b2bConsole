<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['user_names'])){?>
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
        <link href="css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">
        <script type="text/javascript" src="side_menu.js"></script>
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <link rel="stylesheet" href="jquery.auto-complete.css">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
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

        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap-toggle.min.js"></script>
        <!--<script src="vendors/jquery-1.9.1.js"></script>-->
        
    </head>


    <body class="bds" onload="load()" style="background-color: white" >
    <div id="myModal_images" style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">
    <div class="modal-dialog">
            <div class="modal-body">
                <div class="col-lg-12">
                    <img src="loader1.gif" style="height: 500px;width: 550px;" class="img-thumbnail" id="changes_images">
                </div>
            </div>
        </div>
    </div>

    <div id="myModal12" style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">
        <div class="modal-dialog">
            <div style="z-index: 999" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Server Response</h4>
                </div>
                <div class="modal-body">
                    <p id="mes"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!--Material edit modal-->
    <div id="edit_material" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="update_material" >

                <div class="modal-content">
                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Material</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="panel panel-green  margin-bottom-40" style="border: 1px solid #00a0d2;">
                                <div class="panel-heading" style="background-color: #00a0d2;">
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Edit Material </h3>
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
                                                <input type="hidden" id="cmt_id"name="cmt_id" value="">
                                                <div class="form-group">
                                                    <label >Material ID:</label>
                                                    <input type="text"  class="form-control"   placeholder="Material ID" id="material_id" name="material_id">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Name:</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Name" id="material_name" name="material_name">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" id="cos">
                                                    <label for="exampleInputPassword1">Base UOM</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="base_uom" required="" id="base_uom" >
                                                        <option value="">Select</option>
                                                        <option value="BOX">BOX</option>
                                                        <option value="PIECE">PIECE</option>
                                                        <option value="FEET">FEET</option>
                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div>
                                                <br>
                                            </div>    <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Price:(rupees)</label>
                                                    <input type="text" step="any"  class="form-control"  placeholder="Material Price" id="material_price" name="material_price">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Height:(cm)</label>
                                                    <input type="text"   class="form-control"  placeholder="Material Height" id="material_height" name="material_height">
                                                </div>

                                            </div> <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Width:(gram)</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Width" id="material_width" name="material_width">
                                                </div>

                                            </div>

                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Length:(cm)</label>
                                                    <input type="text"   class="form-control" id="material_length" placeholder="Material Length"  name="material_length">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Net Weight:(cm)</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Net Weight" id="material_new_weight" name="material_new_weight">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Gross Weight:(gram)</label>
                                                    <input type="text"  class="form-control" placeholder="Material Gross Weight" id="material_gross_weight" name="material_gross_weight">
                                                </div>

                                            </div>

                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" >
                                                    <label for="exampleInputPassword1">Material Is Fragile</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="material_is_fragile" required="" id="material_is_fragile" >

                                                        <option value="">Select</option>
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>

                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Material Is Flamable</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="material_is_flamable" required="" id="material_is_flamable" >

                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div></div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Order Quantity</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Order Quantity"  id="material_order_quantity" name="material_order_quantity">
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <br><br><center><button style="background-color: #00a0d2;color: white" type="submit"  class="btn btn-default" >Update</button></center>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- dialog buttons -->
                        </div>
                    <div class="modal-footer">   <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Material edit modal-->
    
    
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="page-header">
                                    <form enctype="multipart/form-data" id="image_main">
                                        <input type="hidden" id="item_id" value="">
                                        <label>ADD Image </label>
                                        <input id="files" name="files" type="file" multiple>
                                        <br>
                                        <div id="kv-error-4" style="">sdasdasd</div>
                                        <br>
                                        <div id="kv-error-6" style=""></div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <!-- dialog buttons -->
                    </div>
                    <div class="modal-footer">
                        <center></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--  End Here-->


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
                            Auto Config
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
                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1q">client Name:</label>
                                            <select  class="form-control" name="main_company_id1" required="" id="main_company_id1" onchange="call_header(this.value)" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="append_cmp">
                </div>

                <div style="display:none;" class="col-lg-2" id="cmp_type">
                    <div class="form-inline" >
                     <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Search</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!--<div class="col-lg-12"></div> <div class="col-lg-6"> <form role="form" class=""><div class="form-group"><select onchange="get_sale_office()" id="typeid" class="form-control"></select></div></div><div class="col-lg-6"> <div class="form-group"><select id='typeids' onchange="get_warehouse_shipper()" class='form-control'></select></div></div></form>-->
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-10 text-center center-block">
                                    <center>
                                        <br>
                                        <div class="col-lg-2"></div>
                                        <select style="width: 400px;" class="form-control " name="warehouse_id" onchange="get_autoConfig()" required="" id="warehouse_id"></select>
                                    </center>
                                    <br>
                                    <br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <form role="form" id="main">
                                <div class="panel panel-green  margin-bottom-40">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Inbound</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--<div class="form-group" id="shiper_select">
                                                    <label for="exampleInputPassword1">Shipper</label><br>
                                                    <select id="typeid"  class="form-control" data-live-search="true" onchange="cin_change(this.value);"   name="shipper" style="width: 300px" required="">
                                                    </select>
                                                </div>-->

                                        <!-- <div style="margin-left: -15px;height: 80px;padding-left: 50px" class="col-lg-6">
                                                    <div class="col-lg-2"></div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Gate Entry<span style="color:red;" >*</span>:</label>

                                                    </div>
                                                </div>

                                                <div style="margin-left: -15px;height: 80px" class="col-lg-3">
                                                    <div class="form-group">
                                                        <input  id="gate_entry" class='toggle-one' data-toggle="toggle"  type='checkbox'>
                                                        <script>
                                                            $('#gate_entry').bootstrapToggle(
                                                                {

                                                                    on: 'Active',
                                                                    off: 'In-Active'
                                                                });
                                                        </script>
                                                    </div>
                                                </div> -->

                                        <div style="margin-left: -15px;height: 80px;padding-left: 50px" class="col-lg-6">
                                            <div class="form-group">
                                                <input type="hidden" name="companyId" id="cmpid1">
                                                <input type="hidden" name="warehouse_id1" id="warehouse_id1">
                                                <label for="exampleInputPassword1">Quantity check<span style="color:red;">*</span>:</label>
                                            </div>
                                        </div>

                                        <div style="margin-left: -15px;height: 80px" class="col-lg-3">
                                            <div class="form-group">
                                                <input id="quantity_check" class='toggle-one' data-toggle="toggle" type='checkbox'>
                                                <script>
                                                    $('#quantity_check').bootstrapToggle({

                                                        on: 'Active',
                                                        off: 'In-Active'
                                                    });
                                                </script>
                                            </div>
                                        </div>

                                        <div style="margin-left: -15px;height: 80px;padding-left: 50px" class="col-lg-6">
                                            <div class="col-lg-2"></div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Quality Check<span style="color:red;">*</span>:</label>
                                            </div>
                                        </div>

                                        <div style="margin-left: -15px;height: 80px" class="col-lg-3">
                                            <div class="form-group">
                                                <input id="quality_check" class='toggle-one' data-toggle="toggle" type='checkbox'>
                                                <script>
                                                    $('#quality_check').bootstrapToggle({
                                                        on: 'Active',
                                                        off: 'In-Active'
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-green  margin-bottom-40">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i> Outbound</h3>
                                </div>
                                <div class="panel-body">

                                    <!--<div class="form-group" id="shiper_select">
                                        <label for="exampleInputPassword1">Shipper</label><br>
                                        <select id="typeid"  class="form-control" data-live-search="true" onchange="cin_change(this.value);"   name="shipper" style="width: 300px" required="">
                                        </select>
                                    </div>-->

                                    <div class="col-lg-2"></div>
                                    <div style="margin-left: -15px;height: 80px" class="col-lg-4">
                                        <div class="form-group">
                                            <input type="hidden" name="companyId" id="cmpid1">
                                            <input type="hidden" name="warehouse_id1" id="warehouse_id1">
                                            <label for="exampleInputPassword1">Kitting<span style="color:red;">*</span>:</label>
                                        </div>
                                    </div>

                                    <div style="margin-left: -15px;height: 80px" class="col-lg-3">
                                        <div class="form-group">
                                            <input id="kitting" data-toggle="toggle" class='toggle-one' type='checkbox'>
                                            <script>
                                                $('#kitting').bootstrapToggle({
                                                    on: 'Active',
                                                    off: 'In-Active'
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <div style="margin-left: -15px;height: 80px;padding-left: 22px" class="col-lg-6">
                                        <div class="col-lg-2"></div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Good Deliver<span style="color:red;">*</span>:</label>
                                        </div>
                                    </div>

                                    <div style="margin-left: -15px;height: 80px" class="col-lg-3">
                                        <div class="form-group">
                                            <input id="good_deliver" data-toggle="toggle" class='toggle-one' type='checkbox'>
                                            <script>
                                                $('#good_deliver').bootstrapToggle({
                                                    on: 'Active',
                                                    off: 'In-Active'
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <center>
                    <input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains" onclick="main_function()">
                </center>
                <br>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/bootstrapValidator.js"></script>
    <!-- Morris Charts JavaScript -->

    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>


    <script src="html2canvas.js" type="text/javascript"></script>
    <script src="tableExport.js" type="text/javascript"></script>
    <script src="jquery.base64.js" type="text/javascript"></script>

    <script src="jspdf/libs/base64.js" type="text/javascript"></script>
    <script src="jspdf/libs/sprintf.js" type="text/javascript"></script>
    <script src="jspdf/jspdf.js" type="text/javascript"></script>

    <script type="text/javascript">
        $('.form_date').datetimepicker({
            language:  'fr',

            weekStart: 1,
            todayBtn:  1,
            endDate: '+0d',
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
    </script>

    <div id="myModal3" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- dialog body -->

                <div class="modal-header">
                    <h4>Inbound Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="show_mesg" style="height:500px;overflow-y: scroll">
                        <table id="inbound_tables" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Challan No.</th>
                                    <th>Saleable Quantity</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                </tr>
                            </thead>
                            <tbody id="inbound_tbd">
                            </tbody>
                        </table>
                    </div>
                    <i class="fa fa-file-excel-o fa-2x pull-right"><a class="" style="font-size: 18px;" id="inbound_export" href="javascript:void(0)">Export</a></i>
                    <br>
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal4" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- dialog body -->

                <div class="modal-header">
                    <h4>Outbound Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="show_mesg" style="height:500px;overflow-y: scroll">
                        <table id="outbound_tables" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Challan No.</th>
                                    <th>Saleable Quantity</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                </tr>
                            </thead>
                            <tbody id="outbound_tbd">
                                <tr>
                                    <td>No Data Available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <i class="fa fa-file-excel-o fa-2x pull-right"><a class="" style="font-size: 18px;" id="outbound_export" href="javascript:void(0)">Export</a></i>
                    <br>
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>

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
                            <button type="submit" class="btn btn-default">Change </button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(function() {
            $("#exportexcel").bind('click', function (e) {
                $("#tabl_expr").tableExport({ type: "excel", escape: "false",tableName:'Material_Wise_Report'+$("#typeids option:selected").text(),dates:$("#dtp_input2").val()+"_to_"+$("#dtp_input3").val(),warehousename:$("#warehouse_id option:selected").text(),Company_name:$("#typeid option:selected").text(),sales_office_name:$("#typeids option:selected").text()});
            });

            $("#search_by_date").submit(function() {
                search_by_date();
                return false;
            });

            $(".dropdown").click(function() {
                $(this).parent().children("ul").slideToggle();
            });

            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();
            });

            //  $("#myModal_upload_image").modal('show');
            /* image upload*/


            $("input[type=checkbox]").click(function() {

                var kl = $(this).attr('id');
                if ($(this).prop("checked") == true) {
                    $("." + kl + "").hide();
                } else {
                    $("." + kl + "").show();
                }

            });


            $('.toggle-one').bootstrapToggle( { on: 'Active', off: 'In-Active' });


            $(".treeview").click(function() {
                $(this).find(".treeview-menu").slideToggle();
            });
            
            
            $("#change_password").submit(function() {

                $("#not_match").hide();
                if ($("#new_pass").val() == $("#conf_pass").val()) {

                    $.get("change_password.php", $(this).serialize(), function(ert) {

                        if ($.trim(ert) == "N") {
                            $("#error").show();
                            $("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")

                        } else if ($.trim(ert) == "Y") {

                            $("#error").show();
                            $("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
                            $("#change_password")[0].reset();
                            setTimeout(function() {
                                window.location = 'en/logout.php';
                            }, 1200);
                        }

                    });

                } else {

                    $("#not_match").show();
                }
                return false;
            });



            $('#main').bootstrapValidator({

                live: 'enabled',
                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {

                    var parse_id = $("#main_company_id1").val();
                    if (parse_id !== "") {
                        var main = {
                                "Quality": quality_check,
                                "Quantity": quantity_check,
                                "Kitting": kitt,
                                "GoodDeliver": goodDeliver,
                                "unload": 1,
                                "Put_away": 1,
                                "Pick": 1,
                                "GoodIss": 1
                            }
                            // alert(main.Quality.Pick)
                        $.get("createB2BStorage_bill.php", prs, function(ho) {
                            // alert(ho);
                            if ($.trim(ho) == "Y") {
                                show_modal("Storage Bill Created");
                                //                               $("#main").bootstrapValidator('resetForm', true);
                                //                               $("#main")[0].reset();
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else if ($.trim(ho) == "A") {
                                show_modal("Storage Bill Already Exist");

                            } else if ($.trim(ho) == "N") {
                                show_modal("Failed To Create..");

                            } else {

                                show_modal("Failed To Create")
                            }
                        })

                    } else {
                        show_modal("Please Select client");
                    }
                    //$("#myModal_upload_image").modal("show");
                    return false;
                },
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    quantity: {
                        message: 'The Quantity is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Quantity is required and cannot be empty'
                            },
                            regexp: {
                                regexp: /^[0-9 .]+$/i,
                                message: 'Quantity Cannot Be Space Or Special Characters'
                            }

                        }
                    },

                }

            });

            $('#filter').keyup(function () {

                var rex = new RegExp($(this).val(), 'i');
                $('#tbd1 tr').hide();
                $('#tbd1 tr').filter(function () {
                    return rex.test($(this).text());
                }).show();

            });


            $("#item_code").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".item_code").hide();
                } else {
                    $(".item_code").show();
                }
            });


            $("#material_name").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".material_name").hide();
                } else {
                    $(".material_name").show();
                }
            });


            $("#inbound").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".inbound").hide();
                } else {
                    $(".inbound").show();
                }
            });

            $("#outbound").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".outbound").hide();
                } else {
                    $(".outbound").show();
                }
            });


            $("#qty_fail").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".qty").hide();
                } else {
                    $(".qty").show();
                }
            });


            $("#stock").click(function() {
                if ($(this).prop("checked") == true) {
                    $(".stock").hide();
                } else {
                    $(".stock").show();
                }
            });



            /*$("#main").submit(function () {
                var main_date = $("#dtp_input2").val();


                if($("#dates").val()=="")
                {
                show_modal("Please Select Date");
                }
                else {
                hs = {"challan": $("#typeid").val(), "dates": $("#dtp_input2").val()};
                $.post("result.php", hs, function (dff) {


                if ($.trim(dff) != "") {
                add_tables(dff);
                }
                else {
                alert(dff);

                show_modal("Sorry Data is not available on this date");

                }


                });


                }
                */
            //    alert(main_date);
            //  alert(getfuldate($("#dates").val()));
            ///  alert($("#dates").val());

            //  var dt = $("#dates").val();
            //var main_date = getfuldate(dt);
            //alert(main_date);

            return false;

        });


        $("#close").click(function () {
            if ($("#mes").html() == "Challan No. :" + $("#challan_no").val() + " Updated Successfully") {
                location.reload();
            }
            $("#myModal12").hide();

        });

        ///
        function show_modal(ac) {
            $("#show_mes").html("");
            $("#show_mes").html(ac);
            $("#myModal0").modal({ // wire up the actual modal functionality and show the dialog
                "backdrop": "static",
                "keyboard": true,
                "show": true // ensure the modal is shown immediately
            });
        }


        function chcek_this(c)
        {
            $(c).prop('checked', true).change();
        }


        function un_clear(a)
        {
            $(a).prop('checked', false).change();
        }
    </script>

    <script type="text/javascript">

        function get_sale_office() {
            var client_id = $("#typeid").val();
            if(client_id !== undefined){

                query1 = {
                    "client_Id": client_id
                };
                console.log(query1)

                $.get("get_sale_office.php", query1, function(hd) {
                    console.log(hd)
                    var a = hd;
                    if (a == 'N') {
                        $("#sales_off").html('');
                    } else {
                        set_sale_office(a);
                    }
                });

            } else{
                return false;
            }
        }

        function set_sale_office(arr) {

            var obj = JSON.parse(arr);
            dataw = new Array();
            var sales_off = "<option value='0'>Select</option>";
            var out = new Array();

            for (var i = 0; i < obj.LIST.length; i++) {

                dataw[i] = new Array();
                dataw[i][0] = obj.LIST[i].slaveID;
                dataw[i][1] = obj.LIST[i].company_name;
                /*   datak[i][2] = obj.LIST[i].tinNo;
                datak[i][3] = obj.LIST[i].cinNo;*/
                //data[i][1]=obj.LIST[i].name;
                //data[i][7]=obj.DETAIL[i].requestTimestamp;

                sales_off = sales_off + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";
                //alert(datak[i][2]);
                //alert(data[i][1]);
                //alert(warehouseOptions);
            }

            /* $("#Ship_TIN").val(datak[0][2]);
            $("#Ship_CIN").val(datak[0][3]);*/
            $("#typeids").html(sales_off);
            get_warehouse_shipper()

        }



        function search_by_date()
        {
            $("#tbd1").html("<img src='loader1.gif'>");
            var dft={"startdate":$("#dtp_input2").val(),"enddate":$("#dtp_input3").val(),"company_id":$("#ids_value").val(),"warehouse_id":$("#warehouse_id").val()};
            $.get("monthly_wise_report_data.php",dft,function(ty)
            {
                var   objmm = JSON.parse(ty);
                $("#tbd1").html("")
                if($.trim(ty)=="N" || objmm.STOCK.length<=0)
                {
                    show_modal("No Data Available")
                }
                else
                {
                    objmm=JSON.parse(ty)
                }

                var datakt=new Array();
                for(var i = 0; i < objmm.STOCK.length; i++) {

                    datakt[i] = new Array();
                    datakt[i][0] = objmm.STOCK[i].item_code;
                    datakt[i][1] = objmm.STOCK[i].material_name  ;
                    datakt[i][2] = objmm.STOCK[i].client_material_itemID;
                    datakt[i][3] = objmm.STOCK[i].unitOfMeasurement;
                    datakt[i][4] = objmm.STOCK[i].Inbound;
                    datakt[i][5] = objmm.STOCK[i].Outbound;
                    datakt[i][6] = objmm.STOCK[i].openingStock;
                    datakt[i][7] = objmm.STOCK[i].closingStock;

                    $("#tbd1").append("<tr><td class='item_code'>" + datakt[i][0] + "</td><td class='material_name'>" + datakt[i][1].replace(/[^A-Za-z 0-9 \"-_*]+/ig,'') + "</td><td class='client_material_itemID'> " + datakt[i][2] + "</td><td class='uom'> " + datakt[i][3] + "</td><td class='Inbound'> " + datakt[i][4] + "</td><td class='Outbound'> " + datakt[i][5] + "</td><td class='openingStock'> " + datakt[i][6] + "</td><td class='closingStock'> " + datakt[i][7] + "</td></tr>");
                    //$("#tbd1").append("<tr><td class=''>" + datakt[i][0] + "</td><td class=''>" + datakt[i][1] + "</td><td class=''> " + datakt[i][2] + "</td><td class=''> " + datakt[i][3] + "</td><td class=''> " + datakt[i][4] + "</td><td class=''> " + datakt[i][5] + "</td><td class=''> " + datakt[i][6] + "</td><td class=''> " + datakt[i][7] + "</td><td class=''> " + datakt[i][8] + "</td><td class=''> " + datakt[i][9] + "</td><td class=''> " + datakt[i][10] + "</td><td class=''> " + datakt[i][11] + "</td><td class=''> " + datakt[i][12] + "</td><td class=''> " + datakt[i][13] + "</td><td class=''> " + datakt[i][14] + "</td><td class=''> " + datakt[i][15] + "</td><td class=''> " + datakt[i][16] + "</td><td class=''> " + datakt[i][17] + "</td><td class=''> " + datakt[i][18] + "</td><td class=''> " + datakt[i][19] + "</td><td class=''> " + datakt[i][20] + "</td></tr>");

                }

            });
        }



        function order_type(de) {

            if (de == "ODT0000003") {
                return "Inbound";
            } else if (de == "ODT0000004") {
                return "Outbound";
            } else if (de == "ODT0000005") {
                return "Return Inbound";
            } else if (de == "ODT0000006") {
                return "Stock Transfer";
            }

        }


        function stock_id_check(x) {

            if (x == "400") {

                return "ASN";

            } else if (x == "401") {

                return "DSN";
            } else if (x == "402") {

                return "Stock Tranfer";

            } else if (x == "411") {

                return "Unload";
            } else if (x == "412") {

                return "Quantity Check";
            } else if (x == "413") {

                return "Quality Check";
            } else if (x == "414") {

                return "Put Away";
            } else if (x == "415") {

                return "Pick";
            } else if (x == "416") {

                return "Pack";
            } else if (x == "417") {

                return "Kitting";
            } else if (x == "418") {

                return "Good Issue";
            } else if (x == "419") {

                return "Good Delivered";
            } else if (x == "420") {

                return "Stock Transfer Pick";
            } else if (x == "421") {

                return "Stock Transfer Delivered";
            } else if (x == "444") {

                return "Cancel";
            }

        }




        var ksp="";
        addeditems=[];
        var indexs;
        //  create_me(hd);
        var ko="";
        function load()
        {
            set_menus('<?php echo $_SESSION['list']?>');
            // queres={"userNumber":userNumber,"role":role};
            $.post("companyListForReport.php","",function(ty)
            {
                var option="<option value='0'>Select client</option>";
                var obj=JSON.parse(ty);
                var data_aaray=new Array();
                for(var i=0;i<obj.LIST.length;i++)
                {data_aaray[i]=new  Array();
                    data_aaray[i][0]=obj.LIST[i].clientID;
                    data_aaray[i][1]=obj.LIST[i].company_name;
                    option+="<option value='"+data_aaray[i][0]+"'>"+data_aaray[i][1]+"</option>";
                }
                
                $("#main_company_id1").html(option);
                // call_header($("#main_company_id1"))
            })
            $.post("companylist.php","",function(hd)
            {   
                console.log(hd);
                // alert(hd+"mateirlal");
                var a=hd;
                setData(a);
                ko =a;
                /*   var   obj = JSON.parse(hd);
                //   $("#typeid").html("");
                datak=new Array();
                var levelOption="";
                var out=new Array();
                for(var i = 0; i < obj.LIST.length; i++) {
                datak[i]=new Array();
                datak[i][0]=obj.LIST[i].item_code;
                datak[i][1]=obj.LIST[i].material_name;
                datak[i][1]=obj.LIST[i].unitOfMeasurement;
                datak[i][1]=obj.LIST[i].imageUrl;
                //      $("#typeid").append("<option value='"+datak[i][0]+"'>"+ datak[i][1]+"</option>");
                //data[i][1]=obj.LIST[i].name;
                //data[i][7]=obj.DETAIL[i].requestTimestamp;
                //   levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";
                // alert(datak[i][2]);
                //alert(data[i][1]);
                //alert(levelOption);
                }*/

            });
            //     shipper_change("All")
            // setup autocomplete function pulling from currencies[] array
        }


        function call_header(cmp_id) {
            //$("#append_cmp").html("<img src='loader1.gif'>");
            set_company111(cmp_id);
            // get_to_company(cmp_id);
        }


        function call_by_company(qq){
            $('#ids_value').val(qq);
            $('#typeid').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Company").attr("selected", "selected");
            $('#cmp_type>div>select').change();
            $('#warehouse_id').val("");
            get_warehouse_shipper();
            //get_warehouse_shipper1(qq);
        }


        function call_by_sales(aa){

            $('#ids_value').val(aa);
            $('#company_typeids').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
            $('#cmp_type>div>select').change();
            $('#warehouse_id').val("");
            get_warehouse_shipper();
            //get_warehouse_shipper1(aa);
        }

        function set_company111(x)
        {
        
            //$("#append_cmp").html("<img src='loader1.gif'>");
            $("#append_cmp").html("");
            $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>client Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>client Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");
            var query={"id":x};
            $.get("getSaleOfficeList.php",query,function(user_ret)
            {
                var obj=JSON.parse(user_ret);
                var option="";
                var data_append=new Array();
                if(obj.COMPANY.length>0) 
                {
                    $("#cmp_type>div>select").append("<option value='Company'>client</option><option value='Sales Office'>Sales Office</option>");
                    $("#show_contain").show();
                    $("#ors").show();
                    $("#company_panel").show();

                    $("#main_company_container").removeClass("col-lg-3")
                    $("#main_company_container").addClass("col-lg-12");
                    var options="<option value=''>Select client</option>";
                    var data_append1=new Array();
                    for(var i=0;i<obj.COMPANY.length;i++)
                    {
                        data_append1[i]=new Array();
                        data_append1[i][0]=obj.COMPANY[i].salesOfficeID;
                        data_append1[i][1]=obj.COMPANY[i].company_name;
                        options+="<option value='"+data_append1[i][0]+"'>"+data_append1[i][1]+"</option>";
                    }
                    $("#company_typeids").html(options);
                    //      asn_inbound_details($("#typeid").val());
                }
                else{
                // show_modal("No Sales Office Create For This client");
                    show_modal("No Client Details For This client");
                }

                if(obj.LIST.length==0)
                {
                    show_modal("No Sales Office Create For This client");
                }

                if(obj.LIST.length==0)
                {
                    $("#ors").hide()
                    $("#salesoffice_contain").hide();
                    $("#cmp_type").remove();
                    $("#main_company_container").removeClass("col-lg-12");
                    $("#main_company_container").addClass("col-lg-12");
                    //$("#main_company_container").removeClass("col-lg-10")
                }

                /*
                else if(obj.LIST.length==0 && obj.COMPANY.length>0 )
                {
                $("#show_contain").show();
                $("#cmp_type>div>select").append("<option value='Company'>Company</option>");

                $("#main_company_container").removeClass("col-lg-12")
                $("#main_company_container").addClass("col-lg-3");
                $("#ors").hide();
                $("#company_panel").show();
                }*/

                else if(obj.LIST.length>0 && obj.COMPANY.length==0 )
                {
                    $("#show_contain").show();
                    $("#cmp_type>div>select").append("<option value='Sales Office'>Sales Office</option>");

                    $("#main_company_container").removeClass("col-lg-12")
                    $("#main_company_container").addClass("col-lg-3");

                }

                option="<option value='0'>Select Sales Office</option>";
                for(var i=0;i<obj.LIST.length;i++)
                {
                    data_append[i]=new Array();
                    data_append[i][0]=obj.LIST[i].slaveID;
                    data_append[i][1]=obj.LIST[i].company_name;
                    option+="<option value='"+data_append[i][0]+"'>"+data_append[i][1]+"</option>";
                }

                $("#typeid").html(option);
                //set_fun(x)
                // $("#append_cmp1").html("");
                //
                // $("#append_cmp1").append("<input type='hidden' value='' id='ids_value1'> <div id='show_contain1' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container1'></div>  <div  class='col-lg-6' style='display:none ' id='company_panel1'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids1' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors1' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain1'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid1' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");
                // $("#show_contain1").show();
                // $("#ors1").show();
                // $("#company_panel1").show();
                /*  if ($("#company_panel").css("display") != "none") {
                asn_inbound_details($("#company_typeids").val());
                }else {
                asn_inbound_details($("#typeid").val());
                }*/
                //
            });

        }



        function set_cmp(a) {

            if (a == "Company") {
                set_items_company();
            } else if (a == "Sales Office") {
                set_item();
            }
        }


        var parse_id = "";
        function set_items_company() {
            $("#ids_value").val($("#company_typeids").val());
        }

        function set_item() {
            $("#ids_value").val($("#typeid").val());
        }



        var datak;
        var levelOptions = "";
        function setData(arr) {

            console.log(arr);

            ko = arr;
            var obj = JSON.parse(arr);
            datak = new Array();
            var levelOption = "<option value='0'></option>";
            var out = new Array();

            for (var i = 0; i < obj.LIST.length; i++) {

                datak[i] = new Array();
                datak[i][0] = obj.LIST[i].id;
                datak[i][1] = obj.LIST[i].name;

                //data[i][1]=obj.LIST[i].name;
                //data[i][7]=obj.DETAIL[i].requestTimestamp;
                levelOptions = levelOptions + "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";
                // alert(datak[i][2]);
                //alert(data[i][1]);
                //alert(levelOption);
            }

            $("#typeid").html(levelOptions);
            get_sale_office();
            //  get_warehouse_shipper();
            //    $("#challan").append(levelOptions);
            //var no= document.getElementById("typeid").selectedIndex;
            // alert(no);
            // alert(no+"Indesx");
            // change(no);
            // getMaterailList(ids);
        }



        function shipper_change(arr) {
            $("#tbd1").html("");
            var ret = "";
            drr = {
                "warehouse_id": arr
            };
            if (arr == "All") {
                $.get("get_all_warehouse.php", drr, function(tt) {
                    create_me(tt);
                });
            } else {

                $.get("get_warehouse.php", drr, function(ttt) {

                    if ($.trim(ttt) == "N" || $.trim(ttt) == "") {
                        show_modal("Sorry Data Is Not Available On this warehouse")
                    } else {
                        create_me(ttt);
                    }
                })
            }
            ///$("#typeid").html("");
        }



        //$("#typeid").html(levelOptions);
        //    $("#challan").append(levelOptions);
        //var no= document.getElementById("typeid").selectedIndex;
        // alert(no);
        // alert(no+"Indesx");
        // change(no);
        // getMaterailList(ids);
        ///Conf Adress



        var $rows = $('#tabl_expr tr');
        $('#search_table').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });


        /////////////update items//////////
        function set_item_id(b) {
            $("#myModal_upload_image").modal('show');
            $("#item_id").val(b);
        }


        function set_items() {

            // $('#tokenfield-1').tokenfield('disable');
            $('#tokenfield-1').tokenfield('destroy');
            var choicess = new Array();
            var clin = $("#typeid").val();

            //alert(clin);
            var query = {
                "company_id": clin
            };
            $.post("get_material_list.php", query, function(iks) {

                // alert(iks)
                var objd = JSON.parse(iks);
                var out = "";
                //  alert(iks+"i");
                datass = new Array();
                out = new Array();

                for (var i = 0; i < objd.LIST.length; i++) {

                    datass[i] = new Array();

                    datass[i][0] = objd.LIST[i].item_code;
                    datass[i][1] = objd.LIST[i].material_name;
                    datass[i][2] = objd.LIST[i].unitOfMeasurement;
                    //alert(data[i][0]+" data");
                    //     out[i]=obj.ITEM[i].item;
                    choicess.push(datass[i][0].toUpperCase());

                }

                $('#tokenfield-1').tokenfield('enable');
                $('#tokenfield-1').tokenfield({
                    autocomplete: {
                        source: choicess,
                        delay: 10,

                    },
                    showAutocompleteOnFocus: true,
                    delimiter: [',', ' ', '_']

                });

            });
        }


        function get_warehouse_shipper()
        {
            var sales_off=$("#ids_value").val();
            query1 = {"sales_off": sales_off};
            $.get("get_warehouse.php", query1, function (hd) {

                console.log("get warehouse", hd);

                var a = hd;
                if(a=='N')
                {
                    $("#ids_value").html('');
                    
                }else {
                    set_warehouse_shipper(a);
                }
            });
        }


        function set_warehouse_shipper(arr) {

            console.log(arr)

            var obj = JSON.parse(arr);
            ship_data = arr;
            dataw = new Array();
            shipper = new Array();
            var warehouse = "";
            var shippr = "";
            var out = new Array();

            console.log(obj.WAREHOUSE)

            if (obj.WAREHOUSE.length == 0) {
                show_modal("No Warehouse Found..");
                return false;
            } else {
                for (var i = 0; i < obj.WAREHOUSE.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.WAREHOUSE[i].warehouseId;
                    dataw[i][1] = obj.WAREHOUSE[i].wareHouseName;
                    /*   datak[i][2] = obj.LIST[i].tinNo;
                    datak[i][3] = obj.LIST[i].cinNo;*/
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    warehouse = warehouse + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";

                }
            }

            $("#warehouse_id").html(warehouse);
            get_autoConfig();

        }


        var goodDeliver;
        var kitt;
        var quality_check;
        var quantity_check;
        function get_autoConfig() {

            var query = {
                "companyId": $("#ids_value").val(),
                "warehouseid": $("#warehouse_id").val()
            };

            console.log(JSON.stringify(query));

            $.post("clientautoConfig.php", query, function(ho) {

                console.log(ho);

                if ($.trim(ho) != "N") {

                    var obj = JSON.parse(ho);
                    if ($.trim(obj.gate_entryStatus) == "0") {

                        // $("#good_deliver").attr('checked',false);
                        // $('#quantity_check').parent().addClass("off");
                        //  $('#quantity_check').bootstrapToggle('off');
                        un_clear("#gate_entry");

                    } else if ($.trim(obj.gate_entryStatus) == "1") {

                        //   $('#quantity_check').parent().addClass("on");
                        //  $('#quantity_check').bootstrapToggle('on');
                        chcek_this("#gate_entry");

                    }

                    if ($.trim(obj.quantityStatus) == "0") {

                        // $("#good_deliver").attr('checked',false);
                        // $('#quantity_check').parent().addClass("off");
                        //  $('#quantity_check').bootstrapToggle('off');
                        un_clear("#quantity_check");

                    } else if ($.trim(obj.quantityStatus) == "1") {

                        //   $('#quantity_check').parent().addClass("on");
                        //  $('#quantity_check').bootstrapToggle('on');
                        chcek_this("#quantity_check");

                    }

                    if ($.trim(obj.qualityStatus) == "0") {

                        // $("#good_deliver").attr('checked',false);
                        //  $('#quality_check').parent().addClass("off");
                        //   $('#quality_check').bootstrapToggle('off');
                        un_clear("#quality_check");

                    } else {

                        //  $('#quality_check').parent().addClass("on");
                        //  $('#quality_check').bootstrapToggle('on');
                        chcek_this("#quality_check")

                    }

                    if ($.trim(obj.kittingStatus) == "0") {

                        // $("#good_deliver").attr('checked',false);
                        //   $('#kitting').parent().addClass("off");
                        // $('#kitting').bootstrapToggle('off');
                        un_clear("#kitting");

                    } else {

                        //  $('#kitting').parent().addClass("on");
                        // $('#kitting').bootstrapToggle('Active');
                        chcek_this("#kitting");
                    }

                    if ($.trim(obj.goodsDeliverStatus) == "0") {

                        // $("#good_deliver").attr('checked',false);
                        // $('#good_deliver').parent().addClass("off");
                        //  $('#good_deliver').bootstrapToggle('off');
                        un_clear("#good_deliver");

                    } else {
                        //  $('#good_deliver').parent().addClass("off");
                        //   $('#good_deliver').bootstrapToggle('Active');
                        chcek_this("#good_deliver");

                    }

                } else {

                    show_modal("No Data Found..");
                    un_clear("#gate_entry");
                    un_clear("#quantity_check");
                    un_clear("#quality_check");
                    un_clear("#kitting");
                    un_clear("#good_deliver");
                    
                    //  $('#quantity_check,#good_deliver,#kitting,#quality_check').prop("checked",false);
                    // $('#quantity_check,#good_deliver,#kitting,#quality_check').bootstrapToggle('In-Active');
                    //   $('#quantity_check,#good_deliver,#kitting,#quality_check').parent().addClass("off");
                }

                //for(var i=0;i<obj.length;i++){
                //    data[i]=new Array();
                //    data[i][0]=obj[i].unloadStatus;
                //    data[i][1]=obj[i].putawayStatus;
                //    data[i][2]=obj[i].kittingStatus;
                //    data[i][3]=obj[i].pickStatus;
                //    data[i][4]=obj[i].goodsIssueStatus;
                //    data[i][5]=obj[i].goodsDeliverStatus;
                //    data[i][6]=obj[i].qualityStatus;
                //    data[i][7]=obj[i].quantityStatus;
                //
                //    if(data[i][5]==1){
                //        alert("jhjhd");
                //        $("#good_deliver input[type="checkbox"]").attr('checked',false);
                //
                //    }
                //}

            })

        }


        function main_function() {

            if ($("#main_company_id1").val() == "") {
                show_modal("Please Select client");
            } else if ($("#ids_value").val() == "") {
                show_modal("Please Select client Or SalesOffice");
            } else {

                var kitting, quantity, quality, delivered, gate_entry;
                if ($("#gate_entry").prop("checked") == true) {

                    gate_entry = "1";
                } else {

                    gate_entry = "0";
                }

                if ($("#kitting").prop("checked") == true) {

                    kitting = "1";
                } else {

                    kitting = "0";
                }

                if ($("#quantity_check").prop("checked") == true) {

                    quantity = "1";
                } else {

                    quantity = "0";
                }

                if ($("#quality_check").prop("checked") == true) {

                    quality = "1";
                } else {

                    quality = "0";
                }

                if ($("#good_deliver").prop("checked") == true) {

                    delivered = "1";
                } else {

                    delivered = "0";
                }

                var main = {
                    "companyId": $("#ids_value").val(),
                    "warehouseid": $("#warehouse_id").val(),
                    "Quality": quality,
                    "Quantity": quantity,
                    "Kitting": kitting,
                    "GoodDeliver": delivered,
                    "unload": "1",
                    "Put_away": "1",
                    "Pick": "1",
                    "GoodIss": "1",
                    "gate_entry": gate_entry

                };

                $.post("updateAutoConfig.php", main, function(ho) {
                    // alert(ho);
                    var obj = JSON.parse(ho)
                    if (obj.status == "success") {
                        show_modal("Successfully Done");
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        show_modal("Failed To Active")
                    }
                })
            }
        }
        </script>

    
    </body>
    </html>
    <?php } else { echo "<script>window.location='index.php'</script>";}?>