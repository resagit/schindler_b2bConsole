<?php

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset($_SESSION['user_names']))
{


    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Cache-control" content="no-cache">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BMS Stock Report</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">


        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <script type="text/javascript" src="side_menu.js"></script>


        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
        <!-- Bootstrap styling for Typeahead -->
        <link href="dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
        <!-- Tokenfield CSS -->
        <link href="dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">
        <!-- Docs CSS -->
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link href="docs-assets/css/pygments-manni.css" type="text/css" rel="stylesheet">
        <link href="docs-assets/css/docs.css" type="text/css" rel="stylesheet">
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
            #ui-id-1,.ui-autocomplete{

                min-height: 20px;
                max-height: 200px;
                overflow: auto;


            }
        </style>

        <script src="js/jquery.js"></script>


        <!--   <script src="vendors/jquery-1.9.1.js"></script>-->


        <script type="text/javascript">
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
                $("#typeids").html(sales_off);
set_items();
            }




            function search_by_date()
            {


//alert(items);
                if($("#tokenfield-1").val()=="")
                {
                    show_modal("Please Select Item");
                }else if($("#dtp_input2").val()=="" || $("#dtp_input3").val()=="")
                {

                    show_modal("Please Select Date   ");

                }
                else {
                    $("#inbound tbody").html("<img src='loader1.gif'>");
                    var client_id=$("#ids_value").val();
                    var items=$("#tokenfield-1").val();
                    var from =$("#dtp_input2").val();
                    var to =$("#dtp_input3").val();
                    items=items.replace(" ","")
                     //  alert(items+" "+from+" "+to+" "+client_id);

                    var dft = {"startdate":from, "enddate":to,"company_id":client_id,"items":items};
                    $.get("getMaterialWiseReport.php", dft, function (ty) {

//alert(ty)
                        $("#inbound tbody").html("");


                        var objmm = JSON.parse(ty);

                        if ($.trim(ty) == "N" || objmm.DATA.length <=0) {

                            show_modal("Data Not Found")

                        }
                        else {

                            $("input[type=checkbox]").attr("checked",false);
                            $("#dis").removeAttr("disabled",true);
                            $("#inbound").find("tr").show();
                            $("#inbound").find("th").show();
                            objmm = JSON.parse(ty);

                        }

                    var dataktt = new Array();


                        for (var i = 0; i < objmm.DATA.length; i++) {

                            dataktt[i] = new Array();
                            dataktt[i][0] = objmm.DATA[i].chalan_no;
                            dataktt[i][1] = objmm.DATA[i].consignee;
                            dataktt[i][2] = objmm.DATA[i].ADDRESS;

                            dataktt[i][3] = objmm.DATA[i].Invoice_creationdate;
                            dataktt[i][4] = objmm.DATA[i].chalan_date;
                            dataktt[i][5] = objmm.DATA[i].item_code;
                            dataktt[i][6] = objmm.DATA[i].material;
                            dataktt[i][7] = objmm.DATA[i].order_quantity;
                            dataktt[i][8] = objmm.DATA[i].unitOfMeasurement;
                            dataktt[i][9] = objmm.DATA[i].per_unit_price;
                            dataktt[i][10]= objmm.DATA[i].total_price;
                            dataktt[i][11]= objmm.DATA[i].transport_vendor_id;
                            dataktt[i][12]= objmm.DATA[i].driver_name;
                            dataktt[i][13]= objmm.DATA[i].vehicle_no;
                            dataktt[i][14]= objmm.DATA[i].vehicle_type;
                            dataktt[i][15]= objmm.DATA[i].specialInstruction;
                            dataktt[i][16]= objmm.DATA[i].orderType;
                            dataktt[i][17]= objmm.DATA[i].statusName;
                            dataktt[i][18]= objmm.DATA[i].wareHouseName;
                            dataktt[i][19]= objmm.DATA[i].puAwayTime;
                            dataktt[i][20]= objmm.DATA[i].GoodsIssueTime;
                            dataktt[i][21]= objmm.DATA[i].statusName;
                            dataktt[i][22]= objmm.DATA[i].stockTransfer_delivery_time;

                            if (dataktt[i][16] == "INBOUND" || dataktt[i][16] == "OUTBOUND" || dataktt[i][16] == "STOCKTRANSFER" || dataktt[i][16] == "RETURNINBOUND") {




                                $("#inbound tbody").append("<tr ><td class='chalan_no'>" + dataktt[i][0] + "</td><td class='consignee'>" + dataktt[i][1] + "</td><td class='ADDRESS'>" + dataktt[i][2] + "</td><td class='Invoice_creationdate'>" + dataktt[i][3] + "</td><td class='chalan_date'>" + dataktt[i][4] + "</td><td class='item_code'>" + dataktt[i][5] + "</td><td class='material'>" + dataktt[i][6].replace(/[^A-Za-z 0-9 \"-_*]+/ig,'') + "</td><td class='order_quantity'>" + dataktt[i][7] + "</td><td class='uom'>" + dataktt[i][8] + "</td><td class='per_unit_price'>" + dataktt[i][9] + "</td><td class='total_price'>" + dataktt[i][10] + "</td><td class='transport_vendor_id'>" + dataktt[i][11] + "</td><td class='driver_name'>" + dataktt[i][12] + "</td><td class='vehicle_no'>" + dataktt[i][13] + "</td><td class='vehicle_type'>" + dataktt[i][14] + "</td><td class='specialInstruction'>" + dataktt[i][15] + "</td><td class='orderType'>" + dataktt[i][16] + "</td><td class='statusName'>" + dataktt[i][17] + "</td><td class='wareHouseName'>" + dataktt[i][18] + "</td><td class='puAwayTime'>" + dataktt[i][19] + "</td><td class='GoodsIssueTime'>" + dataktt[i][20] + "</td><td class='statusName'>" + dataktt[i][21] + "</td><td class='stockTransfer_delivery_time'>" + dataktt[i][22] + "</td></tr>");


                            }



                        }


                    });
                }
            }


            function order_type(de)
            {


                if(de=="ODT0000003")
                {


                    return "Inbound";

                }
                else if(de=="ODT0000004")
                {


                    return "Outbound";
                }
                else if(de=="ODT0000005")
                {



                    return "Return Inbound";
                }
                else if(de=="ODT0000006")
                {

                    return "Stock Transfer";

                }

            }




            function stock_id_check(x)
            {


                if(x=="400")
                {


                    return "ASN";

                }
                else if(x=="401")
                {


                    return "DSN";
                }else if(x=="402")
                {

                    return "Stock Tranfer";

                }
                else if(x=="411")
                {


                    return "Unload";
                }
                else if(x=="412")
                {


                    return "Quantity Check";
                }
                else if(x=="413")
                {


                    return "Quality Check";
                }
                else if(x=="414")
                {


                    return "Put Away";
                }
                else if(x=="415")
                {


                    return "Pick";
                }
                else if(x=="416")
                {


                    return "Pack";
                }
                else if(x=="417")
                {


                    return "Kitting";
                }

                else if(x=="418")
                {


                    return "Good Issue";
                }
                else if(x=="419")
                {


                    return "Good Delivered";
                }
                else if(x=="420")
                {


                    return "Stock Transfer Pick";
                }

                else if(x=="421")
                {


                    return "Stock Transfer Delivered";
                }
                else if(x=="444")
                {


                    return "Cancel";
                }


            }




            var ksp="";
            addeditems=[];
            var indexs;









            //  create_me(hd);




            var ko="";

            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');
                // queres={"userNumber":userNumber,"role":role};
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

                    call_header($("#main_company_id1"))
                })

                $.post("companylist.php","",function(hd)
                {//
                    //alert(hd)
                    // alert(hd+"mateirlal");


                    var a=hd;

                    setData(a);

                    ko =a;
                    /*   var   obj = JSON.parse(hd);
                     //   $("#typeid").html("");



                     datak=new Array();



                     var levelOption="";
                     var out=new Array();

                     for(var i = 0; i < obj.LIST.length; i++) {

                     datak[i]=new Array();
                     datak[i][0]=obj.LIST[i].item_code;
                     datak[i][1]=obj.LIST[i].material_name;
                     datak[i][1]=obj.LIST[i].unitOfMeasurement;
                     datak[i][1]=obj.LIST[i].imageUrl;

                     //      $("#typeid").append("<option value='"+datak[i][0]+"'>"+ datak[i][1]+"</option>");
                     //data[i][1]=obj.LIST[i].name;
                     //data[i][7]=obj.DETAIL[i].requestTimestamp;

                     //   levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



                     // alert(datak[i][2]);
                     //alert(data[i][1]);

                     //alert(levelOption);



                     }*/


                });




                //     shipper_change("All")


                // setup autocomplete function pulling from currencies[] array

            }
            function call_by_company(qq){

                $('#typeid').val("").attr("selected", "selected");
                $('#cmp_type>div>select').val("Company").attr("selected", "selected");
                $('#cmp_type>div>select').change();$("#ids_value").val(qq);
                //get_warehouse_shipper1(qq);
            }
            function call_by_sales(aa){
           //     alert();
                $('#company_typeids').val("").attr("selected", "selected");
                $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
                $('#cmp_type>div>select').change();
                //get_warehouse_shipper1(aa);
            }
            function call_header(cmp_id)
            {
              //  alert(cmp_id);
                //$("#append_cmp").html("<img src='loader1.gif'>");
                set_company111(cmp_id)



                get_to_company(cmp_id)

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

               //     alert("ahsdj");

                    set_item()

                }
            }
            function set_items_company()
            {

//alert("1");
                $("#ids_value").val($("#company_typeids").val());



                set_items();

            }
            function set_item()
            {

           //     alert("11");

                $("#ids_value").val($("#typeid").val());

                set_items();


            }

            var datak;
            var levelOptions="";
            function setData(arr) {
                ///$("#typeid").html("");




                ko=arr;
                var   obj = JSON.parse(arr);


                datak=new Array();



                var levelOption="";
                var out=new Array();

                for(var i = 0; i < obj.LIST.length; i++) {

                    datak[i]=new Array();
                    datak[i][0]=obj.LIST[i].id;
                    datak[i][1]=obj.LIST[i].name;

                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //alert(levelOption);



                }

                $("#typeid").html(levelOptions);

               get_sale_office();
                //  get_warehouse_shipper();

                //    $("#challan").append(levelOptions);


                //var no= document.getElementById("typeid").selectedIndex;
                // alert(no);
                // alert(no+"Indesx");
                // change(no);
                // getMaterailList(ids);

            }



            function shipper_change(arr) {
                $("#tbd1").html("");
                var ret="";
                drr={"warehouse_id":arr};
                if(arr=="All") {
                    $.get("get_all_warehouse.php", drr, function (tt) {
                        create_me(tt);
                    });
                }else {

                    $.get("get_warehouse.php", drr, function (ttt) {


                        if($.trim(ttt)=="N" || $.trim(ttt)=="")
                        {
                            show_modal("Sorry Data Is Not Available On this warehouse")
                        }else {
                            create_me(ttt);
                        }
                    })
                }

                ///$("#typeid").html("");




            }



            //$("#typeid").html(levelOptions);




            //    $("#challan").append(levelOptions);


            //var no= document.getElementById("typeid").selectedIndex;
            // alert(no);
            // alert(no+"Indesx");
            // change(no);
            // getMaterailList(ids);



            ///Conf Adress



            var $rows = $('#tabl_expr tr');
            $('#search_table').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });


            /////////////update items//////////

            function set_item_id(b)
            {

                $("#myModal_upload_image").modal('show');
                $("#item_id").val(b);
            }






            function set_items()
            {
               // $('#tokenfield-1').tokenfield('disable');
                $('#tokenfield-1').tokenfield('destroy');
                var choicess = new Array();
                var clin = $("#ids_value").val();



                //alert(clin);
                var query = {"company_id": clin};

                $.post("get_material_list1.php", query, function (iks) {

                  //   alert(iks)
                    var objd = JSON.parse(iks);
                    var out = "";
                 //     alert(iks+"i");
                    datass = new Array();
                    out = new Array();


                    for (var i = 0; i < objd.LIST.length; i++) {

                        datass[i] = new Array();

                        datass[i][0] = objd.LIST[i].item_code;
                        datass[i][1] = objd.LIST[i].material_name;
                        datass[i][2] = objd.LIST[i].unitOfMeasurement;
                        //alert(data[i][0]+" data");
                        //     out[i]=obj.ITEM[i].item;
                        choicess.push(datass[i][0].toUpperCase());


                    }
                 //   alert("sadghsa");
                  //   alert(choicess);

                    //$('#tokenfield-1').tokenfield('enable');
                    $('.token-example-field').tokenfield();

                    $('#tokenfield-1').tokenfield({

                        autocomplete: {
                            source: choicess,
                            delay: 10,

                        },
                        showAutocompleteOnFocus: true,
                        delimiter: [',', ' ', '_']


                    });


                });
            }



        </script>



    </head>
    <body class="bds" onload="load()" style="background-color: white" >


    <div id="myModal_images"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


        <div class="modal-dialog">


            <div class="modal-body" >
                <div class="col-lg-12">
                    <img src="loader1.gif" style="height: 500px;width: 550px;" class="img-thumbnail" id="changes_images">



                </div>
            </div>


        </div>
    </div>

    </div>








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


    <!--Material edit modal-->









    <!--  End Here-->


    <div id="wrapper" >

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
                            Material Wise Report
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
                    </div>
                <div id="append_cmp" >

                </div>

                <div style="display: none;" class="col-lg-2" id="cmp_type">
                    <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>


                <div class="row">



                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Search</h3>
                        </div>

                        <div class="panel-body">

                            <div id="">

                               <!--<div class="col-lg-12"></div> <div class="col-lg-6"><div class="form-group"><select onchange="get_sale_office()" id="typeid" class="form-control"></select></div></div><div class="col-lg-6"> <div class="form-group"><select id='typeids' class='form-control' onchange="set_items()"></select></div></div>-->


                                </div>


                                <form id="search_by_date">
                                    <br><div class="col-lg-20 center-block text-center">  <center><input type="text" style="width: 600px;"  class="form-control tokenfield-1" name="search_challan"
                                                             placeholder="Item Code.." id="tokenfield-1"></center></div><br>
                                    <div class="col-lg-5">

                                        <div class="form-group">


                                            <div class="control-group">

                                                <div class="controls input-append date form_date pull-right"
                                                     data-date="" data-date-format="dd MM yyyy"
                                                     data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                    <span> <label class="control-label">Start Date </label></span>
                                                    <input required=""
                                                           style="border:1px inset rgba(0,0,0,0.3);border-radius: 4px;padding-left: 5px;height: 31px"
                                                           title="Date" size="26" type="text" id="dates"
                                                           placeholder="Date" readonly>


                                                    <span class="add-on"><i class="icon-th"><i
                                                                class="fa fa-calendar"></i></i></span>
                                                </div>
                                                <input type="hidden" id="dtp_input2" required=""/><br/>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">


                                            <div class="control-group">

                                                <div class="controls input-append date form_date" data-date=""
                                                     data-date-format="dd MM yyyy" data-link-field="dtp_input3"
                                                     data-link-format="yyyy-mm-dd">
                                                    <span> <label class="control-label">End Date </label></span> <input
                                                        style="border:1px inset rgba(0,0,0,0.3);border-radius: 4px;padding-left: 5px;height: 31px"
                                                        required="" title="Date" size="26" type="text" id="dates"
                                                        placeholder="Date" readonly>

                                                    <span class="add-on"><i class="icon-th"><i
                                                                class="fa fa-calendar"></i></i></span>
                                                </div>
                                                <input type="hidden" id="dtp_input3" required=""/><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="padding: 0">
                                        <button type="submit" class="form-control"><span
                                                class="glyphicon glyphicon-search"> </span> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>














                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Material List</h3>
                        </div>
                        <button type="button" id="dis" style="float: right" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
                        <ul  style="height:200px;position:relative;overflow:auto;padding-left:35px;margin-top:35px;margin-right:-55px;float: right" class="dropdown-menu " role="menu">
                            <li class=""><input type="checkbox" id="chalan_no"> <label> Challan No</label></li>&nbsp;&nbsp;
                            &nbsp;&nbsp;    <li class=""><input type="checkbox" id="consignee"> <label> Consignee</label></li>
                            &nbsp;&nbsp;    <li class=""><input type="checkbox" id="ADDRESS"> <label> Address</label></li>
                            &nbsp;&nbsp;  <li class=""><input type="checkbox" id="Invoice_creationdate"> <label>Invoice Creation Date</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="chalan_date"> <label>chalan_date</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="item_code"> <label>item_code </label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="material"> <label>Material</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="order_quantity"> <label>Order Quantity</label></li>


                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="uom"> <label>UOM</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="per_unit_price"> <label>Per Unit Price</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="total_price"> <label>Total Price</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="transport_vendor_id"> <label>Transport Vendor Id</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="driver_name"> <label>Driver name</label></li>

                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="vehicle_no"> <label>Vehicle No</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="vehicle_type"> <label>Vehicle Type</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="specialInstruction"> <label>Special Instruction</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="orderType"> <label>Order Type</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="statusName"> <label>Status name</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="wareHouseName"> <label>WareHouse Name</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="puAwayTime"> <label>Put-a-way Time</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="GoodsIssueTime"> <label>Goods Issu eTime</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="statusName"> <label>Status Name</label></li>
                            &nbsp;&nbsp;<li class=""><input type="checkbox" id="stockTransfer_delivery_time"> <label>Stock Transfer Delivery Time</label></li>
                        </ul>
                        <div class="panel-body" style="overflow-y: auto">
                            <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                            <!-- <div class="col-lg-2">
                                 <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
        --><!----> <form class="form-horizontal"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"> </i></span><input id="filter" style="text-transform: uppercase"  placeholder="Search Item" type="search" class="form-control"></div></form><br>

                            <!--  <table id="tabl_expr" class="table table-striped">-->





                            <table id="inbound"  class='table table-striped table-responsive'>
                                <thead>

                                <tr>
                                    <th class="chalan_no">Challan No</th>
                                    <th class="consignee">Consignee name</th>
                                    <th class='ADDRESS'>ADDRESS</th>
                                    <th class="Invoice_creationdate">Invoice Creationdate</th>
                                    <th class='chalan_date'>Challan date</th>
                                    <th class="item_code">Item code</th>
                                    <th class="material">Material</th>
                                    <th class="order_quantity">Order Quantity</th>
                                    <th class="uom">UnitOfMeasurement</th>
                                    <th class="per_unit_price">Per Unit Price</th>
                                    <th class="total_price">Total Price</th>
                                    <th class="transport_vendor_id">Transport Vendor ID</th>
                                    <th class="driver_name">Driver_name</th>
                                    <th class="vehicle_no">Vehicle no</th>
                                    <th class="vehicle_type">Vehicle_type</th>
                                    <th class="specialInstruction">SpecialInstruction</th>
                                    <th class="orderType">OrderType</th>
                                    <th class="statusName">StatusName</th>
                                    <th class="wareHouseName">WareHouseName</th>
                                    <th class="puAwayTime">PuAwayTime</th>
                                    <th class="GoodsIssueTime">GoodsIssueTime</th>
                                    <th class="statusName">Status Name</th>
                                    <th class="stockTransfer_delivery_time">Stock Transfer Delivery time</th>



                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                </table>


                        </div><br>
                        <center><div class="col-lg-2"><a id="dlink" style="display: none;"></a><a href="#" id="exportexcel"><i class="fa fa-file-excel-o fa-2x"></i>Export Excel</a></div><br><br></center>


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
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->

        <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="dist/bootstrap-tokenfield.js" charset="UTF-8"></script>


        <script type="text/javascript" src="docs-assets/js/typeahead.bundle.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="docs-assets/js/docs.js" charset="UTF-8"></script>

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
                endDate: '+0d',
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });



        </script>


        <div id="myModal3" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->

                    <div class="modal-header"><h4>Inbound Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body">

                        <div id="show_mesg" style="height:500px;overflow-y: scroll">



                            <table id="inbound_tables"  class="table table-striped table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Challan No.</th>
                                    <th>Saleable Quantity</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                </tr>
                                </thead>
                                <tbody id="inbound_tbd">

                                </tbody>
                            </table>




                        </div>

                        <i class="fa fa-file-excel-o fa-2x pull-right" ><a class="" style="font-size: 18px;" id="inbound_export" href="javascript:void(0)">Export</a></i><br>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button></div>
                </div>
            </div>
        </div>






        <div id="myModal4" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->

                    <div class="modal-header"><h4>Outbound Details</h4> <button type="button" class="close" data-dismiss="modal">&times;</button></div>
                    <div class="modal-body">

                        <div id="show_mesg" style="height:500px;overflow-y: scroll">



                            <table id="outbound_tables"  class="table table-striped table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Challan No.</th>
                                    <th>Saleable Quantity</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                </tr>
                                </thead>
                                <tbody id="outbound_tbd">
                                <tr><td>No Data Available</td></tr>
                                </tbody>
                            </table>




                        </div>

                        <i class="fa fa-file-excel-o fa-2x pull-right" ><a class="" style="font-size: 18px;" id="outbound_export" href="javascript:void(0)">Export</a></i><br>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer"><button type="button"  data-dismiss="modal" class="btn btn-primary">OK</button></div>
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
                                <button type="submit" class="btn btn-default">Change </button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            $(function() {
                $("#dis").attr("disabled",true);
                $("#exportexcel").bind('click', function (e) {
                    //   alert('')
                    $("#inbound").tableExport({ type: "excel", escape: "false",tableName:'Material_Wise_Report'+$("#typeids option:selected").text(),dates:$("#dtp_input2").val()+"_to_"+$("#dtp_input3").val(),Company_name:$("#typeid option:selected").text(),sales_office_name:$("#typeids option:selected").text()});
                });
                $("#search_by_date").submit(function () {


                    search_by_date();

                    /* if($("#tokenfield-1,#tokenfield-1-tokenfield").val()=="")
                    {
                        show_modal("Please Add Material");
                        $("#tokenfield-1").focus();
                    }else {

                        search_by_date();
                    }*/
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

                //  $("#myModal_upload_image").modal('show');

                /* image upload*/

























                $("input[type=checkbox]").click(function()
                {

                    var kl=$(this).attr('id');


                    if($(this).prop("checked")==true)
                    {


                        $("."+kl+"").hide();
                    }else {


                        $("."+kl+"").show();
                    }






                });







                $(".treeview").click(function()
                {


                    $(this).find(".treeview-menu").slideToggle();


                });$("#change_password").submit(function()
                {
                    $("#not_match").hide();
                    if($("#new_pass").val()==$("#conf_pass").val()) {

                        $.get("change_password.php", $(this).serialize(), function (ert) {


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
                $('#filter').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('#inbound tbody tr').hide();
                    $('#inbound tbody tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                });



                $("#item_code").click(function()
                {




                    if($(this).prop("checked")==true)
                    {


                        $(".item_code").hide();
                    }else {


                        $(".item_code").show();
                    }






                });

                $("#material_name").click(function()
                {




                    if($(this).prop("checked")==true)
                    {


                        $(".material_name").hide();
                    }else {


                        $(".material_name").show();
                    }






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

                $("#outbound").click(function()
                {




                    if($(this).prop("checked")==true)
                    {


                        $(".outbound").hide();
                    }else {


                        $(".outbound").show();
                    }






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
                /*fields validation on update marterial*/


                /*$("#main").submit(function () {
                 var main_date = $("#dtp_input2").val();


                 if($("#dates").val()=="")
                 {




                 show_modal("Please Select Date");



                 }
                 else {


                 hs = {"challan": $("#typeid").val(), "dates": $("#dtp_input2").val()};
                 $.post("result.php", hs, function (dff) {


                 if ($.trim(dff) != "") {
                 add_tables(dff);
                 }
                 else {
                 alert(dff);

                 show_modal("Sorry Data is not available on this date");

                 }


                 });


                 }
                 */
                //    alert(main_date);
                //  alert(getfuldate($("#dates").val()));
                ///  alert($("#dates").val());

                //  var dt = $("#dates").val();
                //var main_date = getfuldate(dt);
                //alert(main_date);



                return false;

            });


            $("#close").click(function () {

                if ($("#mes").html() == "Challan No. :" + $("#challan_no").val() + " Updated Successfully") {
                    location.reload();
                }
                $("#myModal12").hide();

            });


            ///



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