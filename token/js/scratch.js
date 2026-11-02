var emojis = [
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
	],
	winningEmojisFound = 0,
	emojisRemaining = 9,
	message = "";

const emojiContainer = document.querySelector(".emoji-container"),
	emojiOutput = document.querySelectorAll(".emoji-output"),
	tryagain = document.querySelector(".tryagain"),
	outputEmojis = (a) =>
		emojiOutput.forEach((emojix, i) => (emojix.innerHTML = a[i])),
	shuffleArray = (a) => {
		for (let i = a.length - 1; i > 0; i--) {
			const j = Math.floor(Math.random() * (i + 1));
			[a[i], a[j]] = [a[j], a[i]];
		}

		return a;
	},
	rainMoney = () => {
		const w = window.innerWidth;
		var winner = document.querySelector(".scratch-result").innerHTML;

		//Create dollar bills
		for (i = 0; i < 50; i++) {
			const dollar = document.createElement("div");
			dollar.classList.add("dollar-bill");
			dollar.textContent = $(".win-" + winner).text();
			dollar.style.left = `${Math.floor(Math.random() * w)}px`;
			dollar.style.top = "-" + Math.floor(Math.random() * 800) + "px";

			document.body.appendChild(dollar);
		}
	};

function initSC() {
	var winner = document.querySelector(".scratch-result").innerHTML;

	//Enable scratch card
	document.querySelector("#scratchcard").classList.add("on");

	emojis = shuffleArray(emojis);
	emojis = emojis.slice(0, 8);

	if (winner == "false") {
		emojis.push("💀");
		document.querySelector(".dialog-message").innerHTML =
			"Better luck next time!";
	} else {
		emojis.push($(".win-" + winner).text());
		$(".dialog-message").html(
			"<h1>WINNER!</h1> <br><p>You have won " +
				$(".prize-" + winner).text() +
				"</p>",
		);
	}

	outputEmojis(shuffleArray(emojis));
}

tryagain.addEventListener("click", (e) => {
	((emojis = [
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
		"💀",
		"🦴",
	]),
		(winningEmojisFound = 0),
		(emojisRemaining = 9),
		(message = ""));

	document.querySelector(".scratch-result").innerHTML = "false";
	document.querySelector("#scratchcard").classList.remove("on");
	document.querySelector(".dialog").classList.remove("show");

	var dollarBills = document.querySelectorAll(".dollar-bill");
	for (i = 0; i < dollarBills.length; ++i) {
		dollarBills[i].parentNode.removeChild(dollarBills[i]);
	}

	var emojiB = document.querySelectorAll(".emoji-btn");
	for (i = 0; i < emojiB.length; ++i) {
		emojiB[i].classList.remove("uncovered");
		emojiB[i].classList.remove("winning-emoji");
	}
});

emojiContainer.addEventListener("click", (e) => {
	const target = e.target;

	if (
		target.classList.contains("emoji-btn") &&
		!target.classList.contains("uncovered")
	) {
		emojisRemaining--;
		target.classList.add("uncovered");

		//Check if winning emoji found
		if (target.textContent === "win") {
			target.classList.add("winning-emoji");
			winningEmojisFound++;
		}

		//Check if all emojis revealed
		if (emojisRemaining === 0) {
			var winner = document.querySelector(".scratch-result").innerHTML;

			//Play effect on win
			if (winner != "false") {
				setTimeout(function () {
					rainMoney();
					document.querySelector(".dialog").classList.add("show");
				}, 400);
			} else {
				setTimeout(function () {
					document.querySelector(".dialog").classList.add("show");
				}, 800);
			}
		}
	}
});
