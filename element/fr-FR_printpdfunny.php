<?php 

//Related Content//
/**
* 2011-aout
* @ All rights reserved
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* by LJ01 and Neil Withnall for help
* @ version dpemaison 1.5
**/

require('./fpdf.php');

$surface = trim($_POST['surface']); 
$adresse1 = trim($_POST['adresse1']); 
$reskwh = trim($_POST['reskwh']);
$resco2 = trim($_POST['resco2']);
$dpeprix = trim($_POST['dpeprix']);

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

	global $surface, $reskwh, $resco2, $adresse1, $dpeprix;

//1er rectangle
	$this->SetFillColor(150,200,250);
	$this->Rect(2, 2, 145, 18, 'F');
		$this->SetFont('Arial','B',14);
		$this->SetTextColor(250);
		$dpeprix = utf8_decode($dpeprix);
		$dpeprix = number_format($dpeprix,1,",","");
		$this->Cell(150,2,'Montant des consommations conventionnelles   '.round($dpeprix,1).' Euro',0,1,'C');
		$this->SetFont('Arial','B',8);
		$adresse1 = utf8_decode($adresse1);
		$this->Cell(220,9,$adresse1,0,1,'C');
                             
//2è rectangle
	$this->SetFillColor(250,250,200);
	$this->Rect(2, 20, 145, 30, 'F');
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(100);
		$conso="Consommations énergétiques        Emissions de gaz à effet de serre";
		$conso=utf8_decode($conso);
		$this->Cell(153,9,$conso,0,1,'C');
		$this->SetTextColor(150);
		$conso1="pour le chauffage, la production d'eau chaude sanitaire";
		$conso1=utf8_decode($conso1);
		$this->Cell(155,9,$conso1,0,1,'C');
		$conso2="et le refroidissement";
		$conso2=utf8_decode($conso2);
		$this->Cell(155,9,$conso2,0,1,'C');
//3è rectangle
	$this->SetFillColor(200,200,150);
	$this->Rect(2, 50, 145, 20, 'F');
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(100);
		$unit3 = "   Consommations conventionnelles           Estimation des émissions ";
		$unit3 = utf8_decode($unit3);
	$this->Cell(140,12, ''.$unit3.'',0,1,'C');

		$unit1 = " kWhep / m².an ";	
  	$unit2 = " kg eqCo2 / m².an ";
 		$unit1 = utf8_decode($unit1);	
		$unit2 = utf8_decode($unit2);
	$this->Cell(155,10, ' ' . round($reskwh,1) . ' '.$unit1.'                        ' . round($resco2,1) . ' '.	$unit2.'',0,1,'C');

//4è rectangle
	$this->SetFillColor(250,250,200);
	$this->Rect(2, 70, 145, 137, 'F');
	 $unit4 = "Logement économe                           Faibles émissions ";
	 $unit4 = utf8_decode($unit4);
	 $this->Cell(120,60, ''.$unit4.'',0,1,'C');
	$unit5 = "Logement énergivore                        Fortes émissions ";
	 $unit5 = utf8_decode($unit5);
	 $this->Cell(120,70, ''.$unit5.'',0,1,'C');

//ligne verticale	
  $this->SetDrawColor(200);
  $this->SetLineWidth(1);
  $this->Line(75, 20, 75, 30); 
	$this->Line(75, 51, 75, 200);
	
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
      	  $this->Image('../image/a.gif',5,105,18,0,'','');
	           	if($reskwh <= $b_label) {
		        $this->Image('../image/a2.gif',55,105,13,0,'','');}
      	  $this->Image('../image/b.gif',5,113,26,0,'','');
          		if($reskwh > $b_label && $reskwh <= $c_label) {
          		$this->Image('../image/b2.gif',55,113,13,0,'',''); }
      	  $this->Image('../image/c.gif',5,121,34,0,'','');
          		if($reskwh > $c_label && $reskwh <= $d_label) {
          		$this->Image('../image/c2.gif',55,121,13,0,'',''); }
       	  $this->Image('../image/d.gif',5,129,41,0,'','');
          		if($reskwh > $d_label && $reskwh <= $e_label) {	
          		$this->Image('../image/d2.gif',55,129,13,0,'',''); }
          $this->Image('../image/e.gif',5,137,47,0,'','');
          		if($reskwh > $e_label && $reskwh <= $f_label) {
          		$this->Image('../image/e2.gif',55,137,13,0,'',''); }
      	  $this->Image('../image/f.gif',5,145,53,0,'','');
          		if($reskwh > $f_label && $reskwh <= $g_label) {
          		$this->Image('../image/f2.gif',58,145,13,0,'',''); }
      	  $this->Image('../image/g.gif',5,153,58,0,'','');
        		if($reskwh > $g_label) {
          		$this->Image('../image/g2.gif',61,153,13,0,'',''); }
        		 	               
//climat label
                    		
          $this->Image('../image/a1.gif',77,105,18,0,'','');
	           	if($resco2 <= $bco2_label) {
		        $this->Image('../image/a2.gif',128,105,13,0,'','');}
      	  $this->Image('../image/b1.gif',77,113,25,0,'','');
          		if($resco2 > $bco2_label && $resco2 <= $cco2_label) {
          		$this->Image('../image/b2.gif',128,113,13,0,'',''); }
      	  $this->Image('../image/c1.gif',77,121,33,0,'','');
          		if($resco2 > $cco2_label && $resco2 <= $dco2_label) {
          		$this->Image('../image/c2.gif',128,121,13,0,'',''); }
       	  $this->Image('../image/d1.gif',77,129,40,0,'','');
          		if($resco2 > $dco2_label && $resco2 <= $eco2_label) {	
          		$this->Image('../image/d2.gif',128,129,13,0,'',''); }
          $this->Image('../image/e1.gif',77,137,46,0,'','');
          		if($resco2 > $eco2_label && $resco2 <= $fco2_label) {
          		$this->Image('../image/e2.gif',128,137,13,0,'',''); }
      	  $this->Image('../image/f1.gif',77,145,52,0,'','');
          		if($resco2 > $fco2_label && $resco2 <= $gco2_label) {
          		$this->Image('../image/f2.gif',130,145,13,0,'',''); }
      	  $this->Image('../image/g1.gif',77,153,57,0,'','');
        		if($resco2 > $gco2_label) {
        		$this->Image('../image/g2.gif',133,153,13,0,'',''); }

      	}
}
     
$pdf=new PDF('P','mm','A5');
$pdf->SetTitle('DPEmaison');
$pdf->SetAuthor('LJ01'); 
$pdf->SetLeftMargin(0);

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->LabelDisplay();

$pdf->Output();
?>
