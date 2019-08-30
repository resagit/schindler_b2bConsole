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


    <script type="text/javascript">

    var choices=new Array();
    function load()
    {

        set_menus('<?php echo $_SESSION['list']?>');
        $.get("companylist.php","",function(hd)
        {

          //  alert(hd);

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
            //   $("#Ship_TIN").val(datak[0][2]);
            //   $("#Ship_CIN").val(datak[0][3]);
            $("#company_name").html(levelOptions);
            //  var ids = $("#sales_off").val();

            get_sale_office();

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
        var client_id=document.getElementById('company_name').value;
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
        //get_warehouse_shipper();
        // load1(sales_id);
        get_ui_tabs();
    }





    //////////////get UI ROLES////////////////////
var role;
    function get_ui_tabs()
    {
        var sales_off=$('#sales_off').val();
      //  alert(sales_off);
        query1 = {"sales_off": sales_off};
        $.post("getUiTabsForProject.php", query1, function (hd) {
            choicess=[];

            $("#user_role").html('');
        //    alert(hd);
            if($.trim(hd)=='N')
            {
                $("#user_role").html('');
                show_modal("NO role Avialble");
            }else {
                $('#ui_table').html("");
                var obj = JSON.parse(hd);


                dataw = new Array();
                dataww = new Array();

                $('#ui_table').html();
                var uirole = "";
                var out = new Array();
                for (var i = 0; i < obj.LIST.length; i++) {

                    dataw[i] = new Array();
                    dataw[i][0] = obj.LIST[i].uiRoleID;
                    dataw[i][1] = obj.LIST[i].roleName;

$('#ui_table').append("<tr><td><input type='checkbox' style='margin:20px' class='check_role' name='check_role' id='check_role'  value='"+dataw[i][0]+"'></td><td>"+dataw[i][1]+"</td><td><input type='text'class='form-control pos'id='pos'  name='pos' style='width: 30%' ></td></tr>");

                }

                //$('.pos').attr('disabled','disabled');
                $("input[name='pos']").attr("disabled", true);

                $(".check_role").click(function()
                {


                    if($(this).prop("checked")==true)
                    {

                        $(this).parent().parent().find("input[type=text]").removeAttr("disabled");
                        $(this).parent().parent().find("input[type=text]").val($(".check_role:checked").length);



                    }
                    else
                    {
                        $(this).parent().parent().find("input[type=text]").val("");

                        $(this).parent().parent().find("input[type=text]").attr("disabled","disabled");


                    }

                    var chkArray = [];

                    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                    /*if($('.check_role').prop("checked")==false)
                     {
                     count--;
                     alert(count);
                     }else{*/

                    $(".check_role:checked").each(function() {
                        chkArray.push($(this).val());
                        //  count++;
                        //  alert(count);\
                        // alert(chkArray+"checl ");
                    });
                    //}
                    count= $(".check_role:checked").length;
                //    alert(count);
                    /* we join the array separated by the comma */
                    var selected;
                    selected = chkArray.join('*');
                       role=selected;
                    /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
                    if(selected.length > 1){
                      //  alert("You have selected " + selected);
                    }else{
                        show_modal("Please at least one of the checkbox")
                        //alert("Please at least one of the checkbox");
                    }



                })


            }
        });


    }
    var count=0;


    function getValueUsingClass(chk){
        /* declare an checkbox array */
//alert(chk)

        var txt = chk.parentNode.parentNode.cells[2].getElementsByTagName('input')[0];

        if(chk.checked == false)
        {
            txt.value = "";
            txt.removeAttr("disabled");
        }else
        {
            txt.prop("disabled");
        }
        var chkArray = [];

        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        /*if($('.check_role').prop("checked")==false)
        {
            count--;
            alert(count);
        }else{*/

        $(".check_role:checked").each(function() {
            chkArray.push($(this).val());
          //  count++;
          //  alert(count);\
           // alert(chkArray+"checl ");
        });
        //}
        var selected;
        selected = chkArray.join('*');

     //   alert(role+" role");
         count= $(".check_role:checked").length;
//alert(count+" greg"+selected);
        /* we join the array separated by the comma */

//alert(selected);
        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if(selected.length > 1){
           // alert("You have selected " + selected);
        }else{
            alert("Please at least one of the checkbox");
        }


    }


   function check_pos()
   {
       //if ($("#ui_table>tr").length > 0) {
      //     alert($("input[name='pos[]']").is("readonly"));
       // $('input[name="pos"][readonly]').css('color','red');
     // $('input[name="pos"]').is("disabled").val("data");
vals=[];
       ogval=[];
       var ko="";
       var fields = $("#ui_table").find("input[type='text']");
       fields.each(function(index, element) {
           var isDisabled = $(element).is(':disabled');

           if(isDisabled) {
               //   $(element).prop('disabled', false);

              // alert($(element).val());
               ko=true;
           } else {
            //   alert($(this).val()+"count");
              vals.push($(this).val());
               ogval.push($(this).val());

              // ko=;

           }
       });
//alert(vals+"vals nd cont "+count);
      var sorted=[];// vals;
       sorted=vals;
       sorted.sort();
       var position;
       position=ogval.join("*");
      // alert(sorted+"SOTR AND VAL "+vals+"og "+ogval+" pos"+position);
       var j=1;
       var status="";
       for(var i=0;i<count;i++)
       {
           if(ogval[i]==j)
           {
            //   alert("true"+i+" "+ogval[i]+" "+j)
               status='true';
           }else{
             // / alert('false'+ogval[i]+" "+j);
              //show_modal("Please Give Proper UI Position not more then"+c);
               status='false';
           }
           j++;
       }

       if(status=='true')
       {
           // alert(role+" "+position);
var d="&role_id="+role+"&position="+position;
         var  data_pass=$('#main').serialize();
          data_pass+=d;
           $.get("new_role.php",data_pass, function (hd) {


               var a = hd;

               if($.trim(a)=='Y')
               {
                   show_modal("User Role Created Successfully");
                   setTimeout(function(){
                   window.location.reload();},1500)
                  // $("#sales_off").html('');
               }else if($.trim(a)=='N'){
                   show_modal("Failed To Create Role..");
                 //  set_sale_office(a);
               }else{
                   show_modal("Failed To Create Role");
               }
           });

       }else if(status=='false')
       {
           show_modal("Please Give Proper UI Position not more than "+count);
       }else
       {

       }

   }



       //}
//alert(vals);/**/


  /* var val = $(this).closest('tr').find('#pos').val();
       alert(val);*/





    function ui_description()
    {
        var role_id= $("#user_role").val();
        // alert(role_id+"Roleid");
        var  x='';
        $.post("get_ui_roles.php", query1, function (hd) {
            $('#ui_desc').html(" ");
            choicess=[];

           // alert(hd);
            if($.trim(hd)=='N')
            {
                $("#user_role").html('');
                show_modal("No UI ROLES for this Sales office");
            }else {
                var obj = JSON.parse(hd);


                //   dataw = new Array();
                dataww = new Array();


                var uirole = "";
                var out = new Array();

                for (var i = 0; i < obj.UIROLE.length; i++) {

                    dataww[i] = new Array();
                    dataww[i][0] = obj.UIROLE[i].roleID;
                    dataww[i][1] = obj.UIROLE[i].roleName;
                    //  dataw[i][2] = obj.UIROLE[i].description;
                    //   datak[i][2] = obj.LIST[i].tinNo;
                    //   datak[i][3] = obj.LIST[i].cinNo;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;

                    //   uirole = uirole + "<option  id=" + i + " value = " + dataw[i][0] + ">" + dataw[i][1] + "</option>";


                    // alert(datak[i][2]);
                    // alert(dataww[i][0]+"DATA");

//alert(choicess);
                    //                        alert(warehouseOptions);

                    if($.trim(role_id)==$.trim(dataww[i][0]))
                    {
                        //  alert('same');
                        choicess.push(dataww[i][1]);
                        x= choicess.join(",");

                        //$('#ui_desc').html("Current Stock for selected warehouse");
                        $('#ui_desc').append("<tr><td>"+dataww[i][1]+"</td></tr>");

                    }
                    //   $('#ui_desc').html(x);
                    console.log(choicess+" "+x);
                }

                //   $("#user_role").html(uirole);
            }
        });

    }



    //////////////////Get UI ROLES ENDS////////////////
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
//alert(z);
        dg={"pincode":z};
        $.get("pincode.php",dg,function(xs)
        {

            setState(xs);



        });


    }

    function setState(ams)
    {

        $("#shipper_city").val("");
        $("#shipper_state").val("");
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
            document.getElementById('shipper_city').value=data11[0][0];
            document.getElementById('shipper_state').value=data11[0][1];
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


    function create_shipper()
    {






        /*   var company_type= $("#company_type").val();
         var client_name= $("#client_name").val();
         var company_name= $("#company_name").val();
         var client_mobile= $("#client_mobile").val();
         var client_alt_mobile= $("#client_alt_mobile").val();
         var client_cin= $.trim($("#client_cin").val().replace(" ",""));
         var client_tin= $("#client_tin").val();
         var client_email= $("#client_email").val();
         var client_pan= $("#client_pan").val();
         var client_cnt_name= $("#client_cnt_name").val();
         var client_cnt_no= $("#client_cnt_no").val();
         var client_add1= $("#client_add1").val();
         var client_add2= $("#client_add2").val();
         var client_pin= $("#client_pin").val();
         var client_city= $("#client_city").val();
         var client_state= $("#client_state").val();
         var client_bank= $("#client_bank").val();
         var client_acc_no= $("#client_acc_no").val();
         var client_ifsc= $("#client_ifsc").val();
         var client_bank_branch= $("#client_bank_branch").val();*/
        console.log( $('#main').serialize());





        // alert(company_type+" "+client_name+" "+company_name+" "+client_mobile+" "+client_alt_mobile+" "+client_cin+" "+client_tin+" "+client_email+" "+client_pan+" "+client_cnt_name+" "+client_cnt_no+" "+client_add1+" "+client_pin+" "+client_city+" "+client_state+" "+client_bank+" "+client_acc_no+" "+client_ifsc+" "+client_bank_branch  );

        /*  alert(it+" "+desc+" "+unit+" "+rat+" "+quantity);
         var   ar= it.join("*");
         var qa= quantity.join("*");
         var ra= rat.join("*");
         var ua= unit.join("*");
         var de=desc.join("*");
         alert(ar+" item "+q                                                           a+" quan"+ra+" rate"+ua+" unit"+de);*/
        /*
         var main_query = {
         'company_type': $("#company_type").val(),
         'client_name': $("#client_name").val(),
         'company_name': $("#company_name").val(),
         'client_mobile': $("#client_mobile").val(),
         'client_alt_mobile': $("#client_alt_mobile").val(),
         'client_cin': $.trim($("#client_cin").val().replace(" ","")),
         'client_tin': $("#client_tin").val(),
         'client_email':$("#client_email").val(),
         'client_pan': $.trim($("#client_pan").val()),
         'client_cnt_name': $.trim($("#client_cnt_name").val()),
         'client_cnt_no': $("#client_cnt_no").val(),
         'client_add1':$("#client_add1").val(),
         'client_add2':$("#client_add2").val(),
         'client_pin':$("#client_pin").val(),
         'client_city':$("#client_city").val(),
         'client_state':$("#client_state").val(),
         'client_bank':$("#client_bank").val(),
         'client_acc_no':$("#client_acc_no").val(),
         'client_ifsc':$("#client_ifsc").val(),
         'client_bank_branch':$("#client_bank_branch").val()



         };
         */
        //  console.log(main_query);
        $("#myModal12").fadeIn();
        $("#mes").html("<center><img src='loader1.gif'></center>");
//md={"kk":$("#typeid").val(),"ks":"sd"};
      //  alert($('#main').serialize());
        $.get("createSalesOfficeUser.php", $('#main').serialize(), function (ho) {

           // alert(ho);
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

            //  $("#mes").html(ho);
            if($.trim(ho)=="Y")
            {
                $("#mes").html("Sales Office user for "+$('#company_name :selected').text()+ "  Created");
            }else if($.trim(ho)=="N")
            {
                $("#mes").html("Failed to Create Sales Office for "+$('#company_name :selected').text()+"..");
            }
            else if($.trim(ho)=="A")
            {
                $("#mes").html("User Name Is already created for "+$('#company_name :selected').text()+"..");
            }else
            {
                $("#mes").html("Failed to Create  Sales Office "+$('#company_name :selected').text());
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
                            Create Sales Office Role

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
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Create Role</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <!---->
                                        <!--    <input type="hidden" name="companyId" id="cmpid">-->
										<div class="col-md-12">
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Master Client:</label>
													<select  class="form-control" name="company_name" required="" id="company_name"  onchange="get_sale_office()">
														<option value=" ">Select</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">	
												<div class="form-group">
													<label for="exampleInputPassword1">Sales Office:</label>
													<select  class="form-control" name="sales_off" required="" id="sales_off" >
														<option value=" ">Select</option>
													</select>
												</div>
											</div>
										</div>	
										<div class="col-md-12">
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Role Name:</label>
													<input type="text"  title="Name Only Characters Are Allowd" required="" id="role_name" class="form-control"  placeholder="Role  Name" name="role_name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="exampleInputPassword1">Role Desciption:</label>
													<input type="text"  class="form-control"  required="" id="role_desc"   placeholder="Role Description" name="role_desc">
												</div>
											</div>
										</div>
                                        <div class="col-md-12">
											<div class="form-group">			
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Select</th>
															<th> UI Role Name</th>
															<th>UI Position</th>
														</tr>
													</thead>
													<tbody id="ui_table"></tbody>
												</table>
											</div>
										</div>
                                    </div>
									<div class="col-md-12">
                                        <center>
                                            <input type="submit" value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mainss">
										</center>
											<br><br>
									</div>		
								</div>
							</div>
						</div>
					</form>
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
            <div class="modal-content"> 
				<form id="add_mores"   role="form">
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
                            <label for="exampleInputPassword1">Contact Name</label>
                            <input type="text"  pattern="[a-zA-Z ' ]+"  class="form-control" required="" id="contact1" placeholder="Contact Name" name="contactname" title="Only Characters are required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mobile No.</label>
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
        $("#challan_no").focus();

        $('#main').bootstrapValidator({
            live: 'enabled',

            submitButton: '$form_unloading button[type="submit"]',
            submitHandler: function(validator, form, submitButton) {





                check_pos();


                return false;
            },
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                shipper_name: {
                    message: 'The Name No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The name no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Name no be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z 0-9-]+$/i,
                            message: 'The Name cannot be special character'
                        }

                    }
                },
                last_name: {
                    message: 'The Last Name  is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The name no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Name no be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z 0-9-]+$/i,
                            message: 'The Name cannot be special character'
                        }

                    }
                },

                company_name: {
                    message: 'The Company Name No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Company Name  is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Company Name  be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z 0-9-]+$/i,
                            message: 'The Company Name  cannot be number only character'
                        }

                    }
                },
                client_cnt_name: {
                    message: 'The  Reference Name No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The  Reference Name  is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The  Reference Name  be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z 0-9-]+$/i,
                            message: 'The  Reference Name cannot be number only character'
                        }

                    }
                },
                mobile_no: {
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
                user_name:{
                    validators: {

                        emailAddress: {
                            message: 'The USER NAME  is not valid:username@companyname.xyz'
                        }
                    }
                },
                client_cnt_no: {
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
                client_pan: {
                    message: 'The Pan Card No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Pan Card No is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
                            message: 'The Pan Card No is incorrect'
                        }

                    }
                },
                client_ifsc: {
                    message: 'The IFCS CODE is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The IFCS CODE is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[A-Z|a-z]{4}[0][\d]{6}$/,
                            message: 'The IFCS CODE No is incorrect'
                        }


                    }
                },


                shipper_pincode: {
                    message: 'The Pincode is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Pincode is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]{1,6}$/,
                            message: 'The Pincode No is incorrect'
                        }


                    }
                },
                client_bank: {
                    message: 'The Bank Name No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Bank name no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 40,
                            message: 'The Bank Name no be more than 2 and less than 40 characters long'
                        },
                        regexp: {
                            regexp: /^[a-z 0-9-]+$/i,
                            message: 'The Bnak Name cannot be special character'
                        }

                    }
                },
                client_acc_no: {
                    message: 'The Bank Acc no No is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Bank Acc no no is required and cannot be empty'
                        }


                    }
                },
                client_bank_branch: {
                    message: 'The Bank Branch Code is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Bank Branch Code is required and cannot be empty'
                        }


                    }
                },
                shipper_tin: {
                    message: 'The Tin no is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Tin no is required and cannot be empty'
                        }


                    }
                },
                shipper_cin: {
                    message: 'The Cin no is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Cin no is required and cannot be empty'
                        }


                    }
                },
                shipper_vat: {
                    message: 'The VAT no is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The VAT no is required and cannot be empty'
                        }


                    }
                },
                shipper_add1: {
                    message: 'The Address 1 is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Address 1 is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 140,
                            message: 'The Address 1  be more than 2 and less than 140 characters long'
                        }


                    }
                },
                shipper_add2: {
                    message: 'The Address 2 is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The Address 2 is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 140,
                            message: 'The Address 2 be more than 2 and less than 140 characters long'
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




      //  $("#pos").attr("disabled", true);
        $(".dropdown").click(function()
        {


            $(this).parent().children("ul").slideToggle();



        });
        $(".sub-dropdown").click(function()
        {
            $(this).parent().slideDown();
            $(this).children().parent().find("ul").slideToggle();



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