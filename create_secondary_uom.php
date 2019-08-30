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
            var material_id=new Array();
            function load()
            {
                //alert("DFDsf");

                set_menus('<?php echo $_SESSION['list']?>');

                $.post("companyListForReport.php","",function(ty)
                {
                    //alert(ty);
                    var a=ty;

                    var option="<option value=''>Select Client</option>";
                    var obj=JSON.parse(ty);
                    var data_aaray=new Array();
                    for(var i=0;i<obj.LIST.length;i++)
                    {data_aaray[i]=new  Array();
                        data_aaray[i][0]=obj.LIST[i].clientID;
                        data_aaray[i][1]=obj.LIST[i].company_name;
                        option+="<option value='"+data_aaray[i][0]+"'>"+data_aaray[i][1]+"</option>";
                        $("#material").val(data_aaray[i][0]);
                        $("#main_company_id1").val(data_aaray[i][0]);
                    }
                    $("#main_company_id1").html(option);

                    setData(a);
                    //get_material();

                })
//uom_detail();
            }
            function call_header(cmp_id)
            {
              //  alert(cmp_id);
                $("#append_cmp").html("");
                // set_company1(cmp_id)
                get_material(cmp_id);
//uom_detail();

            }



            function getdatas()
            {



                return choices;



            }

            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {
//alert(arr+"ggggggg");

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

                    //get_sale_office();

                    get_material();
                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);




                }

            }

            var mats="";
            var measure_ids="";
            function get_material()
            {

                choices=[];

                var parse_id =$("#main_company_id1").val();

                var query = {"company_id": parse_id};

                $.post("get_material_list.php", query, function (iks) {
                   // alert(iks+"get_material");
                    mats=iks;

                    var objd = JSON.parse(iks);
                    var out = "";
                    //  alert(iks+"i");
                    var datass = new Array();
                    out = new Array();
                    var m_client_id="";

                    for (var i = 0; i < objd.ITEM.length; i++) {

                        datass[i] = new Array();

                        datass[i][0] = objd.ITEM[i].item;
                        datass[i][1] = objd.ITEM[i].name;
                        datass[i][2] = objd.ITEM[i].unitOfMeasurement;
                        datass[i][3]=objd.ITEM[i].id;
                        datass[i][4]=objd.ITEM[i].baseUom;
                        //alert(data[i][0]+" data");
                        //     out[i]=obj.ITEM[i].item;
                        choices.push(datass[i][0].toUpperCase());
//$("#client_materialid").val( datass[i][3]);
                        //material_id.push(datass[i][3]);

                        if($("#autocomplete").val()== datass[i][0])
                        {
                            //alert("aaa");
                           // alert( datass[i][0]+"autoo");
                            //m_client_id=  datass[i][3];
                        }



                        //material_id=  datass[i][3];
                    }
                   // alert(m_client_id);
				   //alert(m_client_id+"client_mat_id");
                   // $("#client_materialid").val(m_client_id);
                    // alert(choices);
                  //  alert(material_id+"client_material");

                });
                //add_table();

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


                var levelOptions1="";
                var optionss="";
                var levelOption1="";
                var out=new Array();

                query={"client_id":$("#ids_value").val()};
                var tr="";
                $.get("Add_cong.php",query,function(kj) {

                    var obj = JSON.parse(kj);
                    var data1=new Array();

                    for (var i = 0; i < obj.LIST.length; i++) {

                        data1[i] = new Array();
                        data1[i][0] = obj.LIST[i].NAME;
                        data1[i][1] = obj.LIST[i].address;
                        data1[i][2] = obj.LIST[i].tinNo;
                        data1[i][3] = obj.LIST[i].cinNo;
                        data1[i][4] = obj.LIST[i].id;
                        data1[i][5] = obj.LIST[i].contact_name;
                        data1[i][6] = obj.LIST[i].contact_no;


                        if (data1[i][4] == z) {


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

                });



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

            var uomss="";
            var measure_id="";
var uoms_level="";
            function descriptions()
            {
              //  alert(mats+"dess");
                var cid1 = $.trim($("#autocomplete").val());

                var cid =cid1.toUpperCase();
                //var client_id=$("#ids_value").val();
               // var client_id=$("#main_company_id1").val();
                $("#des").val("");
                $("#uom").html("");
                $("#quantity").html("");
                $("#rate").val("");
              //  var quers = {"company_id": client_id};
//                $.get("get_material_list.php",quers,function(fd)
//                {
                   // measure_ids=fd;

//alert(fd+"uommsss");



                    var objss = JSON.parse(mats);


                   var  uom1=new Array();

                    var levelOptions1="";
                    var clid="";
                    var levelOption1="";
                    var out=new Array();

                    for(var i = 0; i < objss.ITEM.length; i++) {

                        uom1[i]=new Array();

                        uom1[i][0]=objss.ITEM[i].unitOfMeasurement;
                        uom1[i][1]=objss.ITEM[i].name;
                        uom1[i][2]=objss.ITEM[i].item;
                        uom1[i][3]=objss.ITEM[i]. baseUom;
						uom1[i][4]=objss.ITEM[i].id;

                        uomss=uom1[i][0];
                        measure_id= uom1[i][3];
                        //uom1[i][3]=obj.UOM[i].client_material_id;
                        /*data1[i][2]=obj.UOM[i].tinNo;
                         data1[i][3]=obj.UOM[i].cinNo;
                         data1[i][4]=obj.UOM[i].id;*/
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;


                        if($("#autocomplete").val()== uom1[i][2])
                        {
                            document.getElementById("des").value=uom1[i][1];
                            levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+uom1[i][3]+">" +uom1[i][0]+ "</option>";
                            document.getElementById("uom").innerHTML =levelOptions1 ;
                            uoms_level=uom1[i][0];
							$("#client_materialid").val( uom1[i][4]);
                        }

                        //$("#client_materialid").val( uom1[i][3]);

//alert(levelOptions1);



                    }

//alert(uoms_level+"uom");

//alert(levelOptions1+"level");



                    //document.getElementById("des").value=uom1[0][1];
                   // document.getElementById("uom").innerHTML =levelOptions1 ;
                    //document.getElementById("client_materialid").value=uom1[i][3];





                    /*contextAdd  document.getElementById('cong_CIN').value =data[0][2];*/
                    /*document.getElementById('cong_TIN').value =data1[0][2];
                     document.getElementById('cong_CIN').value =data1[0][3];
                     document.getElementById('contextAdd').value =data1[0][1];*/





                    uom_detail();


               // });


//get_material();




            }


            function uom_detail()
            {
var uom_d="";
               // alert(uoms_level+"uom_valuer");
                //alert(mats+"uomdetaosls");
//                var obj1=JSON.parse(mats);
//
//                var data2=new Array();
//                for(var i = 0; i < obj1.ITEM.length; i++) {
//
//                    data2[i] = new Array();
//
//                    data2[i][0] = obj1.ITEM[i].unitOfMeasurement;
//                    data2[i][1] = obj1.ITEM[i].name;
//                    data2[i][2] = obj1.ITEM[i].item;
//                    data2[i][3] = obj1.ITEM[i].baseUom;
//                    uom_d= data2[i][0];
//                }

//alert(uom_d+"baseuom");





                    $.get("get_active_uom_data.php",$(this).serialize(),function (ho){
                 //alert(ho+"uom_detauiks");
                    var objs = JSON.parse(ho);
                    var levelOptions2="";
                  var uomd=new Array();
//alert(uom_d);

                    for(var i = 0; i < objs.LIST.length; i++) {

                        uomd[i]=new Array();

                        uomd[i][0]=objs.LIST[i].measurementID;
                        uomd[i][1]=objs.LIST[i].unitOfMeasurement;
if(uomd[i][1] != uoms_level) {


    levelOptions2 = levelOptions2 + "<option id=" + i + " value = " + uomd[i][0] + ">" + uomd[i][1] + "</option>";
}
                        //$("#client_materialid").val( uom1[i][3]);





                    }
                    document.getElementById("uom_details").innerHTML =levelOptions2 ;
//alert(levelOptions2);
                });

            }
            var sum=0;

            addeditems=[];
            var indexs;
            function add_table()
            {
                //alert(mat);
                var obj1 = JSON.parse(mat);
                var out = "";
                // var uomss="";
                //  alert(iks+"i");
                var datass1 = new Array();
                out = new Array();


                for (var i = 0; i < obj1.LIST.length; i++) {

                    datass1[i] = new Array();

                    datass1[i][0] = obj1.LIST[i].item_code;
                    datass1[i][1] = obj1.LIST[i].material_name;
                    datass1[i][2] = obj1.LIST[i].unitOfMeasurement;
                    datass1[i][3]=obj1.LIST[i].client_material_id;

                    // uomss=   datass1[i][2];
                    if($("#autocomplete").val()== datass1[i][0]){
                       // alert(datass1[i][3])
                        var m_client_id=datass1[i][3];
                    }
                }
                $("#price").removeAttr('value');
                var items= $.trim($("#autocomplete").val());
                //var clid=material_id;
                var clid=m_client_id;
                var uoms=$("#uom").val();
                var des=$("#des").val();
                var quan=$("#quantity").val();
                var rates=$("#rate").val();
                var ks=parseInt(quan);
                var multi="";
                //var price=$("#price").val();
               // alert(uoms+"uoms");
               // alert(clid+"add_clid");
                //var single_prices=0;

                multi= quan*rates;
                sum=sum+multi;
                $("#multipllication").val(multi);
                //alert(sum);
                ///single_prices=sum;
                // prices+=sum;
//alert(prices);

                $("#price").val(sum);

                if(clid!=""&& items!="" && uoms!="" && des!="" && ks>0  && rates!="")
                {

                    indexs=$.inArray(items,addeditems);





                    if(indexs>=0)
                    {

                        show_modal("Item Code Already Added");


                    }else
                    {


                        $("#tbd").append("<tr><td  style='display:none;'><input type='hidden'  name='clid1[]' value='"+clid+"'></td><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uomss+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+" </td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")


                        $("#autocomplete").val("");
                        $("#rate").val("");
                        $("#uom").html("");
                        $("#des").val("");
                        $("#quantity").val("");
                        addeditems.push(items);
                    }





                }
//        else
//        {
//            var ms=$('#add_items input[type="text"]').filter(function () {
//                return this.value.length == 0
//            }).attr("id");
//
//
//            var msd=$('#add_items input[type="text"]').filter(function () {
//                return this.value.length == 0
//            }).attr("placeholder");
//
//
//
//            $("#"+ms+"").focus();
//
//            show_modal("Enter the value in "+msd+" the Field");
//           // alert($('#add_item>input[type]').filter('input[value==""]').length);
//
//
//
//            //document.getElementById(ms).required = true;
//
//
//
//        }



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

            var sub=0;
            var ans="";

            function delete_row(row)
            {
               // alert(sum)

                var prices=$("#price").val();
                var quan=$("#quantity").val();
                var rates=$("#rate").val();

                var i=row.parentNode.parentNode.rowIndex;
                //alert(i+" "+index+" "+row);
                var n=i-1;
               // alert(n);
                //var qq= $(i).parent().parent().find("td:eq(2)").find("input[name='quan1[]']").html();
                var qq=$(row).parent().parent().find("input[name='quan1[]']").val();
                var rr=$(row).parent().parent().find("input[name='rate1[]']").val();
                //alert(qq+"row");
                //alert(rr+"rate");
                //ans=qq*rr;
                //sum= prices-ans;
                //alert(sub+"Subtractt");

//    alert( "Index: " +   $("input[type='hidden']").index( $("input[name='quan1[]']") ) );
//    alert( "Index: " +   $("input[type='hidden']").index( $("input[name='rate1[]']") ) );
                //var rr=row.parent.parent.
                document.getElementById('tbd').deleteRow(n);
                //var tdid = $(this).parents('tr').find('#td_id').text();
                addeditems.splice(n,1);
                //indexs--;



                $("#price").val(sum);


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
                    <p id="mes1"></p>
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
                    <div class="col-lg-12"> <br>
                        <h1 class="page-header">
                            Create Secondary Uom For Material
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

                        <div id="append_cmp" >

                        </div>

                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="hidden" id="material" value="">
                                                <label for="exampleInputEmail1q">Client Name:</label>
                                                <select  class="form-control" name="main_company_id1" required="" id="main_company_id1" onchange="call_header(this.value);" >
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="col-lg-6"></div>
                                    </div></div>
                            </div>
                        </div>



                        <div style="display: none;" class="col-lg-2" id="cmp_type">
                            <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>
                        <div class="panel panel-green  margin-bottom-40" style="display: none;" >
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

                                                    <!--  <option value="INBOUND">Inbound</option>-->

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Challan no.</label>
                                                <input type="text" class="form-control"  style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
                                            </div>

                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">


                                                <div class="control-group">
                                                    <label class="control-label">Date </label>
                                                    <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                        <input required="" title="Date" size="26" type="text" id="dates" name="dates"  placeholder="Date"  readonly>

                                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input2" required="" /><br/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>





                        <div class="panel panel-green  margin-bottom-40" style="display: none;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Shipper Details</h3>
                            </div>
                            <div class="panel-body">


                                <div class="form-group" id="shiper_select">
                                    <label for="exampleInputPassword1">Shipper</label><br>
                                    <select id="shipid"  class="form-control" data-live-search="true" onchange="cin_change(this.value);"   name="shipper" style="width: 300px" required="">

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text" readonly class="form-control" id="Ship_CIN"  placeholder="CIN" name="cin">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">TIN</label>
                                    <input type="text" readonly class="form-control" id="Ship_TIN" placeholder="TIN" name="tin">
                                </div>



                                <div class="form-group" id="cos">
                                    <label for="exampleInputPassword1">C/O</label><br>
                                    <select onchange="call_me(this.value)" id="cof" class="form-control"  data-live-search="true"  name="cof" >
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <textarea  class="form-control" id="addr" placeholder="Address"  readonly name="address"></textarea>
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Reference name</label>
                                    <input type="text" class="form-control" id="cerena_ref" required="" title=" Reference name" placeholder="Ref. Name" name="cerena_reference">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact No</label>
                                    <input type="text" class="form-control" maxlength="13"  title="Contact Number" id="c_no" placeholder="Ref. No" name="c_no">
                                </div>
                                <center><button class="btn btn-default"   data-toggle="modal" data-target="#myModalEdit"   onclick=" return false">Edit</button><button class="btn btn-default"   data-toggle="modal" data-target="#myModal"   onclick="return false">Add new</button></center></span>




                            </div>
                        </div>


                        <div class="panel panel-green margin-bottom-40" style="display: none;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Consignee Details</h3>
                            </div>
                            <div class="panel-body">

                                <input type="hidden" id="company_names">
                                <input type="hidden" id="company_image_url">
                                <input type="hidden" id="company_address">
                                <input type="hidden" id="company_details">


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Consignee</label><br>
                                    <select id="co" onchange="con_call(this.value)" required=""  class="form-control"  data-live-search="true"  name="co" >
                                    </select>

                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text" readonly class="form-control" id="cin1" placeholder="CIN" name="cin1">
                                </div>


                                <div class="form-group">
                                    <label  for="exampleInputPassword1">TIN</label>
                                    <input readonly type="text" value="" class="form-control" id="tin1" placeholder="CIN" name="tin1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <textarea  class="form-control" id="addr1" placeholder="Address" readonly name="Address1"></textarea>
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Person</label>
                                    <input type="text" class="form-control" id="consignee_name" required="" title="Name" placeholder="Consignee Ref. Name" name="con1">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact No</label>
                                    <input type="text" required="" maxlength="13"  title="Mobile no" class="form-control" id="consignee_mob" placeholder="Consignee Ref. No" name="mob1">
                                </div>
                                <center><button class="btn btn-default"   data-toggle="modal" data-target="#myModal1Edit"   onclick=" return false">Edit</button><button class="btn btn-default" onclick="return false" data-toggle="modal" data-target="#myModal1">Add new</button></center></span>




                            </div></div>


                    </form>
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


                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Details</h3>
                        </div>
                        <div class="panel-body">



                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>From Quantity</th>
                                    <th>From UOM</th>
                                    <th>To Quantity</th>
                                    <th>To UOM</th>

                                </tr>
                                </thead>
                                <tbody id="tbd">

                                </tbody>
                            </table>

                            <div style="margin-left: -20px" class=""><div class="row">        <input type="hidden" id="client_materialid" value="">     <form role="form" id="add_items">

                                        <div class="panel-body">
                                         <div class="col-lg-12">
                                            <div class="col-lg-2">
                                                <div class="form-group " >
                                                    <div class="ui-widget">

                                                        <input type="text"  class="form-control"  id="autocomplete" onblur="descriptions();" placeholder="Item Code" name="item_code" required="" title="Item Code">
                                                    </div></div>
                                                <div id="stock" style="font-weight: bold;color:red;"></div></div>
                                            <div class="col-lg-2"> <div class="form-group">

                                                    <input type="text" required=""  class="form-control" id="des"  placeholder="Description" style="pointer-events: none;" title="Add Description From Item Code" name="desc">
                                                </div></div>
                                             <div class="col-lg-2"> <div class="form-group">

                                                     <input type="text" required=""  class="form-control" id="from_qty"  placeholder="" style="pointer-events: none;"  name="from_qty" value="1" disabled>
                                                 </div></div>


                                            <div class="col-lg-2" style="">    <div class="form-group">

                                                    <select id="uom_details" style="" class="form-control"  data-live-search="false" required=""  >
                                                        <option value=""> Select</option>

                                                    </select>
                                                </div></div>




                                                    <div class="col-lg-2">  <div class="form-group">

                                                            <input type="number" style="" id="quantity"  name="quantity" class="form-control" placeholder="QTY" required="" data-live-search="rate"  title="Please select a Quantity ...">

                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>

                                            <div class="col-lg-2" style="">    <div class="form-group">

                                                    <select id="uom" style="" class="form-control" data-live-search="false"   required="" >

                                                    </select>

                                                </div>
                                            </div>

                                         </div>

                                        </div>

                                    </form></div>
                            </div>




                               <center> <br><br><input type="button" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>

















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
            <div class="modal fade" id="myModalEdit" style="overflow: auto" data-backdrop="static" >
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content"> <form id="edit_mores"   role="form">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> Edit</h4>
                            </div>
                            <div class="modal-body">


                                <input type="hidden" name="companyId" id="cmpid1">

                                <div class="form-group" id="cos1">
                                    <label for="exampleInputPassword1">CareOf</label><br>
                                    <select onchange="edit(this.value)" id="edit_care" class="form-control"  data-live-search="true" title="Please select a lunch ..." name="edit_consignee_id" >
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text"  title="Name Only Characters Are Allowd" id="name_coare" required="" class="form-control"  placeholder="Name" name="name_coare">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address 1</label>
                                    <input type="text"  class="form-control"  required="" id="adr121"   placeholder="Address" name="address1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address 2</label>
                                    <input type="text"  class="form-control" required="" id="adr1231" placeholder="Address" name="address2">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text"  class="form-control" style="text-transform: uppercase" required="" id="add_cin11" placeholder="CIN" name="CIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TIN</label>
                                    <input type="text"   class="form-control" style="text-transform: uppercase" required="" id="add_tin11" placeholder="TIN" name="TIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PinCode</label>
                                    <input type="number" onblur="get_pincode(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits"  class="form-control" required="" id="pin" placeholder="Pincode" name="pincode">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <input type="text"  class="form-control" required="" id="city11"  placeholder="City" name="cityName">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">State</label>
                                    <input type="text"  class="form-control" required="" id="state11" readonly placeholder="State" name="stateName">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact name</label>
                                    <input type="text"  pattern="[a-zA-Z ' ]+"  class="form-control" required="" id="contact11" placeholder="Contact Name" name="contactname" title="Only Characters are required">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile no</label>
                                    <input type="text"  class="form-control" maxlength="13" min="10" pattern="[0-9]{10}" required="" id="mobil11" placeholder="Mobile No" name="contactno" title="Only Numbers are required and Must be 10 Digits">
                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" >Update</button>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="myModal1Edit" style="overflow: auto" data-backdrop="static" role="dialog">
                <div class="modal-dialog">
                    <form id="edit_congs"  role="form">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Consignee Details </h4>
                            </div>
                            <div class="modal-body">


                                <input type="hidden" id="cmps_id1" value="" name="companyId">

                                <div class="form-group" id="consignee">
                                    <label for="exampleInputPassword1">Consignee</label><br>
                                    <select onchange="edit1(this.value)" id="edit_care1" class="form-control"  data-live-search="true" title="Please select a lunch ..." name="edit_consignee_id" >
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" class="form-control"  title="Name Only Characters Are Allowed" id="name_cong" required="" placeholder="Name" name="name_coare">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address 1</label>
                                    <input type="text"  class="form-control" id="congs_addr12" required="" placeholder="Address" name="address1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address 2</label>
                                    <input type="text"  class="form-control" id="congs_addr13" required="" placeholder="Address" name="address2">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text"  class="form-control" style="text-transform: uppercase" required="" id="congs_cin" placeholder="CIN" name="CIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TIN</label>
                                    <input type="text"   class="form-control" style="text-transform: uppercase" required="" id="congs_tin" placeholder="TIN" name="TIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PinCode</label>
                                    <input type="number"  class="form-control" onblur="lookup(this.value)" id="congs_pin" maxlength="6" title="Only Numbers Are Required Must be 6 Digits"   required="" placeholder="Pincode" name="pincode">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <input type="text"  class="form-control" id="congs_city" required="" placeholder="City"  name="cityName">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">State</label>
                                    <input type="text"  class="form-control" readonly id="congs_state" required="" placeholder="State" name="stateName">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Name</label>
                                    <input type="text"  class="form-control" id="congs_con" pattern="[a-zA-Z ' ]+" required="" placeholder="Contact Name" name="contactname">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile no</label>
                                    <input type="text"  class="form-control" id="congs_con_no" pattern="[0-9]{10}" title="Only Numbers are required Atleast 10 Digits" maxlength="13" min="10" required="" placeholder="Mobile No" name="contactno">
                                </div>




                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-default">Update</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                    <input type="text" pattern="[a-zA-Z-0-9 ]{1,80}$"  title="Only Characters Are Allowed" required="" class="form-control" id="careOfOrConsigneeName"  placeholder="Name" name="careOfOrConsigneeName">
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
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text"  class="form-control" style="text-transform: uppercase" required="" id="add_cin" placeholder="CIN" name="CIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TIN</label>
                                    <input type="text"   class="form-control" style="text-transform: uppercase" required="" id="add_tin" placeholder="TIN" name="TIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PinCode</label>
                                    <input type="text" onblur="get_pincode(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits"  class="form-control" required="" pattern="[0-9]{6}" id="" placeholder="Pincode" name="pincode">
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
                                    <input type="text" class="form-control" pattern="^[a-zA-Z-_\/. ]{1,80}$" title="Name Only Characters Are Allowed"  required="" id="name1" placeholder="Name" name="name1">
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
                                    <label for="exampleInputPassword1">CIN</label>
                                    <input type="text"  class="form-control" style="text-transform: uppercase" required="" id="cong_cin" placeholder="CIN" name="CIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TIN</label>
                                    <input type="text"   class="form-control" style="text-transform: uppercase" required="" id="cong_tin" placeholder="TIN" name="TIN">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PinCode</label>
                                    <input type="text"  class="form-control" onblur="lookup(this.value)"  maxlength="6" title="Only Numbers Are Required Must be 6 Digits" pattern="[0-9]{6}"  required="" placeholder="Pincode" name="pincode">
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



                    //$("#challan_no").focus();

                    $('#main').bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {

                            item_code: {
                                message: 'The  code is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The Code is required and cannot be empty'
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
                            quantity: {
                                message: 'The price is not valid',

                                validators: {
                                    notEmpty: {
                                        message: 'The price is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 1,
                                        max: 13,
                                        message: 'The price is number should be at least 1 digit'
                                    },
                                    regexp: {
                                        regexp: /^[0-9]+$/i,
                                        message: 'The price must be a number cannot be character'
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
                        minChars: 0,
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
                       // alert("ccc");

                        //  var mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

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









//alert("geee");

                                var companyid= $("#main_company_id1").val();
            var uoms=$("#uom_details").val();
                       // alert(companyid+"kk");
                        var mat=$("#client_materialid").val();
//alert($("#client_materialid").val()+"mat_id");
                                var main_query1 = {

                                    'companyId': companyid,

                                    'materialItemID': mat,
                                    'quantity':$("#quantity").val(),
                                    'uom': $("#uom").val(),
                                    'perUnitPrice': $("#rate").val(),
                                    'des':$("#des").val(),
                                    'new_uom':uoms



                                };


                               // alert(main_query1.companyId+"kkkkkkk");
                               // $("#myModal12").fadeIn();

                                $.post("get_secondary_uom.php", main_query1, function (cv) {

                                   // alert(cv);

     //var responsedata =$.parseJSON(cv);
       //console.log(responsedata);
//        alert("material id"+responsedata.materialID);
                                    if(cv=="Y")
                                  {
                                   show_modal("Created successfully");
                        //    $("#myModal12").fadeIn();
                               }
else if(cv=="A")
{
    show_modal("Already created");
    //$("#myModal12").fadeIn();

}
                                      else
                                        {
                                         show_modal("Failed");
                                        }





                                });
//}
//                            }
//                            else {
//
//                                //$("#mes").html(ho);
//                                show_modal("Please Add Items");
//                            }
//
//                        }
//                        else {
//
//
//                            var msk =$('#main input[type="text"],select').filter(function () {
//                                return this.value.length == 0
//                            }).attr("id");
//
//
//                            var msdd = $('#main input[type="text"],input[type="number"],select').filter(function () {
//                                return this.value.length == 0
//                            }).attr("placeholder");
//
//                            var masdd = $('#main input[type="text"],input[type="number"],select').filter(function () {
//                                return this.value.length == 0
//                            }).attr("title");
//
//                            if(msk!=undefined) {
//
//
//                                show_modal("Data Invalid in " + msdd + " fields");
//                                $("#" + msk + "").focus();
//                            }else
//                            {
//
//                                show_modal("Data Invalid in Check in the fields");
//                                //$("#" + msk + "").focus();
//
//
//                            }
//
//
//
//                        }

                     return false;
                    });
                });

                    $("#main").submit(function(e)
                    {



                        return false;
                    });



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
              //  });

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