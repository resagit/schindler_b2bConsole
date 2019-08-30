

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
        <link href="css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
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
                //alert("Dfdsf");
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

            function main_header(cmp_id)
            {


                //alert(cmp_id);
                // $("#append_cmp").html("");

                setData(cmp_id);
                get_material(cmp_id);

            }



            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {

//alert(arr+"setdated");
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

                        levelOptions += "<option  id=" + i + " value = " + datak[i][0] + ">" + datak[i][1] + "</option>";


                        // alert(datak[i][2]);
                        //alert(data[i][1]);

                        //alert(levelOption);


                    }
                    // $("#Ship_TIN").val(datak[0][2]);
                    //$("#Ship_CIN").val(datak[0][3]);
                    $("#company_type").html(levelOptions);
                    // alert( $("#company_type").val(levelOptions));
                    // var ids = $("#sales_off").val();

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


            function get_bom()
            {
                //alert("getffdf");
                var id=$('#company_type').val();
                // alert(id);
                dg={"id":id};
                $.post("get_bom.php",dg,function(xs)
                {
                    //alert(xs);
                    set_bom(xs);

                });


            }


            var price1="";
            function set_bom(a)
            {

                $('#tbd').html("");
                var obj = JSON.parse(a);


                details= new Array();


                var levelOption = "";
                var out = new Array();

                for (var i = 0; i < obj.LIST.length; i++) {

                    details[i] = new Array();
                    details[i][0] = obj.LIST[i].bomID;
                    details[i][1] = obj.LIST[i].bomCode;
                    details[i][2] = obj.LIST[i].bomName;
                    details[i][3] = obj.LIST[i].price;
                    details[i][4] = obj.LIST[i].isActive;
                   // price_val=details[i][3];

                    if(details[i][4]=='1')
                    {
                        $('#tbd').append("<tr><td>"+details[i][1]+"</td><td>"+details[i][2]+"</td><td>"+details[i][3]+"</td><td><input id='"+ details[i][0]+"'  name='Assigned' value='"+details[i][4]+"'  class='toggle-one'  checked type='checkbox'  ></td><td><button id='"+details[i][0]+"' value='"+ details[i][1]+"' name='"+ details[i][2]+"' title='"+ details[i][3]+"' onclick='edit_this(this.id,this.value,this.name,this.title);' class='btn btn-primary'>Edit</button> </td></tr>");
                        $('.toggle-one').bootstrapToggle(
                            {

                                on: 'Active',
                                off: 'Inactive'
                            });
                    }
                    else {
                        $('#tbd').append("<tr><td>"+details[i][1]+"</td><td>"+details[i][2]+"</td><td>"+details[i][3]+"</td><td><input  id='"+ details[i][0]+"' name='Assigned' value='"+details[i][4]+"' class='toggle-one'  Un-checked type='checkbox'  ></td><td><button id='"+details[i][0]+"' value='"+ details[i][1]+"' name='"+ details[i][2]+"' title='"+ details[i][3]+"' onclick='edit_this(this.id,this.value,this.name,this.title);' class='btn btn-primary'>Edit</button> </td></tr>");
                        $('.toggle-one').bootstrapToggle(
                            {

                                on: 'Active',
                                off: 'Inactive'
                            });
                    }
                }
                $('.toggle-one').change(function () {
                   // alert("lkjkj");
                    var status;
                    if ($(this).prop("checked") == true) {
                       // alert("trueeeeeee");
                       // alert($(this).attr("value") == 1);
                        status = 1;
                        //alert(status);


                    } else {
                        //alert("faliseeeeee");
                        //alert($(this).attr("value") == 0);
                        status = 0;
                        //alert(status);
                    }
                    var k = $(this).attr("id");
                    datas = new Array();
                    var datas = {
                        "id": k,
                        "status":status
                        // "active": status

                    };
                   // alert(datas.uom)
                    $.post("activeinactive_bom.php", datas, function (return_datas) {
                        //alert(return_datas );
                        if ($.trim(return_datas) == "Y") {
                            show_modal("Assigned successfully");
                            get_bom();
                            //
//                            //
//                            //                                $(k).removeAttr("disabled");
//                            //                                $(k).removeClass("disabled");
//                            $(k).removeText("Assigned");
//                            //                                $(k).removeClass("assign").addClass("dones");
//                            //
//                            //
                        } 
						else if($.trim(return_datas) =="Created Order for this Bom So you can not Update")
						{
							show_modal("Created Order for this Bom So you can not Update");
                            get_bom()
						}
						else
                        {
//                            //
                            show_modal("Failed To assign");
                            get_bom()
//                            //
//                            //                                $(k).removeAttr("disabled");
//                            //                                $(k).removeClass("disabled");
//                            //                                $(k).text("Assigned");
//                            //                                $(k).removeClass("assign").addClass("dones");
                        }
                        //                            else {
                        //
                        //                                show_modal("Failed To assign");
                        //                            }
                        //
                        //
                        //                        })
                        //                    }
                        //                    else {
                        //
                        //
                        //                        show_modal("Warehouse Already Assigned");
                        //                    }
                        //
                        //
                        //
                        //
                        //  });


//                    })
                    });
                })
            }

            var clid="";
            var price_val="";
            function edit_this(bb,cc,dd,ee)
            {


                $("#edit_bom").modal("show");
                $("#measure_id").val(bb);
                $("#code").val(cc);
                $("#description").val(dd);
                $("#price").val(ee);
                price_val=ee;
                var query={
                    "id":bb,
                };
                $.post("edit_bom_items.php",query,function(gg){
                    //alert(gg+"edit_this");

                    $("#edit_tbd").html("");
                    var obj=JSON.parse(gg);
                    //optionlevels="";
                    var details=new Array();
                    for (var i = 0; i < obj.LIST.length; i++) {

                        details[i] = new Array();
                        details[i][0] = obj.LIST[i].item_code;
                        details[i][1] = obj.LIST[i].material_name;
                        details[i][2] = obj.LIST[i].quantity;
                        details[i][3] = obj.LIST[i].unitOfMeasurement;
                        details[i][4] = obj.LIST[i].price;
                        details[i][5]=obj.LIST[i].client_material_id;
                        details[i][6]=obj.LIST[i].measurementID;

                        $("#edit_tbd").append("<tr><td style='display:none;'><input type='hidden' name='clid1[]' id='clid' value='"+ details[i][5]+"' ></td><td><input type='text' value='"+ details[i][0] +"' id='item_code' name='item1[]'   class='form-control' disabled ></td><td><input  value='"+ details[i][1] +"' name='des1[]' id='des' style='pointer-events: none;'  class='form-control' disabled ></td><td><input value='"+ details[i][2] +"' type='number'  id='quantity' name='quan1[]' class='form-control' disabled ='disabled' ></td><td> <input type='hidden' id='uom' name='uom1[]' value='"+details[i][6]+"' class='form-control'>"+details[i][3]+"</td><td><input value='"+ details[i][4] +"' type='number' id='rate'  name='rate1[]' class='form-control' disabled ='disabled' ></td><td><i onclick='edit_table(this)' class='fa fa-edit'> </i></td></tr>");
                    }

                });


            }
			
			
						 var multi="";
			  var multi1="";
				function edit_table(a)
				{
					 
			 
			  
						var abc="";
						var element="";
						var element=new Array();
					   

                    $(a).hide();
                    $(a).parent().append("<br><button type='button' class='btn btn-success'>update</button>")
                    
					   $(a).parent().parent().find("td:eq(3)").find("input[type='number']").removeAttr("disabled");
					    $(a).parent().parent().find("td:eq(5)").find("input[type='number']").removeAttr("disabled");
						var quantity=$(a).parent().parent().find("td:eq(3)").find("input[type='number']").val();
				var rate=$(a).parent().parent().find("td:eq(5)").find("input[type='number']").val();
					 // alert(rate);
					//  alert(quantity);
					  
					  var multi=quantity*rate;
					  //alert(multi);
					  
					  
					  var up_price="";
					  var new_price="";
					  
              $(a).parent().find("button").click(function()
                    {
						var quantity1=$(a).parent().parent().find("td:eq(3)").find("input[type='number']").val();
				var rate1=$(a).parent().parent().find("td:eq(5)").find("input[type='number']").val();
                
				var multi1=quantity1*rate1;
				 //alert(multi1);
				 
				 var update_price=$("#price").val();
				up_price=update_price-multi;
				//alert(up_price+"update_price");
				new_price=up_price+multi1;
				
				$("#price").val(new_price);
				//alert($("#price").val()+"new_price");
				$(a).parent().find("button").hide();
				$(a).show();
				})
				
				 // $(a).parent().find("button").hide();
				
				}
			
			
			
			


            var mat="";
            // var clien_mat_id="";
            function get_material()
            {

                choices=[];
                //  var qry = {"clientId": clin};

                var clin = $('#company_type').val();

                // alert(clin+"getmaterial");
                var query = {"company_id": clin};

                $.post("get_material_list1.php", query, function (iks) {
                    mat=iks;

                    // alert(iks+"getmaterialpage");
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
                        datass[i][3]=objd.LIST[i].client_material_id;
                        //alert(data[i][0]+" data");
                        //     out[i]=obj.ITEM[i].item;
                        choices.push(datass[i][0].toUpperCase());
                        //  $("#client_materialid").val( datass[i][3]);
                        //clien_mat_id= datass[i][3];

                    }
                    //  alert(choices);


                });
            }







            function add1() {
                add_table();

            }

            function descriptions()
            {
                //alert("FDSFa");
                var cid1 = $.trim($("#autocomplete").val());

                var cid =cid1.toUpperCase();
                //var client_id=$("#ids_value").val();
                var client_id=$("#company_type").val();
                // alert(client_id+"descr")
                $("#des1").val("");
                $("#uom1").html("");
                $("#quantity1").html("");
                $("#rate1").val("");
                quers={"client_id":client_id,"item":cid};
                $.get("uom.php",quers,function(fd)
                {

                    //alert(fd+"uommsss");



                    var obj = JSON.parse(fd);


                    uom1=new Array();

                    var levelOptions1="";
                    var clid="";
                    var levelOption1="";
                    var out=new Array();

                    for(var i = 0; i < obj.UOM.length; i++) {

                        uom1[i]=new Array();

                        uom1[i][0]=obj.UOM[i].unitOfMeasurement;
                        uom1[i][1]=obj.UOM[i].material_name;
                        uom1[i][2]=obj.UOM[i].item_code;
                        uom1[i][3]=obj.UOM[i]. measurementID;
                        //uom1[i][3]=obj.UOM[i].client_material_id;
                        /*data1[i][2]=obj.UOM[i].tinNo;
                         data1[i][3]=obj.UOM[i].cinNo;
                         data1[i][4]=obj.UOM[i].id;*/
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;

                        levelOptions1 =  levelOptions1 +"<option id="+i+" value = "+uom1[i][3]+">" +uom1[i][0]+ "</option>";
                        //uom1[i][3]=obj.UOM[i].client_material_id;
                        /*data1[i][2]=obj.UOM[i].tinNo;
                         data1[i][3]=obj.UOM[i].cinNo;
                         data1[i][4]=obj.UOM[i].id;*/
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;








                    }


                   // alert(levelOptions1);




                    document.getElementById("des1").value=uom1[0][1];
                    document.getElementById("uom1").innerHTML =levelOptions1;
                    //document.getElementById("client_materialid").value=uom1[i][3];





                    /*contextAdd  document.getElementById('cong_CIN').value =data[0][2];*/
                    /*document.getElementById('cong_TIN').value =data1[0][2];
                     document.getElementById('cong_CIN').value =data1[0][3];
                     document.getElementById('contextAdd').value =data1[0][1];*/








                });





            }


           var sum=0;
            var price2="";
            addeditems=[];
            var indexs;
            var uomss="";
            function add_table()
            {
               //alert($("#price").val());
               // alert(price_val+"price_val");
               //alert(mat);
                var obj1 = JSON.parse(mat);
                var out = "";
                //  alert(iks+"i");
                var datass1 = new Array();
                out = new Array();
                var m_client_id="";
//alert($("#autocomplete").val())
                var auto=$("#autocomplete").val().toLowerCase();
                //alert(auto)
                for (var i = 0; i < obj1.LIST.length; i++) {

                    datass1[i] = new Array();

                    datass1[i][0] = obj1.LIST[i].item_code;
                    datass1[i][1] = obj1.LIST[i].material_name;
                    datass1[i][2] = obj1.LIST[i].unitOfMeasurement;
                    datass1[i][3]=obj1.LIST[i].client_material_id;
                    uomss= datass1[i][2];
                    if(auto== datass1[i][0]){
                       //alert(datass1[i][3])
                        m_client_id=datass1[i][3];
                    }
                }
//alert(m_client_id);
                var items= $.trim($("#autocomplete").val());
                var clid=m_client_id;
                var uoms=$("#uom1").val();
                var des=$("#des1").val();
                var quan=$("#quantity1").val();
                var rates=$("#rate1").val();
                var ks=parseInt(quan);
                price1=price_val;
                var multi="";



                multi= quan*rates;
                //alert(multi+"kkk")
                //alert($("#price").val()+multi);
                $("#price").val(parseFloat("0"+$("#price").val()) + parseFloat("0"+multi));
//alert($("#price").val())
               price1=price1+multi;
                //alert(price1+"sums");
                //var pricess=parseInt(price1);
          //  parseInt($("#price").val(price1)) ;
              // price2= parseInt($("#price_value").val(price1));
                //alert($("#price").val());
//
                //alert(items+"autocomplete");
				//alert(uoms+"uomss");

                if(items!="" && uoms!="" && des!="" && ks>0  && rates!="")
                {

                    indexs=$.inArray(items,addeditems);





                    if(indexs>=0)
                    {

                        show_modal("Item Code Already Added");


                    }else
                    {


                        // $("#tbd").append("<tr><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uoms+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>")
                        // $("#edit_tbd").append("<tr><td  style='display:none;'><input type='hidden'  name='clid1[]' value='"+clid+"'>"+clid+"</td><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uoms+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>");
                        $("#edit_tbd").append("<tr><td  style='display:none;'><input type='hidden'  name='clid1[]' value='"+clid+"'  ></td><td><input type='hidden' name='item1[]' value='"+items+"'>"+items+"</td><td><input type='hidden' name='des1[]' value='"+des+"'>"+des+"</td><td><input type='hidden' name='quan1[]' value='"+quan+"'>"+quan+"</td><td><input type='hidden' name='uom1[]' value='"+uoms+"'>"+uomss+"</td><td><input type='hidden' name='rate1[]' value='"+rates+"'>"+rates+"</td><td><button class='btn btn-link' onclick='delete_row(this)'><span class='glyphicon glyphicon-remove'></span>Delete</button></td></tr>");
                        $("#autocomplete").val("");
                        $("#rate1").val("");
                        $("#uom1").html("");
                        $("#des1").val("");
                        $("#quantity1").val("");
                        addeditems.push(items);
                    }






                }
//                else
//                {
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
//
//
//                    //document.getElementById(ms).required = true;
//
//
//
//                }

                return false;

            }


