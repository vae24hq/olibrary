<?php
function navLangLabel($input){
	$lang = lang();
	$label['home'] = "home";
	$label['about us'] = "about us";
	$label['personal'] = "personal";
	$label['commercial'] = "commercial";
	$label['financial information'] = "financial information";
	$label['recruitment'] = "recruitment";
	$label['contact us'] = "contact us";

	if($lang == 'es'){
	$label['home'] = "página de inicio";
		$label['about us'] = "sobre nosotros";
		$label['personal'] = "de banca personal";
		$label['commercial'] = "de banca comercial";
		$label['financial information'] = "información financiera";
		$label['recruitment'] = "reclutamiento";
		$label['contact us'] = "Contáctenos";
	}
	if($lang == 'it'){
	$label['home'] = "casa";
		$label['about us'] = "Riguardo a noi";
		$label['personal'] = "bancario personale";
		$label['commercial'] = "bancario commerciale";
		$label['financial information'] = "informazioni finanziarie";
		$label['recruitment'] = "reclutamento";
		$label['contact us'] = "Contattaci";
	}
	if($lang == 'pt'){
		$label['home'] = "página inicial";
		$label['about us'] = "Sobre nós";
		$label['personal'] = "bancários pessoais";
		$label['commercial'] = "bancário comercial";
		$label['financial information'] = "informação financeira";
		$label['recruitment'] = "recrutamento";
		$label['contact us'] = "Contate-Nos";
	}
	if($lang == 'ch'){
		$label['home'] = "主页";
		$label['about us'] = "关于我们";
		$label['personal'] = "个人银行服务";
		$label['commercial'] = "商业银行服务";
		$label['financial information'] = "财务信息";
		$label['recruitment'] = "招聘";
		$label['contact us'] = "联系我们";
	}
	return $label[$input];
}?>
<nav id="nav" class="group">
<h2 class="hide">Navigation</h2>
	<div class="content group">
	<ul class="navigation">
		<li><?php echo page_menu('index', navLangLabel('home'));?></li>
		<li><?php echo page_menu_group('about-us', navLangLabel('about us'), 'jhiam');?></li>
		<li><?php echo page_menu('personal', navLangLabel('personal'));?></li>
		<li><?php echo page_menu('commercial', navLangLabel('commercial'));?></li>
		<li><?php echo page_menu('financial', navLangLabel('financial information'));?></li>
		<li><?php echo page_menu('recruitment', navLangLabel('recruitment'));?></li>
		<li><?php echo page_menu('contact-us', navLangLabel('contact us'));?></li>
	</ul>
	</div>
</nav>