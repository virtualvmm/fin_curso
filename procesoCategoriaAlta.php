<?php
    include "conexion.php";

    // capturar datos del formulario
    $nombre = utf8_decode($_POST["categoriaNombre"]);

    // crear sentencia SQL con consulta preparada
    $sql = "INSERT INTO categoria (nombre) VALUES (?)";

    // preparar la consulta
    $stmt = mysqli_prepare($conex, $sql);

    // verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // vincular los parámetros con la consulta preparada
        mysqli_stmt_bind_param($stmt, "s", $nombre);

        // ejecutar la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            // cerrar la consulta preparada
            mysqli_stmt_close($stmt);
            
            // cerrar conexión
            mysqli_close($conex);
            
            // volver automáticamente al formulario de Alta
            header("Location: altaCategoria.php");
            exit; // Salir del script después de redireccionar
        } else {
            // en caso de error en la ejecución de la consulta
            echo "Error al ejecutar la consulta: " . mysqli_error($conex);
        }
    } else {
        // en caso de error en la preparación de la consulta
        echo "Error al preparar la consulta: " . mysqli_error($conex);
    }
?>
