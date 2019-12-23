<?php
$films = @$_REQUEST["films"];
$promemorias = @$_REQUEST["promemorias"];
if (count($promemorias) > 0) {
	?>
	<div class="dashboard">
		<label>Promemoria</label>
		<ul class="foto_pv">
			<?php
			foreach ($promemorias as $promemoria) {
				assert($promemoria instanceof Promemoria);
				$film = $films[$promemoria->getFilm()];
				assert($film instanceof Film);
				?>
				<li>
					<a href='/film.php?id=<?php echo $film->getID(); ?>'>
						<img src='/image.php?kind=movie&id=<?php echo $film->getID(); ?>' alt=''/>
						<span><?php echo $film->getTitolo(); ?></span>
					</a>
					<div>
						<label data-action="drop" data-id="<?php echo $film->getID(); ?>">
							Drop
						</label>
					</div>
				</li>
				<?php
			} ?>
		</ul>
	</div>
	<script>
		$(".dashboard label[data-action='drop']").click(function () {
			location.href = "/controllers/film/___rimuovi_promemoria.php?id=" + $(this).attr("data-id");
		});
	</script>
	<?php
} else {
	echo "<p>Non ci sono film</p>";
}