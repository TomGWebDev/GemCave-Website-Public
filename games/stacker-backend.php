<?php
/* ------------------------------ */
/* STACKER  BACKEND               */
/* Developed by Tom G for Ragestar Crypto Tech */
/* Desc: The server-side code     */
/* ------------------------------ */

include '../token/config.php';

function getMyPrizes($allPrizesI){
	// Loop all prizes
	$setLvlPrize = array();
	foreach ($allPrizesI as $onePrizeName => $onePrize) {

		// If stacker prize
		if ($onePrize['stacker']){

			// Build array of stacker prizes
			$setLvlPrize[$onePrize['stackerlevel']] = $onePrizeName;
		}
	}

	return $setLvlPrize;
}

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


// Process play
if (isset($_GET['wid'])) {

	$aWallet = clean($_GET['wid']);
	$cWallet = substr($aWallet,2);
	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	} else {

		// Get wallet balance
		$data = '{"jsonrpc":"2.0","id":1,"method":"eth_call","params":[{
			"from":"0x0000000000000000000000000000000000000000",
			"data":"0x70a08231000000000000000000000000'.$cWallet.'",
			"to":"0x0000000000000000000000000000000000000000"},
			"latest"]}';
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$resp = curl_exec($curl);
		$resp = json_decode($resp);
		$theBally = hexdec($resp->result);
		$theBally = sprintf("%.0f",$theBally);
		$theBally = intval(substr($theBally, 0, -9));

		$creditLevel = 0;
		$myPlaysPerSession = 0;

		// Check STAKED GEMS
		$data = '{"jsonrpc":"2.0","id":2,"method":"eth_call","params":[{
			"from":"0x0000000000000000000000000000000000000000",
			"data":"0x70a08231000000000000000000000000'.$cWallet.'",
			"to":"0x0000000000000000000000000000000000000000"},
			"latest"]}';

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$resp = curl_exec($curl);
		$resp = json_decode($resp);
		$theBallyx = hexdec($resp->result);
		$theBallyx = sprintf("%.0f",$theBallyx );
		$theBallyx = intval(substr($theBallyx, 0, -9));

		$theBally = ($theBally + $theBallyx);

		if ($theBally < $minBalance){
			$myPlaysPerSession = 0;
			$farOff = $minBalance - $theBally;
			$farPlays = $level1StackerPlays;
		}

		if ($theBally >= $minBalance){
			$creditLevel = 1;
			$myPlaysPerSession = $level1StackerPlays;
			$farOff = $minBalance2 - $theBally;
			$farPlays = $level2StackerPlays;
		}

		if ($theBally >= $minBalance2){
			$creditLevel = 2;
			$myPlaysPerSession = $level2StackerPlays;
			$farOff = $minBalance3 - $theBally;
			$farPlays = $level3StackerPlays;
		}

		if ($theBally >= $minBalance3){
			$creditLevel = 3;
			$myPlaysPerSession = $level3StackerPlays;
		}

		// Build array of winnable prizes per play
		$myWinnable = array();
		$creditLevelS = $creditLevel - 1;
		foreach ($allPrizes as $onePrizeName => $onePrize) {
			if ($onePrize['stacker'] && $onePrize['stackerlevel'] <= $creditLevelS){
				$myWinnable[] = $onePrizeName;
			}
		}

		// If wallet has minimum balance
		if ($creditLevel > 0) {

			// Find this IP
			$theIP = $_SERVER['REMOTE_ADDR'];
			$sql = "SELECT * FROM stacker WHERE ip='".$theIP."'";
			$ipCountResult = $connection->query($sql);

			// If SQL works
			if($ipCountResult){
				
				// If user found
				if ($ipCountResult->num_rows > $playsPerIP){
					print json_encode(array('status' => "false", 'message' => 'Maximum plays reached from your IP'));
				} else {
					// Find this user
					$sql = "SELECT * FROM stacker WHERE wallet='".$aWallet."'";
					$allWalletResult = $connection->query($sql);

					// Check user has prize row - create if not
					$allPrizeResult = $connection->query("SELECT * FROM prizes WHERE wallet='".$aWallet."'");
					if ($allPrizeResult->num_rows == 0){
						$connection->query("INSERT INTO prizes (wallet, ip) VALUES ('".$aWallet."', '".$theIP."')");
					}
					
					// If SQL works
					if($allWalletResult){
						
						// If user found
						if ($allWalletResult->num_rows > 0){
							$row = $allWalletResult->fetch_object();
								
							// Get number of plays this session
							$playno = $row->playno; 
							$lastplay = $row->last;

							// Calculate time
							$calcTime = $row->last + $secondsPerSpin;

							// Time is up or plays remaining
							if (time() > ($lastplay + $secondsPerSpin) || $playno > 0){

								// Reset row for new session
								if (time() > ($lastplay + $secondsPerSpin)) {
									$sql = "UPDATE stacker SET playno = ".$myPlaysPerSession.", sessionprizes = '".json_encode($myWinnable)."', last = ".time()." WHERE wallet = '".$aWallet."'";
									$playno = $myPlaysPerSession;
								} 
								$connection->query($sql);

								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'playno' => $playno));
							
							} else {
								$theMsg = 'You have used all '.$myPlaysPerSession.' plays. Please wait for the next session ';
								
								if ($farOff > 0){
									$theMsg .= ' OR buy '.number_format(intval($farOff)).' GEMS to upgrade and get '.$farPlays.' plays per session.';
								}
								print json_encode(array('status' => "false", 'message' => $theMsg, 'balance' => $theBally, 'credit' => $creditLevel));
							}

						// No user found
						} else {
							// Create user row
							$sql = "INSERT INTO stacker (wallet, ip, last, playno, sessionprizes) VALUES ('".$aWallet."', '".$theIP."', '".time()."', ".$myPlaysPerSession.", '".json_encode($myWinnable)."')";
							$there = $connection->query($sql);
							
							print json_encode(array('status' => "true", 'credit' => $creditLevel, 'balance' => $theBally, 'playno' => $myPlaysPerSession));
						}
					}
				}
			}

			$connection->close();
		} else {
			$theRem = substr(sprintf('%f', $minBalance - $theBally), 0, -16);
			print json_encode(array('status' => "false", 'message' => "You do not hold enough GEMS.<br>You need to hold ".number_format(intval($farOff))." GEMS to play the games.", 'balance' => $theBally));
		}
	}
}



