<?php

$pages = array(
    'home' => array('url' => 'modulos/vistas/home/home.php', 'urljs' => array('js/home.js'))   
    );

    if(!empty($user)) {
        switch ($user->getAcceso()) {  
            case 1: //ADM
                $pages2 = array('usuarios_lista' => array('url' => 'modulos/vistas/usuarios/usuarios_lista.php', 'urljs' => array('js/usuarios_lista.js')),  
                'usuarios_nuevo' => array('url' => 'modulos/vistas/usuarios/usuarios_nuevo.php', 'urljs' => array('js/usuarios_nuevo.js')),   
            );
        break;
        case 2: //USER
            $pages2 = array('usuarios_lista' => array('url' => 'modulos/vistas/usuarios/usuarios_lista.php', 'urljs' => array('js/usuarios_lista.js')),  
            'usuarios_nuevo' => array('url' => 'modulos/vistas/usuarios/usuarios_nuevo.php', 'urljs' => array('js/usuarios_nuevo.js')),   
        );
            default:
                break;
        }
    }
    
foreach ($pages2 as $k => $v) {
    $pages[$k] = $v;
}