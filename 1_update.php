

<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
if(isset( $_SESSION['checks']))
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
        <script type="text/javascript" src="side_menu.js"></script>

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
        </style>
        <script type="text/javascript" src="js/company_details.js"></script>

        <script type="text/javascript">


//            Get companylist for Set
var care_of_id="";
function edit(ids)
{
     care_of_id=ids;
    var companyId=$("#ids_value1").val();

    var query={"care_of_id":care_of_id,"client_id":$("#ids_value1").val()};


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

    var query={"care_of_id":care_of_id,"client_id":$("#ids_value1").val()};


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

function get_cmp_list()
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
            $("#main_company_id1").html(option);

            call_header($("#main_company_id1"))
        })}



function call_header(cmp_id)
{
    $("#append_cmp").html("<img src='loader1.gif'>");
    set_company1(cmp_id)

 //  get_to_company(cmp_id)

}

//set data



//end here set data 2




function set_cmp_list(arr) {
    ///$("#typeid").html("");

    var datak;
    var levelOptions="";


    if(levelOptions=="")
    {


        var   obj = JSON.parse(arr);


        datak=new Array();



        var levelOption="";
        var out=new Array();

        for(var i = 0; i < obj.LIST.length; i++) {

            datak[i]=new Array();
            datak[i][0]=obj.LIST[i].id;
            datak[i][1]=obj.LIST[i].name;
            datak[i][2]=obj.LIST[i].tinNo;
            datak[i][3]=obj.LIST[i].cinNo;
            //data[i][1]=obj.LIST[i].name;
            //data[i][7]=obj.DETAIL[i].requestTimestamp;

            levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



        }

        $("#search_main_company_id").html(levelOptions);
        var ids=$("#search_main_company_id").val();
        get_sale_office();
    }
}

function get_sale_office() {


    $("#_searchsales_off").html("");
    var client_id=document.getElementById('search_main_company_id').value;
    query1 = {"client_Id": client_id};
    $.get("get_sale_office.php", query1, function (hd) {


        var a = hd;

        if(a=='N')
        {
            $("#_searchsales_off").html('');
            show_modal("No Sales Office Available For This Company");
        }else {
            set_sale_office1(a);
        }
    });

}

function set_sale_office1(arr)
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
    $("#_searchsales_off").html(sales_off);
   // var sales_id= $("#sales_off").val();
 //   get_warehouse_shipper();
  //  load1(sales_id);
}
function get_warehouse_shipper1(a)
{

    query1 = {"sales_off": a};
    $.get("get_warehouse.php", query1, function (hd) {


        var a = hd;
        //   alert(a+"ware");
        if(a=='N')
        {
$("#ship_id").html("<option>Select</option>");
        }else {
            set_warehouse_shipper(a);
        }
    });


}


function set_warehouse_shipper(arr)
{
    $('#ship_id').val("");
    var obj = JSON.parse(arr);

    ship_data=arr;
    dataw = new Array();
    shipper = new Array();


    var warehouse = "";
    var shippr = "<option value=''>Select</option>";
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
    //$("#Ship_TIN").val(shipper[0][2]);
    //$("#Ship_CIN").val(shipper[0][3]);
 //   $("#shipid").html(shippr);



    $("#warehouse_id").html(warehouse);
    validates();
}

function cmp_change(a)
{
    get_sale_office(a);
}
/*End here*/
          var ksp="";
          addeditems=[];
          var indexs;

            function check_uom(tt) {
                var cid = tt;

                var client_id = $("#main_company_id").val();
//alert(client_id+" "+cid);
                quers = {"client_id": client_id, "item": cid};
                $.get("uom.php", quers, function (fd) {

                   var out=new Array();
                    out=[];
                    var obj = JSON.parse(fd);


                    uom1 = new Array();


                    //  out=[];
                    for (var i = 0; i < obj.UOM.length; i++) {

                        uom1[i] = new Array();
                        uom1[i][0] = obj.UOM[i].unitOfMeasurement;
                        uom1[i][1] = obj.UOM[i].material_name;
                        //data1[i][2]=obj.UOM[i].tinNo;
                        //  alert(uom1[i][0]+"uom");

                        out.push(uom1[i][0]);

                    }

                  ksp=out.join();


                });



            }








         var choices=new Array();
var bom_code=new Array();
var material_bom_data="";
          function set_me(n) {
             // alert(n+"io")
              var queryd = {"company_id": n};
//alert(query);
              $.post("get_material_list.php", queryd, function (iks) {

//alert(iks+"mateliser")
                  material_bom_data=iks;

                  var objd = JSON.parse(iks);
                  var out = "";
                  //  alert(iks+"i");
                  var  datass = new Array();
                  out = new Array();
                  //alert("11")

                  for (var i = 0; i < objd.ITEM.length; i++) {

                      datass[i] = new Array();

                      datass[i][0] = objd.ITEM[i].item;
                      datass[i][1] = objd.ITEM[i].material_name;

                      //alert(data[i][0]+" data");
                      //     out[i]=obj.ITEM[i].item;
                      choices.push(datass[i][0].toUpperCase());


                  }
//alert("1")

                  var bom_data=new Array();
                  for (var i = 0; i < objd.BOM.length; i++) {

                      bom_data[i] = new Array();

                      bom_data[i][0] = objd.BOM[i].bomCode;

                      //alert(data[i][0]+" data");
                      //     out[i]=obj.ITEM[i].item;
                      bom_code.push(bom_data[i][0].toUpperCase());


                  }
                  //alert(bom_code+"kkkkkkkkkkkkkkk" )



              });


          }


          var ko="";

            function load()
            {


                $.get("companylist.php","",function(hd)
                {



                    var a=hd;

                    setData(a);
                 ko =a;
                 //   $("#typeid").html("");


                });







                // setup autocomplete function pulling from currencies[] array

            }




            function getdatas()
            {



                return choices;



            }


          var datak;
          var levelOptions="";
            function setData(arr) {
                ///$("#typeid").html("");




                if(levelOptions=="")
                {

                    ko=arr;
                    var   obj = JSON.parse(arr);


                    datak=new Array();



                    var levelOption="";
                    var out=new Array();

                    for(var i = 0; i < obj.LIST.length; i++) {

                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].id;
                        datak[i][1]=obj.LIST[i].name;
                        datak[i][2]=obj.LIST[i].tinNo;
                        datak[i][3]=obj.LIST[i].cinNo;
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        levelOptions =  levelOptions +"<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";



                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);



                    }
                    $("#Ship_TIN").val(datak[0][2]);
                    $("#Ship_CIN").val(datak[0][3]);
                    $("#main_company_id").html(levelOptions);
                    var ids=$("#main_company_id").val();


                    load1(ids);

                    //    $("#challan").append(levelOptions);


                    //var no= document.getElementById("typeid").selectedIndex;
                    // alert(no);
                    // alert(no+"Indesx");
                    // change(no);
                    // getMaterailList(ids);








                    var clin=$('#ship_id').val();
                    //alert(clin);
                    var query={"clientId":clin};

                    $.get("materialList.php",query,function(iks)
                    {


                        var objd = JSON.parse(iks);
                        var out="";
                        //  alert(iks+"i");
                        datass=new Array();
                        out=new Array();



                        for(var i = 0; i < objd.ITEM.length; i++) {

                            datass[i]=new Array();

                            datass[i][0]=objd.ITEM[i].item;
                            datass[i][1]=objd.ITEM[i].name;
                            datass[i][2]=objd.ITEM[i].id;
                            //alert(data[i][0]+" data");
                            //     out[i]=obj.ITEM[i].item;
                            choices.push(datass[i][0].toUpperCase());


                        }
                        //   alert(choices);


                    });





















                }
            }
var ids_care="";

function load12(dd)
{
    ids_care=dd;

    var query={"client_id":$("#ids_value1").val()};
    $.get("Add_cong.php",query,function(kj)
        {

            //alert(kj);

            //alert(a+" load1");
            setCongAdd1(kj);


        }
    );}
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


            }

        }




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


        }

    }




}




            function load1(ar1)
            {

                //    get Sale Office To append



                query={"client_id":ar1};
                $.get("Add_cong.php",query,function(kj)
                    {



                        //alert(a+" load1");
                      setCongAdd(kj);


                    });





                query={"client_id":ar1};
                $.get("add_cof.php",query,function(kjj)
                    {



                        //alert(a+" load1");
                        setConf(kjj);

//alert(kjj+"consignee")
                    }
                );
            }



//alert(levelOptions1)

                    function setCongAdd(arr) {

                        objs="";

                        var obj = JSON.parse(arr);

                        objs=obj;
                        data1=new Array();

                        var levelOptions1="";
                        var optionss="<option value=''>Select</option>";
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
                        for(var h=0;h< k.length;h++)
                        {

                            optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

                        }




                        var hff=$("#co").text();
                        var hkk=$("#co").val();


                        var hff1=$("#co_to").text();
                        var hkk1=$("#co_to").val();



                        // $("#co option").remove();

                        $("#co").html(optionss);
                        $("#co_to").html(optionss);
                        $("#edit_care1").html(optionss);
                        $('#co').val(hkk).attr("selected", "selected");
                        $('#co_to').val(hkk1).attr("selected", "selected");

                        con_call_to(hkk1);
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
                var optionss="<option value=''>Select</option>";
                var optionss1="<option value=''>Select</option>";
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
                for(var h=0;h< k.length;h++)
                {

                    optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";
                   optionss1+="<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

                }

//alert(levelOptions1);

var hf=$("#cof").text();
                var hk=$("#cof").val();
               // alert($("#cof").text());
             //   alert(hk);
//alert(hf);
                $("#cof").html(optionss);
                $("#edit_care").html(optionss1);
              //  $('#cof :selected').text(hf);
               $('#cof').val(hk).attr("selected", "selected");
                //$("#cof").val(hf);

                call_me(hk);


            }
