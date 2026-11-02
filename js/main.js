// Function: Is element visible
var isInViewport = function (elem) {
	var distance = elem.getBoundingClientRect();
	return (
		distance.top >= 0 &&
		distance.bottom <=
			(window.innerHeight || document.documentElement.clientHeight)
	);
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

	$(".faq-item").on("click", function () {
		if ($(this).hasClass("open")) {
			$(this).removeClass("open");
		} else {
			$(this).addClass("open");
		}
	});

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

	// Set menu bar on scroll
	var scrollPos = $(document).scrollTop();
	if (scrollPos > 80) {
		$("header").addClass("set");
	} else {
		$("header").removeClass("set");
	}
	$(window).scroll(function () {
		var scrollPos = $(document).scrollTop();

		if (scrollPos > 80) {
			$("header").addClass("set");
			$("#topbar").addClass("set");
		} else {
			$("header").removeClass("set");
			$("#topbar").removeClass("set");
		}
	});
});
