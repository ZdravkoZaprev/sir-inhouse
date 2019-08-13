<?php 

require_once('includes\header.inc.php'); 

$steam_id = !empty($steam->steamid) ? $steam->steamid : '';

if (!in_array($steam_id, $settings['admins_steam_ids'])) {
    die("<div style='margin: 30px auto; text-align: center;'>Sry pich, ma nqmash dostup :(</div'>");
}

?>