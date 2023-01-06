#!/usr/bin/env bash

# Determine if stdout is a terminal...
if test -t 1; then
    # Determine if colors are supported...
    ncolors=$(tput colors)

    if test -n "$ncolors" && test "$ncolors" -ge 8; then
        BOLD="$(tput bold)"
        WHITE="$(tput setaf 7)"
        GREEN="$(tput setaf 2)"
        BACK_GREEN="$(tput setab 2)"
        NC="$(tput sgr0)"
    fi
fi

# copiamos el archivo .env.example a .env
[ ! -f ".env" ] && cp .env.example .env


# Creamos la base de datos
touch ./database/good_meal.sqlite
echo "${GREEN}Base de datos creada."


# Instalamos las dependencias
php artisan sail:install --with=selenium
echo "${GREEN}Instalación de Sail terminada"


# Removemos cualquier contenedor "orphan" para este proyecto
# docker-compose down --remove-orphans

# Levantamos los contenedores
./vendor/bin/sail up --wait
echo "${GREEN}Contenedores levantados"


# Generamos la key
./vendor/bin/sail artisan key:generate


# Ejecutamos las migraciones con los seeders
./vendor/bin/sail artisan migrate:fresh --seed


# Instalamos las dependencias de node
./vendor/bin/sail npm install


# Compilamos los assets de vue
./vendor/bin/sail npm run build


printf "\n"
echo "${WHITE}${BOLD}${BACK_GREEN} Terminado Good Meal esta listo para ser usado.${NC}"

