<?php
    session_start();

    require_once( __DIR__ .  "\..\model\\profilPicModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {

        $email = $_SESSION['email'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];

        $_SESSION['profil_pic'] = get_profil_pic($db_connexion, $email);


        echo "Bienvenu $nom $prenom";

        include(__DIR__ . "/../view/page-acceuil.php");
    }

    else{
        echo "Vous devez d'abord vous authentifier";
        ?>
            <a href="./connexion">Revenir à la page d'authentification</a>
        <?php
    }

?>