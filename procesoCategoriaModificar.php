<?php
    include "conexion.php";

    // capturar datos del formulario
    $id = $_POST["categoriaID"];
    $nombre = utf8_decode($_POST["categoriaNuevoNombre"]);

    // crear sentencia SQL para modificación
    $sql = "UPDATE categoria SET nombre = ? WHERE idC = ?";

    // preparar la consulta
    $stmt = mysqli_prepare($conex, $sql);

    // verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // vincular los parámetros con la consulta preparada
        mysqli_stmt_bind_param($stmt, "si", $nombre, $id);

        // ejecutar la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            // cerrar la consulta preparada
            mysqli_stmt_close($stmt);
            
            // cerrar conexión
            mysqli_close($conex);
            
            // volver automáticamente al formulario de Modificar
            header("Location: modificarCategoria.php");
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
