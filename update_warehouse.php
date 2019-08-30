<?php

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['user_names']))
{


    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Cache-control" content="no-cache">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BMS Stock Report</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">


        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">


        <script type="text/javascript" src="side_menu.js"></script>

        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
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

        <script src="js/jquery-1.9.1.min.js"></script>


        <!--   <script src="vendors/jquery-1.9.1.js"></script>-->


        <script type="text/javascript">






            var ksp="";
            addeditems=[];
            var indexs;














            var ko="";

            function load()
            {

                set_menus('<?php echo $_SESSION['list']?>');

 get_warehouse_list();
            }








            ///Change Company

            function get_warehouse_list()
            {


                $("#tbd1").html("");

                $("#tbd1").html("<tr><td></td><td><img src='loader1.gif'></td><td></td></tr>")
                // queres={"userNumber":userNumber,"role":role};
                $.get("getWareHouseList.php","",function(hd)
                {


                    $("#tbd1").html("");

                    var   obj = JSON.parse(hd);
                    //   $("#typeid").html("");



                    datak=new Array();



                    var levelOption="";
                    var out=new Array();

                    for(var i = 0; i < obj.LIST.length; i++) {

                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].wareHouseID;
                        datak[i][1]=obj.LIST[i].wareHouseName;

                        $("#tbd1").append("<tr style='cursor: pointer' onclick='warehouse_change(this.id)' id='"+datak[i][0]+"'><td>"+datak[i][1]+"</td><td><button class='btn btn-default'>Edit</button></td><td></td><td></td><td></td><td></td></tr>")
                        //      $("#typeid").append("<option value='"+datak[i][0]+"'>"+ datak[i][1]+"</option>");
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        //   levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);



                    }


                });




            }





            ///End Here

            var $rows = $('#tabl_expr tr');
            $('#search_table').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });



            function warehouse_change(l)
            {


                var datas={"id":l};
                $.get("getWareHouseDetails.php",datas,function(data_rets)
                {

                    $("#edit_material").modal('show');
                    if($.trim(data_rets)=="N")
                    {

                        show_modal("No Data Available");
                        $("#update_material")[0].reset();


                    }


                    var   obj = JSON.parse(data_rets);
                    //   $("#typeid").html("");



                    var   datak=new Array();



                    var levelOption="";
                    var out=new Array();

                    for(var i = 0; i < obj.LIST.length; i++) {

                        datak[i] = new Array();
                        datak[i][0] = obj.LIST[i].wareHouseID;
                        datak[i][1] = obj.LIST[i].wareHouseName;
                        datak[i][2] = obj.LIST[i].contactPerson;
                        datak[i][3] = obj.LIST[i].contactNo;
                        datak[i][4] = obj.LIST[i].mobileNO;
                        datak[i][5] = obj.LIST[i].email;
                        datak[i][6] = obj.LIST[i].address1;
                        datak[i][7] = obj.LIST[i].address2;
                        datak[i][8] = obj.LIST[i].postcode;
                        datak[i][10] = obj.LIST[i].city;
                        datak[i][11] = obj.LIST[i].state;
                        datak[i][12] = obj.LIST[i].country;

                        $("#shipper__id").val(datak[i][0]);

                        $("#warehouse_name").val(datak[i][1]);
                        $("#contact_no").val(datak[i][3]);
                        $("#contact_person").val(datak[i][2]);
                        $("#mobileNo").val(datak[i][4]);
                        $("#pr_address").val(datak[i][6]);
                        $("#sec_address").val(datak[i][7]);
                        $("#postal_code").val(datak[i][8]);
                        $("#city").val(datak[i][10]);
                        $("#state").val(datak[i][11]);
                        $("#country").val(datak[i][12]);
                        $("#email").val(datak[i][5]);
                        //$("#country").val(datak[i][10]);

                    }
                });





            }




            function lookup(z)
            {

                dg={"pincode":z};
                $.get("pincode.php",dg,function(xs)
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

                data11=new Array();

                var out=new Array();

                for(var i = 0; i < obj2.ADD.length; i++) {

                    data11[i]=new Array();
                    data11[i][0]=obj2.ADD[i].districtname;
                    data11[i][1]=obj2.ADD[i].statename;

                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    //levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][0]+">" +data1[i][0]+ "</option>";

                    //alert(levelOption);



                }
                if(data11[0][1]!="")
                {
                    $("#city_contain").removeClass("has-error").addClass("has-success");

                    $("#city_contain").find("i").removeClass("glyphicon-remove").addClass("glyphicon-ok");

                    $("#city_contain").find("i").css("display","block");


                    $("#city_contain").find("small").remove();
                    $("#state_contain").removeClass("has-error").addClass("has-success");

                    $("#state_contain").find("i").removeClass("glyphicon-remove").addClass("glyphicon-ok");
                    $("#state_contain").find("small").remove();
                    $("#city").val(data11[0][0]);
                    document.getElementById('state').value=data11[0][1];
                }


            }
            function set_items()
            {



                change_company($("#typeid").val())
            }



        </script>



    </head>
    <body class="bds" onload="load()" style="background-color: white" >



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


    <!--Material edit modal-->



    <div id="edit_material" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="update_material" >

                <div class="modal-content">


                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Warehouse Details</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">














                            <div class="panel panel-green  margin-bottom-40" style="border: 1px solid #00a0d2;">
                                <div class="panel-heading" style="background-color: #00a0d2;">
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Update Warehouse Details</h3>
                                </div>
                                <div class="panel-body">


                                    <!--   <div class="form-group" id="shiper_select">
                                           <label for="exampleInputPassword1">Company Name</label><br>
                                           <select id="typeid"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="width: 300px" required="">

                                           </select>
                                       </div>-->
                                    <div class="container-fluid">
                                        <div class="row">
                                            <input type="hidden" value="" id="shipper__id" name="warehouse_id">
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">

                                                <div class="form-group">
                                                    <label >Warehouse name:</label>
                                                    <input type="text"  class="form-control" placeholder="Warehouse name" id="warehouse_name" name="warehouse_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Contact person.</label>
                                                    <input type="text"  class="form-control"  placeholder="Contact person" id="contact_person" name="contact_person">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Contact no.</label>
                                                    <input type="text"  class="form-control"  placeholder="Contact no" id="contact_no" name="contact_no">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" id="cos">
                                                    <label for="exampleInputPassword1">Mobile No.</label><br>
                                                    <input type="text" name="mobile_no" id="mobileNo" placeholder="CIN" class="form-control">
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Email ID</label>
                                                    <input type="email"   class="form-control"  placeholder="Email ID" id="email" name="email">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Address 1</label>
                                                    <input type="text"   class="form-control"  placeholder="Primary Address" id="pr_address" name="pr_address">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Address 2:</label>
                                                    <input type="text"   class="form-control"  placeholder="Secondary Address" id="sec_address" name="sec_address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Postal Code</label>
                                                    <input type="number"  class="form-control"  placeholder="Postal Code" id="postal_code" name="postal_code">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >State</label>
                                                    <input type="text" readonly  class="form-control" placeholder="State" id="state" name="state">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >City</label>
                                                    <input type="text"  class="form-control"  placeholder="City" id="city" name="city">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" >
                                                    <label for="exampleInputPassword1">Country</label><br>
                                                    <input type="text" name="country" id="country" placeholder="Country" class="form-control">
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


                        <!-- dialog buttons --></div>
                    <div class="modal-footer">   <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </form>
        </div>
    </div>




    <!-- End Material edit modal-->
    <!--   Image Modal-->







    <!--  End Here-->


    <div id="wrapper" >

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
                            Update Shipper Details
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








                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Company</h3>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-3"></div> <div class="col-lg-6"> <form id="search_company" role="form" class=""><div class="input-group"><select id="typeid" class="form-control"></select><span class="input-group-addon" onclick="set_items()" style="cursor: pointer">Search <i class="fa fa-search"> </i></span></div></form>


                                </div>


                            </div>
                        </div>
                    </div>









                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Material List</h3>
                        </div>

                        <div class="panel-body">
                            <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                            <!-- <div class="col-lg-2">
                                 <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
        --><!----> <form class="form-horizontal"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"> </i></span><input id="filter" style="text-transform: uppercase"  placeholder="Search Shipper" type="search" class="form-control"></div></form><br>

                            <!--  <table id="tabl_expr" class="table table-striped">-->
                            <table data-role="table" data-mode="columntoggle" class=" table table-striped" id="myTable" data-filter="true" data-input="#filterTable-input">
                                <thead>
                                <tr>
                                    <th class="warehouse_name">Shipper Name</th>

                                    <th class="action">Action</th>
                                    <th class="e">&nbsp;</th>
                                    <th class="e">&nbsp;</th>
                                    <th class="e">&nbsp;</th>
                                    <th class="e">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody id="tbd1">

                                </tbody>
                            </table>


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

        <!-- jQuery -->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->



        <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>


        <script src="js/fileinput.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/bootstrapValidator.js"></script>

        <script type="text/javascript">
            $('.form_date').datetimepicker({
                language:  'fr',
                weekStart: 1,
                todayBtn:  1,
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

                    <div class="modal-header"><h4>Inbound Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body">

                        <div id="show_mesg" style="height:500px;overflow-y: scroll">



                            <table id="inbound_tables"  class="table table-striped table-bordered table-hover">

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

                        <i class="fa fa-file-excel-o fa-2x pull-right" ><a class="" style="font-size: 18px;" id="inbound_export" href="javascript:void(0)">Export</a></i><br>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button></div>
                </div>
            </div>
        </div>






        <div id="myModal4" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->

                    <div class="modal-header"><h4>Outbound Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body">

                        <div id="show_mesg" style="height:500px;overflow-y: scroll">



                            <table id="outbound_tables"  class="table table-striped table-bordered table-hover">

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
                                <tr><td>No Data Available</td></tr>
                                </tbody>
                            </table>




                        </div>

                        <i class="fa fa-file-excel-o fa-2x pull-right" ><a class="" style="font-size: 18px;" id="outbound_export" href="javascript:void(0)">Export</a></i><br>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button></div>
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

                //  $("#myModal_upload_image").modal('show');

                /* image upload*/

                $(".dropdown").click(function()
                {


                    $(this).parent().children("ul").slideToggle();



                });
                $(".sub-dropdown").click(function()
                {
                    $(this).parent().slideDown();
                    $(this).children().parent().find("ul").slideToggle();



                });
                $("#postal_code").keyup(function () {


                    if ($(this).val().length == 6) {


                        lookup($(this).val());
                    }


                });


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
                $('#filter').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('#tbd1 tr').hide();
                    $('#tbd1 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                });


                $("#item_code").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".item_code").hide();
                    } else {


                        $(".item_code").show();
                    }


                });

                $("#material_name").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".material_name").hide();
                    } else {


                        $(".material_name").show();
                    }


                });


                $("#inbound").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".inbound").hide();
                    } else {


                        $(".inbound").show();
                    }


                });

                $("#outbound").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".outbound").hide();
                    } else {


                        $(".outbound").show();
                    }


                });


                $("#qty_fail").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".qty").hide();
                    } else {


                        $(".qty").show();
                    }


                });

                $("#stock").click(function () {


                    if ($(this).prop("checked") == true) {


                        $(".stock").hide();
                    } else {


                        $(".stock").show();
                    }


                });
                /*fields validation on update marterial*/
                $('#update_material').bootstrapValidator({
                    live: 'enabled',

                    submitButton: '$form_unloading button[type="submit"]',
                    submitHandler: function (validator, form, submitButton) {
                        if($("#state").val()!="" && $("#city").val()!="") {

                            $("#edit_material").modal("hide");
                            show_modal("<img src='loader1.gif'>");
                            $.post("updateWareHouseDetails.php", $("#update_material").serialize(), function (grt) {

                                if ($.trim(grt) == "Y") {


                                    show_modal("Shipper Updated Successfully");
                                    $("#update_material").bootstrapValidator('resetForm', true);
                                }
                                else if ($.trim(grt) == "N") {


                                    show_modal("Failed To Update..")
                                }
                                else {


                                    show_modal("Failed To Update");
                                }


                            });

                        }else {


                            show_modal("State and City is Required")
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
                        warehouse_name: {
                            message: 'Shipper name is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Shipper name is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 40,
                                    message: 'Shipper name be more than 1 and less than 40 characters'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9. ]+$/i,
                                    message: 'Shipper name cannot be special character'
                                }

                            }
                        },
                        contact_no: {
                            message: ' Mobile no  is not valid',
                            validators: {
                                notEmpty: {
                                    message: ' Mobile no.  is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 150,
                                    message: ' Mobile no. should be atleast of 10 digits '
                                },
                                regexp: {
                                    regexp: /^[0-9. ]+$/i,
                                    message: 'Mobile no cannot be  character only number'
                                }


                            }
                        },
                        mobile_no: {
                            message: ' Mobile no  is not valid',
                            validators: {
                                notEmpty: {
                                    message: ' Mobile no.  is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 150,
                                    message: ' Mobile no. should be atleast of 10 digits '
                                },
                                regexp: {
                                    regexp: /^[0-9. ]+$/i,
                                    message: 'Mobile no cannot be  character only number'
                                }


                            }
                        },
                        pr_address: {
                            message: 'Address 1 is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Address 1 is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 200,
                                    message: ' Address 1 be more than 1 and less than 200 characters'
                                }


                            }
                        },
                        contact_person: {
                            message: 'Contact name is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Contact name is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 100,
                                    message: 'Contact name be more than 1 and less than 100 characters'
                                }


                            }
                        },
                        sec_address: {
                            message: 'Address 2 is not valid',
                            validators: {
                                notEmpty: {
                                    message: ' Address 2 is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 200,
                                    message: 'Address 2 be more than 1 and less than 200 characters'
                                }


                            }
                        },
                        postal_code: {
                            message: 'pincode is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'pincode is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 6,
                                    message: 'Pincode 6 digits required'
                                }


                            }
                        },


                        country: {
                            message: 'The Country is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Country is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 100,
                                    message: 'The Country be more than 2 and less than 100 characters'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]+$/i,
                                    message: 'Country name Cannot be special characters'
                                }

                            }
                        },
                        email: {
                            validators: {
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        }




                    }

                });



                //    alert(main_date);
                //  alert(getfuldate($("#dates").val()));
                ///  alert($("#dates").val());

                //  var dt = $("#dates").val();
                //var main_date = getfuldate(dt);
                //alert(main_date);


                $("#close").click(function () {

                    if ($("#mes").html() == "Challan No. :" + $("#challan_no").val() + " Updated Successfully") {
                        location.reload();
                    }
                    $("#myModal12").hide();

                });
            });

            ///



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

        </script>

    </body>

    </html>
    <?php
}
else
{




    echo "<script>window.location='index.php'</script>";
}
?>