// Function: Is element visible
var isInViewport = function (elem) {
	var distance = elem.getBoundingClientRect();
	return (
		distance.top >= 0 &&
		distance.bottom <=
			(window.innerHeight || document.documentElement.clientHeight)
	);
};

const isValidUrl = (urlString) => {
	var urlPattern = new RegExp(
		"^(https?:\\/\\/)?" + // validate protocol
			"((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // validate domain name
			"((\\d{1,3}\\.){3}\\d{1,3}))" + // validate OR ip (v4) address
			"(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // validate port and path
			"(\\?[;&a-z\\d%_.~+=-]*)?" + // validate query string
			"(\\#[-a-z\\d_]*)?$",
		"i",
	); // validate fragment locator
	return !!urlPattern.test(urlString);
};

// Function: Cookies
function setCookie(b, h, c, f, e) {
	var a;
	if (c === 0) {
		a = "";
	} else {
		var g = new Date();
		g.setTime(g.getTime() + c * 24 * 60 * 60 * 1000);
		a = "expires=" + g.toGMTString() + "; ";
	}
	var e = typeof e === "undefined" ? "" : "; domain=" + e;
	document.cookie = b + "=" + h + "; " + a + "path=" + f + e;
}
function getCookie(d) {
	var b = d + "=";
	var a = document.cookie.split(";");
	for (var e = 0; e < a.length; e++) {
		var f = a[e].trim();
		if (f.indexOf(b) == 0) {
			return f.substring(b.length, f.length);
		}
	}
	return "";
}

// Function: Copy to clipboard
function fallbackCopyTextToClipboard(text) {
	var textArea = document.createElement("textarea");
	textArea.value = text;
	textArea.style.top = "0";
	textArea.style.left = "0";
	textArea.style.position = "fixed";

	document.body.appendChild(textArea);
	textArea.focus();
	textArea.select();

	try {
		var successful = document.execCommand("copy");
		var msg = successful ? "successful" : "unsuccessful";
		console.log("Fallback: Copying text command was " + msg);
	} catch (err) {
		console.error("Fallback: Oops, unable to copy", err);
	}

	document.body.removeChild(textArea);
}
function copyTextToClipboard(text) {
	if (!navigator.clipboard) {
		fallbackCopyTextToClipboard(text);
		return;
	}
	navigator.clipboard.writeText(text).then(
		function () {
			console.log("Async: Copying to clipboard was successful!");
		},
		function (err) {
			console.error("Async: Could not copy text: ", err);
		},
	);
}

// Document ready
$(document).ready(function () {
	// Copy contract address
	if (document.querySelector(".contract")) {
		$(".contract").on("click", function () {
			var theCont = $(this).find(".contract-hash").text();
			copyTextToClipboard(theCont);
		});
	}

	// Translate
	var theTranCookie = getCookie("googtrans");
	var theCookieDish = theTranCookie.split("/");
	var theTranLang = theCookieDish[theCookieDish.length - 1];
	if (!theTranCookie) {
		$(".tran-en").addClass("active");
	}
	if (!theTranLang) {
		$(".tran-en").addClass("active");
	} else {
		$(".tran-" + theTranLang).addClass("active");
	}
	$(".langauges .item").click(function () {
		var theLang = $(this).attr("data-lang");

		if (theLang == "en") {
			setCookie("googtrans", "", 0, "/", "." + location.host);
			setCookie("googtrans", "", 0, "/");
		} else {
			setCookie("googtrans", "/en/" + theLang, 0, "/", "." + location.host);
			setCookie("googtrans", "/en/" + theLang, 0, "/");
		}

		location.reload();
	});

	// Smooth scroll on anchor click
	document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
		anchor.addEventListener("click", function (e) {
			e.preventDefault();

			const id = this.getAttribute("href");
			const yOffset = -110;
			const element = document.querySelector(id);
			const y =
				element.getBoundingClientRect().top + window.pageYOffset + yOffset;

			window.scrollTo({ top: y, behavior: "smooth" });
			document.querySelector(".menu").classList.remove("open");
		});
	});

	// Menu class setter
	if (document.querySelector(".menu")) {
		document
			.querySelector(".menu-show")
			.addEventListener("click", function (event) {
				document.querySelector(".menu").classList.add("open");
			});

		document
			.querySelector(".menu-close")
			.addEventListener("click", function (event) {
				document.querySelector(".menu").classList.remove("open");
			});
	}

	// Show add form
	$(".add").on("click", function () {
		$("#add-token").addClass("open");
		$("#mask").addClass("show");
		document.querySelector(".menu").classList.remove("open");
	});

	// Hide add form
	$(".add-close").on("click", function () {
		$("#add-token").removeClass("open");
		$("#mask").removeClass("show");
	});

	// Add form social icon classer
	$(".link-icon").on("click", function () {
		$(".link-icon").removeClass("active");
		$(this).addClass("active");

		$(".in-social").removeClass("active");
		$("." + $(this).data("show")).addClass("active");
	});
	$(".in-social").on("input", function (e) {
		var inputText = $(this).val();

		if (inputText.length) {
			$("." + $(this).data("link")).addClass("set");
		} else {
			$("." + $(this).data("link")).removeClass("set");
		}
	});

	// Validate add gem
	$(".add-gem-button").on("click", function () {
		$(".inerror").removeClass("inerror");

		var isFormValid = $("#addgem")[0].checkValidity();

		if (!isFormValid) {
			$("#addgem").find(":submit").click();
		} else {
			if (!clientValidator) {
				return false;
			} else {
				$("#addgem").submit();
			}
		}
	});

	// Show vote
	$(".go-vote").click(function () {
		$("#voteid").val($(this).data("id"));
		$("#votename").text($(this).data("name"));
		$("#vote-token").addClass("open");
		$("#mask").addClass("show");
	});

	// Hide vote
	$(".vote-close").on("click", function () {
		$("#vote-token").removeClass("open");
		$("#add-error-msg").removeClass("open");
		$("#mask").removeClass("show");
	});

	// Copy shill message
	$(".gem-shill").on("click", function () {
		var theCont = $(this).data("msg");
		copyTextToClipboard(theCont);
		alert("Share message copied to clipboard");
	});
});
