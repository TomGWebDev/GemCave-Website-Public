# GemCave Website

GemCave is a collection of PHP websites and browser-based products built around the GEMS BEP-20 token on Binance Smart Chain (BSC). The project includes the main website and the source for several product subdomains.

## Technology

- **PHP** renders the pages and implements server-side features, including game backends, NFT pages, and product dashboards.
- **MySQL** is accessed from PHP with `mysqli` for application data such as listings, votes, and prizes.
- **HTML5, CSS, and JavaScript** provide the website markup, styling, and interactive browser features.
- **Sass/SCSS** is the source format for the stylesheets.
- **Node.js, npm, and Gulp** provide the stylesheet build workflow. Gulp compiles SCSS to CSS; PostCSS runs Autoprefixer and cssnano. Each site with its own `gulpfile.js` and `package.json` has its own build dependencies.
- **Web3.js and Web3Modal** connect browser pages to EVM wallets and smart contracts. The project includes WalletConnect and Fortmatic integrations and uses public BSC JSON-RPC endpoints, which may be rate-limited.
- **jQuery and Slick** are included for legacy browser interactions and carousels.
- **SVG** is used for inline artwork and the on-chain NFT imagery.
- External integrations include **Google Fonts**, **Google Translate**, and **Google reCAPTCHA**.
- The game wallet utilities include PHP implementations for Ethereum address encoding/validation, wallet handling, and secp256k1 signature operations.

The Swap product described in archived GemCave materials does not have a corresponding source folder in this repository.

## Product overview

The following summaries and figures are from the supplied archived site information; they describe historical project claims and are not live metrics.

- **Token:** A BEP-20 token on BSC with tokenomic features intended to support NFT minting and staking. The archived site reported 2.5k holders, 80k transactions, six months since launch, 35 BNB locked in liquidity, and 23% of supply burned.
- **Listing:** A directory of BSC projects with community voting. The top-voted monthly project was featured across GemCave products, after which votes reset. The archived site reported 23k votes, 35 listed projects, and a $20m largest market-cap increase for a listed project.
- **Staking:** A custom GEMS staking service offering time-locked stakes with GEMS, NFT, or burn rewards. The archived site reported 5 trillion GEMS staked, 3 trillion GEMS paid as rewards, and 80 billion GEMS burned through a 50% APY option.
- **Gaming:** Wallet-connected arcade games where GEMS holdings affect play frequency. Players can earn credits and manage prizes through the gaming dashboard.
- **GemCave DIG NFT:** A collectible gem-themed collection using on-chain NFT data. The archived site reported 5,000 NFTs minted, none remaining, 166 holders, 5k NFT transactions, and 5 trillion GEMS burned during minting.
- **Avatar NFT:** A limited collection of 500 gem-themed character NFTs with on-chain data. The archived site reported approximately 170 minted, 30 holders, a 7.5 billion GEMS minting price, and 1 trillion GEMS burned.
## Runtime configuration

Set `TELEGRAM_BOT_TOKEN` in the server environment to enable Telegram game, staking, and NFT notifications. Do not put bot tokens or other credentials in source files or commit them to Git. Notifications are skipped and an error is written to the PHP error log when the variable is missing.
