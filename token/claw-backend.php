<?php
/* ------------------------------ */
/* CLAW MACHINE BACKEND           */
/* Developed by Tom G for Ragestar Crypto Tech */
/* Desc: The server-side code     */
/* ------------------------------ */

include 'config.php';

$grabberPrizes = array();
$sessionPrizes = array();
foreach ($allPrizes as $onePrizeN => $onePrize){
	if ($onePrize['grabber']) {
		$grabberPrizes[$onePrizeN] = $onePrize;
		$sessionPrizes[$onePrizeN] = mt_rand(0, $onePrize['grabbermax']);
	}
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
		$prizesToWin = array();

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
					
					$prizeToWinS = json_encode(($sessionPrizes));

					// Check user has prize row - create if not
					$allPrizeResult = $connection->query("SELECT * FROM prizes WHERE wallet='".$rWallet."'");
					if ($allPrizeResult->num_rows == 0){
						$connection->query("INSERT INTO prizes (wallet, ip) VALUES ('".$rWallet."', '".$theIP."')");
					}

					// If SQL works
					if($allWalletResult){
						
						// If user found
						if ($allWalletResult->num_rows > 0){
							$row = $allWalletResult->fetch_object();
								
							// Get number of plays this session
							$playno = $row->playno;
							$lastplay = $row->last;
							$lastprizes = $row->prize;
							$myWins = $row->won;

							// Calculate time
							$calcTime = $row->last + $secondsPerSpin;

							// Time is up
							if (time() > ($lastplay + $secondsPerSpin)){
								// Update
								$sql = "UPDATE claw SET prize = '".$prizeToWinS."', last = ".time().", playno = '".$playno."', ip = '".$theIP."', won='', playno=".$myPlaysPerSession." WHERE wallet = '".$rWallet."'";
								$connection->query($sql);

								$myWinsAr = json_decode($myWins);
								sendTGMsg($rWallet, $myWinsAr, 'grabber');

								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'prize' => $prizeToWinS, 'won' => $myWins, 'playno' => $myPlaysPerSession));
							
							// Plays left
							} elseif ($playno > 0) {
								print json_encode(array('status' => "true", 'balance' => $theBally, 'credit' => $creditLevel, 'prize' => $lastprizes, 'won' => $myWins, 'playno' => $playno));
							} else {
								$theMsg = 'You have used all '.$myPlaysPerSession.' plays. Please wait for the next session ';
								
								if ($farOff > 0){
									$theMsg .= ' OR buy '.number_format(intval($farOff)).' GEMS to upgrade and get '.$farPlays.' plays per session.';
								}
								print json_encode(array('status' => "false", 'message' => $theMsg, 'balance' => $theBally));
							}

						// No user found
						} else {

							// Create user row
							$sql = "INSERT INTO claw (wallet, prize, last, ip, playno) VALUES ('".$rWallet."', '".$prizeToWinS."', ".$sTime.", '".$theIP."', $myPlaysPerSession)";
							$there = $connection->query($sql);
							
							print json_encode(array('status' => "true", 'credit' => $creditLevel, 'balance' => $theBally, 'prize' => $prizeToWinS, 'won' => '', 'playno' => $myPlaysPerSession));
						}
					}
				}
			}

			$connection->close();
		} else {
			print json_encode(array('status' => "false", 'message' => "You do not hold enough tokens to play! Buy ".number_format(intval($farOff))." GEMS and get ".$farPlays." plays per session", 'balance' => $theBally));
		}
	}
}



if (isset($_GET['cid'])) {
	$aWallet = clean($_GET['cid']);
	$sTime = time();
	$prizeWon = clean($_GET['time']);
	$prizeAmount = $allPrizes[$prizeWon]['grabbercredits'];

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
				$possPrizes = json_decode($row->prize);
				$wonPrizes = json_decode($row->won);
				if (is_array($wonPrizes)){
					$wonPrizes[] = $prizeWon;
				} else {
					$wonPrizes = array($prizeWon);
				}

				// If prize was possible to win and has plays remaining
				if ($possPrizes->$prizeWon > 0 && $row->playno >= 0) {
					$possPrizes->$prizeWon = $possPrizes->$prizeWon - 1;
					$sql = "UPDATE claw SET won = '".json_encode($wonPrizes)."', prize = '".json_encode($possPrizes)."' WHERE wallet = '".$aWallet."'";
					$connection->query($sql);


					// Update prize
					$sql = "UPDATE prizes SET ".$prizeWon." = ".$prizeWon." + ".$prizeAmount." WHERE wallet = '".$aWallet."'";
					$connection->query($sql);

					print json_encode(array('status' => "true"));
				} else {
					print json_encode(array('status' => "false"));
				}
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