# COVID-19 Secretaria de Salud
## Problematica 
La Secretaría de Salud desea procesar información para llevar cierto control sobre los ciudadanos del partido que recibieron las dos dosis de alguna vacuna para el COVID.
#### Arquitectura
La aplicacion se desarrollo con una arquitectura en tres capas.
![Arquitectura en 3 capas](https://i.ibb.co/jf2SrKc/arquitectura.png)
#### Diagrama de Clases 
![Diagrama de Clases](https://i.ibb.co/yn69kg4/Diagrama-de-clases-Proyecto-1-Apps2.jpg)
#### Diagrama de Base de Datos
![Diagrama de Base de Datos](https://i.ibb.co/sFgng4Q/diagrama-db.png)
#### Datos de Prueba
Al iniciar el sistema usted podra realizar el comando: **php artisan db:seed** 
y se le cargaran 4 usuarios
* Administrador:   DNI: 100 / Password: 100
* Enfermero 1: DNI: 101 / Password: 101
* Enfermero 2: DNI: 102 / Password: 102
* Gestion: DNI: 103 / Password: 103
## INSTALACION  
1. **composer install**
1. **cp .env.example .env**
1. **php artisan key:generate**
1. **npm install**
1. **php artisan migrate**
1. **php artisan db:seed**
1. **php artisan serve**
## Live Demo
https://covid19-cnelsuarez.herokuapp.com/

