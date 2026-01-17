# Tetuan League

## Autores
- Álvaro Redondo Rubio  
- Jorge Parrondo  
- Mario Andrés  

---

## Descripción
Aplicación web desarrollada en PHP para gestionar una pequeña liga de fútbol.

---

## Mejoras

### Obligatorias
- Mecanismo de control de acceso mediante usuario y contraseña verificados en la BBDD.
- Cierre automático de sesión por inactividad durante 10 minutos.
- Cierre de sesión accesible en cualquier momento.
- Vista personalizada adecuada a los datos de cada usuario.
- Contenido visible únicamente para usuarios con la sesión iniciada.

### Optativas
- Sistema de registro de nuevos usuarios tanto por parte del propio usuario como por parte del administrador desde la ventana de gestión de usuarios.
- Formulario de modificación de datos tanto por parte del administrador como por parte del usuario.
- Vista de invitado limitada.

### 🛠️ Optativas personalizadas
- Hasheo automático de contraseñas al registrar usuarios y al insertar los usuarios de prueba.
- Sistema gestor de noticias (añadir, eliminar, editar y visualizar).
- Sistema de modales (ventanas emergentes) en ambos paneles de administración para confirmar cambios, inserciones y eliminaciones.

---

## Base de datos

###Creación
- Script de creación e inserción en "/dat/basededatos.sql"
- Las contraseñas se insertan hasheadas automáticamente, no es necesario un script adicional

###Conexión
- Configurable en "/app/config.php"
- database_name = tetuan_league
- database_user = root
- database_password = 
- server_db = localhost
- Consultas en "/app/AccesoDatos.php"