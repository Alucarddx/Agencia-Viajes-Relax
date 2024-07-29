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
    <title>Reserva de Viajes</title>
</head>
<body>
    <h1>Reserva tu viaje</h1>
    <form action="procesar_reserva.php" method="post">
        <label for="id_cliente">ID Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" required><br><br>
        
        <label for="fecha_reserva">Fecha de Reserva:</label>
        <input type="date" id="fecha_reserva" name="fecha_reserva" required><br><br>
        
        <label for="id_vuelo">ID Vuelo:</label>
        <input type="text" id="id_vuelo" name="id_vuelo" required><br><br>
        
        <label for="id_hotel">ID Hotel:</label>
        <input type="text" id="id_hotel" name="id_hotel" required><br><br>
        
        <input type="submit" value="Reservar">
    </form>

    
</body>
</html>
