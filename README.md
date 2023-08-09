Especificaciones tecnicas del desarollador

1) Descargar el proyecto
2) Instalar las dependencias con composer install && npm install/yarn && npm run && npm run watch porque se instalo tailwind
3) en el .env configurar api key, DB_DATABASE,DB_USERNAME, DB_PASSWORD y configurar de esta manera esta variable QUEUE_CONNECTION=database
4) Ejecutar migraciones
5) Ejecutar seeder
6)  Para ejecutar el  JOb usar hp artisan queue:listen en conjunto con php artisan serve
7) Para ver el listado http://localhost:8000/orders
