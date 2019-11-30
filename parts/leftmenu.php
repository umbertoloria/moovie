<?php
$uri = $_SERVER["REQUEST_URI"];
?>
<menu>
	<ul>
		<li <?php echo $uri == "/registrazione.php" ? "class='active'" : ""; ?>>
			<a href="/registrazione.php">Registrazione</a>
		</li>
		<li>
			<a>Suggeriscimi un film</a>
		</li>
		<li>
			<a>Film da guardare</a>
		</li>
		<li>
			<a>Film guardati</a>
		</li>
		<li>
			<a>Le liste</a>
			<ul>
				<li>
					<a href="#">Migliori film a colori</a>
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
					<a>Aggiungi una lista</a>
				</li>
			</ul>
		</li>
	</ul>
	<ul>
		<li>
			<a href="utente.php?id=0">Umberto Loria</a>
		</li>
		<li>
			<a>Impostazioni</a>
		</li>
		<li>
			<a>Esci</a>
		</li>
	</ul>
</menu>