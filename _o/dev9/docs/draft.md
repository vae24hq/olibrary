NAMING CONVENTION
================================================
	class name is written as oClass | oClassName

	::STATIC
		method → Method() | MethodName()
		property → $Property | $PropertyName

	$this->INSTANCE
		method → method() | methodName()
		property → $property | $propertyName

	ARGUMENTS
		$argument | $next_argument

	NOTE:
		private methods & properties have underscore at the beginning _privateMethod()

	GENERIC
		$res ~ result | resolve
		$tsk ~ task
		$o ~ output
		$i ~
		$a ~

EXAMPLE
---------------------------------------------
oUser::FirstName($user_id);
$oUser->firstName($user_id);


#REDIRECT → redirect user login {}



















QRCODE APP
qr.woca.ng/openapp















URL
---------------------------------------------
No value for [oaction] = default
No value for [olink] = index
No value || www for [orouter] = osite



INS
---------------------------------------------
olink - index | login
orouter - app | api | site



os - default/www/amandus

oroute - site/{go, download, redirect}/app/api
olink - index/login/contact


www.domain.com/site/index

amandus.domain.com/app


routing
 - checks router []