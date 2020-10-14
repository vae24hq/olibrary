# O'Libry™
**O'Libry™** is a web application development library designed and maintained as part of the AO™ Framework.

[AO™ Framework](https://vae24.com/ao) - a vanilla, evolving framework for developing websites, applications, & APIs using web technology originally built and maintained by [Anthony O. Osawere](https://www.osawere.com) ~ ([@iamodao](https://twitter.com/iamodao)) under [Apache License](https://www.apache.org/licenses/LICENSE-2.0)



## API  Development

### General Request
Every API request must include the flowing required fields
|  FIELD |DECRIPTION | REQUIRED|  VALUE
|--|--|--| --
| okey | API key | ✓ |  [key value]
| platform | request platform | ✓|  [ios/andriod/webapi]
| ojson | return json response | • | •
**EXAMPLE:**
/?**okey**=40zqD0deYpGQIHumiXsn&**platform**=webapi&**ojson**

### END POINTS
| OBJECT | END POINT | DESCRIPTION | REQUIRED | OPTIONAL
| -- | -- | -- | -- | --
| **Ping** |
|✓| /ping-success | returns success on request
|✓ | /ping-failed | returns failure on request
| |
| **Parish** |
|✓|/parish/create ||name, country, state, city, suburb |acronym
| |
| **harvest** |
|✓|/harvest/create ||title, parisho |
| |
| **target** |
|✓|/target/create ||title, amount, parisho, harvesto |


### API EXAMPLE

 **PARISH:**

     /parish/create?name=Christ%20The%20King&country=NGN&state=FCT&city=Abuja&suburb=Kubwa&okey=40zqD0deYpGQIHumiXsn&platform=webapi

HARVEST
	/harvest-create?title=Youth&parisho=3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s&okey=40zqD0deYpGQIHumiXsn&platform=webapi

TARGET
	/target-create?title=1%20Million&amount=1000000&parisho=3Lzp4UugR1w6yv57FjlBnJeqcK2NhG706845321916027031844uMmZh60w2XJgG49BT2s&harvesto=65ze82NIH4AoxQdGE239j3FSlh7Va770165834291602705034wNA0bWjdKh4T0VP42yXn&okey=40zqD0deYpGQIHumiXsn&platform=webapi


REGISTER
	/register?phone=09026636728&email=ao@vae24.co&password=oDev20&firstname=Anthony&surname=Osawere&okey=40zqD0deYpGQIHumiXsn&platform=webapi