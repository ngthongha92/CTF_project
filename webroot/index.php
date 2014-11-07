<?php
require_once('../config/config.inc.php');
$challenge = new Challenge();
$array = $BASE_ARRAY;
$array['title']="CTF DHKH Capture the Flag";

$loginpage = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
$loginpage = str_replace("index", "login", $loginpage);

if(isset($_SESSION[Challenge::PLAYER])) {
	$array['ranking'] = $challenge->getRank();
	$array['login']= '<a class="white" href="'.$loginpage.'?action=logout">Logout</a>';
} else {
	$array['login'] = '<a class="white" href="'.$loginpage.'">Login</a>';
}
$challenge->header($array) ?>
<?php $challenge->buildChallenges(); ?>


<?php CTF::footer(); ?>