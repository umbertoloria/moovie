<?php
// FIXME: Far arrivare tramite $_REQUEST[...];
$uri = $_SERVER["REQUEST_URI"];
$logged_user = Auth::getLoggedUser();
?>
<menu>
	<ul>
		<li <?php echo $uri === "/___classifica_film.php" ? " class='active'" : ""; ?>>
			<a href='/___classifica_film.php'>Classifica dei film</a>
		</li>
		<?php
		if ($logged_user) {
			?>
			<li>
				<a>Suggeriscimi un film</a>
			</li>
			<li <?php echo $uri == "/___film_da_guardare.php" ? " class='active'" : ""; ?>>
				<a href='/___film_da_guardare.php'>Film da guardare</a>
			</li>
			<li <?php echo $uri == "/film_guardati.php" ? " class='active'" : ""; ?>>
				<a href='/film_guardati.php'>Film guardati</a>
			</li>
			<li <?php echo $uri == "/___amici.php" ? " class='active'" : ""; ?>>
				<a href='/___amici.php'>
					Amici
					<?php
					// FIXME: Non sprecare memoria
					$numero_richieste_da_accettare = 0;
					foreach (AmiciziaManager::getRequests($logged_user->getID()) as $richiesta)
						if ($richiesta->getUtenteFrom() !== $logged_user->getID())
							$numero_richieste_da_accettare++;
					if ($numero_richieste_da_accettare > 0)
						echo "<span>$numero_richieste_da_accettare</span>";
					unset($numero_richieste_da_accettare);
					?>
				</a>
			</li>
			<li>
				<a>Le liste</a>
				<ul>
					<?php
					foreach (ListaManager::getAllOf($logged_user->getID()) as $lista) {
						echo "<li";
						if ($uri == "/lista.php?id={$lista->getID()}")
							echo " class='active'";
						echo ">";
						echo "<a href='/lista.php?id={$lista->getID()}'>";
						echo $lista->getNome();
						// FIXME: Evitare di sprecare memoria!
						echo "<span>" . count(ListaManager::getFilmsOf($lista->getID())) . "</span>";
						echo "</a></li>";
					}
					?>
					<li class="add-more <?php echo $uri == "/creazione_lista.php" ? "active" : ""; ?>">
						<a href="/creazione_lista.php">
							+ lista
						</a>
					</li>
				</ul>
			</li>
		<?php
		// FIXME: Non sprecare memoria!
		$num_suggerimenti = count(AmiciziaManager::getSuggestionsTo($logged_user->getID()));
		if ($num_suggerimenti > 0) {
		?>
			<li>
				<a data-action='retrieve_film_suggestions'>
					Suggerimenti
					<span><?php echo $num_suggerimenti; ?></span>
				</a>
			</li>
			<script>
				$("a[data-action='retrieve_film_suggestions']").click(function () {
					$.get("/controllers/amicizie/Visualizza suggerimenti di film.php", function (output) {
						Overlay.popup(output);
					});
				});
			</script>
			<?php
		}
			unset($num_suggerimenti);
		}
		?>
	</ul>
	<ul>
		<?php
		$logged_user = Auth::getLoggedUser();
		if (!$logged_user) {
			?>
			<li <?php echo $uri == "/accesso.php" ? "class='active'" : ""; ?>>
				<a href="/accesso.php">Accesso</a>
			</li>
			<li <?php echo $uri == "/registrazione.php" ? "class='active'" : ""; ?>>
				<a href="/registrazione.php">Registrazione</a>
			</li>
			<?php
		} else {
			?>
			<li class="userli <?php echo Formats\startswith("/utente.php", $uri) ? "active" : ""; ?>">
				<a href="/utente.php?id=<?php echo $logged_user->getID(); ?>">
					<?php echo $logged_user->getNome() . " " . $logged_user->getCognome(); ?>
				</a>
			</li>
			<li <?php echo $uri == "/___impostazioni.php" ? "class='active'" : ""; ?>>
				<a href="/___impostazioni.php">Impostazioni</a>
			</li>
			<li>
				<a href="/controllers/accounts/___logout.php">Esci</a>
			</li>
			<?php
		}
		unset($logged_user);
		?>
	</ul>
</menu>