<?php

$pages = array(
    'home' => array('url' => 'modulos/vistas/home/home.php', 'urljs' => array('modulos/vistas/home/home.js'))   
    );

    if(!empty($user)) {
        switch ($user->getAcceso()) {  
            case 1: //ADM
                $pages2 = array('usuarios_lista' => array('url' => 'modulos/vistas/usuarios/usuarios_lista.php', 'urljs' => array('modulos/vistas/usuarios/usuarios_lista.js')),     
            );
        break;
             case 2: //USER 
                break;
            default:
                break;
        }
    }
    
foreach ($pages2 as $k => $v) {
    $pages[$k] = $v;
}