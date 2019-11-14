sequenceDiagram
title: Creare una lista

Utente Autenticato->>Crea Lista (Boundary): submit(nome, films, visibilità)
activate Utente Autenticato
deactivate Utente Autenticato

activate Crea Lista (Boundary)
Crea Lista (Boundary)->>Crea Lista (Control): creaLista(nome, films, visibilità)
deactivate Crea Lista (Boundary)

activate Crea Lista (Control)
Crea Lista (Control)->>Lista Manager: controlloNumFilm(films)
activate Lista Manager
deactivate Lista Manager

Crea Lista (Control)->>Lista Manager: controlloNome(nome)
activate Lista Manager
deactivate Lista Manager

Crea Lista (Control)->>Lista Manager: creaLista(nome, films, visibilità)
activate Lista Manager
Lista Manager-->>Crea Lista (Control): lista
deactivate Lista Manager

Crea Lista (Control)-->>Crea Lista (Boundary): redirect pagina lista
deactivate Crea Lista (Control)
