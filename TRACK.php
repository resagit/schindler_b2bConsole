<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset( $_SESSION['user_names']))
{


    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

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
        <link href="loader/jquery-spin.css" rel="stylesheet" type="text/css">
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


        </style>

        <script type="text/javascript" src="js/company_details.js"></script>
        <script type="text/javascript">

function load()
{



    set_menus('<?php echo $_SESSION['list']?>');

    $.post("companyListForReport.php","",function(ty)
    {

        var option="<option value=''>Select Company</option>";
        var obj=JSON.parse(ty);
        var data_aaray=new Array();
        for(var i=0;i<obj.LIST.length;i++)
        {data_aaray[i]=new  Array();
            data_aaray[i][0]=obj.LIST[i].clientID;
            data_aaray[i][1]=obj.LIST[i].company_name;
            option+="<option value='"+data_aaray[i][0]+"'>"+data_aaray[i][1]+"</option>";
        }
        $("#main_company_id").html(option);})
}
function call_header(cmp_id)
{
    $("#append_cmp").html("<img src='loader1.gif'>");
    set_company1(cmp_id)



}




            /////                                   <----------- End Here    ----------->>>>>


            ///ASN Click Fired
            function send_data(a,b,c)
            {

                $("#myModal55").modal('hide');
                $("#myModal").modal('hide');
                $("#myModal1").modal('show');

                $("#modal_asn").html("<center><img src='loader1.gif'></center>");

                query={"challan_no":a,"order_id":b};
                $.get("allAsnchalanAndItemDetail.php",query,function(er){
//alert(er+"send_data");
                    var   objm = "";
                    $("#modal_asn").html("");
                    if($.trim(er)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objm=JSON.parse(er)
                    }


                    datakt=new Array();
 var data_notes=new Array();

                    datamt=new Array();

                    for(var i = 0; i < objm.COMPANY.length; i++) {

                        datakt[i] = new Array();
                        datakt[i][0] = objm.COMPANY[i].companyName;
                        datakt[i][1] = objm.COMPANY[i].tinNo;
                        datakt[i][2] = objm.COMPANY[i].cinNo;

                        datakt[i][3] = objm.COMPANY[i].companyRefPerson;
                        datakt[i][4] = objm.COMPANY[i].companyRefPersonNo;
                        datakt[i][5] = objm.COMPANY[i].careOfName;
                        datakt[i][6] = objm.COMPANY[i].careOfAddress;

                        datakt[i][7] = objm.COMPANY[i].consignneeName;
                        datakt[i][8] = objm.COMPANY[i].consigneeAddress;
                        datakt[i][9] = objm.COMPANY[i].conContactName;
                        datakt[i][10] = objm.COMPANY[i].conContactNo;
                        datakt[i][11] = objm.COMPANY[i].toCompany;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+a+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+c+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#00881'>"+datakt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='00881' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Cin No</th> <th>Tin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][5]+"</td><td>"+datakt[i][6]+"</td><td>"+datakt[i][2]+"</td><td>"+datakt[i][1]+"</td><td>"+datakt[i][3]+"</td><td>"+datakt[i][4]+"</td></tr> </tbody> </table></div></div></div>");

                       if(datakt[i][7]==null) {
                           $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#'>" + datakt[i][11] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Reference Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + datakt[i][9] + "</td><td>" + datakt[i][8] + "</td><td>" + datakt[i][10] + "</td></tr> </tbody> </table></div></div></div>");
                       }else {
                           $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>" + datakt[i][7] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + datakt[i][9] + "</td><td>" + datakt[i][8] + "</td><td>" + datakt[i][10] + "</td></tr> </tbody> </table></div></div></div>");

                       }
                    }


                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objm.NOTES[p].description;
                        data_notes[p][1] = objm.NOTES[p].timestamp;
                        data_notes[p][2] = objm.NOTES[p].statusName;
                        data_notes[p][3] = objm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }




                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th><th>Bom Code</th><th>Bom Descriptions</th><th>Bom Quantity</th></tr> </thead> <tbody id='send_datas_append'></tbody></table>");


                    for(var j = 0; j < objm.ITEM.length; j++) {

                        datamt[j] = new Array();
                        datamt[j][0] = objm.ITEM[j].item_code;
                        datamt[j][1] = objm.ITEM[j].material_name;
                        datamt[j][2] = objm.ITEM[j].order_quantity;
                        datamt[j][3] = objm.ITEM[j].per_unit_price;
                        datamt[j][4] = objm.ITEM[j].unitOfMeasurement;
                        datamt[j][5] = objm.ITEM[j].receiver_id;
                        datamt[j][6] = objm.ITEM[j].vehicle_no;
                        datamt[j][7] = objm.ITEM[j].transport_vendor_id;
                        datamt[j][8] = objm.ITEM[j].quantity;

                        datamt[j][9] = objm.ITEM[j].driver_mobile_no;
                        datamt[j][10] = objm.ITEM[j].unitOfMeasurement;

                        datamt[j][11] = objm.ITEM[j].total_weight;
                        datamt[j][12] = objm.ITEM[j].old_order_quantity;
                        datamt[j][13] = objm.ITEM[j].isMarketPlaceOrder;
                        datamt[j][14] = objm.ITEM[j].courierPartnerName;
                        datamt[j][15] = objm.ITEM[j].marketPlaceName;
                        datamt[j][16] = objm.ITEM[j].marketPlaceOrderID;
                        datamt[j][17] = objm.ITEM[j].pickUpPersonName;
                        datamt[j][18] = objm.ITEM[j].pickUpPersonMobNO;
                        datamt[j][19] = objm.ITEM[j].lr_total_box;
                        datamt[j][20] = objm.ITEM[j].driver_name;
                        datamt[j][21] = objm.ITEM[j].dateOfDelivery;
                        datamt[j][22] = objm.ITEM[j].bomCode;
                        datamt[j][23] = objm.ITEM[j].bomName;
                        datamt[j][24] = objm.ITEM[j].bom_quantity;
                        datamt[j][25] = objm.ITEM[j].total_price;


//                        if(datamt[j][13]!==0) {
//
//
//                            $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0082'>E-COMMERCE Detail</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0082' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Courier Partner Name</th><th>Market Place Name</th> <th>Market Place OrderID</th><th>PickUp Person Name</th> <th>PickUp Person Mobile No</th></tr> </thead> <tbody ><tr><td>" + datamt[j][14] + "</td><td>" + datamt[j][15] + "</td><td>" + datamt[j][16] + "</td><td>" + datamt[j][17] + "</td><td>" + datamt[j][18] + "</td></tr> </tbody> </table></div></div></div>");
//                        }else {
//
//                            $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0092'>LLR Detail</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0092' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Vehicle No</th><th>Transport Name</th> <th>Driver Mobile No</th> <th>Good Issue Date</th><th>Driver Name</th> </tr> </thead> <tbody ><tr><td>" + datamt[j][6] + "</td><td>" + datamt[j][7] + "</td><td>" +datamt[j][9] + "</td><td>" +datamt[j][21] + "</td><td>" +datamt[j][20] + "</td></tr> </tbody> </table></div></div></div>");
//
//                        }
                       // alert();


                        $("#send_datas_append").append("<tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][25]+"</td><td>"+datamt[j][22]+"</td><td>"+datamt[j][23]+"</td><td>"+datamt[j][24]+"</td></tr>");

                    }
                });


            }


function return_send_data(a,b,c)
{
    //alert()

    $("#myModal55").modal('hide');
    $("#myModal").modal('hide');
    $("#myModal1").modal('show');

    $("#modal_asn").html("<center><img src='loader1.gif'></center>");

    query={"challan_no":a,"order_id":b};
    $.get("return_inbound_challan_detail.php",query,function(er){
//alert(er+"return inbound");
        var   objm = "";
        $("#modal_asn").html("");
        if($.trim(er)=="N")
        {

            show_modal("Sorry Data Cannot Find")

        }
        else
        {


            objm=JSON.parse(er)
        }


        datakt=new Array();
        var data_notes=new Array();

        datamt=new Array();

        for(var i = 0; i < objm.COMPANY.length; i++) {

            datakt[i] = new Array();
            datakt[i][0] = objm.COMPANY[i].companyName;
            datakt[i][1] = objm.COMPANY[i].tinNo;
            datakt[i][2] = objm.COMPANY[i].cinNo;

            datakt[i][3] = objm.COMPANY[i].companyRefPerson;
            datakt[i][4] = objm.COMPANY[i].companyRefPersonNo;
            datakt[i][5] = objm.COMPANY[i].careOfName;
            datakt[i][6] = objm.COMPANY[i].careOfAddress;

            datakt[i][7] = objm.COMPANY[i].consignneeName;
            datakt[i][8] = objm.COMPANY[i].consigneeAddress;
            datakt[i][9] = objm.COMPANY[i].conContactName;
            datakt[i][10] = objm.COMPANY[i].conContactNo;
            datakt[i][11] = objm.COMPANY[i].toCompany;
            $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+a+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+c+"</label></div><br><br>");

            $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#00881'>"+datakt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='00881' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Cin No</th> <th>Tin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][5]+"</td><td>"+datakt[i][6]+"</td><td>"+datakt[i][2]+"</td><td>"+datakt[i][1]+"</td><td>"+datakt[i][3]+"</td><td>"+datakt[i][4]+"</td></tr> </tbody> </table></div></div></div>");

            if(datakt[i][7]==null) {
                $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#'>" + datakt[i][11] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + datakt[i][9] + "</td><td>" + datakt[i][8] + "</td><td>" + datakt[i][10] + "</td></tr> </tbody> </table></div></div></div>");
            }else {
                $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>" + datakt[i][7] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + datakt[i][9] + "</td><td>" + datakt[i][8] + "</td><td>" + datakt[i][10] + "</td></tr> </tbody> </table></div></div></div>");

            }
        }


        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






        for(var p = 0; p < objm.NOTES.length; p++) {

            data_notes[p] = new Array();
            data_notes[p][0] = objm.NOTES[p].description;
            data_notes[p][1] = objm.NOTES[p].timestamp;
            data_notes[p][2] = objm.NOTES[p].statusName;
            data_notes[p][3] = objm.NOTES[p].createdBy;




            $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
        }






        for(var j = 0; j < objm.ITEM.length; j++) {

            datamt[j] = new Array();
            datamt[j][0] = objm.ITEM[j].item_code;
            datamt[j][1] = objm.ITEM[j].material_name;
            datamt[j][2] = objm.ITEM[j].order_quantity;
            datamt[j][3] = objm.ITEM[j].per_unit_price;
            datamt[j][4] = objm.ITEM[j].unitOfMeasurement;
            datamt[j][5] = objm.ITEM[j].receiver_id;
            datamt[j][6] = objm.ITEM[j].vehicle_no;
            datamt[j][7] = objm.ITEM[j].transport_vendor_id;
            datamt[j][8] = objm.ITEM[j].quantity;

            datamt[j][9] = objm.ITEM[j].driver_mobile_no;
            datamt[j][10] = objm.ITEM[j].unitOfMeasurement;

            datamt[j][11] = objm.ITEM[j].total_weight;
            datamt[j][12] = objm.ITEM[j].old_order_quantity;
            datamt[j][13] = objm.ITEM[j].isMarketPlaceOrder;
            datamt[j][14] = objm.ITEM[j].courierPartnerName;
            datamt[j][15] = objm.ITEM[j].marketPlaceName;
            datamt[j][16] = objm.ITEM[j].marketPlaceOrderID;
            datamt[j][17] = objm.ITEM[j].pickUpPersonName;
            datamt[j][18] = objm.ITEM[j].pickUpPersonMobNO;
            datamt[j][19] = objm.ITEM[j].lr_total_box;
            datamt[j][20] = objm.ITEM[j].driver_name;
            datamt[j][21] = objm.ITEM[j].dateOfDelivery;
            datamt[j][22] = objm.ITEM[j].bomCode;
            datamt[j][23] = objm.ITEM[j].bomName;
            datamt[j][24] = objm.ITEM[j].bom_quantity;


//            if(datamt[j][13]!==0) {
//
//
//                $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0082'>E-COMMERCE Detail</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0082' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Courier Partner Name</th><th>Market Place Name</th> <th>Market Place OrderID</th><th>PickUp Person Name</th> <th>PickUp Person Mobile No</th></tr> </thead> <tbody ><tr><td>" + datamt[j][14] + "</td><td>" + datamt[j][15] + "</td><td>" + datamt[j][16] + "</td><td>" + datamt[j][17] + "</td><td>" + datamt[j][18] + "</td></tr> </tbody> </table></div></div></div>");
//            }else {
//
//                $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0092'>LLR Detail</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0092' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Vehicle No</th><th>Transport Name</th> <th>Driver Mobile No</th> <th>Good Issue Date</th><th>Driver Name</th> </tr> </thead> <tbody ><tr><td>" + datamt[j][6] + "</td><td>" + datamt[j][7] + "</td><td>" +datamt[j][9] + "</td><td>" +datamt[j][21] + "</td><td>" +datamt[j][20] + "</td></tr> </tbody> </table></div></div></div>");
//
//            }
            $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th><th>Bom COde</th><th>Bom Descriptions</th><th>Bom Quantity</th></tr> </thead> <tbody id='send_datas_append'></tbody></table>");
if(datamt[j][22]==null)
{
    $("#send_datas_append").append("<tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][5]+"</td><td>--</td><td>--</td><td>--</td></tr>");

}
else
{
    $("#send_datas_append").append("<tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][5]+"</td><td>"+datamt[j][22]+"</td><td>"+datamt[j][23]+"</td><td>"+datamt[j][24]+"</td></tr>");

}

        }
    });


}



            /// inbound deliver inbound and quantity Check

            function send_delivery(x,y,z)
            {
                $("#myModal").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");

                qre={"challan_no":x,"order_id":y};
                $.get("send_delivery.php",qre,function(mk)
                {
//alert(mk+"send")
                    var   objmm= "";
                    $("#modal_asn").html("");
                    if($.trim(mk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmm=JSON.parse(mk)
                    }

                    // alert(mk);
                    dataktt=new Array();

    var data_notes=new Array();
                    datamtt=new Array();

                    for(var i = 0; i < objmm.COMPANY.length; i++) {

                        dataktt[i] = new Array();
                        dataktt[i][0] = objmm.COMPANY[i].companyName;
                        dataktt[i][1] = objmm.COMPANY[i].tinNo;
                        dataktt[i][2] = objmm.COMPANY[i].cinNo;

                        dataktt[i][3] = objmm.COMPANY[i].companyRefPerson;
                        dataktt[i][4] = objmm.COMPANY[i].companyRefPersonNo;
                        dataktt[i][5] = objmm.COMPANY[i].careOfName;
                        dataktt[i][6] = objmm.COMPANY[i].careOfAddress;

                        dataktt[i][7] = objmm.COMPANY[i].consignneeName;
                        dataktt[i][8] = objmm.COMPANY[i].consigneeAddress;
                        dataktt[i][9] = objmm.COMPANY[i].conContactName;
                        dataktt[i][10] = objmm.COMPANY[i].conContactNo;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+x+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+z+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#003'>"+dataktt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='003' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktt[i][5]+"</td><td>"+dataktt[i][6]+"</td><td>"+dataktt[i][1]+"</td><td>"+dataktt[i][2]+"</td><td>"+dataktt[i][3]+"</td><td>"+dataktt[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#004'>"+dataktt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='004' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktt[i][9]+"</td><td>"+dataktt[i][8]+"</td><td>"+dataktt[i][10]+"</td></tr> </tbody> </table></div></div></div>");

                    }

                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmm.NOTES[p].description;
                        data_notes[p][1] = objmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmm.NOTES[p].statusName;
                        data_notes[p][3] = objmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }





                    $("#modal_asn").append(" <table class='table table-striped'> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Inbound Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th><th>Remark</th><th>Bom Code</th><th>Bom Descriptions</th><th>Bom Quantity</th></tr> </thead> <tbody id='send_delivery_appends'></tbody></table>");
                    for(var j = 0; j < objmm.ITEM.length; j++) {

                        datamtt[j] = new Array();
                        datamtt[j][0] = objmm.ITEM[j].item_code;
                        datamtt[j][1] = objmm.ITEM[j].material_name;
                        datamtt[j][2] = objmm.ITEM[j].order_quantity;
                        datamtt[j][3] = objmm.ITEM[j].per_unit_price;
                        datamtt[j][4] = objmm.ITEM[j].unitOfMeasurement;
                        datamtt[j][5] = objmm.ITEM[j].total_price;
                        datamtt[j][6] = objmm.ITEM[j].remark;
                        datamtt[j][7] = objmm.ITEM[j].received_quantity;
                        datamtt[j][8] = objmm.ITEM[j].bomCode;
                        datamtt[j][9] = objmm.ITEM[j].bomName;
                        datamtt[j][10] = objmm.ITEM[j].bom_quantity;
                        if(datamtt[j][8]==null)
                        {
                            $("#send_delivery_appends").append("<tr><td>"+datamtt[j][0]+"</td><td>"+datamtt[j][1]+"</td><td>"+datamtt[j][2]+"</td><td>"+datamtt[j][7]+"</td><td>"+datamtt[j][3]+"</td><td>"+datamtt[j][4]+"</td><td>"+datamtt[j][5]+"</td><td>"+datamtt[j][6]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                        else
                        {
                            $("#send_delivery_appends").append("<tr><td>"+datamtt[j][0]+"</td><td>"+datamtt[j][1]+"</td><td>"+datamtt[j][2]+"</td><td>"+datamtt[j][7]+"</td><td>"+datamtt[j][3]+"</td><td>"+datamtt[j][4]+"</td><td>"+datamtt[j][5]+"</td><td>"+datamtt[j][6]+"</td><td>"+datamtt[j][8]+"</td><td>"+datamtt[j][9]+"</td><td>"+datamtt[j][10]+"</td></tr>");
                        }


                    }
                });
            }

            /// Quantity Check




            function send_check(m,n,o)
            {
                $("#myModal").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                //  alert(n);
                qres={"challan_no":m,"order_id":n};
                $.get("send_qc.php",qres,function(mkk)
                {

                    var   objmmm= "";
                    $("#modal_asn").html("");
                    if($.trim(mkk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmmm=JSON.parse(mkk)
                    }

                    //  alert(mkk);
                    datakttt=new Array();

  var data_notes=new Array();
                    datamttt=new Array();

                    for(var i = 0; i < objmmm.COMPANY.length; i++) {

                        datakttt[i] = new Array();
                        datakttt[i][0] = objmmm.COMPANY[i].company_name;

                        datakttt[i][1] = objmmm.COMPANY[i].name;
                        datakttt[i][2] = objmmm.COMPANY[i].chalan_date;
                        datakttt[i][3] = objmmm.COMPANY[i].chalan_no;
                        datakttt[i][4] = objmmm.COMPANY[i].asnDate;
                        datakttt[i][5] = objmmm.COMPANY[i].receivedBy;

                        datakttt[i][6] = objmmm.COMPANY[i].qcDate;
                        datakttt[i][7] = objmmm.COMPANY[i].total;
                        datakttt[i][8] = objmmm.COMPANY[i].passed;
                        datakttt[i][9] = objmmm.COMPANY[i].fail;
                        //   alert(datakttt[i][5]);
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+m+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+o+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#005'>"+datakttt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='005' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>Co name</th><th>Challan Date</th> <th>Challan No.</th> <th>ASN Date</th><th>Received By</th> <th>Quality Check Date</th><th>Total</th><th>Passed</th><th>Fail</th> </tr> </thead> <tbody ><tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][3]+"</td><td>"+datakttt[i][4]+"</td><td>"+datakttt[i][5]+"</td><td>"+datakttt[i][6]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][8]+"</td><td>"+datakttt[i][9]+"</td></tr> </tbody> </table></div></div></div>");


                    }

                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objmmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmmm.NOTES[p].description;
                        data_notes[p][1] = objmmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmmm.NOTES[p].statusName;
                        data_notes[p][3] = objmmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }




                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Received Quantity</th><th>UOM</th><th>Passed</th><th>Fail</th> <th>Remark</th></tr> </thead> <tbody id='send_check_append' ></tbody></table>");
                    for(var j = 0; j < objmmm.ITEM.length; j++) {

                        datamttt[j] = new Array();
                        datamttt[j][0] = objmmm.ITEM[j].item_code;
                        datamttt[j][1] = objmmm.ITEM[j].material_name;
                        datamttt[j][2] = objmmm.ITEM[j].order_quantity;
                        datamttt[j][3] = objmmm.ITEM[j].received_quantity;
                        datamttt[j][4] = objmmm.ITEM[j].unitOfMeasurement;
                        datamttt[j][5] = objmmm.ITEM[j].passed;
                        datamttt[j][6] = objmmm.ITEM[j].fail;
                        datamttt[j][7] = objmmm.ITEM[j].remark;
                        $("#send_check_append").append("<tr><td>"+datamttt[j][0]+"</td><td>"+datamttt[j][1]+"</td><td>"+datamttt[j][2]+"</td><td>"+datamttt[j][3]+"</td><td>"+datamttt[j][4]+"</td><td>"+datamttt[j][5]+"</td><td>"+datamttt[j][6]+"</td><td>"+datamttt[j][7]+"</td></tr>");

                    }
                });

            }
            ////Delivery step 4


            function send_goods(e,f,g)
            {
                $("#myModal").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                //  alert(e);
                qress={"challan_no":e,"order_id":f};
                $.get("send_goods.php",qress,function(mkkk)
                {

                    var   objmmm= "";
                    $("#modal_asn").html("");
                    if($.trim(mkkk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmmm=JSON.parse(mkkk)
                    }

                    //   alert(mkkk);
                    dataktttt=new Array();
  var data_notes=new Array();

                    datamtttt=new Array();

                    for(var i = 0; i < objmmm.COMPANY.length; i++) {
                        dataktttt[i] = new Array();
                        dataktttt[i][0] = objmmm.COMPANY[i].companyName;
                        dataktttt[i][1] = objmmm.COMPANY[i].tinNo;
                        dataktttt[i][2] = objmmm.COMPANY[i].cinNo;

                        dataktttt[i][3] = objmmm.COMPANY[i].companyRefPerson;
                        dataktttt[i][4] = objmmm.COMPANY[i].companyRefPersonNo;
                        dataktttt[i][5] = objmmm.COMPANY[i].careOfName;
                        dataktttt[i][6] = objmmm.COMPANY[i].careOfAddress;

                        dataktttt[i][7] = objmmm.COMPANY[i].consignneeName;
                        dataktttt[i][8] = objmmm.COMPANY[i].consigneeAddress;
                        dataktttt[i][9] = objmmm.COMPANY[i].conContactName;
                        dataktttt[i][10] = objmmm.COMPANY[i].conContactNo;
                        dataktttt[i][11] = objmmm.COMPANY[i].toCompany;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+e+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+g+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#007'>"+dataktttt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='007' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Cin No</th> <th>Tin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktttt[i][5]+"</td><td>"+dataktttt[i][6]+"</td><td>"+dataktttt[i][2]+"</td><td>"+dataktttt[i][1]+"</td><td>"+dataktttt[i][3]+"</td><td>"+dataktttt[i][4]+"</td></tr> </tbody> </table></div></div></div>");

                       if(dataktttt[i][7]==null)
                       {
                           $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#'>" + dataktttt[i][11] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='008' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Refrence Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + dataktttt[i][9] + "</td><td>" + dataktttt[i][8] + "</td><td>" + dataktttt[i][10] + "</td></tr> </tbody> </table></div></div></div>");
                       }else {

                           $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#008'>" + dataktttt[i][7] + "</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='008' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Refrence Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>" + dataktttt[i][9] + "</td><td>" + dataktttt[i][8] + "</td><td>" + dataktttt[i][10] + "</td></tr> </tbody> </table></div></div></div>");
                       }
                    }




                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objmmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmmm.NOTES[p].description;
                        data_notes[p][1] = objmmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmmm.NOTES[p].statusName;
                        data_notes[p][3] = objmmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }
                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th><th>Bom Code</th><th>Bom Descriptions</th><th>Bom quantity</th></tr> </thead> <tbody id='send_goods_append'></tbody></table>");
                    for(var j = 0; j < objmmm.ITEM.length; j++) {

                        datamtttt[j] = new Array();
                        datamtttt[j][0] = objmmm.ITEM[j].item_code;
                        datamtttt[j][1] = objmmm.ITEM[j].material_name;
                        datamtttt[j][2] = objmmm.ITEM[j].order_quantity;
                        datamtttt[j][3] = objmmm.ITEM[j].per_unit_price;
                        datamtttt[j][4] = objmmm.ITEM[j].unitOfMeasurement;
                        datamtttt[j][5] = objmmm.ITEM[j].total_price;
                        datamtttt[j][6] = objmmm.ITEM[j].bomCode;
                        datamtttt[j][7] = objmmm.ITEM[j].bomName;
                        datamtttt[j][8] = objmmm.ITEM[j].bom_quantity;
                        if(datamtttt[j][6]==null)
                        {
                            $("#send_goods_append").append(" <tr><td>"+datamtttt[j][0]+"</td><td>"+datamtttt[j][1]+"</td><td>"+datamtttt[j][2]+"</td><td>"+datamtttt[j][3]+"</td><td>"+datamtttt[j][4]+"</td><td>"+datamtttt[j][5]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                        else
                        {
                            $("#send_goods_append").append(" <tr><td>"+datamtttt[j][0]+"</td><td>"+datamtttt[j][1]+"</td><td>"+datamtttt[j][2]+"</td><td>"+datamtttt[j][3]+"</td><td>"+datamtttt[j][4]+"</td><td>"+datamtttt[j][5]+"</td><td>"+datamtttt[j][6]+"</td><td>"+datamtttt[j][7]+"</td><td>"+datamtttt[j][8]+"</td></tr>");
                        }


                    }
                });
            }





            ///// outbound  Dispatch Advice

/*


            function send_dispatch_Advice(a,b,c)
            {
                // alert('sssss')

                $("#myModal3").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                query={"challan_no":a,"order_id":b};
                $.get("send_dispatch.php",query,function(er){
                    var   objm = "";
                    $("#modal_asn").html("");
                    if($.trim(er)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objm=JSON.parse(er)
                    }

                    // alert(er);
                    datakt=new Array();

 var data_notes=new Array();
                    datamt=new Array();

                    for(var i = 0; i < objm.COMPANY.length; i++) {

                        datakt[i] = new Array();
                        datakt[i][0] = objm.COMPANY[i].companyName;
                        datakt[i][1] = objm.COMPANY[i].tinNo;
                        datakt[i][2] = objm.COMPANY[i].cinNo;

                        datakt[i][3] = objm.COMPANY[i].companyRefPerson;
                        datakt[i][4] = objm.COMPANY[i].companyRefPersonNo;
                        datakt[i][5] = objm.COMPANY[i].careOfName;
                        datakt[i][6] = objm.COMPANY[i].careOfAddress;

                        datakt[i][7] = objm.COMPANY[i].consignneeName;
                        datakt[i][8] = objm.COMPANY[i].consigneeAddress;
                        datakt[i][9] = objm.COMPANY[i].conContactName;
                        datakt[i][10] = objm.COMPANY[i].conContactNo;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+a+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+c+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>"+datakt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][5]+"</td><td>"+datakt[i][6]+"</td><td>"+datakt[i][1]+"</td><td>"+datakt[i][2]+"</td><td>"+datakt[i][3]+"</td><td>"+datakt[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>"+datakt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][9]+"</td><td>"+datakt[i][8]+"</td><td>"+datakt[i][10]+"</td></tr> </tbody> </table></div></div></div>");

                    }


                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objm.NOTES[p].description;
                        data_notes[p][1] = objm.NOTES[p].timestamp;
                        data_notes[p][2] = objm.NOTES[p].statusName;
                        data_notes[p][3] = objm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }




                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th></tr> </thead> <tbody id='send_dispatch_Advice_append'></tbody></table>");
                    for(var j = 0; j < objm.ITEM.length; j++) {

                        datamt[j] = new Array();
                        datamt[j][0] = objm.ITEM[j].item_code;
                        datamt[j][1] = objm.ITEM[j].material_name;
                        datamt[j][2] = objm.ITEM[j].order_quantity;
                        datamt[j][3] = objm.ITEM[j].per_unit_price;
                        datamt[j][4] = objm.ITEM[j].unitOfMeasurement;
                        datamt[j][5] = objm.ITEM[j].total_price;
                        $("#send_dispatch_Advice_append").append(" <tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][5]+"</td></tr>");

                    }
                });


            }
*/



            ///// outbound  Dispatch Advice



            function send_dispatch_Advice(a,b,c)
            {


                $("#myModal3").modal('hide');
                $("#myModal").modal('hide');
                $("#myModal55").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                query={"challan_no":a,"order_id":b};
                $.get("send_dispatch.php",query,function(er){
                    //alert(er+"send_dispatch");
                    var   objm = "";
                    $("#modal_asn").html("");
                    if($.trim(er)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objm=JSON.parse(er)
                    }

                    datakt=new Array();

 var data_notes=new Array();
                    datamt=new Array();

                    for(var i = 0; i < objm.COMPANY.length; i++) {

                        datakt[i] = new Array();
                        datakt[i][0] = objm.COMPANY[i].companyName;
                        datakt[i][1] = objm.COMPANY[i].tinNo;
                        datakt[i][2] = objm.COMPANY[i].cinNo;

                        datakt[i][3] = objm.COMPANY[i].companyRefPerson;
                        datakt[i][4] = objm.COMPANY[i].companyRefPersonNo;
                        datakt[i][5] = objm.COMPANY[i].careOfName;
                        datakt[i][6] = objm.COMPANY[i].careOfAddress;

                        datakt[i][7] = objm.COMPANY[i].consignneeName;
                        datakt[i][8] = objm.COMPANY[i].consigneeAddress;
                        datakt[i][9] = objm.COMPANY[i].conContactName;
                        datakt[i][10] = objm.COMPANY[i].conContactNo;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+a+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+c+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>"+datakt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][5]+"</td><td>"+datakt[i][6]+"</td><td>"+datakt[i][1]+"</td><td>"+datakt[i][2]+"</td><td>"+datakt[i][3]+"</td><td>"+datakt[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        if(datakt[i][7]!=null){
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>"+datakt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Reference  Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakt[i][9]+"</td><td>"+datakt[i][8]+"</td><td>"+datakt[i][10]+"</td></tr> </tbody> </table></div></div></div>");}

                    }

                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objm.NOTES[p].description;
                        data_notes[p][1] = objm.NOTES[p].timestamp;
                        data_notes[p][2] = objm.NOTES[p].statusName;
                        data_notes[p][3] = objm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }


                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th><th>Bom Code</th><th>Bom Description</th><th>Bom Quanttity</th></tr> </thead> <tbody id='send_dispatch_Advice_append' ></tbody></table>");
                    for(var j = 0; j < objm.ITEM.length; j++) {

                        datamt[j] = new Array();
                        datamt[j][0] = objm.ITEM[j].item_code;
                        datamt[j][1] = objm.ITEM[j].material_name;
                        datamt[j][2] = objm.ITEM[j].order_quantity;
                        datamt[j][3] = objm.ITEM[j].per_unit_price;
                        datamt[j][4] = objm.ITEM[j].unitOfMeasurement;
                        datamt[j][5] = objm.ITEM[j].total_price;
                        datamt[j][6] = objm.ITEM[j].bomCode;
                        datamt[j][7] = objm.ITEM[j].bomName;
                        datamt[j][8] = objm.ITEM[j].bom_quantity;
                        if(datamt[j][6]==null)
                        {
                            $("#send_dispatch_Advice_append").append(" <tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][5]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                        else
                        {
                            $("#send_dispatch_Advice_append").append(" <tr><td>"+datamt[j][0]+"</td><td>"+datamt[j][1]+"</td><td>"+datamt[j][2]+"</td><td>"+datamt[j][3]+"</td><td>"+datamt[j][4]+"</td><td>"+datamt[j][5]+"</td><td>"+datamt[j][6]+"</td><td>"+datamt[j][7]+"</td><td>"+datamt[j][8]+"</td></tr>");
                        }


                    }
                });


            }








            //End here






            ////outbound pick pack

            function send_pickpack(x,y,z)
            {


                $("#myModal3").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                qre={"challan_no":x,"order_id":y};
                $.get("send_pickpack.php",qre,function(mk)
                {

                    var   objmm= "";
                    $("#modal_asn").html("");
                    if($.trim(mk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmm=JSON.parse(mk)
                    }

                    //  alert(mk);
                    dataktt=new Array();

  var data_notes=new Array();
                    datamtt=new Array();

                    for(var i = 0; i < objmm.COMPANY.length; i++) {

                        dataktt[i] = new Array();
                        dataktt[i][0] = objmm.COMPANY[i].companyName;
                        dataktt[i][1] = objmm.COMPANY[i].tinNo;
                        dataktt[i][2] = objmm.COMPANY[i].cinNo;

                        dataktt[i][3] = objmm.COMPANY[i].companyRefPerson;
                        dataktt[i][4] = objmm.COMPANY[i].companyRefPersonNo;
                        dataktt[i][5] = objmm.COMPANY[i].careOfName;
                        dataktt[i][6] = objmm.COMPANY[i].careOfAddress;

                        dataktt[i][7] = objmm.COMPANY[i].consignneeName;
                        dataktt[i][8] = objmm.COMPANY[i].consigneeAddress;
                        dataktt[i][9] = objmm.COMPANY[i].conContactName;
                        dataktt[i][10] = objmm.COMPANY[i].conContactNo;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+x+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+z+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#003'>"+dataktt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='003' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktt[i][5]+"</td><td>"+dataktt[i][6]+"</td><td>"+dataktt[i][1]+"</td><td>"+dataktt[i][2]+"</td><td>"+dataktt[i][3]+"</td><td>"+dataktt[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#004'>"+dataktt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='004' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Reference Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktt[i][9]+"</td><td>"+dataktt[i][8]+"</td><td>"+dataktt[i][10]+"</td></tr> </tbody> </table></div></div></div>");

                    }

                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmm.NOTES[p].description;
                        data_notes[p][1] = objmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmm.NOTES[p].statusName;
                        data_notes[p][3] = objmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }


                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>UOM</th><th>Actual Order Quantity</th><th>Bom Code</th><th>BomDescription</th><th>Bom Quantity</th> </tr> </thead> <tbody id='send_pickpack_append' ></tbody></table>");
                    for(var j = 0; j < objmm.ITEM.length; j++) {

                        datamtt[j] = new Array();
                        datamtt[j][0] = objmm.ITEM[j].item_code;
                        datamtt[j][1] = objmm.ITEM[j].material_name;
                        datamtt[j][2] = objmm.ITEM[j].quantity;

                        datamtt[j][3] = objmm.ITEM[j].unitOfMeasurement;
                        datamtt[j][4] = objmm.ITEM[j].old_order_quantity;
                        datamtt[j][5] = objmm.ITEM[j].bomCode;
                        datamtt[j][6] = objmm.ITEM[j].bomName;
                        datamtt[j][7] = objmm.ITEM[j].bom_quantity;

                        if(datamtt[j][4]==0 || datamtt[j][4]==null){
                            var a="--";
                            datamtt[j][4]=a;
                        }
if( datamtt[j][5]==null)
{
    $("#send_pickpack_append").append(" <tr><td>"+datamtt[j][0]+"</td><td>"+datamtt[j][1]+"</td><td>"+datamtt[j][2]+"</td><td>"+datamtt[j][3]+"</td><td>"+datamtt[j][4]+"</td><td>--</td><td>--</td><td>--</td></tr>");
}
else
{
    $("#send_pickpack_append").append(" <tr><td>"+datamtt[j][0]+"</td><td>"+datamtt[j][1]+"</td><td>"+datamtt[j][2]+"</td><td>"+datamtt[j][3]+"</td><td>"+datamtt[j][4]+"</td><td>"+datamtt[j][5]+"</td><td>"+datamtt[j][6]+"</td><td>"+datamtt[j][7]+"</td></tr>");
}


                    }
                });
            }




            ///End here



            ///Outbound Good Issue


            function send_allgoods(m,n,o)
            {

                $("#myModal3").modal('hide');
                $("#myModal22").modal('show');
                $("#modal_quality").html("<center><img src='loader1.gif'></center>");
                //   alert(n);
                qres={"challan_no":m,"order_id":n};
                $.get("send_allgoods.php",qres,function(mkk)
                {

                    var   objmmm= "";
                    $("#modal_quality").html("");
                    if($.trim(mkk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmmm=JSON.parse(mkk)
                    }

                    //   alert(mkk);
                    datakttt=new Array();

 var data_notes=new Array();
                    datamttt=new Array();

                    for(var i = 0; i < objmmm.COMPANY.length; i++) {

                        datakttt[i] = new Array();
                        datakttt[i][0] = objmmm.COMPANY[i].companyName;
                        datakttt[i][1] = objmmm.COMPANY[i].tinNo;
                        datakttt[i][2] = objmmm.COMPANY[i].cinNo;

                        datakttt[i][3] = objmmm.COMPANY[i].companyRefPerson;
                        datakttt[i][4] = objmmm.COMPANY[i].companyRefPersonNo;
                        datakttt[i][5] = objmmm.COMPANY[i].careOfName;
                        datakttt[i][6] = objmmm.COMPANY[i].careOfAddress;

                        datakttt[i][7] = objmmm.COMPANY[i].consignneeName;
                        datakttt[i][8] = objmmm.COMPANY[i].consigneeAddress;
                        datakttt[i][9] = objmmm.COMPANY[i].conContactName;
                        datakttt[i][10] = objmmm.COMPANY[i].conContactNo;
                        // alert(datakttt[i][5]);
                        $("#modal_quality").append("<div class='col-lg-6'><label>Challan no : "+m+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+o+"</label></div><br><br>");

                        $("#modal_quality").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#003'>"+datakttt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='003' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped '> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakttt[i][5]+"</td><td>"+datakttt[i][6]+"</td><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][3]+"</td><td>"+datakttt[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_quality").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#004'>"+datakttt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='004' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped '> <thead> <tr>  <th>Reference Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datakttt[i][9]+"</td><td>"+datakttt[i][8]+"</td><td>"+datakttt[i][10]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_quality").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0015'>LR Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0015' class='panel-collapse collapse'><div class='panel-body' id='lr'><table class='table table-striped'> <thead> <tr>  <th>Transport Name</th><th>Vehicle No</th> <th>Date of Issue</th> <th>Driver Name</th><th>Driver Mobile no.</th><th>Total Box</th> <th>Total Weight</th>   </tr> </thead> <tbody id='kt'> </tbody> </table></div></div></div>");


                    }

                    $("#modal_quality").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");






                    for(var p = 0; p < objmmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmmm.NOTES[p].description;
                        data_notes[p][1] = objmmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmmm.NOTES[p].statusName;
                        data_notes[p][3] = objmmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }



                    $("#modal_quality").append(" <table class='table table-striped'> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Quantity</th>  <th>UOM</th></thead> <tbody id='send_allgoods_append'></tbody></table>");
                    for(var j = 0; j < objmmm.ITEM.length; j++) {

                        datamttt[j] = new Array();
                        datamttt[j][0] = objmmm.ITEM[j].item_code;
                        datamttt[j][1] = objmmm.ITEM[j].material_name;
                        datamttt[j][2] = objmmm.ITEM[j].dateOfDelivery;
                        datamttt[j][3] = objmmm.ITEM[j].receiver_id;
                        datamttt[j][4] = objmmm.ITEM[j].vehicle_no;
                        datamttt[j][5] = objmmm.ITEM[j].transport_vendor_id;
                        datamttt[j][6] = objmmm.ITEM[j].quantity;
                        datamttt[j][7] = objmmm.ITEM[j].driver_mobile_no;
                        datamttt[j][8] = objmmm.ITEM[j].unitOfMeasurement;
                        datamttt[j][9] = objmmm.ITEM[j].driver_name;
                        datamttt[j][10] = objmmm.ITEM[j].lr_total_box;
                        datamttt[j][11] = objmmm.ITEM[j].total_weight;



                        $("#send_allgoods_append").append(" <tr><td>"+datamttt[j][0]+"</td><td>"+datamttt[j][1]+"</td><td>"+datamttt[j][6]+"</td><td>"+datamttt[j][8]+"</td></tr>");

                    }
                    $("#kt").append("<tr><td>"+datamttt[0][5]+"</td><td>"+datamttt[0][4]+"</td><td>"+datamttt[0][2]+"</td><td>"+datamttt[0][9]+"</td><td>"+datamttt[0][7]+"</td><td>"+datamttt[0][10]+"</td><td>"+datamttt[0][11]+"</td></tr>");

                });



            }


            ////End here


            ///Outbound Good deliverd

            function send_allgood_deliver(e,f,g)
            {
                $("#myModal3").modal('hide');
                $("#myModal1").modal('show');
                $("#modal_asn").html("<center><img src='loader1.gif'></center>");
                //  alert(e);
                qress={"challan_no":e,"order_id":f};
                $.get("send_allgooddeliver.php",qress,function(mkkk)
                {


                    var   objmmm= "";
                    $("#modal_asn").html("");
                    if($.trim(mkkk)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objmmm=JSON.parse(mkkk)
                    }

                    // alert(mkkk);
                    dataktttt=new Array();


                    datamtttt=new Array();

                    for(var i = 0; i < objmmm.COMPANY.length; i++) {
                        dataktttt[i] = new Array();
                        dataktttt[i][0] = objmmm.COMPANY[i].companyName;
                        dataktttt[i][1] = objmmm.COMPANY[i].tinNo;
                        dataktttt[i][2] = objmmm.COMPANY[i].cinNo;

                        dataktttt[i][3] = objmmm.COMPANY[i].companyRefPerson;
                        dataktttt[i][4] = objmmm.COMPANY[i].companyRefPersonNo;
                        dataktttt[i][5] = objmmm.COMPANY[i].careOfName;
                        dataktttt[i][6] = objmmm.COMPANY[i].careOfAddress;

                        dataktttt[i][7] = objmmm.COMPANY[i].consignneeName;
                        dataktttt[i][8] = objmmm.COMPANY[i].consigneeAddress;
                        dataktttt[i][9] = objmmm.COMPANY[i].conContactName;
                        dataktttt[i][10] = objmmm.COMPANY[i].conContactNo;
                        dataktttt[i][11] = objmmm.COMPANY[i].imageUrl;
                        dataktttt[i][11] = objmmm.COMPANY[i].toCompany;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+e+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+g+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#00aa7'>"+dataktttt[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='00aa7' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktttt[i][5]+"</td><td>"+dataktttt[i][6]+"</td><td>"+dataktttt[i][1]+"</td><td>"+dataktttt[i][2]+"</td><td>"+dataktttt[i][3]+"</td><td>"+dataktttt[i][4]+"</td></tr> </tbody> </table></div></div></div>");


                       if(dataktttt[i][7]==null)
                       {
                           $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#008'>"+dataktttt[i][11]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='008' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Refrence Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktttt[i][9]+"</td><td>"+dataktttt[i][8]+"</td><td>"+dataktttt[i][10]+"</td></tr> </tbody> </table></div></div></div>");
                       }else{

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0008'>"+dataktttt[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0008' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Refrence Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+dataktttt[i][9]+"</td><td>"+dataktttt[i][8]+"</td><td>"+dataktttt[i][10]+"</td></tr> </tbody> </table></div></div></div>");}
                        if(dataktttt[i][11]==null || dataktttt[i][11]=="") {

                            $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#8888'>POD Image</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='8888' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <center><img src='no-image.jpg' style='height:30%;width: 30%; '></center></div></div></div><br>");
                        }
                        else {


                            $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#8888'>POD Image</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='8888' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <center><img src='"+dataktttt[i][11]+"' style='height:30%;width: 50%; '></center></div></div></div><br>");
                        }
                    }


                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");


                          var data_notes=new Array();

                    for(var p = 0; p < objmmm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objmmm.NOTES[p].description;
                        data_notes[p][1] = objmmm.NOTES[p].timestamp;
                        data_notes[p][2] = objmmm.NOTES[p].statusName;
                        data_notes[p][3] = objmmm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }







                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Delivered Time</th><th>UOM</th><th>Actual Order Quantity</th> <th>Bom Code</th><th>Bom Descriptions</th><th>Bom Quantity</th></tr> </thead> <tbody id='send_allgood_deliver_append' ></tbody></table>");
                    for(var j = 0; j < objmmm.ITEM.length; j++) {

                        datamtttt[j] = new Array();
                        datamtttt[j][0] = objmmm.ITEM[j].item_code;
                        datamtttt[j][1] = objmmm.ITEM[j].material_name;
                        datamtttt[j][2] = objmmm.ITEM[j].order_quantity;
                        datamtttt[j][3] = objmmm.ITEM[j].deliveredtime;
                        datamtttt[j][4] = objmmm.ITEM[j].unitOfMeasurement;
                        datamtttt[j][5] = objmmm.ITEM[j].old_order_quantity;
                        datamtttt[j][6] = objmmm.ITEM[j].bomCode;
                        datamtttt[j][7] = objmmm.ITEM[j].bomName;
                        datamtttt[j][8] = objmmm.ITEM[j].bom_quantity;

                        if(datamtttt[j][5]==0 || datamtttt[j][5]==null){
                            var a="--";
                            datamtttt[j][5]=a;
                        }
                        if(datamtttt[j][6]==null)
                        {
                            $("#send_allgood_deliver_append").append("<tr><td>"+datamtttt[j][0]+"</td><td>"+datamtttt[j][1]+"</td><td>"+datamtttt[j][2]+"</td><td>"+datamtttt[j][3]+"</td><td>"+datamtttt[j][4]+"</td><td>"+datamtttt[j][5]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                       else
                        {
                            $("#send_allgood_deliver_append").append("<tr><td>"+datamtttt[j][0]+"</td><td>"+datamtttt[j][1]+"</td><td>"+datamtttt[j][2]+"</td><td>"+datamtttt[j][3]+"</td><td>"+datamtttt[j][4]+"</td><td>"+datamtttt[j][5]+"</td><td>"+datamtttt[j][6]+"</td><td>"+datamtttt[j][7]+"</td><td>"+datamtttt[j][8]+"</td></tr>");
                        }

                    }
                });

            }

            //End
            function search_challan()
            {


if($("#ids_value").val()=="")
{


    show_modal("Please Select Sales Office or Company")
}

              //  alert('');
if($("#search_id").val()!="") {
    $("#inbound tbody").html(" <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
    $("#Outbound tbody").html(" <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
    $("#stocktransfer tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
    $("#return_stock_data tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
    mo = {"challan_no": $("#search_id").val(),"sales_id":$("#ids_value").val()};

    $.get("searchby_challan.php", mo, function (ky) {

        $("#inbound tbody").html("");
        $("#Outbound tbody").html("");
        $("#stocktransfer tbody").html("");
        $("#return_stock_data tbody").html("");
        $("#sto tbody").html("");
        var objm = "";

        if ($.trim(ky) == "N") {

            show_modal("Invoice No Invalid")

        }
        else {


            objm = JSON.parse(ky)
        }


        datakt = new Array();


        for (var i = 0; i < objm.TRACK.length; i++) {

            datakt[i] = new Array();
            datakt[i][0] = objm.TRACK[i].company_name;
            datakt[i][1] = objm.TRACK[i].NAME;
            datakt[i][2] = objm.TRACK[i].chalan_no;

            datakt[i][3] = objm.TRACK[i].timestamp;
            datakt[i][4] = order_type(objm.TRACK[i].order_type);
            datakt[i][5] = objm.TRACK[i].order_id;
            datakt[i][6] = objm.TRACK[i].status_id;
            datakt[i][7] = objm.TRACK[i].specialInstruction;

            datakt[i][8] = objm.TRACK[i].challan_url_customer_copy;
            datakt[i][9] = objm.TRACK[i].challan_url_company_copy;
            datakt[i][10] = objm.TRACK[i].fromConsignee;
            datakt[i][11] = objm.TRACK[i].wareHouseName;
            datakt[i][12] = objm.TRACK[i].toCompany;
            datakt[i][13] = objm.TRACK[i].orderType;
            datakt[i][14] = objm.TRACK[i].partialOrder;

            if(datakt[i][14]==0 || datakt[i][14]==null)
            {

                var a="--";
                datakt[i][14]=a;
            }else{
                var a="Partial Pick";
                datakt[i][14]=a;
            }
            if (datakt[i][4] == "Inbound") {
                if (stock_id_check(datakt[i][6]) == "Cancel") {
                    $("#ins>a").click();
                    $("#ins").addClass("active");

                    $("#inbound tbody").append("<tr id='" + datakt[i][2] + "'  title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")


                } else {

                    $("#ins>a").click();
                    $("#ins").addClass("active");

                    $("#inbound tbody").append("<tr id='" + datakt[i][2] + "'  title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='inbound_track(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")
                }

            }
            else if (datakt[i][4] == "Outbound") {
                if (stock_id_check(datakt[i][6]) == "Cancel") {


                    $("#outs>a").click();
                    $("#outs").addClass("active");

                    $("#Outbound tbody").append("<tr  id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' ><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td>" + datakt[i][14] + "</td></tr>")

                } else {

                    $("#outs>a").click();
                    $("#outs").addClass("active");

                    $("#Outbound tbody").append("<tr  id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='outbound_tracking(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td>" + datakt[i][14] + "</td></tr>")

                }
            }
            else if (datakt[i][4] == "Stock Transfer") {


                if (stock_id_check(datakt[i][6]) == "Cancel") {

                    $("#stock>a").click();
                    $("#stock").addClass("active");

                    $("#stocktransfer tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' ><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")


                } else {

                    $("#stock>a").click();
                    $("#stock").addClass("active");

                    $("#stocktransfer tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "'  onclick='stock_tracking(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")

                }
            } else if (datakt[i][4] == "Return Inbound") {


                if (stock_id_check(datakt[i][6]) == "Cancel") {
                    $("#return_stock>a").click();
                    $("#return_stock").addClass("active");

                    $("#return_stock_data tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' ><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")


                }


                else {


                    $("#return_stock>a").click();
                    $("#return_stock").addClass("active");

                    $("#return_stock_data tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "' lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='return_inbound_track(this.id,this.title,this.lang,this.className)' ><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][4] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td></tr>")


                }


            } else if (datakt[i][4] == "STO") {
                $("#sto1>a").click();
                $("#sto1").addClass("active");

                if (datakt[i][13] == "STOCKTRANSFERORDERINBOUND") {


                    $("#sto tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='sto_inbound_track(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][13] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check_with_order_type(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                }
                else if (datakt[i][13] == "STOCKTRANSFERORDER") {

                    $("#sto tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='sto_outbound_tracking(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][13] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check_with_order_type(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                }
                else if (datakt[i][13] == "STOCKTRANSFERORDERRTO") {


                    $("#sto tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='sto_rto_tracking(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][13] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check_with_order_type(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                }
                else if (datakt[i][13] == "STOCKTRANSFERORDERINBOUNDRTO") {


                    $("#sto tbody").append("<tr id='" + datakt[i][2] + "' title='" + datakt[i][5] + "'  lang='" + datakt[i][8] + "' class='" + datakt[i][9] + "' onclick='sto_rto_tracking(this.id,this.title,this.lang,this.className)'><td>" + datakt[i][0] + "</td><td>" + datakt[i][1] + "</td><td>" + datakt[i][2] + "</td><td>" + datakt[i][3] + "</td><td>" + datakt[i][13] + "</td><td>" + datakt[i][5] + "</td><td>" + stock_id_check_with_order_type(datakt[i][6]) + "</td><td>" + datakt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                }

            }


        }


    });
}else{
    show_modal("Please Enter The Challan No.");
}


            }

///  search by date
            function search_by_date()
            {
                $("#inbound tbody").html("");
                $("#Outbound tbody").html("");
                $("#stocktransfer tbody").html("");
                $("#return_stock_data tbody").html("");
                $("#sto tbody").html("");

if($("#ids_value").val()=="")
{
    show_modal("Please Select Company Or Sales Office")
}else {

    if ($("#dtp_input2").val() == "" || $("#dtp_input3").val() == "") {
        show_modal("Please Select Date");
    } else {
     //   alert($("#ids_value").val())
        $("#inbound tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
        $("#Outbound tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
        $("#stocktransfer tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
        $("#sto tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
        dft = {
            "startdate": $("#dtp_input2").val(),
            "enddate": $("#dtp_input3").val(),
            "sales_id": $("#ids_value").val()
        };
        $.get("search_by_dates.php", dft, function (ty) {

            $("#inbound tbody").html("");
            $("#Outbound tbody").html("");
            $("#stocktransfer tbody").html("");
            $("#return_stock_data tbody").html("");
            $("#sto tbody").html("");

            var objmm = "";

            if ($.trim(ty) == "N") {

                show_modal("Invoice No Invalid")

            }
            else {


                objmm = JSON.parse(ty)
            }

            //  alert(ty);
            dataktt = new Array();


            for (var i = 0; i < objmm.TRACK.length; i++) {

                dataktt[i] = new Array();
                dataktt[i][0] = objmm.TRACK[i].company_name;
                dataktt[i][1] = objmm.TRACK[i].NAME;
                dataktt[i][2] = objmm.TRACK[i].chalan_no;

                dataktt[i][3] = objmm.TRACK[i].timestamp;
                dataktt[i][4] = order_type(objmm.TRACK[i].order_type);
                dataktt[i][5] = objmm.TRACK[i].order_id;
                dataktt[i][6] = objmm.TRACK[i].status_id;
                dataktt[i][7] = objmm.TRACK[i].specialInstruction;
                dataktt[i][8] = objmm.TRACK[i].challan_url_customer_copy;
                dataktt[i][9] = objmm.TRACK[i].challan_url_company_copy;
                dataktt[i][10] = objmm.TRACK[i].fromConsignee;
                dataktt[i][11] = objmm.TRACK[i].wareHouseName;
                dataktt[i][12] = objmm.TRACK[i].toCompany;
                dataktt[i][13] = objmm.TRACK[i].orderType;
                dataktt[i][14] = objmm.TRACK[i].partialOrder;
if(dataktt[i][14]==0 || dataktt[i][14]==null){
    var a="--";
    dataktt[i][14]=a;
}else{
    var a="Partial Pick";
    dataktt[i][14]=a;
}
                if (dataktt[i][4] == "Inbound") {

                    if (stock_id_check(dataktt[i][6]) == "Cancel") {

                        $("#inbound tbody").append("<tr  onclick=''><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    }
                    else {

                        $("#inbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='inbound_track(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    }

                }
                else if (dataktt[i][4] == "Outbound") {
                    if (stock_id_check(dataktt[i][6]) == "Put Away") {
                        $("#Outbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' onclick='outbound_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td>" + dataktt[i][14] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>");

                    } else if (stock_id_check(dataktt[i][6]) == "Cancel") {


                        $("#Outbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' ><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td>" + dataktt[i][14] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>");

                    }
                    else {
                        $("#Outbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='outbound_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td>" + dataktt[i][14] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>");
                    }
                }
                else if (dataktt[i][4] == "Stock Transfer") {

                    if (stock_id_check(dataktt[i][6]) == "Cancel") {
                        $("#stocktransfer tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "'  onclick=''><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    } else {
                        $("#stocktransfer tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "'  onclick='stock_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    }

                }
                else if (dataktt[i][4] == "Return Inbound") {
                    if (stock_id_check(dataktt[i][6]) == "Cancel") {
                    }

                    else {
                        $("#return_stock_data tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "'  onclick='return_inbound_track(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    }

                }
                else if (dataktt[i][4] == "STO") {


                    if (dataktt[i][13] == "STOCKTRANSFERORDERINBOUND") {

                        if(dataktt[i][1]="null")
                        {

                            dataktt[i][1]="-";
                        }


                        $("#sto tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='sto_inbound_track(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][13] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check_with_order_type(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")
                    }
                    else if (dataktt[i][13] == "STOCKTRANSFERORDER") {
                        if(dataktt[i][1]="null")
                        {

                            dataktt[i][1]="-";
                        }
                        $("#sto tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='sto_outbound_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][13] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check_with_order_type(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                    }
                    else if (dataktt[i][13] == "STOCKTRANSFERORDERRTO") {
                        if(dataktt[i][1]="null")
                        {

                            dataktt[i][1]="-";
                        }

                        $("#sto tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='sto_rto_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][13] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check_with_order_type(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><<td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                    }
                    else if (dataktt[i][13] == "STOCKTRANSFERORDERINBOUNDRTO") {
                        if(dataktt[i][1]="null")
                        {

                            dataktt[i][1]="-";
                        }

                        $("#sto tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='" + dataktt[i][8] + "' class='" + dataktt[i][9] + "' onclick='sto_rto_tracking(this.id,this.title,this.lang,this.className)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][13] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check_with_order_type(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                    }

                }


            }


        });
    }
}
            }
/// Sto inbound Tracking

            function sto_inbound_track(x,y,d1,d2)
            {
                // alert(x+""+y+""+d1+""+d2);
                //  alert(d1);
                $("#step1").find("button").remove();
                $("#step1").find("a").remove();
                $("#step1").find("i").remove();
                $("#step1").find("br").remove();

                $("#stage1").html("");
                $("#stage2").html("");
                $("#stage3").html("");

                $("#stage4").html("");
                $("#tb1").html("");
                $("#tb2").html("");
                $("#tb3").html("");
                $("#tb4").html("");
                /*    $('.wizard .nav-tabs li').removeClass('active');
                 ///  $('.wizard .nav-tabs li').addClass('disabled');
                 $('.wizard .nav-tabs li').addClass('disabled');
                 $("#first").addClass("active");*/



                $('.wizard .nav-tabs li ').removeClass("disabled");
                $('.wizard .nav-tabs li ').removeClass("active");
                $("#first").removeClass("disabled");
                //    $("#first").addClass("active");

                var conter;

                gt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gt,function(ft)
                {

                    var   objms = "";
                    $("#myModal").modal('show');
                    if($.trim(ft)=="N")
                    {

                        show_modal("Invoice No Invalid")

                    }
                    else
                    {


                        objms=JSON.parse(ft)
                    }

                    //  alert(ft);
                    datakttt=new Array();


                    var k;
                    for(var i = 0; i < objms.TRACK.length; i++) {

                        datakttt[i] = new Array();
                        datakttt[i][0] = objms.TRACK[i].order_id;

                        datakttt[i][1] = objms.TRACK[i].chalan_no;

                        datakttt[i][2] = objms.TRACK[i].chalan_date;
                        datakttt[i][3] = objms.TRACK[i].statusID;
                        datakttt[i][4] = objms.TRACK[i].timestamp;
                        datakttt[i][5] = objms.TRACK[i].comment;
                        datakttt[i][6] = objms.TRACK[i].statusName;
                        datakttt[i][7] = order_type(objms.TRACK[i].order_type);


                        if(datakttt[i][3]=="400" || datakttt[i][3]=="405"  || datakttt[i][3]=="416" || datakttt[i][3]=="417" || datakttt[i][3]=="418" || datakttt[i][3]=="419")
                        {

///stage 1



                            conter=1;

                            $("#stage1").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step1").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step1").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }
                            $("#tb1").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")


                        }  else if(datakttt[i][3]=="412" || datakttt[i][3]=="411")
                        {
                            // stage 2

                            conter=2+1;
                            $("#step2").find("button").remove();
                            $("#step2").find("a").remove();
                            $("#step2").find("i").remove();
                            $("#step2").find("br").remove();
                            $("#stage2").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step2").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_delivery(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step2").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }




                            $("#tb2").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }
                        else if(datakttt[i][3]=="413")
                        {
                            conter=3+1;
                            $("#step3").find("button").remove();
// stage 3
                            $("#step3").find("br").remove();
                            $("#step3").find("a").remove();
                            $("#step3").find("br").remove();
                            $("#stage3").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step3").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_check(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step3").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }


                            $("#tb3").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }

                        else if(datakttt[i][3]=="414")
                        {
                            conter=4+1;
// stage 4 conter=1;
                            $("#complete").find("button").remove();
                            $("#complete").find("a").remove();
                            $("#complete").find("i").remove();
                            $("#complete").find("br").remove();
                            $("#stage4").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#complete").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_goods(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#complete").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }


                            $("#tb4").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")
                        }
                        if(datakttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttt.length);}
                    }

                    for(var m=1;m<=parseInt(conter);m++)
                    {

                        if(m<=3)
                        {
                            if(m==1)
                            {



                                //  $("#first").removeClass("disabled");

                                //nextTab($active);
                                //$("#first").addClass("active");

                                $("#first>a").click();
                                //    nextTab($active);
                                // $(".wizard .nav-tabs li").addClass("disabled");
                                /* $("#step1").addClass("active");
                                 $("#step2").removeClass("active");
                                 $("#step3").removeClass("active");
                                 $("#complete").removeClass("active");*/

                            }
                            else if(k==3 && m==3)
                            {





                                break;

                            }
                            else if(m==2){
                                var $active = $('.wizard .nav-tabs li.active ');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m>3) {


                            var $active = $('.wizard .nav-tabs li.active');
                            $active.next().removeClass('disabled');


                            nextTab($active);


                        }


                    }
                });



            }








            ///End here

            ///STO Outbound

            function sto_outbound_tracking(x,y,d1,d2)
            {

//alert(x)
                $("#steps1").find("button").remove();
                $("#steps1").find("a").remove();
                $("#steps1").find("i").remove();
                $("#steps1").find("br").remove();

                $("#stages1").html("");
                $("#stages2").html("");
                $("#stages3").html("");

                $("#stages4").html("");
                $("#tbd1").html("");
                $("#tbd2").html("");
                $("#tbd3").html("");
                $("#tbd4").html("");
                $('#wiz .nav-tabs li').removeClass('active');
                $('#wiz .nav-tabs li').addClass('disabled');

                var objmss="";
                var counter;
                gtt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gtt,function(ftt) {

                    var objms = "";
                    $("#myModal3").modal('show');
                    if ($.trim(ftt) == "N") {

                        show_modal("Invoice No Invalid")

                    }
                    else {


                        objmss = JSON.parse(ftt)
                    }


                    datakttttt=new Array();


                    var k;
                    for(var i = 0; i < objmss.TRACK.length; i++) {

                        datakttttt[i] = new Array();
                        datakttttt[i][0] = objmss.TRACK[i].order_id;

                        datakttttt[i][1] = objmss.TRACK[i].chalan_no;

                        datakttttt[i][2] = objmss.TRACK[i].chalan_date;
                        datakttttt[i][3] = objmss.TRACK[i].statusID;
                        datakttttt[i][4] = objmss.TRACK[i].timestamp;
                        datakttttt[i][5] = objmss.TRACK[i].comment;
                        datakttttt[i][6] = objmss.TRACK[i].statusName;
                        datakttttt[i][7] = order_type(objmss.TRACK[i].order_type);


                        if(datakttttt[i][3]=="405")
                        {
                            counter=1;
///stage 1
                            $("#stages1").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            } else {

                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }



                            $("#tbd1").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")


                        }  else if(datakttttt[i][3]=="415" || datakttttt[i][3]=="416" || datakttttt[i][3]=="417")
                        {
                            // stage 2
                            counter=1+1;

                            $("#steps2").find("button").remove();
                            $("#steps2").find("a").remove();
                            $("#steps2").find("i").remove();
                            $("#steps2").find("br").remove();

                            $("#stages2").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_pickpack(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd2").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }
                        else if(datakttttt[i][3]=="418")
                        {
                            counter=3+1;
                            $("#steps3").find("button").remove();
// stage 3
                            $("#steps3").find("br").remove();
                            $("#steps3").find("a").remove();
                            $("#steps3").find("i").remove();
                            $("#stages3").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgoods(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }

                            else {

                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }
                            $("#tbd3").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }

                        else if(datakttttt[i][3]=="419" || datakttttt[i][3]=="411")
                        {
                            counter=4+1;
// stage 4
                            $("#status_print").html("GOODS DELIVERED");


                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }
                        else if(datakttttt[i][3]=="412" || datakttttt[i][3]=="413" || datakttttt[i][3]=="414" || datakttttt[i][3]=="404")
                        {
// stage 4
                            $("#status_print").html("RTO");

                            // alert('')
                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }




                        if(datakttttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttttt.length);}
                    }

                    for(var m=1;m<=parseInt(counter);m++)
                    {

                        if(m<=3)
                        {
                            if(m==1)
                            {



                                $("#firsts").removeClass("disabled");
                                //$("#firsts").addClass("active");
                                //nextTab($active);
                                //$("#first").addClass("active");
                                $("#firsts>a").click();
                                // $(".wizard .nav-tabs li").addClass("disabled");

                            }
                            else if(k==3 && m==3)
                            {





                                break;

                            }
                            else if(m==2){
                                var $active = $('#wiz .nav-tabs li.active ');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m>3) {


                            var $active = $('#wiz .nav-tabs li.active');
                            $active.next().removeClass('disabled');


                            nextTab($active);


                        }


                    }


                });






            }


            //end here

            /// Sto RTO

            function sto_rto_tracking(x,y,d1,d2)
            {

                // alert(d1)
                $("#steps1").find("button").remove();
                $("#steps1").find("a").remove();
                $("#steps1").find("i").remove();
                $("#steps1").find("br").remove();

                $("#stages1").html("");
                $("#stages2").html("");
                $("#stages3").html("");

                $("#stages4").html("");
                $("#tbd1").html("");
                $("#tbd2").html("");
                $("#tbd3").html("");
                $("#tbd4").html("");
                $('#wiz .nav-tabs li').removeClass('active');
                $('#wiz .nav-tabs li').addClass('disabled');

                var objmss="";
                var counter;
                gtt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gtt,function(ftt) {

                    var objms = "";
                    $("#myModal3").modal('show');
                    if ($.trim(ftt) == "N") {

                        show_modal("Invoice No Invalid")

                    }
                    else {


                        objmss = JSON.parse(ftt)
                    }


                    datakttttt=new Array();


                    var k;
                    for(var i = 0; i < objmss.TRACK.length; i++) {

                        datakttttt[i] = new Array();
                        datakttttt[i][0] = objmss.TRACK[i].order_id;

                        datakttttt[i][1] = objmss.TRACK[i].chalan_no;

                        datakttttt[i][2] = objmss.TRACK[i].chalan_date;
                        datakttttt[i][3] = objmss.TRACK[i].statusID;
                        datakttttt[i][4] = objmss.TRACK[i].timestamp;
                        datakttttt[i][5] = objmss.TRACK[i].comment;
                        datakttttt[i][6] = objmss.TRACK[i].statusName;
                        datakttttt[i][7] = order_type(objmss.TRACK[i].order_type);

                        //  alert(datakttttt[i][3])
                        if(datakttttt[i][3]=="405")
                        {
                            counter=1;
///stage 1
                            $("#stages1").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            } else {

                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }



                            $("#tbd1").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")


                        }  else if(datakttttt[i][3]=="415" || datakttttt[i][3]=="416" || datakttttt[i][3]=="417")
                        {
                            // stage 2
                            counter=1+1;

                            $("#steps2").find("button").remove();
                            $("#steps2").find("a").remove();
                            $("#steps2").find("i").remove();
                            $("#steps2").find("br").remove();

                            $("#stages2").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_pickpack(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd2").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }
                        else if(datakttttt[i][3]=="418")
                        {
                            counter=3+1;
                            $("#steps3").find("button").remove();
// stage 3
                            $("#steps3").find("br").remove();
                            $("#steps3").find("a").remove();
                            $("#steps3").find("i").remove();
                            $("#stages3").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgoods(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }

                            else {

                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }
                            $("#tbd3").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }

                        else if(datakttttt[i][3]=="419")
                        {
                            counter=4+1;
// stage 4
                            $("#status_print").html("GOODS DELIVERED");


                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }
                        else if( datakttttt[i][3]=="413" || datakttttt[i][3]=="412" || datakttttt[i][3]=="413" || datakttttt[i][3]=="414" || datakttttt[i][3]=="404")
                        {
                            counter=4+1;
// stage 4
                            $("#status_print").html("RTO");

                            // alert('')
                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry PDF File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }




                        if(datakttttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttttt.length);}
                    }

                    for(var m=1;m<=parseInt(counter);m++)
                    {

                        if(m<=3)
                        {
                            if(m==1)
                            {



                                $("#firsts").removeClass("disabled");
                                //$("#firsts").addClass("active");
                                //nextTab($active);
                                //$("#first").addClass("active");
                                $("#firsts>a").click();
                                // $(".wizard .nav-tabs li").addClass("disabled");

                            }
                            else if(k==3 && m==3)
                            {





                                break;

                            }
                            else if(m==2){
                                var $active = $('#wiz .nav-tabs li.active ');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m>3) {


                            var $active = $('#wiz .nav-tabs li.active');
                            $active.next().removeClass('disabled');


                            nextTab($active);


                        }


                    }


                });






            }

            //End here

            function order_type(de)
            {


                if(de=="ODT0000003")
                {


                    return "Inbound"

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
                else if(de=="ODT0000007")
                {

                    return "STO";

                }

            }




            function stock_id_check(x)
            {


                if(x=="400" )
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
            function stock_id_check_with_order_type(x)
            {


                if(x=="400" || x=="405" || x=="416" || x=="417" || x=="418" || x=="419")
                {


                    return "ASN";

                }
                else if(x=="401")
                {


                    return "DSN";
                }else if(x=="402")
                {

                    return "Stock Transfer";

                }
                else if(x=="411" || x=="412")
                {


                    return "Unload";
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


            function inbound_track(x,y,d1,d2)
            {
           //  alert(d1);
                $("#step1").find("button").remove();
                $("#step1").find("a").remove();
                $("#step1").find("i").remove();
                $("#step1").find("br").remove();

                $("#stage1").html("");
                $("#stage2").html("");
                $("#stage3").html("");

                $("#stage4").html("");
                $("#tb1").html("");
                $("#tb2").html("");
                $("#tb3").html("");
                $("#tb4").html("");
                $('.wizard .nav-tabs li').removeClass('active');
                ///  $('.wizard .nav-tabs li').addClass('disabled');
                $('.wizard .nav-tabs li').addClass('disabled');
                $("#first").addClass("active");



                gt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gt,function(ft)
                {

                    var   objms = "";
                    $("#myModal").modal('show');
                    if($.trim(ft)=="N")
                    {

                        show_modal("Invoice No Invalid")

                    }
                    else
                    {


                        objms=JSON.parse(ft)
                    }

                    //  alert(ft);
                    datakttt=new Array();


                    var k;
                    for(var i = 0; i < objms.TRACK.length; i++) {

                        datakttt[i] = new Array();
                        datakttt[i][0] = objms.TRACK[i].order_id;

                        datakttt[i][1] = objms.TRACK[i].chalan_no;

                        datakttt[i][2] = objms.TRACK[i].chalan_date;
                        datakttt[i][3] = objms.TRACK[i].statusID;
                        datakttt[i][4] = objms.TRACK[i].timestamp;
                        datakttt[i][5] = objms.TRACK[i].comment;
                        datakttt[i][6] = objms.TRACK[i].statusName;
                        datakttt[i][7] = order_type(objms.TRACK[i].order_type);


                        if(datakttt[i][3]=="400")
                        {

///stage 1
                            $("#stage1").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step1").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step1").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }
                                $("#tb1").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")


                        }  else if(datakttt[i][3]=="412" || datakttt[i][3]=="411")
                        {
                            // stage 2


                            $("#step2").find("button").remove();
                            $("#step2").find("a").remove();
                            $("#step2").find("i").remove();
                            $("#step2").find("br").remove();
                            $("#stage2").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step2").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_delivery(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step2").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }




                            $("#tb2").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }
                        else if(datakttt[i][3]=="413")
                        {
                            $("#step3").find("button").remove();
// stage 3
                            $("#step3").find("br").remove();
                            $("#step3").find("a").remove();
                            $("#step3").find("br").remove();
                            $("#stage3").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#step3").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_check(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#step3").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }


                            $("#tb3").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }

                        else if(datakttt[i][3]=="414")
                        {
// stage 4
                            $("#complete").find("button").remove();
                            $("#complete").find("a").remove();
                            $("#complete").find("i").remove();
                            $("#complete").find("br").remove();
                            $("#stage4").html("<h4>"+datakttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#complete").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_goods(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#complete").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }


                            $("#tb4").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")
                        }
                        if(datakttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttt.length);}
                    }

                    for(var m=1;m<=parseInt(k);m++)
                    {

                        if(m<=3)
                        {
                            if(m==1)
                            {



                                //  $("#first").removeClass("disabled");

                                //nextTab($active);
                                //$("#first").addClass("active");
                                $("#first>a").click();
                                // $(".wizard .nav-tabs li").addClass("disabled");

                            }
                            else if(k==3 && m==3)
                            {





                                break;

                            }
                            else if(m==2){
                                var $active = $('.wizard .nav-tabs li.active ');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m>3) {


                            var $active = $('.wizard .nav-tabs li.active');
                            $active.next().removeClass('disabled');


                            nextTab($active);


                        }


                    }
                });



            }
            /// Return Inbound Start Here


            function return_inbound_track(x,y,d1,d2)
            {
                //  alert(d1);



                $("#step1_return").find("button").remove();
                $("#step1_return").find("a").remove();
                $("#step1_return").find("i").remove();
                $("#step1_return").find("br").remove();

                $("#stage1_return").html("");
                $("#stage2_return").html("");
                $("#stage3_return").html("");

                $("#stage4_return").html("");
                $("#tb1_return").html("");
                $("#tb2_return").html("");
                $("#tb3_return").html("");
                $("#tb4_return").html("");
                $('#wizz_return .nav-tabs li').removeClass('active');
                ///  $('.wizard .nav-tabs li').addClass('disabled');
                $('#wizz_return .nav-tabs li').addClass('disabled');
                //   $("#first_return").addClass("active");



                gt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gt,function(ft)
                {

                    var   objms = "";
                    $("#myModal55").modal('show');
                    if($.trim(ft)=="N")
                    {

                        show_modal("Invoice No Invalid")

                    }
                    else
                    {


                        objms=JSON.parse(ft)
                    }

                    //  alert(ft);
                    var  datakttt=new Array();


                    var k;
                    for(var i = 0; i < objms.TRACK.length; i++) {

                        datakttt[i] = new Array();
                        datakttt[i][0] = objms.TRACK[i].order_id;

                        datakttt[i][1] = objms.TRACK[i].chalan_no;

                        datakttt[i][2] = objms.TRACK[i].chalan_date;
                        datakttt[i][3] = objms.TRACK[i].statusID;
                        datakttt[i][4] = objms.TRACK[i].timestamp;
                        datakttt[i][5] = objms.TRACK[i].comment;
                        datakttt[i][6] = objms.TRACK[i].statusName;
                        datakttt[i][7] = order_type(objms.TRACK[i].order_type);

                        //     alert("is"+datakttt[i][3])
                        if(datakttt[i][3]=="400")
                        {

///stage 1
                            $("#stage1_return").html("<h4>"+datakttt[i][4]+"</h4>");
                            //$("#step1_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br></center>");
                            if(d1!="null") {
                                $("#step1_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#step1_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }

                            $("#tb1_return").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")


                        }  else if( datakttt[i][3]=="411")
                        {
                            // stage 2


                            $("#step2_return").find("button").remove();
                            $("#step2_return").find("a").remove();
                            $("#step2_return").find("i").remove();
                            $("#step2_return").find("br").remove();
                            $("#stage2_return").html("<h4>"+datakttt[i][4]+"</h4>");

                           // $("#step2_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br></center>");
                            if(d1!="null") {
                                $("#step2_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#step2_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }





                            $("#tb2_return").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }
                        else if(datakttt[i][3]=="412")
                        {
                            $("#step3_return").find("button").remove();
// stage 3
                            $("#step3_return").find("br").remove();
                            $("#step3_return").find("a").remove();
                            $("#step3_return").find("br").remove();
                            $("#stage3_return").html("<h4>"+datakttt[i][4]+"</h4>");
                         //   $("#step3_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br></center>");

                            if(d1!="null") {
                                $("#step3_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#step3_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }


                            $("#tb3_return").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")

                        }

                        else if(datakttt[i][3]=="414")
                        {
// stage 4
                            $("#complete_return").find("button").remove();
                            $("#complete_return").find("a").remove();
                            $("#complete_return").find("i").remove();
                            $("#complete_return").find("br").remove();
                            $("#stage4_return").html("<h4>"+datakttt[i][4]+"</h4>");

                        //    $("#complete_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='send
                            // _data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br></center>");

                            if(d1!="null") {
                                $("#complete_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='return_send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button> <br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#complete_return").append("<center><button id='" + datakttt[i][1] + "' title='" + datakttt[i][2] + "' name='" + datakttt[i][0] + "' onclick='return_send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }


                            $("#tb4_return").append("<tr><td>"+datakttt[i][1]+"</td><td>"+datakttt[i][0]+"</td><td>"+datakttt[i][2]+"</td><td>"+datakttt[i][7]+"</td><td>"+datakttt[i][5]+"</td></tr>")
                        }
                        if(datakttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttt.length);}
                    }

                    for(var m=1;m<=parseInt(k);m++)
                    {
//alert("isss"+m)
                        if(m<=3)
                        {
                            if(m==1)
                            {

//alert('first')

                                $("#first_return").removeClass("disabled");

                                //nextTab($active);
                                //$("#first").addClass("active");
                                $("#first_return>a").click();
                                // $(".wizard .nav-tabs li").addClass("disabled");

                            }

                            else if(m==2){
                                // alert('second')
                                var $active = $('#wizz_return .nav-tabs li.active');
                                $active.next().removeClass('disabled');

                                nextTab($active);
                            }

                            else if(m==3){
                                ///  alert('third')
                                var $active = $('#wizz_return .nav-tabs li.active');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m==4) {

///alert('forth')
                            var $active = $('#wizz_return .nav-tabs li.active');
                            $active.next().removeClass('disabled');
                            nextTab($active);


                        }


                    }
                });
            }






            ///End Her


            function outbound_tracking(x,y,d1,d2)
            {


                $("#steps1").find("button").remove();
                $("#steps1").find("a").remove();
                $("#steps1").find("i").remove();
                $("#steps1").find("br").remove();

                $("#stages1").html("");
                $("#stages2").html("");
                $("#stages3").html("");

                $("#stages4").html("");
                $("#tbd1").html("");
                $("#tbd2").html("");
                $("#tbd3").html("");
                $("#tbd4").html("");
                $('#wiz .nav-tabs li').removeClass('active');
                $('#wiz .nav-tabs li').addClass('disabled');

                var objmss="";
                gtt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gtt,function(ftt) {

                    var objms = "";
                    $("#myModal3").modal('show');
                    if ($.trim(ftt) == "N") {

                        show_modal("Invoice No Invalid")

                    }
                    else {


                        objmss = JSON.parse(ftt)
                    }


                    datakttttt=new Array();


                    var k;
                    for(var i = 0; i < objmss.TRACK.length; i++) {

                        datakttttt[i] = new Array();
                        datakttttt[i][0] = objmss.TRACK[i].order_id;

                        datakttttt[i][1] = objmss.TRACK[i].chalan_no;

                        datakttttt[i][2] = objmss.TRACK[i].chalan_date;
                        datakttttt[i][3] = objmss.TRACK[i].statusID;
                        datakttttt[i][4] = objmss.TRACK[i].timestamp;
                        datakttttt[i][5] = objmss.TRACK[i].comment;
                        datakttttt[i][6] = objmss.TRACK[i].statusName;
                        datakttttt[i][7] = order_type(objmss.TRACK[i].order_type);


                        if(datakttttt[i][3]=="401")
                        {

///stage 1
                            $("#stages1").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            } else {

                                $("#steps1").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_dispatch_Advice(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }



                            $("#tbd1").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")


                        }  else if(datakttttt[i][3]=="415" || datakttttt[i][3]=="416" || datakttttt[i][3]=="417")
                        {
                            // stage 2


                            $("#steps2").find("button").remove();
                            $("#steps2").find("a").remove();
                            $("#steps2").find("i").remove();
                            $("#steps2").find("br").remove();

                            $("#stages2").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_pickpack(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#steps2").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }$("#tbd2").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }
                        else if(datakttttt[i][3]=="418")
                        {
                            $("#steps3").find("button").remove();
// stage 3
                            $("#steps3").find("br").remove();
                            $("#steps3").find("a").remove();
                            $("#steps3").find("i").remove();
                            $("#stages3").html("<h4>"+datakttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgoods(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }

                            else {


                                $("#steps3").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_data(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }
                            $("#tbd3").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")

                        }

                        else if(datakttttt[i][3]=="419")
                        {
// stage 4
                            $("#status_print").html("GOODS DELIVERED");


                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }
                        else if(datakttttt[i][3]=="412" || datakttttt[i][3]=="413" || datakttttt[i][3]=="414" || datakttttt[i][3]=="404")
                        {
// stage 4
                           $("#status_print").html("RTO");

                           // alert('')
                            $("#completes").find("button").remove();
                            $("#completes").find("a").remove();
                            $("#completes").find("i").remove();
                            $("#completes").find("br").remove();
                            $("#stages4").html("<h4>"+datakttttt[i][4]+"</h4>");

                            if(d1!="null") {
                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#completes").append("<center><button id='" + datakttttt[i][1] + "' title='" + datakttttt[i][2] + "' name='" + datakttttt[i][0] + "' onclick='send_allgood_deliver(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }$("#tbd4").append("<tr><td>"+datakttttt[i][1]+"</td><td>"+datakttttt[i][0]+"</td><td>"+datakttttt[i][2]+"</td><td>"+datakttttt[i][7]+"</td><td>"+datakttttt[i][5]+"</td></tr>")
                        }




                        if(datakttttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(datakttttt.length);}
                    }

                    for(var m=1;m<=parseInt(k);m++)
                    {

                        if(m<=3)
                        {
                            if(m==1)
                            {



                                 $("#firsts").removeClass("disabled");
                                //$("#firsts").addClass("active");
                                //nextTab($active);
                                //$("#first").addClass("active");
                                $("#firsts>a").click();
                                // $(".wizard .nav-tabs li").addClass("disabled");

                            }
                            else if(k==3 && m==3)
                            {





                                break;

                            }
                            else if(m==2){
                                var $active = $('#wiz .nav-tabs li.active ');
                                $active.next().removeClass('disabled');


                                nextTab($active);
                            }

                        } else if(m>3) {


                            var $active = $('#wiz .nav-tabs li.active');
                            $active.next().removeClass('disabled');


                            nextTab($active);


                        }


                    }


                });






            }




            ///Stock Transfer





            function stock_tracking(x,y,d1,d2)
            {

//alert(x)
                $("#stepss1").find("button").remove();
                $("#stepss1").find("a").remove();
                $("#stepss1").find("i").remove();
                $("#stagess1").html("");
                $("#stagess2").html("");
                $("#stagess3").html("");

                $("#stagess4").html("");
                $("#tbdd1").html("");
                $("#tbdd2").html("");
                $("#tbdd3").html("");
                $("#tbdd4").html("");
                $('#wizzzz .nav-tabs li').removeClass('active');
                $('#wizzzz .nav-tabs li').addClass('disabled');
                $("#firstss").addClass("active");
                var objmss="";
                gttt={"challan_no":x,"order_id":y};
                $.get("inbound_tracking.php",gttt,function(fttt) {

                    var objmss = "";
                    $("#myModal44").modal('show');
                    if ($.trim(fttt) == "N") {

                        show_modal("Invoice No Invalid")

                    }
                    else {


                        objmss = JSON.parse(fttt)
                    }


                    dataktttttt=new Array();


                    var k;
                    for(var i = 0; i < objmss.TRACK.length; i++) {

                        dataktttttt[i] = new Array();
                        dataktttttt[i][0] = objmss.TRACK[i].order_id;

                        dataktttttt[i][1] = objmss.TRACK[i].chalan_no;

                        dataktttttt[i][2] = objmss.TRACK[i].chalan_date;
                        dataktttttt[i][3] = objmss.TRACK[i].statusID;
                        dataktttttt[i][4] = objmss.TRACK[i].timestamp;
                        dataktttttt[i][5] = objmss.TRACK[i].comment;
                        dataktttttt[i][6] = objmss.TRACK[i].statusName;
                        dataktttttt[i][7] = order_type(objmss.TRACK[i].order_type);


                        if(dataktttttt[i][3]=="402")
                        {

///stage 1
                            $("#stagess1").html("<h4>"+dataktttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#stepss1").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_dispatch(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#stepss1").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_dispatch(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }
                            $("#tbdd1").append("<tr><td>"+dataktttttt[i][1]+"</td><td>"+dataktttttt[i][0]+"</td><td>"+dataktttttt[i][2]+"</td><td>"+dataktttttt[i][7]+"</td><td>"+dataktttttt[i][5]+"</td></tr>")


                        }  else if(dataktttttt[i][3]=="420" )
                        {
                            // stage 2
                           // alert('');

                            $("#stepss2").find("button").remove();
                            $("#stepss2").find("a").remove();
                            $("#stepss2").find("i").remove();
                            $("#stepss2").find("br").remove();

                            $("#stagess2").html("<h4>"+dataktttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#stepss2").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_dispatch(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>");
                            }
                            else {

                                $("#stepss2").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_dispatch(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }$("#tbdd2").append("<tr><td>"+dataktttttt[i][1]+"</td><td>"+dataktttttt[i][0]+"</td><td>"+dataktttttt[i][2]+"</td><td>"+dataktttttt[i][7]+"</td><td>"+dataktttttt[i][5]+"</td></tr>")

                        }


                        else if(dataktttttt[i][3]=="421")
                        {
// stage 4
                            $("#completess").find("button").remove();
                            $("#completess").find("i").remove();
                            $("#completess").find("a").remove();
                            $("#completess").find("br").remove();
                            $("#stagess4").html("<h4>"+dataktttttt[i][4]+"</h4>");
                            if(d1!="null") {
                                $("#completess").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_delivered(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br></br> <a href='" + d1 + "' download='" + d1 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Customer Copy</a><a href='" + d2 + "' download='" + d2 + "'><i class='fa fa-file-pdf-o fa-2x'></i>Company Copy</a></center>")
                            }
                            else {

                                $("#completess").append("<center><button id='" + dataktttttt[i][1] + "' title='" + dataktttttt[i][2] + "' name='" + dataktttttt[i][0] + "' onclick='send_stock_delivered(this.id,this.name,this.title)' type='button' class='btn btn-default  '>Show more</button><br><br><a href='#'><i class='fa fa-warning'></i>Sorry File is not available </a></center>");

                            }
                            $("#tbdd4").append("<tr><td>"+dataktttttt[i][1]+"</td><td>"+dataktttttt[i][0]+"</td><td>"+dataktttttt[i][2]+"</td><td>"+dataktttttt[i][7]+"</td><td>"+dataktttttt[i][5]+"</td></tr>")
                        }
                        if(dataktttttt[i][6]!="Order Canceled")
                        {
                            k=parseInt(dataktttttt.length);}
                    }

                    for(var m=1;m<=parseInt(k);m++) {

if(m==1)
{
    $("#firstss>a").click();
}else if(m>=2) {
    var $active = $('#wizzzz .nav-tabs li.active ');
    $active.next().removeClass('disabled');


    nextTab($active);
}      }


                });






            }
            function send_stock_dispatch(x,y,z)
            {

                $("#myModal44").modal('hide');
                $("#myModal1").modal('show');

                quersy={"challan_no":x,"order_id":y};
                $.get("send_dispatch.php",quersy,function(er){


            //       alert(er);
                    var   objm = "";
                    $("#modal_asn").html("");
                    if($.trim(er)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objm=JSON.parse(er)
                    }

                   // alert(er);
                    datact=new Array();


                    datavt=new Array();

                    for(var i = 0; i < objm.COMPANY.length; i++) {

                        datact[i] = new Array();
                        datact[i][0] = objm.COMPANY[i].companyName;
                        datact[i][1] = objm.COMPANY[i].tinNo;
                        datact[i][2] = objm.COMPANY[i].cinNo;

                        datact[i][3] = objm.COMPANY[i].companyRefPerson;
                        datact[i][4] = objm.COMPANY[i].companyRefPersonNo;
                        datact[i][5] = objm.COMPANY[i].careOfName;
                        datact[i][6] = objm.COMPANY[i].careOfAddress;

                        datact[i][7] = objm.COMPANY[i].consignneeName;
                        datact[i][8] = objm.COMPANY[i].consigneeAddress;
                        datact[i][9] = objm.COMPANY[i].conContactName;
                        datact[i][10] = objm.COMPANY[i].conContactNo;
                        datact[i][11] = objm.COMPANY[i].fromName;
                        datact[i][12] = objm.COMPANY[i].fromAddress;
                        datact[i][13] = objm.COMPANY[i].fromContactName;
                        datact[i][14] = objm.COMPANY[i].fromContactNumber;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+x+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+z+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>"+datact[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datact[i][5]+"</td><td>"+datact[i][6]+"</td><td>"+datact[i][1]+"</td><td>"+datact[i][2]+"</td><td>"+datact[i][3]+"</td><td>"+datact[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>To : "+datact[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datact[i][9]+"</td><td>"+datact[i][8]+"</td><td>"+datact[i][10]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#003'>From :&nbsp;&nbsp;"+datact[i][11]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='003' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Address</th><th>Consignee Name</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datact[i][12]+"</td><td>"+datact[i][13]+"</td><td>"+datact[i][14]+"</td></tr> </tbody> </table></div></div></div><br>");

                    }


                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");




var data_notes=new Array();

                    for(var p = 0; p < objm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objm.NOTES[p].description;
                        data_notes[p][1] = objm.NOTES[p].timestamp;
                        data_notes[p][2] = objm.NOTES[p].statusName;
                        data_notes[p][3] = objm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }



                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#lr_1001'>LR Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='lr_1001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>LR No.</th><th>LR Date</th> <th>Driver Name</th><th>Driver Mob.</th><th>Transport Vendor ID</th><th>Vehicle No.</th><th>Pickup Time</th> </tr> </thead> <tbody id='lr_appends'> </tbody> </table></div></div></div><br>");

                    var data_lr=new Array();

                    for(var k = 0; k < objm.DATA.length; k++) {

                        data_lr[k] = new Array();
                        data_lr[k][0] = objm.DATA[k].lr_no;
                        data_lr[k][1] = objm.DATA[k].lr_date;
                        data_lr[k][2] = objm.DATA[k].driver_name;
                        data_lr[k][3] = objm.DATA[k].driver_mobile_no;
                        data_lr[k][4] = objm.DATA[k].transport_vendor_id;
                        data_lr[k][5] = objm.DATA[k].vehicle_no;
                        data_lr[k][6] = objm.DATA[k].pikupTime;





                        $("#lr_appends").append("<tr><td>"+data_lr[k][0]+"</td><td>"+data_lr[k][1]+"</td><td>"+data_lr[k][2]+"</td><td>"+data_lr[k][3]+"</td><td>"+data_lr[k][4]+"</td><td>"+data_lr[k][5]+"</td><td>"+data_lr[k][6]+"</td></tr>")
                    }

                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>Perunit Price</th><th>UOM</th> <th>Total Price</th> <th>Bom COde</th> <th>Bom Descriptions</th> <th>Bom Quantity</th></tr> </thead> <tbody id='send_stock_dispatch_append' ></tbody></table>");
                    for(var j = 0; j < objm.ITEM.length; j++) {

                        datavt[j] = new Array();
                        datavt[j][0] = objm.ITEM[j].item_code;
                        datavt[j][1] = objm.ITEM[j].material_name;
                        datavt[j][2] = objm.ITEM[j].order_quantity;
                        datavt[j][3] = objm.ITEM[j].per_unit_price;
                        datavt[j][4] = objm.ITEM[j].unitOfMeasurement;
                        datavt[j][5] = objm.ITEM[j].total_price;
                        datavt[j][6] = objm.ITEM[j].bomCode;
                        datavt[j][7] = objm.ITEM[j].bomName;
                        datavt[j][8] = objm.ITEM[j].bom_quantity;
                        if(datavt[j][6]==null)
                        {
                            $("#send_stock_dispatch_append").append("<tr><td>"+datavt[j][0]+"</td><td>"+datavt[j][1]+"</td><td>"+datavt[j][2]+"</td><td>"+datavt[j][3]+"</td><td>"+datavt[j][4]+"</td><td>"+datavt[j][5]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                        else
                        {
                            $("#send_stock_dispatch_append").append("<tr><td>"+datavt[j][0]+"</td><td>"+datavt[j][1]+"</td><td>"+datavt[j][2]+"</td><td>"+datavt[j][3]+"</td><td>"+datavt[j][4]+"</td><td>"+datavt[j][5]+"</td><td>"+datavt[j][6]+"</td><td>"+datavt[j][7]+"</td><td>"+datavt[j][8]+"</td></tr>");
                        }


                    }
                });


            }








            function send_stock_delivered(x,y,z)
            {


                querrrsy={"challan_no":x,"order_id":y};
                $.get("stock_deliver_date.php",querrrsy,function(err){
                 //alert(err+"stock_dleiever");
                    var   objm = "";
                    $("#myModal44").modal('hide');
                    $("#myModal1").modal('show');
                    $("#modal_asn").html("");
                //    alert(err)
                    if($.trim(err)=="N")
                    {

                        show_modal("Sorry Data Cannot Find")

                    }
                    else
                    {


                        objm=JSON.parse(err)
                    }

                    // alerrt(err);
                    datacct=new Array();


                    datavvt=new Array();

                    for(var i = 0; i < objm.COMPANY.length; i++) {

                        datacct[i] = new Array();
                        datacct[i][0] = objm.COMPANY[i].companyName;
                        datacct[i][1] = objm.COMPANY[i].tinNo;
                        datacct[i][2] = objm.COMPANY[i].cinNo;

                        datacct[i][3] = objm.COMPANY[i].companyRefPerson;
                        datacct[i][4] = objm.COMPANY[i].companyRefPersonNo;
                        datacct[i][5] = objm.COMPANY[i].careOfName;
                        datacct[i][6] = objm.COMPANY[i].careOfAddress;

                        datacct[i][7] = objm.COMPANY[i].consignneeName;
                        datacct[i][8] = objm.COMPANY[i].consigneeAddress;
                        datacct[i][9] = objm.COMPANY[i].conContactName;
                        datacct[i][10] = objm.COMPANY[i].conContactNo;
                        datacct[i][11] = objm.COMPANY[i].fromName;
                        datacct[i][12] = objm.COMPANY[i].fromAddress;
                        datacct[i][13] = objm.COMPANY[i].fromContactName;
                        datacct[i][14] = objm.COMPANY[i].fromContactNumber;
                        $("#modal_asn").append("<div class='col-lg-6'><label>Challan no : "+x+"</label></div><div class='col-lg-6'><label class='pull-right'>Date :"+z+"</label></div><br><br>");

                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>"+datacct[i][0]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>C/O Name</th><th>C/O Address</th> <th>Tin No</th> <th>Cin No</th><th>Reference Person</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datacct[i][5]+"</td><td>"+datacct[i][6]+"</td><td>"+datacct[i][1]+"</td><td>"+datacct[i][2]+"</td><td>"+datacct[i][3]+"</td><td>"+datacct[i][4]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#002'>"+datacct[i][7]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='002' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datacct[i][9]+"</td><td>"+datacct[i][8]+"</td><td>"+datacct[i][10]+"</td></tr> </tbody> </table></div></div></div>");
                        $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#0008'>From : "+datacct[i][11]+"</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='0008' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Consignee Reference Name</th><th>Consignee Address</th> <th>Contact No.</th> </tr> </thead> <tbody ><tr><td>"+datacct[i][13]+"</td><td>"+datacct[i][12]+"</td><td>"+datacct[i][14]+"</td></tr> </tbody> </table></div></div></div><br>");

                    }


                    $("#modal_asn").append(" <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#notes_001'>Notes</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='notes_001' class='panel-collapse collapse'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr>  <th>Status Name</th><th>Description</th> <th>Created By</th><th>Time</th> </tr> </thead> <tbody id='notes_append'> </tbody> </table></div></div></div><br>");




var data_notes=new Array();

                    for(var p = 0; p < objm.NOTES.length; p++) {

                        data_notes[p] = new Array();
                        data_notes[p][0] = objm.NOTES[p].description;
                        data_notes[p][1] = objm.NOTES[p].timestamp;
                        data_notes[p][2] = objm.NOTES[p].statusName;
                        data_notes[p][3] = objm.NOTES[p].createdBy;




                        $("#notes_append").append("<tr><td>"+data_notes[p][2]+"</td><td>"+data_notes[p][0]+"</td><td>"+data_notes[p][3]+"</td><td>"+data_notes[p][1]+"</td></tr>")
                    }


                    $("#modal_asn").append(" <table class='table table-striped '> <thead> <tr>  <th>Item Code</th><th>Material Name</th> <th>Order Quantity</th><th>UOM</th><th>Bom Code</th><th>Bom Descriptions</th><th>Bom Quantitity</th></tr> </thead> <tbody id='send_stock_delivered_append'></tbody></table>");
                    for(var j = 0; j < objm.ITEM.length; j++) {

                        datavvt[j] = new Array();
                        datavvt[j][0] = objm.ITEM[j].item_code;
                        datavvt[j][1] = objm.ITEM[j].material_name;
                        datavvt[j][2] = objm.ITEM[j].order_quantity;
                        datavvt[j][3] = objm.ITEM[j].per_unit_price;
                        datavvt[j][4] = objm.ITEM[j].unitOfMeasurement;
                        datavvt[j][5] = objm.ITEM[j].total_price;
                        datavvt[j][6] = objm.ITEM[j].bomCode;
                        datavvt[j][7] = objm.ITEM[j].bomName;
                        datavvt[j][8] = objm.ITEM[j].bom_quantity;
                        if(datavvt[j][6]==null)
                        {
                            $("#send_stock_delivered_append").append(" <tr><td>"+datavvt[j][0]+"</td><td>"+datavvt[j][1]+"</td><td>"+datavvt[j][2]+"</td><td>"+datavvt[j][4]+"</td><td>--</td><td>--</td><td>--</td></tr>");
                        }
                        else
                        {
                            $("#send_stock_delivered_append").append(" <tr><td>"+datavvt[j][0]+"</td><td>"+datavvt[j][1]+"</td><td>"+datavvt[j][2]+"</td><td>"+datavvt[j][4]+"</td><td>"+datavvt[j][6]+"</td><td>"+datavvt[j][7]+"</td><td>"+datavvt[j][8]+"</td></tr>");
                        }


                    }
                });


            }



            ///// function call me for submit form
        function call_me()
        {



      $("#sub_btn").click();



        }


            //end here
        </script>


    </head>


    <body class="bds" onload="load();set_data()" style="background-color: white">


    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include ("include/menus.php");
        ?>
        <div id="page-wrapper" class="container-fluid">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tracking
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="panel panel-green   margin-bottom-40" >
                    <div class="panel-heading" >
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Main Company</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-12"> <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1q">Company Name:</label>
                                            <select  class="form-control" name="main_company_id"  required="" id="main_company_id" onchange="call_header(this.value)" >

                                                <option value="-1">Select</option>

                                            </select>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div id="append_cmp"></div>
                <div class="panel panel-green   margin-bottom-40" >
                    <div class="panel-heading" >
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Search Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-12">

                                    <form role="form" id="search_challan">

                                        <div style="display: none;" class="col-lg-2" id="cmp_type">
                                            <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>


                                    <center>
                                        <div class="panel" style="width: 600px;">


                                                <div class="input-group">
                                                    <input type="text" title="Challan no.." required class="form-control" name="search_challan"
                                                           placeholder="Challan No.." id="search_id"
                                                           aria-describedby="basic-addon2">
                                                    <span style="cursor: pointer" class="input-group-addon" onclick="call_me()"
                                                          id="basic-addon2"><span
                                                            class="glyphicon glyphicon-search"></span> Search</span>
                                                </div>

<input type="submit" id="sub_btn" style="display: none;">
                                        </div>
                                    </center>
                                    <br>
                                        </form>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       <lable style="font-size: 30px">OR</lable>
                                    </div>
                                </div><br><br>

                                <form id="search_by_date">
                                    <div class="col-lg-5">

                                        <div class="form-group">


                                            <div class="control-group">

                                                <div class="controls input-append date form_date pull-right"
                                                     data-date="" data-date-format="dd MM yyyy"
                                                     data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                    <span> <label class="control-label">Start Date </label></span>
                                                    <input required=""
                                                           style="border:1px inset rgba(0,0,0,0.3);border-radius: 4px;padding-left: 5px;height: 31px"
                                                           title="Date" size="26" type="text" id="dates"
                                                           placeholder="Date" readonly>


                                                    <span class="add-on"><i class="icon-th"><i
                                                                class="fa fa-calendar"></i></i></span>
                                                </div>
                                                <input type="hidden" id="dtp_input2" required=""/><br/>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">


                                            <div class="control-group">

                                                <div class="controls input-append date form_date" data-date=""
                                                     data-date-format="dd MM yyyy" data-link-field="dtp_input3"
                                                     data-link-format="yyyy-mm-dd">
                                                    <span> <label class="control-label">End Date </label></span> <input
                                                        style="border:1px inset rgba(0,0,0,0.3);border-radius: 4px;padding-left: 5px;height: 31px"
                                                        required="" title="Date" size="26" type="text" id="dates"
                                                        placeholder="Date" readonly>

                                                    <span class="add-on"><i class="icon-th"><i
                                                                class="fa fa-calendar"></i></i></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" required=""/><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="padding: 0">
                                        <button type="submit" class="form-control"><span
                                                class="glyphicon glyphicon-search"> </span> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <center>
                <div class="col-lg-12 ">
                    <ul class="nav nav-tabs center-block navbar-btn">
                        <li class="active" id="ins"><a href="#tab1" data-toggle="tab">Inbound</a></li>
                        <li class="list-inline" id="outs"><a href="#tab2" id="inbound_delivery" class="btn-link"
                                                             data-toggle="tab">Outbound</a></li>
                        <li id="stock"><a href="#tab3" data-toggle="tab">Stock Transfer</a></li>
                        <li id="return_stock"><a href="#tab4" data-toggle="tab">Return Inbound</a></li>
                        <li id="sto1"><a href="#tab5" data-toggle="tab">STO</a></li>
                    </ul>
                    <div class="tab-content"><br><br>
                        <div class="tab-pane active col-lg-12" id="tab1">
                            <div class="panel-group" id="accordion">





                                <table id="inbound" class='table table-striped'>
                                    <thead>

                                    <tr>
                                        <th>Shipper Name</th>
                                        <th>Consignee name</th>
                                        <th>Challan no</th>
                                        <th>Time</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Instruction</th>



                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="panel-group" id="accordion1">
                                <table id="Outbound" class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Shipper Name</th>
                                        <th>Consignee name</th>
                                        <th>Challan no</th>
                                        <th>Time</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Instruction</th>
                                        <th>Partial Order</th>

                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="panel-group" id="accordion2">
                                <table id="stocktransfer" class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Shipper Name</th>
                                        <th>Consignee name</th>
                                        <th>Challan no</th>
                                        <th>Time</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Instruction</th>

                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <div class="panel-group" id="accordion3">
                                <table id="return_stock_data" class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Shipper Name</th>
                                        <th>Consignee name</th>
                                        <th>Challan no</th>
                                        <th>Time</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Instruction</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab5">
                            <div class="panel-group" id="accordion5">
                                <table id="sto" class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>Shipper Name</th>
                                        <th>Consignee name</th>
                                        <th>Challan no</th>
                                        <th>Time</th>
                                        <th>Order Type</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Instruction</th>

                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>


        </div>


    </div>


    <!-- Modal Inbound-->
    <div class="modal fade" id="myModal" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Inbound Tracking</h4>
                </div>
                <div class="modal-body">


                    <div class="wizard" id="wizz">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" id="first" class="disabled">
                                    <center><h4>ASN</h4></center>
                                    <a href="#step1" style="cursor: none" data-toggle="tab" aria-controls="step1"
                                       role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-up"></i>
                            </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <center><h4>Inbound</h4></center>
                                    <a href="#step2" style="cursor: none" data-toggle="tab" aria-controls="step2"
                                       role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <center><h4>Quality Check</h4></center>
                                    <a href="#step3" style="cursor: none" data-toggle="tab" aria-controls="step3"
                                       role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <center><h4>Goods Receipt</h4></center>
                                    <a href="#complete" style="cursor: none" data-toggle="tab" aria-controls="complete"
                                       role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                    </a>
                                </li>

                            </ul>
                            <div class="col-lg-3 text-center" id="stage1"><h4></h4></div>
                            <div id="stage2" class="col-lg-3 text-center"></div>
                            <div id="stage3" class="col-lg-3 text-center"></div>
                            <div id="stage4" class="col-lg-3 text-center"></div>
                        </div>

                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h4>Step 1</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb1"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" disabled="" id="step2">
                                    <h4>Step 2</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb2"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <h4>Step 3</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb3"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="complete">
                                    <h4>Completed</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb4"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>


                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">


                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
        </div></div>


        <!--Oubound Modal-->





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
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="myModal12" style="overflow:auto;display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


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
        <div class="modal fade" id="myModal22" style="overflow:auto;" data-backdrop="static" role="dialog">
            <div class="modal-dialog" style="width: 800px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Outbound Challan Details </h4>
                    </div>
                    <div id="modal_quality" class="modal-body">


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- /.row -->

        <!-- /.row -->

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
        <!-- /.row -->


    <!-- /.container-fluid -->


    <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->


    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>

    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="jquery.auto-complete.js"></script>


    <script type="text/javascript" src="js/bootstrapValidator.js"></script>

    <script type="text/javascript">
        $('.form_date').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });


    </script>


    <script type="text/javascript">
        $(function () {


            $(".dropdown").click(function()
            {


                $(this).parent().children("ul").slideToggle();



            });
            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();



            });

$("#change_password").submit(function()
{
$("#not_match").hide();
if($("#new_pass").val()==$("#conf_pass").val()) {

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


            $(".treeview").click(function()
            {


                $(this).find(".treeview-menu").slideToggle();


            });
            ///
            $("#search_challan").submit(function () {
                search_challan();

                return false;
            });

            $("#search_by_date").submit(function () {

                search_by_date();
                return false;


            });


            //Wizard
            $('.modal-body a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });


        });


        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
            $(elem).addClass("active");
        }
        function prevTab(elem) {
            $(elem).find('a[data-toggle="tab"]').click();

        }


        function show_modal(ac) {

            $("#show_mes").html("");

            /////////////////


            $("#myModal0").modal({                    // wire up the actual modal functionality and show the dialog
                "backdrop": "static",
                "keyboard": true,
                "show": true                    // ensure the modal is shown immediately
            });

            $("#show_mes").html(ac);

        }
        function set_data()
        {
            var onm;
            //      alert('')
            $.post("autho.php","",function(sd)
            {
                // alert(sd);
                onm=JSON.parse(sd);

                datas1=new Array();




                for(var i = 0; i < onm.Details.length; i++) {

                    datas1[i]=new Array();
                    datas1[i][0]=onm.Details[i].uiRole;
                    datas1[i][1]=onm.Details[i].roleName;
                    var page=(onm.Details[i].roleName).replace(" ","");
                    if(datas1[i][1]=="BILL")
                    {

                        $("#menus2").append(" <li><a href='#'><i class='fa fa-ticket'></i>Bill</a></li>");
                    }
                    else if(datas1[i][1]=="INBOUND")
                    {

                        $("#menus1").append("<li><a href='INBOUND.php'> <i class='fa fa-archive'></i> Inbound</a></li>");

                    }
                    else if(datas1[i][1]=="OUTBOUND")
                    {

                        $("#menus1").append("<li><a href='OUTBOUND.php'><i class='fa fa-windows'></i> Outbound</a></li>");

                    }
                    else if(datas1[i][1]=="STOCK TRANSFER")
                    {

                        $("#menus1").append("<li><a href='STOCKTRANSFER.php'><i class='fa fa-building'></i> Stock Transfer</a></li>");

                    }
                    else if(datas1[i][1]=="STOCK")
                    {

                        $("#menus1").append("<li><a href='STOCK.php'><i class='fa fa-shopping-cart'></i> Stock</a></li>");

                    }
                    else if(datas1[i][1]=="TRACK")
                    {

                        $("#menus1").append("<li><a href='TRACK.php'><i class='fa fa-map-marker'></i> Track</a></li>");

                    }
                    else if(datas1[i][1]=="MATERIAL LIST")
                    {

                        $("#menus1").append("<li><a href='MATERIALLIST.php'><i class='fa fa-list'></i>Material List</a></li>");

                    }
                    else if(datas1[i][1]=="DELIVERY UPDATE")
                    {

                        $("#menus1").append("<li><a href='DELIVERYUPDATE.php'><i class='fa fa-edit'></i>Delivery Update</a></li>");

                    }
                }





            });







        }


        function set_items()
        {






            $("#ids_value").val($("#typeid").val());







        }



        function set_items_company()
        {


            $("#ids_value").val($("#company_typeids").val());





        }


        function validates()
        {


            $("#main")
                .data('bootstrapValidator')
                .updateStatus("co", 'NOT_VALIDATED')
                .validateField("co");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("cof", 'NOT_VALIDATED')
                .validateField("cof");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("shipper", 'NOT_VALIDATED')
                .validateField("shipper");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("warehouse_id", 'NOT_VALIDATED')
                .validateField("warehouse_id");




        }
        function  call_by_company(ii)
        {


            $('#typeid').val("").attr("selected", "selected");


            $('#cmp_type>div>select').val("Company").attr("selected", "selected");
            $('#cmp_type>div>select').change();$("#ids_value").val(ii);
$("#ids_value").val(ii)


        }
        function call_by_sales(dd)
        {

            $('#company_typeids').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
            $('#cmp_type>div>select').change();



            load1(dd)
            validates();

        }

        function set_cmp(a)
        {


            if(a=="Company")
            {

                set_items_company();
            }
            else if(a=="Sales Office")
            {



                set_items()

            }
        }

    </script>
    <div class="modal fade" id="myModal44" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 900px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Stock Transfer Tracking</h4>
                </div>
                <div class="modal-body">


                    <div class="wizard" id="wizzzz">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" id="firstss" class="disabled">
                                    <center><h4>ASN</h4></center>
                                    <a href="#stepss1" style="cursor: none" data-toggle="tab" aria-controls="step1"
                                       role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-up"></i>
                            </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled" style="margin-left: 50px">
                                    <center><h4>Pickup</h4></center>
                                    <a href="#stepss2" style="cursor: none" data-toggle="tab" aria-controls="step2"
                                       role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>


                                <li role="presentation" class="disabled pull-right">
                                    <center><h4 >Goods Delivered</h4></center>
                                    <a href="#completess" style="cursor: none" data-toggle="tab"
                                       aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                    </a>
                                </li>

                            </ul>
                            <div class="col-lg-3 text-center" id="stagess1"><h4></h4></div>
                            <div id="stagess2" class="col-lg-3 text-center"></div>
                            <div id="stagess4" class="col-lg-6 text-center"></div>
                        </div>

                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="stepss1">
                                    <h4>Step 1</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tbdd1"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" disabled="" id="stepss2">
                                    <h4>Step 2</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tbdd2"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>

                                <div class="tab-pane" role="tabpanel" id="completess">
                                    <h4>Completed</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tbdd4"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>

                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">


                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
        </div>


    </div>


















    <div class="modal fade" id="myModal3" style="overflow: auto" data-backdrop="static" >
        <div class="modal-dialog" style="width: 900px;">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Outbound Tracking</h4>
                </div>
                <div class="modal-body">


                        <div id="wiz" class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">

                                    <li role="presentation" id="firsts" ><center><h4>Dispatch Advice</h4></center>
                                        <a href="#steps1" data-toggle="tab" aria-controls="steps1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-up"></i>
                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class=""><center><h4>Pick/Pack</h4></center>
                                        <a href="#steps2" data-toggle="tab" aria-controls="steps2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class=""><center><h4>Good Issue</h4></center>
                                        <a href="#steps3" data-toggle="tab" aria-controls="steps3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class=""><center><h4 id="status_print">Goods Delivered</h4></center>
                                        <a href="#completes" data-toggle="tab" aria-controls="completes" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                        </a>
                                    </li>
                                    <div class="col-lg-3 text-center" id="stages1"><h4></h4></div><div id="stages2" class="col-lg-3 text-center"></div><div id="stages3" class="col-lg-3 text-center"></div><div id="stages4" class="col-lg-3 text-center"></div>
                                </ul>
                            </div>

                            <form role="form">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="steps1">
                                        <h4>Step 1</h4><br>
                                        <table  class='table table-striped'>
                                            <thead>
                                            <tr>  <th>Challan No.</th>
                                                <th>Order ID</th>
                                                <th>Challan Date</th>
                                                <th>Order Type</th>

                                                <th>Comment</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tbd1" > </tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="btn btn-default pull-right">Show more</button>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" disabled="" id="steps2">
                                        <h4>Step 2</h4><br>
                                        <table  class='table table-striped'>
                                            <thead>
                                            <tr>  <th>Challan No.</th>
                                                <th>Order ID</th>
                                                <th>Challan Date</th>
                                                <th>Order Type</th>

                                                <th>Comment</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tbd2" > </tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="btn btn-default pull-right">Show more</button>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="steps3">
                                        <h4>Step 3</h4><br>
                                        <table  class='table table-striped'>
                                            <thead>
                                            <tr>  <th>Challan No.</th>
                                                <th>Order ID</th>
                                                <th>Challan Date</th>
                                                <th>Order Type</th>

                                                <th>Comment</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tbd3" > </tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="btn btn-default pull-right">Show more</button>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="completes">
                                        <h4>Completed</h4><br>
                                        <table  class='table table-striped'>
                                            <thead>
                                            <tr>  <th>Challan No.</th>
                                                <th>Order ID</th>
                                                <th>Challan Date</th>
                                                <th>Order Type</th>

                                                <th>Comment</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tbd4" > </tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="btn btn-default pull-right">Show more</button>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>









                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>







    <div class="modal fade" id="myModal1" style="overflow:auto;" data-backdrop="static" role="dialog">
        <div class="modal-dialog" style="width: 800px;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Order Details </h4>
                </div>
                <div id="modal_asn" class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


<!--   REturn Inbound Modal -->

    <div class="modal fade" id="myModal55" style="overflow: auto" data-backdrop="static" >
        <div class="modal-dialog" style="width: 800px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Return Inbound Tracking</h4>
                </div>
                <div class="modal-body">


                    <div class="wizard" id="wizz_return">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" id="first_return" class="disabled">
                                    <center><h4>ASN</h4></center>
                                    <a href="#step1_return" style="cursor: none" data-toggle="tab" aria-controls="step1"
                                       role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-up"></i>
                            </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <center><h4>Inbound</h4></center>
                                    <a href="#step2_return" style="cursor: none" data-toggle="tab" aria-controls="step2"
                                       role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <center><h4>Quantity Check</h4></center>
                                    <a href="#step3_return" style="cursor: none" data-toggle="tab" aria-controls="step3"
                                       role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <center><h4>Goods Receipt</h4></center>
                                    <a href="#complete_return" style="cursor: none" data-toggle="tab" aria-controls="complete"
                                       role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                    </a>
                                </li>

                            </ul>
                            <div class="col-lg-3 text-center" id="stage1_return"><h4></h4></div>
                            <div id="stage2_return" class="col-lg-3 text-center"></div>
                            <div id="stage3_return" class="col-lg-3 text-center"></div>
                            <div id="stage4_return" class="col-lg-3 text-center"></div>
                        </div>

                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="step1_return">
                                    <h4>Step 1</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb1_return"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" disabled="" id="step2_return">
                                    <h4>Step 2</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb2_return"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3_return">
                                    <h4>Step 3</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb3_return"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>
                                <div class="tab-pane" role="tabpanel" id="complete_return">
                                    <h4>Completed</h4><br>
                                    <table class='table table-striped'>
                                        <thead>
                                        <tr>
                                            <th>Challan No.</th>
                                            <th>Order ID</th>
                                            <th>Challan Date</th>
                                            <th>Order Type</th>

                                            <th>Comment</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tb4_return"></tbody>
                                    </table>
                                    <br>
                                    <button type="button" class="btn btn-default pull-right">Show more</button>

                                </div>

                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">


                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--End Here Modal-->
    </body>

    </html>
    <?php
}
else
{




    echo "<script>window.location='index.php'</script>";
}
?>