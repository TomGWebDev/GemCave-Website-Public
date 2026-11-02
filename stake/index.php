<?php
include '../token/config.php';
?>

<!doctype html>
<html class="no-js" lang="">

	<head>
		<meta charset="utf-8">
		<title>GemCave Staking</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?= $faviconGames ?>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Kanit:wght@300;500;600;800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://token.gemcave.org/css/style.css">

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
		</script>

	</head>

	<body id="page-stake">
		<?= $topBar; ?>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="https://gemcave.org" target="_blank">
						<img src="https://gemcave.org/img/logos/staking.png" />
					</a>
				</div>
				<div class="menu2">
					<nav>
						<a href="https://gemcave.org/" class="">GemCave</a>
						<a href="https://token.gemcave.org/" class="">Token</a>
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
							<h2>Stake your GEMS and get rewarded with the GemCave Staking platform!</h2>
							<p>New and upgraded! We have doubled our rewards and added a new BURN reward option for those holders who want to support GemCave Token by burning the reward GEMS from circulation.</p>
							<p>What is staking? Simply, you lock away however many GEMS you want for a set period of time. Once the timer is up, you can unlock all the GEMS you staked, plus your reward (the reward depends upon the staking product you use).</p>
						<p><a href="https://bscscan.com/address/0x0000000000000000000000000000000000000000#code" style="font-size: 13px;color: #fff;font-weight: 500;text-decoration: none;" target="_blank">View Contract on BSCScan</a></p>
						</div>
					</div>
				</div>
			</div>

			<div class="marquee">
				<p><span id="curstaked">77,474,271,523</span> GEMS BURNED via new burn reward option!</p>
				<p><span id="rewardspaid">2,666,166,188,228</span> staking reward GEMS given out so far</p>
				<p><span id="curstaked">Connect wallet to see</span> GEMS staked globally</p>
				<p><span id="rewardspending">Connect wallet to see</span> GEMS rewards pending payouts</p>
				<p><span id="mybaltotol">Connect wallet to see</span> GEMS you have staked across all products</p>
			</div>
            
			<div id="stake-dash">
				<div class="container">
					<div class="title-info">
						<h2>Staking Dashboard</h2> 
						<p>&nbsp;</p>
						<p>Let's get staking! To start, click the Connect Wallet button and follow the instructions in the box for the product you wish to use.</p>
						<p><div class="button" id="connectstake">Connect Wallet</div></p>
					</div>
				</div>
                
				<div class="container">
					<div class="product-list">
						<div class="product-item box1">
							<div class="product-title">
								<h3>1 Week Stake</h3>
								<h4>15% APY Reward</h4>
                                
								<div class="info">15% APY rewarded in GEMS after locking period of 1 week, your GEMS plus reward are sent upon unlock.</div>
							</div>
							<div class="product-body" style="background: #348ccb;">

								<div class="strap connect">
									<h3>Connect your wallet to view product options</h3>
								</div>

								<div class="strap addstake">
									<h3>Add Stake</h3>
									<p>Specify how many GEMS you would like to stake, approve the GEMS spend transaction, then approve the staking transaction.</p>

									<input class="stake-amount" name="box1stake" id="box1stake" type="number" step="1" placeholder="Amount of GEMS to stake" min="10000000" max="400000000000" />
									<div class="button" id="approvebox1"><span class="big">Approve GEMS</span></div>

									<div class="loading-add-stake">
										<svg xmlns="http://www.w3.org/2000/svg" class="doing-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path fill="none" stroke="#fff" stroke-width="8" stroke-dasharray="138.55802124023438 118.03090698242187" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-linecap="round" style="transform:scale(.8);transform-origin:50px 50px"><animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="0;256.58892822265625;0"/></path></svg>
                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Please approve the staking transaction and await confirmation...</span>
										<span class="complete-label">Staking completed! Refresh this page to view your status.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap staked">
									<h3>Staked!</h3>
									<p>You have staked <span id="box1staked"></span> GEMS they will unlock (along with your <span id="box1reward"></span> reward GEMS) in <span id="box1seconds"></span></p>
								</div>

								<div class="strap pullstake">
									<h3>Pull Stake</h3>
									<p>The staking period is over! You can now withdraw your staked GEMS plus your reward GEMS!</p>
									<div class="button pullbox1"><span class="big">Pull Stake + Reward</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS plus your reward GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap pullstakeunlock">
									<h3>Stake UNLOCKED</h3>
									<p>Staking has been unlocked, you can withdraw your staked GEMS early now with no rewards.</p>
									<div class="button pullbox1"><span class="big">Pull Stake</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>
							</div>
						</div>







						<div class="product-item box2">
							<div class="product-title">
								<h3>2 Week Stake</h3>
								<h4>30% APY Reward</h4>
                                
								<div class="info">30% APY rewarded in GEMS after locking period of 2 weeks, your GEMS plus reward are sent upon unlock.</div>
							</div>
							<div class="product-body" style="background: #b953b1;">

								<div class="strap connect">
									<h3>Connect your wallet to view product options</h3>
								</div>

								<div class="strap addstake">
									<h3>Add Stake</h3>
									<p>Specify how many GEMS you would like to stake, approve the GEMS spend transaction, then approve the staking transaction.</p>

									<input class="stake-amount" name="box2stake" id="box2stake" type="number" step="1" placeholder="Amount of GEMS to stake" min="10000000" max="400000000000" />
									<div class="button" id="approvebox2"><span class="big">Approve GEMS</span></div>

									<div class="loading-add-stake">
										<svg xmlns="http://www.w3.org/2000/svg" class="doing-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path fill="none" stroke="#fff" stroke-width="8" stroke-dasharray="138.55802124023438 118.03090698242187" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-linecap="round" style="transform:scale(.8);transform-origin:50px 50px"><animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="0;256.58892822265625;0"/></path></svg>
                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Please approve the staking transaction and await confirmation...</span>
										<span class="complete-label">Staking completed! Refresh this page to view your status.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap staked">
									<h3>Staked!</h3>
									<p>You have staked <span id="box2staked"></span> GEMS they will unlock (along with your <span id="box2reward"></span> reward GEMS) in <span id="box2seconds"></span></p>
								</div>

								<div class="strap pullstake">
									<h3>Pull Stake</h3>
									<p>The staking period is over! You can now withdraw your staked GEMS plus your reward GEMS!</p>
									<div class="button pullbox2"><span class="big">Pull Stake + Reward</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS plus your reward GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap pullstakeunlock">
									<h3>Stake UNLOCKED</h3>
									<p>Staking has been unlocked, you can withdraw your staked GEMS early now with no rewards.</p>
									<div class="button pullbox2"><span class="big">Pull Stake</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>
							</div>
						</div>



						<div class="product-item box3">
							<div class="product-title">
								<h3>4 Week Stake</h3>
								<h4>40% APY Reward</h4>
                                
								<div class="info">40% APY rewarded in GEMS after locking period of 4 weeks, your GEMS plus reward are sent upon unlock.</div>
							</div>
							<div class="product-body" style="background: #2faf57;">

								<div class="strap connect">
									<h3>Connect your wallet to view product options</h3>
								</div>

								<div class="strap addstake">
									<h3>Add Stake</h3>
									<p>Specify how many GEMS you would like to stake, approve the GEMS spend transaction, then approve the staking transaction.</p>

									<input class="stake-amount" name="box3stake" id="box3stake" type="number" step="1" placeholder="Amount of GEMS to stake" min="10000000" max="400000000000"/>
									<div class="button" id="approvebox3"><span class="big">Approve GEMS</span></div>

									<div class="loading-add-stake">
										<svg xmlns="http://www.w3.org/2000/svg" class="doing-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path fill="none" stroke="#fff" stroke-width="8" stroke-dasharray="138.55802124023438 118.03090698242187" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-linecap="round" style="transform:scale(.8);transform-origin:50px 50px"><animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="0;256.58892822265625;0"/></path></svg>
                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Please approve the staking transaction and await confirmation...</span>
										<span class="complete-label">Staking completed! Refresh this page to view your status.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap staked">
									<h3>Staked!</h3>
									<p>You have staked <span id="box3staked"></span> GEMS they will unlock (along with your <span id="box3reward"></span> reward GEMS) in <span id="box3seconds"></span></p>
								</div>

								<div class="strap pullstake">
									<h3>Pull Stake</h3>
									<p>The staking period is over! You can now withdraw your staked GEMS plus your reward GEMS!</p>
									<div class="button pullbox3"><span class="big">Pull Stake + Reward</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS plus your reward GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap pullstakeunlock">
									<h3>Stake UNLOCKED</h3>
									<p>Staking has been unlocked, you can withdraw your staked GEMS early now with no rewards.</p>
									<div class="button pullbox3"><span class="big">Pull Stake</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>
							</div>
						</div>



						<div class="product-item box4">
							<div class="product-title">
								<h3>4 Week Stake</h3>
								<h4>🔥 Reward Burn</h4>
                                
								<div class="info">50% APY with locking period of 4 weeks, your GEMS are returned to you and the reward GEMS are burnt upon unlock.</div>
							</div>
							<div class="product-body" style="background: #a12500;">

								<div class="strap connect">
									<h3>Connect your wallet to view product options</h3>
								</div>

								<div class="strap addstake">
									<h3>Add Stake</h3>
									<p>Specify how many GEMS you would like to stake, approve the GEMS spend transaction, then approve the staking transaction.</p>

									<input class="stake-amount" name="box4stake" id="box4stake" type="number" step="1" placeholder="Amount of GEMS to stake" min="10000000" max="400000000000"/>
									<div class="button" id="approvebox4"><span class="big">Approve GEMS</span></div>

									<div class="loading-add-stake">
										<svg xmlns="http://www.w3.org/2000/svg" class="doing-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path fill="none" stroke="#fff" stroke-width="8" stroke-dasharray="138.55802124023438 118.03090698242187" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-linecap="round" style="transform:scale(.8);transform-origin:50px 50px"><animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="1s" keyTimes="0;0.5;1" values="0;256.58892822265625;0"/></path></svg>
                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Please approve the staking transaction and await confirmation...</span>
										<span class="complete-label">Staking completed! Refresh this page to view your status.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap staked">
									<h3>Staked!</h3>
									<p>You have staked <span id="box4staked"></span> GEMS they will unlock in <span id="box4seconds"></span> and <span id="box4reward"></span> GEMS will also be burnt.</p>
								</div>

								<div class="strap pullstake">
									<h3>Pull Stake</h3>
									<p>The staking period is over! You can now withdraw your staked GEMS and get the bonfire lit for your own personal burn 🔥🔥🔥</p>
									<div class="button pullbox4"><span class="big">Pull Stake</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS have been sent to your wallet, and the reward GEMS have been 🔥🔥🔥 BURNT 🔥🔥🔥.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>

								<div class="strap pullstakeunlock">
									<h3>Stake UNLOCKED</h3>
									<p>Staking has been unlocked, you can withdraw your staked GEMS early now with no rewards.</p>
									<div class="button pullbox4"><span class="big">Pull Stake</span></div>
									<div class="loading-add-stake">                                        
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="load-stake" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
											<g transform="translate(50 50)">
											<g>
											<animateTransform attributeName="transform" type="rotate" values="0;45" keyTimes="0;1" dur="0.3759398496240602s" repeatCount="indefinite"></animateTransform><path d="M22.20360331117452 -6 L37.20360331117452 -6 L37.20360331117452 6 L22.20360331117452 6 A23 23 0 0 1 19.942959155226866 11.457677780988297 L19.942959155226866 11.457677780988297 L30.54956087302508 22.06427949878651 L22.06427949878651 30.54956087302508 L11.457677780988298 19.942959155226866 A23 23 0 0 1 6 22.20360331117452 L6 22.20360331117452 L6.000000000000001 37.20360331117452 L-5.9999999999999964 37.20360331117452 L-5.999999999999997 22.20360331117452 A23 23 0 0 1 -11.457677780988291 19.94295915522687 L-11.457677780988291 19.94295915522687 L-22.064279498786505 30.549560873025083 L-30.54956087302508 22.064279498786508 L-19.94295915522687 11.457677780988295 A23 23 0 0 1 -22.203603311174515 6.000000000000006 L-22.203603311174515 6.000000000000006 L-37.20360331117452 6.000000000000008 L-37.20360331117452 -5.999999999999999 L-22.20360331117452 -6.000000000000001 A23 23 0 0 1 -19.94295915522687 -11.457677780988291 L-19.94295915522687 -11.457677780988291 L-30.549560873025086 -22.064279498786505 L-22.06427949878651 -30.54956087302508 L-11.457677780988297 -19.942959155226866 A23 23 0 0 1 -6.000000000000007 -22.203603311174515 L-6.000000000000007 -22.203603311174515 L-6.00000000000001 -37.20360331117452 L5.999999999999997 -37.20360331117452 L6 -22.20360331117452 A23 23 0 0 1 11.45767778098829 -19.94295915522687 L11.45767778098829 -19.94295915522687 L22.0642794987865 -30.549560873025086 L30.54956087302508 -22.06427949878651 L19.942959155226866 -11.457677780988297 A23 23 0 0 1 22.203603311174515 -6.000000000000009 M0 -16A16 16 0 1 0 0 16 A16 16 0 1 0 0 -16" fill="#fff"></path></g></g>
										</svg>

										<span class="loading-label">Please approve the transaction and wait here for confirmation...</span>
										<span class="approved-label">Approval completed! Your staked GEMS have been sent to your wallet.</span>
										<span class="error-label">ERROR</span>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>

		<?php include '../token/footer.php'; ?>
        
		<script type="text/javascript" src="https://unpkg.com/web3@1.5.1/dist/web3.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
		<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>
		<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>

		<script src="https://token.gemcave.org/js/vendor/jquery.js"></script>
		<script src="/js/stake.js"></script>

		<?= $tracking ?>
        
	</body>
</html>

