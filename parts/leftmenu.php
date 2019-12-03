<?php
$uri = $_SERVER["REQUEST_URI"];
?>
<menu>
	<ul>
		<li>
			<a>Suggeriscimi un film</a>
		</li>
		<li <?php echo $uri == "/___film_da_guardare.php" ? "class='active'" : ""; ?>>
			<a href="/___film_da_guardare.php">Film da guardare</a>
		</li>
		<li <?php echo $uri == "/___film_guardati.php" ? "class='active'" : ""; ?>>
			<a href="/___film_guardati.php">Film guardati</a>
		</li>
		<li>
			<a>Le liste</a>
			<ul>
				<li>
					<a>Migliori film a colori</a>
				</li>
				<li>
					<a>Migliori horror</a>
				</li>
				<li>
					<a>Migliori drammatici</a>
				</li>
				<li>
					<a>Top 10 Marvel</a>
				</li>
				<li>
					<a>Top 10 DC</a>
				</li>
				<li class="add-more">
					<a href="/creazione_lista.php">+ lista</a>
				</li>
			</ul>
		</li>
	</ul>
	<ul>
		<?php
		$logged_user = Auth::getLoggedUser();
		if ($logged_user === null) {
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
				<a href="/controllers/___logout.php">Esci</a>
			</li>
			<?php
		}
		unset($logged_user);
		?>
	</ul>
</menu>