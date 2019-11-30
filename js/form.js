function Form(querySelector, validator) {

	///////////////////// FIELDS /////////////////////

	const form = $(querySelector);
	const fields = [];
	form.find("fieldset label input").each(function () {
		fields[$(this).attr("name")] = $(this);
	});
	/*
	fields = [
		"username": usrDOM,
		"password": pwdDOM
	]
	*/
	/** Restituisce una mappa con i nomi dei field come chiavi e i DOM di questi come valori */
	this.getFields = function () {
		return fields;
	};

	///////////////////// NOTICES ////////////////////

	const noticed = [];
	/** Aggiunge (o aggiorna) un notice ad un field (se esiste) */
	this.putNotice = function (field, notice) {
		if (fields.hasOwnProperty(field)) {
			const input = fields[field];
			if (input.parent().find("p").length === 0)
				input.parent().append("<p></p>");
			input.parent().find("p").html(notice);
			if (noticed.indexOf(field) === -1)
				noticed.push(field);
		} else
			console.log(querySelector + ": \"" + field + "\" not found in putNotice");
	};

	/** Rimuove il notice (se presente) di un field (se esiste). */
	this.clearNotice = function (field) {
		if (fields.hasOwnProperty(field)) {
			fields[field].parent().find("p").remove();
			const ind = noticed.indexOf(field);
			if (ind >= 0)
				noticed.splice(ind, 1);
		} else
			console.log(querySelector + ": \"" + field + "\" not found in clearNotice");
	};

	this.getNoticeds = function () {
		return noticed;
	};

	///////////////// EQUALS SUPPORT /////////////////

	const spiati = [];
	for (const spia in validator.rules) {
		for (const lr in validator.rules[spia]) {
			if (lr === "equals") {
				const spiato = validator.rules[spia][lr];
				if (spiati[spiato] === undefined)
					spiati[spiato] = [];
				spiati[spiato].push(spia);
			}
		}
	}
	/*
	spiati = [
		"password": ["copassword"]
	]
	*/

	//////////////////// ISPEZIONI ///////////////////

	/** Array che contiene i nomi dei fields. */
	const inspectingFields = [];
	/** Valida immediatamente il field (se esiste), e se non c'è nessuno che sbircia, si aggiunge al keyup. */
	this.inspectField = function (field) {
		if (fields.hasOwnProperty(field)) {
			// Il field esiste
			const fieldDOM = fields[field];
			// Viene validato immediatamente
			validateField(field, fieldDOM, validator.rules[field]);
			// E se non lo fa nessun'altro...
			if (!inspectingFields.includes(field)) {
				// ... ora lo facciamo noi
				inspectingFields.push(field);
				// Verrà validato ad ogni keyup
				fieldDOM.keyup(function () {
					validateField(field, fieldDOM, validator.rules[field]);
				});
			}
		} else
			console.log(querySelector + ": \"" + field + "\" not found in inspectField");
	};

	const thisHandle = this;
	for (const field in fields) {
		const input = fields[field];
		input.one("blur", function () {
			thisHandle.inspectField(field)
		});
	}

	/////////////////// VALIDATION ///////////////////

	function validateField(inputName, input, rule) {
		const val = input.val().trim();

		if (rule.hasOwnProperty("minlength") && rule.hasOwnProperty("maxlength") &&
			(val.length < rule.minlength || val.length > rule.maxlength)) {
			thisHandle.putNotice(inputName, "Minimo " + rule.minlength + " massimo " +
				rule.maxlength + " caratteri");
		} else if (rule.hasOwnProperty("minlength") && val.length < rule.minlength)
			thisHandle.putNotice(inputName, "Minimo " + rule.minlength + " caratteri");
		else if (rule.hasOwnProperty("maxlength") && val.length > rule.maxlength)
			thisHandle.putNotice(inputName, "Massimo " + rule.maxlength + " caratteri");
		else if (rule.hasOwnProperty("exp") && rule.hasOwnProperty("expErr") && !val.match(rule.exp))
			thisHandle.putNotice(inputName, rule.expErr);
		else if (rule.hasOwnProperty("equals") && rule.hasOwnProperty("equalsErr") && val !== fields[rule.equals].val())
			thisHandle.putNotice(inputName, rule.equalsErr);
		else
			thisHandle.clearNotice(inputName);
		// Aggiorna chi mi spia
		if (spiati[inputName] !== undefined) {
			for (const spia of spiati[inputName]) {
				validateField(spia, fields[spia], validator.rules[spia])
			}
		}
		// Blocca o sblocca il submit
		if (thisHandle.isValid())
			enableSubmit();
		else
			disableSumbit();
	}

	this.validate = function () {
		// Valido tutti i field (sfruttando la validazione istantanea di inspectField)
		// e metto delle spie a controllare se d'ora in poi i valori cambieranno
		for (const field in thisHandle.getFields())
			thisHandle.inspectField(field);
	};

	this.isValid = function () {
		// Il form è valido solo se non ci sono notices
		return thisHandle.getNoticeds().length === 0;
	};

	///////////////////// SUBMIT /////////////////////

	function disableSumbit() {
		form.find("input[type='submit']").attr("disabled", "");
	}

	function enableSubmit() {
		form.find("input[type='submit']").removeAttr("disabled");
	}

	///////////////////// ONCLICK ////////////////////

	form.submit(function (e) {
		thisHandle.validate();
		if (thisHandle.isValid()) {
			disableSumbit();
			alert("OK");
			// enableSubmit();
		} else {
			e.preventDefault();
		}
	});

}