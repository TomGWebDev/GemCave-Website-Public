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

var minTokenToMint = 5000000000;

var abiS = [
	{ inputs: [], stateMutability: "nonpayable", type: "constructor" },
	{
		anonymous: false,
		inputs: [
			{
				indexed: true,
				internalType: "address",
				name: "owner",
				type: "address",
			},
			{
				indexed: true,
				internalType: "address",
				name: "approved",
				type: "address",
			},
			{
				indexed: true,
				internalType: "uint256",
				name: "tokenId",
				type: "uint256",
			},
		],
		name: "Approval",
		type: "event",
	},
	{
		anonymous: false,
		inputs: [
			{
				indexed: true,
				internalType: "address",
				name: "owner",
				type: "address",
			},
			{
				indexed: true,
				internalType: "address",
				name: "operator",
				type: "address",
			},
			{ indexed: false, internalType: "bool", name: "approved", type: "bool" },
		],
		name: "ApprovalForAll",
		type: "event",
	},
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
		anonymous: false,
		inputs: [
			{
				indexed: false,
				internalType: "string",
				name: "_value",
				type: "string",
			},
			{ indexed: true, internalType: "uint256", name: "_id", type: "uint256" },
		],
		name: "PermanentURI",
		type: "event",
	},
	{
		anonymous: false,
		inputs: [
			{ indexed: true, internalType: "address", name: "from", type: "address" },
			{ indexed: true, internalType: "address", name: "to", type: "address" },
			{
				indexed: true,
				internalType: "uint256",
				name: "tokenId",
				type: "uint256",
			},
		],
		name: "Transfer",
		type: "event",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "", type: "uint256" },
			{ internalType: "uint256", name: "", type: "uint256" },
		],
		name: "accessorySet",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "walletAddress", type: "address" },
		],
		name: "addToWhitelist",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "to", type: "address" },
			{ internalType: "uint256", name: "tokenId", type: "uint256" },
		],
		name: "approve",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		name: "avatarTitles",
		outputs: [{ internalType: "string", name: "", type: "string" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "owner", type: "address" }],
		name: "balanceOf",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "accessoryId", type: "uint256" },
			{ internalType: "uint256", name: "avatarId", type: "uint256" },
		],
		name: "changeAccessorySet",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "accessoryId", type: "uint256" },
			{ internalType: "uint256", name: "avatarId", type: "uint256" },
		],
		name: "changeAvatarAccessory",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "string", name: "newURL", type: "string" }],
		name: "changeExtURL",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "string", name: "newExtraAttributes", type: "string" },
		],
		name: "changeExtraAttributes",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "newRec", type: "address" }],
		name: "changeFeeRec",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newCost", type: "uint256" }],
		name: "changeMintCost",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "isWhitelistOnly", type: "bool" }],
		name: "changeWhitelistOnly",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "contractURI",
		outputs: [{ internalType: "string", name: "", type: "string" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "tokenId", type: "uint256" }],
		name: "getApproved",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "owner", type: "address" },
			{ internalType: "address", name: "operator", type: "address" },
		],
		name: "isApprovedForAll",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "mint",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address[]", name: "walletAddress", type: "address[]" },
		],
		name: "mintFor",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "name",
		outputs: [{ internalType: "string", name: "", type: "string" }],
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
		inputs: [{ internalType: "uint256", name: "tokenId", type: "uint256" }],
		name: "ownerOf",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "accessoryId", type: "uint256" },
			{ internalType: "uint256", name: "avatarId", type: "uint256" },
		],
		name: "removeAccessorySet",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "walletAddress", type: "address" },
		],
		name: "removeFromWhitelist",
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
		inputs: [
			{ internalType: "address", name: "from", type: "address" },
			{ internalType: "address", name: "to", type: "address" },
			{ internalType: "uint256", name: "tokenId", type: "uint256" },
		],
		name: "safeTransferFrom",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "from", type: "address" },
			{ internalType: "address", name: "to", type: "address" },
			{ internalType: "uint256", name: "tokenId", type: "uint256" },
			{ internalType: "bytes", name: "_data", type: "bytes" },
		],
		name: "safeTransferFrom",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "operator", type: "address" },
			{ internalType: "bool", name: "approved", type: "bool" },
		],
		name: "setApprovalForAll",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bytes4", name: "interfaceId", type: "bytes4" }],
		name: "supportsInterface",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "symbol",
		outputs: [{ internalType: "string", name: "", type: "string" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "index", type: "uint256" }],
		name: "tokenByIndex",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "owner", type: "address" },
			{ internalType: "uint256", name: "index", type: "uint256" },
		],
		name: "tokenOfOwnerByIndex",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "tokenId", type: "uint256" }],
		name: "tokenSVG",
		outputs: [{ internalType: "string", name: "", type: "string" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "tokenId", type: "uint256" }],
		name: "tokenURI",
		outputs: [{ internalType: "string", name: "", type: "string" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "totalSupply",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "from", type: "address" },
			{ internalType: "address", name: "to", type: "address" },
			{ internalType: "uint256", name: "tokenId", type: "uint256" },
		],
		name: "transferFrom",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "newOwner", type: "address" }],
		name: "transferOwnership",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "", type: "address" }],
		name: "whitelist",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
];

