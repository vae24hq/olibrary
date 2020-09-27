<style>
	body {margin: 50px;}
	.table {border-collapse: collapse; text-align: left; width: 500px;}
	.table th {padding: 5px 10px; color: tan; width: 20%; vertical-align: bottom;}
	.table td {padding: 5px 5px 5px 10px; line-height: 1.5;}
	input[type="text"], input[type="password"]{width: 96%; border:0; border-bottom: 1px dotted tan; outline: 0; padding: 2px 1px;}
</style>
<form name="form" id="form" action="" method="post">
<table class="table">	
	<tr style="border-bottom: 1px solid tan; background: tan; color: white;">
		<td colspan="2" style=" padding: 2px 10px;">
		Please..
		</td>	
	</tr>

	<tr>
		<th><label for="name">Username:</label></th>
		<td><input type="text" name="username" id="username"></td>	
	</tr>

	<tr>
		<th><label for="password">Password:</label></th>
		<td><input type="password" name="password" id="password"></td>	
	</tr>

	<tr>
		<th><label for="name">Name:</label></th>
		<td><input type="text" name="name" id="name"></td>	
	</tr>

	<tr>
		<th><label for="name">Email:</label></th>
		<td><input type="text" name="email" id="email"></td>	
	</tr>

	<tr>
		<th><label for="name">Phone:</label></th>
		<td><input type="text" name="phone" id="phone"></td>	
	</tr>

	<tr>
		<th>&nbsp;</th>
		<td style="padding-top: 10px; padding-bottom: 10px;">
			<input type="submit" name="submit" id="submit" value="Done">
			<input type="reset" name="reset" id="reset" value="Clear">
		</td>	
	</tr>
</table>
</form>

<a href="./">Reload</a>