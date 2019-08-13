<?php 

require_once('includes\header.inc.php'); 




if(!$steam->loggedIn()) {
    echo "<div style='margin: 30px auto; text-align: center;'>Welcome Guest! <a href='";
    echo $steam->loginUrl();
    echo "'>Please log in!</a></div>";
}




$steam->debug();



?>