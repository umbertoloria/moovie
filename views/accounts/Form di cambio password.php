<form class="form" id="form_di_cambio_password" method="post" action="/controllers/accounts/Cambio password.php">
	<fieldset>
		<label>
			<span>Password attuale</span>
			<input type="password" class="input" name="cur_pwd" placeholder="Password attuale"/>
		</label>
		<label>
			<span>Nuova password</span>
			<input type="password" class="input" name="new_pwd" placeholder="Nuova password"/>
		</label>
		<label>
			<span>Conferma password</span>
			<input type="password" class="input" name="cnf_pwd" placeholder="Conferma password"/>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Cambio password"/>
</form>
<script>
	new Form(
		"#form_di_cambio_password",
		JSON.parse("<?php echo Validator\decode("forms/cambio_password.json"); ?>")
	);
</script>