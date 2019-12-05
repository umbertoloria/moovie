<?php
$lista = $_REQUEST["lista"];
assert($lista instanceof Lista);
$films = $_REQUEST["films"];
$logged_user = Auth::getLoggedUser();
assert($logged_user);
$testi_visibilità = [
	"tutti" => "Tutti",
	"amici" => "Amici",
	"solo_tu" => "Solo tu",
];
?>
<section>
	<div id="title">
		<h1><?php echo $lista->getNome(); ?></h1>
		<div class="tags">
			<span><?php echo $testi_visibilità[$lista->getVisibilità()]; ?></span>
		</div>
		<?php
		if (count($lista->getFilms()) === 0)
			echo "<p>La lista è vuota</p>";
		?>
	</div>
	<?php
	if (count($lista->getFilms()) > 0) {
		?>
		<div class='group'>
			<label>Film</label>
			<ul>
				<?php
				foreach ($lista->getFilms() as $film_id) {
					$film = $films[$film_id];
					assert($film instanceof Film);
					echo "<li>";
					echo "<a href='/film.php?id={$film->getID()}'>";
					echo "<img src='/image.php?kind=movie&id={$film->getID()}' alt=''/>";
					echo "<span>{$film->getTitolo()}</span>";
					echo "</a>";
					echo "</li>";
				}
				?>
			</ul>
		</div>
		<?php
	}
	?>
</section>