<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$area = $data['area'];
$id = $data['id'];

$q = mysqli_query($con, "UPDATE administrador SET area = '$area' WHERE idAdm = $id LIMIT 1;");

if($q){
    $message['status']="Success";
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

echo json_encode($message);
echo mysqli_error($con);