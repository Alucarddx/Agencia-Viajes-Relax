<?php
include ('includes/conexion.php');

// Datos de prueba
$origen = "Madrid";
$destino = "Barcelona";
$fecha = "2024-07-20";
$plazas_disponibles = 100;
$precio = 150.00;

// Consulta preparada
$stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssid", $origen, $destino, $fecha, $plazas_disponibles, $precio);

if ($stmt->execute()) {
    echo "Nuevo vuelo agregado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
