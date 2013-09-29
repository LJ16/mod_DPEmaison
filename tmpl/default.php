<?php
//Related Content//
/** 2011-aout
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 1.6
**/             

defined( '_JEXEC' ) or die( 'Restricted access' ); 
                
jimport('joomla.html.html.bootstrap');

$document = JFactory::getDocument(); 
$document->addCustomTag( '<link rel="stylesheet" type="text/css" href="'. JURI::base() . 'modules/mod_DPEmaison/element/dpe.css" title="default" />' );  

//$document->addScript('modules/mod_DPEmaison/js/dpe.js');

   $uri = JURI::getInstance();
   $url = $uri->toString(); 
//
$co2_color_title=$params->get('co2_color_title');
$logo=$params->get('logo');
$adresse=$params->get('adresse');
$url_logo=$params->get('url_logo');
$logo_h=$params->get('logo_h');
$co2_title=$params->get('co2_title');
$title_txt=$params->get('title_txt');
$CO2_help=$params->get('CO2_help');
$delete_button=$params->get('delete_button');
$CO2_fioul=$params->get('CO2_fioul');
$CO2_gas=$params->get('CO2_gas');
$CO2_unitegas=$params->get('CO2_unitegas');
$CO2_gasp=$params->get('CO2_gasp');
$CO2_unitegasp=$params->get('CO2_unitegasp');
$CO2_bois=$params->get('CO2_bois');
$CO2_elect=$params->get('CO2_elect');
$image_height=$params->get('image_height');
$kwh_boisto=$params->get('kwh_boisto');

$lang= JFactory::getLanguage();
$language = $lang->getTag(); 
   
?>
<div class="DPEcontent">
<form method="post" class="myform" action="<?php echo JRoute::_($url); ?>">
              
<table width="100%">
	<tr width="100%">
	<td>
		<?php //display logo
		if ($logo == 0) { ?>	
		  	<a href="http://lj01.cmoi.cc/index.php/dpe-maison"
			   title="DPEmaison"
			   target="_blank">
			<img src="modules/mod_DPEmaison/image/maisonetiquette.gif"
			     height="<?php echo $logo_h; ?>" width="<?php echo $logo_h; ?>"
			     align="left">
			</a>	
		<?php }
	     
		elseif ($logo == 1) { ?>
			<a href="http://lau.jarry.free.fr/index.php/logiciel-libre/dpe-maison"
        		   title="DPEmaison" 
			   target="_blank">
			<img src="<?php echo $url_logo; ?>"
			     height="<?php echo $logo_h; ?>"
			     align="left">
			</a>	
		<?php }
		
		elseif ($logo == 2) {  } ?>

	</td>
	<td>
		<?php
		//display title  
		if ($co2_title == 0) { ?>
		    <div class="dpemaisontitle">
			<font color="<?php echo $co2_color_title; ?>">
			 <?php echo JText::_("WRITE_CONSO"); ?>
			</font>
		    </div>
		<?php  }
			  
		elseif ($co2_title == 1) { ?>
			<div class="dpemaisontitle">
			      	<font color="$co2_color_title">
			      		<?php echo $title_txt; ?>
			      	</font>
			</div>
		<?php }
			  
		elseif ($co2_title == 2) {  }
		?>
	</td>
	</tr>
</table>

<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a data-toggle="tab" href="#home"><?php echo JText::_('DATA'); ?></a></li>
  <li class="profiledpe"><a data-toggle="tab" name="profile" href="#profile"><?php echo JText::_('RESULT'); ?></a></li>
</ul>

<?php 
//début des onglets
echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'home'));
echo JHtml::_('bootstrap.addPanel', 'myTab', 'home');
?>

<table width="100%" border="1" bordercolor="<?php echo $co2_color_title; ?>">
             
