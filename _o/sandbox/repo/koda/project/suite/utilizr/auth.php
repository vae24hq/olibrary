<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | auth::utility ~
 */

if(!empty($zernAuth)){
	$active_user_data = $zernAuth->userActive();
	$activeUser = new oData();
	$activeUser->set($active_user_data);
}


function htmlNoRecord($title='', $msg=''){
	if(empty($msg)){
		$msg = 'SORRY, NO RECORDS FOUND!';
		// $msg = 'Sorry, <br> There are no records found!';
	}
	$html = '
					<div class="row">
					<div class="col-sm-12">
						<div class="card-box">
							<div class="card-block">';
	if(!empty($title)){
		$html .= '<h4 class="card-title zern-danger-border">'.ucwords($title).'</h4>';
	}

	$html .= '

								<div class="table-responsive">
									<p class="text-danger">'.$msg.'</p>
								</div>
							</div>
						</div>
					</div>
					</div>';
return $html;
}
?>