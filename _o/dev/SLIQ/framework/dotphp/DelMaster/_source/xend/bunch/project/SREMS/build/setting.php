<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | setting
 * Dependency »
 */
defined('ENVIRONMENT') ? null : define('ENVIRONMENT','dev'); #dev | production | testing

#DATABASE SETTINGS
defined('DBName') ? null : define('DBName', 'pype');
defined('DBType') ? null : define('DBType', 'MySQL');
defined('DBHost') ? null : define('DBHost', 'localhost');
defined('DBUser') ? null : define('DBUser', 'root');
defined('DBPassword') ? null : define('DBPassword', '');

$pypeApp = 'SREMS™';
$pypeTagline = 'Student Record and Exam Management System';
$pypeLandingTitle = $pypeApp.' | Loading';
$pypeAppHeading = $pypeApp.' - '.$pypeTagline;

$isPath['sub'] = 'pype';
$isPath['url'] = 'http://'.$_SERVER['HTTP_HOST'];if(!empty($isPath['sub'])){$isPath['url'] .='/'.$isPath['sub'];}
$isPath['dir'] = $_SERVER['DOCUMENT_ROOT'].$isPath['sub'];


$metaDescription = array(
					'home' => 'a welcome page', #URL is ./?page=home
					'login.default' => 'login module default operation', #URL is ./?link=login
					'user.register' => 'user module with registration operation', #URL is ./?link=user_register
					'user-register' => 'a simple user registration page' #URL is ./?page=user_register
					);

$metaKeywords = array(
					'default' => 'SREMS WebApp', #URL is ./
					'home' => 'Home Page, Welcome', #URL is ./?page=home
					'login.default' => 'client login, login', #URL is ./?link=login
					'user.register' => 'user registration, registration', #URL is ./?link=user_register
					'user-register' => 'user registration page, registration' #URL is ./?page=user_register
					);
?>