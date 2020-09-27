<?php
	$loader = new loader;
	$module = $loader->get_module();
	if($module == 'report') {?>
<li class="subHeader">Report</li>
<li><a href="?url=accommodation_report">accommodation</a></li>

<li><a href="?url=car-hire_report">car hire</a></li>
<li><a href="?url=gymnasium_report">gymnasium</a></li>
<li><a href="?url=confrence-hall_report">confrence hall</a></li>
<li><a href="?url=swimming-pool_report">swimming pool</a></li>
 <br/>
 <li><a href="?url=store_report&store=665232">bush bar</a></li>
 <li><a href="?url=store_report&store=0550783">VIP bar</a></li>
 <li><a href="?url=store_report&store=0330783">restaurant</a></li>
<br/>
<li><a href="?url=summary-of-income_report">summary</a></li>
<br />

<span class="activeMenuSpace">&nbsp;</span>
<?php } else { ?>
<li class="subMenu"><a href="?url=summary_report">Report</a></li>
<?php } ?>