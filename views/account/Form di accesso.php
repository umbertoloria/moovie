<form class="form" id="form_di_accesso" method="post" action="/controllers/account/Accesso.php">
	<fieldset>
		<label>
			<span>Indirizzo E-Mail</span>
			<input type="email" class="input" name="email" placeholder="Indirizzo E-Mail"/>
		</label>
		<label>
			<span>Password</span>
			<input type="password" class="input" name="password" placeholder="Password"/>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Accedi"/>
</form>
<script>
	new Form(
		"#form_di_accesso",
		JSON.parse("<?php echo Validator\decode("forms/accesso.json"); ?>")
	);
</script>