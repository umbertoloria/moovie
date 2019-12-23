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
			<li <?php echo $uri == "/giudizi.php" ? " class='active'" : ""; ?>>
				<a href='/giudizi.php'>Giudizi</a>
			</li>
			<li <?php echo $uri == "/___promemoria.php" ? " class='active'" : ""; ?>>
				<a href='/___promemoria.php'>
					Promemoria
					<?php
					$numero_promemoria = count(PromemoriaManager::get($logged_user->getID()));
					if ($numero_promemoria > 0)
						echo "<span>$numero_promemoria</span>";
					unset($numero_promemoria);
					?>
				</a>
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
			<?php
			if ($logged_user->isGestore()) {
				?>
				<li>
					<a>Gestisci...</a>
					<ul>
						<li <?php echo $uri == "/___aggiungi_un_film.php" ? " class='active'" : ""; ?>>
							<a href="/___aggiungi_un_film.php">+ film</a>
						</li>
						<li <?php echo $uri == "/___aggiungi_un_artista.php" ? " class='active'" : ""; ?>>
							<a href="/___aggiungi_un_artista.php">+ artista</a>
						</li>
					</ul>
				</li>
				<?php
			}
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