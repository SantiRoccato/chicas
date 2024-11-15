<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="style.css">
    <?php
    include ("usuario.php");
    ?>
</head>

<body>
¨//Formulario

<?php
function formRegistro(){

?>


    <section class="form-registro">
        <h4>Formulario de Registro</h4>
    <form action="registro.php" method="POST">
<input class="controls" type="text" name="nomusuario" id="Nombres" placeholder="Ingrese su nombre" required>
<input class="controls" type="password" name="Contrasena" id="Contrasena" placeholder="Ingrese su contraseña" required>
<input class="controls" type="password" name="Contrasena2" id="Contrasena" placeholder="Confirma tu contraseña" required>
<input class="controls" type="hidden" name="roles_idroles" id="Mail" placeholder="Ingrese su mail" required>
<p> Estoy de acuerdo con <a href="#" >Termino y condiciones</a></p>
<input class= "botons"type="submit" nombre="accion" value="guardar">
</form>
<p><a href="#"> ¿Tengo una cuenta?</a></p>

    </section>

    <?php

}
formRegistro();
//aca cierra la funcion
extract($_GET);
if(!isset($accion)){
   
    
//VAMOS A VERIFICAR

// if($nomusuario==NULL|$contrasena==NULL|$contrasena2==NULL){
//     echo"falta un campo";
//     formRegistro();

// }
// $chequeoUsuario=mysqli_query($conexion,"SELECT nomusuario FROM `usuario` WHERE usuario='".$nombre."'");
// $existente_usuario= mysqli_num_rows($chequeoUsuario);



// //verificacion de nombre
// if($nomusuario==$existente_usuario){
//     formRegistro();
//     echo"Usuario correcto";
//     //COMPROBAMOS EL USUARIO
// }

// //verificacion de contraseña
// if($contraseña!=$contraseña2){
//     formRegistro();
//     //COMPROBAMOS LAS CONTRASEÑAS
//  echo"las contraseñas no coinciden";

// }
}elseif($accion=="guardar"){

extract($_POST);
$usuario= new usuario();
$usuario->usuario_guardar($nomusuario,$contrasena,$roles_idroles);
}


?>



</body>
</html>