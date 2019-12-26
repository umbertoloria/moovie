<?php
$giudizi = @$_REQUEST["giudizi"];
$utenti = @$_REQUEST["utenti"];
$films = @$_REQUEST["films"];
if ($utenti)
	echo "<h1>Attività</h1>";
echo "<div id='timeline'>";
foreach ($giudizi as $giudizio) {
	$film = $films[$giudizio->getFilm()];
	assert($film instanceof Film);
	?>
	<div>
		<span><?php echo $giudizio->getVoto(); ?></span>
		<p>
			<a href="/film.php?id=<?php echo $film->getID(); ?>">
				<?php echo $film->getTitolo(); ?>
			</a>
			<?php
			if ($utenti) {
				$utente = $utenti[$giudizio->getUtente()];
				assert($utente instanceof Utente);
				?>
				visto da
				<a href="/utente.php?id=<?php echo $utente->getID(); ?>">
					<?php echo $utente->getNome() . " " . $utente->getCognome(); ?>
				</a>
				<?php
			}
			?>
		</p>
		<time>
			<?php
			$fields = explode(" ", $giudizio->getTimestamp());
			echo Formats\data($fields[0]) . " alle " . substr($fields[1], 0, 5);
			?>
		</time>
	</div>
	<?php
}
echo "</div>";