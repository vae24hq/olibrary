<?php 
$isRecord = getRecord('isRecord',$_GET['id'], 'person');
if(!$isRecord){
  $url = 'create_personal-data&id='.$_SESSION['StudentPersonBindID'];
  $msg = 'This person does not have a profile<br>';
  $msg .= 'You may want to '.markupURL($url,'create new profile','create new profile').' information instead';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
  $PhotoBindID = $_GET['id'];
  $RecordSameCondtion = 'WHERE BindID = '."'".$PhotoBindID."'".' LIMIT 1';
  $RecordSame = Select('*','person', $RecordSameCondtion);
  $RecordSameRow = $RecordSame['row'];

  if(empty($_POST['UpdateBtn'])){
    $msg = 'Please browse the photograph you want to upload and click update';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
  else {
    if (empty($_FILES["Passport"])){
      $msg = 'Please select a photograph to upload and click update';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;
    }
    else {
       $myFile = $_FILES["Passport"];
       if ($myFile["error"] !== UPLOAD_ERR_OK){
          $isFileError = $myFile["error"];
          if($isFileError == UPLOAD_ERR_NO_FILE || $isFileError ==4){$msg = 'No file was uploaded';}
          elseif($isFileError == UPLOAD_ERR_PARTIAL || $isFileError ==3){$msg = 'The file was only partially uploaded';}
          else {$msg = 'An error ['.$isFileError.'] occured';}

          $isNotify = isNotify($msg,'error');
          $showForm = TRUE;
        }
        else {
          $allowedTypes = array('image/jpeg','image/png','image/gif');
          if(!in_array($myFile['type'], $allowedTypes)){
            $msg = 'Invalid file type. Only JPEG, GIF and PNG (image files) are allowed';
            $isNotify = isNotify($msg,'error');
            $showForm = TRUE;
          }
          elseif($myFile['size'] >1500000) {
            $msg = 'The file you are trying to upload is bigger than 1.4MB';
            $isNotify = isNotify($msg,'error');
            $showForm = TRUE;
          }
          else {
            $fileName = basename($myFile['name']);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileTempName =  $myFile["tmp_name"];
            $fileNewName = randomize('time').randomize('puid').'.'.$fileExtension;
            $fileDestionation = PASSPORT.DS.$fileNewName;
            $uploadFile = move_uploaded_file($fileTempName, $fileDestionation);
            if(!$uploadFile){
              $msg = 'Upload not successfull!';
              $isNotify = isNotify($msg,'error');
              $showForm = TRUE;
            }
            else {
              $FileBindID = $_GET['id'];
              $RSCondtion = 'WHERE `BindID` = '."'".$FileBindID."'".' LIMIT 1';
              $RS = Select('*','person', $RSCondtion);
              if($RS['totalRows'] > 0) {
                $RSRow = $RS['row'];
                if(!empty($RSRow['Passport'])){
                  $findOldFile = PASSPORT.DS.$RSRow['Passport'];
                  if(file_exists($findOldFile)){
                    if($RSRow['Passport'] !='none.png'){unlink($findOldFile);}                    
                  }
                }
              }

              $updateCondtion = 'WHERE BindID = '."'".$FileBindID."'".' LIMIT 1';
              $updateData = array('Passport' =>$fileNewName);
              $update = Update($updateData,'person',$updateCondtion);    
              $msg = 'The passport has been uploaded successfully';
              $isNotify = isNotify($msg,'success');
              $showForm = FALSE;
            }
          }
        }
    }
  }
}
?>
<form id="uploadPassport" name="uploadPassport" method="POST" enctype="multipart/form-data" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="vtView">
    <tr>
      <th scope="col"><label for="Passport">Passport:</label></th>
      <td><input type="file" name="Passport" id="Passport" onchange="PreviewImage();"></td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="UpdateBtn" id="UpdateBtn" value="Upload"></td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
      <td colspan="2"><img id="uploadPreview" src="./storage/passport/<?php echo $RecordSameRow['Passport'];?>"></td>
        </td>
    </tr>
  </table>
  <script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("Passport").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
  <?php } ?>
</form>