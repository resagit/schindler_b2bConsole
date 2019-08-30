<?php

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['user_names']) && $_GET['cmp_id']!="")
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

        <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">
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


        </script>



    </head>
    <body class="bds"  style="background-color: white" >


    <div id="myModal_images"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


        <div class="modal-dialog">


            <div class="modal-body" >
                <div class="col-lg-12">
                    <img src="loader1.gif" style="height: 500px;width: 550px;" class="img-thumbnail" id="changes_images">



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
                            Create E-Commerce Order
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
                        <input type="hidden" name="invoice_file" id="invoice_file" value="">
                        <input type="hidden" name="company_id" id="company_id" value="<?php echo $_GET['cmp_id']?>">
                        <input type="hidden" name="challan_no" id="challan_no" value="<?php echo $_GET['challan_no']?>">
                        <div class="panel panel-green margin-bottom-40" style="border: 1px solid #00a0d2 ">
                            <div class="panel-heading" >
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Create User</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">


                                        <!---->
                                        <input type="hidden" name="companyId" id="cmpid">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Market Place</label>
                                            <select  class="form-control" name="market_place"  id="market_place"  >

                                                <option value="">Select</option>
                                                <option value="AMAZON">Amazon</option>
                                                <option value="ZEPO">Zepo</option>
                                                <option value="FLIPKART">Flipkart</option>
                                                <option value="PAYTM">Pay-tm</option>
                                                <option value="SNAPDEAL">Snapdeal</option>
                                                <option value="SHOPCLUES">Shopclues</option>
                                                <option value="CRAFTSVILLA">Craftsvilla</option>



                                                CRAFTSVILLA
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tracking Number</label>

                                            <input type="text"   required="" id="track_num" class="form-control"  placeholder="Tracking number" name="track_num">
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputPassword1">Market Place Order ID</label>

                                            <input type="text"  title="Name Only Characters Are Allowd" required="" id="market_order_id" class="form-control"  placeholder="Market Place Order ID" name="market_order_id">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Currier name</label>

                                            <input type="text"  title="Name Only Characters Are Allowd" required="" id="currier_name" class="form-control"  placeholder="Currier name" name="currier_name">
                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputPassword1">Pick-up Person Name</label>

                                            <input type="text"  required="" id="pick_person" class="form-control"  placeholder="Pick-up Person name" name="pick_person">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Pick-up Person Mobile No.</label>

                                            <input type="number"   required="" id="person_mob" class="form-control"  placeholder="Mobile" name="person_mob">
                                        </div>



                                        <!--  <div class="form-group">
                                              <label for="exampleInputPassword1">PinCode</label>
                                              <input type="number" onblur="get_pincode(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits"  class="form-control" required="" id="shipper_pincode" placeholder="Pincode" name="shipper_pincode">
                                          </div>-->

                                        <!-- <div class="form-group">
                                             <label for="exampleInputPassword1">Password</label>
                                             <input type="text"  class="form-control" required="" id="password" maxlength="12"  placeholder="Password" name="password">
                                         </div>-->

                                        <!-- <div class="form-group">
                                             <label for="exampleInputPassword1">State</label>
                                             <input type="text"  class="form-control" required="" id="shipper_state" readonly placeholder="State" name="shipper_state">
                                         </div>-->








                                        <center>
                                            <div class="col-lg-12"> <br><br><input type="submit" value="Save" class="btn btn-primary " style="width: 150px;"  id="mainss"></center></div>


                    </form>



                </div>


            </div>






























            <!-- /.row -->

            <!-- /.row -->



            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->

    <script src="js/fileinput.js" type="text/javascript"></script>


    <script type="text/javascript" src="js/bootstrapValidator.js"></script>










    <div id="myModal_upload_lr_image" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload E-commerce Order PDF File</h4>
                    </div>
                    <div class="modal-body">


                        <div class="container-fluid"><div class="row">



                                <div class="page-header">






                                    <form enctype="multipart/form-data" id="reset_path" >
                                        <label>File Type</label><select required onchange="check_file(this.value)" id="files_type" class="form-control"><option value="">Select</option><option value="packing_slip">Packing Slip</option><option value="invoice">Invoice</option><option value="manifest">Manifest</option><option value="state_form">State Form</option></select>
                                        <br>  <textarea class="form-control" placeholder="Description" id="descs" required title="Enter Description">--</textarea>

                                        <div id="kv-error-4"  style="">sdasdasd</div> <br>   <div id="kv-error-6"  style=""></div>
                                        <input type="submit" style="display: none" id="subs">

                                        <input id="files" name="files" type="file" multiple><br>

                                    </form>
                                    <hr>


                                </div>






                            </div>


                        </div>

                        <!-- dialog buttons --></div>
                    <div class="modal-footer"><center><a href="en/index.php"><button type="button" class="btn btn-default">Close</button</a></center></div>
                </div>
            </form>
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



    <script type="text/javascript">
        $(function() {

            set_menus('<?php echo $_SESSION['list']?>');


            /* End Here*/

            $('#main').bootstrapValidator({
                live: 'enabled',

                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {

                  var datas={  challan_no:$("#challan_no").val(),
                        cmp_id:$("#company_id").val(),
                        invoice_path:$("#invoice_file").val(),
                        tracking_id:$("#track_num").val(),
                        market_place_name:$("#market_place").val(),
                        market_place_order_id:$("#market_order_id").val(),
                        currier_partner_name:$("#currier_name").val(),
                        pick_up_person_name:$("#pick_person").val(),
                        pick_up_mob:$("#person_mob").val()};
                    $.post("updateMarketPlaceOrderWithoutImage.php",datas,function(ret_Data)
                    {
if($.trim(ret_Data)=="Y") {


    $("#myModal_upload_lr_image").modal("show");



}else if($.trim(ret_Data)=="N")
{
    show_modal("Failed To Save..")

}else
{

    show_modal(ret_Data);
}
                    });






                    return false;
                },
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    market_place: {
                        message: 'The Challan No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Please Select Market Place'
                            }

                        }
                    },
                    market_order_id: {
                        message: 'The Market Place Order ID is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Market Place Order ID is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 50,
                                message: 'Market Place Order ID  be more than 2 and less than 50 alphanumerics keyword'
                            },
                            regexp: {
                                regexp: /^[a-zA-z0-9-]+$/i,
                                message: 'The Market place user id  cannot be special character'
                            }

                        }
                    },
                    currier_name: {
                        message: 'The Currier name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Currier name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Currier name  more than 2 and less than 40 alphanumerics keyword'
                            },
                            regexp: {
                                regexp: /^[a-zA-z0-9- ]+$/i,
                                message: 'Currier name cannot be special character'
                            }

                        }
                    },
                    pick_person: {
                        message: 'The Pick-up Person is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Pick-up Person is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Pick-up Person  more than 2 and less than 40 alphanumerics keyword'
                            },
                            regexp: {
                                regexp: /^[a-zA-z ]+$/i,
                                message: 'Pick-up Person cannot be special character'
                            }

                        }
                    },
                    person_mob: {
                        message: 'The Pick-up Person Mobile number is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Pick-up Person Mobile number is required and cannot be empty'
                            },
                            stringLength: {
                                min: 9,
                                max: 12,
                                message: 'Pick-up Person Mobile number Must be 10 and less than 12 numbers'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'Pick-up Person Mobile number cannot be  characters'
                            }

                        }
                    }


                }


            });/*End Here*/


            $("#files").fileinput({



                allowedFileExtensions : ['pdf'],

                elErrorContainer: '#kv-error-4',
                //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                //AJAX
                //   dropZoneEnabled: t,
                //  uploadAsync: false,
                uploadUrl: "complete_ecommerce_order.php", // your upload server url
                uploadExtraData: function() {
                    return {
                        challan_no:$("#challan_no").val(),
                        cmp_id:$("#company_id").val(),
                        "file_types":$("#files_type").val(),
                        descriptions:$("#descs").val()

                    };
                }
            }).on('fileuploaded', function(evt,data,datas,tt){

                if(data.response.messages=="OK")
                {



                    $("#kv-error-6").html("<div class='alert alert-success'><strong>Success!</strong> Pdf Uploaded Succesfully</div>");
                    setTimeout(function()
                    {

                        $("#kv-error-6").html("");

                    },2500);
                  $("#descs").val("");
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
                if($("#files_type").val()=="" || $("#descs").val()=="") {
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

            /*packing slip*/







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




            $("#descs").keypress(function()
            {

               if($(this).val()!="")
               {


                   $('#files').fileinput('unlock');


                   $('#files').fileinput('unlock').fileinput('disable');
               }

            });

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
function check_file(a)
{


    if(a!="")
    {

        $('#files').fileinput('unlock');


        $('#files').fileinput('unlock').fileinput('disable');
    }
}
        function calears()
        {
            $("#reset_path")[0].reset();
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