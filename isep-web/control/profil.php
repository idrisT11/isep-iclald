<?php

    require_once( __DIR__ .  "/../model/profilModel.php");
    session_start();

    //The user has to been connected to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected'])) {
        echo "You dont have access to this page, please register yourself";
        die();
    }

    if (isset($_GET['modif']) && $_GET['modif'] && isset($_GET['token_user'])) 
    {
        $email = $_SESSION['email'];
        $current_token_user = get_token_from_email($db_connexion, $email);

        $token_user = $_GET['token_user'];

        //If the user is not an admin, he cant modify auser profil
        if ($token_user != $current_token_user && $_SESSION['role'] != 2) {
            echo "Vous n'avez pas le droit de modifer cette page";
            die();
        }


        if (isset($_POST['nom']) && isset($_POST['prenom']) /* ...etc*/) 
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $genre = $_POST['genre'];
            $salle = $_POST['salle'];
            $datenaissance = $_POST['date_naissance'];
            $ville = $_POST['ville'];
            $taille = $_POST['taille'];
            $poid = $_POST['poid'];

            $id = get_id_from_email($db_connexion, $email);

            update_user($db_connexion, $nom, $prenom, $email, $genre, $salle, $datenaissance, $ville, $taille, $poid, $id);
    
    
            header('Location: ./profil');
        }

        else
        {

            $user = get_user_from_token($db_connexion, $token_user);

            include(__DIR__ . "/../view/page-profil-modif.php");

        }


    }

    //If the user give a token_user, we shall base on it to identify the profil
    else if (isset($_GET['token_user'])) 
    {
        $email = $_SESSION['email'];
        $current_token_user = get_token_from_email($db_connexion, $email);

        $token_user = $_GET['token_user'];


        if (does_token_exit($db_connexion, $token_user)) 
        {
            $user = get_user_from_token($db_connexion, $token_user);

            include(__DIR__ . "/../view/page-profil.php");
        }

        else
        {
            echo "The user request does not exit";
            die();
        }
    }
    
    else
    {
        $email = $_SESSION['email'];
        
        $token_user = get_token_from_email($db_connexion, $email);
        $current_token_user = $token_user;//hhmmmm

        $user = get_user_from_token($db_connexion, $token_user);


        include(__DIR__ . "/../view/page-profil.php");
    }
?>