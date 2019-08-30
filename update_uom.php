

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
        <link href="css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
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
            }        .sub-dropdown li
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


        <script type="text/javascript">


            function load_uom() {
                set_menus('<?php echo $_SESSION['list']?>');
                $("#tbd1").html("<tr><td></td><td><img src='loader1.gif'></td></tr>");
                $.post("get_uom_data.php", "", function (gh) {
                    //alert("DFFsf");
                    //alert(gh);
                    $("#tbd1").html("");
                    //$("#tbd1").html(gh);

                    var obj = JSON.parse(gh);
                    //   $("#typeid").html("");


                    datak = new Array();


                    // var levelOption="";
                    // var out=new Array();

                    for (var i = 0; i < obj.LIST.length; i++) {

                        datak[i] = new Array();
                        datak[i][0] = obj.LIST[i].measurementID;
                        datak[i][1] = obj.LIST[i].unitOfMeasurement;
                        datak[i][2] = obj.LIST[i].description;
                        datak[i][3] = obj.LIST[i].isActive;
                       
                            $("#tbd1").append("<tr style='cursor: pointer' id='" + datak[i][0] + "'><td>" + datak[i][1] + "</td><td>" + datak[i][2] + "</td><td><button  class='btn btn-default'   id='" + datak[i][0] + "' name='" + datak[i][1] + "' title='"+ datak[i][2] +"' value='" + datak[i][3] + "' onclick='edit(this.id,this.name,this.title);'  ><i class='fa fa-edit'></i>Edit </button></td><td></td><td></td><td></td><td></td></tr>")
                           
					}
            
                });
            }
			
			
			function edit(aa,bb,cc)
			{
               // alert(cc+"descr");
				//alert("DFDF");
				$("#edit_uom").modal("show");
                $("#measure_id").val(aa);
				$("#uom").val(bb);
				$("#description").val(cc);
				
			}




        </script>


    </head>

    <body class="bds" onload="load_uom()">



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
	
 <div id="edit_uom" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="update_material" >

                <div class="modal-content">


                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="padding-left:10px;padding-right: 10px;">Edit UOM</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">














                                <div class="panel panel-green  margin-bottom-40" style="border: 1px solid #00a0d2;">
                                    <div class="panel-heading" style="background-color: #00a0d2;">
                                        <h3 class="panel-title"><i class="fa fa-tasks"></i>Edit UOM </h3>
                                    </div>
                                    <div class="panel-body">


                                        <!--   <div class="form-group" id="shiper_select">
                                               <label for="exampleInputPassword1">Company Name</label><br>
                                               <select id="typeid"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="width: 300px" required="">

                                               </select>
                                           </div>-->
                                        <div class="container-fluid">
                                            <div class="row">

                                                <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                    <input type="hidden" id="measure_id" name="measure_id" value="">
                                                    <div class="form-group">
                                                        <label >UOM</label>
                                                        <input type="text"  class="form-control"   placeholder="UOM" id="uom" name="uom">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                    <div class="form-group">
                                                        <label >Description:</label>
                                                        <input type="text"  class="form-control"  placeholder="Description" id="description" name="description">
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
                            Update UOM Active/Inactive Status

                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div class="row">





                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>List</h3>
                        </div>

                        <div class="panel-body">
                            <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                            <!-- <div class="col-lg-2">
                                 <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
            --><!---->

                            <!--  <table id="tabl_expr" class="table table-striped">-->
                            <table data-role="table"  class=" table table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <th class="uom">UOM</th>
                                    <th class="desc">Description</th>
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

                        <!-- /.row -->

                        <!-- /.row -->



                        <!-- /.row -->

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







    <script type="text/javascript" src="js/bootstrap-toggle.min.js"></script>











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




                $("#update_material").submit(function () {
                    //alert("Ddddddd");
               var main_query={ "measure_id": $("#measure_id").val(),
                   "uom":$("#uom").val(),
                   "description":$("#description").val()

                };
                // alert("uom: "+$("#uom").val()+"  dsc"+$("#description").val());
               $.post("status_update_uom.php" ,main_query,function (so) {
                  // alert(so);
                   if($.trim(so)=="Y")
                   {

                       show_modal("UOM updated successfully");
                       $("#edit_uom").modal("hide");
                       $("#update_material")[0].reset();
                       //$("#update_material").resetForm(true);
                       load_uom();
                   }
                   else if($.trim(so)!="Y")
                   {
                       show_modal(so);
                   }else{
                       show_modal("Failed To Updated");
                   }

                });
                    return false;
                });
            $(".dropdown").click(function()
            {


                $(this).parent().children("ul").slideToggle();



            });
            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();



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