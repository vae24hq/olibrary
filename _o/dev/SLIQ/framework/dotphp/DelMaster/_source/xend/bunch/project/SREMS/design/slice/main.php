<?php
  $pageHeading = '';
  if(!empty($pypeModule) && strtolower($pypeModule) !='pype'){
    $pageHeading .= $pypeModule;
  }
  if(!empty($pypeApp)){
    if(!empty($pageHeading)){
      $pageHeading .=' | ';
    }
    $pageHeading .= $pypeApp;
  }
?>
<section id="pageContent">
<?php if(layout() !='initialize'){?>
  <h3 class="pageHeading"><?php echo $pageHeading;?></h3>
<?php } ?>
<div class="inside">
<?php $pypeLoader->view();?>
<?php if(layout() =='application'){?>
<?php } ?>
</div>
</section>