<?php session_start();
 
echo 'Bienvenido, ';
 
if (isset($_SESSION['k_username'])) {
    echo '<b>'.$_SESSION['k_username'].' en la empresa: '.$_SESSION['k_nombre_empresa'].'</b>.';
    echo '<p><a href="logout.php">Logout</a></p>';
}else{
    echo '<p><a href="login.php">Login</a></p>
     <p><a href="registrar.php">Registrar</a></p>';
}
?>