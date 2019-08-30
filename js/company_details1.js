/**
 * Created by dhwani on 03-08-2016.
 */
function set_company(x)
{


    var checks=x;


    if(checks!="0")
    {

        $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' style='background-color: #00a0d2;color: white'><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <form id='search_company' role='form' class=''><div  class='col-lg-5' style='display: none' id='company_panel'><div class='col-lg-10'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids' class='form-control'></select> </div></div><div class='col-lg-2'>&nbsp;<button type='button'   class='btn btn-default' onclick='set_items_company()' style='margin-top:5px;cursor: pointer'>Search <i class='fa fa-search'> </i></button></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-10'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' class='form-control'></select></div></div><div class='col-lg-2'><br><button type='button'  class='btn btn-default' onclick='set_items()' style='margin-top:5px;cursor: pointer'>Search <i class='fa fa-search'> </i></button> </div> </div></form></div> </div>");


        $.get("getSalesOfficeListForCompanyUser.php","",function(user_ret)
        {


            var obj=JSON.parse(user_ret);
            var option="";
            var data_append=new Array();
            if(obj.COMPANY.length>0)
            {
                $("#show_contain").show();
                $("#ors").show();
                $("#company_panel").show();

                $("#main_company_container").removeClass("col-lg-3")
                $("#main_company_container").addClass("col-lg-12");
                var options="";
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

                $("#main_company_container").removeAttrs("class");
                $("#main_company_container").addClass("col-lg-12");

                //$("#main_company_container").removeClass("col-lg-10")

            }


            else if(obj.LIST.length>0 && obj.COMPANY.length==0 )
            {
                $("#show_contain").show();

                $("#main_company_container").removeClass("col-lg-12")
                $("#main_company_container").addClass("col-lg-3");

            }




            for(var i=0;i<obj.LIST.length;i++)
            {


                data_append[i]=new Array();
                data_append[i][0]=obj.LIST[i].salesOfficeID;
                data_append[i][1]=obj.LIST[i].company_name;
                option+="<option value='"+data_append[i][0]+"'>"+data_append[i][1]+"</option>";

            }


            $("#typeid").html(option);


            /*  if ($("#company_panel").css("display") != "none") {
             asn_inbound_details($("#company_typeids").val());
             }else {

             asn_inbound_details($("#typeid").val());


             }*/

//




        });







    }else
    {
        $("#show_contain").hide();
        $("#append_cmp").append("<input type='hidden' value='"+x+"' id='typeid'>");


    }





}

