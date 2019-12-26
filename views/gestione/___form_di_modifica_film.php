<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
?>
<form class="form" id="form_di_modifica_film" method="post" action="/controllers/gestione/___form_di_modifica_film.php">
	<h1>Modifica <a href="/film.php?id=<?php echo $film->getID(); ?>"><?php echo $film->getTitolo(); ?></a></h1>
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $film->getID(); ?>"/>
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
			       if ($ore)
				       $ore = "0$ore";
			       $minuti = $film->getDurata() % 60;
			       echo "$ore:$minuti";
			       ?>"/>
		</label>
		<label>
			<span>Anno</span>
			<input type="number" class="input" name="anno" placeholder="Anno" value="<?php echo $film->getAnno(); ?>"/>
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
		JSON.parse("<?php echo Validator\decode("forms/modifica_film.json"); ?>")
	);
</script>