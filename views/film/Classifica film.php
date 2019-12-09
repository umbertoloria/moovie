<?php
$films_voti = $_REQUEST["films_voti"];
?>
<div class='dashboard'>
	<label>Film da guardare</label>
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
				echo "<div>";
				echo "<label>";
				echo $voto;
				echo "</label>";
				echo "</div>";
				echo "</li>";
			}
		}
		?>
	</ul>
</div>