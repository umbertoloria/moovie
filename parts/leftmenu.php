<?php
$uri = $_SERVER["REQUEST_URI"];
$logged_user = Auth::getLoggedUser();
?>
<menu>
	<ul>
		<?php
		echo "<li><a href='/classifica_film.php'>Classifica dei film</a></li>";
		if ($logged_user) {

			echo "<li><a>Suggeriscimi un film</a></li>";

			echo "<li" . ($uri == "/___film_da_guardare.php" ? " class='active'" : "") . ">";
			echo "<a href='/___film_da_guardare.php'>Film da guardare</a></li>";

			echo "<li" . ($uri == "/film_guardati.php" ? " class='active'" : "") . ">";
			echo "<a href='/film_guardati.php'>Film guardati</a></li>";

			echo "<li>";
			echo "<a>Le liste</a>";
			echo "<ul>";
			$liste = ListaManager::getAllOf($logged_user->getID());
			foreach ($liste as $lista) {
				$films = ListaManager::getFilmsOf($lista->getID());
				echo "<li>";
				echo "<a href='/lista.php?id={$lista->getID()}'>";
				echo $lista->getNome();
				echo "<span>" . count($films) . "</span>";
				echo "</a>";
				echo "</li>";
			}
			echo "<li class='add-more'>";
			echo "<a href='/creazione_lista.php'>";
			echo "+ lista</a></li>";
			echo "</ul>";
			echo "</li>";
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
			assert($logged_user instanceof Utente);
			?>
			<li class="userli <?php echo Formats\startswith("/utente.php", $uri) ? "active" : ""; ?>">
				<a href="/utente.php?id=<?php echo $logged_user->getID(); ?>">
					<?php echo $logged_user->getNome() . " " . $logged_user->getCognome(); ?>
				</a>
			</li>
			<li>
				<a>Impostazioni</a>
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