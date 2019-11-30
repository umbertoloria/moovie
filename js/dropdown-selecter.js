function DropdownSelecter(query_selector) {
	let default_value = undefined;
	const available_values = [];
	$(query_selector).find("ul li[data-select-value]").each(function () {
		const select_value = $(this).attr("data-select-value");
		if ($(this).is("[data-select-default]")) {
			if (default_value === undefined)
				default_value = select_value;
			else
				console.log(query_selector + ": multiple default values found");
		}
		available_values.push(select_value);
	});
	this.select_value = function (value) {
		if (available_values.includes(value)) {
			$(query_selector).find("input[type='hidden']").val(value);
			$(query_selector).find("ul li[data-select-value='" + value + "']").addClass("selected")
				.siblings().removeClass("selected");
			$(query_selector).find("label").html(
				$(query_selector).find("ul li[data-select-value='" + value + "']").html()
			);
		} else
			console.log(query_selector + ": \"" + value + "\" is not selectable");
	};
	this.select_value(default_value);

	const this_handler = this;
	$(query_selector).find("ul li").click(function () {
		const selected_value = $(this).attr("data-select-value");
		this_handler.select_value(selected_value);
		this_handler.close();
		if (select_handler !== undefined)
			select_handler(selected_value)
	});

	$(query_selector).addClass("dropdown_selecter");

	let select_handler = undefined;
	this.setSelectHandler = function (handler) {
		if (typeof (handler) === "function")
			select_handler = handler;
	};

	$(query_selector).find("label").click(function () {
		if (this_handler.isOpened())
			this_handler.close();
		else
			this_handler.open();
	});

	this.open = function () {
		$(query_selector).addClass("open")
	};

	this.close = function () {
		$(query_selector).removeClass("open")
	};

	this.isOpened = function () {
		return $(query_selector).is(".open");
	}

}