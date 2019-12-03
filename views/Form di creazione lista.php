<section>
	<form id="form_di_creazione_lista" method="post" action="/controllers/Liste.php">
		<fieldset>
			<label>
				<span>Nome</span>
				<input type="text" class="input" name="nome" placeholder="Nome" autocomplete="off"/>
			</label>
			<label>
				<span>Visibilità</span>
				<select class="input" name="visibilità">
					<option value="x">Tutti</option>
					<option value="y">Amici</option>
					<option value="solo_tu">Solo tu</option>
				</select>
			</label>
		</fieldset>
		<input type="submit" value="Crea"/>
	</form>
</section>
<script>
	new Form(
		"#form_di_creazione_lista",
		JSON.parse("<?php echo Validator\decode("forms/creazione_lista.json"); ?>")
	);
</script>