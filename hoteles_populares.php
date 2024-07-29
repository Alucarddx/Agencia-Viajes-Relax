<?php
include ('includes/conexion.php');

// Consulta avanzada para mostrar hoteles con más de dos reservas
$query = "
    SELECT H.nombre, H.ubicacion, COUNT(R.id_reserva) AS total_reservas
    FROM HOTEL H
    JOIN RESERVA R ON H.id_hotel = R.id_hotel
    GROUP BY H.id_hotel
    HAVING COUNT(R.id_reserva) > 2
";

$result = $conn->query($query);

echo "<h2>Hoteles con más de dos reservas</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre del Hotel</th>
                <th>Ubicación</th>
                <th>Total Reservas</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['ubicacion']}</td>
                <td>{$row['total_reservas']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles con más de dos reservas.";
}

$conn->close();
?>
