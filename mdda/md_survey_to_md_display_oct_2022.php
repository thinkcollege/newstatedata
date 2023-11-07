<html><head></head><body><?php
// Preparing the csv file:  find and replace dollar signs and commas in the wages fields. Don't forget to take out top row with column names
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$DB = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "mdda_user",  "f7Y6d9G8")) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$con = mysqli_select_db( $DB, 'mdda_db')  or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$File = fopen('MD_Oct2022_data_import.csv', "r");

$arrResult  = array();


   while (($row = fgetcsv($File,2000,",")) !== FALSE) {

 print_r($row); echo "<br />";
			$areaoffice = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[4]);
			$Region = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[3]);
			$Vendor = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[0]);
			$indcompethours = $row[6] && $row[6] != "" ? $row[6]: 0;
			$indcontractedhours = $row[12] && $row[12] != "" ? $row[12]: 0;
			$groupinteghours = $row[19] && $row[19] != "" ? $row[19]: 0;
			$selfemphours = $row[25] && $row[25] != "" ? $row[25]: 0;
			$facbasedhours = $row[30] != "" ? $row[30]: 0;
                        $comnonworkhrs = $row[37] && $row[37] != "" ? $row[37]: 0;
			$totalhours = $indcompethours + $indcontractedhours + $selfemphours + $facbasedhours;
			$indcompetdollars = $row[7] && $row[7] != "" ? $row[7]: 0;
			$indcontractdollars = $row[13] && $row[13] != "" ? $row[13]: 0;
			$groupintegdollars = $row[20] && $row[20] != "" ? $row[20]: 0;
			$selfempdollars = $row[26] && $row[26] != "" ? $row[26]: 0;
			$selfempexpenses = $row[27] && $row[27] != "" ? $row[27]: 0;
			$selfempnet = $selfempdollars - $selfempexpenses;
			$facbaseddollars = $row[31] && $row[31] != "" ? $row[31]: 0;
      $completed = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $row[45]);
      $paidtimeoff = ($row[9] == 'Yes' ? 1 : 0) + ($row[15] == 'Yes' ? 2 : 0) + ($row[21] == 'Yes' ? 4 : 0) + ($row[32] == 'Yes' ? 8 : 0);
			$setaside = ($row[16] == 'Yes' ? 1 : 0) + ($row[23] == 'Yes' ? 2 : 0) + ($row[33] == 'Yes'? 4 : 0);
			$commbasedpartic = $row[35] == 'yes' ? 1 : 0;

			$facbasedpartic = $row[40] == 'yes' ? 1 : 0;
      $volunteer_y_n = $row[38] == 'Yes' ? 1 : 0;
			$sql_insert = "INSERT INTO `spec_mdda6_import` (`Vendor`,`Vendor_ID`,`Reporting_Period`,`dob`,`HrsIndComp`,`HrsIndCont`,`HrsGroupInt`,`HrsSelfEmp`,`HrsFac`,`HrsComNonWork`,`TotalHours`,`dol_indComp`,`dol_indCont`,`dol_GroupInt`,`dol_selfEmp`,`expens_selfEmp`,`net_selfEmp`,`dol_Facility`,`YN_vol`,
`YN_pto`,`YN_sa`,`Region`,`area_office`,`com_non_work_partic`,`fac_non_work_partic`) VALUES ('" . $Vendor . "','" . $row[1] . "', STR_TO_DATE('10/01/2022', '%m/%d/%Y'), STR_TO_DATE('" . $row[2] ."', '%m/%d/%Y') ," . $indcompethours . "," . $indcontractedhours . "," . $groupinteghours . "," . $selfemphours . "," .  $facbasedhours . "," . $comnonworkhrs . "," . $totalhours . "," . $indcompetdollars . "," . $indcontractdollars . "," . $groupintegdollars . "," . $selfempdollars . "," . $selfempexpenses . "," .  $selfempnet . ","  . $facbaseddollars . "," . $volunteer_y_n . "," . $paidtimeoff . "," . $setaside . ",'" . $Region . "','" . $areaoffice . "'," . $commbasedpartic ."," . $facbasedpartic .")";

		if ($completed == "Complete") $gotime = 	mysqli_query($GLOBALS["___mysqli_ston"], $sql_insert) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

		 }

    fclose($File);



?></body></html>
