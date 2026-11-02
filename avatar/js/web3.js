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
var msgMint2Error;
var msgBuyError;
var msgMintComplete;

var minTokenToMint = 7500000000;

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

var abiC = [
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
				name: "spender",
				type: "address",
			},
			{
				indexed: false,
				internalType: "uint256",
				name: "value",
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
				internalType: "uint256",
				name: "amountIn",
				type: "uint256",
			},
			{
				indexed: false,
				internalType: "address[]",
				name: "path",
				type: "address[]",
			},
		],
		name: "SwapTokensForETH",
		type: "event",
	},
	{
		anonymous: false,
		inputs: [
			{ indexed: true, internalType: "address", name: "from", type: "address" },
			{ indexed: true, internalType: "address", name: "to", type: "address" },
			{
				indexed: false,
				internalType: "uint256",
				name: "value",
				type: "uint256",
			},
		],
		name: "Transfer",
		type: "event",
	},
	{
		inputs: [],
		name: "_routerAddress",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "_supplyTotal",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "addMaxWalletExempt",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address[]", name: "accounts", type: "address[]" },
			{ internalType: "uint256", name: "creditsToAdd", type: "uint256" },
		],
		name: "addNFTCredits",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "addTaxExempt",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address[]", name: "accounts", type: "address[]" },
			{ internalType: "uint256", name: "taxFreeBuyCredits", type: "uint256" },
		],
		name: "addTaxFreeBuyCredits",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address[]", name: "accounts", type: "address[]" },
			{ internalType: "uint256", name: "payoutsToAdd", type: "uint256" },
		],
		name: "addWalletPayoutCount",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "addressOfNFT",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "addressOfNFT2",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "addressOfNFT3",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "owner", type: "address" },
			{ internalType: "address", name: "spender", type: "address" },
		],
		name: "allowance",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "spender", type: "address" },
			{ internalType: "uint256", name: "amount", type: "uint256" },
		],
		name: "approve",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "balanceOf",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "burnTaxB",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "burnTaxS",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "burnTaxT",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newBurnTax", type: "uint256" }],
		name: "changeBurnOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newBurnTax", type: "uint256" }],
		name: "changeBurnOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newBurnTax", type: "uint256" }],
		name: "changeBurnOnTransfer",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newPrice", type: "uint256" }],
		name: "changeClubEntryPrice",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newPayout", type: "uint256" }],
		name: "changeClubPayout",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newClubTax", type: "uint256" }],
		name: "changeClubTaxOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newClubTax", type: "uint256" }],
		name: "changeClubTaxOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newClubTax", type: "uint256" }],
		name: "changeClubTaxOnTransfer",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newLiqTax", type: "uint256" }],
		name: "changeLiqOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newLiqTax", type: "uint256" }],
		name: "changeLiqOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newLiqTax", type: "uint256" }],
		name: "changeLiqOnTransfer",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "newLiqSwapAt", type: "uint256" },
		],
		name: "changeLiqSwapAt",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{
				internalType: "address payable",
				name: "newLiqWallet",
				type: "address",
			},
		],
		name: "changeLiqWallet",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "newMaxTxPercent", type: "uint256" },
		],
		name: "changeMaxTxPercent",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "newMaxWalletSize", type: "uint256" },
		],
		name: "changeMaxWalletSize",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "newAddressOfNFT", type: "address" },
		],
		name: "changeNFTAddress",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "newAddressOfNFT", type: "address" },
		],
		name: "changeNFTAddress2",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "newAddressOfNFT", type: "address" },
		],
		name: "changeNFTAddress3",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "newRouterAddress", type: "address" },
		],
		name: "changeRouterAddress",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newSwapOnBuy", type: "bool" }],
		name: "changeSwapOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newSwapOnSell", type: "bool" }],
		name: "changeSwapOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newTax", type: "uint256" }],
		name: "changeTaxOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newTax", type: "uint256" }],
		name: "changeTaxOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "newTax", type: "uint256" }],
		name: "changeTaxOnTransfer",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "uint256", name: "newTaxSwapAt", type: "uint256" },
		],
		name: "changeTaxSwapAt",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address payable", name: "newWallet", type: "address" },
		],
		name: "changeTaxWallet",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newTaxStatus", type: "bool" }],
		name: "changeTaxesOnBuy",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newTaxStatus", type: "bool" }],
		name: "changeTaxesOnSell",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "bool", name: "newTaxStatus", type: "bool" }],
		name: "changeTaxesOnTran",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "clearClubList",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "clubEntryPrice",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		name: "clubList",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "clubPayout",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "clubTaxB",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "clubTaxS",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "clubTaxT",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "decimals",
		outputs: [{ internalType: "uint8", name: "", type: "uint8" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "getClubPayoutCount",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "getClubPayoutTally",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "getNFTCredits",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "getTaxFreeBuyCredits",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "isMaxWalletExempt",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "isTaxExempt",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqCount",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqSwapAt",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqTaxB",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqTaxS",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqTaxT",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "liqWallet",
		outputs: [{ internalType: "address payable", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "maxTxPercent",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "maxWalletSize",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
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
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "removeMaxWalletExempt",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "removeTaxExempt",
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
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "resetNFTCredits",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [{ internalType: "address", name: "account", type: "address" }],
		name: "resetTaxFreeBuyCredits",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address[]", name: "accounts", type: "address[]" },
			{ internalType: "uint256", name: "payoutC", type: "uint256" },
		],
		name: "setWalletPayoutCount",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "account", type: "address" },
			{ internalType: "uint256", name: "amount", type: "uint256" },
		],
		name: "swapForMint",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [],
		name: "swapOnBuy",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "swapOnSell",
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
		inputs: [],
		name: "taxCount",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxSwapAt",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxTaxB",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxTaxS",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxTaxT",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxWallet",
		outputs: [{ internalType: "address payable", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxesOnBuy",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxesOnSell",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "taxesOnTran",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "totalSupply",
		outputs: [{ internalType: "uint256", name: "", type: "uint256" }],
		stateMutability: "pure",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "recipient", type: "address" },
			{ internalType: "uint256", name: "amount", type: "uint256" },
		],
		name: "transfer",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "sender", type: "address" },
			{ internalType: "address", name: "recipient", type: "address" },
			{ internalType: "uint256", name: "amount", type: "uint256" },
		],
		name: "transferFrom",
		outputs: [{ internalType: "bool", name: "", type: "bool" }],
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
		inputs: [],
		name: "uniswapV2Pair",
		outputs: [{ internalType: "address", name: "", type: "address" }],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [],
		name: "uniswapV2Router",
		outputs: [
			{
				internalType: "contract IUniswapV2Router02",
				name: "",
				type: "address",
			},
		],
		stateMutability: "view",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address payable", name: "account", type: "address" },
		],
		name: "withdrawContractBNB",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{
		inputs: [
			{ internalType: "address", name: "account", type: "address" },
			{ internalType: "uint256", name: "tokenAmount", type: "uint256" },
		],
		name: "withdrawContractTokens",
		outputs: [],
		stateMutability: "nonpayable",
		type: "function",
	},
	{ stateMutability: "payable", type: "receive" },
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

		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";

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
		abiC,
		"0x0000000000000000000000000000000000000000",
		{ from: accounts[0] },
	);

	// send transaction
	var bresult = await theCon.methods
		.balanceOf(accounts[0])
		.call({ from: accounts[0] });
	var cresult = await theCon.methods
		.getNFTCredits(accounts[0])
		.call({ from: accounts[0] });
	if (bresult > 0) {
		bresult = parseInt(
			bresult.toString().substr(0, bresult.toString().length - 9),
		);
	}

	if (parseInt(cresult) > 0) {
		return false;
	}

	if (parseInt(bresult) >= minTokenToMint) {
		return true;
	} else {
		return false;
	}
}

