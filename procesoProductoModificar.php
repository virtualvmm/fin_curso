<?php
    include "conexion.php";

    // capturar datos del formulario
    $id = $_POST["modificarID"];
    $marca = utf8_decode($_POST["modificarMarca"]);
    $descripcion = utf8_decode($_POST["modificarDescripcion"]);
    $origen = utf8_decode($_POST["modificarOrigen"]);
    $precio = $_POST["modificarPrecio"];

    // escapar variables para prevenir inyección de SQL
    $marca = mysqli_real_escape_string($conex, $marca);
    $descripcion = mysqli_real_escape_string($conex, $descripcion);

    // crear sentencia SQL para modificación
    $sql = "UPDATE productos SET ";
    $sql .= "marca = '$marca', ";
    $sql .= "descripcion = '$descripcion', ";
    $sql .= "precio = $precio ";
    $sql .= "WHERE idP = $id";

    // ejecutar sentencia SQL
    if (mysqli_query($conex, $sql)) {
        echo "Registro modificado correctamente.";
    } else {
        echo "Error al modificar el registro: " . mysqli_error($conex);
    }

    // cerrar conexión
    mysqli_close($conex);

    // volver automáticamente al formulario de Modificar
    header("Location: modificarProductos.php");
    exit; // Salir del script después de redireccionar
?>
