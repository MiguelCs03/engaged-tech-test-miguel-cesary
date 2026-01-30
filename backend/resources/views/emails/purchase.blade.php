<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            color: white;
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .message {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 30px;
        }
        .info-box {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
        }
        .info-item {
            margin: 10px 0;
            font-size: 16px;
        }
        .info-label {
            font-weight: 700;
            color: #667eea;
        }
        .info-value {
            color: #333;
        }
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 3px solid #667eea;
        }
        .footer p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✨ ¡Compra Exitosa! ✨</h1>
        </div>
        
        <div class="content">
            <div class="welcome">
                ¡Hola {{ $data['nombre'] }} {{ $data['apellido'] }}!
            </div>
            
            <div class="message">
                Gracias por realizar tu compra con nosotros. Hemos recibido tu solicitud y estamos procesándola.
            </div>
            
            <div class="info-box">
                <div class="info-item">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value">{{ $data['nombre'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Apellido:</span>
                    <span class="info-value">{{ $data['apellido'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Correo:</span>
                    <span class="info-value">{{ $data['correo'] }}</span>
                </div>
            </div>
            
            <div class="message">
                En breve recibirás más información sobre tu compra. Si tienes alguna pregunta, no dudes en contactarnos.
            </div>
        </div>
        
        <div class="footer">
            <p><strong>Gracias por confiar en nosotros</strong></p>
            <p>© {{ date('Y') }} - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
