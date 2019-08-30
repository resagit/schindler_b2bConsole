<?php

include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;
$username=$_COOKIE['user_name'];
$old_challan=$_POST['old_challan'];
//$session=$_POST['session'];
//$tran="1000438608669";
$fields_string="";
//$alternate=$_POST['alternate'];
$companyId=$_POST['companyId'];
$coID=$_POST['coID'];
$consigneeID=$_POST['consigneeID'];
$chalanNo=strtoupper($_POST['chalanNO']);
$chalanDate=$_POST['chalanDate'];
$materialItemID=$_POST['materialItemID'];
$new_matri=str_replace(' ', '%20', $materialItemID);
$quantity=$_POST['quantity'];
$uom=$_POST['uom'];
$orderType=$_POST['Challan_Type'];
$order_id=$_POST['order_id'];
$shipperRefName=urlencode($_POST['shipperRefName']);
$shipperRefMobileNo=$_POST['shipperRefMobileNo'];
$consigneeRefName=urlencode($_POST['consigneeRefName']);
$consigneeRefMobileNo=$_POST['consigneeRefMobileNo'];
$perUnitPrice=$_POST['perUnitPrice'];
$shipper_id=$_POST['shipper_id'];
$warehouse_id=$_POST['warehouse_id'];
//$userName="santosh";
$old_order_type=$_POST['old_order_type'];
$userType="BMSoperational";
$instruction=urlencode($_POST['instruction']);
$to_warehouse_id=$_POST['to_warehouse'];
       $to_company_id=$_POST['to_company'];
$cnf_from_id="-";
if(isset($_POST['cnf_from_id']))
{


    $cnf_from_id=$_POST['cnf_from_id'];
}



$dir="files";
foreach (scandir($dir) as $item) {
    if ($item == '.' || $item == '..') continue;
    unlink($dir.DIRECTORY_SEPARATOR.$item);
}

$consignee_name=$_POST['consignee_name'];
$consignee_name=str_replace("/"," ",$consignee_name);


$res=$chalanNo."-".$consignee_name."-Company_Copy.pdf";
$res1=$chalanNo."-".$consignee_name."-Customer_Copy.pdf";

