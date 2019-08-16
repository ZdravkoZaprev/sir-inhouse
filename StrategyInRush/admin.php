<?php 

require_once('includes\header.inc.php'); 

$steam_id = !empty($steam->steamid) ? $steam->steamid : '';

//access denied if its not admin
if (!in_array($steam_id, $settings['admins_steam_ids'])) {
    die("<div style='margin: 30px auto; text-align: center;'>Sry pich, ma nqmash dostup :(</div'>");
}


//check if its clicked accept or decline button for vouch
if (isset($_GET['accept'])) {

	if ($_GET['accept'] == '1') { //accept user vouch request

	} else if($_GET['accept'] == '2') { //decline user vouch request

	}


	//TODO: SET TIMER after database request
}





$content = '';

//$username, it's time to give justice
$welcome_text = parseTemplate($templates['div'], array('class' => 'centered_div admin_welcome_text', 'text' => "Welcome in admin panel "));
$content .= $welcome_text;


$allVouchRequests = $database->getAllVouchRequests();


//display table if we have vouch request. if not display msg
if (!empty($allVouchRequests)) {
	$tableData = '';

	//table titles
	$th1 = parseTemplate($templates['th'], array('colspan' => '1', 'data' => 'Steam Id'));
	$th2 = parseTemplate($templates['th'], array('colspan' => '1', 'data' => 'Username'));
	$th3 = parseTemplate($templates['th'], array('colspan' => '1', 'data' => 'Dotabuff'));
	$th4 = parseTemplate($templates['th'], array('colspan' => '1', 'data' => 'Steam profile'));
	$th5 = parseTemplate($templates['th'], array('colspan' => '2', 'data' => 'VOUCH'));
	$allTableTitles = $th1 . $th2 . $th3 . $th4 . $th5;
	$tableTitleRow = parseTemplate($templates['tr'], array('data' => $allTableTitles));

	$tableData .= $tableTitleRow;

	//table data
	foreach ($allVouchRequests as $key => $value) {
		$tdSteamId = parseTemplate($templates['td'], array('data' => $key));
		$tdUsername = parseTemplate($templates['td'], array('data' => $value));

		$dotabuffLink = parseTemplate($templates['a_new_window'], array('class' => 'dotabuffLink', 
				'href' => $settings['dotabuffUrl'] . $key, 'text' => 'DOTABUFF'));
		$steamProfileLink = parseTemplate($templates['a_new_window'], array('class' => 'steamLink', 
				'href' => $settings['steamProfileUrl'] . $key, 'text' => 'STEAM PROFILE'));

		$tdDotabuff = parseTemplate($templates['td'], array('data' => $dotabuffLink));
		$tdSteamProfile = parseTemplate($templates['td'], array('data' => $steamProfileLink));

		$vouchAcceptLink = parseTemplate($templates['a'], array('class' => 'acceptVouch', 
			'href' => $settings['pages']['admin'] . "?accept=1&steamId=$key", 'text' => 'YES'));
		$vouchDeclineLink = parseTemplate($templates['a'], array('class' => 'declineVouch', 
			'href' => $settings['pages']['admin'] . "?accept=2&steamId=$key", 'text' => 'NO'));

		$vouchAccept = parseTemplate($templates['td'], array('data' => $vouchAcceptLink));
		$vouchDecline = parseTemplate($templates['td'], array('data' => $vouchDeclineLink));
		$tableTD = $tdSteamId . $tdUsername . $tdDotabuff . $tdSteamProfile . $vouchAccept . $vouchDecline;

		$tableRow = parseTemplate($templates['tr'], array('data' =>  $tableTD));
		$tableData .= $tableRow;
	}

	$table = parseTemplate($templates['table'], array('class' => 'vouch_requests_table', 'data' => $tableData));

	$content .= $table;
} else {
	$content .= parseTemplate($templates['div'], array('class' => 'centered_div', 'text' => "We don't have vouch requests"));
}


$body = body($content);
$footer = '';
render($body, $footer);
?>