<?php    //Dislpay adresse surface
  if ($adresse == 0) {   ?>
  <tr>
    	<td width="60%">
		<img class="imgdpe" src="modules/mod_DPEmaison/image/maison.png" 
			width="25" 
			height="25" 
			align="left">
		<strong>
			<?php echo JText::_('ADRESSE'); ?>
		</strong>
	</td>
  </tr>                                                               
        <tr>
           <td width="40%">
          	<input class="inputdpe" type="text" 
          		size="3" 
          		maxlength="50" 
          		name="adresse1" 
          		value="<?php if (isset($_POST['adresse1'])){ echo $_POST['adresse1'];} ?>">

          	<input class="inputdpe"  type="text" 
          		size="3" 
          		maxlength="5" 
          		name="surface" 
          		value="<?php if (isset($_POST['surface'])){ echo $_POST['surface'];} ?>">
          		<?php echo JText::_('m²'); ?>             
          </td>
        </tr> 
<?php    }
        
elseif ($adresse == 1) { ?>
	<tr>
           <td width="60%">
		<img class="imgdpe" src="modules/mod_DPEmaison/image/maison.png"
			width="25"
              		height="25" 
              		align="left">
		        <strong>
				<?php echo JText::_('SURFACE'); ?>
			</strong>
	   </td>
        </tr>                                                               
        <tr>
           <td width='40%'>
          	<input class="inputdpe"  type='text' 
          		size='6' 
          		maxlength='6' 
          		name='surface' 
          		value="<?php if (isset($_POST['surface'])){ echo $_POST['surface'];} ?>">
          		<?php echo JText::_('m²'); ?>
           </td>
        </tr>
<?php  }
            
//Dislpay fuel
if ($CO2_fioul == 0) {  ?>
  <tr>
	<td>
          	<img class="imgdpe" src="modules/mod_DPEmaison/image/fioul.png"
          		   width="25"
          		   height="25" 
          		   align="left">
                  		<strong><font color="#d43c0f">
                  			<?php echo JText::_('FIOUL_CONSO'); ?>
                  		</font></strong>
	</td>
        </tr>
        <tr>
      	   <td>
          	<font color="#d43c0f">
          	<input class="inputdpe" name="fioul"
          		align="right"
          		type="text" 
          		size="6" 
          		maxlength="6" 
          		value="<?php if (isset($_POST['fioul'])){ echo $_POST['fioul'];} ?>">
          		       <?php echo JText::_('FIOUL_KM'); ?>
          	</font>
      	   </td>
        </tr>
<?php   }

elseif ($CO2_fioul == 1) {  }

//Dislpay gas
if ($CO2_gas == 0 && $CO2_gasp == 0) { ?>
  <tr>
          <td>
	       <img class="imgdpe" src="modules/mod_DPEmaison/image/gaz.png"
                   	 width="25"
                   	 height="25" 
                   	 align="left">
	             <strong>
                  	<font color="#c7a600">
                     		<?php echo JText::_('GAZNAT_CONSO'); ?>
		        </font>
	             </strong>
	         </td>
        </tr>
        <tr>
           <td>
          	<font color="#c7a600">
            	<?php echo JText::_('GAZNAT'); ?>
          		<input class="inputdpe"  name="gas"
                		type="text" 
                		size="6"
                		maxlength="6" 
                		value="<?php if (isset($_POST['gas'])){ echo $_POST['gas'];} ?>">
                			
      		<?php if ($CO2_unitegas == 0) {
                        echo "  ".JText::_('GAZNAT_UNITE_M')."  ";  } 
                     elseif ($CO2_unitegas == 1) {
                        echo "  ".JText::_('GAZNAT_UNITE_K')."  "; } ?>
          </font>  
                <br>
          <font color="#c7a600">
          		<?php echo JText::_('PROPANE'); ?>  
      		<input class="inputdpe"  name="gasp" 
            		type="text" 
                	size="6" 
                	maxlength="6" 
                	value="<?php if (isset($_POST['gasp'])){ echo $_POST['gasp'];} ?>">
                
                <?php if ($CO2_unitegasp == 0) {
                        echo "  ".JText::_('PROPANE_UNITE_M')."  ";  } 
                      elseif ($CO2_unitegasp == 1) {
                        echo "  ".JText::_('PROPANE_UNITE_K')."	";  }	?>	
          	  </font> 
            </td>
        </tr>   
<?php }

