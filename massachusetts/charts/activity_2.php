<?php
ini_set("include_path","../../");
include("common/classes_ma.php");
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
$year = (int)$_POST['y'];
$template = new template;
$template->debug();
$print = !empty($_REQUEST["print"]);
$sumtype = !empty($_REQUEST["sumtype"]) ? $_REQUEST["sumtype"] : '';

$template->define_file($print ? 'dds2::_print_template.php' : 'dds_template.php');
if ($sumtype =='wages') {
   $template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Wage Summary');
$template->add_region('heading', 'Wage Summary');
$variable 	= 'percent'; }
else if ($sumtype == 'hours') {
   $template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Hours Summary');
$template->add_region('heading', 'Hours Summary');
   $variable 	= 'hoursumm';
}
else if ($sumtype == 'selfEmployment') {
   $template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Self Employment Summary');
$template->add_region('heading', 'Self Employment Summary');
   $variable 	= 'selfEmployment';
}
else if ($sumtype == 'group') {
   $template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Group Supported Employment Summary');
$template->add_region('heading', 'Group Supported Employment Summary');
   $variable 	= 'groupsumm';
}
else {
   $template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Hours Summary');
$template->add_region('heading', 'Hours Summary');
   $variable 	= 'hoursumm';

}
$template->add_region("sidebar", "<?php \$area = \"activity\"; \$show_flash_link = " . ($print + 0) . "; ?>");


$f			= dds2::getFilterValues();
if (empty($sumtype)) {
	$template->add_region('content', '<p class="error">Please select a summary type on the previous page.</p><p><a href="' . str_replace('_2.php', '_1.php', $_SERVER['REQUEST_URI']) . '">Back</a></p>');
	include('header.php');
	$template->make_template();
	include('footer.php');
	exit;
}
$data = array();
if ($f['provider'] && $f['provider']) {
	$provider = dds2::getProviderName($f['provider']);
} else {
	$provider = "ALL";
	$providerId = 0;
}
$legend		= dds2::getLegendName($variable, $f['region'], $provider, $f['year']);
$colors		= array("9900CC", "FF9900", "993333"); // purple, orange, brown



$data0 = dds2::formatCurrency(dds2::getActivityVariableArray('totalwages'));

$data1 = dds2::formatCurrency(dds2::getActivityVariableArray('meanwage'));

$data2 = dds2::formatUS(dds2::getActivityVariableArray('numberinactivity2'));
$data3 = dds2::getActivityVariableArray('percent2');
$data4 = dds2::formatCurrency(dds2::getActivityVariableArray('meanhourlywage'));
 $data5 = dds2::getActivityVariableArray('totalhours');
$data6 = dds2::getActivityVariableArray('paidtimeoff');
//$data7 = dds2::getActivityVariableArray('setaside');
$data8 = dds2::getActivityVariableArray('avghours');
$data9 = dds2::formatUS(dds2::getActivityVariableArray('numover20'));
$data10 = dds2::getActivityVariableArray('percover20');
//$data11 = dds2::getActivityVariableArray('percvol');
$data12 = dds2::formatUS(dds2::getActivityVariableArray('numberinactivity'));
$data13 = dds2::getActivityVariableArray('percent');
$data14 = dds2::getActivityVariableArray('selfEmpnum');
$data15 = dds2::getActivityVariableArray('selfEmpperc');
$data16 = dds2::formatCurrency(dds2::getActivityVariableArray('meanSelfemp'));
$data17 = dds2::formatCurrency(dds2::getActivityVariableArray('totalSelfemp'));
$data18 = dds2::formatCurrency(dds2::getActivityVariableArray('lowSelfemp'));
$data19 = dds2::formatCurrency(dds2::getActivityVariableArray('highSelfemp'));
$data20 = dds2::getActivityVariableArray('numbernewjobin12months');

