   <?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include "config.php";
mysqli_set_charset($con, "utf8");
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$message2 = array();
$fecha = $data['fecha'];
$hora = $data['hora'];
$equipo1 = $data['equipo1'];
$equipo2 = $data['equipo2'];
$nivel = $data['nivel'];
$etapa = $data['etapa'];
$nombreTorneo = $data['nombreTorneo'];
$disciplina = $data['disciplina'];
$email= $data['email'];
$ubi= $data['ubi'];




$result = mysqli_query($con, "SELECT id FROM usuario WHERE email = '$email' LIMIT 1");

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $id = $row['id'];
        $q = mysqli_query($con, "INSERT INTO partido (fechaPartido, horaPartido, equipo1, equipo2, etapa, nivel, nombreTorneo, disciplina, idAdministrador, ubiPartido) VALUES ('$fecha', '$hora', '$equipo1', '$equipo2', '$etapa', '$nivel', '$nombreTorneo', '$disciplina', '$id', '$ubi');");

        } 


} 



if($q){
    http_response_code(201);
    $message['status']="Success";
    $message2['status']=$id;
}else{
    http_response_code(422);
    $message['status'] = "ERROR";
}

echo json_encode($message);
echo mysqli_error($con);