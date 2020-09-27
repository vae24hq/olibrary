WAMPSERVER
=====================================
#Dot.Ca
<VirtualHost *:80>
	ServerAdmin admin@dot.ca
	ServerName dot.ca
	ServerAlias www.dot.ca *.dot.ca odot.ca *.odot.ca
	ErrorLog "d:/server/wamp64/www/dot.ca/_source/log/error.log"
	CustomLog "d:/server/wamp64/www/dot.ca/_source/log/access.log" common
	DocumentRoot "d:/server/wamp64/www/dot.ca"
	<Directory "d:/server/wamp64/www/dot.ca/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		#Require local
		Require all granted
	</Directory>
</VirtualHost>


UNIFORMSERVER
=====================================
#Dot.Ca
<VirtualHost *:${AP_SSL_PORT}>
	ServerAdmin admin@dot.ca
	ServerName dot.ca
	ServerAlias www.dot.ca *.dot.ca odot.ca *.odot.ca
	ErrorLog d:/server/wamp64/www/dot.ca/_source/log/error.log
	CustomLog d:/server/wamp64/www/dot.ca/_source/log/access.log common
	DocumentRoot d:/server/wamp64/www/dot.ca
	<Directory "d:\server\wamp64\www\dot.ca">
		Options Indexes Includes 
		AllowOverride All
		#Require local
		Require all granted
	</Directory>
</VirtualHost>