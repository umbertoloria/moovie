<?php
$utente = $_REQUEST["utente"];
assert($utente instanceof Utente);
$liste = $_REQUEST["liste"];
$logged_user = Auth::getLoggedUser();
?>
<header>
	<div class="right">
		<h1><?php echo $utente->getNome() . " " . $utente->getCognome(); ?></h1>
		<?php if ($logged_user) { ?>
			<div class="actions">
				<a data-action="request_friendship">Invia richiesta di amicizia</a>
				<a data-action="accept_friendship">Accetta richiesta di amicizia</a>
				<a data-action="refuse_friendship">Rifiuta richiesta di amicizia</a>
			</div>
		<?php } ?>
	</div>
</header>
<div class="dashboard">
	<label>Liste</label>
	<ul class="info_pv">
		<?php
		foreach ($liste as $lista) {
			assert($lista instanceof Lista);
			echo "<li>";
			echo "<a href='/lista.php?id={$lista->getID()}'>";
			echo $lista->getNome();
			echo "</a>";
			echo "</li>";
		}
		?>
	</ul>
</div>