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
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                //get_warehouse_shipper()

            }




            function search_by_date()
            {

                $("#tbd1").html("<img src='loader1.gif'>");
                var dft={"startdate":$("#dtp_input2").val(),"enddate":$("#dtp_input3").val(),"company_id":$("#ids_value").val(),"warehouse_id":$("#warehouse_id").val(),"order_type":$("#order_type").val()};

                $.get("getDataForShipmentCost.php",dft,function(ty)
                {


                    var   objmm = JSON.parse(ty);
                    $("#tbd1").html("")
                    if($.trim(ty)=="N" || objmm.DATA.length<=0)
                    {

                        show_modal("No Data Available")

                    }
                    else
                    {


                        objmm=JSON.parse(ty)
                    }

                    //  alert(ty);
                    var datakt=new Array();
                    var datas=""



                    for(var i = 0; i < objmm.DATA.length; i++) {

                        datakt[i] = new Array();
                        datakt[i][0] = objmm.DATA[i].chalan_no;
                        datakt[i][1] = objmm.DATA[i].order_id;
                        datakt[i][2] = objmm.DATA[i].companyID;
                        datakt[i][3] = objmm.DATA[i].companySalesOfficeID;
                        datakt[i][4] = objmm.DATA[i].timeStamp;
                        datakt[i][5] = objmm.DATA[i].amount;
                        datakt[i][6] = objmm.DATA[i].rtoAmount;
if($("#order_type").val()=="RTO") {

if(datakt[i][6]==null) {
    $("#tbd1").append("<tr><td class='item_code'>" + datakt[i][0] + "</td><td class='material_name'>" + datakt[i][1] + "</td><td class='client_material_itemID'> " + datakt[i][4] + "</td><td class='uom'>  &nbsp;  <a href='javascript:void(0)' onclick='addrto_shipement(this.id,this.title,this.className)' class='"+datakt[i][4]+"' id='"+datakt[i][0]+"' title='"+datakt[i][1]+"'><i class='fa fa-plus'></i>Add</a></td></tr>");
}else {
    $("#tbd1").append("<tr><td class='item_code'>" + datakt[i][0] + "</td><td class='material_name'>" + datakt[i][1] + "</td><td class='client_material_itemID'> " + datakt[i][4] + "</td><td class='uom'> " + datakt[i][6] + " <a href='javascript:void(0)'  onclick='editrto_shipement(this.id,this.title,this.className)'class='"+datakt[i][4]+"' id='"+datakt[i][0]+"' title='"+datakt[i][1]+"'><i class='fa fa-plus'></i>Edit</a></td></tr>");

}  //$("#tbd1").append("<tr><td class=''>" + datakt[i][0] + "</td><td class=''>" + datakt[i][1] + "</td><td class=''> " + datakt[i][2] + "</td><td class=''> " + datakt[i][3] + "</td><td class=''> " + datakt[i][4] + "</td><td class=''> " + datakt[i][5] + "</td><td class=''> " + datakt[i][6] + "</td><td class=''> " + datakt[i][7] + "</td><td class=''> " + datakt[i][8] + "</td><td class=''> " + datakt[i][9] + "</td><td class=''> " + datakt[i][10] + "</td><td class=''> " + datakt[i][11] + "</td><td class=''> " + datakt[i][12] + "</td><td class=''> " + datakt[i][13] + "</td><td class=''> " + datakt[i][14] + "</td><td class=''> " + datakt[i][15] + "</td><td class=''> " + datakt[i][16] + "</td><td class=''> " + datakt[i][17] + "</td><td class=''> " + datakt[i][18] + "</td><td class=''> " + datakt[i][19] + "</td><td class=''> " + datakt[i][20] + "</td></tr>");
}else {

    if(datakt[i][5]==null) {
        $("#tbd1").append("<tr><td class='item_code'>" + datakt[i][0] + "</td><td class='material_name'>" + datakt[i][1] + "</td><td class='client_material_itemID'> " + datakt[i][4] + "</td><td class='uom'>  &nbsp;<a href='javascript:void(0)' onclick='add_shipement(this.id,this.title,this.className)' class='"+datakt[i][4]+"' id='"+datakt[i][0]+"' title='"+datakt[i][1]+"'><i class='fa fa-plus'></i>Add</a></td>   </tr>");
    }else {
        $("#tbd1").append("<tr><td class='item_code'>" + datakt[i][0] + "</td><td class='material_name'>" + datakt[i][1] + "</td><td class='client_material_itemID'> " + datakt[i][4] + "</td><td class='uom'> " + datakt[i][5] + " &nbsp;<a href='javascript:void(0)' onclick='edit_shipement(this.id,this.title,this.className)'class='"+datakt[i][4]+"' id='"+datakt[i][0]+"' title='"+datakt[i][1]+"'><i class='fa fa-plus'></i>Edit</a></td> </tr>");

    }


}
                    }


                });
            }
