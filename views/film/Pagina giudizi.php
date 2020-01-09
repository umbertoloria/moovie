<?php
$films = @$_REQUEST["films"];
$giudizi = @$_REQUEST["giudizi"];
if (count($giudizi) > 0) {
	?>
	<div class="dashboard">
		<label>Giudizi</label>
		<ul class="foto_pv">
			<?php
			foreach ($giudizi as $giudizio) {
				assert($giudizio instanceof Giudizio);
				$film = $films[$giudizio->getFilm()];
				assert($film instanceof Film);
				?>
				<li>
					<a href='/film.php?id=<?php echo $film->getID(); ?>'>
						<img src='/image.php?kind=movie&id=<?php echo $film->getID(); ?>' alt=''/>
						<span><?php echo $film->getTitolo(); ?></span>
					</a>
					<div>
						<a><?php echo $giudizio->getVoto(); ?></a>
						<a data-action="edit" data-id="<?php echo $film->getID(); ?>">Edit</a>
						<a href="/controllers/film/Rimuovi giudizio.php?film_id=<?php echo $film->getID(); ?>"
						   data-confirm>Drop</a>
					</div>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
	<script>
		$(".dashboard [data-action='edit']").click(function () {
			$.get("/controllers/film/Form di modifica giudizio.php", "film_id=" + $(this).attr("data-id"), function (output) {
				Overlay.popup(output);
			});
		});
	</script>
	<?php
} else {
	echo "<h1>Non ci sono giudizi</h1>";
}