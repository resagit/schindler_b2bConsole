


<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['user_names']))
{


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

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <script type="text/javascript" src="side_menu.js"></script>
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
            .sub-dropdown li
            {



                list-style: none;
                height: 30px;
            }
            .sub-dropdown li a{color: white}
            .sub-dropdown ul
            {

                margin-left: 10px;
                margin-top: 10px;;
            }

        </style>

        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            tr{



                cursor: pointer;
            }




            .wizard {
                margin: 20px auto;
                background: #fff;
            }

            .wizard .nav-tabs {
                position: relative;
                margin: 40px auto;
                margin-bottom: 0;
                border-bottom-color: #e0e0e0;
            }

            .wizard > div.wizard-inner {
                position: relative;
            }

            .connecting-line {
                height: 2px;
                background: #e0e0e0;
                position: absolute;
                width: 80%;
                margin: 0 auto;
                left: 0;
                right: 0;
                top: 50%;
                z-index: 1;
            }

            .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
                color: #555555;
                cursor: default;
                border: 0;
                border-bottom-color: transparent;
            }

            span.round-tab {
                width: 70px;
                height: 70px;
                line-height: 70px;
                display: inline-block;
                border-radius: 100px;
                background: #fff;
                border: 2px solid #e0e0e0;
                z-index: 2;
                position: absolute;
                left: 0;
                text-align: center;
                font-size: 25px;
            }
            span.round-tab i{
                color:#555555;
            }
            .wizard li.active span.round-tab {
                background: #fff;
                border: 2px solid #5bc0de;

            }
            .wizard li.active span.round-tab i{
                color: #5bc0de;
            }

            span.round-tab:hover {
                color: #333;
                border: 2px solid #333;
            }

            .wizard .nav-tabs > li {
                width: 25%;
            }

            .wizard li:after {
                content: " ";
                position: absolute;
                left: 46%;
                opacity: 0;
                margin: 0 auto;
                bottom: 0px;
                border: 5px solid transparent;
                border-bottom-color: #5bc0de;
                transition: 0.1s ease-in-out;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 46%;
                opacity: 1;
                margin: 0 auto;
                bottom: 0px;
                border: 10px solid transparent;
                border-bottom-color: #5bc0de;
            }

            .wizard .nav-tabs > li a {
                width: 70px;
                height: 70px;
                margin: 20px auto;
                border-radius: 100%;
                padding: 0;
            }

            .wizard .nav-tabs > li a:hover {
                background: transparent;
            }

            .wizard .tab-pane {
                position: relative;
                padding-top: 50px;
            }

            .wizard h3 {
                margin-top: 0;
            }

            @media( max-width : 585px ) {

                .wizard {
                    width: 90%;
                    height: auto !important;
                }

                span.round-tab {
                    font-size: 16px;
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                }

                .wizard .nav-tabs > li a {
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                }

                .wizard li.active:after {
                    content: " ";
                    position: absolute;
                    left: 35%;
                }
            }


            .autocomplete-suggestions
            {


                z-index: 500000000;
            }
        </style>



        <script type="text/javascript">




        </script>


    </head>

    <body class="bds" onload="load();"  >


    <div class="modal fade" id="myModal_location" style="z-index: 10000" data-backdrop="static" >
        <div class="modal-dialog" style="width:80%">

            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-header">&nbsp;&nbsp;&nbsp;<h4>Edit Location Details</h4>


                </div>
                <div class="modal-body" id="typ" style="min-height: 100px;max-height: 400px;overflow: auto">

                    <input type="hidden" value="" id="set_loc_uom">
                    <input type="hidden" value="" id="location_id_val">
                    <input type="hidden" value="" id="ware_id">
                    <input type="hidden" value="" id="set_put_pick">
                    <form id="main_form">
                        <div class="row"> 

                            <div class="col-lg-3" > <div class="form-group">
                                    <input type="text" required placeholder="Physical ID" id="Physical_ID" name="Physical_ID" class="form-control">
                                </div></div>

                            <div class="col-lg-3" style="display:none">
                                <div class="form-group">
                                    <input type="text" value="-"  placeholder="Bin ID" name="Bin_ID" id="Bin_ID" class="form-control">
                                </div></div>


                            <div class="col-lg-3">   <div class="form-group">
                                    <input type="text" required placeholder="Level ID" name="Level_ID" id="Level_ID" class="form-control">
                              </div></div>

                            <div class="col-lg-3"> <div class="form-group">
                                    <input type="text" required placeholder="Row ID" name="Row_ID" id="Row_ID" class="form-control">
                                </div></div>
                        
                                <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" required placeholder="Column ID" name="Column_ID" id="Column_ID" class="form-control">
                                </div></div>

                        </div>
                        <div class="row">

                           


                            <div class="col-lg-3" style="display:none">   <div class="form-group">
                                    <input type="text" value="-"  placeholder="Zone ID" name="Zone_ID" id="Zone_ID" class="form-control">
                                </div></div>


                            <div class="col-lg-3"> <div class="form-group">
                                    <input type="text" required placeholder="Floor ID" name="Floor_ID" id="Floor_ID" class="form-control">
                                </div></div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" required name="Storage_Property_ID" id="Storage_Property_ID">
                                    </select>
                                </div></div>

                                <div class="col-lg-3"> <div class="form-group">
                                    <select class="form-control" required name="Storage_Type" id="Storage_Type">
                                        <option value="">Select Storage Type</option>
                                        <option value="saleable">Saleable</option>
                                        <option value="nonSaleable">Non Saleable</option>
                                        <option value="openArea">Open Area</option>
                                        <option value="return">Return</option>
                                        <option value="unload">Unload</option>
                                        <option value="qc">QC</option>
                                        <option value="qt">QT</option>
                                        <option value="kitting">Kitting</option>
                                    </select>



                                </div></div>
                                
                         </div>
                        <div class="row">
                            <div class="col-lg-3" style="display:none">   <div class="form-group">
                                    <input type="number" value="-" title="Only Numbers"   name="Weight_Capacity" id="Weight_Capacity" placeholder="Weight Capacity" class="form-control">
                                </div></div>

                            <div class="col-lg-3" style="display:none"> <div class="form-group">

                                    <select class="form-control"  name="isTemperature" id="isTemperature">
                                        <option value="">Select Temperature</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>

                                    </select>

                                </div></div>
                            <div class="col-lg-3" style="display:none">
                                <div class="form-group">
                                    <input type="number"  title="Only Numbers"  name="Min_Temperature" id="Min_Temperature" placeholder="Min Temperature" class="form-control">
                                </div></div>
                            <div class="col-lg-3" style="display:none">   <div class="form-group">
                                    <input type="number" title="Only Numbers"  name="Max_Temperature" id="Max_Temperature"  placeholder="Max Temperature" class="form-control">
                                </div></div>

                            

                        </div>
                        <div class="row">
                            



                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-2">
                                <input type="submit" class="btn btn-default" value="Update">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>

            </div>
        </div>

    </div>

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
                            Update Location
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
                                        <input type="hidden" id="warehouse_id"  value="">
                                        <label for="exampleInputEmail1q">Select Warehouse:</label>
                                        <select  class="form-control" name="company_name" required="" id="company_name" onchange="setData1();" >

                                          


                                        </select>
                                    </div>

                                </div>
                            </div></div>
                    </div>
                </div>



                <div class="panel panel-green  margin-bottom-40" >
                    <div  class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i>Location Details</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">


                            <table   class="table table-striped  table-hover">

                                <thead>
                                <tr>
                                    <th>Physical ID</th>
                                    <th>Storage Type</th>

                                    <th>Edit</th>



                                </tr>
                                </thead>
                                <tbody id="curier_partener">

                                </tbody>
                            </table>

                    </div>
                </div>
                    </div>



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

    <div id="curier_package_modal" class="modal fade">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <!-- dialog body -->
                <form id="currier_submit">

                    <div class="modal-header"><h4>Curier Package Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body"><div class="container-fluid">

                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Date </label>
                                    <div class="controls input-append date form_date"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input  name="dates" title="Date" class="input-group-lg" style="cursor:not-allowed;border: 1px solid darkgrey;border-radius: 5px;height: 30px;width: 250px;padding-left: 10px;" required size="26" type="text" id="dates"    placeholder="Date"  >

                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                    </div>
                                    <input type="hidden"  name="actual_date" id="dtp_input2"  />
                                </div>
                            </div>
                            <input type="hidden" name="parent_id" id="parent_id" value="">
                            <input type="hidden" name="partner_name" id="parent_name" value="">
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Content</label>
                                    <select name="package_content" required class="form-control"><option value="Product">Product</option><option value="Document">Document</option></select>
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Insurance </label>
                                    <select required name="insurance" class="form-control"><option value="YES">Yes</option><option value="NO">No</option></select>
                                </div>
                            </div>

                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Type </label>
                                    <select required name="package_type" id="packages_type" class="form-control" onchange="no_change_type(this.value)"><option value="Identical">Identical</option><option value="Different">Different</option></select>
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">No. of Package </label>
                                    <input required placeholder="Number Of Package" disabled value="1" oninput="append_table(this.value)" type="number" class="form-control" id="no_packge" name="no_package">
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Description </label>
                                    <select name="package_desc" required class="form-control"><option value="BOOK">Book</option><option value="Watch">Watch</option></select>
                                </div>
                            </div>
                            <div class="col-lg-12" id="append_table">


                            </div>

                        </div>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><Center><button type="submit"   class="btn btn-primary">Finish</button><button type="reset"  data-dismiss="modal" class="btn btn-default">Cancel</button></Center></div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

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
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            startDate: '-0d',
            changeMonth: true
        });



    </script>


    <div id="curier_modal" class="modal fade">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <!-- dialog body -->

                <div class="modal-header">
                    <h4>Available Courier Partners</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">




                    <table   class="table table-striped  table-hover">

                        <thead>
                        <tr>
                            <th>Partner Name</th>
                            <th>Service Name</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Grand Total</th>
                            <th>Open</th>

                        </tr>
                        </thead>
                        <tbody id="curier_partener">

                        </tbody>
                    </table>







                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>












    <!----div message box!------->
    <div id="myModal0" class="modal fade" style="z-index: 50000">
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

        function append_table(a) {
            $("#append_table").html("")
            for (var i = 1; i <= a; i++) {


                $("#append_table").append('<label>Package ' + i + '</label>  <div class="form-group"> <div class="col-lg-4"><input placeholder="Length" required type="number" class="form-control" id="no_length"  name="no_length[]"><br></div> <div class="col-lg-4"><input placeholder="Width" type="number" class="form-control" id="no_width" name="no_width[]" required><br></div> <div class="col-lg-4"><input placeholder="Height" type="number" class="form-control" id="no_height" required name="no_height[]"><br></div> <div class="col-lg-4"><input placeholder="Weight" type="number" class="form-control" id="no_weight" required name="no_weight[]"></div> <div class="col-lg-4"><input placeholder="Carrier Value" type="number" class="form-control" required id="no_carrier" name="no_carrier[]"></div> <div class="col-lg-4"><input placeholder="Quantity" required type="number" class="form-control" id="no_quantity" name="no_quantity[]"></div> </div>');


            }
        }
        function no_change_type(c)
        {

            if(c=="Identical")
            {
                $("#no_packge").attr("disabled",true);
                $("#no_packge").val("1");
                $("#append_table").html();

            }else if(c=="Different")
            {
                $("#no_packge").removeAttr("disabled");
                $("#no_packge").val("");
                $("#append_table").html();
            }
        }
        function set_aprent_id(r,p)
        {


            $("#parent_id").val(r);
            $("#parent_name").val(p);

        }
        function get_details(av){
//alert(av);
            var main={"Location_id":av,"warehouse_id":$("#company_name").val()};
            $("#myModal_location").modal("show");

            $.get("get_location_details.php",main,function(response){
//alert(response);
                var obj_json=JSON.parse(response);
                var data_res=new Array();

                for(var i=0;i<obj_json.LIST.length;i++){
                    data_res[i]=new Array();
                    data_res[i][0]=obj_json.LIST[i].physicalID;
                    data_res[i][1]=obj_json.LIST[i].binID;
                    data_res[i][2]=obj_json.LIST[i].levelID;
                    data_res[i][3]=obj_json.LIST[i].rowID;
                    data_res[i][4]=obj_json.LIST[i].columnID;
                    data_res[i][5]=obj_json.LIST[i].zoneID;
                    data_res[i][6]=obj_json.LIST[i].floorID;
                    data_res[i][7]=obj_json.LIST[i].wareHouseID;
                    data_res[i][8]=obj_json.LIST[i].storagePropertyID;
                    data_res[i][9]=obj_json.LIST[i].storageType;
                    data_res[i][10]=obj_json.LIST[i].weightCapacity;
                    data_res[i][11]=obj_json.LIST[i].isTemperatureControl;
                    data_res[i][12]=obj_json.LIST[i].minTemperature;
                    data_res[i][13]=obj_json.LIST[i].maxTemperature;
                    data_res[i][14]=obj_json.LIST[i].availability;
                    data_res[i][15]=obj_json.LIST[i].locationID;

                    $("#Physical_ID").val(data_res[i][0]);
                    $("#Bin_ID").val(data_res[i][1]);
                    $("#Level_ID").val(data_res[i][2]);
                    $("#Row_ID").val(data_res[i][3]);
                    $("#Column_ID").val(data_res[i][4]);
                    $("#Zone_ID").val(data_res[i][5]);
                    $("#Floor_ID").val(data_res[i][6]);
                    $("#Storage_Property_ID").val(data_res[i][8]);
                    $("#Weight_Capacity").val(data_res[i][10]);
                    if(data_res[i][11]=="Y"){
                        $("#isTemperature").val("Y");
                    }else if(data_res[i][11]=="N"){
                        $("#isTemperature").val("N");
                    }

                    $("#Min_Temperature").val(data_res[i][12]);
                    $("#Max_Temperature").val(data_res[i][13]);
                    $("#Storage_Type").val(data_res[i][9]);
                    $("#Availability").val(data_res[i][14]);
$("#location_id_val").val(data_res[i][15]);
                    $("#ware_id").val(data_res[i][7]);
                    //alert($("#ware_id").val())

                }
            })

        }


        var datak;
        var ko="";
        var levelOptions="";
        function load() {
            // alert(arr+"warehouse")
            set_menus('<?php echo $_SESSION['list']?>');
            $.get("getWareHouseList.php","",function(fg) {
               // alert(fg)
                if (levelOptions == "") {

                    ko = fg;
                    var obj = JSON.parse(fg);


                    datak = new Array();


                   // var levelOption = "<option value=''>Select Warehouse</option>";
                    var out = new Array();

                    for (var i = 0; i < obj.LIST.length; i++) {

                        datak[i] = new Array();
                        datak[i][0] = obj.LIST[i].wareHouseID;
                        datak[i][1] = obj.LIST[i].wareHouseName;
                        /* datak[i][2] = obj.LIST[i].tinNo;
                         datak[i][3] = obj.LIST[i].cinNo;*/
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        levelOptions = levelOptions  + "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";


                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);


                    }
                    //   $("#Ship_TIN").val(datak[0][2]);
                    //   $("#Ship_CIN").val(datak[0][3]);
                    $("#company_name").html("<option>Select Warehouse</option>"+levelOptions);
                   // $("#warehouse_id").val(datak[0][0]);

                }
            })
