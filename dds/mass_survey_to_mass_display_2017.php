<html><head></head><body><?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$DB = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "statedata",  "icistatedata99")) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$con = mysqli_select_db( $DB, 'corduroy')  or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$File = fopen('all-ma-individs-02-08-2019.csv', "r");

$arrResult  = array();


   while (($row = fgetcsv($File,2000,",")) !== FALSE) {
		
 print_r($row); echo "<br />"; 
			$areaoffice = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[6]);
			$Region = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[5]);
			$Vendorid =$row[1];
			$VendorName = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[0]);
			$ind_partic = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[7]) == 'Yes' ? 'Y':'N';
			$grp_partic = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[17]) == 'yes' ? 'Y':'N';
			$selfemp_partic = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[25]) == 'yes' ? 'Y':'N';
			$indcompethours = $row[8] != "" ? $row[8]: 0;
			$groupinteghours = $row[18] != "" ? $row[18]: 0;
			$selfemphours = $row[26] != "" ? $row[26]: 0;
			$totalhours = $indcompethours + $groupinteghours + $selfemphours;
			$indcompetdollars = $row[9] != "" ? $row[9]: 0;
			$groupintegdollars = $row[19] != "" ? $row[19]: 0;
			$selfempdollars = $row[27] != "" ? $row[27]: 0;
			$selfempexpenses = $row[28] != "" ? $row[28]: 0;
			$selfempnet = $selfempdollars - $selfempexpenses;
                        $completed = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[39]);
			$jobsearchpartic = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[29]) == 'Yes' ? 'Y':'N';
			$js_discovery =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[30]) == 'Yes' ? 'Y':'N';
			$js_jobdev =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[31]) == 'Yes' ? 'Y':'N';
			$YNWrap_partic =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[32]) == 'Yes' ? 'Y':'N';
			$YNWAComm =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[33]) == 'Yes' ? 'Y':'N';
			$YNWADay =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[34]) == 'Yes' ? 'Y':'N';
			$YNWAOth =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[35]) == 'Yes' ? 'Y':'N';
			$ind_10_of12 =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[16]) == 'Yes' ? 'Y':'N';
			$grp_10_of12 =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[24]) == 'Yes' ? 'Y':'N';
			$ind_new_job =  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[14]) == 'Yes' ? 'Y':'N';
			if($indcompethours > 0) { $yn_ind_minwage = ($indcompetdollars / $indcompethours) >= 11 ? 'Y' : 'N'; } else { $yn_ind_minwage = '-1'; }
			if($groupinteghours > 0)  {$yn_grp_minwage = ($groupintegdollars / $groupinteghours) >= 11 ? 'Y' : 'N'; } else { $yn_grp_minwage = '-1'; }

			$sql_insert = "INSERT INTO `spec_dmr6_import` (`Vendor`,`Vendor_ID`,`Reporting_Period`,`dob`,`YNIntegPartic`,`YNGroupPartic`,`YNSelfEmp`,`HrsInd`,`HrsGroup`,`HrsSelfEmp`,`TotalHours`,`dol_ind`,`dol_Group`,`dol_selfEmp`,`expens_selfEmp`,`net_selfEmp`,`Region`,`area_office`,`YNJobSearch`,`YNJSDisc`,`YNJSJobDev`,`YNWrap`,`YNWAComm`,`YNWADay`,`YNWAOth`,`NewIndJob`,`GroupSupEmp`,`IndSupEmp`,`YNInd`,`YNGroup`) VALUES ('$VendorName',$Vendorid,'2018',STR_TO_DATE('" . $row[4] ."', '%m/%d/%Y'),'$ind_partic','$grp_partic','$selfemp_partic',$indcompethours,$groupinteghours,$selfemphours,$totalhours,$indcompetdollars,$groupintegdollars,$selfempdollars,$selfempexpenses,$selfempnet,'$Region','$areaoffice','$jobsearchpartic','$js_discovery','$js_jobdev','$YNWrap_partic','$YNWAComm','$YNWADay','$YNWAOth','$ind_new_job','$grp_10_of12','$ind_10_of12','$yn_ind_minwage','$yn_grp_minwage')";
			echo $sql_insert;
			
		if ($completed == "Complete") $gotime = 	mysqli_query($GLOBALS["___mysqli_ston"], $sql_insert) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

		 }
  
    fclose($File);



?></body></html>

