1.	Click in tray WAMP > Apache > Apache Modules and check socache_shmcb_module (wait for restart)

2.	Repeat the above step for ssl_module

3.	Open CMD and execute these commands one-by-one (if asked, type i.e. abcd for password-phrase)

	cd c:\wamp\bin\apache\apacheX.X.XX\bin

	(echo [ my_req_ext ]&&echo subjectAltName = DNS:localhost, DNS:*.localhost, IP:127.0.0.1) >> ..\conf\openssl.cnf

	openssl genrsa -aes256 -out mypriv.key 2048 && openssl rsa -in mypriv.key -out mypriv.key

	openssl req -new -x509 -nodes -sha1 -key mypriv.key -out mycert.crt -days 44444 -config ..\conf\openssl.cnf -extensions my_req_ext -subj "/C=US/ST=Distributed/L=Cloud/O=Cluster/CN=localhost"

	copy mypriv.key ..\conf\mypriv.key /y && copy mycert.crt ..\conf\mycert.crt /y

(Don’t close CMD).

4.	Now in Windows, go to folder: c:\wamp\bin\apache\apacheX.X.XX\conf, open httpd.conf and :
	A)	Below line Define APACHE_DIR  add this:
		Define SRVROOT ${APACHE_DIR}/

	B) Find & uncomment this line:
		Include conf/extra/httpd-ssl.conf

	C)	Open extra\httpd-ssl.conf file and below <VirtualHost _default_:443> line, find & set these lines :
		DocumentRoot "${INSTALL_DIR}/www"
		ServerName localhost:443
		...
		...
		SSLCertificateFile "${SRVROOT}/conf/mycert.crt"
		...
		SSLCertificateKeyFile "${SRVROOT}/conf/mypriv.key"

	SAVE FILE

(In CMD type httpd -t to ensure no errors displayed) and then Restart WAMP.

=============================================================================
Now open https://localhost in browser,  you will see the browser-warning (Proceed unsafe..) we mentioned in the beginning, you should add the certificate file to Trusted Roots. Open certmgr (from Start/Run), then right click on Certificates > Trusted Root...> Certificates and choose Action>All-Tasks>import and import the mycert.crt file.
Restart browser and go to https://localhost 
THAT’S ALL !

Let us know if that helped you.   (btw, if someone still gets an error, like: 

then you have to click “Proceed” there).
=============================================================================

https://puvox.software/blog/install-ssl-https-on-wamp-server/