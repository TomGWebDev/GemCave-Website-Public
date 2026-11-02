$(document).ready(function () {
	$("#spin").click(function () {
		$("#spin").addClass("off");

		if ($(".spin-deg").length) {
			var extDeg = parseInt($(".spin-deg").text());
		} else {
			var extDeg = 25;
		}

		var theRotRan = 360 * Math.floor(Math.random() * 15);

		totalDegree = theRotRan + extDeg;

		$("#wheel .sec").each(function () {
			$("#inner-wheel").css({
				transform: "rotate(" + totalDegree + "deg)",
			});
		});

		setTimeout(function () {
			// Prize 0
			if (extDeg == 0) {
				$("#inner-spin").text("⛔");
			}
			// Prize 1
			if (extDeg == 205) {
				$("#inner-spin").html($(".win-205").html());
			}
			// Prize 2
			if (extDeg == 222) {
				$("#inner-spin").html($(".win-222").html());
			}
			// Prize 3
			if (extDeg == 300) {
				$("#inner-spin").html($(".win-300").html());
			}
			// Prize 4
			if (extDeg == 45) {
				$("#inner-spin").html($(".win-45").html());
			}
			// Prize 5
			if (extDeg == 98) {
				$("#inner-spin").html($(".win-98").html());
			}

			$("#inner-spin").addClass("done");

			setTimeout(function () {
				document.querySelector(".dialog").classList.add("show");

				if (extDeg != 0) {
					const w = window.innerWidth;

					//Create dollar bills
					for (i = 0; i < 150; i++) {
						const dollar = document.createElement("div");

						dollar.classList.add("dollar-bill");
						dollar.textContent = $("#inner-spin").text();
						dollar.style.left = `${Math.floor(Math.random() * w)}px`;
						dollar.style.top = "-" + Math.floor(Math.random() * 4000) + "px";

						$(".dialog-message").html(
							"<h1>WINNER!</h1> <br><p>You have won " +
								$(".prize-" + $(".spin-deg").text()).text() +
								"</p>",
						);

						document.body.appendChild(dollar);
					}
				}
			}, 500);
		}, 2500);
	});
});
