<?php
include "parts/initial_page.php";
$logged_user = Auth::getLoggedUser();
if ($logged_user) {
	$films = FilmManager::suggest_me($logged_user->getID());
	if (!empty($films)) {
		// $film = $films[rand(0, count($films) - 1)];
		?>
		<div class="dashboard">
			<label>Film che potrebbero piacerti</label>
			<ul class="foto_pv">
				<?php
				$films = FilmManager::suggest_me($logged_user->getID());
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
} else {
	echo "<h1>Accedi per usare questa funzionalità</h1>";
}