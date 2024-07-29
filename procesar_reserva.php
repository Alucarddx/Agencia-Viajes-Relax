<?php
include ('includes/conexion.php');

$id_cliente = $_POST['id_cliente'];
$fecha_reserva = $_POST['fecha_reserva'];
$id_vuelo = $_POST['id_vuelo'];
$id_hotel = $_POST['id_hotel'];

// Verificar disponibilidad de vuelo
$consulta_vuelo = $conn->prepare("SELECT plazas_disponibles FROM VUELO WHERE id_vuelo = ?");
$consulta_vuelo->bind_param("i", $id_vuelo);
$consulta_vuelo->execute();
$resultado_vuelo = $consulta_vuelo->get_result();
$vuelo = $resultado_vuelo->fetch_assoc();

if ($vuelo['plazas_disponibles'] > 0) {
    // Verificar disponibilidad de hotel
    $consulta_hotel = $conn->prepare("SELECT habitaciones_disponibles FROM HOTEL WHERE id_hotel = ?");
    $consulta_hotel->bind_param("i", $id_hotel);
    $consulta_hotel->execute();
    $resultado_hotel = $consulta_hotel->get_result();
    $hotel = $resultado_hotel->fetch_assoc();
    
    if ($hotel['habitaciones_disponibles'] > 0) {
        // Insertar reserva
        $insertar_reserva = $conn->prepare("INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)");
        $insertar_reserva->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);
        
        if ($insertar_reserva->execute()) {
            // Actualizar disponibilidad de vuelo y hotel
            $actualizar_vuelo = $conn->prepare("UPDATE VUELO SET plazas_disponibles = plazas_disponibles - 1 WHERE id_vuelo = ?");
            $actualizar_vuelo->bind_param("i", $id_vuelo);
            $actualizar_vuelo->execute();
            
            $actualizar_hotel = $conn->prepare("UPDATE HOTEL SET habitaciones_disponibles = habitaciones_disponibles - 1 WHERE id_hotel = ?");
            $actualizar_hotel->bind_param("i", $id_hotel);
            $actualizar_hotel->execute();
            
            echo "Reserva realizada con éxito";
        } else {
            echo "Error al realizar la reserva: " . $conn->error;
        }
    } else {
        echo "No hay habitaciones disponibles en el hotel seleccionado";
    }
} else {
    echo "No hay plazas disponibles en el vuelo seleccionado";
}

$conn->close();
?>