if ($CO2_gas == 0 && $CO2_gasp == 1) { ?>
 <tr>
           <td>
	       <img class="imgdpe" src="modules/mod_DPEmaison/image/gaz.png"
                    width="25"
                    height="25" 
                    align="left">
	             <strong>
                  <font color="#c7a600">
                      <?php echo JText::_('GAZNAT_ONLY'); ?>
		  </font>
	             </strong>
	         </td>
        </tr>
        <tr>
           <td>
          	<font color="#c7a600">
          	<input class="inputdpe"  name="gas" 
                	type="text" 
                	size="6"
                	maxlength="6" 
                	value="<?php if (isset($_POST['gas'])){ echo $_POST['gas'];} ?>">
                      
                  <?php if ($CO2_unitegas == 0) {
                      echo "  ".JText::_('GAZNAT_UNITE_M')."  ";  } 
                  elseif ($CO2_unitegas == 1) {
                      echo "  ".JText::_('GAZNAT_UNITE_K')." ";  } ?>
              </font>
            </td>
        </tr>       
<?php }

if ($CO2_gas == 1 && $CO2_gasp == 0) { ?>
  <tr>
       <td>
               <img class="imgdpe" src="modules/mod_DPEmaison/image/gaz.png"
                      width="25"
                      height="25" 
                      align="left">
            	    <strong>
                      <font color="#c7a600">
                          <?php echo JText::_('PROPANE_ONLY'); ?>
            		 </font>
            	    </strong>
	           </td>
        </tr>
        <tr>
           <td>
          	<font color="#c7a600"> 
          	<input class="inputdpe" name="gasp" 
              		type="text" 
              		size="6"
              		maxlength="6" 
              		value="<?php if (isset($_POST['gas'])){ echo $_POST['gas'];} ?>">
               
                <?php if ($CO2_unitegasp == 0) {
                   echo "  ".JText::_('PROPANE_UNITE_M')."  ";  } 
                elseif ($CO2_unitegasp == 1) {
                   echo "  ".JText::_('PROPANE_UNITE_K')." ";  } ?>
          	  </font>
          </td>
        </tr>  
<?php }
       
elseif ($CO2_gas == 1 && $CO2_gasp == 1) {  }

//Dislpay electricity
if ($CO2_elect == 0) {  ?>
  <tr>
            <td>
	 	           <img class="imgdpe" src="modules/mod_DPEmaison/image/electricite.png"
                     width="25"
                     height="25" 
                     align="left">
		     <strong>
                    	<font color="#FF6600">
                        	<?php echo JText::_('ELEC_CONSO'); ?>
                   	</font>
                     </strong>
	    </td>
        </tr>
	<tr>
	    <td><font color="#FF6600">
		<?php echo JText::_('HEATING'); ?>
		 <input class="inputdpe" name="elek"
			type="text" 
			size="6" 
		        maxlength="6" 
			value="<?php if (isset($_POST['elek'])){ echo $_POST['elek'];} ?>">                        
                             <?php echo JText::_('kWh'); ?>	 </font>
<br>
     <font color="#FF6600">                   
		<?php echo JText::_('USING'); ?>
		 <input class="inputdpe" name="elec"
			type="text" 
			size="6" 
		        maxlength="6" 
			value="<?php if (isset($_POST['elec'])){ echo $_POST['elec'];} ?>">
                             <?php echo JText::_('kWh'); ?>  </font>
	    </td>
        </tr> 	
<?php  } 

elseif ($CO2_elect == 1) {  }

