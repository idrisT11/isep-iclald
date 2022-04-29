<?php
    session_start();

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {
        $name = $_SESSION['name'];
        echo "Bienvenu $name";
    }
    else{
        echo "Vous devez d'abord vous authentifier";
        ?>
            <a href="./connexion.html">Revenir à la page d'authentification</a>
        <?php
    }


?>