//alert($("#warehouse_id").val());
        }





        function fresh()
        {


            window.location.reload()
        }
        var hd1;

        function setData1(){

//alert($("#company_name").val());


            $("#curier_partener").html("<img src='loader1.gif'>");


            var query={"warehouse_id":$("#company_name").val()};
            //alert(query.warehouse_id)
            $.get("get_all_location.php",query,function(ho){
//alert(ho);
                $("#curier_partener").html("");
                var obj1=JSON.parse(ho);

                var data1=new Array();
                for(var i=0;i<obj1.LIST.length;i++){
                    data1[i]=new Array();
                    data1[i][0]=obj1.LIST[i].locationID;
                    data1[i][1]=obj1.LIST[i].physicalID;
                    data1[i][2]=obj1.LIST[i].storageType;
                    data1[i][3]=obj1.LIST[i].statusID;
                    $('#curier_partener').append("<tr><tr><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td><input id='"+data1[i][0]+"' type='button' class='btn btn-primary' style='width:100px;' value='Edit' onclick='get_details(this.id)'></td> </td></tr>");

//                    if(data1[i][3]=='1')
//                    {
//                        $('#curier_partener').append("<tr><tr><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td><input id='"+ data1[i][0]+"'  name='Assigned'   class='toggle-one'  checked type='checkbox'  ></td><td><input id='"+data1[i][0]+"' type='button' class='btn btn-primary' value='Edit' onclick='get_details(this.id)'></td> </td></tr>");
//                        $('.toggle-one').bootstrapToggle(
//                            {
//
//                                on: 'Active',
//                                off: 'Inactive'
//                            });
//                    }
//                    else {
//                        $('#curier_partener').append("<tr><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td><input  id='"+ data1[i][0]+"' name='Assigned'  class='toggle-one'  Un-checked type='checkbox'  ></td><td><input id='"+data1[i][0]+"' type='button' class='btn btn-primary' value='Edit'></td></tr>");
//                        $('.toggle-one').bootstrapToggle(
//                            {
//
//                                on: 'Active',
//                                off: 'Inactive'
//                            });
//                    }
                    //$("#curier_partener").append("<tr><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td></td><td><input id='"+data1[i][0]+"' type='button' class='btn btn-primary' value='Edit'></td></tr>")

                }
            })

            $.get("view_storage_data.php","",function(hd){

                hd1=hd;
                var obj=JSON.parse(hd);
                var option="<option value=''>Select Storage Property</option>";
                var data=new Array();
                for(var i=0;i<obj.LIST.length;i++){
                    data[i]=new Array();
                    data[i][0]=obj.LIST[i].storageTypeId;
                    data[i][1]=obj.LIST[i].storageType;
                    data[i][2]=obj.LIST[i].height;
                    data[i][3]=obj.LIST[i].width;
                    data[i][4]=obj.LIST[i].length;
                    data[i][5]=obj.LIST[i].weight;

                    option+="<option value='"+ data[i][0]+"' title='"+ data[i][1]+" "+ data[i][2]+" "+ data[i][3]+" "+ data[i][4]+" "+ data[i][5]+"'>"+ data[i][1]+" "+ data[i][2]+" "+ data[i][3]+" "+ data[i][4]+" "+ data[i][5]+"</option>";

                }
                $("#Storage_Property_ID").html(option);
            })
        }

        $(function() {


            $(".dropdown").click(function()
            {


                $(this).parent().children("ul").slideToggle();



            });
            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();



            });

            $("#logistic_order_form").submit(function()
            {
                var form_data=$(this).serialize();
                form_data+="&logistic_id="+$("#logistic_client_type").val()+"&comp_id="+$("#typeid1").val();
                $("#curier_partener").html("<img src='loader1.gif'>");
                $("#myModal_order_avail").modal("hide");
                $("#curier_modal").modal("show");
                $.post("shipyaariServiceSearch.php",form_data,function(rtt)
                {
                    $("#curier_partener").html("");
                    var obj = JSON.parse(rtt);
                    if(obj.length==0)
                    {

                        show_modal("Sorry No Data Available")
                    }

                    var datakk = new Array();
                    for (var i = 0; i < obj.length; i++) {


                        datakk[i] = new Array();
                        datakk[i][0] = obj[i].Partner_id;
                        datakk[i][1] = obj[i].ServiceName;
                        datakk[i][2] = obj[i].Message;
                        datakk[i][3] = obj[i].status;
                        datakk[i][4] = obj[i].PartnerName;
                        datakk[i][5] = obj[i].GrandTotal;
                        $("#curier_partener").append("<tr id='"+datakk[i][0]+"' title='"+datakk[i][4]+"' onclick='set_aprent_id(this.id,this.title)' data-toggle='modal' data-dismiss='modal' data-target='#curier_package_modal' style='cursor: pointer' ><td>"+datakk[i][4]+"</td><td>"+datakk[i][1]+"</td><td>"+datakk[i][2]+"</td><td>"+datakk[i][3]+"</td><td>"+datakk[i][5]+"</td><td><i class='fa fa-mail-reply fa-1x'></i></td></tr>")
                    }
                })


                return false;

            });


            $("#main_form").submit(function(){

                var isTemperature="";
                // if($("#isTemperature").val()=="Yes"){
                //     isTemperature=1;
                // }else{
                //     isTemperature=0;
                // }
                //alert($("#isTemperature").val());

            //    var main_query={"locatin_id":$("#location_id_val").val(),"Physical":$("#Physical_ID").val(),
            //         "Bin":$("#Bin_ID").val(),"Level":$("#Level_ID").val(),"ware_id":$("#ware_id").val(),
            //         "Row":$("#Row_ID").val(),"Column":$("#Column_ID").val(),"Zone":$("#Zone_ID").val(),"Floor":$("#Floor_ID").val(),
            //         "StorageProperty":$("#Storage_Property_ID").val(),"Weight":$("#Weight_Capacity").val(),
            //         "isTemperature":$("#isTemperature").val(),"MinTemperature":$("#Min_Temperature").val(),
            //         "MaxTemperature":$("#Max_Temperature").val(),"StorageType":$("#Storage_Type").val()};

                    var main_query={"locatin_id":$("#location_id_val").val(),"Physical":$("#Physical_ID").val(),
                    "Level":$("#Level_ID").val(),"ware_id":$("#ware_id").val(),
                    "Row":$("#Row_ID").val(),"Column":$("#Column_ID").val(),"Floor":$("#Floor_ID").val(),
                    "StorageProperty":$("#Storage_Property_ID").val(),"StorageType":$("#Storage_Type").val()};
//alert(main_query.isTemperature)
                $.post("update_location_detail.php",main_query,function(ho){
//alert(ho);
                    if($.trim(ho)=="Y"){
                        show_modal("Location Updated Successfully");
                        setTimeout(function(){
                            window.location.reload()
                        },2500)
                    }else{
                        show_modal("Failed To Update Location");
                        setTimeout(function(){
                            window.location.reload()
                        },2500)
                    }

                })
                return false;
            });
            $("#post_location").submit(function(){
                var Physical="";
                var Bin="";
                var Level="";
                var Row="";
                var Column="";
                var Zone="";
                var Floor="";
                var StorageProperty="" ;
                var Weight="";
                var isTemperature="";
                var MinTemperature="";
                var MaxTemperature="";
                var StorageType="";
                //var Availability="";

                for(var i=0;i<$("#curier_partener tr").length;i++){
                    if(i==0){
                        Physical += $("#curier_partener tr").eq(i).find("td").eq(0).text();
                        Bin += $("#curier_partener tr").eq(i).find("td").eq(1).text();
                        Level += $("#curier_partener tr").eq(i).find("td").eq(2).text();
                        Row+= $("#curier_partener tr").eq(i).find("td").eq(3).text();
                        Column += $("#curier_partener tr").eq(i).find("td").eq(4).text();
                        Zone += $("#curier_partener tr").eq(i).find("td").eq(5).text();
                        Floor += $("#curier_partener tr").eq(i).find("td").eq(6).text();
                        StorageProperty+= $("#curier_partener tr").eq(i).find("td").eq(14).text();
                        Weight += $("#curier_partener tr").eq(i).find("td").eq(8).text();
                        isTemperature += $("#curier_partener tr").eq(i).find("td").eq(9).text();
                        MinTemperature += $("#curier_partener tr").eq(i).find("td").eq(10).text();
                        MaxTemperature+= $("#curier_partener tr").eq(i).find("td").eq(11).text();
                        StorageType+= $("#curier_partener tr").eq(i).find("td").eq(12).text();
                      //  Availability+= $("#curier_partener tr").eq(i).find("td").eq(13).text();
                    }else{
                        Physical += "*"+ $("#curier_partener tr").eq(i).find("td").eq(0).text();
                        Bin += "*"+  $("#curier_partener tr").eq(i).find("td").eq(1).text();
                        Level += "*"+  $("#curier_partener tr").eq(i).find("td").eq(2).text();
                        Row+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(3).text();
                        Column += "*"+  $("#curier_partener tr").eq(i).find("td").eq(4).text();
                        Zone +="*"+  $("#curier_partener tr").eq(i).find("td").eq(5).text();
                        Floor += "*"+ $("#curier_partener tr").eq(i).find("td").eq(6).text();
                        StorageProperty+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(14).text();
                        Weight += "*"+  $("#curier_partener tr").eq(i).find("td").eq(8).text();
                        isTemperature += "*"+ $("#curier_partener tr").eq(i).find("td").eq(9).text();
                        MinTemperature += "*"+  $("#curier_partener tr").eq(i).find("td").eq(10).text();
                        MaxTemperature+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(11).text();
                        StorageType+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(12).text();
                       // Availability+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(13).text();
                    }


                }
                var main_query={"Physical":Physical,"Bin":Bin,"Level":Level,"Row":Row,"Column":Column,"Zone":Zone,"Floor":Floor,"StorageProperty":StorageProperty,"Weight":Weight,"isTemperature":isTemperature,"MinTemperature":MinTemperature,"MaxTemperature":MaxTemperature,"StorageType":StorageType}

                $.post("post_create_location.php",main_query,function(ho){

                    if($.trim(ho)=="Y"){
                        show_modal("Location Created Successfully");
                        setTimeout(function(){
                            window.location.reload()
                        },2500)
                    }else{
                        show_modal(ho);
                        setTimeout(function(){
                            window.location.reload()
                        },2500)
                    }

                })
                return false;
            });
            $(".treeview").click(function()
            {


                $(this).find(".treeview-menu").slideToggle();


            });



            $("#inbound").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".inbound").hide();
                }else {


                    $(".inbound").show();
                }






            });

            $("#currier_submit").submit(function()
            {

                if($("#packages_type").val()=="Different") {

                    var no_length = $("input[name='no_length[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_width = $("input[name='no_width[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_height = $("input[name='no_height[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();


                    var no_weight = $("input[name='no_weight[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var no_carrier = $("input[name='no_carrier[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var no_quantity = $("input[name='no_quantity[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();


                    var data = $(this).serialize();
                    data += "&challan_no=" + $("#logistic_challan_no").val() + "&order_id=" + $("#logistic_order_id").val()+"&payment_mode="+$("#payment_type").val()+"&total_invoice_value="+$("#total_invoice_value").val()+"&logistic_id="+$("#logistic_client_type").val()+"&partner_name1="+$("#package_type").val();
                    data += "&no_length1=" + no_length.join("*") + "&no_width1=" + no_width.join("*") + "&no_height1=" + no_height.join("*") + "&no_weight1=" + no_weight.join("*") + "&no_carrier1=" + no_carrier.join("*") + "&no_quantity1=" + no_quantity.join("*");



                    $.post("shipyaariWithPartnerId.php",data,function(ty)
                    {

                        if($.trim(ty)==null)
                        {
                            $("#curier_package_modal").modal("hide");

                            $("#set_loc_form")[0].reset();
                            $("#logistic_order_form")[0].reset();
                            $("#curier_partener").show();
                            $("#currier_submit")[0].reset();
                            $("#append_table").html("");
                            show_modal("Order Assign Successfully ");
                            get_location($("#typeid1").val())
                        }
                        else
                        {


                            show_modal(ty);
                        }
                    });
                }else
                {
                    var no_length1="1";
                    var no_width1="1";
                    var no_height1 = "1";

                    $("#no_packge").val("1");
                    var no_weight1 = "1";

                    var no_carrier1 ="1";

                    var no_quantity1 = "1";


                    var data1 = $(this).serialize();
                    data1 += "&challan_no=" + $("#logistic_challan_no").val() + "&order_id=" + $("#logistic_order_id").val()+"&payment_mode="+$("#payment_type").val()+"&total_invoice_value="+$("#total_invoice_value").val()+"&logistic_id="+$("#logistic_client_type").val()+"&partner_name1="+$("#package_type").val()+"&no_package="+$("#no_packge").val();
                    data1 += "&no_length1=" + no_length1 + "&no_width1=" + no_width1 + "&no_height1=" + no_height1 + "&no_weight1=" + no_weight1 + "&no_carrier1=" + no_carrier1+ "&no_quantity1=" + no_quantity1;


                    $.post("shipyaariWithPartnerId.php",data1,function(ty)
                    {
                        if($.trim(ty)=="N")
                        {
                            show_modal("Failed To Save")
                        }
                        else
                        {
                            $("#curier_package_modal").modal("hide");

                            $("#set_loc_form")[0].reset();
                            $("#logistic_order_form")[0].reset();
                            $("#curier_partener").show();
                            $("#currier_submit")[0].reset();
                            $("#append_table").html("");
                            get_location($("#typeid1").val())
                            //  show_modal("Order Assign Successfully ");
                            show_modal(ty)

                        }
                    });
                }
                return false;
            });


            $("#qty_fail").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".qty").hide();
                }else {


                    $(".qty").show();
                }






            });

            $("#stock").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".stock").hide();
                }else {


                    $(".stock").show();
                }






            });
            $("#set_loc_form").submit(function(){




                    if($("#logistic_client_type option:selected").text()=="shipyaari")
                    {
                        $("#set_location").modal("hide");
                        $("#myModal_order_avail").modal("show");

                        getShipyaariServiceData();

                    }
                    else {

                        show_modal("Sorry This Service not For This logistic Client.Will be Available Soon..")

                    }
                    return false;
                }

            );

            $("#main").submit(function () {
                get_location($("#typeid1").val())






                return false;

            });
