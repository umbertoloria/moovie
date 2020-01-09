<?php
$genere = $_REQUEST["genere"];
assert($genere instanceof Genere);
?>
<form class="form" id="form_di_modifica_genere" method="post" action="/controllers/gestione/Modifica genere.php">
	<h1>Modifica <a href="/genere.php?id=<?php echo $genere->getID(); ?>"><?php echo $genere->getNome(); ?></a></h1>
	<fieldset>
		<input type="hidden" name="genere_id" value="<?php echo $genere->getID(); ?>"/>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome" value="<?php echo $genere->getNome(); ?>"/>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Modifica"/>
</form>
<script>
	new Form(
		"#form_di_modifica_genere",
		JSON.parse("<?php echo Validator\decode("forms/aggiunta_e_modifica_genere.json"); ?>")
	);
</script>