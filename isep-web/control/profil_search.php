<?php

    require_once( __DIR__ .  "/../model/profilSearchModel.php");
    session_start();

    //The user has to been connected to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected'])) {
        echo "You dont have access to this page, please register yourself";
        die();
    }

    
    //If the user give a token_user, we shall base on it to identify the profil
    if (isset($_GET['recherche_input'])) 
    {
        
        if ($_GET['recherche_input'] == "") {
            $users = get_all_users($db_connexion);

        }
        else {
            $users = get_users_with_name($db_connexion, $_GET['recherche_input']);
        }


        include(__DIR__ . "/../view/resultat_recherche.php");
    }
    
    else
    {
        $email = $_SESSION['email'];
        
        $token_user = get_token_from_email($db_connexion, $email);


        //include(__DIR__ . "/../view/page-profil.php");
    }

    function get_profil_pic($token){

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }
?>