DATABASE CONNECTION
========================
$setting['database'] = array('name' => "aodb", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iPDO');
// $setting['database'] = array('name' => "aodb", 'user' => "ao", 'password' => "AO20", 'host' => "ao.co", 'driver' => 'iMySQLi');
defined('SETTING_DATABASE') ? null : define('SETTING_DATABASE', $setting['database']);
$db = new oDatabase(SETTING_DATABASE);

Database Driver Class [$oMySQLi->query() -> $dbc->query()]
$dbc = $db->connect;

Database Connection Object [$mysqli->multi_query() -> $dbo->query()]
$dbo = $db->dbo();
