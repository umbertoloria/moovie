<section>
	<form id="form_di_giudizio" method="POST" action="../controllers/Film guardati.php">
		<input type="hidden" name="film_id" value="<?php echo $_REQUEST["film_id"]; ?>"/>
		<fieldset>
			<span>Voto</span>
			<select name="voto">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</fieldset>
		<input type="submit" value="Applica"/>
	</form>
</section>