if ($sumtype == 'wages') {
$data = array_merge_recursive($data2,$data3,$data1,$data4,$data0,/*$data5,$data6,*/$data20);


$totalpar = dds2::getActivityTotalArray('grandtotalwages');
$totalrow = number_format($totalpar['totalparticipants'],0,'.',',');

$totavggross =  dds2::getActivityTotalArray('averagegrosswage');
$totalrow2 = $totavggross['avggrosswage'];
$totavghourly = dds2::getActivityTotalArray('averagehourly');
 $totalrow3 = $totavghourly['averagehourly'];
$coltotwages= dds2::getActivityTotalArray('coltotwages');
$totalrow4 = $coltotwages['coltotwages'];
$totpto = dds2::getActivityTotalArray('percentpto');
$totalrow5 = $totpto['paidtimeoff'];
//$totsa = dds2::getActivityTotalArray('percentsa');
//$totalrow6 = $totsa['setaside'];
}
else if ($sumtype == 'hours') {

  $data12 = dds2::formatUS(dds2::getActivityVariableArray('numberinactivity',$year));
  $data13 = dds2::getActivityVariableArray('percent',$year);
  $data8 = dds2::getActivityVariableArray('avghours',$year);
  $data9 = dds2::formatUS(dds2::getActivityVariableArray('numover20',$year));
  $data10 = dds2::getActivityVariableArray('percover20',$year);
  $data = array_merge_recursive($data12,$data13,$data8,$data9,$data10,$data5);

   $totalpar = dds2::getActivityTotalArray('grandtotal');
$totalrow =    number_format($totalpar['totalparticipants'],0,'.',',');

   $colavghrs =  dds2::getActivityTotalArray('colavghrs');
   $totalrow2 = $colavghrs['avghrs'];
   $numover20 = dds2::getActivityTotalArray('colnumover20');
    $totalrow3 = $numover20['numover20'];

   $colpercover20= dds2::getActivityTotalArray('colpercover20');
   $totalrow4 = $colpercover20['percover20'];


   $coltotalhours = dds2::getActivityTotalArray('coltotalhrs');
   $totalrow5 = $coltotalhours['totalhours'];
   //$colpercvol = dds2::getActivityTotalArray('colpercvol');
   //$totalrow6 = $colpercvol['percvol'];
}
else if ($sumtype == 'group') {


    $data1g = dds2::getActivityVariableArray('numberinactivitygroup');
    $data2g = dds2::getActivityVariableArray('meanwagegroup');
    $data3g = dds2::getActivityVariableArray('avghoursgroup');
    $data4g = $year < 2022 ? array('&nbsp;&nbsp;&nbsp;--','&nbsp;&nbsp;&nbsp;--','&nbsp;&nbsp;&nbsp;--') : dds2::getActivityVariableArray('grouplocation');
    $data5g = $year < 2022 ? array('&nbsp;&nbsp;&nbsp;--','&nbsp;&nbsp;&nbsp;--','&nbsp;&nbsp;&nbsp;--') : dds2::getActivityVariableArray('groupnumworkers');
    $data6g = dds2::getActivityVariableArray('groupnumberemployed10of12');
    $data = array_merge_recursive($data1g,$data3g,$data2g,$data4g,$data5g,$data6g);
}
else if ($sumtype == 'selfEmployment') {
$data = array_merge_recursive($data14,$data15);
$data2 = array_merge_recursive($data16,$data17,$data18,$data19);


 }
//$labels		= implode(';', array_keys($data));
//$cats		= implode(';', $data);
$pcScript	= "graph.setcategories($labels;)\ngraph.setseries((CLR_{$colors[0]})'$legend';$cats;)\n"
			. "main.AddPCXML(<Textbox Name='title' Top='0' Left='0' Width='615' Height='24'><Properties AutoWidth='False' HJustification='Center' LeftMargin='5' RightMargin='5' FillColor='#BACBDB' Font='Size:14; Style:Bold Italic; Color:#5C656A;'/>\n"
			. "<Text>$legend</Text></Textbox>)\n"
 			. "main.AddPCXML(<Textbox Name='axis1' Top='120' Left='10' Width='75' Height='70'>\n"
			. "<Properties BorderType='None' AutoWidth='True' HJustification='Center' LeftMargin='5' RightMargin='5' FillColor='#ffffff' Font='Size:10; Style:Bold ; Color:black;' />\n"
			. "<Text>" . dds2::getAxisLabel($variable) . "</Text></Textbox>)\n"
 			. "graph.AddPCXML(<CategoryScale LimitLabelLength='False' MaxLengthRotatedText='10' StaggerLabels='False' RotateLabels='-45' LowOuterLine='Color:#7f7f7f;'  HighOuterLine='Color:#7f7f7f;'  MajorTick='Visible:False;'  MinorTick='Size:Large;'  MajorGrid='Color:#7f7f7f;'  Font='Size:12; Style:Bold Italic; Color:#3366ff;' MinorFont='Size:10;' />)";
/* $mychart = new chart;
$mychart->externalServerAddress = "http://www.communityinclusion.org:8080";
$mychart->internalCommPortAddress = "http://www.communityinclusion.org:8081";
$mychart->appearanceFile = "apfiles/dmr_activity.pcxml";
$mychart->width = 616;
$mychart->height = 430;
$mychart->userAgent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
$mychart->returnDescriptiveLink = true;
$mychart->language = "EN";
$mychart->pcScript = $pcScript;
$mychart->imageType = !$print ? "JPEG" : 'JPG'; */

preg_match('/^(number|percent|total|mean)/i', $variable, $th);





