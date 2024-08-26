# Version de php 8.2 y base de datos Mysql
  `Se utilizo programacion en PDO`
  `Habilitar en php.ini o en php selector en caso de tener un cpanel la opcion pdo y nd_mysqli`

# Base de datos MySql
  `En la carpeta BD se encuentra el archivo sql de la base de datos, este archivo consta de tres tablas:`
  `sys_register_users - en la cual se guardan los usuarios registrados`
  `sys_tasks - esta tabla se guardan las tareas que vayan creando los usuarios`
  `sys_predefined_routes - en esta tabla se guarda una ruta predeterminada la cual se utiliza para el envio del cuerpo del correo, se utiliza la libreria mailer de php, favor de sustituir pos su ruta de su proyecto`
 
# Archivo de conexion a la base de datos
   `Se encuentra en la carpeta de llamada connection`
   `Servidor: localhost`
   `Usuario: allanadc`
   `Password: -- Aqui va ir tu password de tu server --`
   `Base de datos: allanadc_fonsecantero`
   
# Consultas a la base de datos (SELECT, UPDATE, INSERT INTO, DELETE)
   `En la carpeta llamada querys vienen todos los archivos para extraer, guardar, modificar y desactivar una tarea, son las consultas que ejecutan el backend`
   
# Vistas o interfaz de usuario, aqui se alamacena los formularios
   `En la carpeta llamada views vienen todos los archivos para mostrar al usuario los formularios para guardar, modificar una tarea, etc. El frontend`
   
# Funciones y validaciones javascript y jquery
   `En la carpeta llamada js en el archivo functions.js vienen todas las funciones declaradas para mandar llamar un script para ejecutar un update, insert into, etc` 
   `En la carpeta llamada js en el archivo validate.js vienen todas las validaciones por ejemplo un campo vacio, un campo tipo email, longitud de la contraseña, mensajes de success, danger, etc` 
   
# En la raiz de la carpeta FonseCantero
   `Aqui viene un archivo .htaccess el cual nos permite crear url amigables`
   
# Video y link de pruebas
   `GitHub:`
   `Video de funcionamiento: https://youtu.be/QTHIESfSCPg`
   `Link demo: https://allanad.com/FonseCantero/`
   `Usuario demo: jesus.betuel@gmail.com`
   `Password demo: Ireport7@`