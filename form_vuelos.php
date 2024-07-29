<?php
session_start();
error_reporting(0);
include('includes/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Vuelos</title>
    <script>
        function validarVuelo() {
            const origen = document.getElementById('origen').value;
            const destino = document.getElementById('destino').value;
            const fecha = document.getElementById('fecha').value;
            const plazas = document.getElementById('plazas_disponibles').value;
            const precio = document.getElementById('precio').value;

            if (!origen || !destino || !fecha || !plazas || !precio) {
                alert('Todos los campos son obligatorios');
                return false;
            }

            if (isNaN(plazas) || plazas <= 0) {
                alert('Las plazas deben ser un número positivo');
                return false;
            }

            if (isNaN(precio) || precio <= 0) {
                alert('El precio debe ser un número positivo');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Gestión de Vuelos</h1>
    <form action="procesar_vuelo.php" method="post" onsubmit="return validarVuelo()">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen"><br><br>

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino"><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha"><br><br>

        <label for="plazas_disponibles">Plazas Disponibles:</label>
        <input type="number" id="plazas_disponibles" name="plazas_disponibles"><br><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio"><br><br>

        <input type="submit" value="Agregar Vuelo">
    </form>
</body>
</html>
