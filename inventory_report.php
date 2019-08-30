

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
<title>BMS Stock Report</title>
        <!-- Bootstrap Core CSS -->
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

        <script type="text/javascript" src="js/company_details.js"></script>

        <script type="text/javascript">

            var ksp="";
            addeditems=[];
            var indexs;














            var ko="";

            function load()
            {

                set_menus('<?php echo $_SESSION['list']?>');
                $.get("companylist.php","",function(hd)
                {

//alert(hd);

                    var a=hd;

                    setData(a);
                    ko =a;
                    //   $("#typeid").html("");


                });







                // setup autocomplete function pulling from currencies[] array

            }






            var datak;
            var levelOptions="<option value=''>Select Company</option>";
            function setData(arr) {
                ///$("#typeid").html("");




                    ko=arr;
                    var   obj = JSON.parse(arr);


                    datak=new Array();



                    var levelOption="";
                    var out=new Array();

                    for(var i = 0; i < obj.LIST.length; i++) {

                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].id;
                        datak[i][1]=obj.LIST[i].name;

                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        levelOptions +="<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);



                    }

                    $("#main_company_id").html(levelOptions);

//get_sale_office();
              //  get_warehouse_shipper();

                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);

            }


            function call_header(cmp_id)
            {
                $("#append_cmp").html("<img src='loader1.gif'>");
                set_company1(cmp_id)



            }






            function get_warehouse_shipper(tt)
            {

                query1 = {"sales_off": tt};
                $.get("get_warehouse.php", query1, function (hd) {


                    var a = hd;
                    //  alert(a+"ware");
                    if(a=='N')
                    {

                    }else {
                        set_warehouse_shipper(a);
                    }
                });


            }


            function set_warehouse_shipper(arr)
            {
                var obj = JSON.parse(arr);

                ship_data=arr;
                dataw = new Array();
                shipper = new Array();


                var warehouse = "";
                var shippr = "";
                var out = new Array();

                for (var i = 0; i < obj.WAREHOUSE.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.WAREHOUSE[i].warehouseId;
                    dataw[i][1] = obj.WAREHOUSE[i].wareHouseName;
                    /*   datak[i][2] = obj.LIST[i].tinNo;
                     datak[i][3] = obj.LIST[i].cinNo;*/
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    warehouse = warehouse + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";


                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //                        alert(warehouseOptions);
                }



                $("#warehouse_id").html(warehouse);

            }


            /////////////end get warehouse/////////


