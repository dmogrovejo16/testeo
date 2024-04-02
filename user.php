<?php
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json");

require 'database.php';

$query = "SELECT * FROM `usuario` ";
$userData = []; // Inicializa el arreglo antes del bucle

if ($is_query_run = mysqli_query($conn, $query)) {
    while ($query_executed = mysqli_fetch_assoc($is_query_run)) {
        $userData[] = $query_executed;
    }
    echo json_encode($userData);
} else {
    echo json_encode(["error" => "Error in execution: " . mysqli_error($conn)]);
}

?>
