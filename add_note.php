

<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['checks']))
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


        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">



        <script type="text/javascript" src="side_menu.js"></script>

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
        </style>
        <script type="text/javascript" src="js/company_details.js"></script>

        <script type="text/javascript">





            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');

                var levelOptions="<option value=''>Select Company</option>";

                $.get("companylist.php","",function(hd) {


                    var obj = JSON.parse(hd);


                    datak = new Array();


                    var levelOption = "";;
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

                  //  get_sale_office();





                });


            }






            function call_header(cmp_id)
            {
                $("#append_cmp").html("<img src='loader1.gif'>");
                set_company1(cmp_id)



            }










            function add_notes(c,d)
            {
                var compid=$("#typeid").val();

                $("#myModal").modal('show');
              //  $("#tbd").html("");
                //$("#typ").html("");


            }














            ////////////////////////get_sale_office/////////





















            function search_challan()
            {
                var sales_id=$("#ids_value").val();


                if(sales_id!="") {
                    var search_id = $.trim($("#search_id").val());
                    querss = {"challan_no": search_id, "sales_id": sales_id};
                    $.get("searchby_challan.php", querss, function (rt) {

///alert(rt);
                        $("#tbd").html("");

                        if ($.trim(rt) != "N") {


                            var obj1 = JSON.parse(rt);


                            datakk = new Array();


                            var levelOption = "";
                            var out = new Array();

                            for (var i = 0; i < obj1.TRACK.length; i++) {

                                datakk[i] = new Array();
                                datakk[i][0] = obj1.TRACK[i].chalan_no;
                                datakk[i][1] = obj1.TRACK[i].NAME;
                                datakk[i][2] = obj1.TRACK[i].company_name;

                                datakk[i][3] = obj1.TRACK[i].timestamp;

                                datakk[i][4] = obj1.TRACK[i].specialInstruction;
                                datakk[i][5] = obj1.TRACK[i].order_id;
                                $("#o_id").attr("value", datakk[i][5]);
                                $("#tbd").append("<tr id='" + datakk[i][0] + "' title='" + datakk[i][5] + "'  onclick='add_notes(this.id,this.title)' ><td>" + datakk[i][0] + "</td><td>" + datakk[i][1] + "</td><td>" + datakk[i][2] + "</td><td>" + datakk[i][3] + "</td><td>" + datakk[i][4] + "</td></tr>");

                            }


                        } else {

                            show_modal("Challan No. Does Not Exist " + rt);


                        }


                    });


                }else {

                    show_modal("Please Select Sales office or Company")
                }

            }
            ///Function Upload Here





        </script>

        <style type="text/css">
            tr{
                cursor: pointer;
            }
        </style>
    </head>

    <body onload="load()" class="bds"   >



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
                         Add Notes
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
                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Search</h3>
                        </div>
                        <div class="panel-body ">
                            <br> <form  id="search_challan">
                                <div class="row">

                                    <div style="display: none;" class="col-lg-2" id="cmp_type">
                                        <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>



                                    </div>






<div class="col-lg-3"></div>

                                    <div class="col-lg-6">

<label>Challan no.</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_challan" placeholder="Challan No.." id="search_id" aria-describedby="basic-addon2">
                                            <span class="input-group-addon" style="cursor: pointer"  onclick="search_challan()" id="basic-addon2"><span class="glyphicon glyphicon-search"></span> Search</span>
                                        </div>



                                    </div>



                                </div>


                            </form><br><br>


                        </div>
                    </div>







                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Challan no.</th>
                                            <th>Consignee</th>
                                            <th>Shipper</th>
                                            <th>Date Time</th>

                                            <th>Special Instruction</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tbd">



                                        </tbody>
                                    </table>
                                </div>

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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->





    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" >
        <div class="modal-dialog" style="width: 900px">

            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <form id="add_notess" class='form-horizontal'>  <div class="modal-header">&nbsp;&nbsp;&nbsp;<h4>Add Notes</h4>

<input type="hidden" id="o_id" name="o_id">

                    <div class="modal-body" id="typ">

                       <div class='form-group'><textarea name="comments" required title="Please Add Note" class='form-control' style='height: 160px;width: 860px;resize: none' placeholder='Add Notes'></textarea></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary" >Add</button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                </form>
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

            $("#search_challan").submit(function()
            {


                search_challan();

                return false;
            });


            $("#add_notess").submit(function()
            {

                var for_datas=$(this).serialize();
                $.get("add_note_data.php",for_datas,function(rest)
                {

                    if($.trim(rest)=="Y") {


                        $("#myModal").modal('hide');

                        show_modal("Notes Added Successfully");
                    }else
                    {
                        $("#myModal").modal('hide');
                        show_modal("Unable to Add Notes"+rest)

                    }


                });
               return false;
            });



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