

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
        <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">


        <script type="text/javascript" src="side_menu.js"></script>
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <link rel="stylesheet" href="jquery.auto-complete.css">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
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
            }
        </style>

        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            tr{



                cursor: pointer;
            }




            .wizard {
                margin: 20px auto;
                background: #fff;
            }

            .wizard .nav-tabs {
                position: relative;
                margin: 10px auto;
                margin-left: 10px;
                margin-bottom: 0;
                border-bottom-color: #e0e0e0;
            }

            .wizard > div.wizard-inner {
                position: relative;
            }

            .connecting-line {
                height: 2px;
                background: #e0e0e0;
                position: absolute;
                width: 25%;
                margin-left:180px;
                left:0;
                right: 0;
                top: 50%;
                z-index: 1;
            }

            .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
                color: #555555;
                cursor: default;
                border: 0;
                border-bottom-color: transparent;
            }

            span.round-tab {
                width: 70px;
                height: 70px;
                line-height: 70px;
                display: inline-block;
                border-radius: 100px;
                background: #fff;
                border: 2px solid #e0e0e0;
                z-index: 2;
                position: absolute;
                left: 0;
                text-align: center;
                font-size: 25px;
            }
            span.round-tab i{
                color:#555555;
            }
            .wizard li.active span.round-tab {
                background: #fff;
                border: 2px solid #5bc0de;

            }
            .wizard li.active span.round-tab i{
                color: #5bc0de;
            }

            span.round-tab:hover {
                color: #333;
                border: 2px solid #333;
            }

            .wizard .nav-tabs > li {
                width: 25%;
            }

            .wizard li:after {
                content: " ";
                position: absolute;
                left: 46%;
                opacity: 0;
                margin: 0 auto;
                bottom: 0px;
                border: 5px solid transparent;
                border-bottom-color: #5bc0de;
                transition: 0.1s ease-in-out;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 46%;
                opacity: 1;
                margin: 0 auto;
                bottom: 0px;
                border: 10px solid transparent;
                border-bottom-color: #5bc0de;
            }

            .wizard .nav-tabs > li a {
                width: 70px;
                height: 70px;
                margin: 20px auto;
                border-radius: 100%;
                padding: 0;
            }

            .wizard .nav-tabs > li a:hover {
                background: transparent;
            }

            .wizard .tab-pane {
                position: relative;
                padding-top: 50px;
            }

            .wizard h3 {
                margin-top: 0;
            }

            @media( max-width : 585px ) {

                .wizard {
                    width: 90%;
                    height: auto !important;
                }

                span.round-tab {
                    font-size: 16px;
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                }

                .wizard .nav-tabs > li a {
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                }

                .wizard li.active:after {
                    content: " ";
                    position: absolute;
                    left: 35%;
                }
            }
        </style>
        <script type="text/javascript" src="js/company_details.js"></script>
        <script type="text/javascript">

            var choices=new Array();
            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');

                $.get("companylist.php","",function(hd)
                {



                    var a=hd;

                    setData(a);

                });


            }

            function call_header(cmp_id)
            {
                $("#append_cmp").html("<img src='loader1.gif'>");
                set_company1(cmp_id);




            }



            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {


                if (levelOptions == "") {

                    ko = arr;
                    var obj = JSON.parse(arr);


                    datak = new Array();

                    levelOptions="<option value=''>Select Company</option>";
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

                    $("#main_company_id").html(levelOptions);


                    get_sale_office();

                    //  get_material();


                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);




                }

            }


















            function shipper_change(f)
            {


                $("#addr").val("");
                $("#cof").html("");
                $("#co").html("");
                $("#addr1").val("");
                $("#cin1").val("");
                $("#tin1").val("");
                $("#Ship_CIN").val("");
                $("#Ship_TIN").val("");

                var   objss = JSON.parse(ko);


                datam=new Array();



                for(var i = 0; i < objss.LIST.length; i++) {

                    datam[i]=new Array();
                    datam[i][0]=objss.LIST[i].id;
                    datam[i][1]=objss.LIST[i].name;
                    datam[i][2]=objss.LIST[i].tinNo;
                    datam[i][3]=objss.LIST[i].cinNo;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;





                    if(f==datam[i][0])
                    {


                        $("#Ship_CIN").val(datam[i][3]);
                        $("#Ship_TIN").val(datam[i][2]);





                        querss={"client_id":f};
                        $.get("add_cof.php",querss,function(cg)
                        {




                            if($.trim(cg)!="N")
                            {


                                setData(cg);
                                load1(f);


                            }
                            else
                            {



                                // alert($.trim(cg));
                                $("#cof").html("");
                                $("#co").html("");
                                $("#typeid").html("");



                            }

                        })

                    }


                }

                get_sale_office();
                //get_material();
//append_data($("#sales_off").val())

            }

            ////on change of sales office ///////

            function onchange_sale()
            {
//alert($("#sales_off").val())

                //   alert(sale_off);

                append_data($("#ids_value").val());
            }

            ////end on cghange of sales office ///////



            ////////////////////////get_sale_office/////////


            /////////////////////////get warehouse//////




            ///Append Data


            function append_data(a)
            {

                $("#inbound tbody").html("<tr><td></td><td><img src='loader1.gif'></td><td></td><td></td></tr>");

                var data_var={"sales_id":a};
                $.get("getChalanNoListForStockTransfer.php",data_var,function(tk) {

                    //       alert(tk);
                    if($.trim(tk)=="N")
                    {

                        $("#inbound tbody").html("<tr><td></td><td><td><h4>No Data Available</h4></td><td></td><td></td></tr>");



                    }else {
                        $("#inbound tbody").html("");
                        var obj = JSON.parse(tk);
                        var data_Append = new Array();

                        for (var i = 0; i < obj.LIST.length; i++) {

                            data_Append[i] = new Array();

                            data_Append[i][0] = obj.LIST[i].chalan_no;
                            data_Append[i][1] = obj.LIST[i].order_id;
                            data_Append[i][2] = obj.LIST[i].chalan_date;

                            $("#inbound tbody").append("<tr data-toggle='modal' data-target='#myModal' onclick='set_arrow(this.title,this.id);set_consignne_details(this.title,this.id,this.className)' title='" + data_Append[i][0] + "' id='" + data_Append[i][1] + "' class='" + a + "'><td>" + data_Append[i][0] + "</td><td>" + data_Append[i][1] + "</td><td>" + data_Append[i][2] + "</td><td><i style='color: #00a0d2' class='fa fa-mail-forward fa-1x'></i></td></tr>");
                        }
                    }
                });



            }

            function order_type(de)
            {


                if(de=="ODT0000003")
                {


                    return "Inbound"

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
            function get_status(k)
            {


                if(k=="400")
                {

                    return "Unloading";
                }else if(k=="404" || k=="418")
                {

                    return "Quantity Check";

                }else if(k=="412")
                {

                    return "Quality Check";

                }else if(k=="413")
                {
                    return "Put Away";
                }
               else if(k=="420")
                {

                return "Good Delivered";

                }
                else if(k=="402")
                {

                    return "Pick";
                }

            }






            //// Function Set_arrow


            function set_arrow(t,k)
            {
var tr="";

var data1={"challan_no":t,"sales_id":$("#ids_value").val()};
                $.get("getConsigneeDetailForStockTransfer.php",data1,function(pt) {
//alert(pt)
                    var objj=JSON.parse(pt);
                    var data1=new Array();
                    for(var i=0;i<objj.LIST.length;i++)
                    {


                        data1[i]=new Array();
                        data1[i][0]=objj.LIST[i].name;
                        data1[i][1]=get_status(objj.LIST[i].status_id);
                        data1[i][2]=objj.LIST[i].chalan_date;
                        data1[i][3]=objj.LIST[i].specialInstruction;
                        data1[i][4]=objj.LIST[i].shipperName;
                        data1[i][5]=objj.LIST[i].fromConsignee;

                        tr=data1[i][1];

                        set_arrows(tr)
                        $("#stage2").html("<h4>"+data1[i][2]+"</h4>");
                        $("#stage4").html("<h4>"+data1[i][2]+"</h4>");
if(data1[i][1]=="Pick")
{
    $("#unload_tbd").html("");
$("#uom_order_id").val(k);
    $("#uom_challan_no").val(t);


    getQuantityItemsDetails("",k,t);

    $("#step2_tbd").html("");
    $("#step2_tbd").append("<tr><td>"+data1[i][0]+"</td><td>"+t+"</td><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td>"+data1[i][3]+"</td><td>"+data1[i][4]+"</td><td>"+data1[i][5]+"</td></tr>");

$("#unload_tbd").append("<tr><td>"+t+"</td><td>"+data1[i][4]+"</td><td>"+data1[i][0]+"</td></tr>");
}
                        else if(data1[i][1]=="Good Delivered")
{



    $("#delivered_order_id").val(k);
    $("#delivered_challan_no").val(t);
    $("#step3_tbd").html("")

//        $("#step2").append("<table class='table-bordered '><tr><th>Company name</th><th>Status</th><th>Challan Date</th><th>Special Instruction</th><th>Shipper name</th><th>From Consignee</th></tr></table>")

$("#step3_tbd").append("<tr><td>"+data1[i][0]+"</td><td>"+t+"</td><td>"+data1[i][1]+"</td><td>"+data1[i][2]+"</td><td>"+data1[i][3]+"</td><td>"+data1[i][4]+"</td><td>"+data1[i][5]+"</td></tr>");

}


                    }



                });



            }



            ///End Here

function set_arrows(tr)
{




    $('.wizard .nav-tabs li ').removeClass("active");
    $('.wizard .nav-tabs li ').removeClass("disabled");
    $('.wizard .nav-tabs li ').addClass("disabled");
    $("#quantity_sec").removeClass("disabled");
    $("#quantity_sec").addClass("active");
    if (tr == "Good Delivered") {

        $("#quantity_sec").addClass("active");
        $("#quality_third").addClass("active");
        var $active = $('.wizard .nav-tabs li.active ');
        $active.next().removeClass('disabled');


        nextTab($active);


    }
    else if (tr == "Quality Check") {
        $("#quantity_sec").addClass("active");


        var $active = $('.wizard .nav-tabs li.active ');
        $active.next().removeClass('disabled');


        nextTab($active);


    }
    else if (tr == "Pick") {


        $("#step2").addClass("active");
        $("#step3").removeClass("active");

        $("#complete").removeClass("active");


    }
}

            function getWarehouseEmployeeDetail(id_1,id_2) {

                $(id_1).html("");
                $(id_2).html("");


                var guard_append="<option value=''>Select</option>";
                var append_supervisor="<option value=''>Select</option>";
                $.get("getWarehouseEmployeeDetail.php", "", function (retu) {
//alert(retu)

                    var obj=JSON.parse(retu);
                    var data_Append_guard=new Array()
                    for(var i=0;i<obj.GUARD.length;i++) {
                        data_Append_guard[i] = new Array();

                        data_Append_guard[i][0] = obj.GUARD[i].NAME;
                        data_Append_guard[i][1] = obj.GUARD[i].id;
                        guard_append+="<option value='"+data_Append_guard[i][1]+"'>"+data_Append_guard[i][0]+"</option>";
                    }

                    $(id_1).html(guard_append);


                    var data_Append_super=new Array()
                    for(var j=0;j<obj.SUPER.length;j++) {
                        data_Append_super[j] = new Array();

                        data_Append_super[j][0] = obj.SUPER[j].NAME;
                        data_Append_super[j][1] = obj.SUPER[j].id;
                        append_supervisor+="<option value='"+data_Append_super[j][1]+"'>"+data_Append_super[j][0]+"</option>";
                    }
                    $(id_2).html(append_supervisor);

                });
            }

            function getQuantityItemsDetails(x,y,z) {


              //  alert(y + " this is " + z)
               $("#unitss1").html("");
                $("#uom2").html("")
                $("#quantity5").val("");
                $("#add_notes_buttton").html("<button onclick='add_order_id_notes(this.id)' id='" + z + "' data-toggle='modal' data-target='#myModal_add_notes' style='width: 180px;' type='button' class='center-block btn btn-default '><i class='fa fa-plus'>Add notes</i></button><br><br>");

//$("#myModal_rto").modal("show");
                $("input[name='rto_order_id']").val(z);

                var datasss = {"challan_no": z, "order_id": y};

                $.get("getStockTransferDetail.php", datasss, function(trys) {

                    var obj=JSON.parse(trys);


                        //alert(trys);





                    var matrials="";

                    var data_Append=new Array();
                    $("#quantity_tbd").html("");
                    for(var i=0;i<obj.LIST.length;i++)
                    {

                        data_Append[i]=new Array();
                        data_Append[i][0]=obj.LIST[i].item_code;
                        data_Append[i][1]=obj.LIST[i].material_name;
                        data_Append[i][2]=obj.LIST[i].order_quantity;
                        data_Append[i][3]=obj.LIST[i].unitOfMeasurement;
                        data_Append[i][4]=obj.LIST[i].id;
                        data_Append[i][4]=obj.LIST[i].order_items_id;
                        matrials=data_Append[i][4];
                        $("#quantity_tbd").append("<tr><td><input type='hidden' value='"+data_Append[i][4]+"' name='order_items_id[]' >"+data_Append[i][0]+"</td><td>"+data_Append[i][1]+"</td><td>"+data_Append[i][2]+"</td><td>"+data_Append[i][3]+"</td><td><div class=''><input type='text' required name='uom_qty1[]' placeholder='Received Quantity' title='Enter The Quantity'  id='"+data_Append[i][2]+"'  class='form-control checks'><div style='display: none'><label>Remark</label><input name='uom_remark1[]' type='text' value='-' class='form-control' placeholder='Remark'><input type='hidden' name='uom2[]' value='"+data_Append[i][3]+"'><input type='hidden' name='material_id2[]' value='"+data_Append[i][4]+"'></div></div></td></tr>");






                        $("#quantity1").val(data_Append[i][2]);
                        $("#uom1").val(data_Append[i][3]);
                        $("#material_id1").val(data_Append[i][0]);


                    }



                    $(".checks").change(function(){
                        if($(this).val()!=$(this).attr("id"))
                        {
                            $(this).parent().find("div").show()
                        }else if($(this).val()==$(this).attr("id"))
                        {
                            $(this).parent().find("div").hide();
                        }
                    });

                });







            }



            function updateOrderQuantity(dats)
            {



                $.get("updateOrderQuantity.php",dats,function(tr)
                {


                    if($.trim(tr)=="Y")
                    {
                        $("#myModal88").modal('hide');
                        $("#myModal_quantity").modal('hide');
                        show_modal("Quantity Check Successfully Done");
                        append_data($("#ids_value").val());
                        $("#uom_form")[0].reset();
                    }
                    else if($.trim(tr)=="N")
                    {

                        $("#myModal_quantity").hide();
                        show_modal("Error : Failed To Update");
                        setTimeout(function(){


                            $("#myModal0").hide();
                            $("#myModal_quantity").show();
                            $("#myModal88").modal('show')

                        },2200);

                    }

                })





            }

            /*
             *    Putway Metod Call For Data Set
             *
             * */

            function OrderPutwayComplete(m,n,o)
            {

                $("#add_notes_buttton2").html("<button onclick='add_order_id_notes(this.id)' id='"+o+"' data-toggle='modal' data-target='#myModal_add_notes' style='width: 180px;' type='button' class='center-block btn btn-default '><i class='fa fa-plus'>Add notes</i></button><br><br>");

                var datas={"challan_no":n,"order_id":o};

                $("#putway_tbd").html("");
                var material_id=new Array();
                var pass_qty=new Array();
                var fail_qty=new Array();
                $.get("OrderPutwayComplete.php",datas,function(tyy) {
                    //    alert(tyy)
                    var obj = JSON.parse(tyy);
                    var data_Append = new Array();

                    for(var i=0;i<obj.LIST.length;i++) {

                        data_Append[i] = new Array();
                        data_Append[i][0] = obj.LIST[i].item_code;
                        data_Append[i][1] = obj.LIST[i].material_name;
                        data_Append[i][2] = obj.LIST[i].order_quantity;
                        data_Append[i][3] = obj.LIST[i].received_quantity;
                        data_Append[i][4] = obj.LIST[i].saleable_quantity;
                        data_Append[i][5] = obj.LIST[i].failQuantity;
                        data_Append[i][6] = obj.LIST[i].unitOfMeasurement;
                        data_Append[i][7] = obj.LIST[i].remark;
                        data_Append[i][8] = obj.LIST[i].id;


                        material_id.push(data_Append[i][8]);
                        pass_qty.push(data_Append[i][4]);
                        fail_qty.push(data_Append[i][5]);



                        if(data_Append[i][5]=="0") {

                            $("#putway_tbd").append("<tr><td>" + data_Append[i][0] + "</td><td>" + data_Append[i][1] + "</td><td>" + data_Append[i][2] + "</td><td>" + data_Append[i][6] + "</td><td>" + data_Append[i][3] + "</td><td>" + data_Append[i][4] + "</td><td>" + data_Append[i][5] + "</td><td>" + data_Append[i][7] + "</td><td><input type='text' required title='Please Enter Pass Storage Code' class='form-control' name='pass_storage_code[]'  placeholder='Pass Storage Location Code'></td><td><input required title='Please Enter Fail Storage Code' type='text' class='form-control'  name='fail_storage_code[]' readonly value='-' placeholder='Fail Storage Location Code'></td></tr>")
                        }
                        else {
                            $("#putway_tbd").append("<tr><td>" + data_Append[i][0] + "</td><td>" + data_Append[i][1] + "</td><td>" + data_Append[i][2] + "</td><td>" + data_Append[i][6] + "</td><td>" + data_Append[i][3] + "</td><td>" + data_Append[i][4] + "</td><td>" + data_Append[i][5] + "</td><td>" + data_Append[i][7] + "</td><td><input type='text' required title='Please Enter Pass Storage Code' class='form-control' name='pass_storage_code[]'  placeholder='Pass Storage Location Code'></td><td><input required title='Please Enter Fail Storage Code' type='text' class='form-control'  name='fail_storage_code[]' placeholder='Fail Storage Location Code' ></td></tr>")
                        }






                    }



                    $("#putway_order_id").val(o);
                    $("#putway_challan_no").val(n);
                    $("#putway_material_id").val(material_id.join("*"));
                    $("#putway_pass_quantity").val(pass_qty.join("*"));
                    $("#putway_fail_quantity").val(fail_qty.join("*"));


                });





            }



            function getAllQcItemDetail(u,v,w)
            {

                $("#add_notes_buttton1").html("<button onclick='add_order_id_notes(this.id)' id='"+w+"' data-toggle='modal' data-target='#myModal_add_notes' style='width: 180px;' type='button' class='center-block btn btn-default '><i class='fa fa-plus'>Add notes</i></button><br><br>");
                $("#quality_form_order_id").val(w);
                $("#quality_form_challan_no").val(v);
                //  alert("caallled")
                $("#quality_tbd").html("");
                var datass={"challan_no":v,"sales_id":$("#ids_value").val()};
                $.get("getConsigneeDetail.php",datass,function(returns)
                {
                    var obj1 = JSON.parse(returns);
                    var data_Append = new Array();
                    //   alert(returns);
                    for(var i=0;i<obj1.LIST.length;i++) {

                        data_Append[i] = new Array();
                        data_Append[i][0] = obj1.LIST[i].chalan_date;

                        $("#quality_asn_date_label").html("ASN Date : "+data_Append[i][0]);
                        $("#quality_asn_no_label").html("ASN Number : "+v);


                    }

                });

                var datas={"challan_no":v,"order_id":w};


                $.get("getAllQcItemDetail.php",datas,function(tyyy) {
                    //   alert(tyyy+"")
                    var obj = JSON.parse(tyyy);
                    var data_Append = new Array();

                    for(var i=0;i<obj.QCITLIST.length;i++) {

                        data_Append[i] = new Array();
                        data_Append[i][0] = obj.QCITLIST[i].item_code;
                        data_Append[i][1] = obj.QCITLIST[i].material_name;
                        data_Append[i][2] = obj.QCITLIST[i].order_quantity;
                        data_Append[i][3] = obj.QCITLIST[i].received_quantity;
                        data_Append[i][4] = obj.QCITLIST[i].remark;
                        data_Append[i][5] = obj.QCITLIST[i].unitOfMeasurement;
                        data_Append[i][6] = get_status(obj.QCITLIST[i].statusID);
                        data_Append[i][7]=obj.QCITLIST[i].id;
                        if(data_Append[i][6]=="Quality Check") {


                            $("#quality_tbd").append("<tr><td>" + data_Append[i][0] + "</td><td>" + data_Append[i][7] + "</td><td>" + data_Append[i][1] + "</td><td>" + data_Append[i][2] + "</td><td>" + data_Append[i][3] + "</td><td>" + data_Append[i][4] + "</td><td>" + data_Append[i][5] + "</td><td>" + data_Append[i][6] + "</td><td class='get_sta'><label class='open_box' title='" + data_Append[i][0] + "' id='" + data_Append[i][7] + "'>Add <i class='fa fa-plus'></i></label></td></tr>")
                        }else {
                            $("#quality_tbd").append("<tr><td>" + data_Append[i][0] + "</td><td>" + data_Append[i][7] + "</td><td>" + data_Append[i][1] + "</td><td>" + data_Append[i][2] + "</td><td>" + data_Append[i][3] + "</td><td>" + data_Append[i][4] + "</td><td>" + data_Append[i][5] + "</td><td>" + data_Append[i][6] + "</td><td class='get_sta'><label style='color: #00a0d2;' class='' title='" + data_Append[i][0] + "' id='" + data_Append[i][7] + "'>Done <i class='fa fa-check'></i></label></td></tr>")
                        }
                    }



                    $(".open_box").click(function(){


                        if($(this).attr("class")=="open_box") {
                            //  alert($(this).attr("class"));
                            $("#open_box_tbd").html("");
                            $("#myModal_qualitys").modal('hide');
                            $("#myModal_open_box").modal('show');
                            var item_codes = $(this).parent().parent().find("td").eq(0).text();
                            var materi = $(this).parent().parent().find("td").eq(1).text();
                            var descr = $(this).parent().parent().find("td").eq(2).text();
                            var orde_qnty = $(this).parent().parent().find("td").eq(3).text();
                            var rec_qty = $(this).parent().parent().find("td").eq(4).text();
                            var rmark = $(this).parent().parent().find("td").eq(5).text();
                            var uom = $(this).parent().parent().find("td").eq(6).text();
                            var statuss = $(this).parent().parent().find("td").eq(7).text();
                            $("#quality_material_id1").val(materi);
                            $("#quality_order_id1").val(w);
                            $("#quality_challan_no1").val(v);


                            $("#open_box_tbd").append("<tr><td>" + item_codes + "</td><td>" + materi + "</td><td>" + descr + "</td><td>" + orde_qnty + "</td><td>" + rec_qty + "</td><td>" + rmark + "</td><td>" + uom + "</td><td>" + statuss + "</td></tr>")
                            $("#open_box_img_tbd").html("");
                            var dt = {"material_id": materi};
                            $.get("getQcItemUom.php", dt, function (iu) {
                                var obj1 = JSON.parse(iu);
                                var data_append = new Array();
                                for (var j = 0; j < obj1.QCUOM.length; j++) {
                                    data_append[j] = new Array();
                                    data_append[j][0] = obj1.QCUOM[j].unitOfMeasurement;
                                    $("#quality_qc_fail1").val(data_append[j][0]);
                                    $("#quality_uom_label").html(data_append[j][0]).css('textTransform', 'capitalize');
                                    $("#quality_uom_label1").html(data_append[j][0]).css('textTransform', 'capitalize');
                                }
                            });



                            getOtherImage(materi,w);





                        }
                    });




                });





            }




            function getOtherImage(c,d)
            {
                $("#open_box_img_tbd").html("");
                $.get("getOtherImage.php", {"material_id":c,"order_id":d}, function (iiu) {





                    var obj2=JSON.parse(iiu);
                    var data_Append2=new Array();
                    for (var k = 0; k < obj2.LR.length; k++) {

                        data_Append2[k] = new Array();
                        data_Append2[k][0]=obj2.LR[k].imageURL;
                        data_Append2[k][1]=obj2.LR[k].imageCaption;
                        $("#open_box_img_tbd").append("<tr><td><img class='img-responsive' style='height: 150px' src='"+data_Append2[k][0]+"'></td><td>"+data_Append2[k][1]+"</td></tr>");


                    }


                });







            }


            function add_order_id_notes(x)

            {



                $("#add_notes_order_id").val(x);



            }


        </script>


    </head>

    <body  onload="load()">


    <!--My modal Upload-->

    <div class="modal fade" id="myModal_unload" style="width:100%;overflow: auto" >
        <div class="modal-dialog" style="width: 70%">
            <form role="form" id="form_unloading" class="form-horizontal">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Add Unloading</h4>
                    </div>

                    <div class="modal-body">
                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>Challan Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-default'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>Challan no</th><th>Shipper</th><th>Consignee</th></tr> </thead> <tbody id="unload_tbd"> </tbody> </table></div></div></div>

                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6" style="height: 80px;">

                                    <div class="form-group">
                                        <label class="">LR No</label>
                                        <input type="text" placeholder="LR No." name="lr_no" class="form-control">
                                    </div>


                                </div>
                                <div class="col-lg-1"></div>
                                <div style="" class="col-lg-5">

                                    <div class="form-group">
                                        <label class="">Date </label>
                                        <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input  name="dates" title="Date" class="input-group-lg" style="border: 1px solid darkgrey;border-radius: 5px;height: 30px;width: 250px;padding-left: 10px;cursor: none" size="26" type="text" id="dates"    placeholder="Date"  >

                                            <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                        </div>
                                        <input type="hidden" name="actual_date" id="dtp_input2" required="" />
                                    </div><br>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="">Transporter Name</label>
                                        <input type="text" placeholder="Transporter Name" name="transport_name" class="form-control">
                                    </div>

                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">

                                    <div class="form-group">
                                        <label class="">Vehicle type</label>
                                        <input type="text" name="vihicle_type" placeholder="Vehicle Type" class="form-control">
                                    </div>

                                </div>
                                <div class="col-lg-6" style="height: 70px;">

                                    <div class="form-group">
                                        <label class="">Driver Name</label>
                                        <input type="text" placeholder="Driver Name" name="driver_name" class="form-control">
                                    </div>

                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">

                                    <div class="form-group">
                                        <label class="">Driver Mobile No.</label>
                                        <input type="text" placeholder="Driver Mobile No." name="driver_mob" class="form-control">
                                    </div>


                                </div>
                                <div style="height: 70px;" class="col-lg-6">

                                    <div class="form-group">
                                        <label class="">Vehicle Number</label>
                                        <input type="text" placeholder="Vehicle No." name="vehicle_num" class="form-control">
                                    </div>

                                    </div>





                            </div>



                        </div>
                    </div>
                    <div class="modal-footer">


                        <center>   <input type="submit" class="btn btn-default "  value="Save"> <input type="reset" data-toggle="modal" data-target="#myModal_quantity" class="btn btn-default " data-dismiss="modal" value="Close"></center>
                    </div>

                </div></form>
        </div>
    </div>




    <!--
    :) :) :)
    End here-->





    <div class="modal fade" id="myModal_add_notes" style="z-index: 10000" data-backdrop="static" >
        <div class="modal-dialog" style="width: 900px">

            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <form id="add_notess" class='form-horizontal'>  <div class="modal-header">&nbsp;&nbsp;&nbsp;<h4>Add Notes</h4>



                        <div class="modal-body" id="typ">
                            <input type="hidden" value="" name="order_id" id="add_notes_order_id">
                            <div class='form-group'><textarea name="comments" required title="Please Add Note" class='form-control' style='height: 160px;width: 860px;resize: none' placeholder='Add Notes'></textarea></div>
                        </div>
                    </div>
                    <div class="modal-footer"><button type="submit" class="btn btn-primary" >Add</button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                </form>
            </div>
        </div>

    </div>






    <!-- RTO ASKING-->


    <div id="myModal_delivered" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="delivered_form">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Goods Delivered</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delivered_order_id" name="delivered_order_id" value="">
                        <input type="hidden" name="delivered_challan_no" id="delivered_challan_no" value="">
                       <div class="form-group">
                           <label>Received By</label>
