

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
                            Create WMS Report Users

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

                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Create WMS Report User</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">




                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Name</label>
                                            <input type="text"  title="Name Only Characters Are Allowd" required="" id="shipper_name" class="form-control"  placeholder="Name" name="shipper_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Last name</label>
                                            <input type="text"  class="form-control"  required="" id="last_name"   placeholder="Last name" name="last_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User name</label>
                                            <input type="email"  class="form-control" required="" id="user_name" placeholder="User name" name="user_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password"   class="form-control" required="" id="password" placeholder="Password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mobile No.</label>
                                            <input type="text"   class="form-control" required="" id="mobile_no" placeholder="Mobile no." name="mobile">
                                        </div>






                                        <center>
                                            <br><br><input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mainss"></center>


                    </form>


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

$.post("report_user_createSalesOfficeUser.php",$("#main").serialize(),function(yu)
{

if($.trim(yu)=="Y")
{

    $("#main").bootstrapValidator('resetForm', true);
    show_modal("Report User Created Successfully");

}else if($.trim(yu)=="N")
{

    show_modal("Failed To Create");
}
else
{

    show_modal(yu);
}


});





                    return false;
                },
                message: 'The field should not be empty',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    shipper_name: {
                        message: 'The Name  is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The name  is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Name  be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-.    ]+$/i,
                                message: 'The Name cannot be special character'
                            }

                        }
                    },


                    last_name: {
                        message: 'The last name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Last name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Last name  be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+$/i,
                                message: 'The Last name cannot be number only character'
                            }

                        }
                    },
                    user_name:{
                        validators: {

                            emailAddress: {
                                message: 'The email address is not valid'
                            }
                        }
                    },
                    password: {
                        message: 'The Password is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            },
                            stringLength: {
                                min: 4,
                                max: 13,
                                message: 'The password should be at least 4 digit'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9@_]+$/i,
                                message: 'The Contact number  cannot be special character'
                            }

                        }
                    },
                    client_email:{
                        validators: {

                            emailAddress: {
                                message: 'The email address is not valid'
                            }
                        }
                    },
                    mobile: {
                        message: 'The Contact No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Mobile no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 10,
                                max: 13,
                                message: 'The Mobile number should be at least 10 digit'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'The Mobile number  cannot be  character'
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