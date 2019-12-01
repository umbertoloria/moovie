<?php
$genere = $_REQUEST["genere"];
assert($genere instanceof Genere);
// TODO: implementami plz (ricontrolla anche /genere.php già che ci sei hihihi)
?>
<section>
	<?php echo $genere->getNome(); ?>
</section>