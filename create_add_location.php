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
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <script type="text/javascript" src="side_menu.js"></script>
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
        <script type="text/javascript">
        </script>
    </head>
    <body class="bds" onload="load();"  >
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
    <div id="wrapper">        <!-- Navigation -->
        <?php

        include ("include/menus.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Create Location
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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1q">Select Warehouse:</label>
                                            <select  class="form-control" name="company_name" required="" id="company_name"  >
                                                <option value="-1">Select</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="col-lg-6"></div>	
                                </div></div>
                        </div>
                    </div>
                    <table class="table table-striped  table-hover">
                        <thead>
                        <tr>
                            <th>Physical ID</th>
                            <!-- <th>Bin ID</th> -->
                            <th>Level ID</th>
                            <th>Row ID</th>
                            <th>Column ID</th>
                            <!-- <th>Zone ID</th> -->
                            <th>Floor ID</th>
                            <th>Storage Property ID</th>
                            <!-- <th>Weight Capacity</th>
                            <th>isTemperature Control</th>
                            <th>Min Temperature</th>
                            <th>Max Temperature</th> -->
                            <th>Storage Type</th>
                        </tr>
                        </thead>
                        <tbody id="curier_partener"></tbody>
                    </table>
                    <br><br>
                    <form id="main_form">
                  <div class="row">
                      
                      <div class="col-lg-3">
                       <div class="form-group">
                            <input type="text" required placeholder="Physical ID" id="Physical_ID" name="Physical_ID" class="form-control">
                        </div>
                        </div>


                        <div class="col-lg-3" style="display:none">

                        <div class="form-group">
                            <input type="text" value="-" required placeholder="Bin ID" name="Bin_ID" id="Bin_ID" class="form-control">
                        </div>
                        </div>

                        <div class="col-lg-3">   <div class="form-group">
                            <input type="text" required placeholder="Level ID" name="Level_ID" id="Level_ID" class="form-control">
                            </div></div>

                            
                        <div class="col-lg-3"> <div class="form-group">
                                <input type="text" required placeholder="Row ID" name="Row_ID" id="Row_ID" class="form-control">
                            </div></div>


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" required placeholder="Column ID" name="Column_ID" id="Column_ID" class="form-control">
                                </div></div>
                            
                    </div>


                      <div class="row">
                        
                           


                            <div class="col-lg-3" style="display:none">   <div class="form-group">
                                    <input type="text" value="-"  required placeholder="Zone ID" name="Zone_ID" id="Zone_ID" class="form-control">
                                </div></div>


                                <div class="col-lg-3"> <div class="form-group">
                                        <input type="text" required placeholder="Floor ID" name="Floor_ID" id="Floor_ID" class="form-control">
                                    </div></div>


                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" required name="Storage_Property_ID" id="Storage_Property_ID"></select>
                                    </div></div>

                                    <div class="col-lg-3"> <div class="form-group">
                                    <select class="form-control" required name="Storage_Type" id="Storage_Type">
                                        <option value="">Select Storage Type</option>
                                        <option value="saleable">Saleable</option>
										<option value="nonSaleable">Non-Saleable</option>
										<option value="return">Return</option>
                                        <option value="unload">Unload</option>
                                        <option value="qc">QC</option>
                                        <option value="qt">QT</option>
                                        <option value="kitting">Kitting</option>
                                    </select>
                                </div></div>
                        </div>

                        <div class="row">

                                    <div class="col-lg-3" style="display:none">   <div class="form-group">
                                            <input type="number" title="Only Numbers" value="0" required name="Weight_Capacity" id="Weight_Capacity" placeholder="Weight Capacity" class="form-control">
                                        </div></div>

                                    <div class="col-lg-3" style="display:none"> <div class="form-group">
                                            <select class="form-control"  name="isTemperature" id="isTemperature" onChange="changeTemp()">
                                                <option value="">Select isTemperature</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div></div>

                                    <div class="col-lg-3" style="display:none">
                                        <div class="form-group">
                                            <input type="number" value="0" title="Only Numbers" required name="Min_Temperature" id="Min_Temperature" placeholder="Min Temperature" class="form-control">
                                        </div></div>
                                        
                                    <div class="col-lg-3" style="display:none">   <div class="form-group">
                                            <input type="number" value="0" title="Only Numbers" required name="Max_Temperature" id="Max_Temperature"  placeholder="Max Temperature" class="form-control">
                                        </div></div>

                         </div>


                        <div class="row"> 

                            

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="hidden"  name="Availability" id="Availability" class="form-control">
                                </div></div>

                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-2">
                                <input type="submit" class="btn btn-default" value="Add Item">
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <form role="form" id="post_location">
                        <input id="return_client_mt_id" name="client_material_id" type="hidden" value="">
                        <input id="return_stock_uom" name="uom" type="hidden" value="">
                        <input id="return_order_id" name="order_id" type="hidden" value="">
                        <input id="order_items_id" name="order_items_id" type="hidden" value="">
                        <div class="modal-footer"><center><input type="submit" id="quantity_Submit" class="btn btn-default">&nbsp;&nbsp;<button type="reset" onclick="fresh()" data-dismiss="modal" class="btn btn-primary">Cancel</button></center></div>
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
    <div id="curier_package_modal" class="modal fade">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <!-- dialog body -->
                <form id="currier_submit">
                    <div class="modal-header"><h4>Curier Package Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body"><div class="container-fluid">
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Date </label>
                                    <div class="controls input-append date form_date"  data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input  name="dates" title="Date" class="input-group-lg" style="cursor:not-allowed;border: 1px solid darkgrey;border-radius: 5px;height: 30px;width: 250px;padding-left: 10px;" required size="26" type="text" id="dates"    placeholder="Date"  >
                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                    </div>
                                    <input type="hidden"  name="actual_date" id="dtp_input2"  />
                                </div>
                            </div>
                            <input type="hidden" name="parent_id" id="parent_id" value="">
                            <input type="hidden" name="partner_name" id="parent_name" value="">
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Content</label>
                                    <select name="package_content" required class="form-control"><option value="Product">Product</option><option value="Document">Document</option></select>
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Insurance </label>
                                    <select required name="insurance" class="form-control"><option value="YES">Yes</option><option value="NO">No</option></select>
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Type </label>
                                    <select required name="package_type" id="packages_type" class="form-control" onchange="no_change_type(this.value)"><option value="Identical">Identical</option><option value="Different">Different</option></select>
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">No. of Package </label>
                                    <input required placeholder="Number Of Package" disabled value="1" oninput="append_table(this.value)" type="number" class="form-control" id="no_packge" name="no_package">
                                </div>
                            </div>
                            <div class="col-lg-6">  <div class="form-group">
                                    <label class="">Package Description </label>
                                    <select name="package_desc" required class="form-control"><option value="BOOK">Book</option><option value="Watch">Watch</option></select>
                                </div>
                            </div>
                            <div class="col-lg-12" id="append_table">
                            </div>
                        </div>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><Center><button type="submit"   class="btn btn-primary">Finish</button><button type="reset"  data-dismiss="modal" class="btn btn-default">Cancel</button></Center></div>
                </form>
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
            forceParse: 0,
            startDate: '-0d',
            changeMonth: true
        });
    </script>
    <div id="curier_modal" class="modal fade">
        <div class="modal-dialog" style="width: 60%">
            <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-header">
                    <h4>Available Courier Partners</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <table   class="table table-striped  table-hover">
                        <thead>
                        <tr>
                            <th>Partner Name</th>
                            <th>Service Name</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Grand Total</th>
                            <th>Open</th>
                        </tr>
                        </thead>
                        <tbody id="curier_partener"></tbody>
                    </table>
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!----div message box!------->
    <div id="myModal0" class="modal fade" style="z-index: 50000">
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
        function append_table(a) {
            $("#append_table").html("")
            for (var i = 1; i <= a; i++) {
                $("#append_table").append('<label>Package ' + i + '</label>  <div class="form-group"> <div class="col-lg-4"><input placeholder="Length" required type="number" class="form-control" id="no_length"  name="no_length[]"><br></div> <div class="col-lg-4"><input placeholder="Width" type="number" class="form-control" id="no_width" name="no_width[]" required><br></div> <div class="col-lg-4"><input placeholder="Height" type="number" class="form-control" id="no_height" required name="no_height[]"><br></div> <div class="col-lg-4"><input placeholder="Weight" type="number" class="form-control" id="no_weight" required name="no_weight[]"></div> <div class="col-lg-4"><input placeholder="Carrier Value" type="number" class="form-control" required id="no_carrier" name="no_carrier[]"></div> <div class="col-lg-4"><input placeholder="Quantity" required type="number" class="form-control" id="no_quantity" name="no_quantity[]"></div> </div>');
            }
        }
        function no_change_type(c)
        {
            if(c=="Identical")
            {
                $("#no_packge").attr("disabled",true);
                $("#no_packge").val("1");
                $("#append_table").html();
            }else if(c=="Different")
            {
                $("#no_packge").removeAttr("disabled");
                $("#no_packge").val("");
                $("#append_table").html();
            }
        }
        function set_aprent_id(r,p)
        {
            $("#parent_id").val(r);
            $("#parent_name").val(p);
        }
        function fresh()
        {
            window.location.reload()
        }
        var hd1;
        var datak;
        var ko="";
        var levelOptions="";
        function setData1(arr) {
           // alert(arr+"warehouse")
            if (levelOptions == "") {
                ko = arr;
                var obj = JSON.parse(arr);
                datak = new Array();
                var levelOption = "";
                var out = new Array();
				levelOptions=levelOptions+"<option>Select</option>";
                for (var i = 0; i < obj.LIST.length; i++) {
                    datak[i] = new Array();
                    datak[i][0] = obj.LIST[i].wareHouseID;
                    datak[i][1] = obj.LIST[i].wareHouseName;
                    /* datak[i][2] = obj.LIST[i].tinNo;
                     datak[i][3] = obj.LIST[i].cinNo;*/
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
            }
        }

        function changeTemp()
        {
            var temp_status=document.getElementById("isTemperature").value ;
            //alert("status: "+temp_status);
            if (temp_status == "No") {
                $("#Min_Temperature").val("0");
                 $("#Max_Temperature").val("0");
                 document.getElementById("Min_Temperature").readOnly =true;
                 document.getElementById("Max_Temperature").readOnly =true;
                 
                // document.getElementById("Min_Temperature").value="-";
                // document.getElementById("Min_Temperature").value="-";
                 ///alert("Value: "+document.getElementById("Min_Temperature").value);
            } else {
                document.getElementById("Min_Temperature").readOnly =false;
                 document.getElementById("Max_Temperature").readOnly =false;
            }
        }

        function load(){
            set_menus('<?php echo $_SESSION['list']?>');
            $.get("view_storage_data.php","",function(hd){
                hd1=hd;
                var obj=JSON.parse(hd);
                var option="<option value=''>Select Storage Property</option>";
                var data=new Array();
                for(var i=0;i<obj.LIST.length;i++){
                    data[i]=new Array();
                    data[i][0]=obj.LIST[i].storageTypeId;
                    data[i][1]=obj.LIST[i].storageType;
                    data[i][2]=obj.LIST[i].height;
                    data[i][3]=obj.LIST[i].width;
                    data[i][4]=obj.LIST[i].length;
                    data[i][5]=obj.LIST[i].weight;
                    option+="<option title='"+ data[i][0]+"' value='"+ data[i][1]+" "+ data[i][2]+" "+ data[i][3]+" "+ data[i][4]+" "+ data[i][5]+"'>"+ data[i][1]+" "+ data[i][2]+" "+ data[i][3]+" "+ data[i][4]+" "+ data[i][5]+"</option>";
                }
                $("#Storage_Property_ID").html(option);
                //get_warehouse();
            });
            $.get("getWareHouseList.php","",function(fg)
            {
                //alert(hd);
//                var a=hd;
//
                setData1(fg);
            });
        }

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

            $("#logistic_order_form").submit(function()
            {
                var form_data=$(this).serialize();
                form_data+="&logistic_id="+$("#logistic_client_type").val()+"&comp_id="+$("#typeid1").val();
                $("#curier_partener").html("<img src='loader1.gif'>");
                $("#myModal_order_avail").modal("hide");
                $("#curier_modal").modal("show");
                $.post("shipyaariServiceSearch.php",form_data,function(rtt)
                {
                    $("#curier_partener").html("");
                    var obj = JSON.parse(rtt);
                    if(obj.length==0)
                    {
                        show_modal("Sorry No Data Available")
                    }
                    var datakk = new Array();
                    for (var i = 0; i < obj.length; i++) {
                        datakk[i] = new Array();
                        datakk[i][0] = obj[i].Partner_id;
                        datakk[i][1] = obj[i].ServiceName;
                        datakk[i][2] = obj[i].Message;
                        datakk[i][3] = obj[i].status;
                        datakk[i][4] = obj[i].PartnerName;
                        datakk[i][5] = obj[i].GrandTotal;
                        $("#curier_partener").append("<tr id='"+datakk[i][0]+"' title='"+datakk[i][4]+"' onclick='set_aprent_id(this.id,this.title)' data-toggle='modal' data-dismiss='modal' data-target='#curier_package_modal' style='cursor: pointer' ><td>"+datakk[i][4]+"</td><td>"+datakk[i][1]+"</td><td>"+datakk[i][2]+"</td><td>"+datakk[i][3]+"</td><td>"+datakk[i][5]+"</td><td><i class='fa fa-mail-reply fa-1x'></i></td></tr>")
                    }
                })
                return false;
            });
$("#main_form").submit(function(){
var s1="";
    var obj1=JSON.parse(hd1);
    var data1=new Array();
    for(var i=0;i<obj1.LIST.length;i++){
        data1[i]=new Array();
        data1[i][0]=obj1.LIST[i].storageTypeId;
        data1[i][1]=obj1.LIST[i].storageType;
        data1[i][2]=obj1.LIST[i].height;
        data1[i][3]=obj1.LIST[i].width;
        data1[i][4]=obj1.LIST[i].length;
        data1[i][5]=obj1.LIST[i].weight;
        var title=data1[i][1];
        var t1=data1[i][2];
        var t2=data1[i][3];
        var t3=data1[i][4];
        var t4=data1[i][5];
        var tb=title+" "+t1+" "+t2+" "+t3+" "+t4;
var isTemperature_value="N";

// if($("#isTemperature").val()=="Yes"){
//     isTemperature_value="Y";
// }else{
//     isTemperature_value="N";
//         }

if($("#Storage_Property_ID").val()== tb){
    s1=data1[i][0];
    $("#return_client_mt_id").val(s1);
}
    }
    //alert($("#return_client_mt_id").val()+"123")
//    var a=$("#Storage_Property_ID").attr("title");
//    alert($("#Storage_Property_ID").attr("title"));


    // $("#curier_partener").append("<tr><td>"+$("#Physical_ID").val()+"</td><td>"+$("#Bin_ID").val()+"</td><td>"+$("#Level_ID").val()+"</td><td>"+$("#Row_ID").val()+"</td><td>"+$("#Column_ID").val()+"</td><td>"+$("#Zone_ID").val()+"</td><td>"+$("#Floor_ID").val()+"</td><td>"+$("#Storage_Property_ID").val()+"</td><td>"+$("#Weight_Capacity").val()+"</td><td>"+$("#isTemperature").val()+"</td><td>"+$("#Min_Temperature").val()+"</td><td>"+$("#Max_Temperature").val()+"</td><td>"+$("#Storage_Type").val()+"</td><td  style='display: none'>"+$("#return_client_mt_id").val()+"</td><td  style='display: none'>"+isTemperature_value+"</td></tr>");


    $("#curier_partener").append("<tr><td>"+$("#Physical_ID").val()+"</td><td>"+$("#Level_ID").val()+"</td><td>"+$("#Row_ID").val()+"</td><td>"+$("#Column_ID").val()+"</td><td>"+$("#Floor_ID").val()+"</td><td>"+$("#Storage_Property_ID").val()+"</td><td>"+$("#Storage_Type").val()+"</td><td  style='display: none'>"+$("#return_client_mt_id").val()+"</td><td  style='display: none'>"+isTemperature_value+"</td></tr>");

    $("#main_form")[0].reset();
    return false;
});
$("#post_location").submit(function(){
    var Physical="";
    var Bin="-";
    var Level="";
    var Row="";
    var Column="";
    var Zone="-";
    var Floor="";
    var StorageProperty="" ;
    var Weight="-";
    var isTemperature="-";
    var MinTemperature="-";
    var MaxTemperature="-";
    var StorageType="";
    //var Availability="";
var wareHouseID=$("#company_name").val();
    for(var i=0;i<$("#curier_partener tr").length;i++){
        if(i==0){
            Physical += $("#curier_partener tr").eq(i).find("td").eq(0).text();
          //  Bin += $("#curier_partener tr").eq(i).find("td").eq(1).text();
            Level += $("#curier_partener tr").eq(i).find("td").eq(1).text();
            Row+= $("#curier_partener tr").eq(i).find("td").eq(2).text();
            Column += $("#curier_partener tr").eq(i).find("td").eq(3).text();
          //  Zone += $("#curier_partener tr").eq(i).find("td").eq(5).text();
            Floor += $("#curier_partener tr").eq(i).find("td").eq(4).text();
            StorageProperty+= $("#curier_partener tr").eq(i).find("td").eq(5).text();
            // Weight += $("#curier_partener tr").eq(i).find("td").eq(8).text();
            // isTemperature += $("#curier_partener tr").eq(i).find("td").eq(14).text();
            // MinTemperature += $("#curier_partener tr").eq(i).find("td").eq(10).text();
            // MaxTemperature+= $("#curier_partener tr").eq(i).find("td").eq(11).text();
            StorageType+= $("#curier_partener tr").eq(i).find("td").eq(6).text();
            //Availability+= $("#curier_partener tr").eq(i).find("td").eq(13).text();
        }else{
            Physical += "*"+ $("#curier_partener tr").eq(i).find("td").eq(0).text();
            //Bin += "*"+  $("#curier_partener tr").eq(i).find("td").eq(1).text();
            Level += "*"+  $("#curier_partener tr").eq(i).find("td").eq(1).text();
            Row+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(2).text();
            Column += "*"+  $("#curier_partener tr").eq(i).find("td").eq(3).text();
           // Zone +="*"+  $("#curier_partener tr").eq(i).find("td").eq(5).text();
            Floor += "*"+ $("#curier_partener tr").eq(i).find("td").eq(4).text();
            StorageProperty+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(5).text();
            // Weight += "*"+  $("#curier_partener tr").eq(i).find("td").eq(8).text();
            // isTemperature += "*"+ $("#curier_partener tr").eq(i).find("td").eq(14).text();
            // MinTemperature += "*"+  $("#curier_partener tr").eq(i).find("td").eq(10).text();
            // MaxTemperature+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(11).text();
            StorageType+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(6).text();
          //  Availability+= "*"+  $("#curier_partener tr").eq(i).find("td").eq(13).text();
        }
    }
  //  var main_query={"wareHouseID":wareHouseID,"Physical":Physical,"Bin":Bin,"Level":Level,"Row":Row,"Column":Column,"Zone":Zone,"Floor":Floor,"StorageProperty":StorageProperty,"Weight":Weight,"isTemperature":isTemperature,"MinTemperature":MinTemperature,"MaxTemperature":MaxTemperature,"StorageType":StorageType};

    var main_query={"wareHouseID":wareHouseID,"Physical":Physical,"Level":Level,"Row":Row,"Column":Column,"Floor":Floor,"StorageProperty":StorageProperty,"StorageType":StorageType};
//alert(main_query.StorageProperty)
    //alert(main_query.isTemperature)
   //console.log("Data: "+JSON.stringify(main_query));
   
    $.post("post_create_location.php",main_query,function(ho){
//alert(ho);
        if($.trim(ho)=="Y"){
            show_modal("Location Created Successfully");
            setTimeout(function(){
                window.location.reload()
            },3500)
        }else{
            show_modal(ho);
            setTimeout(function(){
                window.location.reload()
            },3500)
        }
    })
    return false;
});
            $(".treeview").click(function()
            {
                $(this).find(".treeview-menu").slideToggle();
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
            $("#currier_submit").submit(function()
            {
                if($("#packages_type").val()=="Different") {
                    var no_length = $("input[name='no_length[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_width = $("input[name='no_width[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_height = $("input[name='no_height[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_weight = $("input[name='no_weight[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_carrier = $("input[name='no_carrier[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var no_quantity = $("input[name='no_quantity[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var data = $(this).serialize();
                    data += "&challan_no=" + $("#logistic_challan_no").val() + "&order_id=" + $("#logistic_order_id").val()+"&payment_mode="+$("#payment_type").val()+"&total_invoice_value="+$("#total_invoice_value").val()+"&logistic_id="+$("#logistic_client_type").val()+"&partner_name1="+$("#package_type").val();
                    data += "&no_length1=" + no_length.join("*") + "&no_width1=" + no_width.join("*") + "&no_height1=" + no_height.join("*") + "&no_weight1=" + no_weight.join("*") + "&no_carrier1=" + no_carrier.join("*") + "&no_quantity1=" + no_quantity.join("*");
                    $.post("shipyaariWithPartnerId.php",data,function(ty)
                    {
                        if($.trim(ty)==null)
                        {
                            $("#curier_package_modal").modal("hide");
                            $("#set_loc_form")[0].reset();
                            $("#logistic_order_form")[0].reset();
                            $("#curier_partener").show();
                            $("#currier_submit")[0].reset();
                            $("#append_table").html("");
                            show_modal("Order Assign Successfully ");
                            get_location($("#typeid1").val())
                        }
                        else
                        {
                            show_modal(ty);
                        }
                    });
                }else
                {
                    var no_length1="1";
                    var no_width1="1";
                    var no_height1 = "1";
                    $("#no_packge").val("1");
                    var no_weight1 = "1";
                    var no_carrier1 ="1";
                    var no_quantity1 = "1";
                    var data1 = $(this).serialize();
                    data1 += "&challan_no=" + $("#logistic_challan_no").val() + "&order_id=" + $("#logistic_order_id").val()+"&payment_mode="+$("#payment_type").val()+"&total_invoice_value="+$("#total_invoice_value").val()+"&logistic_id="+$("#logistic_client_type").val()+"&partner_name1="+$("#package_type").val()+"&no_package="+$("#no_packge").val();
                    data1 += "&no_length1=" + no_length1 + "&no_width1=" + no_width1 + "&no_height1=" + no_height1 + "&no_weight1=" + no_weight1 + "&no_carrier1=" + no_carrier1+ "&no_quantity1=" + no_quantity1;

                    $.post("shipyaariWithPartnerId.php",data1,function(ty)
                    {
                        if($.trim(ty)=="N")
                        {
                            show_modal("Failed To Save")
                        }
                        else
                        {
                            $("#curier_package_modal").modal("hide");
                            $("#set_loc_form")[0].reset();
                            $("#logistic_order_form")[0].reset();
                            $("#curier_partener").show();
                            $("#currier_submit")[0].reset();
                            $("#append_table").html("");
                            get_location($("#typeid1").val())
                            //  show_modal("Order Assign Successfully ");
                            show_modal(ty)
                        }
                    });
                }
                return false;
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
            $("#set_loc_form").submit(function(){
                    if($("#logistic_client_type option:selected").text()=="shipyaari")
                    {
                        $("#set_location").modal("hide");
                        $("#myModal_order_avail").modal("show");
                        getShipyaariServiceData();
                    }
                    else {
                        show_modal("Sorry This Service not For This logistic Client.Will be Available Soon..")
                    }
                    return false;
                }
            );
            $("#main").submit(function () {
                get_location($("#typeid1").val())
                return false;
            });
////set material //
            function create_me(yt) {
                $("#tbd").html(" ");
                var   obj = JSON.parse(yt);
                datakk=new Array();
                for(var i = 0; i < obj.LIST.length; i++)
                {
                    datakk[i]=new Array();
                    datakk[i][0]=obj.LIST[i].item_code;
                    datakk[i][1]=obj.LIST[i].material_name;
                    datakk[i][2]=obj.LIST[i].unitOfMeasurement;
                    datakk[i][3]=obj.LIST[i].imageUrl;
                    if(datakk[i][3]==null || datakk[i][3]=="") {
                        $("#tbd").append("<tr><td class='item_image'><img src='no-image.jpg' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td></tr>");
                    }
                    else {
                        $("#tbd").append("<tr><td class='item_image'><img src='" + datakk[i][3] + "' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td></tr>");
                    }
                }
                //$('#tbd1').on( 'search.dt', function () { eventFired( 'Search' ); } ).on( 'page.dt',   function () { eventFired( 'Page' ); } ).dataTable();
            }
            //////set materail ends///
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

        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('#tbd tr').hide();
            $('#tbd tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        });
        $('#filter1').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('#materail_at_location tr').hide();
            $('#materail_at_location tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        });
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