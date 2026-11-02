<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>Claw Machine - Gift Credits</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/style.css?cb=1630601240787">
	</head>

	<?php
		function clean($userInput) {
			$userInput= trim($userInput);
			$userInput= stripslashes($userInput);
			$userInput= htmlspecialchars($userInput);
			return $userInput;
		}

		if(isset($_GET['add-plays'])){
			$allAm = $_GET['add-plays'];
		}else {
			$allAm = '';
		}


		if (isset($_GET['pw'])) {
			if (false) {
				$dbhost = "";
				$dbusername = "";
				$dbpass = "";
				$dbname = "";

				$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);
				if (!$connection) {
					die('Could not connect');
				} else {
					$theMsg = '';
					if (isset($_GET['add-go'])){

						if (is_numeric($_GET['add-plays'])){
							$sql = "UPDATE claw SET playno = playno + ".$_GET['add-plays']." WHERE wallet = '".$_GET['add-addy']."'";
							$connection->query($sql);
							$theMsg = $_GET['add-plays']." extra GemCave Claw Machine plays have added for ".$_GET['add-addy'];
						}
					}
				}
							
	?>

	<body id="page-admin">       

		<section class="main">
			<div id="admin">
				<h1>Claw Machine Extra Plays</h1>

				<form action="https://token.gemcave.org/claw-gift?" method="GET" style="margin-top: 10px;">
					<input type="text" name="add-addy" placeholder="Wallet Address" value="">
					<input type="text" name="add-plays" placeholder="# of plays" value="<?= $allAm ?>">
					<input type="hidden" name="pw" value="" />
					<input type="submit" name="add-go" value="Add Plays">
				</form>
				<div style="margin-top: 25px;max-width: 600px;padding: 8px;border:3px solid green;background: #001100;color: #fff"><?= $theMsg ?></div>
				<p>Extra plays are only applied once. <br> Wallet must have played once to be able to add plays.</p>
			</div>
		</section>	
	</body>

	<?php } } ?>
</html>