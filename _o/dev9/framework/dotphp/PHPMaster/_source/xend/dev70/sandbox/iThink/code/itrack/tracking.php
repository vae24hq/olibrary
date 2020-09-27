<h2 class="heading">Package Tracking</h2>
<div class="banner"><img src="asset/banner-tracking.jpg" class="flex"></div>

<div class="pagearea">

<!-- BEGIN ABOUT US -->
<article class="main">

<h3 class="heading" >Efficient Tracking Service</h3>
<form method="post" name="custrack" id="custrack" action="" class="form-area">
  <table width="98%" border="0" cellspacing="1" cellpadding="0">
   
    <tr>
      <td colspan="2" align="left" valign="middle" class="paragraph">Please enter your tracking number below.</td>
    </tr>
    
    <tr>
      <td width="4" rowspan="3" align="right" valign="middle" class="form_text">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="middle">
        <input name="txtKeyword" type="text" class="textbox" value="" size="28">
        <input name="userlogin" type="submit" class="input6" value="Track">
                                  </td>
    </tr>

  </table>
</form>




<?php
require_once 'program.php'; 

if(!empty($_POST['userlogin'])){

    //process tracking
    if(!$record = isRecord($_POST['txtKeyword'])){include 'track-error.php';}
    else {include 'track-result.php';}                          
  }
          ?>
</article>
</div>