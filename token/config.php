<?php

$clubEntryCost = 'CLOSED';
$payoutCount = '0';

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
$dexLink = 'https://www.dextools.io/app/bsc/pair-explorer/0x0000000000000000000000000000000000000000';
$gitHubLink = 'https://github.com/CryptoStarTech/GemCaveToken';
$redditLink = 'https://www.reddit.com/r/GemCaveToken/';

// DB Options
$dbhost = "";
$dbusername = "";
$dbpass = "";
$dbname = "";

function getTelegramApiUrl($method)
{
	$botToken = getenv('TELEGRAM_BOT_TOKEN');
	if ($botToken === false || $botToken === '') {
		error_log('Telegram notification skipped: TELEGRAM_BOT_TOKEN is not configured.');
		return false;
	}

	return 'https://api.telegram.org/bot'.$botToken.'/'.$method;
}

/* ------------------------------ */
/* GLOBAL GAMES CONFIG            */
/* ------------------------------ */

// Min token balance to play
// (no extra 9 didgits needed)
$minBalance  = 10000000000;
$minBalance2 = 50000000000;
$minBalance3 = 250000000000;

// Length of play sessions
$secondsPerSpin = 43200; // 12 hr 43200

// Max plays per IP
$playsPerIP = 15;

// Plays per session
$level1Plays = 1;
$level2Plays = 4;
$level3Plays = 6;

// Plays per session
$level1StackerPlays = 1;
$level2StackerPlays = 2;
$level3StackerPlays = 3;

// Grabber vars
// Plays oper session
$grabberLevel1Plays = 1;
$grabberLevel2Plays = 2;
$grabberLevel3Plays = 3;

// Prizes in the machine
$smallPrizes = 30;
$bigPrizes = 10;

// Number of extra plays you get
$smallPrizeAdds = 1;
$bigPrizeAdds = 2;

// Max winnable amount per session per user
$maxBigGrabberWins = 5;
$maxSmallGrabberWins = 10;

$grabberPrizes = array(
	'stacker-big' => '+'.$bigPrizeAdds.' plays on Gem Stacker',
	'wheel-big' => '+'.$bigPrizeAdds.' plays on Spin The Wheel',
	'scratch-big' => '+'.$bigPrizeAdds.' plays on Gem Miner',
	'stacker-small' => '+'.$smallPrizeAdds.' plays on Gem Stacker',
	'wheel-small' => '+'.$smallPrizeAdds.' plays on Spin The Wheel',
	'scratch-small' => '+'.$smallPrizeAdds.' plays on Gem Miner',
);