function  get_bom_data() {
    //alert("ui")
    return bom_code;
}

            function call_me(x)
            {
                $("#cerena_ref").val("");
                $("#c_no").val("");
            var query={"client_id":$("#ids_value1").val()};
                $.get("add_cof.php",query,function(kjj)
                    {



                      var obj=JSON.parse(kjj);
                for(var i = 0; i < obj.LIST.length; i++) {


                   data1[i]=new Array();
                    data1[i][0]=obj.LIST[i].NAME;
                    data1[i][1]=obj.LIST[i].address;
                    data1[i][2]=obj.LIST[i].tinNo;
                    data1[i][3]=obj.LIST[i].cinNo;
                    data1[i][4]=obj.LIST[i].id;
                    data1[i][5]=obj.LIST[i].contact_name;
                    data1[i][6]=obj.LIST[i].contact_no;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    // levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+data1[i][4]+">" +data1[i][0]+ "</option>";

                    //alert(levelOption);
                    if(data1[i][4]== x)
                    {


                        $("#addr").val(data1[i][1]);
                        $("#cerena_ref").val(data1[i][5]);
                        $("#c_no").val( data1[i][6]);
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
             var   query={"client_id":$("#ids_value1").val()};
                $.get("Add_cong.php",query,function(kj) {



                    //alert(a+" load1");



                    $("#addr1").val("");
                    $("#tin1").val("");
                    $("#cin1").val("");
                    $("#consignee_name").val("");
                    $("#consignee_mob").val("")
                    var data1 = new Array();

                    var levelOptions1 = "";
                    var optionss = "";
                    var levelOption1 = "";
                    var out = new Array();
                    var objs = JSON.parse(kj)
                    for (var i = 0; i < objs.LIST.length; i++) {

                        data1[i] = new Array();
                        data1[i][0] = objs.LIST[i].NAME;
                        data1[i][1] = objs.LIST[i].address;
                        data1[i][2] = objs.LIST[i].tinNo;
                        data1[i][3] = objs.LIST[i].cinNo;
                        data1[i][4] = objs.LIST[i].id;
                        data1[i][5] = objs.LIST[i].contact_name;
                        data1[i][6] = objs.LIST[i].contact_no;


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

                    var datss = {"compid": $("#main_company_id").val()};
                    var data_address = "";
                    var data_image = "";
                    var data_company = "";
                    $.get("1.php", datss, function (rty) {


                        var obj = JSON.parse(rty);
                        var datam = new Array();
                        for (var i = 0; i < obj.details.length; i++) {


                            datam[i] = new Array();
                            datam[i][0] = obj.details[i].company_name;
                            datam[i][1] = obj.details[i].chalan_image_url;
                            datam[i][2] = obj.details[i].address;
                            datam[i][3] = obj.details[i].detail;

                            data_company = datam[i][0];
                            data_image = datam[i][1];
                            data_address = datam[i][2];
                            $("#company_address").val(datam[i][2]);
                            $("#company_image_url").val(datam[i][1])
                            $("#company_names").val(datam[i][0])
                            $("#company_details").val(datam[i][3])


                        }


                    })



            }


          function con_call_to(z)
          {



             var query={"client_id":$("#ids_value").val()};
              $.get("Add_cong.php",query,function(kj) {
                  var data1 = new Array();
                var  objs=JSON.parse(kj)
                  var levelOptions1 = "";
                  var optionss = "";
                  var levelOption1 = "";
                  var out = new Array();

                  for (var i = 0; i < objs.LIST.length; i++) {

                      data1[i] = new Array();
                      data1[i][0] = objs.LIST[i].NAME;
                      data1[i][1] = objs.LIST[i].address;
                      data1[i][2] = objs.LIST[i].tinNo;
                      data1[i][3] = objs.LIST[i].cinNo;
                      data1[i][4] = objs.LIST[i].id;


                      if (data1[i][4] == z) {


                          $("#addr1_to").val(data1[i][1]);
                          $("#tin1_to").val(data1[i][2]);
                          $("#cin1_to").val(data1[i][3]);

                      }


                  }


              });



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



                var cid =$("#autocomplete").val();
                var client_id=$("#ids_value").val();
                $("#des").val("");
                $("#uom").html("");
                $("#quantity").html("");
                $("#rate").val("");
                quers={"client_id":client_id,"item":cid};
                $.get("uom.php",quers,function(fd)
                {


//alert(fd);


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

                     levelOptions1 =  levelOptions1 +"<option id='"+i+"' value = '"+uom1[i][0]+"'>" +uom1[i][0]+ "</option>";





                    }








                        document.getElementById("des").value=uom1[0][1];
                        document.getElementById("uom").innerHTML =levelOptions1 ;




                    /*contextAdd  document.getElementById('cong_CIN').value =data[0][2];*/
                    /*document.getElementById('cong_TIN').value =data1[0][2];
                     document.getElementById('cong_CIN').value =data1[0][3];
                     document.getElementById('contextAdd').value =data1[0][1];*/








        });





            }

            function add_table()
            {
                //alert(material_bom_data+"add_table");
                var obj1 = JSON.parse(material_bom_data);
                var out = "";
                //  alert(iks+"i");
                var datass1 = new Array();
                out = new Array();


                for (var i = 0; i < obj1.ITEM.length; i++) {

                    datass1[i] = new Array();

                    datass1[i][0] = obj1.ITEM[i].item;
                    datass1[i][1] = obj1.ITEM[i].name;
                    datass1[i][2] = obj1.ITEM[i].id;
                    //alert( datass1[i][2]);
                    //datass1[i][3]=obj1.ITEM[i].client_material_id;
                    uomss= datass1[i][2];
                    if($("#autocomplete").val()== datass1[i][0]){
                        //alert(datass1[i][0])
                        var client_id=datass1[i][2];
                    }
//alert(client_id+"clien_id");
                }
                //alert(m_client_id);
                var items= $.trim($("#autocomplete").val());
                var item_id=client_id;
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


               //         $("#tbd").append("<tr><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uoms+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")


                        $("#tbd").append("<tr><td><input type='hidden' name='item_value[]' value='"+item_id+"'><input type='hidden'  name='item1[]' value='"+items+"'>"+items+"<span class='glyphicon glyphicon-pencil'></span></td><td><input  type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td class='uoms'><input type='text' style='display: none' name='quan1[]' value='"+quan+"'><label>"+quan+"</label><span class='glyphicon glyphicon-pencil'></span></td><td class='makes'><input type='hidden' name='uom1[]' value='"+uoms+"'><label>"+uoms+"</label> <select style='display: none'></select><span class='glyphicon glyphicon-pencil'></span></td><td class='rates'><input type='text' style='display: none' name='rate1[]' value='"+rates+"'><label>"+rates+"</label><span class='glyphicon glyphicon-pencil'></td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")

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
                var cur_month=dt.getMonth()+1;
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
              $("#cof option").remove();
              $("#co option").remove();
              $("#co_to option").remove();
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
                              $("#cof option").remove();
                              $("#co option").remove();
                              $("#co_to option").remove();



                          }





                      })





















                  }


              }

          }






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
function lookup5(z)
{

    dg={"pincode":z};
    $.get("pincode.php",dg,function(xs)
    {

        setState8(xs);



    });


}
function setState8(ams)
{

    $("#add_from_city").val("");
    $("#add_from_state").val("");
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
        document.getElementById('add_from_city').value=data11[0][0];
        document.getElementById('add_from_state').value=data11[0][1];
    }


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






            function checks_table(xs)
             {

          //   alert(xs);

             if($("#tbd>tr").length>0)
             {
             var arrss=new Array();

             var arr=$('#tbd tr').find('td').map(function() {

             return $(this).text()
             }).get();


             arrss.push(arr);
         //    alert(arrss.length  +"hi");

             var dsw=0;
             for(dsw=0;dsw<arrss.length;dsw++)
             {
           //  alert(dsw);

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



            function delete_row(row)
            {



                var i=row.parentNode.parentNode.rowIndex;
                //alert(i+" "+index+" "+row);
                var n=i-1;
                document.getElementById('tbd').deleteRow(n);

                addeditems.splice(n,1);
                //indexs--;






            }



 function delete_row1(row,title)
            {
var oid=$("#order_id").val();


                //indexs--;
 query={"oid":oid,"item_id":title,"bom_id":"-"};
                $.get("delete_order_items.php",query,function(kjj)
                    {

//alert(kjj)

                    if($.trim(kjj)=='Y')
                    {

//alert(row+" "+title);
                var i=row.parentNode.parentNode.rowIndex;
                //alert(i+" "+index+" "+row);
                var n=i-1;
                document.getElementById('tbd').deleteRow(n);

                addeditems.splice(n,1);
                    }else
                    {
                        show_modal("Unable to Delete Item From List");
                    }
                        //alert(a+" load1");
                        //  setConf(kjj);
                        //alert(kjj);
                    }
                );





            }








        function read_data(zx)
        {
            //alert(zx)

if($("#company_typeids").val()=="")
{

$("#company_typeids1").val("").attr("selected","selected");

}else {

    $("#company_typeids1").val($("#company_typeids").val());

}

            if($("#typeid").val()=="")
            {

                $("#typeid1").val("").attr("selected","selected");

            }else {

                $("#typeid1").val($("#typeid").val());

            }


        ///-----Order List Detals-//////
            var warehouse_id="";
            var main_company="";
var option_type="";
            var sales_off="";
            var obj2 = JSON.parse(zx);
     //   alert(obj);

          var  data11=new Array();

            var out=new Array();

            for(var i = 0; i < obj2.ORDER.length; i++) {





                data11[i]=new Array();
                data11[i][0]=obj2.ORDER[i].ShippeName;
                data11[i][1]=obj2.ORDER[i].tinNo;
                data11[i][2]=obj2.ORDER[i].cinNo;
                data11[i][3]=obj2.ORDER[i].companyRefPerson;
                data11[i][4]=obj2.ORDER[i].companyRefPersonNo;
                data11[i][5]=obj2.ORDER[i].careOfName;
                data11[i][6]=obj2.ORDER[i].careOfAddress;
                data11[i][7]=obj2.ORDER[i].consignneeName;
                data11[i][8]=obj2.ORDER[i].consigneeAddress;
                data11[i][9]=obj2.ORDER[i].conContactName;
                data11[i][10]=obj2.ORDER[i].conContactNo;
                data11[i][11]=obj2.ORDER[i].specialInstruction;
                data11[i][12]=obj2.ORDER[i].orderType;
                data11[i][13]=obj2.ORDER[i].chalan_no;
                data11[i][14]=obj2.ORDER[i].chalan_date;
                data11[i][15]=obj2.ORDER[i].shipper_id;
                data11[i][16]=obj2.ORDER[i].order_id;
                data11[i][17]=obj2.ORDER[i].cof_id;
                data11[i][18]=obj2.ORDER[i].consignee_id;
                data11[i][19]=obj2.ORDER[i].companySalesOfficeID;
                data11[i][20]=obj2.ORDER[i].salesoffName;
                data11[i][21]=obj2.ORDER[i].wareHouseID;
                data11[i][22]=obj2.ORDER[i].wareHouseName;
                data11[i][23]=obj2.ORDER[i].companyID;
                data11[i][24]=obj2.ORDER[i].comapnyName;
                data11[i][25]=obj2.ORDER[i].fromConsigneeID;
                data11[i][26]=obj2.ORDER[i].fromName;
                data11[i][27]=obj2.ORDER[i].fromAddress;
                data11[i][28]=obj2.ORDER[i].toWareHouseID;
                data11[i][29]=obj2.ORDER[i].toCompanySalesOfficeID;
                data11[i][30]=obj2.ORDER[i].toWareHouseName;

                $("#ids_value1").val(data11[i][19]);
                if(data11[i][12]=="STOCKTRANSFERORDER")
                {

$("#to_company").val(data11[i][29]).attr("selected","selected");
                 //   $("#to_warehouse").val(data11[i][30]).attr("selected","selected");
                    $("#to_warehouse").html("<option value='"+data11[i][28]+"'>"+data11[i][30]+"</option>");
                }



                option_type+="<option value='"+data11[0][15]+"'>"+data11[0][0]+"</option>";
                 sales_off+="<option value='"+data11[0][19]+"'>"+data11[0][20]+"</option>";
                main_company+="<option value='"+data11[0][23]+"'>"+data11[0][24]+"</option>";
                warehouse_id+="<option value='"+data11[0][21]+"'>"+data11[0][22]+"</option>";
//alert(data11[0][0]);


            }

            $("#warehouse_id").html(warehouse_id);
            $("#main_company_id").html(main_company);
$("#old_order_type").val(data11[0][12]);
$("#ship_id").html(option_type);
            $("#sales_off").html(sales_off);
$("#Ship_CIN").val(data11[0][2]);
            $("#order_id").val(data11[0][16]);
            $("#Ship_TIN").val(data11[0][1]);
           // alert("cof");
            $("#cof").html("<option value='"+data11[0][17]+"'>"+data11[0][5]+"</option>");


$("#cof").change();

            $("#addr").val(data11[0][6]);
            $("#cerena_ref").val(data11[0][3]);
            $("#c_no").val(data11[0][4]);
            $("#co").html("<option value='"+data11[0][18]+"'>"+data11[0][7]+"</option>");
            $("#co").change();
            $("#cin1").val("-");
            $("#tin1").val("-");
            $("#addr1").val(data11[0][8]);
            $("#consignee_name").val(data11[0][9]);
            $("#consignee_mob").val(data11[0][10]);
            $("#specials").val(data11[0][11]);
            $("#challan_no").val(data11[0][13]);
            if(data11[0][22]!="null" || data11[0][22]!=null || data11[0][22]!="")
            {
         $("#co_to").html("<option value='"+data11[0][25]+"'>"+data11[0][26]+"</option>")
            }
            $("#addr1_to").val(data11[0][27]);



            var objDate = new Date(data11[0][14]),
                locale = "en-us",
                month = objDate.toLocaleString(locale, { month: "long" });
//alert(data11[0][14]);
var ol=new Date(data11[0][14]);
          //  alert(ol+"ol");
var ct=data11[0][14].split("-");
          var tg=ol.getFullYear()+"-"+ct[1]+"-"+ct[2];
              var ht=ct[2]+" "+month+" "+ol.getFullYear();

          //  alert(tg);

            $("#dtp_input2").attr("value",tg);
            $("#dates").val(ht);
            $("#old_challan").val(data11[0][13]);
            //$("#challan").html("<option value='"+data11[0][12]+"'>"+data11[0][12]+"</option>");

//load();
        //    load1($("#typeid").val());
           // $('#challan :selected').text(data11[0][12]);

            $('#challan').val(data11[0][12]).attr("selected", "selected");
///item List here
order_type_change(data11[0][12]);
            load1($("#ids_value1").val());
            set_sales_office($("#ids_value1").val());
            warehouse_Set($("#ids_value1").val());



            set_me($("#ids_value1").val())


            var  data12=new Array();
            $("#tbd").html("");
            $("#tbd1").html("");
            var bom_data=new Array();

            for(var k=0;k<obj2.BOM.length;k++)
            {
                bom_data[k]=new Array();
                bom_data[k][0]=obj2.BOM[k].bomCode.toUpperCase();
                bom_data[k][1]=obj2.BOM[k].bomName;
                bom_data[k][2]=obj2.BOM[k].bom_quantity;
                bom_data[k][3]=obj2.BOM[k].bomPrice;
                bom_data[k][4]=obj2.BOM[k].bom_Id;
                addeditems1.push(bom_data[k][0]);
                $("#tbd1").append("<tr><td><input type='hidden' name='bom_id[]' value='"+bom_data[k][4]+"'><input type='hidden' name='bom_item1[]' value='"+bom_data[k][0]+"'>"+bom_data[k][0]+"</td><td><input type='hidden' name='bom_des1[]' value='"+bom_data[k][1]+"'>"+bom_data[k][1]+"</td><td><form style='display: none'><input type='number' class='form-control-static' placeholder='Quantity'  name='bom_quan' required value='"+bom_data[k][2]+"'><input type='submit' value='OK' class='btn btn-default btn-group-sm'></form><input type='hidden' name='bom_quan1[]' value='"+bom_data[k][2]+"'><label>"+bom_data[k][2]+"</label><i class='fa fa-pencil' onclick='change_bom_qty(this)'></i></td><td><input type='hidden' name='bom_rate1[]' value='"+bom_data[k][3]+"'>"+bom_data[k][3]+"</td><td><button class='btn btn-link' onclick='show_confrim_bom_modal(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")

            }

            for(var j = 0; j < obj2.ITEM.length; j++)
            {


                data12[j] = new Array();

                data12[j][0]=obj2.ITEM[j].item_code;
                data12[j][1]=obj2.ITEM[j].material_name;
                data12[j][2]=obj2.ITEM[j].order_quantity;
                data12[j][3]=obj2.ITEM[j].per_unit_price;
                data12[j][4]=obj2.ITEM[j].unitOfMeasurement;
                data12[j][5]=obj2.ITEM[j].order_items_id;
                  addeditems.push(data12[j][0]);

             //   $("#tbd").append("<tr><td><input type='hidden' name='item1[]' value='"+data12[j][0]+"'>"+data12[j][0]+"</td><td>"+data12[j][1]+"</td><td>"+data12[j][2]+"</td><td>"+data12[j][4]+"</td><td>"+data12[j][3]+"</td></tr>")

                $("#tbd").append("<tr><td><input type='hidden'  name='item1[]' value='"+data12[j][0]+"'>"+data12[j][0]+"<span class='glyphicon glyphicon-pencil'></span></td><td><input  type='hidden' name='des1[]' value='"+data12[j][1]+"'>"+data12[j][1]+"</td><td class='uoms'><input type='text' style='display: none' name='quan1[]' value='"+data12[j][2]+"'><label>"+data12[j][2]+"</label><span class='glyphicon glyphicon-pencil'></span></td><td class='makes'><input type='hidden' name='uom1[]' value='"+data12[j][4]+"'><label>"+data12[j][4]+"</label> <select style='display: none'></select><span class='glyphicon glyphicon-pencil'></span></td><td class='rates'><input type='text' style='display: none' name='rate1[]' value='"+data12[j][3]+"'><label>"+data12[j][3]+"</label><span class='glyphicon glyphicon-pencil'></td><td><button class='btn btn-link' title='"+data12[j][5]+"' onclick='show_confrim_modal(this,this.title)' ><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")






            }

            $(".uoms span").click(function()
            {

if($(this).hasClass("glyphicon-pencil")==true) {

   // alert($(this).parent().find("input").val());
    $(this).parent().find("label").hide();
    $(this).parent().find("input").show();

    $(this).removeClass("glyphicon glyphicon-pencil").addClass("glyphicon glyphicon-check");


}
                else {

    var dfh=$(this).parent().find("input").val();
    $(this).parent().find("label").text(dfh).show();
    $(this).parent().find("input").hide();

    $(this).removeClass("glyphicon glyphicon-check").addClass("glyphicon glyphicon-pencil");
}



            });




            //Quantity Start Here
            $(".makes span").click(function()
            {


                if($(this).hasClass("glyphicon-pencil")==true) {

                    // alert($(this).parent().find("input").val());
                    $(this).parent().find("label").hide();
                    $(this).parent().find("select").show();
var oks=$(this).parent().parent().find("td:first").text();
                //  alert(oks);
                    check_uom(oks);
                    $(this).parent().find("select").show();
                    $(this).parent().find("select").attr("id", $.trim(oks));
                    var q=$(this).parent().find("select").attr("id");

                    $(this).removeClass("glyphicon glyphicon-pencil").addClass("glyphicon glyphicon-check");

setTimeout(function() {




    var kjh=new Array();
    kjh=[];
  kjh=ksp.split(",");
   var kt="";
  //  alert(kjh.length);
    for(var d=0;d<kjh.length;d++)
    {

        kt=kt+"<option value='"+kjh[d]+"'>"+kjh[d]+"</option>";

    }
    $("#"+q+"").html(kt);
},100);

                }
                else {

                    var dffh=$(this).parent().find("select").val();
                    $(this).parent().find("label").text(dffh).show();
                    $(this).parent().find("select").hide();
                    $(this).parent().find("input").val(dffh);

                    $(this).removeClass("glyphicon glyphicon-check").addClass("glyphicon glyphicon-pencil");
                }

            });



        ////rates start Here



            $(".rates span").click(function()
            {

                if($(this).hasClass("glyphicon-pencil")==true) {

                    // alert($(this).parent().find("input").val());
                    $(this).parent().find("label").hide();
                    $(this).parent().find("input").show();

                    $(this).removeClass("glyphicon glyphicon-pencil").addClass("glyphicon glyphicon-check");


                }
                else {

                    var dfh=$(this).parent().find("input").val();
                    $(this).parent().find("label").text(dfh).show();
                    $(this).parent().find("input").hide();

                    $(this).removeClass("glyphicon glyphicon-check").addClass("glyphicon glyphicon-pencil");
                }



            });
















        }

function change_bom_qty(a)
{
    var forms=$(a).parent().find("form");
    var labels=$(a).parent().find("label");
    $(forms).show();
    $(forms).submit(function () {

        var datas=$(forms).find("input[type='number']").val();

        $(labels).text(datas);
        $(a).parent().find("input[type='hidden']").val(datas)
        $(forms).hide();
        return false;
    })

}

            function search_challan()
            {
                get_to_company($("#main_company_id1").val());
if($("#ids_value").val()!="") {
    var search_id = $("#search_id").val();
    querss = {"challan_no": search_id, "sales_id": $("#ids_value").val()};
    $.post("getSearch.php", querss, function (rt) {


        if ($.trim(rt) != "N") {
            read_data(rt);
        } else {

            show_modal("Challan No. Does Not Exists");


        }


    });


}else
{
    show_modal("<h3><i class='fa fa-exclamation-triangle'></i> &nbsp;Company Or Sales Office</h3><br>Please Select Company Or Sales Office")
}}










///// Set sales Office




          function set_sales_office(arrayt)
          {
              $.get("get_sale_office.php",{"client_Id":arrayt},function(rtt) {
//alert(rtt);
                  var obj2 = JSON.parse(rtt);
                  var sales_append_data = "";
                  var sales_datas = new Array();


                  //   alert(obj);

                  for (var i = 0; i < obj2.LIST.length; i++) {


                      sales_datas[i] = new Array();
                      sales_datas[i][0] = obj2.LIST[i].slaveID;
                      sales_datas[i][1] = obj2.LIST[i].company_name;
                      sales_append_data += "<option value='" + sales_datas[i][0] + "'>" + sales_datas[i][1] + "</option>";

                  }

                  var sales_old_text = $("#sales_off").text();
                  var sales_old_val = $("#sales_off").val();
                //  alert(sales_old_text+"this data")
               //   alert(sales_old_text+"tatata");
                  $("#sales_off").html("");
                  $("#sales_off").html(sales_append_data);


                  // $('#sales_off :selected').text(sales_old_text);
                  $('#sales_off').val(sales_old_val).attr("selected", "selected");


              });
          }





            function warehouse_Set(sales_id)
            {

ert={"sales_off":sales_id};

$.get("get_warehouse.php",ert,function(warehouse_ret) {


    var warehouse_data = "";
    var obj2 = JSON.parse(warehouse_ret);
    //   alert(obj);

    var sales_data = new Array();

    var sales_data_tin = new Array();

    for (var i = 0; i < obj2.WAREHOUSE.length; i++) {


        sales_data[i] = new Array();
        sales_data[i][0] = obj2.WAREHOUSE[i].warehouseId;
        sales_data[i][1] = obj2.WAREHOUSE[i].wareHouseName;
        warehouse_data += "<option value='" + sales_data[i][0] + "'>" + sales_data[i][1] + "</option>";
    }


    var warehouse_old_val = $("#warehouse_id").val();


    $("#warehouse_id").html(warehouse_data);


  //  $('#warehouse_id :selected').text(warehouse_old_text);
    $('#warehouse_id').val(warehouse_old_val).attr("selected", "selected");

var shipper_data="<option value=''>Select</option>";
    for (var j = 0; j < obj2.SHIPPER.length; j++) {


        sales_data_tin[j] = new Array();

        sales_data_tin[j][0] = obj2.SHIPPER[j].shipperID;
        sales_data_tin[j][1] = obj2.SHIPPER[j].shipperName;
        sales_data_tin[j][2] = obj2.SHIPPER[j].tin;
        sales_data_tin[j][3] = obj2.SHIPPER[j].cin;

        shipper_data += "<option value='" + sales_data_tin[j][0] + "'>" + sales_data_tin[j][1] + "</option>";
    }




    var shipper_old_text = $("#ship_id").text();
    var shipper_old_val = $("#ship_id").val();
//alert(shipper_data+"for append")
    $("#ship_id").html(shipper_data);


  //  $('#typeid :selected').text(shipper_old_text);
 $('#ship_id').val(shipper_old_val).attr("selected", "selected");


});
               load1(sales_id);
            }


 function order_type_change(a)
 {


     if(a=="STOCKTRANSFER")
     {

$("#warehouse_id_container").hide();
$("#order_type_container").show();


     }
     else {
         $("#warehouse_id_container").show();

$("#order_type_container").hide();


     }



     if(a=="STOCKTRANSFERORDER")
     {

         $("#to_container").show();
         $("#consignee_details_container").hide();

     }

     else {

         $("#to_container").hide()
         $("#consignee_details_container").show();

     }


validates();

 }


addeditems1=[];
var indexs1;
function bom_add_table()
{

    var items= $.trim($("#bom_autocomplete").val());

    var des=$("#bom_des").val();
    var quan=$("#bom_quantity").val();
    var rates=$("#bom_rate").val();
    var ks=parseInt(quan);
    var bom_id=$("#bom_id").val();

    if(items!="" &&  des!="" && ks>0  && rates!="")
    {

        indexs1=$.inArray(items,addeditems1);





        if(indexs1>=0)
        {

            show_modal("Item Code Already Added");


        }else
        {


            $("#tbd1").append("<tr><td><input type='hidden' name='bom_id[]' value='"+bom_id+"'><input type='hidden' name='bom_item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='bom_des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='bom_quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='bom_rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_bom_row_temp(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")


            $("#bom_autocomplete").val("");
            $("#bom_rate").val("");
            $("#bom_id").val();

            $("#bom_des").val("");
            $("#bom_quantity").val("");
            addeditems1.push(items);
        }






    }
    else
    {
        var ms=$('#add_items1 input[type="text"]').filter(function () {
            return this.value.length == 0
        }).attr("id");


        var msd=$('#add_items1 input[type="text"]').filter(function () {
            return this.value.length == 0
        }).attr("placeholder");



        $("#"+ms+"").focus();

        show_modal("Enter the value in "+msd+" the Field");
        // alert($('#add_item>input[type]').filter('input[value==""]').length);



        //document.getElementById(ms).required = true;



    }



}

var bom_item_list=new Array();
function delete_bom_row(row)
{
    //alert(row+"ol")
    var oid=$("#order_id").val();


    //indexs--;
    query={"oid":oid,"item_id":"-","bom_id":$(row).parent().parent().find("td").eq(0).find("input[name='bom_id[]']").val()};
   // alert(query.bom_id)
    $.get("delete_order_items.php",query,function(kjj)
    {
        //alert(kjj)
        if($.trim(kjj)!="N") {
            var i = row.parentNode.parentNode.rowIndex;
            //alert(i+" "+index+" "+row);
            var n = i - 1;
            document.getElementById('tbd1').deleteRow(n);

            addeditems1.splice(n, 1);
            //indexs--;
        }else {
            show_modal("<h3><i class='fa fa-exclamation-triangle'></i> &nbsp;BOM Error</h3><br>Failed To Delete")
        }
    });

}

function delete_bom_row_temp(row)
{




    var i=row.parentNode.parentNode.rowIndex;
    //alert(i+" "+index+" "+row);
    var n=i-1;
    document.getElementById('tbd1').deleteRow(n);

    addeditems1.splice(n,1);
    //indexs--;

}



function loading_modal_show() {
    $("#mods").show();
}
function  loading_modal_hide() {
    $("#mods").hide();
}


function bom_descriptions() {
//alert(material_bom_data+"bom_des");
    var obj=JSON.parse(material_bom_data);
    $("#bom_des").val("");
    $("#bom_rate").val("");
    $("#bom_id").val("");
    var bom_data=new Array();
    for (var i = 0; i < obj.BOM.length; i++) {

        bom_data[i] = new Array();

        bom_data[i][0] = obj.BOM[i].bomID;
        bom_data[i][1] = obj.BOM[i].bomCode;
        bom_data[i][2] = obj.BOM[i].bomName;
        bom_data[i][3] = obj.BOM[i].price;
        if($("#bom_autocomplete").val()==bom_data[i][1].toUpperCase())
        {
            $("#bom_id").val(bom_data[i][0]);
            $("#bom_des").val(bom_data[i][2]);
            $("#bom_rate").val(bom_data[i][3])

        }


    }
}




var rows_id="",row_titles="";
function show_confrim_modal(a,b)
{
    $("#confirm_boc").modal("show")


    row_titles=b;
    rows_id=a;

}
var rows_id_bom="";
function show_confrim_bom_modal(a)
{
    //alert(a)
    $("#confirm_bom").modal("show")



    rows_id_bom=a;

}
function loading_modal_show() {
    $("#mods").show();
}
function  loading_modal_hide() {
    $("#mods").hide();
}
        </script>


    </head>

    <body class="bds"  onload="get_cmp_list();"  >

    <div id="confirm_boc" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div><h4><i class="fa fa-exclamation-triangle"></i> Delete Modal</h4><br>
                        <p style="padding-left: 20px">Are Sure Want To Delete This Item.</p>
                    </div>
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"><button id="confirm_btn" type="button"  data-dismiss="modal" class="btn btn-primary">Yes</button><button type="button"  data-dismiss="modal" class="btn btn-default">No</button></div>
            </div>
        </div>
    </div>
    <div id="confirm_bom" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- dialog body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div ><h4><i class="fa fa-exclamation-triangle"></i> Delete BOM</h4><br>
                        <p style="padding-left: 20px">Are Sure Want To Delete This Item.</p>
                    </div>
                </div>
                <!-- dialog buttons -->
                <div class="modal-footer"><button id="confirm_bom_btn" type="button"  data-dismiss="modal" class="btn btn-primary">Yes</button><button type="button"  data-dismiss="modal" class="btn btn-default">No</button></div>
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
                            Update/Edit
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
                    <div id="append_cmp" >

                    </div>

                    <div style="display: none;" class="col-lg-2" id="cmp_type">
                        <div class="form-inline" > <select disabled onchange="set_cmp(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>
                    <div style="display: none;" class="col-lg-2" id="cmp_type1">
                        <div class="form-inline" > <select disabled onchange="set_cmp1(this.value)" class="form-control" required><option value="">Search By</option></select></div></div>
                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Search</h3>
                        </div>
                        <div class="panel-body ">


<div class="col-lg-12"><br>
                     <center>      <form for="form" style="width: 50%" id="search_challan">

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_challan" placeholder="Challan No.." required title="Enter Challan No..To Search" id="search_id" aria-describedby="basic-addon2">
                                    <span class="input-group-addon"   onclick="hit_me()" id="basic-addon2"><span class="glyphicon glyphicon-search"></span> Search</span>
                                </div>

                            </form><br>
</center>
</div><br><br><br>


                            </div>
                        </div>


                    <form role="form" id="main">
                       <!-- <div style="display: none" class='panel panel-green  margin-bottom-40' id="to_container" > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>To Company Details</h3></div> <div class='panel-body'> <div class='row'>   <div  class='col-lg-6' ><div class='col-lg-12'><label>To  Company Name</label><div class='form-group'><select name="to_company" id="to_company" onchange="get_warehouses(this.value)"  class='form-control'></select> </div></div>  </div> <div class='col-lg-5'><div class='col-lg-12'><label>To Warehouse </label><div class='form-group'><select id="to_warehouse" name="to_warehouse"   class='form-control'><option value="">Select Warehouse</option></select></div></div></div></div></div></div>-->

<div class=" panel panel-green  margin-bottom-40" style="display: none ">
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
                        <select  class="form-control" name="main_company_id" required="" id="main_company_id" <!--onchange="shipper_change(this.value)" -->>

                            <option value="">Select</option>

                        </select>
                    </div>

</div>
                       <div class="col-lg-6" style="display: none">
                            <div class="form-group">
                                <label for="exampleInputEmail1q">Sales Office:</label>
                                <select  class="form-control" <!--onchange="warehouse_Set(this.value)"--> name="sales_off"  id="sales_off" >

                                    <!--  <option value="INBOUND">Inbound</option>-->

                                </select>
                            </div>
                        </div>
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

                        <div id="append_cmp1">

                        </div>
                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Main</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Challan Type</label>
                                                <select  class="form-control" name="challan_type" onchange="order_type_change(this.value)" required="" id="challan" >
                                                    <option value="INBOUND">INBOUND</option>
                                                    <option value="OUTBOUND">OUTBOUND</option>
                                                    <option value="STOCKTRANSFER">STOCKTRANSFER</option>
                                                    <option value="RETURNINBOUND">RETURNINBOUND</option>
                                                    <option value="STOCKTRANSFERORDER">STO</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="warehouse_id_container">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Warehouse</label>
                                                <select  class="form-control" name="warehouse_id" required="" id="warehouse_id" >


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Challan no.</label>
                                                <input type="text"  class="form-control" required="" pattern="[a-zA-Z- 0-9]" style="text-transform: uppercase" title="Challan No" id="challan_no" name="challan_no" placeholder="Challan no">
                                            </div>

                                        </div>
                                        <input type="hidden" id="old_challan" value="">
                                        <input type="hidden" id="order_id" value="">
                                        <input type="hidden" id="old_order_type" value="">
                                        <div class="col-lg-3">
                                            <div class="form-group">


                                                <div class="control-group">
                                                    <label class="control-label">Date</label>
                                                    <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                        <input required="" title="Date" size="26" type="text" id="dates"   placeholder="Date"  readonly>

                                                        <span class="add-on"><i class="icon-th"><i class="fa fa-calendar"></i></i></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input2" required="" /><br/>
                                                </div><br>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>


                        <div style="display: none" class='panel panel-green  margin-bottom-40' id="to_container" > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>To Company Details</h3></div> <div class='panel-body'> <div class='row'>   <div  class='col-lg-6' ><div class='col-lg-12'><label>To  Company Name</label><div class='form-group'><select name="to_company" id="to_company" onchange="get_warehouses(this.value)"  class='form-control'></select> </div></div>  </div> <div class='col-lg-5'><div class='col-lg-12'><label>To Warehouse </label><div class='form-group'><select id="to_warehouse" name="to_warehouse"   class='form-control'><option value="">Select Warehouse</option></select></div></div></div></div></div></div>


                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Shipper Details</h3>
                            </div>
                            <div class="panel-body">


                                <div class="form-group" id="shiper_select">
                                    <label for="exampleInputPassword1">Shipper</label><br>
                                    <select id="ship_id" onchange="cin_change(this.value)"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="width: 300px" required="">

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
                                    <label for="exampleInputPassword1">Reference Name</label>
                                    <input type="text" class="form-control" id="cerena_ref" required="" title="Reference Name" placeholder=" Ref. Name" name="cerena_reference">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact No</label>
                                    <input type="text" class="form-control" maxlength="13" required="" pattern="[0-9]{10}" title="Contact Number" id="c_no" placeholder="Ref. No" name="c_no">
                                </div>
                                 <center><button class="btn btn-default"   data-toggle="modal" data-target="#myModalEdit"   onclick=" return false">Edit</button> <button class="btn btn-default"   data-toggle="modal" data-target="#myModal"   onclick="return false">Add new</button></center>


                            </div>
                        </div>

                        <div class="panel panel-green margin-bottom-40" id="consignee_details_container">
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
                                    <select id="co" onchange="con_call(this.value)" required=""  class="form-control"  data-live-search="true" title="Please select a lunch ..." name="co" >
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
                                 <center><button class="btn btn-default"   data-toggle="modal" data-target="#myModal1Edit"   onclick=" return false">Edit</button> <button class="btn btn-default" onclick="return false" data-toggle="modal" data-target="#myModal1">Add new</button></center></span>


                            </div></div>
                        <div id="order_type_container">


                            <div class="panel panel-green margin-bottom-40"> <div class="panel-heading"> <h3 class="panel-title"><i class="fa fa-tasks"></i>From Consignee Details</h3> </div> <div class="panel-body"> <div class="form-group"> <label for="exampleInputPassword1">Consignee</label><br> <select id="co_to" name="co_to" onchange="con_call_to(this.value)"   class="form-control"  data-live-search="true" > </select> </div> <div class="form-group"> <label for="exampleInputPassword1">CIN</label> <input type="text" readonly class="form-control" id="cin1_to" placeholder="CIN" name="cin1_to"> </div> <div class="form-group"> <label  for="exampleInputPassword1">TIN</label> <input readonly type="text" value="" class="form-control" id="tin1_to" placeholder="CIN" name="tin1_to"> </div> <div class="form-group"> <label for="exampleInputPassword1">Address</label> <textarea  class="form-control" id="addr1_to" placeholder="Address" readonly name="Address1_to"></textarea></div> <center><button class="btn btn-default" onclick="return false" data-toggle="modal" data-target="#myModal18">Add new</button></center> </div></div>
</div>

                        <input type="submit" style="display: none" id="main_subs">
                    </form>



                    <!--BOM Details-->


                    <div class="panel   margin-bottom-40 panel-green" >
                        <div class="panel-heading" >

                            <h3 class="panel-title"><i class="fa fa-tasks"></i>BOM Details</h3>
                        </div>
                        <div class="panel-body">


                            <table class="table table-striped">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>BOM Code</th>
                                        <th>Description</th>
                                        <th>Quantity</th>

                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbd1">

                                    </tbody>
                                </table>

                                <div style="margin-left: -20px" class=""><div class="row">            <form role="form" id="add_items1">
                                            <div class="panel-body">

                                                <div class="col-lg-3">
                                                    <div class="form-group " >
                                                        <div class="ui-widget">

                                                            <input type="text"  class="form-control"  id="bom_autocomplete" onblur="bom_descriptions();" placeholder="BOM Code" name="bom_code" required="" title="BOM Code">
                                                        </div></div>
                                                    <input type="hidden" value="" id="bom_id" name="bom_id">
                                                    <div id="stock" style="font-weight: bold;color:red;"></div></div>
                                                <div class="col-lg-3"> <div class="form-group  ">

                                                        <input type="text" required=""  class="form-control" id="bom_des"  placeholder="Description" style="pointer-events: none;" title="Add Description From Item Code" name="desc">
                                                    </div></div>

                                                <div class="col-lg-2">  <div class="form-group">

                                                        <input type="number" style="" id="bom_quantity" min="1" class="form-control" placeholder="QTY" required="" data-live-search="rate"  title="Please select a Quantity ...">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
                                                </div>


                                                <div class="col-lg-2">  <div class="form-group">

                                                        <input type="number" readonly class="form-control" step="any" min="1" required="" title="Rate" id="bom_rate" placeholder="Rate" name="rate">
                                                    </div></div>
                                                <div class="col-lg-1">  <input type="submit" data-toggle="modal" data-target="#myModal3"  class="btn btn-default" value="Add Item"></div>


                                            </div>

                                        </form></div>
                                </div>
                        </div></div>
                    <!--End Here-->



                    <div class="panel panel-green  margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
                        </div>
                        <div class="panel-body">


                            <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>UOM</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbd">

                                    </tbody>
                                </table>
                            <div style="margin-left: -20px" class=""><div class="row">            <form role="form" id="add_items">
                                        <div class="panel-body">

                                            <div class="col-lg-3">
                                                <div class="form-group " >
                                                    <div class="ui-widget">

                                                        <input type="text"  class="form-control"  id="autocomplete" onblur="descriptions();material_stock();" placeholder="Item Code" name="item_code" required="" title="Item Code">
                                                    </div></div>
                                                <div id="stock" style="font-weight: bold;color:red;"></div></div>
                                            <input type="hidden" id="ids_value">
                                            <div class="col-lg-3"> <div class="form-group  ">

                                                    <input type="text" required=""  class="form-control" id="des"  placeholder="Description" style="pointer-events: none;" title="Add Description From Item Code" name="desc">
                                                </div></div>

                                            <div class="col-lg-1">  <div class="form-group">

                                                    <input type="number" style="" id="quantity" min="1" class="form-control" placeholder="QTY" required="" data-live-search="rate"  title="Please select a Quantity ...">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
                                            </div>

                                            <div class="col-lg-2" style="width: 230px;">    <div class="form-group">

                                                    <select id="uom" style="" class="form-control"  data-live-search="false" required="" title="Please select a UOM ...">

                                                    </select>
                                                </div></div>
                                            <div class="col-lg-1">  <div class="form-group">

                                                    <input type="number" class="form-control" step="any" min="1" required="" title="Rate" id="rate" placeholder="Rate" name="rate">
                                                </div></div>
                                            <div class="col-lg-1">  <input type="submit" data-toggle="modal" data-target="#myModal3"  class="btn btn-default" value="Add Item"></div>


                                        </div>

                                    </form></div>
                            </div>

                        </div></div>



                    <center><input type="text" placeholder="Special Instructions" name="special" id="specials" style="width: 450px" class="form-control">
<br><br><input type="button"  value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>

















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
                            <input type="text"  title="Name Only Characters Are Allowd" required="" class="form-control"  placeholder="Name" id="careOfOrConsigneeName" name="careOfOrConsigneeName">
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
                            <input type="text" class="form-control" id="name_cons" title="Name Only Characters Are Allowed"  required="" placeholder="Name" name="name1">
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
                            <input type="number"  class="form-control" onblur="lookup(this.value)" maxlength="6" title="Only Numbers Are Required Must be 6 Digits"   required="" placeholder="Pincode" name="pincode">
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
    <div class="modal fade" id="myModal18" data-backdrop="static" role="dialog">
        <div class="modal-dialog">
            <form id="add_from_congs"  role="form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Consignee Details Add</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" id="cmps_from_id" value="" name="companyId">


                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="text" class="form-control" id="name_cons1" title="Name Only Characters Are Allowed"  required="" placeholder="Name" name="name1">
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
                            <input type="number"  class="form-control" onblur="lookup5(this.value)" maxlength="6" title="Only Numbers Are Required Must be 6 Digits"   required="" placeholder="Pincode" name="pincode">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                            <input type="text"  class="form-control" id="add_from_city" required="" placeholder="City"  name="city">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">State</label>
                            <input type="text"  class="form-control" readonly id="add_from_state" required="" placeholder="State" name="state">
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
            $("#confirm_btn").click(function () {
                delete_row1(rows_id,row_titles);
            });


            $("#confirm_bom_btn").click(function () {
                delete_bom_row(rows_id_bom);
            });
            $("#add_items1").submit(function () {

                bom_add_table();
                return false;
            })
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
            $("#search_id").focus();

            $('#main').bootstrapValidator({
                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {
                    if( $("#challan").val()=="STOCKTRANSFER" && $("#co_to").val()=="")
                    {
                        show_modal("Please Select From Consignee");
                        $("#co_to").focus();

                    }else {
                        if($("#tbd1 tr").length>0 || $("#tbd tr").length>0){

                        var main_date = $("#dtp_input2").val();




                        var instruction = $("#specials").val();

                        if (instruction != "") {
                            instruction = $("#specials").val();
                        }
                        else {
                            instruction = "--";
                        }




                                var bom_id=$("input[name='bom_id[]']")
                                    .map(function () {
                                        return $(this).val();
                                    }).get();
                                var bom_qty=$("input[name='bom_quan1[]']")
                                    .map(function () {
                                        return $(this).val();
                                    }).get();
									 var bom_item=$("input[name='bom_item1[]']")
                                   .map(function () {
                                  return $(this).val();
                                      }).get();

                                   var bom_des=$("input[name='bom_des1[]']")
                                 .map(function () {
                                    return $(this).val();
                                  }).get();

                                  var bom_rate=$("input[name='bom_rate1[]']")
                                 .map(function () {
                                     return $(this).val();
                                  }).get();
								  
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


                                var md = $("#main_company_id").val();
                                //$("#cof").val()+""+$("#co").val()+""+$("#challan_no").val()
                                //""+main_date+""+$("#cerena_ref").val()+""+$("#c_no").val()+""+$("#consignee_name").val()+""+$("#consignee_mob").val()+""+$("#challan").val();

                                if ($("#challan").val() == "STOCKTRANSFER") {
                                    var ware_id = '-';

                                } else {
                                    ware_id = $("#warehouse_id").val();
                                }
                                var main_query;

                                /*    var main_query = {
                                 'companyId': $("#sales_off").val(),
                                 'coID': $("#cof").val(),
                                 'consigneeID': $("#co").val(),
                                 'chalanNO': $("#challan_no").val(),
                                 'chalanDate': main_date,
                                 'shipperRefName': $("#cerena_ref").val(),
                                 'shipperRefMobileNo': $("#c_no").val(),
                                 'consigneeRefName': $("#consignee_name").val(),
                                 'consigneeRefMobileNo': $("#consignee_mob").val(),
                                 'Challan_Type': $("#challan").val(),
                                 'instruction': instruction,
                                 'materialItemID': itmess.join("*"),
                                 'quantity': quan1.join("*"),
                                 'uom': uom1.join("*"),
                                 'perUnitPrice': rate1.join("*"),
                                 'old_challan':$("#old_challan").val(),
                                 'order_id':$("#order_id").val(),
                                 'old_order_type':$("#old_order_type").val(),
                                 'shipper_id':$("#typeid").val(),
                                 'warehouse_id':ware_id


                                 };
                                 */

                                //      alert($("#challan").val())

                                if ($("#challan").val() == "STOCKTRANSFER") {
                                    main_query = {

                                        'sales_off': $("#ids_value1").val(),
                                        'shipper_id': $("#ship_id").val(),
                                        'companyId': $("#ids_value1").val(),
                                        'coID': $("#cof").val(),
                                        'order_id': $("#order_id").val(),
                                        'consigneeID': $("#co").val(),
                                        'chalanNO': $.trim($("#challan_no").val()),
                                        'chalanDate': main_date,
                                        'shipperRefName': $("#cerena_ref").val(),
                                        'old_challan': $("#old_challan").val(),
                                        'shipperRefMobileNo': $.trim($("#c_no").val()),
                                        'consigneeRefName': $.trim($("#consignee_name").val()),
                                        'consigneeRefMobileNo': $.trim($("#consignee_mob").val()),
                                        'Challan_Type': $("#challan").val(),
                                        'warehouse_id': "-",
                                        'instruction': instruction,
                                        'materialItemID': itmess.join("*"),
                                        'quantity': quan1.join("*"),
                                        'uom': uom1.join("*"),
                                        'perUnitPrice': rate1.join("*"),
                                        'old_order_type': $("#old_order_type").val(),
                                        'des': des.join("*"),
                                        'company_name': $("#ship_id option:selected").text(),
                                        'shipper_care_of': $("#cof option:selected").text(),
                                        'shipper_cin': $("#Ship_CIN").val(),
                                        'shipper_tin': $("#Ship_TIN").val(),
                                        'shipper_add': $("#addr").val(),
                                        'consignee_name': $("#co option:selected").text(),
                                        'consignee_cin': $("#cin1").val(),
                                        'consignee_tin': $("#tin1").val(),
                                        'consignee_addr': $("#addr1").val(),
                                        'cnf_from_id': $("#co_to").val(),
                                        'company_image': $("#company_image_url").val(),
                                        'company_address': $("#company_address").val(),
                                        'company_names': $("#company_names").val(),
                                        'company_detilas': $("#company_details").val(),
                                        "to_warehouse": "-",
                                        "to_company": "-",
                                        'bom_id':bom_id.join("*"),
                                        'bom_qty':bom_qty.join("*"),
										 'bom_des':bom_des.join("*"),
                                        'bom_item':bom_item.join("*"),
                                      'bom_rate':bom_rate.join("*")


                                    };

                                }else if($("#challan").val()=="STOCKTRANSFERORDER")
                                {


                                    main_query = {
                                        'sales_off': $("#ids_value1").val(),
                                        'shipper_id': $("#ship_id").val(),
                                        'companyId': $("#ids_value1").val(),
                                        'coID': $("#cof").val(),
                                        'order_id': $("#order_id").val(),
                                        'consigneeID': "--",
                                        'chalanNO': $.trim($("#challan_no").val()),
                                        'chalanDate': main_date,
                                        'shipperRefName': $("#cerena_ref").val(),
                                        'old_challan': $("#old_challan").val(),
                                        'shipperRefMobileNo': $.trim($("#c_no").val()),
                                        'consigneeRefName':"-",
                                        'consigneeRefMobileNo':"-",
                                        'Challan_Type': $("#challan").val(),
                                        'warehouse_id': $("#warehouse_id").val(),
                                        'instruction': instruction,
                                        'materialItemID': itmess.join("*"),
                                        'quantity': quan1.join("*"),
                                        'uom': uom1.join("*"),
                                        'perUnitPrice': rate1.join("*"),
                                        'old_order_type': $("#old_order_type").val(),
                                        'des': des.join("*"),
                                        'company_name': $("#ship_id option:selected").text(),
                                        'shipper_care_of': $("#cof option:selected").text(),
                                        'shipper_cin': $("#Ship_CIN").val(),
                                        'shipper_tin': $("#Ship_TIN").val(),
                                        'shipper_add': $("#addr").val(),
                                        'consignee_name': "-",
                                        'consignee_cin':"-",
                                        'consignee_tin': "-",
                                        'consignee_addr': "-",
                                        'company_image': $("#company_image_url").val(),
                                        'company_address': $("#company_address").val(),
                                        'company_names': $("#company_names").val(),
                                        'company_detilas': $("#company_details").val(),
                                        "to_warehouse": $("#to_warehouse").val(),
                                        "to_company": $("#to_company").val(),
                                        'bom_id':bom_id.join("*"),
                                        'bom_qty':bom_qty.join("*"),
										 'bom_des':bom_des.join("*"),
                                       'bom_item':bom_item.join("*"),
                                        'bom_rate':bom_rate.join("*")


                                    };



                                }
                                else {
                                    var a=$("#ids_value1").val();

                                    main_query = {
                                        'sales_off': $("#ids_value1").val(),
                                        'shipper_id': $("#ship_id").val(),
                                        'companyId': $("#ids_value1").val(),
                                        'coID': $("#cof").val(),
                                        'order_id': $("#order_id").val(),
                                        'consigneeID': $("#co").val(),
                                        'chalanNO': $.trim($("#challan_no").val()),
                                        'chalanDate': main_date,
                                        'shipperRefName': $("#cerena_ref").val(),
                                        'old_challan': $("#old_challan").val(),
                                        'shipperRefMobileNo': $.trim($("#c_no").val()),
                                        'consigneeRefName': $.trim($("#consignee_name").val()),
                                        'consigneeRefMobileNo': $.trim($("#consignee_mob").val()),
                                        'Challan_Type': $("#challan").val(),
                                        'warehouse_id': $("#warehouse_id").val(),
                                        'instruction': instruction,
                                        'materialItemID': itmess.join("*"),
                                        'quantity': quan1.join("*"),
                                        'uom': uom1.join("*"),
                                        'perUnitPrice': rate1.join("*"),
                                        'old_order_type': $("#old_order_type").val(),
                                        'des': des.join("*"),
                                        'company_name': $("#ship_id option:selected").text(),
                                        'shipper_care_of': $("#cof option:selected").text(),
                                        'shipper_cin': $("#Ship_CIN").val(),
                                        'shipper_tin': $("#Ship_TIN").val(),
                                        'shipper_add': $("#addr").val(),
                                        'consignee_name': $("#co option:selected").text(),
                                        'consignee_cin': $("#cin1").val(),
                                        'consignee_tin': $("#tin1").val(),
                                        'consignee_addr': $("#addr1").val(),
                                        'company_image': $("#company_image_url").val(),
                                        'company_address': $("#company_address").val(),
                                        'company_names': $("#company_names").val(),
                                        'company_detilas': $("#company_details").val(),
                                        "to_warehouse": "-",
                                        "to_company": "-",
                                        'bom_id':bom_id.join("*"),
                                        'bom_qty':bom_qty.join("*"),
                                       'bom_des':bom_des.join("*"),
                                      'bom_item':bom_item.join("*"),
                                    'bom_rate':bom_rate.join("*")

                                    };


                                }
//alert("dddd")

//alert(JSON.stringify(main_query))
                                $("#myModal12").fadeIn();
                                $("#mes").html("<img src='loader1.gif'>");
                                $.post("update_items.php", main_query, function (ho) {


                                    $("#mes").html(ho);

                                });










                            }
                            else
                            {


                                show_modal("Please Add Item");
                            }




                    }
                },
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

                    co:{
                        message: 'Please Select Consingnee',
                        validators: {
                            notEmpty: {
                                message: 'Please Select Consingnee'
                            }

                        }
                    },
                    shipper:{
                        message: 'Please Select Shipper',
                        validators: {
                            notEmpty: {
                                message: 'Please Select Shipper'
                            }

                        }
                    },
                    cof:{
                        message: 'Please Select Care off',
                        validators: {
                            notEmpty: {
                                message: 'Please Select Care Off'
                            }

                        }
                    },

                to_company:{
                        message: 'Please Select To Company',
                        validators: {
                            notEmpty: {
                                message: 'Please Select To Company'
                            }

                        }
                    },
                    co_to:{
                        message: 'Please Select From Consignee',
                        validators: {
                            notEmpty: {
                                message: 'Please Select From Consignee'
                            }

                        }
                    },
                to_warehouse:{
                    message: 'Please Select To Warehouse',
                    validators: {
                        notEmpty: {
                            message: 'Please Select To Warehouse'
                        }

                    }
                },

                    cerena_reference: {
                        message: 'The  Reference Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Reference Name  is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Reference Name  be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[ a-z .]+$/i,
                                message: 'The Reference Name cannot be number or special character'
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
                    }


                }

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

                $("#main_subs").removeAttr("disabled","disabled")
                $("#main_subs").click();
            });
            $('#bom_autocomplete').autoComplete({
                minChars: 0,
                source: function (term, suggest) {
                    term = term.toLowerCase();
                    var choices = get_bom_data();//['ActionScript', 'AppleScript', 'Asp', 'Assembly', 'BASIC', 'Batch', 'C', 'C++', 'CSS', 'Clojure', 'COBOL', 'ColdFusion', 'Erlang', 'Fortran', 'Groovy', 'Haskell', 'HTML', 'Java', 'JavaScript', 'Lisp', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'Scala', 'Scheme', 'SQL', 'TeX', 'XML'];
                    var suggestions = [];
                    for (var i = 0; i < choices.length; i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
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

    location.reload();

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



                $("#cmpid").val($("#ids_value1").val());

                var prs = $(this).serialize();

                $.post("newShipAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal').modal('hide');
                        show_modal("Data Added Successfully");

                        var id = $('#ids_value1').val();

                        load_careoff($("#careOfOrConsigneeName").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        }));
                        $("#add_mores")[0].reset();
                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
            });

            $("#add_congs").submit(function () {



                $("#cmps_id").val($("#ids_value1").val());

                var prs = $(this).serialize();

                $.post("newCondAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal1').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();
                        var id = $('#ids_value1').val();
                        load_careoff1($("#name_cons").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        }));
                        $("#add_congs")[0].reset();
                        load1(id);


                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
            });
            $("#add_from_congs").submit(function () {



                $("#cmps_from_id").val($("#ids_value1").val());

                var prs = $(this).serialize();

                $.post("newCondAdd.php", prs, function (dc) {

                    //  $(this)[0].reset();
                    if ($.trim(dc) == "Y") {


                        $('#myModal18').modal('hide');
                        show_modal("Data Added Successfully");
                        //load();
                        var id = $('#ids_value1').val();
                        load_careoff2($("#name_cons1").val().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        }));
                        $("#add_from_congs")[0].reset();
                        load1(id);


                    }
                    else {


                        show_modal($.trim(dc));
                    }


                });


                return false;
            });
$("#search_challan").submit(function()
{






    search_challan();

    return false;
});




          $(".glyphicon").click(function()
          {

           //   alert("");



          })  ;




        });

        ///

