URL
--------------------------------
	NO SUB-DOMAIN: When no sub-domain is found in the URL, redirect URL to {www} sub-domain [http://domain.com → http://www.domain.com]
	SUB-DOMAIN: Set action to use case, else request is routed to main domain's {index} by default
	SUB-DIRECTORY: The following sub-directory in URL {api|app} sets {caller} [http://domain.com/api/ » /caller/api.php]


CALLER
--------------------------------
	API: calls are handled by build -> api
	APP: calls are handled by build -> organizr
	ROUTE: calls are sent to build -> view, except otherwise
	DOWNLOAD & REDIRECT: are handled by their action library

PHP
--------------------------------
	*Trim {api, /api, /api/, api/} from API caller to prevent possible [http://api.framework.io/api], where ?api=api

NOTE
--------------------------------
	All sub-domains are routed to index.php
	Treat sub-directory first before checking on sub-domain
	Routing order - API, REDIRECT, DOWNLOAD, APP and SITE (www, en, ng, etc)
	Rewrite assets URL
	Route sub-domain to URL [sub.domain.com/uri to /index.php?site=sub&route=uri]
	Either redirect no sub-domain to www sub-domain OR Route everything except pre-defined to /index.php?site=sub&route=uri


URL DEBURG
--------------------------------
	API:
		http://framework.io/	{no api}
		http://framework.io/api/ {api=''}
		http://en.framework.io/api/ {api=''}
		http://api.framework.io/api/ {api=''}
		http://api.framework.io/ {api=''}

		http://api.framework.io/login/ {api='login'}
		http://api.framework.io/api/login/ {api='login'}
		http://en.framework.io/api/login/ {api='login'}




TESTING ENVIRONMENT
http://i360.ga
	PROFITSERVER - 80.85.156.55
	BIZ.NF - 185.176.43.96
	OIAVO -