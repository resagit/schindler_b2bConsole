<?php
include_once 'admin-class.php';
//$retailer="";
//$comm=0.60;

//$session=$_GET['session'];
//$tran="1000438608669";
session_start();
$user_names=$_SESSION['user_names'];
$pass=$_SESSION['pass'];

$fields_string="";
$companyId=$_GET['company_id'];
$warehouse_id=$_GET['warehouse_id'];
$data=$_GET['startdate'];
$company_name=$_GET['company_name'];
$warehouse_name=$_GET['warehouse_name'];


$Order_Handling_Cost=$_GET['orderHandlingCost'];
$Shipping_Cost=$_GET['shippingCost'];
$Tax_Percent=$_GET['taxPrecent'];
$Storage_Cost=$_GET['storageCost'];
$Total_Tax_Cost=$_GET['totalTaxCost'];
$Total_Cost=$_GET['totalCost'];
$Reverse_ShippingCost=$_GET['reverseShippingCost'];




foreach (scandir($dir) as $item) {
    if ($item == '.' || $item == '..') continue;
    unlink($dir.DIRECTORY_SEPARATOR.$item);
}
$res=str_replace("/","_",$company_name."-Company_Copy.pdf");
//$res1=str_replace("/","_",$companyId."-Customer_Copy.pdf");
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


        $CPM_NAME=strtoupper($_GET['company_name']);

        $comimage=$_POST['company_image'];
        if($comimage=="")
        {

            $comimage="bira.jpg";
        }

        $this->Image("$comimage", 10, 3, 40);

        $this->SetFont('Arial', 'B', 18);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetY(4);
        $this->SetX(75);






        $this->MultiCell(0, 5, "  $CPM_NAME", 0);
        $this->SetFont('Arial', '', 9);

        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetX(65);
        //$this->MultiCell(0, 5, $_SESSION['user_names'], 0);
        $this->SetX(70);
        //$this->MultiCell(0, 5, $_SESSION['user_names'], 0);



        $this->SetLineWidth(0);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(204, 204, 210);
        $this->SetTextColor(0);

        $this->Ln(5);
        $this->SetX(0);
        $this->Cell(230, 5, "BILL GENERATE (COMPANY COPY)", 'LTR', 0, 'C', true);



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
$pdf=new PDF_MC_Table();
$pdf->AddPage();

//$pdf->SetY(30);
//$pdf->SetX(110);
//$pdf->SetFont('Helvetica', 'B', 8);
//$pdf->MultiCell(80, 5, "Consignee", 1);

//$pdf->SetX(110);
//$pdf->SetFont('Helvetica', '', 8);
//$pdf->MultiCell(80, 5, "$companyId
//
//", 1);
////generateBill/{date}/{companyId}/{wareHouseID}/{type}/{userName}/{password}/{userType}
//$pdf->SetX(110);
//$pdf->MultiCell(80, 5, "", 1);
//$pdf->SetX(110);
//$pdf->MultiCell(80, 5, "Address: $companyId
//CIN : $companyId
//TIN:$companyId", 1);
//$pdf->SetFont('Helvetica', '', 8);
//$pdf->SetX(110);
//$pdf->MultiCell(80, 5, "Contact Person:     ".str_replace('+',' ',$companyId)."
//Contact No:     $companyId
//", 1);
$pdf->SetY(30);

$lineBreak = 0.21;
$pdf->SetLineWidth(1);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->SetTextColor(0);
//	$this->SetFillColor(94, 188, z);
$pdf->SetFillColor(255, 255, 256);
$pdf->SetLineWidth(0.2);
//    $pdf->Ln(10);
$pdf->SetX(50);
$pdf->MultiCell(80, 5, "Company Name:                 $company_name  ", 1);

$pdf->SetX(50);
$pdf->MultiCell(80, 5, "Warehouse:                        $warehouse_name  ", 1);
$pdf->SetX(50);
$pdf->MultiCell(80, 5, "Date:                                   $data", 1);
$pdf->Ln(5);

//$pdf->SetX(10);
//$pdf->SetFont('Helvetica', 'B', 8);
//$pdf->MultiCell(80, 5, "Shipper", 1);

