# Sistema de Control Hospital - Backend API

Esta documentación es para el equipo de desarrollo. Siga estos pasos para configurar el proyecto correctamente tras clonar el repositorio.

## 🚀 Instalación y Configuración (Para Compañeros)

Si acabas de clonar el repositorio o si estás teniendo errores 500 con las notificaciones, sigue estos pasos:

### 1. Instalar Dependencias
Ejecuta el siguiente comando para instalar las librerías de PHP (incluyendo `dompdf`):
```bash
composer install
```

### 2. Configuración de Entorno
Crea tu archivo `.env` basado en el ejemplo:
```bash
copy .env.example .env
```
Abre el archivo `.env` y configura tu base de datos:
```ini
DB_DATABASE=nombre_de_tu_base_datos
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Generar Clave de Aplicación
```bash
php artisan key:generate
```

### 4. Base de Datos y Migraciones (IMPORTANTE)
El sistema de notificaciones utiliza una tabla personalizada. Para asegurar que tienes la estructura correcta (y solucionar el error de `missing column` o `undefined method unread`), debes refrescar las migraciones.

⚠️ **Advertencia:** Este comando borrará tus datos locales.
```bash
php artisan migrate:fresh
```
Si deseas mantener tus datos y solo arreglar la tabla de notificaciones, puedes intentar:
```bash
php artisan migrate:refresh --path=database/migrations/2026_02_01_042747_create_notifications_table.php
```
Pero recomendamos `migrate:fresh` para garantizar compatibilidad total.

### 5. Limpiar Cachés
Si los errores persisten, limpia la caché de configuración:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## 🐛 Solución de Errores Comunes

### Error 500 en `/api/notifications/*`
- **Causa:** La tabla `notifications` tiene la estructura de Laravel por defecto, pero el código espera una estructura personalizada (`user_id`, `title`, etc.).
- **Solución:** Ejecuta `php artisan migrate:fresh` para recrear las tablas con la migración corregida.

### Error: Class "Barryvdh\DomPDF\Facade\PDF" not found
- **Causa:** Falta instalar dependencias.
- **Solución:** Ejecuta `composer install`.
