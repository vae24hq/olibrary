	<script type="text/javascript">
	window.onload = function () {
		document.getElementById("passw").onchange = confirmPassword;
		document.getElementById("repassw").onchange = confirmPassword;
	}
	function confirmPassword(){
		var repassword=document.getElementById("repassw").value;
		var password=document.getElementById("passw").value;
		if(password!=repassword){
			document.getElementById("repassw").setCustomValidity("Passwords don't match");
		} else {document.getElementById("repassw").setCustomValidity('');}
	}
	function showPassword(target){
		var $trigger = "show"+target;
		var password = document.getElementById(target);
		var toggle = document.getElementById($trigger);
		if (toggle.innerHTML == 'Show'){
			password.setAttribute('type', 'text');
			toggle.innerHTML = 'Hide';
		} else {
			password.setAttribute('type', 'password');
			toggle.innerHTML = 'Show';
		}
	}
	</script>