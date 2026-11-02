const tokenAddress = "0x0000000000000000000000000000000000000000";
const tokenSymbol = "GEMS";
const tokenDecimals = 9;
const tokenImage = "https://token.gemcave.org/img/favicon-196x196.png";

async function addTokenFunction() {
	try {
		const wasAdded = await ethereum.request({
			method: "wallet_watchAsset",
			params: {
				type: "ERC20",
				options: {
					address: tokenAddress,
					symbol: tokenSymbol,
					decimals: tokenDecimals,
					image: tokenImage,
				},
			},
		});

		if (wasAdded) {
			console.log("Thanks for your interest!");
		} else {
			console.log("Coin has not been added");
		}
	} catch (error) {
		console.log(error);
	}
}
