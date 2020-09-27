<?php
error_reporting(0);

    function deleteEmptyDir($path, $checkUpdated = false, $report = false) {
        $dirs = glob($path . "/*", GLOB_ONLYDIR);

        foreach($dirs as $dir) {
            $files = glob($dir . "/*");
            $innerDirs = glob($dir . "/*", GLOB_ONLYDIR);
            if(empty($files)) {
                if(!rmdir($dir))
                    echo "<font color='red'>Error: " . $dir . "<br></font>";
               elseif($report)
                    echo "<font color='tan'>".$dir . " - removed!" . "<br><font/>";
            } elseif(!empty($innerDirs)){
                deleteEmptyDir($dir, $checkUpdated, $report);
                if($checkUpdated){
                    deleteEmptyDir($dir, $checkUpdated, $report);
                    #header('Refresh: 1; url=deleteEmptyDir.php?act=red');
                }
                    
            }
        }

    }



 /**
  * Changes permissions on files and directories within $dir and dives recursively
  * into found subdirectories.
  */
  function grantCHMOD($dir, $dirPermissions, $filePermissions) {
      $dp = opendir($dir);
       while($file = readdir($dp)) {
         if (($file == ".") || ($file == ".."))
            continue;

        $fullPath = $dir."/".$file;

         if(is_dir($fullPath)) {
            echo("<span style='background: skyblue; color: white; display: block; padding: 2px 5px; margin: 0 auto 1px;'>DIR: " . $fullPath. ' - <i>'.substr(sprintf('%o', fileperms($fullPath)), -4).'</i></span>');
            chmod($fullPath, $dirPermissions);
            grantCHMOD($fullPath, $dirPermissions, $filePermissions);
         } else {
            echo ("<font color='darkblue'>&nbsp; FILE: " . $fullPath. ' - <i>'.substr(sprintf('%o', fileperms($fullPath)), -4).'</i></font><br>');
            chmod($fullPath, $filePermissions);
         }

       }
    closedir($dp);
  }?>


<a href="deleteEmptyDir.php?act=index">Index</a> |
<a href="deleteEmptyDir.php?act=permissions">Grant Permissions</a> |
<a href="deleteEmptyDir.php?act=red">Delete Empty Directory</a><hr>
<?php 

$mydir = 'lab';
$act = 'index';
if(!empty($_GET['act'])){$act = $_GET['act'];}

if($act == 'permissions'){
    echo '<h2>Granting Permissions...</h2><hr>';
    grantCHMOD($mydir, 0777, 0777);
}
if($act == 'red'){
echo '<h2>Deleting...</h2><hr>';
deleteEmptyDir($mydir, TRUE, TRUE);
}
if($act == 'index' || $act == ''){
echo '<h2>Index...</h2><hr><p>The is the index</p>';
}


?>
<hr>
<a href="deleteEmptyDir.php?act=index">Index</a> |
<a href="deleteEmptyDir.php?act=permissions">Grant Permissions</a> |
<a href="deleteEmptyDir.php?act=red">Delete Empty Directory</a>