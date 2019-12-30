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
				if (in_array("add_giudizio", $show_actions))
					echo "<a data-action='add_giudizio'>+ giudizi</a>";
				if (in_array("add_promemoria", $show_actions))
					echo "<a href='/controllers/film/Aggiungi promemoria.php?film_id={$film->getID()}'>+ promemoria</a>";
				if (in_array("update", $show_actions))
					echo "<a href='/___modifica_un_film.php?id={$film->getID()}'>modifica</a>";
				if (in_array("delete", $show_actions))
					echo "<a href='/controllers/gestione/___rimuovi_film.php?film_id={$film->getID()}' data-confirm>rimuovi</a>";
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
if (count($recitazioni) == 0)
	unset($orders[0]);
if (count($registi) == 0)
	unset($orders[1]);
if (count($orders) == 2)
	if (count($recitazioni) < count($registi))
		$orders = array_reverse($orders);
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
if (!empty($show_actions)) {
	?>
	<script>
		<?php if (in_array("add_giudizio", $show_actions)) { ?>
		$(".actions a[data-action='add_giudizio']").click(function () {
			$.get("/controllers/film/Form di aggiunta giudizio.php", "film_id=<?php echo $film->getID(); ?>", function (output) {
				Overlay.popup(output);
			});
		});
		<?php } ?>
	</script>
	<?php
}