<?php
    
    session_start();

    require_once( __DIR__ .  "\..\model\\verifyModel.php");

    if(isset($_SESSION['connected'])){
        echo "Already connected";
    }
    

    if (isset($_GET['token_user']) and isset($_GET['token_rnd'])) {
        
        $token_user = $_GET['token_user'];
        $token_rnd = $_GET['token_rnd'];


        if ( is_user_verified($db_connexion, $token_user) ) {
            header('Location: ./');
        }

        if ( !is_tuple_in_db($db_connexion, $token_user, $token_rnd) ) {
            header('Location: ./');
        }

        set_user_verified($db_connexion, $token_user);

        $email = get_email_from_token($db_connexion, $token_user);

        $_SESSION['connected'] = TRUE;
        $_SESSION['email'] = $email;

        include(__DIR__ . "/../view/verifyView.html");  
    }

    else{
        include(__DIR__ . "/../view/verifyView.html"); 
        //header('Location: ./');
    }


?>