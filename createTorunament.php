   <?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$name = $data['name'];
$fechIni = $data['fechIni'];
$fechFin = $data['fechFin'];
$idAdmCreator = $data['idAdmCreator'];


$q = mysqli_query($con, "INSERT INTO `torneo` (`nombreTorneo`, `fechaInicio`, `fechaFin`,`idAdmCreator` ) VALUES ('$name', '$fechIni', '$fechFin', '$idAdmCreator')");

if($q){
    http_response_code(201);
    $message['status']="Success";
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

echo json_encode($message);
echo mysqli_error($con);