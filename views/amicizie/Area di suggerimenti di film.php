<?php
$suggerimenti = @$_REQUEST["suggerimenti"];
if (empty($suggerimenti))
	die("Non ci sono suggerimenti");
$films = @$_REQUEST["films"];
$users = @$_REQUEST["users"];
?>
<div class="suggerimenti">
	<ul>
		<?php
		foreach ($suggerimenti as $suggerimento) {
			assert($suggerimento instanceof SuggerimentoFilm);
			$film = $films[$suggerimento->getFilm()];
			assert($film instanceof Film);
			$user = $users[$suggerimento->getUtenteFrom()];
			assert($user instanceof Utente);
			echo "<li>";
			echo "<span>";
			echo "<a href='/utente.php?id={$user->getID()}'>{$user->getNome()} {$user->getCognome()}</a>";
			echo " ti suggerisce ";
			echo "<a href='/film.php?id={$film->getID()}'>{$film->getTitolo()}</a>";
			echo "</span>";
			echo "<a data-action='drop' data-user-id='{$user->getID()}' data-film-id='{$film->getID()}'>OK</a>";
			echo "</li>";
		}
		?>
	</ul>
</div>
<script>
	$(".suggerimenti a[data-action='drop']").click(function () {
		const li = $(this).closest("li");
		const user_id = $(this).attr("data-user-id");
		const film_id = $(this).attr("data-film-id");
		$.get("/controllers/amicizie/___suggerimento_visto.php", "user_id=" + user_id + "&film_id=" + film_id, function (output) {
			if (output === "ok") {
				li.remove();
				const menu_item = $("menu a[data-action='retrieve_film_suggestions']");
				const menu_item_span = menu_item.find("span");
				const new_count = parseInt(menu_item_span.html()) - 1;
				if (new_count > 0)
					menu_item_span.html(new_count);
				else {
					menu_item.parent().remove();
					Overlay.close();
				}
			} else
				alert(output);
		});
	});
</script>