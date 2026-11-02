"use strict";

const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
const Fortmatic = window.Fortmatic;

var web3;
var web3Modal;
var provider;
var accounts;
var theCon;
var selectedAccount;

var isFullUnlock = false;

var abiS = [
	{ inputs: [], stateMutability: "nonpayable", type: "constructor" },
	{
		anonymous: false,
		inputs: [
			{
				indexed: true,
				internalType: "address",
				name: "previousOwner",
				type: "address",
			},
			{
				indexed: true,
				internalType: "address",
				name: "newOwner",
				type: "address",
			},
		],
		name: "OwnershipTransferred",
		type: "event",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "tokenAmount", type: "uint256" },
			{ internalType: "uint256", name: "boxNo", type: "uint256" },
		],
		name: "addStake",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "walletAddress", type: "address" },
		],
		name: "balanceOf",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box1Balance",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box1DepositDate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box1Enabled",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box1Rate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box1Time",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box2Balance",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box2DepositDate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box2Enabled",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box2Rate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box2Time",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box3Balance",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box3DepositDate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box3Enabled",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box3Rate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box3Time",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box4Balance",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "box4DepositDate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box4Enabled",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box4Rate",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "box4Time",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newBox1Status", type: "bool" }],
		name: "changeBox1Status",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newBox2Status", type: "bool" }],
		name: "changeBox2Status",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newBox3Status", type: "bool" }],
		name: "changeBox3Status",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newBox4Status", type: "bool" }],
		name: "changeBox4Status",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newFullUnlock", type: "bool" }],
		name: "changeFullUnlock",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "newMaxRewardDue", type: "uint256" },
		],
		name: "changeMaxRewardDue",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newMaxStake", type: "uint256" }],
		name: "changeMaxStake",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newMinStake", type: "uint256" }],
		name: "changeMinStake",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "fullUnlock",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "maxRewardDue",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "maxStake",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "minStake",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "owner",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "boxNo", type: "uint256" }],
		name: "pullStake",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "renounceOwnership",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "rewardCount",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "rewardCountDue",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "rewardWallet",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "walletAddress", type: "address" },
			{ internalType: "uint256", name: "boxNo", type: "uint256" },
		],
		name: "stakeAmount",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "walletAddress", type: "address" },
			{ internalType: "uint256", name: "boxNo", type: "uint256" },
		],
		name: "stakeUnlockTime",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "stakeWallet",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "tokenAddress",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "totalStaked",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "newOwner", type: "address" }],
		name: "transferOwnership",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
];

function timeShow(date_future) {
	var date_now = new Date().getTime() / 1000;

	// get total seconds between the times
	var delta = Math.abs(date_future - date_now);

	// calculate (and subtract) whole days
	var days = Math.floor(delta / 86400);
	delta -= days * 86400;

	// calculate (and subtract) whole hours
	var hours = Math.floor(delta / 3600) % 24;
	delta -= hours * 3600;

	// calculate (and subtract) whole minutes
	var minutes = Math.floor(delta / 60) % 60;
	delta -= minutes * 60;

	var buildStr = "";

	if (days > 1) {
		buildStr = days + " days ";
	}
	if (hours > 1) {
		buildStr = buildStr + hours + " hours ";
	}
	if (minutes > 1) {
		buildStr = buildStr + minutes + " minutes ";
	}

	return buildStr;
}

function init() {
	const providerOptions = {
		walletconnect: {
			package: WalletConnectProvider,
			options: {
				rpc: {
					56: "https://bsc-dataseed1.binance.org/",
				},
				chainId: 56,
				network: "binance",
				infuraId: "907d6d09fffd44679119eb1f583ec28b",
			},
		},
	};

	try {
		web3Modal = new Web3Modal({
			cacheProvider: false,
			providerOptions,
			disableInjectedProvider: false,
			network: "binance",
		});
	} catch (e) {
		console.log(e);
		return;
	}
}

