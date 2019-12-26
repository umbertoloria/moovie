<?php
$film = $_REQUEST["film"];
$generi = $_REQUEST["generi"];
$film_generi = $_REQUEST["film_generi"];
?>
<form class="form" method="post" action="/controllers/gestione/___form_di_aggiornamento_generi_in_film.php">
	<h1>Modifica il genere</h1>
	<fieldset>
		<input type="hidden" name="film_id" value="<?php echo $film->getID(); ?>"/>
		<label for="none" class="fullrow">
			<span>Generi</span>
			<div class="checkboxes">
				<?php
				foreach ($generi as $genere) {
					assert($genere instanceof Genere);
					echo "<label>";
					if (in_array($genere->getID(), $film_generi))
						echo "<input type='checkbox' name='gen_{$genere->getID()}' checked/>";
					else
						echo "<input type='checkbox' name='gen_{$genere->getID()}'/>";
					echo $genere->getNome();
					echo "</label>";
				}
				?>
			</div>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Aggiorna"/>
</form>