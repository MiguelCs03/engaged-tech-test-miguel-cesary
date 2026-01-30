# Backend - Laravel API

API del sistema de compras con envío de correos mediante SMTP de Google.

## 🚀 Configuración Inicial

### 1. Instalar Dependencias

```bash
composer install
```

### 2. Configurar Variables de Entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 3. **⚠️ IMPORTANTE: Configuración SMTP de Google**

**Este proyecto utiliza SMTP de Gmail para el envío de correos.**

Configura las siguientes variables en tu archivo `.env`:

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

**Cómo obtener la contraseña de aplicación:**

1. Activa la verificación en 2 pasos en tu cuenta de Google
2. Ve a: https://myaccount.google.com/apppasswords
3. Genera una contraseña de aplicación para "Correo"
4. Usa esa contraseña en `MAIL_PASSWORD` (NO tu contraseña regular)

### 4. Configurar Base de Datos

```bash
touch database/database.sqlite
php artisan migrate
```

### 5. Levantar Servidor

```bash
php artisan serve
```

El API estará disponible en: http://localhost:8000

## 📧 Endpoints

### POST `/api/purchase`

Registra una compra y envía correo de confirmación.

**Body:**
```json
{
  "nombre": "Juan Pérez",
  "correo": "juan@example.com",
  "direccion": "Calle 123",
  "telefono": "555-1234"
}
```

## 📂 Estructura Importante

```
app/
├── Http/Controllers/      # Controladores API
├── Mail/
│   └── PurchaseNotification.php  # Clase de correo
└── Models/
resources/
└── views/
    └── emails/
        └── purchase.blade.php  # Template HTML del correo
```

## 🧪 Testing

```bash
php artisan test
```

---

**Tecnologías:** Laravel 12, SQLite, SMTP Gmail
