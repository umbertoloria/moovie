<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
$artisti = $_REQUEST["artisti"];
$recitazioni = $_REQUEST["recitazioni"];
$registi = $_REQUEST["registi"];
?>
<form class="form" method="post" action="/controllers/gestione/Aggiornamento artisti in film.php">
	<h1>Aggiorna i partecipanti</h1>
	<fieldset>
		<input type="hidden" name="film_id" value="<?php echo $film->getID(); ?>"/>
		<label for="none" class="fullrow">
			<span>Recitazioni</span>
			<div class="rows" data-name="recitazioni">
				<?php
				$i = 1;
				foreach ($recitazioni as $recitazione) {
					assert($recitazione instanceof Recitazione);
					echo "<div class='r2'>";
					echo "<select class='input' name='rec_{$i}_att'>";
					foreach ($artisti as $artista) {
						assert($artista instanceof Artista);
						if ($artista->getID() === $recitazione->getAttore())
							echo "<option value='{$artista->getID()}' selected>{$artista->getNome()}</option>";
						else
							echo "<option value='{$artista->getID()}'>{$artista->getNome()}</option>";
					}
					echo "</select>";
					echo "<input type='text' class='input' name='rec_{$i}_per' placeholder='Personaggio' value='{$recitazione->getPersonaggio()}'/>";
					echo "<a class='deleter'>X</a>";
					echo "</div>";
					$i++;
				}
				?>
				<a class="adder">+</a>
			</div>
		</label>
		<label for="none" class="fullrow">
			<span>Regie</span>
			<div class="rows" data-name="regie">
				<?php
				$i = 1;
				foreach ($registi as $regista) {
					echo "<div>";
					echo "<select class='input' name='reg_$i'>";
					foreach ($artisti as $artista) {
						assert($artista instanceof Artista);
						if ($artista->getID() == $regista)
							echo "<option value='{$artista->getID()}' selected>{$artista->getNome()}</option>";
						else
							echo "<option value='{$artista->getID()}'>{$artista->getNome()}</option>";
					}
					echo "</select>";
					echo "<a class='deleter'>X</a>";
					echo "</div>";
					$i++;
				}
				?>
				<a class="adder">+</a>
			</div>
		</label>
	</fieldset>
	<input type="submit" class="button" value="Aggiorna"/>
</form>
<script>
	$(".rows[data-name='recitazioni'] .adder").click(function () {
		const last_row = $(this).prev();
		let new_num = 1;
		if (last_row.length > 0) {
			const last_name = $(this).prev().find("select").attr("name");
			new_num = parseInt(last_name.split("_")[1]) + 1;
		}
		const to_insert = $("<div class='r2'>" +
			"<select class='input' name='rec_" + new_num + "_att'>" +
			<?php
			foreach ($artisti as $artista) {
				assert($artista instanceof Artista);
				echo "\"<option value='{$artista->getID()}'>{$artista->getNome()}</option>\" +\n";
			}
			?>
			"</select>" +
			"<input type='text' class='input' name='rec_" + new_num + "_per' placeholder='Personaggio'/>" +
			"<div class='deleter'>X</div>" +
			"</div>");
		if (last_row.length > 0)
			to_insert.insertAfter(last_row);
		else
			$(this).parent().prepend(to_insert);
	});

	$(".rows[data-name='recitazioni']").on("click", ".deleter", function () {
		$(this).parent().remove();
	});

	$(".rows[data-name='regie'] .adder").click(function () {
		const last_row = $(this).prev();
		let new_num = 1;
		if (last_row.length > 0) {
			const last_name = $(this).prev().find("select").attr("name");
			new_num = parseInt(last_name.split("_")[1]) + 1;
		}
		const to_insert = $("<div>" +
			"<select class='input' name='reg_" + new_num + "'>" +
			<?php
			foreach ($artisti as $artista) {
				assert($artista instanceof Artista);
				echo "\"<option value='{$artista->getID()}'>{$artista->getNome()}</option>\" +\n";
			}
			?>
			"</select>" +
			"<div class='deleter'>X</div>" +
			"</div>");
		if (last_row.length > 0)
			to_insert.insertAfter(last_row);
		else
			$(this).parent().prepend(to_insert)
	});

	$(".rows[data-name='regie']").on("click", ".deleter", function () {
		$(this).parent().remove();
	});
</script>