//Dislpay wood
if ($CO2_bois == 0 && $kwh_boisto == 0) { ?>
 <tr>
           <td>
		<img class="imgdpe" src="modules/mod_DPEmaison/image/bois.png"
			width="25"
			height="25" 
			align="left">
		<strong>
			<font color="#006600">
			<?php echo JText::_('WOOD_CONSO'); ?>
			</strong>
	   </td>
        </tr>
	<tr>
	   <td>	   						
		<font color="#006600">
		<SELECT class="selectdpe" name="biomasse" value="<?php if (isset($_POST['biomasse'])){ echo $_POST['biomasse'];} ?>">
		<OPTION><?php echo JText::_('CHOOSE_UNIT'); ?> </OPTION>
		<option value="1"<?php if(isset($_POST['biomasse']) == "1") echo"selected" ?>><?php echo JText::_('UNITBUCHE'); ?></option>
		<option value="2"<?php if(isset($_POST['biomasse']) == "2") echo"selected" ?>><?php echo JText::_('UNITGRANULE'); ?></option>
		<option value="3"<?php if(isset($_POST['biomasse']) == "3") echo"selected" ?>><?php echo JText::_('UNITPLAQU'); ?></option>
			
    		</SELECT>
		</font>
		<font color="#006600">
		<input  class="inputdpe" name="bois"
			type="text" 
			size="6"
			maxlength="6" 
			value="<?php if (isset($_POST['bois'])){ echo $_POST['bois'];} ?>">
		</font>
	   </td>
        </tr>

<?php  }
	
	if ($CO2_bois == 0 && $kwh_boisto == 1) { ?>
  <tr>
           <td>
		<img class="imgdpe" src="modules/mod_DPEmaison/image/bois.png"
			width="25"
			height="25" 
			align="left">
		<strong>
			<font color="#006600">
				<?php echo JText::_('WOOD_CONSO'); ?>
			</strong>
	   </td>
        </tr>
	<tr>
	   <td>
		<font color="#006600">
		<input class="inputdpe" name="bois"
			type="text" 
			size="6" 
			maxlength="6" 
			value="<?php if (isset($_POST['bois'])){ echo $_POST['bois'];} ?>">
		</font>
	   </td>
        </tr>
        <tr>
           <td>
		<font color="#006600">
		<SELECT class="selectdpe" name="biomasse" value="<?php if (isset($_POST['biomasse'])){ echo $_POST['biomasse'];} ?>">
		<OPTION><?php echo JText::_('CHOOSE_UNIT'); ?> </OPTION>
		<option value="1"<?php if($_POST['biomasse'] == "1") echo"selected" ?>><?php echo JText::_('UNITBUCHE'); ?></option>
		<option value="2"<?php if($_POST['biomasse'] == "2") echo"selected" ?>><?php echo JText::_('UNITGRANULE'); ?></option>
		<option value="3"<?php if($_POST['biomasse'] == "3") echo"selected" ?>><?php echo JText::_('UNITPLAQU'); ?></option>			
    		</SELECT>
		</font>
	   </td>
        </tr></table>

<?php  }

elseif ($CO2_bois == 1) {  }
    
?>
                 
</table>
<table width="100%">
	<tr>
		<td width="50%">
				
		<input type="submit" class="resultatdpe" name="DPEmaison_calcul" value="<?php echo JText::_('SUBMIT'); ?>">
		</td>

		<td width="50%" align="right">
		<?php 
		//display help  
		if ($CO2_help == 0) { ?>
		   <a href="http://lj01.cmoi.cc/telechargement/help/<?php echo $language; ?>_aideDPE.pdf"
			target="_blank">
				<font color="<?php echo $co2_color_title; ?>">
				    	<?php echo JText::_("AIDE");?>
				</font>
			  </a>
		<?php }  
		elseif ($CO2_help == 1) {  }   ?>
		</td>
	</tr>
</table>
</form>

<?php
echo JHtml::_('bootstrap.endPanel');
echo JHtml::_('bootstrap.addPanel', 'myTab', 'profile');
?>

<?php    
/*affiche info "faire la saisie si rien de saisie "
	if ($_POST[DPEmaison_calcul]  == 0) {  ?>
		<?php echo JText::_("AIDE");?>
	<?php }*/
   
