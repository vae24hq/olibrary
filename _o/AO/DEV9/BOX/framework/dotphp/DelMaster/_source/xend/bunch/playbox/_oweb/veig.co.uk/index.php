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
function openIB(path){
	var name = 'browsepop';
	var features = 'status=no, scrollbars=yes, resizable=yes, width=1024, height=650, location=no';
	var domain = '<?php echo $ibURL;?>';
	var url = domain+path;
	window.open(url, name, features);
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