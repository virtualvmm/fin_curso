<!DOCTYPE html>
<html lang="es">
<head>
    <title>Zoomzone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="webMarketCamp,importadora, distribuidora, articulos, fotografia, camaras, tripodes, flashes, filtros, accesores, fotografia Madrid">
    <meta name="Description" content="Empresa importadora y distribuidora de articulos para fotografos, desde camaras, tripodes, flashes, filtros y todo tipo de accesorios.">
    
    <meta name="Author" content="Vanesa Martinez Marin">
    <meta name="Copyright" content="Derechos reservados">
    <meta name="robots" content="index, follow">

    <!--links de bootstrap y estilo del sitio  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
// Incluir el archivo de conexión a la base de datos
include "conexion.php";

// Verificar y asignar un valor predeterminado para $_GET["categoriaID"]
$categor = isset($_GET["categoriaID"]) ? $_GET["categoriaID"] : "0";

// Determinar criterio de ordenación
if (isset($_GET["ORD"])) {
    // Capturar orden
    $orden = $_GET["ORD"];    
} else {
    $orden = "idP";
}

// Determinar filtro
if ($categor == "0" || $categor == "undefined") {
    $filtro = '';
} else {
    $filtro = "WHERE idC = '$categor'";
}

// Crear sentencia SQL
$sql = "SELECT productos.idP, productos.marca, productos.descripcion, productos.origen, productos.precio, categoria.nombre ";
$sql .= "FROM productos ";
$sql .= "JOIN categoria ";
$sql .= "ON productos.categoria = categoria.idC ";
if (isset($filtro)) {
    // Agregamos filtro 
    $sql .= " $filtro "; 
}
$sql .= "ORDER BY $orden";

// Ejecutar sentencia SQL
$result = $conex->query($sql);

// Controlar existencia de datos
if (!$result || $result->num_rows == 0) {
    // Mostrar mensaje de error o redireccionar a una página de error
    die("Error en la consulta o no hay datos para mostrar");
}

// Crear cabecera de tabla de datos
echo "
    <table class='table table-responsive table-striped table-bordered table-hover' id='lst'>
        <thead class='thead-inverse'>
            <tr>
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=idP'>ID</a>
                </th>       
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=marca'>NOMBRE</a>
                </th>
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=descripcion'>DESCRIPCION</a>
                </th>
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=origen'>ORIGEN</a>
                </th>
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=precio'>PRECIO</a>
                </th>
                <th>
                    <a href='listarProductos.php?categoriaID=$categor&ORD=categoria,idP'>CATEGORIA</a>
                </th>                           
            </tr> 
        </thead>       
    ";

// Recorrer los resultados y mostrar en la tabla
while ($reg = $result->fetch_array(MYSQLI_ASSOC)) {
    $marca = utf8_encode($reg["marca"]);
    $descripcion = utf8_encode($reg["descripcion"]);
    $origen = utf8_encode($reg["origen"]);
    $categoria = utf8_encode($reg["nombre"]);     

    // Determinar fila par/impar
    $fila = ($fila % 2 == 0) ? 'filaPAR' : 'filaIMP';

    echo "<tr class='$fila'>\n";                
    echo " <td>$reg[idP]</td>\n"; // ID            
    echo " <td>$marca</td>\n";   // Marca
    echo " <td>$descripcion</td>\n";  
    echo " <td>$origen</td>\n";   // Origen
    echo " <td>$ $reg[precio]</td>\n"; // Precio
    echo " <td>$categoria</td>\n"; // Categoría
    echo "</tr>\n"; 

    $fila++; // Incrementar número de fila
}

// Liberar resultado y cerrar conexión
$result->free();
$conex->close();
?>

</table>
</body>
</html>
