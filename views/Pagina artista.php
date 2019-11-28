<?php
$artista = $_REQUEST["artista"];
assert($artista instanceof Artista);
?>
<section>

	<div id="presentation">
		<img src="image.php?kind=artist&id=<?php echo $artista->getID(); ?>" alt=""/>
		<div>
			<h1> <?php echo $artista->getNome(); ?> </h1>
			<span> <?php echo $artista->getNascita(); ?> </span>
			<p> <?php echo $artista->getDescrizione(); ?></p>
		</div>
	</div>

	<?php
	$recitazioni = RecitazioneManager::doRetrieveByAttore($artista->getID());
	$regie = RegiaManager::doRetrieveByRegista($artista->getID());

	// Composing films cache
	$films = [];
	foreach ($recitazioni as $recitazione) {
		if (!array_key_exists($recitazione->getFilm(), $films)) {
			$films[$recitazione->getFilm()] = FilmManager::doRetrieveByID($recitazione->getFilm());
		}
	}
	foreach ($regie as $regia) {
		if (!array_key_exists($regia->getFilm(), $films)) {
			$films[$regia->getFilm()] = FilmManager::doRetrieveByID($regia->getFilm());
		}
	}

	$orders = ["Recitazioni", "Regie"];
	if (count($recitazioni) == 0)
		unset($orders[0]);
	if (count($regie) == 0)
		unset($orders[1]);
	if (count($orders) == 2)
		if (count($recitazioni) < count($regie))
			$orders = array_reverse($orders);

	foreach ($orders as $order) {

		echo "<div class='group'>";
		echo "<label>{$order}</label>";
		echo "<ul>";
		if ($order === "Recitazioni") {
			foreach ($recitazioni as $recitazione) {
				$id_film = $films[$recitazione->getFilm()]->getID();
				$titolo_film = $films[$recitazione->getFilm()]->getTitolo();
				echo "<li>";
				echo "<a href='films.php?id=$id_film'>";
				echo "<img src='image.php?kind=movie&id=$id_film' alt=''/>";
				echo "<span>{$recitazione->getPersonaggio()}</span>";
				echo "<span>$titolo_film</span>";
				echo "</a>";
				echo "</li>";
			}
		} else {
			foreach ($regie as $regia) {
				$id_film = $films[$regia->getFilm()]->getID();
				$titolo_film = $films[$regia->getFilm()]->getTitolo();
				echo "<li>";
				echo "<a href='films.php?id=$id_film'>";
				echo "<img src='image.php?kind=movie&id=$id_film' alt=''/>";
				echo "<span>$titolo_film</span>";
				echo "</a>";
				echo "</li>";
			}
		}

		echo "</ul>";
		echo "</div>";


	}

	// COLLEGHI PIù COLLEGATI

	?>
</section>