<!--
TODO: Se sono in Risultati di ricerca:
	 * il default kind deve essere quello della ricerca attuale
	 * così come anche il campo fulltext
 -->
<form id="area_di_ricerca" method="get" action="/controllers/Ricerca.php">
	<div class="dropdown_selecter">
		<input type="hidden" name="kind" value=""/>
		<label></label>
		<ul>
			<li data-select-value="all">Tutto</li>
			<li data-select-value="movies" data-select-default>Film</li>
			<li data-select-value="artists">Artista</li>
			<li data-select-value="users">Utente</li>
		</ul>
	</div>
	<input type="text" name="fulltext" placeholder="Ricerca..."/>
	<input type="submit" value="Cerca"/>
</form>
<script>
	// TODO: Retrieve throw get("name") instead of creating it
	new DropdownSelecter("#area_di_ricerca > .dropdown_selecter");
</script>