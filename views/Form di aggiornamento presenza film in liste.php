<?php
$liste = @$_REQUEST["liste"];
assert(count($liste) > 0);
$film_id = @$_REQUEST["film_id"];
$liste_contenenti = @$_REQUEST["liste_contenenti"];
// FIXME: e se non ha ancora nessuna lista?
?>
<form class="form" id="form_di_aggiornamento_presenza_film_in_liste" method="post" action="/controllers/Inserisci film solo in liste.php">
	<input type="hidden" name="film_id" value="<?php echo $film_id; ?>"/>
	<div>
		<input type="hidden" name="selected_lists"/>
		<ul>
			<?php
			foreach ($liste as $lista) {
				assert($lista instanceof Lista);
				echo "<li data-select-value='{$lista->getID()}'";
				if (in_array($lista->getID(), $liste_contenenti))
					echo " data-selected";
				echo ">{$lista->getNome()}</li>";
			}
			?>
		</ul>
	</div>
	<input type="submit" class="button" value="Aggiorna"/>
</form>
<script>
	$("#form_di_aggiornamento_presenza_film_in_liste > div").items_selecter();
</script>