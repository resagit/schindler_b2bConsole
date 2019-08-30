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

        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />



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

        <script src="js/jquery.js"></script>


        <!--   <script src="vendors/jquery-1.9.1.js"></script>-->


        <script type="text/javascript">
            function get_sale_office() {

                $("#typeids").html(" ");
               // alert("cfg");
                var client_id=$("#typeid").val();
                query1 = {"client_Id": client_id};
                $.get("get_sale_office.php", query1, function (hd) {


                    var a = hd;
                    // alert(a);
                    if(a=='N')
                    {
                        $("#sales_off").html(" ");
                    }else {
                        set_sale_office(a);
                    }
                });

            }

            function set_sale_office(arr)
            {
                var obj = JSON.parse(arr);
                $("#typeids").html('');

                dataw = new Array();


                var sales_off = "";
                sales_off="<option value=''>Select Sales Office</option>";
                var out = new Array();
              
                for (var i = 0; i < obj.LIST.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.LIST[i].slaveID;
                    dataw[i][1] = obj.LIST[i].company_name;
                    

                    sales_off = sales_off + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";





                }
             
                $("#typeids").html(sales_off);

            }






            function order_type(de)
            {


                if(de=="ODT0000003")
                {


                    return "Inbound";

                }
                else if(de=="ODT0000004")
                {


                    return "Outbound";
                }
                else if(de=="ODT0000005")
                {



                    return "Return Inbound";
                }
                else if(de=="ODT0000006")
                {

                    return "Stock Transfer";

                }

            }




            function stock_id_check(x)
            {


                if(x=="400")
                {


                    return "ASN";

                }
                else if(x=="401")
                {


                    return "DSN";
                }else if(x=="402")
                {

                    return "Stock Tranfer";

                }
                else if(x=="411")
                {


                    return "Unload";
                }
                else if(x=="412")
                {


                    return "Quantity Check";
                }
                else if(x=="413")
                {


                    return "Quality Check";
                }
                else if(x=="414")
                {


                    return "Put Away";
                }
                else if(x=="415")
                {


                    return "Pick";
                }
                else if(x=="416")
                {


                    return "Pack";
                }
                else if(x=="417")
                {


                    return "Kitting";
                }

                else if(x=="418")
                {


                    return "Good Issue";
                }
                else if(x=="419")
                {


                    return "Good Delivered";
                }
                else if(x=="420")
                {


                    return "Stock Transfer Pick";
                }

                else if(x=="421")
                {


                    return "Stock Transfer Delivered";
                }
                else if(x=="444")
                {


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
                $.post("companylist.php","",function(hd)
                {//
                    // alert(hd)
                    // alert(hd+"mateirlal");


                    var a=hd;

                    setData(a);
                    ko =a;
           


                });




            }


            var datak;
            var levelOptions="";
            function setData(arr) {
                ///$("#typeid").html("");




                ko=arr;
                var   obj = JSON.parse(arr);


                datak=new Array();



                var levelOption="";
                var out=new Array();
                levelOptions="<option value=''>Select Compnay </option>";
                for(var i = 0; i < obj.LIST.length; i++) {

                    datak[i]=new Array();
                    datak[i][0]=obj.LIST[i].id;
                    datak[i][1]=obj.LIST[i].name;

                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";




                }

                $("#typeid").html(levelOptions);

                get_sale_office();
 
            }



            function shipper_change(arr) {
                $("#tbd1").html("");
                var ret="";
                drr={"warehouse_id":arr};
                if(arr=="All") {
                    $.get("get_all_warehouse.php", drr, function (tt) {
                        create_me(tt);
                    });
                }else {

                    $.get("get_warehouse.php", drr, function (ttt) {


                        if($.trim(ttt)=="N" || $.trim(ttt)=="")
                        {
                            show_modal("Sorry Data Is Not Available On this warehouse")
                        }else {
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

            function set_item_id(b)
            {

                $("#myModal_upload_image").modal('show');
                $("#item_id").val(b);
            }






            function set_items()
            {
                // $('#tokenfield-1').tokenfield('disable');
                $('#tokenfield-1').tokenfield('destroy');
                var choicess = new Array();
                var clin = $("#typeid").val();



                //alert(clin);
                var query = {"company_id": clin};

                $.post("get_material_list.php", query, function (iks) {

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
                    // alert(choices);

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



        </script>



    </head>
    <body class="bds" onload="load()" style="background-color: white" >


    <div id="myModal_images"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


        <div class="modal-dialog">


            <div class="modal-body" >
                <div class="col-lg-12">
                    <img src="loader1.gif" style="height: 500px;width: 550px;" class="img-thumbnail" id="changes_images">



                </div>
            </div>


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


   



    <!-- End Material edit modal-->
    <!--   Image Modal-->

    <div id="myModal_upload_image" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bulk Pack Size Upload</h4>
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
                    <div class="modal-footer"><center></center></div>
                </div>
            </form>
        </div>
    </div>






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
                             Bulk Pack Size File Upload
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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>&nbsp;&nbsp;&nbsp;Bulk Pack Size Details</h3>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-12"></div>
                                 <div class="col-lg-6">
                                  <form role="form" class="">

                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Company:</label>
                                    <select onchange="" id="typeid" class="form-control"></select>
                                    </div>
                                  </div>
                                  <!-- <div class="col-lg-6"> 
                                  <div class="form-group"><select id='typeids' class='form-control'></select>
                                  </div>
                                </div> -->
                                </form>
                                </div>

                                <center><a href="Bulk_PackSize_Upload.xlsx" download="Bulk_PackSize_Upload.xlsx"><br><br><button class="btn btn-primary"><i class="fa fa-download"></i> Download Bulk Pack Size File</button></a>&nbsp;&nbsp;&nbsp;<button data-toggle="modal" data-target="#myModal_upload_image" class="btn btn-default"><i  class="fa fa-upload"></i> Upload Excel File</button></center>
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
    <script src="js/fileinput.js" type="text/javascript"></script>


    <script type="text/javascript">
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            endDate: '+0d',
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });



    </script>


    <div id="myModal3" class="modal fade">
        <div class="modal-dialog" style="width: 85%;">
            <div class="modal-content">
                <!-- dialog body -->

                <div class="modal-header"><h4>Import Bulk Pack Size Files Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">


                        <div class="panel-body" style="overflow-y: auto;min-height:100px;max-height: 400px;" id="pastes">





                        </div><br>
                          </div>
                <!-- dialog buttons -->
                <div class="modal-footer"></div>
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

            $("#files").fileinput({



                allowedFileExtensions : ['xls', 'xlsx'],

                elErrorContainer: '#kv-error-4',
                //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                //AJAX
                //   dropZoneEnabled: t,
                //  uploadAsync: false,
                uploadUrl: "save_bulk_packsize.php" // your upload server url

            }).on('fileuploaded', function(evt,data,datas,tt){

                //alert(data.response.messages)
                if(data.response.messages!="Failed")
                {
                    $("#myModal_upload_image").modal("hide");
                   

                    $("#pastes").html(data.response.messages)
                    if($("#typeid").val()=="")
                    {
                        show_modal("Please Select Company.");
                        $("#myModal3").modal("hide");
                        return;
                    }
                    $("#myModal3").modal("show");

                    $("form").submit(function()
                    {


                        var datas=$(this).serialize();
                       // alert("comp: "+$("#typeids").val());
                        datas+="&compid="+$("#typeid").val();
                        $.get("send_packSize_file.php",datas,function(trr)
                        {

                                if($.trim(trr)=="Y")
                                {
                                $("#myModal3").modal("hide");
                                    show_modal("Pack Size Data Added Successfully");
                                    $("#myModal3").modal("hide");
                                    $('#files').fileinput('clear');


                                    $('#files').fileinput('enable').fileinput('disable');

                                }else if($.trim(trr)=="N")
                                {
                                    $("#myModal3").modal("hide");

                                    show_modal("Failed To Upload");
                                    $('#files').fileinput('clear');


                                    $('#files').fileinput('enable').fileinput('disable');

                                }
                                else {
                                    $("#myModal3").modal("hide");
                                    show_modal(trr);
                                    $('#files').fileinput('clear');


                                    $('#files').fileinput('enable').fileinput('disable');
                                }


                        });

                    return false;
                    });







                }
                else
                {

                    $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed</div>");

                }




            });

            /* End Here*/









            $(".dropdown").click(function()
            {


                $(this).parent().children("ul").slideToggle();



            });
            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();



            });

            //  $("#myModal_upload_image").modal('show');

            /* image upload*/






















            $("input[type=checkbox]").click(function()
            {

                var kl=$(this).attr('id');


                if($(this).prop("checked")==true)
                {


                    $("."+kl+"").hide();
                }else {


                    $("."+kl+"").show();
                }






            });










            $(".treeview").click(function()
            {


                $(this).find(".treeview-menu").slideToggle();


            });$("#change_password").submit(function()
            {
                $("#not_match").hide();
                if($("#new_pass").val()==$("#conf_pass").val()) {

                    $.get("change_password.php", $(this).serialize(), function (ert) {


                        if ($.trim(ert) == "N") {
                            $("#error").show();
                            $("#error").html("<div class='alert alert-danger'><strong>Warning!</strong>Sorry Password Can't Be Changed</div>")


                        }
                        else if ($.trim(ert) == "Y") {


                            $("#error").show();
                            $("#error").html("<div class='alert alert-success'><strong>Sucess!</strong>Password Sucessfully Changed</div>")
                            $("#change_password")[0].reset();
                            setTimeout(function(){
                                window.location='en/logout.php';},1200);
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



            $("#item_code").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".item_code").hide();
                }else {


                    $(".item_code").show();
                }






            });

            $("#material_name").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".material_name").hide();
                }else {


                    $(".material_name").show();
                }






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

            $("#outbound").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".outbound").hide();
                }else {


                    $(".outbound").show();
                }






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



            return false;

        });


        $("#close").click(function () {

            if ($("#mes").html() == "Challan No. :" + $("#challan_no").val() + " Updated Successfully") {
                location.reload();
            }
            $("#myModal12").hide();

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