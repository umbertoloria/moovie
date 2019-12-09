<?php
$liste = @$_REQUEST["liste"];
assert(count($liste) > 0);
$id = @$_REQUEST["id"];
$liste_contenenti = @$_REQUEST["liste_contenenti"];
// FIXME: e se non ha ancora nessuna lista?
?>
<form class="form" id="form_di_aggiornamento_presenza_film_in_liste" method="post"
      action="/controllers/liste/Inserisci%20film%20solo%20in%20liste.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
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