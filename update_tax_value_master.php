

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
        <script type="text/javascript" src="">
		

		
		
		</script>

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

			
			var addeditems=new Array();
            function get_cmp_list()
            {


set_menus('<?php echo $_SESSION['list']?>');
  $.post("get_tax_value.php","",function(ty)
                {


					var obj=JSON.parse(ty);
                    var data_aaray=new Array();
					
					
					
					   for(var i = 0; i < obj.tax.length; i++)
                    {
						data_aaray[i]=new  Array();
                        data_aaray[i][0]=obj.tax[i].taxID;
						
                        data_aaray[i][1]=obj.tax[i].taxName;
						data_aaray[i][2]=obj.tax[i].taxAmount;
						data_aaray[i][3]=obj.tax[i].taxAmountUOM;
						 data_aaray[i][4]=obj.tax[i].taxValueID;
						 var per="";
						if(data_aaray[i][3]=="%")
						{
							per="per";
							
						}
											
						 $("#tbd").append("<tr><td><input type='hidden'  name='taxID' id='taxIDs' class='form-control'  disabled ='disabled' value='"+data_aaray[i][0]+"'></td><td><input type='hidden'  name='taxValueID' id='taxValueIDs' class='form-control'  disabled ='disabled'  value='"+data_aaray[i][4]+"'></td><td><input type='text'  name='taxName[]' id='taxNames'  class='form-control'  disabled ='disabled'  value='"+data_aaray[i][1]+"'></td><td><input  type='number' name='taxAmount[]' id='taxAmounts' class='form-control'  disabled ='disabled' value='"+data_aaray[i][2]+"'></td><td><select class='form-control' name='taxAmountUOM[]' id=''   disabled ='disabled'  ><option value='"+per+"' id='taxAmountUOMs'>"+data_aaray[i][3]+"</option></select></td><td><button type='button'  style='display:none;' class='btn btn-success'>Save</button> <i onclick='edit_table(this)' class='fa fa-edit'> </i></td></tr>")
						 
						 
						 //addeditems.push(data_aaray[i][0]);
						 
						 
						 
						
  
					
					}
					
					
					
					



                
				});
			}

		function delete_row(row)
            {

alert("dddee");

                var i=row.parentNode.parentNode.rowIndex;
                alert(i+" "+index+" "+row);
                var n=i-1;
                document.getElementById('tbd').deleteRow(n);

                addeditems.splice(n,1);
                //indexs--;






            }
			
			function edit_table(a)
				{


			   
					
				$(a).parent().parent().find("button").show();		
				$(a).parent().parent().find("td:eq(3)").find("input[type='number']").removeAttr("disabled");
			$(a).parent().find("button").click(function()
			{
					var taxID=$(a).parent().parent().find("td:eq(0)").find("input[type='hidden']").val();
					var taxValueID=$(a).parent().parent().find("td:eq(1)").find("input[type='hidden']").val();
					 var taxNames=$(a).parent().parent().find("td:eq(2)").find("input[type='text']").val();
					 var taxAmounts=$(a).parent().parent().find("td:eq(3)").find("input[type='number']").val();
				 var taxAmountUOM=$(a).parent().parent().find("td:eq(4)").find("select").val();
					//var query={ "taxID":taxID, "taxValueID":taxValueID, "taxAmountUOM":taxAmountUOM, "taxAmount":taxAmount };
					
					var query={"taxID":taxID,
					"taxValueID":taxValueID,
					//"taxAmountUOM":$("#taxAmountUOM").val(),
					"taxAmountUOMs":taxAmountUOM,
					"taxAmount":taxAmounts
					
						
					};
					$.post("tax2_value.php",query,function(tk)
                        {


                            if($.trim(tk)=="Y")
                            {
                                $(a).parent().find("button").hide();
                                $(a).show();
                               // $(a).parent().find("select").hide();

                               show_modal("Successfully Updated");

                            }
							else {
								
                                show_modal("Failed to Update")
//alert("fail");
                                //alert(tk)
                            }


                        });
					
					
				})
			
			   
				}
				
           
            //set data



            //end here set data 2




            function set_cmp_list() {
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

            function set_me(n) {
                var queryd = {"company_id": n};
//alert(query);
                $.post("get_material_list.php", queryd, function (iks) {


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


            var ko="";

            



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
                $("#edit_care1").html(optionss);
                $('#co').val(hkk).attr("selected", "selected");

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




            }
        </script>


    </head>

    <body class="bds"  onload="get_cmp_list(this.value);"  >



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

                    

                   
                  <div   class="panel panel-green  margin-bottom-40">

                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
                        </div>


                        <form role="form" id="main">
                            <div class="panel-body">


                                <div class="form-group" >





                            <table class="table table-striped">
                                <thead>
                                <tr>
								       <th></th>
								       <th></th>
                                    <th>Tax Name</th>
                                    <th>Tax Amount</th>
                                    <th>UOM</th>

                                </tr>
                                </thead>
                                <tbody id="tbd">
								

                                </tbody>
                            </table>
                                    </div>
                                </div>








                        </form>
						
                        <center>  <br><br><input type="hidden"  value="Save" class="btn btn-default" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>

                    </div>
					   </div>

					      </div>
						     </div>


               
                  




















              

                <!-- /.row -->

                <!-- /.row -->



                <!-- /.row -->

            
            <!-- /.container-fluid -->

       
        <!-- /#page-wrapper -->

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
   
                    <div class="modal-footer" style="display:none;">
                        <button type="submit" class="btn btn-default" >Update</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

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
            $("#search_id").focus();

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
					
					taxAmount:{
						message: 'The Amount is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Amount is required and cannot be empty'
                            },
                            stringLength: {
                                min: 10,
                                max: 13,
                                message: 'The Amount should be at least 10 digit'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/i,
                                message: 'The Amount  cannot be  character'
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

            
			


                   // var main_date = $("#dtp_input2").val();
                    //    alert(main_date);
                    //  alert(getfuldate($("#dates").val()));
                    ///  alert($("#dates").val());

                    //  var dt = $("#dates").val();
                    //var main_date = getfuldate(dt);
                    //alert(main_date);


                   // var mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

                   if( $("#main").submit())
                   {

                       alert("submited");
					   
					     var taxID = $("input[name='taxID']").val();
						 
							   

                           var taxValueID =$("input[name='taxValueID']").val();
                            					   


                           var taxName= $("input[name='taxName[]']")
						   .map(function () {
                                   return $(this).val();
                               }).get();

						   
                              

							   
                           var taxAmount = $("input[name='taxAmount[]']")
						 .map(function () {
                                   return $(this).val();
                               }).get();


                               
							   
					    var taxAmountUOM = $("select[name='taxAmountUOM[]']")
						.map(function () {
                                   return $(this).val();
                               }).get();

						

					   
					   alert(taxAmountUOM)
					   
					   
					   
					   
					   
					     
                       var mains_query;
                       mains_query=
                       {

                           'taxID': taxID,
						   'taxValueID':taxValueID,
                           'taxName':taxName.join(""),
						   'taxAmount':taxAmount.join(""),
						   'taxAmountUOM':taxAmountUOM.join("")
                          

                       }
					    
                        
                       alert("uu");
                       console.log(mains_query);
                       $.post("tax2_value.php", mains_query, function (ho) {

                           alert(ho+"tax");
                           $("#mes").html(ho);


                       });

                   }
				   else{
					   
					   alert("unsucess");
				   }

                    ///var mq=$('#main i').filter(function () {
                    // return this
                    //}).attr("class");
                    var dds = $("#main").find("i").hasClass("form-control-feedback glyphicon-remove glyphicon");

                    mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

                    var instruction = $("#specials").val();

                    if (instruction != "") {
                        instruction = $("#specials").val();
                    }
                    else {
                        instruction = "--";
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
                                    "to_company": "-"


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
                                    "to_company": $("#to_company").val()


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
                                    "to_company": "-"


                                };


                            }


//alert(main_query.cnf_from_id);


                            ///   console.log(main_query);
                            // alert(it+" "+desc+" "+unit+" "+rat+" "+quantity);
                            /*  var   ar= it.join("*");
                             var qa= quantity.join("*");
                             var ra= rat.join("*");
                             var ua= unit.join("*");
                             var de=desc.join("*");
                             alert(ar+" item "+qa+" quan"+ra+" rate"+ua+" unit"+de);
                             */

//md={"kk":$("#typeid").val(),"ks":"sd"};





                            $("#myModal12").fadeIn();
                            $("#mes").html("<img src='loader1.gif'>");
                            $.post("update_items.php", main_query, function (ho) {


                                $("#mes").html(ho);

                            });










                        }
                        else
                        {


                          //  show_modal("Please Add Item");
                        }

                    }
                    else {


                        var msk = $('#main input[type="text"]').filter(function () {
                            return this.value.length == 0
                        }).attr("id");


                        var msdd = $('#main input[type="text"],input[type="number"]').filter(function () {
                            return this.value.length == 0
                        }).attr("placeholder");

                        var masdd = $('#main input[type="text"],input[type="number"]').filter(function () {
                            return this.value.length == 0
                        }).attr("title");

                        if (msk != undefined) {


                            show_modal("Data Invalid in " + msdd + " fields");
                            $("#" + msk + "").focus();
                        } else {

                            show_modal("Data Invalid in Check in the fields");
                            //$("#" + msk + "").focus();


                        }


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


//            $("#main")
//                .data('bootstrapValidator')
//                .updateStatus("co", 'NOT_VALIDATED')
//                .validateField("co");
//            $("#main")
//                .data('bootstrapValidator')
//                .updateStatus("cof", 'NOT_VALIDATED')
//                .validateField("cof");
//            $("#main")
//                .data('bootstrapValidator')
//                .updateStatus("shipper", 'NOT_VALIDATED')
//                .validateField("shipper");
//            $("#main")
//                .data('bootstrapValidator')
//                .updateStatus("warehouse_id", 'NOT_VALIDATED')
//                .validateField("warehouse_id");




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


            get_warehouse_shipper1(dd)
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
        function hit_me(b)
        {

            if($("#warehouse_id").val()!="") {
                $("#search_challan").submit();
				warehouse();
                return false;
            }else
            {


                show_modal("Please Enter The Challan No..")

            }
        }
		
		
		
		function warehouse(a)
		{
			
			alert("ddfdsfdsf");
			
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
            $("#edit_care1").html(optionss);
            $("#co_to").html(optionss);


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