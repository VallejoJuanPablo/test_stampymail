<?php 
include 'core/routes.php';
date_default_timezone_set('America/Argentina/Buenos_Aires');

$paramUrl = $_REQUEST;
$p = (isset($paramUrl['p']) ? $paramUrl['p'] : 'home');
$data_pages = $pages[$p];

    include_once './modulos/comunes/head.php';
    include_once './modulos/comunes/header.php';
    include_once './modulos/comunes/nav.php';
    include_once $data_pages['url'];
    include_once './modulos/comunes/js.php';
    include_once './modulos/comunes/footer.php';
?>
