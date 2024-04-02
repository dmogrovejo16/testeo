<?php
include "config.php";
$input = file_get_contents('php://input');
$message = array();

$id = $_GET['id'];

// Consulta para eliminar el registro con el email proporcionado
$q = mysqli_query($con, "DELETE FROM torneo WHERE idTorneo = '{$id}'");

if ($q) {
    // Éxito al eliminar el registro
    http_response_code(200);  // Usé 200 para éxito en lugar de 201, ya que DELETE no suele devolver 201 Created.
    $message['status'] = "Success";
} else {
    // Error al eliminar el registro
    http_response_code(422);
    $message['status'] = "ERROR";
    $message['error'] = mysqli_error($con);

    error_log("Error en delete.php: " . mysqli_error($con));
    echo "Error en delete.php: " . mysqli_error($con);
}

echo json_encode($message);