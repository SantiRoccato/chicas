<?php session_start();
// Borramos toda la sesion que se a ignresado anteriormente
session_destroy();
echo 'Ha terminado la session <p><a href="../index.php">index</a></p>';
?>
<SCRIPT LANGUAGE="javascript">
location.href = "../index.php";
</SCRIPT>