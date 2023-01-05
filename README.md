# Good meal **web APP**


## PASOS PARA CORRER LA WEB APP 🏃‍♀️

Teniendo Docker instalado (y corriendo) en nuestro sistema clonamos este repositorio.

Luego, al entrar en la carpeta del proyecto que se clonó, ejecutamos el comando `./vendor/bin/sail up` para levantar los contenedores con docker.



* Clonar el proyecto
* `cd` en la carpeta del proyecto
* Ejecutar cp .env.example .env
* Correr `./vendor/bin/sail up` para levantar los contenedores con docker.
* Correr `./vendor/bin/sail composer install` para instalar las dependencias de composer.
* Correr `./vendor/bin/sail artisan migrate` creando las tablas de la base de datos.
* Correr `./vendor/bin/sail npm install`
* Correr `./vendor/bin/sail npm run dev`

* Correr `./vendor/bin/sail artisan serve` para iniciar el servidor
* Ir a `http://localhost:8181` en el navegador



[MIT license](https://opensource.org/licenses/MIT)
## A considerar ❗

Se utilizó *sqlite* como base de datos debido a que es un proyecto de prueba, para ello se reemplazaron en `.env` todas las directivas **DB_***  por las siguientes:

```
DB_CONNECTION=sqlite
DB_DATABASE="./database/good_meal.sqlite"
DB_FOREIGN_KEYS=true
```
## Correr proyecto localmente

Clone el projecto

```bash
  gh repo clone Raulebc/good-meal-web-app good-meal
```

Vamos al directorio del proyecto

```bash
  cd good-meal
```

Instalar las dependencias. Lo unico que necesitamos aparte de Docker instalado y corriendo es Laravel Sail, que nos ayuda a acelerar el desarrollo con contenedores


```bash
  # Requerimos tener PHP8+ para instalar correctamente sail
  composer require laravel/sail --dev
```

####  ⚡️🏃🏻 De aquí en más tenemos dos opciones, correr un script simple para instalar todo el resto de las dependencias, o ejecutar de uno en uno los comandos.

## Opción con script

Usando la consola ejecutamos el siguiente comando en el directorio raiz de nuestro proyecto.

```bash
  ./scripts/setup.sh
```
Esto ejecutara los comandos para poder correr nuestra app de manera mas rápida.

## Opción manual

**Si elegimos no ejecutar el script podemos ir de manera mas controlada ejecutando los siguientes comandos.**

Copiamos el environment

```
  cp .env.example .env
```

Instalamos el scaffolding para crear los servicios con sail

```
  php artisan sail:install
```

Copiamos el environment

```
  ./vendor/bin/sail up -d
```

Copiamos el environment

```
  touch ./database/good_meal.sqlite
```

Copiamos el environment

```
  sail artisan migrate:fresh --seed
```

Copiamos el environment

```
  sail npm install
```
Copiamos el environment

```
  sail npm run build
```

### Probar la app

Ya podemos abrir el navegador en http://[localhost:8181](http://localhost:8181) para acceder a nuestra web app.
Por defecto cuando ejecutamos las migraciones en los pasos anteriores también ejecutamos algunos seeder y con esto creamos un usuario para probar:
  
  correo: `user@email.com`
  
  contraseña: `password`


## Ejecutando Tests

Utilizamos PHPUnit para desarrollar nuestros feature y Unit test. Para correr los tests ejecutamos en consola:

```bash
  sail artisan test
```

Los que faltan son los test e2e para la parte del frontend.


## Licencia

[MIT license](https://opensource.org/licenses/MIT)

