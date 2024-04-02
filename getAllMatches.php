<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include "config.php";
$data = array();
$q = mysqli_query($con, "SELECT * FROM partido ");

while ($row = mysqli_fetch_object($q)){
    $data[]= $row;
}

echo json_encode($data);
echo mysqli_error($con);