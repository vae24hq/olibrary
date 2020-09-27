#Turn on apache rewrite engine
RewriteEngine on

#Inherit parent directory's rules
RewriteOptions inherit

#Enable symbolic link
Options +FollowSymLinks

#Set default character set
AddDefaultCharset utf-8

#Preserve bandwidth for PHP enabled servers
<ifmodule mod_php4.c>
	php_value zlib.output_compression 16386
</ifmodule>

#Process files .inc|.htm|.html as PHP
AddType application/x-httpd-php .php .php4 .php3 .phtml .html .htm .shtml .inc .sp

#Alternate default index pages
DirectoryIndex index.sp index.php index.htm index.html

#Enable gzip compression
<IfModule mod_gzip.c>
	mod_gzip_on Yes
	mod_gzip_dechunk Yes
	mod_gzip_item_include file \.(html?|txt|css|js|php)$
	mod_gzip_item_include mime ^application/x-javascript.*
	mod_gzip_item_exclude mime ^app/asset/.*
	mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</IfModule>


RewriteRule ^jsonpatientlist(.*)$ jsonpatientlist.php?go=$1 [NC,QSA,END]

#Route (GO) 'go/VAR' request to index.php?go=VAR
RewriteRule ^go/(.*)$ index.php?go=$1 [NC,QSA,END]
#Route go.domain.com/uri to /index.php?go=uri; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(go\.)(.+)$
RewriteRule ^(.*)$ /index.php?go=$1 [NC,QSA,END]

#Route (API) 'api/VAR' request to index.php?api=VAR
RewriteRule ^api/(.*)$ index.php?api=$1 [NC,QSA,END]
#Route api.domain.com/uri to /index.php?api=uri; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(api\.)(.+)$
RewriteRule ^(.*)$ /index.php?api=$1 [NC,QSA,END]

#Route (REDIRECT) 'redirect/VAR' request to index.php?redirect=VAR
RewriteRule ^redirect/(.*)$ index.php?redirect=$1 [NC,QSA,END]
#Route redirect.domain.com/uri to /index.php?redirect=uri; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(redirect\.)(.+)$
RewriteRule ^(.*)$ /index.php?redirect=$1 [NC,QSA,END]

#Route (DOWNLOAD) 'download/VAR' request to index.php?download=VAR
RewriteRule ^download/(.*)$ index.php?download=$1 [NC,QSA,END]
#Route download.domain.com/file to /index.php?download=file; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(download\.)(.+)$
RewriteRule ^(.*)$ /index.php?download=$1 [NC,QSA,END]

#Route (DOWNLOAD) 'data/VAR' request to index.php?download=VAR
RewriteRule ^data/(.*)$ index.php?download=$1 [NC,QSA,END]
#Route data.domain.com/file to /index.php?download=file; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(data\.)(.+)$
RewriteRule ^(.*)$ /index.php?download=$1 [NC,QSA,END]

#Route (API) 'app/VAR' request to index.php?app=VAR
RewriteRule ^app/(.*)$ index.php?app=$1 [NC,QSA,END]
#Route app.domain.com/uri to /index.php?app=uri; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(app\.)(.+)$
RewriteRule ^(.*)$ /index.php?app=$1 [NC,QSA,END]

#Route (DOWNLOAD) 'asset/VAR' request to index.php?download=VAR
RewriteRule ^asset/(.*)$ app/asset/$1 [NC,QSA,END]
#Route data.domain.com/file to /index.php?download=file; RETAIN any other query string
RewriteCond %{HTTP_HOST} ^(asset\.)(.+)$
RewriteRule ^(.*)$ app/asset/$1 [NC,QSA,END]


#Route (PAGE) '_source/VAR' request to VAR.php (used for testing)
RewriteRule ^_source/(.*)$ _source/$1 [NC,QSA,END]


#Set base directory path [*only if different from current directory]
# RewriteBase /

#Disable index (directory) listing [*possible GOTCHA when using 'Options All -Indexes']
Options -Indexes

#Prevent possible infinite loop
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

#Prevent routing/rewriting for request on PHP & HTML files
RewriteCond %{REQUEST_URI} !.*\.php
RewriteCond %{REQUEST_URI} !.*\.html

#Define rewrite request for JS|CSS|AUDIO|VIDEO|DOCUMENT|IMAGE|ICON|FONT|UPLOAD
RewriteRule ^js\/(.*)$ app/asset/js/$1 [NC,QSA,END]
RewriteRule ^css\/(.*)$ app/asset/css/$1 [NC,QSA,END]

RewriteRule ^audio\/(.*)$ app/asset/media/audio/$1 [NC,QSA,END]
RewriteRule ^video\/(.*)$ app/asset/media/video/$1 [NC,QSA,END]
RewriteRule ^document\/(.*)$ app/asset/media/document/$1 [NC,QSA,END]
RewriteRule ^image\/(.*)$ app/asset/media/image/$1 [NC,QSA,END]
RewriteRule ^icon\/(.*)$ app/asset/media/image/$1 [NC,QSA,END]

RewriteRule ^font\/(.*)$ app/asset/plugin/$1 [NC,QSA,END]
RewriteRule ^plugin\/(.*)$ app/asset/plugin/$1 [NC,QSA,END]
RewriteRule ^upload\/(.*)$ app/asset/upload/$1 [NC,QSA,END]

#Route sub.domain.com/uri to /index.php?site=sub&link=uri; RETAIN any other query string
# RewriteCond %{HTTP_HOST} ^(.+?)(\.(.+)\.(.+))$
RewriteCond %{HTTP_HOST} ^(.+)\.dotphp\.io$
RewriteRule ^(.*)$ /index.php?site=%1&link=$1 [NC,QSA,END]

#Redirect domain.com to www.domain.com
# RewriteCond %{HTTP_HOST} ^dotphp.io$ [NC]
# RewriteRule (.*) http://www.dotphp.io/$1 [R=301,END]

#Rewrite every other request but FAVICON|JS|CSS|AUDIO|VIDEO|DOCUMENT|IMAGE|ICON|FONT|UPLOAD|APP|API|DOWNLOAD|REDIRECT to index.php?link=request
RewriteRule ^((?!favicon\.ico$)(?!js\/.*$)(?!css\/.*$)(?!audio\/.*$)(?!video\/.*$)(?!document\/.*$)(?!image\/.*$)(?!icon\/.*$)(?!font\/.*$)(?!plugin\/.*$)(?!upload\/.*$)(?!api\/.*$)(?!app\/.*$)(?!redirect\/.*$)(?!go\/.*$)(?!download\/.*$)(?!data\/.*$).*)$ index.php?link=$1 [NC,QSA,END]

#Define error documents
ErrorDocument 404 /index.php?link=http404
ErrorDocument 403 /index.php?link=http403