async function doMint() {
	// Create NFT contract mint function
	try {
		theNFTCon = new web3.eth.Contract(
			abiS,
			"0x0000000000000000000000000000000000000000",
			{ from: accounts[0] },
		);

		msgWalletError.style.display = "none";
		msgMintError.style.display = "none";
		msgBuyError.style.display = "none";
		msgWaitMint.style.display = "block";
		msgMintError.style.display = "none";
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "none";
		msgMint2Error.style.display = "block";
		msgBuyError.style.display = "none";

		$(".errorreport").text(
			JSON.stringify(e) + " # " + e + " # " + JSON.stringify(web3),
		);

		console.log(e);
		return;
	}

	// Hide mint button
	var animation9 = document.getElementById("buttonaway");
	animation9.beginElement();

	// Animate axe
	var animation3 = document.getElementById("axegorot");
	animation3.beginElement();

	// Call the NFT Mint function
	try {
		var mintResult = await theNFTCon.methods.mint().send({ from: accounts[0] });

		console.log("mintResult");
		console.log(mintResult);
		var theTokenID =
			mintResult["events"]["Transfer"]["returnValues"]["tokenId"];

		$(
			'<iframe src="https://avatar.gemcave.org/viewonly.php?id=' +
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
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "none";

		msgMintComplete.style.display = "block";

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open(
			"GET",
			"mintdone?w=" + accounts[0] + "&id=" + theTokenID,
			true,
		);
		xmlhttp.send();

		return;
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "none";
		msgMintError.style.display = "block";
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "none";

		console.log(e);
		alert("mint ERROR: " + JSON.stringify(e));
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
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "none";
		return;
	}

	// Connect to Web3 provider
	try {
		web3 = new Web3(provider);
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "none";
		return;
	}

	// Connect to Web3 provider
	try {
		accounts = await web3.eth.getAccounts();
	} catch (e) {
		msgWaitMint.style.display = "none";
		msgWalletError.style.display = "block";
		msgMintError.style.display = "none";
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "none";
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
		msgMint2Error.style.display = "none";
		msgBuyError.style.display = "block";

		return;
	}
}

window.addEventListener("load", async () => {
	init();

	msgWaitMint = document.getElementById("waitmint");
	msgWalletError = document.getElementById("errorwallet");
	msgMintError = document.getElementById("errormint");
	msgMint2Error = document.getElementById("errormint2");
	msgBuyError = document.getElementById("errorbuy");
	msgMintComplete = document.getElementById("donemint");

	document
		.querySelector("#button-connect")
		.addEventListener("click", onConnect);
	document.querySelector("#button-mint").addEventListener("click", doMint);
});
