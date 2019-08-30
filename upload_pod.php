

<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset( $_SESSION['user_names']))
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
        </style>


        <script type="text/javascript">





function load()
{

    set_menus('<?php echo $_SESSION['list']?>');
var levelOptions="";
    $.post("companyListForReport.php","",function(ty)
    {

        var option="<option value=''>Select Company</option>";
        var obj=JSON.parse(ty);
        var data_aaray=new Array();
        for(var i=0;i<obj.LIST.length;i++)
        {data_aaray[i]=new  Array();
            data_aaray[i][0]=obj.LIST[i].clientID;
            data_aaray[i][1]=obj.LIST[i].company_name;
            option+="<option value='"+data_aaray[i][0]+"'>"+data_aaray[i][1]+"</option>";
        }
        $("#main_company_id1").html(option);

        ///call_header($("#main_company_id1"))
    })
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

get_sale_office();





        });


    }



function call_header(xx){

    set_company111(xx)
}
function call_by_company(qq){

    $('#typeid').val("").attr("selected", "selected");
    $('#cmp_type>div>select').val("Company").attr("selected", "selected");
    $('#cmp_type>div>select').change();
    //get_warehouse_shipper1(qq);
}
function call_by_sales(aa){

    $('#company_typeids').val("").attr("selected", "selected");
    $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
    $('#cmp_type>div>select').change();
    //get_warehouse_shipper1(aa);
}
function set_company111(x)
{
    //$("#append_cmp").html("<img src='loader1.gif'>");
    $("#append_cmp").html("");

    $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");

    var query={"id":x};
    $.get("getSaleOfficeList.php",query,function(user_ret)
    {


        var obj=JSON.parse(user_ret);
        var option="";
        var data_append=new Array();
        if(obj.COMPANY.length>0)
        {

            $("#cmp_type>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
            $("#show_contain").show();
            $("#ors").show();
            $("#company_panel").show();

            $("#main_company_container").removeClass("col-lg-3")
            $("#main_company_container").addClass("col-lg-12");
            var options="<option value=''>Select Company</option>";
            var data_append1=new Array();
            for(var i=0;i<obj.COMPANY.length;i++)
            {


                data_append1[i]=new Array();
                data_append1[i][0]=obj.COMPANY[i].salesOfficeID;
                data_append1[i][1]=obj.COMPANY[i].company_name;
                options+="<option value='"+data_append1[i][0]+"'>"+data_append1[i][1]+"</option>";

            }
            $("#company_typeids").html(options);
            //      asn_inbound_details($("#typeid").val());
        }



        if(obj.LIST.length==0)
        {

            $("#ors").hide()
            $("#salesoffice_contain").hide();
            $("#cmp_type").remove();
            $("#main_company_container").removeAttrs("class");
            $("#main_company_container").addClass("col-lg-12");

            //$("#main_company_container").removeClass("col-lg-10")

        }

        /*
         else if(obj.LIST.length==0 && obj.COMPANY.length>0 )
         {
         $("#show_contain").show();
         $("#cmp_type>div>select").append("<option value='Company'>Company</option>");

         $("#main_company_container").removeClass("col-lg-12")
         $("#main_company_container").addClass("col-lg-3");
         $("#ors").hide();
         $("#company_panel").show();




         }*/

        else if(obj.LIST.length>0 && obj.COMPANY.length==0 )
        {
            $("#show_contain").show();
            $("#cmp_type>div>select").append("<option value='Sales Office'>Sales Office</option>");

            $("#main_company_container").removeClass("col-lg-12")
            $("#main_company_container").addClass("col-lg-3");

        }


        option="<option value=''>Select Sales Office</option>";

        for(var i=0;i<obj.LIST.length;i++)
        {


            data_append[i]=new Array();
            data_append[i][0]=obj.LIST[i].slaveID;
            data_append[i][1]=obj.LIST[i].company_name;
            option+="<option value='"+data_append[i][0]+"'>"+data_append[i][1]+"</option>";

        }


        $("#typeid").html(option);
        //set_fun(x)
        // $("#append_cmp1").html("");
        //
        // $("#append_cmp1").append("<input type='hidden' value='' id='ids_value1'> <div id='show_contain1' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container1'></div>  <div  class='col-lg-6' style='display:none ' id='company_panel1'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids1' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors1' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain1'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid1' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");
        // $("#show_contain1").show();
        // $("#ors1").show();
        // $("#company_panel1").show();
        /*  if ($("#company_panel").css("display") != "none") {
         asn_inbound_details($("#company_typeids").val());
         }else {

         asn_inbound_details($("#typeid").val());


         }*/

//




    });










}

function set_cmp(a)
{


    if(a=="Company")
    {

        set_items_company();
    }
    else if(a=="Sales Office")
    {



        set_item()

    }
}
function set_items_company()
{


    $("#ids_value").val($("#company_typeids").val());





}
function set_item()
{



    $("#ids_value").val($("#typeid").val());




}













function pod_update(c,d)
{
    var compid=$("#typeid").val();

    $("#myModal").modal('show');
    $("#tbd").html("");
    $("#typ").html("<iframe class='col-lg-12' style='height:500px;width:100%;border: none;' src='upload1/examples/pod.php?challan="+c+"&order_id="+d+"'> </iframe>");


}














////////////////////////get_sale_office/////////

function get_sale_office() {


    //alert(ar1);
    var client_id=$("#typeid").val();
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

}















            function search_challan()
            {
                 var sales_id=$("#ids_value").val();
                var search_id= $.trim($("#search_id").val());
                querss={"challan_no":search_id,"sales_id":sales_id};
                $.post("pod_search.php",querss,function(rt)
                {


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
                            datakk[i][5] = obj1.TRACK[i].order_id;

$("#tbd").append("<tr id='"+datakk[i][0]+"' title='"+datakk[i][5]+"'  onclick='pod_update(this.id,this.title)' ><td>"+datakk[i][0]+"</td><td>"+datakk[i][1]+"</td><td>"+datakk[i][2]+"</td><td>"+datakk[i][3]+"</td><td>"+datakk[i][4]+"</td></tr>");

                        }





                    }else
                    {

                        show_modal("POD Already Uploaded and Challan is in Goods Delivered Process "+rt);


                    }






                });





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
                            POD    Update
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
                <div class="panel panel-green  margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1q">Company Name:</label>
                                        <select  class="form-control" name="main_company_id1" required="" id="main_company_id1" onchange="call_header(this.value)" >



                                        </select>
                                    </div>

                                </div>
                            </div></div>
                    </div>
                </div>

                <div id="append_cmp" >

                </div>


                <div style="display: none;" class="col-lg-2" id="cmp_type">
                    <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>


                <div class="row">

                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Search</h3>
                        </div>
                        <div class="panel-body ">
                            <br> <form for="form"  id="search_challan">
                                <div class="row">


                                   <div class="col-lg-4" style="display:none;">

<div class="form-group">

                                            <select title="Select Company" id="typeid" onchange="get_sale_office()" class="form-control">
                                                <option>Select</option>

                                            </select>
</div>


                                    </div>



                                    <div class="col-lg-4" style="display:none;>
                                        <div class="form-group">

                                            <select  class="form-control" name="sales_off" required="" id="sales_off" onchange="onchange_sale();" >

                                                <!--  <option value="INBOUND">Inbound</option>-->

                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-lg-12">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                        <center><div class="input-group">
                                            <input type="text" class="form-control" name="search_challan" placeholder="Challan No.." id="search_id" aria-describedby="basic-addon2">
                                            <span style="cursor:pointer;" class="input-group-addon"  onclick="search_challan()" id="basic-addon2"><span class="glyphicon glyphicon-search"></span> Search</span>
                                        </div></center></div>



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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->





    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="static" >
        <div class="modal-dialog" style="width: 900px">

            <!-- Modal content-->
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="modal-body" id="typ">


                            </div>
                    </div>
                <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
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

alert(ert);
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