<?php // upload.php
date_default_timezone_set("Asia/Kolkata");
function validateDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;
}
$output=array("");
$ms=array();
$mt=array();
$error=array();
include 'PHPExcel/IOFactory.php';

include_once 'admin-class.php';
// 'images' refers to your file input name attribute
if (empty($_FILES['files'])) {
    echo json_encode(['error'=>'No files found for upload.']);
// or you can throw an exception
    return; // terminate
}


// get user id posted

// a flag to see if everything is ok
$success = null;
$dates=date("d_m_Y__h_i_s");
// file paths to store
$types=$_FILES['files']['type'];
$path="uploads/".$dates."."."xlsx";
// get file names
$res="";
if(move_uploaded_file($_FILES['files']['tmp_name'],$path)) {

    $file_name = $path;
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
    $res.= '<center><table class="table table-striped">';

//  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
    for ($row =1; $row <= $highestRow; $row++) {
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL, true, true);
        //$res.="<tr>";
        //echoing every cell in the selected row for simplicity. You can save the data in database too.
        /* foreach($rowData[0] as $k=>$v)
         {

                 $res.= "<td>".$v."</td>";
         }*/
        if($row==1) {
            foreach($rowData[0] as $k=>$v)
            {

                $res.= "<th>".$v."</th>";
            }
        }


        if($row>1) {

            if (($rowData[0][0] == "" || strlen($rowData[0][0]) > 40 || !preg_match("/^[a-zA-Z0-9-_]*$/", $rowData[0][0])) || ($rowData[0][1] == "") || (!preg_match("/^[a-zA-Z0-9-_.]*$/", $rowData[0][2]) || $rowData[0][2]=="")  || (!preg_match("/^[0-9]*$/", $rowData[0][3]) || $rowData[0][3]<0) 	|| (!preg_match("/^[a-zA-Z]*$/", $rowData[0][4]) || $rowData[0][4]=="")	|| (!preg_match("/^[0-9]*$/", $rowData[0][5]) || $rowData[0][5]<0) ||  (!preg_match("/^[a-zA-Z0-9 ]*$/", $rowData[0][6]) || $rowData[0][6]=="")  || ($rowData[0][7]=="") || empty($rowData[0][9]) || empty($rowData[0][8]) || ($rowData[0][10]=="") || ($rowData[0][11]=="")  || ($rowData[0][12]=="")) {
                array_push($ms, array("challan_no" => $rowData[0][0], "challan_date" => $rowData[0][1], "sku" => $rowData[0][2], "qty" => $rowData[0][3], "uom" => $rowData[0][4], "per_unit_price" => $rowData[0][5], "consigee_name" => $rowData[0][6], "consignee_address" => $rowData[0][7], "consignee_address1" => $rowData[0][8], "pin_code" => $rowData[0][9],"contact_name" => $rowData[0][10],"contact_number" => $rowData[0][11], "instructions" => $rowData[0][12], "error" => "Error In this Line"));
            } else {

                //array($mt, array("challan_no" => $rowData[0][0], "challan_date" => $rowData[0][1], "sku" => $rowData[0][2], "qty" => $rowData[0][3], "uom" => $rowData[0][4], "per_unit_price" => $rowData[0][5], "consigee_name" => $rowData[0][6], "consignee_number" => $rowData[0][7], "consignee_address" => $rowData[0][8], "consignee_address1" => $rowData[0][9], "pin_code" => $rowData[0][10], "instructions" => $rowData[0][11]));
                array_push($mt, array("challan_no" => $rowData[0][0], "challan_date" => $rowData[0][1], "sku" => $rowData[0][2], "qty" => $rowData[0][3], "uom" => $rowData[0][4], "per_unit_price" => $rowData[0][5], "consigee_name" => $rowData[0][6], "consignee_address" => $rowData[0][7], "consignee_address1" => $rowData[0][8], "pin_code" => $rowData[0][9],"contact_name" => $rowData[0][10],"contact_number" => $rowData[0][11], "instructions" => $rowData[0][12]));
            }
        }
        /*  foreach($rowData[0] as $k=>$v)
          {
              if($v=="")
              $res.= "<td>".$v."</td>";
          }
          $res.="</tr>";*/


    }

    // $res.='</table><br><br><form id="send_file_time"><input type="hidden" name="times" value="'.$path.'"><input type="submit" class="btn btn-default"></form> </center>';
    if(count($ms)>0)
    {
        $res.="<th>Error</th>";
        for($k=0;$k<count($ms);$k++)
        {

            $res.="<tr class='bg-danger'><td ><i class='fa fa-warning'></i>&nbsp;&nbsp;".$ms[$k]["challan_no"]."</td><td>".$ms[$k]["challan_date"]."</td><td>".$ms[$k]["sku"]."</td><td>".$ms[$k]["qty"]."</td><td>".$ms[$k]["uom"]."</td><td>".$ms[$k]["per_unit_price"]."</td><td>".$ms[$k]["consigee_name"]."</td><td>".$ms[$k]["consignee_address"]."</td><td>".$ms[$k]["consignee_address1"]."</td><td>".$ms[$k]["pin_code"]."</td><td>".$ms[$k]["contact_name"]."</td><td>".$ms[$k]["contact_number"]."</td><td>".$ms[$k]["instructions"]."</td><td>".$ms[$k]["error"]."</td></tr>";

        }
        $res.='</table><br><br><a href=""><input type="button" class="btn btn-default" value="Close"></a> </center>';
        unlink($path);
    }else
    {

        for($k=0;$k<count($mt);$k++)
        {

            $res.="<tr ><td >".$mt[$k]["challan_no"]."</td><td>".$mt[$k]["challan_date"]."</td><td>".$mt[$k]["sku"]."</td><td>".$mt[$k]["qty"]."</td><td>".$mt[$k]["uom"]."</td><td>".$mt[$k]["per_unit_price"]."</td><td>".$mt[$k]["consigee_name"]."</td><td>".$mt[$k]["consignee_address"]."</td><td>".$mt[$k]["consignee_address1"]."</td><td>".$mt[$k]["pin_code"]."</td><td>".$mt[$k]["contact_name"]."</td><td>".$mt[$k]["contact_number"]."</td><td>".$mt[$k]["instructions"]."</td><td>".$mt[$k]["error"]."</td></tr>";

        }
        $res.='</table><br><br><form id="send_file_time"><input type="hidden" name="times" value="'.$path.'"><input type="submit" class="btn btn-default"></form> </center>';
    }

    $output['messages']=$res;

}else{


    $output['messages'] = 'Failes';

}
// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>