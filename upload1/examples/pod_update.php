

<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['admin_login']))
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

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />


        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../js/fileinput.js" type="text/javascript"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
        <title>Admin -Book My Storage</title>

        <!-- Bootstrap Core CSS -->



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

        <script type="text/javascript">





function load()
{


var levelOptions="";

        $.get("companylist.php","",function(hd) {


            var obj = JSON.parse(hd);


            datak = new Array();


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

                levelOptions = levelOptions + "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";


                // alert(datak[i][2]);
                //alert(data[i][1]);

                //alert(levelOption);


            }
            $("#typeid").html(levelOptions);







        });


    }




















































            function search_challan()
            {
                 var cmp_id=$("#typeid").val();
                var search_id= $.trim($("#search_id").val());
                querss={"challan_no":search_id,"companyid":cmp_id};
                $.post("uom_search.php",querss,function(rt)
                {

alert(rt);
$("#tbd").html("");

                    if($.trim(rt)!="N") {



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

$("#tbd").append("<tr><td>"+datakk[i][0]+"</td><td>"+datakk[i][1]+"</td><td>"+datakk[i][2]+"</td><td>"+datakk[i][3]+"</td><td>"+datakk[i][4]+"</td></tr>");

                        }





                    }else
                    {

                        show_modal("Challan No. Does Not Exists");


                    }






                });





            }





        </script>


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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="en/index.php">BMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_COOKIE['user_name']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="divider"></li>
                        <li>
                            <a href="en/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="en/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="inbound.php"> <i class="fa fa-archive"></i> Inbound</a>
                    </li>
                    <li>
                        <a href="outbound.php"><i class="fa fa-windows"></i> Outbound</a>

                    </li>
                    <li>
                        <a href="return_inbound.php"><i class=" fa fa-info-circle"></i> Return Inbound</a>
                    </li>
                    <li>
                        <a href="stock_transfer.php"><i class="fa fa-reply"></i> Stock Transfer</a>
                    </li>


                    <li><a href="#"><i class="fa fa-cog fa-spin"></i> Update</a></li>
                    <li><a href="create_material.php"><i class="fa fa-cog fa-spin"></i> Create Material</a></li>
                    <li><a href="stock_report.php"><i class="fa fa-cog fa-spin"></i>Stock Report</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Uom Update
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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Search</h3>
                        </div>
                        <div class="panel-body ">
                            <br> <form for="form"  id="search_challan">
                                <div class="row">


                                    <div class="col-lg-6">

<div class="form-group">

                                            <select title="Select Company" id="typeid" class="form-control">
                                                <option>Select</option>

                                            </select>
</div>


                                    </div>

                                    <div class="col-lg-6">


                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_challan" placeholder="Challan No.." id="search_id" aria-describedby="basic-addon2">
                                            <span class="input-group-addon"  onclick="search_challan()" id="basic-addon2"><span class="glyphicon glyphicon-search"></span> Search</span>
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
</table><div class="container kv-main">
                                            <div class="page-header">


                                                <form enctype="multipart/form-data">


                                                    <label>Change POD Image</label>
                                                    <input id="file-en" name="file-en[]" type="file" multiple>

                                                </form>
                                                <hr>
                                                <br>
                                            </div></div>
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







    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" >
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content"> <form id="add_mores"   role="form">
                    <div class="modal-header"> <form enctype="multipart/form-data">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Change POD Image</h4>
                    </div>
                    <div class="modal-body">









                                    <input type="hidden" name="companyId" id="cmpid">
                                    <input type="hidden" name="order_id" id="order_id">
                                    <label>Change POD Image</label>
                                    <input id="file-en" name="file-en[]" type="file" multiple>

                                </form>
                                <hr>
                                <br>
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

$("#myModal").modal('show');
            $("#search_challan").submit(function()
            {


                search_challan();

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