// calcul method

$surface= (isset($_POST['surface'])); 
$adresse1= (isset($_POST['adresse1'])); 

$b_label=$params->get('b_label');
$c_label=$params->get('c_label');
$d_label=$params->get('d_label');
$e_label=$params->get('e_label');
$f_label=$params->get('f_label');
$g_label=$params->get('g_label');

$bco2_label=$params->get('bco2_label');
$cco2_label=$params->get('cco2_label');
$dco2_label=$params->get('dco2_label');
$eco2_label=$params->get('eco2_label');
$fco2_label=$params->get('fco2_label');
$gco2_label=$params->get('gco2_label');

$display_label=$params->get('display_label');
$display_co2_label=$params->get('display_co2_label');
$co2_compensate=$params->get('co2_compensate');
$print_icon=$params->get('print_icon');
$print_tmpl=$params->get('print_tmpl');

$kwhco2_gas=$params->get('kwhco2_gas');
$kwhkg_gasp=$params->get('kwhkg_gasp');
$co2kg_gasp=$params->get('co2kg_gasp');

//kwh calcul
    if ($CO2_unitegas == 0)
        $kwh_gas=$params->get('kwh_gas');
    if ($CO2_unitegas == 1)
        $kwh_gas=1;    
 $reskwh_gas=$_POST['gas']*$kwh_gas; 
/* $reskwh_gas= (isset($_POST['gas']))*$kwh_gas;  */

    if ($CO2_unitegasp == 0)
        $kwh_gasp=$params->get('kwh_gasp');
    if ($CO2_unitegasp == 1)
        $kwh_gasp=$params->get('kwhkg_gasp');
$reskwh_gasp=$_POST['gasp']*$kwh_gasp; 
/* $reskwh_gasp= (isset($_POST['gasp']))*$kwh_gasp; */

$kwh_fioul=$params->get('kwh_fioul');
$reskwh_fioul=$_POST['fioul']*$kwh_fioul; 
/* $reskwh_fioul= (isset($_POST['fioul']))*$kwh_fioul; */

$kwh_elec=$params->get('kwh_elec');
 $reskwh_elec=$_POST['elec']*$kwh_elec; 
/* $reskwh_elec= (isset($_POST['elec']))*$kwh_elec; */

$kwh_elek=$params->get('kwh_elek');
$reskwh_elek=$_POST['elek']*$kwh_elek; 
/* $reskwh_elek= (isset($_POST['elek']))*$kwh_elek; */

$reskwh_eleck=$reskwh_elec+$reskwh_elek;

    /* if ($_POST["biomasse"] == 1 )  */
   if ( (isset($_POST['biomasse'])) == 1 ) 
		$kwh_bois=$params->get('kwh_boisb'); 
   if ($_POST["biomasse"] == 2)
		$kwh_bois=$params->get('kwh_boisp');
   if ($_POST["biomasse"] == 3 &&  $kwh_boisto == 0)
		$kwh_bois=$params->get('kwh_boispl');
   if ($_POST["biomasse"] == 3 &&  $kwh_boisto == 1)
		$kwh_bois=$params->get('kwh_boisplt');
$reskwh_bois=$_POST['bois']*$kwh_bois;

$reskwh=(round($reskwh_eleck,2)+round($reskwh_gas,2)+round($reskwh_fioul,2)+round($reskwh_gasp,2)+round($reskwh_bois,2)+0.001)/(round($surface,2)+0.1);
$reskwh=round($reskwh,1);
 
//CO2 calcul
	$co2_gas=$params->get('co2_gas');
	$resco2_gas=$reskwh_gas*$co2_gas;

	$co2_gasp=$params->get('co2_gasp');
	$resco2_gasp=$reskwh_gasp*$co2_gasp;

	$co2_fioul=$params->get('co2_fioul');
	$resco2_fioul=$reskwh_fioul*$co2_fioul;

	$co2_elec=$params->get('co2_elec');
	$resco2_elec=$reskwh_elec*$co2_elec;

	$co2_elek=$params->get('co2_elek');
	$resco2_elek=$reskwh_elek*$co2_elek;

	$resco2_eleck=$resco2_elec+$resco2_elek;

	$co2_bois=$params->get('co2_bois');
	$resco2_bois=$reskwh_bois*$co2_bois;

