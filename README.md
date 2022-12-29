# Good meal **web APP**

<!-- <p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p> -->

## PASOS PARA CORRER LA WEB APP

Para iniciar se debe tener instalado Docker en el sistema y clonar este repositorio.

Luego, al entrar en la carpeta del proyecto que se clonó, se corre el comando `./vendor/bin/sail up` para levantar los contenedores con docker.

## A considerar :exclamation:

Se ocupa *sqlite* como base de datos debido a que es un proyecto de prueba, para ello se reemplazan en `.env` todas las directivas <span style="color:#FFFF">**DB_***</span>  y se reemplazan por:

```
DB_CONNECTION=sqlite
DB_DATABASE="./database/good_meal.sqlite"
DB_FOREIGN_KEYS=true
```

* Clonar el proyecto
* `cd` en la carpeta del proyecto
* Correr `./vendor/bin/sail up` para levantar los contenedores con docker.
* Correr `./vendor/bin/sail composer install` para instalar las dependencias de composer.
* Correr `./vendor/bin/sail artisan migrate` creando las tablas de la base de datos.
* Correr `./vendor/bin/sail npm install`
* Correr `./vendor/bin/sail npm run dev`
<!-- * Correr `./vendor/bin/sail npm run watch` -->
* Correr `./vendor/bin/sail artisan serve` para iniciar el servidor
* Ir a `http://localhost:8181` en el navegador

[MIT license](https://opensource.org/licenses/MIT)
