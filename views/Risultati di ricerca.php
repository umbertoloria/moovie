<section>
	<div id="risultati_di_ricerca">
		<div class="risultati">
			<?php
			$risultati = $_REQUEST["risultati"];
			// risultati film
			$generi = @$_REQUEST["generi"];
			$film_generi = @$_REQUEST["film_generi"];
			$artisti = @$_REQUEST["artisti"];
			$film_artisti = @$_REQUEST["film_artisti"];
			// risultati artista
			$films = @$_REQUEST["films"];
			$artista_films = @$_REQUEST["artista_films"];
			if (count($risultati) > 0) {
				foreach ($risultati as $risultato) {
					echo "<div>";
					if ($risultato instanceof Film) {
						?>
						<div>
							<a href="/film.php?id=<?php echo $risultato->getID(); ?>">
								<img src="/image.php?kind=movie&id=<?php echo $risultato->getID(); ?>" alt=""/>
							</a>
							<div>
								<h1>
									<a href="/film.php?id=<?php echo $risultato->getID(); ?>">
										<?php echo $risultato->getTitolo(); ?>
									</a>
								</h1>
								<div class='tags'>
									<span><?php echo $risultato->getAnno(); ?></span>
									<?php
									if (array_key_exists($risultato->getID(), $film_generi)) {
										foreach ($film_generi[$risultato->getID()] as $genere_id) {
											$genere = $generi[$genere_id];
											assert($genere instanceof Genere);
											echo "<a href='/genere.php?id={$genere->getID()}'>{$genere->getNome()}</a>";
										}
									}
									?>
								</div>
							</div>
						</div>
						<div>
							<?php
							if (isset($film_artisti[$risultato->getID()])) {
								foreach ($film_artisti[$risultato->getID()] as $artista_id) {
									$artista = $artisti[$artista_id];
									assert($artista instanceof Artista);
									echo "<a href='/artista.php?id={$artista->getID()}'>";
									echo $artista->getNome();
									echo "</a>";
								}
							}
							?>
						</div>
						<?php
					} elseif ($risultato instanceof Artista) {
						?>
						<div>
							<a href="/artista.php?id=<?php echo $risultato->getID(); ?>">
								<img src="/image.php?kind=artist&id=<?php echo $risultato->getID(); ?>" alt=""/>
							</a>
							<div>
								<h1>
									<a href="/artista.php?id=<?php echo $risultato->getID(); ?>">
										<?php echo $risultato->getNome(); ?>
									</a>
								</h1>
								<div class='tags'>
									<span><?php echo Formats\data($risultato->getNascita()); ?></span>
								</div>
							</div>
						</div>
						<div>
							<?php
							if (isset($artista_films[$risultato->getID()])) {
								foreach ($artista_films[$risultato->getID()] as $film_id) {
									$film = $films[$film_id];
									assert($film instanceof Film);
									echo "<a href='/film.php?id={$film->getID()}'>";
									echo $film->getTitolo();
									echo "</a>";
								}
							}
							?>
						</div>
						<?php
					} elseif ($risultato instanceof Utente) {
						// TODO: implementami ti prego (insieme al mio amico in /controllers/Ricerca.php)
					}
					echo "</div>";
				}
			} else {
				echo "<p>Nessun risultato trovato</p>";
			}
			?>
		</div>
		<div class="filtri"></div>
	</div>
</section>