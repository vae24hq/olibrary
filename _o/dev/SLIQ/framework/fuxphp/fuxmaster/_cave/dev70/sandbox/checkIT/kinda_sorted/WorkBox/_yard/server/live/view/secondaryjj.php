<script src="../plugin/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../plugin/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<section id="secondary" class="group">
<h2 class="hide">Other Information</h2>
	<div class="group-height">
    <article class="brief">
     <div class="content">
        <h4 class="heading">Brief on Whosco</h4>
        <p>At <strong>Whosco</strong> we stay commited to excellence, rendering high quality educational and library services for our clients across Nigeria.</p>
        <p class="spaced-top">As a leading supplier of hospital equipment in the country, we supply laboratory equipment, scientific medical equipment, technical equipment, and chemicals </p>
        <p class="spaced-top"><a href="./?link=about-us" title="see our corporate profile" class="secondary-link">See our corporate profile</a></p>
      </div>
      </article>
     <aside class="contact">
      <div class="content">
        <h4 class="heading">Quick Contact</h4>
        <p class="tablet-off">Kindly contact us using any of the details below as our support team is available 24/7.</p>
        <p class="spaced-top"><strong>Address:</strong> Plot 69, Sapele Road,<br>
          Benin-City,  Nigeria, West-Africa.</p>
        <p class="spaced-top"> <strong>Call:</strong> <a href="tell:+2348023396689" title="call us" class="phone">+234 (0) 802 339 6689</a></p>
        <p><strong>Email:</strong> <a href="mailto:info@whosco.com" title="write us" class="email">info@whosco.com</a> </p>
        <p class="spaced">We are also social find us and interact</p>
        <ul class="socialmedia group" >
          <li><a href="#" title="like our facebook page" class="facebook"></a></li>
          <li><a href="#" title="follow us on twitter" class="twitter"></a></li>
          <li><a href="#" title="connect to us on google+" class="google"></a></li>
          <li><a href="#" title="visit our youtube channel" class="youtube"></a></li>
          <li><a href="#" title="visit our linkedin profile" class="linkedin"></a></li>
        </ul>
      </div>
    </aside>
     <div class="directions">
     <div class="content">
        <h4 class="heading">Directions</h4>
        
        <a href="https://www.google.com/maps/ms?ll=6.106077,5.669632&amp;spn=0.05078,0.084543&amp;t=m&amp;z=14&amp;iwloc=0004fdcb21893200dc6ab&amp;msa=0&amp;msid=214939116561688450705.0004fdcb165dcd14ab1e8&amp;source=embed" title="Get directions from google maps"><img src="media/fg/map.jpg" alt="map" class="flex"></a><p class="spaced"><a href="https://www.google.com/maps/ms?ll=6.106077,5.669632&amp;spn=0.05078,0.084543&amp;t=m&amp;z=14&amp;iwloc=0004fdcb21893200dc6ab&amp;msa=0&amp;msid=214939116561688450705.0004fdcb165dcd14ab1e8&amp;source=embed" class="secondary-link">Get directions from google maps</a></p>
        </div>
     </div>
     <div class="subscribe">
    <div class="content">
        <h4 class="heading">Newsletter Signup</h4>
        <form action="<?php echo $editFormAction; ?>" method="POST" name="subscriptionForm" id="subscriptionForm">
<p>Be the first to get all our latest products, discounts sales and free gifts give away. Signup to our newsletter</p>
          <span id="spryname">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name">
          <span class="textfieldRequiredMsg"></span></span><span id="spryemail">
          <label for="email">Email: </label>
          <input type="text" name="email" id="email">
          <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
          <span id="spryphone">
          <label for="phone">Phone:</label>
          <input type="text" name="phone" id="phone">
</span>
          <input type="submit" name="SubscribeBtn" id="SubscribeBtn" value="Subscribe">
          <input type="hidden" name="MM_insert" value="subscriptionForm">
        </form>
        </div>
     </div>
     
    </div>
    
   
</section>
<script type="text/javascript">
var spryname = new Spry.Widget.ValidationTextField("spryname", "none", {hint:"Name", validateOn:["blur", "change"]});
var spryemail = new Spry.Widget.ValidationTextField("spryemail", "email", {hint:"Email@Address.com", validateOn:["blur", "change"]});
var spryphone = new Spry.Widget.ValidationTextField("spryphone", "none", {isRequired:false, hint:"Phone Number"});
</script>
