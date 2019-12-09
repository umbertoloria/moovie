<?php
$id = trim(@$_REQUEST["id"]);
$nome = trim(@$_REQUEST["nome"]);
$visibilità = trim(@$_REQUEST["visibilità"]);
?>
<form class="form" id="form_di_modifica_lista" method="post" action="/controllers/liste/Modifica lista.php">
	<input type="hidden" name="list_id" value="<?php echo $id; ?>"/>
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome" value="<?php echo $nome; ?>"
			       autocomplete="off"/>
		</label>
		<label>
			<span>Visibilità</span>
			<select class="input" name="visibilità">
				<option value="tutti" <?php echo $visibilità === "tutti" ? "selected" : ""; ?>>Tutti</option>
				<option value="amici" <?php echo $visibilità === "amici" ? "selected" : ""; ?>>Amici</option>
				<option value="solo_tu" <?php echo $visibilità === "solo_tu" ? "selected" : ""; ?>>Solo tu</option>
			</select>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Modifica"/>
</form>
<script>
	new Form(
		"#form_di_modifica_lista",
		JSON.parse("<?php echo Validator\decode("forms/creazione_e_modifica_lista.json"); ?>")
	);
</script>