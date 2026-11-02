<?php
	// Contract info
	$contractID = '0x0000000000000000000000000000000000000000';
	$pancakeLink = 'https://exchange.pancakeswap.finance/#/swap?outputCurrency='.$contractID;
	$pooLink = 'https://poocoin.app/tokens/'.$contractID;
	$bscLink = 'https://bscscan.com/token/'.$contractID;
	$telegramLink = 'https://t.me/GemCaveOfficial';
	$twitterLink = 'https://twitter.com/cave_gem';
	$facebookLink = 'https://www.facebook.com/profile.php?id=100074612658561';
	$instagramLink = 'https://instagram.com/gemcavetoken/';
	$discordLink = 'https://discord.gg/ztBAGDHPJz';
	$dexLink = 'https://www.dextools.io/app/bsc/pair-explorer/';
	$gitHubLink = 'https://github.com/CryptoStarTech/GemCaveToken';
	$redditLink = 'https://www.reddit.com/r/GemCaveToken/';

	$mintCost = '100 million';
	$totalSupply = '10,000';
	$gemsDug = '0';
	$gemsToDig = '40,000';

	$nftID = '0x0000000000000000000000000000000000000000';
	$svgArray = array();
	$idArray = array();
	$numToGet = 1500;
	$numToGetFrom = 1250;

	$url = "https://bsc-dataseed.binance.org/";
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$headers = array(
		"Content-Type: application/json",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	function hexToStr($hex) {
		if (strlen($hex) % 2 != 0) {
			throw new Exception('String length must be an even number.', 1);
		}
		$string = '';
		for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
			$string .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $string;
	}


	$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
		"from":"0x0000000000000000000000000000000000000000",
		"data":"0x18160ddd0000000000000000000000000000000000000000000000000000000000000000",
		"to":"'.$nftID.'"},
		"latest"]}';
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$resp = json_decode(curl_exec($curl));
	$gemsDug = hexdec($resp->result);
	$gemsToDig = 5000 - intval($gemsDug);

	curl_close($curl);


	for ($x = ($gemsDug - 10); $x <= $gemsDug; $x++) {

		$hex = dechex($x);
		$hex = str_pad($hex, 4, "0", STR_PAD_LEFT);

		$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
			"from":"0x0000000000000000000000000000000000000000",
			"data":"0x9bac5f7a000000000000000000000000000000000000000000000000000000000000'.$hex.'",
			"to":"'.$nftID.'"},
			"latest"]}';
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$resp = json_decode(curl_exec($curl));
		if (property_exists($resp,'result')) {
			$theSVG = hexToStr(substr($resp->result, 130));
			$svgArray[] = $theSVG; 
			$idArray[] = $x;   
		} else {
			break;
		}
	}

	$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
		"from":"0x0000000000000000000000000000000000000000",
		"data":"0x18160ddd0000000000000000000000000000000000000000000000000000000000000000",
		"to":"'.$nftID.'"},
		"latest"]}';
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$resp = json_decode(curl_exec($curl));
	$gemsDug = hexdec($resp->result);

	$gemsToDig = 40000 - intval($gemsDug);

	curl_close($curl);
?>


<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave NFT Minter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/style.css?cb=1647647321816">
	</head>
	<body id="gallery">

		<?php
		$svgArray = array_reverse($svgArray);
		$idArray = array_reverse($idArray);
		$cdown = count($svgArray);
		foreach ($svgArray as $svgItem => $svgCode) {
			$cdown--;
		?>
		<div class="catalog-item">
			<a href="https://nft.gemcave.org/view.php?id=<?= $idArray[$svgItem] ?>" target="_blank">
				<?= $svgCode ?>
			</a>
		</div>
		<?php 
		}
		?>
		<div class="catalog-item more"><a href="https://www.element.market/collections/gemcave-dig-nft?search%5Bsort%5D%5BsortAscending%5D=false&search%5Bsort%5D%5BsortBy%5D=RecentlyCreated" target="_blank">View all minted gems</a></div>

	</body>
</html>

