<?php 


require_once('includes\header.inc.php'); 

$content = '';

$getUserBySteamId = $database->getUserBySteamId($steam_id);
$isUserVouched = $getUserBySteamId['vouched'];

//show only if user is logged in and its not vouched
if ($steam->loggedIn() && !$isUserVouched) {
	$form = parseTemplate($templates['form'], array('action' => $settings['pages']['vouch_request'], 'method' => 'POST', 'btn_text' => 'VOUCH REQUEST'));
	$div = parseTemplate($templates['div'], array('class' => 'centered_div vouch_button', 'text' => $form));
	$content .= $div;
} else {
	//the user that can play in league
}



$body = body($content);
$footer = '';
render($body, $footer);
?>