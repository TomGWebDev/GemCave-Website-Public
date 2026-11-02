<?php
	include '../token/config.php';

	$nftID = '0x0000000000000000000000000000000000000000';
?>

<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Avatar NFT - Item Tool</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/style.css?cb=1659307490191">
		<link rel="stylesheet" href="/css/slick.css?cb=1659307490191">

		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
		<meta name="application-name" content="&nbsp;"/>
		<meta name="msapplication-TileColor" content="#FFFFFF" />
		<meta name="msapplication-TileImage" content="mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;400;700;900&family=Modak&display=swap" rel="stylesheet">
	</head>
	<body id="avatar">
		<header>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="topbg" viewBox="0 0 2000 400">
				<path d="M449 171.5c103.6-51.3 443.4 36.2 613 44.8 191 9.6 426-64 614-24.5 188 39.4 86-20.9 325 37.2V0H0v233.9c189.1 4.4 263.8 29.1 449-62.4z" style="fill:#54327e"/>
				<g id="a" transform="matrix(.6999 0 0 .8183 42.8 137.7)">
					<path d="M33 .2.5 63.2 33 134.3l32.5-72.3z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;-10 10;0 0;10 0;0 0;0 -5;0 0"
						dur="7s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="b" transform="translate(1905 67.9)">
					<path d="M33.5.7 1 63.7l32.5 71.2L66 62.6z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;-10 10;0 0;10 -10;0 0;-10 -10;0 0"
						dur="7s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="c" transform="translate(1600 69.2)">
					<path d="M32.5.7 0 63.6l32.5 71.3L65 62.5z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;10 10;0 0;10 10;0 0;10 -10;0 0"
						dur="6s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="d" transform="translate(682 80)">
					<path d="M23.6.6 0 46.2l23.6 51.6L47 45.4z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;0 10;0 0;-10 -10;0 0;10 -10;0 0"
						dur="10s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="e" transform="translate(1848 41)">
					<path d="M19.3.3.4 29.3l18.9 32.9L38 28.8z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;10 0;0 0;10 0;0 0;-10 10;0 0"
						dur="11s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="f" transform="translate(1831 151)">
					<path d="M15.2.4.7 22.8 15.2 48l14.6-25.7z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;5 -8;0 0;-10 10;0 0;-10 10;0 0"
						dur="10s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="g" transform="translate(1740 91.3)">
					<path d="M14.7.4.2 22.8 14.7 48l14.6-25.7z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;0 -9;0 0;10 -10;0 0;10 0;0 0"
						dur="7s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="h" transform="translate(491 82)">
					<path d="M14.8.4.2 22.8l14.6 25.4 14.5-25.8z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;-10 -10;0 0;10 -10;0 0;10 0;0 0"
						dur="9s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="i" transform="translate(522 19)">
					<path d="M14.5.4.7 20 14.5 42l13.8-22.4z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;10 0;0 0;-10 -10;0 0;-10 0;0 0"
						dur="10s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="j" transform="translate(59.5 59.7)">
					<path d="M15.5.5 1 22.8l14.5 25.4L30 22.5z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;0 -5;0 0;-10 -10;0 0;10 10;0 0"
						dur="11s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<g id="k" transform="translate(300.1 61)">
					<path d="M42.4.2 0 82.2 42.4 175l42.3-94.2z" style="fill:#8accca"/>
					<animateTransform attributeName="transform"
						attributeType="XML"
						type="translate"
						values="0 0;-10 10;0 0;10 0;0 0;0 -5;0 0"
						dur="12s"
						additive="sum"
						fill="freeze"
						repeatCount="indefinite"/>
				</g>
				<path d="M2427 107.3s-2 .6-2 1.5v4.1c-1 3.6-2 8.7-2 14.8-2 6-2 13.2-2 20.8-1 1.9-1 3.9-1 5.8v8.8l-3-1.5c-1-.9-2-1.9-5-2.7-5-3.3-12-6.2-17-8.6-6-2.4-10-4.2-12-5.4-3-.6-4-1-4-1.3l-2-.4s0 .4 2 1.1c0 .5 1 1.6 2 2.6 3 2.4 6 5.6 11 9.2 4 3.6 9 7.8 15 11.9 1 1.1 2 2 5 3.1 1 1 3 2.1 4 3 0 .3 1 .7 1 1l-6 6.4c0 1.2-2 2.5-3 3.8-1 1.2-3 2.6-4 3.8-5 5-9 10-12 14.4-4 4.2-7 8-8 10.8-1 1.3-1 2.4-3 3.2v.4a79 79 0 0 0 15-9.5 77 77 0 0 0 15-11.6c1-1.1 2-2.3 4-3.5 1-1 2-2.2 4-3.4 0-.3 1-.6 1-.9v1.5c0 1.9 0 3.9 1 5.8 0 7.6 0 14.8 2 20.8 0 6.1 1 11.2 2 14.8v4.1c0 .9 2 1.5 2 1.5v-5.6c1-3.6 2-8.7 2-14.8 2-6 2-13.2 3-20.8V184c1 .7 3 1.4 4 2.1l4 2.8c1 .8 4 1.8 5 2.6 7 3.4 12 6.4 18 8.8 5 2.2 9 4.1 13 5.3 1 .5 3 .9 4 1.2 0 .3 1 .4 1 .4s-1-.3-1-.9c-1-.7-1-1.6-3-2.8-2-2.3-6-5.6-10-9.2-6-3.6-11-7.8-16-11.8l-4-3.2-6-3c-1-1.2-3-2.2-5-3.3l3-2.2c1-1.2 2-2.5 4-3.7 4-5.1 8-10 12-14.4 4-4.3 6-8 8-10.8 1-1.4 1-2.4 2-3.2v-1.1l-1 .5c0 .6-1 1.2-3 2-2 1.8-6 4.3-12 7.6-4 3.2-9 7.2-14 11.6l-3 2.3v-13.1c-1-7.6-1-14.8-3-20.8 0-6.1-1-11.2-2-14.8v-5.6z" style="fill:#fff;stroke-width:1.33333" transform="scale(.75)"/>
				<path d="M257.1 212.5v-.8l.5-2.3.9-8.3c.4-3.5.7-7.4.9-11.7l.1-3.4.1-3.3v-2l1.7 1.1 2.2 1.5a182.7 182.7 0 0 0 14.5 8l1.7.8.7.2-.5-.5-1.3-1.6c-1.3-1.2-2.9-3-5.1-5-2.2-2-4.7-4.3-7.5-6.6l-2.2-1.7-2.2-1.8-.9-.6 3.2-3.8 1.8-2.2 1.7-2.2a134 134 0 0 0 9.8-13.9l1.1-1.8.3-.6-.6.3-1.5 1.2a101.3 101.3 0 0 0-14.2 12.8l-1.9 2-.8.9-.1-1.4-.1-3.4c-.2-4.3-.5-8.2-.9-11.6l-.9-8.3-.5-2.4v-.8l-.2.8-.4 2.4a277.8 277.8 0 0 0-1.8 19.9l-.1 3.4-.1 3.3v.7l-2.1-1.4-2.3-1.6a175.1 175.1 0 0 0-10.6-6.4l-6.1-3.1-1.8-.7a6 6 0 0 0-.7-.3l.5.6 1.4 1.5a120.5 120.5 0 0 0 12.6 11.7l2.1 1.7 2.2 1.7 2.6 1.9-1.2 1.5-1.8 2.2a311 311 0 0 0-9.8 14l-1 1.8-.4.6.6-.3 1.5-1.2a101.4 101.4 0 0 0 12.3-10.9l1.9-1.9.1 1.5.1 3.3.1 3.4a296.3 296.3 0 0 0 1.8 20l.4 2.3z" style="fill:#fff;stroke-width:.476638"/>
				<path d="M893.5 20.7v1.9c0 1.2-1 3-1 5.3 0 4.6-1 11-2 19-1 7.9-1 17-2 26.8v15.2c-1 2.2-1 4.4-1 6.5l-6-3.4-6-3.5c-8-4.4-15-8.4-22-11.6-7-3.3-12-6-16-7.5-2-1-4-1.4-5-1.8-1-.6-2-.7-2-.7s1 .4 2 1.2c0 .8 2 2 3 3.3 4 2.8 8 6.8 14 11.4 6 4.5 13 9.6 21 14.8l6 3.8 6 4 3 2.5-9 9.5c-2 1.6-4 3.2-5 5-2 1.6-3 3.2-5 4.8-6 6.5-12 12.6-16 18.1a99 99 0 0 0-11 13.5c-1 1.6-2 3-3 3.8-1 1-1 1.5-1 1.5s1-.3 1-.9c1-.7 3-1.5 5-2.7 3-2.4 8-5.9 14-10.3 5-4.2 12-9.6 18-15.3 2-1.5 4-2.9 5-4.5l6-4.6 4-3.7v13.2c0 9.9 1 19.1 2 26.9 1 7.9 2 14.4 2 19 0 2.4 1 4.1 1 5.3v1.9s1-.7 1-1.9 0-2.9 1-5.3c0-4.6 1-11.1 2-19 1-7.8 1-17 2-26.9v-18.7c3 1.4 5 2.9 7 4.3 3 1.2 5 2.4 7 3.6l6 3.3c8 4.6 16 8.6 23 11.8 6 3.2 12 5.7 16 7.4 1 .8 4 1.5 4 1.9l2 .7s-1-.6-1-1.2c-1-.8-3-2-4-3.5-4-2.8-8-6.8-15-11.2-5-4.5-12-9.6-20-14.8-2-1.3-3-2.7-5-4l-6-4c-3-1.7-6-3.4-8-5.1l4-4.4c1-1.7 3-3.3 5-5 6-6.3 12-12.6 16-18 5-5.4 8-10.2 10-13.5 2-1.6 3-3 3-4 1-.8 1-1.3 1-1.3s0 .3-1 .9c-1 .6-3 1.5-4 2.7-4 2.4-8 5.8-15 10.2-5 4.3-11 9.6-18 15.4-2 1.4-3 2.9-5 4.5 0 .5-1 1-2 1.6V73.7c-1-9.7-1-19-2-26.8-1-8-2-14.4-2-19-1-2.3-1-4.1-1-5.3 0-1.3-1-2-1-2zM1579 54.1v3.3c-2 2-2 5-3 8.5 0 3.6 0 7.7-1 12.1v11.3l-3 .3c-3 .4-5 .9-8 1.5-3 .5-4 1.2-5 1.7-2 .5-2 .9-2 .9s0 .4 2 1c1 .5 2 1.2 5 1.7l8 1.5 3 .2v7.6c1 4.4 1 8.5 1 12.1 1 3.5 1 6.4 3 8.5v3.2s1-.2 1-.8v-2.4c1-2.1 1-5 3-8.5 0-3.6 0-7.7 1-12.1V98.3c3-.1 4-.2 5-.4 3-.4 6-1 7-1.4 3-.6 4-1.3 5-1.8l3-1-3-1c-1-.4-2-1.1-5-1.7-1-.5-4-1.1-7-1.4-1-.1-2-.4-5-.4V78c-1-4.4-1-8.5-1-12-2-3.6-2-6.6-3-8.6V55c0-.6-1-.9-1-.9z" style="fill:#fff"/>
				<path d="m160.3 167.6-.8 2-1.6 5.2c-.4 2.3-.9 4.8-1.1 7.4-.3 1.4-.3 2.8-.3 4.2l-.2 2.4-1.5.1c-2 .2-3.9.6-5.4 1l-3.8 1.3-1.5.8 1.5.6 3.8 1.3a51 51 0 0 0 7.1 1.2c0 1.5 0 2.8.3 4.2.2 2.7.7 5.2 1.1 7.4.6 2.1 1.1 4 1.6 5.2.4 1.3.8 2 .8 2l.7-2a67.4 67.4 0 0 0 3.1-16.6 57.2 57.2 0 0 0 12.1-2.7l1.4-.6-1.4-.8-3.8-1.3c-2.3-.6-5.2-1.1-8.2-1.3l-.1-2.2-.4-4.2a76.3 76.3 0 0 0-2.7-12.6l-.7-2z" style="fill:#fff;stroke-width:.786295"/>
				<path d="m277.5 24.7-.9 3a99.8 99.8 0 0 0-3.2 19L273 53v3.8l-2.5.3a44.7 44.7 0 0 0-11.9 3.2l-1.9 1 1.9.9 4.9 1.7c2 .6 4.4 1 7 1.5l2.5.2v.3l.4 6.3a130.8 130.8 0 0 0 4.1 22l1-3.1a87.4 87.4 0 0 0 3.2-19c.2-2 .4-4 .4-6.2v-.1c4.1-.3 8.1-1 11.3-1.9 2-.6 3.7-1.2 4.8-1.7 1.2-.5 1.9-1 1.9-1l-1.9-.9a42.6 42.6 0 0 0-16-3.7l-.1-3.6a103.9 103.9 0 0 0-3.6-25.2l-1-3zM323.3 18.8l-.8 1.5c-.4 1-.9 2.3-1.3 4-.4 1.6-.9 3.5-1.2 5.6l-.3 3.2v2h-1.9a62.3 62.3 0 0 0-9.2 1.7l-1.4.4 1.4.5a42.3 42.3 0 0 0 9.2 1.6l1.9.2v.1l.3 3.2c.3 2 .8 4 1.2 5.7a28.2 28.2 0 0 0 2.1 5.5l.7-1.6 1.5-4 1-5.6c.2-1 .3-2 .3-3.2a61.5 61.5 0 0 0 12.5-1.9l1.4-.5-1.4-.5c-.8-.2-2.2-.6-3.8-.8-2.4-.5-5.5-.8-8.6-1l-.1-1.8c0-1.1-.1-2.2-.3-3.2l-1-5.7-1.5-4-.7-1.5z" style="fill:#fff"/>
				<path d="M1695 12.2s0 1-2 2.9c0 1.9-1 4.7-1 7.9s-1 7-1 11v10.1l-3 .3c-3 .3-5 .8-7 1.4-2 .6-4 1.3-5 1.8-1 .6-3 1-3 1s2 .4 3 .9 3 1.2 5 1.7c2 .6 4 1.1 7 1.5l3 .2v6.6c0 4.1 1 7.9 1 11.2 0 3.2 1 5.9 1 7.7 2 2 2 3.1 2 3.1s0-1 1-3c0-2 1-4.6 1-7.8 2-3.3 2-7 2-11.2v-6.3c4-.3 8-1 12-2 1-.5 4-1.2 5-1.7 0-.6 1-1 1-1s-1-.4-1-.9c-1-.5-4-1.2-5-1.9-3-.8-7-1.4-11-1.7 0-1.3-1-2.5-1-3.7V34c0-4 0-7.9-2-11 0-3.3-1-6-1-8-1-1.8-1-2.9-1-2.9z" style="fill:#fff"/>
				<path d="M474.6 80.5v-.8l.5-2.3.9-8.3c.4-3.5.7-7.4.9-11.7l.1-3.4.1-3.3v-2l1.7 1.1 2.2 1.5a182.7 182.7 0 0 0 14.5 8l1.7.8.7.2-.5-.5-1.3-1.6c-1.3-1.2-2.9-3-5.1-5-2.2-2-4.7-4.3-7.5-6.6l-2.2-1.7-2.2-1.8-.9-.6 3.2-3.8 1.8-2.2 1.7-2.2a134 134 0 0 0 9.8-13.9l1.1-1.8.3-.6-.6.3-1.5 1.2a101.3 101.3 0 0 0-14.2 12.8l-1.9 2-.8 1-.1-1.5-.1-3.4c-.2-4.3-.5-8.2-.9-11.6l-.9-8.3-.5-2.4v-.8l-.2.8-.4 2.4a277.8 277.8 0 0 0-1.8 19.9l-.1 3.4-.1 3.3v.7l-2.1-1.4-2.3-1.6a175.1 175.1 0 0 0-10.6-6.4l-6.1-3-1.8-.8a6 6 0 0 0-.7-.3l.5.6 1.4 1.5a120.5 120.5 0 0 0 12.6 11.7l2.1 1.7 2.2 1.7 2.6 2-1.2 1.4-1.8 2.2a311 311 0 0 0-9.8 14l-1 1.8-.4.6.6-.3 1.5-1.2A101.4 101.4 0 0 0 470 51.1l1.9-1.9.1 1.5.1 3.3.1 3.4a296.3 296.3 0 0 0 1.8 20l.4 2.3z" style="fill:#fff;stroke-width:.476505"/>
			</svg>

			<div class="container">
				<div class="logo-top">
					<img src="img/logo.png" class="logo-top-img" />
				</div>
				<div class="header-intro">
					<h4>Powered by GemCave NFT technology</h4>
					<h1>Avatar Item Dashboard</h1>
					<p>Upgrade your Avatar NFTs with rare badges, items and effects here that will appear instantly. Items can only be applied to one Avatar NFT, and if your Avatar owns multiple items you can switch between them anytime using this tool.</p>
				</div>
			</div>
		</header>

		<main id="avatar-items">
			<div class="container">
				<div class="row">

					<div class="complete-item">
						<div class="container">
							<h2>Transaction initiated</h2>
							<p>Please approve the transaction in your wallet to apply the item to your Avatar.</p>
							<p>Once the transaction has been approved and confirmed, you will see your new Avatar NFT below!</p>
							<p><div class="newload"><svg xmlns="http://www.w3.org/2000/svg" style="margin:auto;width:150px;display:block;shape-rendering:auto" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(30 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(60 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(90 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(120 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(150 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(180 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(210 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(240 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(270 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(300 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fff" transform="rotate(330 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"/></rect></svg></div></p>
							<div class="newavi"></div>
							<div class="button closecom">Close</div>
						</div>
					</div>

					<div class="mint-box">
						<div class="mint-info">
							<h2>1. Connect Wallet</h2>
							<p>Click the button below to connect to your WEB3 wallet provider, if on mobile use Metamask or TrustWallet browsers:</p>
							<p><div class="button" id="connect">Connect</div></p>
							<p class="connected">Connected!</p>
						</div>
					</div>

					<div class="mint-box">
						<div class="mint-info">
							<h2>2. Select Avatar</h2>
							<p>Once connected and loaded, click to select the Avatar NFT you wish to accessorise below:</p>
							<div id="my-avatars">
								<div class="svg-holder"></div>
								<div class="svg-holder"></div>
								<div class="svg-holder"></div>
								<div class="svg-holder"></div>
							</div>
						</div>
					</div>

					<div class="mint-box">
						<div class="mint-info">
							<h2>3. Install Item</h2>
							<p>You can see all the items owned by your Avatar below. Click an item to install it onto your Avatar.</p>
							<div id="my-items">
								<div class="item-row itemno-1">
									<div class="item-no">1</div>
									<div class="item-name">?????</div>
									<div class="item-status">Whitelist Badge</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-2">
									<div class="item-no">2</div>
									<div class="item-name">?????</div>
									<div class="item-status">No Item</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-3">
									<div class="item-no">3</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-4">
									<div class="item-no">4</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-5">
									<div class="item-no">5</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-6">
									<div class="item-no">6</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-7">
									<div class="item-no">7</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-8">
									<div class="item-no">8</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
								<div class="item-row itemno-9">
									<div class="item-no">9</div>
									<div class="item-name">?????</div>
									<div class="item-status">Unreleased</div>
									<div class="item-actions"></div>
								</div>
								
							</div>
						</div>
					</div>

				</div>
			</div>
		</main>

		
			<div class="error-log"></div>


		<footer>

			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.2" class="bg" viewBox="0 0 2001 382.7" preserveAspectRatio="none">
				<path d="M449 76.2c103.6 51.3 443.4-36.2 613-44.8 191-9.6 426 64 614 24.5 188-39.4 86 20.9 325-37.2v364H0v-369c189.1-4.3 263.8-29 449 62.5z" style="fill:#54327e"/>
				<path d="M1958 330.9s-1-.4-1-1.1v-3.1a32 32 0 0 1-2-11.1c-1-4.5-1-9.9-1-15.6-1-1.4-1-2.9-1-4.3v-6.6c-1 .3-1 .7-2 1.1-1 .7-2 1.4-4 2-4 2.5-9 4.7-13 6.5l-9 4c-2 .5-3 .8-3 1l-1 .3s0-.3 1-.8c0-.4 1-1.2 2-2 2-1.8 4-4.2 8-6.9 3-2.7 7-5.8 11-8.9 1-.8 2-1.5 4-2.3l3-2.3c0-.2 1-.5 1-.7-2-1.6-3-3.2-5-4.8 0-.9-1-1.9-2-2.9l-3-2.8c-4-3.8-7-7.6-9-10.9-3-3.1-5-6-6-8.1-1-.9-1-1.8-2-2.4v-.3c1 .3 2 .9 3 1.5 2 1.2 5 3.2 8 5.7 4 2.4 8 5.4 11 8.7a69.5 69.5 0 0 1 6 5.2c0 .2 1 .4 1 .6v-1.1c0-1.4 0-2.9 1-4.3 0-5.8 0-11.2 1-15.7 0-4.5 1-8.4 2-11.1v-3c0-.7 1-1.2 1-1.2v4.2c1 2.7 2 6.6 2 11.1 1 4.5 1 9.9 2 15.7V273.4l3-1.6 3-2.1c1-.6 3-1.3 4-1.9 5-2.6 9-4.9 13-6.7 4-1.6 7-3 10-3.9l3-.9c0-.3 1-.3 1-.3s-1 .2-1 .6c-1 .6-1 1.2-2 2.1-2 1.8-5 4.2-8 7-4 2.7-8 5.8-12 8.8l-3 2.4c-1 .8-3 1.5-4 2.3-1 .9-2 1.6-4 2.4 1 .6 2 1.2 2 1.7l3 2.8c3 3.8 6 7.5 9 10.8 3 3.2 5 6 6 8.1 1 1 1 1.8 2 2.4v.8l-1-.4c0-.4-1-.9-2-1.5l-9-5.7c-3-2.4-7-5.4-11-8.7 0-.5-1-1.1-2-1.7v9.8c-1 5.7-1 11.1-2 15.6 0 4.6-1 8.4-2 11.1v3.1z" style="fill:#fff;stroke-width:.999997"/>
				<path d="M257.1 35.2v.8l.5 2.3.9 8.3a175.6 175.6 0 0 1 1 15l.1 3.4v2l1.7-1.1 2.2-1.5a182.7 182.7 0 0 1 14.5-8 31 31 0 0 0 1.7-.8l.7-.2-.5.5-1.3 1.6c-1.3 1.2-2.9 3-5.1 5-2.2 2-4.7 4.3-7.5 6.6l-2.2 1.7-2.2 1.8-.9.6 3.2 3.8 1.8 2.2 1.7 2.2a134 134 0 0 1 9.8 13.9l1.1 1.8.3.6-.6-.3-1.5-1.2a101.3 101.3 0 0 1-14.2-12.8l-1.9-2-.8-1-.1 1.5-.1 3.4c-.2 4.3-.5 8.2-.9 11.6l-.9 8.3-.5 2.4v.8l-.2-.8-.4-2.4a277.8 277.8 0 0 1-1.8-20l-.1-3.3-.1-3.3v-.7l-2.1 1.4-2.3 1.6-2.3 1.5c-3 1.9-5.8 3.5-8.3 4.9l-6.1 3-1.8.8a6 6 0 0 1-.7.3l.5-.6 1.4-1.5a120.5 120.5 0 0 1 12.6-11.7l2.1-1.7 2.2-1.7 2.6-2-1.2-1.4-1.8-2.2a311 311 0 0 1-9.8-14l-1-1.8-.4-.6.6.3 1.5 1.2a101.4 101.4 0 0 1 12.3 10.9l1.9 1.9.1-1.5.1-3.3.1-3.4a296.3 296.3 0 0 1 1.8-20l.4-2.3z" style="fill:#fff;stroke-width:.476638"/>
				<path d="M1659 237.4v-1.9c0-1.2-1-3-1-5.3 0-4.6-1-11.1-2-19s-1-17.1-2-26.8v-15.2c-1-2.2-1-4.4-1-6.5l-6 3.4-6 3.5c-8 4.4-15 8.4-22 11.6-7 3.3-12 5.9-16 7.5-2 .9-4 1.4-5 1.8-1 .6-2 .7-2 .7s1-.4 2-1.2c0-.8 2-2 3-3.3 4-2.8 8-6.8 14-11.4 6-4.5 13-9.6 21-14.8l6-3.8 6-4 3-2.5-9-9.5c-2-1.6-4-3.2-5-5-2-1.6-3-3.2-5-4.8-6-6.5-12-12.6-16-18.1-5-5.5-9-10.1-11-13.5-1-1.6-2-3-3-3.8-1-1-1-1.5-1-1.5s1 .3 1 .9c1 .7 3 1.5 5 2.7 3 2.4 8 5.9 14 10.3 5 4.2 12 9.6 18 15.3 2 1.5 4 2.9 5 4.5l6 4.6 4 3.7v-13.2c0-9.9 1-19.1 2-27 1-7.8 2-14.3 2-19 0-2.3 1-4 1-5.2v-2s1 .8 1 2 0 2.9 1 5.3c0 4.6 1 11 2 19 1 7.8 1 17 2 26.9v18.7c3-1.4 5-2.9 7-4.3 3-1.2 5-2.4 7-3.6l6-3.3c8-4.6 16-8.6 23-11.8 6-3.2 12-5.7 16-7.4 1-.8 4-1.5 4-1.9l2-.7s-1 .6-1 1.2c-1 .8-3 2-4 3.5-4 2.8-8 6.8-15 11.2-5 4.5-12 9.6-20 14.8-2 1.3-3 2.7-5 4l-6 4c-3 1.7-6 3.4-8 5.1l4 4.4c1 1.7 3 3.3 5 4.9 6 6.4 12 12.7 16 18.1 5 5.4 8 10.2 10 13.5 2 1.6 3 3 3 3.9 1 .9 1 1.4 1 1.4s0-.3-1-.9c-1-.6-3-1.5-4-2.7-4-2.4-8-5.8-15-10.2-5-4.3-11-9.6-18-15.4-2-1.4-3-2.9-5-4.5 0-.5-1-1-2-1.6v21.2c-1 9.7-1 18.9-2 26.8-1 7.9-2 14.4-2 19-1 2.3-1 4.1-1 5.3 0 1.3-1 1.9-1 1.9zM1890 129.3v-3.2c-2-2.1-2-5-3-8.5 0-3.6 0-7.7-1-12.1V94.2l-3-.3c-3-.4-5-1-8-1.5s-4-1.2-5-1.7c-2-.5-2-1-2-1s0-.3 2-1c1-.4 2-1.1 5-1.6 3-.6 5-1.1 8-1.5l3-.2v-7.6c1-4.4 1-8.5 1-12.1 1-3.5 1-6.4 3-8.5V54s1 .2 1 .8v2.4c1 2 1 5 3 8.5 0 3.6 0 7.7 1 12v7.5c3 0 4 .2 5 .4 3 .4 6 .9 7 1.4 3 .6 4 1.3 5 1.8l3 1-3 .9c-1 .5-2 1.2-5 1.8-1 .5-4 1-7 1.4-1 0-2 .4-5 .4v11.2c-1 4.4-1 8.5-1 12.1-2 3.5-2 6.4-3 8.5v2.4c0 .5-1 .8-1 .8z" style="fill:#fff"/>
				<path d="M160.3 80s-.4-.7-.8-2c-.5-1.2-1-3-1.6-5.1-.4-2.3-.9-4.8-1.1-7.4-.3-1.4-.3-2.8-.3-4.2l-.2-2.4-1.5-.1c-2-.2-3.9-.6-5.4-1l-3.8-1.3-1.5-.8 1.5-.6 3.8-1.3a51 51 0 0 1 5.4-1.1l1.7-.1c0-1.5 0-2.8.3-4.2.2-2.7.7-5.2 1.1-7.4.6-2.1 1.1-4 1.6-5.2.4-1.3.8-2 .8-2l.7 2a67.4 67.4 0 0 1 3.1 16.6 57.2 57.2 0 0 1 12.1 2.7l1.4.6-1.4.8-3.8 1.3c-2.3.6-5.2 1-8.2 1.3l-.1 2.2-.4 4.2A76.3 76.3 0 0 1 161 78l-.7 2z" style="fill:#fff;stroke-width:.786295"/>
				<path d="m267.9 218.2-.9-3.1a98 98 0 0 1-3.2-18.9l-.4-6.3v-3.8l-2.5-.3a41.2 41.2 0 0 1-11.9-3.2l-1.9-1 1.9-.9a52.8 52.8 0 0 1 11.9-3.2l2.5-.2v-.3l.4-6.3a130.8 130.8 0 0 1 3.2-18.9l.9-3.1 1 3.1a87.4 87.4 0 0 1 3.2 18.9c.2 2 .4 4.1.4 6.3v.1a52.2 52.2 0 0 1 16.1 3.6l1.9.9-1.9 1a38.8 38.8 0 0 1-16 3.6l-.1 3.7a102.6 102.6 0 0 1-1.8 17.3c-.6 3.4-1.3 6-1.8 7.9l-1 3.1zM196.5 175.9l-.8-1.5a27 27 0 0 1-1.3-4c-.4-1.6-.9-3.6-1.2-5.6l-.3-3.2v-1.9a41.7 41.7 0 0 1-11.1-1.8l-1.4-.5 1.4-.4 3.8-.9 5.4-.8 1.9-.1v-.2c.2-1 .3-2.1.3-3.1.3-2.1.8-4 1.2-5.7.4-1.6.9-3 1.3-4l.8-1.5.7 1.5 1.5 4 1 5.7c.2 1 .3 2.1.3 3.1v.1a65.4 65.4 0 0 1 13.9 2.4l-1.4.4a65.8 65.8 0 0 1-12.4 1.9l-.1 1.8c0 1.1-.1 2.2-.3 3.2l-1 5.7-1.5 3.9-.7 1.5z" style="fill:#fff"/>
				<path d="M33 .2.5 63.2 33 134.3l32.5-72.3Z" transform="matrix(.6999 0 0 -.8183 42.8 110)" fill="#8acccaff"/>
				<path d="M33.5.7 1 63.7l32.5 71.2L66 62.6Z" transform="matrix(1 0 0 -1 1785 147.7)" fill="#8acccaff"/>
				<path d="M32.5.7 0 63.6l32.5 71.3L65 62.5Z" transform="matrix(1 0 0 -1 1922 201.8)" fill="#8acccaff"/>
				<path d="M23.6.6 0 46.2l23.6 51.6L47 45.4Z" transform="matrix(1 0 0 -1 779.9 153.3)" fill="#8acccaff"/>
				<path d="M19.3.3.4 29.3l18.9 32.9L38 28.8Z" transform="matrix(1 0 0 -1 1848 206.7)" fill="#8acccaff"/>
				<path d="M15.2.4.7 22.8 15.2 48l14.6-25.7Z" transform="matrix(1 0 0 -1 1857 315)" fill="#8acccaff"/>
				<path d="M14.7.4.2 22.8 14.7 48l14.6-25.7Z" transform="matrix(1 0 0 -1 1740 156.4)" fill="#8acccaff"/>
				<path d="M14.8.4.2 22.8 14.8 48l14.5-25.7Z" transform="matrix(1 0 0 -1 625.8 148.1)" fill="#8acccaff"/>
				<path d="M14.5.4.7 20 14.5 42l13.8-22.4Z" transform="matrix(1 0 0 -1 660 212.6)" fill="#8acccaff"/>
				<path d="M15.5.5 1 22.8l14.5 25.4 14.6-25.7Z" transform="matrix(1 0 0 -1 14.6 181.6)" fill="#8acccaff"/>
				<path d="M42.4.2 0 82.2 42.4 175l42.3-94.2Z" transform="matrix(1 0 0 -1 300.1 186.7)" fill="#8acccaff"/>
				<path d="M1798 256.4s0-1-2-2.9c0-1.9-1-4.7-1-7.9s-1-7-1-11v-10.1l-3-.3a37.8 37.8 0 0 1-12-3.2c-1-.6-3-1-3-1s2-.4 3-.9 3-1.2 5-1.7c2-.6 4-1.1 7-1.5l3-.3v-6.5c0-4.1 1-7.9 1-11.2 0-3.2 1-5.9 1-7.7 2-2 2-3.1 2-3.1s0 1.1 1 3.1c0 1.8 1 4.5 1 7.7 2 3.3 2 7.1 2 11.2V215.5c4 .2 8 .9 12 1.9 1 .5 4 1.2 5 1.7 0 .5 1 .9 1 .9s-1 .4-1 1c-1 .5-4 1.2-5 1.8-3 .8-7 1.5-11 1.8 0 1.2-1 2.5-1 3.7v6.3c0 4 0 7.8-2 11 0 3.2-1 6-1 7.9-1 1.9-1 2.9-1 2.9z" style="fill:#fff"/>
				<path d="M737.3 86.9v.8l.5 2.3.9 8.3a177.4 177.4 0 0 1 1 15.1l.1 3.3v2l1.7-1.1 2.2-1.5a182.7 182.7 0 0 1 14.5-8 31 31 0 0 0 1.7-.8l.7-.2-.5.5-1.3 1.6c-1.3 1.2-2.9 3-5.1 5-2.2 2-4.7 4.3-7.5 6.6l-2.2 1.7-2.2 1.8-.9.6 3.2 3.8 1.8 2.2 1.7 2.2a134 134 0 0 1 9.8 13.9l1.1 1.8.3.6-.6-.3-1.5-1.2a101.3 101.3 0 0 1-14.2-12.8l-1.9-2-.8-.9-.1 1.4-.1 3.4c-.2 4.3-.5 8.2-.9 11.6l-.9 8.3-.5 2.4v.8l-.2-.8-.4-2.4a277.8 277.8 0 0 1-1.8-19.9l-.1-3.4-.1-3.3v-.7l-2.1 1.4-2.3 1.6-2.3 1.5c-3 1.9-5.8 3.5-8.3 4.9l-6.1 3.1-1.8.7a6 6 0 0 1-.7.3l.5-.6 1.4-1.5a120.5 120.5 0 0 1 12.6-11.7l2.1-1.7 2.2-1.7 2.6-1.9-1.2-1.5-1.8-2.2a311 311 0 0 1-9.8-14l-1-1.8-.4-.6.6.3 1.5 1.2a101.4 101.4 0 0 1 12.3 10.9l1.9 1.9.1-1.5.1-3.3.1-3.4a300.2 300.2 0 0 1 1.8-20l.4-2.3z" style="fill:#fff;stroke-width:.476505"/>
			</svg>

			<div class="container">
				<div class="col">
					Website and design copyright GemCave <?= date('Y'); ?>
				</div>
				<div class="col">
					<a href="https://token.gemcave.org" target="_blank" class="gemtokenlink">
						<span class="gemtokenpower">Powered by</span>
						<img src="img/gemtoken.png" class="gemtokenimg" />
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 184.7 144.4" class="gemtoken">
							<path d="m23.2 130.5-.1.4c-.2.2-.3.5-.4.9l-.2 1.3v.7c0 .1 0 .3-.2.4h-.2a3 3 0 0 0-1 .2c-.4 0-.6.1-.7.2l-.3.1.3.1.7.3 1 .2h.3v.7c0 .5.2.9.3 1.3l.3.9.1.3.2-.3.2-.9.2-1.3c.2-.2.2-.4.2-.7a7 7 0 0 0 1.5-.2l.7-.3.2-.1-.2-.1-.7-.2-1.5-.2v-.4l-.1-.7-.3-1.3-.2-.9-.2-.4z" style="fill:#fff;fill-opacity:1;stroke-width:.1409" transform="translate(1 -81.9)"/>
							<path d="m94.3 117.3-79 44.2 79 49.9 79-50.8z" style="fill:#24003e;fill-opacity:1;stroke-width:3.5964" transform="translate(1 -81.9)" />
							<path d="M36 134.6v-.3c0-.3 0-.8.2-1.3a96.2 96.2 0 0 0 1-11V117.2c.3.3.6.4 1 .6l1.2.8c1.6 1.1 3.2 2 4.6 2.8l3.4 1.7 1 .5h.4l-.3-.4-.7-.7c-.8-.7-1.6-1.7-2.9-2.8l-4.1-3.6-1.3-.9-1.2-1-.5-.4 1.8-2.1 1-1.2 1-1.1 3.2-4.3 2.2-3.3.6-1.1c.2-.1.2-.3.2-.3l-.4.2-.8.6-2.9 2.5c-1.2.9-2.6 2.1-4 3.5l-1 1-1 1.2-.5.5v-2.7l-.5-6.3-.5-4.5-.3-1.4v-.5l-.2.5-.2 1.4a77.4 77.4 0 0 0-1 10.8v4.1l-1.1-.8-1.3-.9-1.3-.8a44.2 44.2 0 0 0-4.6-2.6l-3.4-1.8-1-.4c-.3 0-.4-.2-.4-.2l.3.3.7 1 2.9 2.8 4.1 3.5 1.2 1 1.2.9c.6.3 1 .8 1.5 1.1l-.7.8-1 1.2-3.3 4.4-2.1 3.2-.6 1-.2.4.3-.3.9-.6 3-2.3c1-1 2.5-2.2 3.8-3.6.3-.3.7-.6 1-1.1v4.5l.5 6.4.6 4.6.2 1.3z" style="fill:#fff;fill-opacity:1;stroke-width:.2633" transform="translate(1 -81.9)"/>
							<path d="m57.2 98.8-.2 1a21 21 0 0 0-.4 2.6c0 1.1-.3 2.1-.3 3.5-.2.6-.2 1.1-.2 1.9l-.1 1.1h-.4c-.5 0-1 .3-1.5.6-.4 0-.7.3-1 .5l-.4.3.4.3 1 .8c.4 0 1 .3 1.5.5h.5l.1 2c0 1.3.2 2.4.3 3.5l.5 2.5.1.8.3-.8.3-2.5c.2-1.1.3-2.2.3-3.5.2-.6.2-1.1.2-2 .8 0 1.6-.2 2.2-.5l1-.8c.3 0 .4-.3.4-.3s0-.3-.4-.3c-.2 0-.5-.5-1-.5-.6-.3-1.3-.6-2.2-.6v-1.1c0-.8 0-1.3-.2-1.9-.1-1.4-.1-2.4-.3-3.5l-.3-2.5-.3-1.1z" style="fill:#fff;fill-opacity:1;stroke-width:.2817" transform="translate(1 -81.9)"/>
							<path d="M5.2 219.4v-.2l.1-.5.2-1.8c.2-.9.2-1.7.2-2.6l.1-.8v-1.2l.4.3.6.3a31.9 31.9 0 0 0 3.8 1.9l.1.1-.1-.1-.3-.4-1.2-1.1-1.8-1.5-.5-.4-.5-.4-.2-.1.7-.8.5-.5.4-.5c.4-.6 1-1.2 1.3-1.8l1-1.3.2-.4.1-.1-.1.1-.4.2-1.2 1a10.7 10.7 0 0 0-2 1.9l-.6.4-.2.2v-1.1c0-.9-.2-1.8-.3-2.6 0-.7 0-1.4-.2-1.8v-.7.2c-.2.1-.2.3-.2.5l-.2 1.8-.2 2.6-.1.8V209.9l-.5-.4-.5-.3-.5-.3-2-1.1-1.4-.7-.5-.2H-1v.1l.4.3a18.3 18.3 0 0 0 3 2.6c0 .2.3.3.4.4l.6.4.6.4-.3.3-.4.5-1.4 1.8-1 1.4-.1.4-.2.1.2-.1.4-.2 1.2-1 1.6-1.5.5-.4V214.3l.3 2.6.2 1.8.1.5z" style="fill:#fff;fill-opacity:1;stroke-width:.1089" transform="translate(1 -81.9)"/>
							<path d="M12.5 218.3v.3l-.4.9-.2 1.3-.1.7-.1.5h-.3a3 3 0 0 0-1 .2l-.7.2-.3.1.3.1.7.3 1 .1h.3l.1.8.2 1.2.4.9v.4s.2-.1.2-.4l.3-.9.2-1.2.1-.7 1.5-.2.7-.3.3-.1-.3-.1-.7-.2c-.4-.2-1-.2-1.5-.3v-.4l-.1-.7-.2-1.3-.3-.9-.1-.3z" style="fill:#fff;fill-opacity:1;stroke-width:.1409" transform="translate(1 -81.9)"/>
							<path d="M166.2 127.1v-.3c.2-.3.2-.9.3-1.4l.7-5.3.7-7.2v-5.4l1.3.7c.5.3 1.1.7 1.7.9 2.2 1.2 4.5 2.2 6.4 3.1 1.8.9 3.4 1.4 4.6 2l1.3.5h.6l-.5-.4-.9-.8c-1-.7-2.2-2-3.9-3.2l-5.7-4.1-1.7-1-1.7-1.1-.7-.5 2.5-2.2 1.3-1.4c.5-.3 1-.9 1.3-1.2 1.7-1.8 3.3-3.5 4.5-5l3-3.6.8-1.3c.3-.1.3-.3.3-.3l-.5.2-1.1.7c-1 .7-2.4 1.5-4 2.8-1.7 1-3.5 2.4-5.4 4l-1.5 1c-.4.6-1 1-1.4 1.5l-.6.5v-2.9l-.7-7.3-.7-5-.3-1.7V82l-.3.5-.3 1.6-.7 5.1-.7 7.2v4.6a6 6 0 0 0-1.5-.9l-1.8-1c-.6-.2-1.2-.6-1.7-1-2.3-1.2-4.5-2-6.4-3a89.2 89.2 0 0 0-6-2.4l-.5-.1.4.3 1 1 3.9 3.2a82 82 0 0 0 5.7 4l1.6 1 1.7 1.1c.7.3 1.3.9 2 1.2l-.9.9-1.4 1.4c-1.7 1.8-3.2 3.3-4.5 4.9l-3 3.7-.7 1.1-.3.5.4-.4a73.8 73.8 0 0 0 10.5-7.3c.5-.4 1-.7 1.5-1.3v5.1l.6 7.2a46.7 46.7 0 0 0 1.1 6.7z" style="fill:#fff;fill-opacity:1;stroke-width:.3275" transform="translate(1 -81.9)"/>
							<path d="m141.5 201.8-.1 1.1c-.2.4-.3 1.3-.5 2.3l-.3 3.3-.1 1.8c0 .3 0 .9-.2 1.1h-.4c-.5 0-1 .3-1.4.6-.5 0-.8.3-1 .5-.3.3-.5.3-.5.3s.2 0 .5.3l1 .8c.4 0 .9.3 1.4.5h.5l.1 2c0 1.3.3 2.4.4 3.5l.4 2.5.2.8.2-.8c.2-.6.2-1.7.4-2.5l.3-3.5.1-2a6 6 0 0 0 2.3-.5l.9-.8c.4 0 .4-.3.4-.3s0-.3-.4-.3c-.2 0-.5-.5-.9-.5-.7-.3-1.4-.6-2.3-.6v-1.1l-.1-1.8-.3-3.3c-.2-1-.2-1.9-.4-2.3l-.2-1.1z" style="fill:#fff;fill-opacity:1;stroke-width:.2817" transform="translate(1 -81.9)"/>
							<path d="M143.8 119.8v-.2l.1-.5a9 9 0 0 0 .2-1.8c.2-.9.2-1.7.2-2.6l.1-.8v-1.2l.4.3.6.3 2 1.1 1.4.6.4.2.1.1-.1-.1-.3-.4-1.2-1.1-1.8-1.5-.5-.4-.5-.4-.2-.1.7-.8.5-.5.4-.5c.4-.6 1-1.2 1.3-1.8l.9-1.3.3-.4.1-.1-.1.1-.4.2-1.2 1-1.7 1.4-.4.5-.5.4-.2.2v-.3l-.1-.8-.2-2.6-.2-1.8-.1-.5v-.2.2l-.1.5-.2 1.8-.2 2.6-.1.8V110.3l-.5-.4-.5-.3-.6-.3-2-1.1-1.4-.7-.4-.2h-.2l.2.1.3.3 1.2 1.2 1.7 1.4.5.4.5.4.6.4-.2.3-.4.5-1.4 1.8-1 1.4-.2.4-.1.1.1-.1.4-.2 1.2-1a8 8 0 0 0 1.7-1.5l.5-.4v1.1l.1.8.2 2.6.2 1.8.1.5z" style="fill:#fff;fill-opacity:1;stroke-width:.1089" transform="translate(1 -81.9)"/>
							<path d="M150 213.4v-.2l.2-1 .2-3.4.3-4.8V200.4l.5.4.6.6 2.3 2.1 1.7 1.3.4.4h.2l-.1-.3-.4-.6-1.4-2.1-2-2.7-.7-.6c-.1-.3-.3-.6-.6-.8l-.2-.3.9-1.6.5-.9.4-.8c.7-1.1 1.2-2.3 1.7-3.2l1-2.5.3-.8.1-.2-.1.1-.5.5-1.4 1.8-1.9 2.7-.6.7-.5.9-.2.4v-2l-.3-4.8-.2-3.3-.2-1.1v-.3.3l-.2 1.1-.2 3.3-.3 4.8v3l-.5-.6-.7-.6-.6-.6a18 18 0 0 0-2.3-2l-1.7-1.3-.5-.3-.2-.2.1.2.4.8 1.4 2.1 2.1 2.6.6.8.6.6.7.9-.3.6-.5.9c-.6 1.2-1.2 2.2-1.6 3.3l-1.1 2.4-.3.7-.1.3.1-.2.5-.5c.3-.3.9-.9 1.4-1.7l2-2.7c.2-.2.4-.4.5-.8v3.4l.2 4.8.3 3.4.1 1z" style="fill:#fff;fill-opacity:1;stroke-width:.1608" transform="translate(1 -81.9)"/>
						</svg>

					</a>
				</div>
				<div class="col">
					
				</div>
			</div>

		</footer>
	</body>

		<script type="text/javascript" src="https://unpkg.com/web3@1.5.1/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>


		<script src="js/vendor/jquery.js"></script>
		<script type="text/javascript" src="js/vendor/slick.min.js?cb=1659307490191"></script>
		<script src="js/main.js?cb=1659307490191"></script>

		<script type="text/javascript" src="js/item.js?cb=1234567890"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z3RFXH0N0D"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-2Z0V3V3JBF');
		</script>
</html>

