CALLERS:
	LINK: [link]	The default caller as such is initiated when no caller is defined. It's primary use case is for website linking as routes are sent to view for pages.
	APP: [app]	Initiated when caller is defined as APP and routes are sent to controllers.
	API: [api]	Initiated when caller is defined as API and routes are sent to API controller.
	FORM: [go]	Initiated when caller is defined as FORM and routes are sent to FORM controller which handles form actions.
	DOWNLOAD: [download]	Initiated when caller is defined as DOWNLOAD and routes are sent to DOWNLOAD library which handles file download.
	REDIRECT: [redirect]	Initiated when caller is defined as REDIRECT and routes are sent to REDIRECT library which handles URL redirect.


URL: DEFINE CALLER
	http://framework.io/api/
	http://framework.io/?caller=api
	http://api.framework.io

ROUTE:
	Defines the particular resource that needs to process the request. The default route is index

ROUTING:
	When using sub-domain such as api.framework.io, PHP should be responsible for detecting the sub-domain unless that sub-domain is to be redirected to a different URL or processed by a sub-directory



HTACCESS
	# BEGIN - Virtual redirect EN sub-domain to EN sub-directory
	RewriteCond %{HTTP_HOST} ^en\.framework.io [NC]
	RewriteCond %{REQUEST_URI} ^/$
	RewriteRule ^(.*)$ /en/$1 [NC,QSA,END]


	# BEGIN - Physical redirect for sub-domain to sub-directory
	RewriteCond %{HTTP_HOST} ^en\.framework.io$
	RewriteRule ^(.*)$ http://framework.io/en/$1 [NC,QSA,END]