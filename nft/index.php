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

	$mintCost = '1 billion';
	$totalSupply = '5000';

	$nftID = '0x0000000000000000000000000000000000000000';
	$svgArray = array();
	$numToGet = 55;
	$numToGetFrom = 35;

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

	$gemsDug = 5000;
	$gemsToDig = 0;

	curl_close($curl);
?>


<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave NFT Minter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/style.css?cb=1668705034317">

				<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/img/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/img/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="/img/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="/img/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="/img/favicon-128.png" sizes="128x128" />
		<meta name="msapplication-TileColor" content="#564db6" />
		<meta name="msapplication-TileImage" content="/img/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="/img/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="/img/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="/img/mstile-310x310.png" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

	</head>
	<body id="nft">
			<div id="topbar">
			<div class="container">

				<div id="google_translate_element"></div>
				<div class="langauges">
					<div data-lang="en" class="item tran-en">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><g fill="#29337a"><path d="M41.7 102.6a235.8 235.8 0 00-34 73.9h107.8l-73.8-73.9zM170.5 9.5a236 236 0 00-74.8 37.1l74.8 74.9V9.5zM101.3 431c20.8 14.6 44.2 25.9 69.2 33.2V361.7L101.3 431zM10.5 306.8a236 236 0 0035.2 69.8l69.8-69.8h-105z"/></g><g fill="#fff"><path d="M45.6 97.1l-3.9 5.5 73.8 73.9H7.8a237 237 0 00-4.4 20.2h141.8L45.6 97.1zM95.8 427l5.5 4 69.2-69.3v102.5c6.7 2 13.4 3.6 20.3 5V332l-95 95zM5.3 286.5c1.4 6.9 3.2 13.6 5.2 20.3h105l-69.8 69.8c7.6 10.4 16 20.1 25.1 29.1l119.3-119.2H5.3zM170.5 9.5v112L95.7 46.7c-10.3 7.6-20 16.1-28.9 25.4l124 124V4.4c-6.9 1.4-13.6 3-20.3 5z"/></g><g fill="#d32030"><path d="M170.5 306.1l-.7.7h.7zM190.1 286.5h.7v-.7zM281.2 196.7h-.7v.7zM171.2 176.5l-.7-.7v.7zM190.8 196v.7h.7z"/></g><g fill="#252f6c"><path d="M300.8 411.8v53c25.4-7 49-18.2 70.2-32.8l-57.5-57.6c-4.6 16.2-6.3 24.5-12.7 37.4zM313.8 108.5l62.8-62.8a236 236 0 00-75.8-36.9v54.6c7.4 14.7 8 26 13 45zM427 378a236.2 236.2 0 0036.2-71.2H355.8L427 378zM465.9 176.5a235.7 235.7 0 00-35-75.2l-75.1 75.2h110z"/></g><g fill="#e7e7e7"><path d="M327.6 290.5l16.3 16.3 78 77.9a250 250 0 005.1-6.7l-71.2-71.2h107.4c2-6.7 3.8-13.4 5.2-20.3H329.2c-.3 2.9-1.3 1.1-1.6 4zM311.4 120.3L382 49.7l-5.4-4-62.8 62.8c.7 2.5-3 9.3-2.4 11.8zM300.8 59V8.8c-6.6-1.8-13.4-3.4-20.3-4.7v24.5A131 131 0 01300.8 59zM326 196.7h144.2c-1.1-6.8-2.6-13.6-4.3-20.2H355.8l75.2-75.2a238 238 0 00-24.6-29.7l-84.7 84.7c2.3 15.3 3.3 24.2 4.3 40.4zM310 371l61 61c10.2-7 19.7-14.8 28.6-23.2l-80.1-80.2A411.5 411.5 0 01310 371zM280.5 442.3v27.3c7-1.3 13.7-2.9 20.3-4.7v-53.1c-6 12-12.7 22.3-20.3 30.5z"/></g><path fill="#d71f28" d="M321.7 156.3l84.7-84.7A236.8 236.8 0 00382 49.7l-66.6 66.6c3 12.4 4.3 26.5 6.3 40z"/><g fill="#d32030"><path d="M225 .3zM236.8 473.7zM236.8 473.7c15 0 29.6-1.5 43.7-4.1v-27.3c-12.4 13.5-27 31.4-43.7 31.4z"/></g><g fill="#d71f28"><path d="M470.2 196.7H328c1.9 29.7 1.7 60.3-.7 89.8h141.2a237.6 237.6 0 001.8-89.8zM327.6 290.5c-1.3 14-5.9 24.9-8.1 38.1l80.1 80.2a239 239 0 0022.2-24.1l-77.9-78-16.3-16.2z"/></g><path fill="#d32030" d="M280.5 30.3V4.1A238 238 0 00236.8 0c16.7 0 31.3 16.8 43.7 30.3z"/><g fill="#29337a"><path d="M300.8 422a255.1 255.1 0 0016.5-43.7l-16.5-16.5V422zM319.4 103c-5-19.2-11.2-36.5-18.6-51.3v69.8l18.6-18.6z"/></g><g fill="#fff"><path d="M332.2 295l.8-8.5h-9.4l8.6 8.6zM300.8 121.5V51.7a131 131 0 00-20.3-30.5v130l40.8-40.8-2-7.5-18.5 18.6zM281.2 196.7h52.5c-1-16.2-2.7-32-5-47.4l-47.5 47.4zM280.5 452.4c7.6-8.1 14.4-18.4 20.3-30.4v-60.3l16.5 16.5c3.8-13.2 7-27.4 9.6-42.2l-46.4-46.3v162.7z"/></g><path fill="#e51d35" d="M280.5 452.4V289.7l46.3 46.3c2.3-13.2 4.1-27 5.4-41l-8.6-8.5h9.4c2.3-29.5 2.5-60 .7-89.8h-52.5l47.5-47.4c-2-13.5-4.5-26.5-7.4-38.9l-40.8 40.8v-130A58.8 58.8 0 00236.8 0a244.2 244.2 0 00-46 4.5V196L66.8 72a239.1 239.1 0 00-21.2 25.1l79.3 79.4 20.3 20.2H3.4a238.6 238.6 0 001.9 89.8H190L70.8 405.7c7.9 7.7 16.2 14.8 25 21.4l95-95v137a238.6 238.6 0 0046 4.6c16.7 0 31.3-7.8 43.7-21.3z"/></svg>
					</div>
					<div data-lang="zh-CN" class="item tran-zh-CN">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#d62427"/><path fill="#dc3027" d="M0 236.8C0 106 106 0 236.8 0s130.8 473.7 0 473.7A236.8 236.8 0 010 236.8z"/><g fill="#f8d12e"><path d="M136.6 65.2l11.1 34h35.8l-29 21.1 11.1 34-29-21-28.9 21 11-34-28.9-21.1h35.8zM220.1 45.9l-3.5 11.9 10.3 7-12.5.4-3.4 11.9-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM220.1 152.8l-3.5 11.9 10.3 7-12.5.4L211 184l-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM250.4 78.4l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.4 9.9-7.7-4.2-11.7 10.3 7zM250.4 122l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.3 9.9-7.6-4.2-11.7 10.3 7z"/></g></svg>
					</div>
					<div data-lang="hi" class="item tran-hi">
						<svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BULINE"><circle cx="256" cy="256" fill="#27273d" r="256"/></g><g id="Icons"><path d="m496.14 167.12h-480.29c36.15-97.58 130.01-167.12 240.15-167.12s204 69.54 240.14 167.12z" fill="#e88032"/><path d="m496.14 344.87h-480.29a256.53 256.53 0 0 1 0-177.75h480.29a253 253 0 0 1 8.91 29.41 257.31 257.31 0 0 1 -8.91 148.34z" fill="#fff"/><path d="m256 512a256.09 256.09 0 0 1 -240.15-167.13h480.29a252.21 252.21 0 0 1 -13.05 29.41 256 256 0 0 1 -227.09 137.72z" fill="#00b564"/><path d="m289.5 2.17c-95.38 12.47-174.24 77.43-206.65 165h-67c36.15-97.63 130.01-167.17 240.15-167.17a259.05 259.05 0 0 1 33.5 2.17z" fill="#d8712b"/><path d="m67 256a255.41 255.41 0 0 0 15.85 88.87h-67a256.53 256.53 0 0 1 0-177.75h67a252.91 252.91 0 0 0 -8.85 29.41 256.16 256.16 0 0 0 -7 59.47z" fill="#e2e2e2"/><path d="m289.5 509.83a258.82 258.82 0 0 1 -33.5 2.17 256.09 256.09 0 0 1 -240.15-167.13h67a256.15 256.15 0 0 0 206.65 165z" fill="#049b53"/><circle cx="408.07" cy="96.45" fill="#ef9050" r="16.28"/><circle cx="384.09" cy="72.47" fill="#ef9050" r="11.53"/><circle cx="256" cy="256" fill="#3e436d" r="79.86"/><path d="m318.86 249.5-3.73-.83c0-.3-.07-.6-.11-.89l3.38-1.78a2.82 2.82 0 0 0 1.43-3.24l-1.93-7.22a2.84 2.84 0 0 0 -2.86-2.1l-3.81.16c-.11-.28-.22-.56-.34-.84l2.8-2.57a2.82 2.82 0 0 0 .54-3.5l-3.74-6.48a2.82 2.82 0 0 0 -3.3-1.28l-3.64 1.14c-.18-.24-.37-.47-.55-.7l2.05-3.23a2.84 2.84 0 0 0 -.39-3.53l-5.28-5.28a2.84 2.84 0 0 0 -3.53-.39l-3.23 2.06-.7-.55 1.14-3.64a2.82 2.82 0 0 0 -1.28-3.3l-6.48-3.74a2.82 2.82 0 0 0 -3.5.54l-2.57 2.8-.84-.34.16-3.81a2.84 2.84 0 0 0 -2.1-2.86l-7.22-1.93a2.82 2.82 0 0 0 -3.23 1.43l-1.78 3.4-.89-.11-.83-3.73a2.82 2.82 0 0 0 -2.76-2.22h-7.48a2.82 2.82 0 0 0 -2.76 2.22l-.83 3.73-.89.11-1.78-3.4a2.82 2.82 0 0 0 -3.24-1.43l-7.22 1.93a2.84 2.84 0 0 0 -2.1 2.86l.16 3.81-.84.34-2.57-2.8a2.82 2.82 0 0 0 -3.5-.54l-6.48 3.74a2.82 2.82 0 0 0 -1.28 3.3l1.14 3.64-.7.55-3.22-2a2.84 2.84 0 0 0 -3.53.39l-5.28 5.28a2.84 2.84 0 0 0 -.39 3.53l2.05 3.23c-.18.23-.37.46-.55.7l-3.64-1.14a2.82 2.82 0 0 0 -3.3 1.28l-3.74 6.48a2.82 2.82 0 0 0 .54 3.5l2.8 2.57c-.12.28-.23.56-.34.84l-3.81-.16a2.84 2.84 0 0 0 -2.86 2.1l-1.93 7.22a2.82 2.82 0 0 0 1.43 3.18l3.38 1.77c0 .29-.07.59-.11.89l-3.73.83a2.82 2.82 0 0 0 -2.22 2.76v7.48a2.82 2.82 0 0 0 2.22 2.76l3.73.83c0 .3.07.6.11.89l-3.38 1.79a2.82 2.82 0 0 0 -1.43 3.24l1.93 7.22a2.84 2.84 0 0 0 2.86 2.1l3.81-.16c.11.28.22.56.34.84l-2.8 2.57a2.82 2.82 0 0 0 -.54 3.5l3.74 6.48a2.82 2.82 0 0 0 3.3 1.28l3.64-1.14c.18.24.37.47.55.7l-2 3.22a2.84 2.84 0 0 0 .39 3.53l5.28 5.28a2.84 2.84 0 0 0 3.53.39l3.23-2.05.7.55-1.14 3.64a2.82 2.82 0 0 0 1.28 3.3l6.48 3.74a2.82 2.82 0 0 0 3.5-.54l2.57-2.8.84.34-.16 3.81a2.84 2.84 0 0 0 2.1 2.86l7.22 1.93a2.82 2.82 0 0 0 3.18-1.43l1.77-3.38.89.11.83 3.73a2.82 2.82 0 0 0 2.76 2.22h7.48a2.82 2.82 0 0 0 2.76-2.22l.83-3.73.89-.11 1.79 3.38a2.82 2.82 0 0 0 3.24 1.43l7.22-1.93a2.84 2.84 0 0 0 2.1-2.86l-.16-3.81.84-.34 2.57 2.8a2.82 2.82 0 0 0 3.5.54l6.48-3.74a2.82 2.82 0 0 0 1.28-3.3l-1.14-3.64.7-.55 3.23 2.05a2.84 2.84 0 0 0 3.53-.39l5.28-5.28a2.84 2.84 0 0 0 .39-3.53l-2.06-3.23c.18-.23.37-.46.55-.7l3.64 1.14a2.82 2.82 0 0 0 3.3-1.28l3.74-6.48a2.82 2.82 0 0 0 -.54-3.5l-2.8-2.57c.12-.28.23-.56.34-.84l3.81.16a2.84 2.84 0 0 0 2.86-2.1l1.93-7.22a2.82 2.82 0 0 0 -1.43-3.23l-3.4-1.78c0-.29.07-.59.11-.89l3.73-.83a2.82 2.82 0 0 0 2.22-2.76v-7.48a2.82 2.82 0 0 0 -2.2-2.76z" fill="#fff"/><g fill="#3e436d"><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"/><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"/><path d="m239 256.7h-34.29a1.39 1.39 0 1 1 0-2.78h34.37a17.87 17.87 0 0 0 -.08 2.08z"/><path d="m240.56 263.25-31.63 12.75a1.45 1.45 0 0 1 -.51.1 1.39 1.39 0 0 1 -.52-2.68l31.7-12.76a17.42 17.42 0 0 0 .96 2.59z"/><path d="m207.77 235.84a1.41 1.41 0 0 1 1.81-.77l31.5 12.69a16.06 16.06 0 0 0 -1.15 2.53l-31.38-12.64a1.4 1.4 0 0 1 -.78-1.81z"/><path d="m244.84 268.89-24.38 24.36a1.39 1.39 0 0 1 -1 .42 1.4 1.4 0 0 1 -1-2.38l24.39-24.39a16.65 16.65 0 0 0 1.99 1.99z"/><path d="m219 220.21a1.37 1.37 0 0 1 0-2 1.39 1.39 0 0 1 1.95 0l24.42 24.42a17.36 17.36 0 0 0 -2 1.9z"/><path d="m248.13 271.12a14.67 14.67 0 0 0 2.55 1.08l-12.56 31.18a1.41 1.41 0 0 1 -1.3.87 1.65 1.65 0 0 1 -.52-.1 1.41 1.41 0 0 1 -.76-1.82z"/><path d="m236.19 208.22a1.38 1.38 0 1 1 2.56-1l13 32.29a15.6 15.6 0 0 0 -2.62.91z"/><path d="m256 239c-.47 0-.93 0-1.38.05v-34.34a1.38 1.38 0 1 1 2.76 0v34.29c-.45 0-.91 0-1.38 0z"/><path d="m256 273.05c.47 0 .93 0 1.38-.05v34.29a1.38 1.38 0 1 1 -2.76 0v-34.29c.45 0 .91.05 1.38.05z"/><path d="m263.4 240.63a17.57 17.57 0 0 0 -2.59-1l13.07-32.44a1.39 1.39 0 1 1 2.58 1z"/><path d="m277.1 302.33a1.39 1.39 0 0 1 -.77 1.82 1.5 1.5 0 0 1 -.52.1 1.39 1.39 0 0 1 -1.28-.87l-12.64-31.38a15.89 15.89 0 0 0 2.51-1.16z"/><path d="m266.91 242.89 24.14-24.14a1.38 1.38 0 0 1 1.95 2l-24.12 24.13a16.5 16.5 0 0 0 -1.97-1.99z"/><path d="m293.5 290.8a1.39 1.39 0 0 1 -2 2l-24.11-24.11a17.36 17.36 0 0 0 1.9-2z"/><path d="m271 248 32-12.91a1.39 1.39 0 0 1 1 2.58l-32 12.88a14.8 14.8 0 0 0 -1-2.55z"/><path d="m305.51 275.23a1.41 1.41 0 0 1 -1.28.87 1.66 1.66 0 0 1 -.53-.1l-32.16-13a18 18 0 0 0 .93-2.61l32.28 13a1.4 1.4 0 0 1 .76 1.84z"/><path d="m308.69 255.3a1.4 1.4 0 0 1 -1.4 1.4h-34.29c0-.23 0-.47 0-.7a17.87 17.87 0 0 0 -.13-2.08h34.37a1.39 1.39 0 0 1 1.45 1.38z"/></g></g></svg>
					</div>
					<div data-lang="id" class="item tran-id"> 
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><path fill="#bb2029" d="M324.8 236.8h148.9C473.7 106 367.7 0 236.8 0c65.4 0 88 118.4 88 236.8z"/><path fill="#cd2029" d="M0 236.8h335C335 118.4 302.1 0 236.7 0A236.8 236.8 0 000 236.8z"/><path fill="#e4e4e4" d="M319.8 236.8c0 118.5-17.6 236.9-83 236.9 130.8 0 236.9-106 236.9-236.9h-154z"/><path fill="#f3f4f5" d="M335 236.8H0c0 130.8 106 236.9 236.8 236.9 65.4 0 98.1-118.4 98.1-236.9z"/></svg>
					</div>
					<div data-lang="ru" class="item tran-ru">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#fff"/><path fill="#2b479d" d="M460.1 157.9H314.2c6.4 50.6 6.4 106.3.1 157h146.2a236.3 236.3 0 00-.4-157z"/><path fill="#efecec" d="M314.2 157.9h146l-.1-.2A237 237 0 00258 1c36.3 19.8 46.9 82.8 56.1 156.9z"/><path fill="#e63026" d="M258.1 472.7a237 237 0 00202.1-157.2l.3-.6H314.3c-9.2 74.4-19.8 137.8-56.2 157.8z"/><path fill="#3757a6" d="M0 236.8c0 27.4 4.7 53.6 13.2 78h313.3a654.9 654.9 0 000-157h-313a236.4 236.4 0 00-13.5 79z"/><path fill="#efefef" d="M13.6 157.7v.2h312.8c-9.3-74.1-32-137-68.3-157A236.9 236.9 0 0013.6 157.7z"/><path fill="#e73b36" d="M326.5 314.9H13.2l.2.6a236.9 236.9 0 00244.7 157.2c36.4-20 59.2-83.4 68.4-157.8z"/></svg>
					</div>
					<div data-lang="tr" class="item tran-tr">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#d80027"/><g fill="#f0f0f0"><path d="m245.52 209.19 21 28.94 34.02-11.03-21.04 28.92 21 28.94-34-11.07-21.04 28.92.02-35.76-34-11.07 34.02-11.03z"/><path d="M188.2 328.35a72.35 72.35 0 1 1 34.4-136 89.04 89.04 0 1 0 0 127.3 72 72 0 0 1-34.4 8.7z"/></g></svg>
					</div>
					<div data-lang="tl" class="item tran-tl">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" style="fill:#f0f0f0"/><path d="M256 0v256L75 437a256 256 0 0 0 437-181C512 114.6 256 0 256 0z" style="fill:#d80027"/><path d="M256 0A255.2 255.2 0 0 0 75 75l181 181h256A256 256 0 0 0 256 0z" style="fill:#0052b4"/><path d="M175.3 256 144 241.3l16.7-30.3-34 6.5-4.3-34.3-23.6 25.2-23.7-25.2-4.3 34.3-33.9-6.5 16.6 30.3L22.3 256l31.2 14.7L36.9 301l33.9-6.5 4.3 34.3 23.7-25.2 23.6 25.2 4.3-34.3 34 6.5-16.7-30.3zM68.3 100.2l10.4 14.5 17-5.4-10.6 14.4 10.4 14.5-17-5.6L67.9 147l.2-17.9-17-5.6 17-5.4zM68.3 365l10.4 14.6 17-5.4-10.6 14.3 10.4 14.6-17-5.7-10.6 14.4.2-17.9-17-5.6 17-5.4zM216.7 232.6l-10.4 14.5-17.1-5.4 10.6 14.4-10.4 14.6 17-5.7 10.6 14.4-.1-17.9 16.9-5.6-17-5.4z" style="fill:#ffda44"/></svg>
					</div>
					<div data-lang="es" class="item tran-es">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M0 256c0 31.3 5.6 61.3 16 89l240 22.3L496 345a255.5 255.5 0 0 0 0-178l-240-22.3L16 167a255.5 255.5 0 0 0-16 89z" style="fill:#ffda44"/><path d="M496 167a256 256 0 0 0-480 0h480zM16 345a256 256 0 0 0 480 0H16z" style="fill:#d80027"/></svg>
					</div>

				</div>

				<div class="buttons">
					<a href="https://token.gemcave.org/" target="_blank">💎 GemCave Token</a>
					<a href="https://gemcave.org/" target="_blank">🔎 GemCave Gem Finder</a>
				</div>
                
				<div class="links">
					<a href="<?= $pancakeLink ?>" target="_blank" title="GemCave on PancakeSwap">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"/><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"/><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"/></svg>
					</a>
					<a href="<?= $pooLink ?>" target="_blank" title="GemCave on PooCoin">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/></svg>                  
					</a>
					<a href="<?= $telegramLink ?>" target="_blank" title="GemCave on Telegram">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"/></svg>
					</a>
					<a href="<?= $bscLink ?>" target="_blank" title="GemCave on BSC Scan">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.7 486.7"><defs/><path d="M33 362.4v78.9c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V302.5l-44.3 44.3A53.7 53.7 0 0133 362.4zM142 301.5v139.8c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V359a53.2 53.2 0 01-36.7-15.6l-41.9-42zM251 350.3v91c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8v-168l-69.9 70c-2.7 2.7-5.6 5-8.7 7zM432.7 170.2L360 242.9v198.4c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V175.7l-4.6-4.2-1.3-1.3z"/><path d="M482.6 41.4c-2.9-3.1-7.3-4.7-12.9-4.7h-1.6l-85.1 4c-3.8.2-9 .4-13.1 4.5a14.9 14.9 0 00-3.1 4.6c-4.2 9 1.7 15 4.5 17.8l7.1 7.2 14.9 14.9-171.6 171.7-77.1-77.1a24.5 24.5 0 00-34.7 0L7.2 286.9a24.5 24.5 0 000 34.7l4.6 4.6a24.5 24.5 0 0034.7 0l80.7-80.7 77.1 77a24.5 24.5 0 0034.8 0L432.7 129l21.9 21.8c2.6 2.6 6.2 6.2 11.7 6.2 2.3 0 4.6-.6 7-2a19 19 0 004.2-3c4.3-4.3 5.1-9.8 5.3-14.1l2.6-55.3 1.3-27.7c.3-5.8-1-10.3-4.1-13.5z"/></svg>
					</a>
					<a href="<?= $dexLink ?>" target="_blank" title="GemCave on DexTools">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" data-testid="" fill="#5a5a5a" font-size="40"><path d="M20.245 0L9.634 6.125l3.901 2.262 6.71-3.862 6.71 3.862 3.902-2.262L20.245 0zM26.956 11.586l3.9 2.263v4.526l-6.71 3.862v7.724l-3.9 2.263-3.902-2.263v-7.724l-6.71-3.862v-4.526l3.901-2.263 6.71 3.863 6.71-3.863z"></path><path d="M30.857 21.573V26.1l-3.901 2.262v-4.525l3.9-2.263z"></path><path d="M26.916 31.56l6.71-3.862v-7.724l3.902-2.263v12.25l-10.611 6.125V31.56zM33.627 12.25l-3.902-2.263 3.902-2.263 3.9 2.263v4.525l-3.9 2.263V12.25zM16.344 37.724V33.2l3.901 2.263 3.902-2.263v4.525l-3.902 2.263-3.9-2.263zM13.535 28.361L9.634 26.1v-4.526l3.901 2.263v4.525zM20.245 12.25l-3.9-2.263 3.9-2.263 3.902 2.263-3.902 2.263zM10.765 9.987l-3.9 2.263v4.525l-3.902-2.263V9.987l3.901-2.263 3.901 2.263z"></path><path d="M2.963 17.711l3.901 2.263v7.724l6.71 3.862v4.526L2.963 29.96V17.71z"></path></svg>
					</a>
					<a href="<?= $twitterLink ?>" target="_blank" title="GemCave on Twitter">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"/></svg>
					</a>
					<a href="<?= $instagramLink; ?>" target="_blank" title="GemCave on Instagram">
						<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"/></svg>
					</a>
					<a href="<?= $redditLink; ?>" target="_blank" title="GemCave on Reddit">                                    
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="m11.1 7.82.75-3.54a2 2 0 0 1 2.38-1.54l3.2.68A2 2 0 1 1 17 5.38l-3.2-.68-.67 3.13c1.79.14 3.56.73 5.17 1.7a3.2 3.2 0 0 1 4.74 2.67v.02a3.2 3.2 0 0 1-1.2 2.55 2.85 2.85 0 0 1-.02.13c0 4-4.45 7.03-9.8 7.03-5.33 0-9.7-3.03-9.7-6.96a5.31 5.31 0 0 1-.01-.18 3.2 3.2 0 0 1 3.45-5.35 11.45 11.45 0 0 1 5.33-1.62zm9.29 5.52c.4-.2.66-.62.66-1.07a1.2 1.2 0 0 0-2.02-.81l-.58.56-.67-.45a9.81 9.81 0 0 0-5.23-1.77h-1a9.5 9.5 0 0 0-5.25 1.68l-.66.45-.58-.55a1.2 1.2 0 1 0-1.32 1.95l.64.29-.06.7v.58c0 2.7 3.36 5.03 7.71 5.03 4.38 0 7.8-2.34 7.8-5.1a3.31 3.31 0 0 0 0-.52l-.05-.67.6-.3zM7 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm7 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm-1.98 5.1c-1.4 0-2.77-.37-3.89-1.2a.42.42 0 0 1 .6-.6c.95.69 2.12.99 3.27.99s2.33-.28 3.28-.96a.44.44 0 0 1 .74.2.47.47 0 0 1-.12.43c-.69.8-2.49 1.14-3.88 1.14z"/></svg>
					</a>
					<a href="<?= $discordLink; ?>" target="_blank" title="GemCave on Discord">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"><path d="m11.5 13.5-.33.38c.1.08.22.12.35.12l-.02-.5Zm-1.07-1.71a.5.5 0 0 0-.78.62l.78-.62Zm.4-.41-.17-.47h-.02l.2.47Zm-1.74.51-.08-.49.08.5Zm-3.1 0-.1.48.1-.49Zm-1.76-.52-.18.46.18-.46Zm-.88-.41-.28.41.04.03.24-.44Zm-.1-.06.27-.42a.5.5 0 0 0-.05-.03l-.23.45Zm-.05-.04.35-.35a.5.5 0 0 0-.11-.08l-.24.43Zm2.15 1.52a.5.5 0 0 0-.78-.62l.78.62ZM3.5 13.5l-.02.5a.5.5 0 0 0 .35-.13l-.33-.37Zm-3-2.25H0a.5.5 0 0 0 0 .08l.5-.08Zm1.73-8.5-.3-.4a.5.5 0 0 0-.17.23l.47.18ZM5.59 1.5l.5-.05A.5.5 0 0 0 5.61 1l-.02.5Zm-.37 1.3a.5.5 0 0 0 1-.09l-1 .1Zm3.52-.06a.5.5 0 0 0 1 .13l-1-.13Zm.67-1.24L9.39 1a.5.5 0 0 0-.48.44l.5.06Zm3.36 1.26.47-.18a.5.5 0 0 0-.17-.22l-.3.4Zm1.73 8.49.5.08a.5.5 0 0 0 0-.08h-.5ZM6.48 8.8h-.5.5Zm5.02 4.7.33-.38a.8.8 0 0 1-.05-.04 21.35 21.35 0 0 1-1.35-1.3l-.78.63a9.8 9.8 0 0 0 1.34 1.31 29.3 29.3 0 0 0 .17.15h.01l.33-.37Zm.44-3.25c-.46.3-.9.52-1.28.66l.35.94c.45-.17.95-.42 1.48-.76l-.55-.84Zm-1.3.67c-.57.24-1.1.4-1.63.48l.17.99c.6-.1 1.21-.29 1.85-.55l-.4-.92ZM9 11.4a7.9 7.9 0 0 1-2.92-.01l-.18.98a8.9 8.9 0 0 0 3.29.02L9 11.4Zm-2.92 0c-.64-.13-1.2-.32-1.67-.5l-.36.93c.5.2 1.13.4 1.84.54l.2-.98Zm-1.67-.5c-.26-.1-.54-.22-.81-.38l-.5.88c.33.18.66.32.95.43l.36-.93Zm-.78-.36-.1-.06c-.03 0-.02 0 0 0l-.56.83.1.07c.03 0 .02 0 0 0l.56-.84Zm-.16-.09.06.04.02.02-.7.7c.02.03.07.09.17.14l.45-.9Zm-.03-.02a4.7 4.7 0 0 1-.28-.17l-.01-.01-.29.4-.29.42h.01l.03.02a3.9 3.9 0 0 0 .34.21l.49-.87Zm1.13 1.33a9.8 9.8 0 0 1-1.23 1.21l-.12.11-.04.04h-.01l.33.38.33.37h.01l.04-.04a38.04 38.04 0 0 0 .56-.5c.31-.3.7-.68.91-.95l-.78-.62ZM3.52 13c-1.17-.04-1.78-.52-2.11-.96a2.4 2.4 0 0 1-.42-.88l-.49.09-.5.08a1.37 1.37 0 0 0 .03.13l.1.3a3 3 0 0 0 .48.88c.5.67 1.4 1.31 2.87 1.36l.04-1ZM1 11.25c0-1.87.42-3.94.85-5.57a35.45 35.45 0 0 1 .84-2.74l-.46-.18-.47-.18v.02a9.4 9.4 0 0 0-.28.79c-.16.5-.38 1.2-.6 2.04A24.05 24.05 0 0 0 0 11.25h1Zm1.53-8.1A5.94 5.94 0 0 1 5.58 2l.01-.5.01-.5a.85.85 0 0 0-.1 0c-.05 0-.13 0-.24.02a6.94 6.94 0 0 0-3.34 1.34l.6.8Zm2.57-1.6.12 1.26 1-.1-.13-1.26-1 .1Zm4.63 1.32.17-1.3-.99-.13-.17 1.3 1 .13ZM9.41 1.5V2a.5.5 0 0 1 .05 0l.18.01c.16.02.4.05.68.12a5.9 5.9 0 0 1 2.15 1.03l.6-.8A6.94 6.94 0 0 0 9.5 1a2.53 2.53 0 0 0-.1 0v.5Zm3.36 1.26-.46.17v.01l.01.04a16.07 16.07 0 0 1 .25.72c.16.48.37 1.17.58 1.98.43 1.63.85 3.7.85 5.57h1c0-2-.44-4.17-.88-5.82a36.51 36.51 0 0 0-.86-2.79l-.01-.04v-.01l-.48.17Zm1.73 8.49-.5-.08v.05a2.4 2.4 0 0 1-.4.82c-.34.44-.95.92-2.12.96l.04 1a3.56 3.56 0 0 0 2.87-1.36 3.4 3.4 0 0 0 .6-1.3v-.01l-.49-.08ZM5.26 6.97c-1 0-1.72.87-1.72 1.83h1c0-.5.35-.83.72-.83v-1ZM3.54 8.8c0 .97.73 1.83 1.72 1.83v-1c-.36 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.72-.87 1.72-1.83h-1c0 .5-.36.83-.72.83v1Zm1.72-1.82a1.77 1.77 0 0 0-1.72-1.84v1c.37 0 .73.34.72.82l1 .02Zm2.65-1.84c-1 0-1.72.87-1.72 1.83h1c0-.5.36-.83.72-.83v-1ZM7.91 8.8c0 .97.74 1.83 1.72 1.83v-1c-.35 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.73-.87 1.73-1.83h-1c0 .5-.36.83-.73.83v1Zm1.73-1.83c0-.96-.73-1.83-1.73-1.83v1c.37 0 .73.33.73.83h1ZM3.74 4.44A7.83 7.83 0 0 1 7.5 3.28c1.15 0 2.32.37 3.76 1.16l.48-.88A8.74 8.74 0 0 0 7.5 2.28a8.8 8.8 0 0 0-4.24 1.28l.48.88Z"/></svg>
					</a>
					<a href="<?= $gitHubLink; ?>" target="_blank" title="GemCave on GitHub">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 .396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183.803.151 1.093-.344 1.093-.772 0-.38-.009-1.385-.015-2.719-4.453.964-5.391-2.151-5.391-2.151-.729-1.844-1.781-2.339-1.781-2.339-1.448-.989.115-.968.115-.968 1.604.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328.14-1.031.557-1.74 1.011-2.135-3.552-.401-7.287-1.776-7.287-7.907 0-1.751.62-3.177 1.645-4.297-.177-.401-.719-2.031.141-4.235 0 0 1.339-.427 4.4 1.641a15.436 15.436 0 0 1 4-.541c1.36.009 2.719.187 4 .541 3.043-2.068 4.381-1.641 4.381-1.641.859 2.204.317 3.833.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891.556.479 1.077 1.464 1.077 2.959 0 2.14-.02 3.864-.02 4.385 0 .416.28.916 1.104.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"/></svg>
					</a>
				</div>
			</div>
		</div>
		<header>
			<div class="container">
				<div class="logo-top">
					<a href="http://gemcave.org" target="_blank">
						<img src="http://gemcave.org/img/logos/dig.png">
					</a>
				</div>
				<div class="header-intro">
					<h1>GemCave DIG</h1>
					<h4>v0.9 BETA</h4>
					<h2>Lets go digging for gems! What will you find? A small chipped emerald or a huge perfect diamond?</h2>
					<p>Welcome to the first GemCave NFT - <strong>DIG</strong> - a collectible rare gem themed NFT collection that is the first to use the new on-chain GemCave NFT technology.</p>
							<svg id="mintcount" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 767.1 226.5">
					<defs>
						<path id="c1" d="M129.9 78.08h247.7v66.64H129.9z"/>

						<filter id="a1" width="1.5" height="1.5" x="-.25" y="-.25" style="color-interpolation-filters:sRGB"><feGaussianBlur result="result1" stdDeviation="4.886"/><feGaussianBlur in="result1" result="result6" stdDeviation="6.161"/><feComposite in="result6" in2="result1" operator="in" result="result8"/><feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/><feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" type="saturate" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0"/><feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation=".01"/><feSpecularLighting in="result0" lighting-color="#fff" result="result1" specularConstant="1.868" specularExponent="23.846" surfaceScale="-2.651"><feDistantLight azimuth="207" elevation="60"/></feSpecularLighting><feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/><feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/><feComposite in2="result4" result="result91"/><feBlend in2="result91" mode="multiply"/></filter>
						
						<filter id="b1" style="color-interpolation-filters:sRGB"><feTurbulence baseFrequency="0.05239520958083832 0.010479041916167664" numOctaves="5" seed="10" type="fractalNoise"/><feColorMatrix result="result5" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 0.7 0"/><feComposite in="SourceGraphic" in2="result5" operator="out"/><feMorphology operator="dilate" radius="3.144" result="result3"/><feTurbulence baseFrequency="0.08 0.05" numOctaves="8" result="result91" seed="25"/><feDisplacementMap in="result3" in2="result91" result="result4" scale="9.339" xChannelSelector="R" yChannelSelector="G"/><feSpecularLighting in="result4" lighting-color="#fff" result="result1" specularExponent="35" surfaceScale="2"><feDistantLight id="ligmov" azimuth="235" elevation="75"/></feSpecularLighting><feComposite in="result1" in2="result4" operator="in" result="result2"/><feComposite in="result4" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/><feBlend in2="result4" mode="multiply"/></filter>
						<animate 
							xlink:href="#ligmov"
							attributeName="azimuth"
							begin="0"
							values="535;1;535"
							dur="10s"
							repeatCount="indefinite"
							fill="freeze"
						/>
					</defs>
					<path d="M43.4 37.76h423.4L348.7 188.7H43.4c-3.2 0-5.92-2.6-5.92-5.8V43.56c0-3.2 2.72-5.8 5.92-5.8z" style="fill:#53e7d3;fill-opacity:1;stroke-width:.5077;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;paint-order:fill markers stroke"/><path d="M38.01 37.75H466.8L354 188.8H38.01c-3.1 0-5.83-2.6-5.83-5.8V43.61c0-3.21 2.73-5.86 5.83-5.86z" style="fill:#53e7d3;fill-opacity:1;stroke-width:.5077;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;paint-order:fill markers stroke;filter:url(#a1)"/><path d="M744.6 188.7H354L466.8 37.75h277.8c3.2 0 5.8 2.65 5.8 5.86V182.9c0 3.2-2.6 5.8-5.8 5.8z" style="fill:#000;stroke-width:.5077;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;paint-order:fill markers stroke;filter:url(#b1)"/><text xml:space="preserve" x="54.5" style="font-size:36px;line-height:1.25;font-family:sans-serif;white-space:pre;shape-inside:url(#c)" transform="translate(-454 -175.6) scale(2.568)"><tspan x="260" y="116.7"><tspan style="font-style:normal;font-variant:normal;font-weight:400;font-stretch:normal;font-family:'Ceviche One';-inkscape-font-specification:'Ceviche One';text-align:center;text-anchor:middle"><?= $gemsDug ?></tspan></tspan></text><text xml:space="preserve" x="54.5" style="font-size:36px;line-height:1.25;font-family:sans-serif;white-space:pre;shape-inside:url(#c1);fill:#fff;fill-opacity:1" transform="translate(-58.23 -177.1) scale(2.568)"><tspan x="255" y="116.7"><tspan style="font-style:normal;font-variant:normal;font-weight:400;font-stretch:normal;font-family:'Ceviche One';-inkscape-font-specification:'Ceviche One';text-align:center;text-anchor:middle;fill:#fff;fill-opacity:1"><?= $gemsToDig ?></tspan></tspan></text><text xml:space="preserve" x="54.5" style="font-size:1.8546px;line-height:1.25;font-family:sans-serif;white-space:pre;shape-inside:url(#c1)" transform="translate(-1827 -1001) scale(14.54)"><tspan x="135" y="79.77"><tspan style="font-style:normal;font-variant:normal;font-weight:400;font-stretch:normal;font-size:1.8546px;font-family:Arial;-inkscape-font-specification:Arial">Gems dug</tspan></tspan></text><text xml:space="preserve" x="54.5" style="font-size:1.8546px;line-height:1.25;font-family:sans-serif;white-space:pre;shape-inside:url(#c1)" transform="translate(-1296 -997.4) scale(14.54)"><tspan x="129.9" y="79.77"><tspan style="fill:#fff">Left to dig</tspan></tspan></text></svg>


				
				</div>
			</div>
		</header>

		<main>
			<div class="container">
				<div class="row">
					<div class="specsheet">
						<div class="info">
							<h2>Gem Attributes</h2>
							<p>When you mint your gem, the following attributes are selected randomly.</p>
						</div>
						<div class="speccies">
							<div class="specitem">
								<h2>Cut</h2>
								<div class="range">
									<span class="option" style="width:100%;">Trillion</span>
									<span class="option">Round</span>
									<span class="option">Radient</span>
									<span class="option" style="width:100%;">Heart</span>
									<span class="option">Marquise</span>
									<span class="option">Oval</span>
									<span class="option">Princess</span>
								</div>
							</div>
							<div class="specitem">
								<h2>Colour</h2>
								<div class="range">
									<span class="option">Ruby</span>
									<span class="option">Emerald</span>
									<span class="option">Sapphire</span>
									<span class="option">Topaz</span>
									<span class="option">Diamond</span>
									<span class="option">Amethyst</span>
									<span class="option">Zircon</span>
									<span class="option">Citrine</span>
									<span class="option">Heliodor</span>
									<span class="option max">Enchanted</span>
								</div>
							</div>
							<div class="specitem">
								<h2>Condition</h2>
								<div class="range">
									<span class="option">Chipped</span>
									<span class="option">Flawed</span>
									<span class="option">Flawless</span>
									<span class="option">Gilded</span>
									<span class="option max">Perfect</span>
								</div>
							</div>
							<div class="specitem">
								<h2>Weight</h2>
								<div class="range">
									<span class="option">100 ct</span>
									<span class="option">200 ct</span>
									<span class="option">300 ct</span>
									<span class="option">500 ct</span>
									<span class="option">1000 ct</span>
									<span class="option max">1540 carat</span>
								</div>
							</div>
						</div>
					</div>


					<div class="mint-box">
						<div class="info">
							<h2>Mint a gem</h2>
							<p><strong>COST: <?= $mintCost ?> GEMS</strong>. Ready to get digging? Make sure you own at least <?= $mintCost ?> GEMS or have a free NFT ticket.</p>
							<p>Click Connect Wallet, verify the connection with your wallet, then click Mint and approve the transaction to have a GemCave NFT minted and saved into your wallet.</p>
						</div>
					
					
					<div id="mynft">
						<div class="sellnfts"  style="margin:0;">
							<p style="margin:0 0 15px 0;">See it in the marketplace:</p>
							<div class="selllogos" style="margin:0;">
								<div>
									<a class="trade-1" href="https://tofunft.com/" target="_blank">
										<svg style="width:50px;height:50px;" viewBox="0 0 39 36"><path d="M20.4385 0.609736C19.5951 0.283242 18.7108 0.119995 17.7857 0.119995C16.8607 0.119995 15.9696 0.283242 15.1126 0.609736C14.2691 0.922626 13.5141 1.38516 12.8475 1.99733C12.4743 2.34009 12.1437 2.72549 11.8558 3.15353V0.426083H0V3.79305H4.01995V14.0368H7.83585V3.79305H11.474C11.3972 3.93858 11.3245 4.08822 11.2559 4.24198C10.875 5.12623 10.6845 6.13292 10.6845 7.26205C10.6845 8.39117 10.875 9.39786 11.2559 10.2821C11.6504 11.1664 12.1809 11.9146 12.8475 12.5268C13.5141 13.1389 14.2691 13.6083 15.1126 13.9348C15.9696 14.2477 16.8607 14.4041 17.7857 14.4041C18.7108 14.4041 19.5951 14.2477 20.4385 13.9348C21.2956 13.6083 22.0574 13.1389 22.724 12.5268C23.3906 11.9146 23.9143 11.1664 24.2952 10.2821C24.6897 9.39786 24.887 8.39117 24.887 7.26205C24.887 6.13292 24.6897 5.12623 24.2952 4.24198C23.9143 3.35772 23.3906 2.60951 22.724 1.99733C22.0574 1.38516 21.2956 0.922626 20.4385 0.609736ZM16.1533 4.16036C16.6294 3.84747 17.1736 3.69102 17.7857 3.69102C18.3979 3.69102 18.9421 3.84747 19.4182 4.16036C19.908 4.47325 20.2889 4.90177 20.5609 5.44592C20.833 5.97648 20.9691 6.58185 20.9691 7.26205C20.9691 7.94224 20.833 8.55442 20.5609 9.09857C20.2889 9.62913 19.908 10.0508 19.4182 10.3637C18.9421 10.6766 18.3979 10.8331 17.7857 10.8331C17.1736 10.8331 16.6294 10.6766 16.1533 10.3637C15.6771 10.0508 15.2962 9.62913 15.0105 9.09857C14.7385 8.55442 14.6024 7.94224 14.6024 7.26205C14.6024 6.58185 14.7385 5.97648 15.0105 5.44592C15.2962 4.90177 15.6771 4.47325 16.1533 4.16036Z" fill="#310155"></path><path d="M24.3564 23.0086V14.7034H20.5405V22.7433C20.5405 23.4507 20.3501 24.0289 19.9692 24.4778C19.5883 24.9131 18.9897 25.1376 18.1735 25.1512C17.3572 25.1648 16.7587 24.9471 16.3777 24.4982C15.9968 24.0357 15.8064 23.4507 15.8064 22.7433V14.7034H11.9905V23.0086C11.9905 24.1921 12.2694 25.2124 12.8271 26.0695C13.3849 26.9265 14.1331 27.5863 15.0718 28.0488C16.0104 28.4978 17.0443 28.7222 18.1735 28.7222C19.3162 28.7222 20.3501 28.4978 21.2752 28.0488C22.2138 27.5863 22.962 26.9265 23.5198 26.0695C24.0776 25.2124 24.3564 24.1921 24.3564 23.0086Z" fill="#310155"></path><path d="M9.99887 23.8044V20.4374H5.14228V18.1112H11.0192V14.7442H1.32638V28.4161H5.14228V23.8044H9.99887Z" fill="#310155"></path><path d="M33.2806 23.3949H29.9137V18.5383H25.3019V14.7224H38.9739V36.12H35.6069V32.1H25.3631V28.2841H35.6069V18.5383H33.2806V23.3949Z" fill="#310155"></path><path d="M25.3003 12.9131H38.9739V9.46434H31.9338L38.9739 1.77149V0.424699H25.3003V3.95478H31.8114L25.3003 11.5663V12.9131Z" fill="#310155"></path></svg>
									</a>
								</div>
								<div>
									<a class="trade-2" href="https://nftrade.com/" target="_blank">
										<svg style="width:180px;height:50px;" style="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 421.46 62.34"><defs><style>.cls-1{fill:#1c2147;}.cls-2{fill:#1571fa;}.cls-3{fill:#93c5fe;}</style></defs><path class="cls-1" d="M51.39,0V61.44H40.17L13.44,22.77H13V61.44H0V0H11.4L37.92,38.64h.54V0Z"/><path class="cls-1" d="M58.72,61.44V0H99.39V10.71H71.71V25.35h25V36.06h-25V61.44Z"/><path class="cls-1" d="M105.78,10.71V0h50.46V10.71H137.43V61.44H124.59V10.71Z"/><path class="cls-1" d="M159.54,61.44V15.36h12.39v8h.48a12,12,0,0,1,4.23-6.5,11.17,11.17,0,0,1,6.84-2.2,19.33,19.33,0,0,1,2.07.12,14.58,14.58,0,0,1,1.95.33V26.49A16.7,16.7,0,0,0,185,26a22.37,22.37,0,0,0-2.91-.21,10.26,10.26,0,0,0-5,1.21,9,9,0,0,0-3.48,3.38,9.61,9.61,0,0,0-1.27,5V61.44Z"/><path class="cls-1" d="M205.52,62.31a19,19,0,0,1-7.86-1.55,12.44,12.44,0,0,1-5.45-4.59,13.58,13.58,0,0,1-2-7.6,13.43,13.43,0,0,1,1.41-6.45,11.42,11.42,0,0,1,3.84-4.2,18.57,18.57,0,0,1,5.53-2.4,41.74,41.74,0,0,1,6.53-1.14q4-.42,6.48-.8a9.06,9.06,0,0,0,3.56-1.12,2.51,2.51,0,0,0,1.11-2.22v-.18a5.54,5.54,0,0,0-1.78-4.41,7.43,7.43,0,0,0-5.05-1.56,9,9,0,0,0-5.49,1.51,7.12,7.12,0,0,0-2.7,3.8l-11.82-1a16.18,16.18,0,0,1,3.54-7.28,17.15,17.15,0,0,1,6.82-4.74,26.16,26.16,0,0,1,9.71-1.66,29.62,29.62,0,0,1,7.36.9,19.42,19.42,0,0,1,6.27,2.79,13.62,13.62,0,0,1,4.33,4.84,14.73,14.73,0,0,1,1.59,7.07V61.44H219.34V55.05H219a12.79,12.79,0,0,1-3,3.79,13.49,13.49,0,0,1-4.47,2.55A18.2,18.2,0,0,1,205.52,62.31Zm3.66-8.82a10.66,10.66,0,0,0,5-1.13,8.67,8.67,0,0,0,3.38-3A7.89,7.89,0,0,0,218.77,45V40.08a6.5,6.5,0,0,1-1.63.7c-.69.21-1.47.4-2.33.57s-1.71.32-2.57.45l-2.34.35A15.81,15.81,0,0,0,206,43.2a6.33,6.33,0,0,0-2.61,1.93,4.83,4.83,0,0,0-.93,3,4.57,4.57,0,0,0,1.9,4A8.13,8.13,0,0,0,209.18,53.49Z"/><path class="cls-1" d="M255,62.18a17.23,17.23,0,0,1-9.49-2.71,18.48,18.48,0,0,1-6.72-8,30.58,30.58,0,0,1-2.48-13,30.2,30.2,0,0,1,2.55-13.19,18.38,18.38,0,0,1,6.8-7.89A17.35,17.35,0,0,1,255,14.76a14.34,14.34,0,0,1,6.47,1.3,12.87,12.87,0,0,1,4.2,3.24,16.93,16.93,0,0,1,2.44,3.8h.39V0h12.75V61.44h-12.6V54.06h-.54a16.37,16.37,0,0,1-2.53,3.79A12.78,12.78,0,0,1,261.31,61,14.69,14.69,0,0,1,255,62.18ZM259,52a8.2,8.2,0,0,0,5.24-1.7,10.68,10.68,0,0,0,3.3-4.75,20.27,20.27,0,0,0,1.15-7.17,20.26,20.26,0,0,0-1.14-7.14,10.25,10.25,0,0,0-3.3-4.68A8.39,8.39,0,0,0,259,24.93a8.29,8.29,0,0,0-5.31,1.71,10.46,10.46,0,0,0-3.27,4.74,20.36,20.36,0,0,0-1.11,7,20.56,20.56,0,0,0,1.13,7.09,10.7,10.7,0,0,0,3.27,4.8A8.17,8.17,0,0,0,259,52Z"/><path class="cls-1" d="M311,62.34a24.45,24.45,0,0,1-12.23-2.9,19.57,19.57,0,0,1-7.87-8.22,27.06,27.06,0,0,1-2.76-12.61,26.94,26.94,0,0,1,2.76-12.48,20.36,20.36,0,0,1,7.78-8.37,22.61,22.61,0,0,1,11.81-3,24.36,24.36,0,0,1,8.5,1.45,19.18,19.18,0,0,1,6.9,4.37,19.87,19.87,0,0,1,4.61,7.3,29.21,29.21,0,0,1,1.65,10.28v3.51H293.23V33.75h26.88a9.79,9.79,0,0,0-1.2-4.89,8.76,8.76,0,0,0-3.32-3.35,9.65,9.65,0,0,0-4.9-1.21,9.85,9.85,0,0,0-5.15,1.33,9.56,9.56,0,0,0-3.49,3.57,10.19,10.19,0,0,0-1.29,5V41.7A12.82,12.82,0,0,0,302,47.61a9.14,9.14,0,0,0,3.62,3.84,10.92,10.92,0,0,0,5.55,1.35,12.09,12.09,0,0,0,3.9-.6,8.09,8.09,0,0,0,3-1.8,7.83,7.83,0,0,0,1.92-2.94l11.82.78a16.1,16.1,0,0,1-3.68,7.42,18.46,18.46,0,0,1-7.14,4.92A26.8,26.8,0,0,1,311,62.34Z"/><path class="cls-2" d="M421.39,61.05,397.07,18.93a.57.57,0,0,0-1,0L371.77,61.05a.56.56,0,0,0,.72.79l23.86-10.47a.53.53,0,0,1,.46,0l23.86,10.47A.56.56,0,0,0,421.39,61.05Z"/><path class="cls-3" d="M395.72,1.22,371.4,43.34a.57.57,0,0,1-1,0L346.11,1.22a.56.56,0,0,1,.71-.8L370.69,10.9a.51.51,0,0,0,.45,0L395,.42A.57.57,0,0,1,395.72,1.22Z"/></svg>
									</a>
								</div>
								<div>
									<a class="trade-3" href="https://www.element.market/" target="_blank">
										<svg style="width:180px;height:50px;" style="" viewBox="0 0 125 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M52.541 8h-2.473v14h2.473V8zM77.727 21.66h-2.472v-6.467c0-1.328-1.09-2.408-2.429-2.408-1.34 0-2.429 1.08-2.429 2.408v6.467h-2.473v-6.467c0-2.68 2.199-4.859 4.901-4.859 2.703 0 4.902 2.18 4.902 4.859v6.467z" fill="#101419"/><path d="M84.803 21.66H82.33v-6.467c0-1.328-1.09-2.408-2.429-2.408-1.339 0-2.428 1.08-2.428 2.408v6.467H75v-6.467c0-2.68 2.2-4.859 4.901-4.859 2.704 0 4.902 2.18 4.902 4.859v6.467zM111.11 21.846h-2.473v-6.14c0-1.61-1.322-2.92-2.947-2.92s-2.948 1.31-2.948 2.92v6.14h-2.472v-6.14c0-2.962 2.431-5.372 5.42-5.372s5.42 2.41 5.42 5.373v6.139zM120.64 10.666h-6.22v2.451h6.22v-2.451z" fill="#101419"/><path d="M117.776 21.93c-2.595 0-4.706-2.092-4.706-4.665V8h2.473v9.265a2.226 2.226 0 0 0 2.233 2.214 2.227 2.227 0 0 0 2.234-2.213h2.472c0 2.572-2.111 4.664-4.706 4.664zM65.903 17.043h-9.77V15h9.41l.36 1v1.043z" fill="#101419"/><path d="M62.58 18.307a3.29 3.29 0 0 1-2.37.997c-1.813 0-3.288-1.462-3.288-3.26 0-1.797 1.475-3.259 3.288-3.259 1.813 0 3.288 1.462 3.288 3.26h2.473c0-3.15-2.585-5.711-5.761-5.711s-5.76 2.562-5.76 5.71c0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447H62.58zM48.382 17.043h-9.77V15h9.41l.36 1v1.043z" fill="#101419"/><path d="M45.058 18.307a3.29 3.29 0 0 1-2.37.997c-1.813 0-3.288-1.462-3.288-3.26 0-1.797 1.475-3.259 3.288-3.259 1.814 0 3.288 1.462 3.288 3.26h2.473c0-3.15-2.584-5.711-5.76-5.711-3.177 0-5.761 2.562-5.761 5.71 0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447h-2.917zM98.503 17.043h-9.689V15h9.41l.279 1.02v1.023z" fill="#101419"/><path d="M94.921 18.307a3.29 3.29 0 0 1-2.37.997c-1.812 0-3.287-1.462-3.287-3.26 0-1.797 1.475-3.259 3.288-3.259 1.813 0 3.288 1.462 3.288 3.26h2.472c0-3.15-2.584-5.711-5.76-5.711-3.177 0-5.761 2.562-5.761 5.71 0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447h-2.916z" fill="#101419"/><g clip-path="url(#az)"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.582 18.382V9.027l6.174-3.284v9.205l-6.174 3.434z" fill="url(#b)"/><path fill-rule="evenodd" clip-rule="evenodd" d="m16.62 21.723.066 7.903-.221.123-8.309-4.565v-3.461h8.464z" fill="url(#c)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M20.582 22.827v4.639l-4.117 2.283v-6.922h4.117z" fill="url(#d)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12.424 16.01h.003l-.155 4.64 2.117 1.174-8.293 4.611-.122-.07-.033-9.135 8.464-4.77v2.378l-1.981 1.171z" fill="url(#ezz)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.098 17.225 0 13.843V9.206l6.26 3.319-.162 4.701z" fill="url(#f)"/><path fill-rule="evenodd" clip-rule="evenodd" d="m28.815 16.052-8.233 4.415v4.788l8.233-4.565v-4.638z" fill="url(#g)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M1.982 14.875 6.1 17.232v9.205L1.982 24.08v-9.205z" fill="#29F6A8"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12.271 20.65v-4.638l.058-.036 8.251 4.494v4.789l-8.308-4.609z" fill="url(#h)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M8.312 13.728 0 9.205l8.312-4.523v9.046z" fill="url(#i)"/><path fill-rule="evenodd" clip-rule="evenodd" d="m28.816 16.052-8.233 4.565-8.311-4.61 2.137-1.19-.017.01 2.074 1.15 4.077-2.268.04-2.224 8.233 4.567z" fill="url(#j)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.406 12.61h.001l-.1.055-4.082-2.225-2.07 1.206V2.283l.273-.152 8.19 4.718-.055 9.12-.1.085-2.073-1.226.016-2.217z" fill="url(#k)"/><path fill="url(#l)" d="M11.348 5.57h16.729v14.065H11.348z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.465 16.025V6.848l-.09-.05 4.167-2.254.038.02v9.172l-4.115 2.289z" fill="url(#m)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.41 12.61 6.098 17.23l-4.116-2.356 8.245-4.585 4.182 2.32z" fill="url(#n)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M20.582 9.177V4.565l2.059-1.177 4.117 2.356-6.176 3.433z" fill="url(#o)"/><path fill-rule="evenodd" clip-rule="evenodd" d="m8.156 2.283 8.309 4.565 4.117-2.283L12.272 0 8.156 2.283z" fill="#76FF0B"/></g><defs><linearGradient id="b" x1="23.476" y1="7.084" x2="23.842" y2="17.237" gradientUnits="userSpaceOnUse"><stop stop-color="#00B368"/><stop offset="1" stop-color="#004A4D"/></linearGradient><linearGradient id="c" x1="8.156" y1="25.736" x2="16.687" y2="25.736" gradientUnits="userSpaceOnUse"><stop stop-color="#0ECD59"/><stop offset="1" stop-color="#16DE3E"/></linearGradient><linearGradient id="d" x1="18.523" y1="22.241" x2="18.523" y2="29.452" gradientUnits="userSpaceOnUse"><stop stop-color="#003A4A"/><stop offset="1" stop-color="#007649"/></linearGradient><linearGradient id="ezz" x1="16.808" y1="18.579" x2="9.207" y2="19.659" gradientUnits="userSpaceOnUse"><stop stop-color="#00AE85"/><stop offset=".994" stop-color="#007258"/></linearGradient><linearGradient id="f" x1="3.091" y1="10.859" x2="3.182" y2="16.646" gradientUnits="userSpaceOnUse"><stop stop-color="#12C951"/><stop offset="1" stop-color="#009256"/></linearGradient><linearGradient id="g" x1="20.581" y1="20.655" x2="28.814" y2="20.655" gradientUnits="userSpaceOnUse"><stop stop-color="#005255"/><stop offset="1" stop-color="#008147"/></linearGradient><linearGradient id="h" x1="17.114" y1="17.115" x2="16.114" y2="22.598" gradientUnits="userSpaceOnUse"><stop stop-color="#44E28D"/><stop offset="1" stop-color="#10E2AA"/></linearGradient><linearGradient id="i" x1="0" y1="9.204" x2="8.311" y2="9.204" gradientUnits="userSpaceOnUse"><stop stop-color="#91FF3C"/><stop offset="1" stop-color="#64F562"/></linearGradient><linearGradient id="j" x1="12.27" y1="16.053" x2="28.815" y2="16.053" gradientUnits="userSpaceOnUse"><stop stop-color="#91FF3C"/><stop offset="1" stop-color="#0DE2AC"/></linearGradient><linearGradient id="k" x1="12.336" y1="4.479" x2="12.429" y2="13.735" gradientUnits="userSpaceOnUse"><stop stop-color="#03E168"/><stop offset="1" stop-color="#05C35E"/></linearGradient><linearGradient id="m" x1="16.758" y1="6.459" x2="19.549" y2="12.959" gradientUnits="userSpaceOnUse"><stop stop-color="#00837B"/><stop offset="1" stop-color="#03824D"/></linearGradient><linearGradient id="n" x1="4.101" y1="16.126" x2="11.71" y2="11.379" gradientUnits="userSpaceOnUse"><stop stop-color="#91FF3C"/><stop offset="1" stop-color="#52F171"/></linearGradient><linearGradient id="o" x1="20.438" y1="7.574" x2="24.264" y2="4.504" gradientUnits="userSpaceOnUse"><stop stop-color="#11E2AA"/><stop offset=".638" stop-color="#8DFE40"/></linearGradient><clipPath id="az"><path fill="#fff" d="M0 0h28.929v30H0z"/></clipPath><pattern id="l" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#p"/></pattern><image id="p" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGwAAABeCAYAAADG1PFrAAAACXBIWXMAAAsSAAALEgHS3X78AAAA"/></defs></svg>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="button-box">

						<div id="errorbuy">
							<strong>You do not hold enough GemCave Tokens to mint an NFT</strong><br> Buy some GemCave tokens to start digging and minting!<br>
							<a href="https://token.gemcave.org/" target="_blank">Buy GEMS here!</a>
						</div>
							<svg id="mainbutton" version="1.1" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMax slice">
								<defs>
									<filter id="buttc" x="-.25" y="-.25" width="1.5" height="1.5" style="color-interpolation-filters:sRGB">
										<feGaussianBlur result="result1" stdDeviation="4.885731432858214"/>
										<feGaussianBlur in="result1" result="result6" stdDeviation="6.1609227306826702"/>
										<feComposite in="result6" in2="result1" operator="in" result="result8"/>
										<feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/>
										<feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" type="saturate" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0 "/>
										<feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="0.01"/>
										<feSpecularLighting lighting-color="#ffffff" in="result0" result="result1" specularConstant="1.867816091954023" specularExponent="23.845545977011497" surfaceScale="-2.6508620689655169">
											<feDistantLight azimuth="207" elevation="60"/>
										</feSpecularLighting>
										<feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/>
										<feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
										<feBlend in2="result91" mode="multiply"/>
									</filter>
									<filter id="butte" style="color-interpolation-filters:sRGB">
										<feTurbulence baseFrequency="0.05239520958083832 0.010479041916167664" numOctaves="5" seed="10" type="fractalNoise"/>
										<feColorMatrix result="result5" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 0.7 0 "/>
										<feComposite in="SourceGraphic" in2="result5" operator="out"/>
										<feMorphology operator="dilate" id="butters" radius="7" result="result3"/>
										<feTurbulence baseFrequency="0.08 0.05" numOctaves="8" result="result91" seed="25"/>
										<feDisplacementMap in="result3" in2="result91" result="result4"  scale="7" xChannelSelector="R" yChannelSelector="G"/>
										<feSpecularLighting lighting-color="#ffffff" in="result4" result="result1" specularExponent="35" surfaceScale="2">
											<feDistantLight azimuth="235" elevation="75"/>
										</feSpecularLighting>
										<feComposite in="result1" in2="result4" operator="in" result="result2"/>
										<feComposite in="result4" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
										<feBlend in2="result4" mode="multiply"/>
									</filter>

									<filter id="buttb" x="-.25" y="-.25" width="1.5" height="1.5" style="color-interpolation-filters:sRGB">
										<feGaussianBlur result="result1" stdDeviation="4.885731432858214"/>
										<feGaussianBlur in="result1" result="result6" stdDeviation="6.1609227306826702"/>
										<feComposite in="result6" in2="result1" operator="in" result="result8"/>
										<feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/>
										<feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" type="saturate" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0 "/>
										<feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="0.01"/>
										<feSpecularLighting lighting-color="#ffffff" in="result0" result="result1" specularConstant="1.8678" specularExponent="23.8455" surfaceScale="-2.6509">
											<feDistantLight azimuth="207" elevation="60"/>
										</feSpecularLighting>
										<feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/>
										<feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
										<feComposite in2="result4" result="result91"/>
										<feBlend in2="result91" mode="multiply"/>
									</filter>
									
									<filter id="butta" y="-.2" width="1.3" height="1.5" style="color-interpolation-filters:sRGB">
										<feGaussianBlur result="result1" stdDeviation="1.907"/>
										<feGaussianBlur in="result1" result="result6" stdDeviation="1.8750361010830325"/>
										<feComposite in="result6" in2="result1" operator="in" result="result8"/>
										<feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/>
										<feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" type="saturate" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0 "/>
										<feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="0.55146209386281586"/>
										<feSpecularLighting lighting-color="#ffffff" in="result0" result="result1" specularConstant="1.8678" specularExponent="23.8455" surfaceScale="-2.6509">
											<feDistantLight azimuth="207" elevation="60"/>
										</feSpecularLighting>
										<feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/>
										<feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
										<feComposite in2="result4" result="result91"/>
										<feBlend in2="result91" mode="multiply"/>
									</filter>
									<filter id="buttd" style="color-interpolation-filters:sRGB">
										<feTurbulence baseFrequency="0.050094517958412098 0.010479041916167664" numOctaves="5" seed="10" type="fractalNoise"/>
										<feColorMatrix result="result5" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 0.7 0 "/>
										<feComposite in="SourceGraphic" in2="result5" operator="out" result="result6"/>
										<feDisplacementMap in="result6" in2="result5" result="result4" scale="7.5403949730700175" xChannelSelector="R" yChannelSelector="G"/>
										<feSpecularLighting lighting-color="#ffffff" in="result4" result="result1" specularExponent="35" surfaceScale="2">
											<feDistantLight azimuth="235" elevation="75"/>
										</feSpecularLighting>
										<feComposite in="result1" in2="result4" operator="in" result="result2"/>
										<feComposite in="result4" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
										<feBlend in2="result4" mode="multiply"/>
									</filter>
								</defs>
								<g id="button-connect" transform="scale(1)" transform-origin="bottom">
									<rect x="38.63" rx="10" ry="10" y="314.3" width="427.1" height="163.2" style="fill:#53e7d3;paint-order:fill markers stroke;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;stroke-width:.688"/>
									<text x="252.8" y="357.1" style="filter:url(#buttd);font-family:sans-serif;font-size:67.35px;line-height:1.25;stroke-width:.4209" xml:space="preserve"><tspan x="252.8" y="357.1" dy="35.24" style="font-family:Kanit;font-weight:900;stroke-width:.4209;text-align:center;text-anchor:middle">SOLD</tspan><tspan x="253.2" y="444.8" style="font-family:Kanit;font-weight:900;letter-spacing:.7921px;stroke-width:.4209;text-align:center;text-anchor:middle">OUT</tspan></text>
									<rect x="38.63" rx="10" ry="10" y="314.3" width="427.1" height="163.2" style="fill:#53e7d3;filter:url(#buttc);paint-order:fill markers stroke;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;stroke-width:.688"/>

									<animateTransform
										id="buttonsmall" attributeName="transform"
										type="scale" from="1 1"
										to="0 0" begin="indefinite"
										dur="1s" fill="freeze"
										repeatCount="1"
									/>
								</g>
								<g class="btn-gem" transform="scale(0)" transform-origin="bottom">
									<g transform="translate(-74.37,2.704)">
										<path d="m249 309c-3.8 0-7.4-1.6-9.8-4.6l-115-141c-3.5-4.3-3.8-10.4-0.8-15.1l41.1-62.9c2.3-3.57 6.3-5.72 10.5-5.72h148c4.2 0 8.2 2.15 10.5 5.72l41.1 62.9c3.1 4.7 2.7 10.8-0.8 15.1l-115 141c-2.4 3-6 4.6-9.7 4.6z" style="fill:#37c4b3"/>
										<path d="m279 157h97c0.1-2.7-0.5-5.5-2.1-7.9l-41.1-62.9c-1.2-1.87-2.9-3.33-4.8-4.32z" style="fill:#53e7d3"/>
										<path d="m169 81.8c-1.9 0.99-3.6 2.45-4.8 4.32l-41.1 62.88c-1.6 2.4-2.2 5.2-2 7.9h96.9z" style="fill:#53e7d3"/>
										<polygon transform="translate(-49.7,80.4)" points="248 76.5 298 229 348 76.5" style="fill:#53e7d3"/>
										<polygon transform="translate(-49.7,80.4)" points="348 76.5 298 0 248 76.5" style="fill:#b9f5ed"/>
										<path d="m157 164c-3.6-4.3-3.9-10.4-0.8-15.1l41.1-62.9c2.3-3.57 6.2-5.72 10.5-5.72h-33.6c-4.2 0-8.2 2.15-10.5 5.72l-41.1 62.9c-3.1 4.7-2.7 10.8 0.8 15.1l115 141c2.4 3-81.5-141-81.5-141z" style="enable-background:new;opacity:.1"/>
										<path transform="matrix(.975 0 0 .975 -42.3 83.2)" d="m218 1.41h160l47.9 75.1-128 153-128-153z" style="fill:#fff;filter:url(#buttb);mix-blend-mode:overlay"/>
									</g>
									<animateTransform
										id="gemgo"
										attributeName="transform"
										type="scale"
										from="0 0"
										to="1 1"
										begin="indefinite"
										dur="600ms"
										fill="freeze"
										repeatCount="1"
									/>
								</g>
								<g id="btn-pickaxe" transform="scale(0)" transform-origin="bottom">
									<path d="m262.6 342.6-18.2-9.1c-2.9-1.2-4-4.5-2.6-7.4l134.1-271c1.3-2.66 4.6-3.78 7.5-2.53l18.2 8.93c2.6 1.54 3.8 4.86 2.5 7.47l-134 271c-1.4 3-4.7 4.1-7.5 2.6z" style="fill:#a16125;stroke-width:.5507"/>
									<path d="m401.6 61.53-9.2-4.38-139 281 9.2 4.4c2.8 1.5 6.1 0.4 7.5-2.6l134-271c1.3-2.61 0.1-5.93-2.5-7.47z" style="fill:#5e3c16;stroke-width:.5507"/>
									<g transform="matrix(.5217 -.1764 .1764 .5217 157.6 82.1)">
										<path d="m335.3 203.5 51.5-51.5 123.5 163c2.5 3.4 2.2 8.2-0.8 11.2s-7.8 3.3-11.2 0.8z" style="fill:#e1e1e3"/>
										<path d="m308.5 176.7 51.5-51.5-163-123.5c-3.4-2.567-8.2-2.239-11.2 0.769s-3.3 7.774-0.8 11.16z" style="fill:#e1e1e3"/>
										<path d="m335.3 203.5 163 123.5c3.4 2.5 8.2 2.2 11.2-0.8l-148.4-148.5z" style="fill:#acacb2"/>
										<path d="m185.8 2.496c-3 3.008-3.3 7.774-0.8 11.16l123.5 163 25.8-25.8z" style="fill:#acacb2"/>
									</g>
									<path d="m369.6 146.3-34-16.9c-3-1.7-4.2-5.2-2.8-8.1l24.5-49.8c1.4-2.95 5.1-4.2 8-2.8l34.4 17c2.9 1.5 4.1 5.2 2.7 8.1l-24.5 49.6c-1.6 3.1-5.2 4.3-8.3 2.9z" style="fill:#797882;stroke-width:.5507"/>
									<path d="m399.7 85.7-17.1-8.4-30 60.3 17 8.7c3.1 1.4 6.7 0.2 8.3-2.9l24.5-49.6c1.4-2.9 0.2-6.6-2.7-8.1z" style="fill:#2d2e30;stroke-width:.5507"/>
									<rect transform="rotate(206.3)" x="-392.9" y="20.84" width="31.51" height="12.17" style="fill:#5e3c16;stroke-width:.5507"/>

									<animateTransform
										id="axego" attributeName="transform"
										type="scale" from="0 0"
										to="1 1" begin="indefinite"
										dur="600ms" fill="freeze"
										repeatCount="1" 
									/>
									<animateTransform
										id="axegorot" attributeName="transform"
										type="rotate" from="0" values="0;25;0"
										begin="indefinite" dur="1s" fill="freeze"
										repeatCount="indefinite" additive="sum"
									/>
								</g>
								<g id="button-mint" transform="scale(0)" transform-origin="bottom">
									<rect x="38.63" y="314.3" width="427.1" height="163.2" style="fill:#545454;filter:url(#butte);paint-order:fill markers stroke;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:.7631;stroke-width:.688"/>
									<text x="248.1" y="443.5" style="fill:#74f4e6;font-family:sans-serif;font-size:142.1px;line-height:1.25;stroke-width:.888" xml:space="preserve"><tspan x="248.9" y="443.5" style="fill:#74f4e6;font-family:Kanit;font-weight:900;letter-spacing:1.671px;stroke-width:.888;text-align:center;text-anchor:middle">MINT</tspan></text>
									<text transform="matrix(2.11,0,0,2.11,-147.6,-392.2)" x="187.6" y="396.1" style="fill:#005a56;filter:url(#butta);font-family:sans-serif;font-size:67.35px;line-height:1.25;stroke-width:.4209" xml:space="preserve"><tspan x="188" y="396.1" style="fill:#005a56;font-family:Kanit;font-weight:900;letter-spacing:.7921px;stroke-width:.4209;text-align:center;text-anchor:middle">MINT</tspan></text>

									<animateTransform
										id="buttonbig" attributeName="transform"
										type="scale" from="0 0"
										to="1 1" begin="indefinite"
										dur="450ms" fill="freeze"
										repeatCount="1"
									/>
									<animateTransform
										id="buttonaway" attributeName="transform"
										type="scale" from="1 1"
										to="0 0" begin="indefinite"
										dur="450ms" fill="freeze"
										repeatCount="1"
									/>
								</g>
							</svg>

							
							<div id="lvl">
								<strong class="lvltitle">Upgraded size odds!</strong><br><div class="lvldesc">Here</div>
							</div>


							<div id="waitmint">
								<strong>Digging in progress...</strong><br> Your NFT is being generated and stored 100% on the blockchain...<br>
							</div>

							<div id="donemint">
								<strong>You dug out a gem!</strong><br> The NFT has been minted.<br>
								<button id="viewnew">Click to reveal your new NFT</button>
							</div>

							<div id="errorwallet">
								<strong>Wallet Connection Failed!</strong><br> Could not connect to your wallet - try using MetaMask on desktop, or report your wallet and device setup to dev and we will enable it!<br>
							</div>

							<div id="errormint">
								<strong>Mint Transaction Failed!</strong><br><strong class="errormintmsg"></strong><br> Try increasing the transaction gas limit by 50% - remember unused gas is returned to you!<br>
							</div>
						</div>
					</div>
				</div>

				<div id="catalog">
					<h2>The Gem Gallery</h2>
					<p>Check our some of the gems that have been dug up in the GemCaves recently... </p>
					
					<button id="showgal">See latest 10 gems</button>
					<div class="catalog-list">
						<div class="loadgo" style="margin-left:15px;">Loading...</div>
					</div>

					<div id="viewmy">
						<p>See gems owned by a certain wallet here:</p>
						<input type="text" class="wallet-viewmy" placeholder="Wallet Address" />
						<button id="viewmygo">View Wallet Gems</button>
					</div>
				</div>
				
				<div id="catalog">
					<div class="sellnfts">
						<h2>Buy & sell GemCave NFTs</h2>
						<p>You can sell, trade and list your GemCave NFTs on the following NFT marketplaces (more coming soon!)</p>
						<div class="selllogos">
							<div>
								<a href="https://tofunft.com/discover/items?contracts=18388" target="_blank">
									<svg style="width:80px;height:80px;" viewBox="0 0 39 36"><path d="M20.4385 0.609736C19.5951 0.283242 18.7108 0.119995 17.7857 0.119995C16.8607 0.119995 15.9696 0.283242 15.1126 0.609736C14.2691 0.922626 13.5141 1.38516 12.8475 1.99733C12.4743 2.34009 12.1437 2.72549 11.8558 3.15353V0.426083H0V3.79305H4.01995V14.0368H7.83585V3.79305H11.474C11.3972 3.93858 11.3245 4.08822 11.2559 4.24198C10.875 5.12623 10.6845 6.13292 10.6845 7.26205C10.6845 8.39117 10.875 9.39786 11.2559 10.2821C11.6504 11.1664 12.1809 11.9146 12.8475 12.5268C13.5141 13.1389 14.2691 13.6083 15.1126 13.9348C15.9696 14.2477 16.8607 14.4041 17.7857 14.4041C18.7108 14.4041 19.5951 14.2477 20.4385 13.9348C21.2956 13.6083 22.0574 13.1389 22.724 12.5268C23.3906 11.9146 23.9143 11.1664 24.2952 10.2821C24.6897 9.39786 24.887 8.39117 24.887 7.26205C24.887 6.13292 24.6897 5.12623 24.2952 4.24198C23.9143 3.35772 23.3906 2.60951 22.724 1.99733C22.0574 1.38516 21.2956 0.922626 20.4385 0.609736ZM16.1533 4.16036C16.6294 3.84747 17.1736 3.69102 17.7857 3.69102C18.3979 3.69102 18.9421 3.84747 19.4182 4.16036C19.908 4.47325 20.2889 4.90177 20.5609 5.44592C20.833 5.97648 20.9691 6.58185 20.9691 7.26205C20.9691 7.94224 20.833 8.55442 20.5609 9.09857C20.2889 9.62913 19.908 10.0508 19.4182 10.3637C18.9421 10.6766 18.3979 10.8331 17.7857 10.8331C17.1736 10.8331 16.6294 10.6766 16.1533 10.3637C15.6771 10.0508 15.2962 9.62913 15.0105 9.09857C14.7385 8.55442 14.6024 7.94224 14.6024 7.26205C14.6024 6.58185 14.7385 5.97648 15.0105 5.44592C15.2962 4.90177 15.6771 4.47325 16.1533 4.16036Z" fill="#310155"></path><path d="M24.3564 23.0086V14.7034H20.5405V22.7433C20.5405 23.4507 20.3501 24.0289 19.9692 24.4778C19.5883 24.9131 18.9897 25.1376 18.1735 25.1512C17.3572 25.1648 16.7587 24.9471 16.3777 24.4982C15.9968 24.0357 15.8064 23.4507 15.8064 22.7433V14.7034H11.9905V23.0086C11.9905 24.1921 12.2694 25.2124 12.8271 26.0695C13.3849 26.9265 14.1331 27.5863 15.0718 28.0488C16.0104 28.4978 17.0443 28.7222 18.1735 28.7222C19.3162 28.7222 20.3501 28.4978 21.2752 28.0488C22.2138 27.5863 22.962 26.9265 23.5198 26.0695C24.0776 25.2124 24.3564 24.1921 24.3564 23.0086Z" fill="#310155"></path><path d="M9.99887 23.8044V20.4374H5.14228V18.1112H11.0192V14.7442H1.32638V28.4161H5.14228V23.8044H9.99887Z" fill="#310155"></path><path d="M33.2806 23.3949H29.9137V18.5383H25.3019V14.7224H38.9739V36.12H35.6069V32.1H25.3631V28.2841H35.6069V18.5383H33.2806V23.3949Z" fill="#310155"></path><path d="M25.3003 12.9131H38.9739V9.46434H31.9338L38.9739 1.77149V0.424699H25.3003V3.95478H31.8114L25.3003 11.5663V12.9131Z" fill="#310155"></path></svg>
								</a>
							</div>
							<div>
								<a href="https://nftrade.com/assets/bsc/0x0000000000000000000000000000000000000000" target="_blank">
									<svg style="width:280px;height:80px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 421.46 62.34"><defs><style>.cls-1{fill:#1c2147;}.cls-2{fill:#1571fa;}.cls-3{fill:#93c5fe;}</style></defs><path class="cls-1" d="M51.39,0V61.44H40.17L13.44,22.77H13V61.44H0V0H11.4L37.92,38.64h.54V0Z"/><path class="cls-1" d="M58.72,61.44V0H99.39V10.71H71.71V25.35h25V36.06h-25V61.44Z"/><path class="cls-1" d="M105.78,10.71V0h50.46V10.71H137.43V61.44H124.59V10.71Z"/><path class="cls-1" d="M159.54,61.44V15.36h12.39v8h.48a12,12,0,0,1,4.23-6.5,11.17,11.17,0,0,1,6.84-2.2,19.33,19.33,0,0,1,2.07.12,14.58,14.58,0,0,1,1.95.33V26.49A16.7,16.7,0,0,0,185,26a22.37,22.37,0,0,0-2.91-.21,10.26,10.26,0,0,0-5,1.21,9,9,0,0,0-3.48,3.38,9.61,9.61,0,0,0-1.27,5V61.44Z"/><path class="cls-1" d="M205.52,62.31a19,19,0,0,1-7.86-1.55,12.44,12.44,0,0,1-5.45-4.59,13.58,13.58,0,0,1-2-7.6,13.43,13.43,0,0,1,1.41-6.45,11.42,11.42,0,0,1,3.84-4.2,18.57,18.57,0,0,1,5.53-2.4,41.74,41.74,0,0,1,6.53-1.14q4-.42,6.48-.8a9.06,9.06,0,0,0,3.56-1.12,2.51,2.51,0,0,0,1.11-2.22v-.18a5.54,5.54,0,0,0-1.78-4.41,7.43,7.43,0,0,0-5.05-1.56,9,9,0,0,0-5.49,1.51,7.12,7.12,0,0,0-2.7,3.8l-11.82-1a16.18,16.18,0,0,1,3.54-7.28,17.15,17.15,0,0,1,6.82-4.74,26.16,26.16,0,0,1,9.71-1.66,29.62,29.62,0,0,1,7.36.9,19.42,19.42,0,0,1,6.27,2.79,13.62,13.62,0,0,1,4.33,4.84,14.73,14.73,0,0,1,1.59,7.07V61.44H219.34V55.05H219a12.79,12.79,0,0,1-3,3.79,13.49,13.49,0,0,1-4.47,2.55A18.2,18.2,0,0,1,205.52,62.31Zm3.66-8.82a10.66,10.66,0,0,0,5-1.13,8.67,8.67,0,0,0,3.38-3A7.89,7.89,0,0,0,218.77,45V40.08a6.5,6.5,0,0,1-1.63.7c-.69.21-1.47.4-2.33.57s-1.71.32-2.57.45l-2.34.35A15.81,15.81,0,0,0,206,43.2a6.33,6.33,0,0,0-2.61,1.93,4.83,4.83,0,0,0-.93,3,4.57,4.57,0,0,0,1.9,4A8.13,8.13,0,0,0,209.18,53.49Z"/><path class="cls-1" d="M255,62.18a17.23,17.23,0,0,1-9.49-2.71,18.48,18.48,0,0,1-6.72-8,30.58,30.58,0,0,1-2.48-13,30.2,30.2,0,0,1,2.55-13.19,18.38,18.38,0,0,1,6.8-7.89A17.35,17.35,0,0,1,255,14.76a14.34,14.34,0,0,1,6.47,1.3,12.87,12.87,0,0,1,4.2,3.24,16.93,16.93,0,0,1,2.44,3.8h.39V0h12.75V61.44h-12.6V54.06h-.54a16.37,16.37,0,0,1-2.53,3.79A12.78,12.78,0,0,1,261.31,61,14.69,14.69,0,0,1,255,62.18ZM259,52a8.2,8.2,0,0,0,5.24-1.7,10.68,10.68,0,0,0,3.3-4.75,20.27,20.27,0,0,0,1.15-7.17,20.26,20.26,0,0,0-1.14-7.14,10.25,10.25,0,0,0-3.3-4.68A8.39,8.39,0,0,0,259,24.93a8.29,8.29,0,0,0-5.31,1.71,10.46,10.46,0,0,0-3.27,4.74,20.36,20.36,0,0,0-1.11,7,20.56,20.56,0,0,0,1.13,7.09,10.7,10.7,0,0,0,3.27,4.8A8.17,8.17,0,0,0,259,52Z"/><path class="cls-1" d="M311,62.34a24.45,24.45,0,0,1-12.23-2.9,19.57,19.57,0,0,1-7.87-8.22,27.06,27.06,0,0,1-2.76-12.61,26.94,26.94,0,0,1,2.76-12.48,20.36,20.36,0,0,1,7.78-8.37,22.61,22.61,0,0,1,11.81-3,24.36,24.36,0,0,1,8.5,1.45,19.18,19.18,0,0,1,6.9,4.37,19.87,19.87,0,0,1,4.61,7.3,29.21,29.21,0,0,1,1.65,10.28v3.51H293.23V33.75h26.88a9.79,9.79,0,0,0-1.2-4.89,8.76,8.76,0,0,0-3.32-3.35,9.65,9.65,0,0,0-4.9-1.21,9.85,9.85,0,0,0-5.15,1.33,9.56,9.56,0,0,0-3.49,3.57,10.19,10.19,0,0,0-1.29,5V41.7A12.82,12.82,0,0,0,302,47.61a9.14,9.14,0,0,0,3.62,3.84,10.92,10.92,0,0,0,5.55,1.35,12.09,12.09,0,0,0,3.9-.6,8.09,8.09,0,0,0,3-1.8,7.83,7.83,0,0,0,1.92-2.94l11.82.78a16.1,16.1,0,0,1-3.68,7.42,18.46,18.46,0,0,1-7.14,4.92A26.8,26.8,0,0,1,311,62.34Z"/><path class="cls-2" d="M421.39,61.05,397.07,18.93a.57.57,0,0,0-1,0L371.77,61.05a.56.56,0,0,0,.72.79l23.86-10.47a.53.53,0,0,1,.46,0l23.86,10.47A.56.56,0,0,0,421.39,61.05Z"/><path class="cls-3" d="M395.72,1.22,371.4,43.34a.57.57,0,0,1-1,0L346.11,1.22a.56.56,0,0,1,.71-.8L370.69,10.9a.51.51,0,0,0,.45,0L395,.42A.57.57,0,0,1,395.72,1.22Z"/></svg>
								</a>
							</div>
							<div>
								<a href="https://www.element.market/collections/gemcave-dig-nft" target="_blank">
<svg style="width:280px;height:80px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	fill="none" viewBox="0 0 125 30">
	<path fill="#101419"
		d="M52.541 8h-2.473v14h2.473V8zm25.186 13.66h-2.472v-6.467c0-1.328-1.09-2.408-2.429-2.408-1.34 0-2.429 1.08-2.429 2.408v6.467h-2.473v-6.467c0-2.68 2.199-4.859 4.901-4.859 2.703 0 4.902 2.18 4.902 4.859v6.467z" />
	<path fill="#101419"
		d="M84.803 21.66H82.33v-6.467c0-1.328-1.09-2.408-2.429-2.408a2.42 2.42 0 0 0-2.428 2.408v6.467H75v-6.467c0-2.68 2.2-4.859 4.901-4.859 2.704 0 4.902 2.18 4.902 4.859v6.467zm26.307.186h-2.473v-6.14c0-1.61-1.322-2.92-2.947-2.92s-2.948 1.31-2.948 2.92v6.14h-2.472v-6.14c0-2.962 2.431-5.372 5.42-5.372s5.42 2.41 5.42 5.373v6.139zm9.53-11.18h-6.22v2.451h6.22v-2.451z" />
	<path fill="#101419"
		d="M117.776 21.93c-2.595 0-4.706-2.092-4.706-4.665V8h2.473v9.265a2.226 2.226 0 0 0 2.233 2.214 2.227 2.227 0 0 0 2.234-2.213h2.472c0 2.572-2.111 4.664-4.706 4.664zm-51.873-4.887h-9.77V15h9.41l.36 1v1.043z" />
	<path fill="#101419"
		d="M62.58 18.307a3.29 3.29 0 0 1-2.37.997c-1.813 0-3.288-1.462-3.288-3.26 0-1.797 1.475-3.259 3.288-3.259 1.813 0 3.288 1.462 3.288 3.26h2.473c0-3.15-2.585-5.711-5.761-5.711s-5.76 2.562-5.76 5.71c0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447H62.58zm-14.198-1.264h-9.77V15h9.41l.36 1v1.043z" />
	<path fill="#101419"
		d="M45.058 18.307a3.29 3.29 0 0 1-2.37.997c-1.813 0-3.288-1.462-3.288-3.26 0-1.797 1.475-3.259 3.288-3.259 1.814 0 3.288 1.462 3.288 3.26h2.473c0-3.15-2.584-5.711-5.76-5.711-3.177 0-5.761 2.562-5.761 5.71 0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447h-2.917zm53.445-1.264h-9.689V15h9.41l.279 1.02v1.023z" />
	<path fill="#101419"
		d="M94.921 18.307a3.29 3.29 0 0 1-2.37.997c-1.812 0-3.287-1.462-3.287-3.26 0-1.797 1.475-3.259 3.288-3.259 1.813 0 3.288 1.462 3.288 3.26h2.472c0-3.15-2.584-5.711-5.76-5.711-3.177 0-5.761 2.562-5.761 5.71 0 3.149 2.584 5.71 5.76 5.71a5.739 5.739 0 0 0 5.287-3.447h-2.916z" />
	<g clip-path="url(#001a)">
		<path fill="url(#001b)" fill-rule="evenodd" d="M20.582 18.382V9.027l6.174-3.284v9.205l-6.174 3.434z"
			clip-rule="evenodd" />
		<path fill="url(#001c)" fill-rule="evenodd" d="m16.62 21.723.066 7.903-.221.123-8.309-4.565v-3.461h8.464z"
			clip-rule="evenodd" />
		<path fill="url(#001d)" fill-rule="evenodd" d="M20.582 22.827v4.639l-4.117 2.283v-6.922h4.117z"
			clip-rule="evenodd" />
		<path fill="url(#001e)" fill-rule="evenodd"
			d="M12.424 16.01h.003l-.155 4.64 2.117 1.174-8.293 4.611-.122-.07-.033-9.135 8.464-4.77v2.378l-1.981 1.171z"
			clip-rule="evenodd" />
		<path fill="url(#001f)" fill-rule="evenodd" d="M6.098 17.225 0 13.843V9.206l6.26 3.319-.162 4.701z"
			clip-rule="evenodd" />
		<path fill="url(#001g)" fill-rule="evenodd" d="m28.815 16.052-8.233 4.415v4.788l8.233-4.565v-4.638z"
			clip-rule="evenodd" />
		<path fill="#29F6A8" fill-rule="evenodd" d="M1.982 14.875 6.1 17.232v9.205L1.982 24.08v-9.205z"
			clip-rule="evenodd" />
		<path fill="url(#001h)" fill-rule="evenodd" d="M12.271 20.65v-4.638l.058-.036 8.251 4.494v4.789l-8.308-4.609z"
			clip-rule="evenodd" />
		<path fill="url(#001i)" fill-rule="evenodd" d="M8.312 13.728 0 9.205l8.312-4.523v9.046z" clip-rule="evenodd" />
		<path fill="url(#001j)" fill-rule="evenodd"
			d="m28.816 16.052-8.233 4.565-8.311-4.61 2.137-1.19-.017.01 2.074 1.15 4.077-2.268.04-2.224 8.233 4.567z"
			clip-rule="evenodd" />
		<path fill="url(#001k)" fill-rule="evenodd"
			d="M14.406 12.61h.001l-.1.055-4.082-2.225-2.07 1.206V2.283l.273-.152 8.19 4.718-.055 9.12-.1.085-2.073-1.226.016-2.217z"
			clip-rule="evenodd" />
		<path fill="url(#001l)" d="M11.348 5.57h16.729v14.065H11.348z" />
		<path fill="url(#001m)" fill-rule="evenodd"
			d="M16.465 16.025V6.848l-.09-.05 4.167-2.254.038.02v9.172l-4.115 2.289z" clip-rule="evenodd" />
		<path fill="url(#001n)" fill-rule="evenodd" d="m14.41 12.61-8.312 4.62-4.116-2.356 8.245-4.585 4.182 2.32z"
			clip-rule="evenodd" />
		<path fill="url(#001o)" fill-rule="evenodd" d="M20.582 9.177V4.565l2.059-1.177 4.117 2.356-6.176 3.433z"
			clip-rule="evenodd" />
		<path fill="#76FF0B" fill-rule="evenodd" d="m8.156 2.283 8.309 4.565 4.117-2.283L12.272 0 8.156 2.283z"
			clip-rule="evenodd" />
	</g>
	<defs>
		<linearGradient id="001b" x1="23.476" x2="23.842" y1="7.084" y2="17.237" gradientUnits="userSpaceOnUse">
			<stop stop-color="#00B368" />
			<stop offset="1" stop-color="#004A4D" />
		</linearGradient>
		<linearGradient id="001c" x1="8.156" x2="16.687" y1="25.736" y2="25.736" gradientUnits="userSpaceOnUse">
			<stop stop-color="#0ECD59" />
			<stop offset="1" stop-color="#16DE3E" />
		</linearGradient>
		<linearGradient id="001d" x1="18.523" x2="18.523" y1="22.241" y2="29.452" gradientUnits="userSpaceOnUse">
			<stop stop-color="#003A4A" />
			<stop offset="1" stop-color="#007649" />
		</linearGradient>
		<linearGradient id="001e" x1="16.808" x2="9.207" y1="18.579" y2="19.659" gradientUnits="userSpaceOnUse">
			<stop stop-color="#00AE85" />
			<stop offset=".994" stop-color="#007258" />
		</linearGradient>
		<linearGradient id="001f" x1="3.091" x2="3.182" y1="10.859" y2="16.646" gradientUnits="userSpaceOnUse">
			<stop stop-color="#12C951" />
			<stop offset="1" stop-color="#009256" />
		</linearGradient>
		<linearGradient id="001g" x1="20.581" x2="28.814" y1="20.655" y2="20.655" gradientUnits="userSpaceOnUse">
			<stop stop-color="#005255" />
			<stop offset="1" stop-color="#008147" />
		</linearGradient>
		<linearGradient id="001h" x1="17.114" x2="16.114" y1="17.115" y2="22.598" gradientUnits="userSpaceOnUse">
			<stop stop-color="#44E28D" />
			<stop offset="1" stop-color="#10E2AA" />
		</linearGradient>
		<linearGradient id="001i" x1="0" x2="8.311" y1="9.204" y2="9.204" gradientUnits="userSpaceOnUse">
			<stop stop-color="#91FF3C" />
			<stop offset="1" stop-color="#64F562" />
		</linearGradient>
		<linearGradient id="001j" x1="12.27" x2="28.815" y1="16.053" y2="16.053" gradientUnits="userSpaceOnUse">
			<stop stop-color="#91FF3C" />
			<stop offset="1" stop-color="#0DE2AC" />
		</linearGradient>
		<linearGradient id="001k" x1="12.336" x2="12.429" y1="4.479" y2="13.735" gradientUnits="userSpaceOnUse">
			<stop stop-color="#03E168" />
			<stop offset="1" stop-color="#05C35E" />
		</linearGradient>
		<linearGradient id="001m" x1="16.758" x2="19.549" y1="6.459" y2="12.959" gradientUnits="userSpaceOnUse">
			<stop stop-color="#00837B" />
			<stop offset="1" stop-color="#03824D" />
		</linearGradient>
		<linearGradient id="001n" x1="4.101" x2="11.71" y1="16.126" y2="11.379" gradientUnits="userSpaceOnUse">
			<stop stop-color="#91FF3C" />
			<stop offset="1" stop-color="#52F171" />
		</linearGradient>
		<linearGradient id="001o" x1="20.438" x2="24.264" y1="7.574" y2="4.504" gradientUnits="userSpaceOnUse">
			<stop stop-color="#11E2AA" />
			<stop offset=".638" stop-color="#8DFE40" />
		</linearGradient>
		<clipPath id="001a">
			<path fill="#fff" d="M0 0h28.929v30H0z" />
		</clipPath>
		<pattern id="001l" width="1" height="1" patternContentUnits="objectBoundingBox">
			<use xlink:href="#p" />
		</pattern>
		<image
			xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGwAAABeCAYAAADG1PFrAAAACXBIWXMAAAsSAAALEgHS3X78AAAA"
			id="001p" />
	</defs>
</svg>								</a>
							</div>
							
						</div>
					</div>
				</div>

				<div id="about">
					<div class="abouttext">
						<div>
							<h2>What makes GemCave NFTs special?</h2>
							<p>Did you know that most NFTs minted have already gone offline? Most NFTs require external hosting being maintained and paid for otherwise the NFT data is lost forever. This external NFT data can also be modified or deleted at any time, meaning your NFTs are not as safe as you may think.</p>
							<p>There are midway attempts that use IPFS but this does not verify the integrity of your NFT data in line with the blockchain, nor does it promise forever storage.</p>
							<p>GemCave has solved these issues and releases an entirely on-chain NFT system built of 7 custom bespoke coded smart contracts that interact to form an entirely on-chain, immutable and permanent NFT minting, generating and storage solution.</p>		
							<p><a href="https://bscscan.com/address/0x0000000000000000000000000000000000000000#code">View the GemCave DIG Contract Source Code</a></p>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 423.3 382.6"><defs><filter id="assssa" width="1.5" height="1.5" x="-.25" y="-.25" style="color-interpolation-filters:sRGB"><feGaussianBlur result="result1" stdDeviation="4.886"/><feGaussianBlur in="result1" result="result6" stdDeviation="6.161"/><feComposite in="result6" in2="result1" operator="in" result="result8"/><feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/><feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" type="saturate" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0"/><feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation=".01"/><feSpecularLighting in="result0" lighting-color="#fff" result="result1" specularConstant="1.868" specularExponent="23.846" surfaceScale="-2.651"><feDistantLight azimuth="207" elevation="60"/></feSpecularLighting><feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/><feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/><feComposite in2="result4" result="result91"/><feBlend in2="result91" mode="multiply"/></filter></defs><path d="M249 309c-3.8 0-7.4-1.6-9.8-4.6l-115-141c-3.5-4.3-3.8-10.4-.8-15.1l41.1-62.9c2.3-3.57 6.3-5.72 10.5-5.72h148c4.2 0 8.2 2.15 10.5 5.72l41.1 62.9c3.1 4.7 2.7 10.8-.8 15.1l-115 141c-2.4 3-6 4.6-9.7 4.6z" style="fill:#37c4b3" transform="translate(-60.95 -28.98)"/><path d="M279 157h97c.1-2.7-.5-5.5-2.1-7.9l-41.1-62.9c-1.2-1.87-2.9-3.33-4.8-4.32zM169 81.8c-1.9.99-3.6 2.45-4.8 4.32L123.1 149c-1.6 2.4-2.2 5.2-2 7.9H218z" style="fill:#53e7d3" transform="translate(-60.95 -28.98)"/><path d="m298 229 50-152.5H248z" style="fill:#53e7d3" transform="translate(-110.65 51.42)"/><path d="m298 0-50 76.5h100z" style="fill:#b9f5ed" transform="translate(-110.65 51.42)"/><path d="M157 164c-3.6-4.3-3.9-10.4-.8-15.1L197.3 86c2.3-3.57 6.2-5.72 10.5-5.72h-33.6c-4.2 0-8.2 2.15-10.5 5.72l-41.1 62.9c-3.1 4.7-2.7 10.8.8 15.1l115 141c2.4 3-81.5-141-81.5-141z" style="enable-background:new;opacity:.1" transform="translate(-60.95 -28.98)"/><path d="M218 1.41h160l47.9 75.1-128 153-128-153z" style="fill:#fff;filter:url(#assssa);mix-blend-mode:overlay" transform="matrix(.975 0 0 .975 -103.25 54.22)"/><g><path d="M825.6 234.7c15.7 36.1 0 79.6-36.2 95.4L422.7 489.9c-36 15.8-78.8-2.3-94.5-38.3L217.8 198.5c-15.8-36.2.1-79.8 36.1-95.6L620.6-56.8c36.2-15.84 78.8 2.3 94.6 38.5z" style="fill:#05af8f;stroke-width:1.531" transform="translate(203.25 165.12) scale(.2646)"/><path d="m714.9-18.92 110.7 253.6c15.7 36.1 0 79.6-36.2 95.4l-365.9 159.5" style="fill:#049b93;stroke-width:1.531" transform="translate(203.25 165.12) scale(.2646)"/><path d="M70.38 266.7c0-25.8 20.88-47.2 46.62-47.2h261.2c25.8 0 46.6 21.2 46.6 46.9M288 328.4c0-22.8-18-41.3-40.8-41.3S207 305.6 207 328.4c0 14.8 5.2 27.8 20.9 35.1V423c0 11.9 7.8 21.5 19.7 21.5s19.7-9.6 19.7-21.5v-59.5c15.8-7.3 20.7-20.2 20.7-35.1z" style="fill:#0cc4a1" transform="rotate(-23.562 406.793 -394.083) scale(.405)"/><path d="M555.5 139.3c-13.9-32-50.5-46.82-82.5-32.9-32 13.9-45.2 50.5-31.2 82.5 9.1 20.9 24.3 35.9 50.8 36.6L529 309c7.3 16.6 24.2 25.3 40.8 18 16.7-7.2 21.9-25.5 14.6-42.2L548 201.3c17.6-19.9 16.6-41.1 7.5-62z" style="fill:#0f343a;stroke-width:1.531" transform="translate(203.25 165.12) scale(.2646)"/><path d="M230-76.44c.2.56 0 1.18-.6 1.42l-1.9.84c-.6.24-1.2 0-1.4-.54-.3-.56 0-1.18.5-1.42l2-.84c.5-.24 1.2 0 1.4.54z" style="fill:#0cc4a1;stroke-width:1.531" transform="translate(203.25 165.12) scale(.2646)"/><path d="M327.5-185.1C256.7-154.3 240-82.2 271-11.3l38.2 87.6-55.4 24.22-38.2-87.62c-45-103.3-16.5-194.7 86.8-239.7m57.5-32.2c88.7-11.4 175.6 9.4 220.6 112.7l38.2 87.68-55.3 24.1-38.2-87.68c-30.9-70.9-43.9-81.5-130.6-84.3" style="fill:#6f8782;stroke-width:1.531" transform="translate(203.25 165.12) scale(.2646)"/><g><path d="M119.7 106.5v31.3h60.4V42.23c0-77.33 44-136.8 121.3-136.8-112.8 0-181.7 88.37-181.7 201zM371.4-87.32c66.8 30.16 86.1 52.22 86.1 129.6v95.57h60.3v-31.3c0-112.7-48.2-178-146.4-193.8z" style="fill:#4e605c;stroke-width:1.531" transform="rotate(-23.56 523.245 -458.323) scale(.2646)"/></g></g><g stroke="currentColor" stroke-linecap="round" stroke-width="2" style="fill:none" transform="scale(-10.22 10.22) rotate(-63.6 11.9 36.223)"><rect width="6" height="10" x="12.33" y="-9.824" rx="3" style="fill:none;stroke:#2d5b58" transform="rotate(51.95)"/><rect width="6" height="10" x="5.635" y="-14.13" rx="3" style="stroke:#049b93" transform="rotate(104.5)"/><rect width="6" height="10" x="-.086" y="-11.63" rx="3" style="fill:none;stroke:#2d5b58" transform="rotate(150.5)"/></g></svg>		
						</div>		
					</div>		
					<div class="featurepop">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="chain-svg">
							<path d="M17.033 6.966a1.492 1.492 0 0 1 0 2.112l-7.955 7.956a1.494 1.494 0 0 1-2.112-2.112l7.956-7.956a1.493 1.493 0 0 1 2.111 0zM7.895 20.352a3.008 3.008 0 0 1-4.248 0 3.008 3.008 0 0 1 0-4.248l5.639-5.632A5.77 5.77 0 0 0 3.837 12L1.69 14.147a5.772 5.772 0 0 0 8.163 8.163L12 20.162a5.769 5.769 0 0 0 1.527-5.448l-5.632 5.638zM14.146 1.69 12 3.838a5.761 5.761 0 0 0-1.53 5.445l5.634-5.635a3.008 3.008 0 0 1 4.248 0 3.006 3.006 0 0 1 0 4.248l-5.635 5.635a5.765 5.765 0 0 0 5.445-1.53l2.146-2.147a5.772 5.772 0 0 0-8.162-8.164z"/>
						</svg>
						<strong>100% on-chain</strong>
						
						<svg xmlns="http://www.w3.org/2000/svg" class="lock-svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<rect x="5" y="11" width="14" height="10" rx="2" />
							<circle cx="12" cy="16" r="1" />
							<path d="M8 11v-4a4 4 0 0 1 8 0v4" />
						</svg>
						
						<strong>100% immutable</strong>

						<svg xmlns="http://www.w3.org/2000/svg" class="inf-svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M9.828 9.172a4 4 0 1 0 0 5.656a10 10 0 0 0 2.172 -2.828a10 10 0 0 1 2.172 -2.828a4 4 0 1 1 0 5.656a10 10 0 0 1 -2.172 -2.828a10 10 0 0 0 -2.172 -2.828" />
						</svg>
						<strong>100% permanent</strong>

						<svg xmlns="http://www.w3.org/2000/svg" class="inf-svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
							<circle cx="12" cy="11" r="1" />
							<line x1="12" y1="12" x2="12" y2="14.5" />
						</svg>
					</div>
					

					



				</div>
			</div>
		</main>
	</body>

	
	<script type="text/javascript" src="https://nft.gemcave.org/js/web3.min.js"></script>
	<script type="text/javascript" src="https://nft.gemcave.org/js/web3modal.js"></script>
	<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
	<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>

	<script type="text/javascript" src="https://nft.gemcave.org/js/web3.js?cb=1668705034317"></script>


	<script src="https://nft.gemcave.org/js/vendor/jquery.js"></script>
	<script src="https://nft.gemcave.org/js/main.js?cb=1668705034317"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z3RFXH0N0D"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-2Z0V3V3JBF');
		</script>
</html>

