<?php 

require_once('includes\settings.inc.php');
require_once('classes\steamAuthentification.class.php');  
require_once('classes\database.class.php');  
require_once('includes\templates.php');
require_once('includes\functions.inc.php');


$steam = new steamAuthentification();

$steam_id = !empty($steam->steamid) ? $steam->steamid : '';
$username = !empty($steam->personaname) ? $steam->personaname : '';
$username = htmlentities($username);
// echo "steam id: $steam_id";

//create database connection
$database = new database();

//create user if not exist
$createUser = $database->createUser($steam_id, $username);
// var_dump($createUser);





?>