<?php

    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "/__utils.php");
    session_start();

    
    if (isset($_POST['objet']) && isset($_POST['content'])) 
    {
        $email = $_POST['email'];
        $objet = $_POST['objet'];
        $content = $_POST['content'];

        $to_email = "piono12.piono12@gmail.com";

        sendMail($objet, $content, $to_email);
    }
    
    else
    {
        
        //$token_user = get_token_from_email($db_connexion, $email);


        include(__DIR__ . "/../view/contacter.php");
    }


?>