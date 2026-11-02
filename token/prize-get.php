<?php
include 'config.php';

die();

if (!isset($_GET['wallet'])){
	header("Location: https://token.gemcave.org/");
	die();
}

$myWallet = clean($_GET['wallet']);
preg_match('/0x[a-fA-F0-9]{40}/', $myWallet, $matches);

if (!isset($matches[0])){
	header("Location: https://token.gemcave.org/");
	die();
}

$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

$allPrizeResult = $connection->query("SELECT * FROM prizes WHERE wallet='".$myWallet."'");

$row = $allPrizeResult->fetch_object();

$build = array();
$build['contact'] = $row->contact;

foreach ($allPrizes as $aPrize => $aPrizeRow){
	if (isset($row->$aPrize)){
		$numWon = $row->$aPrize / $aPrizeRow['creditstowin'];
		$leftTowin = $aPrizeRow['creditstowin'] - ($row->$aPrize % $aPrizeRow['creditstowin']);
		$numRemain = $aPrizeRow['creditstowin'] - $leftTowin;
		$percToWin = $numRemain / $aPrizeRow['creditstowin'] * 100;
		$build[$aPrize] = array(intval($row->$aPrize), floor($numWon), $numRemain, $percToWin, $leftTowin);
	}
}

if ($allPrizeResult->num_rows > 0){
	print json_encode(array('status' => "true", 'message' => $build));
} else {
	print json_encode(array('status' => "false"));
}

?>