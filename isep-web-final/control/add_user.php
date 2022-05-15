<?php

    require_once( __DIR__ .  "/../model/adminModel.php");
    session_start();

    //The user has to been connected and has to be an admin to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected']) || $_SESSION['role'] != 2) {
        echo "You dont have access to this page, please register yourself";
        die();
    }

    
    if (isset($_POST['nom']) && isset($_POST['prenom'])) 
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $genre = $_POST['genre'];
        $salle = $_POST['salle'];
        $datenaissance = $_POST['datenaissance'];
        $ville = $_POST['ville'];
        $taille = $_POST['taille'];
        $poid = $_POST['poid'];

        add_user($db_connexion, $nom, $prenom, $email, $role, $genre, $salle, $datenaissance, $ville, $taille, $poid);


        header('Location: ./admin');
    }
    
    else
    {
        
        //$token_user = get_token_from_email($db_connexion, $email);


        include(__DIR__ . "/../view/add_user.php");
    }


?>