$resco2=(round($resco2_eleck,2)+round($resco2_gas,2)+round($resco2_fioul,2)+round($resco2_gasp,2)+round($resco2_bois,2)+0.001)/(round($surface,2)+0.1);
$resco2=round($resco2,1);

// Display Images label Co2 et Kwh
	if ($reskwh <= $b_label)
		$imagenrj = 'A' ;
	elseif ($reskwh > $b_label && $reskwh <= $c_label)
		$imagenrj = 'B' ;
	elseif ($reskwh > $c_label && $reskwh <= $d_label)
		$imagenrj = 'C' ;
	elseif ($reskwh > $d_label && $reskwh <= $e_label)
		$imagenrj = 'D' ;
	elseif ($reskwh > $e_label && $reskwh <= $f_label)
		$imagenrj = 'E' ;
	elseif ($reskwh > $f_label && $reskwh <= $g_label)
		$imagenrj = 'F' ;
	elseif ($reskwh > $g_label)
		$imagenrj = 'G' ;
							
	if ($resco2 <= $bco2_label)
		$imageges = 'A' ;
	elseif ($resco2 > $bco2_label && $resco2 <= $cco2_label)
		$imageges = 'B' ;
	elseif ($resco2 > $cco2_label && $resco2 <= $dco2_label)
		$imageges = 'C' ;
	elseif ($resco2 > $dco2_label && $resco2 <= $eco2_label)
		$imageges = 'D' ;
	elseif ($resco2 > $eco2_label && $resco2 <= $fco2_label)
		$imageges = 'E' ;
	elseif ($resco2 > $fco2_label && $resco2 <= $gco2_label)
		$imageges = 'F' ;
       	elseif ($resco2 > $gco2_label)
		$imageges = 'G' ;
  
//Calcul du prix
	$prix_fioul = $params->get('prix_fioul');
	$prix_gas = $params->get('prix_gas');
	$prix_bois = $params->get('prix_bois');
	$prix_gasp = $params->get('prix_gasp');
	$prix_elec = $params->get('prix_elec');

	$dpeprix_fioul = $prix_fioul * $reskwh_fioul;
	$dpeprix_gas = $prix_gas * $reskwh_gas;
	$rdpeprix_gasp = $prix_gasp * $reskwh_gasp;
	$dpeprix_elec = ($_POST[elec] + $_POST[elek]) * $prix_elec ;
	$dpeprix_bois = $prix_bois * $reskwh_bois;

$dpeprix=(round($dpeprix_elec,2)+round($dpeprix_gas,2)+round($dpeprix_fioul,2)+round($rdpeprix_gasp,2)+round($dpeprix_bois,2))/100;$dpeprix=round($dpeprix,1);

