<?php

//require 'config.php';
require 'user.php';
$datos = $_REQUEST;
$datos = json_decode(file_get_contents("php://input"), true);
$response = array('success' => FALSE, 'data' => NULL);
$data = new User();

file_put_contents('Log.txt', "Console: " . print_r($datos, TRUE) . " \n", FILE_APPEND);
switch ($datos['backend']) {
    case 'getUsers':
        $response = $data->getUsers();
        break;
}

file_put_contents('Log.txt', "Console: " . print_r($response, TRUE) . " \n", FILE_APPEND);
echo json_encode($response);