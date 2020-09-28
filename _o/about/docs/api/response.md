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




API TOKEN
================================================
[test | live] per platform