<div id="page">

<div id="home" class="group">

	<div class="left">
		<div id="personal" class="content">
			<h3 class="heading">个人银行服务</h3>
			<img src="asset/personal.jpg" class="flex">
			<p class="paragraph">我们提供广泛的帐户，以满足私人和商业客户的需求，包括可变利率账户，固定利率账户和免税储蓄账户。 我们有一个帐户来满足您的需求。<br>
			<?php echo paragaph_link('personal','进一步了解我们的个人银行服务');?></p>
		</div>
	</div>

	<div class="right">
		<div id="hodge" class="content">
			<h3 class="heading"><?php echo quin::$squat;?></h3>
			<img src="asset/hodge.jpg" class="flex">
			<p class="paragraph">在财务方面，<?php echo quin::$name;?>集团是一家年轻的机构，在1987年获得了“融资法”的授权状态，但这掩盖了该集团的血统，因为它是从创建特许信托公司的稳定公司培育而来的。<br>
			<?php echo paragaph_link('about-us','阅读关于'.quin::$name, quin::$name);?></p>
		</div>
	</div>

	<div class="center">
		<div id="commercial" class="content">
			<h3 class="heading">商业银行服务</h3>
			<img src="asset/commercial.jpg" class="flex">
			<p class="paragraph"><?php echo quin::$name;?>旨在提供传统的投资方式，其特点是与客户建立密切的个人关系，从而提供适当的存款和借款解决方案。<br>
			<?php echo paragaph_link('commercial','阅读'.quin::$squat.'的商业贷款');?></p>
		</div>
	</div>

	<span class="group"></span>

		<div class="left">
		<div id="isa" class="content-aside">
			<img src="asset/home-isa.jpg" class="flex">
		</div>
	</div>

	<div class="right">
		<div id="fscs" class="content-aside">
			<img src="asset/home-fscs.jpg" class="flex">
		</div>
	</div>

	<div class="center">
		<div id="lifetime" class="content-aside">
			<img src="asset/home-lifetime.jpg" class="flex">
		</div>
	</div>

</div>
</div>
