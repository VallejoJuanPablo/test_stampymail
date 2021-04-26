<?php

    include_once 'session.php';

    $session = new Session();
    $session->closeSession();

    header("location: ../index.php");

?>