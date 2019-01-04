<?php 
ini_set("include_path","../");
include("common/classes.php");
$template=new template;
$print = $_REQUEST["print"];
if ($print == 1) {
	$template->define_file('print_template.php');
} else {
	$print = 0;
	$template->define_file('template.php');
}

$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - State Comparison');
$template->add_region('heading','State Comparison');
if ($print == 1) {
	$template->add_region('sidebar','<?php 
									$area="comparison" ;
									$show_flash_link=0;
									?>');
} else {
	$template->add_region('sidebar','<?php 
									$area="comparison" ;
									$show_flash_link=1;
									?>');
}
$template->add_region('content','
	<?php
		$print = $_REQUEST["print"];
		if ($print != 1) {
			$print = 0;
		}
		
		$functions=new functions;
		
		$state1 = $_REQUEST["state1"];
		$state2 = $_REQUEST["state2"];
		$state3 = $_REQUEST["state3"];
		$table = $_REQUEST["agency"];
		if ($print == 0) {
			$tracker=new tracker;
			$dataset_id = $tracker->add_dataset($table);
		}
		
		
		
		$variable1 = $_REQUEST["variable1"];
		

		$var_legend1 =  $functions->get_legend_name($table, $variable1 );
		$var_list = $var_legend1 ;
		
		if ($print == 0) {
			$tracker->add_variable($variable1, $dataset_id);
		}
		
		$cols=0;
		$states = array();
		$state_query = "(";
		
		if ($state1 != "" ) {
			$state_query = $state_query . "\'". $state1 . "\' ,";
			$cols++;
			$states[] = $state1;
			if ($print == 0) {
				$tracker->add_state($state1, $dataset_id);
			}
		}
		if ($state2 != "" ) {
			$state_query = $state_query . "\'". $state2 . "\' ,";
			$cols++;
			$states[] = $state2;
			if ($print == 0) {
				$tracker->add_state($state2, $dataset_id);
			}
		}
		
		if ($state3 != "" ) {
			$state_query = $state_query . "\'". $state3 . "\' ,";
			$cols++;
			$states[] = $state3;
			if ($print == 0) {
				$tracker->add_state($state3, $dataset_id);
			}
		}
		
		$colors = array();
		$colors[] = "9900CC"; //purple
		$colors[] = "FF9900"; //orange
		$colors[] = "993333"; //brown
		
		
		$data = array();
		$nation_data = "";
		
		//sort the states alphabetically
		sort($states);
		

		$state_query = $state_query . "\'oo\' )";
		
		$query = "Select YEAR";
		$nation_query = "Select YEAR";
		
		$counter = 0 ;
		if ($variable1 != "0") {
			$query = $query . ", `" . $variable1 . "`";
			$nation_query = $nation_query . ", avg(`" . $variable1 . "`) as  `$variable1`";
		}
		
		$query = $query ." , state from `". $table . "` where state in " . $state_query . " and `" . $variable1 . "` != -1 order by year, state";
		$nation_query = $nation_query ."  from `". $table . "` where  `" . $variable1 . "` != -1  group by year order by year";
//echo $query;

		$state_results = $database->query($query);
		$nation_results = $database->query($nation_query);
		
		$years = "";
		$current_year = 0;
		$state_counter = 0;
		$state_temp_data = array();
		
		for ($result=0;$result<$database->num_rows($nation_results);$result++){
			$current_year = $database->fetch_result($nation_results,$result,\'YEAR\');
		
			$years = $years . $current_year;
			
			$nation_data = $nation_data . $database->fetch_result($nation_results,$result,$variable1);

			
			
			if ($result < $database->num_rows($nation_results) ) {
				$nation_data = $nation_data . ";";
			}
			
			if ($result < $database->num_rows($nation_results) ) {
				$years = $years . ";";
			}

			//for each state
			//zero out temp data holder
			for ($counter = 0; $counter < $cols; $counter++){
				$state_temp_data[$counter] = "";
			}
			
			if ($state_counter <$database->num_rows($state_results) ) {
			 	$state_year = $database->fetch_result($state_results, $state_counter,\'YEAR\');
				while ($current_year == $state_year) {
					for ($counter = 0; $counter < $cols; $counter++){
					//what if one state is mising in a year, then these get off by that
					// need to check the state
						if ($state_counter <$database->num_rows($state_results) ) {

							if ($states[$counter] == $database->fetch_result($state_results, $state_counter,\'STATE\') ){
							//if the state is present
								if ($current_year == $database->fetch_result($state_results, $state_counter,\'YEAR\') ) {
									//if the year is the same year as the nation one
									if ($database->fetch_result($state_results, $state_counter,$variable1) == 0) {
										$state_temp_data[$counter] = "";
									} else {
										$state_temp_data[$counter] = $database->fetch_result($state_results, $state_counter,$variable1);
									}
									//$data[$counter] = $data[$counter] . $database->fetch_result($state_results, $state_counter,$variable1);
									$state_counter++;
								} else {
									//$data[$counter] = $data[$counter] . "0";
								}
							}

							//if (($result + $cols + 1 )<$database->num_rows($state_results) && $database->fetch_result($state_results, $state_counter,\'YEAR\') != $current_year) {
							//	$data[$counter] = $data[$counter] . ";";
							//}
						}
					}
					
					if ($state_counter <$database->num_rows($state_results) ) {
						$state_year = $database->fetch_result($state_results, $state_counter,\'YEAR\');
					} else {
						$state_year = "nomore";
					}
				}
				
			}
			
			for ($counter = 0; $counter < $cols; $counter++){
				$data[$counter] = $data[$counter] . $state_temp_data[$counter];
				if ($result < $database->num_rows($nation_results) ) {
					$data[$counter] = $data[$counter] . ";";
				}
			}
		}
		
		
		//$pcScript = "graph.setCategories(2000;2001;2002)graph.setSeries(AL;1;2;3)graph.setSeries(CA;3;4;5)";
		$mychart =new chart;
		$pcScript = "graph.setcategories(".$years.")";
		//think about the ordering of the states
		
		for ($counter = 0; $counter <$cols; $counter++) {
			$pcScript = $pcScript ."graph.setseries((CLR_" .$colors[$counter]. ")\'". $functions->translateState($states[$counter]) ."\';".$data[$counter].")";
		}
		$pcScript = $pcScript ."graph.setseries((CLR_009933)\'National mean\';".$nation_data.")";
//append other detailsto pcScript
		
		//add title
		$title = "main.AddPCXML(<Textbox Name=\'title\' Top=\'0\' Left=\'0\' Width=\'615\' Height=\'34\'>
		<Properties AutoWidth=\'False\' HJustification=\'Center\' LeftMargin=\'5\' RightMargin=\'5\' FillColor=\'#BACBDB\' Font=\'Size:14; Style:Bold Italic; Color:#5C656A;\'/>
		<Text>State Comparison: ". $functions->getAgency($table) . "&#xa;";
		for ($counter = 0; $counter <$cols; $counter++) {
			$title = $title . $functions->translateState($states[$counter]) ;
			if ($counter +1 < $cols) {
				$title = $title . ",";
			}
		}
		$title = $title . "&#xa;$var_legend1</Text></Textbox>)";
		$pcScript = $pcScript . $title;
		
		
		//add axis
		$variable1_short_name = $functions->get_short_name($table,$variable1) ;
		$axis1 = "main.AddPCXML(<Textbox Name=\'axis1\' Top=\'120\' Left=\'40\' Width=\'75\' Height=\'70\'>
		<Properties BorderType=\'None\' AutoWidth=\'True\' HJustification=\'Center\' LeftMargin=\'5\' RightMargin=\'5\' FillColor=\'#ffffff\' Font=\'Size:10; Style:Bold ; Color:black;\'/>
		<Text>$variable1_short_name</Text></Textbox>)";
		
		$pcScript = $pcScript . $axis1;
//echo "<br>" . $pcScript ;
		//$mychart->externalServerAddress = "http://69.36.169.232:2001";
		//$mychart->internalCommPortAddress = "http://69.36.169.232:2002";

		//$mychart->externalServerAddress = "http://72.3.249.15:2001";
		//$mychart->internalCommPortAddress = "http://72.3.249.15:2002";
		$mychart->externalServerAddress = "http://72.3.249.15:2001";
		$mychart->internalCommPortAddress = "http://72.3.249.15:2002";
		//$mychart->externalServerAddress = "http://72.3.249.15:2001";
		//$mychart->internalCommPortAddress = "http://72.3.249.15:2002";

		
		$mychart->appearanceFile = "apfiles/comparison.pcxml";
		$mychart->userAgent = $HTTP_SERVER_VARS[\'HTTP_USER_AGENT\'];
		$mychart->width = 616;
		$mychart->height = 330;
		$mychart->returnDescriptiveLink = true;
		$mychart->language = "EN";
		$mychart->pcScript = $pcScript;

		if ($print == 0) {
			$mychart->imageType = "FLASH";
		} else {
			$mychart->imageType = "JPG";
		}
		echo $mychart->getEmbeddingHTML(); 
		if ($print == 0) {
			echo "<br><a target=\'_new\'  href=\'comparison_2.php?print=1&state1=$state1&state2=$state2&state3=$state3&agency=$table&variable1=$variable1\' >Printer-Friendly Format</a>";
		}
		echo "<br>Blank spaces that may appear on the chart or values of -1 indicate that data is not available for that year";
	?>
        <br>
');
include("header.php");
$template->make_template(); 
include("footer.php");
?>
