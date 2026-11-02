<?php

include 'config.php';

header("Location: https://token.gemcave.org/");
die();

$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
$allPrizeResult = $connection->query("SELECT * FROM prizes");

if (isset($_GET['delwal'])){
	$connection->query("DELETE FROM prizes WHERE wallet = '".$_GET['delwal']."'");
}

if ($allPrizeResult->num_rows > 0){
	while($row = $allPrizeResult->fetch_object()) {

		
		foreach ($allPrizes as $aPrize => $aPrizeRow){
			
			if ($row->$aPrize >= $allPrizes[$aPrize]['creditstowin']){
				$mod = $row->$aPrize % $allPrizes[$aPrize]['creditstowin'];
				$times = ($row->$aPrize - $mod) / $allPrizes[$aPrize]['creditstowin'];
				$toDelAm = $allPrizes[$aPrize]['creditstowin'];
				$theRowStr = $row->wallet.' ('.$row->contact.')';


				if ($times > 0) {
					for ($i = 0; $i < $times; $i++) {

						if(isset($_GET['delset'])){
							if($_GET['delset'] == $aPrize){
								$connection->query("UPDATE prizes SET ".$aPrize." = ".$aPrize." - ".$toDelAm." WHERE wallet = '".$row->wallet."'");
							} else {
								$loadedPrizes[$aPrize][] = $theRowStr;
							}
						} else {
							$loadedPrizes[$aPrize][] = $theRowStr;
						}
					}
				}
			}
		}					
	}
} else {
	$row = false;
}






if (isset($_GET['delset'])){
	header("Location: https://token.gemcave.org/prize-admin");
}

