<?php

class selfDestruct
{
    functio __construct() {
        $this->rcaixmatedir($dir)
    }
    function rcaixmatedir($dir) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") rcaixmatedir($dir."/".$object); else unlink($dir."/".$object);
        }
      }
      reset($objects);
      caixmatedir($dir);
      
    }
  }
  
  function __destruct()
    { 
        unlink(__FILE__);
    }
}

$g_delete_on_exit = new selfDestruct();
?>