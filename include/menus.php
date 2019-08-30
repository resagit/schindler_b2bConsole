<!-- Navigation -->
<style>
#create_materials li {list-style: none; padding: 5px 0px 10px 0px; font-size: 13px;}
#create_materials li a {color: #fff; }
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color: white" href="en/index.php">BMS Admin</a>
    </div>	
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="javascript: void(0);" class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucwords($_COOKIE['user_name']); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li><li data-target="javascript: void(0);show_user" data-toggle="modal">
                    <a href="javascript:void(0)"><i class="fa fa-fw fa-edit"></i>Change Password</a>
                </li>
                <li>
                    <a href="en/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

	
	
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse" style="">
        <ul class="nav navbar-nav side-nav" id="menus_main">
            <li class="active">
                <a href="en/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <!-- <a href="javascript: void(0);" class="dropdown"> <i class="fa fa-bars"></i> Create Order</a> -->
                <ul  style="display: none" id="create_orders">
                    <li><a href="create_sto.php">STO</a></li>
                </ul>
            </li>
            <li id="masters_menus"  style="display: none">
                <a href="javascript: void(0);" class="dropdown"> <i class="fa fa-bars"></i> Master Data</a>
                <ul style="display: none;">
                    <li class="sub-dropdown" > 
                    <a href="javascript: void(0);" > <i class="fa fa-bars"></i> Create Master</a>
                        <ul style="display: none;font-size: 13px;padding-left: -2px;" id="create_materials" >
                            <li><a href="master_data.php">Create Client</a></li>
							<li><a href='create_company_role.php'>Assign Feature To Client</a></li>
							<li><a href='create_company_user.php'>Create Client User Profile</a></li>
							<li><a href="create_shipper.php">Create Supplier</a></li>
							<li><a href="create_material.php">Create SKU</a></li>		
                            <li><a href="create_packSize.php">Create Pack Size</a></li>		
							
                            <li><a href="create_clientSalesOffice.php">Create Sales Office</a></li>
							<li><a href="createRole.php">Create Sales Office Role</a></li>                            
                            <li style="width:150px;word-wrap:break-word;"><a href="create_user.php">Create Sales Office User Profile</a></li>
                            
                            				
                           <?php  if($_SESSION['roles_id']=="14" ){ ?>
							<!--<li><a href="create_wms_client_role.php">Create WMS Client Role</a></li>
                            <li><a href="create_wms_user.php">Create WMS Client User</a></li>
<?php } ?>		
                            <li><a href="create_report_user.php">Create  Report User</a></li> -->
                           <!-- <li><a href="create_uom.php">Create UOM </a></li> -->


                            <!-- <li><a href="create_bom.php">Create BOM</a></li>
                             <li><a href="create_secondary_uom.php">Create Secondary Uom </a></li> -->
                            <li><a href="create_storage_master.php">Create Storage Master</a></li>
                            <li><a href="view_storage.php">View Storage Master</a></li>
                            <li><a href="create_add_location.php">Create/Add Location</a></li>
                        </ul>

                    </li>
					<li class="sub-dropdown"> <a href="javascript: void(0);" > <i class="fa fa-bars"></i> Update Master</a>
                        <ul style="display: none" id="create_materials">
                            <li><a href="edit_client.php">Update Client</a></li>
							<li><a href="edit_company_role.php">Update Client Role</a></li>
                            
                            <li><a href="edit_shipper.php">Update Supplier</a></li>
							<li><a href="materialList.php">Update SKU </a></li>
                            <li><a href="update_packsize.php">Update Pack Size</a></li>	

							<!-- <li><a href="update_secondary_uom.php">Update Secondary Uom</a></li> -->
                            <li><a href="edit_sales_office_role.php">Update Sales Office Role</a></li>
                            <li><a href="edit_sales_office.php">Update Sales Office</a></li>
                            <?php /* if($_SESSION['roles_id']=="14" ){ ?>
                            <li><a href="edit_wms_client_role.php">Update WMS Client Role</a></li>
                            <?php }*/ ?>
                            
                            <li><a href="status_update_shipper.php">Active and In-Active Shipper</a></li>
                              <!-- <li><a href="update_uom.php">Update UOM </a></li> -->

                              
                            <!-- <li><a href="update_bom.php">Update BOM</a></li> -->
                            
                            <li><a href="update_location.php">Update Location</a></li>
                        </ul>

                    </li>
                    <li class="sub-dropdown"> <a href="javascript: void(0);" > <i class="fa fa-bars"></i> Create Warehouse Master</a>
                        <ul style="display: none;font-size: 13px;padding-left: -5px;" id="create_materials">
                        <li><a href="create_warehouse_vendor.php">Create Warehouse Vendor</a></li>
                            <li><a href="create_warehouse.php">Create Warehouse</a></li>
							<li><a href="create_warehouse_role.php">Create Warehouse Role</a></li>
                            <li  style="width:150px;word-wrap:break-word;"><a href="warehouse_user.php">Create Warehouse User Profile</a></li>                            
                            <li><a href="status_update_warehouse.php">Active/In-Active Warehouse</a></li>
                            <li><a href="status_update_warehouse_user.php">Active/In-Active Warehouse User</a></li>
                            <li><a href="status_update_warehouse_location.php">Active/In-Active Warehouse Location</a></li>
                            <li><a href="add_bulk_warehouse_location.php">Create/Add Warehouse Location</a></li>
                        </ul>

                    </li>
                    <li class="sub-dropdown"> <a href="javascript: void(0);" > <i class="fa fa-bars"></i> Update Warehouse Master</a>
                        <ul style="display: none;font-size: 13px;padding-left: -5px;" id="create_materials">
                        <li><a href="edit_warehouse_vendor.php">Update Warehouse Vendor</a></li>
                            <li><a href="edit_warehouse.php">Update Warehouse</a></li>
                            <li><a href="update_warehouse_role.php">Update Warehouse Role</a></li>
                            <li><a href="update_warehouse_users_role.php">Update Warehouse Users Role</a></li>
                        </ul>
                    </li>
                    
                    <li class="sub-dropdown"> <a href="javascript: void(0);" > <i class="fa fa-bars"></i> Assign or Assigned</a>
                        <ul style="display: none" id="create_materials">
                            <li><a href="assign.php">Assign</a></li>
                            <li><a href="assigned_warehouse.php">Assigned</a></li>
                            <li><a href="unassign_warehouse.php">Unassign</a></li>
                        </ul>

                    </li>
                    <li id="configs"  style="display: block" ><a href="javascript: void(0);" class="dropdown"> <i class="fa fa-edit"></i> Configure</a>
                        <ul  style="display: none" id="create_materials">
                            <li><a href="AutoConfig.php">Auto-Config</a></li>
                        </ul></li>
                </ul>
            </li>

            <!-- <li><a href="javascript: void(0);" class="dropdown"> <i class="fa fa-edit"></i> Update Order</a>
                <ul  style="display: none" id="updates_order"></ul>
			</li> -->

            <li ><a href="javascript: void(0);" class="dropdown"> <i class="fa fa-archive"></i> Report</a>
                <ul  style="display: none" id="reports">

                </ul></li>
            <!-- <li ><a href="javascript: void(0);" class="dropdown"> <i class="fa fa-map-marker"></i> Track</a>
                <ul  style="display: none" id="tracks"></ul>
			</li> -->
            <li id="add_notes"  style="display: none" ><a href="javascript: void(0);" class="dropdown"> <i class="fa fa-newspaper-o"></i> Add Notes</a>
                <ul  style="display: none" >

                    <li><a href="add_notes.php">
                            Add Notes
                        </a></li>
                </ul></li>


            <!-- <li id="Bills"  style="display: block" ><a href="javascript: void(0);" class="dropdown"> <i class=" glyphicon glyphicon-list-alt"></i> Bills</a>
                <ul  style="display: none" >

                    <li><a href="create_storage_bill.php"><i class=" fa fa-bars"></i> Create Storage Bill</a></li>
                    <li><a href="update_storage_bill.php"><i class=" fa fa-edit"></i> Update Storage Bill</a></li>
                    <li><a href="create_pick_pack.php"><i class=" fa fa-bars"></i> Create Pick Pack</a></li>
                    <li><a href="update_pick_pack.php"><i class=" fa fa-edit"></i> Update Pick Pack</a></li>
                    <li><a href="assign_bill_type.php"><i class=" glyphicon glyphicon-check"></i> Assign Bill Type</a></li>
                    <li><a href="ActiveInactiveBillType.php"><i class=" glyphicon glyphicon-unchecked"></i> Inactive Bill Type</a></li>
                    <li><a href="viewAllCostForClient.php"><i class=" glyphicon glyphicon-eye-open"></i> View Cost For Client</a>
                    <li><a href="viewAllTaxForClient.php"><i class=" glyphicon glyphicon-eye-open"></i> View Tax For Client</a></li>
                    <li><a href="bill_generate.php"><i class=" fa fa-bars"></i> Shipment Cost</a></li>
                    <li><a href="viewGenerateBill.php"><i class="glyphicon glyphicon-cloud-download"></i> Bill Generate</a></li>
                    <li><a href="create_order_handling.php">Order handling</a></li>
                    <li><a href="update_order_handling.php">Update Order handling</a></li>
                    <li><a href="create_tax_value_master.php">Create tax value </a></li>
                    <li><a href="update_tax_value_master.php">Updatetax value </a></li>
                    <li><a href="AssignUnassignTaxForClient.php">Assign tax for client </a></li>

                </ul></li> -->






        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>