//$pdf->SetX(10);
//$pdf->SetFont('Helvetica', '', 8);
//$pdf->MultiCell(80, 4, "$companyId
//TIN No: $companyId
//CIN No: $companyId", 1);

//$pdf->SetX(10);
//$pdf->MultiCell(80, 4, "C/o : $companyId
//$companyId
//
//", 1);

//$pdf->SetX(10);
//$pdf->MultiCell(80, 5, "Reference Name:     ".str_replace('+',' ',$companyId)."
//Reference Mob:      $companyId", 1);
//$pdf->Ln(5);
$pdf->SetX(10);
$pdf->SetFont('Helvetica','B',8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(50,40));
$pdf->SetX(50);
$pdf->Row(array("Bill Type","Total Amount"));
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
$pdf->SetX(50);
$pdf->Row(array("Order Handling Cost",$Order_Handling_Cost));
$pdf->SetX(50);
  $pdf->Row(array("Shipping Cost",$Shipping_Cost));
$pdf->SetX(50);
  $pdf->Row(array("Tax Percent",$Tax_Percent));
$pdf->SetX(50);
  $pdf->Row(array("Storage Cost",$Storage_Cost));
$pdf->SetX(50);
  $pdf->Row(array("Total Tax Cost",$Total_Tax_Cost));
$pdf->SetX(50);
 $pdf->Row(array("Total Cost",$Total_Cost));
$pdf->SetX(50);
  $pdf->Row(array("Reverse Shipping Cost",$Reverse_ShippingCost));
$pdf->SetX(50);
  $pdf->Ln(20);
  $pdf->SetX(10);
  $pdf->SetFont('Arial', 'B', 8);
//$pdf->MultiCell(0, 5, "Delivery Instructions");
//$pdf->SetX(10);
//$pdf->MultiCell(180, 8, "$companyId",1);
//$pdf->Ln(4);
//$message = "Terms/ Remarks : ";

//$pdf->SetFont('Arial', '', 8);
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, $message);
//$pdf->SetFont('Arial', '', 8);
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "1. Goods are being delivered on a returnable basis");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "2. Goods are SAMPLE ONLY NOT FOR SALE");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "3. Goods being delivered under this document are the property of $companyId .");

//$pdf->Ln(4);
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "4. Goods are being leased to the consignee for operation of draft beer equipment as per the Lease Agreement No. 000 dated 00/00/00 with the
//consignee. No other use is permitted of the said equipment other than that authorized by the above mentioned agreement. ".$companyId." reserves the right to remove the said equipment at any time from the outlet/ consignee.");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "5. Consignee is responsible for safe return of items in good condition. In case items are not returned in good condition, shipper will bill the said
//items to the consignee at full value.");
//$pdf->Ln(5);
//$pdf->SetFont('Arial', 'B', 8);
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "Received By");


//$pdf->SetX(130);
//$pdf->MultiCell(0, 5, "",0);
//
//$pdf->SetFont('Arial', 'B', 8);
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "Name :                        ______________________________");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "Designation :              ______________________________");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "Mobile No :                ______________________________");
//$pdf->SetX(10);
//$pdf->MultiCell(0, 5, "Signature");
//$pdf->SetX(10);
//$pdf->MultiCell(75, 8, "   ", 'LTRB', 0);


//$pdf->Ln(1);
//$pdf->SetX(130);
//$pdf->MultiCell(0, 10, "Authority Signature",0);



$pdf->Output("files/$res",'F');



$url= "http://".$ip."/generateBill/$data/$companyId/$warehouse_id/genearte/$user_names/$pass/BMSOperational";
$ch = curl_init();
$data1 = array('customerFile' => "@".getcwd()."/files/$res1",'companyFile'=>"@".getcwd()."/files/$res");
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, $data1);
$data = curl_exec($ch);


//echo $data;
if($data=="Y") {

    echo "<center><b>Challan no $company_name Successfully Created</b></center><br> <br>";
    echo '<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a download="' . $res . '" href="files/' . $res . '"><i class="fa fa-file-pdf-o fa-3x"></i>Download Company Copy Pdf</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>';


}





?>