function get_to_company(a)
{

    var parse = {"cmp_id":a};
    $.post("getToClientList.php", parse, function (ty) {


        var obj = JSON.parse(ty);
        var option = "";



        var options = "<option value=''>Select Company</option>";
        var data_append1 = new Array();
        for (var i = 0; i < obj.LIST.length; i++) {


            data_append1[i] = new Array();
            data_append1[i][0] = obj.LIST[i].clientID;
            data_append1[i][1] = obj.LIST[i].company_name;
            options += "<option value='" + data_append1[i][0] + "'>" + data_append1[i][1] + "</option>";

        }

        $("#to_company").html(options);
        //      asn_inbound_details($("#typeid").val());

        get_warehouses($("#to_company").val())
    });


}
        function set_items()
        {



            $("#ids_value").val($("#typeid").val());




        }
        function set_items1()
        {







            $("#ids_value1").val($("#typeid1").val());


            get_warehouse_shipper1($("#ids_value1").val());
            load2($("#ids_value1").val())
            set_me($("#ids_value1").val())


            warehouse_Set($("#ids_value1").val())


        }



        function set_items_company()
        {


            $("#ids_value").val($("#company_typeids").val());





        }
        function set_items_company1()
        {


            $("#ids_value1").val($("#company_typeids1").val());

            get_warehouse_shipper1($("#ids_value1").val());
            load2($("#ids_value1").val())
            set_me($("#ids_value1").val())

            warehouse_Set($("#ids_value1").val())

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
        var aa="";
        function call_by_company1(qq){

            $('#typeid1').val("").attr("selected", "selected");
            $('#cmp_type1>div>select').val("Company").attr("selected", "selected");
            $('#cmp_type1>div>select').change();
            $("#ids_value").val(qq);
        }

        function  call_by_company(ii)
        {/*choices=[];

            $('#search_id').val("");
            $('#ship_id').val("");
            $('#Ship_CIN').val("");
            $('#Ship_TIN').val("");
            $('#cof').val("");
            $('#addr').val("");
            $('#cerena_ref').val("");
            $('#c_no').val("");
            $('#co').val("");
            $('#cin1').val("");
            $('#tin1').val("");
            $('#addr1').val("");
            $('#consignee_name').val("");
            $('#consignee_mob').val("");
            $('#co_to').val("");
            $('#cin1_to').val("");
            $('#tin1_to').val("");
            $('#addr1_to').val("");
            $('#challan_no').val("");
            $('#warehouse_id').val("");
            $('#dates').val("");
            $('#tbd>tr').val("");

            $('#company_typeids1').val($('#company_typeids').val()).attr("selected", "selected");
            //$('#company_typeids1').val($('#company_typeids').val());
            $('#company_typeids1').change();
            //$('#search_id').val("");
*/
            $('#typeid').val("").attr("selected", "selected");
          //  $('#typeid1').val("").attr("selected", "selected");


            $('#cmp_type>div>select').val("Company").attr("selected", "selected");
            $('#cmp_type>div>select').change();



        }

function call_by_sales1(aa){
    $('#company_typeids1').val("").attr("selected", "selected");
    $('#cmp_type1>div>select').val("Sales Office").attr("selected", "selected");
    $('#cmp_type1>div>select').change();

}
        function call_by_sales(dd)
        {

            $('#company_typeids').val("").attr("selected", "selected");
            $('#company_typeids1').val("").attr("selected", "selected");
            $('#cmp_type>div>select').val("Sales Office").attr("selected", "selected");
            $('#cmp_type>div>select').change();


            //get_warehouse_shipper(dd)
           // get_material();

            //load1(dd)

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
        function set_cmp1(a)
        {


            if(a=="Company")
            {

                set_items_company1();
            }
            else if(a=="Sales Office")
            {



                set_items1()

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
        function hit_me()
        {

if($("#search_id").val()!="") {
    $("#search_challan").submit();
    return false;
}else
{


    show_modal("Please Enter The Challan No..")

}
        }
        function get_warehouses(g)
        {
            /* $("#main")
             .data('bootstrapValidator')
             .updateStatus("to_warehouse", 'NOT_VALIDATED')
             .validateField("to_warehouse");*/
            // $("#to_warehouse").html("<option value=''>Select Warehouse</option>");

            query1 = {"sales_off": g};
            $.get("get_warehouse.php", query1, function (hd) {


                var obj = JSON.parse(hd);


                dataw = new Array();


                var warehouseOptions = "<option value=''>Select Warehouse</option>";
                var out = new Array();

                for (var i = 0; i < obj.WAREHOUSE.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.WAREHOUSE[i].warehouseId;
                    dataw[i][1] = obj.WAREHOUSE[i].wareHouseName;
                    /*   datak[i][2] = obj.LIST[i].tinNo;
                     datak[i][3] = obj.LIST[i].cinNo;*/
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    warehouseOptions = warehouseOptions + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";


                    // alert(datak[i][2]);
                    //alert(data[i][1]);

//                        alert(warehouseOptions);


                }
                /* $("#Ship_TIN").val(datak[0][2]);
                 $("#Ship_CIN").val(datak[0][3]);*/

                    $("#to_warehouse").html(warehouseOptions);






                $("#main")
                    .data('bootstrapValidator')
                    .updateStatus("to_warehouse", 'NOT_VALIDATED')
                    .validateField("to_warehouse");


            });



        }

        function load2(ar1)
        {

            //    get Sale Office To append




            query={"client_id":ar1};
            $.get("Add_cong.php",query,function(kj)
                {



                    //alert(a+" load1");
                    setCongAdd2(kj);


                }
            );





            query={"client_id":ar1};
            $.get("add_cof.php",query,function(kjj)
                {



                    //alert(a+" load1");
                    setConf2(kjj);

//alert(kjj+"consignee")
                }
            );
        }

var care_Addr="";
        function setCongAdd2(arr) {

            $("#co").html("")
            var obj = JSON.parse(arr);
care_Addr=arr;

          var data1=new Array();

            var levelOptions1="";
            var optionss="<option value=''>Select</option>";
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
            for(var h=0;h< k.length;h++)
            {

                optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

            }







            // $("#co option").remove();


            $("#co").html(optionss);
            $("#co_to").html(optionss);
$("#edit_care1").html(optionss);



$("#co").val("").attr("selected","selected");
        }



function get_Addrs()
{

   return JSON.parse(care_Addr);

}


        function setConf2(arr) {
$("#cof").html("");
           var obj=JSON.parse(arr);




          var data1=new Array();

            var levelOptions1="";
            var optionss="<option>Select</option>";
            var optionss1="<option>Select</option>";
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
            for(var h=0;h< k.length;h++)
            {

                optionss=optionss+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";
                optionss1=optionss1+"<option value='"+k[h][1]+"'>"+k[h][0]+"</option>";

            }


            $("#cof").html(optionss);
            $("#edit_care").html(optionss);


$("#cof").change();


        }



        function cin_change(a)
        {

            $("#Ship_TIN").val("");
            $("#Ship_CIN").val("");
         var   query1 = {"sales_off": $("#ids_value1").val()};
            $.get("get_warehouse.php", query1, function (hd) {

                var obj = JSON.parse(hd);



               var shipper = new Array();




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

if($.trim(a)==$.trim(shipper[i][0])) {

    $("#Ship_TIN").val(shipper[i][2]);
    $("#Ship_CIN").val(shipper[i][3]);
}
                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //                        alert(warehouseOptions);


                }


            });


        }

        function  load_careoff(fr)
        {




            var sets="";
            query={"client_id":$("#ids_value1").val()};
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
        function  load_careoff1(fr)
        {




            var sets="";
            query={"client_id":$("#ids_value1").val()};
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
                $("#co_to").html(optionss);
                //    $('#main').bootstrapValidator('revalidateField', 'cof');

                $("#co option").filter(function() {

                    return this.text == fr;
                }).attr('selected', true);


                var sd=$("#co").val();


                set_careoff_address1(sd,sets);

            });



        }
        function  load_careoff2(fr)
        {




            var sets="";
            query={"client_id":$("#ids_value1").val()};
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



                $("#co_to").html(optionss);


                //    $('#main').bootstrapValidator('revalidateField', 'cof');

                $("#co_to option").filter(function() {

                    return this.text == fr;
                }).attr('selected', true);


                var sd=$("#co_to").val();


               con_call_to(sd);

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