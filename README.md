**Dominio del problema: 

El sistema que se va a desarrollar se impondrá en una clínica dental para suplir una necesidad relacionada con la dificultad para saber el stock de la clínica. Cada vez que se quiere saber cuánta cantidad queda de materiales o utensilios que se usan en la clínica dental, se debe entrar al almacén y realizar la cuenta. Por otro lado, se debe estar pendiente y contar cada poco tiempo todo el stock ya que no se puede quedar la clínica sin algún material y se debe encargar y comprar a los proveedores. El inventario se suele hace una vez al mes y ocupa unas dos horas realizarlo, suelen realizarlo los auxiliares de la clínica. Además, existen 3 o 4 proveedores habituales y sería conveniente saber cuál de ellos tiene el producto que se busca más barato. 
En la clínica trabajarán al menos un odontólogo, un auxiliar, un higienista y un recepcionista. El recepcionista se ocupa de la recepción de los clientes al llegar a la consulta, darle la próxima cita y llamar a los distintos proveedores para hacer los pedidos. El odontólogo es el encargado de atender a los pacientes. El auxiliar se encarga de ayudar al dentista en todo lo que este le pida y sea necesario y contar el stock, haciendo el inventario mensual. Por último, el higienista se encarga de recoger los datos clínicos del paciente, asistir al odontólogo cuando se están realizando tratamientos de boca y realizar los exámenes radiológicos. Existe un administrador jefe de la clínica dental, el propietario, que en la gran mayoría de los casos se trata del odontólogo principal.




**Objetivos: 

El objetivo es desarrollar una aplicación en la que de un simple vistazo pueda observar cuánto stock queda de cada material. De este modo, no sería necesario invertir tanto tiempo contando en el almacén. Esto implica que, cuando se reciba un pedido, se puedan añadir las cantidades recibidas de cada material. Además, el sistema avisará cuando se alcance una cantidad de material concreta, para que se realice la compra de más y no llegar a agotar existencias. Cada vez que se extraiga un material del almacén, en la aplicación se podrá reducir el número de tantas unidades como se hayan extraído. Por otro lado, como existen 3 o 4 proveedores habituales, sería conveniente que, entrando en un material concreto, se pueda observar el precio de cada uno de estos proveedores para comprárselo al más barato.
Por lo tanto, con la creación de esta aplicación queremos solucionar:
•	Gestión del stock en almacén, tener actualizado cuántos productos hay en almacén
•	Gestión de stock, avisar cuando quede poca cantidad para encargar más y que no haya un stock demasiado bajo que pueda dar lugar a inexistencia de un producto.
•	Gestión de precios de proveedores, ver el precio de cada material ofertado por cada proveedor habitual.




**Usuarios del sistema: 

Recepcionista: es el responsable de realizar los pedidos cuando la aplicación le informe que debe hacerlo y compara precios, siempre con la autorización del odontólogo. Es el encargado de verificar que queda stock suficiente y en caso contrario, comprar al proveedor más conveniente la cantidad que le indique el odontólogo.

Odontólogo: usará el sistema en el caso en el que necesiten consultar el stock ya que es el que conoce los materiales usados para cada práctica y las cantidades que debe haber como mínimo de cada uno. Podrá realizar pedidos a los proveedores.

Higienista: usará el sistema en el caso que fuera necesario consultar el stock.

Administrador jefe de la clínica: usará el sistema para controlar el stock de la clínica y que todo funciona bien. También podrá realizar pedidos a los proveedores.

Auxiliar de clínica: puede añadir o reducir las cantidades de los materiales en función si saca o mete algo en el almacén. Es el encargado de realizar el inventario, por lo que añadirá las cantidades recibidas tras realizar un pedido.




**Requisitos de información: 

RI-01. Artículo: el sistema deberá almacenar información sobre los artículos que contiene el almacén, en concreto: id_articulo, nombre, tipo (que podrá tomar valor de una lista de valores predefinidos), cantidad, unidad de medida (que podrá tomar valor de una lista de valores predefinidos, por ejemplo, gramos o mililitros), cantidad mínima.

RI-02. Proveedor: el sistema deberá almacenar información sobre los proveedores, en concreto: nombre de la empresa, dirección, número de teléfono, el email y su página web

RI-03. Odontólogo: el sistema deberá almacenar información sobre los odontólogos, en concreto: nombre, apellidos, DNI, número de teléfono, email, contraseña.

RI-04. Higienista: el sistema deberá almacenar información sobre los higienistas, en concreto: nombre, apellidos, DNI, número de teléfono, email, contraseña.

RI-05. Administrador (jefe): el sistema deberá almacenar información sobre el administrador, en concreto: nombre, apellidos, DNI, número de teléfono, email, contraseña.

RI-06. Auxiliar: el sistema deberá almacenar información sobre los auxiliares, en concreto: nombre, apellidos, DNI, número de teléfono, email, contraseña.

RI-07. Recepcionista: el sistema deberá almacenar información sobre los recepcionistas, en concreto: nombre, apellidos, DNI, número de teléfono, email, contraseña.

