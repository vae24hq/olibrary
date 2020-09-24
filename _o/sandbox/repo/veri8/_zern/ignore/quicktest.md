// $dbdata = array('name' => 'zenq', 'user' => 'zenq', 'pass' => 'ZenQ', 'host' => 'localhost');
$dbdata = array('name' => 'zenq', 'user' => 'odao', 'pass' => 'DBAdmin19', 'host' => 'localhost');
$db = new oPDO($dbdata);
// $dbInput['brand'] = mt_rand();
// $dbInput['address'] = '123 Street';
// $dbTest = insertDB($dbInput, 'xampo');
// dbugA($dbTest);
// $db->disconnect();
// dbugA(get_object_vars($db));

// $row = array ('name' => 'Odao Tony', 'logo' => 22);
// $row['email'] = mt_rand(100,999).'@gmail.com';
// #$test = $db->wipe('xampo', $row);
// $re = array('puid', 'name', 'email');
// $test = $db->insertSQL('xampo', $row, $re);

$raw = array ('name' => 'Brian Normad', 'logo' => 15);
$row = array('name');
$cond = "`auid` > 10";
// $condA['auid'] = 5;
$condA['author'] = 'oApp';
// $dbug = $db->createSQL('xampo', $raw, $condA, 5);
//
// $selCond['auid'] = '3';
$selCond['address'] = 'BIU';
$selc = array('auid', 'author');
$dbug = $db->select('*', 'xampo', $selCond, 'NO_LIMIT', 'auid');
// $dbug = 1;
dbug($dbug, 'json');


// $arr = array('ben' => 'bose', 'john'=> 'doe');
// array($arr);
// var_dump($arr);