touch("files/".$res);
touch("files/".$res1);

  date_default_timezone_set('UTC');
    require('fpdf/fpdf.php');

    class PDF_MC_Table extends FPDF
    {
        var $widths;
        var $aligns;
        function __construct($orientation = 'p', $unit = 'mm', $format = 'legal', $margin = 0)
        {
            $this->FPDF($orientation, $unit, $format);
            $this->SetTopMargin(20);
            $this->SetLeftMargin($margin);
            $this->SetRightMargin($margin);

            $this->SetAutoPageBreak(true, $margin);

        }

        function Header()
        {


            $CPM_NAME=strtoupper($_POST['company_name']);

            $coimage=$_POST['company_image'];
            if($coimage=="")
            {

                $coimage="bira.jpg";
            }
            $this->Image("$coimage", 10, 3, 40);

            $this->SetFont('Arial', 'B', 18);
            $this->SetFillColor(255, 255, 255);
            $this->SetTextColor(0);
            $this->SetY(4);
            $this->SetX(75);







                $this->MultiCell(0, 5, "     $CPM_NAME", 0);
                $this->SetFont('Arial', '', 9);

                $this->SetFillColor(255, 255, 255);
                $this->SetTextColor(0);
                $this->SetX(65);
                $this->MultiCell(0, 5, $_POST['company_address'], 0);
                $this->SetX(70);
                $this->MultiCell(0, 5, $_POST['company_detilas'], 0);



            $this->SetLineWidth(0);
            $this->SetFont('Arial', 'B', 10);
            $this->SetFillColor(204, 204, 210);
            $this->SetTextColor(0);

            $this->Ln(5);
            $this->SetX(0);
            $this->Cell(230, 5, "DELIVERY CHALLAN (COMPANY COPY)", 'LTR', 0, 'C', true);



            $this->Ln(20);







        }

        function Footer()
        {
            //Position at 1.5 cm from bottom

            //Page number

            $this->MultiCell(400, 60, '', 0);
        }
        function SetWidths($w)
        {
            //Set the array of column widths
            $this->widths=$w;
        }

        function SetAligns($a)
        {
            //Set the array of column alignments
            $this->aligns=$a;
        }

        function Row($data)
        {
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++)
            {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,5,$data[$i],0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }

        function CheckPageBreak($h)
        {
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }

        function NbLines($w,$txt)
        {
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
    }
/// Second Class


    class PDF_MC_Table1 extends FPDF
    {
        var $widths;
        var $aligns;
        function __construct($orientation = 'p', $unit = 'mm', $format = 'legal', $margin = 0)
        {
            $this->FPDF($orientation, $unit, $format);
            $this->SetTopMargin(20);
            $this->SetLeftMargin($margin);
            $this->SetRightMargin($margin);

            $this->SetAutoPageBreak(true, $margin);

        }

        function Header()
        {


            $CPM_NAME=strtoupper($_POST['company_name']);

            $coimage=$_POST['company_image'];
            if($coimage=="")
            {

                $coimage="bira.jpg";
            }
            $this->Image("$coimage", 10, 3, 40);

            $this->SetFont('Arial', 'B', 18);
            $this->SetFillColor(255, 255, 255);
            $this->SetTextColor(0);
            $this->SetY(4);
            $this->SetX(75);






                $this->MultiCell(0, 5, "       $CPM_NAME", 0);
                $this->SetFont('Arial', '', 9);

                $this->SetFillColor(255, 255, 255);
                $this->SetTextColor(0);
                $this->SetX(65);
                $this->MultiCell(0, 5, $_POST['company_address'], 0);
                $this->SetX(70);
                $this->MultiCell(0, 5, $_POST['company_detilas'], 0);






            $this->SetLineWidth(0);
            $this->SetFont('Arial', 'B', 10);
            $this->SetFillColor(204, 204, 210);
            $this->SetTextColor(0);

            $this->Ln(5);
            $this->SetX(0);
            $this->Cell(230, 5, "DELIVERY CHALLAN (CUSTOMER COPY)", 'LTR', 0, 'C', true);



            $this->Ln(20);







        }

        function Footer()
        {
            //Position at 1.5 cm from bottom

            //Page number

            $this->MultiCell(400, 60, '', 0);
        }
        function SetWidths($w)
        {
            //Set the array of column widths
            $this->widths=$w;
        }

        function SetAligns($a)
        {
            //Set the array of column alignments
            $this->aligns=$a;
        }

        function Row($data)
        {
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++)
            {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,5,$data[$i],0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }

        function CheckPageBreak($h)
        {
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }

        function NbLines($w,$txt)
        {
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
    }









    $username = $_COOKIE['user_name'];
//$session=$_POST['session'];
//$tran="1000438608669";
    $fields_string = "";
//$alternate=$_POST['alternate'];
    $companyId = $_POST['companyId'];
    $coID = $_POST['coID'];
    $consigneeID = $_POST['consigneeID'];
    $chalanNo = strtoupper($_POST['chalanNO']);
    $chalanDate = $_POST['chalanDate'];
    $materialItemID = $_POST['materialItemID'];
    $quantity = $_POST['quantity'];
    $uom = $_POST['uom'];
    $orderType = $_POST['Challan_Type'];
    $warehouse_id = $_POST['warehouse_id'];

    $shipperRefName = urlencode($_POST['shipperRefName']);
    $shipperRefMobileNo = $_POST['shipperRefMobileNo'];
    $consigneeRefName = urlencode($_POST['consigneeRefName']);
    $consigneeRefMobileNo = $_POST['consigneeRefMobileNo'];
    $perUnitPrice = $_POST['perUnitPrice'];
//$userName="santosh";
    // $userType = "BMSoperational";
    $instructions=$_POST['instruction'];
    $des = $_POST['des'];
    $company_name = $_POST['company_name'];
    $consignee_cin = $_POST['consignee_cin'];
    $consignee_tin = $_POST['consignee_tin'];
    $company_addr = $_POST['consignee_addr'];
    $consignee_name = $_POST['consignee_name'];
    $shipper_cin = $_POST['shipper_cin'];
    $shipper_tin = $_POST['shipper_tin'];
    $shipper_addr = $_POST['shipper_add'];
    $shipper_care_of = $_POST['shipper_care_of'];
$bom_id=$_POST['bom_id'];
$bom_qty=$_POST['bom_qty'];
$bom_item=$_POST['bom_item'];
$bom_des=$_POST['bom_des'];
$bom_rate=$_POST['bom_rate'];
$bom_qty_array = explode("*", $bom_qty);
$bom_item_array = explode("*", $bom_item);
$bom_des_array = explode("*", $bom_des);
$bom_rate_array = explode("*", $bom_rate);
    $uom_array = explode("*", $uom);
    $materialItemID_array = explode("*", $materialItemID);
    $des_array = explode("*", $des);
    $perUnitPrice_array = explode("*", $perUnitPrice);
    $quantity_array = explode("*", $quantity);

    $pdf=new PDF_MC_Table();
    $pdf->AddPage();







    ///Second Table
    $pdf->SetY(30);
    $pdf->SetX(110);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->MultiCell(80, 5, "Consignee", 1);

    $pdf->SetX(110);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->MultiCell(80, 5, "$consignee_name

", 1);
    $pdf->SetX(110);
    $pdf->MultiCell(80, 5, "", 1);
    $pdf->SetX(110);
    $pdf->MultiCell(80, 5, "Address: $company_addr
CIN : $consignee_cin
TIN:$consignee_tin", 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetX(110);
    $pdf->MultiCell(80, 5, "Contact Person:     ".str_replace('+',' ',$consigneeRefName)."
Contact No:     $consigneeRefMobileNo
", 1);


    $pdf->SetY(30);

    $lineBreak = 0.21;
    $pdf->SetLineWidth(1);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->SetTextColor(0);
//	$this->SetFillColor(94, 188, z);
    $pdf->SetFillColor(255, 255, 256);
    $pdf->SetLineWidth(0.2);
    //    $pdf->Ln(10);
    $pdf->SetX(10);
    $pdf->MultiCell(80, 5, "Challan No:                    $chalanNo  ", 1);

    $pdf->SetX(10);
    $pdf->MultiCell(80, 5, "Date:                                          $chalanDate", 1);
    $pdf->Ln(5);

    $pdf->SetX(10);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->MultiCell(80, 5, "Shipper", 1);

    $pdf->SetX(10);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->MultiCell(80, 4, "$company_name
TIN No: $shipper_tin
CIN No: $shipper_cin", 1);


    $pdf->SetX(10);
    $pdf->MultiCell(80, 4, "C/o : $shipper_care_of
$shipper_addr

", 1);

    $pdf->SetX(10);
    $pdf->MultiCell(80, 5, "Reference Name:     ".str_replace('+',' ',$shipperRefName)."
Reference Mob:      $shipperRefMobileNo", 1);

    $pdf->Ln(5);
    $pdf->SetX(10);
    $pdf->SetFont('Helvetica','B',8);
//Table with 20 rows and 4 columns
    $pdf->SetWidths(array(10,40,60,15,15,20,20));
    $pdf->Row(array("SR No.","Item Code","Description","Quantity","UOM","Per Unit","Total Price"));
    $pdf->SetFont('Helvetica','',8);
    srand(microtime()*1000000);
    $j=1;
    $totlal=array();
    for($i=0;$i<count($quantity_array);$i++)
    {
        $pdf->SetX(10);
        array_push($totlal,$perUnitPrice_array[$i]*$quantity_array[$i]);
        $pdf->Row(array(" $j","".$materialItemID_array[$i]."","".$des_array[$i]."
    "
        ,"".$quantity_array[$i]."
    ","".$uom_array[$i]."","INR ".$perUnitPrice_array[$i]."","INR ".$perUnitPrice_array[$i]*$quantity_array[$i].""));
        $j++;
    }
	    $pdf->SetX(10);
    $pdf->Row(array("","","","","","Total","INR ".array_sum($totlal).""));
$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Helvetica','B',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,40,60,15,15));
$pdf->Row(array("SR No.","BOM Code","Description","Quantity","Rate"));
$pdf->SetFont('Helvetica','',8);
srand(microtime()*1000000);
$j=1;
$totlal1=array();
for($i=0;$i<count($bom_qty_array);$i++)
{
    $pdf->SetX(10);
    array_push($totlal1,$bom_rate_array[$i]*$bom_qty_array[$i]);
    $pdf->Row(array(" $j","".$bom_item_array[$i]."","".$bom_des_array[$i]."
    "
    ,$bom_qty_array[$i]."","INR ".$bom_rate_array[$i]*$bom_qty_array[$i].""));
    $j++;
}
	
    $pdf->SetX(10);
    $pdf->Row(array("","","","","","Total","INR ".array_sum($totlal1).""));
    $pdf->Ln(2);
    $pdf->SetX(10);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->MultiCell(0, 5, "Delivery Instructions");
    $pdf->SetX(10);
    $pdf->MultiCell(180, 8, "$instructions",1);
    $pdf->Ln(4);
    $message = "Terms/ Remarks : ";

    $pdf->SetFont('Arial', '', 8);
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, $message);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "1. Goods are being delivered on a returnable basis");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "2. Goods are SAMPLE ONLY NOT FOR SALE");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "3. Goods being delivered under this document are the property of $company_name .");

    $pdf->Ln(4);
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "4. Goods are being leased to the consignee for operation of draft beer equipment as per the Lease Agreement No. 000 dated 00/00/00 with the
consignee. No other use is permitted of the said equipment other than that authorized by the above mentioned agreement. ".$company_name." reserves the right to remove the said equipment at any time from the outlet/ consignee.");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "5. Consignee is responsible for safe return of items in good condition. In case items are not returned in good condition, shipper will bill the said
items to the consignee at full value.");
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "Received By");


    $pdf->SetX(130);
    $pdf->MultiCell(0, 5, "For $company_name",0);




    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "Name :                        ______________________________");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "Designation :              ______________________________");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "Mobile No :                ______________________________");
    $pdf->SetX(10);
    $pdf->MultiCell(0, 5, "Signature");
    $pdf->SetX(10);
    $pdf->MultiCell(75, 8, "   ", 'LTRB', 0);


    $pdf->Ln(1);
    $pdf->SetX(130);
    $pdf->MultiCell(0, 10, "Authority Signature",0);



    $pdf->Output("files/$res",'F');
///  Second File Customer Copy




    $pdf1=new PDF_MC_Table1();
    $pdf1->AddPage();



    ///Seee



    ///Second Table
    $pdf1->SetY(30);
    $pdf1->SetX(110);
    $pdf1->SetFont('Helvetica', 'B', 8);
    $pdf1->MultiCell(80, 5, "Consignee", 1);

    $pdf1->SetX(110);
    $pdf1->SetFont('Helvetica', '', 8);
    $pdf1->MultiCell(80, 5, "$consignee_name

", 1);
    $pdf1->SetX(110);
    $pdf1->MultiCell(80, 5, "", 1);
    $pdf1->SetX(110);
    $pdf1->MultiCell(80, 5, "Address: $company_addr
CIN : $consignee_cin
TIN:$consignee_tin", 1);
    $pdf1->SetFont('Helvetica', '', 8);
    $pdf1->SetX(110);
    $pdf1->MultiCell(80, 5, "Contact Person:        ".str_replace('+',' ',$consigneeRefName)."
Contact No:     $consigneeRefMobileNo
", 1);


    $pdf1->SetY(30);

    $lineBreak = 0.21;
    $pdf1->SetLineWidth(1);
    $pdf1->SetFont('Helvetica', 'B', 8);
    $pdf1->SetTextColor(0);
//	$this->SetFillColor(94, 188, z);
    $pdf1->SetFillColor(255, 255, 256);
    $pdf1->SetLineWidth(0.2);
    //    $pdf1->Ln(10);
    $pdf1->SetX(10);
    $pdf1->MultiCell(80, 5, "Challan No:                    $chalanNo  ", 1);

    $pdf1->SetX(10);
    $pdf1->MultiCell(80, 5, "Date:                                            $chalanDate", 1);
    $pdf1->Ln(5);

    $pdf1->SetX(10);
    $pdf1->SetFont('Helvetica', 'B', 8);
    $pdf1->MultiCell(80, 5, "Shipper", 1);

    $pdf1->SetX(10);
    $pdf1->SetFont('Helvetica', '', 8);
    $pdf1->MultiCell(80, 4, "$company_name
TIN No: $shipper_tin
CIN No: $shipper_cin", 1);


    $pdf1->SetX(10);
    $pdf1->MultiCell(80, 4, "C/o : $shipper_care_of
$shipper_addr

", 1);

    $pdf1->SetX(10);
    $pdf1->MultiCell(80, 5, "Reference Name:        ".str_replace('+',' ',$shipperRefName)."
Reference Mob:      $shipperRefMobileNo", 1);

    $pdf1->Ln(5);
    $pdf1->SetX(10);
    $pdf1->SetFont('Helvetica','B',8);
//Table with 20 rows and 4 columns
    $pdf1->SetWidths(array(10,50,80,20,20));
    $pdf1->Row(array("SR No.","Item Code","Description","Quantity","UOM"));
    $pdf1->SetFont('Helvetica','',8);
    srand(microtime()*1000000);
    $j=1;

    for($i=0;$i<count($quantity_array);$i++)
    {
        $pdf1->SetX(10);
        $pdf1->Row(array(" $j","".$materialItemID_array[$i]."","".$des_array[$i]."
    "
        ,"".$quantity_array[$i]."
    ","".$uom_array[$i].""));
        $j++;
    }
	$pdf1->SetX(10);
    $pdf1->Row(array("","","","",""));
$pdf1->Ln(5);
$pdf1->SetX(10);
$pdf1->SetFont('Helvetica','B',8);
//Table with 20 rows and 4 columns
$pdf1->SetWidths(array(10,50,80,20,20));
$pdf1->Row(array("SR No.","BOM Code","Description","Quantity","Rate"));
$pdf1->SetFont('Helvetica','',8);
srand(microtime()*1000000);
$j=1;

for($i=0;$i<count($bom_qty_array);$i++)
{
    $pdf1->SetX(10);

    $pdf1->Row(array(" $j","".$bom_item_array[$i]."","".$bom_des_array[$i]."
    "
    ,$bom_qty_array[$i]."","INR ".$bom_rate_array[$i]*$bom_qty_array[$i].""));
    $j++;
} 


	$pdf1->SetX(10);
    $pdf1->Row(array("","","","",""));
    $pdf1->Ln(2);
    $pdf1->SetX(10);
    $pdf1->SetFont('Arial', 'B', 8);
    $pdf1->MultiCell(0, 5, "Delivery Instructions");
    $pdf1->SetX(10);
    $pdf1->MultiCell(180, 8, "$instructions",1);
    $pdf1->Ln(4);
    $message = "Terms/ Remarks : ";

    $pdf1->SetFont('Arial', '', 8);
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, $message);
    $pdf1->SetFont('Arial', '', 8);
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "1. Goods are being delivered on a returnable basis");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "2. Goods are SAMPLE ONLY NOT FOR SALE");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "3. Goods being delivered under this document are the property of $company_name.");

    $pdf1->Ln(5);
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "4. Goods are being leased to the consignee for operation of draft beer equipment as per the Lease Agreement No. 000 dated 00/00/00 with the
consignee. No other use is permitted of the said equipment other than that authorized by the above mentioned agreement. ".$company_name." reserves the right to remove the said equipment at any time from the outlet/ consignee.");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "5. Consignee is responsible for safe return of items in good condition. In case items are not returned in good condition, shipper will bill the said
items to the consignee at full value.");
    $pdf1->Ln(4);
    $pdf1->SetFont('Arial', 'B', 8);
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "Received By");
    $pdf1->SetX(130);
    $pdf1->MultiCell(0, 5, "For $company_name",0);
    $pdf1->SetFont('Arial', 'B', 8);
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "Name :                        ______________________________");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "Designation :              ______________________________");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "Mobile No :                ______________________________");
    $pdf1->SetX(10);
    $pdf1->MultiCell(0, 5, "Signature");
    $pdf1->SetX(10);
    $pdf1->MultiCell(75, 8, "   ", 'LTRB', 0);
    $pdf1->Ln(0);
    $pdf1->SetX(130);
    $pdf1->MultiCell(0, 10, "Authority Signature",0);
    $pdf1->Output("files/$res1",'F');



$username=$_COOKIE['user_name'];
$old_challan=$_POST['old_challan'];
//$session=$_POST['session'];
//$tran="1000438608669";
$fields_string="";
//$alternate=$_POST['alternate'];
$companyId=$_POST['companyId'];
$coID=$_POST['coID'];
$consigneeID=$_POST['consigneeID'];
$chalanNo=strtoupper($_POST['chalanNO']);
$chalanDate=$_POST['chalanDate'];
$materialItemID=$_POST['materialItemID'];
$new_matri=str_replace(' ', '%20', $materialItemID);
$quantity=$_POST['quantity'];
$uom=$_POST['uom'];
$orderType=$_POST['Challan_Type'];
$order_id=$_POST['order_id'];
$shipperRefName=urlencode($_POST['shipperRefName']);
$shipperRefMobileNo=$_POST['shipperRefMobileNo'];
$consigneeRefName=urlencode($_POST['consigneeRefName']);
$consigneeRefMobileNo=$_POST['consigneeRefMobileNo'];
$perUnitPrice=$_POST['perUnitPrice'];
$shipper_id=$_POST['shipper_id'];
$warehouse_id=$_POST['warehouse_id'];
//$userName="santosh";
$old_order_type=$_POST['old_order_type'];
$userType="BMSoperational";
$instruction=urlencode($_POST['instruction']);
$to_warehouse_id=$_POST['to_warehouse'];
$to_company_id=$_POST['to_company'];
$bom_id=check_value($_POST['bom_id']);
$bom_qty=check_value($_POST['bom_qty']);
$new_matri=check_value($new_matri);
$quantity=check_value($quantity);
$uom=check_value($uom);
$perUnitPrice=check_value($perUnitPrice);
 $url="http://".$ip."/updateChalanItemDetailsWithPdf/";
 //$companyId/$coID/$consigneeID/$old_challan/$chalanNo/$chalanDate/$new_matri/$quantity/$uom/$orderType/$shipperRefName/$shipperRefMobileNo/$consigneeRefName/$consigneeRefMobileNo/$perUnitPrice/$instruction/$username/$userType/$order_id/$old_order_type/$shipper_id/$warehouse_id/$cnf_from_id/$to_warehouse_id/$to_company_id";
$ch = curl_init();
$data1 = array('customerFile' => "@".str_replace("\\","/",getcwd())."/files/$res1",'companyFile'=>"@".str_replace("\\","/",getcwd())."/files/$res","companyId"=>$companyId,"coID"=>$coID,"consigneeID"=>$consigneeID,"chalanNo"=>$old_challan,"newChalanNo"=>$chalanNo,"chalanDate"=>$chalanDate,"materialItemID"=>$new_matri,"quantity"=>$quantity,"uom"=>$uom,"orderType"=>$orderType,"shipperRefName"=>$shipperRefName,"shipperRefMobileNo"=>$shipperRefMobileNo,"consigneeRefName"=>$consigneeRefName,"consigneeRefMobileNo"=>$consigneeRefMobileNo,"perUnitPrice"=>$perUnitPrice,"specialInstruction"=>$instruction,"userName"=>$username,"userType"=>$userType,"orderId"=>$order_id,"oldOrderType"=>$old_order_type,"shipperID"=>$shipper_id,"wareHouseID"=>$warehouse_id,"fromId"=>$cnf_from_id,"toWareHouseID"=>$to_warehouse_id,"toCompanySalesOfficeID"=>$to_company_id,"bomId"=>$bom_id,"bomQuantity"=>$bom_qty);
//$data1 = array('customerFile' => "@".getcwd()."/files/$res1",'companyFile'=>"@".getcwd()."/files/$res");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
$data = curl_exec($ch);


//echo $url;
if($data=="Y") {
    echo "<center><b>Challan no $chalanNo Successfully Updated</b></center><br> <br>";
        echo '<center><a download="' . $res . '" href="files/' . $res . '"><i class="fa fa-file-pdf-o fa-3x"></i>Download Company Copy Pdf</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a download="' . $res1 . '" href="files/' . $res1 . '"><i class="fa fa-file-pdf-o fa-3x"></i>Download Customer Copy Pdf</a></center>';



}else if($data=="M")
{
    echo("<script>console.log('PHP: ".$data."');</script>");
    echo "Challan Cannot Be Updated Moved From ASN or DSN Stage";
}

else if($data=="N")
{
    echo("<script>console.log('PHP: ".$data."');</script>");
    echo "Failed To Update Challan...";
}
else
{
    echo("<script>console.log('PHP: ".$data."');</script>");
    //echo $url;
 echo $data;
}



function check_value($a)
{

    if($a=="")
    {
        $a="-";
        return $a;

    }else
    {

        return $a;
    }

}
?>
