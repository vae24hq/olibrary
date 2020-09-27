PING:
http://api.paymedix.net/labtest/v1/ping

SIGNUP (step 1):
http://api.paymedix.net/labtest/v1/signup?email=rav@labtest.netm&phone=09097886032

SIGNUP (step 2): verified
http://api.paymedix.net/labtest/v1/verified?userbind=5114620331544618375&verified=email

SIGNUP (step 3): update
http://api.paymedix.net/labtest/v1/signup/update?firstname=Rav&surname=Lexiton&password=Truce&birthday=1981-04-19&sex=female&type=patient&location=Ikpokpan&userbind=5114620331544618375

LOGIN:
http://api.paymedix.net/labtest/v1/login?userid=rav@labtest.netm&password=Truce

USER INFO:
http://api.paymedix.net/labtest/v1/user?userbind=5114620331544618375

UPDATE USER:
http://api.paymedix.co/labtest/v1/user/update?userbind=5114620331544618375&firstname=Rave
[email, username, phone, firstname, surname, othername, birthday, sex, location, isonline, lastseen]

INVESTIGATIONS (list of test):
http://api.paymedix.net/labtest/v1/investigations

INVESTIGATION (a particular investigation's details)
http://api.paymedix.net/labtest/v1/investigation/?bind=332721161541676053

LABS (list of medical labs):
http://api.paymedix.net/labtest/v1/labs

HOSPITALS (list of hospital):
http://api.paymedix.net/labtest/v1/hospitals

PHARMS (list of pharmacy):
http://api.paymedix.net/labtest/v1/pharms

REQUEST TEST
http://api.paymedix.net/labtest/v1/investigation/request?by=patient&author=5114620331544618375&user=5114620331544618375&investigation=332721161541676053&location=king+sqaure&period=2018-12-14 13:39:36

MY TEST
http://api.paymedix.net/labtest/v1/investigation/user?userbind=5114620331544618375