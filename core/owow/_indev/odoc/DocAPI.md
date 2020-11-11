
# WOWCatholic

## API Documentation
The **WOWCatholic API** is constantly evolving but we do our best to always update this document with the current API design


### BaseURL
The API requires a secured connection by design which when configured correctly can be access via *api.domain.com* or *domain.com/api/*

CURRENT: https://new.wowcatholic.com/api/


### General Request
Every API request must include the flowing fields, some of which are required (✓), important (•) and optional (-)
|FIELD ||DECRIPTION	|VALUE
|--|--|--|--
|okey	|✓	|Your API key	|API_KEY
|oplatform	|✓	|platform requesting api endpoint	|PLATFORM_ID
|ojson	|•	|request response in json format

**SAMPLE:**

    /?okey=570zqD0deYpGQIHumiXsn&oplatform=iOS&ojson


### PING
The ping object is for testing the API and various responses
|END-POINT|REQUEST	|SUMMARY
|--|--|--
|/ping	|get, post	|simulates default response
|/ping-failed|get, post	|simulate a failed response
|/ping-success|get, post	|simulate a successful response

**SAMPLE:**

    /ping-success?okey=570zqD0deYpGQIHumiXsn&oplatform=iOS&ojson


### REGISTRATION
The object for user signup/registration

|END-POINT|REQUEST	|REQUIRED	| OPTIONAL	|SUMMARY
|--|--|--|--|--
|/register	|post	|username, email, phone, password, religion	|name, firstname, lastname, othername, location, interest, bio	|

**SAMPLE:**

    https://new.wowcatholic.com/api/register?okey=5tMmoDgiJ301edHRj2T5&oplatform=webapi&username=john&password=JDoE20&email=john@doe.co&phone=2349016756234&religion=catholic

### UPDATE PROFILE
The object for user profile update. It requires the user's id
|END-POINT|REQUEST	|REQUIRED	| OPTIONAL	|SUMMARY
|--|--|--|--|--
|/profile/update	|post	|id, activity, step	|username, email, phone, religion, name, firstname, lastname, othername, gender, marital, dob, location, interest, bio, *dp	|

**SAMPLE:**

    https://new.wowcatholic.com/api/profile/update?id=rEy6c6mg5NksShXwHlnL0Pe91zx23v70152648391604765954Y8KFob01Q5IJhXeagyVZ&username=john&email=john@doe.com&step=2&activity=signup&okey=5tMmoDgiJ301edHRj2T5&oplatform=webapi

**PROFILE DP • upload & update**
To upload & update profile photo, include the file field, an upload field with a value containing the file field name.

*/profile/update?**dp=[FILE]&oupload=dp***

     https://new.wowcatholic.com/api/profile/update?id=rEy6c6mg5NksShXwHlnL0Pe91zx23v70152648391604765954Y8KFob01Q5IJhXeagyVZ&&dp=[FILE]&oupload=dp&username=jon&email=jon@doe.com&step=3&activity=signup&okey=5tMmoDgiJ301edHRj2T5&oplatform=webapi
