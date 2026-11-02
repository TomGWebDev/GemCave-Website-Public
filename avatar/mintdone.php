<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../token/config.php';

function sendMintTGMsg($walletId, $tokenId){    


	$buildMsg = urlencode('<b><u>🖼️ Avatar NFT Minted! 🖼️</u></b>

<b>GEMS holder</b>: <pre>'.$walletId.'</pre>

Just minted an GemCave Avatar NFT 100% on the blockchain, using GemCave NFT technology and <b>burnt 🔥🔥 7,500,000,000 GEMS 🔥🔥</b> in the process!
');

	$inlineKB = urlencode('{
		"inline_keyboard": [[
			{
				"text": "Buy this NFT",
				"url": "https://element.market/assets/bsc/0x0000000000000000000000000000000000000000/'.$tokenId.'" 
			},
			{
				"text": "Mint your Avatar NFT now!",
				"url": "https://avatar.gemcave.org/"            
			}
		]]
	}');
	$telegramApiUrl = getTelegramApiUrl('sendphoto');
	if ($telegramApiUrl === false) {
		return;
	}

	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,$telegramApiUrl."?photo=http://trading-cards.uk/bot/".$tokenId.".png&parse_mode=html&chat_id=-1001731677896&caption=".$buildMsg.'&reply_markup='.$inlineKB);
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'TGGEM');
	curl_exec($curl_handle);
	curl_close($curl_handle);
}

$walletId 		= clean($_GET['w']);
$avatarId 		= clean($_GET['id']);

if (!is_numeric($avatarId)) {
	return false; die();
}

sendMintTGMsg($walletId, $avatarId);

?>