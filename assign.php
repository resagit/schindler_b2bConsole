

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
            .assign
            {



            }
            .dones
            {





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

        <script type="text/javascript" src="js/company_details.js"></script>
        <script type="text/javascript">

            var choices=new Array();
            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');

                $.get("companylist.php","",function(hd)
                {



                    var a=hd;

                    setData(a);

                });


            }





            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {


                if (levelOptions == "") {

                    ko = arr;
                    var obj = JSON.parse(arr);


                    datak = new Array();

                    levelOptions="<option value=''>Select Client</option>";
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

                         levelOptions += "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";


                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);


                    }

                    $("#main_company_id").html(levelOptions);

                    //    get_sale_office();


                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);




                }

            }





var parse_id1="";
            function call_header(cmp_id)
            {
                parse_id1=cmp_id;
                //alert(parse_id1);
                $("#append_cmp").html("<img src='loader1.gif'>");
                set_company1(cmp_id)
               


            }














            function checks_field(v)
            {

                if(v=="")
                {



                    return "a";
                }
                else
                {


                    return v;
                }




            }

            function shipper_change(f)
            {


                $("#addr").val("");
                $("#cof").html("");
                $("#co").html("");
                $("#addr1").val("");
                $("#cin1").val("");
                $("#tin1").val("");
                $("#Ship_CIN").val("");
                $("#Ship_TIN").val("");

                var   objss = JSON.parse(ko);


                datam=new Array();



                for(var i = 0; i < objss.LIST.length; i++) {

                    datam[i]=new Array();
                    datam[i][0]=objss.LIST[i].id;
                    datam[i][1]=objss.LIST[i].name;
                    datam[i][2]=objss.LIST[i].tinNo;
                    datam[i][3]=objss.LIST[i].cinNo;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;





                    if(f==datam[i][0])
                    {


                        $("#Ship_CIN").val(datam[i][3]);
                        $("#Ship_TIN").val(datam[i][2]);





                        querss={"client_id":f};
                        $.get("add_cof.php",querss,function(cg)
                        {




                            if($.trim(cg)!="N")
                            {


                                setData(cg);
                                load1(f);


                            }
                            else
                            {



                                // alert($.trim(cg));
                                $("#cof").html("");
                                $("#co").html("");
                                $("#typeid").html("");



                            }

                        })

                    }


                }

                get_sale_office();
                get_material();


            }

            ////on change of sales office ///////

            function onchange_sale()
            {

                var sale_off=document.getElementById('sales_off').value;
                //   alert(sale_off);
                get_warehouse_shipper();
                load1(sale_off);

            }

            ////end on cghange of sales office ///////



            ////////////////////////get_sale_office/////////

            function get_sale_office() {


                //alert(ar1);
                var client_id=document.getElementById('main_company_id').value;
                query1 = {"client_Id": client_id};
                $.get("get_sale_office.php", query1, function (hd) {


                    var a = hd;
                    // alert(a);
                    if(a=='N')
                    {
                        $("#sales_off").html('');
                    }else {
                        set_sale_office(a);
                    }
                });

            }

            function set_sale_office(arr)
            {
                var obj = JSON.parse(arr);


                dataw = new Array();


                var sales_off = "";
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


                    // alert(datak[i][2]);
                    //alert(data[i][1]);

//                        alert(warehouseOptions);


                }
                /* $("#Ship_TIN").val(datak[0][2]);
                 $("#Ship_CIN").val(datak[0][3]);*/
                $("#sales_off").html(sales_off);
                var sales_id= $("#sales_off").val();
                get_warehouse_shipper();
                load1(sales_id);
            }
            /////////////////////////get warehouse//////
            var ship_data;
            function get_warehouse_shipper()
            {
                var sales_off=document.getElementById('sales_off').value;
                query1 = {"sales_off": sales_off};
                $.get("get_warehouse.php", query1, function (hd) {


                    var a = hd;
                    //   alert(a+"ware");
                    if(a=='N')
                    {
                        $("#typeid").html('');
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

                for (var i = 0; i < obj.SHIPPER.length; i++) {

                    shipper[i] = new Array();
                    shipper[i][0] = obj.SHIPPER[i].shipperID;
                    shipper[i][1] = obj.SHIPPER[i].shipperName;
                    shipper[i][2] = obj.SHIPPER[i].tin;
                    shipper[i][3] = obj.SHIPPER[i].cin;
                    /*   datak[i][2] = obj.LIST[i].tinNo;
                     datak[i][3] = obj.LIST[i].cinNo;*/
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    shippr = shippr + "<option  id=" + i + " value = " + shipper[i][0] + ">" + shipper[i][1] + "</option>";


                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //                        alert(warehouseOptions);


                }
                $("#Ship_TIN").val(shipper[0][2]);
                $("#Ship_CIN").val(shipper[0][3]);
                $("#typeid").html(shippr);



                $("#warehouse_id").html(warehouse);

            }

            ////////////end ware house////////




            function get_pincode(z)
            {

                dg={"pincode":z};
                $.get("pincode.php",dg,function(xs)
                {

                    setState(xs);



                });


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




            var $rows = $('#tabl_expr tr');
            $('#search_table').keyup(function() {

                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });



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

        <?php
        include ("include/menus.php");
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ASSIGN
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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main Client</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-12"> <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Client Name:</label>
                                                <select  class="form-control" name="main_company_id"  required="" id="main_company_id" onchange="call_header(this.value)" >

                                                    <option value="">Select</option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="append_cmp"></div>

                    <div style="display: none;" class="col-lg-2" id="cmp_type">
                        <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>





                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>List</h3>
                        </div>

                        <div class="panel-body">
                            <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                            <!-- <div class="col-lg-2">
                                 <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
        --><!----> <form class="form-horizontal"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"> </i></span><input id="filter" style="text-transform: uppercase"  placeholder="Search Warehouse" type="search" class="form-control"></div></form><br>

                            <!--  <table id="tabl_expr" class="table table-striped">-->
                            <table data-role="table" data-mode="columntoggle" class=" table table-striped" id="myTable" data-filter="true" data-input="#filterTable-input">
                                <thead>
                                <tr>
                                    <th class="warehouse_name">Warehouse Name</th>

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




        <!-- Modal -->
        <div class="modal fade" id="myModal" data-backdrop="static" >
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content"> <form id="add_mores"   role="form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Shipper Details Add More</h4>
                        </div>
                        <div class="modal-body">


                            <input type="hidden" name="companyId" id="cmpid">



                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text"  title="Name Only Characters Are Allowd" required="" class="form-control"  placeholder="Name" name="careOfOrConsigneeName">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address 1</label>
                                <input type="text"  class="form-control"  required="" id="adr12"   placeholder="Address" name="address1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address 2</label>
                                <input type="text"  class="form-control" required="" id="adr123" placeholder="Address" name="address2">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">PinCode</label>
                                <input type="number" onblur="get_pincode(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits"  class="form-control" required="" id="" placeholder="Pincode" name="pincode">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input type="text"  class="form-control" required="" id="city1"  placeholder="City" name="cityName">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">State</label>
                                <input type="text"  class="form-control" required="" id="state1" readonly placeholder="State" name="stateName">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact name</label>
                                <input type="text"  pattern="[a-zA-Z ' ]+"  class="form-control" required="" id="contact1" placeholder="Contact Name" name="contactname" title="Only Characters are required">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mobile no</label>
                                <input type="text"  class="form-control" maxlength="13" min="10" pattern="[0-9]{10}" required="" id="mobil1" placeholder="Mobile No" name="contactno" title="Only Numbers are required and Must be 10 Digits">
                            </div>





                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" >Add</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>






        <div class="modal fade" id="myModal1" data-backdrop="static" role="dialog">
            <div class="modal-dialog">
                <form id="add_congs"  role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Consignee Details Add</h4>
                        </div>
                        <div class="modal-body">


                            <input type="hidden" id="cmps_id" value="" name="companyId">


                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" class="form-control"  title="Name Only Characters Are Allowed"  required="" placeholder="Name" name="name1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address 1</label>
                                <input type="text"  class="form-control" id="addr12" required="" placeholder="Address" name="Address1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address 2</label>
                                <input type="text"  class="form-control" id="addr13" required="" placeholder="Address" name="Address2">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">PinCode</label>
                                <input type="number"  class="form-control" onblur="lookup(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits"   required="" placeholder="Pincode" name="pincode">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input type="text"  class="form-control" id="city" required="" placeholder="City"  name="city">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">State</label>
                                <input type="text"  class="form-control" readonly id="state" required="" placeholder="State" name="state">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Name</label>
                                <input type="text"  class="form-control"  pattern="[a-zA-Z ' ]+" required="" placeholder="Contact Name" name="Cont_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mobile no</label>
                                <input type="text"  class="form-control"  pattern="[0-9]{10}" title="Only Numbers are required Atleast 10 Digits" maxlength="13" min="10" required="" placeholder="Mobile No" name="mob_no">
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-default">ADD</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
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

                $(".dropdown").click(function()
                {


                    $(this).parent().children("ul").slideToggle();



                });
                $(".sub-dropdown").click(function()
                {
                    $(this).parent().slideDown();
                    $(this).children().parent().find("ul").slideToggle();



                });




                /*$("#main").submit(function(e)
                 {



                 return false;
                 });
                 */

                $('#filter').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('#tbd1 tr').hide();
                    $('#tbd1 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                });
                $("#add_items").submit(function () {

                    add_table();
                    return false;


                });

                function add1() {
                    add_table();

                }


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


                $("#myModal0").modal({                    // wire up the actual modal functionality and show the dialog
                    "backdrop"  : "static",
                    "keyboard"  : true,
                    "show"      : true                    // ensure the modal is shown immediately
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



            function set_items()
            {






                $("#ids_value").val($("#typeid").val());

                parse_id1="";
                parse_id1=$("#ids_value").val();

///alert(parse_id1);



            }



            function set_items_company()
            {


                $("#ids_value").val($("#company_typeids").val());

                parse_id1="";
                parse_id1=$("#ids_value").val();
                //alert(parse_id1);




            }


            function  call_by_company(ii)
            {


                $('#typeid').val("").attr("selected", "selected");


                $('#cmp_type>div>select').val("Company").attr("selected", "selected");
                $('#cmp_type>div>select').change();
                $("#ids_value").val(ii);
                load_warehouse()
                /* get_material();
                 $("#ids_value").val(ii);
                 load1(ii);*/

            }
            function call_by_sales(dd)
            {

                $('#company_typeids').val("").attr("selected", "selected");
                $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
                $('#cmp_type>div>select').change();


                load_warehouse()


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



            function load_warehouse()
            {
                $("#tbd1").html("<tr><td></td><td><img src='loader1.gif'></td></tr>");
                $.post("get_warehouselist.php","",function(hd)
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

                        $("#tbd1").append("<tr style='cursor: pointer' id='"+datak[i][0]+"'><td>"+datak[i][1]+"</td><td><button class='btn btn-default assign' id='"+datak[i][0]+"'>Assign</button></td><td></td><td></td><td></td><td></td></tr>")




                    }
                    $(".assign").click(function()
                    {

                        if($(this).attr("class").indexOf("assign")!="-1") {

                            $(this).button('loading').delay(1000);
                            var k = $(this);


                            var datas = {
                                "company_id": $("#main_company_id").val(),
                                "sales_office_id": parse_id1,
                                "warehouse_id": $(this).attr("id")
                            };
                            $.get("assignWareHouseToSalesOffice.php", datas, function (return_datas) {
//alert(return_datas)

                                if ($.trim(return_datas) == "Y") {
									show_modal("Warehouse assigned successfully to Client.");	
				
                                    $(k).removeAttr("disabled");
                                    $(k).removeClass("disabled");
                                    $(k).text("Assigned");
                                    $(k).removeClass("assign").addClass("dones");


                                } else if ($.trim(return_datas) == "A") {

                                    show_modal("Warehouse Already Assigned");

                                    $(k).removeAttr("disabled");
                                    $(k).removeClass("disabled");
                                    $(k).text("Assigned");
                                    $(k).removeClass("assign").addClass("dones");
                                }
                                else {

                                    show_modal("Failed To assign");
                                }


                            })
                        }
                        else {


                            show_modal("Warehouse Already Assigned");
                        }




                    });

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