//execute Calcul 
if (isset($_POST['DPEmaison_calcul'])) {

//Affichage étiquette
if ($display_label == 0)  { ?>      

    <table width="100%" align="center" cellspacing='0' cellpadding='0'><tr>
    	<div class='dpelabel'><font color="<?php echo $co2_color_title; ?>">
    			 <?php echo JText::_('RESULTAT_ENERGIE'); ?> </font></div></tr>
    	<tr><td align="center" width="100%">
    	<img class="imglabel" src="/modules/mod_DPEmaison/image/nrj_<?php echo $imagenrj ?>.gif" 
    		height="<?php echo $image_height; ?>" width="100%"
        align="center">
    		<font color="<?php echo $co2_color_title; ?>">
    		<?php echo round($reskwh,1) ?> kwhep/m²</font>
    	</td></tr>
    </table>
    </br>
    
<?php  }

elseif ($display_label == 1) {  }

if ($display_co2_label == 0) {  ?>

    <table width="100%" align="center" cellspacing='0' cellpadding='0'><tr>
    	<div class='dpelabel'><font color="<?php echo $co2_color_title; ?>">
    			 <?php echo JText::_('RESULTAT_CO2'); ?></font></div></tr>
    	<tr><td width="100%" align="center">
    	<img class="imglabel" src="/modules/mod_DPEmaison/image/ges_<?php echo $imageges ?>.gif" 
    		height="<?php echo $image_height; ?>"   width="100%"
        align="center">
    		<font color="<?php echo $co2_color_title; ?>">
    		<?php echo round($resco2,1) ?> gco2/m²</font>
    	</td></tr>
    </table>

<?php }

elseif ($display_co2_label == 1) {  } ?>

<table width="100%">
	<tr width="100%"><td width="80%">
<?php //display compensate Co2 icon  
if ($co2_compensate == 0) { ?>
	 <div class='compensate'>
		<a href="http://www.ingall-niger.org/index.php/co2"
		title="Co2"
		target="_blank">
		<img class="img" src="modules/mod_DPEmaison/image/world.png"
			width="20"
			height="20">  
			<font size='1' color='$co2_color_title'>					
				<?php echo JText::_('COMPENSER_BUTTON'); ?>
		</a> </font>
	</div>
<?php   }    

elseif ($co2_compensate == 1) {  } ?>
	      
	</td>
	<td width="20%">

	<?php //display print icon with template standrat           

	if ($print_icon == 0 && $print_tmpl == 0) { 
	$result .= '<form method="POST" action="'.JURI::base().'/modules/mod_DPEmaison/element/printpdf.php" target="_blank">';

	$result .= '<input type="hidden" name="surface" value="' . $surface . '" />';
	$result .= '<input type="hidden" name="adresse1" value="' . $adresse1 . '" />';
	$result .= '<input type="hidden" name="resco2" value="' . $resco2 . '" />';
	$result .= '<input type="hidden" name="reskwh" value="' . $reskwh . '" />';
	$result .= '<input type="hidden" name="dpeprix" value="' . $dpeprix . '" />';
	$result .= '<input type="hidden" name="imagenrj" value="' . $imagenrj . '" />';
	$result .= '<input type="hidden" name="imageges" value="' . $imageges . '" />';
              	
	$result .= '<form>';

	// Print icon
	$result .= '<input type="image" src="' . JURI::base() . '/modules/mod_DPEmaison/image/print.png" 
			width="25"  class="img" 
			height="25" 
			align="right" 
			border="0" 
			alt="Edit" />';	}  

	if ($print_icon == 0 && $print_tmpl == 1) { 
	$result .= '<form method="POST" action="'.JURI::base().'/modules/mod_DPEmaison/element/printpdfunny.php" target="_blank">';

	$result .= '<input type="hidden" name="surface" value="' . $surface . '" />';
	$result .= '<input type="hidden" name="adresse1" value="' . $adresse1 . '" />';
	$result .= '<input type="hidden" name="resco2" value="' . $resco2 . '" />';
	$result .= '<input type="hidden" name="reskwh" value="' . $reskwh . '" />';
	$result .= '<input type="hidden" name="dpeprix" value="' . $dpeprix . '" />';
	$result .= '<input type="hidden" name="imagenrj" value="' . $imagenrj . '" />';
	$result .= '<input type="hidden" name="imageges" value="' . $imageges . '" />';

	$result .= '<form>';	

	// Print icon
	$result .= '<input type="image" src="' . JURI::base() . '/modules/mod_DPEmaison/image/print.png" 
			width="25"  class="img" 
			height="25" 
			align="right" 
			border="0" 
			alt="Edit" />';	}

	if ($print_icon == 1 )  {  }  ?>

	</td></tr>
</table>	

<?php 
                         
} echo $result;

echo JHtml::_('bootstrap.endPanel');
echo JHtml::_('bootstrap.endPane', 'myTab'); 

?>
</table>
</div>
