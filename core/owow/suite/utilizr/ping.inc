<?php
function uPing($wow, $state='success'){
	if($state == 'failed'){
		$reason['summary'] = 'Ping Failed';
		$reason['details'] = 'A failure response was initiated';
		#$log['status'] = 'failure';
		#$log['summary'] = $response['message'];
		return array('reason' => $reason);
	}
	elseif($state == 'success'){
		$result['count'] = 1;
		$result['record'] = array('project' => $wow->project['name'], 'version' => $wow->project['version']);
		#$log['status'] = 'success';
		#$log['summary'] = $harvest->project['name'].' - '.$harvest->project['version'];
		return array('response' => $result, 'status' => 'OK');
	}
	else {
		$report['report'] = 'ping-in';
		return array('response' => $report, 'status' => 'OK');
	}
}