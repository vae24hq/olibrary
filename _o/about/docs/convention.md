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