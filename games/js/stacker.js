function StackerGame() {
	// Game constants
	startingBlocks = 2;
	this.wonPrizes = false;
	this.BOARD_WIDTH = 8;
	this.BOARD_HEIGHT = 12;
	this.LIMIT_3 = 50;
	this.LIMIT_2 = 90;
	this.MIN_SPEED = 8 / 64;
	this.MAX_SPEED = 1 / 100;
	this.ANIMATION_TIME = 1.2 * 90;

	// Initialize members
	this.gameElement = document.getElementById("gem-stacker");
	this.gameBoard = null;

	// Initialize board state
	this.board = new Array(this.BOARD_HEIGHT);
	for (i = 0; i < this.BOARD_HEIGHT; i++) {
		this.board[i] = new Array(this.BOARD_WIDTH);
		for (j = 0; j < this.BOARD_WIDTH; j++) {
			this.board[i][j] = 0;
		}
	}

	// Game state variables
	this.blocks = startingBlocks;
	this.running = false;
	this.level = 0;
	this.pos = Math.floor(this.BOARD_WIDTH / 2) - Math.floor(this.blocks / 2);
	this.left = true;
	this.timer = 0;
	this.atimer = 0;

	this.intGo = 0;

	/**
	 * Build HTML elements
	 */
	this.buildHTML = function () {
		// build table
		var domTable = document.createElement("table");
		for (i = 0; i < this.BOARD_HEIGHT; i++) {
			var domTableRow = domTable.insertRow(i);
			for (j = 0; j < this.BOARD_WIDTH; j++) {
				domTableRow.insertCell(j);
			}
		}

		// Add table to HTML
		domTable.classList.add("stacker-board");
		this.gameBoard = domTable;
		this.gameElement.appendChild(this.gameBoard);
	};

	/**
	 * Starts the game running
	 */
	this.run = function () {
		this.intGo = setInterval(function () {
			game.onStep();
		}, 1000 / 60);
		window.addEventListener("keydown", function (e) {
			game.onKeyPress(e);
		});
		this.gameBoard.addEventListener("touchstart", function (e) {
			game.onTouchStart(e);
		});
	};

	/**
	 * Handles each step event
	 */
	this.onStep = function () {
		if (this.atimer > 0) {
			this.atimer--;
		}

		if (this.atimer == 0) {
			// Remove temporary (flashing) blocks
			for (i = 0; i < this.BOARD_HEIGHT; i++) {
				for (j = 0; j < this.BOARD_WIDTH; j++) {
					if (this.board[i][j] == 2) {
						this.board[i][j] = 0;
					}
				}
			}

			if (this.blocks == 0) {
				if (this.running) {
					var playsLeft = document.querySelector(".plays-more").innerHTML;
					if (playsLeft > 0) {
						if (this.wonPrizes) {
							if (
								!document
									.querySelector(".stack-win-ta")
									.classList.contains("show")
							) {
								document.querySelector(".stack-win-ta").classList.add("show");
							}
						} else {
							if (
								!document
									.querySelector(".stack-end-ta")
									.classList.contains("show")
							) {
								document.querySelector(".stack-end-ta").classList.add("show");
							}
						}
					} else {
						if (
							!document.querySelector(".stack-end").classList.contains("show")
						) {
							document.querySelector(".stack-end").classList.add("show");
						}
					}
				}
				this.running = false;
			}
		}

		// Move blocks over
		if (this.running && this.atimer == 0) {
			if (this.timer <= 0) {
				if (this.left) {
					this.pos--;
					if (this.pos + this.blocks - 1 == 0) {
						this.left = false;
					}
				} else {
					this.pos++;
					if (this.pos == this.BOARD_WIDTH - 1) {
						this.left = true;
					}
				}
				this.timer =
					(this.MAX_SPEED +
						(this.MIN_SPEED - this.MAX_SPEED) *
							(1 - this.level / this.BOARD_HEIGHT)) *
					60;
			} else {
				this.timer--;
			}
		}

		// Redraw grid
		for (i = 0; i < this.BOARD_HEIGHT; i++) {
			if (this.level == i) {
				this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].className = "active";
			}
			if (this.level < i) {
				this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].className = "todo";
			}
			if (this.level > i) {
				this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].className = "done";
			}

			for (j = 0; j < this.BOARD_WIDTH; j++) {
				switch (this.board[i][j]) {
					case 0:
						this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].cells[j].className =
							"";
						break;
					case 1:
						this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].cells[j].className =
							"filled";
						break;
					case 2:
						this.gameBoard.rows[this.BOARD_HEIGHT - 1 - i].cells[j].className =
							this.atimer > 0 && this.atimer % 30 < 15 ? "filled" : "";
						break;
				}
			}
		}
		// Draw bouncing blocks
		if (this.running && this.atimer == 0) {
			for (j = this.pos; j < this.pos + this.blocks; j++) {
				if (j >= 0 && j < this.BOARD_WIDTH) {
					this.gameBoard.rows[this.BOARD_HEIGHT - 1 - this.level].cells[
						j
					].className = "filled";
				}
			}
		}
	};

	/**
	 * Handles keyboard press events
	 */
	this.onKeyPress = function (e) {
		var e = e || window.event;

		switch (e.keyCode) {
			case 32: // Space
				this.onSpacePress();
				e.preventDefault();
				break;
		}
	};

	/**
	 * Handles touch screen device touch
	 */
	this.onTouchStart = function (e) {
		if (this.running) {
			this.onSpacePress();
		}
	};

	/**
	 * Handles spacebar presses
	 */
	this.onSpacePress = function () {
		if (this.atimer == 0 && this.running) {
			// put blocks onto board
			var iEnd = this.pos + this.blocks;
			for (i = this.pos; i < iEnd; i++) {
				if (i >= 0 && i < this.BOARD_WIDTH) {
					this.board[this.level][i] = 1;
				} else {
					this.blocks--;
				}
			}

			// Remove invalid blocks
			if (this.level > 0) {
				for (i = 0; i < this.BOARD_WIDTH; i++) {
					// If this block (state 1) is above a non block (state 0) then delete it (state 2)
					if (
						this.board[this.level][i] == 1 &&
						this.board[this.level - 1][i] == 0
					) {
						this.board[this.level][i] = 2;
						this.blocks--;
						this.atimer = this.ANIMATION_TIME;
					}
				}
			}

			if (this.level == this.BOARD_HEIGHT) {
				for (i = 0; i < this.BOARD_WIDTH; i++) {
					// If this block (state 1) is above a non block (state 0) then delete it (state 2)
					if (
						this.board[this.level][i] == 1 &&
						this.board[this.level - 1][i] == 1
					) {
						this.board[this.level][i] = 0;
						this.board[this.level][i - 1] = 2;
						this.gameBoard.rows[this.level - 1].cells[i].className = "";
						this.gameBoard.rows[this.level - 1].cells[i - 1].className =
							"filled";
						this.blocks--;
						this.atimer = this.ANIMATION_TIME;
					}
				}
			}

			// Check hard limits
			if (this.blocks >= 3 && this.level >= this.LIMIT_3) {
				this.blocks = 2;
			}
			if (this.blocks >= 2 && this.level >= this.LIMIT_2) {
				this.blocks = 1;
			}
			if (this.level == this.BOARD_HEIGHT - 1) {
				this.running = false;
			}

			this.level++;

			this.pos = Math.floor(this.BOARD_WIDTH / 2);

			if (this.blocks > 0) {
				if (this.level == 5 || this.level == 9 || this.level == 12) {
					console.log("Passed Level: " + this.level);

					this.wonPrizes = true;
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open(
						"GET",
						"stacker-backend?cid=" +
							accounts[0] +
							"&lvl=" +
							this.level +
							"&id=" +
							Date.now(),
						true,
					);
					xmlhttp.send();
				}
			}
		}
	};

	this.unlockStart = function () {
		// Initialize board
		for (i = 0; i < this.BOARD_HEIGHT; i++) {
			for (j = 0; j < this.BOARD_WIDTH; j++) {
				this.board[i][j] = 0;
			}
		}

		// Reset everything else
		this.level = 0;
		this.blocks = startingBlocks;
		this.pos = Math.floor(this.BOARD_WIDTH / 2) - Math.floor(this.blocks / 2);
		this.left = true;
		this.running = true;
		this.atimer = 0;
		this.timer = 0;
		this.wonPrizes = false;

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "stacker-backend?pid=" + accounts[0], true);
		xmlhttp.send();
	};
}
