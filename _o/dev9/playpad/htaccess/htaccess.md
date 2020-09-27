
RewriteCond %{HTTP_HOST} ^(?:www\.)?domain\.(com|es)$
RewriteRule ^wp-admin https://secure.domain.%1/wp-admin/ [NC,QSA,END]


#REWRITE - for ([sub.domain.com/VAR] → ignite.php?olink=VAR;
RewriteCond %{HTTP_HOST} ^(.+?)(\.(.+)\.(.+))$
RewriteRule ^((?!favicon.ico$)(?!favicon.png$)(?!asset\/.*$)(?!go\/.*$)(?!api\/.*$)(?!app\/.*$)(?!_ignore\/www\/.*$).*)$ /ignite.php?olink=$1&osd=%1 [NC,QSA,END]




#Basic clean up for URL on existing directory & defined routes
RewriteRule ^asset$ asset/ [NC,QSA,END]
RewriteRule ^source$ source/ [NC,QSA,END]
RewriteRule ^vae$ vae/ [NC,QSA,END]

RewriteRule ^favicon\.ico$ source/asset/favicon.ico [NC,QSA,END]
RewriteRule ^favicon\.png$ source/asset/favicon.png [NC,QSA,END]

RewriteRule ^api$ api/ [NC,QSA,END]
RewriteRule ^app$ app/ [NC,QSA,END]


#Route (API) ['api/VAR'] OR [api.domain.com/VAR] to index.php?route=VAR&router=api
RewriteRule ^api\/(.*)$ index.php?route=$1&router=api [NC,QSA,END]
	RewriteCond %{HTTP_HOST} ^(api\.)(.+)$
	RewriteRule ^(.*)$ index.php?route=$1&router=api [NC,QSA,END]

#Define rewrite request for CLOUD|ASSET|DATA|HTTP
RewriteRule ^vae\/(.*)$ index.php?route=ohttp&o403&v=$1 [NC,QSA,END]
RewriteRule ^source\/(.*)$ source/$1 [NC,QSA,END]





#Route (APP) ['app/VAR'] OR [app.domain.com/VAR] to index.php?route=VAR&router=app
RewriteRule ^app\/(.*)$ index.php?route=$1&router=app [NC,QSA,END]
	RewriteCond %{HTTP_HOST} ^(app\.)(.+)$
	RewriteRule ^(.*)$ index.php?route=$1&router=app [NC,QSA,END]

#Route (REDIRECT) ['redirect/VAR'] OR [redirect.domain.com/VAR] to index.php?route=VAR&router=redirect
RewriteRule ^redirect\/(.*)$ index.php?route=$1&router=redirect [NC,QSA,END]
	RewriteCond %{HTTP_HOST} ^(redirect\.)(.+)$
	RewriteRule ^(.*)$ index.php?route=$1&router=redirect [NC,QSA,END]

#Route (GO) ['go/VAR'] OR [go.domain.com/VAR] to index.php?route=VAR&router=go
RewriteRule ^go\/(.*)$ index.php?route=$1&router=go [NC,QSA,END]
	RewriteCond %{HTTP_HOST} ^(go\.)(.+)$
	RewriteRule ^(.*)$ index.php?route=$1&router=go [NC,QSA,END]

#Route (DOWNLOAD) ['download/VAR'] OR [download.domain.com/VAR] to index.php?route=VAR&router=download
RewriteRule ^download\/(.*)$ index.php?route=$1&router=download [NC,QSA,END]
	RewriteCond %{HTTP_HOST} ^(download\.)(.+)$
	RewriteRule ^(.*)$ index.php?route=$1&router=download [NC,QSA,END]




#Rewrite every other request (but some) to index.php?route=request
RewriteRule ^((?!api\/.*$)(?!app\/.*$)(?!redirect\/.*$)(?!go\/.*$)(?!download\/.*$)(?!vae\/.*$)(?!source\/.*$)(?!cloud\/.*$)(?!jsv\/.*$)(?!data\/.*$)(?!ajax\/.*$)(?!modal\/.*$)(?!asset\/.*$)(?!css\/.*$)(?!icon\/.*$)(?!js\/.*$)(?!media\/.*$)(?!audio\/.*$)(?!video\/.*$)(?!document\/.*$)(?!image\/.*$)(?!plugin\/.*$)(?!font\/.*$).*)$ index.php?route=$1&router=site [NC,QSA,END]


