<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
$show_actions = @$_REQUEST["show_actions"];
?>
	<header>
		<div class="left">
			<img src="/image.php?kind=movie&id=<?php echo $film->getID(); ?>" alt=""/>
		</div>
		<div class="right">
			<h1><?php echo $film->getTitolo(); ?></h1>
			<?php
			if (!empty($show_actions)) {
				echo "<div class='actions'>";
				if (in_array("suggest", $show_actions))
					echo "<a data-action='suggest'>Suggerisci agli amici</a>";
				if (in_array("add_film_guardato", $show_actions))
					echo "<a data-action='add_film_guardato'>+ Film guardati</a>";
				if (in_array("add_film_da_guardare", $show_actions))
					echo "<a data-action='add_film_da_guardare'>+ Film da guardare</a>";
				if (in_array("add_to_liste", $show_actions))
					echo "<a data-action='add_to_liste'>+ Liste</a>";
				echo "</div>";
			}
			?>
			<div class="tags">
				<span><?php echo $film->getAnno(); ?></span>
				<span><?php echo Formats\durata($film->getDurata()); ?></span>
				<?php
				$generi = $_REQUEST["generi"];
				foreach ($generi as $genere) {
					assert($genere instanceof Genere);
					echo "<a href='/genere.php?id={$genere->getID()}'>";
					echo "{$genere->getNome()}";
					echo "</a>";
				}
				?>
			</div>
			<p><?php echo $film->getDescrizione(); ?></p>
		</div>
	</header>
<?php
$recitazioni = $_REQUEST["recitazioni"];
$registi = $_REQUEST["registi"];
$artisti = $_REQUEST["artisti"];

$orders = ["Recitazioni", "Regie"];
foreach ($orders as $order) {
	echo "<div class='dashboard'>";
	echo "<label>{$order}</label>";
	echo "<ul class='foto_pv'>";
	if ($order === "Recitazioni") {
		foreach ($recitazioni as $recitazione) {
			assert($recitazione instanceof Recitazione);
			$artista = $artisti[$recitazione->getAttore()];
			assert($artista instanceof Artista);
			echo "<li>";
			echo "<a href='/artista.php?id={$artista->getID()}'>";
			echo "<img src='/image.php?kind=artist&id={$artista->getID()}' alt=''/>";
			echo "<span>{$recitazione->getPersonaggio()}</span>";
			echo "<span>{$artista->getNome()}</span>";
			echo "</a>";
			echo "</li>";
		}
	} else {
		foreach ($registi as $regia) {
			$artista = $artisti[$regia];
			assert($artista instanceof Artista);
			echo "<li>";
			echo "<a href='/artista.php?id={$artista->getID()}'>";
			echo "<img src='/image.php?kind=artist&id={$artista->getID()}' alt=''/>";
			echo "<span>{$artista->getNome()}</span>";
			echo "</a>";
			echo "</li>";
		}
	}
	echo "</ul>";
	echo "</div>";
}
// TODO: film più collegati
if (!empty($show_actions)) {
	?>
	<script>

		<?php if (in_array("suggest", $show_actions)) { ?>
		$(".actions a[data-action='suggest']").click(function () {
			$.get("/controllers/amicizie/___form_di_selezione_amici_da_suggerire.php", "film_id=<?php echo $film->getID(); ?>", function (output) {
				Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("add_film_guardato", $show_actions)) { ?>
		$(".actions a[data-action='add_film_guardato']").click(function () {
			$.get("/controllers/film/___form_di_aggiunta_giudizio.php", "id=<?php echo $film->getID(); ?>", function (output) {
				Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("add_film_da_guardare", $show_actions)) { ?>
		$(".actions a[data-action='add_film_da_guardare']").click(function () {
			location.href = "/controllers/film/___aggiungi_film_da_guardare.php?film_id=<?php echo $film->getID(); ?>";
		});
		<?php } ?>

		<?php if (in_array("add_to_liste", $show_actions)) { ?>
		$(".actions a[data-action='add_to_liste']").click(function () {
			$.get("/controllers/liste/___form_di_aggiornamento_presenza_film_in_liste.php", "id=<?php echo $film->getID(); ?>", function (output) {
				Overlay.popup(output);
			});
		});
		<?php } ?>

	</script>

	<?php
}