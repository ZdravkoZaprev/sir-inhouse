<?php 

// TODO: prevent CSRF ATTACK

require_once('includes\header.inc.php'); 

$getUserByVouchRequest = $database->getVouchRequestBySteamId($steam_id);

//check if user already requested vouch
if (!empty($getUserByVouchRequest)) {
	// user already reqeuested vouch
	//redirect back to league and die
	//
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}

//create vouch request
if (!empty($_POST['submit'])) {
	$createVouchRequest = $database->createVouchRequest($steam_id, $username);
	//redirect and die
}

?>