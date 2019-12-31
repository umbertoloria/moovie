<?php
$utente = $_REQUEST["utente"];
assert($utente instanceof Utente);
$show_actions = @$_REQUEST["show_actions"];
?>
	<header>
		<div class="right">
			<h1><?php echo $utente->getNome() . " " . $utente->getCognome(); ?></h1>
			<?php
			if (!empty($show_actions)) {
				echo "<div class='actions'>";
				if (in_array("request_friendship", $show_actions))
					echo "<a data-action='request_friendship'>Invia richiesta di amicizia</a>";
				if (in_array("remove_friendship_request", $show_actions))
					echo "<a data-action='remove_friendship_request'>Cancella la richiesta di amicizia</a>";
				if (in_array("accept_friendship", $show_actions))
					echo "<a data-action='accept_friendship'>Accetta richiesta di amicizia</a>";
				if (in_array("refuse_friendship", $show_actions))
					echo "<a data-action='refuse_friendship'>Rifiuta richiesta di amicizia</a>";
				if (in_array("remove_friendship", $show_actions))
					echo "<a data-action='remove_friendship'>Cancella l'amicizia</a>";
				echo "</div>";
			}
			?>
		</div>
	</header>
<?php
if (!empty($show_actions)) {
	?>
	<script>

		<?php if (in_array("request_friendship", $show_actions)) { ?>
		$(".actions a[data-action='request_friendship']").click(function () {
			$.get("/controllers/amicizie/Richiedi amicizia.php", "to_user_id=<?php echo $utente->getID(); ?>", function (output) {
				if (output === "ok")
					location.href = "/conferma_richiesta_amicizia_inviata.php";
				else
					Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("remove_friendship_request", $show_actions)) { ?>
		$(".actions a[data-action='remove_friendship_request']").click(function () {
			$.get("/controllers/amicizie/Cancella richiesta amicizia.php", "to_user_id=<?php echo $utente->getID(); ?>", function (output) {
				if (output === "ok")
					location.href = "/conferma_richiesta_amicizia_cancellata.php";
				else
					Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("accept_friendship", $show_actions)) { ?>
		$(".actions a[data-action='accept_friendship']").click(function () {
			$.get("/controllers/amicizie/Accetta richiesta amicizia.php", "from_user_id=<?php echo $utente->getID(); ?>", function (output) {
				if (output === "ok")
					location.href = "/conferma_richiesta_amicizia_accettata.php";
				else
					Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("refuse_friendship", $show_actions)) { ?>
		$(".actions a[data-action='refuse_friendship']").click(function () {
			$.get("/controllers/amicizie/Rifiuta richiesta amicizia.php", "from_user_id=<?php echo $utente->getID(); ?>", function (output) {
				if (output === "ok")
					location.href = "/conferma_richiesta_amicizia_rifiutata.php";
				else
					Overlay.popup(output);
			});
		});
		<?php } ?>

		<?php if (in_array("remove_friendship", $show_actions)) { ?>
		$(".actions a[data-action='remove_friendship']").click(function () {
			$.get("/controllers/amicizie/Cancella amicizia.php", "with_user_id=<?php echo $utente->getID(); ?>", function (output) {
				if (output === "ok")
					location.href = "/conferma_amicizia_cancellata.php";
				else
					Overlay.popup(output);
			});
		});
		<?php } ?>

	</script>
	<?php
}