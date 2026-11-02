<?php

die();



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





$mintCost = '200 billion';
$contractID = '0x0000000000000000000000000000000000000000';
$svgArray = array();
$numToGet = 30;

$url = "https://bsc-testnet-dataseed.bnbchain.org/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
	"Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


for ($x = 1; $x <= $numToGet; $x++) {

	$hex = dechex($x);
	$hex = str_pad($hex, 4, "0", STR_PAD_LEFT);

	$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
		"from":"0x0000000000000000000000000000000000000000",
		"data":"0x9bac5f7a000000000000000000000000000000000000000000000000000000000000'.$hex.'",
		"to":"'.$contractID.'"},
		"latest"]}';
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$resp = json_decode(curl_exec($curl));
	$theSVG = hexToStr(substr($resp->result, 130));

	print '<h1>'.$x.'</h1><br>';
	print_r($theSVG);
	print '<hr>';
	//$svgArray[$x] = substr($theSVG, strpos($theSVG, "<svg"));    
}
die();
curl_close($curl);
?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GemCave Dig</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://nft.gemcave.org/css/style.css?cb=1647562933783">
	</head>

	<body>

		<main>
			<div id="catalog">
				<div class="container">
					<div class="catalog-list">
						<?php
						foreach ($svgArray as $svgItem) {
						?>
						<div class="catalog-item">
							<a href="" target="_blank">
								<?= $svgItem ?>
							</a>
						</div>
						<?php 
						}
						?>
						<div class="catalog-item more" id="btn-connect">...mint yours today!</div>
						<div class="catalog-item more" id="btn-mint">...mint yours today!</div>
					</div>
				</div>
			</div>


			<div id="about">

				<div class="container">
					<div>
						<span id="btn-connect" class="button">Mint (costs <?= $mintCost ?>  Tokens)</span>
					</div>
				</div>


			</div>


		</main>

		<footer>
			Copyright 
		</footer>
		
		<script src="https://nft.gemcave.org/js/vendor/jquery.js"></script>
		<script src="https://nft.gemcave.org/js/main.js?cb=1647562933783"></script>
		
		<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://nft.gemcave.org/js/web3modal.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>

		<script type="text/javascript" src="https://nft.gemcave.org/js/web3.js?cb=1647562933783"></script>


		</script>
	</body>
</html>
