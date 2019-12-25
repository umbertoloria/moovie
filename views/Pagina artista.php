<?php
$artista = $_REQUEST["artista"];
assert($artista instanceof Artista);
?>
	<header>
		<div class="left">
			<img src="/image.php?kind=artist&id=<?php echo $artista->getID(); ?>" alt=""/>
		</div>
		<div class="right">
			<h1><?php echo $artista->getNome(); ?></h1>
			<div class="tags">
				<span><?php echo Formats\data($artista->getNascita()); ?></span>
			</div>
			<p><?php echo $artista->getDescrizione(); ?></p>
		</div>
	</header>
<?php
$recitazioni = $_REQUEST["recitazioni"];
$registi = $_REQUEST["registi"];
$films = $_REQUEST["films"];

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
			$film = $films[$recitazione->getFilm()];
			assert($film instanceof Film);
			echo "<li>";
			echo "<a href='/film.php?id={$film->getID()}'>";
			echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
			echo "<span>{$recitazione->getPersonaggio()}</span>";
			echo "<span>{$film->getTitolo()}</span>";
			echo "</a>";
			echo "</li>";
		}
	} else {
		foreach ($registi as $regia) {
			$film = $films[$regia];
			assert($film instanceof Film);
			echo "<li>";
			echo "<a href='/film.php?id={$film->getID()}'>";
			echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
			echo "<span>{$film->getTitolo()}</span>";
			echo "</a>";
			echo "</li>";
		}
	}
	echo "</ul>";
	echo "</div>";
}