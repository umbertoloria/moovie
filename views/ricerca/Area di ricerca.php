<?php
if ($_SERVER["PHP_SELF"] === "/controllers/ricerca/Ricerca.php") {
	// FIXME: injections
	$kind_default = @$_GET["kind"];
	$fulltext_default = @$_GET["fulltext"];
} else {
	$kind_default = "film";
	$fulltext_default = "";
}
?>
<form id="area_di_ricerca" method="get" action="/controllers/ricerca/Ricerca.php">
	<div>
		<input type="hidden" name="kind"/>
		<label></label>
		<ul>
			<li data-select-value="tutti"
				<?php echo $kind_default === "tutti" ? "data-select-default" : ""; ?>>Tutti
			</li>
			<li data-select-value="film"
				<?php echo $kind_default === "film" ? "data-select-default" : ""; ?>>Film
			</li>
			<li data-select-value="artisti"
				<?php echo $kind_default === "artisti" ? "data-select-default" : ""; ?>>Artisti
			</li>
			<?php
			if ($_REQUEST["search_users_too"]) {
				echo "<li data-select-value='utenti'";
				echo $kind_default === "utenti" ? " data-select-default" : "";
				echo ">Utenti</li>";
			}
			?>
		</ul>
	</div>
	<input type="text" name="fulltext" placeholder="Ricerca..."
	       value="<?php echo $fulltext_default; ?>"/>
	<input type="submit" value="Cerca"/>
</form>
<script>
	$("#area_di_ricerca > div").dropdown_selecter();
	// Per usare la ricerca, il campo "fulltext" non deve essere vuoto
	const area_di_ricerca_form = $("#area_di_ricerca");
	const area_di_ricerca_fulltext = area_di_ricerca_form.find("[name='fulltext']");
	const area_di_ricerca_submit = area_di_ricerca_form.find("[type='submit']");
	area_di_ricerca_fulltext.keyup(function () {
		if ($(this).val().trim() === "")
			area_di_ricerca_submit.attr("disabled", "");
		else
			area_di_ricerca_submit.removeAttr("disabled");
	});
	area_di_ricerca_form.submit(function (e) {
		if (area_di_ricerca_fulltext.val().trim() === "") {
			area_di_ricerca_submit.attr("disabled", "");
			area_di_ricerca_fulltext.focus();
			e.preventDefault();
		}
	});
</script>