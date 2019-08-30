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


        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
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
                    var a=hd;
                    setData(a);
                });
				// get all UOM 
                $.get("get_uom_data.php","",function(hd)
                {
                    var a=hd;
                    setDataUOM(a);
                });
                // setup autocomplete function pulling from currencies[] array
            }

			function setDataUOM(arr) {
                if(levelOptions=="")
                {
                    ko=arr;
                    var obj = JSON.parse(arr);
                    datak=new Array();
                    var levelOption="<option value=''>Select Base UOM</option>";
                    var out=new Array();
                    for(var i = 0; i < obj.LIST.length; i++) {
                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].measurementID;
                        datak[i][1]=obj.LIST[i].unitOfMeasurement;
                        levelOption +="<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";
                    }
                  //  $("#base_uom").html(levelOption);
                  $("#base_uom").html("");
                    var ids1=$("#base_uom").val();


                    var levelOption2="<option value=''>Select Secondary UOM</option>";
                    var out=new Array();
                    for(var i = 0; i < obj.LIST.length; i++) {
                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].measurementID;
                        datak[i][1]=obj.LIST[i].unitOfMeasurement;
                        levelOption2 +="<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";
                    }
                    $("#second_uom").html(levelOption2);
                    var ids1=$("#second_uom").val();
                }
            }

            

            function getdatas()
            {



                return choices;



            }

            var datak;
            var ko="";
            var levelOptions="";
            function setData(arr) {
                if(levelOptions=="")
                {
                    ko=arr;
                    var   obj = JSON.parse(arr);
                    datak=new Array();
                    var levelOption="<option value=''>Select Company</option>";
                    var out=new Array();
                    for(var i = 0; i < obj.LIST.length; i++) {
                        datak[i]=new Array();
                        datak[i][0]=obj.LIST[i].id;
                        datak[i][1]=obj.LIST[i].name;
                        datak[i][2]=obj.LIST[i].tinNo;
                        datak[i][3]=obj.LIST[i].cinNo;
                        //data[i][1]=obj.LIST[i].name;
                        //data[i][7]=obj.DETAIL[i].requestTimestamp;
                        levelOption +="<option  id="+i+" value = "+datak[i][0]+">" +datak[i][1]+ "</option>";
                    }
                    $("#typeid").html(levelOption);
                    var ids=$("#typeid").val();
                    var clin=$('#typeid').val();                    //alert(clin);
                    var query={"clientId":clin};
                }
            }





            function  enabled_me()
            {




                $("#skips").removeAttr("disabled");
            }

            function disabled_me()
            {



                $("#skips").attr("disabled","disabled");
                $("#main")[0].reset();
                setTimeout(function()
                {

                    $("#myModal_upload_image").modal("hide");

                    $("#kv-error-4").html('');
                    $("#kv-error-6").html('');
                    window.location.reload();

                },900);
            }

            /////////Create Material ends////////






            function submit_datas()
            {

                
                var client_material_id =$("#material_id").find(':selected').data('material');
               var materialCode=$("#material_id").find("option:selected").val();
               var companyId=$("#typeid").find("option:selected").val();
                var base_uom=$("#typeid").val();
                var packQty=$("#packQty").val();
                var packSize=$("#packSize").val();
                var second_uom=$("#second_uom").val();
                //alert("client_material_id "+client_material_id+" materialCode "+materialCode+" companyId "+companyId+" base_uom"+base_uom+" packQty"+packQty+"  packSize"+packSize+" second_uom "+second_uom);
               

             var data={"client_material_id":client_material_id,"materialCode":materialCode,"companyId":companyId,"packQty":packQty,"packSize":packSize,"second_uom":second_uom};


                $.get("add_pack_size.php",data,function(kj)
                {


                  
                    if($.trim(kj)=="Y")
                    {

                        $("#main").bootstrapValidator('resetForm', true);
                        $("#main")[0].reset();

                        show_modal("Pack Size  Updated Succesfully");
                        // location.reload();

                    }else if($.trim(kj)=="N"){

                        show_modal("Failed to Update Pack Size ..");
                    }else if($.trim(kj)=="A"){

                        show_modal("Pack Size Already exist  ..");
                    }
                    else
                    {
                        show_modal("Failed to Update Pack Size ");

                    }



                });






            }


























        </script>


    </head>

    <body onload="load()" class="bds">





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
                        Update Pack Size
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







                    <div class="panel panel-green  margin-bottom-40" >
                             <div class="panel-heading" >
                                <h3 class="panel-title"><i class="fa fa-tasks"></i> Update Pack Size </h3>
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

                                            <div class="form-group">
                                                <label >Company:</label>
                                               <select id="typeid" aria-live="polite" name="company_id"  class="form-control">

                                               </select>
                                            </div>
                                        </div>



                                        <div class="col-lg-6" style="height: 80px;max-height: 100px">

                                            <div class="form-group">
                                                <label >SKU ID:</label>
                                                <!-- <input type="text"  class="form-control"   placeholder="SKU ID" name="material_id"> -->
                                                <select id="material_id" aria-live="polite" name="material_id"  class="form-control" >
                                                     <option value=''>Select SKU </option>
                                                </select>
                                            </div>
                                        </div>

                                        </div>
                                        

                                    <div class="row">                     
                                        <div class="col-lg-9" style="height: 80px;max-height: 100px">
                                            <div class="form-group">
                                                <label>Pack Size:</label>
                                                <div class="row" style="padding-left:15px;">
                                             
                                                <select style="width:300px; float:left;margin-right:20px;"  class="form-control"  name="base_uom" id="base_uom" required=""></select>
                                                    
                                                    <input type="text" style="width:110px; float:left; margin-right:10px;" class="form-control" id="packQty" placeholder="Quantity" name="packQty">
                                                   
                                                    <span style="padding-top:6px; width:30px; float:left; margin-right:10px; font-weight:bold; text-align:center;">X</span>
                                                   
                                                    <input type="text" style="width:110px; float:left; margin-right:10px;" class="form-control" id="packSize" placeholder="Size" name="packSize">
                                                    
                                                    <select style="width:300px; float:left;"  class="form-control" name="second_uom" id="second_uom" required=""></select>
                                                </div>
                                            </div>
                                        </div>
                                         
                                       
										
                                        
                                        <div class="col-lg-12">
                                            <center><button style="background-color: #00a0d2;color: white" type="submit"  onclick="submit_datas()" class="btn btn-default" >Save</button></center>
											<br><br>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->



    <script src="js/fileinput.js" type="text/javascript"></script>



    <script type="text/javascript" src="js/bootstrapValidator.js"></script>





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

            /*Image Upload*/

            $("#files").fileinput({



                allowedFileExtensions : ['jpg', 'png','gif'],
                maxFileCount: 1,
                browseLabel: 'Select...',
                removeLabel: 'Delete',
                elErrorContainer: '#kv-error-4',
                maxFileSize: 1024,
                //   msgInvalidFileExtension: 'El formato de "{name}" es incorrecto. Solo archivos "{extensions}" son admitidos.',
                //AJAX
                //   dropZoneEnabled: t,
                //  uploadAsync: false,
                uploadUrl: "addImageMaterial.php", // your upload server url
                uploadExtraData: function() {
                    return {
                        company_id:$("#typeid").val(),
                        material_id:$("input[ name='material_id']").val(),
                        material_name:$("input[ name='material_name']").val(),
                        base_uom:$("select[ name='base_uom']").val(),
                        material_price:$("input[ name='material_price']").val(),
                        material_height:$("input[ name='material_height']").val(),
                        material_width:$("input[ name='material_width']").val(),
                        material_length:$("input[ name='material_length']").val(),
                        material_new_weight:$("input[ name='material_new_weight']").val(),
                        material_gross_weight:$("input[ name='material_gross_weight']").val(),
						material_volumetric_weight:$("input[ name='material_volumetric_weight']").val(),
                        material_is_fragile:$("select[ name='material_is_fragile']").val(),
                        material_is_flamable:$("select[ name='material_is_flamable']").val(),
                        material_order_quantity:$("input[ name='material_order_quantity']").val(),
                        put_pick:$("select[ name='put_pick']").val()
                    };
                }
            }).on('fileuploaded', function(evt,data,datas,tt){
             // alert(data.response.uploaded+"ll");
//alert(data+"llhj");
                if(data.response.uploaded=="OK")
                {
//alert("Success");
                    load();
                    disabled_me();

                    $("#kv-error-6").html("<div class='alert alert-success'><strong>Success!</strong> PackSize Updated Succesfully</div>");

                    $('#files').fileinput('clear');

                    //  $('#files').fileinput('refresh', {browseLabel: 'Select...', removeLabel: 'Delete'});



                    $('#files').fileinput('enable').fileinput('disable');

                    $("#kv-error-6").html("<div></div>");

                    //       $('#files').fileinput('delete');



                }
                else
                {

//alert("Ereror");
                    $("#kv-error-6").html("<div class='alert alert-danger'><strong>Error!</strong> Image Upload Failed </div>");

                }




            });


            /*End Here*/










            $("#challan_no").focus();
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
            $('#main').bootstrapValidator({
                live: 'enabled',

                submitButton: '$form_unloading button[type="submit"]',
                submitHandler: function(validator, form, submitButton) {





                    $("#myModal_upload_image").modal("show");


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
                           /* regexp: {
                                regexp: /^[a-zA-Z0-9-_ ]+$/i,
                                message: 'Material ID Cannot Be Space Or Special Characters'
                            },
                            */ //       
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
                                max: 250,
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
                    }, company_id: {
                        message: 'The Company is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Please Select Company'
                            }


                        }
                    }, material_id: {
                        message: 'The SKU is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Please Select SKU'
                            }


                        }
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


        $(function() {
            $("#typeid").change(function () {
                
                var data_query={"company_id":$('select[name=company_id]').val()};
                $.post("get_material_list1.php",data_query,function(hd) {
                create_me(hd);
            });

            });
        });



        function create_me(yt)
    {
        var   obj = JSON.parse(yt);
        datakk=new Array();
        sku_data="<option value=''>Select SKU </option>";

        for(var i = 0; i < obj.LIST.length; i++)
        {

            datakk[i]=new Array();
            datakk[i][0]=obj.LIST[i].item_code;
            datakk[i][1]=obj.LIST[i].material_name;
            datakk[i][2]=obj.LIST[i].unitOfMeasurement;
            datakk[i][3]=obj.LIST[i].imageUrl;
            datakk[i][4]=obj.LIST[i].client_material_id;

            sku_data += "<option value='" + datakk[i][0] + "' data-material='"+datakk[i][4]+"' >" + datakk[i][0] + "</option>";

        }
        $("#material_id").html(sku_data);
    }



    $(function() {
            $("#material_id").change(function () {
                
              
             
                var data_query={"company_id":$('select[name=company_id]').val()};
                var material_id=$("#material_id").find("option:selected").val();
           
                $.post("get_material_list1.php",data_query,function(hd) {
                
                        var   obj = JSON.parse(hd);
                  

                    for(var i = 0; i < obj.LIST.length; i++)
                    {
                        datakk[i]=new Array();
                        datakk[i][0]=obj.LIST[i].item_code;
                        datakk[i][1]=obj.LIST[i].material_name;
                        datakk[i][2]=obj.LIST[i].unitOfMeasurement;
                        datakk[i][3]=obj.LIST[i].imageUrl;
                        datakk[i][4]=obj.LIST[i].client_material_id;
                     
                        if(material_id==datakk[i][0])
                        {
                            base_uom = "<option value='" + datakk[i][2] + "' >" + datakk[i][2] + "</option>";
                            $("#base_uom").html("");
                            $("#base_uom").html(base_uom);
                        }
                    }
                   
                    
            });

            });
        });



    </script>


    </body>

</html>
    <?php
}
else
{




    echo"<script>window.location='auth.php'</script>";
}
?>