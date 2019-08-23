<?php 

// TODO: prevent CSRF ATTACK

require_once('includes\header.inc.php'); 

$getUserByVouchRequest = $database->getVouchRequestBySteamId($steam_id);

//check if user already requested vouch
if (!empty($getUserByVouchRequest)) {
	header('Location: ' . $settings['pages']['league']);
	die();
}

//create vouch request
if (!empty($_POST['submit'])) {
	$createVouchRequest = $database->createVouchRequest($steam_id, $username);

	header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}

?>