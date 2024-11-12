<?php
session_start();

include_once('app/funciones.php');
if (!isset($_SESSION["contador"])) {
  $_SESSION["contador"] = 0;
}
$contador = $_SESSION["contador"];
$contador = $_SESSION["contador"];
if (  !empty( $_GET['login']) && !empty($_GET['clave'])){

    if ( userOk($_GET['login'],$_GET['clave'])){

      if ( getUserRol($_GET['login']) == ROL_PROFESOR){
        
        $contenido = verNotaTodas($_GET['login']);
      } else {
        $contenido = verNotasAlumno($_GET['login']);
      }
      include_once ('app/resultado.php');
    } 
    // userOK falso
    else {
       $contenido = "El número de usuario y la contraseña no son válidos";
       $_SESSION["contador"]++;
        include_once('app/acceso.php');
        $_SESSION["contador"]++;
    

    }
} else {
    $contenido = " Introduzca su número de usuario y su contraseña";
    include_once('app/acceso.php');
}


