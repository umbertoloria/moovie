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
						<a href="/controllers/film/Rimuovi%20promemoria.php?film_id=<?php echo $film->getID(); ?>"
						   data-confirm>Drop</a>
					</div>
				</li>
				<?php
			} ?>
		</ul>
	</div>
	<?php
} else {
	echo "<h1>Non ci sono promemoria</h1>";
}