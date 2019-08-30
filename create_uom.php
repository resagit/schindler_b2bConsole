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
        <link href="css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
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


            function load()
            {

                set_menus('<?php echo $_SESSION['list']?>');



            }






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
                            Create UOM

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






                    <form role="form" id="main">
                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Create UOM</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> UOM<span style="color:red;" >*</span>:</label>
                                            <input type="text"  title=" Only Characters Are Allowd" required="" id="uom" class="form-control"  placeholder="UOM" name="uom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description<span style="color:red;" >*</span>:</label>
                                            <textarea  class="form-control"  required="" id="description"   placeholder="Description" name="description"></textarea>
                                        </div>
									</div>
                                </div>
                            </div>
                                        <center>
                                            <input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mainss"></center>
                            <br>
</div>

                    </form>




                <div class="panel panel-green  margin-bottom-40" >
                    <div class="panel-heading" >
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> UOM List</h3>
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
                            <tbody id="tbd1"></tbody>
                        </table>
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            <!-- /#page-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script type="text/javascript" src="js/bootstrapValidator.js"></script>
    <!--message box-->
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
            $("#challan_no").focus();
            $('#main').bootstrapValidator({
                live: 'enabled',
                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {
                    show_modal("<img src='loader1.gif'>");
                    $.post("create_uom_data.php",$("#main").serialize(),function(yu)
                    {
                        //alert(yu);
                        if($.trim(yu)=="Y")
                        {
                            $("#main").bootstrapValidator('resetForm', true);
                            show_modal("UOM Created Successfully");
                        }
                        else if($.trim(yu)=="A")
                        {
                            $("#main").bootstrapValidator('resetForm', true);
                            show_modal("UOM Already Exist");
                        }
                        else
                        {
                            show_modal("Failed To Create");
                        }
                        //                     else
//                        {
//
//                            show_modal(yu);
//                        }
                    });
//                    $.get("get_uom_data.php",,function(fg)
//                    {
//                        alert(fg);
//                    });
                    load_uom()
                    return false;
                    //load_uom()
                },
                message: 'The field should not be empty',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    uom: {
                        message: 'The Name  is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The uom  is required and cannot be empty'
                            }


                        }
                    },


                    description: {
                        message: 'The description is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The description is required and cannot be empty'
                            }


                        }
                    }










                }

            });





            /*$("#main").submit(function(e)
             {



             return false;
             });
             */











        });

        function load_uom() {
            $("#tbd1").html("<tr><td></td><td><img src='loader1.gif'></td></tr>");
            $.post("get_uom_data.php", "", function (gh) {
               // alert("DFFsf");
               // alert(gh);
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
                    if (datak[i][3] == '1') {
                        $("#tbd1").append("<tr style='cursor: pointer' id='" + datak[i][0] + "'><td>" + datak[i][1] + "</td><td>" + datak[i][2] + "</td><td><input  id='" + datak[i][0] + "' name='Active' value='" + datak[i][3] + "'  class='toggle-one'  checked type='checkbox'  ></td><td></td><td></td><td></td><td></td></tr>")
                        $('.toggle-one').bootstrapToggle(
                            {

                                on: 'Active',
                                off: 'Inactive'
                            });


                    }
                    else {
                        $("#tbd1").append("<tr style='cursor: pointer' id='" + datak[i][0] + "'><td>" + datak[i][1] + "</td><td>" + datak[i][2] + "</td><td><input  id='" + datak[i][0] + "'  name='Inactive' value='" + datak[i][3] + "'  class='toggle-one'  Un-checked type='checkbox'  ></td><td></td><td></td><td></td><td></td></tr>")
                        $('.toggle-one').bootstrapToggle(
                            {

                                on: 'Active',
                                off: 'Inactive'
                            });
                    }


                }
                $('.toggle-one').change(function () {
                    //alert("lkjkj");
                    var status;
                    var result="";
                    if ($(this).prop("checked") == true) {
                      //  alert("trueeeeeee");
                        //alert($(this).attr("value") == 1);

                        status = 1;
                        result=1;
                       // alert(status);


                    } else {
                       // alert("faliseeeeee");
                       // alert($(this).attr("value") == 0);
                        status = 0;
                        result=0;
                       // alert(status);
                    }
                    var k = $(this).attr("id");
                    datas = new Array();
                    var datas = {
                        "uom": k,
                        "active": status

                    };
                  //  alert(datas.uom)
                    $.post("assign_uom.php", datas, function (return_datas) {
                       // alert(return_datas);
                        if ($.trim(return_datas) == "Y") {
                           // alert(result)
                            if(result=="1"){
                                show_modal("UOM has been active successfully");
                            }else{
                                show_modal("UOM has been inactive successfully");
                            }

                           //
//                            //
//                            //                                $(k).removeAttr("disabled");
//                            //                                $(k).removeClass("disabled");
//                            $(k).removeText("Assigned");
//                            //                                $(k).removeClass("assign").addClass("dones");
//                            //
//                            //
                    } else if($.trim(return_datas) == "You can not inactive this UOM")
                        {
//                            //
                           show_modal(return_datas);
//                            //
//                            //                                $(k).removeAttr("disabled");
//                            //                                $(k).removeClass("disabled");
//                            //                                $(k).text("Assigned");
//                            //                                $(k).removeClass("assign").addClass("dones");
                       }else{
                            show_modal("Failed")
                        }
                        //                            else {
                        //
                        //                                show_modal("Failed To assign");
                        //                            }
                        //
                        //
                        //                        })
                        //                    }
                        //                    else {
                        //
                        //
                        //                        show_modal("Warehouse Already Assigned");
                        //                    }
                        //
                        //
                        //
                        //
                        //  });


//                    })
                    });
                })
            });
        }
//                    function assign(aa,bb)
//                        {
//                            alert("DFDFd");
//                            alert(aa);
//                            alert(bb);
//
//                         // alert($(this).parent().parent().parent().html(""));
//                          //  $(this).parent().html();
//        //
//        //                    if($(this).attr("class").indexOf("assign")!="-1") {
//        //
//        //$(this).button('loading').delay(1000);
//                            var k = $(this.id);
//                           datas=new Array();
//                         var datas = {
//                                    "uom": aa,
//                                    "active": bb
//
//                                };
//                                $.post("assign_uom.php", datas, function (return_datas) {
//                                   alert(return_datas+"assign");
//                                   if ($.trim(return_datas) == "Y") {
//        //
//        //
//        //                                $(k).removeAttr("disabled");
//        //                                $(k).removeClass("disabled");
//                                  $(k).removeText("Assigned");
//        //                                $(k).removeClass("assign").addClass("dones");
//        //
//        //
//                                    } else  {
//        //
//                                       show_modal("Failed To assign");
//        //
//        //                                $(k).removeAttr("disabled");
//        //                                $(k).removeClass("disabled");
//        //                                $(k).text("Assigned");
//        //                                $(k).removeClass("assign").addClass("dones");
//                                   }
//        //                            else {
//        //
//        //                                show_modal("Failed To assign");
//        //                            }
//        //
//        //
//        //                        })
//        //                    }
//        //                    else {
//        //
//        //
//        //                        show_modal("Warehouse Already Assigned");
//        //                    }
//        //
//        //
//        //
//        //
//                     //  });
//
//                   });
//
//
//                }





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
    <script type="text/javascript" src="js/bootstrap-toggle.min.js"></script>

    </body>

    </html>
    <?php
}
else
{




    echo "<script>window.location='index.php'</script>";
}
?>