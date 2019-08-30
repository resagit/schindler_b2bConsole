<?php // upload.php
$output=array("");
date_default_timezone_set("Asia/Kolkata");
include 'PHPExcel/IOFactory.php';

include_once 'admin-class.php';
// 'images' refers to your file input name attribute



// get user id posted

// a flag to see if everything is ok
$final=array();
$success = null;
$challan_no=array();
$items=array();
$dates=date("d_m_Y__h_i_s");


    $file_name = "uploads/29_09_2016__02_48_01.xlsx";
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
        $ms=array("challan_no"=>$rowData[0][0],"challan_date"=>$rowData[0][1],"sku"=>$rowData[0][2],"qty"=>$rowData[0][3],"uom"=>$rowData[0][4],"per_unit_price"=>$rowData[0][5],"consigee_name"=>$rowData[0][6],"consignee_number"=>$rowData[0][7],"consignee_address"=>$rowData[0][8],"consignee_address1"=>$rowData[0][9],"pin_code"=>$rowData[0][10],"instructions"=>$rowData[0][11]);
        array_push($items,$ms);

        foreach($rowData[0] as $k=>$v)
        {

            $res.= "".$v."";
        }
        $res.="<br>";
    }

    $res.='';
    sort($challan_no);
//$output['messages']=$items;

for($i=0;$i<count($challan_no);$i++)
{




        if($challan_no[$i]==$items[$i]["challan_no"])
        {


            array_push($final,array("challan_no"=>$items[$i]["challan_no"],"challan_date"=>$items[$i]["challan_date"],"sku"=>$items[$i]["sku"],"qty"=>$items[$i]["qty"],"uom"=>$items[$i]["uom"],"per_unit_price"=>$items[$i]["per_unit_price"],"consigee_name"=>$items[$i]["consigee_name"],"consignee_number"=>$items[$i]["consignee_number"],"consignee_address"=>$items[$i]["consignee_address"],"consignee_address1"=>$items[$i]["consignee_address1"],"pin_code"=>$items[$i]["pin_code"],"instructions"=>$items[$i]["instructions"]));


        }




}
$sames=array();
$old="";
echo count($final);
for($k=0;$k<count($final);$k++)
{
    if($old=="" || $final[$k]['challan_no']==$old)
    {


        array_push($sames["challan_no"][$k],array("challan_no"=>array("challan_no"=>$final[$k]["challan_no"],"sku"=>$final[$k]["sku"])));

    }else{
echo "new<br>";
        $old=$final[$k]['challan_no'];
    array_push($sames,array("items"=>array("challan_no"=>$final[$k]["challan_no"],"sku"=>$final[$k]["sku"])));
    }
    echo $sames["challan_no"][0]."<br>";
}


$output['messages']=$items;
// return a json encoded response for plugin to process successfully

echo json_encode($sames);
?>