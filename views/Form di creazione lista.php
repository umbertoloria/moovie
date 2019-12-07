<form class="form" id="form_di_creazione_lista" method="post" action="/controllers/liste/Crea lista.php">
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome" autocomplete="off"/>
		</label>
		<label>
			<span>Visibilità</span>
			<select class="input" name="visibilità">
				<option value="tutti">Tutti</option>
				<option value="amici">Amici</option>
				<option value="solo_tu">Solo tu</option>
			</select>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Crea"/>
</form>
<script>
	new Form(
		"#form_di_creazione_lista",
		JSON.parse("<?php echo Validator\decode("forms/creazione_lista.json"); ?>")
	);
</script>