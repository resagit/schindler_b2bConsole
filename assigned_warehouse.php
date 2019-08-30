

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
        $.post("companyListForReport.php","",function(ty)
        {

            var option="<option value=''>Select Client</option>";
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
        $.get("companylist.php","",function(hd)
        {



            var a=hd;

            setData(a);

        });


    }
    function call_by_company(qq){

        $("#tbd").html("");

        $('#typeid').val("").attr("selected", "selected");
        $('#cmp_type>div>select').val("Company").attr("selected", "selected");
        $('#cmp_type>div>select').change();
        get_warehouse();
        $("#ids_value").val(qq);
        //get_warehouse_shipper1(qq);
    }
    function call_by_sales(aa){
        $("#tbd").html("");
        $('#company_typeids').val("").attr("selected", "selected");
        $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
        $('#cmp_type>div>select').change();
        get_warehouse();
        //get_warehouse_shipper1(aa);
    }
    function call_header(cmp_id)
    {
        $("#tbd").html("");
     //   alert(cmp_id);

        $("#append_cmp").html("<img src='loader1.gif'>");
        set_company111(cmp_id)



        //get_to_company(cmp_id)

    }
    function set_company111(x)
    {
        //$("#append_cmp").html("<img src='loader1.gif'>");
        $("#append_cmp").html("");

        $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Client Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>Client Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");

        var query={"id":x};
        $.get("getSaleOfficeList.php",query,function(user_ret)
        {


            var obj=JSON.parse(user_ret);
            var option="";
            var data_append=new Array();
            if(obj.COMPANY.length>0)
            {

                $("#cmp_type>div>select").append("<option value='Company'>Client</option><option value='Sales Office'>Sales Office</option>");
                $("#show_contain").show();
                $("#ors").show();
                $("#company_panel").show();

                $("#main_company_container").removeClass("col-lg-3")
                $("#main_company_container").addClass("col-lg-12");
                var options="<option value=''>Select Client</option>";
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

         //   alert("ahsdj");

            set_item()

        }
    }
    function set_items_company()
    {

       /// alert("1");
        $("#ids_value").val($("#company_typeids").val());





    }
    function set_item()
    {

      //  alert("11");

        $("#ids_value").val($("#typeid").val());




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
            $("#Ship_TIN").val(datak[0][2]);
            $("#Ship_CIN").val(datak[0][3]);
            $("#main_company_id").html(levelOptions);
            var ids = $("#sales_off").val();

            get_sale_office();

            get_material();
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

        get_sale_office();
        get_material();


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

        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {

            setState(xs);



        });


    }

    function setState(ams)
    {

        $("#city1").val("");
        $("#state1").val("");
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
            document.getElementById('city1').value=data11[0][0];
            document.getElementById('state1').value=data11[0][1];
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


function get_warehouse()
{
   // alert("shcd");
    var comp_id =$('#main_company_id1').val();
    var sales_id =$('#typeid').val();
        if(sales_id==null)
        {
            sales_id =$('#company_typeids').val();
        }

  // alert(comp_id+" "+sales_id);
    paramss={"comp_id":comp_id,"sales_id":sales_id};
    $.get("getWareHouseAccordingSalesOffice.php",paramss,function(xs)
    {
//alert(xs);
       // setState1(xs);
$('#tbd').html("");

      if(xs!='N')
      {
        var obj = JSON.parse(xs);


        ware= new Array();


        var levelOption = "";
        var out = new Array();

        for (var i = 0; i < obj.LIST.length; i++) {

            ware[i] = new Array();
            ware[i][0] = obj.LIST[i].warehouseId;
            ware[i][1] = obj.LIST[i].wareHouseName;

            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            // alert(datak[i][2]);
            //alert(data[i][1]);

            //alert(levelOption);
$('#tbd').append("<tr align='center'><td >"+ ware[i][1]+"</td></tr>");

        }
      }else{
          $('#tbd').append("<tr align='center'><td >No Warehouse Assigned</td></tr>");
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
                ASSIGNED
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
                                    <label for="exampleInputEmail1q">Client Name:</label>
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




    <form role="form" id="main">

    <div class="panel panel-green  margin-bottom-40" style="display:none">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1q">Client Name:</label>
                            <select  class="form-control" name="main_company_id" required="" id="main_company_id" onchange="shipper_change(this.value)" >

                                <option value="-1">Select</option>

                            </select>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1q">Sales Office:</label>
                            <select  class="form-control" name="sales_off" required="" id="sales_off" onchange="onchange_sale();" >

                                <!--  <option value="INBOUND">Inbound</option>-->

                            </select>
                        </div>
                    </div>

                   <div class="col-lg-4">
                       <br>

                        <div class="form-group">
                            <center>
                          <button id="get_warehousse" class="btn btn-primary" onclick="get_warehouse();">SUBMIT </button></center>
                        </div>

                    </div>
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





        <div class="panel panel-green  margin-bottom-40">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
            </div>
            <div class="panel-body">


                <table class="table table-striped">
                    <table class="table table-striped ta">
                        <thead>
                        <tr>

                            <th style="text-align: center" >Warehouse</th>
                        </tr>
                        </thead>
                        <tbody id="tbd">

                        </tbody>
                    </table>


            </div></div>













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
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                challan_no: {
                    message: 'The Challan No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Challan no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 1,
                            max: 40,
                            message: 'The Challan no be more than 5 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z0-9-]+$/i,
                            message: 'The Challan number cannot be special character'
                        }

                    }
                },


                cerena_reference: {
                    message: 'The Cerena Reference No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Cerena Reference  is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Cerena Reference  be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[ a-z ]+$/i,
                            message: 'The Cerena Reference  cannot be number only character'
                        }

                    }
                },
                c_no: {
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
                con1: {
                    message: 'The Contact Person No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Contact Person no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Contact Person no be more than 40 and less than 2 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z ]+$/i,
                            message: 'The Contact Person  cannot be number only character'
                        }

                    }
                },
                mob1: {
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
                item_code: {
                    message: 'The Item code is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Item Code is required and cannot be empty'
                        }
                    }

                },

                desc: {
                    message: 'The Description is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Description is required and cannot be empty'
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

        $("#mains").click(function () {

            var mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

            $("#main").submit();

            ///var mq=$('#main i').filter(function () {
            // return this
            //}).attr("class");
            var dds = $("#main").find("i").hasClass("form-control-feedback glyphicon-remove glyphicon");

            mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

            var instruction=$("#specials").val();

            if(instruction!="")
            {
                instruction=$("#specials").val();
            }
            else
            {
                instruction="--";


            }












            if (mq == false && dds == false) {

                if ($("#tbd>tr").length > 0) {


                    var itmess = $("input[name='item1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();


                    var des = $("input[name='des1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var uom1 = $("input[name='uom1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var rate1 = $("input[name='rate1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();
                    var quan1 = $("input[name='quan1[]']")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    var dt = $("#dates").val();
                    var main_date = $("#dtp_input2").val();
                    var md = $("#typeid").val();
                    //$("#cof").val()+""+$("#co").val()+""+$("#challan_no").val()
                    //""+main_date+""+$("#cerena_ref").val()+""+$("#c_no").val()+""+$("#consignee_name").val()+""+$("#consignee_mob").val()+""+$("#challan").val();


                    /*      var main_query = {
                     'sales_off': $("#sales_off").val(),
                     'shipper_id': $("#typeid").val(),
                     'coID': $("#cof").val(),
                     'consigneeID': $("#co").val(),
                     'chalanNO': $.trim($("#challan_no").val()),
                     'chalanDate': main_date,
                     'shipperRefName': $("#cerena_ref").val(),
                     'shipperRefMobileNo': $("#c_no").val(),
                     'consigneeRefName': $("#consignee_name").val(),
                     'consigneeRefMobileNo': $("#consignee_mob").val(),
                     'Challan_Type': $("#challan").val(),
                     'warehouse_id':$("#warehouse_id").val(),
                     'instruction': instruction,
                     'materialItemID': itmess.join("*"),
                     'quantity': quan1.join("*"),
                     'uom': uom1.join("*"),
                     'perUnitPrice': rate1.join("*")

                     };
                     */


                    var main_query = {
                        'sales_off': $("#sales_off").val(),
                        'shipper_id': $("#typeid").val(),
                        'companyId': $("#main_company_id").val(),
                        'coID': $("#cof").val(),
                        'consigneeID': $("#co").val(),
                        'chalanNO': $.trim($("#challan_no").val().replace(" ","")),
                        'chalanDate': main_date,
                        'shipperRefName': $("#cerena_ref").val(),
                        'shipperRefMobileNo': $.trim( $("#c_no").val()),
                        'consigneeRefName': $.trim($("#consignee_name").val()),
                        'consigneeRefMobileNo': $.trim($("#consignee_mob").val()),
                        'Challan_Type': $("#challan").val(),
                        'warehouse_id':$("#warehouse_id").val(),
                        'instruction': instruction,
                        'materialItemID': itmess.join("*"),
                        'quantity': quan1.join("*"),
                        'uom': uom1.join("*"),
                        'perUnitPrice': rate1.join("*"),
                        'des':des.join("*"),
                        'company_name':$("#main_company_id option:selected").text(),
                        'shipper_care_of':$("#cof option:selected").text(),
                        'shipper_cin':$("#Ship_CIN").val(),
                        'shipper_tin':$("#Ship_TIN").val(),
                        'shipper_add':$("#addr").val(),
                        'consignee_name':$("#co option:selected").text(),
                        'consignee_cin':$("#cin1").val(),
                        'consignee_tin':$("#tin1").val(),
                        'consignee_addr':$("#addr1").val()



                    };

                    console.log(main_query);
                    /*  alert(it+" "+desc+" "+unit+" "+rat+" "+quantity);
                     var   ar= it.join("*");
                     var qa= quantity.join("*");
                     var ra= rat.join("*");
                     var ua= unit.join("*");
                     var de=desc.join("*");
                     alert(ar+" item "+q                                                           a+" quan"+ra+" rate"+ua+" unit"+de);*/

                    $("#myModal12").fadeIn();
                    $("#mes").html("<center><img src='loader1.gif'></center>");
//md={"kk":$("#typeid").val(),"ks":"sd"};
                    $.post("order_in.php", main_query, function (ho) {

//alert(ho)
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

                        $("#mes").html(ho);


                    });

                }
                else {


                    show_modal("Add value in Table Fields");
                }

            }
            else {


                var msk =$('#main input[type="text"]').filter(function () {
                    return this.value.length == 0
                }).attr("id");


                var msdd = $('#main input[type="text"],input[type="number"]').filter(function () {
                    return this.value.length == 0
                }).attr("placeholder");

                var masdd = $('#main input[type="text"],input[type="number"]').filter(function () {
                    return this.value.length == 0
                }).attr("title");

                if(msk!=undefined) {


                    show_modal("Data Invalid in " + msdd + " fields");
                    $("#" + msk + "").focus();
                }else
                {

                    show_modal("Data Invalid in Check in the fields");
                    //$("#" + msk + "").focus();


                }



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