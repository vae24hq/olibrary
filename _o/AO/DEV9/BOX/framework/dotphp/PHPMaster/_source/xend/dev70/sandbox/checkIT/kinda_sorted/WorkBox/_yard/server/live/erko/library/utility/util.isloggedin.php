<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | util:isloggedin - restrict access
 * Dependency » 
 */
 
 function isLoggedIn($cignaAct='restrict'){
 	runSession(); 
	
	$MM_authorizedUsers = ""; $MM_donotCheckaccess = "true";

 	// *** Restrict Access To Page: Grant or deny access to this page
	

	$MM_restrictGoTo = "./?link=login-expired";
	if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
	  $MM_qsChar = "?";
	  $MM_referrer = $_SERVER['PHP_SELF'];
	  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
	  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
	  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
	  if($cignaAct=='restrict') {
		  header("Location: ". $MM_restrictGoTo);	  exit;
	}
	}
	else { 
		if($cignaAct=='autologin') {
			return 'loggedin';
		}
	}
 }
 
 function LoginToRefer() {
	 $MM_restrictGoTo = "./?link=erko";
	 if(!empty($_GET['accesscheck'])) {$MM_restrictGoTo = $_GET['accesscheck'];}
		 $MM_restrictGoTo = strstr($MM_restrictGoTo, '?');
		 header( "refresh:3;url=./".$MM_restrictGoTo);
	 return $MM_restrictGoTo;
 }

 function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
	  // For security, start by assuming the visitor is NOT authorized. 
	  $isValid = False; 

	  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
	  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
	  if (!empty($UserName)) { 
	    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
	    // Parse the strings into arrays. 
	    $arrUsers = Explode(",", $strUsers); 
	    $arrGroups = Explode(",", $strGroups); 
	    if (in_array($UserName, $arrUsers)) { 
	      $isValid = true; 
	    } 
	    // Or, you may restrict access to only certain users based on their username. 
	    if (in_array($UserGroup, $arrGroups)) { 
	      $isValid = true; 
	    } 
	    if (($strUsers == "") && true) { 
	      $isValid = true; 
	    } 
	  } 
	  return $isValid; 
	}
?>