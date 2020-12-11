
<?php if($zernLink != 'login' && $zernLink != 'locked'){?>
<script src="<?php echo $zernApp->linkTo(JS.'jquery.js');?>"></script>
<script src="<?php echo $zernApp->linkTo(JS.'popper.js');?>"></script>
<script src="<?php echo $zernApp->linkTo(JS.'bootstrap.js');?>"></script>
<script src="<?php echo $zernApp->linkTo(JS.'slimscroll.js');?>"></script>
<!-- <script src="<?php echo $zernApp->linkTo(JS.'chart.bundle.js');?>"></script> -->
<!-- <script src="<?php echo $zernApp->linkTo(JS.'chart.js');?>"></script> -->
<?php }?>

<script src="<?php echo $zernApp->linkTo(JS.'zern.js');?>"></script>
