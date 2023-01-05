# Good meal **web APP**



## A considerar ❗

Se utilizó *sqlite* como base de datos debido a que es un proyecto de prueba, para ello se reemplazaron en `.env` todas las directivas **DB_***  por las siguientes:

```
DB_CONNECTION=sqlite
DB_DATABASE="./database/good_meal.sqlite"
DB_FOREIGN_KEYS=true
```

## Correr proyecto localmente 🏃‍♀️

Clonar el projecto

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

Levantamos los contenedores con sail y con `-d` en background

```
  ./vendor/bin/sail up -d
```

Creamos el archivo donde guardaremos los datos de las tablas

```
  touch ./database/good_meal.sqlite
```

Ejecutamos las migraciones con seeders. Ocupamos `fresh` solo para asegurarnos que si ya tiene datos la base de datos, sean eliminados
y que corra como una base de datos nueva. El --seed lo ocupamos para que peristan en base de datos las tablas "mock" que creamos.

```
  sail artisan migrate:fresh --seed
```

Instalamos las dependencias de node

```
  sail npm install
```
Compilamos los assets

```
  sail npm run build
```

## **Probar la app**

Ya podemos abrir el navegador en http://[localhost:8181](http://localhost:8181) para acceder a nuestra web app.
Por defecto cuando ejecutamos las migraciones en los pasos anteriores también ejecutamos algunos seeder y con esto creamos un usuario para probar:
  
  correo: `user@email.com`
  
  contraseña: `password`


## **Ejecutando Tests**

Utilizamos PHPUnit para desarrollar nuestros feature y Unit test. Para correr los tests ejecutamos en consola:

```bash
  sail artisan test
```

## Documentación de la API
Con el estandar OpenAPI usando el formato yaml, escribimos las colecciones y Documentacion de la API.
El archivo, que contiene el código, será enviado por correo.

## **Partes/módulos faltantes**
Por cuestiones de tiempo quedaron fuera algunas partes del ejercicio 1, estas son:
- Terminar de programar el diseño con TailwindCss y Vue en las vistas de tiendas, detalles de tienda, productos, perfil.
- Programar los tests e2e para el frontend de la web app.


## Licencia

[MIT license](https://opensource.org/licenses/MIT)

