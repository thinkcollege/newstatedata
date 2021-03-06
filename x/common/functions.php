<?php    
/*
class: functions
purpose: useful functions
*/
class functions extends mre_base{

/*
function: add_pagerights
*/
function add_pagerights() { 
	$database = Database::getDatabase();
	
	$results = $database->query("select itemid from items where tablename='pages'");
	for ($result=0;$result< $database->num_rows($results);$result++){
		$itemid = $database->fetch_result($results,$result,'itemid');
		$sql = "insert into rights ( userid, canadmin, canread, canwrite, itemid ) values (1,'t','t','t'," . $itemid . ")";
		$results2 = $database->query($sql);
		
		$sql = "insert into rights ( userid, canadmin, canread, canwrite, itemid ) values (2,'t','t','t'," . $itemid . ")";
		$results2 = $database->query($sql);
	}
	$database->close();
	return(1); 
}

/**
 *	 function: safehtml
 *	 purpose: strip out non-safe tags
 */
	function getFullUrl($urlencode = false) {
		$url = 'http' . (!empty($_SERVER["HTTPS"]) ? 's' : '') . '://' . $_SERVER["HTTP_HOST"]
			 . (($_SERVER["SERVER_PORT"] != 80 && empty($_SERVER['HTTPS']))
			  	|| ($_SERVER['SERVER_PORT'] != 443 && !empty($_SERVER['HTTPS']))
			  		? ':' . $_SERVER["SERVER_PORT"] : '')
			 . $_SERVER["SCRIPT_NAME"]
			 . ($_SERVER["QUERY_STRING"] != "" ? '?' . (!$urlencode ? htmlentities($_SERVER["QUERY_STRING"], ENT_COMPAT, 'UTF-8') : $_SERVER["QUERY_STRING"]) : '');
		return $urlencode ? urlencode($url) : $url;
	}		
/*
function: safehtml
purpose: strip out non-safe tags
*/
function safehtml($html,$safetags="<b><a><br><i><u><ul><ol><li>") { 
	$html=strip_tags($html,$safetags);
	return($html); 
}

/*
function: getStates
purpose: returns a dropdown of states
*/
function getStates($element_name, $showAll = 1) { 
	$database = Database::getDatabase();
	
	$results = $database->query("SELECT abbreviation, name FROM ". $this->database_table_prefix ."states ORDER BY name");
	$html = "<select id=$element_name  name=$element_name onkeydown=\"return on_keydown_form(document.form1,event,'login');\">";
	$html .= "<option value=0>Choose state</option>";
	if ($showAll == 1) {
		//$html = $html . "<option value=ALL>ALL</option>";
		#$html .= "<option value=ALL>All States</option>";
	}
	for ($result=0;$result< $database->num_rows($results);$result++){
		$html .= "<option value='". $database->fetch_result($results,$result,'abbreviation') ."'>" . $database->fetch_result($results,$result,'name') . "</option>\n";
	}
	return $html . "</select>\n";
}

/*
function: getStates
purpose: returns a dropdown of states
*/
function getActiveStates($element_name, $activity, $multiselect = false, $showAll = 1, $dataOnly = false) { 
	$database = Database::getDatabase();
	//this assumes if a state is in x_dd, then it will be in the other activities too
	$results = $database->query("SELECT distinct abbreviation, name 
		FROM ". $this->database_table_prefix ."states as states,	". $this->database_table_prefix . $activity . " as active_states 
		where states.abbreviation =active_states.State ORDER BY states.name");
	$multiple = "";
	$html = "";
	if (!$dataOnly) {
		if ($multiselect == true) {
			$multiple = 'multiple="multiple" size="10" ';
		}
		$html .= "<select id=$element_name $multiple name=$element_name >";
	} else {
		$html .= "[";
	}
	
	if ($showAll == 1) {
		//$html = $html . "<option value=ALL>ALL</option>";
		if($dataOnly) {
			$html .= "{optionValue: 'US', optionDisplay: 'All Reporting Programs (US Total)'}";
			if ($database->num_rows($results) > 0){
				$html .= ",";
			}
		} else {
			$html .= "<option value=US>All Reporting Programs (US Total)</option>";
		}
	}
	for ($result=0;$result< $database->num_rows($results);$result++){
		$abbrv = $database->fetch_result($results,$result,'abbreviation');
		if ($abbrv != "US") {
			if($dataOnly) {
				$html .= "{optionValue: '". $abbrv ."', optionDisplay: '". $database->fetch_result($results,$result,'name') ."'}";
				if ( ($result + 1) < $database->num_rows($results)){
					$html .= ",";
				}	
			} else {
				$html .= "<option value='". $abbrv ."'>" . $database->fetch_result($results,$result,'name') . "</option>\n";
			}
		
		}
	}
	if($dataOnly) {
		$html .= "]";
	} else {
		$html .= "</select>\n";
	}
	
	return $html;
}

/*
function: getStatesFiltered
purpose: returns a dropdown of states
*/
function getStatesFiltered($element_name, $dataset, $showAll = 1) { 
	$database = Database::getDatabase();
	$join = $dataset != "ACS" && $dataset != 'ACS09' ? "LEFT JOIN $dataset d ON d.state = s.abbreviation " : '';
	$results = $database->query("SELECT DISTINCT s.abbreviation, s.name from states s $join order by s.abbreviation = 'US' DESC, s.name");
	
	$html	= "<select id=\"$element_name\" name=\"$element_name\">"
 			. "<option value=0>Choose state</option>";
	while ($row = $database->fetch_assoc($results)) {
		$html .= "<option value=\"{$row['abbreviation']}\">{$row['name']}</option>\n";
	}
	$html .= "</select>\n";
	$database->close();
	return $html;
}

/*
function: get_agency_tables
purpose: return select field with option values set to the names of the agency tables
*/
function get_agency_tables(){
	$database = Database::getDatabase();
	$results = $database->query("SHOW TABLE STATUS LIKE '%agency%' ");
	$html	= "<select id=\"agency\" name=\"agency\">"
	 		. "<option value='ACS'>Population Data from the American Community Survey (2000 to 2007)</option>\n"
			. "<option value='ACS09'>Population Data from the American Community Survey (Post 2007)</option>\n";
	$ary = $database->mysql_fetch_rowsarr($results);
	$index = 0;
	
	foreach ($ary as $dataset)
	{
		$my_array[$index]["Comment"] = $dataset["Comment"];
		$my_array[$index]["Name"] = $dataset["Name"];
		$index++;
	}
	
	sort($my_array);
	
	for ($result=0;$result< count($my_array);$result++){

		$table_name = $my_array[$result]['Name'];
		if (substr($table_name, 0, 6) == "agency") {
			$html .= "<option value='". $table_name ."'>" . $my_array[$result]['Comment'] . "</option>\n";
		}
	}
	
	/*
	for ($result=0;$result< $database->num_rows($results);$result++){

		$table_name = $database->fetch_result($results,$result,'Name');
		if (substr($table_name, 0, 6) == "agency") {
			$html .= "<option value='". $table_name ."'>" . $database->fetch_result($results,$result,'Comment') . "</option>\n";
		}
	}
	*/
	$html .= "</select>\n";
	$database->close();
	return $html;

}

/*
function: get_acs_tables
purpose: return result
*/
function get_acs_tables($agency){
	$database = Database::getDatabase();
	$results = $database->query("SHOW TABLE STATUS LIKE 'acs_" . ($agency == 'ACS' ? 'pre05%\'' : 'post08%\''));
	print "<!-- query:SHOW TABLE STATUS LIKE 'acs_" . ($agency == 'ACS' ? 'pre05%\'' : 'post08%\'') . " agency:$agency -->";
	$html = "<select id=acs_table name=acs_table >";
	
	while ($row = $database->fetch_assoc($results)) {
		$html .= "<option value=\"{$row['Name']}\">{$row['Comment']}</option>\n";
	}
	$html .= "</select>\n";
	$database->close();
	return $html;
}

/*
function: get_agency_tables
purpose: return result
*/
function get_agency_table_desc($table){
	$database = Database::getDatabase();
	$results = $database->query("SHOW TABLE STATUS");

	$desc = "";
	
	for ($result=0;$result< $database->num_rows($results);$result++){

		$table_name = $database->fetch_result($results,$result,'Name');
		if ($table_name == $table) {
			$desc = $database->fetch_result($results,$result,'Comment');
		}
	}
	$database->close();
	return $desc;

}

/*
function: get_individual_tables
purpose: return result
*/
function get_individual_tables(){
	$database = Database::getDatabase();
	$results = $database->query("SHOW TABLE STATUS");
	$html = "<select id=dataset name=dataset onkeydown=\"return on_keydown_form(document.form1,event,'login');\">";
	
	for ($result=0;$result< $database->num_rows($results);$result++){
		$table_name = $database->fetch_result($results,$result,'Name');
		if (substr($table_name, 0, 3) == "ind") {
			$html .= "<option value='". $table_name ."'>" . $database->fetch_result($results,$result,'Comment') . "</option>\n";
		}
	}
	$html .= "</select>\n";
	$database->close();
	return $html;

}

	/*
	function: convert_state_names
	purpose: returns the state name if the abbreviation is passed in 
			 and the abbreviation if the state is passed in for a list of comma seperated states
	*/
	function convert_state_names($states){
	$states = str_replace("'","",$states);
	$states = str_replace("xxx,","",$states);
	//echo $states;
		$stateArray = explode(",",$states);
		//echo count($stateArray);
		$s = array();
		
		for ($i =0; $i < count($stateArray); $i++){
			$s[] = $this->translateState($stateArray[$i]);
		}
		return implode(",",$s);
	}

	/*
	function: translateState
	purpose: returns the state name if the abbreviation is passed in 
			 and the abbreviation if the state is passed in 
	*/
	function translateState($st) {
		if ($st == "ALL") {
			return 'All';
		}
		if (strlen($st) == 2) {
			$col	= '`name`';
			$where	= '`abbreviation`';
		} else {
			$col	= '`abbreviation`';
			$where	= '`name`';
		}
		$db = Database::getDatabase();
		$st = mysql_real_escape_string($st);
		$rs = $db->query("SELECT $col FROM `". $this->database_table_prefix ."states` WHERE $where = '$st'");
		print "<!-- query:SELECT $col FROM `". $this->database_table_prefix ."states` WHERE $where = '$st' -->";
		if ($db->num_rows($rs) == 1) {
			return $db->fetch_result($rs, 0, 0);
		}
		return 'N/A';
	}

/*
function: getAgency
purpose: returns agency name 
*/
function getAgency($agency_table) {
	if ($agency_table == "ACS") {
		return "Population Data from the American Community Survey (2000 to 2007)";
	} else if ($agency_table == "ACS09") {
		return "Population Data from the American Community Survey (Post 2007)";
	}
	$database = Database::getDatabase();

	$results = $database->query("SHOW TABLE STATUS" );
	for ($result=0;$result< $database->num_rows($results);$result++){
		$table_name = $database->fetch_result($results,$result,'Name');
		if ($table_name == $agency_table) {
			$agency = $database->fetch_result($results,$result,'Comment');
		}
	}
	
	$database->close();
	return $agency;
}

/*
function: get_individual_characteristics
purpose: returns columns in a table as a select dropdown
*/
function get_individual_characteristics($table) {
	$db		= Database::getDatabase();
	$fields = $db->query("SHOW columns from $table");
	$html	= "";
	while ($field = $db->fetch_assoc($fields)) {
		$field = $field['Field'];
		if (!in_array(strtolower($field), array("state", "year", "id")) && strpos($field, "var") !== 0) {
			$html  .= "<p><label for=\"$field\">$field:</label> <select id=\"$field\" name=\"$field\">"
					. "<option value=\"-1\">All</option>";
			$label	= "";
			$opts	= $db->query("SELECT value, label from value_names where column_name = '$field' and table_name = '$table'");
			while ($opt = $db->fetch_assoc($opts)) {
				if ($label != $opt['label']) {
					$label = $opt['label'];
					$html .= "<option value=\"{$opt['value']}\">{$opt['label']}</option>";
				}
			}
			$html .= "</select></p>\n";
		}
	}
	return $html; 
}

	/*
	function: get_table_columns
	purpose: returns columns in a table as a select dropdown
	*/
	function get_table_columns($table, $element_name) {
		$database = Database::getDatabase();

		$html = "<select name='$element_name'>";
		$html .= "<option value=0>none</option>";
		$fields = $database->query("Show columns from $table");
		for ($result = 0; $result < $database->num_rows($fields); $result++){
			$field = $database->fetch_result($fields, $result,"Field");
			if ($field != "REGION" && $field != "STATE NAME" && $field != "STATE"
			&& $field !=  "State_pop_1000s" && $field !=  "state_pop_100k"
			&& $field !=  "STATE POP 1000s" && $field !=  "STATE POP 100K"
			&& $field != "YEAR" && $field != "id" && (substr($table_name, 0, 3) != "ind") ) {
				$html .= "<option value='" . $field ."'>". $field ."</option>";
			}
		}

		return $html . "</select>\n";
	}

/*
function: get_acs_table_columns_as_checkboxes
purpose: returns columns in a table as a checkbox list
*/
function get_acs_table_columns_as_checkboxes($table, $total_vars) {
	$database = Database::getDatabase();
	
	$results = $database->query("SHOW TABLE STATUS LIKE 'acs_" . ($table == 'ACS' ? 'pre05%\'' : 'post08%\''));

	$acs_table = $database->fetch_result($results, 0,'Name');
	$fields = $database->query("SELECT  * FROM `labels` where `table_name` = '$acs_table' order by `short_name`");
	$html = '';
	for ($result = 0;$result < $database->num_rows($fields); $result++){
		$field = $database->fetch_result($fields,$result,"column_name");
		$description = $database->fetch_result($fields,$result,"description");
		$short_name = $database->fetch_result($fields,$result,"short_name");
		$label = $database->fetch_result($fields,$result,"label");
		
		//now write the checkbox	
		$html .= "<p><input id=\"r$result\" type=\"radio\" name=\"var\" value=\"$field\"> <label for=\"r$result\"><strong>$short_name</strong></label></p> <blockquote>$description</blockquote>";
	}
	

	
	$database->close();
	return $html; 
}

	/*
	function: get_table_columns_as_checkboxes
	purpose: returns columns in a table as a checkbox list
	*/
	function get_table_columns_as_checkboxes($table, $total_vars) {
		$database = Database::getDatabase();

		$html = "";
		$fields = $database->query("Show columns from $table");
		for ($result = 0; $result < $database->num_rows($fields); $result++) {
			$field = $database->fetch_result($fields,$result,"Field");
			if ($field != "REGION" && $field != "STATE NAME" && $field != "STATE"
			&& $field !=  "State_pop_1000s" && $field !=  "state_pop_100k"
			&& $field !=  "STATE POP 1000s" && $field !=  "STATE POP 100K"
			&& $field != "YEAR" && $field != "id" && (substr($table_name, 0, 3) != "ind") ) {
				//get the description as well
				$desc = $this->get_column_description($table, $field);
				$short_name =  $this->get_legend_name($table, $field);
				//now write the checkbox
				$html .= "<p><input id=\"c$result\" type=\"checkbox\" name=\"var\" value=\"$field\"> <label for=\"c$result\"><strong>$short_name</strong></label></p> <blockquote>$desc</blockquote>";
			}
		}
		return $html;
	}

/**
 *	 function: get_table_columns_as_radio
 *	 purpose: returns columns in a table as a checkbox list
 */
	function get_table_columns_as_radio($table, $total_vars) {
		if (substr($table, 0, 3) == "ind") {
			return '';
		}
		$database = Database::getDatabase();

		$html = "";
		$fields = $database->query("Show columns from $table");
		for ($result = 0; $result < $database->num_rows($fields); $result++) {
			$field = $database->fetch_result($fields,$result,"Field");
			if ($field != "REGION" && $field != "STATE NAME" && $field != "STATE"
			&& $field !=  "State_pop_1000s" && $field !=  "state_pop_100k"
			&& $field !=  "STATE POP 1000s" && $field !=  "STATE POP 100K"
			&& $field != "YEAR" && $field != "id") {
				//get the description as well
				$desc = $this->get_column_description($table, $field);
				$short_name =  $this->get_legend_name($table, $field);
				//now write the checkbox
				$html .= "<p><input id=\"c$result\" type=\"radio\" name=\"var\" value=\"$field\"> <label for=\"c$result\"><strong>$short_name</strong></label></p> <blockquote>$desc</blockquote>";
			}
		}
		return $html;
	}

/*
function: get_activities
purpose: returns available activities
*/
function get_activities ($elem = 'activity') {
	$database = Database::getDatabase();
	
	$html = "<select id='$elem' name='$elem'>";
	$fields = $database->query("select Id, Activity from `". $this->database_table_prefix ."activities` order by Activity");
	for ($result=0;$result< $database->num_rows($fields);$result++){
		$display = $database->fetch_result($fields,$result,"Activity");
		$value = $database->fetch_result($fields,$result,"Id");
		
		$html .= "<option value='" . $value ."'>". $display ."</option>";
	}
	$html .= "</select>";

	
	$database->close();
	return($html);
}

function get_activity($id){
	switch($id){
		case "1":
			return new devicedemonstration;
		case "2":
			return new deviceloan;
		case "3":
			return new devicereutilizationprogram;
		case "4":
			return new financialactivites;
		case "5":
			return new trainings;
		case "6":
			return new information;

	}
}


/*
function: get_column_comments
purpose: returns array of column comments
*/
function get_column_comments($table) {
	$database = Database::getDatabase();
	
	
	$return = array();
	$results = $database->query("select COLUMN_NAME, COLUMN_COMMENT from information_schema.columns where TABLE_NAME = '". $this->database_table_prefix . $table ."'" );
	while ($row = $database->fetch_assoc($results)) {
		$return[$row['COLUMN_NAME']] = $row['COLUMN_COMMENT'];
	}

	
	$database->close();
	
	return $return;
}


/*
function: get_activity_name
purpose: returns activity name
*/
function get_activity_name($id) {
	$database = Database::getDatabase();
	
	$fields = $database->query("select Activity from `". $this->database_table_prefix ."activities` where `Id` = ". $id ." order by Activity");
	$activity = $database->fetch_result($fields,0,"Activity");
	$database->close();
	return($activity);
}

/*
function: get_activity_name
purpose: returns activity name
*/
function get_activity_abbrv($id) {
	$database = Database::getDatabase();
	
	$fields = $database->query("select abbrv from `". $this->database_table_prefix ."activities` where `Id` = ". $id ." order by abbrv");
	$abbrv = $database->fetch_result($fields,0,"abbrv");
	$database->close();
	return($abbrv);
}


/*
function: get_subcat_name
purpose: returns subcat name
*/
function get_subcat_name($id) {
	$database = Database::getDatabase();
	
	$fields = $database->query("select SubCat from `". $this->database_table_prefix ."subcategories` where `Id` = ". $id );
	$subcat = $database->fetch_result($fields,0,"SubCat");
	$database->close();
	return($subcat);
}

/*
function: get_activity_hierarchy
purpose: returns hierarchy of activities
*/
function get_activity_hierarchy($displayType = "radio") {
	$database = Database::getDatabase();
	
	$fields = $database->query("SELECT a.Activity, IF( (
			SELECT COUNT( * )
			FROM `". $this->database_table_prefix ."subcategories` t
			WHERE t.Parent = sc.Id ) >0, 1, 0
		) AS HasChildren, sc.*
		FROM `". $this->database_table_prefix ."activities` a, `". $this->database_table_prefix ."subcategories` sc
		WHERE a.Id = sc.ActivityId
		ORDER BY a.sortOrder, sc.SortOrder");
	
	$html = "<table border=0 bordercolor=green>";
	$lastActivity = "none";
	$oldParentId = -1;
	for ($result=0;$result< $database->num_rows($fields);$result++){
		$hasChildren = $database->fetch_result($fields,$result,"HasChildren");
		$subCat = $database->fetch_result($fields,$result,"SubCat");
		$activity = $database->fetch_result($fields,$result,"Activity");
		$activityId = $database->fetch_result($fields,$result,"ActivityId");
		$subCatId = $database->fetch_result($fields,$result,"Id");
		$isSelectable = $database->fetch_result($fields,$result,"IsSelectable");
		$parentId = $database->fetch_result($fields,$result,"Parent");
		$sortOrder = $database->fetch_result($fields,$result,"SortOrder");
		
		if ($lastActivity != $activity && $lastActivity != "none"){
			$html .= "</table></td></tr>\n";
		}
		if ($oldParentId != $parentId && $parentId == 0 && $oldParentId != -1) {
			$html .= "</table></td></tr>\n";
		}
		if ($lastActivity != $activity){
			
			$html .= "<tr>\n
						<td valign='top'><img src='../images/plus.gif' border = '0' id='exp_$activityId' class='expandImage' />&nbsp;</td>\n
						<td class='activityContainer' id='cont_$activityId'>$activity
						\n<table  border=0 bordercolor=red  style='display:none'>\n";
		} 
		
		if ($hasChildren == 1){
			if ($lastActivity != $activity ){
				//$html .= "</table></td></tr>";
			}		
			$html .= "<tr>\n
						<td valign='top'><img src='../images/plus.gif' border = '0' id='exp_" . $activityId . "_$subCatId' class='expandImage' />&nbsp;</td>\n
						<td class='activityContainer' id='cont_" . $activityId ."_$subCatId'>$subCat
							\n<table  border=0 bordercolor=blue style='display:none'>\n";
		} else {
			$html .= "\n<tr><td nowrap='nowrap'><input type='radio' name='subcat' id='subcat_$subCatId' value='$activityId" . "_$subCatId'></td><td>$subCat</td></tr>\n";
		}
	
		
		$lastActivity = $activity;
		$oldParentId = $parentId;
		$html .= "";
	}
	$html .= "\n</table></td></tr></table>
	<script type='text/javascript'>  
	$(function() { 
		init_activity_hierarchy();
	}
	);
	</script>

	";
	
	$database->close();
	return($html);
}


/*
function: get_table_year
purpose: returns columns in a table as a checkbox list
*/
function get_table_year($table, $listType='select') {
	$database = Database::getDatabase();

	$html = "";
	switch ($listType) {
		case "select":
			$html .= "<select id='year' name='year'>";
			break;
		
	}

	$fields = $database->query("select distinct year from ". $this->database_table_prefix ."$table order by year");
	for ($result=0;$result< $database->num_rows($fields);$result++){
		$field = $database->fetch_result($fields,$result,"year");
		switch ($listType) {
			case "select":
				$html .= "<option value='" . $field ."'>". $field ."</option>";
				break;
			case "radio":
				$html .= "<input type='radio' name='rYear' id='y$field' value='" . $field ."' /> " .  $field . "</br>";
				break;
			case "checkbox":
				$html .= "<input type='checkbox' name='cbYear' id='y$field' value='" . $field ."' /> " .  $field . "</br>";
				break;
		}
	}
	
	if ($listType == "select"){
		$html .= "</select>";
	}
	
	$database->close();
	return($html); 
}

/*
function: get_table_columns_array
purpose: returns columns in a table as a select dropdown
*/
function get_table_columns_array($table) {
	$db = Database::getDatabase();
	$aryField = array();
	$fields = $db->query("SHOW columns from $table");
	while ($field = $db->fetch_assoc($fields)) {
		$aryField[] = strtolower($field["Field"]);
	}
	return $aryField;
}

/*
function: get_characteristics
purpose: save passed in values in an array based on the table name
*/
function get_characteristics($table) {
	static $return = array();
	if (count($return) > 0) {
		return $return;
	}
	$db		= Database::getDatabase();
	$fields = $db->query("SHOW columns from $table");
	while ($field = $db->fetch_assoc($fields)) {
		$field = str_replace(" ", "_", $field["Field"]);
		if (!in_array(strtolower($field), array("state", "year", "id")) && strpos($field, "var") !== 0 && isset($_REQUEST[$field])) {
			$return[$field] = $_REQUEST[$field];
		}
	}
	return $return;
}

/*
function: build_characteristics_querystring
purpose: save passed in values in an array based on the table name
*/
function build_characteristics_querystring($table) {
	$sep	= '';
	$str	= '';
	$fields = $this->get_characteristics($table);
	foreach ($fields as $field => $val) {
		$str .= $sep . urlencode($field) . "=" . urlencode($val);
		$sep = "&";
	}
	return $str;
}
/*
function: get_short_name
purpose: returns the short name for this field or the field name if no short name found
*/
function get_short_name($table_name, $column_name) {
	$database = Database::getDatabase();
	
	$short_name = "";

	$query = "select l.short_name, l.label from labels l where table_name='$table_name' and column_name= '$column_name'";
	$results = $database->query($query);
	if ($database->num_rows($results)!=1) {
		$label = $column_name;
	} else {

		$label = $database->fetch_result($results,0,1);

	}
	$database->close();
//	echo  $label ; 
	return ($label);
}

/*
function: get_legend_name
purpose: returns the legend name for this field or the field name if no short name found
*/
function get_legend_name($table_name, $column_name) {
	$database = Database::getDatabase();

	$short_name = "";

	$query = "select l.short_name from labels l where table_name='$table_name' and column_name= '$column_name'";
	$results = $database->query($query);
	if ($database->num_rows($results)!=1) {
		$short_name = $column_name;
	} else {
		$short_name = $database->fetch_result($results,0,0);
	}
	$database->close();
	return ($short_name);
}

/*
function: get_short_name
purpose: returns the short name for this field or the field name if no short name found
*/
function get_column_description($table_name, $column_name) {
	$database = Database::getDatabase();

	$description = "";

	$query = "select description from labels where table_name='$table_name' and column_name= '$column_name'";
	$results = $database->query($query);
	if ($database->num_rows($results)!=1) {
		$description = "";
	} else {
		$description = $database->fetch_result($results,0,0);
	}
	$database->close();
	return ($description);
}

/*
function: get_individual_table_outcomes
purpose: returns columns in a table as a select dropdown
*/
function get_individual_table_outcomes($table_name, $element_name) {
	$database = Database::getDatabase();
	$html = "<select id='$element_name' name='$element_name' onkeydown=\"return on_keydown_form(document.form1,event,'login');\">";
	//$html = $html . "<option value=0>none</option>";
	$fields = $database->query("Show columns from $table_name ");
	for ($result=0;$result< $database->num_rows($fields);$result++){
		$field = $database->fetch_result($fields,$result,"Field");
		$short_name =  $this->get_legend_name($table_name, $field);
		if ( substr ( $field, 0, 4) == "var_"  ) {
		
			$html .= "<option value='" . $field ."'>". $short_name ."</option>";
		}
	}
	
	$html .= "</select>\n";
	
	$database->close();
	return($html); 
}

/*
function: get_label_name
purpose: returns the value translated into its label name
*/
function get_label_name ($table_name, $column_name, $value) {
	$database = Database::getDatabase();
	$label = "";
	$hlabel = $database->query("Select label from value_names where table_name='$table_name' and column_name='$column_name' and value='$value'");
	if ($database->num_rows($hlabel)==1){
		$label = $database->fetch_result($hlabel,0,'label');
	} else {
		$label = $value;
	}
	$database->close();
	return($label); 
}

/*
function: get_characteristics_form
purpose: returns the characteristic fields for the individual data table
*/
function get_characteristics_form($table_name) {
	$database = Database::getDatabase();
	$html = "";
	//$html = "<select name='$element_name'>";
	$option0 = "<option value=0>do not include</option>";
	$column_name = "empty";
	$form_element = "";
	$fields = $database->query("select column_name, value, label from value_names where table_name = '$table_name' order by label, value");
	for ($result=0;$result< $database->num_rows($fields);$result++){
		$label = $database->fetch_result($fields,$result,"label");
		$value = $database->fetch_result($fields,$result,"value");
		$column_name = $database->fetch_result($fields,$result,"column_name");
		if ( $column_name_old == $column_name) {
			//if still on same label, just add an option
			$form_element .= "<option value='$value'>$label</option>";
		} else {
			//else we are on a new form element
			if ($form_element != "" ) {
				$form_element .= "</select></td></tr>";
				$html .= $form_element;
			}
			$form_element = "";
			$form_element = "<tr><td>$column_name</td><td>&nbsp;&nbsp;</td><td><select name='$column_name'>" . $option0;
			$form_element .= "<option value='$value'>$label</option>";
		}
		$column_name_old = $column_name;
	}
	$database->close();
	return ($html);
}

/*
function: get_outcome_type
purpose: returns the type of outcome that should be calculated
*/
function get_outcome_type($table_name, $column_name) {
	$database = Database::getDatabase();

	$outcome_type = "";

	$query = "select outcome_type from outcomes where table_name='$table_name' and column_name= '$column_name'";
	$results = $database->query($query);
	if ($database->num_rows($results)!=1) {
		$outcome_type = 'average';
	} else {
		$outcome_type = $database->fetch_result($results,0,0);
	}
	$database->close();
	return ($outcome_type);
}

