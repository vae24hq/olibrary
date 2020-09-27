
.htaccess
================================================
RewriteRule ^(.*)$ /index.php?route=$1 [NC,QSA,END]
RewriteRule ^(.*)$ /index.php?route=$1 [NC,QSA,L]

	Match '/asset/...' → '/app/asset/...'

LINKS
================================================
	ROUTE: object|subject|action|status {link} [index.php?route=link] </link>
	FORM: post|get {form} [index.php?form=link] </o_link>
	API: string|json|xml {link} [index.php?api=link] <api/link>

	**http://www.domain.com/?route=object_subject-action!status**

	http://www.domain.com/?route=account_student-login!failed
	http://www.domain.com/account/student-login!failed

	File: object.php
	File: object_subject.php


REQUIRED VALUES
================================================
	CONFIG
		$o_config['url'] is required else default URL will be detected and used
		$o_config['imposeSSL'] = yeah|nope
		$o_config['rewriteURL'] = yeah|nope
		$o_config['mode'] = live|offline|maintenance
		$o_config['environ'] = brux|prod|zbug

#require_once 'cyar/auxil/mysql_pdo.php'; {Pre included by CRUD}

CODING STYLE
	HTML
		1. Single tags without attributes are NOT close e.g. '<br>'
		2. Single tag with attributes are NOT close e.g. '<meta charset="UTF-8">'
		3. Block level tags are indented & placed on a new line as block
		4. Inline level tags are indented as a line of code