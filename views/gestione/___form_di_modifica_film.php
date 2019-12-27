<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
?>
<form class="form" id="form_di_modifica_film" method="post" action="/controllers/gestione/___form_di_modifica_film.php"
      enctype="multipart/form-data">
	<h1>Modifica <a href="/film.php?id=<?php echo $film->getID(); ?>"><?php echo $film->getTitolo(); ?></a></h1>
	<fieldset>
		<input type="hidden" name="film_id" value="<?php echo $film->getID(); ?>"/>
		<label>
			<span>Titolo</span>
			<input type="text" class="input" name="titolo" placeholder="Titolo"
			       value="<?php echo $film->getTitolo(); ?>"/>
		</label>
		<label>
			<span>Durata</span>
			<input type="time" class="input" name="durata" placeholder="Durata (ore:minuti)"
			       value="<?php
			       $ore = (int)($film->getDurata() / 60);
			       if ($ore <= 9)
				       $ore = "0$ore";
			       $minuti = $film->getDurata() % 60;
			       if ($minuti <= 9)
				       $minuti = "0$minuti";
			       echo "$ore:$minuti";
			       ?>"/>
		</label>
		<label>
			<span>Anno</span>
			<input type="number" class="input" name="anno" placeholder="Anno" value="<?php echo $film->getAnno(); ?>"/>
		</label>
		<label>
			<span>Copertina (non aggiorna se vuoto)</span>
			<input type="file" class="input" name="copertina" placeholder="Copertina"/>
		</label>
		<label class="fullrow">
			<span>Descrizione</span>
			<textarea class="input" name="descrizione"
			          placeholder="Descrizione"><?php echo $film->getDescrizione(); ?></textarea>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Modifica"/>
</form>
<script>
	new Form(
		"#form_di_modifica_film",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_film.json"); ?>")
	);
</script>