   <?php
include "config.php";
$desc = $_POST['desc'];
$imagen ="";
if(isset($_FILES["imagen"])){
$file=$_FILES["imagen"];
$nombre = $file["name"];
$tipo = $file["type"];
$ruta_provisional=$file["tmp_name"];
$size=$file["size"];
$dimensiones=getimagesize($ruta_provisional);
$width=$dimensiones[0];
$height=$dimensiones[1];
$carpeta="C:\Users\mathi\OneDrive\Desktop";

if($tipo!='image/jpg' && $tipo!='image/JPG' && $tipo!='image/png' ){
echo "ERROR, el tipo de archivo no es aceptado ";
}else if ($size>3*1024*1024){
    echo "ERROR, la imagen es muy grande";
}else{
    $src=$carpeta.nombre;
    move_uploaded_file($ruta_provisional, $src);
    $imagen = "C:\Users\mathi\OneDrive\Desktop/".$nombre;
}

}


$q = mysqli_query($con, "INSERT INTO `fotos` (`urlImg`, `descImg`,`titImg`  ) VALUES ('$imagen', '$desc', 'Foto Prueba')");
