function set_menus(aw) {


        var  obj = JSON.parse(aw);
		//$("#create_materials").append("<li><a href='create_company_user.php'>Create Company User</a></li><li><a href='create_company_role.php'>Create Company Role</a></li>");
        var menus=new Array("CREATE INBOUND","MONTHLY STOCK REPORT","DDR REPORT","INBOUND FINANCE","MATERIAL WISE REPORT","STOCK TRANSFER","CREATE RETURN INBOUND","CREATE OUTBOUND","CREATE STOCK TRANSFER","CREATE MATERIAL","UPDATE CHALLAN","INVENTORY REPORT","MASTER DATA","MATERIAL LIST","DELIVERY UPDATE","TRACK","STOCK","CREATE COMPANY MASTER","CREATE OPERATIONAL USER","UPLOAD POD","ADD NOTE","CANCEL CHALLAN");

        var  data1 = new Array();

        var levelOptions1 = "";
        var optionss = "";
        var levelOption1 = "";
        var out = new Array();

        var k = new Array();
        k = [];





        for (var i = 0; i < obj.Details.length; i++) {

            data1[i] = new Array();
            data1[i][0] = obj.Details[i].uiRole;
            data1[i][1] = obj.Details[i].roleName;
            var page = (obj.Details[i].roleName).toLowerCase();
            //  alert(page);
            page = page.split(' ').join('_');
            //  alert(page+"after");
            if ($.inArray(data1[i][1], menus) > -1) {
                if (data1[i][1] == "CREATE INBOUND" || data1[i][1] == "CREATE OUTBOUND" || data1[i][1] == "CREATE RETURN INBOUND" || data1[i][1] == "CREATE STOCK TRANSFER") {
                    if (data1[i][1] == "CREATE INBOUND") {


                        $("#create_orders").append("<li><a href='create_inbound.php'>Inbound</a></li>");

                    } else if (data1[i][1] == "CREATE OUTBOUND") {
                        $("#create_orders").append("<li><a href='create_outbound.php'>Outbound</a></li>");


                    }
                    else if (data1[i][1] == "CREATE RETURN INBOUND") {
                        $("#create_orders").append("<li><a href='create_return_inbound.php'>Return Inbound</a></li>");


                    }
                    else if (data1[i][1] == "CREATE STOCK TRANSFER") {
                        $("#create_orders").append("<li><a href='create_stock_transfer.php'>Stock Transfer</a></li>");


                    }
                    else if (data1[i][1] == "CREATE STOCKTRANSFERORDER") {
                        $("#create_orders").append("<li><a href='create_stock_transfer.php'>Stock Transfer</a></li>");


                    }


                }

                else if (data1[i][1] == "MASTER DATA") {

                    $("#masters_menus").show()


                }
                else if (data1[i][1] == "UPDATE CHALLAN") {
                    $("#updates_order").append("<li><a href='update.php'>Update Order</a></li>");


                }
                else if (data1[i][1] == "UPLOAD POD") {
                    $("#updates_order").append("<li><a href='upload_pod.php'>Pod Upload</a></li>");


                }
                else if (data1[i][1] == "INVENTORY REPORT") {
                    $("#reports").append("<li><a href='inventory_report.php'>Inventory Report</a></li>");


                }
                else if (data1[i][1] == "STOCK TRANSFER") {
                    $("#reports").append("<li><a href='stock_transfer.php'>STOCK TRANSFER PROCESS</a></li>");


                }
                else if (data1[i][1] == "MONTHLY STOCK REPORT") {
                    $("#reports").append("<li><a href='Monthly_Stock_Report.php'>MONTHLY STOCK REPORT</a></li>");


                }
                else if (data1[i][1] == "DDR REPORT") {
                    $("#reports").append("<li><a href='DDR_Report.php'>DDR REPORT</a></li>");


                }
                else if (data1[i][1] == "INBOUND FINANCE") {
                    $("#reports").append("<li><a href='Inbound_Finance.php'>INBOUND FINANCE</a></li>");


                }
                else if (data1[i][1] == "MATERIAL WISE REPORT") {
                    $("#reports").append("<li><a href='material_wise_report.php'>MATERIAL WISE REPORT</a></li>");


                }
                else if (data1[i][1] == "MATERIAL LIST") {
                    $("#reports").append("<li><a href='materialList.php'>Material List</a></li>");


                }
                else if (data1[i][1] == "TRACK") {
                    $("#tracks").append("<li><a href='TRACK.php'>Track</a></li>");


                } else if (data1[i][1] == "ADD NOTE") {

                    $("#add_notes").show();
                    $("#add_notes ul").html("");
                    $("#add_notes ul").append("<li><a href='add_note.php'>Add Notes</a></li>")

                }
                else if (data1[i][1] == "CREATE OPERATIONAL USER") {

//         alert('')
                    $("#create_orders").parent().parent().append("<li class='dropdown' > <a href='#' ><i class='fa fa-newspaper-o'> </i>Operational Master</a><ul style='display: none;font-size: 12px'><li><a href='create_operational_user.php'>Create Operational User</a></li><li><a href='create_operational_role.php'>Create Operational Role</a></li><li><a href='update_operational_users_role.php'>Update Operational User Role</a></li><li><a href='update_operational_role.php'>Update Operational Role</a></li><li><a href='status_update_operational.php'>Active/Inactive</a></li></ul></li>")


                        $(".dropdown").click(function () {

                        $(this).find("ul").slideToggle();


                    })
                }
                else if (data1[i][1] == "CANCEL CHALLAN") {
                    $("#updates_order").append("<li><a href='CANCEL_CHALLAN.php'>Cancel Challan</a></li>")

                }
            }

        }



}