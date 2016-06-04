<?php
include $_SERVER['DOCUMENT_ROOT'].'/app/lib/library.php';

/*
 * creasesion pone las variables de sesion directamente
 */
$_SESSION['userid'] = htmlentities($_POST['idUsu']);
$_SESSION['username'] = htmlentities($_POST['Usern']);
$_SESSION['empresa'] = htmlentities($_POST['Empre']);
$_SESSION['tipo'] = htmlentities($_POST['Tipo']);

?>