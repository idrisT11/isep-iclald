<?php

    session_start();

    if (!(isset($_SESSION['connected']) && $_SESSION['connected'])) {
        echo "You are not connected";
        die();
    }

    session_destroy();

    header('Location: ./connexion');


?>