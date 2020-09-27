<!-- begin banner-->
<div id="banner" class="banner group">
<div class="slideshow_container">
	<ul class="bannerslides" id="slider">
<?php echo slideShow();?>
	</ul>
</div>
<script>$(function(){$(".bannerslides").responsiveSlides({speed: 1300, timeout: 8000, random: true, namespace: "bannerslides", nav: true});});</script>
</div>
<!-- end banner-->

<article id="page" class="home">
	<div class="content">
	<p><strong><?php global $qs_name; echo $qs_name;?></strong> is a General Contractor specializing in Commercial, Residential and Institutional Construction in Boston since 1985. Our office is located at 211 Congress St, Boston, MA 02110.</p>

	<p>Call 1-855-259-1928</p>

	<p>Our company has maintained excellent working relationships with many outstanding companies throughout Boston and its surrounding communities since 1992. Our success is based on a strong management team from varied backgrounds in residential, commercial, and institutional construction, coupled with a competently skilled work force. We have a reputation of doing quality work for a reasonable cost while giving attention to our customers needs, budget and schedules.</p>

	<p>Our experience portfolios reflect the levels of our expertise relative to fulfilling your needs.</p>
	</div>

	<div class="content group">
		<div class="alignLeft">
			<h4><a href="./?page=commercial-projects" class="heading">Commercial Projects</a></h3>
			<img src="source/asset/commercial.jpg" alt="commercial" style="max-width: 100%;">			
		</div>

		<div class="alignRight">
			<h4><a href="./?page=residential-projects" class="heading">Residential Projects</a></h3>
			<img src="source/asset/residential.jpg" alt="residential" style="max-width: 100%;">			
		</div>

		<div class="alignCenter">
			<ul class="checklist">
				<p>&nbsp;</p>
				<li>Located in Boston</li>
				<li>Residential, Commercial & Industrial</li>
				<li>Licensed and Insured</li>
				<li>Quality Workmanship</li>
				<li>Competitive Rates</li>
				<li>Estimates Available</li>
			</ul>			
		</div>

	</div>

</article>