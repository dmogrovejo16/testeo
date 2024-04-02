   <?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include "config.php";
mysqli_set_charset($con, "utf8");
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$message2 = array();
$email = $data['email'];
$name = $data['name'];
$lastName = $data['lastName'];
$password = $data['password'];



$q = mysqli_query($con, "INSERT INTO `usuario` (`nombre`, `apellido`, `email`,`contrasena` ) VALUES ('$name', '$lastName', '$email', SHA2('$password', 512))");

$result = mysqli_query($con, "SELECT id FROM usuario WHERE email = '$email' LIMIT 1");
if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $id = $row['id'];
        } 


} 


if (strpos($email, '.est') == false) {
    $q2 = mysqli_query($con, "INSERT INTO `administrador` (`area`, `idAdm`) VALUES ('Adm', '$id')");
}else{
    $q2 = mysqli_query($con, "INSERT INTO `estudiante` (`curso`, `idEst`) VALUES ('BGU', '$id')");
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