<?php
$utente = $_REQUEST["utente"];
assert($utente instanceof Utente);
?>
<section>
	<h1><?php echo $utente->getNome() . " " . $utente->getCognome(); ?></h1>
</section>