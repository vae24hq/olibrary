<?php global $ibURL;
	function ibLangLabel($input){
		$lang = lang();
		$ibLabel['register'] = "Register"; $ibLabel['login'] = "Login";
		if($lang == 'es'){$ibLabel['register'] = "Regístrate"; $ibLabel['login'] = "Iniciar sesión";}
		if($lang == 'it'){$ibLabel['register'] = "Registrare"; $ibLabel['login'] = "Accedi";}
		if($lang == 'pt'){$ibLabel['register'] = "Cadastro"; $ibLabel['login'] = "Entrar";}
		if($lang == 'ch'){$ibLabel['register'] = "加入"; $ibLabel['login'] = "登录";}
		return $ibLabel[$input];
	}
?>
<header id="header">
	<div class="content group">
		<a href="./" class="logo"><img src="asset/logo.png" alt="<?php echo quin::$name;?> logo" class="logo"></a>
		<div class="topbar">
			<span class="lang">
				<a href="<?php echo self_link();?>&lang=en">English</a> |
				<a href="<?php echo self_link();?>&lang=es">Español</a> |
				<a href="<?php echo self_link();?>&lang=it">Italiano</a> |
				<a href="<?php echo self_link();?>&lang=pt">Português</a> |
				<a href="<?php echo self_link();?>&lang=ch">中文</a>
			</span>
			<a href="<?php echo $ibURL;?>register.php" target="_blank" class="toplink" title="register" onclick="openIB('register.php'); return false;"><?php echo ibLangLabel('register');?></a><a href="<?php echo $ibURL;?>login.php" target="_blank" class="toplink" title="login" onclick="openIB('login.php'); return false;"><?php echo ibLangLabel('login');?></a>
		</div>
	</div>
</header>