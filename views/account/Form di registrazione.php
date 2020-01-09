<form class="form" id="form_di_registrazione" method="post" action="/controllers/account/Registrazione.php">
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome"/>
		</label>
		<label>
			<span>Cognome</span>
			<input type="text" class="input" name="cognome" placeholder="Cognome"/>
		</label>
		<label>
			<span>Indirizzo E-Mail</span>
			<input type="email" class="input" name="email" placeholder="Indirizzo E-Mail"/>
		</label>
		<label>
			<span>Password</span>
			<input type="password" class="input" name="password" placeholder="Password"/>
		</label>
		<label>
			<span>Conferma password</span>
			<input type="password" class="input" name="copassword" placeholder="Conferma password"/>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Registrati"/>
</form>
<script>
	new Form(
		"#form_di_registrazione",
		JSON.parse("<?php echo Validator\decode("forms/registrazione.json"); ?>")
	);
</script>