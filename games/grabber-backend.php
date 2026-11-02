<?php
/* ------------------------------ */
/* CLAW MACHINE BACKEND           */
/* Developed by Tom G for Ragestar Crypto Tech */
/* Desc: The server-side code     */
/* ------------------------------ */

include '../token/config.php';
die();
// CURL Config
$url = "https://bsc-dataseed.binance.org/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
	"Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

if (isset($_GET['wid'])) {
	$rWallet = clean($_GET['wid']);
	$SWallet = strtolower(substr($rWallet,2));
	$sTime = time();

	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

	if (!$connection) {
		die('Could not connect');
	} else {
		
		// Get wallet balance
		$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
			"from":"0x0000000000000000000000000000000000000000",
			"data":"0x70a08231000000000000000000000000'.$SWallet.'",
			"to":"0x0000000000000000000000000000000000000000"},
			"latest"]}';

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$resp = curl_exec($curl);
		$resp = json_decode($resp);
		$theBally = hexdec($resp->result);
		$theBally = sprintf("%.0f",$theBally );
		$theBally = intval(substr($theBally, 0, -9));
		
		$creditLevel = 0;
		$myPlaysPerSession = 0;

		// Check STAKED GEMS
		$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
			"from":"0x0000000000000000000000000000000000000000",
			"data":"0x70a08231000000000000000000000000'.$SWallet.'",
			"to":"0x0000000000000000000000000000000000000000"},
			"latest"]}';

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$resp = curl_exec($curl);
		$resp = json_decode($resp);
		$theBallyx = hexdec($resp->result);
		$theBallyx = sprintf("%.0f",$theBallyx );
		$theBallyx = intval(substr($theBallyx, 0, -9));

		$theBally = $theBally + $theBallyx;
	
		if ($theBally < $minBalance){
			$myPlaysPerSession = 0;
			$farOff = $minBalance - $theBally;
			$farPlays = $grabberLevel1Plays;			
		}

		if ($theBally >= $minBalance){
			$creditLevel = 1;
			$myPlaysPerSession = $grabberLevel1Plays;
			$farOff = $minBalance2 - $theBally;
			$farPlays = $grabberLevel2Plays;
		}

		if ($theBally >= $minBalance2){
			$creditLevel = 2;
			$myPlaysPerSession = $grabberLevel2Plays;
			$farOff = $minBalance3 - $theBally;
			$farPlays = $grabberLevel3Plays;
		}

		if ($theBally >= $minBalance3){
			$creditLevel = 3;
			$myPlaysPerSession = $grabberLevel3Plays;
		}

		if ($creditLevel > 0) {

			// Find this IP
			$theIP = $_SERVER['REMOTE_ADDR'];
			$sql = "SELECT * FROM claw WHERE ip='".$theIP."'";
			$ipCountResult = $connection->query($sql);

			// If SQL works
			if($ipCountResult){
				
				// If user found
				if ($ipCountResult->num_rows > $playsPerIP){
					print json_encode(array('status' => "false", 'message' => 'Maximum plays reached from your IP'));
				} else {
					// Find this user
					$sql = "SELECT * FROM claw WHERE wallet='".$rWallet."'";
					$allWalletResult = $connection->query($sql);

					// If SQL works
					if($allWalletResult){
						
						// If user found
						if ($allWalletResult->num_rows > 0){
							$row = $allWalletResult->fetch_object();
								
							// Get number of plays this session
							$playno = $row->playno  + 999;
							$lastplay = $row->last;

							// Calculate time
							$calcTime = $row->last + $secondsPerSpin;

							// Time is up
							if (time() > ($lastplay + $secondsPerSpin)){
								// Update
								$sql = "UPDATE claw SET last = ".time().", ip = '".$theIP."', prizebig = 0, prizesmall = 0, playno=".$myPlaysPerSession." WHERE wallet = '".$rWallet."'";
								$connection->query($sql);

								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'maxBig' => $bigPrizes, 'maxSmall' => $smallPrizes, 'playno' => $myPlaysPerSession));
							
							// Plays left
							} elseif ($playno > 0) {
								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'maxBig' => $bigPrizes, 'maxSmall' => $smallPrizes, 'playno' => $playno));
							} else {
								$theMsg = 'You have used all '.$myPlaysPerSession.' plays. Please wait for the next session ';
								
								if ($farOff > 0){
									$theMsg .= ' OR hold '.number_format(intval($farOff)).' GEMS to upgrade and get '.$farPlays.' plays per session.';
								}
								print json_encode(array('status' => "false", 'message' => $theMsg, 'balance' => $theBally));
							}

						// No user found
						} else {

							// Create user row
							$sql = "INSERT INTO claw (wallet, last, ip, playno) VALUES ('".$rWallet."', ".$sTime.", '".$theIP."', $myPlaysPerSession)";
							$there = $connection->query($sql);
							
							print json_encode(array('status' => "true", 'credit' => $creditLevel, 'balance' => $theBally, 'maxBig' => $bigPrizes, 'maxSmall' => $smallPrizes, 'playno' => $myPlaysPerSession));
						}
					}
				}
			}

			$connection->close();
		} else {
			print json_encode(array('status' => "false", 'message' => "You do not hold enough tokens to play! Hold ".number_format(intval($farOff))." GEMS and get ".$farPlays." plays per session", 'balance' => $theBally));
		}
	}
}



