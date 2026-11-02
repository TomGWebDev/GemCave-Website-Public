<?php
	function clean($userInput) {
		$userInput= trim($userInput);
		$userInput= stripslashes($userInput);
		$userInput= htmlspecialchars($userInput);
		return $userInput;
	}

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

		if (!$full) {
			$string = array_slice($string, 0, 1);
		}
		return $string ? implode(', ', $string) . ' old' : 'just now';
	}

	if (false) {

		$allPRows = array();
		$allRows = array();
		$filterClass = '';
		$showAdd = '';
		$submitValid = true;

		// DB Connect
		$dbhost = "";
		$dbusername = "";
		$dbpass = "";
		$dbname = "";
		$connection = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

		if (!$connection) {
			die('Could not connect');
		} else {

			// ACTIONS
			if (isset($_GET['q'])) {

			// Approve a gem
			if ($_GET['q'] == 'accept') {           
				$sql = "UPDATE gems SET status = 1 WHERE id = ".$_GET['id'];
				$result = $connection->query($sql);       

				echo "<script>location.href='/admin.php';</script>";
					die();
   
			}

			// Delete a gem
			if ($_GET['q'] == 'delete') {           
				$sql = "DELETE FROM gems WHERE id = ".$_GET['id'];
				$result = $connection->query($sql);       

				echo "<script>location.href='/admin.php';</script>";
					die();
   
			}

				// Update a gem
			if ($_GET['q'] == 'update') {           
				$sql = "UPDATE gems SET votes = ".$_GET['votes']." WHERE id = ".$_GET['id'];
				$result = $connection->query($sql);       

				echo "<script>location.href='/admin.php';</script>";
					die();
   
			}

			// Delete a gem
			if ($_GET['q'] == 'resetvotes') {           
				$sql = "UPDATE gems SET votes = 0";
				$result = $connection->query($sql);       

				echo "<script>location.href='/admin.php';</script>";
					die();
   
			}
			}
         
			// Get gems
			$sql = "SELECT * FROM gems";
			$result = $connection->query($sql);

			// If SQL works
			if($result){
			// If user found
			if ($result->num_rows > 0){
				while($row = $result->fetch_object()) {

					if ($row->status == '0'){
						$allPRows[] = $row;
					} else {
						$allRows[] = $row;
					}
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
		<title>Gem Cave</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/style.css?cb=1637108204263">
	</head>
	<body id="page-admin">

		<header id="header">
			<div class="logo">
				<a href="/">
					<div class="logo-svg">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 440.002" width="512" height="440.002"><path d="M511.939 335.009l-32-256a7.998 7.998 0 00-5.64-6.67l-240-72a7.984 7.984 0 00-6.109.628l-192 104a7.999 7.999 0 00-4.061 5.604l-32 176a8 8 0 00.163 3.572l40 144A8 8 0 0048 440h392a7.998 7.998 0 006.656-3.563l64-96a8.003 8.003 0 001.283-5.43z" fill="#d9d3de"/><path d="M72.292 434.143l-40-144a8.001 8.001 0 01-.163-3.572l32-176a8 8 0 014.061-5.604L251.708 5.562 234.299.339a7.984 7.984 0 00-6.109.628l-192 104a7.999 7.999 0 00-4.061 5.604l-32 176a8 8 0 00.163 3.572l40 144A8 8 0 0048 440h32a7.998 7.998 0 01-7.708-5.858z" fill="#c6bdcd"/><path d="M455.589 333.47l-48-144a7.998 7.998 0 00-4.012-4.624l-128-64a8 8 0 00-4.893-.736l-144 24a7.998 7.998 0 00-5.657 3.97l-72 128a8 8 0 00-.764 5.958l40 152A8 8 0 0096 440.002h280a8.002 8.002 0 006.4-3.2l72-96a8.003 8.003 0 001.189-7.331z" fill="#d9d3de"/><path d="M455.589 333.47l-48-144a7.998 7.998 0 00-4.012-4.624l-96.002-48.001h.001l-31.999-16a8 8 0 00-4.893-.736l-21.434 3.572-122.566 20.428a7.998 7.998 0 00-5.657 3.97l-72 128a8 8 0 00-.764 5.958l40 152A8 8 0 0096 440h21.622L80.263 298.038a8 8 0 01.764-5.958l72-128a8.005 8.005 0 015.657-3.97l122.566-20.428 90.328 45.164a7.998 7.998 0 014.012 4.625l48 144a8 8 0 01-1.189 7.33l-72 96a7.999 7.999 0 01-6.4 3.2h32a8.002 8.002 0 006.4-3.2l72-96a8.003 8.003 0 001.188-7.33z" fill="#b3a7bd"/><path d="M398.91 315.97l-56-96a8 8 0 00-5.976-3.914l-136-16a7.991 7.991 0 00-7.225 3.003l-88 112a8 8 0 00-1.244 7.633l40 112a8 8 0 007.534 5.31h184a8 8 0 007.155-4.422l56-112a7.997 7.997 0 00-.244-7.61z" fill="#66507a"/><path d="M184.466 434.692l-40-112a8 8 0 011.244-7.633l87.387-111.22-32.161-3.783a7.991 7.991 0 00-7.225 3.003l-88 112a8 8 0 00-1.244 7.633l40 112a8 8 0 007.534 5.31h40a8 8 0 01-7.535-5.31z" fill="#533a6a"/><path d="M227.563 57.345l-.008.006a7.948 7.948 0 00-.644.478c-.109.09-.208.188-.311.283-.087.08-.177.154-.26.237-.139.139-.266.286-.393.433-.041.048-.086.092-.127.14-.114.14-.217.285-.321.43-.048.067-.1.13-.146.199-.083.125-.157.254-.233.383-.058.097-.119.192-.173.292-.055.103-.101.21-.152.315-.063.132-.129.262-.186.397-.033.079-.058.16-.088.24-.062.165-.125.328-.176.497-.02.064-.032.13-.05.195a7.95 7.95 0 00-.139.557c-.023.114-.035.23-.053.346-.022.14-.049.277-.063.419-.027.265-.04.532-.04.799l-.001.01v16a8 8 0 0016 0V68.284l17.493-11.662 28.566 7.142a8.007 8.007 0 001.946.24 8 8 0 001.934-15.763L261.25 41.07 238.739 1.67 234.298.339a7.984 7.984 0 00-6.109.628l-6.323 3.425 23.482 41.094z" fill="#9f91ac"/><path d="M229.43 17.629l14.072-7.623c-.761-1.331-4.408-8.03-4.752-8.316-.415-.346-1.43-.445-1.946-.6-1.653-.496-3.289-1.126-5.044-1.033-1.644.086-3.192.705-4.625 1.48l-5.269 2.855 7.564 13.237z" fill="#8c7b9c"/><path d="M406.06 112.24a7.997 7.997 0 00-4.715 12.199l12.362 18.543-11.362 11.362a7.999 7.999 0 000 11.314 7.974 7.974 0 005.657 2.343 7.974 7.974 0 005.657-2.343l16-16a8 8 0 001-10.095l-9.703-14.555 20.987-5.247a7.998 7.998 0 005.215-4.183l22.341-44.681-15.555-4.667-19.45 38.9z" fill="#9f91ac"/><path d="M169.344 179.564a8 8 0 002.219 11.094 7.994 7.994 0 0011.094-2.218l16-24a7.998 7.998 0 00-.256-9.237l-15.363-20.484-17.777 2.963 16.944 22.592z" fill="#b3a7bd"/><path fill="#9f91ac" d="M179.482 156.644l17.777-2.963-14.222-18.963-17.777 2.963z"/><path d="M256.618 406.643c-1.908 0-3.72-.86-4.935-2.347l-58.465-71.448a6.51 6.51 0 01-.409-7.674l20.866-31.943a6.387 6.387 0 015.344-2.904h75.2a6.392 6.392 0 015.345 2.904l20.864 31.943a6.51 6.51 0 01-.41 7.674l-58.464 71.447a6.376 6.376 0 01-4.936 2.348z" fill="#37c4b3"/><g fill="#53e7d3"><path d="M216.11 291.04a6.392 6.392 0 00-2.435 2.19l-20.866 31.945a6.5 6.5 0 00-1.04 3.99h49.244zM272.223 329.163h49.246a6.495 6.495 0 00-1.041-3.989l-20.866-31.944a6.389 6.389 0 00-2.435-2.19z"/></g><path fill="#53e7d3" d="M231.37 329.163l25.248 77.494 25.406-77.494z"/><path fill="#b9f5ed" d="M256.581 290.327l-25.368 38.836h50.81l-25.368-38.836z"/><path d="M210.267 332.848a6.512 6.512 0 01-.41-7.674l20.866-31.943a6.387 6.387 0 015.344-2.904h-17.049a6.387 6.387 0 00-5.344 2.904l-20.865 31.943a6.51 6.51 0 00.409 7.674l58.465 71.448c1.216 1.487-41.416-71.448-41.416-71.448z" opacity=".1"/></svg>
					</div>
					<div class="logo-text">
						Gem Cave <span class="version">ADMIN</span>
					</div>
				</a>
			</div>
		</header>

		<div class="main-body">
			<h1>Pending Gems</h1>

			<table class="admin-table">
			<?php
				$rowC = 0;
				if (count($allPRows) < 1){
					print '<p>No pending gems</p>';
				}
				foreach ($allPRows as $aRow){
					$rowC++;

					$contractID = $aRow->address;
					$pancakeLink = 'https://exchange.pancakeswap.finance/#/swap?outputCurrency='.$contractID;
					$pooLink = 'https://poocoin.app/tokens/'.$contractID;
					$bscLink = 'https://bscscan.com/token/'.$contractID;
			?>

			<tr>
				<td>
					<img src="/uploads/<?= $aRow->logo ?>" width="120" height="120" />
				</td>
				<td>
					<strong><?= $aRow->name ?></strong>
					<br>
					<?= $aRow->symbol ?>
				</td>
				<td>
					<?= $aRow->address ?>
				</td>
				<td>
					Web: <a href="<?= $aRow->website ?>" target="_blank"><?= $aRow->website ?></a><br>
					Twitter: <a href="<?= $aRow->twitter ?>" target="_blank"><?= $aRow->twitter ?></a><br>
					Reddit: <a href="<?= $aRow->reddit ?>" target="_blank"><?= $aRow->reddit ?></a><br>
					Instagram: <a href="<?= $aRow->instagram ?>" target="_blank"><?= $aRow->instagram ?></a>
				</td>
				<td>
					<a href="/admin.php?q=accept&id=<?= $aRow->id ?>">✅ Accept</a>
					<br>
					<a href="/admin.php?q=delete&id=<?= $aRow->id ?>" onClick="return confirm('DELETE <?= $aRow->name ?>?')">❌ Delete</a>
				</td>
			</tr>

			<?php } ?>
			</table>

			<h1>All Gems</h1>

			<table class="admin-table">
			<?php
				$rowC = 0;
				foreach ($allRows as $aRow){
					$rowC++;

					$contractID = $aRow->address;
					$pancakeLink = 'https://exchange.pancakeswap.finance/#/swap?outputCurrency='.$contractID;
					$pooLink = 'https://poocoin.app/tokens/'.$contractID;
					$bscLink = 'https://bscscan.com/token/'.$contractID;
			?>

			<tr>
				<td>
					<img src="/uploads/<?= $aRow->logo ?>" width="120" height="120" />
				</td>
				<td>
					<strong><?= $aRow->name ?></strong>
					<br>
					<?= $aRow->symbol ?>
				</td>
				<td style="width: 120px;">
					<pre><?= $aRow->address ?></pre>
				</td>
				<td style="width: 120px;">Referrer: 
					<pre style="font-size:9px"><?= $aRow->referrer ?></pre>
				</td>
				<td style="width: 120px;">Set Votes:
					<form type="GET">
					<input type="hidden" value="<?= $aRow->id ?>" name="id" />
					<input type="hidden" value="" name="pw" />
					<input type="number" placeholder="Votes" name="votes" />
					<input type="submit" value="update" name="q" />
					</form>
				</td>
				<td>
					<a href="/admin.php?q=delete&id=<?= $aRow->id ?>" onClick="return confirm('DELETE <?= $aRow->name ?>?')">❌ Delete</a>
				</td>
			</tr>

			<?php } ?>
			</table>


         
			<h1>Reset All Votes</h1>

			<a href="/admin?q=resetvotes" class="button">Reset All Votes</a>
		</div>

		<footer>
			<div class="footer-main">
				<div class="footer-container">
					<div class="footer-1">
					</div>
					<div class="footer-3">
						<p>IMPORTANT: The listings on this website do not represent financial advice.</p>
					</div>
				</div>
			</div>
		</footer>
	</body>

	<?php } ?>
</html>
