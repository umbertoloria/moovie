<?php
$genere = $_REQUEST["genere"];
assert($genere instanceof Genere);
$genere_films = @$_REQUEST["genere_films"];
$films = @$_REQUEST["films"];
?>
<section>
	<?php
	if (count($genere_films) > 0) {
		echo "<div class='dashboard'>";
		echo "<label>{$genere->getNome()}</label>";
		echo "<ul class='foto_pv'>";
		foreach ($genere_films as $film_id) {
			$film = $films[$film_id];
			assert($film instanceof Film);
			echo "<li>";
			echo "<a href='/film.php?id={$film->getID()}'>";
			echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
			echo "<span>{$film->getTitolo()}</span>";
			echo "</a>";
			echo "</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	?>
</section>