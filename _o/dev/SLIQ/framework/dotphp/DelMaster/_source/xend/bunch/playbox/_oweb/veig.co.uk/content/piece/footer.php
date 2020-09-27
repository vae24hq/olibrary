
<?php
function footernavLangLabel($input){
	$lang = lang();
	$label['home'] = "home";
	$label['about us'] = "about us";
	$label['contact us'] = "contact us";
	$label['paragraph'] = "is an Authorised Institution under the Financial Services and Markets Act 2000.<br>
	We are authorised by the Prudential Regulation Authority and regulated by the Financial Conduct Authority and the Prudential Regulation Authority.";

	if($lang == 'es'){
		$label['home'] = "página de inicio";
		$label['about us'] = "sobre nosotros";
		$label['contact us'] = "Contáctenos";
		$label['paragraph'] = "es una institución autorizada en virtud de la Ley de servicios y mercados financieros de 2000.<br>
		Estamos autorizados por la Autoridad de Regulación Prudencial y regulados por la Autoridad de Conducta Financiera y la Autoridad de Regulación Prudencial.";
	}
	if($lang == 'it'){
		$label['home'] = "casa";
		$label['about us'] = "Riguardo a noi";
		$label['contact us'] = "Contattaci";
		$label['paragraph'] = "è un'istituzione autorizzata ai sensi del Financial Services and Markets Act 2000.<br>
		Siamo autorizzati dall'Autorità di Regolazione Prudenziale e regolati dall'Autorità di Gestione Finanziaria e dall'Autorità di Regolamentazione Prudenziale.";
	}
	if($lang == 'pt'){
		$label['home'] = "página inicial";
		$label['about us'] = "Sobre nós";
		$label['contact us'] = "Contate-Nos";
		$label['paragraph'] = "é uma instituição autorizada no âmbito da Financial Services and Markets Act 2000.<br>
		Somos autorizados pela Autoridade de Regulação Prudencial e regulados pela Autoridade de Conduta Financeira e pela Autoridade de Regulação Prudencial.";
	}
	if($lang == 'ch'){
		$label['home'] = "主页";
		$label['about us'] = "关于我们";
		$label['contact us'] = "联系我们";
		$label['paragraph'] = "是根据2000年“金融服务和市场法”授权的机构。<br>我们获得了审慎监管机构的授权，并受到金融行为管理局和审慎监管机构的监管。";
	}
	return $label[$input];
}?>
<footer id="footer">
	<div class="content">

	<div class="centeredmenu">
		<ul>
		<li><?php echo page_menu('index', footernavLangLabel('home'));?></li>
		<li><?php echo page_menu('about-us', footernavLangLabel('about us'));?></li>
		<li><?php echo page_menu('contact-us', footernavLangLabel('contact us'));?></li>
		</ul>
	</div>

	<p><?php echo quin::$name.' '.footernavLangLabel('paragraph');?></p>
	</div>
</footer>