<h1>📖 Libreta de Direcciones Avanzada (Backend)</h1>

    <p align="center">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </p>

    <h2>🛠 Tecnologías Utilizadas</h2>
    <ul>
        <li><strong>Backend:</strong> Laravel 11, PHP</li>
        <li><strong>Base de Datos:</strong> MySQL</li>
        <li><strong>ORM:</strong> Eloquent (Laravel)</li>
        <li><strong>Dependencias:</strong> <code>libphonenumber-for-php</code> para el formateo y validación de números telefónicos.</li>
    </ul>

    <hr>

    <h2>✨ Características</h2>
    <ul>
        <li><strong>CRUD de Contactos:</strong> Crear, editar, eliminar y visualizar contactos con detalles adicionales (teléfonos, correos electrónicos y direcciones).</li>
        <li><strong>Búsqueda Avanzada:</strong> Filtra contactos por nombre, empresa o ciudad.</li>
        <li><strong>Estandarización de Datos:</strong> Los números de teléfono se almacenan en formato internacional E.164.</li>
        <li><strong>Paginación:</strong> Mejora el rendimiento al listar grandes cantidades de datos.</li>
    </ul>

    <hr>

    <h2>🚀 Instrucciones de Instalación</h2>

    <h3>1. Clonar el Repositorio</h3>
    <pre>
        git clone https://github.com/ulises933/back-libreta-de-direcciones.git
        cd back-libreta-de-direcciones
    </pre>

    <h3>2. Configurar el Backend (Laravel)</h3>
    <p>🧰 <strong>Instalar las Dependencias</strong></p>
    <pre>composer install</pre>

    <p>📝 <strong>Configurar el Entorno</strong></p>
    <p>Crea el archivo <code>.env</code></p>
    <p>Configura las credenciales de la base de datos en el archivo <code>.env</code>:</p>
    <pre>
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nombre_de_tu_base_de_datos
        DB_USERNAME=tu_usuario
        DB_PASSWORD=tu_contraseña
    </pre>

    <p>🔑 <strong>Generar la Clave de la Aplicación</strong></p>
    <pre>php artisan key:generate</pre>

    <p>📦 <strong>Ejecutar Migraciones y Seeders</strong></p>
    <pre>php artisan migrate --seed</pre>

    <h3>3. Iniciar el Servidor del Backend</h3>
    <pre>php artisan serve</pre>
    <p>Accede a la aplicación en tu navegador en <a href="http://localhost:8000">http://localhost:8000</a>.</p>

    <hr>

    <h2>📚 Uso de la API</h2>
    <ul>
        <li><strong>Endpoints:</strong> Los endpoints de la API están definidos en <code>routes/api.php</code>.</li>
        <li><strong>Paginación:</strong> Los contactos se muestran con paginación para optimizar el rendimiento.</li>
        <li><strong>Búsquedas:</strong> Filtra contactos por atributos específicos como nombre, empresa o ciudad.</li>
    </ul>

    <h3>📋 Ejemplos de Uso con Postman</h3>
    <ul>
        <li><strong>Obtener Contactos Paginados:</strong></li>
        <pre>GET /api/contactos?page=1</pre>
        <li><strong>Crear un Nuevo Contacto:</strong></li>
        <pre>POST /api/contactos</pre>
    </ul>

    <hr>

    <h2>🌐 Estandarización de Datos</h2>
    <ul>
        <li><strong>Números de Teléfono:</strong> Almacenados en formato E.164 utilizando la librería <code>libphonenumber</code>.</li>
        <li><strong>Validaciones:</strong> Validaciones avanzadas en los controladores para asegurar la integridad de los datos.</li>
    </ul>

    <hr>

    <h2>🧩 Estructura del Proyecto</h2>
    <table border="1">
        <tr>
            <th>Carpeta</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td><code>app/Models</code></td>
            <td>Modelos de Eloquent</td>
        </tr>
        <tr>
            <td><code>app/Http/Controllers</code></td>
            <td>Controladores de la API</td>
        </tr>
        <tr>
            <td><code>app/Services</code></td>
            <td>Lógica de negocio</td>
        </tr>
        <tr>
            <td><code>app/Repositories</code></td>
            <td>Repositorios para acceder a los datos</td>
        </tr>
        <tr>
            <td><code>database/seeders</code></td>
            <td>Seeders para poblar la base de datos</td>
        </tr>
    </table>

    <hr>

    <h2>🤝 Contribuir</h2>
    <p>¡Las contribuciones son bienvenidas! Para contribuir:</p>
    <ol>
        <li>Haz un fork del repositorio.</li>
        <li>Crea una nueva rama:
            <pre>git checkout -b feature/nueva-funcionalidad</pre>
        </li>
        <li>Haz tus cambios y realiza commits:
            <pre>git commit -m 'Agregar nueva funcionalidad'</pre>
        </li>
        <li>Haz push a tu rama:
            <pre>git push origin feature/nueva-funcionalidad</pre>
        </li>
        <li>Abre un pull request.</li>
    </ol>
