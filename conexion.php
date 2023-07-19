<?php   
    // conectar al servidor de BD
    $conex = mysqli_connect("localhost", "root", "", "webmarket");
    // controlar conexión
    if (!$conex) {
        header("Location: errorPage.php?MSG=NO se pudo CONECTAR al SERVIDOR de Base de Datos");
        exit; // Salir del script en caso de error
    }
    // seleccionar Base de Datos
    $selDB = mysqli_select_db($conex, "webmarket");
    // controlar selección de Base de Datos
    if (!$selDB) {
        header("Location: errorPage.php?MSG=NO se pudo SELECCIONAR la Base de Datos");
        exit; // Salir del script en caso de error
    }
?>