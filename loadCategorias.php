<?php
    // MODULO LOAD Categorias
    // conectar al Servidor de Base de Datos
    include "conexion.php";
    // crear sentencia SQL para cargar categorias
    $sql = "SELECT * FROM categoria ORDER BY nombre";
    // ejecutar sentencia SQL
    $result = $conex->query($sql);
    // verificar existencia de datos
    if ($result->num_rows == 0) {
        // mostrar mensaje de error
        header("Location: errorPage.php?MSG=Aún no existen categorias");
    } else {
        // crear lista desplegable (combo box)
        while ($regCAT = $result->fetch_array(MYSQLI_ASSOC)) {
            // convertir caracteres
            $nombre = utf8_encode($regCAT["nombre"]);
            // crear option del combo
            echo "\t\t<option value='" . $regCAT["idC"] . "'>$nombre</option>\n";
        } // end while
        // liberar resultado y cerrar conexión
        $result->free();
        $conex->close();
    } // endif
?>
