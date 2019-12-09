<?php
$testi_visibilità = [
	"tutti" => "Tutti",
	"amici" => "Amici",
	"solo_tu" => "Solo tu",
];
$lista = $_REQUEST["lista"];
assert($lista instanceof Lista);
$films = $_REQUEST["films"];
$show_actions = @$_REQUEST["show_actions"];
?>
<header>
	<div class="right">
		<h1><?php echo $lista->getNome(); ?></h1>
		<div class="tags">
			<span><?php echo $testi_visibilità[$lista->getVisibilità()]; ?></span>
		</div>
		<?php
		if (!empty($show_actions)) {
			echo "<div class='actions'>";
			if (in_array("follow", $show_actions))
				echo "<a data-action='follow'>Segui</a>";
			if (in_array("modify", $show_actions))
				echo "<a data-action='modify'>Modifica</a>";
			if (in_array("delete", $show_actions))
				echo "<a data-action='delete'>Cancella</a>";
			echo "</div>";
		}
		if (count($lista->getFilms()) === 0)
			echo "<p>La lista è vuota</p>";
		?>
	</div>
</header>
<?php
if (count($lista->getFilms()) > 0) {
	?>
	<div class="dashboard">
		<label>Film</label>
		<ul class="foto_pv">
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
<script>

	<?php if (in_array("follow", $show_actions)) { ?>
	$(".actions a[data-action='follow']").click(function () {
		// TODO: implementami ti prego :-(
	});
	<?php } ?>

	<?php if (in_array("modify", $show_actions)) { ?>
	$(".actions a[data-action='modify']").click(function () {
		$.get("/controllers/liste/___form_di_modifica_lista.php", "lista_id=<?php echo $lista->getID(); ?>", function (output) {
			Overlay.popup(output);
		});
	});
	<?php } ?>

	<?php if (in_array("delete", $show_actions)) { ?>
	$(".actions a[data-action='delete']").click(function () {
		location.href = "/controllers/liste/Cancella lista.php?list_id=<?php echo $lista->getID(); ?>";
	});
	<?php } ?>

</script>