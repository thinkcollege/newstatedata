<?php 
ini_set("include_path","../");
include("common/classes.php");
$template=new template;
$template->debug();
$template->define_file('template.php');
$template->add_region('title','<?php $mre_base=new mre_base; echo $mre_base->mre_base_sitename;?> - Disability Resources');
$template->add_region('sidebar','<?php 
									$area="disability_resources" ;
									$show_flash_link=0;
									?>');
$template->add_region('heading','Disability Resources');
$template->add_region('content','
 		
      <table class="data zebra-striped " >
	  <tbody>
        <tr>
			<td style="text-align:center"><a href="http://www.disabilityfunders.org/" style="text-align:center" target="_new"><img src="DFN.png" style="text-align:center" border="0" height="100" width="100"></a></td>
			<td>
			<a href="http://www.disabilityfunders.org/">Disability Funders Network (DFN)</a> is a national membership and philanthropic
advocacy organization that seeks equality and rights for disabled
individuals and communities by bridging philanthropic resources, disability
and community. DFN envisions an empowered and functioning democracy with
full equality under the law, equal access to services, unconditional respect
for difference and the meaningful participation of all communities at tables
where decisions are made.
			</td>
		</tr>
		</tbody>
      </table>  


        <!-- Example row of columns -->
        
 
');
//write page
include("header.php");
$template->make_template(); 
include("footer.php");
?>
