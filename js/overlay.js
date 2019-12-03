class Overlay {

	static popup(msg) {
		$("#overlay").addClass("shown").html("<div>" + msg + "</div>");
	}

	static putHTML(html) {
		$("#overlay").addClass("shown").html(html);
	}

}

/*class Notification {

	static push(msg) {
		if (this.timeout !== undefined) {
			clearTimeout(this.timeout);
		}
		$("#notification").addClass("shown").html(msg);
		this.timeout = setTimeout(function () {
			$("#notification").removeClass("shown");
		}, 3000);
	}

}*/