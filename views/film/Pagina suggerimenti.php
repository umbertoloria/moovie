<?php
$films = $_REQUEST["films"];
if (!empty($films)) {
	?>
	<div class="dashboard">
		<label>Film che potrebbero piacerti</label>
		<ul class="foto_pv">
			<?php
			foreach ($films as $film) {
				assert($film instanceof Film);
				?>
				<li>
					<a href='/film.php?id=<?php echo $film->getID(); ?>'>
						<img src='/image.php?kind=movie&id=<?php echo $film->getID(); ?>' alt=''/>
						<span><?php echo $film->getTitolo(); ?></span>
					</a>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
	<?php
} else {
	echo "<h1>Nessun film da suggerire...</h1>";
}