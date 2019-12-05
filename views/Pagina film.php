<?php
$film = $_REQUEST["film"];
assert($film instanceof Film);
$logged_user = Auth::getLoggedUser();
?>

	<section>
		<div id="presentation">
			<img src="/image.php?kind=movie&id=<?php echo $film->getID(); ?>" alt=""/>
			<div>
				<h1><?php echo $film->getTitolo(); ?></h1>
				<?php if ($logged_user) { ?>
					<div class="socialbar">
						<a data-action="suggest">Suggerisci</a>
						<a data-action="add_film_guardato">+ Film guardati</a>
						<a data-action="add_film_da_guardare">+ Film da guardare</a>
						<a data-action="add_to_liste">+ Liste</a>
					</div>
				<?php } ?>
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
		</div>
		<?php
		$recitazioni = $_REQUEST["recitazioni"];
		$registi = $_REQUEST["registi"];
		$artisti = $_REQUEST["artisti"];

		$orders = ["Recitazioni", "Regie"];
		foreach ($orders as $order) {
			echo "<div class='group'>";
			echo "<label>{$order}</label>";
			echo "<ul>";
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
		?>
	</section>
<?php
if ($logged_user) {
	?>
	<script>
		$(".socialbar a[data-action='suggest']").click(function () {
			Overlay.popup("A chi vuoi suggerirlo?");
			// TODO: Scegliere uno o più amici e suggerirgli il film.
		});
		$(".socialbar a[data-action='add_film_guardato']").click(function () {
			// TODO: Chiedere il voto e salvare.
		});
		$(".socialbar a[data-action='add_film_da_guardare']").click(function () {
			// TODO: Salvare.
		});
		$(".socialbar a[data-action='add_to_liste']").click(function () {
			$.get("/controllers/___aggiornamento_presenza_film_in_liste.php", "film_id=<?php echo $film->getID(); ?>", function (x) {
				Overlay.popup(x);
			});
		});
	</script>
	<?php
}
?>