var ans="";
            function delete_row(row)
            {
//alert(price1+"sumdele");
var del_priuce=$("#price").val();
                var quan=$("#quantity").val();
                var rates=$("#rate").val();


//alert("delde");

                var i=row.parentNode.parentNode.rowIndex;
                var n=i-1;
               // alert(n);

                var qq=$(row).parent().parent().find("input[name='quan1[]']").val();
                var rr=$(row).parent().parent().find("input[name='rate1[]']").val();
               // alert(qq+"row");
                //alert(rr+"rate");
                ans=qq*rr;
                price1= del_priuce-ans;
                //alert(price1+"Subtractt");
                //alert(i+" "+index+" "+row);
               // var n=i-1;
                document.getElementById('edit_tbd').deleteRow(n);

                addeditems.splice(n,1);
                //indexs--;
                $("#price").val(price1);
            }


            var ans1="";
//            function remove_row(row1)
//            {
//alert(row1);
////                var del_priuce1=$("#price").val();
////                var quan1=$("#quantity").val();
////                var rates1=$("#rate").val();
//
//               // var p=row1.parentNode.parentNode.rowIndex;
//                //alert(i+" "+index+" "+row);
//               // var m=p-1;
//                //alert(m);
//                document.getElementById('additon').hide(row1);
//
//            }


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
                    document.getElementById('client_city').value=data11[0][0];
                    document.getElementById('client_state').value=data11[0][1];
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

