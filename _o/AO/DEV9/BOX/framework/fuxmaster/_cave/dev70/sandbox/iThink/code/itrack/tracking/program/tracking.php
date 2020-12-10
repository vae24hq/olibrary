<div class="small-12 medium-8 large-6 columns small-centered">
	<div class="account__login">
		<h4>Tracking</h4>
		<p>You can enter your tracking number below</p>
		<form name="TrackForm" id="TrackForm" method="GET" action="/tracking">
			<input type="text" name="TrackID" id="TrackID" value="<?php if(!empty($_REQUEST['TrackID'])){echo $_REQUEST['TrackID'];}?>" required>
			<input type='submit' name='TrackBTN' value='Track IT' class="primary button float-right"/>
		</form>
	</div>
</div>

<?php
if(!empty($_REQUEST['TrackID'])){
require_once 'core.php';
$record = oTrack($_REQUEST['TrackID']);
if(!$record){
	include 'track-error.php';
} else {
	include 'track-result.php';}
}
?>