$allPrizes = array(
	'1bgems' => array(
		'title' => '1 BILLION GEMS Airdrop',
		'desc' => 'Your wallet will be airdropped 1 billion GEMS',
		'emoji' => '💎',
		'odds' => 10,
		'creditstowin' => 40,
		'colour1' => '#b6fff9',
		'colour2' => '#7c49a3',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 205,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 10
	),
	'25bgems' => array(
		'title' => '2.5 BILLION GEMS Airdrop',
		'desc' => 'Your wallet will be airdropped 2.5 billion GEMS',
		'emoji' => '💎',
		'odds' => 10,
		'creditstowin' => 40,
		'colour1' => '#36dacc',
		'colour2' => '#310155',
		'scratch' => false,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'5bnb' => array(
		'title' => '$5 BNB Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of BNB',
		'emoji' => '💰',
		'odds' => 20,
		'creditstowin' => 50,
		'colour1' => '#e8b30b',
		'colour2' => '#ffffff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'5sol' => array(
		'title' => '$5 SOL Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of SOL tokens',
		'emoji' => '🌞',
		'odds' => 20,
		'creditstowin' => 80,
		'colour1' => '#2edaba',
		'colour2' => '#ba4ad9',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => true,
		'stackercredits' => 1,
		'stackerlevel' => 0
	),
	'5avax' => array(
		'title' => '$5 AVAX Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of AVAX tokens',
		'emoji' => '🔺',
		'odds' => 20,
		'creditstowin' => 50,
		'colour1' => '#d73330',
		'colour2' => '#ffffff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => true,
		'stackercredits' => 3,
		'stackerlevel' => 2
	),
	'5matic' => array(
		'title' => '$5 MATIC Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of MATIC tokens',
		'emoji' => '🔗',
		'odds' => 20,
		'creditstowin' => 80,
		'colour1' => '#0b1644',
		'colour2' => '#24b9f7',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => true,
		'stackercredits' => 2,
		'stackerlevel' => 1
	),
	'5xrp' => array(
		'title' => '$5 XRP Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of XRP tokens',
		'emoji' => '✖️',
		'odds' => 20,
		'creditstowin' => 50,
		'colour1' => '#000',
		'colour2' => '#fff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' =>false,
		'stackercredits' => 1,
		'stackerlevel' => 0
	),
	'5doge' => array(
		'title' => '$5 DOGE Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of DOGE tokens',
		'emoji' => '🐶',
		'odds' => 15,
		'creditstowin' => 50,
		'colour1' => '#b89f2e',
		'colour2' => '#ffffff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 98,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 2
	),
	'5eth' => array(
		'title' => '$5 ETH Airdrop',
		'desc' => 'Your wallet will be airdropped $5 worth of ETH tokens',
		'emoji' => '🔷',
		'odds' => 20,
		'creditstowin' => 50,
		'colour1' => '#7582e9',
		'colour2' => '#d5daff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'20btc' => array(
		'title' => '$20 BTC Airdrop',
		'desc' => 'Your wallet will be airdropped $20 worth of Bitcoin!',
		'emoji' => '🟠',
		'odds' => 25,
		'creditstowin' => 50,
		'colour1' => '#ef8e19',
		'colour2' => '#ffffff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 222,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'25bnb' => array(
		'title' => '$25 BNB Airdrop',
		'desc' => 'Your wallet will be airdropped $25 worth of BNB!',
		'emoji' => '🟡',
		'odds' => 30,
		'creditstowin' => 50,
		'colour1' => '#ff8b00',
		'colour2' => '#ffffff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 0,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'10xmas' => array(
		'title' => '$10 XMASTREE Airdrop',
		'desc' => 'Your wallet will be airdropped $10 worth of XMASTREE tokens!',
		'emoji' => '🎄',
		'odds' => 8,
		'creditstowin' => 40,
		'colour1' => '#178b20',
		'colour2' => '#eee2a5',
		'scratch' => false,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 45,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 10
	)
	/*'10bear' => array(
		'title' => '$10 $BEAR Airdrop',
		'desc' => 'Your wallet will be airdropped $10 worth of $BEAR tokens!',
		'emoji' => '🐻',
		'odds' => 8,
		'creditstowin' => 40,
		'colour1' => '#6a2b0f',
		'colour2' => '#fff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => true,
		'wheelcredits' => 1,
		'wheelspin' => 45,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	),
	'10claw' => array(
		'title' => '10 games on Gem Grabber',
		'desc' => 'You will be given 10 extra plays in the current session on the Gem Grabber game when claimed!',
		'emoji' => '🕹️',
		'odds' => 3,
		'creditstowin' => 5,
		'colour1' => '#c51492',
		'colour2' => '#fff',
		'scratch' => true,
		'scratchcredits' => 1,
		'wheel' => false,
		'wheelcredits' => 1,
		'wheelspin' => 45,
		'stacker' => false,
		'stackercredits' => 1,
		'stackerlevel' => 1
	)*/
);


$favicon = '
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://token.gemcave.org/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://token.gemcave.org/img/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://token.gemcave.org/img/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://token.gemcave.org/img/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://token.gemcave.org/img/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://token.gemcave.org/img/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://token.gemcave.org/img/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://token.gemcave.org/img/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-128.png" sizes="128x128" />
		<meta name="msapplication-TileColor" content="#564db6" />
		<meta name="msapplication-TileImage" content="https://token.gemcave.org/img/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="https://token.gemcave.org/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="https://token.gemcave.org/img/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="https://token.gemcave.org/img/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="https://token.gemcave.org/img/mstile-310x310.png" />
        
		<meta name="title" content="GemCave Token - Official Website">
		<meta name="description" content="GemCave is an ecosystem of unique crypto products created by us and powered by GemCave Token!">

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://token.gemcave.org/">
		<meta property="og:title" content="GemCave Token - Official Website">
		<meta property="og:description" content="GemCave is an ecosystem of unique crypto products created by us and powered by GemCave Token!">
		<meta property="og:image" content="/img/Social-Show.png">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://token.gemcave.org/">
		<meta property="twitter:title" content="GemCave Token - Official Website">
		<meta property="twitter:description" content="GemCave is an ecosystem of unique crypto products created by us and powered by GemCave Token!">
		<meta property="twitter:image" content="/img/Social-Show.png">';

$faviconHome = '
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://gemcave.org/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://gemcave.org/img/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://gemcave.org/img/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://gemcave.org/img/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://gemcave.org/img/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://gemcave.org/img/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://gemcave.org/img/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://gemcave.org/img/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="https://gemcave.org/img/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="https://gemcave.org/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="https://gemcave.org/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="https://gemcave.org/img/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="https://gemcave.org/img/favicon-128.png" sizes="128x128" />
		<meta name="msapplication-TileColor" content="#564db6" />
		<meta name="msapplication-TileImage" content="https://gemcave.org/img/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="https://gemcave.org/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="https://gemcave.org/img/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="https://gemcave.org/img/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="https://gemcave.org/img/mstile-310x310.png" />
        
		<meta name="title" content="GemCave - Official Website">
		<meta name="description" content="The shinyest BSC gems">
		<meta itemprop="image" content="https://gemcave.org/img/Social-Show.png">

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="https://gemcave.org/">
		<meta property="og:title" content="GemCave Token - Official Website">
		<meta property="og:description" content="The shinyest BSC gems">
		<meta property="og:image" content="https://gemcave.org/img/Social-Show.png">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="https://gemcave.org/">
		<meta property="twitter:title" content="GemCave Token - Official Website">
		<meta property="twitter:description" content="The shinyest BSC gems">
		<meta property="twitter:image" content="https://gemcave.org/img/Social-Show.png">';

$faviconGames = '
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://token.gemcave.org/img/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://token.gemcave.org/img/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://token.gemcave.org/img/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://token.gemcave.org/img/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://token.gemcave.org/img/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://token.gemcave.org/img/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://token.gemcave.org/img/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://token.gemcave.org/img/apple-touch-icon-152x152.png" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-196x196.png" sizes="196x196" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-96x96.png" sizes="96x96" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-16x16.png" sizes="16x16" />
		<link rel="icon" type="image/png" href="https://token.gemcave.org/img/favicon-128.png" sizes="128x128" />
		<meta name="msapplication-TileColor" content="#564db6" />
		<meta name="msapplication-TileImage" content="https://token.gemcave.org/img/mstile-144x144.png" />
		<meta name="msapplication-square70x70logo" content="https://token.gemcave.org/img/mstile-70x70.png" />
		<meta name="msapplication-square150x150logo" content="https://token.gemcave.org/img/mstile-150x150.png" />
		<meta name="msapplication-wide310x150logo" content="https://token.gemcave.org/img/mstile-310x150.png" />
		<meta name="msapplication-square310x310logo" content="https://token.gemcave.org/img/mstile-310x310.png" />';







$topBar = '<div id="topbar">
			<div class="container">

				<div id="google_translate_element"></div>
				<div class="langauges">
					<div data-lang="en" class="item tran-en">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><g fill="#29337a"><path d="M41.7 102.6a235.8 235.8 0 00-34 73.9h107.8l-73.8-73.9zM170.5 9.5a236 236 0 00-74.8 37.1l74.8 74.9V9.5zM101.3 431c20.8 14.6 44.2 25.9 69.2 33.2V361.7L101.3 431zM10.5 306.8a236 236 0 0035.2 69.8l69.8-69.8h-105z"https://token.gemcave.org/></g><g fill="#fff"><path d="M45.6 97.1l-3.9 5.5 73.8 73.9H7.8a237 237 0 00-4.4 20.2h141.8L45.6 97.1zM95.8 427l5.5 4 69.2-69.3v102.5c6.7 2 13.4 3.6 20.3 5V332l-95 95zM5.3 286.5c1.4 6.9 3.2 13.6 5.2 20.3h105l-69.8 69.8c7.6 10.4 16 20.1 25.1 29.1l119.3-119.2H5.3zM170.5 9.5v112L95.7 46.7c-10.3 7.6-20 16.1-28.9 25.4l124 124V4.4c-6.9 1.4-13.6 3-20.3 5z"https://token.gemcave.org/></g><g fill="#d32030"><path d="M170.5 306.1l-.7.7h.7zM190.1 286.5h.7v-.7zM281.2 196.7h-.7v.7zM171.2 176.5l-.7-.7v.7zM190.8 196v.7h.7z"https://token.gemcave.org/></g><g fill="#252f6c"><path d="M300.8 411.8v53c25.4-7 49-18.2 70.2-32.8l-57.5-57.6c-4.6 16.2-6.3 24.5-12.7 37.4zM313.8 108.5l62.8-62.8a236 236 0 00-75.8-36.9v54.6c7.4 14.7 8 26 13 45zM427 378a236.2 236.2 0 0036.2-71.2H355.8L427 378zM465.9 176.5a235.7 235.7 0 00-35-75.2l-75.1 75.2h110z"https://token.gemcave.org/></g><g fill="#e7e7e7"><path d="M327.6 290.5l16.3 16.3 78 77.9a250 250 0 005.1-6.7l-71.2-71.2h107.4c2-6.7 3.8-13.4 5.2-20.3H329.2c-.3 2.9-1.3 1.1-1.6 4zM311.4 120.3L382 49.7l-5.4-4-62.8 62.8c.7 2.5-3 9.3-2.4 11.8zM300.8 59V8.8c-6.6-1.8-13.4-3.4-20.3-4.7v24.5A131 131 0 01300.8 59zM326 196.7h144.2c-1.1-6.8-2.6-13.6-4.3-20.2H355.8l75.2-75.2a238 238 0 00-24.6-29.7l-84.7 84.7c2.3 15.3 3.3 24.2 4.3 40.4zM310 371l61 61c10.2-7 19.7-14.8 28.6-23.2l-80.1-80.2A411.5 411.5 0 01310 371zM280.5 442.3v27.3c7-1.3 13.7-2.9 20.3-4.7v-53.1c-6 12-12.7 22.3-20.3 30.5z"https://token.gemcave.org/></g><path fill="#d71f28" d="M321.7 156.3l84.7-84.7A236.8 236.8 0 00382 49.7l-66.6 66.6c3 12.4 4.3 26.5 6.3 40z"https://token.gemcave.org/><g fill="#d32030"><path d="M225 .3zM236.8 473.7zM236.8 473.7c15 0 29.6-1.5 43.7-4.1v-27.3c-12.4 13.5-27 31.4-43.7 31.4z"https://token.gemcave.org/></g><g fill="#d71f28"><path d="M470.2 196.7H328c1.9 29.7 1.7 60.3-.7 89.8h141.2a237.6 237.6 0 001.8-89.8zM327.6 290.5c-1.3 14-5.9 24.9-8.1 38.1l80.1 80.2a239 239 0 0022.2-24.1l-77.9-78-16.3-16.2z"https://token.gemcave.org/></g><path fill="#d32030" d="M280.5 30.3V4.1A238 238 0 00236.8 0c16.7 0 31.3 16.8 43.7 30.3z"https://token.gemcave.org/><g fill="#29337a"><path d="M300.8 422a255.1 255.1 0 0016.5-43.7l-16.5-16.5V422zM319.4 103c-5-19.2-11.2-36.5-18.6-51.3v69.8l18.6-18.6z"https://token.gemcave.org/></g><g fill="#fff"><path d="M332.2 295l.8-8.5h-9.4l8.6 8.6zM300.8 121.5V51.7a131 131 0 00-20.3-30.5v130l40.8-40.8-2-7.5-18.5 18.6zM281.2 196.7h52.5c-1-16.2-2.7-32-5-47.4l-47.5 47.4zM280.5 452.4c7.6-8.1 14.4-18.4 20.3-30.4v-60.3l16.5 16.5c3.8-13.2 7-27.4 9.6-42.2l-46.4-46.3v162.7z"https://token.gemcave.org/></g><path fill="#e51d35" d="M280.5 452.4V289.7l46.3 46.3c2.3-13.2 4.1-27 5.4-41l-8.6-8.5h9.4c2.3-29.5 2.5-60 .7-89.8h-52.5l47.5-47.4c-2-13.5-4.5-26.5-7.4-38.9l-40.8 40.8v-130A58.8 58.8 0 00236.8 0a244.2 244.2 0 00-46 4.5V196L66.8 72a239.1 239.1 0 00-21.2 25.1l79.3 79.4 20.3 20.2H3.4a238.6 238.6 0 001.9 89.8H190L70.8 405.7c7.9 7.7 16.2 14.8 25 21.4l95-95v137a238.6 238.6 0 0046 4.6c16.7 0 31.3-7.8 43.7-21.3z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="zh-CN" class="item tran-zh-CN">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#d62427"https://token.gemcave.org/><path fill="#dc3027" d="M0 236.8C0 106 106 0 236.8 0s130.8 473.7 0 473.7A236.8 236.8 0 010 236.8z"https://token.gemcave.org/><g fill="#f8d12e"><path d="M136.6 65.2l11.1 34h35.8l-29 21.1 11.1 34-29-21-28.9 21 11-34-28.9-21.1h35.8zM220.1 45.9l-3.5 11.9 10.3 7-12.5.4-3.4 11.9-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM220.1 152.8l-3.5 11.9 10.3 7-12.5.4L211 184l-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM250.4 78.4l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.4 9.9-7.7-4.2-11.7 10.3 7zM250.4 122l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.3 9.9-7.6-4.2-11.7 10.3 7z"https://token.gemcave.org/></g></svg>
					</div>
					<div data-lang="hi" class="item tran-hi">
						<svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BULINE"><circle cx="256" cy="256" fill="#27273d" r="256"https://token.gemcave.org/></g><g id="Icons"><path d="m496.14 167.12h-480.29c36.15-97.58 130.01-167.12 240.15-167.12s204 69.54 240.14 167.12z" fill="#e88032"https://token.gemcave.org/><path d="m496.14 344.87h-480.29a256.53 256.53 0 0 1 0-177.75h480.29a253 253 0 0 1 8.91 29.41 257.31 257.31 0 0 1 -8.91 148.34z" fill="#fff"https://token.gemcave.org/><path d="m256 512a256.09 256.09 0 0 1 -240.15-167.13h480.29a252.21 252.21 0 0 1 -13.05 29.41 256 256 0 0 1 -227.09 137.72z" fill="#00b564"https://token.gemcave.org/><path d="m289.5 2.17c-95.38 12.47-174.24 77.43-206.65 165h-67c36.15-97.63 130.01-167.17 240.15-167.17a259.05 259.05 0 0 1 33.5 2.17z" fill="#d8712b"https://token.gemcave.org/><path d="m67 256a255.41 255.41 0 0 0 15.85 88.87h-67a256.53 256.53 0 0 1 0-177.75h67a252.91 252.91 0 0 0 -8.85 29.41 256.16 256.16 0 0 0 -7 59.47z" fill="#e2e2e2"https://token.gemcave.org/><path d="m289.5 509.83a258.82 258.82 0 0 1 -33.5 2.17 256.09 256.09 0 0 1 -240.15-167.13h67a256.15 256.15 0 0 0 206.65 165z" fill="#049b53"https://token.gemcave.org/><circle cx="408.07" cy="96.45" fill="#ef9050" r="16.28"https://token.gemcave.org/><circle cx="384.09" cy="72.47" fill="#ef9050" r="11.53"https://token.gemcave.org/><circle cx="256" cy="256" fill="#3e436d" r="79.86"https://token.gemcave.org/><path d="m318.86 249.5-3.73-.83c0-.3-.07-.6-.11-.89l3.38-1.78a2.82 2.82 0 0 0 1.43-3.24l-1.93-7.22a2.84 2.84 0 0 0 -2.86-2.1l-3.81.16c-.11-.28-.22-.56-.34-.84l2.8-2.57a2.82 2.82 0 0 0 .54-3.5l-3.74-6.48a2.82 2.82 0 0 0 -3.3-1.28l-3.64 1.14c-.18-.24-.37-.47-.55-.7l2.05-3.23a2.84 2.84 0 0 0 -.39-3.53l-5.28-5.28a2.84 2.84 0 0 0 -3.53-.39l-3.23 2.06-.7-.55 1.14-3.64a2.82 2.82 0 0 0 -1.28-3.3l-6.48-3.74a2.82 2.82 0 0 0 -3.5.54l-2.57 2.8-.84-.34.16-3.81a2.84 2.84 0 0 0 -2.1-2.86l-7.22-1.93a2.82 2.82 0 0 0 -3.23 1.43l-1.78 3.4-.89-.11-.83-3.73a2.82 2.82 0 0 0 -2.76-2.22h-7.48a2.82 2.82 0 0 0 -2.76 2.22l-.83 3.73-.89.11-1.78-3.4a2.82 2.82 0 0 0 -3.24-1.43l-7.22 1.93a2.84 2.84 0 0 0 -2.1 2.86l.16 3.81-.84.34-2.57-2.8a2.82 2.82 0 0 0 -3.5-.54l-6.48 3.74a2.82 2.82 0 0 0 -1.28 3.3l1.14 3.64-.7.55-3.22-2a2.84 2.84 0 0 0 -3.53.39l-5.28 5.28a2.84 2.84 0 0 0 -.39 3.53l2.05 3.23c-.18.23-.37.46-.55.7l-3.64-1.14a2.82 2.82 0 0 0 -3.3 1.28l-3.74 6.48a2.82 2.82 0 0 0 .54 3.5l2.8 2.57c-.12.28-.23.56-.34.84l-3.81-.16a2.84 2.84 0 0 0 -2.86 2.1l-1.93 7.22a2.82 2.82 0 0 0 1.43 3.18l3.38 1.77c0 .29-.07.59-.11.89l-3.73.83a2.82 2.82 0 0 0 -2.22 2.76v7.48a2.82 2.82 0 0 0 2.22 2.76l3.73.83c0 .3.07.6.11.89l-3.38 1.79a2.82 2.82 0 0 0 -1.43 3.24l1.93 7.22a2.84 2.84 0 0 0 2.86 2.1l3.81-.16c.11.28.22.56.34.84l-2.8 2.57a2.82 2.82 0 0 0 -.54 3.5l3.74 6.48a2.82 2.82 0 0 0 3.3 1.28l3.64-1.14c.18.24.37.47.55.7l-2 3.22a2.84 2.84 0 0 0 .39 3.53l5.28 5.28a2.84 2.84 0 0 0 3.53.39l3.23-2.05.7.55-1.14 3.64a2.82 2.82 0 0 0 1.28 3.3l6.48 3.74a2.82 2.82 0 0 0 3.5-.54l2.57-2.8.84.34-.16 3.81a2.84 2.84 0 0 0 2.1 2.86l7.22 1.93a2.82 2.82 0 0 0 3.18-1.43l1.77-3.38.89.11.83 3.73a2.82 2.82 0 0 0 2.76 2.22h7.48a2.82 2.82 0 0 0 2.76-2.22l.83-3.73.89-.11 1.79 3.38a2.82 2.82 0 0 0 3.24 1.43l7.22-1.93a2.84 2.84 0 0 0 2.1-2.86l-.16-3.81.84-.34 2.57 2.8a2.82 2.82 0 0 0 3.5.54l6.48-3.74a2.82 2.82 0 0 0 1.28-3.3l-1.14-3.64.7-.55 3.23 2.05a2.84 2.84 0 0 0 3.53-.39l5.28-5.28a2.84 2.84 0 0 0 .39-3.53l-2.06-3.23c.18-.23.37-.46.55-.7l3.64 1.14a2.82 2.82 0 0 0 3.3-1.28l3.74-6.48a2.82 2.82 0 0 0 -.54-3.5l-2.8-2.57c.12-.28.23-.56.34-.84l3.81.16a2.84 2.84 0 0 0 2.86-2.1l1.93-7.22a2.82 2.82 0 0 0 -1.43-3.23l-3.4-1.78c0-.29.07-.59.11-.89l3.73-.83a2.82 2.82 0 0 0 2.22-2.76v-7.48a2.82 2.82 0 0 0 -2.2-2.76z" fill="#fff"https://token.gemcave.org/><g fill="#3e436d"><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"https://token.gemcave.org/><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"https://token.gemcave.org/><path d="m239 256.7h-34.29a1.39 1.39 0 1 1 0-2.78h34.37a17.87 17.87 0 0 0 -.08 2.08z"https://token.gemcave.org/><path d="m240.56 263.25-31.63 12.75a1.45 1.45 0 0 1 -.51.1 1.39 1.39 0 0 1 -.52-2.68l31.7-12.76a17.42 17.42 0 0 0 .96 2.59z"https://token.gemcave.org/><path d="m207.77 235.84a1.41 1.41 0 0 1 1.81-.77l31.5 12.69a16.06 16.06 0 0 0 -1.15 2.53l-31.38-12.64a1.4 1.4 0 0 1 -.78-1.81z"https://token.gemcave.org/><path d="m244.84 268.89-24.38 24.36a1.39 1.39 0 0 1 -1 .42 1.4 1.4 0 0 1 -1-2.38l24.39-24.39a16.65 16.65 0 0 0 1.99 1.99z"https://token.gemcave.org/><path d="m219 220.21a1.37 1.37 0 0 1 0-2 1.39 1.39 0 0 1 1.95 0l24.42 24.42a17.36 17.36 0 0 0 -2 1.9z"https://token.gemcave.org/><path d="m248.13 271.12a14.67 14.67 0 0 0 2.55 1.08l-12.56 31.18a1.41 1.41 0 0 1 -1.3.87 1.65 1.65 0 0 1 -.52-.1 1.41 1.41 0 0 1 -.76-1.82z"https://token.gemcave.org/><path d="m236.19 208.22a1.38 1.38 0 1 1 2.56-1l13 32.29a15.6 15.6 0 0 0 -2.62.91z"https://token.gemcave.org/><path d="m256 239c-.47 0-.93 0-1.38.05v-34.34a1.38 1.38 0 1 1 2.76 0v34.29c-.45 0-.91 0-1.38 0z"https://token.gemcave.org/><path d="m256 273.05c.47 0 .93 0 1.38-.05v34.29a1.38 1.38 0 1 1 -2.76 0v-34.29c.45 0 .91.05 1.38.05z"https://token.gemcave.org/><path d="m263.4 240.63a17.57 17.57 0 0 0 -2.59-1l13.07-32.44a1.39 1.39 0 1 1 2.58 1z"https://token.gemcave.org/><path d="m277.1 302.33a1.39 1.39 0 0 1 -.77 1.82 1.5 1.5 0 0 1 -.52.1 1.39 1.39 0 0 1 -1.28-.87l-12.64-31.38a15.89 15.89 0 0 0 2.51-1.16z"https://token.gemcave.org/><path d="m266.91 242.89 24.14-24.14a1.38 1.38 0 0 1 1.95 2l-24.12 24.13a16.5 16.5 0 0 0 -1.97-1.99z"https://token.gemcave.org/><path d="m293.5 290.8a1.39 1.39 0 0 1 -2 2l-24.11-24.11a17.36 17.36 0 0 0 1.9-2z"https://token.gemcave.org/><path d="m271 248 32-12.91a1.39 1.39 0 0 1 1 2.58l-32 12.88a14.8 14.8 0 0 0 -1-2.55z"https://token.gemcave.org/><path d="m305.51 275.23a1.41 1.41 0 0 1 -1.28.87 1.66 1.66 0 0 1 -.53-.1l-32.16-13a18 18 0 0 0 .93-2.61l32.28 13a1.4 1.4 0 0 1 .76 1.84z"https://token.gemcave.org/><path d="m308.69 255.3a1.4 1.4 0 0 1 -1.4 1.4h-34.29c0-.23 0-.47 0-.7a17.87 17.87 0 0 0 -.13-2.08h34.37a1.39 1.39 0 0 1 1.45 1.38z"https://token.gemcave.org/></g></g></svg>
					</div>
					<div data-lang="id" class="item tran-id"> 
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><path fill="#bb2029" d="M324.8 236.8h148.9C473.7 106 367.7 0 236.8 0c65.4 0 88 118.4 88 236.8z"https://token.gemcave.org/><path fill="#cd2029" d="M0 236.8h335C335 118.4 302.1 0 236.7 0A236.8 236.8 0 000 236.8z"https://token.gemcave.org/><path fill="#e4e4e4" d="M319.8 236.8c0 118.5-17.6 236.9-83 236.9 130.8 0 236.9-106 236.9-236.9h-154z"https://token.gemcave.org/><path fill="#f3f4f5" d="M335 236.8H0c0 130.8 106 236.9 236.8 236.9 65.4 0 98.1-118.4 98.1-236.9z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="ru" class="item tran-ru">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#fff"https://token.gemcave.org/><path fill="#2b479d" d="M460.1 157.9H314.2c6.4 50.6 6.4 106.3.1 157h146.2a236.3 236.3 0 00-.4-157z"https://token.gemcave.org/><path fill="#efecec" d="M314.2 157.9h146l-.1-.2A237 237 0 00258 1c36.3 19.8 46.9 82.8 56.1 156.9z"https://token.gemcave.org/><path fill="#e63026" d="M258.1 472.7a237 237 0 00202.1-157.2l.3-.6H314.3c-9.2 74.4-19.8 137.8-56.2 157.8z"https://token.gemcave.org/><path fill="#3757a6" d="M0 236.8c0 27.4 4.7 53.6 13.2 78h313.3a654.9 654.9 0 000-157h-313a236.4 236.4 0 00-13.5 79z"https://token.gemcave.org/><path fill="#efefef" d="M13.6 157.7v.2h312.8c-9.3-74.1-32-137-68.3-157A236.9 236.9 0 0013.6 157.7z"https://token.gemcave.org/><path fill="#e73b36" d="M326.5 314.9H13.2l.2.6a236.9 236.9 0 00244.7 157.2c36.4-20 59.2-83.4 68.4-157.8z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="tr" class="item tran-tr">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#d80027"https://token.gemcave.org/><g fill="#f0f0f0"><path d="m245.52 209.19 21 28.94 34.02-11.03-21.04 28.92 21 28.94-34-11.07-21.04 28.92.02-35.76-34-11.07 34.02-11.03z"https://token.gemcave.org/><path d="M188.2 328.35a72.35 72.35 0 1 1 34.4-136 89.04 89.04 0 1 0 0 127.3 72 72 0 0 1-34.4 8.7z"https://token.gemcave.org/></g></svg>
					</div>
					<div data-lang="tl" class="item tran-tl">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" style="fill:#f0f0f0"https://token.gemcave.org/><path d="M256 0v256L75 437a256 256 0 0 0 437-181C512 114.6 256 0 256 0z" style="fill:#d80027"https://token.gemcave.org/><path d="M256 0A255.2 255.2 0 0 0 75 75l181 181h256A256 256 0 0 0 256 0z" style="fill:#0052b4"https://token.gemcave.org/><path d="M175.3 256 144 241.3l16.7-30.3-34 6.5-4.3-34.3-23.6 25.2-23.7-25.2-4.3 34.3-33.9-6.5 16.6 30.3L22.3 256l31.2 14.7L36.9 301l33.9-6.5 4.3 34.3 23.7-25.2 23.6 25.2 4.3-34.3 34 6.5-16.7-30.3zM68.3 100.2l10.4 14.5 17-5.4-10.6 14.4 10.4 14.5-17-5.6L67.9 147l.2-17.9-17-5.6 17-5.4zM68.3 365l10.4 14.6 17-5.4-10.6 14.3 10.4 14.6-17-5.7-10.6 14.4.2-17.9-17-5.6 17-5.4zM216.7 232.6l-10.4 14.5-17.1-5.4 10.6 14.4-10.4 14.6 17-5.7 10.6 14.4-.1-17.9 16.9-5.6-17-5.4z" style="fill:#ffda44"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="es" class="item tran-es">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M0 256c0 31.3 5.6 61.3 16 89l240 22.3L496 345a255.5 255.5 0 0 0 0-178l-240-22.3L16 167a255.5 255.5 0 0 0-16 89z" style="fill:#ffda44"https://token.gemcave.org/><path d="M496 167a256 256 0 0 0-480 0h480zM16 345a256 256 0 0 0 480 0H16z" style="fill:#d80027"https://token.gemcave.org/></svg>
					</div>
				</div>

				<div class="contract">
					Contract Address: <span class="contract-hash">'.$contractID.'</span>
					<svg xmlns="http://www.w3.org/2000/svg" class="copy-contract" viewBox="0 0 24 24"><defs/><path d="M23 2.8C23 1.1 21.8 0 20.2 0H8.8A2.7 2.7 0 006 2.8v13.4C6 17.9 7.2 19 8.8 19h11.4c1.6 0 2.8-1.2 2.8-2.8zm-4.8 11.7h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5z"https://token.gemcave.org/><path d="M8.8 20.5c-2.4 0-4.3-2-4.3-4.3V2.8v-.3h-.7A2.8 2.8 0 001 5.3v16C1 22.8 2.2 24 3.8 24h12c1.5 0 2.7-1.2 2.7-2.8v-.7z"https://token.gemcave.org/></svg>
				</div>
                
				<div class="links">
					<a href="'.$pancakeLink.'" target="_blank" title="GemCave on PancakeSwap">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"https://token.gemcave.org/><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"https://token.gemcave.org/><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$pooLink.'" target="_blank" title="GemCave on PooCoin">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"https://token.gemcave.org/></svg>                  
					</a>
					<a href="'.$telegramLink.'" target="_blank" title="GemCave on Telegram">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$bscLink.'" target="_blank" title="GemCave on BSC Scan">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.7 486.7"><defs/><path d="M33 362.4v78.9c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V302.5l-44.3 44.3A53.7 53.7 0 0133 362.4zM142 301.5v139.8c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V359a53.2 53.2 0 01-36.7-15.6l-41.9-42zM251 350.3v91c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8v-168l-69.9 70c-2.7 2.7-5.6 5-8.7 7zM432.7 170.2L360 242.9v198.4c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V175.7l-4.6-4.2-1.3-1.3z"https://token.gemcave.org/><path d="M482.6 41.4c-2.9-3.1-7.3-4.7-12.9-4.7h-1.6l-85.1 4c-3.8.2-9 .4-13.1 4.5a14.9 14.9 0 00-3.1 4.6c-4.2 9 1.7 15 4.5 17.8l7.1 7.2 14.9 14.9-171.6 171.7-77.1-77.1a24.5 24.5 0 00-34.7 0L7.2 286.9a24.5 24.5 0 000 34.7l4.6 4.6a24.5 24.5 0 0034.7 0l80.7-80.7 77.1 77a24.5 24.5 0 0034.8 0L432.7 129l21.9 21.8c2.6 2.6 6.2 6.2 11.7 6.2 2.3 0 4.6-.6 7-2a19 19 0 004.2-3c4.3-4.3 5.1-9.8 5.3-14.1l2.6-55.3 1.3-27.7c.3-5.8-1-10.3-4.1-13.5z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$dexLink.'" target="_blank" title="GemCave on DexTools">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" data-testid="" fill="#5a5a5a" font-size="40"><path d="M20.245 0L9.634 6.125l3.901 2.262 6.71-3.862 6.71 3.862 3.902-2.262L20.245 0zM26.956 11.586l3.9 2.263v4.526l-6.71 3.862v7.724l-3.9 2.263-3.902-2.263v-7.724l-6.71-3.862v-4.526l3.901-2.263 6.71 3.863 6.71-3.863z"></path><path d="M30.857 21.573V26.1l-3.901 2.262v-4.525l3.9-2.263z"></path><path d="M26.916 31.56l6.71-3.862v-7.724l3.902-2.263v12.25l-10.611 6.125V31.56zM33.627 12.25l-3.902-2.263 3.902-2.263 3.9 2.263v4.525l-3.9 2.263V12.25zM16.344 37.724V33.2l3.901 2.263 3.902-2.263v4.525l-3.902 2.263-3.9-2.263zM13.535 28.361L9.634 26.1v-4.526l3.901 2.263v4.525zM20.245 12.25l-3.9-2.263 3.9-2.263 3.902 2.263-3.902 2.263zM10.765 9.987l-3.9 2.263v4.525l-3.902-2.263V9.987l3.901-2.263 3.901 2.263z"></path><path d="M2.963 17.711l3.901 2.263v7.724l6.71 3.862v4.526L2.963 29.96V17.71z"></path></svg>
					</a>
					<a href="'.$twitterLink.'" target="_blank" title="GemCave on Twitter">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$instagramLink.'" target="_blank" title="GemCave on Instagram">
						<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"https://token.gemcave.org/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$redditLink.'" target="_blank" title="GemCave on Reddit">                                    
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"https://token.gemcave.org/><path d="m11.1 7.82.75-3.54a2 2 0 0 1 2.38-1.54l3.2.68A2 2 0 1 1 17 5.38l-3.2-.68-.67 3.13c1.79.14 3.56.73 5.17 1.7a3.2 3.2 0 0 1 4.74 2.67v.02a3.2 3.2 0 0 1-1.2 2.55 2.85 2.85 0 0 1-.02.13c0 4-4.45 7.03-9.8 7.03-5.33 0-9.7-3.03-9.7-6.96a5.31 5.31 0 0 1-.01-.18 3.2 3.2 0 0 1 3.45-5.35 11.45 11.45 0 0 1 5.33-1.62zm9.29 5.52c.4-.2.66-.62.66-1.07a1.2 1.2 0 0 0-2.02-.81l-.58.56-.67-.45a9.81 9.81 0 0 0-5.23-1.77h-1a9.5 9.5 0 0 0-5.25 1.68l-.66.45-.58-.55a1.2 1.2 0 1 0-1.32 1.95l.64.29-.06.7v.58c0 2.7 3.36 5.03 7.71 5.03 4.38 0 7.8-2.34 7.8-5.1a3.31 3.31 0 0 0 0-.52l-.05-.67.6-.3zM7 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm7 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm-1.98 5.1c-1.4 0-2.77-.37-3.89-1.2a.42.42 0 0 1 .6-.6c.95.69 2.12.99 3.27.99s2.33-.28 3.28-.96a.44.44 0 0 1 .74.2.47.47 0 0 1-.12.43c-.69.8-2.49 1.14-3.88 1.14z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$discordLink.'" target="_blank" title="GemCave on Discord">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"><path d="m11.5 13.5-.33.38c.1.08.22.12.35.12l-.02-.5Zm-1.07-1.71a.5.5 0 0 0-.78.62l.78-.62Zm.4-.41-.17-.47h-.02l.2.47Zm-1.74.51-.08-.49.08.5Zm-3.1 0-.1.48.1-.49Zm-1.76-.52-.18.46.18-.46Zm-.88-.41-.28.41.04.03.24-.44Zm-.1-.06.27-.42a.5.5 0 0 0-.05-.03l-.23.45Zm-.05-.04.35-.35a.5.5 0 0 0-.11-.08l-.24.43Zm2.15 1.52a.5.5 0 0 0-.78-.62l.78.62ZM3.5 13.5l-.02.5a.5.5 0 0 0 .35-.13l-.33-.37Zm-3-2.25H0a.5.5 0 0 0 0 .08l.5-.08Zm1.73-8.5-.3-.4a.5.5 0 0 0-.17.23l.47.18ZM5.59 1.5l.5-.05A.5.5 0 0 0 5.61 1l-.02.5Zm-.37 1.3a.5.5 0 0 0 1-.09l-1 .1Zm3.52-.06a.5.5 0 0 0 1 .13l-1-.13Zm.67-1.24L9.39 1a.5.5 0 0 0-.48.44l.5.06Zm3.36 1.26.47-.18a.5.5 0 0 0-.17-.22l-.3.4Zm1.73 8.49.5.08a.5.5 0 0 0 0-.08h-.5ZM6.48 8.8h-.5.5Zm5.02 4.7.33-.38a.8.8 0 0 1-.05-.04 21.35 21.35 0 0 1-1.35-1.3l-.78.63a9.8 9.8 0 0 0 1.34 1.31 29.3 29.3 0 0 0 .17.15h.01l.33-.37Zm.44-3.25c-.46.3-.9.52-1.28.66l.35.94c.45-.17.95-.42 1.48-.76l-.55-.84Zm-1.3.67c-.57.24-1.1.4-1.63.48l.17.99c.6-.1 1.21-.29 1.85-.55l-.4-.92ZM9 11.4a7.9 7.9 0 0 1-2.92-.01l-.18.98a8.9 8.9 0 0 0 3.29.02L9 11.4Zm-2.92 0c-.64-.13-1.2-.32-1.67-.5l-.36.93c.5.2 1.13.4 1.84.54l.2-.98Zm-1.67-.5c-.26-.1-.54-.22-.81-.38l-.5.88c.33.18.66.32.95.43l.36-.93Zm-.78-.36-.1-.06c-.03 0-.02 0 0 0l-.56.83.1.07c.03 0 .02 0 0 0l.56-.84Zm-.16-.09.06.04.02.02-.7.7c.02.03.07.09.17.14l.45-.9Zm-.03-.02a4.7 4.7 0 0 1-.28-.17l-.01-.01-.29.4-.29.42h.01l.03.02a3.9 3.9 0 0 0 .34.21l.49-.87Zm1.13 1.33a9.8 9.8 0 0 1-1.23 1.21l-.12.11-.04.04h-.01l.33.38.33.37h.01l.04-.04a38.04 38.04 0 0 0 .56-.5c.31-.3.7-.68.91-.95l-.78-.62ZM3.52 13c-1.17-.04-1.78-.52-2.11-.96a2.4 2.4 0 0 1-.42-.88l-.49.09-.5.08a1.37 1.37 0 0 0 .03.13l.1.3a3 3 0 0 0 .48.88c.5.67 1.4 1.31 2.87 1.36l.04-1ZM1 11.25c0-1.87.42-3.94.85-5.57a35.45 35.45 0 0 1 .84-2.74l-.46-.18-.47-.18v.02a9.4 9.4 0 0 0-.28.79c-.16.5-.38 1.2-.6 2.04A24.05 24.05 0 0 0 0 11.25h1Zm1.53-8.1A5.94 5.94 0 0 1 5.58 2l.01-.5.01-.5a.85.85 0 0 0-.1 0c-.05 0-.13 0-.24.02a6.94 6.94 0 0 0-3.34 1.34l.6.8Zm2.57-1.6.12 1.26 1-.1-.13-1.26-1 .1Zm4.63 1.32.17-1.3-.99-.13-.17 1.3 1 .13ZM9.41 1.5V2a.5.5 0 0 1 .05 0l.18.01c.16.02.4.05.68.12a5.9 5.9 0 0 1 2.15 1.03l.6-.8A6.94 6.94 0 0 0 9.5 1a2.53 2.53 0 0 0-.1 0v.5Zm3.36 1.26-.46.17v.01l.01.04a16.07 16.07 0 0 1 .25.72c.16.48.37 1.17.58 1.98.43 1.63.85 3.7.85 5.57h1c0-2-.44-4.17-.88-5.82a36.51 36.51 0 0 0-.86-2.79l-.01-.04v-.01l-.48.17Zm1.73 8.49-.5-.08v.05a2.4 2.4 0 0 1-.4.82c-.34.44-.95.92-2.12.96l.04 1a3.56 3.56 0 0 0 2.87-1.36 3.4 3.4 0 0 0 .6-1.3v-.01l-.49-.08ZM5.26 6.97c-1 0-1.72.87-1.72 1.83h1c0-.5.35-.83.72-.83v-1ZM3.54 8.8c0 .97.73 1.83 1.72 1.83v-1c-.36 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.72-.87 1.72-1.83h-1c0 .5-.36.83-.72.83v1Zm1.72-1.82a1.77 1.77 0 0 0-1.72-1.84v1c.37 0 .73.34.72.82l1 .02Zm2.65-1.84c-1 0-1.72.87-1.72 1.83h1c0-.5.36-.83.72-.83v-1ZM7.91 8.8c0 .97.74 1.83 1.72 1.83v-1c-.35 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.73-.87 1.73-1.83h-1c0 .5-.36.83-.73.83v1Zm1.73-1.83c0-.96-.73-1.83-1.73-1.83v1c.37 0 .73.33.73.83h1ZM3.74 4.44A7.83 7.83 0 0 1 7.5 3.28c1.15 0 2.32.37 3.76 1.16l.48-.88A8.74 8.74 0 0 0 7.5 2.28a8.8 8.8 0 0 0-4.24 1.28l.48.88Z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$gitHubLink.'" target="_blank" title="GemCave on GitHub">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 .396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183.803.151 1.093-.344 1.093-.772 0-.38-.009-1.385-.015-2.719-4.453.964-5.391-2.151-5.391-2.151-.729-1.844-1.781-2.339-1.781-2.339-1.448-.989.115-.968.115-.968 1.604.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328.14-1.031.557-1.74 1.011-2.135-3.552-.401-7.287-1.776-7.287-7.907 0-1.751.62-3.177 1.645-4.297-.177-.401-.719-2.031.141-4.235 0 0 1.339-.427 4.4 1.641a15.436 15.436 0 0 1 4-.541c1.36.009 2.719.187 4 .541 3.043-2.068 4.381-1.641 4.381-1.641.859 2.204.317 3.833.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891.556.479 1.077 1.464 1.077 2.959 0 2.14-.02 3.864-.02 4.385 0 .416.28.916 1.104.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"https://token.gemcave.org/></svg>
					</a>
				</div>

				<button onclick="addTokenFunction()" class="metamask-add">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 318.6 318.6" style="enable-background:new 0 0 318.6 318.6" xml:space="preserve"><style>.st1,.st2,.st3,.st4,.st5,.st6,.st9{fill:#e4761b;stroke:#e4761b;stroke-linecap:round;stroke-linejoin:round}.st2,.st3,.st4,.st5,.st6,.st9{fill:#d7c1b3;stroke:#d7c1b3}.st3,.st4,.st5,.st6,.st9{fill:#233447;stroke:#233447}.st4,.st5,.st6,.st9{fill:#cd6116;stroke:#cd6116}.st5,.st6,.st9{fill:#e4751f;stroke:#e4751f}.st6,.st9{fill:#f6851b;stroke:#f6851b}.st9{fill:#763d16;stroke:#763d16}</style><path style="fill:#e2761b;stroke:#e2761b;stroke-linecap:round;stroke-linejoin:round" d="m274 36-99 73 18-43z"https://token.gemcave.org/><path class="st1" d="m44 36 99 74-17-44zM238 207l-26 40 57 16 16-55zM34 208l16 55 57-16-27-40z"https://token.gemcave.org/><path class="st1" d="m104 138-16 24 56 3-2-61zM215 138l-39-35-1 62 56-3zM107 247l34-16-30-23zM178 231l34 16-5-39z"https://token.gemcave.org/><path class="st2" d="m212 247-34-16 3 22-1 9zM107 247l31 15v-9l3-22z"https://token.gemcave.org/><path class="st3" d="m139 194-28-9 20-9zM180 194l8-18 20 9z"https://token.gemcave.org/><path class="st4" d="m107 247 5-40-32 1zM207 207l5 40 26-39zM231 162l-56 3 5 29 8-18 20 9zM111 185l20-9 8 18 5-29-56-3z"https://token.gemcave.org/><g><path class="st5" d="m88 162 23 46v-23zM208 185l-1 23 24-46zM144 165l-5 29 6 34 2-45zM175 165l-3 18 1 45 7-34z"https://token.gemcave.org/></g><path class="st6" d="m180 194-7 34 5 3 29-23 1-23zM111 185v23l30 23 4-3-6-34z"https://token.gemcave.org/><path style="fill:#c0ad9e;stroke:#c0ad9e;stroke-linecap:round;stroke-linejoin:round" d="m180 262 1-9-3-2h-38l-2 2v9l-31-15 11 9 22 16h38l23-16 11-9z"https://token.gemcave.org/><path style="fill:#161616;stroke:#161616;stroke-linecap:round;stroke-linejoin:round" d="m178 231-5-3h-28l-4 3-3 22 2-2h38l3 2z"https://token.gemcave.org/><g><path class="st9" d="m278 114 9-41-13-37-96 71 37 31 52 16 12-14-5-4 8-7-6-5 8-6zM32 73l8 41-5 4 8 6-6 5 8 7-5 4 11 14 53-16 37-31-97-71z"https://token.gemcave.org/></g><path class="st6" d="m267 154-52-16 16 24-24 46h78zM104 138l-53 16-17 54h77l-23-46zM175 165l3-58 15-41h-67l15 41 3 58 1 18v45h28v-45z"https://token.gemcave.org/></svg>
				<span class="ichold">+💎</span> <span class="mobhide">Add to MetaMask</span>
				</button>
			</div>
		</div>';

$topBar2 = '<div id="topbar">
			<div class="container">

				<div id="google_translate_element"></div>
				<div class="langauges">
					<div data-lang="en" class="item tran-en">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><g fill="#29337a"><path d="M41.7 102.6a235.8 235.8 0 00-34 73.9h107.8l-73.8-73.9zM170.5 9.5a236 236 0 00-74.8 37.1l74.8 74.9V9.5zM101.3 431c20.8 14.6 44.2 25.9 69.2 33.2V361.7L101.3 431zM10.5 306.8a236 236 0 0035.2 69.8l69.8-69.8h-105z"https://token.gemcave.org/></g><g fill="#fff"><path d="M45.6 97.1l-3.9 5.5 73.8 73.9H7.8a237 237 0 00-4.4 20.2h141.8L45.6 97.1zM95.8 427l5.5 4 69.2-69.3v102.5c6.7 2 13.4 3.6 20.3 5V332l-95 95zM5.3 286.5c1.4 6.9 3.2 13.6 5.2 20.3h105l-69.8 69.8c7.6 10.4 16 20.1 25.1 29.1l119.3-119.2H5.3zM170.5 9.5v112L95.7 46.7c-10.3 7.6-20 16.1-28.9 25.4l124 124V4.4c-6.9 1.4-13.6 3-20.3 5z"https://token.gemcave.org/></g><g fill="#d32030"><path d="M170.5 306.1l-.7.7h.7zM190.1 286.5h.7v-.7zM281.2 196.7h-.7v.7zM171.2 176.5l-.7-.7v.7zM190.8 196v.7h.7z"https://token.gemcave.org/></g><g fill="#252f6c"><path d="M300.8 411.8v53c25.4-7 49-18.2 70.2-32.8l-57.5-57.6c-4.6 16.2-6.3 24.5-12.7 37.4zM313.8 108.5l62.8-62.8a236 236 0 00-75.8-36.9v54.6c7.4 14.7 8 26 13 45zM427 378a236.2 236.2 0 0036.2-71.2H355.8L427 378zM465.9 176.5a235.7 235.7 0 00-35-75.2l-75.1 75.2h110z"https://token.gemcave.org/></g><g fill="#e7e7e7"><path d="M327.6 290.5l16.3 16.3 78 77.9a250 250 0 005.1-6.7l-71.2-71.2h107.4c2-6.7 3.8-13.4 5.2-20.3H329.2c-.3 2.9-1.3 1.1-1.6 4zM311.4 120.3L382 49.7l-5.4-4-62.8 62.8c.7 2.5-3 9.3-2.4 11.8zM300.8 59V8.8c-6.6-1.8-13.4-3.4-20.3-4.7v24.5A131 131 0 01300.8 59zM326 196.7h144.2c-1.1-6.8-2.6-13.6-4.3-20.2H355.8l75.2-75.2a238 238 0 00-24.6-29.7l-84.7 84.7c2.3 15.3 3.3 24.2 4.3 40.4zM310 371l61 61c10.2-7 19.7-14.8 28.6-23.2l-80.1-80.2A411.5 411.5 0 01310 371zM280.5 442.3v27.3c7-1.3 13.7-2.9 20.3-4.7v-53.1c-6 12-12.7 22.3-20.3 30.5z"https://token.gemcave.org/></g><path fill="#d71f28" d="M321.7 156.3l84.7-84.7A236.8 236.8 0 00382 49.7l-66.6 66.6c3 12.4 4.3 26.5 6.3 40z"https://token.gemcave.org/><g fill="#d32030"><path d="M225 .3zM236.8 473.7zM236.8 473.7c15 0 29.6-1.5 43.7-4.1v-27.3c-12.4 13.5-27 31.4-43.7 31.4z"https://token.gemcave.org/></g><g fill="#d71f28"><path d="M470.2 196.7H328c1.9 29.7 1.7 60.3-.7 89.8h141.2a237.6 237.6 0 001.8-89.8zM327.6 290.5c-1.3 14-5.9 24.9-8.1 38.1l80.1 80.2a239 239 0 0022.2-24.1l-77.9-78-16.3-16.2z"https://token.gemcave.org/></g><path fill="#d32030" d="M280.5 30.3V4.1A238 238 0 00236.8 0c16.7 0 31.3 16.8 43.7 30.3z"https://token.gemcave.org/><g fill="#29337a"><path d="M300.8 422a255.1 255.1 0 0016.5-43.7l-16.5-16.5V422zM319.4 103c-5-19.2-11.2-36.5-18.6-51.3v69.8l18.6-18.6z"https://token.gemcave.org/></g><g fill="#fff"><path d="M332.2 295l.8-8.5h-9.4l8.6 8.6zM300.8 121.5V51.7a131 131 0 00-20.3-30.5v130l40.8-40.8-2-7.5-18.5 18.6zM281.2 196.7h52.5c-1-16.2-2.7-32-5-47.4l-47.5 47.4zM280.5 452.4c7.6-8.1 14.4-18.4 20.3-30.4v-60.3l16.5 16.5c3.8-13.2 7-27.4 9.6-42.2l-46.4-46.3v162.7z"https://token.gemcave.org/></g><path fill="#e51d35" d="M280.5 452.4V289.7l46.3 46.3c2.3-13.2 4.1-27 5.4-41l-8.6-8.5h9.4c2.3-29.5 2.5-60 .7-89.8h-52.5l47.5-47.4c-2-13.5-4.5-26.5-7.4-38.9l-40.8 40.8v-130A58.8 58.8 0 00236.8 0a244.2 244.2 0 00-46 4.5V196L66.8 72a239.1 239.1 0 00-21.2 25.1l79.3 79.4 20.3 20.2H3.4a238.6 238.6 0 001.9 89.8H190L70.8 405.7c7.9 7.7 16.2 14.8 25 21.4l95-95v137a238.6 238.6 0 0046 4.6c16.7 0 31.3-7.8 43.7-21.3z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="zh-CN" class="item tran-zh-CN">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#d62427"https://token.gemcave.org/><path fill="#dc3027" d="M0 236.8C0 106 106 0 236.8 0s130.8 473.7 0 473.7A236.8 236.8 0 010 236.8z"https://token.gemcave.org/><g fill="#f8d12e"><path d="M136.6 65.2l11.1 34h35.8l-29 21.1 11.1 34-29-21-28.9 21 11-34-28.9-21.1h35.8zM220.1 45.9l-3.5 11.9 10.3 7-12.5.4-3.4 11.9-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM220.1 152.8l-3.5 11.9 10.3 7-12.5.4L211 184l-4.2-11.7-12.5.4 9.9-7.6-4.2-11.7 10.3 7zM250.4 78.4l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.4 9.9-7.7-4.2-11.7 10.3 7zM250.4 122l-3.5 12 10.3 7-12.5.3-3.4 12-4.2-11.7-12.5.3 9.9-7.6-4.2-11.7 10.3 7z"https://token.gemcave.org/></g></svg>
					</div>
					<div data-lang="hi" class="item tran-hi">
						<svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g id="BULINE"><circle cx="256" cy="256" fill="#27273d" r="256"https://token.gemcave.org/></g><g id="Icons"><path d="m496.14 167.12h-480.29c36.15-97.58 130.01-167.12 240.15-167.12s204 69.54 240.14 167.12z" fill="#e88032"https://token.gemcave.org/><path d="m496.14 344.87h-480.29a256.53 256.53 0 0 1 0-177.75h480.29a253 253 0 0 1 8.91 29.41 257.31 257.31 0 0 1 -8.91 148.34z" fill="#fff"https://token.gemcave.org/><path d="m256 512a256.09 256.09 0 0 1 -240.15-167.13h480.29a252.21 252.21 0 0 1 -13.05 29.41 256 256 0 0 1 -227.09 137.72z" fill="#00b564"https://token.gemcave.org/><path d="m289.5 2.17c-95.38 12.47-174.24 77.43-206.65 165h-67c36.15-97.63 130.01-167.17 240.15-167.17a259.05 259.05 0 0 1 33.5 2.17z" fill="#d8712b"https://token.gemcave.org/><path d="m67 256a255.41 255.41 0 0 0 15.85 88.87h-67a256.53 256.53 0 0 1 0-177.75h67a252.91 252.91 0 0 0 -8.85 29.41 256.16 256.16 0 0 0 -7 59.47z" fill="#e2e2e2"https://token.gemcave.org/><path d="m289.5 509.83a258.82 258.82 0 0 1 -33.5 2.17 256.09 256.09 0 0 1 -240.15-167.13h67a256.15 256.15 0 0 0 206.65 165z" fill="#049b53"https://token.gemcave.org/><circle cx="408.07" cy="96.45" fill="#ef9050" r="16.28"https://token.gemcave.org/><circle cx="384.09" cy="72.47" fill="#ef9050" r="11.53"https://token.gemcave.org/><circle cx="256" cy="256" fill="#3e436d" r="79.86"https://token.gemcave.org/><path d="m318.86 249.5-3.73-.83c0-.3-.07-.6-.11-.89l3.38-1.78a2.82 2.82 0 0 0 1.43-3.24l-1.93-7.22a2.84 2.84 0 0 0 -2.86-2.1l-3.81.16c-.11-.28-.22-.56-.34-.84l2.8-2.57a2.82 2.82 0 0 0 .54-3.5l-3.74-6.48a2.82 2.82 0 0 0 -3.3-1.28l-3.64 1.14c-.18-.24-.37-.47-.55-.7l2.05-3.23a2.84 2.84 0 0 0 -.39-3.53l-5.28-5.28a2.84 2.84 0 0 0 -3.53-.39l-3.23 2.06-.7-.55 1.14-3.64a2.82 2.82 0 0 0 -1.28-3.3l-6.48-3.74a2.82 2.82 0 0 0 -3.5.54l-2.57 2.8-.84-.34.16-3.81a2.84 2.84 0 0 0 -2.1-2.86l-7.22-1.93a2.82 2.82 0 0 0 -3.23 1.43l-1.78 3.4-.89-.11-.83-3.73a2.82 2.82 0 0 0 -2.76-2.22h-7.48a2.82 2.82 0 0 0 -2.76 2.22l-.83 3.73-.89.11-1.78-3.4a2.82 2.82 0 0 0 -3.24-1.43l-7.22 1.93a2.84 2.84 0 0 0 -2.1 2.86l.16 3.81-.84.34-2.57-2.8a2.82 2.82 0 0 0 -3.5-.54l-6.48 3.74a2.82 2.82 0 0 0 -1.28 3.3l1.14 3.64-.7.55-3.22-2a2.84 2.84 0 0 0 -3.53.39l-5.28 5.28a2.84 2.84 0 0 0 -.39 3.53l2.05 3.23c-.18.23-.37.46-.55.7l-3.64-1.14a2.82 2.82 0 0 0 -3.3 1.28l-3.74 6.48a2.82 2.82 0 0 0 .54 3.5l2.8 2.57c-.12.28-.23.56-.34.84l-3.81-.16a2.84 2.84 0 0 0 -2.86 2.1l-1.93 7.22a2.82 2.82 0 0 0 1.43 3.18l3.38 1.77c0 .29-.07.59-.11.89l-3.73.83a2.82 2.82 0 0 0 -2.22 2.76v7.48a2.82 2.82 0 0 0 2.22 2.76l3.73.83c0 .3.07.6.11.89l-3.38 1.79a2.82 2.82 0 0 0 -1.43 3.24l1.93 7.22a2.84 2.84 0 0 0 2.86 2.1l3.81-.16c.11.28.22.56.34.84l-2.8 2.57a2.82 2.82 0 0 0 -.54 3.5l3.74 6.48a2.82 2.82 0 0 0 3.3 1.28l3.64-1.14c.18.24.37.47.55.7l-2 3.22a2.84 2.84 0 0 0 .39 3.53l5.28 5.28a2.84 2.84 0 0 0 3.53.39l3.23-2.05.7.55-1.14 3.64a2.82 2.82 0 0 0 1.28 3.3l6.48 3.74a2.82 2.82 0 0 0 3.5-.54l2.57-2.8.84.34-.16 3.81a2.84 2.84 0 0 0 2.1 2.86l7.22 1.93a2.82 2.82 0 0 0 3.18-1.43l1.77-3.38.89.11.83 3.73a2.82 2.82 0 0 0 2.76 2.22h7.48a2.82 2.82 0 0 0 2.76-2.22l.83-3.73.89-.11 1.79 3.38a2.82 2.82 0 0 0 3.24 1.43l7.22-1.93a2.84 2.84 0 0 0 2.1-2.86l-.16-3.81.84-.34 2.57 2.8a2.82 2.82 0 0 0 3.5.54l6.48-3.74a2.82 2.82 0 0 0 1.28-3.3l-1.14-3.64.7-.55 3.23 2.05a2.84 2.84 0 0 0 3.53-.39l5.28-5.28a2.84 2.84 0 0 0 .39-3.53l-2.06-3.23c.18-.23.37-.46.55-.7l3.64 1.14a2.82 2.82 0 0 0 3.3-1.28l3.74-6.48a2.82 2.82 0 0 0 -.54-3.5l-2.8-2.57c.12-.28.23-.56.34-.84l3.81.16a2.84 2.84 0 0 0 2.86-2.1l1.93-7.22a2.82 2.82 0 0 0 -1.43-3.23l-3.4-1.78c0-.29.07-.59.11-.89l3.73-.83a2.82 2.82 0 0 0 2.22-2.76v-7.48a2.82 2.82 0 0 0 -2.2-2.76z" fill="#fff"https://token.gemcave.org/><g fill="#3e436d"><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"https://token.gemcave.org/><path d="m268.28 256a4.11 4.11 0 0 1 0 .7 10 10 0 0 1 -.24 1.91 11.84 11.84 0 0 1 -.9 2.63 12.32 12.32 0 0 1 -1.18 2 11.87 11.87 0 0 1 -1.88 2 10.11 10.11 0 0 1 -1.45 1.08 11.54 11.54 0 0 1 -2.5 1.21 10.8 10.8 0 0 1 -2.71.63 10.63 10.63 0 0 1 -2.76 0 11.22 11.22 0 0 1 -2.15-.43 11 11 0 0 1 -2.54-1.1 11.59 11.59 0 0 1 -1.7-1.16 11.12 11.12 0 0 1 -1.93-2 10.74 10.74 0 0 1 -1.3-2 11.18 11.18 0 0 1 -.93-2.62 10.14 10.14 0 0 1 -.31-2.14 4.11 4.11 0 0 1 0-.7 12.87 12.87 0 0 1 .18-2.08 9.64 9.64 0 0 1 .47-1.83 10.66 10.66 0 0 1 1.18-2.51 9.71 9.71 0 0 1 1.18-1.62 11.87 11.87 0 0 1 2.05-1.88 12.57 12.57 0 0 1 4.81-2.13c.35-.06.68-.11 1-.15s.91-.08 1.38-.08.93 0 1.38.08a9 9 0 0 1 1.63.3 10.74 10.74 0 0 1 2.6 1 10.61 10.61 0 0 1 1.89 1.21 10.35 10.35 0 0 1 2 1.93 9.27 9.27 0 0 1 1.1 1.55 11.55 11.55 0 0 1 1.13 2.53 10.51 10.51 0 0 1 .39 1.61 12.87 12.87 0 0 1 .11 2.06z"https://token.gemcave.org/><path d="m239 256.7h-34.29a1.39 1.39 0 1 1 0-2.78h34.37a17.87 17.87 0 0 0 -.08 2.08z"https://token.gemcave.org/><path d="m240.56 263.25-31.63 12.75a1.45 1.45 0 0 1 -.51.1 1.39 1.39 0 0 1 -.52-2.68l31.7-12.76a17.42 17.42 0 0 0 .96 2.59z"https://token.gemcave.org/><path d="m207.77 235.84a1.41 1.41 0 0 1 1.81-.77l31.5 12.69a16.06 16.06 0 0 0 -1.15 2.53l-31.38-12.64a1.4 1.4 0 0 1 -.78-1.81z"https://token.gemcave.org/><path d="m244.84 268.89-24.38 24.36a1.39 1.39 0 0 1 -1 .42 1.4 1.4 0 0 1 -1-2.38l24.39-24.39a16.65 16.65 0 0 0 1.99 1.99z"https://token.gemcave.org/><path d="m219 220.21a1.37 1.37 0 0 1 0-2 1.39 1.39 0 0 1 1.95 0l24.42 24.42a17.36 17.36 0 0 0 -2 1.9z"https://token.gemcave.org/><path d="m248.13 271.12a14.67 14.67 0 0 0 2.55 1.08l-12.56 31.18a1.41 1.41 0 0 1 -1.3.87 1.65 1.65 0 0 1 -.52-.1 1.41 1.41 0 0 1 -.76-1.82z"https://token.gemcave.org/><path d="m236.19 208.22a1.38 1.38 0 1 1 2.56-1l13 32.29a15.6 15.6 0 0 0 -2.62.91z"https://token.gemcave.org/><path d="m256 239c-.47 0-.93 0-1.38.05v-34.34a1.38 1.38 0 1 1 2.76 0v34.29c-.45 0-.91 0-1.38 0z"https://token.gemcave.org/><path d="m256 273.05c.47 0 .93 0 1.38-.05v34.29a1.38 1.38 0 1 1 -2.76 0v-34.29c.45 0 .91.05 1.38.05z"https://token.gemcave.org/><path d="m263.4 240.63a17.57 17.57 0 0 0 -2.59-1l13.07-32.44a1.39 1.39 0 1 1 2.58 1z"https://token.gemcave.org/><path d="m277.1 302.33a1.39 1.39 0 0 1 -.77 1.82 1.5 1.5 0 0 1 -.52.1 1.39 1.39 0 0 1 -1.28-.87l-12.64-31.38a15.89 15.89 0 0 0 2.51-1.16z"https://token.gemcave.org/><path d="m266.91 242.89 24.14-24.14a1.38 1.38 0 0 1 1.95 2l-24.12 24.13a16.5 16.5 0 0 0 -1.97-1.99z"https://token.gemcave.org/><path d="m293.5 290.8a1.39 1.39 0 0 1 -2 2l-24.11-24.11a17.36 17.36 0 0 0 1.9-2z"https://token.gemcave.org/><path d="m271 248 32-12.91a1.39 1.39 0 0 1 1 2.58l-32 12.88a14.8 14.8 0 0 0 -1-2.55z"https://token.gemcave.org/><path d="m305.51 275.23a1.41 1.41 0 0 1 -1.28.87 1.66 1.66 0 0 1 -.53-.1l-32.16-13a18 18 0 0 0 .93-2.61l32.28 13a1.4 1.4 0 0 1 .76 1.84z"https://token.gemcave.org/><path d="m308.69 255.3a1.4 1.4 0 0 1 -1.4 1.4h-34.29c0-.23 0-.47 0-.7a17.87 17.87 0 0 0 -.13-2.08h34.37a1.39 1.39 0 0 1 1.45 1.38z"https://token.gemcave.org/></g></g></svg>
					</div>
					<div data-lang="id" class="item tran-id"> 
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><path fill="#bb2029" d="M324.8 236.8h148.9C473.7 106 367.7 0 236.8 0c65.4 0 88 118.4 88 236.8z"https://token.gemcave.org/><path fill="#cd2029" d="M0 236.8h335C335 118.4 302.1 0 236.7 0A236.8 236.8 0 000 236.8z"https://token.gemcave.org/><path fill="#e4e4e4" d="M319.8 236.8c0 118.5-17.6 236.9-83 236.9 130.8 0 236.9-106 236.9-236.9h-154z"https://token.gemcave.org/><path fill="#f3f4f5" d="M335 236.8H0c0 130.8 106 236.9 236.8 236.9 65.4 0 98.1-118.4 98.1-236.9z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="ru" class="item tran-ru">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 473.7 473.7"><defs/><circle cx="236.8" cy="236.8" r="236.8" fill="#fff"https://token.gemcave.org/><path fill="#2b479d" d="M460.1 157.9H314.2c6.4 50.6 6.4 106.3.1 157h146.2a236.3 236.3 0 00-.4-157z"https://token.gemcave.org/><path fill="#efecec" d="M314.2 157.9h146l-.1-.2A237 237 0 00258 1c36.3 19.8 46.9 82.8 56.1 156.9z"https://token.gemcave.org/><path fill="#e63026" d="M258.1 472.7a237 237 0 00202.1-157.2l.3-.6H314.3c-9.2 74.4-19.8 137.8-56.2 157.8z"https://token.gemcave.org/><path fill="#3757a6" d="M0 236.8c0 27.4 4.7 53.6 13.2 78h313.3a654.9 654.9 0 000-157h-313a236.4 236.4 0 00-13.5 79z"https://token.gemcave.org/><path fill="#efefef" d="M13.6 157.7v.2h312.8c-9.3-74.1-32-137-68.3-157A236.9 236.9 0 0013.6 157.7z"https://token.gemcave.org/><path fill="#e73b36" d="M326.5 314.9H13.2l.2.6a236.9 236.9 0 00244.7 157.2c36.4-20 59.2-83.4 68.4-157.8z"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="tr" class="item tran-tr">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#d80027"https://token.gemcave.org/><g fill="#f0f0f0"><path d="m245.52 209.19 21 28.94 34.02-11.03-21.04 28.92 21 28.94-34-11.07-21.04 28.92.02-35.76-34-11.07 34.02-11.03z"https://token.gemcave.org/><path d="M188.2 328.35a72.35 72.35 0 1 1 34.4-136 89.04 89.04 0 1 0 0 127.3 72 72 0 0 1-34.4 8.7z"https://token.gemcave.org/></g></svg>
					</div>
					<div data-lang="tl" class="item tran-tl">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" style="fill:#f0f0f0"https://token.gemcave.org/><path d="M256 0v256L75 437a256 256 0 0 0 437-181C512 114.6 256 0 256 0z" style="fill:#d80027"https://token.gemcave.org/><path d="M256 0A255.2 255.2 0 0 0 75 75l181 181h256A256 256 0 0 0 256 0z" style="fill:#0052b4"https://token.gemcave.org/><path d="M175.3 256 144 241.3l16.7-30.3-34 6.5-4.3-34.3-23.6 25.2-23.7-25.2-4.3 34.3-33.9-6.5 16.6 30.3L22.3 256l31.2 14.7L36.9 301l33.9-6.5 4.3 34.3 23.7-25.2 23.6 25.2 4.3-34.3 34 6.5-16.7-30.3zM68.3 100.2l10.4 14.5 17-5.4-10.6 14.4 10.4 14.5-17-5.6L67.9 147l.2-17.9-17-5.6 17-5.4zM68.3 365l10.4 14.6 17-5.4-10.6 14.3 10.4 14.6-17-5.7-10.6 14.4.2-17.9-17-5.6 17-5.4zM216.7 232.6l-10.4 14.5-17.1-5.4 10.6 14.4-10.4 14.6 17-5.7 10.6 14.4-.1-17.9 16.9-5.6-17-5.4z" style="fill:#ffda44"https://token.gemcave.org/></svg>
					</div>
					<div data-lang="es" class="item tran-es">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512"><path d="M0 256c0 31.3 5.6 61.3 16 89l240 22.3L496 345a255.5 255.5 0 0 0 0-178l-240-22.3L16 167a255.5 255.5 0 0 0-16 89z" style="fill:#ffda44"https://token.gemcave.org/><path d="M496 167a256 256 0 0 0-480 0h480zM16 345a256 256 0 0 0 480 0H16z" style="fill:#d80027"https://token.gemcave.org/></svg>
					</div>
				</div>

				<div class="links">
					<a href="'.$pancakeLink.'" target="_blank" title="GemCave on PancakeSwap">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"https://token.gemcave.org/><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"https://token.gemcave.org/><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$pooLink.'" target="_blank" title="GemCave on PooCoin">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"https://token.gemcave.org/></svg>                  
					</a>
					<a href="'.$telegramLink.'" target="_blank" title="GemCave on Telegram">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$bscLink.'" target="_blank" title="GemCave on BSC Scan">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.7 486.7"><defs/><path d="M33 362.4v78.9c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V302.5l-44.3 44.3A53.7 53.7 0 0133 362.4zM142 301.5v139.8c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V359a53.2 53.2 0 01-36.7-15.6l-41.9-42zM251 350.3v91c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8v-168l-69.9 70c-2.7 2.7-5.6 5-8.7 7zM432.7 170.2L360 242.9v198.4c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V175.7l-4.6-4.2-1.3-1.3z"https://token.gemcave.org/><path d="M482.6 41.4c-2.9-3.1-7.3-4.7-12.9-4.7h-1.6l-85.1 4c-3.8.2-9 .4-13.1 4.5a14.9 14.9 0 00-3.1 4.6c-4.2 9 1.7 15 4.5 17.8l7.1 7.2 14.9 14.9-171.6 171.7-77.1-77.1a24.5 24.5 0 00-34.7 0L7.2 286.9a24.5 24.5 0 000 34.7l4.6 4.6a24.5 24.5 0 0034.7 0l80.7-80.7 77.1 77a24.5 24.5 0 0034.8 0L432.7 129l21.9 21.8c2.6 2.6 6.2 6.2 11.7 6.2 2.3 0 4.6-.6 7-2a19 19 0 004.2-3c4.3-4.3 5.1-9.8 5.3-14.1l2.6-55.3 1.3-27.7c.3-5.8-1-10.3-4.1-13.5z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$dexLink.'" target="_blank" title="GemCave on DexTools">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" data-testid="" fill="#5a5a5a" font-size="40"><path d="M20.245 0L9.634 6.125l3.901 2.262 6.71-3.862 6.71 3.862 3.902-2.262L20.245 0zM26.956 11.586l3.9 2.263v4.526l-6.71 3.862v7.724l-3.9 2.263-3.902-2.263v-7.724l-6.71-3.862v-4.526l3.901-2.263 6.71 3.863 6.71-3.863z"></path><path d="M30.857 21.573V26.1l-3.901 2.262v-4.525l3.9-2.263z"></path><path d="M26.916 31.56l6.71-3.862v-7.724l3.902-2.263v12.25l-10.611 6.125V31.56zM33.627 12.25l-3.902-2.263 3.902-2.263 3.9 2.263v4.525l-3.9 2.263V12.25zM16.344 37.724V33.2l3.901 2.263 3.902-2.263v4.525l-3.902 2.263-3.9-2.263zM13.535 28.361L9.634 26.1v-4.526l3.901 2.263v4.525zM20.245 12.25l-3.9-2.263 3.9-2.263 3.902 2.263-3.902 2.263zM10.765 9.987l-3.9 2.263v4.525l-3.902-2.263V9.987l3.901-2.263 3.901 2.263z"></path><path d="M2.963 17.711l3.901 2.263v7.724l6.71 3.862v4.526L2.963 29.96V17.71z"></path></svg>
					</a>
					<a href="'.$twitterLink.'" target="_blank" title="GemCave on Twitter">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$instagramLink.'" target="_blank" title="GemCave on Instagram">
						<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"https://token.gemcave.org/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$redditLink.'" target="_blank" title="GemCave on Reddit">                                    
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"https://token.gemcave.org/><path d="m11.1 7.82.75-3.54a2 2 0 0 1 2.38-1.54l3.2.68A2 2 0 1 1 17 5.38l-3.2-.68-.67 3.13c1.79.14 3.56.73 5.17 1.7a3.2 3.2 0 0 1 4.74 2.67v.02a3.2 3.2 0 0 1-1.2 2.55 2.85 2.85 0 0 1-.02.13c0 4-4.45 7.03-9.8 7.03-5.33 0-9.7-3.03-9.7-6.96a5.31 5.31 0 0 1-.01-.18 3.2 3.2 0 0 1 3.45-5.35 11.45 11.45 0 0 1 5.33-1.62zm9.29 5.52c.4-.2.66-.62.66-1.07a1.2 1.2 0 0 0-2.02-.81l-.58.56-.67-.45a9.81 9.81 0 0 0-5.23-1.77h-1a9.5 9.5 0 0 0-5.25 1.68l-.66.45-.58-.55a1.2 1.2 0 1 0-1.32 1.95l.64.29-.06.7v.58c0 2.7 3.36 5.03 7.71 5.03 4.38 0 7.8-2.34 7.8-5.1a3.31 3.31 0 0 0 0-.52l-.05-.67.6-.3zM7 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm7 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zm-1.98 5.1c-1.4 0-2.77-.37-3.89-1.2a.42.42 0 0 1 .6-.6c.95.69 2.12.99 3.27.99s2.33-.28 3.28-.96a.44.44 0 0 1 .74.2.47.47 0 0 1-.12.43c-.69.8-2.49 1.14-3.88 1.14z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$discordLink.'" target="_blank" title="GemCave on Discord">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"><path d="m11.5 13.5-.33.38c.1.08.22.12.35.12l-.02-.5Zm-1.07-1.71a.5.5 0 0 0-.78.62l.78-.62Zm.4-.41-.17-.47h-.02l.2.47Zm-1.74.51-.08-.49.08.5Zm-3.1 0-.1.48.1-.49Zm-1.76-.52-.18.46.18-.46Zm-.88-.41-.28.41.04.03.24-.44Zm-.1-.06.27-.42a.5.5 0 0 0-.05-.03l-.23.45Zm-.05-.04.35-.35a.5.5 0 0 0-.11-.08l-.24.43Zm2.15 1.52a.5.5 0 0 0-.78-.62l.78.62ZM3.5 13.5l-.02.5a.5.5 0 0 0 .35-.13l-.33-.37Zm-3-2.25H0a.5.5 0 0 0 0 .08l.5-.08Zm1.73-8.5-.3-.4a.5.5 0 0 0-.17.23l.47.18ZM5.59 1.5l.5-.05A.5.5 0 0 0 5.61 1l-.02.5Zm-.37 1.3a.5.5 0 0 0 1-.09l-1 .1Zm3.52-.06a.5.5 0 0 0 1 .13l-1-.13Zm.67-1.24L9.39 1a.5.5 0 0 0-.48.44l.5.06Zm3.36 1.26.47-.18a.5.5 0 0 0-.17-.22l-.3.4Zm1.73 8.49.5.08a.5.5 0 0 0 0-.08h-.5ZM6.48 8.8h-.5.5Zm5.02 4.7.33-.38a.8.8 0 0 1-.05-.04 21.35 21.35 0 0 1-1.35-1.3l-.78.63a9.8 9.8 0 0 0 1.34 1.31 29.3 29.3 0 0 0 .17.15h.01l.33-.37Zm.44-3.25c-.46.3-.9.52-1.28.66l.35.94c.45-.17.95-.42 1.48-.76l-.55-.84Zm-1.3.67c-.57.24-1.1.4-1.63.48l.17.99c.6-.1 1.21-.29 1.85-.55l-.4-.92ZM9 11.4a7.9 7.9 0 0 1-2.92-.01l-.18.98a8.9 8.9 0 0 0 3.29.02L9 11.4Zm-2.92 0c-.64-.13-1.2-.32-1.67-.5l-.36.93c.5.2 1.13.4 1.84.54l.2-.98Zm-1.67-.5c-.26-.1-.54-.22-.81-.38l-.5.88c.33.18.66.32.95.43l.36-.93Zm-.78-.36-.1-.06c-.03 0-.02 0 0 0l-.56.83.1.07c.03 0 .02 0 0 0l.56-.84Zm-.16-.09.06.04.02.02-.7.7c.02.03.07.09.17.14l.45-.9Zm-.03-.02a4.7 4.7 0 0 1-.28-.17l-.01-.01-.29.4-.29.42h.01l.03.02a3.9 3.9 0 0 0 .34.21l.49-.87Zm1.13 1.33a9.8 9.8 0 0 1-1.23 1.21l-.12.11-.04.04h-.01l.33.38.33.37h.01l.04-.04a38.04 38.04 0 0 0 .56-.5c.31-.3.7-.68.91-.95l-.78-.62ZM3.52 13c-1.17-.04-1.78-.52-2.11-.96a2.4 2.4 0 0 1-.42-.88l-.49.09-.5.08a1.37 1.37 0 0 0 .03.13l.1.3a3 3 0 0 0 .48.88c.5.67 1.4 1.31 2.87 1.36l.04-1ZM1 11.25c0-1.87.42-3.94.85-5.57a35.45 35.45 0 0 1 .84-2.74l-.46-.18-.47-.18v.02a9.4 9.4 0 0 0-.28.79c-.16.5-.38 1.2-.6 2.04A24.05 24.05 0 0 0 0 11.25h1Zm1.53-8.1A5.94 5.94 0 0 1 5.58 2l.01-.5.01-.5a.85.85 0 0 0-.1 0c-.05 0-.13 0-.24.02a6.94 6.94 0 0 0-3.34 1.34l.6.8Zm2.57-1.6.12 1.26 1-.1-.13-1.26-1 .1Zm4.63 1.32.17-1.3-.99-.13-.17 1.3 1 .13ZM9.41 1.5V2a.5.5 0 0 1 .05 0l.18.01c.16.02.4.05.68.12a5.9 5.9 0 0 1 2.15 1.03l.6-.8A6.94 6.94 0 0 0 9.5 1a2.53 2.53 0 0 0-.1 0v.5Zm3.36 1.26-.46.17v.01l.01.04a16.07 16.07 0 0 1 .25.72c.16.48.37 1.17.58 1.98.43 1.63.85 3.7.85 5.57h1c0-2-.44-4.17-.88-5.82a36.51 36.51 0 0 0-.86-2.79l-.01-.04v-.01l-.48.17Zm1.73 8.49-.5-.08v.05a2.4 2.4 0 0 1-.4.82c-.34.44-.95.92-2.12.96l.04 1a3.56 3.56 0 0 0 2.87-1.36 3.4 3.4 0 0 0 .6-1.3v-.01l-.49-.08ZM5.26 6.97c-1 0-1.72.87-1.72 1.83h1c0-.5.35-.83.72-.83v-1ZM3.54 8.8c0 .97.73 1.83 1.72 1.83v-1c-.36 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.72-.87 1.72-1.83h-1c0 .5-.36.83-.72.83v1Zm1.72-1.82a1.77 1.77 0 0 0-1.72-1.84v1c.37 0 .73.34.72.82l1 .02Zm2.65-1.84c-1 0-1.72.87-1.72 1.83h1c0-.5.36-.83.72-.83v-1ZM7.91 8.8c0 .97.74 1.83 1.72 1.83v-1c-.35 0-.72-.33-.72-.83h-1Zm1.72 1.83c1 0 1.73-.87 1.73-1.83h-1c0 .5-.36.83-.73.83v1Zm1.73-1.83c0-.96-.73-1.83-1.73-1.83v1c.37 0 .73.33.73.83h1ZM3.74 4.44A7.83 7.83 0 0 1 7.5 3.28c1.15 0 2.32.37 3.76 1.16l.48-.88A8.74 8.74 0 0 0 7.5 2.28a8.8 8.8 0 0 0-4.24 1.28l.48.88Z"https://token.gemcave.org/></svg>
					</a>
					<a href="'.$gitHubLink.'" target="_blank" title="GemCave on GitHub">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 .396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183.803.151 1.093-.344 1.093-.772 0-.38-.009-1.385-.015-2.719-4.453.964-5.391-2.151-5.391-2.151-.729-1.844-1.781-2.339-1.781-2.339-1.448-.989.115-.968.115-.968 1.604.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328.14-1.031.557-1.74 1.011-2.135-3.552-.401-7.287-1.776-7.287-7.907 0-1.751.62-3.177 1.645-4.297-.177-.401-.719-2.031.141-4.235 0 0 1.339-.427 4.4 1.641a15.436 15.436 0 0 1 4-.541c1.36.009 2.719.187 4 .541 3.043-2.068 4.381-1.641 4.381-1.641.859 2.204.317 3.833.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891.556.479 1.077 1.464 1.077 2.959 0 2.14-.02 3.864-.02 4.385 0 .416.28.916 1.104.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"https://token.gemcave.org/></svg>
					</a>
				</div>
			</div>
		</div>';


$fonts = '
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">';


$tracking = '
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-4GBML8YRFF"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag("js", new Date());

			gtag("config", "G-2Z0V3V3JBF");
		</script>';

function clean($userInput) {
	$userInput= trim($userInput);
	$userInput= stripslashes($userInput);
	$userInput= htmlspecialchars($userInput);
	return $userInput;
}

// X Time Ago Function
function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ' : 'just now';
}

