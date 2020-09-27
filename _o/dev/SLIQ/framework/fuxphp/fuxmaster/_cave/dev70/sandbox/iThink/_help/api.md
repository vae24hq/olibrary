
LOGIN
http://enov.co/247medicapi/login?email=ifyzzi@supermadu.com&pin=1987

REGISTER
http://enov.co/247medicapi/register?username=tony&pin=rex&email=tony@gmail.com&phone=0909&type=user&dob=1991&address=14



http://apidemo.247medic.org/register?name=brian&username=brian44&pin=BrianRex&email=brian@mail.com&phone=09097996048&type=patient



STATUS: success | failed
CODE: OK | [code]
RESPONSE:


ERROR CODES
	E404 - Not Found


API URL
=====================================================
	LOGIN A USER
	/login?userid=john@doe.com&password=1515

	REGSITER A USER
	/register?email=brian@luka.com&password=brian75&phone=07037119842&type=patient&name=Brian+Luka&location=Abuja&gender=male&dob=1971-12-31

SHOW USER INFORMATION
/user?bind=3956023041538729147

SHOW ALL USERS
/users

	SHOW ALL PATIENTS
	/users?type=patient

	SHOW ALL DOCTORS
	/users?type=doctor


REQUEST A CALL
/bookcall?period=YYYY-MM-DD H:M:S&phone=0807723671&purpose=consultation&bind=3956023041538729147


REQUEST 247LABTEST
/booklab?period=YYYY-MM-DD H:M:S&address=14+street&type=pregnancy&bind=3956023041538729147


SHOW ALL PHARMACY
/pharmacy

SHOW ALL APPOINTMENT (REQUEST)
/appointment


CHAT
/chat?thread=0808&messageid=68263&sender=SENDER_BIND&recipient=RECIPIENT_BIND&message=Hi
	/chat?thread=0808&messageid=34663&sender=SENDER_BIND&recipient=RECIPIENT_BIND&message=Hello
