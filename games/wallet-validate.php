<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *'); 


function clean($userInput) {
	$userInput= trim($userInput);
	$userInput= stripslashes($userInput);
	$userInput= htmlspecialchars($userInput);
	return $userInput;
}

if (!isset($_GET['address']) || !isset($_GET['rand']) || !isset($_GET['hash'])){
	header("Location: https://token.gemcave.org/?logIP");
	die();
}

$myWallet = clean($_GET['address']);
preg_match('/0x[a-fA-F0-9]{40}/', $myWallet, $matches);
if (!isset($matches[0])){
	header("Location: https://token.gemcave.org/?logIP");
	die();
}

if (!is_numeric($_GET['rand'])){
	header("Location: https://token.gemcave.org/?logIP");
	die();
}

$json = file_get_contents('https://token.gemcave.org/prize-get?wallet='.$_GET['address']);
$obj = json_decode($json);


//if (strtolower($myWallet) == personal_ecRecover($message, $_GET['hash'])) {
	print json_encode(array('status' => "true", 'row' => $obj));
//} else {
//	print json_encode(array('status' => "false"));
//}


?>