<?php
$servername = "bg57bee3ubkexiql7lyq-mysql.services.clever-cloud.com";
$username = "ut6pmdjd2ighkifc";
$password = "xh7FL2eKHWien1jDxiEQ";
$database= "bg57bee3ubkexiql7lyq";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
echo "connected succesfully";


?>