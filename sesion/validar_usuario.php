<?php session_start();
 
//datos para establecer la conexion con la base de mysql.
$c=mysqli_connect('localhost','root','','canchaalmen3')or die ('Ha fallado la conexi&oacute;n: '.mysqli_error());

extract($_POST); 
function quitar($mensaje)
{
    $nopermitidos = array("'",'\\','<','>',"\"");
    $mensaje = str_replace($nopermitidos, "", $mensaje);
    return $mensaje;
}     
 
if(trim($_POST["nomusuario"]) != "" && trim($_POST["contraseña"]) != "")
{
    // Puedes utilizar la funcion para eliminar algun caracter en especifico
    //$nomusuario = strtolower(quitar($HTTP_POST_VARS["nomusuario"]));
    //$contrasena = $HTTP_POST_VARS["contrasena"];
   
    // o puedes convertir los a su entidad HTML aplicable con htmlentities
    $nomusuario = strtolower(htmlentities($_POST["nomusuario"], ENT_QUOTES));   
    $contraseña = $_POST["contraseña"];
     
 
    $result = mysqli_query($c,'SELECT idusuario,nomusuario, contraseña,roles_idroles FROM usuario WHERE nomusuario=\''.$nomusuario.'\'');
    if($row = mysqli_fetch_array($result)){
        if($row["contraseña"] == $contraseña){
            $_SESSION["k_idnomusuario"] = $row['idusuario'];
            $_SESSION["k_username"] = $row['nomusuario'];
            // $_SESSION["k_nombre_empresa"] = $row['nombre_empresa'];
            // $_SESSION["k_num_empresa"] = $row['num_empresa'];
            $_SESSION["k_roles"] = $row['roles_idroles'];
            $_SESSION["k_variable_uso_rapido"] = 0;
            echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
            // echo 'en la empresa:  '.$_SESSION['k_nombre_empresa'].' <p>';
            echo 'nivel de rol:  '.$_SESSION['k_roles'].' <p>';
            echo '<a href="../index.php">Index</a></p>';
           
            //Elimina el siguiente comentario si quieres que re-dirigir autom&aacute;ticamente a index.php
           
            /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
            <SCRIPT LANGUAGE="javascript">
            location.href = "index.php";
            </SCRIPT>*/
 
        }else{
            echo 'contrasena incorrecta, por favor intentelo de nuevo';
        }
    }else{
        echo 'nomusuario no existente en la base de datos';
    }
    mysqli_free_result($result);
}else{
    echo 'Debe especificar un nomusuario y contrasena';
}
mysqli_close($c);
?>