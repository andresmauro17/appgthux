<?php
/*
 * Debe ejecutarse para que no quede la sesión abierta para el usuario.
 */
include $_SERVER['DOCUMENT_ROOT'].'/app/lib/library.php';
$query2 = mysql_query("CALL cerrarSesion(".$_SESSION['empresa'].",".$_SESSION['userid'].",".$_SESSION['tipo'].")"); 

session_destroy();
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['empresa']);
unset($_SESSION['tipo']);
header("Location: index.php");
?>