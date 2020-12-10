<?php $printUrl = isURL('print_student-record');?>
<nav id="subNavigation" class="group">
	<h4 class="title">Manage Record</h4>
	<ul>
		<li><a href="<?php echo isURL("update_mat-no&id=".$_SESSION['StudentBindID']);?>">MAT Number</a></li>
		<li><a href="<?php echo isURL("upload_passport&id=".$_SESSION['StudentPersonBindID']);?>">passport</a></li>
		<li><a href="<?php echo isURL("update_personal-data&id=".$_SESSION['StudentPersonBindID']);?>">personal data</a></li>
		<li><a href="<?php echo isURL("update_admission-record&id=".$_SESSION['AdmissionBindID']);?>">admission record</a></li>
		<li><a href="<?php echo isURL('student_record');?>">view record</a></li>
		<li>
  		<a href="#" title="print"
  		onclick="MM_openBrWindow('<?php echo $printUrl;?>','printWindow','status=no,scrollbars=no,resizable=yes,width=1100,height=665')">print record</a></li>
		
	</ul>
</nav>

<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>