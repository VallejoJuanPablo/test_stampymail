<?php
require 'user.php';
$datos = json_decode(file_get_contents("php://input"), true);
$response = array('success' => FALSE, 'data' => NULL);
$data = new User();

switch ($datos['backend']) {
    case 'getUsers':
        $response = $data->getUsers();
        break;
    case 'getUsers_cod':
        $response = $data->getUsers_cod($datos);
        break;
    case 'agregarUsuario':
        $response = $data->agregarUsuario($datos);
        break;
    case 'buscarUsuarios':
        $response = $data->buscarUsuarios($datos);
        break;
    case 'editarUsuario':
        $response = $data->editarUsuario($datos);
        break;
    case 'desHabUsuario':
        $response = $data->desHabUsuario($datos);
        break;
    case 'contarUsuarios':
        $response = $data->contarUsuarios();
        break;
}

echo json_encode($response);
