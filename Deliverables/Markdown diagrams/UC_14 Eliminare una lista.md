sequenceDiagram
title: Eliminare una lista

Logged User->>Lista (Boundary): delete()
activate Logged User

activate Lista (Boundary)
Lista (Boundary)->>Elimina Lista (Control): delete_list(list_id)

activate Elimina Lista (Control)
Elimina Lista (Control)->>Lista Manager: is_owner(user_id, list_id)
activate Lista Manager
deactivate Lista Manager

Elimina Lista (Control)->>Lista Manager: delete_list(list_id)
activate Lista Manager
deactivate Lista Manager

Elimina Lista (Control)->>Success (Boundary): create()
activate Success (Boundary)
Success (Boundary) -->> Elimina Lista (Control): boundary_list
deactivate Success (Boundary)
Elimina Lista (Control)->>Success (Boundary): show()

deactivate Crea Lista (Control)

deactivate Crea Lista (Boundary)

deactivate Logged User
