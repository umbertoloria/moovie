<form class="form" id="form_di_aggiunta_artista" method="post"
      action="/controllers/gestione/___form_di_aggiunta_artista.php" enctype="multipart/form-data">
	<h1>Aggiungi un artista</h1>
	<fieldset>
		<label>
			<span>Nome e cognome</span>
			<input type="text" class="input" name="nome" placeholder="Nome e cognome"/>
		</label>
		<label>
			<span>Data di nascita</span>
			<input type="date" class="input" name="nascita" placeholder="Data di nascita (giorno/mese/anno)"/>
		</label>
		<label>
			<span>Faccia</span>
			<input type="file" class="input" name="faccia" placeholder="Faccia"/>
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
		"#form_di_aggiunta_artista",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_artista.json"); ?>")
	);
</script>