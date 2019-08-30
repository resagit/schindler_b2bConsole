<?php
header('location:materialList.php'); die;
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


            function create_me(yt) {

                if ($.trim(yt) == "N") {
                    $("#tbd1").html("<tr><td></td><td></td><td><center><h4>Data Not Found</h4></center></td><td></td></tr>");
                } else {
                    $("#tbd1").html("");

                    var obj = JSON.parse(yt);


                    datakk = new Array();


                    for (var i = 0; i < obj.LIST.length; i++) {

                        datakk[i] = new Array();
                        datakk[i][0] = obj.LIST[i].item_code;
                        datakk[i][1] = obj.LIST[i].material_name;
                        datakk[i][2] = obj.LIST[i].unitOfMeasurement;
                        datakk[i][3] = obj.LIST[i].imageUrl;
                        datakk[i][4] = obj.LIST[i].client_material_id;


                        if (datakk[i][3] == null || datakk[i][3] == "") {
                            $("#tbd1").append("<tr><td class='item_image'><img src='no-image.jpg' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td><td><button class='btn btn-default' onclick='set_item_id(this.title)' title='" + datakk[i][0] + "'><i class='fa fa-upload'></i> Add Image</button></td><td><button class='btn btn-default' onclick='edit_items(this.title)' title='" + datakk[i][4] + "'><i class='fa fa-edit'></i> Edit Material</button></td></tr>");
                        }
                        else {
                            $("#tbd1").append("<tr><td class='item_image'><img class='img-viewer' title='Click To View Full' src='" + datakk[i][3] + "' style='width:80px;height:80px;'></td><td class='item_code'>" + datakk[i][0] + "</td><td class='material_name'>" + datakk[i][1] + "</td><td class='baseuom'> " + datakk[i][2] + "</td><td><button class='btn btn-default'  onclick='set_item_id(this.title)' title='" + datakk[i][0] + "'><i class='fa fa-upload'></i> Change Image</button></td><td><button class='btn btn-default'  onclick='edit_items(this.title)' title='" + datakk[i][4] + "'><i class='fa fa-edit'></i> Edit Material</button></td></tr>");

                        }
                    }

                    $(".img-viewer").click(function () {

                        $("#myModal_images").modal('show');
                        var srcs = $(this).attr("src");
                        //    alert(srcs);
                        $("#changes_images").attr("src", srcs);


                    });

                    //$('#tbd1').on( 'search.dt', function () { eventFired( 'Search' ); } ).on( 'page.dt',   function () { eventFired( 'Page' ); } ).dataTable();
                }
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





            function edit_items(b)
            {
                $("#update_material").bootstrapValidator('resetForm', true);
                $("#edit_material").modal('show');
                $("#cmt_id").val(b);
                var  cmt_id={"cmt_id":b};
                $.get("getMaterialDetailsForEdit.php",cmt_id, function (tt) {
                        //  create_me(tt);
                         // alert(tt);
                 //   $('#material_is_flamable').html("<option value=''>Select</option>")
                        var   obj = JSON.parse(tt);


                        edit_item=new Array();

                        var warehouse_data="";



                        for(var i = 0; i < obj.LIST.length; i++)
                        {

                            edit_item[i]=new Array();
                            edit_item[i][0]=obj.LIST[i].client_material_id;
                            edit_item[i][1]=obj.LIST[i].item_code;
                            edit_item[i][2]=obj.LIST[i].material_name;
                            edit_item[i][3]=obj.LIST[i].unitOfMeasurement;
                            edit_item[i][4]=obj.LIST[i].price;
                            edit_item[i][5]=obj.LIST[i].height;
                            edit_item[i][6]=obj.LIST[i].width;
                            edit_item[i][7]=obj.LIST[i].length;
                            edit_item[i][8]=obj.LIST[i].netWeight;
                            edit_item[i][9]=obj.LIST[i].grossWeight;
                            edit_item[i][10]=obj.LIST[i].isFragile;
                            edit_item[i][11]=obj.LIST[i].isFlamable;
                            edit_item[i][12]=obj.LIST[i].reOrderQuantity;
                            edit_item[i][13]=obj.LIST[i].imageUrl;
                            edit_item[i][14]=obj.LIST[i].putPickType;
                            //warehouse_data += "<option value='" + edit_item[i][3] + "'>" + edit_item[i][3] + "</option>";
                            $('#material_id').val(edit_item[i][1]);

                            $('#material_name').val(edit_item[i][2]);

                            var op= (edit_item[i][3]).toUpperCase()
                            $('#base_uom').val(op);//.attr("selected", "selected");
                            $('#material_price').val(edit_item[i][4]);
                            $('#material_height').val(edit_item[i][5]);
                            $('#material_width').val(edit_item[i][6]);
                            $('#material_length').val(edit_item[i][7]);
                            $('#material_new_weight').val(edit_item[i][8]);
                            $('#material_gross_weight').val(edit_item[i][9]);
                            $('#material_is_fragile').val(edit_item[i][10]);
                         //   $('#material_is_flamable').val(edit_item[i][11]);
                        //    alert(edit_item[i][11])
                            $('#material_is_flamable').val(edit_item[i][11]).attr("selected", "selected");
                            $('#material_order_quantity').val(edit_item[i][12]);
                            $("#put_pick").val(edit_item[i][14])

                        }
                        //$('#tbd1').on( 'search.dt', function () { eventFired( 'Search' ); } ).on( 'page.dt',   function () { eventFired( 'Page' ); } ).dataTable();

                    }
                );

            }


            function update_item()
            {

                /*$('#edit_material').submit( alert("in update");*/
                // alert($("#update_material").serialize());
                $.get("updateMaterial.php",$("#update_material").serialize(),function(kj)
                {

                   //  alert(kj)
                    if($.trim(kj)=="Y")
                    {
                        show_modal("Material Updated Succesfully");
                        $('#edit_material').modal('hide');
                        // location.reload();
                        $("#update_material")[0].reset();
                        $("#update_material").bootstrapValidator('resetForm', true);
                    }else if($.trim(kj)=="N"){

                        show_modal("Failed to Updated Material.. ");
                    }else if($.trim(kj)=="P"){

                        show_modal("Failed to Updated Material UOM only.. ");
                    }else
                    {
                        show_modal("Failed to Updated Material ");
                    }

                    // alert(a+" load1");
                    //setUpdateDetails(kj);


                });
                // );
            }
            ////////update items ends/////////////


            function set_items()
            {
                $("#tbd1").html("<tr><td></td><td><img src='loader1.gif'></td><td></td></tr>")
                var data_query={"company_id":$("#typeid").val()};
                $.post("get_material_list1.php",data_query,function(hd) {

                    create_me(hd);

                });
            }

            function  disabled_me()
            {

                setTimeout(function()
                {



                    $("#myModal_upload_image").modal('hide')

                },900)


            }

        </script>



    </head>
    <body class="bds" onload="load()" style="background-color: white" >


    <div id="myModal_images"  style="display:none;position:fixed;height: 100%;width: 100%;z-index:9999;background-color: rgba(0,0,0,0.8)">


        <div class="modal-dialog">


            <div class="modal-body" >
                <div class="col-lg-12">
                    <img src="loader1.gif" style="height: 500px;width: 550px;" class="img-thumbnail" id="changes_images">



                </div>
            </div>


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


    <!--Material edit modal-->



    <div id="edit_material" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="update_material" >

                <div class="modal-content">


                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Material</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">














                            <div class="panel panel-green  margin-bottom-40" style="border: 1px solid #00a0d2;">
                                <div class="panel-heading" style="background-color: #00a0d2;">
                                    <h3 class="panel-title"><i class="fa fa-tasks"></i>Edit Material </h3>
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
                                                <input type="hidden" id="cmt_id"name="cmt_id" value="">
                                                <div class="form-group">
                                                    <label >Material ID:</label>
                                                    <input type="text"  class="form-control"   placeholder="Material ID" id="material_id" name="material_id">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Name:</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Name" id="material_name" name="material_name">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" id="cos">
                                                    <label for="exampleInputPassword1">Base UOM</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="base_uom" required="" id="base_uom" >
                                                        <option value="">Select</option>
                                                        <option value="BOX">BOX</option>
                                                        <option value="PIECE">PIECE</option>
                                                        <option value="FEET">FEET</option>
                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div>
                                                <br>
                                            </div>    <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Price:(rupees)</label>
                                                    <input type="text" step="any"  class="form-control"  placeholder="Material Price" id="material_price" name="material_price">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Height:(cm)</label>
                                                    <input type="text"   class="form-control"  placeholder="Material Height" id="material_height" name="material_height">
                                                </div>

                                            </div> <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Width:(gram)</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Width" id="material_width" name="material_width">
                                                </div>

                                            </div>

                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Length:(cm)</label>
                                                    <input type="text"   class="form-control" id="material_length" placeholder="Material Length"  name="material_length">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Net Weight:(cm)</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Net Weight" id="material_new_weight" name="material_new_weight">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Gross Weight:(gram)</label>
                                                    <input type="text"  class="form-control" placeholder="Material Gross Weight" id="material_gross_weight" name="material_gross_weight">
                                                </div>

                                            </div>

                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group" >
                                                    <label for="exampleInputPassword1">Material Is Fragile</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="material_is_fragile" required="" id="material_is_fragile" >

                                                        <option value="">Select</option>
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>

                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Material Is Flamable</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="material_is_flamable" required="" id="material_is_flamable" >

                                                        <option value="">Select</option>
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>

                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div></div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label >Material Order Quantity</label>
                                                    <input type="text"  class="form-control"  placeholder="Material Order Quantity"  id="material_order_quantity" name="material_order_quantity">
                                                </div>

                                            </div>
                                            <div class="col-lg-6" style="height: 80px;max-height: 100px">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Put Pick Logic</label><br>
                                                    <!-- <input type="text"  class="form-control" id="material_uom" placeholder="Unit Of Measurment" name="">-->
                                                    <select  class="form-control" name="put_pick" required="" id="put_pick" >

                                                        <option value="">Select</option>
                                                        <option value="FIFO">FIFO</option>
                                                        <option value="LIFO">LIFO</option>
                                                        <option value="FMFO">FMFO</option>
                                                        <option value="FEFO">FEFO</option>
                                                        <option value="BATCH">BATCH</option>

                                                        <!-- <option value="RETURNIBOUND">Return Inbound</option>-->

                                                    </select>
                                                </div></div>
                                            <div class="col-lg-12">
                                                <br><br><center><button style="background-color: #00a0d2;color: white" type="submit"  class="btn btn-default" >Update</button></center>

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




    <!-- End Material edit modal-->
    <!--   Image Modal-->

    <div id="myModal_upload_image" class="modal fade" style="overflow: auto" data-backdrop="static">
        <div class="modal-dialog" style="width: 800px;">
            <form role="form" id="">

                <div class="modal-content">

                    <!-- dialog body -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Material Image Upload</h4>
                    </div>
                    <div class="modal-body">


                        <div class="container-fluid"><div class="row">



                                <div class="page-header">


                                    <form enctype="multipart/form-data" id="image_main">
                                        <input type="hidden" id="item_id" value="">

                                        <label>ADD Image </label>

                                        <input id="files" name="files" type="file" multiple><br>

                                        <div id="kv-error-4"  style="">sdasdasd</div> <br>   <div id="kv-error-6"  style=""></div>

                                    </form>
                                    <hr>

                                </div>






                            </div>


                        </div>

                        <!-- dialog buttons --></div>
                    <div class="modal-footer"><center></center></div>
                </div>
            </form>
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
                            Material List
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



                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Company</h3>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-3"></div> <div class="col-lg-6"> <form role="form" class=""><div class="input-group"><select id="typeid" class="form-control"></select><span class="input-group-addon" onclick="set_items()" style="cursor: pointer">Search <i class="fa fa-search"> </i></span></div></form>


                                </div>


                            </div>
                        </div>

                        <form role="form" id="main">










                        </form>
                    </div>














                    <div class="panel panel-green  margin-bottom-40" >
                        <div class="panel-heading" >
                            <h3 class="panel-title"><i class="fa fa-tasks"></i>Material List</h3>
                        </div>

                        <div class="panel-body">
                            <!--  <input type="text" id="search_table" placeholder="Type to search">-->
                            <!-- <div class="col-lg-2">
                                 <input typ e="checkbox" id="item_code"> <label>Item Code</label></div><div class="col-lg-2"><input type="checkbox" id="material_name"> <label>Material Name</label></div><div class="col-lg-2"><input type="checkbox" id="inbound"> <label>Inbound</label></div><div class="col-lg-2"><input type="checkbox" id="outbound"> <label>Outbound</label></div><div class="col-lg-2"><input type="checkbox" id="qty_fail"> <label>Quality Fail</label></div><div class="col-lg-2"><input type="checkbox" id="stock"> <label>Stock</label></div>
        --><!----> <form class="form-horizontal"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"> </i></span><input id="filter" style="text-transform: uppercase"  placeholder="Search Item" type="search" class="form-control"></div></form><br>

                            <!--  <table id="tabl_expr" class="table table-striped">-->
                            <table data-role="table" data-mode="columntoggle" class=" table table-striped" id="myTable" data-filter="true" data-input="#filterTable-input">
                                <thead>
                                <tr>
                                    <th class="item_image">Item Image</th>
                                    <th class="item_code">Item Code</th>
                                    <th class="material_name">Description</th>
                                    <th class="UOM">UOM</th>
                                    <th class="UOM">Upload</th>
                                    <th class="UOM">EDIT</th>

                                </tr>
                                </thead>
                                <tbody id="tbd1">

                                </tbody>
                            </table>


                        </div>


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

                $("#files").fileinput({



                    allowedFileExtensions : ['jpg', 'png','gif','jpeg'],
                    maxFileCount: 1,
                    browseLabel: 'Select...',
                    removeLabel: 'Delete',
                    elErrorContainer: '#kv-error-4',
                    //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                    //AJAX
                    //   dropZoneEnabled: t,
                    //  uploadAsync: false,
                    uploadUrl: "addOtherImageFile.php", // your upload server url
                    uploadExtraData: function() {
                        return {
                            item_id:$("#item_id").val(),
                            company_id:$("#typeid").val()

                        };
                    }
                }).on('fileuploaded', function(evt,data,datas,tt){
                    //        alert(data.response.messages);


                    if(data.response.uploaded=="OK")
                    {
                        // location.reload();
                        set_items();
                        disabled_me();
                        show_modal("Image uploaded Succesfully ");

                      //  $("#kv-error-6").html("<div class='alert alert-success'><strong>Success!</strong> Image Uploaded Succesfully</div>");

                        $('#files').fileinput('clear');

                        $('#files').fileinput('enable').fileinput('disable');





                    }
                    else
                    {


                        $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed</div>");

                    }




                });

                /* End Here*/




                /* end here*/


































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
                /*fields validation on update marterial*/
                $('#update_material').bootstrapValidator({
                    live: 'enabled',

                    submitButton: '$form_unloading button[type="submit"]',
                    submitHandler: function(validator, form, submitButton) {





                        update_item();


                        return false;
                    },
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        material_id: {
                            message: 'The Material ID is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Material ID is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 40,
                                    message: 'The Material ID be more than 2 and less than 40 characters'
                                }

                            }
                        },


                        material_name: {
                            message: 'The Material Name is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Material Name  is required and cannot be empty'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 80,
                                    message: 'The Material Name  be more than 2 and less than 80 characters long'
                                }


                            }
                        },
                        base_uom: {
                            message: 'The Base UOM is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Base UOM'
                                }


                            }
                        },
                        material_is_fragile: {
                            message: 'The Material is Fragile is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Please Select  Material is Fragile'
                                }


                            }
                        },
                        material_is_flamable: {
                            message: 'The Material is Flamable is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Please Select Material is Flamable'
                                }


                            }
                        },
                        material_price: {
                            message: 'Material Price is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Price is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Price cannot be character'
                                }

                            }
                        },
                        material_height: {
                            message: 'Material Height is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Height is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Height  cannot be character'
                                }

                            }
                        },
                        material_width: {
                            message: 'Material width is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material width is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material width  cannot be character'
                                }

                            }
                        },
                        material_length: {
                            message: 'Material Length is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Length is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Length  cannot be character'
                                }

                            }
                        },
                        material_new_weight: {
                            message: 'Material Net Weight is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Net Weight is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Net Weight  cannot be character'
                                }

                            }
                        },
                        material_gross_weight: {
                            message: 'Material Gross Weight is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Gross Weight is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Gross Weight  cannot be character'
                                }

                            }
                        },  material_order_quantity: {
                            message: 'Material Order Quantity is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Material Order Quantity is required and cannot be empty'
                                },

                                regexp: {
                                    regexp: /^[0-9.]+$/i,
                                    message: 'Material Order Quantity  cannot be character'
                                }

                            }
                        }



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