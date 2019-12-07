<?php
$films = @$_REQUEST["films"];
$films_da_guardare = @$_REQUEST["films_da_guardare"];
if (count($films_da_guardare) > 0) {
	echo "<div class='dashboard'>";
	echo "<label>Film da guardare</label>";
	echo "<ul class='foto_pv'>";
	foreach ($films_da_guardare as $film_da_guardare) {
		assert($film_da_guardare instanceof FilmDaGuardare);
		$film = $films[$film_da_guardare->getFilm()];
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