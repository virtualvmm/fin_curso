<!DOCTYPE html>
<html lang="es">
<head>
	<title>Zoomzone</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Keywords" content="webMarketCamp,importadora, distribuidora, articulos, fotografia, camaras, tripodes, flashes, filtros, accesores, fotografia Madrid ">
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
        include "header.html";
?>

<main class="container" id="contenido">
 
<section id="empty" class="row clearfix"></section>



	<section id="Bienvenida" class="row">
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 				<div class="list-group">
							<div class="thumbnail">
							<h1 class="list-group-item discret list-group-item-heading   text-center">Alta Categoria</h1>
							 
		 					<div class="panel-body">
		 					<h2>Dar Categoria de Alta</h2>
										<hr>
			<form class="form-group" id="categForm" action="procesoCategoriaAlta.php" method="POST">
			<label  for="altaCategoriaInputNombre" >Nombre</label>
			<input type="text"  class="form-control" id="altaCategoriaInputNombre" name="categoriaNombre">
			<br >
            <input type="submit"  class="form-control" value="Ingresar" id="altaCategoriaBoton">
            </form>

            <div class="text-center">
				<p class="panel panel-default error text-danger" id="altaCategoriaError"> </p>
                <p class="panel panel-default resultado text-success"  id="altaCategoriaResultado"> </p>
            </div>



							</div>
						</div>
					</div>
				</article>
	</section><!-- Termina Jumbotron Introducción-->

 
 

			 







</main>	









<!--Sripts de bootstrap  y jquery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>