<?php

class Session{

    public function __construct(){
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>