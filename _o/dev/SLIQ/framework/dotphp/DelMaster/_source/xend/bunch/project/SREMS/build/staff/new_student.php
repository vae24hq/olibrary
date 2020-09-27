<div id="formPage" class="group">
  <section class="module">
    <h4 class="moduleTitle"><?php global $moduleTitle; echo $moduleTitle;?></h4>  
    <div class="moduleContent">
      <?php include(FORMS.DS.'new-matno.php');?>
    </div>
    <?php if(!empty($showSubNav)){include(SUBNAV.DS.'manage-student.php');}?>
  </section>
</div>
