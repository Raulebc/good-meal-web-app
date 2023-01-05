#!/bin/bash

# copiamos el archivo .env.example a .env
[ ! -f ".env" ] && cp .env.example .env

# Instalamos las dependencias
php artisan sail:install -n --with=selenium
# para este proyecto elegimos la opcion [0] mysql
php artisan key:generate
# Levantamos los contenedores
./vendor/bin/sail up -d
# Creamos la base de datos
touch ./database/good_meal.sqlite
# Ejecutamos las migraciones con los seeders
./vendor/bin/sail artisan migrate:fresh --seed
# Instalamos las dependencias de node
./vendor/bin/sail npm install
# Compilamos los assets de vue
./vendor/bin/sail npm run build

echo -e "\e[32mGood Meal esta listo para usar\e[0m"

