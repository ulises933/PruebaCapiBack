# 📖 Libreta de Direcciones Avanzada (Backend)

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## 🛠 Tecnologías Utilizadas
- **Backend:** Laravel 11, PHP
- **Base de Datos:** MySQL
- **ORM:** Eloquent (Laravel)
- **Dependencias:** libphonenumber-for-php para el formateo y validación de números telefónicos.

---

## ✨ Características
- **CRUD de Contactos:** Crear, editar, eliminar y visualizar contactos con detalles adicionales (teléfonos, correos electrónicos y direcciones).
- **Búsqueda Avanzada:** Filtra contactos por nombre, empresa o ciudad.
- **Estandarización de Datos:** Los números de teléfono se almacenan en formato internacional E.164.
- **Paginación:** Mejora el rendimiento al listar grandes cantidades de datos.

---

## 🚀 Instrucciones de Instalación

### 1. Clonar el Repositorio

git clone https:/ulises933/github.com//back-libreta-de-direcciones.git
cd back-libreta-de-direcciones

### 2. Configurar el Backend (Laravel)
🧰 Instalar las Dependencias
composer install
📝 Configurar el Entorno
Crea el archivo .env
Configura las credenciales de la base de datos en el archivo .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
🔑 Generar la Clave de la Aplicación
php artisan key:generate
📦 Ejecutar Migraciones y Seeders
php artisan migrate --seed

### 3. Iniciar el Servidor del Backend
php artisan serve
Accede a la aplicación en tu navegador en http://localhost:8000.

--------------------------------------------------------------------------------------------------------

📚 Uso de la API
* Endpoints: Los endpoints de la API están definidos en routes/api.php.
* Paginación: Los contactos se muestran con paginación para optimizar el rendimiento.
* Búsquedas: Filtra contactos por atributos específicos como nombre, empresa o ciudad.
📋 Ejemplos de Uso con Postman
* Obtener Contactos Paginados:
    GET /api/contactos?page=1
* Crear un Nuevo Contacto:
    POST /api/contactos
    
--------------------------------------------------------------------------------------------------------

🌐 Estandarización de Datos
* Números de Teléfono: Almacenados en formato E.164 utilizando la librería libphonenumber.
* Validaciones: Validaciones avanzadas en los controladores para asegurar la integridad de los datos.

--------------------------------------------------------------------------------------------------------

🧩 Estructura del Proyecto
Carpeta	 - Descripción
app/Models -	Modelos de Eloquent
app/Http/Controllers -	Controladores de la API
app/Services -	Lógica de negocio
app/Repositories -	Repositorios para acceder a los datos
database/seeders -	Seeders para poblar la base de datos

--------------------------------------------------------------------------------------------------------

🤝 Contribuir
¡Las contribuciones son bienvenidas! Para contribuir:

Haz un fork del repositorio.
Crea una nueva rama (git checkout -b feature/nueva-funcionalidad).
Haz tus cambios y realiza commits (git commit -m 'Agregar nueva funcionalidad').
Haz push a tu rama (git push origin feature/nueva-funcionalidad).
Abre un pull request.
