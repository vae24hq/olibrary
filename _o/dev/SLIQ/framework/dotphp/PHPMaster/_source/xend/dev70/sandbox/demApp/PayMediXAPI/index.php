<?php
#SESSION
#if(!isset($_SESSION)){session_start();}

#INDEPENDENT
require 'brux/utility/tool.inc';


#CORE
require 'config/db.inc';

require 'brux/model/brux.inc';
require 'brux/model/app.inc';


#INITIALIZAR
$app = app::instantiate();
$response = array();


#DEPENDENCY
require 'brux/library/obtain.inc';
require 'brux/library/olist.inc';
require 'brux/library/orun.inc';
require 'brux/library/oupdate.inc';


#ROUTING
require 'brux/utility/route.inc';
$response = APIRoute(); #variable name must be $response


#RETURN JSON RESPONSE
jsonResp($response);
?>