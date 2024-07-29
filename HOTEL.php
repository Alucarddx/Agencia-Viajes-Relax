<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Hoteles</title>
    <script>
        function validarHotel() {
            const nombre = document.getElementById('nombre').value;
            const ubicacion = document.getElementById('ubicacion').value;
            const habitaciones = document.getElementById('habitaciones_disponibles').value;
            const tarifa = document.getElementById('tarifa_noche').value;

            if (!nombre || !ubicacion || !habitaciones || !tarifa) {
                alert('Todos los campos son obligatorios');
                return false;
            }

            if (isNaN(habitaciones) || habitaciones <= 0) {
                alert('Las habitaciones deben ser un número positivo');
                return false;
            }

            if (isNaN(tarifa) || tarifa <= 0) {
                alert('La tarifa debe ser un número positivo');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Gestión de Hoteles</h1>
    <form action="procesar_hotel.php" method="post" onsubmit="return validarHotel()">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion"><br><br>

        <label for="habitaciones_disponibles">Habitaciones Disponibles:</label>
        <input type="number" id="habitaciones_disponibles" name="habitaciones_disponibles"><br><br>

        <label for="tarifa_noche">Tarifa por Noche:</label>
        <input type="number" step="0.01" id="tarifa_noche" name="tarifa_noche"><br><br>

        <input type="submit" value="Agregar Hotel">
    </form>
</body>
</html>





<?php
include ('includes/conexion.php');

$result = $conn->query("SELECT * FROM HOTEL");

echo "<h2>Tabla de Hoteles</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Hotel</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Habitaciones Disponibles</th>
                <th>Tarifa por Noche</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_hotel']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['ubicacion']}</td>
                <td>{$row['habitaciones_disponibles']}</td>
                <td>{$row['tarifa_noche']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles registrados.";
}

$conn->close();
?>



