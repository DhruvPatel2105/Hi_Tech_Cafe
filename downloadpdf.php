<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require('fpdf185/fpdf.php');

if(isset($_SESSION["cart"])){

$pdf = new FPDF('P','mm','A4');

//add new page
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Image('./Assets/images/logo.png',10,5, 25, 25, 'PNG',0,1);
$pdf->Cell(130 ,55,'HI TECH Cafe',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Date :',0,0);
$pdf->Cell(25 ,5,date('Y-m-d'),0,1);//end of line

// $pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
// $pdf->Cell(25 ,5,'Invoice #',0,0);
// $pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

// $pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25 ,5,'Customer ID',0,0);
// $pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to  :',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$_SESSION['login_userFullname'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetTextColor(0, 160, 252);
//invoice contents

$pdf->SetFont('Arial','B',12);

$pdf->Cell(65 ,10,'Food Name',1,0);
$pdf->Cell(39 ,10,'Customize',1,0);
$pdf->Cell(20 ,10,'Quantity',1,0);
$pdf->Cell(30 ,10,'Price Details',1,0);
$pdf->Cell(35 ,10,'Order Total',1,1); //end of line

$pdf->SetFont('Arial','',12);
// $pdf->SetTextColor(0,0,0);
// Colors, line width and bold font
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','');
//Numbers are right-aligned so we give 'R' after new line parameter
$gtotal = 0;
foreach($_SESSION["cart"] as $keys => $values)
{

    $total = $values["food_quantity"] * $values["food_price"];

$pdf->Cell(65 ,5,$values["food_name"],1,0);
$pdf->Cell(39 ,5,$values["food_customize"],1,0);
$pdf->Cell(20 ,5,$values["food_quantity"],1,0);
$pdf->Cell(30 ,5,$values["food_price"],1,0);
$pdf->Cell(35 ,5,$total,1,1);
// $pdf->Cell(35 ,5,date('Y-m-d'),1,1,'R');//end of line
$gtotal = $gtotal + $total;
 }

 $percentage = (13 / $gtotal) * 100;

$t=round($percentage,2);
$pdf->Cell(130 ,5,'Subtotal',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,$gtotal,1,1,'R');//end of line

//summary

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$t,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'13%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$gtotal+$t,1,1,'R');//end of line



}


$pdf->Output();


?>