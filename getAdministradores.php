<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
$data = array();

$q = mysqli_query($con, "SELECT * FROM administrador ");

while ($row = mysqli_fetch_object($q)){
    $data[]= $row;
}


echo json_encode($data);
echo mysqli_error($con);