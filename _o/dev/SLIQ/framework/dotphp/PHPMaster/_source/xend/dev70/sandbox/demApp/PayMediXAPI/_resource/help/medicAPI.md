PING (ping to show api structure):
http://api.paymedix.net/medic/v1/ping




PING FAILED (ping failed to show api error):
http://api.paymedix.net/medic/v1/pingerror




PHARMACY (list of pharmacies):
http://api.paymedix.net/medic/v1/list/pharmacy/




HOSPITALS (list of hospitals):
http://api.paymedix.net/medic/v1/list/hospital/




MEDICAL LABS (list of labs):
http://api.paymedix.net/medic/v1/list/lab/




DOCTORS (list of doctors):
http://api.paymedix.net/medic/v1/list/doctor/



SCIENTIST (list of scientist):
http://api.paymedix.net/medic/v1/list/scientist/



LABTEST (list of investigation):
http://api.paymedix.net/medic/v1/list/investigation/




LOGIN (user login):
http://api.paymedix.net/medic/v1/login?userid=[user_id]&password=[password]

Example
http://api.paymedix.net/medic/v1/login?userid=rav@mail.com&password=Truce




USER INFO (get user's information):
http://api.paymedix.net/medic/v1/user?ouser=[oUSER]

Example
http://api.paymedix.net/medic/v1/user?ouser=5114620331544618375




UPDATE USER INFO (update a user's information):
http://api.paymedix.net/medic/v1/user/update?ouser=[oUSER]&firstname=[first_name]
[email, username, phone, firstname, surname, othername, birthday, sex, location, isonline, lastseen]

Example
http://api.paymedix.net/medic/v1/user/update?ouser=5114620331544618375&firstname=Rave




LABTEST DETAILS (a particular investigation's details):
http://api.paymedix.net/medic/v1/investigation/?oinvestigation=[oINVESTIGATION]

Example
http://api.paymedix.net/medic/v1/investigation/?oinvestigation=332721161541676053




LABTEST REQUEST (new labtest request)
http://api.paymedix.net/medic/v1/investigation/request?by=[user-type]&oauthor=[oAUTHOR]&ouser=[oUSER]&oinvestigation=[oINVESTIGATION]&location=[area]&period=[YYYY-MM-DD HH:MM:SS]

Example
http://api.paymedix.net/medic/v1/investigation/request?by=patient&oauthor=5114620331544618375&ouser=5114620331544618375&oinvestigation=332721161541676053&location=ikeja&period=2018-12-14 13:39:36




USER LABTESTS (a user's list of test):
http://api.paymedix.net/medic/v1/user/investigations/?ouser=[oUSER]

Example
http://api.paymedix.net/medic/v1/user/investigations/?ouser=5114620331544618375




LABTEST RESULT (a particular investigation's result)
http://api.paymedix.net/medic/v1/investigation/result/?orequest=[oREQUEST]

Example
http://api.paymedix.net/medic/v1/investigation/result/?orequest=332721161541676053