<input type="text" class="form-control" placeholder="Receiver name" id="delivered_rec_name" name="delivered_rec_name">
</div>
                        <div class="form-group">
                            <label>Mobile No.</label>
                            <input type="text" class="form-control" pattern="[0-9]{10}" title="Minimum 10 Digits Mobile no." placeholder="Mobile number" id="delivered_mob" name="delivered_mob">
                        </div>
                    </div>

                    <!-- dialog buttons -->
                    <div class="modal-footer"><center><input class="btn btn-default" type="submit" value="Save"></center></div>
                </div>
            </form>
        </div>
    </div>



    <!-- End Here-->



    <!--  File Upload Modal-->












    <!--
          End Here -->



















    <!--  File Upload Modal-->


    <div id="myModal_upload_image" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Quality Check Image Upload</h4>
                    </div>
                    <div class="modal-body">


                        <div class="container-fluid"><div class="row">



                                <div class="page-header">


                                    <form enctype="multipart/form-data">


                                        <label>ADD Image </label>

                                        <input id="file-en" name="file-en" type="file" multiple><br>
                                        <input type="text" placeholder="Image Caption" id="captions" class="form-control">
                                        <div id="kv-error-2"  style="">sdasdasd</div> <br>   <div id="kv-error-3"  style=""></div>

                                    </form>
                                    <hr>

                                </div>






                            </div>


                        </div>

                        <!-- dialog buttons --></div>
                    <div class="modal-footer"><center><input type="reset" data-target="#myModal_open_box" data-toggle="modal"  data-dismiss="modal" class="btn btn-default" value="Cancel"></center></div>
                </div>
            </form>
        </div>
    </div>







    <!--  End Here-->

    <div id="myModal0" class="modal fade" style="z-index: 90000">
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

    <!--
    Open Box in Quality Check

    -->




    <div id="myModal_open_box" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="updates_uom">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Quality Check Update</h4>
                    </div>
                    <div class="modal-body">

                        <input value="" type="hidden" name="material_id" id="quality_material_id1">
                        <input value="" type="hidden" name="order_id" id="quality_order_id1">
                        <input value="" type="hidden" name="qc_fail_uom" id="quality_qc_fail1">
                        <input value="" type="hidden" name="challan_no" id="quality_challan_no1">

                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#781'>Item Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='781' class='panel-default'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr><th>Item Code</th><th>Material ID</th><th>Description</th><th>Order Quantity</th><th>Received Quantity</th><th>Remark</th><th>UOM</th><th>Status</th></tr> </thead> <tbody id="open_box_tbd"> </tbody> </table></div></div></div>



                        </div>

                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#782'>Image</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='782' class='panel-default'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr><th>Image</th><th>Image Caption</th></tr> </thead> <tbody id="open_box_img_tbd"> </tbody> </table></div></div></div>



                        </div>


                        <div class="container-fluid"><div class="row">

                                <div class="panel-heading" id="error_head"></div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label id="quality_uom_label"></label>
                                        <input type="number" class="form-control" required title="Enter Quality Fail" placeholder="Quality Pass" name="qc_pass">

                                    </div></div><div class="col-lg-1"></div>

                                <div class="col-lg-5">

                                    <div class="form-group">



                                        <label id="quality_uom_label1"></label>
                                        <input type="number" class="form-control" required title="Enter Quality Fail" placeholder="Quality Fail" name="qc_fail">
                                    </div>


                                </div>




                            </div></div><br>
                        <center><button data-toggle='modal'  data-dismiss="modal" id="add_images" data-target="#myModal_upload_image" type="button" class="btn btn-default"> Add Image If Applicable <i class="fa fa-file-image-o"></i></button></center>
                        <br>
                        <!-- dialog buttons --></div>
                    <div class="modal-footer"><center><button type="submit" class="btn btn-default"> Save</button><input type="reset"  data-dismiss="modal" data-toggle="modal" data-target="#myModal_qualitys" class="btn btn-default" value="Cancel"></center></div>
                </div>
            </form>
        </div>
    </div>



    <!-- End Here-->



    <div id="myModal12"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)" data-backdrop="static">


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
                            Stock Transfer Process
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

                    <div class="panel panel-green   margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main Company</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-12"> <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Company Name:</label>
                                                <select  class="form-control" name="main_company_id"  required="" id="main_company_id" onchange="call_header(this.value)" >

                                                    <option value="-1">Select</option>

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="append_cmp"></div>


                    <form role="form" id="main">

                        <div class="panel panel-green  margin-bottom-40" >
                            <div class="panel-heading" >
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">


                                        <div style="display: none;" class="col-lg-2" id="cmp_type">
                                            <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>


                                        <div class="col-lg-12 "><br>

                                            <ul class="nav nav-tabs center-block navbar-btn">
                                                <li class="active" id="ins"><a href="#tab1" data-toggle="tab">Stock Transfer Process</a></li>

                                            </ul>
                                            <div class="tab-content"><br><br>
                                                <div class="tab-pane active col-lg-12" id="tab1">
                                                    <div class="panel-group" id="accordion">





                                                        <table id="inbound" class='table table-striped'>
                                                            <thead>

                                                            <tr>
                                                                <th>Challa no</th>
                                                                <th>Order ID</th>

                                                                <th>Challan Date</th>
                                                                <th>Action</th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>




                                            </div>
                                        </div>


                                    </div>


                                </div>










                            </div>

                        </div>
                </div>

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





    <div class="modal fade" id="myModal" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 1200px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Stock Transfer Tracking</h4>
                </div>
                <div class="modal-body">


                    <div class="wizard" id="wizz">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">



                                <li role="presentation" id="quantity_sec" class="active">
                                    <center><h4>Pick</h4></center>
                                    <a href="#step2" style="cursor: none" data-toggle="tab" aria-controls="step2"
                                       role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>


                                <li role="presentation" id="putway_fourth" disabled="" class="disabled">
                                    <center><h4>Goods Delivered</h4></center>
                                    <a href="#complete" style="cursor: none" data-toggle="tab" aria-controls="complete"
                                       role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            </span>
                                    </a>
                                </li>





                            </ul>

                            <div id="stage2" class="col-lg-3 text-center"></div>

                            <div id="stage4" class="col-lg-3 text-center"></div>

                        </div>

                        <form role="form">
                            <div class="tab-content">

                                <div class="tab-pane" role="tabpanel" disabled="" id="step2">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <h4>Step 1 Pick</h4><br>

                                    <br>
                                    <table class='table table-striped table-responsive'> <thead> <tr><th>Consignee Name</th><th>Challan no.</th><th>Status</th><th>Challan Date</th><th>Special Instruction</th><th>Shipper name</th><th>From Consignee</th></tr></thead><tbody id="step2_tbd"></tbody></table>
                                    <center><button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal_quantity" class="btn btn-default btn-lg">Add <i class="fa fa-plus"></i></button></center>

                                </div>

                                <div class="tab-pane" role="tabpanel" id="complete">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <h4>Complete Goods Delivered</h4><br>

                                    <br>

                                    <center><button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal_delivered" class="btn btn-default btn-lg">Add <i class="fa fa-plus"></i></button></center>
                                    <table class='table table-striped table-responsive'> <thead> <tr><th>Consignee Name</th><th>Challan no.</th><th>Status</th><th>Challan Date</th><th>Special Instruction</th><th>Shipper name</th><th>From Consignee</th></tr></thead><tbody id="step3_tbd"></tbody></table>

                                </div>


                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">


                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
        </div></div>


    <!----div message box!------->






















    <!--


    Put Way Modal
    -->
    <div class="modal fade" id="myModal_putway" style="width:100%;overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 90%">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="put_way_form" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Add Put Away</h4>
                    </div>
                    <div class="modal-body">



                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#007'>Challan Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='007' class='panel-default'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>Item Code</th><th>Description</th><th>ASN Quantity</th><th>Unit</th><th>ASN Count</th><th>Pass</th><th>Fail</th><th>Remark</th><th>Storage Pass Code</th><th>Storage Fail Code</th></tr> </thead> <tbody id="putway_tbd"> </tbody> </table></div></div></div>
                            <div class="col-lg-12" id="add_notes_buttton2"></div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">


                                <input type="hidden" value="" id="putway_order_id" name="order_id">
                                <input type="hidden" value="" id="putway_challan_no" name="challan_no">
                                <input type="hidden" value="" id="putway_material_id" name="material_id">
                                <input type="hidden" value="" id="putway_pass_quantity" name="pass_quantity">
                                <input type="hidden" value="" id="putway_fail_quantity" name="fail_quantity">

                            </div>






                        </div></div>
                    <div class="modal-footer">


                        <center><input type="submit" value="Save" class="btn btn-default"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End Here Put Way-->



    <!--


    Put Way Modal
    -->

    <!-- End Here Put Way-->



    <div class="modal fade" id="myModal_qualitys" style="width:100%;overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 90%">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="quality_form" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Add Quality Check</h4>
                    </div>



                    <div class="modal-body">
                        <label class="pull-left" id="quality_asn_no_label">ASN Number :</label><label id="quality_asn_date_label" class="pull-right">ASN Date</label><br><br>
                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#009'>Challan Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='009' class='panel-default'><div class='panel-body'><table class='table table-striped table-responsive'> <thead> <tr> <th>Item Code</th><th>Material ID</th><th>Description</th><th>Order Quantity</th><th>Received Quantity</th><th>Remark</th><th>UOM</th><th>Status</th><th>Action</th></tr> </thead> <tbody id="quality_tbd"> </tbody> </table></div></div></div>
                            <div class="col-lg-12" id="add_notes_buttton1"></div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2"></div><div class="col-lg-10" id="error1"></div>

                            </div>


                            <input type="hidden" value="" id="quality_form_order_id" name="order_id">
                            <input type="hidden" value="" id="quality_form_challan_no" name="challan_no">



                        </div></div>
                    <div class="modal-footer">


                        <center><input type="submit" value="Save" class="btn btn-default"><button type="button" class="btn btn-default" data-target="#myModal" data-toggle="modal" data-dismiss="modal">Close</button></center>
                    </div>
                </form>
            </div>

        </div>
    </div>
