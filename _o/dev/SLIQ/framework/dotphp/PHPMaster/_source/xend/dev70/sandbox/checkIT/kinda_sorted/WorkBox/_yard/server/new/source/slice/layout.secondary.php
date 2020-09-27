
<section id="secondary">
<h2 class="hide">Additional Information</h2>
<div class="group">

<?php if(Device::is() == 'desktop'){?>
<article id="brief">
<div class="content">
<h4 class="heading">Whosco Advantage</h4>

<div class="wrapper">
<p>At Whosco we stay commited to excellence, rendering high quality educational and library services for our clients across Nigeria.</p>
<p class="spaceTop">
As a leading supplier of hospital equipment in the country, we sell, supply/maintain hospital equipment and instrument, disposable and consumables, laboratory equipment and reagents, construction of school laboratory and industrial laboratory. <?php echo paragraphLink('about-us', 'See our full profile', 'learn about whosco');?></p>
</div>

<h4 class="heading">Best Quality Guaranteed</h4>
<p class="paragraph">When you buy from Whosco, you are guaranteed to get top-notch, world-class products. If that quality product is available on this planet, we get it to you</p>

</div>
</article>

<?php } if(Device::is() != 'phone'){?>
<aside id="contact">
<div class="content">
<h4 class="heading">Quick Contact</h4>

<div class="wrapper">
<?php if(Device::is() == 'desktop'){?><p>Kindly contact us using any of the details below as our support team is available 24/7.</p>
<p class="space address"><?php } else {?><p class="address"><?php }?>
	<b>Address:</b>
	Plot 63, Sapele Road, Opposite Edo State Library, Benin-City, Edo State.
</p>
<p class="phone-wrap">
	<b>Call:</b>
	<a href="tel://+2348052651094" title="call us" class="phone">+234 (0) 802 351 0657</a>
<p>
<p class="email-wrap">
	<b>Email:</b>
	<a href="mailto:<?php echo erko3::$basemail;?>" title="write us" class="email"><?php echo erko3::$basemail;?></a>
</p>
<p class="space">We are interactive, join us!</p>
	<ul class="socialmedia group">
	<li><a href="#" title="our facebook page" class="facebook"></a></li>
	<li><a href="#" title="linkedin profile" class="linkedin"></a></li>
	<li><a href="#" title="follow us on twitter" class="twitter"></a></li>
	<li><a href="#" title="google+ account" class="google"></a></li>
	<li><a href="#" title="youtube channel" class="youtube"></a></li>
	</ul>
</div>

<h4 class="heading">Amazing Customer Service</h4>
<p class="paragraph">Our world-class customer service and after-sales team are available 24/7 to attend with your issues leaving you with a smile!</p>
</div>
</aside>

<?php } if(Device::is() != 'desktop'){?>

<aside id="search">
<div class="content">
<h4 class="heading">Quick Search</h4>

<div class="wrapper">
	<p>Please use the form below to find your product</p>
	<form action="" method="post" name="searchForm" id="searchForm">
	<table class="searchTable">
		<tr>
			<td><input type="text" name="product" id="product" required placeholder="product name"></td>
			<th scope="row" class="btn"><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></th>
		</tr>
	</table>
	</form>
</div>

<?php if(device::is() != 'phone'){?>
<h4 class="heading">Best Quality Guaranteed</h4>
<p class="paragraph">When you buy from Whosco, you are guaranteed to get top-notch, world-class products. If that quality product is available on this planet, we get it to you</p>
<?php }?>
</div>
</aside>

<?php }?>


<aside id="mailing">
<div class="content">
<h4 class="heading">Newsletter</h4>

<div class="wrapper">
	<p>Want to be the first to get infomation on all our latest products, discounts sales and free gifts give away?</p>
	<form action="" method="post" name="mailingForm" id="mailingForm">
	<table id="mailingTable" class="formTable">
		<tr>
  		<th class="label"><label for="name">Name:</label></th>
  		<td colspan="2">
  			<input type="text" name="name" id="name" required placeholder="John Doe">
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
      <th class="label"><label for="captcha">Captcha:</label></th>
      <td colspan="2">
      CAPTCHA
      </td>
    </tr>

    <tr>
      <th class="label"><label for="captcha">Code:</label></th>
      <td colspan="2">
        <input type="text" name="captcha" id="captcha" required placeholder="captcha">
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


</div>
</section>
