function ItemsSelecter(obj) {

	const input_hidden = obj.find("[type='hidden'][name]");

	const available_values = [];
	const selected_values = [];
	obj.addClass("items_selecter");
	obj.find("ul li[data-select-value]").each(function () {
		const li = $(this);
		const value = li.attr("data-select-value");
		available_values.push(value);
		if (li.is("[data-selected]")) {
			selected_values.push(value);
			li.addClass("selected");
		}
	});

	function update_hidden_value() {
		let value = "";
		for (const selected_value of selected_values) {
			value += selected_value;
			value += ";";
		}
		value = value.substring(0, value.length - 1);
		input_hidden.val(value);
	}

	update_hidden_value();

	///////////////// GETTER e SETTER ////////////////

	this.is_selected_value = function (value) {
		if (available_values.includes(value)) {
			return selected_values.includes(value);
		} else {
			console.log("Items Selecter: \"" + value + "\" is unknown");
			return false;
		}
	};

	this.select_value = function (value) {
		if (available_values.includes(value)) {
			if (!this.is_selected_value(value)) {
				selected_values.push(value);
				update_hidden_value();
				obj.find("ul li[data-select-value='" + value + "']").addClass("selected");
			} else
				console.log("Items Selecter: \"" + value + "\" is already selected");
		} else
			console.log("Items Selecter: \"" + value + "\" is not selectable");
	};

	this.unselect_value = function (value) {
		if (available_values.includes(value)) {
			if (this.is_selected_value(value)) {
				// FIXME: è sempre così...
				selected_values.splice(selected_values.indexOf(value), 1);
				update_hidden_value();
				obj.find("ul li[data-select-value='" + value + "']").removeClass("selected");
			} else
				console.log("Items Selecter: \"" + value + "\" is already unselected");
		} else
			console.log("Items Selecter: \"" + value + "\" is not selectable");
	};

	///////////////////// EVENTS /////////////////////

	const this_handler = this;
	obj.find("ul li").click(function () {
		const li = $(this);
		const value = li.attr("data-select-value");
		if (available_values.includes(value)) {
			if (this_handler.is_selected_value(value))
				this_handler.unselect_value(value);
			else
				this_handler.select_value(value);
		} else
			console.log("fuck");
	});

}

$.fn.items_selecter = function () {
	new ItemsSelecter(this);
	return this;
};