<?php
$utenti = $_REQUEST["utenti"];
$utente_viewer = $_REQUEST["utente_viewer"];
$amicizie_strette = $_REQUEST["amicizie_strette"];
$amicizie_richieste = $_REQUEST["amicizie_richieste"];
?>
<div class="dashboard">
	<label>Amicizie</label>
	<ul class="info_pv">
		<?php
		foreach ($amicizie_strette as $amicizia) {
			assert($amicizia instanceof Amicizia);
			assert($amicizia->getTimestampAccettazione() !== null);
			$uid = $amicizia->getUtenteFrom() === $utente_viewer
				? $amicizia->getUtenteTo()
				: $amicizia->getUtenteFrom();
			$utente = $utenti[$uid];
			assert($utente instanceof Utente);
			echo "<li>";
			echo "<a href='/utente.php?id={$utente->getID()}'>";
			echo $utente->getNome() . " " . $utente->getCognome();
			echo "</a>";
			echo "</li>";
		}
		?>
	</ul>
</div>
<div class="dashboard">
	<label>Richieste</label>
	<ul class="info_pv">
		<?php
		foreach ($amicizie_richieste as $amicizia) {
			assert($amicizia instanceof Amicizia);
			assert($amicizia->getTimestampAccettazione() === null);
			$uid = $amicizia->getUtenteFrom() === $utente_viewer
				? $amicizia->getUtenteTo()
				: $amicizia->getUtenteFrom();
			$utente = $utenti[$uid];
			assert($utente instanceof Utente);
			echo "<li>";
			echo "<a href='/utente.php?id={$utente->getID()}'>";
			echo $utente->getNome() . " " . $utente->getCognome();
			echo "</a>";
			echo "</li>";
		}
		?>
	</ul>
</div>