function isNumeric(str) {
	if (typeof str != "string") return false; // we only process strings!
	return (
		!isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
		!isNaN(parseFloat(str))
	); // ...and ensure strings of whitespace fail
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

async function getNFT() {
	var lastToken;

	document.querySelector(".message").innerHTML =
		"Checking for Avatar NFT, please wait...";

	// Create NFT contract
	try {
		theNFTCon = new web3.eth.Contract(
			abiS,
			"0x0000000000000000000000000000000000000000",
		);
	} catch (e) {
		console.log(e);
		return;
	}

	// Get owners NFTS
	try {
		var tokensResult = await theNFTCon.methods
			.tokenOfOwnerByIndex(accounts[0], 0)
			.call({ from: accounts[0] });

		if (isNumeric(tokensResult)) {
			lastToken = tokensResult;
		}
	} catch (e) {}

	// Get owners newest NFT
	try {
		var nftResult = await theNFTCon.methods
			.tokenSVG(lastToken)
			.call({ from: accounts[0] });
		document.querySelector("#myNFT").innerHTML = nftResult;
		document.querySelector(".badge-nft").classList.remove("badge-off");

		$(".instru").text("NFT found - enabled bonus!");
	} catch (e) {
		$(".instru").text("No NFT found");
	}
}

async function onConnect() {
	document.querySelector(".message").innerHTML = "Connecting to wallet...";

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

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "grabber-backend?wid=" + accounts[0], true);
	xmlhttp.send();

	var nftCont = document.querySelector("#myNFT");

	// When server response has loaded
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == XMLHttpRequest.DONE) {
			if (xmlhttp.status == 200) {
				document.querySelector(".button-connect").remove();

				// Parse response
				var theRes = JSON.parse(xmlhttp.responseText);

				// Fail
				if (theRes.status == "false") {
					document.querySelector(".message").innerHTML = theRes.message;
					document.querySelector(".badge-off").classList.add("on");

					return;
				}

				// Success
				if (theRes.status == "true") {
					nftCont.dataset.playno = theRes.playno;
					nftCont.dataset.maxBig = theRes.maxBig;
					nftCont.dataset.maxSmall = theRes.maxSmall;

					document.querySelector("#grabber").classList.add("on");
					document.querySelector(".plays-more").innerHTML = theRes.playno;
					var connecEv = new Event("addPrizes");
					nftCont.dispatchEvent(connecEv);

					document.querySelector(".badge-none").classList.add("badge-off");
					document.querySelector(".prize-club").classList.add("on");
					document.querySelector(".badge-hold").classList.remove("badge-off");

					if (theRes.credit == "2") {
						document.querySelector(".badge-club").classList.remove("badge-off");
					}
					if (theRes.credit == "3") {
						document.querySelector(".badge-club").classList.remove("badge-off");
						document
							.querySelector(".badge-super")
							.classList.remove("badge-off");
					}
				}
			}
		}
	};

	await getNFT();

	var texloadedEv = new Event("texloaded");
	nftCont.dispatchEvent(texloadedEv);
}

window.addEventListener("keydown", function (e) {
	if (e.keyCode == 32 && e.target == document.body) {
		e.preventDefault();
	}
});

window.addEventListener("load", async () => {
	init();

	document
		.querySelector(".button-connect")
		.addEventListener("click", onConnect);
});
