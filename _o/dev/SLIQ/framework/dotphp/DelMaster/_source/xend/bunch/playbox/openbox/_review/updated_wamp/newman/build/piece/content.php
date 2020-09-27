
<div id="content" class="group">
<div class="wrapper group" >
<div id="main">
	<div class="inside">
<?php erko::page();?>
	</div>	
</div>

<div id="side">
<h3 class="hide">Related Information</h3>
	<div class="inside group" id="side-<?php echo erko::return_value('page');?>">
	<?php if(erko::return_value('page')=='about-us' || erko::return_value('page')=='index' || erko::return_value('page')=='markets'){?>

	<aside id="partnerships"></aside>
	<?php }?>
	<?php if(erko::return_value('page')=='index' || erko::return_value('page')=='markets' || erko::return_value('page')=='careers' || erko::return_value('page')=='about-us' || erko::return_value('page')=='safety'){?>

	<aside id="benefits">
	<h4 class="heading">Benefits Overview</h4>
	<ul class="square">
	<li>Medical insurance</li>
	<li>Dental insurance</li>
	<li>Vision insurance</li>
	<li>401(k) retirement plan with matching contributions</li>
	<li>Short-term and long-term disability coverage</li>
	<li>Life insurance</li>
	<li>Flexible spending accounts</li>
	<li>Vacation</li>
	<li>Paid holidays</li>
	</ul>
	</aside>
	<?php }?>
	<?php 
	if(erko::return_value('page')=='about-us' || erko::return_value('page')=='careers' || erko::return_value('page')=='markets' || erko::return_value('page')=='contact-us' || erko::return_value('page')=='asphalt-plants'){?>

	<aside id="work">
	<h4 class="heading">Why work with us?</h4>
	<ul class="square">
	<li>Dynamic people</li>
	<li>Team-oriented environment</li>
	<li>Exciting locations</li>
	<li>Excellent benefits</li>
	<li>Competitive salaries</li>
	<li>Opportunity for advancement</li>
	<li>In-house training programs</li>
	</ul>
	</aside>
	<?php }?>

	<?php if(erko::return_value('page')=='achievements' || erko::return_value('page')=='construction'){?>

	<aside id="affliations">
	<h4 class="heading">Profssional Affliations</h4>
	<ul class="square">
	<li>Society of Human Resource Management (SHRM)</li>
	<li>NCDOT/ACEC-NC/GAGC Design Build Subcommittee</li>
	<li>University of North Carolina System – State Construction Office</li>
	<li>Charlotte Area Chamber of Commerce Transportation Committee</li>
	<li>American Society of Highway Engineers (ASHE)</li>
	<li>Carolinas Asphalt Paving Association (CAPA)</li>
	<li>National Asphalt Paving Association (NAPA)</li>
	<li>Southeastern Asphalt User Producer Group (SEAUPG)</li>
	<li>American Association of Pavement Technology (AAPT)</li>
	<li>Southeastern Pavement Preservation Partnership (SEPPP)</li>
	<li>Design Build Institute of America (DBIA)</li>
	<li>Florida Transportation Builders Association (FTBA)</li>
	<li>American Society of Civil Engineers (ASCE)</li>
	<li>American Public Works Association (APWA)</li>
	<li>Asphalt Contractors Association of Florida (ACAF)</li>
	</ul>
	</aside>
	<?php }?>

	</div>
</div>
</div>
</div>
