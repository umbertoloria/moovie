<?php
$artista = $_REQUEST["artista"];
assert($artista instanceof Artista);
?>
<form class="form" id="form_di_modifica_artista" method="post"
      action="/controllers/gestione/___form_di_modifica_artista.php" enctype="multipart/form-data">
	<h1>Modifica <a href="/artista.php?id=<?php echo $artista->getID(); ?>"><?php echo $artista->getNome(); ?></a></h1>
	<fieldset>
		<input type="hidden" name="artista_id" value="<?php echo $artista->getID(); ?>"/>
		<label>
			<span>Nome e cognome</span>
			<input type="text" class="input" name="nome" placeholder="Nome e cognome"
			       value="<?php echo $artista->getNome(); ?>"/>
		</label>
		<label>
			<span>Data di nascita</span>
			<input type="date" class="input" name="nascita" placeholder="Data di nascita (giorno/mese/anno)"
			       value="<?php echo $artista->getNascita(); ?>"/>
		</label>
		<label>
			<span>Faccia (non aggiorna se vuoto)</span>
			<input type="file" class="input" name="faccia" placeholder="Faccia"/>
		</label>
		<label class="fullrow">
			<span>Descrizione</span>
			<textarea class="input" name="descrizione"
			          placeholder="Descrizione"><?php echo $artista->getDescrizione(); ?></textarea>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Modifica"/>
</form>
<script>
	new Form(
		"#form_di_modifica_artista",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_artista.json"); ?>")
	);
</script>