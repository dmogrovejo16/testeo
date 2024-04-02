<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$resEq1 = $data['resEq1'];
$resEq2 = $data['resEq2'];
$id = $data['id'];

$q = mysqli_query($con, "UPDATE partido SET resultEq1 = '$resEq1', resultEq2 = '$resEq2' WHERE idPartido = $id LIMIT 1;");

if($q){
    $message['status']="Success";
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

echo json_encode($message);
echo mysqli_error($con);