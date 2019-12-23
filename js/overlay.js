class Overlay {

	static popup(msg) {
		$("#overlay").addClass("shown").html("<div>" + msg + "</div>");
	}

	static close() {
		$("#overlay").removeClass("shown").html("");
	}

}

$(function () {

	$("#overlay").click(function () {
		Overlay.close();
	});

	$("#overlay").on("click", "> div", function (e) {
		e.stopPropagation();
	});

	$("a[data-confirm]").click(function (e) {
		if (!confirm("Sei sicuro di voler proseguire?")) {
			e.preventDefault();
			e.stopPropagation();
		}
	});

});