<?php
include $_SERVER['DOCUMENT_ROOT'].'/app/lib/library.php';

/*
 * checker verifica el usuario y password.
 * validarLogin hace un llamado a insertSesion y deja la huella del usuario en el sistema.
 */
if(isset($_POST['action']) && $_POST['action'] == 'login'){ // Check the action `login`
	$username 		= htmlentities($_POST['username']); // Get the username
	$password 		= htmlentities($_POST['password']); // Get the password and decrypt it
	$query			= mysql_query("CALL validarLogin('".$username."','".$password."');"); // Check the table with posted credentials
        if ($query==FALSE){
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		// NOTE : We have already started the session in the library.php
		$_SESSION['userid'] 		= $fetch['idUsuarios'];
		$_SESSION['username'] 	= $fetch['login'];
        $_SESSION['empresa'] = $fetch['empresa_id'];
        $_SESSION['tipo'] = $fetch['tipo'];
        //registro usuario
		echo 1;
	}
}
 else {
     echo 'Error: No ingresó por post action';
     header("Location: index.php");
}
?>