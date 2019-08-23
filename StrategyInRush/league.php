<?php 


require_once('includes\header.inc.php'); 

$content = '';

$getUserBySteamId = $database->getUserBySteamId($steam_id);
$isUserVouched = $getUserBySteamId['vouched'];
$getUserByVouchRequest = $database->getVouchRequestBySteamId($steam_id);

//show only if user is logged in and its not vouched and don't have vouch request
if($steam->loggedIn() && !$isUserVouched && !$getUserByVouchRequest) {
	$input = parseTemplate($templates['input'], array('type' => 'submit', 'name' => 'submit', 'value' => 'VOUCH REQUEST'));
	$form = parseTemplate($templates['form'], array('class' => '', 'action' => $settings['pages']['vouch_request'], 'method' => 'POST', 'data' => $input));
	$div = parseTemplate($templates['div'], array('class' => 'centered_div vouch_button', 'data' => $form));
	$content .= $div;
} else {
	//user that can play in league
}



$body = body($content);
$footer = '';
render($body, $footer);
?>