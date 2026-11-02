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
var avatarContract;

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

async function getAvatar() {
	try {
		avatarContract.methods
			.balanceOf(accounts[0])
			.call({
				from: accounts[0],
			})
			.then(function (myBalance) {
				if (myBalance) {
					var myNFTIDs = [];

					for (let i = 0; i < myBalance; i++) {
						avatarContract.methods
							.tokenOfOwnerByIndex(accounts[0], i)
							.call({
								from: accounts[0],
							})
							.then(function (myTokenID) {
								myNFTIDs.push(myTokenID);

								avatarContract.methods
									.tokenSVG(myTokenID)
									.call({
										from: accounts[0],
									})
									.then(function (tokenSVG) {
										tokenSVG = tokenSVG.replace(
											new RegExp("colorshift", "g"),
											"colorshift" + myTokenID,
										);
										tokenSVG = tokenSVG.replace(
											new RegExp("<svg", "g"),
											'<svg data-avid="' + myTokenID + '"',
										);
										$(".svg-holder").first().remove();
										$("#my-avatars").prepend(tokenSVG);

										$("#my-avatars svg").on("click", function () {
											$(".selected").removeClass("selected");
											$(".itemsel").removeClass("itemsel");
											$(this).addClass("selected");
											selAvatar($(this).data("avid"));
										});
									});
							});
					}
				}
			});
	} catch (e) {}
}

async function selAvatar(avatarID) {
	$(".item-row").removeClass("loaded");

	for (let i = 0; i < 10; i++) {
		avatarContract.methods
			.accessorySet(avatarID, i)
			.call({
				from: accounts[0],
			})
			.then(function (hasAcc) {
				$(".itemno-" + i).addClass("loaded");

				if (hasAcc != 0) {
					$(".itemno-" + i + " .item-name")
						.text("Available")
						.addClass("active");
					$(".itemno-" + i).addClass("avail");

					$(".itemno-" + i).off("click");
					$(".itemno-" + i).on("click", function () {
						$(".itemsel").removeClass("itemsel");
						$(this).addClass("itemsel");

						$(".complete-item").addClass("show");

						avatarContract.methods
							.changeAvatarAccessory(i, avatarID)
							.send({
								from: accounts[0],
							})
							.then(function (aaa) {
								setTimeout(function () {
									$(".complete-item").addClass("loaded");
									avatarContract.methods
										.tokenSVG(avatarID)
										.call({
											from: accounts[0],
										})
										.then(function (tokenSVG) {
											tokenSVG = tokenSVG.replace(
												new RegExp("colorshift", "g"),
												"colorshift" + i,
											);
											$(".newavi").prepend(tokenSVG);
										});
								}, 3000);
							});
					});
				} else {
					$(".itemno-" + i + " .item-name")
						.text("Missing")
						.removeClass("active");
					$(".itemno-" + i).removeClass("avail");
					$(".itemno-" + i).off("click");
				}
			});
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

	// Get accounts
	try {
		accounts = await web3.eth.getAccounts();
		$("#connect").hide();
	} catch (e) {
		console.log(e);
		return;
	}

	// Get contract and avatars
	try {
		avatarContract = new web3.eth.Contract(
			abiS,
			"0x0000000000000000000000000000000000000000",
		);

		$(".connected").addClass("show");

		getAvatar();
	} catch (e) {
		console.log(e);
		return;
	}
}

window.addEventListener("load", async () => {
	init();
	document.querySelector("#connect").addEventListener("click", onConnect);

	$(".closecom").on("click", function () {
		$(".complete-item").removeClass("show");
		$(".complete-item").removeClass("loaded");
		$(".newavi").empty();
	});
});
