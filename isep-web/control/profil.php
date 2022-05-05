<?php

    require_once( __DIR__ .  "\..\model\\profilModel.php");
    session_start();

    //The user has to been connected to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected'])) {
        echo "You dont have access to this page, please register yourself";
        die();
    }

    //If the user give a token_user, we shall base on it to identify the profil
    if (isset($_GET['token_user'])) 
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