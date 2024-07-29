<?php
session_start();
error_reporting(0);
include('includes/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agencia de Viajes</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<nav>
		<ul class="menu-horizontal">
			<li><a href="#">Inicio</a></li>
			<li>
				<a href="HOTEL.php">Hoteles</a>
			</li>
			<li>
				<a href="VUELO.php">Vuelos</a>
				
			</li>
		</ul>
	</nav>
</body>
</html>