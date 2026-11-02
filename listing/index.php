<?php
	include '../token/config.php';

	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
	$allRows = array();
	$filterClass = '';
	$showAdd = '';
	$submitValid = true;
	$focusGem = false;

	if (!$connection) {
		die('Could not connect');
	} else {

		// Vote for a gem
		if (isset($_POST['votegem'])) {

			// reCap Validate
			if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
			}
			if(!$captcha){
			$submitValid = false;
			$submitError = 'Please verify the reCaptcha';
			} else {
			$secretKey = "";
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response,true);

			// reCap Validate
			if(!$responseKeys["success"]) {
				$submitValid = false;
				$submitError = 'Please verify the reCaptcha';
			} else {

				// Get all votes
				$sql = "SELECT * FROM votes WHERE ip = '".$_SERVER['REMOTE_ADDR']."'";
				$votesRe = $connection->query($sql);
               
				// If SQL works
				if($votesRe){

					// If vote found
					if ($votesRe->num_rows > 0){
						$votesRe = $votesRe->fetch_object();

						$curT = time();
						$maxRem = 18000; // Time allowed between votes (from same IP)
						$remTime = ($votesRe->time + $maxRem);

						if ($curT <= $remTime) {
						$submitValid = false;
						$submitError = 'Please wait 5 hours to vote again';
						} 
					} else {
						$sql29 = "INSERT INTO votes (ip,time) VALUES ('".$_SERVER['REMOTE_ADDR']."','".time()."')";
                     
						$sql29 = $connection->query($sql29);
					}
				} else {
					$submitValid = false;
					$submitError = 'IP DB Error';
				}
			}
			}

			if (!$submitValid) {
			print '<div id="add-error-msg" class="open"><div class="inner"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.76 511.76" class="add-close vote-close"><path d="M436.896 74.869c-99.84-99.819-262.208-99.819-362.048 0-99.797 99.819-99.797 262.229 0 362.048 49.92 49.899 115.477 74.837 181.035 74.837s131.093-24.939 181.013-74.837c99.819-99.818 99.819-262.229 0-362.048zm-75.435 256.448c8.341 8.341 8.341 21.824 0 30.165a21.275 21.275 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251l-75.413-75.435-75.392 75.413a21.348 21.348 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251c-8.341-8.341-8.341-21.845 0-30.165l75.392-75.413-75.413-75.413c-8.341-8.341-8.341-21.845 0-30.165 8.32-8.341 21.824-8.341 30.165 0l75.413 75.413 75.413-75.413c8.341-8.341 21.824-8.341 30.165 0 8.341 8.32 8.341 21.824 0 30.165l-75.413 75.413 75.415 75.435z"/></svg><h1>'.$submitError.'</h1></div></div>';
			} else {
			// Sanitize
			$tId = clean($_POST['gemid']);

			if (is_numeric($tId)){
				$sql = "UPDATE gems SET votes = votes + 1 WHERE id = ".$tId;
				$sql2 = "UPDATE votes SET time = ".time()." WHERE ip = '".$_SERVER['REMOTE_ADDR']."'";
				$result2 = $connection->query($sql2);
				$result = $connection->query($sql);
			} else {
				$submitValid = false;
				$submitError = 'Please verify the reCaptcha';
			}
			}
		}



		// Submit a gem
		if (isset($_POST['submitgem'])) {
			$submitValid = true;
			$submitError = '';

			// reCap Validate
			if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
			}
			if(!$captcha){
			$submitValid = false;
			$submitError = 'Please verify the reCaptcha';
			}
			$secretKey = "";
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response,true);

			// reCap Validate
			if(!$responseKeys["success"]) {
			$submitValid = false;
			$submitError = 'Please verify the reCaptcha';
			}

			// Sanitize
			$tEmail = clean($_POST['tEmail']);
			$tName = clean($_POST['tName']);
			$tSymbol = clean($_POST['tSymbol']);
			$tAddress = clean($_POST['tAddress']);
			$tAge = clean($_POST['tAge']);
			$tRef = clean($_POST['tRef']);
			$tWebsite = clean($_POST['tWebsite']);
			$tTelegram = clean($_POST['tTelegram']);
			$tTwitter = clean($_POST['tTwitter']);
			$tInstagram = clean($_POST['tInstagram']);
			$tReddit = clean($_POST['tReddit']);

			$tIP = $_SERVER['REMOTE_ADDR'];
			$tLast = time();


			// Logo file upload handler
			$currentDirectory = getcwd();
			$uploadDirectory = "/uploads/";

			$errors = []; // Store errors here
			$fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed

			$fileName = $_FILES['tLogo']['name'];
			$fileSize = $_FILES['tLogo']['size'];
			$fileTmpName  = $_FILES['tLogo']['tmp_name'];
			$fileType = $_FILES['tLogo']['type'];

			$path_info = pathinfo($fileName);
			$fileExtension = $path_info['extension'];
			$newFileName = rand(0,9999999999) . '.' . $fileExtension;
			$uploadPath = $currentDirectory . $uploadDirectory . $newFileName;

			if (!in_array($fileExtension,$fileExtensionsAllowed)) {
			$submitValid = false;
			$submitError = 'Invalid file type for logo';
			}

			if ($fileSize > 500000) { //0.5mb
			$submitValid = false;
			$submitError = 'File size too large';
			}

			// Valid form - lets submit!
			if ($submitValid) {
			$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

			$sql = "INSERT INTO gems (email,name,symbol,address,logo,age,website,telegram,twitter,reddit,instagram,ip,last,referrer,status) VALUES (
				'".$tEmail."',
				'".$tName."',
				'".$tSymbol."',
				'".$tAddress."',
				'".$newFileName."',
				'".$tAge."',
				'".$tWebsite."',
				'".$tTelegram."',
				'".$tTwitter."',
				'".$tInstagram."',
				'".$tReddit."',
				'".$tIP."',
				'".$tLast."',
				'".$tRef."',
				'0'
			)";
			$result = $connection->query($sql);

			// If SQL works
			if($result){
				print '<div id="add-error-msg" class="open"><div class="inner"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.76 511.76" class="add-close vote-close"><path d="M436.896 74.869c-99.84-99.819-262.208-99.819-362.048 0-99.797 99.819-99.797 262.229 0 362.048 49.92 49.899 115.477 74.837 181.035 74.837s131.093-24.939 181.013-74.837c99.819-99.818 99.819-262.229 0-362.048zm-75.435 256.448c8.341 8.341 8.341 21.824 0 30.165a21.275 21.275 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251l-75.413-75.435-75.392 75.413a21.348 21.348 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251c-8.341-8.341-8.341-21.845 0-30.165l75.392-75.413-75.413-75.413c-8.341-8.341-8.341-21.845 0-30.165 8.32-8.341 21.824-8.341 30.165 0l75.413 75.413 75.413-75.413c8.341-8.341 21.824-8.341 30.165 0 8.341 8.32 8.341 21.824 0 30.165l-75.413 75.413 75.415 75.435z"/></svg><h1>Gem has been submitted and will be reviewed very soon.</h1></div></div>';

			} else {
				echo($connection->error);
			}
			} else {
			print '<div id="add-error-msg">'.$submitError.'</div>';
			print '<div id="add-error-msg" class="open"><div class="inner"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.76 511.76" class="add-close vote-close"><path d="M436.896 74.869c-99.84-99.819-262.208-99.819-362.048 0-99.797 99.819-99.797 262.229 0 362.048 49.92 49.899 115.477 74.837 181.035 74.837s131.093-24.939 181.013-74.837c99.819-99.818 99.819-262.229 0-362.048zm-75.435 256.448c8.341 8.341 8.341 21.824 0 30.165a21.275 21.275 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251l-75.413-75.435-75.392 75.413a21.348 21.348 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251c-8.341-8.341-8.341-21.845 0-30.165l75.392-75.413-75.413-75.413c-8.341-8.341-8.341-21.845 0-30.165 8.32-8.341 21.824-8.341 30.165 0l75.413 75.413 75.413-75.413c8.341-8.341 21.824-8.341 30.165 0 8.341 8.32 8.341 21.824 0 30.165l-75.413 75.413 75.415 75.435z"/></svg><h1>'.$submitError.'</h1></div></div>';

			$showAdd = 'open';
			}
		}


		// Get gems
		$sql = "SELECT id,name,symbol,address,logo,age,website,telegram,twitter,reddit,instagram,votes FROM gems WHERE status=1 ORDER BY votes DESC LIMIT 250";

		if (isset($_GET['q'])){
			if ($_GET['q'] == 'new'){
			$filterClass = 'set-new';
			$sql = "SELECT id,name,symbol,address,logo,age,website,telegram,twitter,reddit,instagram,votes FROM gems WHERE status=1 ORDER BY id DESC LIMIT 250";
			}
		}

		if (isset($_GET['symbol'])){
			$theSymbol = clean($_GET['symbol']);
			$filterClass = 'set-new';
			$sql2 = "SELECT id,name,symbol,address,logo,age,website,telegram,twitter,reddit,instagram,votes FROM gems WHERE symbol='".$theSymbol."' LIMIT 250";

			$result2 = $connection->query($sql2);

			// If SQL works
			if($result2){
			// If user found
			if ($result2->num_rows > 0){
				$focusGem = $result2->fetch_object();
			}
			}
		}

		$result = $connection->query($sql);

		// If SQL works
		if($result){
			// If user found
			if ($result->num_rows > 0){
			while($row = $result->fetch_object()) {
				$allRows[] = $row;
			}
			}
		}

		$connection->close();
	}
