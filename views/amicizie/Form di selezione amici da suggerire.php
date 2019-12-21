<?php
$amici = @$_REQUEST["amici"];
assert(count($amici) > 0);
$film_id = @$_REQUEST["film_id"];
?>
<form class="form" id="form_di_selezione_amici_da_suggerire" method="post"
      action="/controllers/amicizie/Suggerimenti amici.php">
	<input type="hidden" name="film_id" value="<?php echo $film_id; ?>"/>
	<div>
		<input type="hidden" name="selected_friends"/>
		<ul>
			<?php
			foreach ($amici as $amico) {
				assert($amico instanceof Utente);
				echo "<li data-select-value='{$amico->getID()}'>";
				echo $amico->getNome() . " " . $amico->getCognome();
				echo "</li>";
			}
			?>
		</ul>
	</div>
	<!-- TODO: disabilita il submit se non selezioni nessun utente da suggerire -->
	<input type="submit" class="button" value="Suggerisci"/>
</form>
<script>
	$("#form_di_selezione_amici_da_suggerire > div").items_selecter();
</script>