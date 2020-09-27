API DOCUMENTATION
================================================
API_TOKEN - [test | live]


API RESPONSE
*******************************************
	:terminus → {URI request} • /login
	:response >
		::status → [success|failure]
		::code → [E404]

		FAILURE
		---------------------------------------
		::reason → {unavailable resource}
		::message → {the requested resource/URI (/login) is unavailable}

	SUCCESS
	---------------------------------------
		::record → *{no of records in recordset}
		::recordset → *{array of records}



LINKS
#API {
	oproject = [default/api] |sub_domain (www)
	olink = api
	oapi = [var] (login)

	URLs - [olibrary.co]
	---------------------
	api.olibrary.co/login
	olibrary.co/api/login
	www.olibrary.co/api/login
	api.olibrary.co/api/login
}

#APP {
	oproject = [default/app] |sub_domain (www)
	olink = app
	oapp = [var] (login)

	URLs - [olibrary.co]
	---------------------
	app.olibrary.co/login
	olibrary.co/app/login
	www.olibrary.co/app/login
	app.olibrary.co/app/login
}