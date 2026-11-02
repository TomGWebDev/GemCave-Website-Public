"use strict";

const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
const Fortmatic = window.Fortmatic;

var web3;
var web3Modal;
var provider;
var accounts;
var theCon;
var theNFTCon;
var selectedAccount;

var msgWaitMint;
var msgWalletError;
var msgMintError;
var msgBuyError;
var msgMintComplete;

var minTokenToMint = 5000000000;

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
			},
		},
	};

	try {
		web3Modal = new Web3Modal({
			cacheProvider: true, // optional
			providerOptions,
			disableInjectedProvider: false,
			network: "binance",
		});
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}
}

function number_format(number, decimals, dec_point, thousands_sep) {
	// Strip all characters but numerical ones.
	number = (number + "").replace(/[^0-9+\-Ee.]/g, "");
	var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
		dec = typeof dec_point === "undefined" ? "." : dec_point,
		s = "",
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return "" + Math.round(n * k) / k;
		};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || "").length < prec) {
		s[1] = s[1] || "";
		s[1] += new Array(prec - s[1].length + 1).join("0");
	}
	return s.join(dec);
}

async function checkBalance() {
	theCon = new web3.eth.Contract(
		[
			{
				inputs: [{ name: "_owner", type: "address" }],
				name: "balanceOf",
				outputs: [{ name: "balance", type: "uint256" }],
				stateMutability: "nonpayable",
				type: "function",
			},
			{
				inputs: [{ name: "account", type: "address" }],
				name: "getNFTCredits",
				outputs: [{ name: "credits", type: "uint256" }],
				stateMutability: "nonpayable",
				type: "function",
			},
			{
				inputs: [{ name: "account", type: "address" }],
				name: "getClubPayoutTally",
				outputs: [{ name: "credits", type: "uint256" }],
				stateMutability: "nonpayable",
				type: "function",
			},
		],
		"0x0000000000000000000000000000000000000000",
	);

	// send transaction
	var bresult = await theCon.methods
		.balanceOf(accounts[0])
		.call({ from: accounts[0] });
	var cresult = await theCon.methods
		.getNFTCredits(accounts[0])
		.call({ from: accounts[0] });
	var tresult = await theCon.methods
		.getClubPayoutTally(accounts[0])
		.call({ from: accounts[0] });
	if (bresult > 0) {
		bresult = parseInt(
			bresult.toString().substr(0, bresult.toString().length - 9),
		);
	}
	if (tresult > 0) {
		tresult = parseInt(
			tresult.toString().substr(0, tresult.toString().length - 9),
		);
	}

	var lvl = document.getElementById("lvl");
	lvl.style.display = "block";
	var lvltitle = document.getElementsByClassName("lvltitle")[0];
	lvltitle.innerText = "Regular gem weight odds";
	var lvldesc = document.getElementsByClassName("lvldesc")[0];
	lvldesc.innerText =
		"You have regular gem weight odds. Recieve " +
		number_format(parseInt(1000000000 - tresult)) +
		" more GEMS for free via Gem Reward Payouts to get upgraded odds.";

	if (parseInt(tresult) >= 1000000000) {
		lvltitle.innerText = "XL gem weight odds!";
		lvldesc.innerText =
			"You have upgraded odds of getting XL gems! Recieve " +
			number_format(parseInt(50000000000 - tresult)) +
			" more GEMS for free via Gem Reward Payouts to unlock XXL.";
	}
	if (parseInt(tresult) >= 50000000000) {
		lvltitle.innerText = "XXL Upgraded size odds!";
		lvldesc.innerText = "You have unlocked max level weight odds!!";
	}

	if (parseInt(bresult) >= minTokenToMint) {
		return true;
	} else {
		if (parseInt(cresult) > 0) {
			return true;
		} else {
			return false;
		}
	}
}

async function doMint() {
	// Create NFT contract mint function
	try {
		theNFTCon = new web3.eth.Contract(
			[
				{
					inputs: [],
					name: "mint",
					outputs: [],
					stateMutability: "nonpayable",
					type: "function",
				},
			],
			"0x0000000000000000000000000000000000000000",
		);

		// Hide mint button
		var animation9 = document.getElementById("buttonaway");
		animation9.beginElement();

		// Animate axe
		var animation3 = document.getElementById("axegorot");
		animation3.beginElement();

		msgWalletError.style.display = "none";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";
		msgWaitMint.style.display = "block";
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "block";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}

	// Call the NFT Mint function
	try {
		var mintResult = await theNFTCon.methods.mint().send({ from: accounts[0] });

		if (
			mintResult["events"][0]["address"] ==
			"0x0000000000000000000000000000000000000000"
		) {
			var theTokenID = parseInt(
				mintResult["events"][0]["raw"]["topics"][3],
				16,
			);
		}
		if (typeof mintResult["events"][1] !== "undefined") {
			if (
				mintResult["events"][1]["address"] ==
				"0x0000000000000000000000000000000000000000"
			) {
				var theTokenID = parseInt(
					mintResult["events"][1]["raw"]["topics"][3],
					16,
				);
			}
		}
		if (typeof mintResult["events"][2] !== "undefined") {
			if (
				mintResult["events"][2]["address"] ==
				"0x0000000000000000000000000000000000000000"
			) {
				var theTokenID = parseInt(
					mintResult["events"][2]["raw"]["topics"][3],
					16,
				);
			}
		}

		$(
			'<iframe src="https://nft.gemcave.org/viewonly.php?id=' +
				theTokenID +
				'"></iframe>',
		).prependTo("#mynft");

		$(".trade-1").attr(
			"href",
			"https://tofunft.com/nft/bsc/0x0000000000000000000000000000000000000000/" +
				theTokenID,
		);
		$(".trade-2").attr(
			"href",
			"https://nftrade.com/assets/bsc/0x0000000000000000000000000000000000000000/" +
				theTokenID,
		);
		$(".trade-3").attr(
			"href",
			"https://www.element.market/assets/bsc/0x0000000000000000000000000000000000000000/" +
				theTokenID,
		);

		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

		msgMintComplete.style.display = "block";

		return;
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "block";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}
}

async function onConnect() {
	var mainbutton = document.getElementById("mainbutton");

	// Create Web3Modal connection
	try {
		provider = await web3Modal.connect();
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}

	// Connect to Web3 provider
	try {
		web3 = new Web3(provider);
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}

	// Connect to Web3 provider
	try {
		accounts = await web3.eth.getAccounts();
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

		console.log(e);
		return;
	}

	// Check connected wallet balance
	if (await checkBalance()) {
		var animation = document.getElementById("axego");
		var animation2 = document.getElementById("gemgo");
		var animation4 = document.getElementById("buttonsmall");
		var animation5 = document.getElementById("buttonbig");

		animation.beginElement();
		animation2.beginElement();
		animation4.beginElement();
		animation5.beginElement();

		mainbutton.style.height = "370px";

		return;
	} else {
		mainbutton.style.display = "none";

		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "block";

		return;
	}
}

window.addEventListener("load", async () => {
	init();

	msgWaitMint = document.getElementById("waitmint");
	msgWalletError = document.getElementById("errorwallet");
	msgMintError = document.getElementById("errormint");
	msgBuyError = document.getElementById("errorbuy");
	msgMintComplete = document.getElementById("donemint");
});
