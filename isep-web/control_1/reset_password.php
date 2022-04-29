<?php

    require_once('./password_lib.php');

    session_start();

    $db_connexion = db_login();

    if (isset($_POST['username'])) 
    {
        if($db_connexion->connect_error)
            die('Erreur : ' .$conn->connect_error);

        
        $email = $_POST['username'];

        //Verify if parameters are valid
        if (!isEmailValid($email)) {
            header('Location: connexion.html?irp_error=mail_invalid');
        }

        //Verify if the user is in the data base
        $request = $db_connexion->prepare("SELECT * FROM users WHERE email = ?");
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 
        
        //Il faudra verifier si l'user n'est pas vérified
        if ($request->affected_rows == 1) 
        {
            $link = "localhost/verification.php?token_rnd=".$token_rnd.'&token_user='.$token_user;


            //On update la table des users avec le nouveau MDP
            $str = "UPDATE users SET password = ? WHERE email = ?";
            $request = $db_connexion->prepare($str);
            $request->bind_param("ss", $hash, $email);
            $request->execute();

            //On ajoute la nouvelle demande dans la table des mails envoyer d'inscription
            $str = "INSERT INTO inscription_mail_sent(token_user, token_rnd) VALUES (?, ?)";
            $request = $db_connexion->prepare($str);
            $request->bind_param("ss", $token_user, $token_rnd);
            $request->execute();

            
            sendConfirmationMail($email, $link);

        }

        $token = hash('sha256', $email);
        
        
    }
    else{
        header('Location: connexion.html?irp_error=no_params');
    }



    function isEmailValid($email)
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

        return preg_match($regex, $email);
    }

    function db_login(){
        $servername = 'localhost';
        $sql_username = 'root';
        $sql_password = '';

        $db_name = 'iclald';

        $connexion = new mysqli($servername, $sql_username, $sql_password, $db_name);


        if($connexion->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }

        return $connexion;
    }

    function sendConfirmationMail($to_email, $link)
    {
        $subject = "Validation du compte Health's Fab";
        $body = "Bonjour,\n\n \tPour réinitialisé votre compte, veuillez vous rendre sur ce lien <a href='".$link."'>Ici</a>";
        $headers = "From: Health's Fab" . "\r\n" ;
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";

        } 
        else {
            echo "Email sending failed...";

        }
    }
?>