async function getStakeInfo() {
	var stakeContract = new web3.eth.Contract(
		abiS,
		"0x0000000000000000000000000000000000000000",
	);

	stakeContract.methods
		.totalStaked()
		.call({
			from: accounts[0],
		})
		.then(function (result) {
			// APPROVED SUCCESS
			if (result) {
				var tokenAm = result.slice(0, -9);
				$("#curstaked").text(numberWithCommas(tokenAm));
			}
		});

	stakeContract.methods
		.rewardCount()
		.call({
			from: accounts[0],
		})
		.then(function (result) {
			// APPROVED SUCCESS
			if (result) {
				var tokenAm = result.slice(0, -9);
				$("#rewardspaid").text(numberWithCommas(tokenAm));
			}
		});

	stakeContract.methods
		.rewardCountDue()
		.call({
			from: accounts[0],
		})
		.then(function (result) {
			// APPROVED SUCCESS
			if (result) {
				var tokenAm = result.slice(0, -9);
				$("#rewardspending").text(numberWithCommas(tokenAm));
			}
		});

	stakeContract.methods
		.balanceOf(accounts[0])
		.call({
			from: accounts[0],
		})
		.then(function (result) {
			// APPROVED SUCCESS
			if (result) {
				var tokenAm = result.slice(0, -9);
				$("#mybaltotol").text(numberWithCommas(tokenAm));
			}
		});

	stakeContract.methods
		.fullUnlock()
		.call({
			from: accounts[0],
		})
		.then(function (result) {
			isFullUnlock = result;
			console.log(isFullUnlock);

			checkStakes();
		});
}

async function approveBox(boxNo) {
	var stakeContract = new web3.eth.Contract(
		abiS,
		"0x0000000000000000000000000000000000000000",
	);

	var abi = [
		{
			inputs: [
				{
					internalType: "address",
					name: "spender",
					type: "address",
				},
				{
					internalType: "uint256",
					name: "amount",
					type: "uint256",
				},
			],
			name: "approve",
			outputs: [],
			stateMutability: "nonpayable",
			type: "function",
		},
	];
	var tokenContract = new web3.eth.Contract(
		abi,
		"0x0000000000000000000000000000000000000000",
	);

	// Get amount of GEMS to approve
	var approveAmountVal = parseInt($("#box" + boxNo + "stake").val());
	var approveAmount = approveAmountVal.toString().concat("000000000"); // Add 9 decimals

	if (approveAmountVal < 10000000) {
		$(".product-item.box" + boxNo + " .addstake .load-stake").removeClass(
			"show",
		);
		$(".product-item.box" + boxNo + " .addstake .loading-add-stake").show();
		$(".product-item.box" + boxNo + " .addstake .error-label").text(
			"You must stake at least 10,000,000 GEMS",
		);
		$(".product-item.box" + boxNo + " .addstake .error-label").addClass("show");
		return;
	}

	if (approveAmountVal > 400000000000) {
		$(".product-item.box" + boxNo + " .addstake .load-stake").removeClass(
			"show",
		);
		$(".product-item.box" + boxNo + " .addstake .loading-add-stake").show();
		$(".product-item.box" + boxNo + " .addstake .error-label").text(
			"Maximum stake amount is currently  400,000,000,000 GEMS",
		);
		$(".product-item.box" + boxNo + " .addstake .error-label").addClass("show");
		return;
	}

	if (!Number.isInteger(approveAmountVal)) {
		$(".product-item.box" + boxNo + " .addstake .load-stake").removeClass(
			"show",
		);
		$(".product-item.box" + boxNo + " .addstake .loading-add-stake").show();
		$(".product-item.box" + boxNo + " .addstake .error-label").text(
			"Input round number of GEMS only - no decimals",
		);
		$(".product-item.box" + boxNo + " .addstake .error-label").addClass("show");
		return;
	}

	// Hide add staking form
	$(".product-item.box" + boxNo + " .addstake .stake-amount").hide();
	$(".product-item.box" + boxNo + " .addstake #approvebox" + boxNo).hide();
	$(".product-item.box" + boxNo + " .addstake .error-label").removeClass(
		"show",
	);

	// Show approval loading
	$(".product-item.box" + boxNo + " .addstake .loading-add-stake").show();
	$(".product-item.box" + boxNo + " .addstake .loading-label").addClass("show");
	$(".product-item.box" + boxNo + " .addstake .load-stake").addClass("show");

	// Trigger approval
	tokenContract.methods
		.approve("0x0000000000000000000000000000000000000000", approveAmount)
		.send({
			from: accounts[0],
		})
		.then(function (result) {
			// APPROVED SUCCESS
			if (result) {
				$(".product-item.box" + boxNo + " .addstake .loading-label").hide();
				$(".product-item.box" + boxNo + " .addstake .doing-stake").addClass(
					"show",
				);
				$(".product-item.box" + boxNo + " .addstake .load-stake").hide();
				$(".product-item.box" + boxNo + " .addstake .approved-label").addClass(
					"show",
				);

				// Trigger staking function
				stakeContract.methods
					.addStake(approveAmount, boxNo)
					.send({
						from: accounts[0],
					})
					.then(function (result) {
						// STAKING SUCCESS
						$(".product-item.box" + boxNo + " .addstake .doing-stake").hide();
						$(
							".product-item.box" + boxNo + " .addstake .approved-label",
						).hide();
						$(
							".product-item.box" + boxNo + " .addstake .complete-label",
						).addClass("show");

						var xmlhttp = new XMLHttpRequest();
						xmlhttp.open(
							"GET",
							"stakedone?w=" +
								accounts[0] +
								"&a=" +
								approveAmount +
								"&p=" +
								boxNo,
							true,
						);
						xmlhttp.send();
					})
					.catch(function (error) {
						// STAKING FAIL
						$(".product-item.box" + boxNo + " .addstake .load-stake").hide();
						$(".product-item.box" + boxNo + " .addstake .loading-label").hide();
						$(".product-item.box" + boxNo + " .addstake .doing-stake").hide();
						$(
							".product-item.box" + boxNo + " .addstake .approved-label",
						).hide();
						$(".product-item.box" + boxNo + " .addstake .error-label").text(
							error.message,
						);
						$(".product-item.box" + boxNo + " .addstake .error-label").addClass(
							"show",
						);
					});
			}
		})
		.catch(function (error) {
			console.log("error");
			console.log(error);

			// APPROVED FAIL
			$(".product-item.box" + boxNo + " .addstake .load-stake").hide();
			$(".product-item.box" + boxNo + " .addstake .loading-label").hide();
			$(".product-item.box" + boxNo + " .addstake .error-label").text(
				error.message,
			);
			$(".product-item.box" + boxNo + " .addstake .error-label").addClass(
				"show",
			);
		});
}

