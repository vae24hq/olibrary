<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
      <tr>
        <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>SEARCH</strong></td>
      </tr>
    </table>
	
		<?php //SEARCH BY DATE
    	if(isset($_GET['searchby']) && $_GET['searchby'] == 'date') {
			include("inc_search_customers_date.php");
		} else { //END SEARCH BY DATE
			include("inc_search_customers_default.php");
		}
		?>