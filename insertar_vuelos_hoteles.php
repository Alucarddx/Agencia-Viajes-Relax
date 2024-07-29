<?php
include ('includes/conexion.php');

// Datos de vuelos
$vuelos = [
   
];

// Insertar datos en la tabla VUELO
foreach ($vuelos as $vuelo) {
    $stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssid", $vuelo['origen'], $vuelo['destino'], $vuelo['fecha'], $vuelo['plazas_disponibles'], $vuelo['precio']);
    if ($stmt->execute()) {
        echo "Vuelo agregado exitosamente.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

// Datos de hoteles
$hoteles = [
   
];

// Insertar datos en la tabla HOTEL
foreach ($hoteles as $hotel) {
    $stmt = $conn->prepare("INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $hotel['nombre'], $hotel['ubicacion'], $hotel['habitaciones_disponibles'], $hotel['tarifa_noche']);
    if ($stmt->execute()) {
        echo "Hotel agregado exitosamente.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
?>
