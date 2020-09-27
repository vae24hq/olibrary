<?php
$action = 'default';
if (isset($_GET['action'])) {$action = $_GET['action'];}
$file = 'data.txt';
$fileBK = 'backup_data.txt';
if (file_exists($file)) {
    if ($action == 'download') {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

    if ($action == 'delete') {
        copy($file, $fileBK);
        if (unlink($file)) {
            header("Location: admin.php?action=deleted&klynt=" . $klynt);exit;
        }
        header("Location: admin.php?action=not-deleted&klynt=" . $klynt);exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Admin</title>
	<style type="text/css" media="screen">
		body {font-family: "Trebuchet Ms", Arial, Sans-serif; font-size: 0.938em; color: tan; line-height: 1.5; background: #000000;}
		h1 {font-size: 1.6em; margin: 0; line-height: 0}
		#page {margin: 10px auto; padding: 20px;}
		.manage {margin: 40px auto 0;}
		.notice {color: green;}
		.link {color: gold;}
		.link-del {color: red;}
		.manage a {text-transform: capitalize;}
		.manage a:hover {text-decoration: none;}
	</style>
</head>

<body>
	<div id="page">
	<h1>Data Admin</h1>
	<?php if ($action == 'deleted') {?>
	<p><span class="notice">RECORD DELETED: </span>You may now exist the current browser window. or <a href="admin.php">return</a></p>
	<?php } elseif (!file_exists($file)) {?>
	<p class="link-del">NO RECORD EXIST!<br><a href="admin.php">Refresh</a> | <a href="index.php" target="_blank">Test Form</a></p>
	<?php } else {?>
	<p>Please use the links below to manage your form data</p>
	<div class="manage">
		<a href="data.txt" class="link" target="_blank">read</a> ~
		<a href="admin.php?action=download" class="link">download</a> ~
		<a href="admin.php?action=delete" class="link-del">delete</a>
	</div>
	<?php }?>
	</div>
</body>
</html>