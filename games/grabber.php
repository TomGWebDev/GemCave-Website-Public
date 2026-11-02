<?php
	include '../token/config.php';
?>
<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Token - Gem Grabber</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://token.gemcave.org/css/style.css?cb=123">

		<?= $favicon ?>
		<?= $fonts ?>

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>
	</head>


	<body id="claw">

		<?= $topBar; ?>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="http://gemcave.org" target="_blank">
						<img src="https://gemcave.org/img/logos/gaminglogo.png" />
						<div class="logo-text">GemCave                        
						<div class="logo-text-small">Gem Grabber</div></div>
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
						<a href="https://token.gemcave.org/" class="">Token</a>
						<a href="https://games.gemcave.org/" class="">Games</a>
						<a href="https://swap.gemcave.org/" class="pop">Buy GemCave Token</a>
					</nav>
				</div>
			</div>
		</header>

		<div id="myNFT"
			data-timesig="0"
			data-playno="0"
			data-stacker-small="<?= $grabberPrizes['stacker-small']; ?>"
			data-wheel-small="<?= $grabberPrizes['wheel-small']; ?>"
			data-scratch-small="<?= $grabberPrizes['scratch-small']; ?>"
			data-stacker-big="<?= $grabberPrizes['stacker-big']; ?>"
			data-wheel-big="<?= $grabberPrizes['wheel-big']; ?>"
			data-scratch-big="<?= $grabberPrizes['scratch-big']; ?>"
		></div>   
