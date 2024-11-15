<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperacion</title>
    
</head>
<body>
    <div class="reset-container">
        <h2>Recuperar Contraseña</h2>
        <form action="/send-password-reset" method="POST">
            <label for="email">Introduce tu correo electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Tu correo" required>
            <input type="submit" value="Enviar enlace de recuperación">
        </form>
        <p>Te enviaremos un enlace para restablecer tu contraseña.</p>
    </div>

    <a href="index.html">Volver</a>

</body>
</html>