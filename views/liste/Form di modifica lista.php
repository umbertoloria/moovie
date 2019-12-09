<?php
$lista = @$_REQUEST["lista"];
assert($lista instanceof Lista);
?>
<form class="form" id="form_di_modifica_lista" method="post" action="/controllers/liste/Modifica%20lista.php">
	<input type="hidden" name="list_id" value="<?php echo $lista->getID(); ?>"/>
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" class="input" name="nome" placeholder="Nome" value="<?php echo $lista->getNome(); ?>"
			       autocomplete="off"/>
		</label>
		<label>
			<span>Visibilità</span>
			<select class="input" name="visibilità">
				<option value="tutti"
					<?php echo $lista->getVisibilità() === "tutti" ? "selected" : ""; ?>>Tutti
				</option>
				<option value="amici"
					<?php echo $lista->getVisibilità() === "amici" ? "selected" : ""; ?>>Amici
				</option>
				<option value="solo_tu"
					<?php echo $lista->getVisibilità() === "solo_tu" ? "selected" : ""; ?>>Solo tu
				</option>
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