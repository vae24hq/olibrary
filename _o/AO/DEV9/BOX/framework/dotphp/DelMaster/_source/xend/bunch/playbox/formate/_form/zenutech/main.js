var webmailObj = null;

function Webmail() {
	this.self = this;
	this.client_list = new Array();
	this.num_clients = 0;
	this.active_tab = null;
	this.active_client = null;
	this.cookie_expire = 360; // in days
	this.first_choice = true;
	
	this.client_info = function(li_obj, pos) {
		var classes = li_obj.className.split(' ');
		
		if (classes[0] == 'client') {
			if (pos <= 0) {
				return classes;
			}
			else if (classes.length > pos) {
				return classes[pos];
			}
		}
		
		return '';
	}

	this.load = function() {
		var li_array = document.getElementsByTagName('li');
		var cookie_obj = null;
		
		for (var i = 0; i < li_array.length; i++) {
			var li = li_array[i];
			
			if (this.self.client_info(li, 0) != null) {
				var client_name = this.self.client_info(li, 1);
				var client_active = this.self.client_info(li, 2);
				
				if (client_active != '') {
					this.self.active_tab = li;
					this.self.active_client = client_name;
				}
				
				if (this.self.getCookie('client') == client_name) {
					cookie_obj = li;
				}
				
				this.self.client_list[this.self.num_clients] = client_name;
				this.self.num_clients++;
				
				li.onclick = function() {
					webmailObj.activateTab(this);
				}

				if (document.getElementById(client_name + '_form')) {
					var form = document.getElementById(client_name + '_form');
					
					if (this.self.getCookie('remember')) {
						form.remember.checked = true;
						var email = this.self.getEmailField(form);
						email.value = this.self.getCookie('remember');
					}
					
					if (form.version) {
						for (var x = 0; x < form.version.length; x++) {
							var radio = form.version[x];

							radio.onclick = function() {
								this.form.action = this.value;
							}
						}
					}
					form.onsubmit = function() {
						if (this.remember.checked) {
							var email = webmailObj.getEmailField(this);
							if (email != null) {
								webmailObj.setCookie('remember', email.value);
							}
						}
						else {
							webmailObj.setCookie('remember', '');
						}
					}
				}
			}
		}
		
		if (cookie_obj != null) {
			this.self.activateTab(cookie_obj);
		}
	}
	
	this.setFocus = function() {
		var active_form = document.getElementById(this.self.active_client + '_form');
		var email = this.self.getEmailField(active_form);
		var password = this.self.getPasswordField(active_form);

		if (email.value == '') {
			email.focus();
		}
		else {
			password.focus();
		}
	}
	
	this.activateTab = function(li_obj) {
		var client_name = this.self.client_info(li_obj, 1);
		
		if (this.self.first_choice) {
			document.getElementById('intro').style.display = 'none';
			document.getElementById('webmail_form').style.display = 'block';
			this.self.first_choice = false;
		}
		
		if (client_name != 'roundcube') {
			document.getElementById('recommended').style.display = 'none';
		}
		else {
			document.getElementById('recommended').style.display = 'block';
		}
		
		var current_client_name = '';
		if (this.self.active_tab != null) {
			current_client_name = this.self.client_info(this.self.active_tab, 1);
		}
		
		var radios = document.choose_client.clients;
		for (var i = 0; i < radios.length; i++) {
			if (radios[i].value == client_name) {
				radios[i].checked = true;
			}
		}
		
		if (this.self.active_tab != null) {
			this.self.active_tab.className = this.self.active_tab.className.replace(' active', '');
		}
		li_obj.className = li_obj.className + ' active';
		
		if (document.getElementById(current_client_name + '_form')) {
			document.getElementById(current_client_name + '_form').style.display = 'none';
		}
		
		if (document.getElementById(client_name + '_form')) {
			document.getElementById(client_name + '_form').style.display = 'block';
		}
		
		this.self.active_tab = li_obj;
		this.self.active_client = client_name;
		
		this.self.setCookie('client', client_name);
		this.self.setFocus();
	}
	
	this.getPasswordField = function(form) {
		for (var i = 0; i < form.elements.length; i++) {
			if (form.elements[i].type == 'password') {
				return form.elements[i];
			}
		}
	}
	
	this.getEmailField = function(form) {
		for (var i = 0; i < form.elements.length; i++) {
			if (form.elements[i].type == 'text') {
				return form.elements[i];
			}
		}
	}
	
	this.setCookie = function(name, value) {
		var date = new Date();
		date.setTime(date.getTime()+(this.self.cookie_expire*24*60*60*1000));
		
		document.cookie = name + '=' + value + '; expires=' + date.toGMTString() + '; path=/';
	}
	
	this.getCookie = function(name) {
		var nameEQ = name + '=';
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1, c.length);
			}
			if (c.indexOf(nameEQ) == 0) {
				return c.substring(nameEQ.length,c.length);
			}
		}
		return null;
	}
}

window.onload = function() {
	webmailObj = new Webmail();
	webmailObj.load();
}
