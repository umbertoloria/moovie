sequenceDiagram
title: Creare un account

Guest->>Registrazione (Boundary): register(name, surname, email, pwd, pwd2, advisor)
activate Guest

activate Registrazione (Boundary)
Registrazione (Boundary)->>Registrazione (Control): register(name, surname, email, pwd, pwd2, advisor)

activate Registrazione (Control)
Registrazione (Control)->>Utente Manager: not exists(email)
activate Utente Manager
deactivate Utente Manager

Registrazione (Control)->>Utente Manager: create_user(name, surname, email, pwd, pwd2, advisor)
activate Utente Manager

Utente Manager->>Utente: create(name, surname, email, pwd, pwd2, advisor)
activate Utente
Utente-->>Utente Manager: user
deactivate Utente

Utente Manager-->>Registrazione (Control): user
deactivate Utente Manager

Registrazione (Control)->>Home Page (Boundary): create()
activate Home Page (Boundary)
Home Page (Boundary)-->>Registrazione (Control): boundary_home_page
deactivate Home Page (Boundary)
Registrazione (Control)->>Home Page (Boundary): show()
activate Home Page (Boundary)
deactivate Home Page (Boundary)

deactivate Registrazione (Control)

deactivate Registrazione (Boundary)

deactivate Guest