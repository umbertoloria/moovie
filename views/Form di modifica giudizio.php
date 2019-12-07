<form class="form" id="form_di_modifica_giudizio" method="post" action="/controllers/film/Modifica film guardato.php">
	<input type="hidden" name="film_id" value="<?php echo $_REQUEST["film_id"]; ?>"/>
	<fieldset>
		<label>
			<span>Voto</span>
			<select class="input" name="voto">
				<?php
				for ($i = 1; $i <= 10; ++$i) {
					if ($_REQUEST["selected"] == $i)
						echo "<option value='$i' selected>$i</option>";
					else
						echo "<option value='$i'>$i</option>";
				}
				?>
			</select>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Modifica"/>
</form>
<script>
	new Form(
		"#form_di_modifica_giudizio",
		JSON.parse("<?php echo Validator\decode("../forms/aggiunta_e_modifica_giudizio.json"); ?>")
	);
</script>