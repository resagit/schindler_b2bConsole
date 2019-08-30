<?php // upload.php
$output=array("");
date_default_timezone_set("Asia/Kolkata");
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
    for ($row = 1; $row <= $highestRow; $row++) {
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL, TRUE, FALSE);
        $res.="<tr>";
        //echoing every cell in the selected row for simplicity. You can save the data in database too.
        foreach($rowData[0] as $k=>$v)
            $res.= "<td>".$v."</td>";
        $res.="</tr>";
    }

   $res.='</table><br><br><form id="send_file_time"><input type="hidden" name="times" value="'.$path.'"><input type="submit" class="btn btn-default"></form> </center>';

$output['messages']=$res;

}else{


    $output['messages'] = 'Failes';

}
// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>