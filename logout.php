<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();


// Verificar si el usuario está autenticado
if (!isset($_SESSION["usuario_id"])) {
    // Si no está autenticado, redirige a la página de inicio de sesión
    header("Location: index.php");
    exit();
}


 

?>