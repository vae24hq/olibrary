<div id="sideContent">
<?php
  inSession();
  $dashboard = 'access';
  if(!empty($_SESSION['Dashboard'])){
      $dashboard = $_SESSION['Dashboard'];
  } 
?>



  <nav id="navigation">
    <h4 class="heading">Navigation</h4>
      <ul class="navArea">
      <li><?php isNavURL('dashboard',$dashboard,'dashboard');?></li>
      <span class="seprator"></span>
      
      <?php if(showIFUser('student')){?>
      <li><?php isNavURL('course_registration','course_registration','course registration');?></li>
      <li><?php isNavURL('exams','exam_list','my exams/result');?></li>
      <span class="seprator"></span>
      <?php }?>

      <?php if(showIFUser('admin')){?>
      <li><?php isNavURL('new_user','staff_new-student','new student');?></li>
      <?php } ?>

      <?php if(showIFUser('admin') || showIFUser('supervisor') || showIFUser('lecturer')){?>
      <li><?php isNavURL('search','search_student','find student');?></li>
      <li><?php isNavURL('manage_student','manage_students','students');?></li>  
      <span class="seprator"></span>
      <?php } ?>
    

      <?php if(showIFUser('admin')){?>
      <li><?php isNavURL('new_staff','staff_new-account','new staff');?></li>      
      <li><?php isNavURL('manage_staff','manage_staffs','staffs');?></li>      
      <span class="seprator"></span>
      <?php } ?>


      <?php if(showIFUser('admin')){?>
      <li><?php isNavURL('add_course','create_course','new course');?></li>
      <?php } ?>
 
      <?php if(showIFUser('admin') || showIFUser('supervisor')){?>
      <li><?php isNavURL('courses','manage_course','manage course');?></li>
      <?php } ?>

      <?php if(showIFUser('lecturer')){?>
      <li>POST QUESTION</li>
      <li><?php isNavURL('post','create_question','objective');?></li>
      <li><?php isNavURL('post','create_question-boolean','true or false');?></li>
      <li><?php isNavURL('post','create_question-short','short answer');?></li>
      <li><?php isNavURL('courses','manage_course','manage question');?></li>
      <?php }?>
  
       <?php if(showIFUser('admin') || showIFUser('supervisor') || showIFUser('lecturer')){?>
       <span class="seprator"></span>
       <?php } ?>

      
      <?php if(showIFUser('admin') || showIFUser('supervisor')){?>
      <li><?php isNavURL('new_credit_limit','create_credit-limit','set credit-limit');?></li>
      <li><?php isNavURL('manage','manage_credit-limit','credit-limit');?></li>
      <span class="seprator"></span>
      <?php } ?>


      <?php if(showIFUser('admin')){?>
      <li><?php isNavURL('new_exam','create_exam','new exam');?></li>
      <?php } ?>
      <?php if(showIFUser('admin') || showIFUser('supervisor')){?>
      <li><?php isNavURL('manage_exam','manage_exam','manage exam');?></li>
      <span class="seprator"></span>
      <?php } ?>


      <li><?php isNavURL('logout','access_logout','logout');?></li>
      </ul>
  </nav>

<?php if(showIFUser('student') && $_GET['url'] == 'exam_live'){include(SLICE.DS.'exam-student.php');}?> 
  
</div>
