var isInViewport = function (elem) {
	var distance = elem.getBoundingClientRect();
	return (
		distance.top >= 0 &&
		distance.bottom <=
			(window.innerHeight || document.documentElement.clientHeight)
	);
};

// On Load...
$(document).ready(function () {
	$("#showgal").on("click", function () {
		$("#showgal").hide();
		$(".loadgo").show();
		$(
			'<iframe src="https://nft.gemcave.org/gallery.php" id="igal"></iframe>',
		).appendTo(".catalog-list");
	});

	$("#viewnew").on("click", function () {
		$(".button-box").hide();
		$("#mynft").show();
	});

	$("#viewmygo").on("click", function () {
		window.location.href =
			"https://nft.gemcave.org/mine?wallet=" + $(".wallet-viewmy").val();
	});
});