////set material //



            function create_me(yt) {


                $("#tbd").html(" ");


                var   obj = JSON.parse(yt);


                datakk=new Array();





                for(var i = 0; i < obj.LIST.length; i++)
                {

                    datakk[i]=new Array();
                    datakk[i][0]=obj.LIST[i].item_code;
                    datakk[i][1]=obj.LIST[i].material_name;
                    datakk[i][2]=obj.LIST[i].unitOfMeasurement;
                    datakk[i][3]=obj.LIST[i].imageUrl;


                    if(datakk[i][3]==null || datakk[i][3]=="") {

                        $("#tbd").append("<tr><td class='item_image'><img src='no-image.jpg' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td></tr>");
                    }
                    else {


                        $("#tbd").append("<tr><td class='item_image'><img src='" + datakk[i][3] + "' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td></tr>");

                    }
                }
                //$('#tbd1').on( 'search.dt', function () { eventFired( 'Search' ); } ).on( 'page.dt',   function () { eventFired( 'Page' ); } ).dataTable();
            }
            //////set materail ends///

            $("#close").click(function () {

                if ($("#mes").html() == "Challan No. :" + $("#challan_no").val() + " Updated Successfully") {
                    location.reload();
                }
                $("#myModal12").hide();

            });


        });     ///



        function  show_modal(ac)
        {

            $("#show_mes").html("");

            /////////////////
            $("#show_mes").html(ac);

            $("#myModal0").modal({                    // wire up the actual modal functionality and show the dialog
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true                    // ensure the modal is shown immediately
            });



        }

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('#tbd tr').hide();
            $('#tbd tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });
        $('#filter1').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('#materail_at_location tr').hide();
            $('#materail_at_location tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });
        $("input[type='number']").on('focus', function (e) {
            $(this).on('mousewheel.disableScroll', function (e) {
                e.preventDefault();
            })
        }).on('blur', function (e) {
            $(this).off('mousewheel.disableScroll')
        });

    </script>

    <script type="text/javascript" src="js/bootstrap-toggle.min.js"></script>
    </body>

    </html>
    <?php
}
else
{




    echo "<script>window.location='index.php'</script>";
}
?><?php
/**
 * Created by JetBrains PhpStorm.
 * User: Resagit-2
 * Date: 22/3/16
 * Time: 6:22 PM
 * To change this template use File | Settings | File Templates.
 */