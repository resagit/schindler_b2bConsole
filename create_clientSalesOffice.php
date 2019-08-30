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

    var choices=new Array();
    function load()
    {

        set_menus('<?php echo $_SESSION['list']?>');
        $.get("companylist.php","",function(hd)
        {

//alert(hd);

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
    var levelOptions="<option value=''>Select</option>";
    function setData(arr) {




            ko = arr;
            var obj = JSON.parse(arr);


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



         //   $("#Ship_TIN").val(datak[0][2]);
         //   $("#Ship_CIN").val(datak[0][3]);
            $("#company_type").html(levelOptions);
          //  var ids = $("#sales_off").val();

            //  get_sale_office();

            // get_material();
            //    $("#challan").append(levelOptions);


            //var no= document.getElementById("typeid").selectedIndex;
            // alert(no);
            // alert(no+"Indesx");
            // change(no);
            // getMaterailList(ids);




        }

    }

    function get_material()
    {

        choices=[];
        //  var qry = {"clientId": clin};

        var clin = $('#main_company_id').val();

        //alert(clin);
        var query = {"company_id": clin};

        $.post("get_material_list.php", query, function (iks) {


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
                choices.push(datass[i][0].toUpperCase());


            }
            // alert(choices);


        });
    }
    function load1(ar1)
    {




        query={"client_id":ar1};
        $.get("Add_cong.php",query,function(kj)
            {

//alert(kj+"cong");
                if($.trim(kj)=="N")
                {
                    $("#co").html('');
                }else{
                    //alert(a+" load1");
                    setCongAdd(kj);
                }

            }
        );





        query={"client_id":ar1};
        $.get("add_cof.php",query,function(kjj)
            {

                if($.trim(kjj)=="N")
                {
                    $("#cof").html('');
                }else{

                    // alert(a+" conf");
                    setConf(kjj);

                }
            }
        );
    }

    var data;
    var objs="";
    function setCongAdd(arr) {



        var obj = JSON.parse(arr);

        objs=obj;
        data1=new Array();

        var levelOptions1="";
        var optionss="";
        var levelOption1="";
        var out=new Array();

        var k=new Array();
        k=[];
        for(var i = 0; i < obj.LIST.length; i++) {

            data1[i]=new Array();
            data1[i][0]=obj.LIST[i].NAME;
            data1[i][1]=obj.LIST[i].address;
            data1[i][2]=obj.LIST[i].tinNo;
            data1[i][3]=obj.LIST[i].cinNo;
            data1[i][4]=obj.LIST[i].id;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

            //alert(levelOption);


            k.push([data1[i][0],data1[i][4]]);
        }



        k= k.sort();
        optionss=optionss+"<option value=''>Select</option>";
        // alert(k);
        for(var h=0;h< k.length;h++)
        {

            optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

        }


//alert(levelOptions1);
        $("#co").html(optionss);

        var km=$("#co").val();

        con_call(km);

    }





    ///Conf Adress

    data1=new Array();

    var obj = "";
    var da="";
    function setConf(arr) {
        da=arr;
        obj=JSON.parse(arr);




        data1=new Array();

        var levelOptions1="";
        var optionss="";
        var levelOption1="";
        var out=new Array();

        var k=new Array();
        k=[];
        for(var i = 0; i < obj.LIST.length; i++) {

            data1[i]=new Array();
            data1[i][0]=obj.LIST[i].NAME;
            data1[i][1]=obj.LIST[i].address;
            data1[i][2]=obj.LIST[i].tinNo;
            data1[i][3]=obj.LIST[i].cinNo;
            data1[i][4]=obj.LIST[i].id;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

            //alert(levelOption);


            k.push([data1[i][0],data1[i][4]]);
        }



        k= k.sort();
        // alert(k);
        optionss=optionss+"<option value=''>Select</option>";
        for(var h=0;h< k.length;h++)
        {

            optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

        }

//alert(levelOptions1);



        $("#cof").html(optionss);
        var sd=$("#cof").val();
        call_me(sd);


    }


    function call_me(x)
    {
        $("#addr").val("");
        for(var i = 0; i < obj.LIST.length; i++) {


            //data1[i]=new Array();
            data1[i][0]=obj.LIST[i].NAME;
            data1[i][1]=obj.LIST[i].address;
            data1[i][2]=obj.LIST[i].tinNo;
            data1[i][3]=obj.LIST[i].cinNo;
            data1[i][4]=obj.LIST[i].id;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

            //alert(levelOption);
            if(data1[i][4]==x)
            {
                $("#addr").val(data1[i][1]);

            }
        }




    }
    function con_call(z)
    {


        $("#addr1").val("");
        $("#tin1").val("");
        $("#cin1").val("");
        var data1=new Array();

        var levelOptions1="";
        var optionss="";
        var levelOption1="";
        var out=new Array();

        for(var i = 0; i < objs.LIST.length; i++) {

            data1[i]=new Array();
            data1[i][0]=objs.LIST[i].NAME;
            data1[i][1]=objs.LIST[i].address;
            data1[i][2]=objs.LIST[i].tinNo;
            data1[i][3]=objs.LIST[i].cinNo;
            data1[i][4]=objs.LIST[i].id;


            if(data1[i][4]==z)
            {


                $("#addr1").val(data1[i][1]);
                $("#tin1").val(data1[i][3]);
                $("#cin1").val(data1[i][2]);

            }


        }








    }














    function checks_field(v)
    {

        if(v=="")
        {



            return "a";
        }
        else
        {


            return v;
        }




    }
    function descriptions()
    {
        var cid1=$.trim($("#autocomplete").val());
        var cid =cid1.toUpperCase();
        var client_id=$("#main_company_id").val();
        $("#des").val("");
        $("#uom").html("");
        $("#quantity").html("");
        $("#rate").val("");
        quers={"client_id":client_id,"item":cid};
        $.get("uom.php",quers,function(fd)
        {





            var obj = JSON.parse(fd);


            uom1=new Array();

            var levelOptions1="";

            var levelOption1="";
            var out=new Array();

            for(var i = 0; i < obj.UOM.length; i++) {

                uom1[i]=new Array();
                uom1[i][0]=obj.UOM[i].unitOfMeasurement;
                uom1[i][1]=obj.UOM[i].material_name;
                /*data1[i][2]=obj.UOM[i].tinNo;
                 data1[i][3]=obj.UOM[i].cinNo;
                 data1[i][4]=obj.UOM[i].id;*/
                //data[i][1]=obj.LIST[i].name;
                //data[i][7]=obj.DETAIL[i].requestTimestamp;

                levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+uom1[i][0]+">" +uom1[i][0]+ "</option>";





            }


            document.getElementById("des").value=uom1[0][1];
            document.getElementById("uom").innerHTML =levelOptions1 ;





            /*contextAdd  document.getElementById('cong_CIN').value =data[0][2];*/
            /*document.getElementById('cong_TIN').value =data1[0][2];
             document.getElementById('cong_CIN').value =data1[0][3];
             document.getElementById('contextAdd').value =data1[0][1];*/








        });





    }
    addeditems=[];
    var indexs;
    function add_table()
    {

        var items= $.trim($("#autocomplete").val());
        var uoms=$("#uom").val();
        var des=$("#des").val();
        var quan=$("#quantity").val();
        var rates=$("#rate").val();
        var ks=parseInt(quan);

        if(items!="" && uoms!="" && des!="" && ks>0  && rates!="")
        {

            indexs=$.inArray(items,addeditems);





            if(indexs>=0)
            {

                show_modal("Item Code Already Added");


            }else
            {


                $("#tbd").append("<tr><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uoms+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")


                $("#autocomplete").val("");
                $("#rate").val("");
                $("#uom").html("");
                $("#des").val("");
                $("#quantity").val("");
                addeditems.push(items);
            }






        }
        else
        {
            var ms=$('#add_items input[type="text"]').filter(function () {
                return this.value.length == 0
            }).attr("id");


            var msd=$('#add_items input[type="text"]').filter(function () {
                return this.value.length == 0
            }).attr("placeholder");



            $("#"+ms+"").focus();

            show_modal("Enter the value in "+msd+" the Field");
            // alert($('#add_item>input[type]').filter('input[value==""]').length);



            //document.getElementById(ms).required = true;



        }



    }


    function getfuldate(d){




        var dt=new Date(d);
        var cur_date=dt.getDate();
        var cur_month=dt.getMonth();
        var cur_year=dt.getFullYear();
        var dates=cur_year+"-"+cur_month+"-"+cur_date;
        return dates;

        //var vc=ml.split(" ");
        // alert(vc[1]);
    }
    var datam;
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

        // get_sale_office();
        //get_material();


    }

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


        //alert(ar1);
        var client_id=document.getElementById('main_company_id').value;
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
        var sales_id= $("#sales_off").val();
        get_warehouse_shipper();
        load1(sales_id);
    }
    /////////////////////////get warehouse//////
    var ship_data;
    function get_warehouse_shipper()
    {
        var sales_off=document.getElementById('sales_off').value;
        query1 = {"sales_off": sales_off};
        $.get("get_warehouse.php", query1, function (hd) {


            var a = hd;
            //   alert(a+"ware");
            if(a=='N')
            {
                $("#typeid").html('');
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

        for (var i = 0; i < obj.SHIPPER.length; i++) {

            shipper[i] = new Array();
            shipper[i][0] = obj.SHIPPER[i].shipperID;
            shipper[i][1] = obj.SHIPPER[i].shipperName;
            shipper[i][2] = obj.SHIPPER[i].tin;
            shipper[i][3] = obj.SHIPPER[i].cin;
            /*   datak[i][2] = obj.LIST[i].tinNo;
             datak[i][3] = obj.LIST[i].cinNo;*/
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            shippr = shippr + "<option  id=" + i + " value = " + shipper[i][0] + ">" + shipper[i][1] + "</option>";


            // alert(datak[i][2]);
            //alert(data[i][1]);

            //                        alert(warehouseOptions);


        }
        $("#Ship_TIN").val(shipper[0][2]);
        $("#Ship_CIN").val(shipper[0][3]);
        $("#typeid").html(shippr);



        $("#warehouse_id").html(warehouse);

    }

    ////////////end ware house////////




    function get_pincode(z)
    {

        $("#client_city").val("");
        $("#client_state").val("");
		$("#client_country").val("");
        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {

            setState(xs);



        });


    }

    function setState(ams)
    {


        $("#client_city").val("");
        $("#client_state").val("");
		$("#client_country").val("");
        // alert(ar+"1");
        var obj2 = JSON.parse(ams);
        //alert(obj);

        data11=new Array();

        var out=new Array();

        for(var i = 0; i < obj2.ADD.length; i++) {

            data11[i]=new Array();
            data11[i][0]=obj2.ADD[i].districtname;
            data11[i][1]=obj2.ADD[i].statename;
			data11[i][2]=obj2.ADD[i].country;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            //levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][0]+">" +data1[i][0]+ "</option>";

            //alert(levelOption);



        }
        if(data11[0][1]!="")
        {
            document.getElementById('client_city').value=data11[0][0];
            document.getElementById('client_state').value=data11[0][1];
			document.getElementById('client_country').value=data11[0][2];
        }


    }

    function lookup(z)
    {

        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {

            setState1(xs);



        });


    }

    function setState1(ams)
    {

        $("#city").val("");
        $("#state").val("");
        // alert(ar+"1");
        var obj2 = JSON.parse(ams);
        //alert(obj);

        data11=new Array();

        var out=new Array();

        for(var i = 0; i < obj2.ADD.length; i++) {

            data11[i]=new Array();
            data11[i][0]=obj2.ADD[i].districtname;
            data11[i][1]=obj2.ADD[i].statename;

            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            //levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][0]+">" +data1[i][0]+ "</option>";

            //alert(levelOption);



        }
        if(data11[0][1]!="")
        {
            document.getElementById('city').value=data11[0][0];
            document.getElementById('state').value=data11[0][1];
        }


    }






    /*function checks_table(xs)
     {

     alert(xs);

     if($("#tbd>tr").length>0)
     {
     var arrss=new Array();

     var arr=$('#tbd tr').find('td').map(function() {

     return $(this).text()
     }).get();


     arrss.push(arr);
     alert(arrss.length  +"hi");

     var dsw=0;
     for(dsw=0;dsw<arrss.length;dsw++)
     {
     alert(dsw);

     if(arrss[dsw]==xs)
     {



     return false;
     }
     else
     {



     return true;
     }

     }

     }
     else
     {



     return true;
     }






     }
     */


    function delete_row(row)
    {



        var i=row.parentNode.parentNode.rowIndex;
        //alert(i+" "+index+" "+row);
        var n=i-1;
        document.getElementById('tbd').deleteRow(n);

        addeditems.splice(n,1);
        //indexs--;

    }

    function cin_change(its)
    {





        var obj = JSON.parse(ship_data);


        shippers= new Array();


        var levelOption = "";
        var out = new Array();

        for (var i = 0; i < obj.SHIPPER.length; i++) {

            shippers[i] = new Array();
            shippers[i][0] = obj.SHIPPER[i].shipperID;
            shippers[i][1] = obj.SHIPPER[i].shipperName;
            shippers[i][2] = obj.SHIPPER[i].tin;
            shippers[i][3] = obj.SHIPPER[i].cin;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;
            if(its==shippers[i][0]) {
                $("#Ship_TIN").val(shippers[i][2]);
                $("#Ship_CIN").val(shippers[i][3]);

            }
            // alert(datak[i][2]);
            //alert(data[i][1]);

            //alert(levelOption);


        }


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
                           Create Client Sales Office
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
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Client</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6" style="height: 70px">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Client:</label>
                                                <select  class="form-control" name="company_type" required="" id="company_type" >

                                                    <option value="">Select</option>
                                                    <option value="8">B2B Client</option>
                                                    <option value="9">WareHouse Vendor</option>
                                                    <option value="10">Logistic Vendor</option>

                                                </select>
                                            </div>


                                        </div>
                                        <!-- <div class="col-lg-6">
                                             <div class="form-group">
                                                 <label for="exampleInputEmail1q">Sales Office:</label>
                                                 <select  class="form-control" name="sales_off" required="" id="sales_off" onchange="onchange_sale();" >

                                                     <!--  <option value="INBOUND">Inbound</option>->

                                                 </select>
                                             </div>
                                         </div>-->
                                        <!--<div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Challan no.</label>
                                                <input type="text" class="form-control" required="" pattern="[a-zA-Z- 0-9]" style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
                                            </div>

                                        </div>-->
                                        <!-- <div class="col-lg-3">
                                 <div class="form-group">


                                     <div class="control-group">
                                         <label class="control-label">Date </label>
                                         <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                             <input required="" title="Date" size="26" type="text" id="dates"   placeholder="Date"  readonly>

                                             <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                         </div>
                                         <input type="hidden" id="dtp_input2" required="" /><br/>
                                     </div>
                                 </div>
                    </div>
                    -->
                                    </div>

                                </div>
                            </div>

                        </div>



                        <!--  <div class="panel panel-green  margin-bottom-40">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                              </div>
                              <div class="panel-body">
                                  <div class="container-fluid">
                                      <div class="row">
                                          <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1q">Challan Type</label>
                                                  <select  class="form-control" name="challan_type" required="" id="challan" >

                                                      <option value="INBOUND">INBOUND</option>

                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1q">Warehouse:</label>
                                                  <select  class="form-control" name="warehouse_id" required="" id="warehouse_id" >

                                                      <!--  <option value="INBOUND">Inbound</option>->

                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-lg-3">
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Challan no.</label>
                                                  <input type="text" class="form-control" required="" pattern="[a-zA-Z- 0-9]" style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
                                              </div>

                                          </div>
                                          <div class="col-lg-3">
                                              <div class="form-group">


                                                  <div class="control-group">
                                                      <label class="control-label">Date </label>
                                                      <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                          <input required="" title="Date" size="26" type="text" id="dates"   placeholder="Date"  readonly>

                                                          <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                                      </div>
                                                      <input type="hidden" id="dtp_input2" required="" /><br/>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>
                              </div>

                          </div>-->





                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Personal Details</h3>
                            </div>
                            <div class="panel-body">


                                <!--<div class="form-group" id="shiper_select">
                                    <label for="exampleInputPassword1">Shipper</label><br>
                                    <select id="typeid"  class="form-control" data-live-search="true" onchange="cin_change(this.value);"   name="shipper" style="width: 300px" required="">

                                    </select>

                                </div>-->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_name"  placeholder="Name" name="client_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sales Office Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="company_name" placeholder="Sales Office Name" name="company_name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_mobile"  placeholder="Mobile no" name="client_mobile">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alternate Mobile:</label>
                                        <input type="text"  class="form-control" id="client_alt_mobile" placeholder="Alternate Mobile no" name="client_alt_mobile">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="exampleInputPassword1">CIN:</label>
                                        <input type="text"  class="form-control" id="client_cin"  placeholder="CIN" name="client_cin">
                                    </div>
                                </div>
								<div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">GSTIN:</label>
                                        <input type="text"  class="form-control" id="client_gstin" placeholder="GSTIN" name="client_gstin">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">TIN<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_tin" placeholder="TIN" name="client_tin">
                                    </div>
                                </div>-->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_email"  placeholder="Email Id" name="client_email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Pan Card:</label>
                                        <input type="text"  class="form-control" id="client_pan" placeholder="Pan Card no" name="client_pan">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contact Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_cnt_name"  placeholder="Reference name" name="client_cnt_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contact No<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_cnt_no" placeholder="Reference no" name="client_cnt_no">
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="panel panel-green margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Address Details</h3>
                            </div>
                            <div class="panel-body">


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address 1<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_add1" placeholder="Address 1" name="client_add1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address 2:</label>
                                        <input type="text"  class="form-control" id="client_add2"  placeholder="Address 2" name="client_add2">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Pincode:</label>
                                        <input type="number" class="form-control" id="client_pin" placeholder="Pincode" name="client_pin">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City:</label>
                                        <input type="text"  class="form-control" id="client_city"  placeholder="City" name="client_city">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">State:</label>
                                        <input type="text" class="form-control" id="client_state" placeholder="State" name="client_state">
                                    </div>
                                </div>
								<div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Country:</label>
                                        <input type="text" class="form-control" id="client_country" placeholder="Country" name="client_country">
                                    </div>
                                </div>
                            </div></div>

                        <!-- <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i>Bank Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_bank" placeholder="Bank Name" name="client_bank">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account No<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_acc_no"  placeholder="Account No " name="client_acc_no">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">IFSC Code<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_ifsc" placeholder="Bank IFSC code" name="client_ifsc">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Branch Code<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_bank_branch"  placeholder="Bank Branch Code" name="client_bank_branch">
                                    </div>
                                </div>
                            </div>

                        </div> -->

                        <center>
                            <br><input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>
							<br><br>	
			
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







    <script type="text/javascript" src="js/bootstrapValidator.js"></script>

















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
            $("#challan_no").focus();



            $('#main').bootstrapValidator( {

                live: 'enabled', submitButton: '$form_unloading button[type="submit"]', submitHandler: function(validator, form, submitButton) {
                    if($("#company_name").val()!="" && $("#client_name").val()!="") {
                        if ($("#client_alt_mobile").val()=="") {
                            $("#client_alt_mobile").val("-")
                        }
                        if($("#client_country").val()=="") {
                            $("#client_country").val("-")
                        }
                        if($("#client_state").val()=="") {
                            $("#client_state").val("-")
                        }
                        if($("#client_city").val()=="") {
                            $("#client_city").val("-")
                        }
                        if($("#client_add2").val()=="") {
                            $("#client_add2").val("-")
                        }
                        if($("#client_pin").val()=="") {
                            $("#client_pin").val("0")
                        }
                        if($("#client_gstin").val()=="") {
                            $("#client_gstin").val("-")
                        }
                        if($("#client_cin").val()=="") {
                            $("#client_cin").val("-")
                        }
                        var pans;
                        if ($("#client_pan").val()=="") {
                            pans="-";
                        }
                        else {
                            pans=$("#client_pan").val();
                        }
                        
                        var main_query= {
                            'company_type': $("#company_type").val(), 'client_name': $("#client_name").val(), 'company_name': $("#company_name").val(), 'client_mobile': $("#client_mobile").val(), 'client_alt_mobile': $("#client_alt_mobile").val(), 'client_cin': $.trim($("#client_cin").val().replace(" ", "")), 'client_tin': $("#client_tin").val(), 'client_email': $("#client_email").val(), 'client_pan': pans, 'client_cnt_name': $.trim($("#client_cnt_name").val()), 'client_cnt_no': $("#client_cnt_no").val(), 'client_add1': $("#client_add1").val(), 'client_add2': $("#client_add2").val(), 'client_pin': $("#client_pin").val(), 'client_city': $("#client_city").val(), 'client_state': $("#client_state").val(), 'client_bank': $("#client_bank").val(), 'client_acc_no': $("#client_acc_no").val(), 'client_ifsc': $("#client_ifsc").val(), 'client_bank_branch': $("#client_bank_branch").val(), 'client_gstin': $("#client_gstin").val(), 'client_country': $("#client_country").val()
                        };

                        $.get("createB2BClientSalesOffice.php", main_query, function (ho) {
                            if ($.trim(ho)=="Y") {
                                show_modal("Sales Office For " + $('#company_type option:selected').text() + " Created Successfully");
                                $("#main").bootstrapValidator('resetForm', true);
                                $("#client_city").val("");
                                $("#client_state").val("");
                                $("#client_country").val("");
                                $("#client_gstin").val("");
                                $("#client_cin").val("");
                                $("#client_pan").val("");
                            }
                            else if ($.trim(ho)=="A") {
                                show_modal("Sales Office Already Exist");
                            }
                            else if ($.trim(ho)=="N") {
                                show_modal("Failed To Create..");
                            }
                            else {
                                show_modal("Failed To Create")
                            }
                        });
                    }
                    else {
                        show_modal("State And City Are Required");
                    }
                    return false;
                }, 
                message: 'This value is not valid', feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok', invalid: 'glyphicon glyphicon-remove', validating: 'glyphicon glyphicon-refresh'
                }, 
                fields: {
                    company_type: {
                        message: 'The Please Select is not valid', validators: {
                            notEmpty: {
                                message: 'Please select Company'
                            }
                        }
                    }
                    , client_name: {
                        message: 'The Name is not valid', validators: {
                            notEmpty: {
                                message: 'The Name is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 2, max: 40, message: 'The Name be more than 1 and less than 40 characters long'
                            }
                            , regexp: {
                                regexp: /^[a-z 0-9-.]+$/i, message: 'The Name cannot be special character'
                            }
                        }
                    }
                    , company_name: {
                        message: 'The Company Name is not valid', validators: {
                            notEmpty: {
                                message: 'The Company Name  is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 2, max: 150, message: 'The Company Name  be more than 1 and less than 150 characters long'
                            }
                        }
                    }
                    , client_cnt_name: {
                        message: 'The  Reference Name No is not valid', validators: {
                            notEmpty: {
                                message: 'The  Reference Name  is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 2, max: 40, message: 'The  Reference Name  be more than 2 and less than 40 characters long'
                            }
                            , regexp: {
                                regexp: /^[a-z 0-9-]+$/i, message: 'The  Reference Name cannot be number only character'
                            }
                        }
                    }
                    , client_mobile: {
                        message: 'The Contact No is not valid', validators: {
                            notEmpty: {
                                message: 'The Contact no is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 10, max: 12, message: 'The Contact should be at least 10 and atmost 12 digit'
                            }
                            , regexp: {
                                regexp: /^[0-9]+$/i, message: 'The Contact number  cannot be  character'
                            }
                        }
                    }
                    // , client_alt_mobile: {
                    //     message: 'The Contact No is not valid', validators: {
                    //         stringLength: {
                    //             min: 10, max: 12, message: 'The Contact should be at least 10 and atmost 12 digit'
                    //         }
                    //         , regexp: {
                    //             regexp: /^[0-9]+$/i, message: 'The Contact number  cannot be  character'
                    //         }
                    //     }
                    // }
                    , client_email: {
                        validators: {
                            notEmpty: {
                                message: 'The Email ID is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 2, max: 100, message: 'The Email ID be more than 2 and less than 100 characters'
                            }
                            , regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$', message: 'The value is not a valid email address'
                            }
                        }
                    }
                    , client_cnt_no: {
                        message: 'The Contact No is not valid', validators: {
                            notEmpty: {
                                message: 'The Mobile no is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 10, max: 12, message: 'The Mobile number should be at least 10 and atmost 12 digit'
                            }
                            , regexp: {
                                regexp: /^[0-9]+$/i, message: 'The Mobile number  cannot be  character'
                            }
                        }
                    }
                    // , client_pan: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'The Pan Card  is required and cannot be empty'
                    //         },
                    //         stringLength: {
                    //             min: 10,
                    //             max: 10,
                    //             message: 'The Pan Card should be at 10 digit'
                    //         },
                    //         regexp: {
                    //             regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
                    //             message: 'The Pan Card  No is incorrect'
                    //         }

                    //     }
                    // }
                    , client_ifsc: {
                        validators: {
                            notEmpty: {
                                message: 'The IFSC CODE is required and cannot be empty'
                            },
                            regexp: {
                                regexp: /^[A-Z|a-z]{4}[0][\d]{6}$/,
                                message: 'The IFSC CODE No is incorrect example : XXXX0000000'
                            }


                        }
                    }
                    , /*client_pin: {
                                    message: 'The Pincode is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'The Pincode is required and cannot be empty'
                                        },
                                        stringLength: {
                                            min: 6,
                                            max: 6,
                                            message: 'The Pincode should be at least 6 digit'
                                        },
                                        regexp: {
                                            regexp: /^[0-9]{1,6}$/,
                                            message: 'The Pincode No is incorrect'
                                        }

                                    }
                                },*/
                    client_bank: {
                        message: 'The Bank Name is not valid', validators: {
                            notEmpty: {
                                message: 'The Bank name is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 1, max: 40, message: 'The Bank Name be more than 1 and less than 40 characters long'
                            }
                            , regexp: {
                                regexp: /^[a-z 0-9-.]+$/i, message: 'The Bank Name cannot be special character'
                            }
                        }
                    }
                    , client_acc_no: {
                        message: 'The Bank Acc  No is not valid', validators: {
                            notEmpty: {
                                message: 'The Bank Acc  no. is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 1, max: 15, message: 'The Bank Account No. be more than 1 Digit'
                            }
                            , regexp: {
                                regexp: /^[0-9]+$/i, message: 'The Bank Account No. cannot be  character'
                            }
                        }
                    }
                    , client_bank_branch: {
                        message: 'Branch Code is not valid', validators: {
                            notEmpty: {
                                message: 'Branch Code is required and cannot be empty'
                            }
                        }
                    }
                    , /*client_tin: {
                                    message: 'Tin no is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'Tin no is required and cannot be empty'
                                        }

                                    }
                                },*/
                    /*client_gstin: {
                                message: 'The GSTIN is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'The GSTIN is required and cannot be empty'
                                        },
                                        stringLength: {
                                            min: 15,
                                            max: 15,
                                            message: 'The GSTIN should be at least 15 digit'
                                        },
                                        regexp: {
                                            regexp: /^[a-z 0-9-.]+$/i,
                                            message: 'The GSTIN cannot be special character'
                                        }
                                    }
                                },*/
                    /*client_country: {
                                    message: 'Company Country is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'Country is required and cannot be empty'
                                        }

                                    }
                                },
                                client_cin: {
                                    message: 'Cin no is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'Cin no is required and cannot be empty'
                                        }

                                    }
                                },*/
                    client_add1: {
                        message: 'The Address 1 is not valid', validators: {
                            notEmpty: {
                                message: 'The Address 1 is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 2, max: 140, message: 'The Address 1 be more than 1 and less than 140 characters long'
                            }
                        }
                    }
                    , /*client_add2: {
                                    message: 'The Address 2 is not valid',
                                    validators: {
                                        /*notEmpty: {
                                            message: 'The Address 2 is required and cannot be empty'
                                        },
                                        stringLength: {
                                            min: 2,
                                            max: 140,
                                            message: 'The Address 2 be more than 1 and less than 140 characters long'
                                        }
                                    }
                                },*/
                    /*client_city: {
                                    message: 'The City is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'The City is required and cannot be empty'
                                        },
                                        stringLength: {
                                            min: 2,
                                            max: 140,
                                            message: 'The City be more than 1 and less than 140 characters long'
                                        }
                                    }
                                },
                                client_state: {
                                    message: 'The State is not valid',
                                    validators: {
                                        notEmpty: {
                                            message: 'The State is required and cannot be empty'
                                        },
                                        stringLength: {
                                            min: 2,
                                            max: 140,
                                            message: 'The State be more than 1 and less than 140 characters long'
                                        }
                                    }
                                },*/
                    client_add2: {
                        message: 'The Address 2 is not valid', validators: {
                            /*notEmpty: {
                                            message: 'The Address 2 is required and cannot be empty'
                                        },*/
                            stringLength: {
                                min: 2, max: 140, message: 'The Address 2 be more than 1 and less than 140 characters long'
                            }
                        }
                    }
                    , rate: {
                        message: 'The Rate is not valid', validators: {
                            notEmpty: {
                                message: 'The Rate is required and cannot be empty'
                            }
                            , stringLength: {
                                min: 1, max: 13, message: 'The Rate is number should be at least 1 digit'
                            }
                            , regexp: {
                                regexp: /^[0-9]+$/i, message: 'The Rate must be a number cannot be character'
                            }
                        }
                    }
                    , cof: {
                        validators: {
                            notEmpty: {
                                message: 'Please Choose Care of Address '
                            }
                        }
                    }
                    , co: {
                        validators: {
                            notEmpty: {
                                message: 'Please Choose Consignee '
                            }
                        }
                    }
                }
            
            }).on('success.form.bv', function(e)
            {
                e.preventDefault();
                
            });


            $("#add_items").submit(function () {

                add_table();
                return false;


            });



            $("#close").click(function () {


                //  location.reload();

                $("#myModal12").hide();

            });


			$("#change_password").submit(function()
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