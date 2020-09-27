<div id="formPage" class="group">
  <section class="newStudent">
    <h4 class="moduleTitle">Student Search</h4>
    <div class="moduleContent">
      <?php include(FORMS.DS.'search-matno.php');?>
    </div>
    <?php if(!empty($showSubNav)){include(SUBNAV.DS.'manage-student.php');}?>
  </section>
</div>