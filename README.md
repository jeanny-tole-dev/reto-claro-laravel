# Documentación del Reto de Desarrollo: CRUD de Vehículos en Laravel

Este proyecto es una aplicación web profesional para la administración de activos vehiculares, desarrollada bajo el patrón **MVC (Modelo-Vista-Controlador)** utilizando el framework **Laravel 11**.

##  Arquitectura de Frontend y Diseño (UI/UX)

Se ha priorizado una interfaz intuitiva, moderna y alineada con los estándares corporativos:

* **Integración de Bootstrap 5:** Se utilizó este framework para garantizar que el sistema sea totalmente responsivo. La elección de Bootstrap permitió el uso de componentes avanzados, asegurando una estética moderna y funcional en toda la aplicación.
* **Estructura de Frames (Blade Layouts):** El proyecto utiliza el motor de plantillas Blade para crear una estructura de "frames" o marcos de trabajo persistentes. Esto permite mantener un **Sidebar (Menú lateral)** fijo mientras el contenido principal se carga dinámicamente, optimizando la velocidad de navegación y la organización del código.
* **Identidad Visual:** Se personalizó la paleta de colores utilizando el **Claro Red (#DA291C)**, logrando que la herramienta sea una extensión visual coherente de la marca.

##  Funcionalidades Implementadas

El sistema cubre satisfactoriamente los requerimientos principales y adicionales del reto:

* **Gestión CRUD Completa:** Registro, consulta, edición y eliminación de vehículos.
* **Filtro y Búsqueda:** Motor dinámico para localizar vehículos por marca, color o modelo.
* **Paginación:** Manejo eficiente de datos (10 registros por página) para optimizar el rendimiento.
* **Validaciones de Negocio:**
    * Unicidad de placas.
    * Restricción de fechas futuras (lógica dinámica de tiempo real).
    * Coherencia cronológica entre el modelo y la fecha de adquisición.


# Instrucciones de Instalación y Ejecución Local

Siga estos pasos técnicos para levantar el proyecto en su entorno local:

1. **Instalar dependencias de PHP:**
```bash
Composer install
```
# Configurar el entorno:
```bash
* Cree una copia del archivo .env.example y llámela .env.
* Configure sus credenciales de base de datos local (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
```

# Preparar la aplicación:
```bash
php artisan key:generate
php artisan migrate
```
# Iniciar el servidor local:
```bash
php artisan serve
```
## Jeanny Paola Tole Oliveros
### Pasante POSITIVO 



