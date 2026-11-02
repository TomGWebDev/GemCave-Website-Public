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

async function checkOwnership() {
	let randNo = Math.floor(Math.random() * 100000000000);
	let message = "Temporary login for GemCave Service (#" + randNo + ")";

	web3.eth.personal.sign(
		web3.utils.fromUtf8(message),
		accounts[0],
		function (err, theHash) {
			if (err) return console.error(err);

			var xmlhttpGem = new XMLHttpRequest();
			xmlhttpGem.open(
				"GET",
				"https://ragestar.co.uk/wallet-verify/?wallet=" +
					accounts[0] +
					"&msg=" +
					randNo +
					"&hash=" +
					theHash,
			);
			xmlhttpGem.send();

			// When server response has loaded
			xmlhttpGem.onreadystatechange = function () {
				if (xmlhttpGem.readyState == XMLHttpRequest.DONE) {
					if (xmlhttpGem.status == 200) {
						// Parse response
						var theRes = JSON.parse(xmlhttpGem.responseText);
						console.log(theRes);

						// Fail
						if (theRes.status == false) {
							return;
						}

						// Success
						if (theRes.status == true) {
							$(".prize-list").addClass("show");
							$(".prize-form").addClass("show");
							$("#mywal").val(accounts[0]);
							$("#mywals").val(accounts[0]);

							setTimeout(function () {
								$(".prize-item").each(function () {
									var theRow = $(this).data("rowid");
									var mWon = theRes.row.message[theRow][1];
									var theProC = theRes.row.message[theRow][2];
									var thePerc = theRes.row.message[theRow][3];
									var lefToWin = theRes.row.message[theRow][4];
									$(this).find(".proval").text(theProC);
									$(this).find(".twon").text(mWon);
									$(this).find(".leftot").text(lefToWin);
									$(this)
										.find(".progress")
										.css({ width: thePerc + "%" });
									$("#myconset").val(theRes.row.message.contact);

									if (mWon > 0) {
										$(this).find(".won").show();
									}
								});
							}, 800);

							return;
						}
					}
				}
			};
		},
	);
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
		$("#prizeconnect").hide();
		checkOwnership();
	} catch (e) {
		console.log(e);
		return;
	}
}

window.addEventListener("load", async () => {
	init();
	document.querySelector("#prizeconnect").addEventListener("click", onConnect);
});