RI-08. Pedido: el sistema deberá almacenar información sobre los distintos pedidos, en concreto: número de pedido, fecha de pedido, fecha de recepción, cantidad, quién realiza el pedido

RI-09. Línea Pedido: el sistema deberá almacenar información sobre la línea de pedido, en concreto: precio, cantidad pedida




**Requisitos funcionales:

RF-01. El sistema deberá permitir crear un artículo.

RF-02. El sistema deberá permitir editar un artículo.

RF-03. El sistema deberá permitir borrar un artículo.

RF-04. El sistema deberá permitir ver un listado con los artículos.

RF-05. El sistema deberá permitir guardar un artículo.

RF-06. El sistema deberá permitir mostrar un artículo.

RF-07. El sistema deberá permitir actualizar un artículo.

RF-08. El sistema deberá permitir crear un proveedor.

RF-09. El sistema deberá permitir editar un proveedor.

RF-10. El sistema deberá permitir borrar un proveedor.

RF-11. El sistema deberá permitir ver un listado con los proveedores.

RF-12. El sistema deberá permitir guardar un proveedor.

RF-13. El sistema deberá permitir mostrar un proveedor.

RF-14. El sistema deberá permitir actualizar un proveedor.

RF-15. Aviso sobre cantidad mínima (como recepcionista, administrador y odontólogo): el sistema deberá avisar de que un determinado material ha llegado a la cantidad mínima y hay que comprar más. 

RF-16. Detalle del proveedor (como administrador, odontólogo y recepcionista): el sistema deberá tener de manera accesible el precio para cada material según los 
proveedores que lo tengan disponible.

RF-17. Detalle del artículo: el sistema deberá tener de manera accesible los proveedores que tienen ese artículo concreto

RF-18. El sistema deberá permitir crear un administrador.

RF-19. El sistema deberá permitir editar un administrador.

RF-20. El sistema deberá permitir borrar un administrador.

RF-21. El sistema deberá permitir ver un listado con los administradores.

RF-22. El sistema deberá permitir guardar un administrador.

RF-23. El sistema deberá permitir mostrar un administrador.

RF-24. El sistema deberá permitir actualizar un administrador.

RF-25. El sistema deberá permitir crear un auxiliar.

RF-26. El sistema deberá permitir editar un auxiliar.

RF-27. El sistema deberá permitir borrar un auxiliar.

RF-28. El sistema deberá permitir ver un listado con los auxiliares.

RF-29. El sistema deberá permitir guardar un auxiliar.

RF-30. El sistema deberá permitir mostrar un auxiliar.

RF-31. El sistema deberá permitir actualizar un auxiliar.

RF-32. El sistema deberá permitir crear un odontólogo.

RF-33. El sistema deberá permitir editar un odontólogo.

RF-34. El sistema deberá permitir borrar un odontólogo.

RF-35. El sistema deberá permitir ver un listado con los odontólogos.

RF-36. El sistema deberá permitir guardar un odontólogo.

RF-37. El sistema deberá permitir mostrar un odontólogo.

RF-38. El sistema deberá permitir actualizar un odontólogo.

RF-39. El sistema deberá permitir crear un pedido.

RF-40. El sistema deberá permitir editar un pedido.

RF-41. El sistema deberá permitir borrar un pedido.

RF-42. El sistema deberá permitir ver un listado con los pedidos.

RF-43. El sistema deberá permitir guardar un pedido.

RF-44. El sistema deberá permitir mostrar un pedido.

RF-45. El sistema deberá permitir actualizar un pedido.

RF-46. Detalle del pedido: el sistema deberá tener de manera accesible el proveedor con el que ha realizado ese pedido concreto.

RF-47. Detalle del pedido: el sistema deberá tener de manera accesible la línea de pedido asociada al pedido concreto que se ha realizado.

RF-39. El sistema deberá permitir crear un recepcionista.

RF-40. El sistema deberá permitir editar un recepcionista.

RF-41. El sistema deberá permitir borrar un recepcionista.

RF-42. El sistema deberá permitir ver un listado con los recepcionistas.

RF-43. El sistema deberá permitir guardar un recepcionista.

RF-44. El sistema deberá permitir mostrar un recepcionista.

RF-45. El sistema deberá permitir actualizar un recepcionista.




**Reglas de Negocio: 

RN-01: no puede haber menos de cantidad la cantidad mínima de cada artículo. 

RN-02: la cantidad no puede ser negativa

RN-03: un administrador no puede eliminarse a sí mismo




**Requisitos no funcionales:

RNF-01. Seguridad: el sistema debe estar protegido contra el acceso no autorizado

RNF-02. Actuación: el sistema debe poder manejar el número requerido de usuarios sin ninguna degradación en el rendimiento

RNF-03. Disponibilidad: el sistema debe estar disponible cuando sea necesario

RNF-04. Mantenimiento: el sistema debe ser fácil de mantener y actualizar

RNF-05. Usabilidad: el sistema debe ser fácil de usar y comprender

RNF-06. Compatibilidad: el sistema debe ser compatible con otros sistemas