function sendTGMsg($walletId, $prizeWon, $gamePlayed){    
	global $allPrizes, $dbhost, $dbusername, $dbpass, $dbname;

	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
	$sql = "SELECT * FROM prizes WHERE wallet='".$walletId."'";
	$allWalletResult = $connection->query($sql);
	$row = $allWalletResult->fetch_object();
	if ($row->displayname != '') {
		$walletId = $row->displayname;
	}

	$gameUrl = '';
	if ($gamePlayed == 'wheel'){
		$gamePlayed = '<b>🎡 Spin The Wheel 🎡</b>';
		$gameUrl = 'https://token.gemcave.org/wheel';
	}
	if ($gamePlayed == 'scratch'){
		$gamePlayed = '<b>⛏️ Gem Miner ⛏️</b>';
		$gameUrl = 'https://token.gemcave.org/scratch';
	}
	if ($gamePlayed == 'grabber'){
		$gamePlayed = '<b>🦞 Gem Grabber 🦞</b>';
		$gameUrl = 'https://token.gemcave.org/claw';
	}
	$prizeMsg = '';

	if ($prizeWon == ''){
		return false;
	}

	foreach ($prizeWon as $singlePrize){
		$prizeMsg .= '<pre>'.$allPrizes[$singlePrize]['emoji'].$allPrizes[$singlePrize]['emoji'].' '.$allPrizes[$singlePrize]['title'].' '.$allPrizes[$singlePrize]['emoji'].$allPrizes[$singlePrize]['emoji'].'</pre>';
	}

	$buildMsg = urlencode('<b><u>🎯 Prize Win! 🎯</u></b>

<b>GEMS holder</b>: <pre>'.$walletId.'</pre>
<b>Won</b>:'.$prizeMsg.'
<b>Playing</b>:
	<a href="'.$gameUrl.'">'.$gamePlayed.'</a>');

	$inlineKB = urlencode('{
		"inline_keyboard": [[
			{
				"text": "GemCave Gaming",
				"url": "https://games.gemcave.org/"            
			}]
		]
	}');

	$telegramApiUrl = getTelegramApiUrl('sendmessage');
	if ($telegramApiUrl === false) {
		return;
	}

	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,$telegramApiUrl."?disable_web_page_preview=true&parse_mode=html&chat_id=-1001731677896&text=".$buildMsg.'&reply_markup='.$inlineKB);
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'TGGEM');
	curl_exec($curl_handle);
	curl_close($curl_handle);
}





function shuffle_assoc($array)
{
	while (count($array)) {
		$keys = array_keys($array);
		$index = $keys[random_int(0, count($keys)-1)];
		$array_rand[$index] = $array[$index];
		unset($array[$index]);
	}

	return $array_rand;
}

?>