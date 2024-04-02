<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$curso = $data['curso'];
$id = $data['id'];

$q = mysqli_query($con, "UPDATE estudiante SET curso = '$curso' WHERE idEst = $id LIMIT 1;");

if($q){
    $message['status']="Success";
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

echo json_encode($message);
echo mysqli_error($con);