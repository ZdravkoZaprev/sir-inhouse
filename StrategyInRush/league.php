<?php 


require_once('includes\header.inc.php'); 

$content = '';

$getUserBySteamId = $database->getUserBySteamId($steam_id);
$isUserVouched = $getUserBySteamId['vouched'];
$getUserByVouchRequest = $database->getVouchRequestBySteamId($steam_id);

//show only if user is logged in and its not vouched and don't have vouch request
if($steam->loggedIn() && !$isUserVouched && !$getUserByVouchRequest) { 
	$form = parseTemplate($templates['form'], array('action' => $settings['pages']['vouch_request'], 'method' => 'POST', 'btn_text' => 'VOUCH REQUEST'));
	$div = parseTemplate($templates['div'], array('class' => 'centered_div vouch_button', 'text' => $form));
	$content .= $div;
} else {
	//user that can play in league
}



$body = body($content);
$footer = '';
render($body, $footer);
?>