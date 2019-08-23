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
$welcome_text = parseTemplate($templates['div'], array('class' => 'centered_div admin_welcome_text', 'data' => "Welcome in admin panel "));
$content .= $welcome_text;


$allVouchRequests = $database->getAllVouchRequests();

//display table if we have vouch request. if not display msg
$content .= displayVouchRequests($allVouchRequests);


$body = body($content);
$footer = '';
render($body, $footer);
?>