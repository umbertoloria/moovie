<form method="post" action="/controllers/registrazione.php">
	<fieldset>
		<label>
			<span>Nome</span>
			<input type="text" name="nome" placeholder="Nome"/>
		</label>
		<label>
			<span>Cognome</span>
			<input type="text" name="cognome" placeholder="Cognome"/>
		</label>
		<label>
			<span>Indirizzo E-Mail</span>
			<input type="email" name="email" placeholder="Indirizzo E-Mail"/>
		</label>
		<label>
			<span>Password</span>
			<input type="password" name="password" placeholder="Password"/>
		</label>
		<label>
			<span>Conferma password</span>
			<input type="password" placeholder="Conferma password"/>
		</label>
		<label>
			<span>Indirizzo E-Mail del'utente suggeritore</span>
			<input type="email" name="advisor" placeholder="Indirizzo E-Mail dell'utente suggeritore"/>
		</label>
	</fieldset>
	<input type="submit" value="Registrati"/>
</form>