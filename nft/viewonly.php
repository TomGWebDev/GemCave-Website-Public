<?php

	$nftID = '0x0000000000000000000000000000000000000000';

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

	$hex = dechex($_GET['id']);
	$hex = str_pad($hex, 4, "0", STR_PAD_LEFT);

	$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
		"from":"0x0000000000000000000000000000000000000000",
		"data":"0x9bac5f7a000000000000000000000000000000000000000000000000000000000000'.$hex.'",
		"to":"'.$nftID.'"},
		"latest"]}';
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$resp = json_decode(curl_exec($curl));

	if (!$resp){
		header('Location: https://avatar.gemcave.org/viewonly.php?id='.$_GET['id']);
	}
	$theSVG = hexToStr(substr($resp->result, 130));
	$svgA = $theSVG;    

	curl_close($curl); ?>
	

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GemCave Avatar NFT</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://nft.gemcave.org/css/style.css?cb=1647562933783">
	</head>

	<body id="svgonly">
	<?= $svgA; ?>
	</body>
</html>