var data="";
function add_shipement(a,b,c)
{

$("#challan_no").val(a);
    $("#orders_id").val(b);
    $("#datess").val(c);
    data=$("#datess").val();

$("#myModal_images").modal("show")
}
            function edit_shipement(d,e,f)
            {

                $("#challan_no1").val(d);
                $("#orders_id1").val(e);
                $("#datess1").val(f);
                data=$("#datess").val();

                $("#myModal_edit").modal("show")
            }

            function addrto_shipement(g,h,j)
            {


                $("#challan_no_rto").val(g);
                $("#orders_id_rto").val(h);
                $("#datess_rto").val(j);


                $("#myModal_rto_add").modal("show")
            }
            function editrto_shipement(i,k,l)
            {

                $("#challan_no1_rto").val(i);
                $("#order_id1_rto").val(k);
                $("#datess1_rto").val(l);


                $("#myModalrto_edit").modal("show")
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
                $.post("companylist.php","",function(hd)
                {//
                    // alert(hd)
                    // alert(hd+"mateirlal");

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

                        // call_header($("#main_company_id1"))
                    })
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

            function call_header(cmp_id)
            {

                //$("#append_cmp").html("<img src='loader1.gif'>");
                set_company111(cmp_id)



                get_to_company(cmp_id)

            }
            function call_by_company(qq){
                $('#warehouse_id').html("");
                $('#typeid').val("").attr("selected", "selected");
                $('#cmp_type>div>select').val("Company").attr("selected", "selected");
                $('#cmp_type>div>select').change();
                get_warehouse_shipper();
                $("#ids_value").val(qq);
                //get_warehouse_shipper1(qq);
            }
            function call_by_sales(aa){
                $('#warehouse_id').html("");
                $('#company_typeids').val("").attr("selected", "selected");
                $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
                $('#cmp_type>div>select').change();
                get_warehouse_shipper();
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


                    var obj = JSON.parse(user_ret);
                    var option = "";
                    var data_append = new Array();
                    if (obj.COMPANY.length > 0) {

                        $("#cmp_type>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
                        $("#show_contain").show();
                        $("#ors").show();
                        $("#company_panel").show();

                        $("#main_company_container").removeClass("col-lg-3")
                        $("#main_company_container").addClass("col-lg-12");
                        var options = "<option value=''>Select Company</option>";
                        var data_append1 = new Array();
                        for (var i = 0; i < obj.COMPANY.length; i++) {


                            data_append1[i] = new Array();
                            data_append1[i][0] = obj.COMPANY[i].salesOfficeID;
                            data_append1[i][1] = obj.COMPANY[i].company_name;
                            options += "<option value='" + data_append1[i][0] + "'>" + data_append1[i][1] + "</option>";

                        }
                        $("#company_typeids").html(options);
                        //      asn_inbound_details($("#typeid").val());
                    }else{
                        show_modal("No Sales Office Create For This Ccompany");
                    }


                    if (obj.LIST.length == 0) {

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

                    else if (obj.LIST.length > 0 && obj.COMPANY.length == 0) {
                        $("#show_contain").show();
                        $("#cmp_type>div>select").append("<option value='Sales Office'>Sales Office</option>");

                        $("#main_company_container").removeClass("col-lg-12")
                        $("#main_company_container").addClass("col-lg-3");

                    }


                    option = "<option value=''>Select Sales Office</option>";

                    for (var i = 0; i < obj.LIST.length; i++) {


                        data_append[i] = new Array();
                        data_append[i][0] = obj.LIST[i].slaveID;
                        data_append[i][1] = obj.LIST[i].company_name;
                        option += "<option value='" + data_append[i][0] + "'>" + data_append[i][1] + "</option>";

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
            var parse_id="";
            function set_items_company()
            {


                $("#ids_value").val($("#company_typeids").val());





            }
            function set_item()
            {



                $("#ids_value").val($("#typeid").val());




            }
            function get_warehouse_shipper()
            {

                var sales_off=$("#ids_value").val();

               var query1 = {"sales_off": sales_off};
                $.get("get_warehouse.php", query1, function (hd) {


                    var a = hd;
                    //   alert(a+"ware");
                    if(a=='N')
                    {
                        $("#ids_value").html('');
                    }else {
                        set_warehouse_shipper(a);
                    }
                });


            }


            function set_warehouse_shipper(arr)
            {

                var obj = JSON.parse(arr);

                ship_data=arr;
                dataw = new Array();
                shipper = new Array();


                var warehouse = "";
                var shippr = "";
                var out = new Array();

                for (var i = 0; i < obj.WAREHOUSE.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.WAREHOUSE[i].warehouseId;
                    dataw[i][1] = obj.WAREHOUSE[i].wareHouseName;
                    /*   datak[i][2] = obj.LIST[i].tinNo;
                     datak[i][3] = obj.LIST[i].cinNo;*/
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    warehouse = warehouse + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";


                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //                        alert(warehouseOptions);
                }





                $("#warehouse_id").html(warehouse);

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
                var clin = $("#typeid").val();



                //alert(clin);
                var query = {"company_id": clin};

                $.post("get_material_list.php", query, function (iks) {

                    // alert(iks)
                    var objd = JSON.parse(iks);
                    var out = "";
                    //  alert(iks+"i");
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
                    // alert(choices);

                    $('#tokenfield-1').tokenfield('enable');

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


    <div id="myModal_rto_add" class="modal fade"   data-backdrop="static" role="dialog">

        <div class="modal-dialog">
            <div style="z-index: 999" class="modal-content">
                <form role="form" id="addrto_shippment">
                    <div class="modal-header">
                        <input type="hidden" name="orders_id_rto" id="orders_id_rto">

                        <input type="hidden"  name="warehouseid_rto" id="warehouseid_rto">
                        <input type="hidden" value=""  id="datess_rto" name="datess_rto">
                        <input type="hidden" value=""  id="challan_no_rto" name="challan_no_rto">
                        <input type="hidden" id="cmp_id_rto" name="cmp_id_rto" value="">

                        <h4 class="modal-title">Add Shipment Cost</h4>
                    </div>
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>Amound</label>
                            <input type="number" required title="Enter The Amount" class="form-control" name="amount" placeholder="Enter the amount">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <center> <button type="submit" class="btn btn-default">Save</button> <button type="reset" id="close" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="myModal_images" class="modal fade"   data-backdrop="static" role="dialog">

        <div class="modal-dialog">
            <div style="z-index: 999" class="modal-content">
                <form role="form" id="add_shippment">
                <div class="modal-header">
<input type="hidden" name="order_id" id="orders_id">

                    <input type="hidden"  name="warehouseid" id="warehouseid">
                    <input type="hidden" value=""  id="datess" name="datess">
                    <input type="hidden" value=""  id="challan_no" name="challan_no">
                    <input type="hidden" id="cmp_id" name="cmp_id" value="">

                    <h4 class="modal-title">Add Shipment Cost</h4>
                </div>
                <div class="modal-body" >
                    <div class="form-group">
                        <label>Amound</label>
                        <input type="number" required title="Enter The Amount" class="form-control" name="amount" placeholder="Enter the amount">

                    </div>

                </div>
                <div class="modal-footer">
                  <center> <button type="submit" class="btn btn-default">Save</button> <button type="reset" id="close" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                </div>
                    </form>
            </div>

        </div>
    </div>

    <div id="myModal_edit" class="modal fade"   data-backdrop="static" role="dialog">

        <div class="modal-dialog">
            <div style="z-index: 999" class="modal-content">
                <form role="form" id="edit_shippment">
                    <div class="modal-header">
                        <input type="hidden" name="order_id1" id="orders_id1">

                        <input type="hidden"  name="warehouseid1" id="warehouseid1">
                        <input type="hidden" value=""  id="datess1" name="datess1">
                        <input type="hidden" value=""  id="challan_no1" name="challan_no1">
                        <input type="hidden" id="cmp_id1" name="cmp_id1" value="">

                        <h4 class="modal-title">Update Shipment Cost</h4>
                    </div>
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>Amound</label>
                            <input type="number" required title="Enter The Amount" class="form-control" name="amount" placeholder="Enter the amount">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <center> <button type="submit" class="btn btn-default">Save</button> <button type="reset" id="close" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                    </div>
                </form>
            </div>

        </div>
    </div>




    <div id="myModalrto_edit" class="modal fade"   data-backdrop="static" role="dialog">

        <div class="modal-dialog">
            <div style="z-index: 999" class="modal-content">
                <form role="form" id="editrto_shippment">
                    <div class="modal-header">
                        <input type="hidden" name="order_id1_rto" id="order_id1_rto">

                        <input type="hidden"  name="warehouseid1_rto" id="warehouseid1_rto">
                        <input type="hidden" value=""  id="datess1_rto" name="datess1_rto">
                        <input type="hidden" value=""  id="challan_no1_rto" name="challan_no1_rto">
                        <input type="hidden" id="cmp_id1_rto" name="cmp_id1_rto" value="">

                        <h4 class="modal-title">Update Shipment Cost</h4>
                    </div>
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>Amound</label>
                            <input type="number" required title="Enter The Amount" class="form-control" name="amount" placeholder="Enter the amount">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <center> <button type="submit" class="btn btn-default">Save</button> <button type="reset" id="close" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                    </div>
                </form>
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
                       Update Shipment Cost
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
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Company</h3>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-12"></div> <div class="col-lg-6" style="display: none"> <div class="form-group"><label>Company Name</label><select onchange="get_sale_office()" id="typeid" class="form-control"></select></div></div><div class="col-lg-6" style="display: none"> <div class="form-group"><label>Sales Office Name</label><select id='typeids' onchange="get_warehouse_shipper()" class='form-control'></select></div><br></div>



                            </div><div class="col-lg-6"><div class="form-group"><label>Warehouse</label><select   class="form-control " name="warehouse_id" required="" id="warehouse_id" ></select></div></div>

                            <form id="search_by_date">
                                <div class="col-lg-6"><div class="form-group"><label>Order Type</label><select   class="form-control " name="order_type" required="" id="order_type" ><option value="">Select</option><option value="OUTBOUND">Outbound</option><option value="RETURNINBOUND">Return Inbound</option><option value="STOCKTRANSFER">Stock Transfer</option><option value="RTO">Rto</option></select></div><br><br></div>
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
<div class="col-lg-2"></div>

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



                                <div class="col-lg-10" >
                                    <div class="col-lg-2"></div>
                                   <center><button type="submit" class="btn btn-default " style="width: 200px;"><span
                                            class="glyphicon glyphicon-search"> </span> Search
                                    </button></center>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>














                <div class="panel panel-green  margin-bottom-40" >
                    <div class="panel-heading" >
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Material List</h3>
                    </div>

                    <ul  style="height:200px;position:relative;overflow:auto;padding-left:35px;margin-top:35px;margin-right:-55px;float: right" class="dropdown-menu " role="menu">


                    </ul>
                    <div class="panel-body" style="overflow-y: auto">
                        <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                        <!-- <div class="col-lg-2">
                             <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
    --><!----> <form class="form-horizontal"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"> </i></span><input id="filter" style="text-transform: uppercase"  placeholder="Search Item" type="search" class="form-control"></div></form><br>

                        <!--  <table id="tabl_expr" class="table table-striped">-->






                        <table id="tabl_expr" class="table table-striped">

                            <thead>
                            <tr>
                                <th class="item_code">Challan no.</th>
                                <th class="material_name">Order ID</th>
                                <th class="client_material_itemID">Date Time</th>
                                <th class="uom">Amount</th>



                            </tr>
                            </thead>
                            <tbody id="tbd1">

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
            endDate: '+0d',
            autoclose: 1,
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

            $("#add_shippment").submit(function()
            {
               // $("#myModal_images").modal("show");
$("#warehouseid").val($("#warehouse_id").val());
                //$("#orders_id1").val($("#order_type").val());
                $("#cmp_id").val($("#ids_value").val());
                //$("#datess1").val(data);
                var datas=$(this).serialize();

                //datas+="&company_id="+$("#ids_value").val()+"&warehouse_id="+$("#warehouse_id").val()+"&datess="+$("#in").val()+"&order_type="+$("#order_type").val();
                $.get("insertShipmentCost.php",datas,function(retunss)
                {




                    if($.trim(retunss)=="Y")
                    {
                        $("#add_shippment")[0].reset();
                        $("#myModal_images").modal("hide");
                        search_by_date();
                        show_modal("Shipemnt Amount Added Successfully");

                    }else if($.trim(retunss)=="N")
                    {
                        $("#add_shippment")[0].reset();

                        show_modal("Failed To Add");
                    }else
                    {


                        show_modal(retunss);
                        $("#add_shippment")[0].reset();
                    }


                });


                return false;
            })

            $("#edit_shippment").submit(function()
            {
                $("#myModal_edit").modal("show");
                $("#warehouseid1").val($("#warehouse_id").val());
                //$("#orders_id1").val($("#order_type").val());
                $("#cmp_id1").val($("#ids_value").val());
                //$("#datess1").val(data);
                var datas=$(this).serialize();

                //datas+="&company_id="+$("#ids_value").val()+"&warehouse_id="+$("#warehouse_id").val()+"&datess="+$("#in").val()+"&order_type="+$("#order_type").val();
                $.get("updateShipmentCost.php",datas,function(retunss)
                {




                    if($.trim(retunss)=="Y")
                    {
                        $("#edit_shippment")[0].reset();
                        $("#myModal_edit").modal("hide");
                        search_by_date();
                        show_modal("Shipemnt Amount Added Successfully");

                    }else if($.trim(retunss)=="N")
                    {
                        $("#edit_shippment")[0].reset();

                        show_modal("Failed To Add");
                    }else
                    {


                        show_modal(retunss);
                        $("#edit_shippment")[0].reset();
                    }


                });


                return false;
            })



            $("#editrto_shippment").submit(function()
            {

                $("#warehouseid1_rto").val($("#warehouse_id").val());

                $("#cmp_id1_rto").val($("#ids_value").val());

                var datas=$(this).serialize();

                //datas+="&company_id="+$("#ids_value").val()+"&warehouse_id="+$("#warehouse_id").val()+"&datess="+$("#in").val()+"&order_type="+$("#order_type").val();
                $.get("updatertoShipmentCost.php",datas,function(retunss)
                {




                    if($.trim(retunss)=="Y")
                    {
                        $("#editrto_shippment")[0].reset();
                        $("#myModalrto_edit").modal("hide");
                        search_by_date();
                        show_modal("Shipemnt Amount Added Successfully");

                    }else if($.trim(retunss)=="N")
                    {
                        $("#editrto_shippment")[0].reset();

                        show_modal("Failed To Add");
                    }else
                    {


                        show_modal(retunss);
                        $("#editrto_shippment")[0].reset();
                    }


                });


                return false;
            })



            $("#addrto_shippment").submit(function()
            {
                //$("#myModal_images").modal("show");
                $("#warehouseid_rto").val($("#warehouse_id").val());
                //$("#orders_id1").val($("#order_type").val());
                $("#cmp_id_rto").val($("#ids_value").val());
                //$("#datess1").val(data);
                var datas=$(this).serialize();

                //datas+="&company_id="+$("#ids_value").val()+"&warehouse_id="+$("#warehouse_id").val()+"&datess="+$("#in").val()+"&order_type="+$("#order_type").val();
                $.get("insertrtoShipmentCost.php",datas,function(retunss)
                {




                    if($.trim(retunss)=="Y")
                    {
                        $("#addrto_shippment")[0].reset();
                        $("#myModal_rto_add").modal("hide");
                        search_by_date();
                        show_modal("Shipemnt Amount Added Successfully");

                    }else if($.trim(retunss)=="N")
                    {
                        $("#addrto_shippment")[0].reset();

                        show_modal("Failed To Add");
                    }else
                    {


                        show_modal(retunss);
                        $("#addrto_shippment")[0].reset();
                    }


                });


                return false;
            })
            $("#exportexcel").bind('click', function (e) {
                //   alert('')
                $("#tabl_expr").tableExport({ type: "excel", escape: "false",tableName:'Material_Wise_Report'+$("#typeids option:selected").text(),dates:$("#dtp_input2").val()+"_to_"+$("#dtp_input3").val(),warehousename:$("#warehouse_id option:selected").text(),Company_name:$("#typeid option:selected").text(),sales_office_name:$("#typeids option:selected").text()});
            });
            $("#search_by_date").submit(function () {




                search_by_date();

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
                $('#tbd1 tr').hide();
                $('#tbd1 tr').filter(function () {
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