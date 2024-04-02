<?php

header("Access-Control-Allow-Origin *");
header("Access-Control-Allow-Methods. POST, GET, DELETE, PUT, PATCH, OPTIONS");
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Lenght: 0');
header('Content-Type: text/plain');
$con = mysqli_connect("bg57bee3ubkexiql7lyq-mysql.services.clever-cloud.com", "ut6pmdjd2ighkifc", "xh7FL2eKHWien1jDxiEQ", "bg57bee3ubkexiql7lyq") or die ("Could not connect DB");