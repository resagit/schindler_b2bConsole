

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


            var get_roles;
            function get_ui_tabs()
            {
                set_menus('<?php echo $_SESSION['list']?>');
                $("#print_ui").html("<center><img src='loader1.gif'></center>");
                $.get("getWarehouseAllUser.php","",function(datas)
                {

                    var obj=JSON.parse(datas)

                    var  datas1 = new Array();



                    var uirole = "";
                    var out = new Array();
                    $("#print_ui").html("");
                    for (var i = 0; i < obj.LIST.length; i++) {

                        datas1[i] = new Array();
                        datas1[i][0] = obj.LIST[i].userID;
                        datas1[i][1] = obj.LIST[i].NAME;
                        datas1[i][2] = obj.LIST[i].userName;
                        datas1[i][3] = obj.LIST[i].isActive;
                        if(datas1[i][3]==1)
                        {
                            $("#print_ui").append("<tr id='"+datas1[i][0]+"' onclick='set_roles(this.id)' style='cursor: pointer' data-target='#myModal1' data-toggle='modal'><td>"+ datas1[i][1]+"</td><td>"+ datas1[i][2]+"</td><td><a href='#'><i class='fa fa-edit'></i>Edit Role</a> </td></tr>")
                        }}

                })



            }

            function set_roles(emp_id)
            {
                $("#emp_id").val(emp_id);

                var query={"emp_id":emp_id};
                $.post("getWarehouseUserRole.php",query,function(datas1)
                {


                    var obj=JSON.parse(datas1);
                    get_roles=obj;
                    var  datas1 = new Array();
                    var options="";
                    var options1="<option value=''>Select Update Role</option>";
                    for (var i = 0; i < obj.USERROLE.length; i++) {

                        datas1[i] = new Array();
                        datas1[i][0] = obj.USERROLE[i].roleID;
                        datas1[i][1] = obj.USERROLE[i].roleName;
                        datas1[i][2] = obj.USERROLE[i].description;
                        options+="<option value='"+ datas1[i][0]+"'>"+ datas1[i][1]+"</option>";

                    }
                    $("#current_role").html(options);
                    show_current_roles($("#current_role").val())

                    //All roles for
                    var  datas2 = new Array();
                    for (var i = 0; i < obj.ROLE.length; i++) {

                        datas2[i] = new Array();
                        datas2[i][0] = obj.ROLE[i].roleID;
                        datas2[i][1] = obj.ROLE[i].roleName;
                        datas2[i][2] = obj.ROLE[i].description;
                        options1+="<option value='"+ datas2[i][0]+"'>"+ datas2[i][1]+"</option>";

                    }
                    $("#update_role").html(options1);


                })



            }

            function show_all_roles(a)
            {
                $("#update_all_roles").html("");
                var datas1 = new Array();
                for (var i = 0; i < get_roles.UIROLE.length; i++) {

                    datas1[i] = new Array();
                    datas1[i][0] = get_roles.UIROLE[i].roleID;
                    datas1[i][1] = get_roles.UIROLE[i].roleName;
                    datas1[i][2] = get_roles.UIROLE[i].uiRolePosition;

                    if(a==datas1[i][0])
                    {


                        $("#update_all_roles").append("<div style='height: 50px;' class='col-lg-3'>"+datas1[i][2]+": "+datas1[i][1]+"</div>");

                    }
                    //$("#print_ui").append("<tr><td>"+ datas1[i][1]+"</td><td>"+ datas1[i][2]+"</td><td><a href='#'><i class='fa fa-edit'></i>Edit Role</a> </td></tr>")
                }


            }


            function show_current_roles(a)
            {
                $("#current_all_roles").html("");
                var datas1 = new Array();
                for (var i = 0; i < get_roles.UIROLE.length; i++) {

                    datas1[i] = new Array();
                    datas1[i][0] = get_roles.UIROLE[i].roleID;
                    datas1[i][1] = get_roles.UIROLE[i].roleName;
                    datas1[i][2] = get_roles.UIROLE[i].uiRolePosition;
                    if(a==datas1[i][0])
                    {


                        $("#current_all_roles").append("<div style='height: 50px;' class='col-lg-3'>"+datas1[i][2]+": "+datas1[i][1]+"</div>");

                    }
                    //$("#print_ui").append("<tr><td>"+ datas1[i][1]+"</td><td>"+ datas1[i][2]+"</td><td><a href='#'><i class='fa fa-edit'></i>Edit Role</a> </td></tr>")
                }


            }


        </script>


    </head>

    <body class="bds" onload="get_ui_tabs()">



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
                            Update Warehouse Users Roles

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





                    <table class="table table-striped"><thead><tr><th>Name</th><th>User name</th><th>Edit</th></tr></thead>

                        <tbody id="print_ui">


                        </tbody>

                    </table>


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
        <div class="modal-dialog" style="width: 70%">
            <form id="update_roles"  role="form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Roles</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" name="emp_id" id="emp_id">
                        <div class="form-group"><label>Current Role</label><select id="current_role" onchange="show_current_roles(this.value)" class="form-control"></select></div>
                        <label>Roles </label>
                        <div  id="current_all_roles" style="position:relative;width:97%;overflow:auto;max-height: 150px;">

                        </div>


                        <br>  <div class="form-group"><label>Update Role</label><select name="role_id" required title="Please Select Role" onchange="show_all_roles(this.value)" id="update_role" class="form-control"></select></div>
                        <label>Roles </label>

                        <br>
                    </div>
                    <center>  <div  id="update_all_roles" style="position:relative;width:97%;overflow:auto;max-height: 150px;">

                        </div></center>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-default">Update</button>
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

            $("#update_roles").submit(function()
            {


                $.post("updateUserRole.php",$(this).serialize(),function(yu)
                {


                    if($.trim(yu)=="Y")
                    {
                        $("#myModal1").modal('hide');
                        $("#update_roles")[0].reset();
                        show_modal("Warehouse user role updated successfully");
                        $("#update_all_roles").html("");
                        $("#current_all_roles").html("");

                    }else
                    {
                        $("#myModal1").modal('hide');
                        show_modal("Failed To Update");
                        setTimeout(function()
                        {
                            $("#myModal0").modal('hide');
                            $("#myModal1").modal('show');

                        },1200);

                    }




                });

                return false;
            });


            $("#close").click(function () {


                //  location.reload();

                $("#myModal12").hide();

            });


            $("#add_mores").submit(function () {


                $("#cmpid").val($("#sales_off").val());

                var prs = $(this).serialize();

                $.get("newShipAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();

                        var id = $('#sales_off').val();
                        $("#add_mores")[0].reset();
                        load1(id);


                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
            });

            $("#add_congs").submit(function () {


                $("#cmps_id").val($("#sales_off").val());

                var prs = $(this).serialize();

                $.get("newCondAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal1').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();
                        var id = $('#sales_off').val();
                        $("#add_congs")[0].reset();
                        load1(id);


                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
            });




            //  $("#pos").attr("disabled", true);
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