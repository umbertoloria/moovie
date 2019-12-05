function DropdownSelecter(obj) {

	let default_value = undefined;
	const available_values = [];
	obj.addClass("dropdown_selecter");
	obj.find("ul li[data-select-value]").each(function () {
		const select_value = $(this).attr("data-select-value");
		if ($(this).is("[data-select-default]")) {
			if (default_value === undefined)
				default_value = select_value;
			else
				console.log("Dropdown Selecter: multiple default values found");
		}
		available_values.push(select_value);
	});
	this.select_value = function (value) {
		if (available_values.includes(value)) {
			obj.find("input[type='hidden']").val(value);
			obj.find("ul li[data-select-value='" + value + "']").addClass("selected")
				.siblings().removeClass("selected");
			obj.find("label").html(
				obj.find("ul li[data-select-value='" + value + "']").html()
			);
		} else
			console.log("Dropdown Selecter: \"" + value + "\" is not selectable");
	};
	this.select_value(default_value);

	const this_handler = this;
	obj.find("ul li").click(function () {
		const selected_value = $(this).attr("data-select-value");
		this_handler.select_value(selected_value);
		this_handler.close();
		if (select_handler !== undefined)
			select_handler(selected_value)
	});

	obj.addClass("dropdown_selecter");

	let select_handler = undefined;
	this.setSelectHandler = function (handler) {
		if (typeof (handler) === "function")
			select_handler = handler;
	};

	obj.find("label").click(function () {
		if (this_handler.isOpened())
			this_handler.close();
		else
			this_handler.open();
	});

	this.open = function () {
		obj.addClass("open")
	};

	this.close = function () {
		obj.removeClass("open")
	};

	this.isOpened = function () {
		return obj.is(".open");
	}

}

$.fn.dropdown_selecter = function() {
	new DropdownSelecter(this);
	return this;
};