<?php
require("../db.php");
require("fpdf/fpdf.php");

$reque = "SELECT * FROM `requete` LIMIT 0,5";
$a = $bdd->prepare($reque);
$a->execute(array());

//Creation d'un pdf pr le recapitulatif des requete fondé
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('helvetica','',10);

$taile = array(20, 50, 40, 40, 40);
$pdf->SetFillColor(192, 229, 252);
$pdf->Cell($taile[0],10,'ID',1,0,'C',true);
$pdf->Cell($taile[0],10,'code',1,0,'C',true);
$pdf->Cell($taile[0],10,'obj',1,0,'C',true);
$pdf->Cell($taile[0],10,'date',1,0,'C',true);
$pdf->Cell($taile[0],10,'ID_etu',1,0,'C',true);

$pdf->SetFillColor(235,236,236);
$fill = false;

foreach($bdd->query($reque) as $row){
    $pdf->Ln(20);
    $pdf->Cell($taile[0],10,$row["id_Requete"],1,0,'C',$fill);
    $pdf->Cell($taile[0],10,$row["code_UE"],1,0,'L',$fill);
    
    $fill = !$fill;
}

$pdf->Output();
