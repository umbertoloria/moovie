<div id="risultati_di_ricerca">
	<div class="risultati">
		<?php
		$risultati = $_REQUEST["risultati"];
		$generi = $_REQUEST["generi"];
		$artisti = $_REQUEST["artisti"];
		$films = $_REQUEST["films"];

		foreach ($risultati["movies"] as $film_x) {
			$film = $films[$film_x["id"]];
			assert($film instanceof Film);
			?>
			<div>
				<div>
					<a href="/film.php?id=<?php echo $film->getID(); ?>">
						<img src="/image.php?kind=movie&id=<?php echo $film->getID(); ?>" alt=""/>
					</a>
					<div>
						<h1>
							<a href="/film.php?id=<?php echo $film->getID(); ?>">
								<?php echo $film->getTitolo(); ?>
							</a>
						</h1>
						<div class='tags'>
							<span><?php echo $film->getAnno(); ?></span>
							<?php
							foreach ($film_x["generi"] as $genere_id) {
								$genere = $generi[$genere_id];
								assert($genere instanceof Genere);
								echo "<a href='/genere.php?id={$genere->getID()}'>{$genere->getNome()}</a>";
							}
							?>
						</div>
					</div>
				</div>
				<div>
					<?php
					foreach ($film_x["artisti"] as $artista_id) {
						$artista = $artisti[$artista_id];
						assert($artista instanceof Artista);
						echo "<a href='/artista.php?id={$artista->getID()}'>";
						echo $artista->getNome();
						echo "</a>";
					}
					?>
				</div>
			</div>
			<?php
		}

		foreach ($risultati["artists"] as $artista_x) {
			$artista = $artisti[$artista_x["id"]];
			assert($artista instanceof Artista);
			?>
			<div>
				<div>
					<a href="/artista.php?id=<?php echo $artista->getID(); ?>">
						<img src="/image.php?kind=artist&id=<?php echo $artista->getID(); ?>" alt=""/>
					</a>
					<div>
						<h1>
							<a href="/artista.php?id=<?php echo $artista->getID(); ?>">
								<?php echo $artista->getNome(); ?>
							</a>
						</h1>
						<div class='tags'>
							<span><?php echo Formats\data($artista->getNascita()); ?></span>
						</div>
					</div>
				</div>
				<div>
					<?php
					foreach ($artista_x["films"] as $film_id) {
						$film = $films[$film_id];
						assert($film instanceof Film);
						echo "<a href='/film.php?id={$film->getID()}'>";
						echo $film->getTitolo();
						echo "</a>";
					}
					?>
				</div>
			</div>
			<?php
		}

		foreach ($risultati["users"] as $user) {
			assert($user instanceof Utente);
			echo "<a href='/utente.php?id={$user->getID()}'>";
			echo $user->getNome() . " " . $user->getCognome();
			echo "</a>";
		}
		?>
	</div>
	<div class="filtri">
		<!--
		TODO: Implementami plz :-(
		-->
	</div>
</div>