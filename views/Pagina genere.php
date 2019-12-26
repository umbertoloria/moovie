<?php
$genere = $_REQUEST["genere"];
assert($genere instanceof Genere);
$genere_films = @$_REQUEST["genere_films"];
$films = @$_REQUEST["films"];
$show_actions = $_REQUEST["show_actions"];
?>
	<header>
		<div class="right">
			<h1><?php echo $genere->getNome(); ?></h1>
			<?php
			if (!empty($show_actions)) {
				echo "<div class='actions'>";
				if (in_array("update", $show_actions))
					echo "<a href='/___modifica_un_genere.php?id={$genere->getID()}'>modifica</a>";
				if (in_array("delete", $show_actions))
					echo "<a href='/controllers/gestione/___rimuovi_genere.php?genere_id={$genere->getID()}' data-confirm>rimuovi</a>";
				echo "</div>";
			}
			?>
		</div>
	</header>
<?php
if (count($genere_films) > 0) {
	echo "<div class='dashboard'>";
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
} else {
	echo "<h1>Non esiste nessun film di genere <b>{$genere->getNome()}</b></h1>";
}