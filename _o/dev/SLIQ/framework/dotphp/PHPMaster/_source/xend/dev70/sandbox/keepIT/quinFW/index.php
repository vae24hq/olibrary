<?php require('content/config.php');?>
<!doctype html>
<html lang="en">
<head>
<?php
	quin::charset();
	quin::xua_compatible();
	quin::viewport();
	quin::title();
	quin::meta('no', 'global', 'no');
	quin::favicon();
	quin::css('no', '');
	quin::js();
?>
<script type="text/JavaScript">
function quinOpen(theURL){
	var features = 'status=no, scrollbars=yes, resizable=yes, width=1024, height=640';
	var winName = 'quinWindow';
	var WebURL = 'https://ib.jhbgroup.ga/account/'+theURL;
	window.open(WebURL,winName,features);
}
</script>
</head>

<body>
<?php
	quin::heading();
	quin::load('ui');
	echo "\n";
?>
</body>
</html>