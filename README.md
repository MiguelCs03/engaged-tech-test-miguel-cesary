# 🛒 Sistema de Compras - Vue 3 + Laravel

Sistema web moderno para gestión de compras con envío automático de correos de confirmación.

## 🎯 ¿Qué hace?

Una aplicación de e-commerce que muestra un producto premium, permite al usuario completar un formulario de compra y envía un correo de confirmación con diseño HTML personalizado.

## 🛠️ Tecnologías

**Frontend:**
- Vue 3 + TypeScript
- Vite
- Axios
- CSS con gradientes modernos

**Backend:**
- Laravel 12
- API RESTful
- SQLite
- SMTP Google (Gmail)

**Email:**
- Template HTML personalizado con gradientes
- Blade (Laravel)
- Diseño responsive

**Deployment:**
- Docker + Docker Compose
- Nginx (frontend)
- PHP-FPM (backend)

## ⚡ Inicio Rápido

### Con Docker

```bash
# 1. Configurar credenciales SMTP
cp .env.docker.example .env
# Editar .env con tus credenciales de Gmail

# 2. Levantar aplicación
docker-compose up --build

# 3. Acceder
# Frontend: http://localhost
# Backend: http://localhost:8000
```

### Sin Docker

```bash
# Backend
cd backend
php artisan serve

# Frontend (en otra terminal)
cd frontend
npm run dev
```

## 📧 Configuración SMTP

**⚠️ IMPORTANTE: Este proyecto utiliza SMTP de Google (Gmail)**

Necesitas una **contraseña de aplicación de Gmail**:

1. Activa verificación en 2 pasos en Google
2. Ve a: https://myaccount.google.com/apppasswords
3. Genera contraseña para "Correo"
4. Configura en tu archivo `.env` con estos valores:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_correo@gmail.com
MAIL_PASSWORD=tu_contraseña_de_aplicacion_generada
MAIL_FROM_ADDRESS=tu_correo@gmail.com
MAIL_FROM_NAME="Prueba Engaged Tech"
MAIL_ENCRYPTION=tls
```

**Nota:** La `MAIL_PASSWORD` debe ser la contraseña de aplicación generada, NO tu contraseña regular de Gmail.

## 📂 Estructura

```
├── frontend/          # Vue 3 + TypeScript
├── backend/           # Laravel 12 API
│   └── resources/
│       └── views/
│           └── emails/
│               └── purchase.blade.php  # Email HTML
├── docker-compose.yml
└── README.md
```

Ver `DOCKER.md` para más detalles.

---

Hecho con ❤️ - Vue 3 + Laravel + Docker
