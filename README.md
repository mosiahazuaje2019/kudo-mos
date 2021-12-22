## Test Mosiah Azuaje Laravel

Dentro de las tecnologías utilizadas se encuentra para el backend el uso de Laravel y para el frontend Vuejs con un UI component para Vue que se llama PrimeVue con esta libreria se crearon los componentes de las vistas:

## Paso 1

Lo primero es descargar la app del repositorio, una vez se realiza esto se debe asegurar de configurar en el archivo .env los parametros para la creación de la base de datos.
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=kudo_mos
DB_USERNAME=sail
DB_PASSWORD=password

Esos serian los parametros iniciales, una vez creado esto se procede con el comando ./vendor/bin/sail up a levantar la app y los contenedores.

## Paso 2

Una vez los contenedores esten arriba se debe proceder a utilizar los siguientes comandos 
- sail composer install
- sail composer update
- sail artisan migrate:fresh --seed (esto crea las tablas en la base de datos y ademas carga datos de ejemplo para usar la app, estos datos estan configurados en los seeder creados dentro de la app).

### Paso 3

Se procede a registrarse en el link localhost/register, para luego hacer login y comenzar a hacer uso de la app.
Despues de loguearse la primera ventana es un listado de los KudoBoard creados, en cada uno hay personas asociadas a cada Kudo y se le podra hacer un Kudo a cada persona.