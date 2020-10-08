#Route (REDIRECT) ['redirect/VAR'] OR [redirect.domain.com/VAR] to index.php?route=VAR&router=redirect
#Route (GO) ['go/VAR'] OR [go.domain.com/VAR] to index.php?route=VAR&router=go
#Route (DOWNLOAD) ['download/VAR'] OR [download.domain.com/VAR] to index.php?route=VAR&router=download




#REWRITE - for favicon on base-project ([favicon.ico] → /source/asset/favicon.ico)
RewriteRule ^favicon\.ico$ /source/asset/favicon.ico [NC,QSA,END]
RewriteRule ^favicon\.png$ /source/asset/favicon.png [NC,QSA,END]


#REWRITE - virtual directory
RewriteRule ^data\/(.*)$ /ignite.php?olink=$1&oroute=data [NC,QSA,END]

RewriteRule ^asset\/(.*)$ source/asset/$1 [NC,QSA,END]
	RewriteRule ^cloud\/(.*)$ source/asset/cloud/$1 [NC,QSA,END]
	RewriteRule ^media\/(.*)$ source/asset/media/$1 [NC,QSA,END]
	# RewriteRule ^css\/(.*)$ source/asset/script/$1 [NC,QSA,END]
	# RewriteRule ^js\/(.*)$ source/asset/script/$1 [NC,QSA,END]
	# RewriteRule ^font\/(.*)$ source/asset/plugin/$1 [NC,QSA,END]
	# RewriteRule ^plugin\/(.*)$ source/asset/plugin/$1 [NC,QSA,END]

# RewriteRule ^jsv\/(.*)$ index.php?route=$1&router=jsv [NC,QSA,END]
# RewriteRule ^ajax\/(.*)$ index.php?route=$1&router=ajax [NC,QSA,END]
# RewriteRule ^modal\/(.*)$ index.php?route=$1&router=modal [NC,QSA,END]


		# RewriteRule ^icon\/(.*)$ source/asset/media/$1 [NC,QSA,END]
		# RewriteRule ^audio\/(.*)$ source/asset/media/$1 [NC,QSA,END]
		# RewriteRule ^video\/(.*)$ source/asset/media/$1 [NC,QSA,END]
		# RewriteRule ^document\/(.*)$ source/asset/media/$1 [NC,QSA,END]
		# RewriteRule ^image\/(.*)$ source/asset/media/$1 [NC,QSA,END]