async function pullBox(boxNo) {
	var stakeContract = new web3.eth.Contract(
		abiS,
		"0x0000000000000000000000000000000000000000",
	);

	// Hide pull staking form
	$(".product-item.box" + boxNo + " .pullstake #pullbox" + boxNo).hide();

	// Show approval loading
	$(".product-item.box" + boxNo + " .pullstake .loading-add-stake").show();
	$(".product-item.box" + boxNo + " .pullstake .loading-label").addClass(
		"show",
	);

	// Trigger pull
	stakeContract.methods
		.pullStake(boxNo)
		.send({
			from: accounts[0],
		})
		.then(function (result) {
			// pull SUCCESS
			if (result) {
				$(".product-item.box" + boxNo + " .pullstake .loading-label").hide();
				$(".product-item.box" + boxNo + " .pullstake .load-stake").hide();
				$(".product-item.box" + boxNo + " .pullstake .approved-label").addClass(
					"show",
				);
			}
		})
		.catch(function (error) {
			console.log("error");
			console.log(error);

			// pull FAIL
			$(".product-item.box" + boxNo + " .pullstake .error-label").text(
				error.message,
			);
			$(".product-item.box" + boxNo + " .pullstake .error-label").addClass(
				"show",
			);
		});
}

function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

async function checkStakes() {
	var nowT = new Date().getTime() / 1000;
	var stakeContract = new web3.eth.Contract(
		abiS,
		"0x0000000000000000000000000000000000000000",
	);

	// BOX 1
	// Check my staked in box 1
	stakeContract.methods
		.box1Balance(accounts[0])
		.call()
		.then(function (result) {
			// Box 1 staked
			if (result > 0 && !isFullUnlock) {
				var tokenAm = result.slice(0, -9);
				$("#box1staked").text(numberWithCommas(parseInt(tokenAm)));

				stakeContract.methods
					.stakeUnlockTime(accounts[0], 1)
					.call()
					.then(function (resultT) {
						$("#box1seconds").text(timeShow(parseInt(resultT)));
						$("#box1reward").text(numberWithCommas(parseInt(tokenAm) / 333));

						// Staking time not over yet
						if (resultT > nowT) {
							$(".product-item.box1 .strap.connect").hide();
							$(".product-item.box1 .strap.staked").addClass("show");
							// Staking time over!
						} else {
							$(".product-item.box1 .strap.connect").hide();
							$(".product-item.box1 .strap.pullstake").addClass("show");
						}
					});

				return;
			}

			// Box 1 NOT staked
			if (result == 0 && !isFullUnlock) {
				$(".product-item.box1 .strap.connect").hide();
				$(".product-item.box1 .strap.addstake").addClass("show");

				return;
			}

			// Box 1 staked - BUT UNLOCKED MODE ON
			if (result > 0 && isFullUnlock) {
				$(".product-item.box1 .strap.connect").hide();
				$(".product-item.box1 .strap.pullstakeunlock").addClass("show");

				return;
			}

			// Box 1 NOT staked - BUT UNLOCKED MODE ON
			if (result == 0 && isFullUnlock) {
				$(".product-item.box1 .strap.connect").hide();
				return;
			}
		});
	stakeContract.methods
		.box2Balance(accounts[0])
		.call()
		.then(function (result) {
			// Box 2 staked
			if (result > 0 && !isFullUnlock) {
				var tokenAm = result.slice(0, -9);
				$("#box2staked").text(numberWithCommas(parseInt(tokenAm)));

				stakeContract.methods
					.stakeUnlockTime(accounts[0], 2)
					.call()
					.then(function (resultT) {
						$("#box2seconds").text(timeShow(parseInt(resultT)));
						$("#box2reward").text(numberWithCommas(parseInt(tokenAm) / 83));

						// Staking time not over yet
						if (resultT > nowT) {
							$(".product-item.box2 .strap.connect").hide();
							$(".product-item.box2 .strap.staked").addClass("show");
							// Staking time over!
						} else {
							$(".product-item.box2 .strap.connect").hide();
							$(".product-item.box2 .strap.pullstake").addClass("show");
						}
					});

				return;
			}

			// Box 2 NOT staked
			if (result == 0 && !isFullUnlock) {
				$(".product-item.box2 .strap.connect").hide();
				$(".product-item.box2 .strap.addstake").addClass("show");

				return;
			}

			// Box 2 staked - BUT UNLOCKED MODE ON
			if (result > 0 && isFullUnlock) {
				$(".product-item.box2 .strap.connect").hide();
				$(".product-item.box2 .strap.pullstakeunlock").addClass("show");

				return;
			}

			// Box 2 NOT staked - BUT UNLOCKED MODE ON
			if (result == 0 && isFullUnlock) {
				$(".product-item.box2 .strap.connect").hide();
				return;
			}
		});
	stakeContract.methods
		.box3Balance(accounts[0])
		.call()
		.then(function (result) {
			// Box 3 staked
			if (result > 0 && !isFullUnlock) {
				var tokenAm = result.slice(0, -9);
				$("#box3staked").text(numberWithCommas(parseInt(tokenAm)));

				stakeContract.methods
					.stakeUnlockTime(accounts[0], 3)
					.call()
					.then(function (resultT) {
						$("#box3seconds").text(timeShow(parseInt(resultT)));
						$("#box3reward").text(numberWithCommas(parseInt(tokenAm) / 32));

						// Staking time not over yet
						if (resultT > nowT) {
							$(".product-item.box3 .strap.connect").hide();
							$(".product-item.box3 .strap.staked").addClass("show");
							// Staking time over!
						} else {
							$(".product-item.box3 .strap.connect").hide();
							$(".product-item.box3 .strap.pullstake").addClass("show");
						}
					});

				return;
			}

			// Box 3 NOT staked
			if (result == 0 && !isFullUnlock) {
				$(".product-item.box3 .strap.connect").hide();
				$(".product-item.box3 .strap.addstake").addClass("show");

				return;
			}

			// Box 3 staked - BUT UNLOCKED MODE ON
			if (result > 0 && isFullUnlock) {
				$(".product-item.box3 .strap.connect").hide();
				$(".product-item.box3 .strap.pullstakeunlock").addClass("show");

				return;
			}

			// Box 3 NOT staked - BUT UNLOCKED MODE ON
			if (result == 0 && isFullUnlock) {
				$(".product-item.box3 .strap.connect").hide();
				return;
			}
		});
	stakeContract.methods
		.box4Balance(accounts[0])
		.call()
		.then(function (result) {
			// Box 4 staked
			if (result > 0 && !isFullUnlock) {
				var tokenAm = result.slice(0, -9);
				$("#box4staked").text(numberWithCommas(parseInt(tokenAm)));

				stakeContract.methods
					.stakeUnlockTime(accounts[0], 4)
					.call()
					.then(function (resultT) {
						$("#box4seconds").text(timeShow(parseInt(resultT)));
						$("#box4reward").text(numberWithCommas(parseInt(tokenAm) / 26));

						// Staking time not over yet
						if (resultT > nowT) {
							$(".product-item.box4 .strap.connect").hide();
							$(".product-item.box4 .strap.staked").addClass("show");
							// Staking time over!
						} else {
							$(".product-item.box4 .strap.connect").hide();
							$(".product-item.box4 .strap.pullstake").addClass("show");
						}
					});

				return;
			}

			// Box 4 NOT staked
			if (result == 0 && !isFullUnlock) {
				$(".product-item.box4 .strap.connect").hide();
				$(".product-item.box4 .strap.addstake").addClass("show");

				return;
			}

			// Box 4 staked - BUT UNLOCKED MODE ON
			if (result > 0 && isFullUnlock) {
				$(".product-item.box4 .strap.connect").hide();
				$(".product-item.box4 .strap.pullstakeunlock").addClass("show");

				return;
			}

			// Box 4 NOT staked - BUT UNLOCKED MODE ON
			if (result == 0 && isFullUnlock) {
				$(".product-item.box4 .strap.connect").hide();
				return;
			}
		});
}

