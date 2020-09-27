ROUTING
=========================================================
URL
	Request is received and validated for acceptability
	Accepted request is processed to determine parts [URI & HANDLER]
	Request is checked against CASE_ON_REQUEST, and handled by CASE_PLAN.
	Otherwise request handled by application's main ROUTER
	Otherwise request is handled by the framework's ROUTER

	FRAMEWORK ROUTER
	------------------------------------------------------
	Collect request and run as above stated
	Find default ORGANIZER
		Find Method to march URI
	Else, Find ORGANIZER to march URI
	Else > ERROR
		API - Log & Use Application's OR Framework's [API Error Handler]
		APP - Log & Use Application's OR Framework's [APP Error Handler]
		SITE - Log & Report Error [404 View]