<?php // upload.php
include_once 'admin-class.php';

session_start();
date_default_timezone_set("Asia/Kolkata");
include 'PHPExcel/IOFactory.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";




$comp_id=get_form_name_value('company_id');
$order_type=get_form_name_value('order_type');
$warehouse_id=get_form_name_value('warehouse_id');
$shipper_id=get_form_name_value('shipper_id');
$cof=$_GET['cof'];
$contact_name=$_GET['contact_name'];
$contact_number=$_GET['contact_number'];
$username=$_SESSION['user_names'];
$pass=$_SESSION['pass'];
$filess=str_replace("/","\\",$_GET['times']);
$types="BMSoperational";






// 'images' refers to your file input name attribute



// get user id posted

// a flag to see if everything is ok
$final=array();
$success = null;
$challan_no=array();
$items=array();
$dates=date("d_m_Y__h_i_s");


$file_name = $filess;
$inputFileName = $file_name;
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
        . '": ' . $e->getMessage());
}

//Table used to display the contents of the file
$res.= '<center>';

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$rowData=array();
//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $highestRow; $row++) {
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
        NULL, TRUE, FALSE);
    $res.="";
    //echoing every cell in the selected row for simplicity. You can save the data in database too.

    array_push($challan_no,$rowData[0][0]);
    $ms=array("challan_no"=>$rowData[0][0],"challan_date"=>$rowData[0][1],"sku"=>$rowData[0][2],"qty"=>$rowData[0][3],"uom"=>$rowData[0][4],"per_unit_price"=>$rowData[0][5],"consigee_name"=>$rowData[0][6],"consignee_address"=>$rowData[0][7],"consignee_address1"=>$rowData[0][8],"pin_code"=>$rowData[0][9],"contact_name"=>$rowData[0][10],"contact_number"=>$rowData[0][11],"instruction"=>$rowData[0][12]);
    array_push($items,$ms);

    foreach($rowData[0] as $k=>$v)
    {

        $res.= "".$v."";
    }
    $res.="<br>";
}

$res.='';
sort($challan_no);
sort($items);
//$output['messages']=$items;

for($i=0;$i<count($challan_no);$i++)
{




    if(in_array($challan_no[$i],$items[$i]))
    {


        array_push($final,array("challan_no"=>$items[$i]["challan_no"],"challan_date"=>$items[$i]["challan_date"],"sku"=>$items[$i]["sku"],"qty"=>$items[$i]["qty"],"uom"=>$items[$i]["uom"],"per_unit_price"=>$items[$i]["per_unit_price"],"consigee_name"=>$items[$i]["consigee_name"],"consignee_number"=>$items[$i]["consignee_number"],"consignee_address"=>$items[$i]["consignee_address"],"consignee_address1"=>$items[$i]["consignee_address1"],"pin_code"=>$items[$i]["pin_code"],"contact_name"=>$items[$i]["contact_name"],"contact_number"=>$items[$i]["contact_number"],"instructions"=>$items[$i]["instruction"]));


    }




}
$sames=array("companyId"=>$comp_id,"wareHouseID"=>$warehouse_id,"shipperID"=>$shipper_id,"orderType"=>$order_type,"fromId"=>"-","toWareHouseID"=>"-","toCompanySalesOfficeID"=>"-","userName"=>$username,"userType"=>$types,"careOfID"=>$cof,"confContactName"=>$contact_name,"confContactNo"=>$contact_number,"excel"=>array());
$old="";

$i=-1;
$l=0;

for($k=0;$k<count($final);$k++)
{

    if($final[$k]["challan_no"]!=$old)
    {

        $i++;

        // array_push($sames,array("challan_no"=>$final[$k]["challan_no"]));
        //   array_push($sames,array("items"=>array("challan_no"=>$final[$k]["challan_no"],"sku"=>$final[$k]["sku"])));
        array_push($sames['excel'],array("chalanNo"=>$final[$k]["challan_no"],"chalanDate"=>$final[$k]["challan_date"],"consignee"=>array("careOfOrConsigneeName"=>$final[$k]["consigee_name"],"confContactNo"=>$final[$k]["contact_number"],"address1"=>$final[$k]["consignee_address"],"address2"=>$final[$k]["consignee_address1"],"pincode"=>$final[$k]["pin_code"],"confContactName"=>$final[$k]["contact_name"]),"specialInstruction"=>$final[$k]["instructions"],"items"=>array()));
        //  array_push($sames['excel'][$i]["items"],array("challan_no"=>$final[$k]["challan_no"],"sku"=>$final[$k]["sku"]));
        array_push($sames['excel'][$i]["items"],array("materialItemID"=>$final[$k]["sku"],"quantity"=>$final[$k]["qty"],"uom"=>$final[$k]["uom"],"perUnitPrice"=>$final[$k]["per_unit_price"]));
        $old=$final[$k]["challan_no"];
    }else{

        // array_push($sames,array("challan_no"=>$final[$k]["challan_no"]));
        array_push($sames['excel'][$i]["items"],array("materialItemID"=>$final[$k]["sku"],"quantity"=>$final[$k]["qty"],"uom"=>$final[$k]["uom"],"perUnitPrice"=>$final[$k]["per_unit_price"]));
        //array_push($sames["challan_no"][$old],array("items"=>array("challan_no"=>$final[$k]["challan_no"],"sku"=>$final[$k]["sku"])));

    }


}

$url="http://".$ip."/excelUpload/order";


/*$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sames,true));
$res=curl_exec($ch);*/


$data_string = json_encode($sames);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$response = curl_exec($ch);



// return a json encoded response for plugin to process successfully
echo $response;
unlink($filess);

//echo json_encode($sames);

?>