?>

<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave - The freshest BSC gems</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

			<?= $faviconHome ?>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="/css/style.css?cb=1666967510028">

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

	</head>
	<body id="page-list">

		<div id="mask"></div>

		<div id="add-token" class="<?= $showAdd ?>">
			<div class="inner">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.76 511.76" class="add-close"><path d="M436.896 74.869c-99.84-99.819-262.208-99.819-362.048 0-99.797 99.819-99.797 262.229 0 362.048 49.92 49.899 115.477 74.837 181.035 74.837s131.093-24.939 181.013-74.837c99.819-99.818 99.819-262.229 0-362.048zm-75.435 256.448c8.341 8.341 8.341 21.824 0 30.165a21.275 21.275 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251l-75.413-75.435-75.392 75.413a21.348 21.348 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251c-8.341-8.341-8.341-21.845 0-30.165l75.392-75.413-75.413-75.413c-8.341-8.341-8.341-21.845 0-30.165 8.32-8.341 21.824-8.341 30.165 0l75.413 75.413 75.413-75.413c8.341-8.341 21.824-8.341 30.165 0 8.341 8.32 8.341 21.824 0 30.165l-75.413 75.413 75.415 75.435z"/></svg>

			<h1>Submit a gem</h1>
			<form id="addgem" method="POST" action="/#submitgem" enctype="multipart/form-data">
				<input type="hidden" name="submitgem" value="go">
				<label for="tEmail">Email / Telegram Username</label>
				<input type="text" name="tEmail" placeholder="Optional">
				<label for="tName">Token Name</label>
				<input type="text" name="tName" placeholder="e.g. The Token Name" required>
				<label for="tSymbol">Token Symbol</label>
				<input type="text" name="tSymbol" placeholder="e.g. TOKENNAME" required>
				<label for="tAddress">Contract Address</label>
				<input type="text" name="tAddress" placeholder="e.g. 0x0000000000000000000000000000000000000000" required>
				<label for="tLogo">Logo Image (200x200 pixels)<span class="upload-error">Error: Logo must be exactly 200x200 pixels. <a href="https://www.resizepixel.com" target="_blank" style="display:block;margin:5px;color:#fff;font-weight:900;">Resizing Tool</a></label>
				<input type="file" name="tLogo" class="token-logo-upload" accept="image/jpeg, image/png" required />
				<label for="tWebsite">Website URL</label>
				<input type="url" name="tWebsite" placeholder="e.g. https://gemcave.org">

				<label for="tName">Social Media Profiles</label>
				<div class="link-bar">
					<div class="link-icons">
						<div class="link-item">
							<div class="link-icon link-telegram" data-show="in-telegram">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"/></svg>
							</div>
						</div>
						<div class="link-item">
							<div class="link-icon link-twitter" data-show="in-twitter">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"/></svg>
							</div>
						</div>
						<div class="link-item">
							<div class="link-icon link-reddit" data-show="in-reddit">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.3 9.3c-.7 0-1.4.3-1.9.8-1.8-1.2-4.2-2-7-2.1L14 1.5l4.4 1c0 1.2 1 2 2 2 1.1 0 2-.9 2-2s-.9-2-2-2a2 2 0 00-1.8 1.1l-4.9-1c-.2-.1-.5 0-.6.3l-1.5 7c-2.7.2-5 1-6.9 2.2-.5-.5-1.2-.8-2-.8-2.7 0-3.7 3.8-1 5.1-.2.5-.2.9-.2 1.3 0 4.3 4.8 7.8 10.6 7.8 6 0 10.7-3.5 10.7-7.8 0-.4 0-.9-.2-1.3 2.6-1.3 1.6-5-1.2-5zM5.6 14.7c0-1.1.9-2 2-2s2 .9 2 2a2 2 0 01-2 2 2 2 0 01-2-2zm10.8 4.8c-1.8 1.9-7 1.9-8.8 0-.2-.2-.2-.5 0-.7.1-.2.5-.2.6 0 1.4 1.5 6.1 1.5 7.6 0 .1-.2.5-.2.6 0 .2.2.2.5 0 .7zm0-2.8c-1 0-2-.9-2-2s1-2 2-2a2 2 0 012 2 2 2 0 01-2 2z"/></svg>
							</div>
						</div>
						<div class="link-item">
							<div class="link-icon link-instagram" data-show="in-instagram">
								<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"/></svg>
							</div>
						</div>
					</div>

					<input type="url" class="in-telegram in-social" data-link="link-telegram" name="tTelegram" />
					<input type="url" class="in-twitter in-social" data-link="link-twitter" name="tTwitter" />
					<input type="url" class="in-reddit in-social" data-link="link-reddit" name="tReddit" />
					<input type="url" class="in-instagram in-social" data-link="link-instagram" name="tInstagram" />
				</div>

				<div class="g-recaptcha" data-sitekey=""></div>
				<button type="submit" class="add-gem-button">Submit Gem</button>
			</form>
			</div>
		</div>

		<div id="vote-token">
			<div class="inner">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.76 511.76" class="add-close vote-close"><path d="M436.896 74.869c-99.84-99.819-262.208-99.819-362.048 0-99.797 99.819-99.797 262.229 0 362.048 49.92 49.899 115.477 74.837 181.035 74.837s131.093-24.939 181.013-74.837c99.819-99.818 99.819-262.229 0-362.048zm-75.435 256.448c8.341 8.341 8.341 21.824 0 30.165a21.275 21.275 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251l-75.413-75.435-75.392 75.413a21.348 21.348 0 01-15.083 6.251 21.277 21.277 0 01-15.083-6.251c-8.341-8.341-8.341-21.845 0-30.165l75.392-75.413-75.413-75.413c-8.341-8.341-8.341-21.845 0-30.165 8.32-8.341 21.824-8.341 30.165 0l75.413 75.413 75.413-75.413c8.341-8.341 21.824-8.341 30.165 0 8.341 8.32 8.341 21.824 0 30.165l-75.413 75.413 75.415 75.435z"/></svg>

			<h1 style="font-size:25px">You are voting for</h1>
			<h1 id="votename" style="color: #3c867c;"></h1>
			<form id="addgem" method="POST" action="/#submitgem" enctype="multipart/form-data">
				<input type="hidden" name="votegem" value="go">
				<input type="hidden" name="gemid" id="voteid" value="0">
				<div class="g-recaptcha" data-sitekey=""></div>
				<button type="submit" class="vote-gem-button">Submit Vote</button>
			</form>
			</div>
		</div>

		<header id="header">
			<div class="container">
			<div class="logo">
				<a href="http://gemcave.org" target="_blank">
					<img src="/img/listing.png" />
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
					<a href="https://gemcave.org/" class="">GemCave</a>
					<a href="https://token.gemcave.org/" class="">Token</a>
					<div class="button pop add">Request Listing</div>
				</nav>
			</div>
			</div>
		</header>

		<div class="main-body">
			<div class="container">

			<div class="outline">
				<div class="left">
					<h1>Welcome to GemCave Listing</h1>
					<p>
						Every month the top voted BSC project is featured as winning project and all votes are reset to 0 for the race to begin again. If you want to add a BSC project to the list to be voted on every month.
					</p>
				</div>
				<div class="right">
					<div class="news">
						<h2>GemCave News</h2>
						<hr>
						<?php include '../latest-news.php'; ?>
					</div>
				</div>   
			</div>        

			<div class="feature-item">
				<div class="bg"></div>
				<div class="winner">TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER TOP VOTED WINNER </div>
				<div class="feature-item-top">
					<div class="feature-icon">
						<svg viewBox="85 180 390 350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<defs>
							<filter id="b" x="-.25" y="-.25" width="1.5" height="1.5" style="color-interpolation-filters:sRGB">
								<feGaussianBlur result="result1" stdDeviation="1"/>
								<feGaussianBlur in="result1" result="result6" stdDeviation="10"/>
								<feComposite in="result6" in2="result1" operator="atop" result="result8"/>
								<feComposite in="result6" in2="result8" operator="xor" result="fbSourceGraphic"/>
								<feColorMatrix in="fbSourceGraphic" result="fbSourceGraphicAlpha" values="0 0 0 -1 0 0 0 0 -1 0 0 0 0 -1 0 0 0 0 2 0"/>
								<feGaussianBlur in="fbSourceGraphicAlpha" result="result0" stdDeviation="1"/>
								<feSpecularLighting lighting-color="#fff" in="result0" result="result1" specularConstant="1.5" specularExponent="35" surfaceScale="-2">
								<feDistantLight azimuth="230" elevation="60"/>
								</feSpecularLighting>
								<feComposite in="result1" in2="fbSourceGraphicAlpha" operator="in" result="result2"/>
								<feComposite in="fbSourceGraphic" in2="result2" k2="1" k3="1" operator="arithmetic" result="result4"/>
								<feComposite in2="result4" operator="atop" result="result91"/>
								<feBlend in2="result91" mode="multiply"/>
							</filter>
						</defs>
						<g transform="translate(21.15 60.35) scale(1)">
							<g style="fill:#310d53;mix-blend-mode:normal">
								<path d="M298.3 229c-3.8 0-7.4-1.6-9.8-4.6L173.4 83.7c-3.5-4.31-3.8-10.44-.8-15.11l41.1-62.9C216 2.12 220-.029 224.2-.029h148.1c4.2 0 8.2 2.149 10.5 5.719l41.1 62.9c3.1 4.67 2.7 10.8-.8 15.11L308 224.4c-2.4 3-6 4.6-9.7 4.6z" style="fill:#5e5664" transform="matrix(1.272 0 0 1.303 -118.2 149.7)"/>
								<path d="M298.3 229c-3.8 0-7.4-1.6-9.8-4.6L173.4 83.7c-3.5-4.31-3.8-10.44-.8-15.11l41.1-62.9C216 2.12 220-.029 224.2-.029h148.1c4.2 0 8.2 2.149 10.5 5.719l41.1 62.9c3.1 4.67 2.7 10.8-.8 15.11L308 224.4c-2.4 3-6 4.6-9.7 4.6z" style="fill:#31055b;filter:url(#b)" transform="matrix(1.272 0 0 1.303 -118.2 149.7)"/>
							</g>
							<image x="185" y="190" width="150" height="150" style="mix-blend-mode:normal" preserveAspectRatio="none" xlink:href="https://listing.gemcave.org/uploads/7850389548.jpg"></image>
						</g>
						</svg>
					</div>
					<div class="feature-body">
						<h2>Ghost Pepe</h2>
						<p>Ghost Pepe ($GHOSTPEPE) is a Binance Smart Chain rewards token designed to grow your money through the Crypto slump.</p>
						<p>Our unique treasury wallet will "Buy the Dip" to optimize maximum growth during the bear market.</p>

						<div class="feature-links">
						<div class="token-links">
							<a href="https://poocoin.app/tokens/0x0000000000000000000000000000000000000000" target="_blank">
								<div class="link-item">
									<div class="link-icon link-poocoin">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs></defs><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"></path></svg>
									</div>
									<div class="link-text">Chart</div>
								</div>
							</a>
							<a href="https://exchange.pancakeswap.finance/#/swap?outputCurrency=0x0000000000000000000000000000000000000000" target="_blank">
								<div class="link-item">
									<div class="link-icon link-pancake">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs></defs><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"></path><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"></path><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"></path></svg>
									</div>
									<div class="link-text">Buy $GHOSTPEPE</div>
								</div>
							</a>
							<a href="https://t.me/GhostPepeOfficial" target="_blank">
								<div class="link-item">
									<div class="link-icon link-telegram">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs></defs><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"></path></svg>
									</div>
									<div class="link-text">Join Telegram</div>
								</div>
							</a>
						</div>
						</div>
					</div>
				</div>
			</div>
			</div>

         
			<div class="scroll-list">

			<?php
				$focusClass = '';
				$firstDone = false;
				if ($focusGem != false){
					array_unshift($allRows , $focusGem);
					$focusClass = 'focus';
				}

				$rowC = 0;
				foreach ($allRows as $aRow){
					$rowC++;

					$contractID = $aRow->address;
					$pancakeLink = 'https://exchange.pancakeswap.finance/#/swap?outputCurrency='.$contractID;
					$pooLink = 'https://poocoin.app/tokens/'.$contractID;
					$bscLink = 'https://bscscan.com/token/'.$contractID;
			?>

			<div class="scroll-list-item <?php if ($focusClass == 'focus' && $firstDone == false) { $rowC = 0; print $focusClass; $firstDone = true; } ?>">
				<div class="token-item">
					<div class="item-bg"></div>
					<div class="token-position">
						<?php
						if ($rowC == 0){
							print "GEM";
						} else {
							print $rowC;
						}
						?>
					</div>

					<div class="token-img"><img src="/uploads/<?= $aRow->logo ?>" /></div>

					<div class="token-name">
						<?=  $aRow->name ?><br>
						<div class="token-symbol"><?=  $aRow->symbol ?></div>
						<span class="cal-age"><?php if(is_numeric($aRow->age)){ print time_elapsed_string('@'.$aRow->age, $full = false); } ?></span>
					</div>

					<div class="token-age">
						<div class="contract">
						<span class="contract-hash"><?= $aRow->address ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="copy-contract"><defs/><path d="M23 2.8C23 1.1 21.8 0 20.2 0H8.8A2.7 2.7 0 006 2.8v13.4C6 17.9 7.2 19 8.8 19h11.4c1.6 0 2.8-1.2 2.8-2.8zm-4.8 11.7h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5zm0-3h-7.4a.8.8 0 010-1.5h7.4a.8.8 0 010 1.5z"/><path d="M8.8 20.5c-2.4 0-4.3-2-4.3-4.3V2.8v-.3h-.7A2.8 2.8 0 001 5.3v16C1 22.8 2.2 24 3.8 24h12c1.5 0 2.7-1.2 2.7-2.8v-.7z"/></svg>
						</div>
					</div>

					<div class="token-links">
						<a href="<?= $pooLink ?>" target="_blank">
						<div class="link-item">
								<div class="link-icon link-poocoin">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.1 15.4a4 4 0 00-3.5-6 5.2 5.2 0 00-1.2-7.1L12.8 0a.8.8 0 00-1.2.6v2.1c0 1.2-1 2.2-2 2.2a3.6 3.6 0 00-3.7 3.6c0 .3 0 .7.2 1a4 4 0 00-3.2 5.8A4.4 4.4 0 004.4 24h15.2c2.4 0 4.4-2 4.4-4.4 0-1.9-1.2-3.5-2.9-4.2zM8 12.4a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm9.5 5.6c-.8 2.4-3 4-5.5 4s-4.7-1.6-5.5-4a.8.8 0 01.8-1h9.5a.7.7 0 01.7 1zM16 15.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/></svg>
								</div>
						</div>
						</a>
						<a href="<?= $bscLink ?>" target="_blank">
						<div class="link-item">
								<div class="link-icon link-bsc">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 486.7 486.7"><defs/><path d="M33 362.4v78.9c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V302.5l-44.3 44.3A53.7 53.7 0 0133 362.4zM142 301.5v139.8c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V359a53.2 53.2 0 01-36.7-15.6l-41.9-42zM251 350.3v91c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8v-168l-69.9 70c-2.7 2.7-5.6 5-8.7 7zM432.7 170.2L360 242.9v198.4c0 4.8 3.9 8.8 8.8 8.8h61c4.8 0 8.8-4 8.8-8.8V175.7l-4.6-4.2-1.3-1.3z"/><path d="M482.6 41.4c-2.9-3.1-7.3-4.7-12.9-4.7h-1.6l-85.1 4c-3.8.2-9 .4-13.1 4.5a14.9 14.9 0 00-3.1 4.6c-4.2 9 1.7 15 4.5 17.8l7.1 7.2 14.9 14.9-171.6 171.7-77.1-77.1a24.5 24.5 0 00-34.7 0L7.2 286.9a24.5 24.5 0 000 34.7l4.6 4.6a24.5 24.5 0 0034.7 0l80.7-80.7 77.1 77a24.5 24.5 0 0034.8 0L432.7 129l21.9 21.8c2.6 2.6 6.2 6.2 11.7 6.2 2.3 0 4.6-.6 7-2a19 19 0 004.2-3c4.3-4.3 5.1-9.8 5.3-14.1l2.6-55.3 1.3-27.7c.3-5.8-1-10.3-4.1-13.5z"/></svg>
								</div>
						</div>
						</a>
						<a href="<?= $pancakeLink ?>" target="_blank">
						<div class="link-item">
								<div class="link-icon link-pancake">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M503.3 250.7c-30.5 30.7-78 54.7-135.7 68A14.7 14.7 0 00361 331v48.3c69.5-16.2 122.7-48.2 142.3-88a45.7 45.7 0 000-40.6zM256 331c-9.9 0-19.5-.3-29.1-.9h-.9c-8.7.7-15 6.2-15 15V376c0 4.4-.8 8.6-2 12.7 27 2.6 42.5 2.5 62 2V346c0-8.4-6.6-15-15-15zM116.5 311.2c-44.9-13.9-82.6-34.6-108-60l-.8 1.6a43.8 43.8 0 00.2 37C24 324.1 65.8 353 121 371v-49.3c0-4.2-1.8-8.1-4.5-10.5z"/><path d="M503.4 341c-31.7 31.8-82.1 56.1-142.8 69.2a44.8 44.8 0 01-87 10.3c-28.5 1-54 .3-87.7-4.3a44.2 44.2 0 01-53.6-10.6c-52-13.8-95.4-36.2-123.7-64.6A78.3 78.3 0 000 376c0 75.7 113 136 256 136s256-60.3 256-136c0-12-3-23.7-8.6-35zM365.5 136.1C296.3 53.6 276.7 15 218.5 15a97.4 97.4 0 00-80 42 103.6 103.6 0 01-17.1-48.3c-.4-4.9-4.6-8.7-9.5-8.7h-5.4A14.6 14.6 0 0092 16.3c3.2 27 14.5 52.1 32.3 72.4-2 7.7-3.3 15.6-3.3 23.8a97.6 97.6 0 0097.5 97.5H331a45 45 0 0034.5-73.9zM196 165a15 15 0 110-30 15 15 0 010 30zm45-75a15 15 0 110-30 15 15 0 010 30zm45 75a15 15 0 110-30 15 15 0 010 30z"/><path d="M348.4 69l26.3 31.4c17.6 21 31.3 35.5 31.3 64.6a75 75 0 01-75 75H218.5A127.7 127.7 0 0192.2 96.5c-1-1.3-1.7-2.8-2.6-4.1C50.7 110 0 150 0 180c0 21.6 39.8 77.3 130 103.6a44.5 44.5 0 0121 36.3V376c0 8.4 6.6 15 15 15s15-6.6 15-15v-30.9c0-23.7 18-45 47.7-45 9 .6 18 .9 27.3.9a45 45 0 0145 45v60c0 8.4 6.6 15 15 15s15-6.6 15-15v-75c0-17 9.8-33.4 26.4-40.8C466.4 265.7 512 203.5 512 180c0-26.4-50-88.3-163.6-111z"/></svg>
								</div>
						</div>
						</a>
						<?php if ($aRow->telegram) { ?>
						<a href="<?= $aRow->telegram ?>" target="_blank">
							<div class="link-item">
									<div class="link-icon link-telegram">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M9.4 15.2L9 20.8c.6 0 .8-.3 1.1-.6l2.7-2.5 5.5 4c1 .6 1.7.3 2-1L24 3.9c.4-1.5-.5-2-1.5-1.7L1.1 10.3c-1.4.5-1.4 1.3-.2 1.7l5.4 1.7 12.7-8c.5-.3 1-.1.6.3z"/></svg>
									</div>
							</div>
						</a>
						<?php } ?>
						<?php if ($aRow->twitter) { ?>
						<a href="<?= $aRow->twitter ?>" target="_blank">
							<div class="link-item">
									<div class="link-icon link-twitter">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M512 97.2c-19 8.4-39.3 14-60.5 16.6 21.8-13 38.4-33.4 46.2-58a209.8 209.8 0 01-66.6 25.4A105 105 0 00249.5 153c0 8.3.8 16.3 2.5 24A297.1 297.1 0 0135.6 67 105.1 105.1 0 0068 207.4c-16.9-.3-33.4-5.2-47.4-12.9v1.1c0 51 36.4 93.4 84 103.2-8.5 2.3-17.8 3.4-27.4 3.4-6.8 0-13.5-.3-20-1.8a106 106 0 0098.2 73.2A211 211 0 010 416.9 295.5 295.5 0 00161 464c193.2 0 298.8-160 298.8-298.7 0-4.6-.2-9.1-.4-13.6A209.4 209.4 0 00512 97.2z"/></svg>
									</div>
							</div>
						</a>
						<?php } ?>
						<?php if ($aRow->reddit) { ?>
						<a href="<?= $aRow->reddit ?>" target="_blank">
							<div class="link-item">
									<div class="link-icon link-reddit">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs/><path d="M21.3 9.3c-.7 0-1.4.3-1.9.8-1.8-1.2-4.2-2-7-2.1L14 1.5l4.4 1c0 1.2 1 2 2 2 1.1 0 2-.9 2-2s-.9-2-2-2a2 2 0 00-1.8 1.1l-4.9-1c-.2-.1-.5 0-.6.3l-1.5 7c-2.7.2-5 1-6.9 2.2-.5-.5-1.2-.8-2-.8-2.7 0-3.7 3.8-1 5.1-.2.5-.2.9-.2 1.3 0 4.3 4.8 7.8 10.6 7.8 6 0 10.7-3.5 10.7-7.8 0-.4 0-.9-.2-1.3 2.6-1.3 1.6-5-1.2-5zM5.6 14.7c0-1.1.9-2 2-2s2 .9 2 2a2 2 0 01-2 2 2 2 0 01-2-2zm10.8 4.8c-1.8 1.9-7 1.9-8.8 0-.2-.2-.2-.5 0-.7.1-.2.5-.2.6 0 1.4 1.5 6.1 1.5 7.6 0 .1-.2.5-.2.6 0 .2.2.2.5 0 .7zm0-2.8c-1 0-2-.9-2-2s1-2 2-2a2 2 0 012 2 2 2 0 01-2 2z"/></svg>
									</div>
							</div>
						</a>
						<?php } ?>
						<?php if ($aRow->instagram) { ?>
						<a href="<?= $aRow->instagram ?>" target="_blank">
							<div class="link-item">
									<div class="link-icon link-instagram">
									<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 511 511.9"><defs/><path d="M511 150.5a187 187 0 00-12-62.1A125 125 0 00469.5 43a126 126 0 00-45.3-29.5 187.5 187.5 0 00-62-11.9C334.6.3 325.9 0 256.4 0S178.3.3 151 1.5a187.1 187.1 0 00-62 11.9A124.9 124.9 0 0043.4 43 126 126 0 0014 88.3a187.6 187.6 0 00-11.8 62.1C.8 177.8.4 186.5.4 256S.8 334.2 2 361.5a187 187 0 0012 62.1A126.2 126.2 0 0043.4 469a126 126 0 0045.4 29.5 187.6 187.6 0 0062 11.9c27.3 1.2 36 1.5 105.6 1.5s78.2-.3 105.5-1.5a187 187 0 0062-11.9 131 131 0 0075-74.9 187.7 187.7 0 0011.9-62.1c1.1-27.3 1.5-36 1.5-105.5s-.2-78.2-1.4-105.5zm-46.1 209c-1.1 25-5.3 38.5-8.8 47.5a85 85 0 01-48.7 48.6c-9 3.5-22.5 7.7-47.5 8.8-27 1.2-35 1.5-103.3 1.5s-76.5-.3-103.5-1.5c-25-1.1-38.5-5.3-47.5-8.8a78.8 78.8 0 01-29.3-19.1A79.6 79.6 0 0157 407.1c-3.5-9-7.7-22.6-8.7-47.5-1.3-27-1.5-35.1-1.5-103.4s.2-76.5 1.5-103.4c1-25 5.2-38.5 8.7-47.5a77.8 77.8 0 0119.3-29.4c8.2-8.5 18.2-15 29.4-19.1 9-3.5 22.6-7.7 47.5-8.8 27-1.2 35-1.5 103.3-1.5 68.5 0 76.5.3 103.5 1.5 25 1.1 38.5 5.3 47.5 8.8a78.7 78.7 0 0129.3 19.1c8.5 8.3 15 18.3 19.2 29.4 3.5 9 7.7 22.6 8.8 47.5 1.2 27 1.5 35.1 1.5 103.4s-.3 76.3-1.5 103.3zm0 0"/><path d="M256.4 124.5a131.5 131.5 0 10.1 263 131.5 131.5 0 000-263zm0 216.8a85.3 85.3 0 110-170.6 85.3 85.3 0 010 170.6zm0 0M423.9 119.3a30.7 30.7 0 11-61.5 0 30.7 30.7 0 0161.5 0zm0 0"/></svg>
									</div>
							</div>
						</a>
						<?php } ?>
						<?php if ($aRow->website) { ?>
						<a href="<?= $aRow->website ?>" target="_blank">
							<div class="link-item">
									<div class="link-icon link-website">
									<svg viewBox="0 0 517 517" xmlns="http://www.w3.org/2000/svg"><path d="M124.895 271.987l-8.105 40.716-12.902-41.851c-1.627-5.278-7.226-8.234-12.502-6.61-3.57 1.101-6.072 4.02-6.819 7.426l-12.708 41.073-8.088-40.883c-1.072-5.417-6.329-8.938-11.751-7.869-5.417 1.071-8.941 6.332-7.869 11.75 0 0 14.75 74.366 14.917 74.833a11.7 11.7 0 0011.011 7.745l.133-.001a11.687 11.687 0 0010.95-7.985l.066-.205 13.109-42.37 13.068 42.388a11.69 11.69 0 0011.14 8.173l.134-.001a11.677 11.677 0 0010.934-7.985c.132-.396 14.898-74.439 14.898-74.439 1.078-5.416-2.438-10.682-7.855-11.76-5.42-1.076-10.683 2.438-11.761 7.855zM270.652 275.892c1.078-5.416-2.438-10.682-7.855-11.76-5.417-1.076-10.681 2.438-11.76 7.855l-8.111 40.747-12.895-41.878c-1.625-5.278-7.223-8.237-12.5-6.615a9.99 9.99 0 00-6.823 7.43l-12.713 41.039-8.082-40.852c-1.072-5.418-6.332-8.945-11.751-7.869-5.417 1.071-8.941 6.333-7.869 11.75 0 0 14.75 74.366 14.918 74.833a11.693 11.693 0 0010.997 7.745l.13-.001a11.676 11.676 0 0010.937-7.982l.066-.205 13.127-42.373 13.051 42.385a11.7 11.7 0 0011.155 8.177l.133-.001a11.686 11.686 0 0010.95-7.985c.129-.397 14.895-74.44 14.895-74.44zM322.271 358.316l.132.001a11.694 11.694 0 0011.141-8.177l13.051-42.385 13.127 42.373a11.673 11.673 0 0011.003 8.187l.13.001c4.922 0 9.331-3.099 10.997-7.745.167-.467 14.918-74.833 14.918-74.833 1.072-5.417-2.452-10.679-7.869-11.75-5.421-1.071-10.679 2.452-11.751 7.869l-8.082 40.852-12.713-41.039c-.746-3.409-3.251-6.33-6.823-7.43a9.998 9.998 0 00-12.5 6.615l-12.878 41.821-8.1-40.69c-1.078-5.417-6.345-8.93-11.76-7.855-5.417 1.078-8.934 6.344-7.855 11.76 0 0 14.766 74.044 14.898 74.439a11.67 11.67 0 0010.934 7.986zM220.474 393.844c-5.523 0-10 4.478-10 10s4.477 10 10 10h.028c5.523 0 9.986-4.478 9.986-10s-4.491-10-10.014-10z"/><path d="M514.071 452.909l-47.398-47.398 17.621-17.621a10 10 0 00-6.292-17.041l-37.056-2.897V231.336c0-12.711-10.354-23.053-23.08-23.053h-48.849c3.64-13.24 5.482-26.909 5.482-40.798 0-84.933-69.096-154.03-154.026-154.03S66.447 82.553 66.447 167.485c0 13.916 1.835 27.584 5.459 40.798H23.052C10.341 208.283 0 218.625 0 231.336v159.427c0 12.727 10.341 23.081 23.052 23.081h152.671c5.523 0 10-4.478 10-10s-4.477-10-10-10H23.052c-1.654 0-3.052-1.411-3.052-3.081V231.336c0-1.654 1.398-3.053 3.052-3.053h274.04l.037.002.045-.002h58.02l.066.003c.026 0 .051-.003.077-.003h62.53c1.669 0 3.08 1.398 3.08 3.053v135.052l-32.925-2.574a10.007 10.007 0 00-7.85 2.898 10.005 10.005 0 00-2.899 7.851l1.507 19.281H265.224c-5.523 0-10 4.478-10 10s4.477 10 10 10h115.12l3.964 50.702a10 10 0 0017.041 6.292l17.621-17.621 47.397 47.399a10.001 10.001 0 0014.142 0l33.563-33.564c3.904-3.906 3.904-10.238-.001-14.143zM92.767 208.283a132.927 132.927 0 01-5.949-30.798h41.96c.39 10.482 1.38 20.782 2.987 30.798zm36.015-50.798H86.82a133.06 133.06 0 0116.971-55.878c9.488 3.739 19.92 6.913 31.014 9.52-3.383 14.683-5.422 30.287-6.023 46.358zm-13.531-72.923c12.785-16.189 29.221-29.365 48.052-38.283-3.314 4.397-6.469 9.199-9.434 14.413-5.38 9.461-9.945 19.944-13.672 31.166-8.86-2.049-17.228-4.485-24.946-7.296zm95.223 123.721h-58.418c-1.75-9.969-2.841-20.272-3.264-30.798h61.682zm0-50.798h-61.692c.622-14.882 2.619-29.171 5.743-42.424 17.844 2.97 36.825 4.643 55.949 5.016zm0-57.439c-17.208-.35-34.281-1.791-50.342-4.332 11.188-32.09 29.484-55.205 50.342-60.892zm20-65.224c20.742 5.656 38.948 28.548 50.152 60.36-15.92 2.688-32.931 4.281-50.152 4.779zm58.392 173.461h-58.392v-30.798h61.679c-.427 10.492-1.526 20.794-3.287 30.798zm-58.392-50.798v-37.494c19.156-.532 38.096-2.368 55.811-5.502 3.203 13.413 5.249 27.9 5.88 42.997h-61.691zm56.604-96.793c-2.965-5.214-6.12-10.017-9.434-14.414 18.443 8.735 34.584 21.557 47.253 37.291-7.508 2.884-15.69 5.398-24.392 7.53-3.681-10.936-8.167-21.157-13.427-30.407zm61.075 147.591h-38.996c1.618-10.045 2.616-20.345 3.009-30.798h41.959a133.011 133.011 0 01-5.972 30.798zm-35.988-50.798c-.612-16.359-2.706-32.24-6.198-47.151 10.982-2.724 21.256-6.015 30.54-9.867a133.068 133.068 0 0117.621 57.018zm161.272 321.917l-47.397-47.399a10.001 10.001 0 00-14.142 0l-9.343 9.344-4.431-56.683 56.68 4.432-9.344 9.344c-3.905 3.905-3.905 10.237 0 14.143l47.398 47.398z"/></svg>
									</div>
							</div>
						</a>
						<?php } ?>
					</div>

					<div class="token-vote">
						<div class="vote-inner">
						<div class="gem-shill" data-msg="<?= $aRow->name ?> has been listed on GemCave.org! 💎 Go and vote for us there now! https://listing.GemCave.org/gem/<?= $aRow->symbol ?>">
							<svg viewBox="0 -45 512 511" xmlns="http://www.w3.org/2000/svg"><path d="M407 .5H105C47.102.5 0 47.602 0 105.5v162.172c0 46.2 30.332 86.437 74.285 99.316l50.711 50.715a15.012 15.012 0 0010.61 4.395c3.976 0 7.792-1.582 10.605-4.395l46.52-46.523H407c57.898 0 105-47.102 105-105V105.5c0-57.898-47.102-105-105-105zM145.758 212.352c0-8.286 6.715-15 15-15h190.484c8.285 0 15 6.714 15 15 0 8.285-6.715 15-15 15H160.758c-8.285 0-15-6.715-15-15zm205.484-38.024H160.758c-8.285 0-15-6.715-15-15 0-8.281 6.715-15 15-15h190.484c8.285 0 15 6.719 15 15 0 8.285-6.715 15-15 15zm0 0"/></svg>
						</div>
						<div class="vote-count"><?= $aRow->votes ?></div>
						<div class="vote-label">Vote</div>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.326 30.779" class="go-vote" data-id="<?= $aRow->id ?>" data-name="<?= $aRow->name ?>"><path d="M17.163 30.775c-.505 0-.984-.227-1.306-.62L.388 11.25A1.723 1.723 0 01.28 9.22L5.8.767A1.69 1.69 0 017.216 0H27.11c.57 0 1.1.289 1.415.768l5.52 8.452c.41.628.366 1.451-.109 2.03L18.47 30.155c-.322.394-.801.621-1.306.621z" fill="#37c4b3"/><g fill="#53e7d3"><path d="M6.445.189c-.257.132-.48.329-.644.58L.28 9.22c-.21.32-.3.692-.275 1.056h13.029zM21.292 10.276h13.03a1.719 1.719 0 00-.276-1.056L28.525.768a1.69 1.69 0 00-.644-.58z"/></g><path fill="#53e7d3" d="M23.885 10.276H10.483l6.68 20.503z"/><path fill="#b9f5ed" d="M23.885 10.276L17.172 0h-.019l-6.712 10.276z"/><path d="M4.899 11.25a1.723 1.723 0 01-.109-2.03L10.311.768A1.69 1.69 0 0111.725 0h-4.51C6.644 0 6.113.289 5.8.768L.28 9.22a1.723 1.723 0 00.108 2.03l15.469 18.904c.322.394-10.958-18.903-10.958-18.903z" opacity=".1"/></svg>
						</div>
					</div>

				</div>
			</div>

			<?php
				}
			?>

			</div>
			</div>        
		</div>

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<script src="https://gemcave.org/js/vendor/jquery.js"></script>
		<script src="/js/main.js"></script>
        
	</body>
</html>
