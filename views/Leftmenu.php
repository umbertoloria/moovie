<?php
$pagename = $_REQUEST["pagename"];
$tipo_utente = $_REQUEST["tipo_utente"];
assert(in_array($tipo_utente, ["ospite", "normale", "gestore"]));
$active = "class='active'";
?>
	<menu>
		<ul>
			<li <?php echo $pagename == "classifica film" ? $active : ""; ?>>
				<a href='/classifica_film.php'>Classifica dei film</a>
			</li>
			<?php
			if ($tipo_utente != "ospite") {
				?>
				<li <?php echo $pagename == "suggerimenti automatici" ? $active : ""; ?>>
					<a href='/suggerimenti_automatici.php'>Suggeriscimi un film</a>
				</li>
				<li <?php echo $pagename == "giudizi" ? $active : ""; ?>>
					<a href='/giudizi.php'>Giudizi</a>
				</li>
				<li <?php echo $pagename == "promemoria" ? $active : ""; ?>>
					<a href='/promemoria.php'>
						Promemoria
						<?php
						if ($_REQUEST["numero_promemoria"] > 0)
							echo "<span>" . $_REQUEST["numero_promemoria"] . "</span>";
						?>
					</a>
				</li>
				<li <?php echo $pagename == "amici" ? $active : ""; ?>>
					<a href='/amici.php'>
						Amici
						<?php
						if ($_REQUEST["numero_richieste_da_accettare"] > 0)
							echo "<span>" . $_REQUEST["numero_richieste_da_accettare"] . "</span>";
						?>
					</a>
				</li>
				<?php
				if ($tipo_utente == "gestore") {
					?>
					<li>
						<a>Gestisci...</a>
						<ul>
							<li <?php echo $pagename == "aggiungi film" ? $active : ""; ?>>
								<a href="/aggiungi_un_film.php">+ film</a>
							</li>
							<li <?php echo $pagename == "aggiungi artista" ? $active : ""; ?>>
								<a href="/aggiungi_un_artista.php">+ artista</a>
							</li>
							<li <?php echo $pagename == "aggiungi genere" ? $active : ""; ?>>
								<a href="/aggiungi_un_genere.php">+ genere</a>
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
			if ($tipo_utente != "ospite") {
				?>
				<li class="userli <?php echo $pagename == "profilo" ? "active" : ""; ?>">
					<a href="/utente.php?id=<?php echo $_REQUEST["id_utente"]; ?>">
						<?php echo $_REQUEST["nome_completo_utente"]; ?>
					</a>
				</li>
				<li <?php echo $pagename == "cambia password" ? $active : ""; ?>>
					<a href="/cambia_password.php">Cambia password</a>
				</li>
				<li>
					<a href="/controllers/account/Uscita.php">Esci</a>
				</li>
				<?php
			} else {
				?>
				<li <?php echo $pagename == "accesso" ? $active : ""; ?>>
					<a href="/accesso.php">Accesso</a>
				</li>
				<li <?php echo $pagename == "registrazione" ? $active : ""; ?>>
					<a href="/registrazione.php">Registrazione</a>
				</li>
				<?php
			}
			?>
		</ul>
	</menu>
<?php
unset($pagename);
unset($tipo_utente);
unset($active);
?>