<?php
include '../token/config.php';


function sendStakeTGMsg($walletId, $gemsAmount, $stakingProduct){    


	$buildMsg = urlencode('<b><u>🔐🔑 GEMS freshly staked! 🔑🔐</u></b>

<b>GEMS holder</b>: <pre>'.$walletId.'</pre>

<b>Staked</b>: <pre>'.$gemsAmount.' GEMS</pre>

<b>All these GEMS have been <u>locked</u> into the following product</b>: <pre>'.$stakingProduct.'</pre>');

	$inlineKB = urlencode('{
		"inline_keyboard": [[
			{
				"text": "Stake GEMS",
				"url": "https://stake.gemcave.org/"            
			}]
		]
	}');

	$telegramApiUrl = getTelegramApiUrl('sendphoto');
	if ($telegramApiUrl === false) {
		return;
	}

	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,$telegramApiUrl."?photo=https://stake.gemcave.org/dp.jpg&parse_mode=html&chat_id=-1001731677896&caption=".$buildMsg.'&reply_markup='.$inlineKB);
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'TGGEM');
	curl_exec($curl_handle);
	curl_close($curl_handle);
}



$walletId 		= clean($_GET['w']);
$gemsAmount 	= clean($_GET['a']);
$stakingProduct = clean($_GET['p']);

$gemsAmount = substr($gemsAmount, 0, -9);

if (!is_numeric($gemsAmount) || !is_numeric($stakingProduct)) {
	return false; die();
}

if ($stakingProduct == '1'){
	$stakingProduct = '<b>1 Week Lock Stake</b> 15% APY Reward';
}
if ($stakingProduct == '2'){
	$stakingProduct = '<b>2 Week Lock Stake</b> 30% APY Reward';
}
if ($stakingProduct == '3'){
	$stakingProduct = '<b>4 Week Lock Stake</b> 40% APY Reward';
}
if ($stakingProduct == '4'){
	$stakingProduct = '<b>4 Week Lock Stake</b> 50% APY 🔥 BURN 🔥 Reward';
}
sendStakeTGMsg($walletId, $gemsAmount, $stakingProduct);

?>