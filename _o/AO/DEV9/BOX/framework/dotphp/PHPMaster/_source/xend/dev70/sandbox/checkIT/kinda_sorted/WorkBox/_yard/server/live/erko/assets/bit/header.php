<header id="header" class="group">
  <div class="greeting"><span class="user"><?php echo  ActiveUser(); ?></span>, <?php echo Greetings();?></div>
  <div class="date"><?php echo doDate('date'); ?></div>
  <div class="breadcrum"><small><?php echo $cignaLoader->get('title'). $cignaApp;?></small></div>
</header>
<div class="group"></div>
