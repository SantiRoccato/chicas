<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="formulario">
    <h1> INICIO DE SESION</h1>
      <form method="post">
        <div class="usuario">
            <input type="mail" required>
            <label for="">Usuario</label>
        </div>
        <div class="contraseña">
          <input type="password" required>
          <label for="">Contraseña</label>
      </div>
      <div class="recuperacion">¿Olvidaste tu contraseña? <a href="recuperacioncontraseña.html"> Haz click aquí</a></div>
      <div class="recuperacion">Registrate aquí <a href="registro.html"> Haz click aquí</a></div>
      <input type="submit" value="Aceptar">
      </form>
      <div class="login-container">
        <div class="social-login">
            <a href="#" class="btn google"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" alt="Google Logo"> Iniciar sesión con Google</a>
            <a href="#" class="btn facebook"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook Logo"> Iniciar sesión con Facebook</a>
            <a href="#" class="btn email"><img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Gmail_Icon.png" alt="Mail Logo"> Iniciar sesión con Correo</a>
        </div>
    </div>
  </div>
</body>
</html>