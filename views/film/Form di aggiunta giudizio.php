<form class="form" id="form_di_aggiunta_giudizio" method="post" action="/controllers/film/Aggiungi%20film%20guardato.php">
	<input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>"/>
	<fieldset>
		<label>
			<span>Voto</span>
			<select class="input" name="voto">
				<?php
				for ($i = 1; $i <= 10; ++$i)
					echo "<option value='$i'>$i</option>";
				?>
			</select>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Aggiungi"/>
</form>
<script>
	new Form(
		"#form_di_aggiunta_giudizio",
		JSON.parse("<?php echo Validator\decode("../forms/aggiunta_e_modifica_giudizio.json"); ?>")
	);
</script>