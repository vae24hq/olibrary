<?php require('../brux.php'); require('is_restrict.php');
$hideForm = 'nope'; $msg ='';
if ( isset($_POST['Form_Upload']) && $_POST['Form_Upload'] == 'UploadIT'){

	$report = $_FILES['userfile']['error'];
	if($report != 0){
		$fileError = fileUploadErrorMsg($report);
		$msg ='<span class="ibox-alt text-danger bg-danger">'.$fileError.'</span>';
	} else {
		$filename = randomize('image');
		$uploaddir = '../brux/upload/'.$filename.'.jpg';
		$uploadfile = move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir);
		if (!$uploadfile){
			$msg ='<span class="ibox-alt text-danger bg-danger">An error occurred while trying to move your passport</span>';
		}
		else {
			if($userInfo['passport'] != 'none.jpg'){
				$userPassport = '../brux/upload/'.$userInfo['passport'];
				if(file_exists($userPassport)){unlink($userPassport);}
			}
			$upSQL = "UPDATE `client` SET `passport` = '".$filename.".jpg' WHERE `uname`= '".$userInfo['uname']."'";
			$runq = mysql_query($upSQL, $connect) or die(mysql_error());
			$msg ='<span class="ibox-alt text-success">Your passport has been uploaded successfully...<br></span>';
			$hideForm = 'yeah';
			echo "<meta http-equiv='refresh' content='3;URL=dashboard.php'>";
		}
	}
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Upload :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>

<script type="text/javascript">
	if (window.FileReader) {
	var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i; 

	reader.onload = function (oFREvent) { 
		preview = document.getElementById("uploadPreview")
		preview.src = oFREvent.target.result;  
		// preview.style.display = "block";
	};

	function showPreview() {
		if (document.getElementById("userfile").files.length === 0) { return; }
		var file = document.getElementById("userfile").files[0];  
		if (!rFilter.test(file.type)){ alert("You must select a valid image file!"); return;}
		reader.readAsDataURL(file); 
	}
}
</script>
</head>

<body>
<!-- BEGIN LAYOUT FOR UPLOAD -->
<div id="content">
	<div class="col-md-12">
		<form id="upload" name="upload" method="POST" enctype="multipart/form-data">
		<div class="table-responsive">

		<table id="uploadInfo" class="record col-md-12">
			<tr>
				<th class="col-md-2 table-heading" colspan="12">Photo Upload</th>
			</tr>
			<tr>
				<td class="col-md-12" colspan="12"  style="border-bottom: 0;">
					<?php if($hideForm != 'yeah'){ $ispassport = $userInfo['passport'];?>
					<img id="uploadPreview" src="<?php echo imgPass($ispassport);?>" class="passport-lg"><?php }?>
					<div style="margin: 20px auto;"><?php echo $msg;?></div>
				</td>
			</tr>
			<?php if($hideForm != 'yeah'){?>
			<tr>
				<td class="col-md-12" colspan="12" style="border-top: 0;">
					<input type="hidden" name="Form_Upload" value="UploadIT">
					<input type="file" id="userfile" name="userfile" size="30" onchange="showPreview()">
					<p style="margin-top: 10px;"><input type="submit" name="UploadBTN" id="UploadBTN" class="btn btn-md btn-primary" value="Upload"></p>
				</td>
			</tr>
		<?php }?>
		</table>

		</div>
		</form>
	</div>
</div>
</body>
</html>