<!-- uom-->

    <div id="myModal_quantity" class="modal fade" style="overflow: auto">
        <div class="modal-dialog" style="width: 900px">
            <form role="form" id="uom_form"> <div class="modal-content">
                    <!-- dialog body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Add UOM</h4>
                    </div>
                    <div class="modal-body">


                        <div class="panel">
                            <div class='panel  panel-default'><div class='panel-heading' style='background-color: #00a0d2;color: white'> <h4 class='panel-title'><a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#001'>Item Details</a><span class='glyphicon glyphicon-hand-down pull-right' ></span></h4></div> <div id='001' class='panel-default'><div class='panel-body'><table class='table table-striped '> <thead> <tr> <th>Material ID</th><th>Description</th><th>ASN Quantity</th><th>Unit</th><TH></TH></tr> </thead> <tbody id="quantity_tbd"> </tbody> </table></div></div></div>
                            <div class="col-lg-12" id="add_notes_button"></div>
                        </div>


                        <input id="uom_challan_no" name="challan_no" type="hidden" value="">
                        <input type="hidden" name="order_id" id="uom_order_id" value="">









                    </div>
                    <div class="modal-footer"><center><input type="submit" id="quantity_Submit" class="btn btn-default"><button type="button" data-toggle="modal" data-target="#myModal"  data-dismiss="modal" class="btn btn-primary">Cancel</button></center></div>
                </div></form>
        </div>
    </div>




    <!--    End here-->


    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->



    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ua.js" charset="UTF-8"></script>

    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="jquery.auto-complete.js"></script>
    <script src="js/fileinput.js" type="text/javascript"></script>


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










        $("#file-0").fileinput({
            'allowedFileExtensions' : ['jpg', 'png','gif']
        });

        /*
         $(".file").on('fileselect', function(event, n, l) {
         alert('File Selected. Name: ' + l + ', Num: ' + n);
         });
         */

        $(".btn-warning").on('click', function() {
            if ($('#file-4').attr('disabled')) {
                $('#file-4').fileinput('enable');
            } else {
                $('#file-4').fileinput('disable');
            }
        });
        $(".btn-info").on('click', function() {
            $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
        });
        /*
         $('#file-4').on('fileselectnone', function() {
         alert('Huh! You selected no files.');
         });
         $('#file-4').on('filebrowse', function() {
         alert('File browse clicked for #file-4');
         });
         */

    </script>



    <script type="text/javascript">
        $(function() {
//$("#myModal_delivered").modal('show')
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

//alert(ert);
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

            $("#delivered_form").submit(function()
            {

var rec_name=$("#delivered_rec_name").val();

               if(rec_name=="")
               {

                   rec_name="-"


               }



                var delivered_mob=$("#delivered_mob").val();
                if(delivered_mob=="")
                {


                    delivered_mob="-";
                }

                var datas={"rec_name":rec_name,"mob_rec":delivered_mob,"challan_no":$("#delivered_challan_no").val(),"order_id":$("#delivered_order_id").val()};
				//alert(datas.rec_name);
                $.get("stockTransferDeliver.php",datas,function(retu)
                {

//alert(retu);

                    if(retu=="Y")
                    {
                        $("#myModal_delivered").modal('hide');
                        append_data($("#ids_value").val());
                      show_modal("Goods Delivered Successfully Updated");



                    }else if($.trim(retu)){

                        show_modal("Failed To Save..");


                    }else {


                        show_modal("failed To Update")
                    }


                });






                return false;

            });






            /*LR Details Form*/

            $('#form_unloading').bootstrapValidator({
                live: 'enabled',

                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {


                 /*   $("#myModal_unload").modal('hide');

                    $("#myModal_upload_lr_image").modal('show');*/
var finaldata=$("#form_unloading").serialize();
                    finaldata+="&"+$("#uom_form").serialize();

                    var datas=$(this).serialize();
                    var qty1=$("input[name='uom_qty1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var uom11=$("select[name='uom_uom2[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var rema2=$("input[name='uom_remark1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var matrial_id=$("input[name='material_id2[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var order_items_id=$("input[name='order_items_id[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    finaldata+="&qty2="+qty1.join("*")+"&uom2="+uom11.join("*")+"&remark2="+rema2.join("*")+"&material_id1="+matrial_id.join("*")+"&order_items_id="+order_items_id.join("*");//
//alert(finaldata);
                    $.post("updateStockTransferDetails.php",finaldata,function(returnss)
                    {
//alert(returnss)

if($.trim(returnss)=="Y")
{



    $("#myModal_unload").modal('hide');
    show_modal("LR Details Updated Successfully")

    $("#form_unloading").bootstrapValidator('resetForm', true);
    $("#uom_form")[0].serialize();
    append_data($("#ids_value").val());
}
                        else if($.trim(returnss)=="N")
{



    show_modal("Failed To Update. ")

}else
{


    show_modal("Failed To Update....")


}





                    });



                    return false;
                },
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    lr_no: {
                        message: 'The LR No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The LR no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The LR no be more than 1 and less than 40 alphanumerics keyword'
                            },
                            regexp: {
                                regexp: /^[a-zA-z0-9-]+$/i,
                                message: 'The LR number cannot be special character'
                            }

                        }
                    },


                    transport_name: {
                        message: 'The Cerena Reference name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Transporter name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Transporter name  be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[ a-zA-Z ]+$/i,
                                message: 'The Transporter name  cannot be number only character'
                            }

                        }
                    },
                    driver_name: {
                        message: 'The Driver Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Driver name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Driver name  be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[ a-zA-Z ]+$/i,
                                message: 'The Driver name  cannot be number or special characters'
                            }

                        }
                    },
                    driver_mob: {
                        message: 'The Contact No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Contact no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 10,
                                max: 13,
                                message: 'The Contact no should be at least 10 digit'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'The Contact no  cannot be  character'
                            }

                        }
                    },
                    vehicle_num: {
                        message: 'The Vehicle No is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Vehicle no is required and cannot be empty'
                            },
                            stringLength: {
                                min: 5,
                                max: 30,
                                message: 'The Vehicle No should be at least 5 digit'

                            },
                            regexp: {
                                regexp:/^[a-zA-z0-9- ]+$/i,
                                message: 'The Vehicle no  cannot be special characters'
                                }

                        }
                    },
                    vihicle_type: {
                        message: 'The Vehicle Type is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Vehicle Type is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Vehicle Type be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-z0-9-. ]+$/i,

                                message: 'The Vehicle Type  cannot be special characters'
                            }

                        }
                    },




                   dates: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Date ..'
                            }
                        }
                    }
                }

            });



            /*End Here*/

            //     $("#myModal_upload_lr_image").modal('show')






            /*    LR Image Code With #files and name files */


            $("#files").fileinput({



                allowedFileExtensions : ['jpg', 'png','gif'],

                elErrorContainer: '#kv-error-4',
                //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                //AJAX
                //   dropZoneEnabled: t,
                //  uploadAsync: false,
                uploadUrl: "addLrImageFile.php", // your upload server url
                uploadExtraData: function() {
                    return {
                        order_id:$("#order_id").val()

                    };
                }
            }).on('fileuploaded', function(evt,data,datas,tt){
                //  alert(data.response.messages);
                if(data.response.messages=="OK")
                {


                    $.get("unloadOrder.php",$("#form_unloading").serialize(),function(rt)
                    {
                        if($.trim(rt)=="Y")
                        {


                            $("#myModal_upload_lr_image").modal('hide');
                            show_modal("Data Added Successfully");
                            append_data($("#ids_value").val());
                        }
                        else
                        {


                            $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Data Failed To Update</div>");


                        }




                    });






                    $("#kv-error-6").html("<div class='alert alert-success'><strong>Success!</strong> Image Uploaded Succesfully</div>");


                }
                else
                {

                    $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed</div>");

                }




            });

            /* End Here*/














            $("#file-en").fileinput({



                allowedFileExtensions : ['jpg', 'png','gif'],

                elErrorContainer: '#kv-error-2',
                //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                //AJAX
                //   dropZoneEnabled: t,
                //  uploadAsync: false,
                uploadUrl: "addOtherImageFile.php", // your upload server url
                uploadExtraData: function() {
                    return {
                        material_id: $("#quality_material_id1").val(),
                        order_id: $("#quality_order_id1").val(),
                        captons:$("#captions").val()
                    };
                }
            }).on('filepreupload', function(event, data, previewId, index, jqXHR) {
                // do your validation and return an error like below


                if($("#captions").val()=="")
                {
                    return {
                        message: 'Please Enter The Image Caption'
                    }}
            }).on('fileuploaded', function(evt,data,datas,tt){
                //     alert(data.response.uploaded)
                if(data.response.uploaded=="OK")
                {

                    $("#captions").val("");

                    $("#kv-error-3").html("<div class='alert alert-success'><strong>Success!</strong> Image Uploaded Succesfully</div>");

                    getAllQcItemDetail("",$("#quality_challan_no1").val(),$("#quality_order_id1").val());
                    getOtherImage($("#quality_material_id1").val(),$("#quality_order_id1").val())
                }
                else
                {

                    $("#kv-error-3").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed</div>");

                }




            });




            $("#error_head").html("");
            ///   $("#myModal_upload_image").modal('show');
            $("#challan_no").focus();$("#ji").modal("show");


            /*  Update UOM Fail Pass*/


            $("#updates_uom").submit(function()
            {

                $("#error_head").html("");
                $.get("qcUpdate.php",$(this).serialize(),function(rty)
                {

                    if($.trim(rty)=="NOT") {

                        $("#error_head").html("<div class='alert alert-danger'><strong>Warning !</strong> Pass Quantity and Fail Quantity Must be same as Received Quantity.</div>");


                    }else if($.trim(rty)=="Y")
                    {
                        $("#myModal_open_box").modal('hide');
                        show_modal("Update Succesfully");
                        console.log("added");
                        var tk=$("#quality_material_id1").val();
                        $('label[id="'+tk+'"]').html("Done<i class='fa fa-check fa-1x'></i>").css('color','#00a0d2');
                        $('label[id="'+tk+'"]').removeAttr("class");
                        $("#updates_uom")[0].reset();
                        append_data($("#ids_value").val());
                        setTimeout(function()
                        {


                            $("#myModal0").modal('hide');
                            $("#myModal_qualitys").modal('show');

                        },1700);

                    }else if($.trim(rty)=="N")
                    {


                        $("#error_head").html("<div class='alert alert-danger'><strong>Warning !</strong> Failed To Update.</div>");



                    }
                    else {

                        $("#error_head").html("<div class='alert alert-danger'><strong>Warning !</strong> "+rty+".</div>");



                    }


                });

                return false;
            });



            /// UOM Form Submit


            $("#uom_form").submit(function()
            {
                $("#myModal_quantity").modal('hide');

$("#myModal_unload").modal('show');
                //
                //
                //    alert(datas);
                return false;
            });
            $("#put_way_form").submit(function() {

                $.get("orderPutwaySave.php", $(this).serialize(), function (ret_me) {

                    if($.trim(ret_me)=="Y")
                    {

                        $("#myModal_putway").modal('hide');
                        show_modal("Put Away Step Successfully Done");
                        append_data($("#ids_value").val());
                        $("#uom_form")[0].reset();
                    }
                    else if($.trim(ret_me)=="N")
                    {

                        $("#myModal_putway").modal('hide');
                        show_modal("Error : Failed To Update");
                        setTimeout(function(){


                            $("#myModal0").modal('hide');
                            $("#myModal_putway").show();


                        },2200);

                    }
                    else
                    {


                        $("#myModal_putway").modal('hide');
                        show_modal(ret_me);


                    }

                });
                return false;
            });


            $('.modal-body a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });


            $("#quality_form").submit(function()
            {



                if($(".get_sta").text().indexOf("Add")>=0)
                {
                    //   alert("false")
                    $("#error1").html("<div class='alert alert-warning'><strong>Warning!</strong> Quality Check Not completed for Items.</div>")

                }
                else {
                    $("#error1").html("")

                    $.get("quality_form.php",$("#quality_form").serialize(),function(yu)
                    {

                        if($.trim(yu)=="Y")
                        {

                            append_data($("#ids_value").val());
                            $("#myModal_qualitys").modal('hide');
                            show_modal("Quality Done Successfull !!");
                        }
                        else if($.trim(yu)=="N")
                        {
                            $("#myModal_qualitys").modal('hide');
                            show_modal("Failed To Update");
                            setTimeout(function () {
                                $("#myModal0").modal('hide');
                                $("#myModal_qualitys").modal('show');
                            },2000);


                        }

                    })
                }
                return false;
            });


            $("#add_notess").submit(function()
            {

                var for_datas=$(this).serialize();
                $.get("add_note_data.php",for_datas,function(rest)
                {

                    if($.trim(rest)=="Y") {


                        $("#myModal_add_notes").modal('hide');
                        $("#add_notess")[0].reset();

                        show_modal("Notes Added Successfully");
                    }else
                    {
                        $("#myModal").modal('hide');
                        show_modal("Unable to Add Notes"+rest)

                    }


                });

                return false;
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


                $("#cmpid").val($("#ids_value").val());

                var prs = $(this).serialize();

                $.post("newShipAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();

                        var id = $('#ids_value').val();
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


                $("#cmps_id").val($("#ids_value").val());

                var prs = $(this).serialize();

                $.post("newCondAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal1').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();
                        var id = $('#ids_value').val();
                        $("#add_congs")[0].reset();
                        load1(id);


                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
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
        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
            $(elem).addClass("active");
        }
        function prevTab(elem) {
            $(elem).find('a[data-toggle="tab"]').click();

        }





        function change_uoms()
        {

            if($.trim($("#quantity5").val())!=$.trim($("#quantity1").val())) {
                $("#myModal_quantity").modal('hide');
                $("#myModal88").modal('show');
                //
                //
                //
                // alert("")
            }









        }


        function set_items()
        {






            $("#ids_value").val($("#typeid").val());







        }



        function set_items_company()
        {


            $("#ids_value").val($("#company_typeids").val());





        }


        function validates()
        {


            $("#main")
                .data('bootstrapValidator')
                .updateStatus("co", 'NOT_VALIDATED')
                .validateField("co");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("cof", 'NOT_VALIDATED')
                .validateField("cof");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("shipper", 'NOT_VALIDATED')
                .validateField("shipper");
            $("#main")
                .data('bootstrapValidator')
                .updateStatus("warehouse_id", 'NOT_VALIDATED')
                .validateField("warehouse_id");




        }
        function  call_by_company(ii)
        {


            $('#typeid').val("").attr("selected", "selected");


            $('#cmp_type>div>select').val("Company").attr("selected", "selected");
            $('#cmp_type>div>select').change();
            $("#ids_value").val(ii);
            append_data(ii);
            /* get_material();

             load1(ii);*/

        }
        function call_by_sales(dd)
        {

            $('#company_typeids').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
            $('#cmp_type>div>select').change();


            append_data(dd);


        }

        function set_cmp(a)
        {


            if(a=="Company")
            {

                set_items_company();
            }
            else if(a=="Sales Office")
            {



                set_items()

            }
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