<!--
		<div id="game">
			<div class="container">
				<div class="banner-left">
					<div class="banner-info">
						<div class="badges">
							<div class="message instru">You must hold at least<br><?= number_format($minBalance); ?><br>GEMS to play.
							There is no charge to play.</div>

							<div class="prize-club">
								<div class="text">
									Plays Remaining <div class="plays-more">0</div>
								</div>
							</div>

							<div class="button-connect">🟢 Connect Wallet</div>

							<div class="badge-none badge-item">
								<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 512 512"><path d="M512 256c0 68.38-26.629 132.667-74.98 181.02C388.667 485.371 324.38 512 256 512c-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35C182.742 462.256 218.252 472 256 472c119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35C498.934 162.277 512 208.131 512 256zM29.142 511.142.858 482.858l60.528-60.528C21.667 376.005 0 317.669 0 256c0-68.38 26.629-132.667 74.98-181.02C123.333 26.629 187.62 0 256 0c61.669 0 120.005 21.667 166.33 61.386L482.858.858l28.284 28.284zm60.711-117.28L393.862 89.853C356.431 58.739 308.365 40 256 40 136.897 40 40 136.897 40 256c0 52.365 18.738 100.431 49.853 137.862z"/></svg>
								<div class="badge-text">No wallet</div>
							</div>
							<div class="badge-nft badge-item badge-off">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576"><path d="M464 0H112c-4 0-7.8 2-10 5.4L2 152.6a12 12 0 0 0 .7 14.2l276 340.8a12 12 0 0 0 18.6 0l276-340.8a12 12 0 0 0 .7-14.2L474.1 5.4A12 12 0 0 0 464 0zm-19.3 48 63.3 96h-68.4l-51.7-96h56.8zm-202.1 0h90.7l51.7 96H191l51.6-96zm-111.3 0h56.8l-51.7 96H68l63.3-96zm-43 144h51.4L208 352 88.3 192zm102.9 0h193.6L288 435.3 191.2 192zM368 352l68.2-160h51.4L368 352z"/></svg>

								<div class="badge-text">NFT Owner</div>
							</div>
							<div class="badge-hold badge-item badge-off">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352.492 393.176 256 343.613l-96.492 49.563 18.441-105.063-78.644-74.898 108.632-15.422L256 102.641l48.063 95.152 108.632 15.422-78.644 74.898zM256 298.645l43.184 22.18-8.235-46.895 34.356-32.72-47.532-6.745L256 191.359l-21.773 43.102-47.528 6.75 34.352 32.719-8.23 46.894zM256 512c-68.379 0-132.668-26.629-181.02-74.98C26.63 388.668 0 324.379 0 256S26.629 123.332 74.98 74.98C123.332 26.63 187.621 0 256 0s132.668 26.629 181.02 74.98C485.37 123.332 512 187.621 512 256s-26.629 132.668-74.98 181.02C388.668 485.37 324.379 512 256 512zm0-472C136.898 40 40 136.898 40 256s96.898 216 216 216 216-96.898 216-216S375.102 40 256 40zm0 0"/></svg>
								<div class="badge-text">GEMS Holder<br><div class="text-small"><?= $level1Plays ?> plays per session</div></div>
							</div>
							<div class="badge-club badge-item badge-off">
								<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="Capa_1" x="0" y="0" style="enable-background:new 0 0 512 512" version="1.1" viewBox="0 0 512 512"><path d="M437.02 74.98C388.667 26.629 324.38 0 256 0S123.333 26.629 74.98 74.98C26.629 123.333 0 187.62 0 256s26.629 132.668 74.98 181.02C123.333 485.371 187.62 512 256 512s132.667-26.629 181.02-74.98C485.371 388.668 512 324.38 512 256s-26.629-132.667-74.98-181.02zM256 472c-119.103 0-216-96.897-216-216S136.897 40 256 40s216 96.897 216 216-96.897 216-216 216z"/><path d="M368.993 285.776c-.072.214-7.298 21.626-25.02 42.393C321.419 354.599 292.628 368 258.4 368c-34.475 0-64.195-13.561-88.333-40.303-18.92-20.962-27.272-42.54-27.33-42.691l-37.475 13.99c.42 1.122 10.533 27.792 34.013 54.273C171.022 389.074 212.215 408 258.4 408c46.412 0 86.904-19.076 117.099-55.166 22.318-26.675 31.165-53.55 31.531-54.681l-38.037-12.377z"/><circle cx="168" cy="180.12" r="32"/><circle cx="344" cy="180.12" r="32"/></svg>
								<div class="badge-text">BIG GEMS Holder<br><div class="text-small"><?= $level2Plays ?> plays per session</div></div>
							</div>
							<div class="badge-super badge-item badge-off">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384.538 384.538" style="enable-background:new 0 0 384.538 384.538" xml:space="preserve"><path d="M127.678 220.215a10 10 0 0 0 9.069-5.776l25.202-54.045c9.278-19.898.639-43.634-19.259-52.912-9.639-4.495-20.452-4.967-30.445-1.329-7.119 2.591-13.215 7.046-17.758 12.879-17.711-3.75-36.36 5.035-44.333 22.13-9.278 19.898-.639 43.634 19.259 52.912l54.045 25.202a9.967 9.967 0 0 0 4.22.939zm-49.813-44.267c-9.903-4.618-14.203-16.431-9.585-26.334 3.358-7.202 10.522-11.44 17.99-11.44 2.8 0 5.644.596 8.344 1.856a10 10 0 0 0 13.289-4.838 19.685 19.685 0 0 1 11.182-10.246 19.687 19.687 0 0 1 15.152.661c9.903 4.618 14.203 16.431 9.585 26.334l-20.976 44.982-44.981-20.975zM334.383 141.161c-7.972-17.096-26.612-25.883-44.332-22.13-4.543-5.833-10.64-10.288-17.759-12.88-9.993-3.637-20.806-3.166-30.445 1.329-19.897 9.278-28.536 33.015-19.259 52.913l25.202 54.045a10.003 10.003 0 0 0 9.07 5.776 9.974 9.974 0 0 0 4.22-.939l54.045-25.202c19.898-9.278 28.537-33.014 19.258-52.912zm-27.711 34.787-44.981 20.975-20.976-44.982c-4.618-9.903-.318-21.716 9.585-26.334a19.754 19.754 0 0 1 8.362-1.867c2.285 0 4.578.401 6.789 1.206a19.685 19.685 0 0 1 11.182 10.246c2.335 5.005 8.284 7.172 13.289 4.837 9.902-4.618 21.717-.318 26.335 9.584s.319 21.717-9.585 26.335z"/><path d="M192.269 0C86.252 0 0 86.251 0 192.269s86.251 192.269 192.269 192.269 192.269-86.251 192.269-192.269S298.287 0 192.269 0zm0 364.538C97.28 364.538 20 287.258 20 192.269S97.28 20 192.269 20s172.269 77.28 172.269 172.269-77.28 172.269-172.269 172.269z"/><path d="M276.378 240.66a9.996 9.996 0 0 0-8.612-1.787c-49.391 12.653-101.603 12.653-150.992 0a10.001 10.001 0 0 0-12.482 9.687c0 48.511 39.467 87.978 87.978 87.978 48.511 0 87.978-39.467 87.978-87.978a10.002 10.002 0 0 0-3.87-7.9zm-84.109 75.878c-33.082 0-60.719-23.751-66.754-55.098 43.938 9.229 89.569 9.229 133.508 0-6.035 31.347-33.673 55.098-66.754 55.098z"/></svg>
								<div class="badge-text">MEGA GEMS Holder<br><div class="text-small"><?= $level3Plays ?> plays per session</div></div>
							</div>
						</div>

						<div class="prize-box">
							<h2>Prizes</h2>
							<p>Different gem shapes give you different prizes - check out what you win for each gem below:</p>
							<div class="prize-row"><div class="play-prize stacker big"></div> <?= $grabberPrizes['stacker-big']; ?></div>
							<div class="prize-row"><div class="play-prize wheel big"></div> <?= $grabberPrizes['wheel-big']; ?></div>
							<div class="prize-row"><div class="play-prize scratch big"></div> <?= $grabberPrizes['scratch-big']; ?></div>

                            
							<div class="prize-row"><div class="play-prize stacker small"></div> <?= $grabberPrizes['stacker-small']; ?></div>
							<div class="prize-row"><div class="play-prize wheel small"></div> <?= $grabberPrizes['wheel-small']; ?></div>
							<div class="prize-row"><div class="play-prize scratch small"></div> <?= $grabberPrizes['scratch-small']; ?></div>
						</div>

							<div class="prize-box my-prize">
							<h2>My Prizes</h2>
							<p>Any prize you win during this game will be displayed below..</p>
							<div class="my-prize-list">

							</div>
						</div>
                        
					</div>
				</div>
				<div class="banner-right">
					<div class="inner">
						<p style="text-align:center;">Use <strong>W, A, S</strong> and <strong>D</strong> keys to move the claw, press <strong>SPACEBAR</strong> to drop the claw and then press <strong>SPACEBAR</strong> again to close the claw.</p>
                        
						<div class="dialog" >
							<div class="dialog-message"></div>
						</div>
						<div id="grabber"></div>
						<div class="control-buttons">
							<div class="but-row">
								<div id="but-l">⬅</div>
								<div id="but-r">➡</div>
								<div id="but-f">⬆</div>
								<div id="but-b">⬇</div>
							</div>
							<div class="but-row">
								<div id="but-d">DROP / GRAB</div>
							</div>
							<div class="but-row">
								<span style="font-size:11px;">Press to drop claw, then again to close it!</span>
							</div>
							<div class="but-row">
								<div id="but-rr">🔄 RIGHT</div>
								<div id="but-rl">🔄 LEFT</div>
							</div>
							<div class="but-row">
								<span style="font-size:11px;margin:40px 0;">GemCave 2022 - Official Product</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<?php include '../token/footer.php'; ?>

		<script src="https://token.gemcave.org/js/vendor/jquery.js"></script>
		<script src="/js/main.js?cb=123"></script>
        
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

		<script type="text/javascript" src="https://unpkg.com/web3@1.5.1/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
		
		<script src="/js/grabber.js?cb=123"></script>
		<script src="/js/grabber-wallet.js?cb=123"></script>
		
		<?= $tracking ?>

	</body>
</html>
