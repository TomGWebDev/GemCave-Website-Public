"use strict";

const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
const Fortmatic = window.Fortmatic;

var web3;
var web3Modal;
var provider;
var accounts;

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
	} catch (e) {
		console.log(e);
		return;
	}

	document.querySelector(".walletid").innerHTML = accounts[0];
	document.querySelector(".button-connect").remove();

	rollPrize();
}

async function rollPrize() {
	$(".spin-deg").text("0");
	$("#inner-spin").text("GO");
	$(".dialog").removeClass("show");
	$("#inner-spin").removeClass("done");
	$(".dialog-message").html("");

	var xmlhttp = new XMLHttpRequest();
	var walletId = document.querySelector(".walletid").innerHTML;
	xmlhttp.open("GET", "wheel-backend.php?wid=" + walletId, true);
	xmlhttp.send();

	// When server response has loaded
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == XMLHttpRequest.DONE) {
			if (xmlhttp.status == 200) {
				// Parse response
				var theRes = JSON.parse(xmlhttp.responseText);

				// Fail
				if (theRes.status == "false") {
					$(".instru").show();

					document.querySelector(".prize-club").classList.remove("on");
					document.querySelector(".message").innerHTML = theRes.message;
					document.querySelector(".plays-more").innerHTML = "0";

					if (theRes.credit == 1) {
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}
					if (theRes.credit == 2) {
						document.querySelector(".badge-club").classList.remove("badge-off");
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}
					if (theRes.credit == 3) {
						document.querySelector(".badge-club").classList.remove("badge-off");
						document
							.querySelector(".badge-super")
							.classList.remove("badge-off");
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}

					return;
				}

				// Success
				if (theRes.status == "true" && theRes.playno > 0) {
					$(".instru").hide();

					$("#spin").removeClass("off");
					document.querySelector("#game").classList.add("on");
					document.querySelector("#wheel").classList.add("on");
					document.querySelector(".plays-more").innerHTML = theRes.playno;

					if (theRes.prize == "0") {
						$(".spin-deg").html("0");
					} else {
						$(".spin-deg").html(theRes.prize);
					}

					document.querySelector(".prize-club").classList.add("on");

					if (theRes.credit == 1) {
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}
					if (theRes.credit == 2) {
						document.querySelector(".badge-club").classList.remove("badge-off");
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}
					if (theRes.credit == 3) {
						document.querySelector(".badge-club").classList.remove("badge-off");
						document
							.querySelector(".badge-super")
							.classList.remove("badge-off");
						document.querySelector(".badge-hold").classList.remove("badge-off");
					}
				}
			}
		}
	};
}

window.addEventListener("load", async () => {
	init();

	document
		.querySelector(".button-connect")
		.addEventListener("click", onConnect);
	document.querySelector(".tryagain").addEventListener("click", rollPrize);
});
