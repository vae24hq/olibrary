<article id="<?php echo erko::return_value('page');?>" class="group">
<div class="pagebanner"><img src="<?php echo path_to('media').erko::return_value('page');?>_banner.jpg" alt="<?php erko::return_value('page');?>" class="flex"></div>
<h2 class="heading"><?php echo clean_cap(erko::return_value('page'));?></h2>

<div class="office">
<h3 class="sub-heading">Office Address</h3>
<p><span class="address">13331 S Redwood Road,<br>Riverton, UT 84065-6109</span>
<a href="mailto:<?php echo erko::$basemail;?>" title="write us" class="email"><?php echo erko::$basemail;?></a>
<a href="tel://+01" title="call us" class="phone">+1 (0) 000 000 0000</a></p>

<?php if(device::is()!='phone'){?>
<h3 class="sub-heading">Our Commitment</h3>
<p><?php echo erko::$name;?> commitment is to provide excellent service, if there's anything that we can do to improve our communication, please let us know.</p>
<?php }?>
</div>

<div class="feedback">
<div class="wrapper">
<h3 class="sub-heading">Quick Feedback</h3>
<form action="<?php echo path_to();?>" method="post" name="feedbackForm" id="feedbackForm">
	<table class="feedbackTable">
		<tr>
    		<th class="label"><label for="name">Name:</label></th>
    		<td colspan="2">
    			<input type="text" name="name" id="name" required placeholder="full name">
    		</td>
   	</tr>

   	<tr>
    		<th class="label"><label for="email">Email:</label></th>
    		<td colspan="2">
    			<input type="email" name="email" id="email" required placeholder="email@address.com">
    		</td>
   	</tr>

   	<tr>
    		<th class="label"><label for="phone">Phone:</label></th>
    		<td colspan="2"><input type="tel" name="phone" id="phone" required placeholder="+234 (0) 802-351-0657"></td>
   	</tr>

   	<tr>
    		<th class="label" rowspan="1" colspan="1"><label for="message">Message:</label></th>
    	</tr>
    	<tr>
    		<td colspan="3" rowspan="1">
    			<textarea name="message" id="message" rows="4" required placeholder="your message here"></textarea>
    		</td>
   	</tr>

   	<tr>
   		<td>&nbsp;</td>
   		<td><input type="submit" name="SendBtn" id="SendBtn" value="Send"></td>
     		<td><input type="reset" name="ClearBtn" id="ClearBtn" value="Clear"></td>
   	</tr>
   </table>
   </form>
  </div>
</div>

</article>