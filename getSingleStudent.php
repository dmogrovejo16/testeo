<?php
include "config.php";

$data = array();
$email= $_GET['email'];
$q = mysqli_query($con, "SELECT 'id' FROM 'usuario' WHERE 'email'=$email LIMIT 1");
while ($row = mysqli_fetch_object($q)){
    $data[]= $row;
}

echo json_encode($data);
echo mysqli_error($con);