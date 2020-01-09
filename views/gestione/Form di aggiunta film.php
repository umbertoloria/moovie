<form class="form" id="form_di_aggiunta_film" method="post" action="/controllers/gestione/Aggiungi film.php"
      enctype="multipart/form-data">
	<h1>Aggiungi un film</h1>
	<fieldset>
		<label>
			<span>Titolo</span>
			<input type="text" class="input" name="titolo" placeholder="Titolo"/>
		</label>
		<label>
			<span>Durata</span>
			<input type="number" class="input" name="durata" min="1" placeholder="Durata (minuti)"/>
		</label>
		<label>
			<span>Anno</span>
			<input type="number" class="input" name="anno" placeholder="Anno"/>
		</label>
		<label>
			<span>Copertina</span>
			<input type="file" class="input" name="copertina" placeholder="Copertina"/>
		</label>
		<label class="fullrow">
			<span>Descrizione</span>
			<textarea class="input" name="descrizione" placeholder="Descrizione"></textarea>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Aggiungi"/>
</form>
<script>
	new Form(
		"#form_di_aggiunta_film",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_film.json"); ?>")
	);
</script>