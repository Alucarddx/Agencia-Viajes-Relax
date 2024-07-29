<?php
include ('includes/conexion.php');

$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];

// Validaciones en el servidor
if (!$nombre || !$ubicacion || !$habitaciones_disponibles || !$tarifa_noche) {
    die("Todos los campos son obligatorios.");
}

if (!is_numeric($habitaciones_disponibles) || $habitaciones_disponibles <= 0) {
    die("Las habitaciones deben ser un número positivo.");
}

if (!is_numeric($tarifa_noche) || $tarifa_noche <= 0) {
    die("La tarifa debe ser un número positivo.");
}

// Consulta preparada
$stmt = $conn->prepare("INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

if ($stmt->execute()) {
    echo "Nuevo hotel agregado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
