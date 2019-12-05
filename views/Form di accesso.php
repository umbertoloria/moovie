<section>
	<form id="form_di_accesso" method="post" action="/controllers/Accesso.php">
		<fieldset>
			<label>
				<span>Indirizzo E-Mail</span>
				<input type="email" class="input" name="email" placeholder="Indirizzo E-Mail" autocomplete="off"/>
			</label>
			<label>
				<span>Password</span>
				<input type="password" class="input" name="password" placeholder="Password" autocomplete="off"/>
			</label>
		</fieldset>
		<input type="submit" class="button" value="Accedi"/>
	</form>
</section>
<script>
	new Form(
		"#form_di_accesso",
		JSON.parse("<?php echo Validator\decode("forms/accesso.json"); ?>")
	);
</script>