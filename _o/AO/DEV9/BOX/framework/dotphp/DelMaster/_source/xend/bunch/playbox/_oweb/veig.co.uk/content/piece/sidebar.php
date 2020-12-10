<div class="heading"><?php echo quin::$name;?></div>
<?php
if(lang() == 'en'){$label_board = 'The Board'; $label_gov = 'governance'; $label_chairman = "Chairman's Statement";}
if(lang() == 'es'){$label_board = 'Junta Directiva'; $label_gov = 'gobernancia'; $label_chairman = "Discurso del presidente";}
if(lang() == 'it'){$label_board = 'Consiglio di Amministrazione'; $label_gov = 'governo'; $label_chairman = "Discorso del presidente";}
if(lang() == 'pt'){$label_board = 'Conselho Administrativo'; $label_gov = 'governança'; $label_chairman = "Discurso do presidente";}
if(lang() == 'ch'){$label_board = '董事会'; $label_gov = '治理'; $label_chairman = "主席致辞";}

echo page_menu_group('about-us', navLangLabel('about us'), '')."\n";
	echo page_secondary_menu('the-board', $label_board)."\n";
	echo page_secondary_menu('governance', $label_gov)."\n";

echo page_menu_group('financial', navLangLabel('financial information'), '')."\n";
	echo page_secondary_menu('accounts', $label_chairman)."\n";

echo page_menu('recruitment', navLangLabel('recruitment'))."\n";
echo page_menu('contact-us', navLangLabel('contact us'))."\n";
?>

<div class="heading">
	<?php
		if(lang() == 'en'){echo "Our Services";}
		if(lang() == 'es'){echo "Nuestros servicios";}
		if(lang() == 'it'){echo "I nostri servizi";}
		if(lang() == 'pt'){echo "Nossos serviços";}
		if(lang() == 'ch'){echo "我们的服务";}
	?>
	</div>
<?php
echo page_menu('personal', navLangLabel('personal'))."\n";
echo page_menu('commercial', navLangLabel('commercial'))."\n";
?>

<div class="heading">
	<?php
		if(lang() == 'en'){echo "e-Banking";}
		if(lang() == 'es'){echo "Banca electrónica";}
		if(lang() == 'it'){echo "Banking elettronico";}
		if(lang() == 'pt'){echo "Banca eletrônica";}
		if(lang() == 'ch'){echo "电子银行";}
	?>
</div>
<?php global $ibURL;?>
<a href="<?php echo $ibURL;?>register.php" target="_blank" class="secmenu" onclick="openIB('register.php'); return false;"><?php echo ibLangLabel('register');?></a>
<a href="<?php echo $ibURL;?>login.php" target="_blank" class="secmenu" onclick="openIB('login.php'); return false;"><?php echo ibLangLabel('login');?></a>

<!-- <img src="asset/side-jhiam.gif" class="separate flex"> -->