<?php

    require_once( __DIR__ .  "/../model/adminModel.php");
    session_start();

    //The user has to been connected and has to be an admin to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected']) || $_SESSION['role'] != 2) {
        echo "You dont have access to this page, please register yourself";
        die();
    }

    
    //If the user give a token_user, we shall base on it to identify the profil
    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'delete_user' && isset($_GET['token_user'])) 
        {
            delete_user($db_connexion, $_GET['token_user']);
        }


        header('Location: ./admin');
        
    }
    
    else
    {
        $users = get_all_users($db_connexion);
        
        //$token_user = get_token_from_email($db_connexion, $email);


        include(__DIR__ . "/../view/manage_user.php");
    }


?>