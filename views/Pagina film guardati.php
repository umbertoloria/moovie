<?php
$films = @$_REQUEST["films"];
$film_guardati = @$_REQUEST["film_guardati"];
if (count($film_guardati) > 0) {
	?>

	<div class="dashboard">
		<label>Film guardati</label>
		<ul class="foto_pv">
			<?php
			foreach ($film_guardati as $film_guardato) {
				assert($film_guardato instanceof FilmGuardato);
				$film = $films[$film_guardato->getFilm()];
				assert($film instanceof Film);
				?>
				<li>
					<a href='/film.php?id=<?php echo $film->getID(); ?>'>
						<img src='/image.php?kind=movie&id=<?php echo $film->getID(); ?>' alt=''/>
						<span><?php echo $film->getTitolo(); ?></span>
					</a>
					<div>
						<label>
							<?php echo $film_guardato->getVoto(); ?>
						</label>
						<label data-action="edit" data-id="<?php echo $film->getID(); ?>">
							Edit
						</label>
						<label data-action="drop" data-id="<?php echo $film->getID(); ?>">
							Drop
						</label>
					</div>
				</li>
				<?php
			}
			?>
		</ul>
	</div>

	<script>
		$(".dashboard label[data-action='edit']").click(function () {
			$.get("/controllers/___modifica_film_guardato.php", "film_id=" + $(this).attr("data-id"), function (output) {
				Overlay.popup(output);
			})
		});
		$(".dashboard label[data-action='drop']").click(function () {
			location.href = "/controllers/___Rimuovi film guardato.php?film_id=" + $(this).attr("data-id");
		});
	</script>

	<?php
} else {
	echo "<p>Non ci sono film</p>";
}