?>
<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Token - Game Prizes - Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/style.css?cb=1649187433213">

		<?= $favicon ?>
		<?= $fonts ?>

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>
	</head>

	<body id="page-prizes">
		<?= $topBar; ?>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="/">

						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 512 440" class="logo-svg"><defs><animate xlink:href="#a" attributeName="elevation" begin="0" values="0;800;0" dur="5s" repeatCount="indefinite" fill="freeze"/><filter id="b" width="1.5" height="1.5" x="-.3" y="-.3" color-interpolation-filters="sRGB"><feGaussianBlur result="result1" stdDeviation="1"/><feGaussianBlur in="result1" result="result6" stdDeviation="10"/><feComposite in="result6" in2="result1" operator="atop" result="result8"/><feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/><feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" values="0 0 0 -1 0 0 0 0 -1 2 0 0 0 -1 0 0 0 0 3 0"/><feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="1"/><feSpecularLighting in="result0" lighting-color="#FFF" result="result1" specularConstant="2.5" specularExponent="35" surfaceScale="-2"><feDistantLight id="a" azimuth="230" elevation="70"/></feSpecularLighting><feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/><feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/><feComposite in="result9" in2="result4" operator="atop" result="result91"/><feBlend in2="result91" mode="multiply"/></filter></defs><g class="cavein"><path fill="#d9d3de" d="m511.9 335-32-256a8 8 0 0 0-5.6-6.7l-240-72a8 8 0 0 0-6.1.7l-192 104a7.9 7.9 0 0 0-4 5.6l-32 176a8.3 8.3 0 0 0 0 3.5l40 144A8 8 0 0 0 48 440h392a8 8 0 0 0 6.7-3.6l64-96c1-1.6 1.5-3.5 1.2-5.4z"/><path fill="#c6bdcd" d="m72.3 434.1-40-144a7.6 7.6 0 0 1-.2-3.5l32-176c.5-2.4 2-4.5 4-5.6L251.8 5.6 234.3.3a8 8 0 0 0-6.1.7l-192 104a7.9 7.9 0 0 0-4 5.6l-32 176a8.3 8.3 0 0 0 0 3.5l40 144A8 8 0 0 0 48 440h32a8 8 0 0 1-7.7-5.9z"/><path fill="#b3a7bd" d="m455.6 333.5-48-144c-.7-2-2.1-3.7-4-4.7l-96-48-32-16c-1.5-.7-3.2-1-4.9-.7l-21.5 3.6-122.5 20.4a8.2 8.2 0 0 0-5.7 4l-72 128a7.8 7.8 0 0 0-.7 5.9l40 152a8 8 0 0 0 7.7 6h21.6L80.3 298c-.6-2-.3-4.1.7-5.9l72-128a8.2 8.2 0 0 1 5.7-4l122.5-20.4 90.4 45.1c1.9 1 3.3 2.7 4 4.7l48 144a8 8 0 0 1-1.2 7.3l-72 96a8 8 0 0 1-6.4 3.2h32a8 8 0 0 0 6.4-3.2l72-96a8 8 0 0 0 1.2-7.3z"/><path fill="#9f91ac" d="m227.6 57.3-.7.5-.3.3-.3.2-.4.5-.1.1-.3.4-.1.2-.3.4-.2.3-.1.3-.2.4-.1.3-.2.5v.2l-.1.5-.1.4-.1.4V80a8 8 0 0 0 16 0V68.3l17.5-11.7 28.6 7.2 1.9.2a8 8 0 0 0 7.8-6c1-4.3-1.6-8.7-5.9-9.8l-28.7-7.1-22.5-39.4-4.4-1.4a8 8 0 0 0-6.1.7l-6.3 3.4 23.4 41zm178.5 54.9a8.3 8.3 0 0 0-5.6 4.9c-.9 2.4-.6 5.2.8 7.3l12.4 18.6-11.4 11.3a8.1 8.1 0 0 0 0 11.4 8.5 8.5 0 0 0 5.7 2.3c2 0 4.1-.8 5.7-2.3l16-16a8 8 0 0 0 1-10.1L421 125l20.9-5.2a8.3 8.3 0 0 0 5.3-4.2l22.3-44.7-15.6-4.7-19.4 38.9z"/><path fill="#b3a7bd" d="M169.3 179.6a8 8 0 0 0 2.3 11.1c1.3.9 2.9 1.3 4.4 1.3a8 8 0 0 0 6.7-3.6l16-24a8.1 8.1 0 0 0-.3-9.2L183 134.7l-17.7 3 16.9 22.6z"/><path fill="#9f91ac" d="m179.5 156.6 17.8-2.9-14.3-19-17.7 3z"/><path fill="#533a6a" d="m398.9 316-56-96a7.8 7.8 0 0 0-6-3.9l-136-16c-2.7-.4-5.5.8-7.2 3l-88 112a7.7 7.7 0 0 0-1.2 7.6l40 112a7.9 7.9 0 0 0 7.5 5.3h184c3 0 5.8-1.7 7.2-4.4l56-112a7.9 7.9 0 0 0-.3-7.6z"/></g><g filter="url(#b)" transform="matrix(.77 0 0 .77 24.5 249.7)"><path fill="#37c4b3" d="M298.3 229c-3.8 0-7.4-1.6-9.8-4.6L173.4 83.7a13 13 0 0 1-.8-15l41.1-63C216 2.1 220 0 224.2 0h148.1c4.2 0 8.2 2.1 10.5 5.7l41.1 63a12.8 12.8 0 0 1-.8 15L308 224.4c-2.4 3-6 4.6-9.7 4.6z" class="diamond"/></g><g class="diamond" style="mix-blend-mode:hard-light"><path fill="#37c4b3" d="M254.9 426.6c-3 0-5.7-1.3-7.6-3.6l-89-108.6a10 10 0 0 1-.5-11.7l31.7-48.6a9.7 9.7 0 0 1 8.1-4.4H312c3.3 0 6.4 1.7 8.1 4.4l31.8 48.6a10 10 0 0 1-.6 11.7l-89 108.6a9.6 9.6 0 0 1-7.4 3.6z"/><path fill="#53e7d3" d="M193.2 250.8a9.7 9.7 0 0 0-3.7 3.3l-31.7 48.6a9.5 9.5 0 0 0-1.6 6h74.9zm85.4 58h74.9a11 11 0 0 0-1.6-6.1L320 254.1a9.7 9.7 0 0 0-3.7-3.3Zm14.9 0h-77.1l38.5 117.9z"/><path fill="#b9f5ed" d="m254.8 249.7-38.6 59h77.3l-38.6-59z"/></g></svg>
						<div class="logo-text">GemCave
                        
						<div class="logo-text-small">My Prizes</div></div>
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
						<a href="https://token.gemcave.org/claw" class="">Gem Grabber</a>
						<a href="https://nft.gemcave.org/" class="">NFTs</a>
						<a href="<?= $pancakeLink ?>" class="pop">Buy GemCave Token</a>
					</nav>
				</div>
			</div>
		</header>


		<div id="prize-admin">
			<div class="container">
				<h1>Pending Prizes</h1>
				<p>Send one set of prizes, then click sent. Always click sent after sending so the remaining prizes are re-calcuated!</p>
				<p>Gragas is a cunt!</p>


				<div class="prize-item">
					<h2>DELETE WALLET PRIZES</h2>
					<p>Delete all prizes for a certain wallet</p>
					<form method="GET" action="/prize-admin">
					<input type="hidden" name="pw" value="" />
						<input name="delwal" placeholder="Wallet address" />
						<input type="submit" value="Delete" class="delgo" />
					</form>
				</div>



				<?php
					foreach ($allPrizes as $aPrize => $aPrizeRow){
				?>

				<div class="prize-item">
					<h2><?= $aPrizeRow['title'] ?></h2>
					<a href="/prize-admin?delset=<?= $aPrize ?>" class="delgo" onclick="return confirm('Are you sure?')">SENT</a>
					<textarea>[<?php
							if (!empty($loadedPrizes[$aPrize])){
								foreach ($loadedPrizes[$aPrize] as $key => $aIt){

									if ($key === array_key_last($loadedPrizes[$aPrize])) {
										print $aIt;
									} else {
										print $aIt.', ';
									}
								}
							}
					?>]</textarea>
				</div>


				<?php
					}
				?>



			</div>
		</div>

		<?php include 'footer.php'; ?>

		<script src="/js/vendor/jquery.js"></script>
		<script src="/js/main.js?cb=1649187433213"></script>
		<script src="/js/web.js?cb=1649187433213"></script>

		<script type="text/javascript" src="https://unpkg.com/web3@1.5.1/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
        		
		<?= $tracking ?>

	</body>
</html>