function set_company1(x)
{

    $("#append_cmp").html("");

        $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");

var query={"id":x};
        $.get("getSaleOfficeList.php",query,function(user_ret)
        {


            var obj=JSON.parse(user_ret);
            var option="";
            var data_append=new Array();
            if(obj.COMPANY.length>0)
            {

                $("#cmp_type>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
                $("#show_contain").show();
                $("#ors").show();
                $("#company_panel").show();

                $("#main_company_container").removeClass("col-lg-3")
                $("#main_company_container").addClass("col-lg-12");
                var options="<option value=''>Select Company</option>";
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
            set_fun(x)
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
function set_company11(x)
{

    $("#append_cmp").html("");

    $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></div> </div>");

    var query={"id":x};
    $.get("getSaleOfficeList.php",query,function(user_ret)
    {


        var obj=JSON.parse(user_ret);
        var option="";
        var data_append=new Array();
        if(obj.COMPANY.length>0)
        {

            $("#cmp_type>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
            $("#show_contain").show();
            $("#ors").show();
            $("#company_panel").show();

            $("#main_company_container").removeClass("col-lg-3")
            $("#main_company_container").addClass("col-lg-12");
            var options="<option value=''>Select Company</option>";
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

function set_fun(x)
{

    $("#append_cmp1").html("");

    $("#append_cmp1").append("<input type='hidden' value='' id='ids_value1'> <div id='show_contain1' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' ><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container1'></div>  <div  class='col-lg-6' style='display:none ' id='company_panel1'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids1' onchange='call_by_company1(this.value)' class='form-control'></select> </div></div>  </div><div id='ors1' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain1'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid1' onchange='call_by_sales1(this.value)' class='form-control'></select></div></div></div></div> </div>");

    var query={"id":x};
    $.get("getSaleOfficeList.php",query,function(user_ret)
    {


        var obj=JSON.parse(user_ret);
        var option="";
        var data_append=new Array();
        if(obj.COMPANY.length>0)
        {
            $("#cmp_type1>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
            $("#show_contain1").show();
            $("#ors1").show();
            $("#company_panel1").show();

            $("#main_company_container1").removeClass("col-lg-3")
            $("#main_company_container1").addClass("col-lg-12");
            var options="<option value=''>Select Company</option>";
            var data_append1=new Array();
            for(var i=0;i<obj.COMPANY.length;i++)
            {


                data_append1[i]=new Array();
                data_append1[i][0]=obj.COMPANY[i].salesOfficeID;
                data_append1[i][1]=obj.COMPANY[i].company_name;
                options+="<option value='"+data_append1[i][0]+"'>"+data_append1[i][1]+"</option>";

            }
            $("#company_typeids1").html(options);
            //      asn_inbound_details($("#typeid").val());
        }



        if(obj.LIST.length==0)
        {

            $("#ors1").hide()
            $("#salesoffice_contain1").hide();
            $("#cmp_type1").remove();
            $("#main_company_container1").removeAttrs("class");
            $("#main_company_container1").addClass("col-lg-12");

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
            $("#show_contain1").show();
            $("#cmp_type1>div>select").append("<option value='Sales Office'>Sales Office</option>");

            $("#main_company_container1").removeClass("col-lg-12")
            $("#main_company_container1").addClass("col-lg-3");

        }


        option="<option value=''>Select Sales Office</option>";

        for(var i=0;i<obj.LIST.length;i++)
        {


            data_append[i]=new Array();
            data_append[i][0]=obj.LIST[i].slaveID;
            data_append[i][1]=obj.LIST[i].company_name;
            option+="<option value='"+data_append[i][0]+"'>"+data_append[i][1]+"</option>";

        }


        $("#typeid1").html(option);


        /*  if ($("#company_panel").css("display") != "none") {
         asn_inbound_details($("#company_typeids").val());
         }else {

         asn_inbound_details($("#typeid").val());


         }*/

//




    });











}

function set_company2(x)
{

    var checks=x;


    if(checks!="0")
    {

        $("#append_cmp").append("<input type='hidden' value='' id='ids_value'> <div id='show_contain' class='panel panel-green  margin-bottom-40' style='display:none;border: 1px solid #00a0d2;' > <div class='panel-heading' style='background-color: #00a0d2;color: white'><h3 class='panel-title'><i class='fa fa-task'></i>Company Details</h3></div> <div class='panel-body'> <div class='row'> <div class='col-lg-3' id='main_company_container'></div>  <form id='search_company' role='form' class=''><div  class='col-lg-6' style='display: none' id='company_panel'><div class='col-lg-12'><label>Company Name</label><div class='input-group-btn'><select id='company_typeids' onchange='call_by_company(this.value)' class='form-control'></select> </div></div>  </div><div id='ors' class='col-lg-1' style='display:none;padding-left:25px;text-align: center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>OR</h4></div><div class='col-lg-5' id='salesoffice_contain'><div class='col-lg-12'><label>Sales Office </label><div class='input-group-btn'><select id='typeid' onchange='call_by_sales(this.value)' class='form-control'></select></div></div></div></form></div> </div>");


        $.get("getSalesOfficeListForCompanyUser.php","",function(user_ret)
        {


            var obj=JSON.parse(user_ret);
            var option="";
            var data_append=new Array();
            if(obj.COMPANY.length>0)
            {
                $("#cmp_type>div>select").append("<option value='Company'>Company</option><option value='Sales Office'>Sales Office</option>");
                $("#show_contain").show();
                $("#ors").show();
                $("#company_panel").show();

                $("#main_company_container").removeClass("col-lg-3")
                $("#main_company_container").addClass("col-lg-12");
                var options="<option value=''>Select Company</option>";
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
                call_warehouse("Company");
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


option="<option value=''>Select Sales office</option>";

            for(var i=0;i<obj.LIST.length;i++)
            {


                data_append[i]=new Array();
                data_append[i][0]=obj.LIST[i].salesOfficeID;
                data_append[i][1]=obj.LIST[i].company_name;
                option+="<option value='"+data_append[i][0]+"'>"+data_append[i][1]+"</option>";

            }



            $("#typeid").html(option);
          call_warehouse("Sales Office");
           // call_warehouse("Company");
            /*  if ($("#company_panel").css("display") != "none") {
             asn_inbound_details($("#company_typeids").val());
             }else {

             asn_inbound_details($("#typeid").val());


             }*/

//




        });







    }else
    {
        $("#show_contain").hide();
        $("#append_cmp").append("<input type='hidden' value='"+x+"' id='typeid'>");


    }





}