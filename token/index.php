<?php include 'config.php'; ?>
<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Token - Official Website</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?= $favicon ?>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/style.css?cb=1661211037457">

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

		<script async type="module" id="embrCheckout" src="https://scripts.embr.org/checkout/checkout.js" data-chain="bsc" data-address="0x0000000000000000000000000000000000000000"></script>
        

	</head>

	<body id="page-home">
		<?= $topBar; ?>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="https://gemcave.org/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 512 440" class="logo-svg"><defs><animate xlink:href="#a" attributeName="elevation" begin="0" values="0;800;0" dur="5s" repeatCount="indefinite" fill="freeze"/><filter id="b" width="1.5" height="1.5" x="-.3" y="-.3" color-interpolation-filters="sRGB"><feGaussianBlur result="result1" stdDeviation="1"/><feGaussianBlur in="result1" result="result6" stdDeviation="10"/><feComposite in="result6" in2="result1" operator="atop" result="result8"/><feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/><feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" values="0 0 0 -1 0 0 0 0 -1 2 0 0 0 -1 0 0 0 0 3 0"/><feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="1"/><feSpecularLighting in="result0" lighting-color="#FFF" result="result1" specularConstant="2.5" specularExponent="35" surfaceScale="-2"><feDistantLight id="a" azimuth="230" elevation="70"/></feSpecularLighting><feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/><feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/><feComposite in="result9" in2="result4" operator="atop" result="result91"/><feBlend in2="result91" mode="multiply"/></filter></defs><g class="cavein"><path fill="#d9d3de" d="m511.9 335-32-256a8 8 0 0 0-5.6-6.7l-240-72a8 8 0 0 0-6.1.7l-192 104a7.9 7.9 0 0 0-4 5.6l-32 176a8.3 8.3 0 0 0 0 3.5l40 144A8 8 0 0 0 48 440h392a8 8 0 0 0 6.7-3.6l64-96c1-1.6 1.5-3.5 1.2-5.4z"/><path fill="#c6bdcd" d="m72.3 434.1-40-144a7.6 7.6 0 0 1-.2-3.5l32-176c.5-2.4 2-4.5 4-5.6L251.8 5.6 234.3.3a8 8 0 0 0-6.1.7l-192 104a7.9 7.9 0 0 0-4 5.6l-32 176a8.3 8.3 0 0 0 0 3.5l40 144A8 8 0 0 0 48 440h32a8 8 0 0 1-7.7-5.9z"/><path fill="#b3a7bd" d="m455.6 333.5-48-144c-.7-2-2.1-3.7-4-4.7l-96-48-32-16c-1.5-.7-3.2-1-4.9-.7l-21.5 3.6-122.5 20.4a8.2 8.2 0 0 0-5.7 4l-72 128a7.8 7.8 0 0 0-.7 5.9l40 152a8 8 0 0 0 7.7 6h21.6L80.3 298c-.6-2-.3-4.1.7-5.9l72-128a8.2 8.2 0 0 1 5.7-4l122.5-20.4 90.4 45.1c1.9 1 3.3 2.7 4 4.7l48 144a8 8 0 0 1-1.2 7.3l-72 96a8 8 0 0 1-6.4 3.2h32a8 8 0 0 0 6.4-3.2l72-96a8 8 0 0 0 1.2-7.3z"/><path fill="#9f91ac" d="m227.6 57.3-.7.5-.3.3-.3.2-.4.5-.1.1-.3.4-.1.2-.3.4-.2.3-.1.3-.2.4-.1.3-.2.5v.2l-.1.5-.1.4-.1.4V80a8 8 0 0 0 16 0V68.3l17.5-11.7 28.6 7.2 1.9.2a8 8 0 0 0 7.8-6c1-4.3-1.6-8.7-5.9-9.8l-28.7-7.1-22.5-39.4-4.4-1.4a8 8 0 0 0-6.1.7l-6.3 3.4 23.4 41zm178.5 54.9a8.3 8.3 0 0 0-5.6 4.9c-.9 2.4-.6 5.2.8 7.3l12.4 18.6-11.4 11.3a8.1 8.1 0 0 0 0 11.4 8.5 8.5 0 0 0 5.7 2.3c2 0 4.1-.8 5.7-2.3l16-16a8 8 0 0 0 1-10.1L421 125l20.9-5.2a8.3 8.3 0 0 0 5.3-4.2l22.3-44.7-15.6-4.7-19.4 38.9z"/><path fill="#b3a7bd" d="M169.3 179.6a8 8 0 0 0 2.3 11.1c1.3.9 2.9 1.3 4.4 1.3a8 8 0 0 0 6.7-3.6l16-24a8.1 8.1 0 0 0-.3-9.2L183 134.7l-17.7 3 16.9 22.6z"/><path fill="#9f91ac" d="m179.5 156.6 17.8-2.9-14.3-19-17.7 3z"/><path fill="#533a6a" d="m398.9 316-56-96a7.8 7.8 0 0 0-6-3.9l-136-16c-2.7-.4-5.5.8-7.2 3l-88 112a7.7 7.7 0 0 0-1.2 7.6l40 112a7.9 7.9 0 0 0 7.5 5.3h184c3 0 5.8-1.7 7.2-4.4l56-112a7.9 7.9 0 0 0-.3-7.6z"/></g><g filter="url(#b)" transform="matrix(.77 0 0 .77 24.5 249.7)"><path fill="#37c4b3" d="M298.3 229c-3.8 0-7.4-1.6-9.8-4.6L173.4 83.7a13 13 0 0 1-.8-15l41.1-63C216 2.1 220 0 224.2 0h148.1c4.2 0 8.2 2.1 10.5 5.7l41.1 63a12.8 12.8 0 0 1-.8 15L308 224.4c-2.4 3-6 4.6-9.7 4.6z" class="diamond"/></g><g class="diamond" style="mix-blend-mode:hard-light"><path fill="#37c4b3" d="M254.9 426.6c-3 0-5.7-1.3-7.6-3.6l-89-108.6a10 10 0 0 1-.5-11.7l31.7-48.6a9.7 9.7 0 0 1 8.1-4.4H312c3.3 0 6.4 1.7 8.1 4.4l31.8 48.6a10 10 0 0 1-.6 11.7l-89 108.6a9.6 9.6 0 0 1-7.4 3.6z"/><path fill="#53e7d3" d="M193.2 250.8a9.7 9.7 0 0 0-3.7 3.3l-31.7 48.6a9.5 9.5 0 0 0-1.6 6h74.9zm85.4 58h74.9a11 11 0 0 0-1.6-6.1L320 254.1a9.7 9.7 0 0 0-3.7-3.3Zm14.9 0h-77.1l38.5 117.9z"/><path fill="#b9f5ed" d="m254.8 249.7-38.6 59h77.3l-38.6-59z"/></g></svg>
						<div class="logo-text">GemCave<br>Token</div>
					</a>
				</div>
				<div class="menu-show">
					<svg height="384pt" viewBox="0 -21 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m362.667969 0h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0"/><path d="m362.667969 128h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0"/><path d="m362.667969 256h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0"/></svg>
				</div>
				<div class="menu">
					<div class="menu-close">
						<svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg"><path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/></svg>
					</div>
					<nav>
						<a href="#links">Links</a>
						<a href="#taxes">Taxes</a>
						<a href="#distribution">Distribution</a>
						<a href="https://swap.gemcave.org/" class="pop">Buy GemCave Token</a>
					</nav>
				</div>
			</div>
		</header>

		<div id="banner">
			<div class="container">
				<div class="banner-left">
					<div class="banner-info">
						<h1>The groundbreaking token supported by a powerful ecosystem of crypto and blockchain products</h1>
						<p>GemCave Token is a feature rich BEP-20 token on BSC, written with a custom smart contract that allows deep integration with an ever growing array of GemCave products and services.</p>
						<div class="rowy">
							<div class="contract">
								Contract Address: <span class="contract-hash"><?= $contractID ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" class="copy-contract" viewBox="0 0 24 24"><defs/><path d="M23 2.8C23 1.1 21.8 0 20.2 0H8.8A2.7 2.7 0 006 2.8v13.4C6 17.9 7.2 19 8.8 19h11.4c1.6 0 2.8-1.2 2.8-2.8zm-4.8 11.7h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5z"/><path d="M8.8 20.5c-2.4 0-4.3-2-4.3-4.3V2.8v-.3h-.7A2.8 2.8 0 001 5.3v16C1 22.8 2.2 24 3.8 24h12c1.5 0 2.7-1.2 2.7-2.8v-.7z"/></svg>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-right">
					<div class="banner-info">
						<div class="bonus-title">Latest News</div>
						<hr>
						<?php include '../latest-news.php'; ?>
					</div>
				</div>
			</div>

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="logo-bg">
				<path stroke-linecap="round" stroke-linejoin="round" d="m14 3 3 6-5 12M10 3 7 9l5 12"/>
				<path stroke-linecap="round" stroke-linejoin="round" d="M17 3H7L3 9l9 12 9-12-4-6ZM3 9h18"/>
			</svg>
		</div>

		<section class="main">

			<div id="products">
				<div class="container">
					<h2>Part of the GemCave family</h2>
					<p>GemCave Token is one part of a large ecosystem of crypto products that all link and utilize GemCave Token! For more details on the individual products, visit the websites by clicking the logos below.</p>
					<p><a href="https://gemcave.org" target="_blank" class="button">View all our products</a></p>
					<div class="product-gallery">
						<div class="item">
							<a href="https://games.gemcave.org/" target="_blank"><img src="/img/logos/gaming.png" /></a>
						</div>
						<div class="item">
							<a href="https://listing.gemcave.org/" target="_blank"><img src="/img/logos/listing.png" /></a>
						</div>
						<div class="item">
							<a href="https://stake.gemcave.org/" target="_blank"><img src="/img/logos/staking.png" /></a>
						</div>
						<div class="item">
							<a href="https://swap.gemcave.org/" target="_blank"><img src="/img/logos/swap.png" /></a>
						</div>                        
						<div class="item">
							<a href="https://nft.gemcave.org/" target="_blank"><img src="/img/logos/dig.png" /></a>
						</div>
						<div class="item">
							<a href="https://avatar.gemcave.org/" target="_blank"><img src="/img/logos/avatar.png" /></a>
						</div>
					</div>
				</div>
			</div>

			<div id="roadmap">
				<div class="gems-bg-shadow"></div>
				<svg class="gems-bg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.4 42.26" preserveAspectRatio="xMidYMid slice"><g stroke-linecap="round" stroke-linejoin="round" transform="translate(-163.2 11.85)" style="fill:none;stroke:#5c188f;stroke-width:.3329"><path d="m166.5 22.55.8 3.86-.8 3.84M166.5 22.55l-.8 3.86.8 3.84" /><path d="m166.5 30.25 1.8-3.84-1.8-3.86-1.9 3.86zM164.6 26.41h3.7M175.2 14.36l-1.2 3.76-2.6 2.97" /><path d="m175.2 14.36-2.6 2.99-1.2 3.74" /><path d="m171.4 21.09 3.5-2.49.3-4.24-3.6 2.45zM171.6 16.81l3.3 1.79M179 21.62l1.2 3.76-.4 3.91" /><path d="m179 21.62-.4 3.92 1.2 3.75" /><path d="m179.8 29.29 1.4-4.01-2.2-3.66-1.5 4.03zM177.5 25.65l3.7-.37M181.1 7.615l1.8 3.505.2 3.92M181.1 7.615l.2 3.935 1.8 3.49" /><path d="m183.1 15.04.7-4.19-2.7-3.235-.8 4.235zM180.3 11.85l3.5-1M189.2 14.56l.2 3.94-1.4 3.66" /><path d="m189.2 14.56-1.4 3.68.2 3.92" /><path d="m188 22.16 2.4-3.51-1.2-4.09-2.5 3.51zM186.7 18.07l3.7.58M204.4 22.05l-.8 3.86-2.2 3.2" /><path d="m204.4 22.05-2.2 3.22-.8 3.84" /><path d="m201.4 29.11 3.1-2.81-.1-4.25-3.3 2.78zM201.1 24.83l3.4 1.47M198.2 9.267l.8 3.863-.8 3.84M198.2 9.267l-.8 3.863.8 3.84" /><path d="m198.2 16.97 1.8-3.84-1.8-3.863-1.9 3.863zM196.3 13.13h3.7M206.2 11.02l2.1 3.28.7 3.87M206.2 11.02l.7 3.88 2.1 3.27" /><path d="m209 18.17.3-4.24-3.1-2.91-.4 4.29zM205.8 15.31l3.5-1.38M215.5 21.71l2 3.39.4 3.9M215.5 21.71l.4 3.91 2 3.38" /><path d="m217.9 29 .5-4.22-2.9-3.07-.6 4.27zM214.9 25.98l3.5-1.2M276.7 19.93l.8 3.86-.8 3.84M276.7 19.93l-.8 3.86.8 3.84" /><path d="m276.7 27.63 1.8-3.84-1.8-3.86-1.9 3.86zM274.8 23.79h3.7M230.2 11.41l-.3 3.92-1.9 3.47" /><path d="m230.2 11.41-1.9 3.47-.3 3.92" /><path d="m228 18.8 2.8-3.18-.6-4.21-2.9 3.16zM227.3 14.57l3.4 1.02M221.1 13.32l.8 3.86-.8 3.84M221.1 13.32l-.8 3.86.8 3.84" /><path d="m221.1 21.02 1.8-3.84-1.8-3.86-1.9 3.86zM219.2 17.18h3.7M195 18.62l.8 3.86-.8 3.84M195 18.62l-.8 3.86.8 3.84" /><path d="m195 26.32 1.8-3.84-1.8-3.86-1.9 3.86zM193.1 22.48h3.7M229.8 23.16l-.8 3.86-2.2 3.22" /><path d="m229.8 23.16-2.2 3.23-.8 3.85" /><path d="m226.8 30.24 3.1-2.82-.1-4.26-3.3 2.8zM226.5 25.96l3.4 1.46M235.2 18.06l.8 3.86-.8 3.84M235.2 18.06l-.8 3.86.8 3.84" /><path d="m235.2 25.76 1.8-3.84-1.8-3.86-1.9 3.86zM233.3 21.92h3.7M240.5 9.818l.8 3.862-.8 3.84M240.5 9.818l-.8 3.862.8 3.84" /><path d="m240.5 17.52 1.8-3.84-1.8-3.862-1.9 3.862zM238.6 13.68h3.7M248.3 14.97l2.2 3.22.8 3.84M248.3 14.97l.8 3.86 2.2 3.2" /><path d="m251.3 22.03.2-4.24-3.2-2.82-.2 4.29zM248.1 19.26l3.4-1.47M260.1 21.62l-.1 3.94-1.7 3.55M260.1 21.62l-1.7 3.57-.1 3.92" /><path d="m258.3 29.11 2.6-3.32-.8-4.17-2.8 3.31zM257.3 24.93l3.6.86M255.6 7.297l.8 3.863-.8 3.84" /><path d="m255.6 7.297-.8 3.863.8 3.84" /><path d="m255.6 15 1.8-3.84-1.8-3.863-1.9 3.863zM253.7 11.16h3.7M268.9 22.24l.8 3.86-.8 3.84M268.9 22.24l-.8 3.86.8 3.84" /><path d="m268.9 29.94 1.8-3.84-1.8-3.86-1.9 3.86zM267 26.1h3.7M271.7 10.94l-.6 3.91-2 3.36" /><path d="m271.7 10.94-2.1 3.38-.5 3.89" /><path d="m269.1 18.21 3-3.03-.4-4.24-3.1 3.01zM268.6 13.95l3.5 1.23M275.4 3.258l-.8 3.86.8 3.842M275.4 3.258l.8 3.86-.8 3.842" /><path d="m275.4 10.96-1.8-3.842 1.8-3.86 1.9 3.86zM277.3 7.118h-3.7M272.8-9.907l1.2 3.76 2.6 2.97" /><path d="m272.8-9.907 2.6 2.99 1.2 3.74" /><path d="m276.6-3.177-3.5-2.49-.3-4.24 3.6 2.45zM276.4-7.457l-3.3 1.79M266.9-1.652l-1.2 3.76.4 3.91M266.9-1.652l.4 3.92-1.2 3.75" /><path d="m266.1 6.018-1.4-4.01 2.2-3.66 1.5 4.03zM268.4 2.378l-3.7-.37M260.8-11.68 259-8.172l-.2 3.92M260.8-11.68l-.2 3.938-1.8 3.49" /><path d="m258.8-4.252-.7-4.19 2.7-3.238.8 4.238zM261.6-7.442l-3.5-1M252.7-4.732l-.2 3.94 1.4 3.66" /><path d="m252.7-4.732 1.4 3.68-.2 3.92" /><path d="m253.9 2.868-2.4-3.51 1.2-4.09 2.5 3.51zM255.2-1.222l-3.7.58M237.5.642l.8 3.86 2.2 3.2" /><path d="m237.5.642 2.2 3.22.8 3.84" /><path d="m240.5 7.702-3.1-2.81.1-4.25 3.3 2.78zM240.8 3.422l-3.4 1.47M243.7-10.03l-.8 3.868.8 3.84M243.7-10.03l.8 3.868-.8 3.84" /><path d="m243.7-2.322-1.8-3.84 1.8-3.868 1.9 3.868zM245.6-6.162h-3.7M235.7-8.272l-2.1 3.28-.7 3.87M235.7-8.272l-.7 3.88-2.1 3.27" /><path d="m232.9-1.122-.3-4.24 3.1-2.91.4 4.29zM236.1-3.982l-3.5-1.38M226.4 2.418l-2 3.39-.4 3.9M226.4 2.418l-.4 3.91-2 3.38" /><path d="m224 9.708-.5-4.22 2.9-3.07.6 4.27zM227 6.688l-3.5-1.2M165.2.638l-.8 3.86.8 3.84M165.2.638l.8 3.86-.8 3.84" /><path d="m165.2 8.338-1.8-3.84 1.8-3.86 1.9 3.86zM167.1 4.498h-3.7M211.7-7.882l.3 3.92 1.9 3.47" /><path d="m211.7-7.882 1.9 3.47.3 3.92" /><path d="m213.9-.492-2.8-3.18.6-4.21 2.9 3.16zM214.6-4.722l-3.4 1.02M223.9-11.15l-.8 3.864.8 3.84M223.9-11.15l.8 3.864-.8 3.84" /><path d="m223.9-3.446-1.8-3.84 1.8-3.864 1.9 3.864zM225.8-7.286h-3.7M246.9-.672l-.8 3.86.8 3.84M246.9-.672l.8 3.86-.8 3.84" /><path d="m246.9 7.028-1.8-3.84 1.8-3.86 1.9 3.86zM248.8 3.188h-3.7M214.2 2.475l.8 3.86 2.2 3.222" /><path d="m214.2 2.475 2.2 3.23.8 3.852" /><path d="m217.2 9.557-3.1-2.822.1-4.26 3.3 2.8zM217.5 5.275l-3.4 1.46M206.7-1.232l-.8 3.86.8 3.84M206.7-1.232l.8 3.86-.8 3.84" /><path d="m206.7 6.468-1.8-3.84 1.8-3.86 1.9 3.86zM208.6 2.628h-3.7M201.4-9.474l-.8 3.862.8 3.84M201.4-9.474l.8 3.862-.8 3.84" /><path d="m201.4-1.772-1.8-3.84 1.8-3.862 1.9 3.862zM203.3-5.612h-3.7M196.1-5.612l-2.2 3.22-.8 3.84M196.1-5.612l-.8 3.86-2.2 3.2" /><path d="m193.1 1.448-.2-4.24 3.2-2.82.2 4.29zM196.3-1.322l-3.4-1.47M188 2.428l.1 3.94 1.7 3.55" /><path d="m188 2.428 1.7 3.57.1 3.92" /><path d="m189.8 9.918-2.6-3.32.8-4.17 2.8 3.31zM190.8 5.738l-3.6.86M184.5-8.712l-.8 3.86.8 3.84M184.5-8.712l.8 3.86-.8 3.84" /><path d="m184.5-1.012-1.8-3.84 1.8-3.86 1.9 3.86zM186.4-4.852h-3.7M178.5.258l-.8 3.86.8 3.84M178.5.258l.8 3.86-.8 3.84" /><path d="m178.5 7.958-1.8-3.84 1.8-3.86 1.9 3.86zM180.4 4.118h-3.7M174.2-10.24l.6 3.908 2 3.36" /><path d="m174.2-10.24 2.1 3.378.5 3.89" /><path d="m176.8-2.972-3-3.03.4-4.238 3.1 3.008zM177.3-7.232l-3.5 1.23M242.7 21.42l.6 3.91 2 3.36" /><path d="m242.7 21.42 2.1 3.38.5 3.89" /><path d="m245.3 28.69-3-3.03.4-4.24 3.1 3.01zM245.8 24.43l-3.5 1.23M163.9-11.65l2.1 3.281.7 3.87" /><path d="m163.9-11.65.7 3.881 2.1 3.27" /><path d="m166.7-4.499.3-4.24-3.1-2.911-.4 4.291zM163.5-7.359l3.5-1.38" /></g></svg>
                
				<div class="container">
					<h2>Our Roadmap</h2>
					<p>The growth of GemCave is powered by all our products you see above. We are constantly adding new features, utility and partnerships to grow the reach and functionality of GemCave Token.</p>
				</div>
				<div style="display:inline-block;width:100%;overflow-y:auto;">
					<ul class="timeline timeline-horizontal">
                        

						<li class="timeline-item">
							<div class="timeline-badge primary">
								✅
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">The Conception</h4>
									<p>Planning, preperation, presale and deployment.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Smart contract development completed using Solidity and the latest libraries</li>
										<li>Gemcave on-chain NFT technology research and development completed</li>
										<li>Contract deployed on Binance Smart Chain network</li>
										<li>First round investor funding completed</li>
										<li>LP Locked</li>
										<li>Initial 16% Supply Burn</li>
										<li>Marketing campaign banner ads designed for PooCoin, Twitter and Reddit</li>
									</ul>
								</div>
							</div>
						</li>

						<li class="timeline-item">
							<div class="timeline-badge primary">
								✅
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">The Launch</h4>
									<p>GemCave Token is released to the public with a bang!</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Full KYC completed as well as over 10 smart contract scanner and audits giving us a green pass!</li>
										<li>GemCave Token open for public trading and instantly hits 1000 holders.</li>
										<li>First NFT series (GemCave DIG) released using our On-chain NFT Technology (all 5000 minted within 3 weeks)</li>
										<li>Launch of our first free to play game - Scratch Card</li>
										<li>Started Telegram community action - Duck Race lovestream games bring in new holders.</li>
										<li>NFT and token marketing campaigns running on PooCoin, 4chan, DexTools.</li>
									</ul>
								</div>
							</div>
						</li>


						<li class="timeline-item">
							<div class="timeline-badge primary">
								✅
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">The First Expansion</h4>
									<p>With an establishing holder base, we started dropping more custom utilities.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Second game released, free for holders - Spin The Wheel.</li>
										<li>Development of custom swap platform released - GemCave Swap</li>
										<li>GemCave tokens can now be staked in our new unique on-chain staking platform - GemCave Stake</li>
										<li>Established partnership with large BSC projects for collaboration and promotion.</li>
										<li>New animated banner ads designed and promoted on major PPC networks.</li>
									</ul>
								</div>
							</div>
						</li>


						<li class="timeline-item">
							<div class="timeline-badge primary">
								✅
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Establishing Products</h4>
									<p>Becoming a name known for bespoke blockchain tech - GemCave continues to deliver.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Fully 3D arcade game that implements GemCave Dig NFTs released - Claw Machine.</li>
										<li>New GemCave Gaming Dashboard released to tie all our games and prizes together into 1 utility.</li>
										<li>Second GemCave NFT series is developed and released after months of planning - GemCave Avatar</li>
										<li>Major media outlet news articles are written and sent for publishing online.</li>
										<li>Another banner ad campaign coupled with AMAs and Twitter live brings GemCave holders to 2000.</li>
									</ul>
								</div>
							</div>
						</li>



						<li class="timeline-item">
							<div class="timeline-badge primary">
								⚙
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Showing Flexibility & Strength</h4>
									<p>The market changes and we adapt to stay strong and relevant.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Tokenomics simplified and taxes are slashed by over 50% to a new permanent low rate.</li>
										<li>First custom accessory addon for GemCave Avatar NFT is released and sold out</li>
										<li>Brand new major GemCave website design showcashing our full utility and product range.</li>
										<li>GemCave Staking v2 released - new staking products, new rewards and much higher returns for holders.</li>
										<li>GemCave Listing v2 website redesign - new competitive style voting mechanism brings partnership projects in.</li>
									</ul>
								</div>
							</div>
						</li>


						<li class="timeline-item">
							<div class="timeline-badge primary">
								⏳
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Expanding Deep Growth</h4>
									<p>Established as a crypto product, service and tech supplier we will expand further to gain new holders.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Mainstream level banner marketing campaign approved and deployed.</li>
										<li>GemCave will get it's first CEX listing, going CEX public for the first time.</li>
										<li>Listing agency cleared for CMC and CoinGecko listing to go live.</li>
										<li>Development and release of 4th GemCave game - Duck Racing</li>
										<li>5000 holder milestone</li>
									</ul>
								</div>
							</div>
						</li>



						<li class="timeline-item">
							<div class="timeline-badge primary">
								⏳
							</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Mainstream Adoption</h4>
									<p>With a completed catalog of powerful custom crypto products, we are ready for huge adoption.</p>
								</div>
								<div class="timeline-body">
									<ul>
										<li>Mainstream CEX listing.</li>
										<li>GemCave NFT staking product released.</li>
										<li>Published mainstream media article published about our groundbreaking NFT technology.</li>
										<li>The 50 Mill Grill - Once we hit $50m market cap there will be a live BBQ event for holders.</li>
										<li>10000 holder milestone</li>
									</ul>
								</div>
							</div>
						</li>
                       
                       
					</ul>
				</div>
			</div>


			<div id="links">
				<div class="container">
					<div class="link-bar">
						<a href="<?= $pancakeLink ?>" target="_blank" title="GemCave on PancakeSwap">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"/><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"/><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"/></svg>
								</div>
								<h4>Pancakeswap</h4>
							</div>
						</a>
                        
						<a href="<?= $pooLink ?>" target="_blank" title="GemCave on PooCoin">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/></svg>
								</div>
								<h4>Chart</h4>
							</div>
						</a>
                        
						<a href="<?= $telegramLink ?>" target="_blank" title="GemCave on Telegram">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"/></svg>
								</div>
								<h4>Telegram</h4>
							</div>
						</a>
                        
						<a href="<?= $bscLink ?>" target="_blank" title="GemCave on BSC Scan">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.7 486.7"><defs/><path d="M33 362.4v78.9c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V302.5l-44.3 44.3A53.7 53.7 0 0133 362.4zM142 301.5v139.8c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V359a53.2 53.2 0 01-36.7-15.6l-41.9-42zM251 350.3v91c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8v-168l-69.9 70c-2.7 2.7-5.6 5-8.7 7zM432.7 170.2L360 242.9v198.4c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V175.7l-4.6-4.2-1.3-1.3z"/><path d="M482.6 41.4c-2.9-3.1-7.3-4.7-12.9-4.7h-1.6l-85.1 4c-3.8.2-9 .4-13.1 4.5a14.9 14.9 0 00-3.1 4.6c-4.2 9 1.7 15 4.5 17.8l7.1 7.2 14.9 14.9-171.6 171.7-77.1-77.1a24.5 24.5 0 00-34.7 0L7.2 286.9a24.5 24.5 0 000 34.7l4.6 4.6a24.5 24.5 0 0034.7 0l80.7-80.7 77.1 77a24.5 24.5 0 0034.8 0L432.7 129l21.9 21.8c2.6 2.6 6.2 6.2 11.7 6.2 2.3 0 4.6-.6 7-2a19 19 0 004.2-3c4.3-4.3 5.1-9.8 5.3-14.1l2.6-55.3 1.3-27.7c.3-5.8-1-10.3-4.1-13.5z"/></svg>
								</div>
								<h4>BSC Scan</h4>
							</div>
						</a>

                    
						<a href="<?= $dexLink ?>" target="_blank" title="GemCave on DexTools">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" data-testid="" fill="#5a5a5a" font-size="40"><path d="M20.245 0L9.634 6.125l3.901 2.262 6.71-3.862 6.71 3.862 3.902-2.262L20.245 0zM26.956 11.586l3.9 2.263v4.526l-6.71 3.862v7.724l-3.9 2.263-3.902-2.263v-7.724l-6.71-3.862v-4.526l3.901-2.263 6.71 3.863 6.71-3.863z"></path><path d="M30.857 21.573V26.1l-3.901 2.262v-4.525l3.9-2.263z"></path><path d="M26.916 31.56l6.71-3.862v-7.724l3.902-2.263v12.25l-10.611 6.125V31.56zM33.627 12.25l-3.902-2.263 3.902-2.263 3.9 2.263v4.525l-3.9 2.263V12.25zM16.344 37.724V33.2l3.901 2.263 3.902-2.263v4.525l-3.902 2.263-3.9-2.263zM13.535 28.361L9.634 26.1v-4.526l3.901 2.263v4.525zM20.245 12.25l-3.9-2.263 3.9-2.263 3.902 2.263-3.902 2.263zM10.765 9.987l-3.9 2.263v4.525l-3.902-2.263V9.987l3.901-2.263 3.901 2.263z"></path><path d="M2.963 17.711l3.901 2.263v7.724l6.71 3.862v4.526L2.963 29.96V17.71z"></path></svg>
								</div>
								<h4>Dextools</h4>
							</div>
						</a>

						<a href="<?= $twitterLink ?>" target="_blank" title="GemCave on Twitter">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"/></svg>
								</div>
								<h4>Twitter</h4>
							</div>
						</a>

						<a href="<?= $instagramLink; ?>" target="_blank" title="GemCave on Instagram">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"/></svg>
								</div>
								<h4>Instagram</h4>
							</div>
						</a>

						<a href="<?= $redditLink; ?>" target="_blank" title="GemCave on Reddit">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
                                    
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><path d="m11.1 7.82.75-3.54a2 2 0 0 1 2.38-1.54l3.2.68A2 2 0 1 1 17 5.38l-3.2-.68-.67 3.13c1.79.14 3.56.73 5.17 1.7a3.2 3.2 0 0 1 4.74 2.67v.02a3.2 3.2 0 0 1-1.2 2.55 2.85 2.85 0 0 1-.02.13c0 4-4.45 7.03-9.8 7.03-5.33 0-9.7-3.03-9.7-6.96a5.31 5.31 0 0 1-.01-.18 3.2 3.2 0 0 1 3.45-5.35 11.45 11.45 0 0 1 5.33-1.62zm9.29 5.52c.4-.2.66-.62.66-1.07a1.2 1.2 0 0 0-2.02-.81l-.58.56-.67-.45a9.81 9.81 0 0 0-5.23-1.77h-1a9.5 9.5 0 0 0-5.25 1.68l-.66.45-.58-.55a1.2 1.2 0 1 0-1.32 1.95l.64.29-.06.7v.58c0 2.7 3.36 5.03 7.71 5.03 4.38 0 7.8-2.34 7.8-5.1a3.31 3.31 0 0 0 0-.52l-.05-.67.6-.3zM7 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm7 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm-1.98 5.1c-1.4 0-2.77-.37-3.89-1.2a.42.42 0 0 1 .6-.6c.95.69 2.12.99 3.27.99s2.33-.28 3.28-.96a.44.44 0 0 1 .74.2.47.47 0 0 1-.12.43c-.69.8-2.49 1.14-3.88 1.14z"/></svg>
								</div>
								<h4>Reddit</h4>
							</div>
						</a>

						<a href="<?= $discordLink; ?>" target="_blank" title="GemCave on Discord">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"><path d="m11.5 13.5-.33.38c.1.08.22.12.35.12l-.02-.5Zm-1.07-1.71a.5.5 0 0 0-.78.62l.78-.62Zm.4-.41-.17-.47h-.02l.2.47Zm-1.74.51-.08-.49.08.5Zm-3.1 0-.1.48.1-.49Zm-1.76-.52-.18.46.18-.46Zm-.88-.41-.28.41.04.03.24-.44Zm-.1-.06.27-.42a.5.5 0 0 0-.05-.03l-.23.45Zm-.05-.04.35-.35a.5.5 0 0 0-.11-.08l-.24.43Zm2.15 1.52a.5.5 0 0 0-.78-.62l.78.62ZM3.5 13.5l-.02.5a.5.5 0 0 0 .35-.13l-.33-.37Zm-3-2.25H0a.5.5 0 0 0 0 .08l.5-.08Zm1.73-8.5-.3-.4a.5.5 0 0 0-.17.23l.47.18ZM5.59 1.5l.5-.05A.5.5 0 0 0 5.61 1l-.02.5Zm-.37 1.3a.5.5 0 0 0 1-.09l-1 .1Zm3.52-.06a.5.5 0 0 0 1 .13l-1-.13Zm.67-1.24L9.39 1a.5.5 0 0 0-.48.44l.5.06Zm3.36 1.26.47-.18a.5.5 0 0 0-.17-.22l-.3.4Zm1.73 8.49.5.08a.5.5 0 0 0 0-.08h-.5ZM6.48 8.8h-.5.5Zm5.02 4.7.33-.38a.8.8 0 0 1-.05-.04 21.35 21.35 0 0 1-1.35-1.3l-.78.63a9.8 9.8 0 0 0 1.34 1.31 29.3 29.3 0 0 0 .17.15h.01l.33-.37Zm.44-3.25c-.46.3-.9.52-1.28.66l.35.94c.45-.17.95-.42 1.48-.76l-.55-.84Zm-1.3.67c-.57.24-1.1.4-1.63.48l.17.99c.6-.1 1.21-.29 1.85-.55l-.4-.92ZM9 11.4a7.9 7.9 0 0 1-2.92-.01l-.18.98a8.9 8.9 0 0 0 3.29.02L9 11.4Zm-2.92 0c-.64-.13-1.2-.32-1.67-.5l-.36.93c.5.2 1.13.4 1.84.54l.2-.98Zm-1.67-.5c-.26-.1-.54-.22-.81-.38l-.5.88c.33.18.66.32.95.43l.36-.93Zm-.78-.36-.1-.06c-.03 0-.02 0 0 0l-.56.83.1.07c.03 0 .02 0 0 0l.56-.84Zm-.16-.09.06.04.02.02-.7.7c.02.03.07.09.17.14l.45-.9Zm-.03-.02a4.7 4.7 0 0 1-.28-.17l-.01-.01-.29.4-.29.42h.01l.03.02a3.9 3.9 0 0 0 .34.21l.49-.87Zm1.13 1.33a9.8 9.8 0 0 1-1.23 1.21l-.12.11-.04.04h-.01l.33.38.33.37h.01l.04-.04a38.04 38.04 0 0 0 .56-.5c.31-.3.7-.68.91-.95l-.78-.62ZM3.52 13c-1.17-.04-1.78-.52-2.11-.96a2.4 2.4 0 0 1-.42-.88l-.49.09-.5.08a1.37 1.37 0 0 0 .03.13l.1.3a3 3 0 0 0 .48.88c.5.67 1.4 1.31 2.87 1.36l.04-1ZM1 11.25c0-1.87.42-3.94.85-5.57a35.45 35.45 0 0 1 .84-2.74l-.46-.18-.47-.18v.02a9.4 9.4 0 0 0-.28.79c-.16.5-.38 1.2-.6 2.04A24.05 24.05 0 0 0 0 11.25h1Zm1.53-8.1A5.94 5.94 0 0 1 5.58 2l.01-.5.01-.5a.85.85 0 0 0-.1 0c-.05 0-.13 0-.24.02a6.94 6.94 0 0 0-3.34 1.34l.6.8Zm2.57-1.6.12 1.26 1-.1-.13-1.26-1 .1Zm4.63 1.32.17-1.3-.99-.13-.17 1.3 1 .13ZM9.41 1.5V2a.5.5 0 0 1 .05 0l.18.01c.16.02.4.05.68.12a5.9 5.9 0 0 1 2.15 1.03l.6-.8A6.94 6.94 0 0 0 9.5 1a2.53 2.53 0 0 0-.1 0v.5Zm3.36 1.26-.46.17v.01l.01.04a16.07 16.07 0 0 1 .25.72c.16.48.37 1.17.58 1.98.43 1.63.85 3.7.85 5.57h1c0-2-.44-4.17-.88-5.82a36.51 36.51 0 0 0-.86-2.79l-.01-.04v-.01l-.48.17Zm1.73 8.49-.5-.08v.05a2.4 2.4 0 0 1-.4.82c-.34.44-.95.92-2.12.96l.04 1a3.56 3.56 0 0 0 2.87-1.36 3.4 3.4 0 0 0 .6-1.3v-.01l-.49-.08ZM5.26 6.97c-1 0-1.72.87-1.72 1.83h1c0-.5.35-.83.72-.83v-1ZM3.54 8.8c0 .97.73 1.83 1.72 1.83v-1c-.36 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.72-.87 1.72-1.83h-1c0 .5-.36.83-.72.83v1Zm1.72-1.82a1.77 1.77 0 0 0-1.72-1.84v1c.37 0 .73.34.72.82l1 .02Zm2.65-1.84c-1 0-1.72.87-1.72 1.83h1c0-.5.36-.83.72-.83v-1ZM7.91 8.8c0 .97.74 1.83 1.72 1.83v-1c-.35 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.73-.87 1.73-1.83h-1c0 .5-.36.83-.73.83v1Zm1.73-1.83c0-.96-.73-1.83-1.73-1.83v1c.37 0 .73.33.73.83h1ZM3.74 4.44A7.83 7.83 0 0 1 7.5 3.28c1.15 0 2.32.37 3.76 1.16l.48-.88A8.74 8.74 0 0 0 7.5 2.28a8.8 8.8 0 0 0-4.24 1.28l.48.88Z"/></svg>
								</div>
								<h4>Discord</h4>
							</div>
						</a>

						<a href="<?= $gitHubLink; ?>" target="_blank" title="GemCave on GitHub">
							<div class="link-splat">
								<svg xmlns="http://www.w3.org/2000/svg" id="svg3031" version="1.1" viewBox="0 0 8.3 8.35"><g id="layer1" transform="translate(127.37 90.35)"><path id="path1303-2" d="M-123.42-90.25h-.12c-.63.07-.46.47-1 .64-.6.2-.84-.1-1.2.22-.47.4-.16.66-.53 1.03-.36.37-.72.3-.83.91-.1.5.12.59.14 1.05.02.47-.43.66-.3 1.15s.59.53.74.9c.16.36-.02.76.35 1.14.4.4.57.15 1.04.3s.34.7 1.03.8c.69.1.63-.21 1.16-.28.5-.06.73.35 1.2.12.46-.24.39-.8.9-.97.53-.18.79-.1 1-.55.21-.45-.1-1 .28-1.34.37-.34.54-.85.26-1.23-.3-.4-.38-.5-.26-1.05.13-.6-.17-1.04-.63-1.1-.41-.06-.45-.27-.64-.78-.2-.5-.65-.63-1.1-.52-.44.12-.62.02-.87-.15-.22-.15-.37-.28-.62-.29z"/></g></svg>
							</div>
							<div class="link-item addShowTop">
								<div class="link-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 .396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183.803.151 1.093-.344 1.093-.772 0-.38-.009-1.385-.015-2.719-4.453.964-5.391-2.151-5.391-2.151-.729-1.844-1.781-2.339-1.781-2.339-1.448-.989.115-.968.115-.968 1.604.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328.14-1.031.557-1.74 1.011-2.135-3.552-.401-7.287-1.776-7.287-7.907 0-1.751.62-3.177 1.645-4.297-.177-.401-.719-2.031.141-4.235 0 0 1.339-.427 4.4 1.641a15.436 15.436 0 0 1 4-.541c1.36.009 2.719.187 4 .541 3.043-2.068 4.381-1.641 4.381-1.641.859 2.204.317 3.833.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891.556.479 1.077 1.464 1.077 2.959 0 2.14-.02 3.864-.02 4.385 0 .416.28.916 1.104.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"/></svg>
								</div>
								<h4>GitHub</h4>
							</div>
						</a>


					</div>
				</div>
			</div>



			<div id="taxes">

				<svg class="diamond-bg">
					<defs>
						<pattern id="polka-dots" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
						<g style="fill:#af9ce3;stroke:#c0bcf7;fill-opacity:1;stroke-linecap:round;stroke-width:12;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;">


						<path d="M384.1 379.5c-6.3 0-12.2-2.7-16.1-7.6L179.3 141.4a21.4 21.4 0 0 1-1.3-24.8l67.4-103.1a20.6 20.6 0 0 1 17.2-9.4h242.7c6.9 0 13.5 3.5 17.3 9.4l67.3 103.1a21 21 0 0 1-1.3 24.8L400 371.9c-4 4.9-9.9 7.6-15.9 7.6z" transform="translate(-22 .9) scale(.1344)"/><g><path d="M218.5 1.4c-1.9 1-3.6 2.5-4.8 4.3l-41.1 63a12.4 12.4 0 0 0-2 7.8h96.9zM329 76.5h97a13 13 0 0 0-2.1-7.9L382.8 5.7a12.6 12.6 0 0 0-4.8-4.3Z" transform="matrix(.2203 0 0 .2203 -36.1 1.4)"/></g><path transform="matrix(.2203 0 0 .2203 -36.1 1.4)" d="m248.5 76.5 49.8 152.6 50-152.6zM298.3 0h-.1l-50 76.5h100.1z"/><path  d="M823.8 775.9c-6.2 0-12.1-2.6-16.1-7.5L619.1 537.8a21.4 21.4 0 0 1-1.3-24.8l67.3-103.1a20.5 20.5 0 0 1 17.3-9.3h242.7c6.9 0 13.4 3.4 17.2 9.3L1030 513c5 7.7 4 17.7-2 24.8L839.7 768.4a20.2 20.2 0 0 1-15.9 7.5z" transform="translate(-22 .9) scale(.1344)"/><g><path d="M218.5 1.4c-1.9 1-3.6 2.5-4.8 4.3l-41.1 63a12.4 12.4 0 0 0-2 7.8h96.9zM329 76.5h97a13 13 0 0 0-2.1-7.9L382.8 5.7a12.6 12.6 0 0 0-4.8-4.3Z" transform="matrix(.2203 0 0 .2203 23 54.7)"/></g><path transform="matrix(.2203 0 0 .2203 23 54.7)" d="m298.3 229.1 50-152.6h-99.8zM348.3 76.5 298.3 0h-.1l-50 76.5z"/>
                            
						</g>
						</pattern>
					</defs>
					<rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"></rect>
				</svg>


            
				<div class="container">
					<h1>Token Taxes</h1>
					<p>GemCave Token has a clear and simple tax structure to ensure market stability and to fund marketing and further development of features within the GemCave platform.</p>

					<div class="roadmap-cont">
                        
						<div class="roadmap-box">
							<div class="roadmap-title">
								<h4>Buy Tax</h4>
							</div>
							<div class="roadmap-item">
								1% Instant Burn<br>
								2% Marketing & Development<br>
								2% Liquidity Pool Fund
							</div>
						</div>
						<div class="roadmap-box">
							<div class="roadmap-title">
								<h4>Sell Tax</h4>
							</div>
							<div class="roadmap-item">
								1% Instant Burn<br>
								2% Marketing & Development<br>
								2% Liquidity Pool Fund
							</div>
						</div>
						<div class="roadmap-box">
							<div class="roadmap-title">
								<h4>Transfer Tax</h4>
							</div>
							<div class="roadmap-item" style="border:none;">
								1% Instant Burn<br>
								2% Marketing & Development<br>
								2% Liquidity Pool Fund
							</div>
						</div>
					</div>
				</div>
			</div>

            
			<div id="whitepaper">                
				<div class="container">
					<div class="left">
						<h2>The GemCave Whitepaper</h2>
						<p>Get more information on the vision and goals of GemCave via our whitepaper.</p>
						<a href="https://gemcave.org/WhitePaper.pdf" class="button">Whitepaper PDF</a>
					</div>
					<div class="dancer">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2000 2000">
							<defs>
								<filter style="color-interpolation-filters:sRGB" id="exa">
								<feColorMatrix type="hueRotate" values="55" result="color1"/>
								<feColorMatrix type="saturate" values="2" result="color2"/>
								</filter>
							</defs>
							<g transform="translate(280 250)" style="filter:url(#exa)">
								<animateTransform attributeName="transform" attributeType="XML" dur="5s" repeatCount="indefinite" type="translate" values="280 250;250 126;250 126;205 280;300 250;106 280;280 250" keySplines="0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1" keyTimes="0;0.22;0.33;0.55;0.66;0.88;1" calcMode="spline"/>
								<path d="m468 769 282 414 284-414-284-414z" style="fill:#00a19a"/>
								<path d="M751 334v435H453z" style="fill:#038c82"/>
								<path d="M751 1204V769h298z" style="fill:#07dbc6"/>
								<path d="m591 769 159 233 160-233-160-233z" style="fill:#02bcae"/>
								<path d="m452 769 297 435 298-435-298-435z" style="fill:none;stroke-miterlimit:10;stroke-width:25.3;stroke:#015650"/>
							</g>
							<g transform="translate(-100 -100)" style="filter:url(#exa)">
								<g transform="translate(10 12)" style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:20;stroke:#015650">
									<animateTransform attributeName="transform" attributeType="XML" dur="5s" repeatCount="indefinite" type="translate" values="140 120;75 140;120 105;150 140;209 120;115 140;140 120" keySplines="0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1;0.42 0 0.58 1" keyTimes="0;0.22;0.33;0.55;0.66;0.88;1" calcMode="spline"/>
									<path d="M985 893a74.1 74.1 0 0 1-148.2 0 73.8 73.8 0 0 1 72.7-73.9A74.4 74.4 0 0 1 985 893z" style="fill:#fff"/>
									<path d="M930 893c0 13.8-9.1 25.3-21.2 25.3-12 0-21.1-11.5-21.1-25.3 0-13.9 9.1-25.3 21.1-25.3 12.1 0 21.2 11.4 21.2 25.3" style="fill:#015650;stroke:none" stroke="none"/>
									<path d="M1205 893c0 41-33 73.8-75 73.8-40 0-73-33.1-73-73.8s33-73.9 73-73.9c42 0 75 33.2 75 73.9z" style="fill:#fff"/>
									<path d="M1151 893c0 13.8-9 25.3-21 25.3-13 0-22-11.5-22-25.3 0-13.9 9-25.3 22-25.3 12 0 21 11.4 21 25.3" style="fill:#015650;stroke:none" stroke="none"/>
									<path d="M985 893h72.4M991 991h69.4M1063 967v48.1"/>
								</g>
							</g>
						</svg>
					</div>
					<div class="right">
						<h2>GemCave on Medium.com</h2>
						<p>You can find more in-depth articles about our approach and what our new technology and products offer in the articles on our Medium account.</p>
						<a href="https://medium.com/@gemcavecoin" class="button">GemCave Medium</a>
					</div>
				</div>
			</div>

			<div id="distribution" class="odd">

				<svg class="diamond-bg">
					<defs>
						<pattern id="polka-dots" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
						<g style="fill:#af9ce3;stroke:#c0bcf7;fill-opacity:1;stroke-linecap:round;stroke-width:12;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;">


						<path d="M384.1 379.5c-6.3 0-12.2-2.7-16.1-7.6L179.3 141.4a21.4 21.4 0 0 1-1.3-24.8l67.4-103.1a20.6 20.6 0 0 1 17.2-9.4h242.7c6.9 0 13.5 3.5 17.3 9.4l67.3 103.1a21 21 0 0 1-1.3 24.8L400 371.9c-4 4.9-9.9 7.6-15.9 7.6z" transform="translate(-22 .9) scale(.1344)"/><g><path d="M218.5 1.4c-1.9 1-3.6 2.5-4.8 4.3l-41.1 63a12.4 12.4 0 0 0-2 7.8h96.9zM329 76.5h97a13 13 0 0 0-2.1-7.9L382.8 5.7a12.6 12.6 0 0 0-4.8-4.3Z" transform="matrix(.2203 0 0 .2203 -36.1 1.4)"/></g><path transform="matrix(.2203 0 0 .2203 -36.1 1.4)" d="m248.5 76.5 49.8 152.6 50-152.6zM298.3 0h-.1l-50 76.5h100.1z"/><path  d="M823.8 775.9c-6.2 0-12.1-2.6-16.1-7.5L619.1 537.8a21.4 21.4 0 0 1-1.3-24.8l67.3-103.1a20.5 20.5 0 0 1 17.3-9.3h242.7c6.9 0 13.4 3.4 17.2 9.3L1030 513c5 7.7 4 17.7-2 24.8L839.7 768.4a20.2 20.2 0 0 1-15.9 7.5z" transform="translate(-22 .9) scale(.1344)"/><g><path d="M218.5 1.4c-1.9 1-3.6 2.5-4.8 4.3l-41.1 63a12.4 12.4 0 0 0-2 7.8h96.9zM329 76.5h97a13 13 0 0 0-2.1-7.9L382.8 5.7a12.6 12.6 0 0 0-4.8-4.3Z" transform="matrix(.2203 0 0 .2203 23 54.7)"/></g><path transform="matrix(.2203 0 0 .2203 23 54.7)" d="m298.3 229.1 50-152.6h-99.8zM348.3 76.5 298.3 0h-.1l-50 76.5z"/>
                            
						</g>
						</pattern>
					</defs>
					<rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"></rect>
				</svg>
                
				<div class="container">
					<h1>Token Distribution</h1>
					<p>GemCave Token has a clear and simple tax structure to ensure market stability and to fund marketing and further development of features within the GemCave platform.</p>

					<div class="roadmap-cont">
                        
						<div class="roadmap-box">
							<div class="roadmap-title">
								<h4>Initial Supply Distribution</h4>
							</div>
							<div class="roadmap-item">
								<strong>40 trillion</strong> (40% of total supply) GEMS locked into PCS LP.
							</div>
							<div class="roadmap-item">
								<strong>31 trillion</strong> (31% of total supply) GEMS distributed to private sale buyers.
							</div>
							<div class="roadmap-item">
								<strong>4 trillion</strong> (4% of total supply) GEMS stored in project owner wallets.
							</div>
							<div class="roadmap-item">
								<strong>25 trillion</strong> (25% of total supply) GEMS have been burnt.
							</div>
						</div>


						<div class="roadmap-stack roadmap-box">
							<div class="roadmap-box" style="flex: 1;">
								<div class="roadmap-title">
									<h4>Liquidity Pool</h4>
								</div>
								<div class="roadmap-item">
									We have <strong>locked 35BNB</strong> into the PancakeSwap liquidity pool along with <strong>40 trillion GEMS</strong> (40% of total supply) using a verified <a href="https://www.team.finance/view-coin/0x0000000000000000000000000000000000000000?name=GemCave%20Token&symbol=GEMS" target="_blank">team.finance locker</a>.
								</div>
							</div>

							<div class="roadmap-box" style="flex:unset;">
								<div class="roadmap-title">
									<h4>Staking Pools</h4>
								</div>
                                
								<div class="roadmap-item">
									Currently <strong>5.5 trillion</strong> (5.5% of total supply) GEMS are currently <b>locked</b> into <a href="stake.gemcave.org/" target="_blank">GemCave Staking</a> options. These GEMS are locked in the <a href="https://bscscan.com/address/0x0000000000000000000000000000000000000000" target="_blank">GemSave Stake Holds Wallet</a>.
								</div>
								<div class="roadmap-item">
									To payout rewards for our staking products, we have allocated <strong>2 trillion</strong> (2% of total supply) tokens to a <a href="https://bscscan.com/address/0x0000000000000000000000000000000000000000" target="_blank">dedicated reward wallet</a> locked for staking rewards only.
								</div>
							</div>
						</div>

                        
                   
						<div class="roadmap-box">
							<div class="roadmap-title">
								<h4>Burn Events</h4>
							</div>
							<div class="roadmap-item">
								Initial Burn - <a href="https://bscscan.com/tx/0xc94ff8f4ecc2ac36ae955b31bbf87c64bf4f2d6f95f19ed2a1397fe1a891521f" target="_blank"><strong>16 trillion</strong> (16% of total supply) GEMS burnt</a>
							</div>
							<div class="roadmap-item">
								$500k MC Burn - <a href="https://bscscan.com/tx/0xd8e569a952b83a92893b943d2b84529622e07869a4107fb267f7ef63c3beaf90" target="_blank"><strong>1 trillion</strong> (1% of total supply) GEMS burnt</a>
							</div>
							<div class="roadmap-item">
								$1m MC Burn - <a href="https://bscscan.com/tx/0xd8e569a952b83a92893b943d2b84529622e07869a4107fb267f7ef63c3beaf90" target="_blank"><strong>1 trillion</strong> (1% of total supply) GEMS burnt</a>
							</div>
							<div class="roadmap-item">
								Bonus Burn - <a href="https://bscscan.com/tx/0xabf56c7ea381ce95f5118de36b2fa76e935a4f9a84bc4f6aa6e86216a31a77ee" target="_blank"><strong>500 billion</strong> (0.5% of total supply) GEMS burnt</a>
							</div>
							<div class="roadmap-item">
								Awaiting Burn - <strong>4.5 trillion</strong> (4.5% of total supply) GEMS awaiting burn
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'footer.php'; ?>
        
		<script src="/js/vendor/jquery.js"></script>
		<script src="/js/vendor/slick.min.js"></script>
		<script src="/js/main.js?cb=1661211037457"></script>
		<script src="/js/web.js?cb=1661211037457"></script>

		<?= $tracking ?>
        
	</body>
</html>