//
//            function delete_row(row)
//            {
//
//
//
//                var i=row.parentNode.parentNode.rowIndex;
//                //alert(i+" "+index+" "+row);
//                var n=i-1;
//                document.getElementById('tbd').deleteRow(n);
//
//                addeditems.splice(n,1);
//                //indexs--;
//
//            }

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

            //////////////get client list///////

            function get_client_list()
            {
                //alert();
                var id=$('#company_type').val();
                //alert(id);
                dg={"id":id};
                $.get("getSaleOfficeList.php",dg,function(xs)
                {
                    //alert(xs);
                    //  setState1(xs);

                    set_client(xs);

                });


            }
            function set_client(a)
            {

                $('#tbd').html("");
                var obj = JSON.parse(a);


                details= new Array();


                var levelOption = "";
                var out = new Array();

                for (var i = 0; i < obj.LIST.length; i++) {

                    details[i] = new Array();
                    details[i][0] = obj.LIST[i].company_name;
                    details[i][1] = obj.LIST[i].slaveID;
                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;
                    /*if(its==shippers[i][0]) {
                     $("#Ship_TIN").val(shippers[i][2]);
                     $("#Ship_CIN").val(shippers[i][3]);

                     }*/
                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //alert(levelOption);
                    $('#tbd').append("<tr><td>"+details[i][0]+"</td><td><button id='"+details[i][1]+"' onclick='popup(this.id);' class='btn btn-primary'>Edit</button> </td></tr>");


                }

            }
            ////////////// get client list end///////
            ///////invoke modal popup for edit //////////
            function popup(a)

            {
                $('#client_details').modal('show');
                edit_client1(a);
            }
            function edit_client1(a)
            {
                // alert(a);
                dg={"id":a};
                $.get("getClientDetails.php",dg,function(xs)
                {
                    // alert(xs);
                    //  setState1(xs);

                    edit_client_details(xs);

                });


            }

            ///////invoke modal popup for edit ends //////////
            /////////////set details for edit client/////////////////
            function edit_client_details(data)
            {


                $("#Client_Details_form").bootstrapValidator('resetForm', true);
                var obj = JSON.parse(data);


                details= new Array();


                var levelOption = "";
                var out = new Array();

                for (var i = 0; i < obj.LIST.length; i++) {

                    details[i] = new Array();
                    details[i][0] = obj.LIST[i].id;
                    details[i][1] = obj.LIST[i].companyname;

                    details[i][2] = obj.LIST[i].firstName;
                    details[i][3] = obj.LIST[i].lastName;
                    details[i][4] = obj.LIST[i].alternateMobileNumber;
                    details[i][5] = obj.LIST[i].email;
                    details[i][6] = obj.LIST[i].panCard;
                    details[i][7] = obj.LIST[i].tin_no;
                    details[i][8] = obj.LIST[i].cin_no;
                    details[i][9] = obj.LIST[i].contact_person_name;
                    details[i][10] = obj.LIST[i].contact_person_number;
                    details[i][11] = obj.LIST[i].addressID;
                    details[i][12] = obj.LIST[i].address1;
                    details[i][13] = obj.LIST[i].address2;
                    details[i][14] = obj.LIST[i].postcode;
                    details[i][15] = obj.LIST[i].city;
                    details[i][16] = obj.LIST[i].state;
                    details[i][17] = obj.LIST[i].country;
                    details[i][18] = obj.LIST[i].bankName;
                    details[i][19] = obj.LIST[i].accountNumber;
                    details[i][20] = obj.LIST[i].ifscCode;
                    details[i][21] = obj.LIST[i].branchCode;


                    //data[i][1]=obj.LIST[i].name;
                    //data[i][7]=obj.DETAIL[i].requestTimestamp;
                    /*if(its==shippers[i][0]) {
                     $("#Ship_TIN").val(shippers[i][2]);
                     $("#Ship_CIN").val(shippers[i][3]);

                     }*/
                    // alert(datak[i][2]);
                    //alert(data[i][1]);

                    //alert(levelOption);
                    //  $('#tbd').append("<tr><td>"+details[i][0]+"</td><td><button id='"+details[i][1]+"' onclick='edit_client1(this.id);' class='btn btn-primary'>Edit</button> </td></tr>");
                    $("#cln_id").val(details[i][0]);
                    $("#client_name").val(details[i][2]);
                    $("#company_name").val(details[i][1]);
                    //$("#client_mobile").val();

                    if (details[i][4] == "-")
                    {

                        $("#client_alt_mobile").val("");
                        $("#alt_mob").val("-")
                    }
                    else
                    {

                        $("#client_alt_mobile").val(details[i][4]);
                        $("#alt_mob").val(details[i][4])
                    }






                    if (details[i][6] == "-")
                    {

                        $("#client_pan").val("");
                        $("#pano_no").val("-")
                    }
                    else
                    {

                        $("#client_pan").val(details[i][6]);
                        $("#pano_no").val(details[i][6])
                    }



                    $("#client_cin").val(details[i][8]);

                    $("#client_tin").val(details[i][7]);
                    $("#client_email").val(details[i][5]);

                    $("#client_cnt_name").val(details[i][9]);
                    $("#client_cnt_no").val(details[i][10]);
                    $("#client_add1").val(details[i][12]);
                    $("#client_add2").val(details[i][13]);
                    $("#client_pin").val(details[i][14]);
                    $("#client_city").val(details[i][15]);
                    $("#client_state").val(details[i][16]);
                    $("#client_bank").val(details[i][18]);
                    $("#client_acc_no").val(details[i][19]);
                    $("#client_ifsc").val(details[i][20]);
                    $("#client_bank_branch").val(details[i][21]);

                }
            }
            /////////////set details for edit client ends/////////////////

            function edit_cle()
            {

                if($("#client_pan").val()!="")
                {

                    if($("#pano_no").val()!=$("#client_pan").val())
                    {



                        $("#pano_no").val($("#client_pan").val());

                    }
                    else {
                        $("#pano_no").val($("#client_pan").val());
                    }


                }

                if($("#client_city").val()!="" && $("#client_state").val()!="") {
                    $.get("updateClientDetails_for_sales_office.php", $('#Client_Details_form').serialize(), function (xs) {




                        //  setState1(xs);Company Name
                        if ($.trim(xs) == 'Y') {
                            $("#client_details").modal('hide');
                            $("#Client_Details_form").bootstrapValidator('resetForm', true);
                            $('#Client_Details_form')[0].reset();
                            show_modal("Details Updated Succesfully");

                        } else if ($.trim(xs) == 'N') {
                            show_modal("Failed to Update..");
                        } else {
                            show_modal("Failed to Update");
                        }

                        //   edit_client_details(xs);

                    });

                }
                else
                {



                    show_modal("State and City Are Required")
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

    <div id="edit_bom" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="add_items" >

                <input type="hidden" id="client_materialid" value="">
                <div class="modal-content">


                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="padding-left:10px;padding-right: 10px;">Edit BOM</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="price_value" value="">
                        <div class="row">













                            <div class="panel panel-green  margin-bottom-40" style="">
                                <div class="panel-heading" style="">
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Edit BOM</h3>
                                </div>
                                <div class="panel-body">


                                    <!--   <div class="form-group" id="shiper_select">
                                           <label for="exampleInputPassword1">Company Name</label><br>
                                           <select id="typeid"  class="form-control" data-live-search="true"   title="Please select a lunch ..." name="shipper" style="width: 300px" required="">

                                           </select>
                                       </div>-->
                                    <div class="container-fluid">
                                        <div class="row">

                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <input type="hidden" id="measure_id" name="measure_id" value="">
                                                <div class="form-group">
                                                    <label> BOM Code</label>
                                                    <input type="text"  class="form-control"   placeholder=" BOM Code" id="code" name="code">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Description:</label>
                                                    <input type="text"  class="form-control"  placeholder="Description" id="description" name="description">
                                                </div>

                                            </div>



                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Price:</label>
                                                    <input type="text"  class="form-control" disabled placeholder="Price" id="price" name="price" value= "">
                                                </div>

                                            </div>



                                            <div class="col-lg-12">
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
                                                    <tbody id="edit_tbd">

                                                    </tbody>
                                                    <tr id="additon"  style='display:none;'>
                                                        <td  style='display:none;'></td>  <td> <input type="text"  class="form-control"  id="autocomplete" onblur="descriptions();" placeholder="Item Code"  required="" title="Item Code"></td><td> <input type="text" required=""  style="pointer-events: none;"  class="form-control" id="des1"  placeholder="Description" title="Add Description From Item Code" ></td><td> <input type="number" style="" id="quantity1"    min="1" class="form-control" placeholder="QTY" required="" data-live-search="rate"  title="Please select a Quantity ..."></td><td>  <select id="uom1" style="width:100px;"     class="form-control"  data-live-search="false" required="" title="Please select a UOM ..."></select></td><td><input type="number" class="form-control" step="any" min="1" required="" title="Rate" id="rate1" placeholder="Rate" ></td><td><input type="submit"   class="btn btn-default" value="Add Item"></td></tr>

                                                </table>


                                            </div>

                                            <div class="col-lg-12">
                                                <br><br><center> <input type="button" class="btn btn-default" value="Add" id="add" ></center>
                                                <br><br><center><input type="button" value="Update" class="btn btn-primary" style="color:#ffffff;background-color: #2bb75b;width: 130px;" id="mains"></center>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>


                        <!-- dialog buttons --></div>
                    <div class="modal-footer">   <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </form>
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
                            UpdateBom
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




                    <form role="form" id="main" onsubmit="return false;">

                        <div class="panel panel-green  margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Company Type</h3>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6" style="height: 70px">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">Comapny:</label>
                                                <select  class="form-control" name="company_type" required="" id="company_type" onchange="main_header(this.value);" >
                                                    <option>Selece Company</option>


                                                </select>
                                            </div>



                                        </div>

                                        <div class="col-lg-6" style="height: 70px">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1q">&nbsp;</label><br>
                                                <button id="edit_client" onclick="get_bom();" class="btn btn-primary">Submit</button>
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




                    </form>


                </div>
                <div class="panel panel-green  margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i>Details</h3>
                    </div>
                    <div class="panel-body">


                        <table class="table table-striped">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>BOM CODE</th>

                                    <th>BOM NAME</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                                    <th>EDIT</th>
                                </tr>
                                </thead>
                                <tbody id="tbd">

                                </tbody>
                            </table>


                    </div></div>

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
    <div class="modal fade" id="client_details" data-backdrop="static" style="overflow: auto" >
        <div class="modal-dialog" style="width: 60%">

            <!-- Modal content-->
            <div class="modal-content"> <form id="Client_Details_form"   role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sales Office Details</h4>
                    </div>
                    <div class="modal-body">



                        <!--     <div class="panel panel-green  margin-bottom-40">
                                 <div class="panel-heading">
                                     <h3 class="panel-title"><i class="fa fa-tasks"></i> Compant Type</h3>
                                 </div>
                                 <div class="panel-body">
                                     <div class="container-fluid">
                                         <div class="row">
                                             <div class="col-lg-6" style="height: 70px">
                                                 <div class="form-group">
                                                     <label for="exampleInputEmail1q">Company Type:</label>
                                                     <select  class="form-control" name="company_type" required="" id="company_type" >

                                                         <option value="-1">Select</option>
                                                         <option value="8">B2B Client</option>
                                                         <option value="9">WareHouse Vendor</option>
                                                         <option value="10">Logistic Vendor</option>

                                                     </select>
                                                 </div>


                                             </div>

                                         </div>

                                     </div>
                                 </div>

                             </div>
                    -->

                        <input type="hidden" value="" id="cln_id" name="cln_id">



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
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_name"  placeholder="Name" name="client_name">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sales Office Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="company_name" placeholder="Sales Office Name" name="company_name">
                                    </div>
                                </div>

                                <!-- <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Mobile<span style="color:red;" >*</span>:</label>
                                         <input type="text"  class="form-control" id="client_mobile"  placeholder="Mobile no" name="client_mobile">
                                     </div>
                                 </div>-->
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alternate Mobile:</label>
                                        <input type="text"  class="form-control" id="client_alt_mobile" placeholder="Alternate Mobile no" name="client_alt_mobile">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">CIN<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_cin"  placeholder="CIN" name="client_cin">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">TIN<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_tin" placeholder="TIN" name="client_tin">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email:</label>
                                        <input type="text"  class="form-control" id="client_email"  placeholder="Email Id" name="client_email">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Pan Card:</label>
                                        <input type="text"  class="form-control" id="client_pan" placeholder="Pan Card no" name="client_pan">
                                    </div>
                                </div>

                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contact Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_cnt_name"  placeholder="Reference name" name="client_cnt_name">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
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


                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address 1<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_add1" placeholder="Address 1" name="client_add1">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address 2:</label>
                                        <input type="text"  class="form-control" id="client_add2"  placeholder="Address 2" name="client_add2">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Pincode<span style="color:red;" >*</span>:</label>
                                        <input type="number" onblur="get_pincode(this.value)" class="form-control" id="client_pin" placeholder="Pincode" name="client_pin">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_city"  placeholder="City" name="client_city">
                                    </div>
                                </div>


                                <input type="hidden" name="pan_no" id="pano_no" value="">
                                <input type="hidden" name="alt_mob" id="alt_mob" value="">


                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">State<span style="color:red;" >*</span>:</label>
                                        <input type="text" readonly class="form-control" id="client_state" placeholder="State" name="client_state">
                                    </div>
                                </div>

                            </div></div>

                        <div   class="panel panel-green  margin-bottom-40">

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks"></i>Bank Details</h3>
                            </div>


                            <!--<form role="form" id="">-->
                            <div class="panel-body">


                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_bank" placeholder="Bank Name" name="client_bank">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Account No<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_acc_no"  placeholder="Account No " name="client_acc_no">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">IFSC Code<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_ifsc" placeholder="Bank IFSC code" name="client_ifsc">
                                    </div>
                                </div>
                                <div style="margin-left: -15px;height: 80px" class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Branch Code<span style="color:red;" >*</span>:</label>
                                        <input type="text"  class="form-control" id="client_bank_branch"  placeholder="Bank Branch Code" name="client_bank_branch">
                                    </div>
                                </div>



                            </div>

                            <!--</form>-->

                        </div>










                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" id="Client_Details_form_submit" >Update</button>

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
                        <button type="submit"  class="btn btn-default" id="">ADD</button>
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

            $(".dropdown").click(function()
            {


                $(this).parent().children("ul").slideToggle();



            });
            $(".sub-dropdown").click(function()
            {
                $(this).parent().slideDown();
                $(this).children().parent().find("ul").slideToggle();



            });





            $("#add").click(function(){
               // alert("hi");
                $("#additon").show();
               // alert("fefef");
            });




            $('#Client_Details_form').bootstrapValidator({
                live: 'enabled',

                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {


//alert();


                    edit_cle();


                    return false;
                },
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    client_name: {
                        message: 'Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Name be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-.]+$/i,
                                message: 'Name cannot be special character'
                            }

                        }
                    },


                    company_name: {
                        message: 'Company Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Company Name  is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'Company Name  be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-._]+$/i,
                                message: 'Company Name  cannot be number only character'
                            }

                        }
                    },
                    client_pan: {
                        message: 'The Pan Card No is not valid',
                        validators: {

                            regexp: {
                                regexp: /^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/,
                                message: 'The Pan Card No is incorrect example XXXXX9999X '
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
                                regexp: /^[a-z 0-9-.]+$/i,
                                message: 'The  Reference Name cannot be number only character'
                            }

                        }
                    },
                    client_mobile: {
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
                    client_email:{
                        validators: {

                            emailAddress: {
                                message: 'The email address is not valid'
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


                    client_pin: {
                        message: 'The Pincode is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Pincode is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 6,
                                message: 'Pincode Must be 6 digits'
                            },
                            regexp: {
                                regexp: /^[0-9]{1,6}$/,
                                message: 'The Pincode No is incorrect'
                            }


                        }
                    },
                    client_bank: {
                        message: 'The Bank Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Bank name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 40,
                                message: 'The Bank Name be more than 1 and less than 40 characters long'
                            },
                            regexp: {
                                regexp: /^[a-z 0-9-.]+$/i,
                                message: 'The Bank Name cannot be special character'
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
                    client_tin: {
                        message: 'The Tin no is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Tin no is required and cannot be empty'
                            }


                        }
                    },
                    client_cin: {
                        message: 'The Cin no is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Cin no is required and cannot be empty'
                            }


                        }
                    },
                    client_add1: {
                        message: 'The Address 1o is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Address 1 is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                max: 140,
                                message: 'The Address 1o no be more than 2 and less than 140 characters long'
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
            /*$("#main").submit(function(e)
             {



             return false;
             });
             */

            $("#mains").click(function () {

                //  var mq = $("#main").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");



                ///var mq=$('#main i').filter(function () {
                // return this
                //}).attr("class");

                var dds = $("#add_items").find("i").hasClass("form-control-feedback glyphicon-remove glyphicon");

                mq = $("#add_items").find("i").hasClass("form-control-feedback glyphicon glyphicon-remove");

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
                        var responsedata="";

                        var clid=$("input[name='clid1[]']")
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

                        var dt = $("#dates").val();
                        var main_date = $("#dtp_input2").val();
                        var md = $("#shipid").val();
                        //$("#cof").val()+""+$("#co").val()+""+$("#challan_no").val()
                        //""+main_date+""+$("#cerena_ref").val()+""+$("#c_no").val()+""+$("#consignee_name").val()+""+$("#consignee_mob").val()+""+$("#challan").val();




                        var companyid= $("#company_type").val();


                        var main_query = {

                            'companyId': companyid,
                            'bom_id':$("#measure_id").val(),
                            'materialItemID': clid.join("*"),
                            'quantity': quan1.join("*"),
                            'uom': uom1.join("*"),
                            'perUnitPrice': rate1.join("*"),
                            'des':des.join("*"),
                            'code':$("#code").val(),
                            'description':$("#description").val(),
                            'price':$("#price").val()

                           // 'price':price1



                        };
//alert(parseInt($("#price_value").val())+"main_query");
                        //alert(uom1+"uom");
                       // alert(rate1+"prices");
                       // alert($("#price").val()+"final value");

                     console.log(main_query);
                        //$("#edit_bom").fadeIn();
//alert(JSON.stringify(main_query));
                        $.post("update_bom_data.php", main_query, function (cv) {

                         //alert(cv);
//                            data = jQuery.parseJSON(cv);
//                            alert(data);
//                            console.log(data.materialID);
//      var responsedata =$.parseJSON(cv);
//        console.log(responsedata);
//        alert("material id"+responsedata.materialID);

if(cv=="Y")
{
    show_modal("Updated successfully");
   $("#edit_bom").modal("hide");
    get_bom();
   }
else if(cv=="A")
{
    show_modal("Already created");
    $("#edit_bom").fadeIn();

}
else if(cv=="Created Order for this Bom So you can not Update")
{
	show_modal("Created Order for this Bom So you can not Update");
    $("#edit_bom").fadeIn();
}
else
{
    show_modal("Failed");
}





                        });
//}
                    }
                    else {

                        //$("#mes").html(ho);
                        show_modal("Please Add Items");
                    }

                }
                else {


                    var msk =$('#main input[type="text"],select').filter(function () {
                        return this.value.length == 0
                    }).attr("id");


                    var msdd = $('#main input[type="text"],input[type="number"],select').filter(function () {
                        return this.value.length == 0
                    }).attr("placeholder");

                    var masdd = $('#main input[type="text"],input[type="number"],select').filter(function () {
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

                return false;
            });



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

            $("#add_items") .submit(function(){
                //alert("Srund");
                add_table();
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
    <script type="text/javascript">



    </script>
    <script type="text/javascript" src="js/bootstrap-toggle.min.js"></script>

    </body>

    </html>
    <?php
}
else


{




    echo "<script>window.location='index.php'</script>";
}
?>


