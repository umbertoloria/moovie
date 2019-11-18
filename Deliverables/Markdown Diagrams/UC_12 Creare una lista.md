sequenceDiagram
title: Creare una lista

Logged User->>Crea Lista (Boundary): create(name, visibility, films[])
activate Logged User

activate Crea Lista (Boundary)
Crea Lista (Boundary)->>Crea Lista (Control): create_list(name, visibility, films[])

activate Crea Lista (Control)
Crea Lista (Control)->>Lista Manager: not exists(user_id, name)
activate Lista Manager
deactivate Lista Manager

Crea Lista (Control)->>Lista Manager: create_list(name, visibility, films[])
activate Lista Manager
Lista Manager-->>Crea Lista (Control): list
deactivate Lista Manager

Crea Lista (Control)->>Lista (Boundary): create()
activate Lista (Boundary)
Lista (Boundary)-->>Crea Lista (Control): boundary_list
deactivate Lista (Boundary)
Crea Lista (Control)->>Lista (Boundary): show(list)
activate Lista (Boundary)
deactivate Lista (Boundary)

deactivate Crea Lista (Control)

deactivate Crea Lista (Boundary)

deactivate Logged User
