<section>
	<?php
	$films = @$_REQUEST["films"];
	$film_guardati = @$_REQUEST["film_guardati"];
	if (count($film_guardati) > 0) {
		echo "<div class='dashboard'>";
		echo "<label>Film guardati</label>";
		echo "<ul class='foto_pv'>";
		foreach ($film_guardati as $film_guardato) {
			assert($film_guardato instanceof FilmGuardato);
			$film = $films[$film_guardato->getFilm()];
			assert($film instanceof Film);
			echo "<li>";
			echo "<a href='/film.php?id={$film->getID()}'>";
			echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
			echo "<span>{$film->getTitolo()}</span>";
			echo "</a>";
			echo "<label>{$film_guardato->getVoto()}</label>";
			echo "</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	?>
</section>