<?php
include ('includes/conexion.php');

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

// Validaciones en el servidor
if (!$origen || !$destino || !$fecha || !$plazas_disponibles || !$precio) {
    die("Todos los campos son obligatorios.");
}

if (!is_numeric($plazas_disponibles) || $plazas_disponibles <= 0) {
    die("Las plazas deben ser un número positivo.");
}

if (!is_numeric($precio) || $precio <= 0) {
    die("El precio debe ser un número positivo.");
}

// Consulta preparada
$stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssid", $origen, $destino, $fecha, $plazas_disponibles, $precio);

if ($stmt->execute()) {
    echo "Nuevo vuelo agregado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