/////on cbnahge sales off /////
function onchage_sales()
{

    get_warehouse_shipper();

}


            ///// end on cbnahge sales off /////























            function delete_row(row)
            {



                var i=row.parentNode.parentNode.rowIndex;
                //alert(i+" "+index+" "+row);
                var n=i-1;
                document.getElementById('tbd').deleteRow(n);

                addeditems.splice(n,1);
                //indexs--;






            }



       function add_tables(wqa) {

$("#tbd").html("");
           obj = JSON.parse(wqa);

           data1 = new Array();
           for (var i = 0; i < obj.STOCK.length; i++) {


               data1[i] = new Array();
               data1[i][0] = obj.STOCK[i].item_code;
               data1[i][1] = obj.STOCK[i].material_name;
               data1[i][2] = obj.STOCK[i].Inbound;
               data1[i][3] = obj.STOCK[i].Outbound;
               data1[i][4] = obj.STOCK[i].Qcfail;
               data1[i][5] = obj.STOCK[i].stock;
               data1[i][6] = obj.STOCK[i].client_material_itemID;
               data1[i][7] = obj.STOCK[i].openingStock;
               data1[i][8] = obj.STOCK[i].returnStock;
               data1[i][9] = obj.STOCK[i].exchangeStock;

$("#tbd").append("<tr><td class='item_code'>"+data1[i][0]+"</td><td class='material_name'>"+data1[i][1].replace(/[^A-Za-z 0-9 \"-_*]+/ig,'')+"</td><td class='opening_stock'>"+data1[i][7]+"</td><td class='inbound'><a href='javascript:void(0)' title='"+data1[i][6]+"' onclick='inbound(this.title)'> "+data1[i][2]+" <i class='fa fa-folder-open fa-1x'></i></a></td><td class='outbound'><a href='javascript:void(0)' title='"+data1[i][6]+"' onclick='outbound(this.title)'>"+data1[i][3]+" <i class='fa fa-folder-open fa-1x'></i></a></td><td class='qty'>"+data1[i][4]+"</td><td class='stock'>"+data1[i][5]+"</td><td class='return_stock'>"+data1[i][8]+"</td><td class='exchange_stock'>"+data1[i][9]+"</td></tr>")

           }


       }



            function inbound(material_id)
            {

                var client_id =$("#ids_value").val();
                //alert(client_id+" "+cmt_id);
                var from=$("#dtp_input2").val();
                queres={"client_id":client_id,"material_id":material_id,"from":from,"warehouse_id":$("#warehouse_id").val()};
                $.get("get_all_inbound.php",queres,function(hk)
                {



                   // var x=hk;
                   // alert(x+"inbound");
                    //setData(a);
                    inbound_table(hk);



                });

            }








            function outbound(material_id)
            {

                var client_id =$("#ids_value").val();
                //alert(client_id+" "+cmt_id);
                var from=$("#dtp_input2").val();
                quers={"client_id":client_id,"material_id":material_id,"from":from,"warehouse_id":$("#warehouse_id").val()};
                $.get("get_all_outbound.php",quers,function(hd)
                {
//alert(hd)


                    outbound_table(hd);

                    //setData(a);




                });

            }




            function inbound_table(in_ret)
            {
                if($.trim(in_ret)=="N")
                {
                    show_modal("Sorry Data is Not Available")


                }
                else
                {

                    $("#inbound_tbd").html("");
                    $("#myModal3").modal({                    // wire up the actual modal functionality and show the dialog
                        "backdrop"  : "static",
                        "keyboard"  : true,
                        "show"      : true                    // ensure the modal is shown immediately
                    });

                }
                obj_ret = JSON.parse(in_ret);

                inbound_field = new Array();

                for (var i = 0; i < obj_ret.STATUS.length; i++) {


                    inbound_field[i] = new Array();
                    inbound_field[i][0] = obj_ret.STATUS[i].chalan_no;
                    inbound_field[i][1] = obj_ret.STATUS[i].saleable_quantity;
                    inbound_field[i][2] = obj_ret.STATUS[i].name;
                    inbound_field[i][3] = obj_ret.STATUS[i].address;
                    inbound_field[i][4] = obj_ret.STATUS[i].city;
                    inbound_field[i][5] = obj_ret.STATUS[i].postcode;


                    $("#inbound_tbd").append("<tr><td>"+inbound_field[i][0]+"</td><td>"+inbound_field[i][1]+"</td><td> "+inbound_field[i][2]+" </td><td>"+inbound_field[i][3]+" </td><td>"+inbound_field[i][4]+"</td><td>"+inbound_field[i][5]+"</td></tr>")

                }


            }

function outbound_table(outbound_ret)
{
   if($.trim(outbound_ret)=="N")
   {
     show_modal("Sorry Data is Not Available")


   }
    else
   {

       $("#outbound_tbd").html("");
       $("#myModal4").modal({                    // wire up the actual modal functionality and show the dialog
           "backdrop"  : "static",
           "keyboard"  : true,
           "show"      : true                    // ensure the modal is shown immediately
       });

   }


    obj_rets = JSON.parse(outbound_ret);

    outbound_field = new Array();

    for (var i = 0; i < obj_rets.STATUS.length; i++) {


       outbound_field[i] = new Array();
        outbound_field[i][0] = obj_rets.STATUS[i].chalan_no;
        outbound_field[i][1] = obj_rets.STATUS[i].saleable_quantity;
        outbound_field[i][2] = obj_rets.STATUS[i].name;
        outbound_field[i][3] = obj_rets.STATUS[i].address;
        outbound_field[i][4] = obj_rets.STATUS[i].city;
        outbound_field[i][5] = obj_rets.STATUS[i].postcode;


        $("#outbound_tbd").append("<tr><td>"+outbound_field[i][0]+"</td><td>"+outbound_field[i][1]+"</td><td> "+outbound_field[i][2]+" </td><td>"+outbound_field[i][3]+" </td><td>"+outbound_field[i][4]+"</td><td>"+outbound_field[i][5]+"</td></tr>")

    }


}



        </script>


    </head>

    <body class="bds" onload="load()"  >



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
                        Inventory Report
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

                    <form role="form" id="main">
 <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i>Report</h3>
                            </div>
                            <div class="panel-body">
                                <div style="display: none;" class="col-lg-2" id="cmp_type">
                                    <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>


                                <div class="form-group col-lg-4" id="shiper_select">
                                    <label for="exampleInputPassword1">WareHouse</label><br>
                                    <select id="warehouse_id"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="" required="">

                                    </select>
                                </div>
                                <div class="col-lg-3">
                                <div class="control-group">
                                    <label class="control-label">Date</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input required="" title="Date" size="26" type="text" id="dates" name="dates"   placeholder="Date"  readonly>

                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                        <input type="hidden" id="dtp_input2" required="" />
                                    </div>

                                </div>
                            </div>
                                <br>
                                <div class="col-lg-2" align="center"> <center><input type="submit"  class="btn btn-default" style="width: 150px"></center></div>
                            </div>
                            </div>
                    </form>
                        </div>














                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
                        </div>
                        <div class="panel-body">
<div class="col-lg-2"><input type="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="opening_stock"> <label>Opening Stock</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div><div class="col-lg-2"><input type="checkbox" id="ret_stock"> <label>Return Stock</label></div><div class="col-lg-2"><input type="checkbox" id="ex_stock"> <label>Exchange Stock</label></div>

                            <table id="tabl_expr" class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th class="item_code">Item Code</th>
                                        <th class="material_name">Material Name</th>
                                        <th class="opening_stock">Opening Stock</th>
                                        <th class="inbound">InBound</th>
                                        <th class="outbound">OutBound</th>
                                        <th class="qty">Quality Fail</th>
                                        <th class="stock">Stock</th>
                                        <th class="return_stock">Return Stock</th>
                                        <th class="exchange_stock">Exchange Stock</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbd">

                                    </tbody>
                                </table>


                        </div>


                    </div>
                <div class="row center-block"><div class="col-lg-1"><a id="dlink" download="" href="#" style="display: none;"></a><a href="#" id="exportexcel"><i class="fa fa-file-excel-o fa-2x"></i>Excel</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportpdf"><i class="fa fa-file-pdf-o fa-2x"></i>Pdf</a></div><div class="col-lg-2"><a href="javascript:void(0)" id="exportimage"><i  class="fa fa-file-image-o fa-2x"></i>Screen Shot</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportcsv"><i class="fa fa-file-code-o fa-2x"></i>CSV</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportword"><i class="fa fa-file-word-o fa-2x"></i>Doc</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exporttext"><i class="fa fa-file-text-o fa-2x"></i>Text</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportxml"><i class="fa fa-file-code-o fa-2x"></i>XML</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportppt"><i class="fa fa-file-powerpoint-o fa-2x"></i>Powerpoint</a></div></div>














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



    <script type="text/javascript">
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

            $("#exportexcel").bind('click', function (e) {
                $("#tabl_expr").tableExport({ type: "excel", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val(),dates:$("#dtp_input2").val(),warehousename:$("#warehouse_id option:selected").text(),Company_name:$("#typeid1 option:selected").text(),sales_office_name:$("#sales_off option:selected").text() });
            });
            $("#exportpdf").bind("click", function (e) {
                $("#tabl_expr").tableExport({ type: "pdf", escape: "false" ,tableName:'Inventory_Report_'+$("#dtp_input2").val()});
            });
            $("#exportimage").bind("click", function (e) {

                $("#tabl_expr").tableExport({ type: "png", escape: "false" ,tableName:'Inventory_Report_'+$("#dtp_input2").val()});
            });
            $("#exportcsv").bind("click", function (e) {
                $("#tabl_expr").tableExport({ type: "csv", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val() });
            });
            $("#exportppt").bind("click", function (e) {//alert();
                $("#tabl_expr").tableExport({ type: "powerpoint", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val() });
            });
            $("#exportxml").bind("click", function (e) {
                $("#tabl_expr").tableExport({ type: "xml", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val() });
            });
            $("#exportword").bind("click", function (e) {
                $("#tabl_expr").tableExport({ type: "doc", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val() });
            });
            $("#exporttxt").bind("click", function (e) {
                $("#tabl_expr").tableExport({ type: "txt", escape: "false",tableName:'Inventory_Report_'+$("#dtp_input2").val() });
            });
            $("#inbound_export").bind("click", function (e) {
                $("#inbound_tables").tableExport({ type: "excel", escape: "false",tableName:'Inbound_Stock_Report_'+$("#dtp_input2").val() });
            });
            $("#outbound_export").bind("click", function (e) {
                $("#outbound_tables").tableExport({ type: "excel", escape: "false",tableName:'Outbound_Stock_Report_'+$("#dtp_input2").val() });
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
            $("#opening_stock").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".opening_stock").hide();
                }else {


                    $(".opening_stock").show();
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

            $("#ret_stock").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".return_stock").hide();
                }else {


                    $(".return_stock").show();
                }






            });

            $("#ex_stock").click(function()
            {




                if($(this).prop("checked")==true)
                {


                    $(".exchange_stock").hide();
                }else {


                    $(".exchange_stock").show();
                }






            });


            $("#main").submit(function () {
                var main_date = $("#dtp_input2").val();


              if($("#dates").val()=="")
              {




                  show_modal("Please Select Date");



              }
                else {

                  $("#tbd").html("<center><img src='loader1.gif'></center>");
                  hs = {"client_id": $("#ids_value").val(), "dates": $("#dtp_input2").val(),"warehouse_id": $("#warehouse_id").val()};
                  $.post("result.php", hs, function (dff) {


                      if ($.trim(dff) != "") {
                          add_tables(dff);
                      }
                      else {
                        //  alert(dff);

                          show_modal("Sorry Data is not available on this date");

                      }


                  });


              }

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
            $('#cmp_type>div>select').change();
            $("#ids_value").val(ii);
            get_warehouse_shipper(ii)
           /* get_material();

            load1(ii);*/

        }
        function call_by_sales(dd)
        {

            $('#company_typeids').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
            $('#cmp_type>div>select').change();


            get_warehouse_shipper(dd)


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


    </body>

    </html>
    <?php
}
else
{




    echo "<script>window.location='index.php'</script>";
}
?>