

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

        <script type="text/javascript" src="js/company_details.js"></script>
        <script type="text/javascript">


            var choices=new Array();
            function load()
            {
                set_menus('<?php echo $_SESSION['list']?>');

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
                    $("#main_company_id1").html(option);})}

            function call_header(cmp_id)
            {
                $("#append_cmp").html("<img src='loader1.gif'>");
                set_company1(cmp_id)



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
                var parse_id =$("#ids_value").val();




                //alert(clin);
                var query = {"company_id": parse_id};

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
            var care_of_id="";
            function edit(ids)
            {
                care_of_id=ids;
                var companyId=$("#ids_value").val();

                var query={"care_of_id":care_of_id,"client_id":$("#ids_value").val()};


                $.get("getCoreof.php",query,function(care)
                {

                    var obj = JSON.parse(care);
                    var data =new Array();
                    for(var i=0; i < obj.LIST.length;i++){
                        data[i]=new Array();
                        data[i][0]=obj.LIST[i].id;
                        data[i][1]=obj.LIST[i].consigneeName;
                        data[i][2]=obj.LIST[i].address1;
                        data[i][3]=obj.LIST[i].address2;
                        data[i][4]=obj.LIST[i].postcode;
                        data[i][5]=obj.LIST[i].city;
                        data[i][6]=obj.LIST[i].cin_no;
                        data[i][7]=obj.LIST[i].tin_no;
                        data[i][8]=obj.LIST[i].contact_name;
                        data[i][9]=obj.LIST[i].contact_no;
                        data[i][10]=obj.LIST[i].stateName;

                        $("#name_coare").val(data[i][1]);
                        $("#adr121").val(data[i][2]);
                        $("#adr1231").val(data[i][3]);
                        $("#add_cin11").val(data[i][6]);
                        $("#add_tin11").val(data[i][7]);
                        $("#pin").val(data[i][4]);
                        $("#city11").val(data[i][5]);
                        $("#state11").val(data[i][10]);
                        $("#contact11").val(data[i][8]);
                        $("#mobil11").val(data[i][9]);




                    }
                });
            }
            function edit1(id_con)
            {
                care_of_id=id_con;
                var companyId=$("#ids_value1").val();

                var query={"care_of_id":care_of_id,"client_id":$("#ids_value").val()};


                $.get("getCoreof.php",query,function(care)
                {

                    var obj = JSON.parse(care);
                    var data =new Array();
                    for(var i=0; i < obj.LIST.length;i++){
                        data[i]=new Array();
                        data[i][0]=obj.LIST[i].id;
                        data[i][1]=obj.LIST[i].consigneeName;
                        data[i][2]=obj.LIST[i].address1;
                        data[i][3]=obj.LIST[i].address2;
                        data[i][4]=obj.LIST[i].postcode;
                        data[i][5]=obj.LIST[i].city;
                        data[i][6]=obj.LIST[i].cin_no;
                        data[i][7]=obj.LIST[i].tin_no;
                        data[i][8]=obj.LIST[i].contact_name;
                        data[i][9]=obj.LIST[i].contact_no;
                        data[i][10]=obj.LIST[i].stateName;

                        $("#name_cong").val(data[i][1]);
                        $("#congs_addr12").val(data[i][2]);
                        $("#congs_addr13").val(data[i][3]);
                        $("#congs_cin").val(data[i][6]);
                        $("#congs_tin").val(data[i][7]);
                        $("#congs_pin").val(data[i][4]);
                        $("#congs_city").val(data[i][5]);
                        $("#congs_state").val(data[i][10]);
                        $("#congs_con").val(data[i][8]);
                        $("#congs_con_no").val(data[i][9]);




                    }
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
                $("#edit_care1").html(optionss);


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
                $("#edit_care").html(optionss);
                var sd=$("#cof").val();
                call_me(sd);


            }


            function call_me(x)
            { $("#cerena_ref").val("");
                $("#c_no").val("");

                var query={"client_id":$("#ids_value").val()};
                $.get("add_cof.php",query,function(kjj) {
                    $("#addr").val("");
                    var obj=JSON.parse(kjj);
                    var data1=new Array();
                    for (var i = 0; i < obj.LIST.length; i++) {


                        data1[i]=new Array();
                        data1[i][0] = obj.LIST[i].NAME;
                        data1[i][1] = obj.LIST[i].address;
                        data1[i][2] = obj.LIST[i].tinNo;
                        data1[i][3] = obj.LIST[i].cinNo;
                        data1[i][4] = obj.LIST[i].id;
                        data1[i][5] = obj.LIST[i].contact_name;
                        data1[i][6] = obj.LIST[i].contact_no;
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

                        //alert(levelOption);
                        if (data1[i][4] == x) {
                            $("#addr").val(data1[i][1]);
                            $("#cerena_ref").val(data1[i][5]);
                            $("#c_no").val(data1[i][6]);
                            $("#main")
                                .data('bootstrapValidator')
                                .updateStatus("cerena_reference", 'NOT_VALIDATED')
                                .validateField("cerena_reference");
                            $("#main")
                                .data('bootstrapValidator')
                                .updateStatus("c_no", 'NOT_VALIDATED')
                                .validateField("c_no");


                        }
                    }


                });

            }
            function con_call(z)
            {



                $("#addr1").val("");
                $("#tin1").val("");
                $("#cin1").val("");
                $("#consignee_name").val("");
                $("#consignee_mob").val("")
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
                    data1[i][5] = objs.LIST[i].contact_name;
                    data1[i][6] = objs.LIST[i].contact_no;



                    if(data1[i][4]==z)
                    {


                        $("#addr1").val(data1[i][1]);
                        $("#tin1").val(data1[i][2]);
                        $("#cin1").val(data1[i][3]);
                        $("#consignee_name").val(data1[i][5]);
                        $("#consignee_mob").val(data1[i][6]);
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("con1", 'NOT_VALIDATED')
                            .validateField("con1");
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("mob1", 'NOT_VALIDATED')
                            .validateField("mob1");

                    }


                }





                var datss={"compid":$("#ids_value").val()};
                var data_address="";
                var data_image="";
                var data_company="";
                $.get("1.php",datss,function(rty)
                {


                    var obj=JSON.parse(rty);
                    var datam=new Array();
                    for(var i=0;i<obj.details.length;i++)
                    {



                        datam[i]=new Array();
                        datam[i][0]=obj.details[i].company_name;
                        datam[i][1]=obj.details[i].chalan_image_url;
                        datam[i][2]=obj.details[i].address;
                        datam[i][3]=obj.details[i].detail;

                        data_company=datam[i][0];
                        data_image=datam[i][1];
                        data_address=datam[i][2];
                        $("#company_address").val(datam[i][2]);
                        $("#company_image_url").val(datam[i][1])
                        $("#company_names").val(datam[i][0])
                        $("#company_details").val(datam[i][3])


                    }




                })



            }




            function  load_careoff(fr)
            {




                var sets="";
                query={"client_id":$("#ids_value").val()};
                $.get("add_cof.php",query,function(kjj)
                {




                    sets=kjj;
                    var  obj=JSON.parse(sets);




                    var   data1=new Array();

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
                    $("#edit_care").html(optionss)

                    //    $('#main').bootstrapValidator('revalidateField', 'cof');

                    $("#cof option").filter(function() {

                        return this.text == fr;
                    }).attr('selected', true);


                    var sd=$("#cof").val();


                    set_careoff_address(sd,sets);

                });



            }




            function  set_careoff_address(sd,ftr)
            {


                var obj=JSON.parse(ftr);
                $("#addr").val("");
                var data2=new Array();
                for(var j = 0; j < obj.LIST.length; j++) {


                    data2[j]=new Array();
                    data2[j][0]=obj.LIST[j].NAME;
                    data2[j][1]=obj.LIST[j].address;
                    data2[j][2]=obj.LIST[j].tinNo;
                    data2[j][3]=obj.LIST[j].cinNo;
                    data2[j][4]=obj.LIST[j].id;
                    data2[j][5]=obj.LIST[j].contact_name;
                    data2[j][6]=obj.LIST[j].contact_no;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

                    //alert(levelOption);
                    if (data2[j][4]==sd) {
                        $("#addr").val(data2[j][1]);
                        $("#cerena_ref").val(data2[j][5]);
                        $("#c_no").val(data2[j][6])

                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("cerena_reference", 'NOT_VALIDATED')
                            .validateField("cerena_reference");
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("c_no", 'NOT_VALIDATED')
                            .validateField("c_no");
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("cof", 'NOT_VALIDATED')
                            .validateField("cof");

                    }

                }




            }
            function  load_careoff1(fr)
            {




                var sets="";
                query={"client_id":$("#ids_value").val()};
                $.get("Add_cong.php",query,function(kh)
                {




                    sets=kh;
                    var  obj=JSON.parse(sets);




                    var   data1=new Array();

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



                    $("#co").html(optionss);
                    $("#edit_care1").html(optionss)

                    //    $('#main').bootstrapValidator('revalidateField', 'cof');

                    $("#co option").filter(function() {

                        return this.text == fr;
                    }).attr('selected', true);


                    var sd=$("#co").val();


                    set_careoff_address1(sd,sets);

                });



            }
            function  set_careoff_address1(sd,ftr)
            {


                var obj=JSON.parse(ftr);
                $("#addr1").val("");
                var data2=new Array();
                for(var j = 0; j < obj.LIST.length; j++) {


                    data2[j]=new Array();
                    data2[j][0]=obj.LIST[j].NAME;
                    data2[j][1]=obj.LIST[j].address;
                    data2[j][2]=obj.LIST[j].tinNo;
                    data2[j][3]=obj.LIST[j].cinNo;
                    data2[j][4]=obj.LIST[j].id;
                    data2[j][5]=obj.LIST[j].contact_name;
                    data2[j][6]=obj.LIST[j].contact_no;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

                    //alert(levelOption);
                    if (data2[j][4]==sd) {
                        $("#addr1").val(data2[j][1]);
                        $("#tin1").val(data2[j][2]);
                        $("#cin1").val(data2[j][3]);
                        $("#consignee_name").val(data2[j][5]);
                        $("#consignee_mob").val(data2[j][6])

                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("consignee_name", 'NOT_VALIDATED')
                            .validateField("consignee_name");
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("consignee_mob", 'NOT_VALIDATED')
                            .validateField("consignee_mob");
                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("co", 'NOT_VALIDATED')
                            .validateField("co");


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
                var client_id=$("#ids_value").val();
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
alert("ttt");
                var from_sku= $.trim($("#from_sku").val());
                var to_sku= $.trim($("#to_sku").val());


                var amount= $.trim($("#rate").val());
				var select_sku= $.trim($("#select_sku").val());
              //  var rates=$("#rate").val();
                //var ks=parseInt(quan);

                if(from_sku!="" && to_sku!="" && amount!="" && select_sku!="")
                {
					alert("ddduuu");


                    indexs=$.inArray(select_sku,addeditems);





                    if(indexs>=0)
                    {
						alert("Dupli");

                        show_modal("Item Code Already Added");


                    }else
                    {


                        $("#tbd").append("<tr><td><input type='hidden' name='from_sku[]' value='"+from_sku+"'>"+from_sku+"</td><td><input type='hidden' name='to_sku[]' value='"+to_sku+"'>"+to_sku+"</td><td><input type='hidden' name='quan1[]' value='"+amount+"'>"+amount+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")
                        
                        
                        $("#select_sku").val("");
                       $("#from_sku").val("");
                        $("#to_sku").val("");
                        $("#rate").val("");

                        //$("#autocomplete").val("");
                       // $("#rate").val("");
                       // $("#uom").html("");
                       // $("#des").val("");
                       // $("#quantity").val("");
                        addeditems.push($("#select_sku").val());
                    }






                }
                else
                {
//                    var ms=$('#add_items input[type="text"]').filter(function () {
//                        return this.value.length == 0
//                    }).attr("id");
//
//
//                    var msd=$('#add_items input[type="text"]').filter(function () {
//                        return this.value.length == 0
//                    }).attr("placeholder");
//
//
//
//                    $("#"+ms+"").focus();
//
//                    show_modal("Enter the value in "+msd+" the Field");
//                    // alert($('#add_item>input[type]').filter('input[value==""]').length);
//


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
            function get_warehouse_shipper(a)
            {

                query1 = {"sales_off": a};
                $.get("get_warehouse.php", query1, function (hd) {


                    var a = hd;
                    //   alert(a+"ware");
                    if(a=='N')
                    {

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
                $("#shipid").html(shippr);



                $("#warehouse_id").html(warehouse);
                validates();
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

                $("#Ship_TIN").val("");
                $("#Ship_CIN").val("");

                var query1 = {"sales_off": $("#ids_value").val()};
                $.get("get_warehouse.php", query1, function (hd) {

                    var obj = JSON.parse(hd);


                    var  shippers = new Array();


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
                        if (its == shippers[i][0]) {
                            $("#Ship_TIN").val(shippers[i][2]);
                            $("#Ship_CIN").val(shippers[i][3]);

                        }
                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);


                    }

                })
            }

            //load care off



            //end here
            function load_consignee(tm)
            {


                $("#cof").bootstrapValidator();
                query={"client_id":$("#ids_value").val()};
                var tr="";
                $.get("Add_cong.php",query,function(kj)
                    {

                        //alert(kj)

                        //alert(a+" load1");
                        ///  setCongAdd(kj);

                        tr=kj;


                        var obj = JSON.parse(tr);
                        objs=obj;

                        var  data1=new Array();

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
                            data1[i][5] = obj.LIST[i].contact_name;
                            data1[i][6] = obj.LIST[i].contact_no;

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
                        $("#edit_care1").html(optionss)
                        $("#co_to").html(optionss);
                        $("#co option").filter(function() {
                            return this.text==tm;
                        }).attr('selected', true);
                        var km=$("#co").val();

                        $("#main")
                            .data('bootstrapValidator')
                            .updateStatus("co", 'NOT_VALIDATED')
                            .validateField("co");
                        con_call(km);
                        con_call_to(km);


                    }
                );
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
                          Create Tax value
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


                    <div class="panel panel-green  margin-bottom-40" style="display:none;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                        </div>
                        <div class="panel-body" style="display:none;">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6" style="display:none;">
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

                    <form role="form" id="main">

                        <div id="append_cmp" >

                        </div>


                        <div style="display: none;" class="col-lg-2" id="cmp_type">
                            <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>
                        <div class="panel panel-green  margin-bottom-40" style="display:none;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                            </div>
                            <div class="panel-body" style="display:none;">
                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6"
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Warehouse:</label>
                                                <select  class="form-control" name="warehouse_id" required="" id="warehouse_id" >

                                                    <!--  <option value="INBOUND">Inbound</option>-->

                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                      





                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Details</h3>
                            </div>
                            <div class="panel-body">

                                

                                <div class="form-group" >
                                    <label for="exampleInputPassword1">UOM</label><br>
                                    <select  class="form-control" name="uom" required="" id="uom" onchange="uom(this.value)" value="per" >
                                        <option value="">Select Percentage</option>
                                        <option value="per">%</option>
										
										





                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Amount</label><br>
                                    <input type="number"  class="form-control" id="amount" min="1" placeholder="amount" name="amount">
                                </div>

                               





                                     <div class="form-group">
                                    <label for="exampleInputPassword1">Tax Name</label>
                                    <input type="text" class="form-control"   required="" title="Rate" id="taxname" placeholder="taxname" name="taxname">
                                </div>
								
								<div class="form-group">
                                    <label for="exampleInputPassword1">Tax Description</label>
                                    <textarea class="form-control" id="description" placeholder="Tax Description" name="description"></textarea>
                                </div>
								
                                
                        </div>
						 </div>


                      
                    </form>
               <center> <br><br><input type="button" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>
                    <!--   <div   class="panel panel-green  margin-bottom-40">

                           <div class="panel-heading">
                               <h3 class="panel-title"><i class="fa fa-tasks"></i>Add item</h3>
                           </div>


                           <form role="form" id="add_items">
                           <div class="panel-body">


                               <div class="form-group" >
                                   <div class="ui-widget">
                                   <label for="exampleInputPassword1">Item Code</label>
                                   <input type="text"  class="form-control"  id="autocomplete" onblur="descriptions()" placeholder="Item Code" name="item_code" required="" title="Item Code">
                               </div></div>

                               <div class="form-group">
                                   <label for="exampleInputPassword1">Description</label>
                                   <input type="text" required=""  class="form-control" id="des"  placeholder="Description" style="pointer-events: none;" title="Add Description From Item Code" name="desc">
                               </div>

                               <div class="form-group">
                                   <label for="quantity">Quantity</label><br>
                                   <input type="number" id="quantity" min="0" class="form-control" required="" data-live-search="rate"  title="Please select a Quantity ...">
                        </div>


                               <div class="form-group">
                                   <label for="exampleInputPassword1">UOM</label><br>
                                   <select id="uom" class="form-control"  data-live-search="false" required="UOM" title="Please select a UOM ...">

                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputPassword1">Rate</label>
                                   <input type="number" class="form-control" step="any" min="0" required="" title="Rate" id="rate" placeholder="Rate" name="rate">
                               </div>
                   <center><input type="submit" data-toggle="modal" data-target="#myModal3"  class="btn btn-default" value="Add Item"></center>


                           </div>

                       </form>

                       </div>-->


                    
                    <!-- /.container-fluid -->

                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->
			 </div>
			 

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
                                        regexp: /^[a-z0-9-_]+$/i,
                                        message: 'The Challan number cannot be special character'
                                    }

                                }
                            },


                            cerena_reference: {
                                message: 'The Reference No is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The Reference  is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 2,
                                        max: 40,
                                        message: 'The Reference  be more than 2 and less than 40 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-z .]+$/i,
                                        message: 'The Reference  cannot be number or special character'
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
                                message: 'The Contact Person is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The Contact Person is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 2,
                                        max: 40,
                                        message: 'The Contact Person be more than 1 and less than 40 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-z .]+$/i,
                                        message: 'The Contact Person  cannot be number or special character'
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
                            amount: {
                                 message: 'The amount is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The amount is required and cannot be empty'
                                    },
                                    
                                     regexp: {
                                        regexp: /^[0-9]+$/i,
                                        message: 'The amount  cannot be  character'
                                    }

                                }
                            },
							
							taxname:{
								message: 'The name is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The name is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 2,
                                        max: 40,
                                        message: 'The name be more than 1 and less than 40 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-z .]+$/i,
                                        message: 'The name  cannot be number or special character'
                                    }

                                }
								
								
								
							},
							
							description:{
								message: 'The name is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The name is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 2,
                                        max: 40,
                                        message: 'The name be more than 1 and less than 40 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-z .]+$/i,
                                        message: 'The name  cannot be number or special character'
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
                            },
                            dates: {
                                message: 'Please Select Date',
                                validators: {
                                    notEmpty: {
                                        message: 'Please Select Date'
                                    }

                                }
                            }








                        }

                    });

                    $("td,.today").click(function()
                    {


                        //alert('');
                        setTimeout(function() {
                            $("#main")
                                .data('bootstrapValidator')
                                .updateStatus('dates', 'NOT_VALIDATED')
                                .validateField('dates');
                        },800);
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

                        //var mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

                        if($("#main").submit()) {


                           
                               // var sales_id = $("#ids_value").val();


                             var tax=$.trim($("#taxname").val().replace(" ",""));


                                var mains_query = {
                                    'taxname':tax,
									'description':$.trim($("#description").val().replace(" ","")),
									
                                    'uom':$("#uom").val(),
                                   
                                    'amount':$("#amount").val()
                                   
                                };
                                
                                console.log(mains_query);
								
								 
							if($("#uom").val()=="" || $("#amount").val()=="" )
									{
										$('#myModal').modal('hide');
                                 show_modal("Please fill details");
										
										
									}
									else{
								
								
								
								
                               $.post("tax_value.php", mains_query, function (ho) {
								   

                                   
                                    $("#mes").html(ho);
                                      if ($.trim(ho) == "Y") 
									{    
								         $("#main")[0].reset();
										 $('#myModal').modal('hide');
										show_modal("Items added successfully");
										return false;
									}
									else{
										 $('#myModal').modal('hide');
										show_modal("failed");
										
									}
                                 //location.reload();
                                });
                               
                          






                      

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
                    $("#edit_mores").submit(function () {



                        $("#cmpid1").val($("#ids_value").val());


                        var prs = $(this).serialize();


                        $.post("updateCofOrConsignee.php", prs, function (dc) {

                            //  $(this)[0].reset();
                            if ($.trim(dc) == "Y") {


                                $('#myModalEdit').modal('hide');
                                show_modal("Data Updated Successfully");

                                var id = $('#ids_value').val();


                                load_careoff($("#name_coare").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                }));
                                $("#edit_mores")[0].reset();
                            }
                            else {


                                show_modal($.trim(dc));
                            }


                        });


                        return false;
                    });
                    $("#edit_congs").submit(function () {



                        $("#cmps_id1").val($("#ids_value").val());


                        var prs1 = $(this).serialize();

                        $.post("updateCofOrConsignee.php", prs1, function (dc) {

                            //  $(this)[0].reset();
                            if ($.trim(dc) == "Y") {


                                $('#myModal1Edit').modal('hide');
                                show_modal("Data Updated Successfully");




                                load_careoff1($("#name_cong").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                }));
                                $("#edit_congs")[0].reset();
                            }
                            else {


                                show_modal($.trim(dc));
                            }


                        });


                        return false;
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


                                load_careoff($("#careOfOrConsigneeName").val().toLowerCase().replace(/^([a-z0-9_'-.])|\s+([a-z0-9_'-.])/g, function(letter) {
                                    return letter.toUpperCase();
                                }));
                                $("#add_mores")[0].reset();



                            }
                            else if($.trim(dc) == "N") {


                                show_modal("Failed To Create Care Off..");
                            }else
                            {
                                show_modal("Failed To Create Care Off");
                            }


                        });



                        return false;
                    });

                    $("#add_congs").submit(function () {


                        $("#cmps_id").val($("#ids_value").val());

                        var prs = $(this).serialize();
                        console.log(prs);
                        $.post("newCondAdd.php", prs, function (dc) {

                            //  $(this)[0].reset();
                            if ($.trim(dc) == "Y") {


                                $('#myModal1').modal('hide');
                                show_modal("Data Added Successfully");


                                load_consignee($("#name1").val().toLowerCase().replace(/^([a-z0-9_'-.])|\s+([a-z0-9_'-.])/g, function(letter) {
                                    return letter.toUpperCase()}));
                                $("#add_congs")[0].reset();



                            }
                            else if($.trim(dc) == "N") {


                                show_modal("Failed To Create Consignee..");
                            }else
                            {
                                show_modal("Failed To Create Consignee");
                            }


                        });
                        return false;


                    });
                });

                ///
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
                    get_warehouse_shipper(ii)
                    get_material();

                    load1(ii);

                }
                function call_by_sales(dd)
                {
                    alert("sss");
                    $('#company_typeids').val("").attr("selected", "selected");
                    $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
                    $('#cmp_type>div>select').change();


                    get_warehouse_shipper(dd)
                    get_material();

                    load1(dd)
                    validates();

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
                function selectsku()
                {
                    alert(values);
                    var a=$("#select_sku").val();
                    var values=a.split("-");
                    $("#from_sku").val(values[0]);
                    $("#to_sku").val(values[1]);
//alert(values[1]);
                }


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