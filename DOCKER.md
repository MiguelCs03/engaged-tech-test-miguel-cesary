# 🐳 Docker - Guía de Uso

## 📋 Prerequisitos

- Docker instalado ([Descargar Docker](https://www.docker.com/get-started))
- Docker Compose instalado (generalmente viene con Docker Desktop)

## 🚀 Inicio Rápido

### 1. Configurar Variables de Entorno

Copia el archivo de ejemplo y configura tus credenciales SMTP:

```bash
cp .env.docker.example .env
```

Edita el archivo `.env` y añade tus credenciales de correo:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_correo@gmail.com
MAIL_PASSWORD=tu_contraseña_de_aplicacion
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_correo@gmail.com
MAIL_FROM_NAME=Laravel
```

### 2. Construir y Ejecutar

```bash
# Construir e iniciar todos los servicios
docker-compose up --build
```

O en modo detached (segundo plano):

```bash
docker-compose up -d --build
```

### 3. Acceder a la Aplicación

- **Frontend (Vue):** http://localhost
- **Backend (Laravel):** http://localhost:8000
- **API:** http://localhost:8000/api

## 📦 Servicios Incluidos

### Backend (Laravel)
- **Puerto:** 8000
- **Tecnología:** PHP 8.2-FPM
- **Base de datos:** SQLite
- **Imagen:** php:8.2-fpm

### Frontend (Vue)
- **Puerto:** 80
- **Servidor:** Nginx Alpine
- **Build:** Multi-stage (Node 18 + Nginx)

## 🛠️ Comandos Útiles

### Gestión de Contenedores

```bash
# Iniciar servicios
docker-compose up

# Iniciar en segundo plano
docker-compose up -d

# Detener servicios
docker-compose down

# Ver logs
docker-compose logs

# Ver logs de un servicio específico
docker-compose logs backend
docker-compose logs frontend

# Ver logs en tiempo real
docker-compose logs -f
```

### Gestión de Imágenes

```bash
# Reconstruir las imágenes
docker-compose build

# Reconstruir sin caché
docker-compose build --no-cache

# Reconstruir un servicio específico
docker-compose build backend
```

### Acceso a Contenedores

```bash
# Acceder al contenedor del backend
docker-compose exec backend bash

# Acceder al contenedor del frontend
docker-compose exec frontend sh

# Ejecutar comandos de Artisan
docker-compose exec backend php artisan migrate
docker-compose exec backend php artisan cache:clear
```

### Limpiar Todo

```bash
# Detener y eliminar contenedores, redes y volúmenes
docker-compose down -v

# Eliminar imágenes también
docker-compose down -v --rmi all
```

## 🔧 Troubleshooting

### El puerto 80 u 8000 ya está en uso

Si tienes otros servicios corriendo en esos puertos, puedes cambiarlos en `docker-compose.yml`:

```yaml
services:
  backend:
    ports:
      - "8001:8000"  # Cambia el puerto externo
  
  frontend:
    ports:
      - "3000:80"    # Cambia el puerto externo
```

### El correo no se envía

1. Verifica que las credenciales SMTP en `.env` sean correctas
2. Revisa los logs del backend: `docker-compose logs backend`
3. Asegúrate de usar una contraseña de aplicación de Gmail

### Error de permisos en SQLite

```bash
# Recrear el contenedor del backend
docker-compose down
docker-compose up -d backend
```

### Cambios en el código no se reflejan

Para el **backend**, los cambios se reflejan automáticamente gracias a los volúmenes.

Para el **frontend**, necesitas reconstruir:
```bash
docker-compose build frontend
docker-compose up -d frontend
```

## 📊 Health Checks

Ambos servicios tienen health checks configurados:

```bash
# Ver el estado de los servicios
docker-compose ps
```

Los servicios aparecerán como "healthy" cuando estén funcionando correctamente.

## 🔄 Actualizar Dependencias

### Backend
```bash
docker-compose exec backend composer install
```

### Frontend
```bash
docker-compose build frontend --no-cache
```

## 🌐 Variables de Entorno

Las variables se cargan desde:
1. Archivo `.env` en la raíz (para docker-compose)
2. Archivo `backend/.env` (para Laravel)
3. Archivo `frontend/.env` (para Vue/Vite)

## 📝 Notas Importantes

1. **Primera ejecución:** La primera vez tardará más porque descarga las imágenes base
2. **SQLite:** La base de datos se crea automáticamente en el contenedor
3. **Volúmenes:** Los cambios en el código del backend se sincronizan automáticamente
4. **CORS:** Ya está configurado para localhost

## 🎯 Para Desarrollo

Si quieres desarrollar con hot-reload:

1. **Backend:** Ya tiene hot-reload activado
2. **Frontend:** Usa el modo dev normal (`npm run dev`) fuera de Docker

Para producción, usa Docker como está configurado.

## 📚 Más Información

- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [Laravel Sail](https://laravel.com/docs/sail) (alternativa oficial de Laravel)

---

**¡Disfruta desarrollando con Docker! 🐳**
