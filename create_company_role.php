

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

            var choices=new Array();
            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');
                $.get("companylist.php","",function(hd)
                {
                     console.log("company list: ", hd);
                    var a=hd;
                    setData(a);
                });
            }

            function getdatas()
            {
                return choices;
            }

            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {
                if (levelOptions == "") {
                    ko = arr;
                    var obj = JSON.parse(arr);
                    datak = new Array();

                    var levelOption = "";
                    var out = new Array();
					levelOptions=levelOptions+"<option value='0'>Select</option>";
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

                    //   $("#Ship_TIN").val(datak[0][2]);
                    //   $("#Ship_CIN").val(datak[0][3]);
                    $("#company_name").html(levelOptions);
                    //  var ids = $("#sales_off").val();

                    get_sale_office();

                    // get_material();
                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);
                }
            }








            ///Conf Adress


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
                var client_id = document.getElementById('company_name').value;
                console.log("client id: ",client_id);

                query1 = {"client_Id": client_id};
                $.get("get_sale_office.php", query1, function (hd) {
                    console.log(hd)
                    var a = hd;
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
                    //alert(warehouseOptions);

                }

                /* $("#Ship_TIN").val(datak[0][2]);
                 $("#Ship_CIN").val(datak[0][3]);*/
                $("#sales_off").html(sales_off);
                var sales_id= $("#sales_off").val();
                //get_warehouse_shipper();
                // load1(sales_id);
                get_ui_tabs();
            }





            //////////////get UI ROLES////////////////////
            var role;
            function get_ui_tabs()
            {
                var sales_off=$('#company_name').val();
                //  alert(sales_off);
                query1 = {"sales_off": sales_off};
                $.post("getUITabsfor_comp.php", query1, function (hd) {
                    choicess=[];


                    //    alert(hd);
                    if($.trim(hd)=='N')
                    {
                        $("#user_role").html('');
                        show_modal("NO role Avialble");
                    }else {
                        var obj = JSON.parse(hd);

                        $('#ui_table').html("");
                        dataw = new Array();
                        dataww = new Array();


                        var uirole = "";
                        var out = new Array();
                        for (var i = 0; i < obj.LIST.length; i++) {

                            dataw[i] = new Array();
                            dataw[i][0] = obj.LIST[i].uiRoleID;
                            dataw[i][1] = obj.LIST[i].roleName;

                            $('#ui_table').append("<tr><td><input type='checkbox' style='margin:20' class='check_role' name='check_role' id='check_role'  value='"+dataw[i][0]+"'></td><td>"+dataw[i][1]+"</td><td><input type='text'class='form-control pos'id='pos'  name='pos' style='width: 30%' ></td></tr>");

                        }

                        //$('.pos').attr('disabled','disabled');
                        $("input[name='pos']").attr("disabled", true);

                        $(".check_role").click(function()
                        {


//alert();

                                if($(this).prop("checked")==true)
                                {

                                    $(this).parent().parent().find("input[type=text]").removeAttr("disabled");
                                    $(this).parent().parent().find("input[type=text]").val($(".check_role:checked").length);
                                }
                                else
                                {
                                    $(this).parent().parent().find("input[type=text]").val("");

                                    $(this).parent().parent().find("input[type=text]").attr("disabled","disabled");
                                }

                            var chkArray = [];

                            /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                            /*if($('.check_role').prop("checked")==false)
                             {
                             count--;
                             alert(count);
                             }else{*/

                            $(".check_role:checked").each(function() {
                                chkArray.push($(this).val());
                                //  count++;
                                //  alert(count);\
                                // alert(chkArray+"checl ");
                            });
                            //}
                            count= $(".check_role:checked").length;
                            //    alert(count);
                            /* we join the array separated by the comma */
                            var selected;
                            selected = chkArray.join('*');
                            role=selected;
                            /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
                            if(selected.length > 1){
                                //  alert("You have selected " + selected);
                            }else{
                                show_modal("Please Select at least one of the checkbox")
                                //alert("Please at least one of the checkbox");
                            }



                        })


                    }
                });


            }
            var count=0;


            function getValueUsingClass(chk){
                /* declare an checkbox array */
//alert(chk)

                var txt = chk.parentNode.parentNode.cells[2].getElementsByTagName('input')[0];

                if(chk.checked == false)
                {
                    txt.value = "";
                    txt.removeAttr("disabled");
                }else
                {
                    txt.prop("disabled");
                }
                var chkArray = [];

                /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                /*if($('.check_role').prop("checked")==false)
                 {
                 count--;
                 alert(count);
                 }else{*/

                $(".check_role:checked").each(function() {
                    chkArray.push($(this).val());
                    //  count++;
                    //  alert(count);\
                    // alert(chkArray+"checl ");
                });
                //}
                var selected;
                selected = chkArray.join('*');

                //   alert(role+" role");
                count= $(".check_role:checked").length;
//alert(count+" greg"+selected);
                /* we join the array separated by the comma */

//alert(selected);
                /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
                if(selected.length > 1){
                    // alert("You have selected " + selected);
                }else{
                    //alert("Please at least one of the checkbox");
                }


            }


            function check_pos()
            {
                //if ($("#ui_table>tr").length > 0) {
                //     alert($("input[name='pos[]']").is("readonly"));
                // $('input[name="pos"][readonly]').css('color','red');
                // $('input[name="pos"]').is("disabled").val("data");
                vals=[];
                ogval=[];
                var ko="";
                var fields = $("#ui_table").find("input[type='text']");
                fields.each(function(index, element) {
                    var isDisabled = $(element).is(':disabled');

                    if(isDisabled) {
                        //   $(element).prop('disabled', false);

                        // alert($(element).val());
                        ko=true;
                    } else {
                        //   alert($(this).val()+"count");
                        vals.push($(this).val());
                        ogval.push($(this).val());

                        // ko=;

                    }
                });
//alert(vals+"vals nd cont "+count);
                var sorted=[];// vals;
                sorted=vals;
                sorted.sort();
                var position;
                position=ogval.join("*");
                // alert(sorted+"SOTR AND VAL "+vals+"og "+ogval+" pos"+position);
                var j=1;
                var status="";
                for(var i=0;i<count;i++)
                {
                    if(ogval[i]==j)
                    {
                        //   alert("true"+i+" "+ogval[i]+" "+j)
                        status='true';
                    }else{
                        // / alert('false'+ogval[i]+" "+j);
                        //show_modal("Please Give Proper UI Position not more then"+c);
                        status='false';
                    }
                    j++;
                }

                if(status=='true')
                {
                    // alert(role+" "+position);
                    var d="&role_id="+role+"&position="+position;
                    var  data_pass=$('#main').serialize();
                    data_pass+=d;
                  //  alert(data_pass)
                    $.get("new_role_comp.php",data_pass, function (hd) {


                        var a = hd;
                        //  alert(a);
                        if($.trim(a)=='Y')
                        {
                            show_modal("User Role Created Successfully")
                            $("#main").bootstrapValidator('resetForm', true);
                            $("#main")[0].reset();
                            // $("#sales_off").html('');
                        }else if($.trim(a)=='N'){
                            show_modal("Failed To Create Role..");
                            //  set_sale_office(a);
                        }else{
                            show_modal("Failed To Create Role");
                        }
                    });

                }else if(status=='false')
                {
                    show_modal("Please Give Proper UI Position not more than "+count);
                }else
                {

                }

            }



            //}
            //alert(vals);/**/


            /* var val = $(this).closest('tr').find('#pos').val();
             alert(val);*/





            function ui_description()
            {
                var role_id= $("#user_role").val();
                // alert(role_id+"Roleid");
                var  x='';
                $.post("get_ui_roles.php", query1, function (hd) {
                    $('#ui_desc').html(" ");
                    choicess=[];

                    // alert(hd);
                    if($.trim(hd)=='N')
                    {
                        $("#user_role").html('');
                        show_modal("No UI ROLES for this Sales office");
                    }else {
                        var obj = JSON.parse(hd);


                        //   dataw = new Array();
                        dataww = new Array();


                        var uirole = "";
                        var out = new Array();

                        for (var i = 0; i < obj.UIROLE.length; i++) {

                            dataww[i] = new Array();
                            dataww[i][0] = obj.UIROLE[i].roleID;
                            dataww[i][1] = obj.UIROLE[i].roleName;
                            //  dataw[i][2] = obj.UIROLE[i].description;
                            //   datak[i][2] = obj.LIST[i].tinNo;
                            //   datak[i][3] = obj.LIST[i].cinNo;
                            //data[i][1]=obj.LIST[i].name;
                            //data[i][7]=obj.DETAIL[i].requestTimestamp;

                            //   uirole = uirole + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";


                            // alert(datak[i][2]);
                            // alert(dataww[i][0]+"DATA");

//alert(choicess);
                            //                        alert(warehouseOptions);

                            if($.trim(role_id)==$.trim(dataww[i][0]))
                            {
                                //  alert('same');
                                choicess.push(dataww[i][1]);
                                x= choicess.join(",");

                                //$('#ui_desc').html("Current Stock for selected warehouse");
                                $('#ui_desc').append("<tr><td>"+dataww[i][1]+"</td></tr>");

                            }
                            //   $('#ui_desc').html(x);
                            console.log(choicess+" "+x);
                        }

                        //   $("#user_role").html(uirole);
                    }
                });

            }






            ////////////end ware house////////






            function create_shipper()
            {






                /*   var company_type= $("#company_type").val();
                 var client_name= $("#client_name").val();
                 var company_name= $("#company_name").val();
                 var client_mobile= $("#client_mobile").val();
                 var client_alt_mobile= $("#client_alt_mobile").val();
                 var client_cin= $.trim($("#client_cin").val().replace(" ",""));
                 var client_tin= $("#client_tin").val();
                 var client_email= $("#client_email").val();
                 var client_pan= $("#client_pan").val();
                 var client_cnt_name= $("#client_cnt_name").val();
                 var client_cnt_no= $("#client_cnt_no").val();
                 var client_add1= $("#client_add1").val();
                 var client_add2= $("#client_add2").val();
                 var client_pin= $("#client_pin").val();
                 var client_city= $("#client_city").val();
                 var client_state= $("#client_state").val();
                 var client_bank= $("#client_bank").val();
                 var client_acc_no= $("#client_acc_no").val();
                 var client_ifsc= $("#client_ifsc").val();
                 var client_bank_branch= $("#client_bank_branch").val();*/
                console.log( $('#main').serialize());





                // alert(company_type+" "+client_name+" "+company_name+" "+client_mobile+" "+client_alt_mobile+" "+client_cin+" "+client_tin+" "+client_email+" "+client_pan+" "+client_cnt_name+" "+client_cnt_no+" "+client_add1+" "+client_pin+" "+client_city+" "+client_state+" "+client_bank+" "+client_acc_no+" "+client_ifsc+" "+client_bank_branch  );

                /*  alert(it+" "+desc+" "+unit+" "+rat+" "+quantity);
                 var   ar= it.join("*");
                 var qa= quantity.join("*");
                 var ra= rat.join("*");
                 var ua= unit.join("*");
                 var de=desc.join("*");
                 alert(ar+" item "+q                                                           a+" quan"+ra+" rate"+ua+" unit"+de);*/
                /*
                 var main_query = {
                 'company_type': $("#company_type").val(),
                 'client_name': $("#client_name").val(),
                 'company_name': $("#company_name").val(),
                 'client_mobile': $("#client_mobile").val(),
                 'client_alt_mobile': $("#client_alt_mobile").val(),
                 'client_cin': $.trim($("#client_cin").val().replace(" ","")),
                 'client_tin': $("#client_tin").val(),
                 'client_email':$("#client_email").val(),
                 'client_pan': $.trim($("#client_pan").val()),
                 'client_cnt_name': $.trim($("#client_cnt_name").val()),
                 'client_cnt_no': $("#client_cnt_no").val(),
                 'client_add1':$("#client_add1").val(),
                 'client_add2':$("#client_add2").val(),
                 'client_pin':$("#client_pin").val(),
                 'client_city':$("#client_city").val(),
                 'client_state':$("#client_state").val(),
                 'client_bank':$("#client_bank").val(),
                 'client_acc_no':$("#client_acc_no").val(),
                 'client_ifsc':$("#client_ifsc").val(),
                 'client_bank_branch':$("#client_bank_branch").val()



                 };
                 */
                //  console.log(main_query);
                $("#myModal12").fadeIn();
                $("#mes").html("<center><img src='loader1.gif'></center>");
//md={"kk":$("#typeid").val(),"ks":"sd"};
                //  alert($('#main').serialize());
                $.get("createSalesOfficeUser.php", $('#main').serialize(), function (ho) {

                    // alert(ho);
                    /*$("#tbd").html("");
                     $("#challan_no").val("");
                     $("#cerena_ref").val("");
                     $("#c_no").val("");
                     $("#consignee_name").val("");
                     $("#consignee_mob").val("");*/
                    //$(".glyphicon-ok").hide();
                    // $(".help-block").hide();
                    //$(".has-success").addClass("form-group");
                    ///    $(".has-success").removeClass().addClass("form-group");

                    //  $("#mes").html(ho);
                    if($.trim(ho)=="Y")
                    {
                        $("#main")[0].reset();
                        $("#main").bootstrapValidator('resetForm', true);
                        $("#mes").html("Sales Office user for "+$('#company_name :selected').text()+ "  Created");
                    }else if($.trim(ho)=="N")
                    {
                        $("#mes").html("Failed to Create Sales Office for "+$('#company_name :selected').text()+"..");
                    }
                    else if($.trim(ho)=="A")
                    {
                        $("#mes").html("User Name Is already created for "+$('#company_name :selected').text()+"..");
                    }else
                    {
                        $("#mes").html("Failed to Create  Sales Office "+$('#company_name :selected').text());
                    }
                });





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
                           Assign Feature To Client

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
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Assign Feature To Client</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">


                                        <!---->
                                        <!--    <input type="hidden" name="companyId" id="cmpid">-->
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Master Client:</label>
                                            <select  class="form-control" name="company_name" id="company_name" onchange="get_sale_office()">
                                                
                                            </select>
                                        </div>
                                       <!-- <div class="form-group">
                                            <label for="exampleInputPassword1">Sales Office</label>
                                            <select  class="form-control" name="sales_off" required="" id="sales_off" >

                                                <option value=" ">Select</option>


                                            </select>
                                        </div>-->

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role Name:</label>
                                            <input type="text"  title="Name Only Characters Are Allowd" required="" id="role_name" class="form-control"  placeholder="Role  Name" name="role_name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role Desciption:</label>
                                            <input type="text"  class="form-control"  required="" id="role_desc"   placeholder="Role Description" name="role_desc">
                                        </div>


                                        <div >
                                            <table class="table table-striped">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Role</th>
                                                        <th> UI Role Name</th>
                                                        <th>UI Position</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="ui_table">

                                                    </tbody>
                                                </table></div>
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
            $("#challan_no").focus();

            $('#main').bootstrapValidator({
                live: 'enabled',

                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {
                    check_pos();
                    return false;
                },
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    shipper_name: {
                        message: 'The Name No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The name no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Name no be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-]+$/i,
                                message: 'The Name cannot be special character'
                            }

                        }
                    },
                    last_name: {
                        message: 'The Last Name  is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The name no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Name no be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-]+$/i,
                                message: 'The Name cannot be special character'
                            }

                        }
                    },
                    company_name: {
                        message: 'The Client Name No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Client Name  is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Client Name  be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-]+$/i,
                                message: 'The Client Name  cannot be number only character'
                            }

                        }
                    },
                    client_cnt_name: {
                        message: 'The  Reference Name No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The  Reference Name  is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The  Reference Name  be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-]+$/i,
                                message: 'The  Reference Name cannot be number only character'
                            }

                        }
                    },
                    mobile_no: {
                        message: 'The Contact No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Contact no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 10,
                                max: 13,
                                message: 'The Contact should be at least 10 digit'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'The Contact number  cannot be  character'
                            }

                        }
                    },
                    user_name:{
                        validators: {

                            emailAddress: {
                                message: 'The USER NAME  is not valid:username@Clientname.xyz'
                            }
                        }
                    },
                    client_cnt_no: {
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
                    },
                    client_pan: {
                        message: 'The Pan Card No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Pan Card No is required and cannot be empty'
                            },
                            regexp: {
                                regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
                                message: 'The Pan Card No is incorrect'
                            }

                        }
                    },
                    client_ifsc: {
                        message: 'The IFCS CODE is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The IFCS CODE is required and cannot be empty'
                            },
                            regexp: {
                                regexp: /^[A-Z|a-z]{4}[0][\d]{6}$/,
                                message: 'The IFCS CODE No is incorrect'
                            }


                        }
                    },


                    shipper_pincode: {
                        message: 'The Pincode is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Pincode is required and cannot be empty'
                            },
                            regexp: {
                                regexp: /^[0-9]{1,6}$/,
                                message: 'The Pincode No is incorrect'
                            }


                        }
                    },
                    client_bank: {
                        message: 'The Bank Name No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Bank name no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Bank Name no be more than 2 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-]+$/i,
                                message: 'The Bnak Name cannot be special character'
                            }

                        }
                    },
                    client_acc_no: {
                        message: 'The Bank Acc no No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Bank Acc no no is required and cannot be empty'
                            }


                        }
                    },
                    client_bank_branch: {
                        message: 'The Bank Branch Code is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Bank Branch Code is required and cannot be empty'
                            }


                        }
                    },
                    shipper_tin: {
                        message: 'The Tin no is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Tin no is required and cannot be empty'
                            }


                        }
                    },
                    shipper_cin: {
                        message: 'The Cin no is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Cin no is required and cannot be empty'
                            }


                        }
                    },
                    shipper_vat: {
                        message: 'The VAT no is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The VAT no is required and cannot be empty'
                            }


                        }
                    },
                    shipper_add1: {
                        message: 'The Address 1 is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Address 1 is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 140,
                                message: 'The Address 1  be more than 2 and less than 140 characters long'
                            }


                        }
                    },
                    shipper_add2: {
                        message: 'The Address 2 is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Address 2 is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 140,
                                message: 'The Address 2 be more than 2 and less than 140 characters long'
                            }


                        }
                    },
                    rate: {
                        message: 'The Rate is not valid',

                        validators: {
                            notEmpty: {
                                message: 'The Rate is required and cannot be empty'
                            },
                            stringLength: {
                                min: 1,
                                max: 13,
                                message: 'The Rate is number should be at least 1 digit'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'The Rate must be a number cannot be character'
                            }


                        }
                    },

                    cof: {
                        validators: {
                            notEmpty: {
                                message: 'Please Choose Care of Address '

                            }
                        }
                    },
                    co: {
                        validators: {
                            notEmpty: {
                                message: 'Please Choose Consignee '

                            }
                        }
                    }

                }

            });


            $('#autocomplete').autoComplete({
                minChars: 1,
                source: function (term, suggest) {
                    term = term.toLowerCase();
                    var choices = getdatas();//['ActionScript', 'AppleScript', 'Asp', 'Assembly', 'BASIC', 'Batch', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Scheme', 'SQL', 'TeX', 'XML'];
                    var suggestions = [];
                    for (var i = 0; i < choices.length; i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });



            /*$("#main").submit(function(e)
             {



             return false;
             });
             */


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