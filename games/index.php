<?php

include '../token/config.php';


if (isset($_POST['update'])){
	$theContact = clean($_POST['contact']);
	$theWallet = clean($_POST['wallet']);
	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
	$connection->query("UPDATE `prizes` SET `contact` = '".$theContact."' WHERE `wallet` = '".$theWallet."'");
}


if (isset($_POST['displayset'])){
	$theContact = clean($_POST['displayin']);
	$theWallet = clean($_POST['walletin']);
	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
	$connection->query("UPDATE `prizes` SET `displayname` = '".$theContact."' WHERE `wallet` = '".$theWallet."'");
}


?>
<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Gaming - Win and play for free!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?= $faviconGames ?>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://token.gemcave.org/css/style.css?cb=1650200444485">

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

	</head>

	<body id="page-games">
		<?= $topBar; ?>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="http://gemcave.org" target="_blank">
						<img src="https://gemcave.org/img/logos/gaming.png" />
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
						<a href="https://token.gemcave.org/wheel" class="">Spin The Wheel</a>
						<a href="https://token.gemcave.org/scratch" class="">Gem Miner</a>
						<a href="https://games.gemcave.org/grabber" class="">Gem Grabber</a>
						<a href="https://games.gemcave.org/stacker" class="">Gem Stacker</a>
						<a href="https://swap.gemcave.org/" class="pop">Buy GemCave Token</a>
					</nav>
				</div>
			</div>
		</header>
		<section class="main">
			<div id="game-dash">
				<div class="container">
					<div class="title-info">
						<div class="text-side">
							<h1>Welcome to GemCave Gaming</h1>
							<p>GemCave Games are currently paused whilst we work on core development upgrades for GemCave - stay tuned if you want to be part of the next big movement on GemCave.</p>
						</div>

						<div>
							<table class="game-stats">
								<tr style="background:#cfcdff;">
									<td colspan="2" style="text-align:center;color: #03002a">Game Config Information</td>
								</tr>
								<tr>
									<td class="left">Status</td>
									<td>Paused whilst move to ETH.</td>
								</tr>
							</table>
						</div>
					</div>

					<div class="game-list">
						<div class="game-item">
							<div class="game-item-box">
								<a href="https://token.gemcave.org/" target="_blank">
									<img src="/img/cawheeve.png" />
								</a>
							</div>
						</div>

                            
						<div class="game-item">
							<div class="game-item-box">
								<a href="https://token.gemcave.org/" target="_blank">
									<img src="/img/cave.png" />
								</a>
							</div>
						</div>

                            
						<div class="game-item">
							<div class="game-item-box">
								<a href="https://games.gemcave.org/" target="_blank">
									<img src="/img/grab.png" />
								</a>
							</div>
						</div>


						<div class="game-item">
							<div class="game-item-box">
								<a href="https://games.gemcave.org/" target="_blank">
									<img src="/img/astacker.png" />
								</a>
							</div>
						</div>
                    
					</div>
				</div>
			</div>
            
			<div id="prize-dash">
				<h2>GemCave Gaming Paused for now</h2>
			</div>
		</section>

		<?php include '../token/footer.php'; ?>

        
        
		<script type="text/javascript" src="https://unpkg.com/web3@1.5.1/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>

		<script src="https://token.gemcave.org/js/vendor/jquery.js"></script>
        
		<script src="/js/main.js"></script>

		<script src="https://token.gemcave.org/js/web.js?cb=1650200444485"></script>       

		<script src="/js/prize-wallet.js?cb=1650200444485"></script>

		<?= $tracking ?>
        
	</body>
</html>

