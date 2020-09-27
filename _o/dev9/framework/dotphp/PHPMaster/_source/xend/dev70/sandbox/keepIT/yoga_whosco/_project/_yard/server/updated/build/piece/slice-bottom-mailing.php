
<aside id="mailing">
<div class="content">
<h4 class="heading">Newsletter</h4>

<div class="wrap">
	<p>Want to be the first to get infomation on all our latest products, discounts sales and free gifts give away?</p>
	<form action="<?php echo path_to();?>" method="post" name="mailingForm" id="mailingForm">
	<table class="mailingTable">
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
    		<td colspan="2">
    			<input type="tel" name="phone" id="phone" required placeholder="+234 (0) 802-351-0657">
    		</td>
   	</tr>

   	<tr>
   		<th>&nbsp;</th>
   		<td class="btn" colspan="2">
        <input type="submit" name="MailingBtn" id="MailingBtn" value="Subscribe">
        <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset">
      </td>
   	</tr>
   </table>
   </form>
</div>

</div>
</aside>
