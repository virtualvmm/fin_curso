<?php
    // conectar al servidor de BD
    include "conexion.php";
    // capturar ID del formulario
    $id = $_POST["bajaID"];
    // crear sentencia SQL para buscar ID
    $sql = "SELECT productos.idP,productos.marca,productos.descripcion,productos.origen,productos.precio,categoria.nombre";
    $sql .= " FROM productos INNER JOIN categoria ON productos.categoria = categoria.idC WHERE idP= $id";

    // ejecutar sentencia SQL
    $result = $conex->query($sql);
    // confirmar existencia
    if ($result->num_rows == 0) {
        header("Location: errorPage.php?MSG=ID de Producto INEXISTENTE");
    } else {
        // cargar datos del registro
        $regProductos = $result->fetch_assoc();
    } // endif
    // convertir caracteres
    $ID = $regProductos["idP"];
    $marca = utf8_encode($regProductos["marca"]);
    $descripcion = utf8_encode($regProductos["descripcion"]);
    $origen = utf8_encode($regProductos["origen"]);
    $precio = $regProductos["precio"];
    $categoria = utf8_encode($regProductos["nombre"]);
?>