if ($sumtype == 'wages') {
   $html 	= $table = /* $mychart->getEmbeddingHTML() . */ '<table id="tablehold" border="1" cellpadding="3" cellspacing="0">'
		. "<caption>$legend</caption><thead><tr><th>Activity</th><th>Number of Individuals<br /> in Activity</th><th>Percent of Individuals<br /> in Activity</th><th>Average Gross Wage</th><th>Average Hourly Wage</th><th>Total Wages</th><th>Number entered a new individual job<br /> in the last 12 months</th></tr></thead><tbody>";
} else if ($sumtype == 'hours') {

   $html 	=  $table = '<table id="tablehold" border="1" cellpadding="3" cellspacing="0">'
   		. "<caption>$legend</caption><thead><tr><th>Activity</th><th>Number of Individuals<br /> in Activity</th><th>Percent of Individuals<br /> in Activity</th><th>Average Hours in Activity</th><th>Number worked more than 20 hours/week</th><th>Percent worked more than 20 hours /week</th><th>Total hours worked this period</th></tr></thead><tbody>";

} else if ($sumtype == 'group') {

   $html 	= $table = '<table id="tablehold" border="1" cellpadding="3" cellspacing="0">'
   		. '<caption>' . $legend . '</caption><thead><tr><th colspan="3"></th><th colspan="3">Percentage at locations by type</th><th colspan="3">Number of workers with a<br />disability on site, by percentage</th><th></th></tr><tr><th>Number of Individuals</th><th>Average Hours<br /> in Activity</th><th>Average Gross Wage</th><th>Community business site</th><th>Provider owned business</th><th>Other community locations</th><th>Two to four</th><th>Five to eight</th><th>Nine or more</th><th>Number worked in group supported employment<br />10 of the last 12 months</th></tr></thead><tbody>';


}

else if ($sumtype == 'selfEmployment') {

   $html 	=  $table = '<h3>' . $legend . '</h3><br /><table id="tablehold" border="1" cellpadding="3" cellspacing="0">'
   		. "<thead><tr><th>&nbsp;</th><th>Number of individuals</th><th>Percent of total served</th></thead><tbody>";

}

$where ="";

$aWhere = array();
if($sumtype != 'group') {
  foreach ($data as $label=>$val) {
     if (is_array($val)) {
         $aWhere = '<tr><th scope ="row">' . $label . '</th><td>'. implode('</td><td>',$val);
     }
     else {
         $aWhere = '<tr><th scope ="row">' . $label . '</th><td>' . $val;
     }
     $where .=  $aWhere . "</td></tr>";

   }
}
else {
  foreach ($data as $label=>$val) {


     if (is_array($val)) {
         $aWhere = '<td>'. implode('</td><td>',$val);
     }
     else {
         $aWhere = '<td>' . $val;
     }

     $where .=  $aWhere . "</td>";
  }
}

$html .= $where;
$table .= $where;
if($sumtype != 'selfEmployment' && $sumtype != 'group') $html .= "<tr class=\"totalrow\"><th>Unduplicated Total</th><td>$totalrow</td>" . ($sumtype != 'hours' ? "<td colspan=\"6\">"  : "<td colspan=\"6\">") . "</td></tr>";
$html .= "</tbody></table>"; $table .= "</tbody></table>";
if($sumtype == 'selfEmployment') {
   $html 	.=  '<br /><table id="tablehold2" border="1" cellpadding="3" cellspacing="0">'
   		. '<thead>
       <tr><th rowspan="2">&nbsp;</th><th rowspan="2">Mean</th><th rowspan="2">Total</th><th colspan="2">Range</th></tr>     <tr><th>Low</th><th>High</th></thead><tbody>';
          $table 	.=  '<br /><table border="1" cellpadding="3" cellspacing="0">'
          		. '<thead>
              <tr><th rowspan="2">&nbsp;</th><th rowspan="2">Mean</th><th rowspan="2">Total</th><th colspan="2">Range</th></tr>     <tr><th>Low</th><th>High</th></thead><tbody>';
          $where ="";

          $aWhere = array();

          foreach ($data2 as $label=>$val) {

             if (is_array($val)) {



                 $aWhere = '<tr><th scope ="row">' . $label . '</th><td>'. implode('</td><td>',$val);


             }
             else {
                 $aWhere = '<tr><th scope ="row">' . $label . '</th><td>' . $val;
             }
             $where .=  $aWhere . "</td></tr>";
          }
          $html .= $where;
$html .= "</tbody></table>";



       }
    $html .=  $year < 2022 && $sumtype == 'group' ? '<p>Table cells with -- indicate data not collected in this reporting period</p>' : '';
     $html .= "<a class=\"getfile\" style='display:block; height: 12px;' >Download spreadsheet of this data.</a>";
if($sumtype == 'selfEmployment' && $year < 2017) $html = "<p style=\"font-size: 115%\">No self employment data collected before 2017.  <a href=\"/massachusetts/charts/activity_1.php\">Select another summary report.</a></p>";


$template->add_region('content', $html); ?>

<?php include("header.php");

$template->make_template();

include("footer.php");
