# Virtual Hosts
#
<VirtualHost *:80>
  ServerName localhost
  ServerAlias localhost host.is
  DocumentRoot "${INSTALL_DIR}/www"
  <Directory "${INSTALL_DIR}/www/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerAdmin admin@odao.is
	ServerName odao.is
	ServerAlias www.odao.is
	ErrorLog "${INSTALL_DIR}/logs/odao.local-error.log"
	CustomLog "${INSTALL_DIR}/logs/odao.local-access.log" iommon
	DocumentRoot "${INSTALL_DIR}/www/odao.is"
	<Directory "${INSTALL_DIR}/www/odao.is/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerAdmin admin@qirk.is
	ServerName qirk.is
	ServerAlias www.qirk.is qirk.odao.is
	ErrorLog "${INSTALL_DIR}/logs/qirk.local-error.log"
	CustomLog "${INSTALL_DIR}/logs/qirk.local-access.log" iommon
	DocumentRoot "${INSTALL_DIR}/www/odao.is/qirk"
	<Directory "${INSTALL_DIR}/www/odao.is/qirk/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerAdmin admin@pear.co
	ServerName pear.co
	ServerAlias www.pear.co *.pear.co
	ErrorLog "${INSTALL_DIR}/logs/pear.local-error.log"
	CustomLog "${INSTALL_DIR}/logs/pear.local-access.log" iommon
	DocumentRoot "${INSTALL_DIR}/www/odao.is/pear"
	<Directory "${INSTALL_DIR}/www/odao.is/pear/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerAdmin admin@framework.is
	ServerName framework.is
	ServerAlias www.framework.is *.framework.is
	ErrorLog "${INSTALL_DIR}/logs/fw.local-error.log"
	CustomLog "${INSTALL_DIR}/logs/fw.local-access.log" iommon
	DocumentRoot "${INSTALL_DIR}/www/odao.is/framework"
	<Directory "${INSTALL_DIR}/www/odao.is/framework/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>