if (isset($_GET['cid'])) {
	$aWallet = clean($_GET['cid']);
	$sTime = time();
	$prizeWon = clean($_GET['time']);

	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	} else {
		// Find this user
		$sql = "SELECT * FROM claw WHERE wallet='".$aWallet."'";
		$allWalletResult = $connection->query($sql);

		// If SQL works
		if($allWalletResult){
			
			// If user found
			if ($allWalletResult->num_rows > 0){
				$row = $allWalletResult->fetch_object();
				
				// Big prize
				if ($prizeWon == 'stacker-big' || $prizeWon == 'scratch-big' || $prizeWon == 'wheel-big'){
					if($row->prizebig < $maxBigGrabberWins){
						// Update wins
						$sql = "UPDATE claw SET prizebig = prizebig+1 WHERE wallet = '".$aWallet."'";
						$connection->query($sql);
						

						// Doing the check uses a play so add 1 more
						$bigPrizeAdds++;

						// Add extra Plays
						if ($prizeWon == 'stacker-big'){
							$lines = file('https://games.gemcave.org/stacker-backend?wid='.$aWallet);
							
							$sql = "UPDATE stacker SET playno = playno+".$bigPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}
						if ($prizeWon == 'wheel-big'){
							$lines = file('https://token.gemcave.org/wheel-backend?wid='.$aWallet);
							
							$sql = "UPDATE wheel SET playno = playno+".$bigPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}
						if ($prizeWon == 'scratch-big'){
							$lines = file('https://token.gemcave.org/scratch-backend?wid='.$aWallet);
							
							$sql = "UPDATE scratch SET playno = playno+".$bigPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}

					} else {
						print json_encode(array('status' => "false", 'message' => 'Suspicious winning activity detected. Wallet logged, please note abuse is recorded and will be penalised.'));
					}
				}
				
				// Small prize
				if ($prizeWon == 'stacker-small' || $prizeWon == 'scratch-small' || $prizeWon == 'wheel-small'){
					if ($row->prizesmall < $maxSmallGrabberWins){
						// Update wins
						$sql = "UPDATE claw SET prizesmall = prizesmall+1 WHERE wallet = '".$aWallet."'";
						$connection->query($sql);

						// Doing the check uses a play so add 1 more
						$smallPrizeAdds++;

						// Add extra Plays
						if ($prizeWon == 'stacker-small'){
							$lines = file('https://games.gemcave.org/stacker-backend?wid='.$aWallet);

							$sql = "UPDATE stacker SET playno = playno+".$smallPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}
						if ($prizeWon == 'wheel-small'){
							$lines = file('https://token.gemcave.org/wheel-backend?wid='.$aWallet);
							
							$sql = "UPDATE wheel SET playno = playno+".$smallPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}
						if ($prizeWon == 'scratch-small'){
							$lines = file('https://token.gemcave.org/scratch-backend?wid='.$aWallet);
							
							$sql = "UPDATE scratch SET playno = playno+".$smallPrizeAdds.", last=".time()." WHERE wallet = '".$aWallet."'";
							$connection->query($sql);
						}
					} else {
						print json_encode(array('status' => "false", 'message' => 'Suspicious winning activity detected. Wallet logged, please note abuse is recorded and will be penalised.'));
					}
				}

				// Rare prize
				if ($prizeWon == 'rare'){
					if ($row->rare == 1){
						// Update
						$sql = "UPDATE claw SET rare = 0 WHERE wallet = '".$aWallet."'";
						$connection->query($sql);
					} else {
						print json_encode(array('status' => "false", 'message' => 'Suspicious winning activity detected. Wallet logged, please note abuse is recorded and will be penalised.'));
					}
				}

				print json_encode(array('status' => "true"));
			} else {
				print json_encode(array('status' => "false"));
			}
			
		}
	}
}






if (isset($_GET['pid'])) {
	$aWallet = clean($_GET['pid']);
	
	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	} else {
		// Find this user
		$sql = "SELECT * FROM claw WHERE wallet='".$aWallet."'";
		$allWalletResult = $connection->query($sql);

		// If SQL works
		if($allWalletResult){
			
			// If user found
			if ($allWalletResult->num_rows > 0){
				$row = $allWalletResult->fetch_object();
				$newPlayNo = $row->playno - 1;

				$sql = "UPDATE claw SET playno = ".$newPlayNo." WHERE wallet = '".$aWallet."'";
				$connection->query($sql);
				print json_encode(array('status' => "true"));
			}
		}
	}
}


?>