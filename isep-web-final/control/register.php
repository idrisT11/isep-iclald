<?php

    session_start();
    require_once( __DIR__ .  "/__utils.php");
    require_once( __DIR__ .  "/password_lib.php");
    require_once( __DIR__ .  "/../model/registerModel.php");

    //Si les valeurs ne sont pas Set, on affiche la page, sinon on enregistre
    if (isset( $_POST['password'] ) && isset($_POST['username'])) 
    {
        $email = $_POST['username'];
        $password = $_POST['password'];

        //On vérifie si les parametres sont valides
        if (!isEmailValid($email)) {
            header('Location: register?irp_error=mail_invalid');
        }

        if (!isPasswordValid($password)) {
            header('Location: register?irp_error=password_invalid');
        }

        //=============================================================
        if(!is_user_registred($db_connexion, $email)){
            die();
            //header('Location: register?irp_error=not_in_db');
        }   
        if (is_user_verified($db_connexion, $email)){
            header('Location: register?irp_error=already_registred');
        } 

        
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $token_user = hash('sha256', $email);
        $token_rnd = bin2hex(openssl_random_pseudo_bytes(32));

        echo $token_user . '</br>';
        echo $token_rnd . '';
        $link = "localhost/isep-web/verify?token_rnd=".$token_rnd.'&token_user='.$token_user;
        
        //On update la table des users avec le nouveau MDP
        update_user_hash($db_connexion, $email, $hash, $token_user);
        //On ajoute la nouvelle demande dans la table des mails envoyer d'inscription
        insert_token($db_connexion, $token_user, $token_rnd);
        

        sendConfirmationMail($email, $link);

        header('Location: ./connexion');
    }

    else{
        include(__DIR__ . "/../view/registerView.html");
        
    }


    

?>