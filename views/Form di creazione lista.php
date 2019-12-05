<section>
	<form id="form_di_creazione_lista" method="post" action="/controllers/Liste.php">
		<fieldset>
			<input type="hidden" name="kind" value="create"/>
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
</section>
<script>
	new Form(
		"#form_di_creazione_lista",
		JSON.parse("<?php echo Validator\decode("forms/creazione_lista.json"); ?>")
	);
</script>