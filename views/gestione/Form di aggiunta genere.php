<form class="form" id="form_di_aggiunta_genere" method="post"
      action="/controllers/gestione/Aggiungi genere.php">
	<h1>Aggiungi un genere</h1>
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome"/>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Aggiungi"/>
</form>
<script>
	new Form(
		"#form_di_aggiunta_genere",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_genere.json"); ?>")
	);
</script>