async function onConnect() {
	// Create Web3Modal connection
	try {
		provider = await web3Modal.connect();
	} catch (e) {
		console.log(e);
		return;
	}

	// Connect to Web3 provider
	try {
		web3 = new Web3(provider);
	} catch (e) {
		console.log(e);
		return;
	}

	// Connect to Web3 provider
	try {
		accounts = await web3.eth.getAccounts();
		$("#connectstake").hide();
		getStakeInfo();
	} catch (e) {
		console.log(e);
		return;
	}
}

window.addEventListener("load", async () => {
	init();
	var i;

	document.querySelector("#connectstake").addEventListener("click", onConnect);

	document.querySelector("#approvebox1").addEventListener("click", function () {
		approveBox("1");
	});
	var pb1 = document.querySelectorAll(".pullbox1");
	for (i = 0; i < pb1.length; ++i) {
		pb1[i].addEventListener("click", function () {
			pullBox("1");
		});
	}

	document.querySelector("#approvebox2").addEventListener("click", function () {
		approveBox("2");
	});
	var pb2 = document.querySelectorAll(".pullbox2");
	for (i = 0; i < pb2.length; ++i) {
		pb2[i].addEventListener("click", function () {
			pullBox("2");
		});
	}

	document.querySelector("#approvebox3").addEventListener("click", function () {
		approveBox("3");
	});
	var pb3 = document.querySelectorAll(".pullbox3");
	for (i = 0; i < pb3.length; ++i) {
		pb3[i].addEventListener("click", function () {
			pullBox("3");
		});
	}

	document.querySelector("#approvebox4").addEventListener("click", function () {
		approveBox("4");
	});
	var pb4 = document.querySelectorAll(".pullbox4");
	for (i = 0; i < pb4.length; ++i) {
		pb4[i].addEventListener("click", function () {
			pullBox("4");
		});
	}
});
