<?php
/* ------------------------------ */
/* SCRATCH CARD BACKEND           */
/* Developed by Tom G for Ragestar Crypto Tech */
/* Desc: The server-side code     */
/* ------------------------------ */

include 'config.php';

// Get time
$sTime = time();

// CURL Options
$url = "https://bsc-dataseed.binance.org/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
	"Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


// Process
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

		$theBally = $theBally + $theBallyx;

		if ($theBally < $minBalance){
			$myPlaysPerSession = 0;
			$farOff = $minBalance - $theBally;
			$farPlays = $level1Plays;
		}

		if ($theBally >= $minBalance){
			$creditLevel = 1;
			$myPlaysPerSession = $level1Plays;
			$farOff = $minBalance2 - $theBally;
			$farPlays = $level2Plays;
		}

		if ($theBally >= $minBalance2){
			$creditLevel = 2;
			$myPlaysPerSession = $level2Plays;
			$farOff = $minBalance3 - $theBally;
			$farPlays = $level3Plays;
		}

		if ($theBally >= $minBalance3){
			$creditLevel = 3;
			$myPlaysPerSession = $level3Plays;
		}

		// If wallet has minimum balance
		if ($creditLevel > 0) {

			// Roll the dice!
			$prize = false;
			$allPrizes = shuffle_assoc($allPrizes);
			foreach ($allPrizes as $aPrize => $aPrizeRow){
				$prizeAmount = 0;

				if ($aPrizeRow['scratch']){
					if (mt_rand(0, $aPrizeRow['odds']) == ceil($aPrizeRow['odds'] / 2)) {
						$prize = $aPrize;
						$prizeAmount = $aPrizeRow['scratchcredits'];
					}

					break;
				}
			}

			// Find this IP
			$theIP = $_SERVER['REMOTE_ADDR'];
			$sql = "SELECT * FROM scratch WHERE ip='".$theIP."'";
			$ipCountResult = $connection->query($sql);

			// If SQL works
			if($ipCountResult){
				
				// If user found
				if ($ipCountResult->num_rows > $playsPerIP){
					print json_encode(array('status' => "false", 'message' => 'Maximum plays reached from your IP'));
				} else {
					// Find this user
					$sql = "SELECT * FROM scratch WHERE wallet='".$aWallet."'";
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
							$sessionwins = json_decode($row->sessionwins);

							// Calculate time
							$calcTime = $row->last + $secondsPerSpin;

							// Time is up or plays remaining
							if (time() > ($lastplay + $secondsPerSpin) || $playno > 0){

								// Update prize
								if ($prize != false){
									$sessionwins[] = $prize;
									$sql = "UPDATE prizes SET ".$prize." = ".$prize." + ".$prizeAmount." WHERE wallet = '".$aWallet."'";
									$connection->query($sql);
									$sql = "UPDATE scratch SET sessionwins = '".json_encode($sessionwins)."' WHERE wallet = '".$aWallet."'";
									$connection->query($sql);
								}

								// Update game
								if (time() > ($lastplay + $secondsPerSpin)) {
									$sql = "UPDATE scratch SET playno = ".$myPlaysPerSession.", sessionwins = '', last = ".time()." WHERE wallet = '".$aWallet."'";
									$playno = $myPlaysPerSession;

									sendTGMsg($aWallet, $sessionwins, 'scratch');
								} else {
									$sql = "UPDATE scratch SET playno = playno - 1 WHERE wallet = '".$aWallet."'";
								}
								$connection->query($sql);

								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'prize' => $prize, 'playno' => $playno));
							
							} else {
								$theMsg = 'You have used all '.$myPlaysPerSession.' plays. Please wait for the next session ';
								
								if ($farOff > 0){
									$theMsg .= ' OR buy '.number_format(intval($farOff)).' GEMS to upgrade and get '.$farPlays.' plays per session.';
								}
								print json_encode(array('status' => "false", 'message' => $theMsg, 'balance' => $theBally, 'credit' => $creditLevel));
							}

						// No user found
						} else {
							
							// Update prize
							if ($prize != false){
								$sql = "UPDATE prizes SET ".$prize." = ".$prize." + ".$prizeAmount." WHERE wallet = '".$aWallet."'";
								$connection->query($sql);

								
								sendTGMsg($aWallet, $prize, 'scratch');
							}

							// Create user row
							$sql = "INSERT INTO scratch (wallet, ip, last, playno) VALUES ('".$aWallet."', '".$theIP."', '".time()."', ".$myPlaysPerSession.")";
							$there = $connection->query($sql);
							
							print json_encode(array('status' => "true", 'credit' => $creditLevel, 'balance' => $theBally, 'prize' => $prize, 'playno' => $myPlaysPerSession));
						}
					}
				}
			}

			$connection->close();
		} else {
			$theRem = substr(sprintf('%f', $minBalance - $theBally), 0, -16);
			print json_encode(array('status' => "false", 'message' => "You do not hold enough GEMS.<br>You need to buy ".number_format(intval($farOff))." GEMS to play the games.", 'balance' => $theBally));
		}
	}
}

?>
