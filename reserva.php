<?php
include ('includes/conexion.php'); // Asegúrate de que este archivo esté en el mismo directorio o ajusta la ruta

$reservas = [
    
];

foreach ($reservas as $reserva) {
    $stmt = $conn->prepare("INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isii", $reserva['id_cliente'], $reserva['fecha_reserva'], $reserva['id_vuelo'], $reserva['id_hotel']);
    if ($stmt->execute()) {
        echo "Reserva agregada exitosamente.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
?>
