<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Datos</title>
</head>
<body>
    

<h1> Formulario</h1>
<form action="grabadatos.php" method="post">Nombre y Apellido:  <INPUT TYPE="text" NAME="apellidos"><br>

Profesore:

<select name="codigo_c">

<?php
  $conexion=mysqli_connect("localhost","root","","paginawebing") or die("Problemas en la conexion");
  $registros=mysqli_query($conexion,"select idcliente,Nombre,telefono,usuario_idusuario,email from cliente") or die("Problemas en el select:".mysqli_error($conexion));
  while ($reg=mysqli_fetch_array($registros))
  {
      echo "<option value=\"$reg[idcliente]\">$reg[Nombre]</option>";
  }
?>
</select>
<br>


<input type="submit" name="submit_button" value="Enviar">
</form>


</body>
</html>