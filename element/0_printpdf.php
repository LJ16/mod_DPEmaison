<?php 

//Related Content//
/**
* 2011-juillet
* @ All rights reserved
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* by LJ01 and Neil Withnall for help
* @ version dpemaison 1.4
**/

require('./fpdf.php');

$surface = trim($_POST['surface']); 
$adresse1 = trim($_POST['adresse1']); 
$reskwh = trim($_POST['reskwh']);
$resco2 = trim($_POST['resco2']);

//label values
$b_label = trim($_POST['b_label']);
$c_label = trim($_POST['c_label']);
$d_label = trim($_POST['d_label']);
$e_label = trim($_POST['e_label']);
$f_label = trim($_POST['f_label']);
$g_label = trim($_POST['g_label']);

$bco2_label = trim($_POST['bco2_label']);
$cco2_label = trim($_POST['cco2_label']);
$dco2_label = trim($_POST['dco2_label']);
$eco2_label = trim($_POST['eco2_label']);
$fco2_label = trim($_POST['fco2_label']);
$gco2_label = trim($_POST['gco2_label']);

class PDF extends FPDF {

//En-tete
function Header() {

	global $surface, $reskwh, $resco2, $adresse1;

	//Logo
	$this->Image('../image/maisonetiquette.gif',10,8,20,0,'','http://lau.jarry.free.fr/index.php/logiciel-libre/dpe-maison');
	$this->SetX(55);
	$this->SetFont('Arial','B',18);
	$this->SetTextColor(100);
	$str =" Votre étiquette ENERGIE CLIMAT ";
	$str = utf8_decode($str);
	$this->Cell(110,10, ' '.$str.' ',0,1,'C');
	$this->Cell(146,40, ' Energie                                      Climat' ,0,1,'C');

	$this->SetDrawColor(128,0,0);
	$this->Line(60, 30, 160, 30);
	$this->Line(60, 20, 160, 20);
	
	$this->Line(5, 5, 205, 5);
	$this->Line(5, 5, 5, 145);
	$this->Line(5, 145, 205, 145);
	$this->Line(205, 5, 205, 145);

	$this->SetX(55);
	$this->SetFont('Arial','B',12);
	$this->SetTextColor(100);
	$adresse1 = utf8_decode($adresse1);
	$this->Cell(100,-70,$adresse1,0,1,'C');
  	$this->Ln(5);
                  
	$this->SetFont('Arial','B',12);
	$this->SetTextColor(100);
	$unit1 = " kWh/m².an ";
	$unit2 = " kgCo2/m².an ";
	$unit1 = utf8_decode($unit1);
	$unit2 = utf8_decode($unit2);
	$this->Cell(185,245, ' ' . round($reskwh,1) . ' '.$unit1.'                                                   ' . round($resco2,1) . ' '.	$unit2.'',0,1,'C');

	
	parent::Header();
}

//Pied de page
function Footer() {

	//Positionnement � 1,5 cm du bas
	$this->SetY(-7);
	$this->SetX(17.5);

	//Police Arial italique 8
	$this->SetFont('Arial','I',8);
	$this->Line(10, 285, 200, 285);
	$this->Cell(0,0,'Etiquette Energie et Climat - http://lau.jarry.free.fr//modules/mod_DPEmaison/aide.pdf',0,0,'C');

}


function LabelDisplay() {

    global $reskwh, $b_label, $c_label, $d_label, $e_label, $f_label, $g_label, $resco2, $bco2_label, $cco2_label, $dco2_label, $eco2_label, $fco2_label, $gco2_label;

//energie label   

      	  $this->Image('../image/a.gif',20,45,23,0,'','');
	           	if($reskwh <= $b_label) {
		        $this->Image('../image/a2.gif',85,45,15,0,'','');}
      	  $this->Image('../image/b.gif',20,55,32,0,'','');
          		if($reskwh > $b_label && $reskwh <= $c_label) {
          		$this->Image('../image/b2.gif',85,55,15,0,'',''); }
      	  $this->Image('../image/c.gif',20,65,40,0,'','');
          		if($reskwh > $c_label && $reskwh <= $d_label) {
          		$this->Image('../image/c2.gif',85,65,15,0,'',''); }
       	  $this->Image('../image/d.gif',20,75,47,0,'','');
          		if($reskwh > $d_label && $reskwh <= $e_label) {	
          		$this->Image('../image/d2.gif',85,75,15,0,'',''); }
          $this->Image('../image/e.gif',20,85,53,0,'','');
          		if($reskwh > $e_label && $reskwh <= $f_label) {
          		$this->Image('../image/e2.gif',85,85,15,0,'',''); }
      	  $this->Image('../image/f.gif',20,94,59,0,'','');
          		if($reskwh > $f_label && $reskwh <= $g_label) {
          		$this->Image('../image/f2.gif',85,94,15,0,'',''); }
      	  $this->Image('../image/g.gif',20,103,64,0,'','');
        		if($reskwh > $g_label) {
        		$this->Image('../image/g2.gif',85,103,15,0,'',''); }
        		 	

      
//climat label

		
          $this->Image('../image/a1.gif',110,45,23,0,'','');
	           	if($resco2 <= $bco2_label) {
		        $this->Image('../image/a2.gif',175,45,15,0,'','');}
      	  $this->Image('../image/b1.gif',110,55,32,0,'','');
          		if($resco2 > $bco2_label && $resco2 <= $cco2_label) {
          		$this->Image('../image/b2.gif',175,55,15,0,'',''); }
      	  $this->Image('../image/c1.gif',110,65,40,0,'','');
          		if($resco2 > $cco2_label && $resco2 <= $dco2_label) {
          		$this->Image('../image/c2.gif',175,65,15,0,'',''); }
       	  $this->Image('../image/d1.gif',110,75,47,0,'','');
          		if($resco2 > $dco2_label && $resco2 <= $eco2_label) {	
          		$this->Image('../image/d2.gif',175,75,15,0,'',''); }
          $this->Image('../image/e1.gif',110,85,53,0,'','');
          		if($resco2 > $eco2_label && $resco2 <= $fco2_label) {
          		$this->Image('../image/e2.gif',175,85,15,0,'',''); }
      	  $this->Image('../image/f1.gif',110,94,59,0,'','');
          		if($resco2 > $fco2_label && $resco2 <= $gco2_label) {
          		$this->Image('../image/f2.gif',175,94,15,0,'',''); }
      	  $this->Image('../image/g1.gif',110,103,64,0,'','');
        		if($resco2 > $gco2_label) {
        		$this->Image('../image/g2.gif',175,103,15,0,'',''); }

      	}
}
     
$pdf=new PDF('L','mm','A5');
$pdf->SetTitle('DPEmaison');
$pdf->SetAuthor('LJ01'); 
$pdf->SetLeftMargin(0);

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->LabelDisplay();

$pdf->Output();
?>
