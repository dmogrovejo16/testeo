   <?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$title = $data['title'];
$desc = $data['desc'];
$url = $_FILES['url'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["url"]["name"]);


if (move_uploaded_file($_FILES["url"]["tmp_name"], $target_file)) {
    // Insertar la ruta de la imagen en la base de datos
    $q = mysqli_query($con, "INSERT INTO `fotos` (`urlImg`, `titImg`, `descImg` ) VALUES ('$url', '$title', '$desc')");

    if($q){
        http_response_code(201);
        $message['status']="Success";
    }else{
        http_response_code(422);
        $message['status'] = "ERROR";
    }

} else {
    echo "Error al cargar la imagen.";
}


echo json_encode($message);
echo mysqli_error($con);