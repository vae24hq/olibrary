
	<table width="450" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td height="280" align="center" background="../brux/bglogin.jpg">
		<table class="col-md-11 no-border">
			<tr>
				<td width="40%" colspan="1" rowspan="6">&nbsp;</td>
				<td width="60%" class="col-md-12" colspan="2" style="padding-top: 10px;">
					<?php 
						if(isset($_GET['action'])){
						$action = $_GET['action'];
						if($action == 'nologin'){$msg = '<div class="ibox bg-iwarning">You are not logged in!</div>';}
						if($action == 'invalid'){$msg = '<div class="ibox bg-iwarning">Incorrect login information<div>';}
						if($action == 'logout'){$msg = '<div class="ibox bg-primary">You have logged out successfully<div>';}
						if($action == 'password'){$msg = '<div class="ibox bg-primary">Your password has been changed<div>';}
						} else {$msg = '<div class="ibox bg-inotice">Please enter your login details<div>';}
						echo $msg;
					?>
				</td>
			</tr>
			<tr>
				<th class="col-md-12" colspan="2"><span class="login-title">User ID:</span></th>
			</tr>
			<tr>
				<td class="col-md-12" colspan="2">
					<input name="uname" id="uname" type="text" class="form-control input-sm" value="<?php echo retainInput('uname');?>" tabindex="1" required>
				</td>
			</tr>
			<tr>
				<th class="col-md-12" colspan="2"><span class="login-title">Security PIN:</span></th>
			</tr>
			<tr>
				<td class="col-md-10" colspan="1">
					<input name="pin" id="pin" type="password" class="form-control input-sm" tabindex="2" required>
				</td>
				<td class="col-md-2" colspan="1">
					<a href="#" onclick="showPassword('pin'); return false;" id="showpin" class="showpassword">Show</a>
				</td>
			</tr>
			<tr>
				<td class="col-md-12" colspan="2">
					<div style="padding: 12px 0;">
						<input name="LogBtn" id="LogBtn" type="submit" class="btn btn-md btn-primary" value="Login">
					</div>
				</td>
			</tr>
		</table>
	</td>
	</tr>
	</table>