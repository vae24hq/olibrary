<?php
function brux_site($request=''){
	$brux_site['host'] = $_SERVER['HTTP_HOST'];
	$brux_site['sub_domain_name'] = array_shift((explode(".",$brux_site['host'])));
	$brux_site['couple_domain'] = $brux_site['sub_domain_name'].'.ferawa.com';

	if(!empty($brux_site[$request])){return $brux_site[$request];}
}

function bruxDB(){
	$username = 'ferawaco_wp0709'; $password = 'd+*),oD}dV*q'; #$username = 'root';	$password = '';
	$dbh = new PDO('mysql:host=localhost;dbname=ferawaco_wp0709', $username, $password);
	return $dbh;
}



//PAGE NAME
function bruxPageName(){
	$pagename = get_query_var('pagename');  
	if ( !$pagename && $id > 0 ) {  
		// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
		$post = $wp_query->get_queried_object();  
		$pagename = $post->post_name;  
	}
	return $pagename;
}

//THEME BACKGROUND IMAGE
function bruxCoupleMainImg($theme=''){
	$bruxOptionImgOne = get_option('image1');
	if(!empty($bruxOptionImgOne)){
		$bruxBGImg = BASE_URL.$bruxOptionImgOne;
	} else {
		$bruxBGImg = get_template_directory_uri().'/img/bg.jpg';
	}
	return $bruxBGImg;
}


//THEME BACKGROUND IMAGE FOR HIDE_MY_SITE
function bruxBGIMG($hide=''){
	if(isset($_SESSION['hideRe']) && $_SESSION['hideRe'] == '1'){
		$bruxBGImg = bruxCoupleMainImg();
	} else {
		$bruxBGImg = get_template_directory_uri().'/img/bg.jpg';
	}
	return $bruxBGImg;
}


//SIGNUP PHONE NUMBER
function bruxSignUp($data=''){
	if(empty($data['user'])){$data['user'] = 'no_user';}
	if(empty($data['email'])){$data['email'] = 'no_email';}
	if(empty($data['phone'])){$data['phone'] = 'no_phone';}

	$db = bruxDB();
	$sql = "INSERT INTO `brux_signup` (user, email, phone) VALUES (:user, :email, :phone)";
	$stmt = $db->prepare($sql);
	return $stmt->execute($data);
}

//GET SIGNUP PHONE NUMBER
function bruxGetSignUpPhone($username){
	$db = bruxDB();
	$sql = "SELECT `phone` FROM `brux_signup` WHERE `user` = '".$username."' LIMIT 1";
	$stmt = $db->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row['phone'];
}

//UPLOAD STORY PHOTO
function bruxStoryPhotoUpload($file='', $username='', $gender='his'){
	if(!empty($file)){
		$report = $file['error'];
		if($report == 0){
			$filename = $username.'_'.$gender.'_story';
			$bruxDocRoot = $_SERVER['DOCUMENT_ROOT'];
			$uploaddir = $bruxDocRoot.'/brux/upload/story/'.$filename.'.jpg';
			$uploadfile = move_uploaded_file($file['tmp_name'], $uploaddir);
		}
	}
}


//UPLOAD STORY PHOTO
function bruxStoryPhotoShow($username='', $gender='his'){
	if(!empty($username)){
		$filename = $username.'_'.$gender.'_story';
			#$bruxDocRoot = $_SERVER['DOCUMENT_ROOT'];
		$file = '/brux/upload/story/'.$filename.'.jpg';
		return $file;
	}
}
?>