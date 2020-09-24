// BEGIN CUSTOM JAVASCRIPT
function displayCountDown(startTime, displayID){
	var interval = setInterval(
		function(){
			document.getElementById(displayID).innerHTML = startTime + " seconds remaining";
			startTime -= 1;
			if(startTime <= 0){
				clearInterval(interval);
				document.getElementById(displayID).innerHTML = "Finished";
			}
		},
		1000
	);
}

function togglePassword(targetID){
	var toggleTrigger = "show"+targetID;
	var password = document.getElementById(targetID);
	var toggle = document.getElementById(toggleTrigger);
	if (toggle.innerHTML == '<i class="fa fa-eye"></i>'){
		password.setAttribute('type', 'text');
		toggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
	} else {
		password.setAttribute('type', 'password');
		toggle.innerHTML = '<i class="fa fa-eye"></i>';
	}
}