<?php
$films_voti = $_REQUEST["films_voti"];
?>
<div class='dashboard'>
	<label>Classifica film</label>
	<ul class='foto_pv'>
		<?php
		foreach ($films_voti as $film_voto) {
			$voto = $film_voto[0];
			$film = $film_voto[1];
			assert($film instanceof Film);
			echo "<li>";
			echo "<a href='/film.php?id={$film->getID()}'>";
			echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
			echo "<span>{$film->getTitolo()}</span>";
			echo "</a>";
			if ($voto) {
				echo "<div><a>$voto</a></div>";
			}
			echo "</li>";
		}
		?>
	</ul>
</div>