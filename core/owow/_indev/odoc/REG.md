Wo_Users

language  = 'english'
joined = time();
phone_number
type = user
registered = date('n') . '/' . date("Y");
lastseen = time()
ip_address
src = [AO_Web|AO_iOS|AO_Android]
email_code = '1d84553d69e91bbfa5a6f80dda041b09'
country_id = 159 (if Nigeria)
birthday
gender
cover = 'upload/photos/d-cover.jpg'
avatar = 'upload/photos/d-avatar.jpg'  OR upload/photos/f-avatar.jpg
first_name
last_name
email
username
password   = Wo_Secure(password_hash($registration_data['password'], PASSWORD_DEFAULT));



observe user_id


$code                   = md5(rand(1111, 9999));
$code = md5(rand(1111, 9999) . time());



wowcatholic_main