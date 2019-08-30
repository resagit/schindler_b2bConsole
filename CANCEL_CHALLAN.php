

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
    <title>BMS Cancel Challan</title>
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
        table tr
        {

            cursor: pointer;
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



            var a=hd;

            setData(a);
            ko =a;
            //   $("#typeid").html("");


        });







        // setup autocomplete function pulling from currencies[] array

    }






    var datak;
    var levelOptions="";
    function setData(arr) {
        ///$("#typeid").html("");




        ko=arr;
        var   obj = JSON.parse(arr);


        datak=new Array();


        levelOptions="<option value=''>Select Company</option>";
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


        if(x=="400")
        {


            return "ASN";

        }
        else if(x=="401")
        {


            return "DSN"
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






    ///// end on cbnahge sales off /////




//////cancel order //////




    function  cancel_order(a,b,c)
    {
        //alert(a+" "+b+" "+c);
        $("#cancal_From")[0].reset();
        $("#myModal3").modal("show");
        $("#status").val(c);
        $("#cancel_oid").val(b);
        $("#cancel_challan").val(a);


    }

    function final_cancel()
    {

        var reason=$('#reason').val();
        if(reason=="")
        {
            reason="-"
        }else{
            reason=reason;
        }
        query1 = {"challan": $("#cancel_challan").val(),"cancel_oid":$("#cancel_oid").val(),"reason":reason};
        $.post("cancel_order.php", query1, function (hd) {

//alert(hd);
            if($.trim(hd)=="Y")
            {
                $("#myModal3").modal("hide");

                show_modal("Challan Canceled successfully");
                $("#main").submit();
                $("#status").val("");
                $('#reason').val("");
            }else if($.trim(hd)=="N")
            {
                show_modal("Falied to Cancel Challan..");
            }else{
                show_modal("Falied to Cancel Challan");
            }

        });
      //  alert(reason);
    }



    ////////////cancel order end////////


















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


            $("#tbd").append("<tr><td class='item_code'>"+data1[i][0]+"</td><td class='material_name'>"+data1[i][1].replace(/[^A-Za-z 0-9 \"-_*]+/ig,'')+"</td><td class='Opening Stock'>"+data1[i][7]+"</td><td class='inbound'><a href='javascript:void(0)' title='"+data1[i][6]+"' onclick='inbound(this.title)'> "+data1[i][2]+" <i class='fa fa-folder-open fa-1x'></i></a></td><td class='outbound'><a href='javascript:void(0)' title='"+data1[i][6]+"' onclick='outbound(this.title)'>"+data1[i][3]+" <i class='fa fa-folder-open fa-1x'></i></a></td><td class='qty'>"+data1[i][4]+"</td><td class='stock'>"+data1[i][5]+"</td></tr>")

        }


    }



    function inbound(material_id)
    {

        var client_id =$("#ids_value").val();
        //alert(client_id+" "+cmt_id);
        var from=$("#dtp_input2").val();
        queres={"client_id":client_id,"material_id":material_id,"from":from};
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
        quers={"client_id":client_id,"material_id":material_id,"from":from};
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
            inbound_field[i][4] = obj_ret.STATUS[i].postcode;
            inbound_field[i][5] = obj_ret.STATUS[i].city;


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
            outbound_field[i][4] = obj_rets.STATUS[i].postcode;
            outbound_field[i][5] = obj_rets.STATUS[i].city;


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
                        Cancel Challan
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





                    <div style="display: none;" class="col-lg-2" id="cmp_type">
                        <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>




                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Report</h3>
                        </div>
                        <div class="panel-body">

                            <div class="col-lg-2"></div>

                            <div class="col-lg-3">
                                <div class="control-group">
                                    <label class="control-label">From Date</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input required="" title="Date" size="26" type="text" id="from_dates" name="from_dates"   placeholder="From Date"  readonly>

                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                        <input type="hidden" id="dtp_input1" required="" /><br/>
                                    </div>

                                </div><br>
                            </div>
                            <div class="col-lg-3">
                                <div class="control-group">
                                    <label class="control-label"> To Date</label>
                                    <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input required="" title="Date" size="26" type="text" id="to_dates" name="to_dates"   placeholder="To Date"  readonly>

                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                        <input type="hidden" id="dtp_input2" required="" /><br/>
                                    </div>

                                </div><br>
                            </div><br>

                            <div class="col-lg-3" align="center"> <center><input type="submit"  class="btn btn-default" style="width: 150px"></center></div>
                        </div>
                    </div>
                </form>
            </div>














           <!-- <div class="panel panel-green  margin-bottom-40">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-2"><input type="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="opening_stock"> <label>Opening Stock</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>

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
                        </tr>
                        </thead>
                        <tbody id="tbd">

                        </tbody>
                    </table>


                </div>


            </div>-->
            <div class="col-lg-12 ">
                <ul class="nav nav-tabs center-block navbar-btn">
                    <li class="active" id="ins"><a href="#tab1" data-toggle="tab">Inbound</a></li>
                    <li class="list-inline" id="outs"><a href="#tab2" id="inbound_delivery" class="btn-link"
                                                         data-toggle="tab">Outbound</a></li>
                    <li id="stock"><a href="#tab3" data-toggle="tab">Stock Transfer</a></li>
                    <li id="return_stock"><a href="#tab4" data-toggle="tab">Return Inbound</a></li>
                    <li id="sto_btn"><a href="#tab5" data-toggle="tab">STO</a></li>
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
                        <div class="panel-group" id="accordion4">
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
          <!--  <div class="row center-block"><div class="col-lg-1"><a id="dlink" download="" href="#" style="display: none;"></a><a href="#" id="exportexcel"><i class="fa fa-file-excel-o fa-2x"></i>Excel</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportpdf"><i class="fa fa-file-pdf-o fa-2x"></i>Pdf</a></div><div class="col-lg-2"><a href="javascript:void(0)" id="exportimage"><i  class="fa fa-file-image-o fa-2x"></i>Screen Shot</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportcsv"><i class="fa fa-file-code-o fa-2x"></i>CSV</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportword"><i class="fa fa-file-word-o fa-2x"></i>Doc</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exporttext"><i class="fa fa-file-text-o fa-2x"></i>Text</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportxml"><i class="fa fa-file-code-o fa-2x"></i>XML</a></div><div class="col-lg-1"><a href="javascript:void(0)" id="exportppt"><i class="fa fa-file-powerpoint-o fa-2x"></i>Powerpoint</a></div></div>-->














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
            <form id="cancal_From">
            <div class="modal-content">
                <!-- dialog body -->

                <div class="modal-header"><h4>Cancel Challan</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">

                    <div id="show_mesg"  class="row">



                       <input type="hidden" id="cancel_oid" value="" >
                        <input type="hidden" id="cancel_challan" value="" >
                        <div class="col-sm-6">
                    <label id="" class="exampleInputEmail1q">Status:</label><input class="form-control" id="status"  readonly type="text">

                        </div>
                        <div class="col-sm-6">
                            <label id="" class="exampleInputEmail1q">Reason:</label><input class="form-control" id="reason" type="text">

                        </div>
                    </div>


                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"><button type="button" onclick="final_cancel();"  class="btn btn-primary">OK</button>
                    <button type="button"  data-dismiss="modal" class="btn btn-default">CLOSE</button></div>
            </div></form>
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
            $("#tabl_expr").tableExport({ type: "excel", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
        });
        $("#exportpdf").bind("click", function (e) {
            $("#tabl_expr").tableExport({ type: "pdf", escape: "false" ,tableName:'Stock_Report_'+$("#dtp_input2").val()});
        });
        $("#exportimage").bind("click", function (e) {

            $("#tabl_expr").tableExport({ type: "png", escape: "false" ,tableName:'Stock_Report_'+$("#dtp_input2").val()});
        });
        $("#exportcsv").bind("click", function (e) {
            $("#tabl_expr").tableExport({ type: "csv", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
        });
        $("#exportppt").bind("click", function (e) {//alert();
            $("#tabl_expr").tableExport({ type: "powerpoint", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
        });
        $("#exportxml").bind("click", function (e) {
            $("#tabl_expr").tableExport({ type: "xml", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
        });
        $("#exportword").bind("click", function (e) {
            $("#tabl_expr").tableExport({ type: "doc", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
        });
        $("#exporttxt").bind("click", function (e) {
            $("#tabl_expr").tableExport({ type: "txt", escape: "false",tableName:'Stock_Report_'+$("#dtp_input2").val() });
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


        $("#main").submit(function () {
            var to = $("#dtp_input2").val();
            var from = $("#dtp_input1").val();


            if(($("#from_dates").val()=="")  && ( $("#to_dates").val()==""))
            {




                show_modal("Please Select Date");



            }
            else {


                hs = {"client_id": $("#ids_value").val(), "to_dates": $("#dtp_input2").val(),"from_dates": $("#dtp_input1").val()};



                    $("#inbound tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
                    $("#Outbound tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
                    $("#stocktransfer tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");
                $("#sto tbody").html("  <tr> <td> </td><td> </td><td> </td><td> <img src='loader1.gif' ></td><td> </td></tr>");

                $.post("getOrderDataByDate_forc_cancel.php", hs, function (dff) {
               //     alert(dff);
                        $("#inbound tbody").html("");
                        $("#Outbound tbody").html("");
                        $("#stocktransfer tbody").html("");
                         $("#return_stock_data tbody").html("");
                    $("#sto tbody").html("");

                        var objmm = JSON.parse(dff);

                        if ($.trim(dff) == "N") {

                            show_modal("No Data Available")

                        }
                        else {


                            objmm = JSON.parse(dff)
                        }



                    if(objmm.TRACK.length<=0)
                    {

                        $("#inbound tbody").html("<center><label>Sorry No Data Found</label></center>");
                        $("#outbound_tbd tbody").html("<center><label>Sorry No Data Found</label></center>")

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
                            dataktt[i][8]= objmm.TRACK[i].statusName;
                            dataktt[i][10]= objmm.TRACK[i].orderType;
                            dataktt[i][11]= objmm.TRACK[i].toCompany;
                            dataktt[i][9]= objmm.TRACK[i].challan_url_company_copy;

                            if (dataktt[i][4] == "Inbound") {


                                    $("#inbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "'  lang='"+dataktt[i][8]+"' class='"+dataktt[i][9]+"' onclick='cancel_order(this.id,this.title,this.lang)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                            }
                            else if (dataktt[i][4] == "Outbound") {

                                    $("#Outbound tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='"+dataktt[i][8]+"' class='"+dataktt[i][9]+"' onclick='cancel_order(this.id,this.title,this.lang)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>");

                            }
                            else if (dataktt[i][4] == "Stock Transfer") {

                                $("#stocktransfer tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='"+dataktt[i][8]+"' class='"+dataktt[i][9]+"'  onclick='cancel_order(this.id,this.title,this.lang)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                            }else if (dataktt[i][4] == "Return Inbound") {

                                $("#return_stock_data tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='"+dataktt[i][8]+"' class='"+dataktt[i][9]+"'  onclick='cancel_order(this.id,this.title,this.lang)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][1] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + stock_id_check(dataktt[i][6]) + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")


                            }
                            else if (dataktt[i][4] == "STO") {
                                $("#sto tbody").append("<tr id='" + dataktt[i][2] + "' title='" + dataktt[i][5] + "' lang='"+dataktt[i][8]+"' class='"+dataktt[i][9]+"'  onclick='cancel_order(this.id,this.title,this.lang)'><td>" + dataktt[i][0] + "</td><td>" + dataktt[i][11] + "</td><td>" + dataktt[i][2] + "</td><td>" + dataktt[i][3] + "</td><td>" + dataktt[i][4] + "</td><td>" + dataktt[i][5] + "</td><td>" + dataktt[i][10] + "</td><td>" + dataktt[i][7] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-2x'></i></td></tr>")




                            }


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



    function  call_by_company(ii)
    {


        $('#typeid').val("").attr("selected", "selected");


        $('#cmp_type>div>select').val("Company").attr("selected", "selected");
        $('#cmp_type>div>select').change();

        $("#ids_value").val(ii);
        /* get_material();

         load1(ii);*/

    }
    function call_by_sales(dd)
    {

        $('#company_typeids').val("").attr("selected", "selected");
        $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
        $('#cmp_type>div>select').change();





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