// ------------ //
//  Prize Win   //
// ------------ //
if (isset($_GET['cid'])) {
	$aWallet = clean($_GET['cid']);
	$sTime = time();
	$lvl = clean($_GET['lvl']);

	$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	} else {
		// Find this user
		$sql = "SELECT * FROM stacker WHERE wallet='".$aWallet."'";
		$allWalletResult = $connection->query($sql);

		// If SQL works
		if($allWalletResult){
			
			// If user found
			if ($allWalletResult->num_rows > 0){
				$row = $allWalletResult->fetch_object();

				if ($row->playno >= 0){
					// Get all winnable prizes
					$setLvlPrize = getMyPrizes($allPrizes);

					// Convert values
					$lvlA = 99;
					if ($lvl == 5){
						$lvlA = 0;
					}
					if ($lvl == 9){
						$lvlA = 1;
					}
					if ($lvl == 12){
						$lvlA = 2;
					}

					// Invalid prize
					if($lvlA > 2) {
						print json_encode(array('status' => "false", 'message' => 'Invalid prize. Wallet logged, please note abuse is recorded and will be penalised.'));
						return;
					}
					
					$prizeWon = $setLvlPrize[$lvlA];
					$prizeAmount = $allPrizes[$setLvlPrize[$lvlA]]['stackercredits'];			
					$prizeLeft = json_decode($row->sessionprizes, true);
					$prizeValid = false;

					foreach ($prizeLeft as $aPrizeID => $aPrize){
						if ($prizeWon == $aPrize) {
							unset($prizeLeft[$aPrizeID]);
							$prizeValid = true;
							break; // Otherwise it removed all prizes with same name
						}
					}
					
					if($prizeValid){
						$sql = "UPDATE stacker SET sessionprizes = '".json_encode(array_values($prizeLeft))."' WHERE wallet = '".$aWallet."'";
						$connection->query($sql);

						// Update prize
						$sql = "UPDATE prizes SET ".$prizeWon." = ".$prizeWon." + ".$prizeAmount." WHERE wallet = '".$aWallet."'";
						$connection->query($sql);

					} else {
						print json_encode(array('status' => "false", 'message' => 'Suspicious winning activity detected. Wallet logged, please note abuse is recorded and will be penalised.'));
						return;
					}

					print json_encode(array('status' => "true"));
				} else {
					print json_encode(array('status' => "false", 'message' => 'Suspicious game activity detected. Wallet logged, please note abuse is recorded and will be penalised.'));
					return;
				}

				
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
		$sql = "SELECT * FROM stacker WHERE wallet='".$aWallet."'";
		$allWalletResult = $connection->query($sql);

		// If SQL works
		if($allWalletResult){
			
			// If user found
			if ($allWalletResult->num_rows > 0){
				$row = $allWalletResult->fetch_object();

				// Get all winnable prizes
				$setLvlPrize = getMyPrizes($allPrizes);
				
				$newPlayNo = $row->playno - 1;

				$sql = "UPDATE stacker SET sessionprizes = '".json_encode(array_values($setLvlPrize))."', playno = ".$newPlayNo." WHERE wallet = '".$aWallet."'";
				$connection->query($sql);
				print json_encode(array('status' => "true"));
			}
		}
	}
}


?>