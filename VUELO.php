<?php
include ('includes/conexion.php');

$result = $conn->query("SELECT * FROM VUELO");

echo "<h2>Tabla de Vuelos</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Plazas Disponibles</th>
                <th>Precio</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_vuelo']}</td>
                <td>{$row['origen']}</td>
                <td>{$row['destino']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['plazas_disponibles']}</td>
                <td>{$row['precio']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay vuelos registrados.";
}

$conn->close();
?>
