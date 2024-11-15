<?php session_start();
 
//datos para establecer la conexion con la base de mysql.
$c=mysqli_connect('localhost','root','','yourcomer')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
?>
<body>
<div class="arriba">
       <p>Bienvenido</p>
            
            <a href="../index.php"><p>pagina inicio</p></a>
            
            <a href=""><p>registrar una cuenta</p></a>
            <a href="login.php"><p>iniciar sesion</p></a>
            <a href=""><p>ver cuentas</p></a>
            
        
        </div>
</body>

<?php 
function formRegistro(){
?>
<form action="registrar.php" method="post">
Nombre (max 35):
  <input type="text" name="nombre" size="20" maxlength="20" /><br />
Apellido (max 35):
  <input type="text" name="apellido" size="20" maxlength="20" /><br />
Nombre de su local: (max 45):
  <input type="text" name="nombre_empresa" size="20" maxlength="20" /><br />
Nombre de usuario: (max 45): 
  <input type="text" name="usuario" size="20" maxlength="20" /><br />
Contrasena: (max 10):
<input type="password" name="contrasena" size="10" maxlength="10" /><br />
Confirma contrasena: <input type="password" name="contrasena2" size="10" maxlength="10" /><br />
Email (max 50):
<input type="text" name="email" size="20" maxlength="40" /><br />
<input type="submit" value="Registrar" />
</form>
<?php
}
 
// verificamos si se han enviado ya las variables necesarias.
if (isset($_POST["usuario"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nombre_empresa = $_POST["nombre_empresa"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $contrasena2 = $_POST["contrasena2"];
    $email = $_POST["email"];
    // Hay campos en blanco
    if($usuario==NULL|$contrasena==NULL|$contrasena2==NULL|$email==NULL) {
        echo "un campo est&aacute; vacio.";
        formRegistro();
    }else{
        // �Coinciden las contrase&ntilde;as?
        if($contrasena!=$contrasena2) {
            echo "Las contrase&ntilde;as no coinciden";
            formRegistro();
        }else{
            // Comprobamos si el nombre de usuario o la cuenta de correo ya exist&iacute;an
            $cheque_usuario = mysqli_query($c,"SELECT usuario FROM usuarios WHERE usuario='$usuario'");
            $existente_usuario = mysqli_num_rows($cheque_usuario);
           
            $checkemail = mysqli_query($c,"SELECT email FROM usuarios WHERE email='$email'");
            $email_exist = mysqli_num_rows($checkemail);
   
            if ($email_exist>0|$existente_usuario>0) {
                echo "El nombre de usuario o la cuenta de correo estan ya en uso";
                formRegistro();
            }else{
                
                $consulta_num_empresa = "SELECT MAX(num_empresa) AS total_empresas FROM usuarios";
                $resultado_num_empresa = mysqli_query($c,$consulta_num_empresa);
                $fila = mysqli_fetch_assoc($resultado_num_empresa);
                //en consultas AS total_empresa, le esta asignanado el valor, que da la conuslta en este caso, COUNT(num_empresa);
                $contador_empresa = $fila['total_empresas'];
                //de esta manera se hace el contador_empresa a entero; y en la linea siguiente se le suma un valor a la misma;
                $contador_empresa = (int)$contador_empresa;
                $contador_empresa += 1;

    // Convertir a entero y luego incrementar
    $contador_empresa = (int)$contador_empresa;
    $contador_empresa += 1;
                $roles = 1;
                $query = 'INSERT INTO usuarios (nombre,apellido,nombre_empresa,usuario, contrasena,roles,num_empresa, email)
              VALUES (\''.$nombre.'\',\''.$apellido.'\',\''.$nombre_empresa.'\',\''.$usuario.'\',\''.$contrasena.'\',\''.$roles.'\',\''.$contador_empresa.'\',\''.$email.'\')';
               
                mysqli_query($c,$query) or die(mysqli_error());
                echo 'El usuario '.$usuario.' ha sido registrado de manera satisfactoria.<br />';
                echo 'El numero de la empresa registrada es : '.$contador_empresa.'<br />';
                $contador_empresa = $contador_empresa + 1;
                echo 'El numero de la empresa registrada es : '.$contador_empresa.'<br />';
                $contador_empresa = (int)$contador_empresa + "1";
                echo 'El numero de la empresa registrada es : '.$contador_empresa.'<br />';
                echo 'Ahora puede entrar ingresando su usuario y su contrasena <br />';
                ?>
                <FORM ACTION="validar_usuario.php" METHOD="post">
                  Usuario : <INPUT TYPE="text" NAME="usuario" SIZE=20 MAXLENGTH=20><br />
                  Password: <INPUT TYPE="password" NAME="contrasena" SIZE=10 MAXLENGTH=20><br />
                  <INPUT TYPE="submit" VALUE="Ingresar">
                </FORM>
                <?php
               
            }
        }
    }
}else{
    formRegistro();
}
?>