	function createFile($url, $fout) {
		set_time_limit(0);
		$http = new http_class;
		/* Connection timeout */
		$http->timeout = 0;

		/* Data transfer timeout */
		$http->data_timeout = 0;

		/* Output debugging information about the progress of the connection */
		$http->debug = 0;

		/* Format dubug output to display with HTML pages */
		$http->html_debug = 1;

		/**
		 *  Need to emulate a certain browser user agent?
		 *  Set the user agent this way:
		 */
		$http->user_agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";

		/**
		 *  If you want to the class to follow the URL of redirect responses
		 *  set this variable to 1.
		 */
		$http->follow_redirect = 1;

		/**
		 *  How many consecutive redirected requests the class should follow.
		 */
		$http->redirection_limit = 5;

		/**
		 * If your DNS always resolves non-existing domains to a default IP
		 * address to force the redirection to a given page, specify the
		 * default IP address in this variable to make the class handle it
		 * as when domain resolution fails.
		 */
		$http->exclude_address = "";

		/*
		 *  If basic authentication is required, specify the user name and
		 *  password in these variables.
		 */

		$user = $password = $realm = "";       /* Authentication realm or domain */
		$workstation = ""; /* Workstation for NTLM authentication */
		$authentication = (strlen($user) ? UrlEncode($user).":".UrlEncode($password)."@" : "");

		//$url=$regs[1];

		/*
		 *  Generate a list of arguments for opening a connection and make an
		 *  HTTP request from a given URL.
		 */
		$error = $http->GetRequestArguments($url, $arguments);

		if(strlen($realm))
		$arguments["AuthRealm"] = $realm;

		if(strlen($workstation))
		$arguments["AuthWorkstation"] = $workstation;

		$http->authentication_mechanism = ""; // force a given authentication mechanism;



		/* Set additional request headers */
		$arguments["Headers"]["Pragma"]="nocache";

		//flush();
		$error = $http->Open($arguments);

		if($error == ""){
			$error = $http->SendRequest($arguments);

			if($error=="") {
				$headers = array();
				$error = $http->ReadReplyHeaders($headers);
				if($error == "") {
					$myreply = "";
				for(;;) {
						$error = $http->ReadReplyBody($body, 1000);
						if ($error != "" || strlen($body) == 0) {
							break;
						}
						//echo HtmlSpecialChars($body);
						//$myreply = $myreply . $body;
						fwrite($fout, $body, 1000);
					}
					//flush();
				}
			}
			$http->Close();
		}
		if(strlen($error))
		echo "<CENTER><H2>Error: ",$error,"</H2><CENTER>\n";

	}

	/*purpose: to determin if an index esists in an array and has a value
	 */
	function has_value($param, $ary) {
		return (is_array($ary) && array_key_exists($param, $ary) && strlen($ary[$param]) > 0);
	}
	
	static public function set_selected($value1, $value2) {
		$ret = "";
		if ($value1 . "" == $value2 . "" ) {
			$ret = " selected ";
		}
		return $ret;
	}
}
?>