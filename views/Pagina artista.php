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
	$recitazioni = $_REQUEST["recitazioni"];
	$regie = $_REQUEST["regie"];
	$films = $_REQUEST["films"];

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
				assert($recitazione instanceof Recitazione);
				$film = $films[$recitazione->getFilm()];
				assert($film instanceof Film);
				echo "<li>";
				echo "<a href='film.php?id={$film->getID()}'>";
				echo "<img src='image.php?kind=movie&id={$film->getID()}' alt=''/>";
				echo "<span>{$recitazione->getPersonaggio()}</span>";
				echo "<span>{$film->getTitolo()}</span>";
				echo "</a>";
				echo "</li>";
			}
		} else {
			foreach ($regie as $regia) {
				assert($regia instanceof Regia);
				$film = $films[$regia->getFilm()];
				assert($film instanceof Film);
				echo "<li>";
				echo "<a href='film.php?id={$film->getID()}'>";
				echo "<img src='image.php?kind=movie&id={$film->getID()}' alt=''/>";
				echo "<span>{$film->getTitolo()}</span>";
				echo "</a>";
				echo "</li>";
			}
		}
		echo "</ul>";
		echo "</div>";
	}
	// TODO: colleghi più collegati
	?>
</section>